.. include:: ../Includes.txt


.. _summary:

=======
Summary
=======

First and foremost: **congratulations!** You reached a point where you have
successfully implemented a custom sitepackage for TYPO3. In fact, you have not
only developed a "theme" for your website, you also built a fully working
extension for TYPO3, which can be installed, uninstalled, copied to another
TYPO3 instance and put under version control. You could also share your Site
Package with others by uploading your extension to the `TYPO3 Extension
Repository <https://extensions.typo3.org>`__.

The list below shows a quick summary what you have achieved by working through
this tutorial.

- Split a "static" HTML/CSS/JavaScript template into Fluid templates (Layout,
  Templates and Partial).

- Applied "Fluid Styled Content" TypoScript (files :file:`constants.typoscript` and
  :file:`setup.typoscript`).

- Included the `Bootstrap framework <https://getbootstrap.com>`__ and `jQuery
  <https://jquery.com>`__ library as external resources.

- Built a fully functional TYPO3 extension and installed this extension via the
  Extension Manager.

- Created some initial Pages, the TypoScript templates and learned how to
  preview a page in the backend.

- Developed a navigation menu using TypoScript and Fluid.

- Applied TypoScript to render the content (file
  :file:`DynamicContent.typoscript`).

This all sounds very sophisticated and complicated, but keep in mind, the
extension (as it stands at this point in time) contains approximately six files
only, plus the HTML/CSS files. Only two files contain PHP code.


.. _next-steps:

Next Steps
==========

The sitepackage extension, as it stands now, still has some shortfalls. Let's
have a closer look what you could or should do as the next steps to address
these.

.. rst-class:: bignums

1. One page layout only

   At the moment, the sitepackage supports **one page layout** only (the
   Jumbotron area and three columns below), which is a typical layout for a
   standard homepage. However, this layout is the only layout and used across
   all pages. By extending the TypoScript template and creating variations of
   the :file:`Default.html` Fluid template file, you could create a number of
   different templates. For example, one for the homepage and a different one
   for normal content pages.

   By using `Backend Layouts
   <https://www.google.com/search?q=TYPO3+Backend+Layouts>`__, you can implement
   a layout structure in the backend of TYPO3, that reflects the layout used
   in the frontend. This makes it very easy for editors to understand where the
   content will appear on the website.

2. Navigation menu features one level only

   The bigger the website becomes, the more likely is a multi-level page
   structure required. This means, editors will likely create sub-pages of the
   root page "Page 1" for example. At the moment, the menu does not support
   sub-pages.

   If this becomes a requirement, the TypoScript code used to generate the menu
   (see chapter :ref:`main-menu-creation`) and the Fluid template file that
   outputs the menu (:file:`Resources/Private/Layouts/Page/Default.html`) need
   to be updated.

3. Unused, but visible column "border"

   Backend users (e.g. editors) might be confused about the "*border*" column
   when working in the backend and entering/maintaining content. Only three of
   the four page columns shown in the backend are used and the far right column
   has no mapping. This results in the fact that even if editors add content
   elements to the "*border*" column, the content never appears anywhere.

   To simply *disable* the column, enter the following line in the "Page
   TSConfig" box of page "example.com" (**Page Properties → Resources**):

   :ts:`TCEFORM.tt_content.colPos.removeItems = 3`

   However, the aforementioned `Backend Layouts
   <https://www.google.com/search?q=TYPO3+Backend+Layouts>`__ give you much more
   control about columns, labels, positions, etc. and are the recommended way
   to implement layouts in the backend.

4. Jumbotron not editable

   The content of the Jumbotron area is currently not editable by editors or
   any other backend users of the system. We kept the Jumbotron area simple and
   hard-coded as a Partial in file
   :file:`Resources/Private/Partials/Page/Jumbotron.html` intentionally. The
   Jumbotron stands as a place holder for various options in our example. Some
   readers may like to implement a banner with rotating images, some prefer a
   text content element or a video player instead. All this and much more is
   possible with TYPO3, but beyond the scope of this tutorial.


In general, the nature of a tutorial, such as this document, is to provide
detailed instructions to walk a beginner through a particular task. By building
your own sitepackage extension from scratch, you have learned each step that
is required to turn a basic web design template into a fully working website in
TYPO3.

When you create sitepackages in the future, you probably do not want to create
every file over and over again, but use a pre-built version of the sitepackage
extension. Therefore, it make sense to store and maintain the current state in
a central place, such as a Git repository. Despite the fact that for a learning
experience it is always beneficial to develop the extension yourself, you can
also download the extension built in this tutorial below.


.. _download-site-package-extension:

Download sitepackage Extension
-------------------------------

`GitHub <https://github.com/TYPO3-Documentation/TYPO3CMS-Tutorial-SitePackage-Code>`_


.. _site-package-builder:

sitepackage Builder
--------------------

Another option to create a sitepackage extension quickly is an online tool
developed by Benjamin Kott: the `sitepackage builder
<http://sitepackagebuilder.com/>`__.

.. figure:: SitePackageBuilder.png
   :alt: Sitepackage Builder
   :class: with-shadow


.. _youtube-videos:

Videos on YouTube
-----------------

In this three-parts series, Mathias Schreiber and Benjamin Kott set up a TYPO3
site from scratch by building a sitepackage extension.

Tutorial - Sitepackages - Part 1 of 3
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

`YouTube: Part 1 of 3 <https://www.youtube.com/watch?v=HtBmim7pc0o>`__

.. only:: html, singlehtml

   .. youtube:: HtBmim7pc0o


Tutorial - Sitepackages - Part 2 of 3
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

`YouTube: Part 2 of 3 <https://www.youtube.com/watch?v=deSMVfCSCXY>`__

.. only:: html, singlehtml

   .. youtube:: deSMVfCSCXY


Tutorial - Sitepackages - Part 3 of 3
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

`YouTube: Part 3 of 3 <https://www.youtube.com/watch?v=SEoWOBT0rQE>`__

.. only:: html, singlehtml

   .. youtube:: SEoWOBT0rQE
