:navigation-title: FAQ
..  include:: /Includes.rst.txt

..  _site-package-benefits:
..  _faq:

==========================
Frequently asked questions
==========================

..  contents::

..  _introduction-quickly:

How to get started quickly
==========================

You can use the `Site Package Builder <https://get.typo3.org/sitepackage>`_ to
create a customized site package. If you want to follow this tutorial, choose
"Site Package Tutorial" as base package.

..  _introduction-files:

What files are included in a site package?
==========================================

A site package typically includes the following files:

*   Configuration files, such as site settings, TypoScript, and RTE
    (rich-text editor) configurations
*   Public assets: CSS, JavaScript, fonts, theme related images
*   Templates: Fluid templates that generate the HTML output
*   Code extending TYPO3 Core functionality or third-party extensions, such as
    :ref:`Event listeners <t3coreapi:EventDispatcherImplementation>` and
    :ref:`Middlewares (Request handling) <t3coreapi:request-handling>`

..  _introduction-when-not:

When not to put files in a site package
=======================================

If you are developing functionality that may need to be shared across multiple sites
or TYPO3 installations in the future, it is advisable to create a
:ref:`custom extension <t3start:create-own-extension>`
for that functionality instead.

..  _download-site-package-extension:
..  _introduction-download:

Where to download the example site package
==========================================

Use `Site Package Builder <https://get.typo3.org/sitepackage>`_ with
"Site Package Tutorial" as base package.
