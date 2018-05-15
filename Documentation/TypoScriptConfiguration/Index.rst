.. include:: ../Includes.txt
.. highlight:: typoscript


.. _typoscript-configuration:

========================
TypoScript Configuration
========================

TYPO3 uses "TypoScript" as a specific *language* to configure a website.
TypoScript is a very powerful tool in the TYPO3 universe, because it allows
integrators to configure and manipulate almost every aspect of the system and
customize a TYPO3 instance to very specific needs of their customers. It is
important to highlight, that TypoScript is not a programming language, so you
do not need to be a software developer to fine tune TYPO3. However, due to the
complexity of TYPO3 and its configuration options, quite comprehensive
documentation about TypoScript exists, which can be overwhelming sometimes.

As part of this tutorial, we focus on the basics only and how to apply them. A
comprehensive documentation about TypoScript and all its objects, properties
and functions can be found in the :ref:`TypoScript Reference <t3tsref:start>`.


.. _files-and-directories:

Files and Directories
=====================

First of all, we create two new files in the site package directory structure,
which will contain all TypoScript configurations. By following the official
conventions of their file and directory naming, TYPO3 knows how to include them
automatically.

.. code-block:: none

   site_package/
   site_package/Configuration/
   site_package/Configuration/TypoScript/
   site_package/Configuration/TypoScript/constants.typoscript
   site_package/Configuration/TypoScript/setup.typoscript
   site_package/Resources/
   site_package/Resources/...

As shown above, these two files are :file:`constants.typoscript` and
:file:`setup.typoscript` inside the :file:`Configuration/TypoScript/` folder.
The Fluid template files we have created in the previous step are located in
the :file:`Resources/` directory, but not listed above for clarity reasons.


.. _file-constants-typoscript:

TypoScript Constants
--------------------

Add the following lines to file :file:`constants.typoscript`::

   <INCLUDE_TYPOSCRIPT: source="FILE:EXT:fluid_styled_content/Configuration/TypoScript/constants.txt">

   page {
      fluidtemplate {
         layoutRootPath = EXT:site_package/Resources/Private/Layouts/Page/
         partialRootPath = EXT:site_package/Resources/Private/Partials/Page/
         templateRootPath = EXT:site_package/Resources/Private/Templates/Page/
      }
   }

.. @TODO: describe main purpose of the file.


.. _file-setup-typoscript:

TypoScript Setup
----------------

File :file:`setup.typoscript` is a little it more complex, so we explain it
section by section. First, add the following lines to that file::

   <INCLUDE_TYPOSCRIPT: source="FILE:EXT:fluid_styled_content/Configuration/TypoScript/setup.txt">

   page = PAGE
   page {
      typeNum = 0

      // Part 1: Fluid template section
      10 = FLUIDTEMPLATE
      10 {
         // ...
      }

      // Part 2: CSS file inclusion
      includeCSS {
         // ...
      }

      // Part 3: JavaScript file inclusion
      includeJSFooter {
         // ...
      }
   }

   // Part 4: global site configuration
   config {
      // ...
   }

The first line (:ts:`<INCLUDE_TYPOSCRIPT ...>`) includes the default constants
from the "Fluid Styled Content" extension (which is part of the TYPO3 core).
The :ts:`page` section defines the so-called PAGE object and the :ts:`config`
section the global site configuration. We will replace the four "Parts" (which
are shown as comments in the example above) in the following steps.


Part 1: Fluid Template Section
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

First, extend :ts:`// Part 1: Fluid template section` by the following lines::

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

We do not want to go into too much detail, but what this configuration
basically does is, it uses Fluid (the template rendering engine) to generate
the page layout and some output. Template files are stored in the
aforementioned folders :file:`Templates/Page/`, :file:`Partials/Page/` and
:file:`Layouts/Page/` (if not overwritten by constants).


Part 2 and 3: CSS and JavaScript File Inclusion
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

We have combined part 2 and 3, because the inclusion of CSS and JavaScript
files in TypoScript is pretty straight forward. Extend :ts:`// Part 2: add CSS
file inclusion` and :ts:`// Part 3: JavaScript file inclusion` by the following
lines::

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

Section :ts:`includeCSS { ... }` instructs TYPO3 to include the CSS from the
Bootstrap library from an external source. It also includes file
:file:`website.css` from the site package extension. We have copied this file
into the appropriate folder before.

Section :ts:`includeJSFooter { ... }` includes four JavaScript files in total.
The first three are externally hosted files (jQuery, Popper and Bootstrap).
Therefore, :ts:`.external = 1` forces TYPO3, not to check for their local
existence. The fourth JavaScript file is the file we added before to the site
package extension itself.


Part 4: Global Site Configuration
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Finally, extend :ts:`// Part 4: global site configuration` by adding the following
lines. There is no need to understand what these lines exactly do. Feel free
to simply copy them from this tutorial. Explaining each line of the code would
go beyond the scope of this tutorial. A detailed documentation of all
configuration options can be found in the :ref:`TypoScript Reference
<t3tsref:config>`. ::

   // Part 4: global site configuration
   config {
      absRefPrefix = auto
      cache_period = 86400
      debug = 0
      disablePrefixComment = 1
      doctype = html5
      extTarget =
      index_enable = 1
      index_externals = 1
      index_metatags = 1
      inlineStyle2TempFile = 1
      intTarget =
      linkVars = L
      metaCharset = utf-8
      no_cache = 0
      pageTitleFirst = 1
      prefixLocalAnchors = all
      removeDefaultJS = 0
      renderCharset = utf-8
      sendCacheHeaders = 1
      uniqueLinkVars = 1

      // Disable image upscaling
      noScaleUp = 1

      // Compression and concatenation of CSS and JS Files
      compressCss = 0
      compressJs = 0
      concatenateCss = 0
      concatenateJs = 0
   }

This is all required for the "TypoScript Configuration" part at this point. The
next step deals with the extension configuration and adds a couple of PHP
files, so let's move on.
