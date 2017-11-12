.. include:: ../Includes.txt


.. typoscript-configuration:

TypoScript Configuration
------------------------

TYPO3 uses "TypoScript" as a specific *language* to configure a website. TypoScript is a very powerful tool in the TYPO3 universe, because it allows integrators to configure and manipulate almost every aspect of the system and customize a TYPO3 instance to very specific needs of their customers. It is important to highlight, that TypoScript is not a programming language, so you do not need to be a software developer to fine tune TYPO3. However, due to the complexity of TYPO3 and its configuration options, quite comprehensive documentation about TypoScript exists, which can be overwhelming sometimes.

As part of this tutorial, we focus on the basics only and how to apply them. A comprehensive documentation about TypoScript and all its objects, properties and functions can be found in the :ref:`TypoScript Reference <t3tsref:start>`.


.. files-and-directories:

Files and Directories
^^^^^^^^^^^^^^^^^^^^^

First of all, we create two new files in the site package directory structure, which will contain all TypoScript configurations. By following the official conventions of their file and directory naming, TYPO3 knows how to include them automatically.

::

    site_package/
    site_package/Configuration/
    site_package/Configuration/TypoScript/
    site_package/Configuration/TypoScript/constants.typoscript
    site_package/Configuration/TypoScript/setup.typoscript
    site_package/Resources/
    site_package/Resources/...

As shown above, these two files are ``constants.typoscript`` and ``setup.typoscript`` inside the ``Configuration/TypoScript/`` folder. The Fluid template files we have created in the previous step are located in the ``Resources/`` directory, but not listed above for clarity reasons.


.. file-constants-typoscript:

File ``constants.typoscript``
"""""""""""""""""""""""""""""

.. TODO: describe main purpose of the file.

Add the following lines to file ``constants.typoscript``.

::

    <INCLUDE_TYPOSCRIPT: source="FILE:EXT:fluid_styled_content/Configuration/TypoScript/constants.txt">

    page {
      fluidtemplate {
        layoutRootPath = EXT:site_package/Resources/Private/Layouts/
        partialRootPath = EXT:site_package/Resources/Private/Partials/
        templateRootPath = EXT:site_package/Resources/Private/Templates/
      }
    }

*((TODO ... ))*


.. file-setup-typoscript:

File ``setup.typoscript``
"""""""""""""""""""""""""

.. TODO: describe main purpose of the file.

File ``setup.typoscript`` is a little it more complex, so we explain it section by section. First, add the following lines to that file.

::

    <INCLUDE_TYPOSCRIPT: source="FILE:EXT:fluid_styled_content/Configuration/TypoScript/setup.txt">
    <INCLUDE_TYPOSCRIPT: source="FILE:EXT:site_package/Configuration/TypoScript/Helper/DynamicContent.typoscript">

    page = PAGE
    page {
      typeNum = 0

      10 = FLUIDTEMPLATE
      10 {
        // Fluid template section
      }

      includeCSS {
        // CSS file inclusion
      }

      includeJSFooter {
        // JavaScript file inclusion
      }
    }

    config {
      // global site configuration
    }


The first two lines (``<INCLUDE_TYPOSCRIPT ...>``) include other TypoScript files. One from the "Fluid Styled Content" extension (which is part of the TYPO3 core) and the other from the "Site Package" extension.


Fluid Template Section
~~~~~~~~~~~~~~~~~~~~~~

::

      10 = FLUIDTEMPLATE
      10 {
        templateName = TEXT
        templateName.stdWrap.cObject = CASE
        templateName.stdWrap.cObject {
          key.data = pagelayout

          pagets__test_default = TEXT
          pagets__test_default.value = Default

          default = TEXT
          default.value = Default
        }
        templateRootPaths {
          0 = EXT:site_package/Resources/Private/Templates/
          1 = {$page.fluidtemplate.templateRootPath}
        }
        partialRootPaths {
          0 = EXT:site_package/Resources/Private/Partials/
          1 = {$page.fluidtemplate.partialRootPath}
        }
        layoutRootPaths {
          0 = EXT:site_package/Resources/Private/Layouts/
          1 = {$page.fluidtemplate.layoutRootPath}
        }
        dataProcessing {
          10 = TYPO3\CMS\Frontend\DataProcessing\MenuProcessor
          10 {
            levels = 2
            includeSpacer = 1
            as = mainnavigation
          }
        }
      }


CSS and JavaScript File Inclusion
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

::

    includeCSS {
      website = EXT:site_package/Resources/Public/Css/website.css
    }

    includeJSFooter {
      jquery = ...
      jquery.external = 1
      bootstrap = ...
      bootstrap.external = 1
      website = EXT:site_package/Resources/Public/JavaScript/website.js
    }


Global Site Configuration
~~~~~~~~~~~~~~~~~~~~~~~~~

::

    config {
      absRefPrefix = auto
      no_cache = {$config.no_cache}
      uniqueLinkVars = 1
      pageTitleFirst = 1
      linkVars = L
      prefixLocalAnchors = {$config.prefixLocalAnchors}
      renderCharset = utf-8
      metaCharset = utf-8
      doctype = html5
      removeDefaultJS = {$config.removeDefaultJS}
      inlineStyle2TempFile = 1
      admPanel = {$config.admPanel}
      debug = 0
      cache_period = 86400
      sendCacheHeaders = {$config.sendCacheHeaders}
      intTarget =
      extTarget =
      disablePrefixComment = 1
      index_enable = 1
      index_externals = 1
      index_metatags = 1
      headerComment = {$config.headerComment}

      // Disable Image Upscaling
      noScaleUp = 1

      // Compression and Concatenation of CSS and JS Files
      compressJs = 0
      compressCss = 0
      concatenateJs = 0
      concatenateCss = 0
    }

*((TODO ... ))*
