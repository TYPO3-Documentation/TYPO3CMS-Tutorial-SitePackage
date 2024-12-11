.. include:: /Includes.rst.txt

.. _file-setup-typoscript:
.. _typoscript-configuration:

==================
TypoScript imports
==================

In step :ref:`Minimal site package - The TYPO3 Fluid
version <t3sitepackage:minimal-extension-fluid>` we placed all TypoScript into
the site set, file
:file:`packages/site-package/Configuration/Sets/SitePackage/setup.typoscript`.

In the following chapters we will need additional TypoScript setup
configurations.

Theoretically you could put all TypoScript into one big file and it would work
fine. But you have better overview if you split it up in multiple files ordered
by purpose.

Familiarize yourself with the TypoScript `@import` syntax first:
:ref:`TYPO3 Explained, @import syntax <t3tsref:typoscript-syntax-includes>`.

..  contents::

.. _typoscript-import:

Import the TypoScript from a different location
===============================================

Create a new folder called :path:`Configuration/Sets/SitePackage/TypoScript`. In this
create a file called :file:`page.typoscript` and copy the content from
file :file:`Configuration/Sets/SitePackage/setup.typoscript`
into it.

Then change the latter file to contain the following:

..  code-block:: typoscript
    :caption: Configuration/Sets/SitePackage/setup.typoscript

    @import './TypoScript/page.typoscript'

Flush the caches and preview the page. The output should be unchanged.

.. _typoscript-import-wildcard:

Import all TypoScript files from a folder using a wildcard
==========================================================

We will create more TypoScript files in the next steps. We could import them
file by file. But as the order will not matter we can import all of them via
wildcard:

..  literalinclude:: /CodeSnippets/my_site_package/Configuration/Sets/SitePackage/setup.typoscript
    :caption: packages/my_site_package/Configuration/Sets/SitePackage/setup.typoscript
    :linenos:

Only files from the folder directly will be imported. If you create subfolders
later on you have to import them separately.

.. _typoscript-import-configuration:

Structure of the `Configuration` directory
==========================================

Your :path:`Configuration` directory should now have the following structure:

..  directory-tree::
    :level: 4
    :show-file-icons: true

    *   packages/my_site_package/Configuration

        *   Sets

            *   SitePackage

                *   TypoScript

                     *   page.typoscript

                *   config.yaml
                *   setup.typoscript

In the next steps you will create more TypoScript files to configure the
:ref:`Content mapping <t3sitepackage:content-mapping>` and the
:ref:`menus <t3sitepackage:main-menu-creation>`.
