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

TypoScript Constants
""""""""""""""""""""

Add the following lines to file ``constants.typoscript``.

::

    <INCLUDE_TYPOSCRIPT: source="FILE:EXT:fluid_styled_content/Configuration/TypoScript/constants.txt">

    page {
      fluidtemplate {
        layoutRootPath = EXT:site_package/Resources/Private/Layouts/Page/
        partialRootPath = EXT:site_package/Resources/Private/Partials/Page/
        templateRootPath = EXT:site_package/Resources/Private/Templates/Page/
      }
    }

.. @TODO: describe main purpose of the file.


.. file-setup-typoscript:

TypoScript Setup
""""""""""""""""

.. @TODO: describe main purpose of the file.

File ``setup.typoscript`` is a little it more complex, so we explain it section by section. First, add the following lines to that file.

::

    <INCLUDE_TYPOSCRIPT: source="FILE:EXT:fluid_styled_content/Configuration/TypoScript/setup.txt">

    page = PAGE
    page {
      typeNum = 0

      // Part 1: Fluid template section
      10 = FLUIDTEMPLATE
      10 {
        ...
      }

      // Part 2: CSS file inclusion
      includeCSS {
        ...
      }

      // Part 3: JavaScript file inclusion
      includeJSFooter {
        ...
      }
    }

    // Part 4: global site configuration
    config {
      ...
    }


The first line (``<INCLUDE_TYPOSCRIPT ...>``) includes the default constants from the "Fluid Styled Content" extension (which is part of the TYPO3 core). The ``page`` section defines the so-called PAGE object and the ``config`` section the global site configuration. We will replace the four "Parts" (which are shown as comments in the example above) in the following steps.


Part 1: Fluid Template Section
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

First, extend ``// Part 1: Fluid template section`` by the following lines.

::

    // Part 1: Fluid template section
    10 = FLUIDTEMPLATE
    10 {
      templateName = TEXT
      templateName.stdWrap.cObject = CASE
      templateName.stdWrap.cObject {
        key.data = pagelayout

        pagets__site_package_default = TEXT
        pagets__site_package_default.value = Default

        default = TEXT
        default.value = Default
      }
      templateRootPaths {
        0 = EXT:site_package/Resources/Private/Templates/Page/
        1 = {$page.fluidtemplate.templateRootPath}
      }
      partialRootPaths {
        0 = EXT:site_package/Resources/Private/Partials/Page/
        1 = {$page.fluidtemplate.partialRootPath}
      }
      layoutRootPaths {
        0 = EXT:site_package/Resources/Private/Layouts/Page/
        1 = {$page.fluidtemplate.layoutRootPath}
      }
    }

We do not want to go into too much detail, but what this configuration basically does is, it uses Fluid (the template rendering engine) to generate the page layout and some output. Template files are stored in the aforementioned folders ``Templates/Page/``, ``Partials/Page/`` and ``Layouts/Page/`` (if not overwritten by constants). The TypoScript configuration also defines a special data processing logic that will generate the menu (as variable ``mainnavigation``).


Part 2 and 3: CSS and JavaScript File Inclusion
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

We have combined part 2 and 3, because the inclusion of CSS and JavaScript files in TypoScript is pretty straight forward. Extend ``Part 2: add CSS file inclusion`` and ``// Part 3: JavaScript file inclusion`` by the following lines.

::

    // Part 2: CSS file inclusion
    includeCSS {
      bootstrap = https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css
      bootstrap.external = 1
      website = EXT:site_package/Resources/Public/Css/website.css
    }

    // Part 3: JavaScript file inclusion
    includeJSFooter {
      jquery = https://code.jquery.com/jquery-3.2.1.slim.min.js
      jquery.external = 1
      popper = https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js
      popper.external = 1
      bootstrap = https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js
      bootstrap.external = 1
      website = EXT:site_package/Resources/Public/JavaScript/website.js
    }

.. https://code.jquery.com/jquery-3.2.1.slim.min.js
.. integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
..
.. https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js
.. integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
..
.. https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js
.. integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"

Section ``includeCSS { ... }`` simply instructs TYPO3 to include file ``website.css`` from the site package extension. We copied this file into the appropriate folder before.

Section ``includeJSFooter { ... }`` includes four JavaScript files in total. The first three are externally hosted files (jQuery, Popper and Bootstrap). Therefore, ``.external = 1`` forces TYPO3, not to check for their local existence. The fourth JavaScript file is the file we added before to the site package extension itself.


Part 4: Global Site Configuration
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Finally, extend ``// Part 4: global site configuration`` by adding the following lines.

::

    // Part 4: global site configuration
    config {
      absRefPrefix = auto
      no_cache = 0
      uniqueLinkVars = 1
      pageTitleFirst = 1
      linkVars = L
      prefixLocalAnchors = all
      renderCharset = utf-8
      metaCharset = utf-8
      doctype = html5
      removeDefaultJS = 0
      inlineStyle2TempFile = 1
      debug = 0
      cache_period = 86400
      sendCacheHeaders = 1
      intTarget =
      extTarget =
      disablePrefixComment = 1
      index_enable = 1
      index_externals = 1
      index_metatags = 1

      // Disable image upscaling
      noScaleUp = 1

      // Compression and concatenation of CSS and JS Files
      compressJs = 0
      compressCss = 0
      concatenateJs = 0
      concatenateCss = 0
    }

Explaining each line of the code above would go beyond the scope of this tutorial. A detailed documentation of all configuration options can be found in the :ref:`TypoScript Reference <t3tsref:config>`.
