.. include:: /Includes.rst.txt
.. highlight:: typoscript

.. _minimal-design:

===============
Minimal example
===============

We want to create a site package that outputs a single web page with
minimal effort. This site package can be used to simply test system output or as
an example of the fewest possible steps to create a working site package.

To start, in the TYPO3 backend, create a standard page named
:guilabel:`Minimal example` just under (inside) the page tree TYPO3 logo
container. Create a new TypoScript template record on this page.
Give the TypoScript template a title, and make it a root level template,
but do not include any static templates.

The TypoScript-only version
===========================

In the TypoScript template Setup field, add the following three lines:

.. code-block:: typoscript
   :caption: TypoScript Setup

   page = PAGE
   page.1 = TEXT
   page.1.value = Hello, world.

View the web page.

This TypoScript-only design has the least instructions required to output a
web page from TYPO3. This TypoScript template is self contained and
no other files or database records needed. Changing this content
only requires the appropriate access needed to make changes to TypoScript
templates.

The TYPO3 Fluid version
=======================

Empty the :guilabel:`Minimal design` page TypoScript template Setup field,
then add the following lines:

.. code-block:: typoscript
   :caption: TypoScript Setup

   page = PAGE
   page.1 = FLUIDTEMPLATE
   page.1.file = fileadmin/Minimal.html

Create a file named :file:`Minimal.html` in the
:file:`fileadmin` folder.

.. code-block:: html
   :caption: fileadmin/Minimal.html

   Hello, world.

Now view the web page.

Here we are putting the page content into a separate HTML file, allowing for
separate access control and for an editing workflow that does not need much
TypoScript. The TYPO3 renderer still requires a TypoScript template on the
:guilabel:`Minimal design` page to know which file to process.

.. caution::
   Putting your template files into the `fileadmin` folder is not recommended.
   It is recommended to use a sitepackage instead. This enables you to set an
   extension path like `EXT:site_package/Resources/Private/Templates/Minimal.html`
   in your TypoScript, but needs the extension to be
   :ref:`installed <extension-installation>` and requires a
   :ref:`minimal composer configuration <extension-configuration>` (if composer
   is used) first, which we will look at in the next chapters.

Resulting web page
==================

Here is the resulting web page HTML source for both the TypoScript-only and
the Fluid based implementations. Notice how TYPO3 has added default markup
around the single line of content:

.. code-block:: html
   :caption: Example frontend output

   <!DOCTYPE html>
   <html lang="en">
      <head>
         <meta charset="utf-8">
         <!--
            This website is powered by TYPO3 - inspiring people to share!
            TYPO3 is a free open source Content Management Framework initially
            created by Kasper Skaarhoj and licensed under GNU/GPL.
            TYPO3 is copyright 1998-2018 of Kasper Skaarhoj. Extensions are
            copyright of their respective owners.
            Information and contribution at https://typo3.org/
         -->
         <title>Minimal design</title>
         <meta name="generator" content="TYPO3 CMS">
      </head>
      <body>
         Hello, world.
      </body>
   </html>
