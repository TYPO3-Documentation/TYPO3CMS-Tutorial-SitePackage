..  include:: /Includes.rst.txt
..  highlight:: typoscript

..  _minimal-design:
..  _site-package-builder:

=======================
Generate a site package
=======================

A site package is a TYPO3 extension that you can customize to contain the configuration,
templates, assets, etc, for your site. It therefore acts as a kind of main "theme" for
your site.

So we start by generating a basic extension.

..  contents::

.. _minimal-extension:
.. _minimal-site-package-builder:

Generate and download a site package
====================================

You can download a site package using the official Site Package Builder at
https://get.typo3.org/sitepackage or by using curl.

You can choose between three site packages types:

*   Bootstrap Package: This site package comes with a ready-to-use theme
*   Fluid Styled Content: A minimal site package where you can build your own
    custom theme.
*   Site Package Tutorial: Contains all the files that are used as examples in
    this tutorial.

To follow this tutorial, choose the "Site Package Tutorial".

Download and unzip the file into the
`packages/my_site_package` folder and :ref:`install it <extension-installation>`.

.. _extension-installation:

Extension installation
======================

This tutorial assumes that your TYPO3 instance is a brand new installation
without any themes, templates, pages or content.

We assume that you are working on your local machine using DDEV and that you have
followed these steps:

:ref:`Installing TYPO3 with DDEV <t3start:installation-ddev-tutorial>`

.. _extension-installation-site-package:

Install the site package you just created
-----------------------------------------

If you have used the Site Package Builder, the :file:`packages/my_site_package/README.md` file
contains instructions on how to install your site package.

Move / unzip your :path:`my_site_package/` extension folder into the :path:`packages/`
folder. Then *require* the extension via Composer using the
package name defined in the site package extension's :file:`composer.json` (now located
at :file:`packages/my_site_package/`)

.. code-block:: json
   :caption: packages/my-site-package/composer.json

   {
      "name": "my-vendor/my-site-package"
   }

*require* it with:

..  code-block:: bash
   :caption: Execute in directory page_root

    ddev composer require my-vendor/my-site-package:@dev

..  _extension-installation-project-structure:

Project file structure
----------------------

Your project should now have the following structure:

..  directory-tree::
    :level: 1
    :show-file-icons: true

    *   .ddev

        *   :ref:`[Some configuration] <t3start:installation-ddev-tutorial>`

    *   config

        *   sites

            *   main

                *   config.yaml

    *   packages

        *   my_site_package

            *   [All sitepackage files]

            *   composer.json

    *   public

        *   fileadmin

            *   [Images for content, PDFs, ...]

        *   [public files needed by TYPO3]

    *   var

        *   log
        *   [private files needed by TYPO3]

    *   vendor

        *   [All installed packages, including TYPO3 source]

    *   composer.json
    *   composer.lock

.. _minimal-extension-siteset:

A look at the basic site set
============================

..  versionadded:: 13.1
    :ref:`Site sets <t3coreapi:site-sets>` have been introduced.

The site package built by Site Package Builder comes with a ready-to-use
site set in folder :path:`packages/my_site_package/Configuration/Sets/SitePackage/`.

The set itself is defined in the :file:`config.yaml` file inside this folder:

..  literalinclude:: /CodeSnippets/my_site_package/Configuration/Sets/SitePackage/config.yaml
    :caption: packages/my-site-package/Configuration/Sets/SitePackage/config.yaml
    :emphasize-lines: 1-2

You will learn more about site sets in chapter
:ref:`site_set`.

The TYPO3 Explained complete reference is here:
:ref:`Site sets <t3coreapi:site-sets>`.

During installation of your site package a page tree with example content was
created. The site configuration folder is :path:`config/sites/main`.

If you look at the site configuration in module :guilabel:`Sites > Setup`
it should already contain the "My Site package" set. Other sets can be added here,
for example :composer:`typo3/cms-form`.

..  figure:: AddSiteSet.png
    :alt: Screenshot demonstrating adding the "My Site package" to the site main

    Use module :guilabel:`Sites > Setup` to add the "Example: My Site package"

If you haven't made any changes, the site configuration should look like this:

..  literalinclude:: /CodeSnippets/my_site_package/Initialisation/Site/main/config.yaml
    :caption: config/sites/main/config.yaml

.. _minimal-extension-typoscript:
.. _make-typoscript-available:

The site set as TypoScript Provider
===================================

..  versionadded:: 13.1
    A site set can be used as :ref:`TypoScript provider <t3coreapi:site-sets-typoscript>`.

TYPO3 uses TypoScript as a configuration language. TypoScript is used to
configure templates created with the Fluid templating language.

A file called :path:`packages/my_site_package/Configuration/Sets/SitePackage/setup.typoscript`
provides the TypoScript for your site. This file contains imports of files from
folder :path:`packages/my_site_package/Configuration/Sets/SitePackage/TypoScript`
(which contain the actual configuration).

Learn more about the TypoScript syntax used here in chapter
:ref:`A minimal page created by pure TypoScript <t3start:typoscript>`
in the "Getting Started Tutorial".

.. _minimal-extension-fluid:

The TYPO3 Fluid version
=======================

File :path:`packages/my_site_package/Configuration/Sets/SitePackage/TypoScript/page.typoscript`
below defines the rendering of the site with Fluid templates:

..  literalinclude:: /CodeSnippets/my_site_package/Configuration/Sets/SitePackage/TypoScript/page.typoscript
    :caption: packages/my_site_package/Configuration/Sets/SitePackage/TypoScript/page.typoscript
    :emphasize-lines: 6
    :linenos:

Line 6 sets the directory the Fluid Templates are loaded from. Line 7 sets a value
from the site package settings.

Learn more about using Fluid Templates in chapter :ref:`fluid-templates`.

..  _cm-preview-page:

Preview page
============

Whenever you make changes to Fluid templates or TypoScript files,
you need to :guilabel:`Flush frontend caches` in the menu in the
top bar before previewing the page:

..  figure:: /Images/AutomaticScreenshots/FlushFrontendCaches.png
    :class: with-shadow

    Flush the frontend cache after changing template files

You can then preview your page by clicking on the :guilabel:`View webpage` button
in the page module.

.. _extension-configuration-composer:

Composer configuration :file:`composer.json`
============================================

In :ref:`Create a minimal TYPO3 extension <t3sitepackage:minimal-extension>`
a file called :file:`composer.json` was created for you:

..  literalinclude:: /CodeSnippets/my_site_package/composer.json
    :caption: packages/my_site_package/composer.json
    :linenos:

At the top of the :file:`composer.json` file we see the Composer package name
`my-vendor/my-site-package` (with a dash) and at the bottom we see the TYPO3
extension key in the extra section - :file:`my_site_package` (with an underscore).
The Composer "name" consists of a vendor name followed by a forward slash and the
lowercase extension name with dashes.

When you reference files in your extension use your extension key, for
example when setting your favicon in TypoScript:

..  code-block:: typoscript
    :caption: package/my-site-package/Configuration/Sets/SitePackage/setup.typoscript

    page {
        shortcutIcon = EXT:my_site_package/Resources/Public/Icons/favicon.ico
    }
