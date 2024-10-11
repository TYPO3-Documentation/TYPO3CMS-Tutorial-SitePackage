.. include:: /Includes.rst.txt
.. highlight:: typoscript

.. _minimal-design:

====================
Minimal site package
====================

A site package is a custom TYPO3 extension which contains configuration,
templates, assets, etc that are used for the site it belongs to.

So first we create a minimal extension.

.. _minimal-extension:

Create a minimal TYPO3 extension using b13/make
===============================================

:composer:`b13/make` is a convenient TYPO3 extension which you can use during
development to create a new TYPO3 extension quickly or add functionality to an
existing one.

Use Composer to install it for development only:

..  code-block:: bash

    ddev composer req b13/make --dev

Execute the command `ddev typo3 make:extension` and answer the prompt

..  code-block:: bash

    ddev typo3 make:extension

     Enter the composer package name (e.g. "vendor/awesome"):
     > t3docs/site-package

     Enter the extension key [site_package]:
     >

     Enter the PSR-4 namespace [T3docs/SitePackage]:
     >

     Choose supported TYPO3 versions (comma separate for multiple) [TYPO3 v12 LTS]:
      [10] TYPO3 v10 LTS
      [11] TYPO3 v11 LTS
      [12] TYPO3 v12 LTS
      [13] TYPO3 v13
     > 12

     Enter a description of the extension:
     > My site package

     Where should the extension be created? [src/extensions/]:
     > packages

     May we add a basic service configuration for you? (yes/no) [yes]:
     > no

     May we create a ext_emconf.php for you? (yes/no) [no]:
     >

     [OK] Successfully created the extension my_site_package (myvendor/my-site-package).

This script creates a new folder called `packages` with a subfolder,
`my-site-package`. It mainly contains only a file called `composer.json`.

You could of course also create this file manually. Step
:ref:`extension-configuration-composer` will explain the content of the :file:`composer.json`.
For the time being just remember the Composer name you have chosen
(`t3docs/site-package`) and the extension name (`site_package`).

In order to see a change in the TYPO3 backend or frontend your site package needs
to be :ref:`installed <extension-installation>`.

After you have created your site package extension you can uninstall :composer:`b13/make`:

..  code-block:: bash

    ddev composer remove b13/make --dev

.. _minimal-extension-typoscript:

The TypoScript-only version
===========================

Create a file called :file:`setup.typoscript` containing basic TypoScript configuration
in the folder :path:`Configuration/Setup`:

..  literalinclude:: _minimal.typoscript
    :caption: packages/site-package/Configuration/TypoScript/Setup/setup.typoscript

Clear all caches and preview the web page.

You can learn more about the TypoScript syntax used here in chapter
:ref:`A minimal page created by pure TypoScript <t3start:typoscript>`
of the "Getting Started Tutorial".

.. _minimal-extension-fluid:

The TYPO3 Fluid version
=======================

Replace file :file:`setup.typoscript` of example
:file:`minimal-extension-typoscript` with the following lines:

..  literalinclude:: _pageview.typoscript
    :caption: ackages/site-package/Configuration/TypoScript/Setup/setup.typoscript
    :linenos:

If you preview your page now you would get an error output like:

..  code-block:: html

    Oops, an error occurred! Request: bddd8a816bda3

.. todo: Add information about dealing with errors such as these and link from here.

This is because the template has not been found.

By searching for the hash `bddd8a816bda3` in the log file you will find such an entry:

..  code-block:: plaintext
    :caption: var/log/typo3_ece44d5005.log
    :emphasize-lines: 7

    Mon, 07 Oct 2024 04:09:44 +0000 [ALERT] request="bddd8a816bda3"
    component="TYPO3.CMS.Frontend.ContentObject.Exception.ProductionExceptionHandler":
    Oops, an error occurred! Request: bddd8a816bda3- InvalidTemplateResourceException:
    Tried resolving a template file for controller action "Default->Pages/Default"
    in format ".html", but none of the paths contained the expected template file
    (Default/Pages/Default.html).
    The following paths were checked: /var/www/html/vendor/t3docs/site-package/Resources/Private/Templates/

This error message also tells you the path where TYPO3 expects to find the file. If no path
is listed here, the path defined in line 6 of the TypoScript above is incorrect,
for example if you mistyped the extension name or part of the path.

Create a file named :file:`Default.html` in folder
:path:`packages/site-package/Resources/Private/Pages`.

.. code-block:: html
   :caption: packages/site-package/Resources/Private/Pages/Default.html

   Hello Fluid World!

Clear all caches and preview the web page.

Learn more about using Fluid Templates in chapter :ref:`fluid-templates`.
