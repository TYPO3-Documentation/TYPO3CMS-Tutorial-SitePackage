.. include:: /Includes.rst.txt
.. highlight:: typoscript

.. _minimal-design:

===============
Minimal example
===============

Here, we intend to create a site package that outputs a single web page with the
minimal effort. This site package can serve to test system output or as an
example of the fewest required steps to create a working site package.

For this example, in the CMS backend, create a standard page named
:guilabel:`Minimal example` just under (inside) the page tree TYPO3 logo
container. On this standard page, create a new TypoScript template record.
Give the new TypoScript template a title, and make it a root level template,
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
web page from the CMS. This TypoScript template is self contained,
there are no other files or database records needed. Changing this content
requires the appropriate access needed to make changes to TypoScript templates. 

The TYPO3 Fluid version
=======================

Empty the :guilabel:`Minimal design` page TypoScript template Setup field,
then add the following lines in the field:

.. code-block:: typoscript
   :caption: TypoScript Setup

   page = PAGE
   page.1 = FLUIDTEMPLATE
   page.1.file = EXT:site_package/Resources/Private/Templates/Minimal.html

Create a file named :file:`Minimal.html` in a
:file:`typo3conf/site_package/Resources/Private/Templates` folder.

The site package extension has to be :ref:installed <extension-installation>`
for this to work

.. code-block:: html
   :caption: EXT:site_package/Resources/Private/Templates/Minimal.html

   Hello, world.

Now view the web page.

This approach puts the page content into a HTML file, allowing for separate
access controls and it also allows for an editing workflow that does not need as much TypoScript.
The CMS renderer still requires a TypoScript template on the :guilabel:`Minimal design` page to know what file to process for the page content.

Resulting web page
==================

Here is the resulting web page HTML source for both the TypoScript-only and
the Fluid based implementations. Notice how the CMS added default markup
surrounding the single line of content:

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
