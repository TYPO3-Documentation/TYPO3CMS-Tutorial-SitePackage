.. include:: /Includes.rst.txt


.. _summary:

=======
Summary
=======

First and foremost: **congratulations!** You reached a point where you have
successfully implemented a custom site package for TYPO3. In fact, you have not
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

- Applied data processors to render the content via Fluid.

This all sounds very sophisticated and complicated, but keep in mind, the
extension (as it stands at this point in time) contains approximately six files
only, plus the HTML/CSS files. Only two files contain PHP code.


.. _next-steps:

Next Steps
==========

The site package extension, as it stands now, still has some shortfalls. Let us
have a closer look what you could or should do as the next steps to address
these.

.. rst-class:: bignums

#. Navigation menu features one level only

   The bigger the website becomes, the more likely is a multi-level page
   structure required. This means, editors will likely create sub-pages of the
   root page "Page 1" for example. At the moment, the menu does not support
   sub-pages.

   If this becomes a requirement, the TypoScript code used to generate the menu
   (see chapter :ref:`main-menu-creation`) and the Fluid template file that
   outputs the menu (:file:`Resources/Private/Layouts/Page/Default.html`) need
   to be updated.

#. Jumbotron has no background image

   The Jumbotron stands as a place holder for various options in our example.
   Some readers may like to implement a banner with rotating images, some prefer a
   text content element or a video player instead. All this and much more is
   possible with TYPO3, but beyond the scope of this tutorial.

#. There are no icons for pages in the menu

   It would be possible to define an additional field in the :sql:`pages`
   table to store an icon for each page and then output them in the menu for
   example.

#. There is not footer

   The page could receive a footer with content taken from a special page or
   column of the root page.


In general, the nature of a tutorial, such as this document, is to provide
detailed instructions to walk a beginner through a particular task. By building
your own site package extension from scratch, you have learned each step that
is required to turn a basic web design template into a fully working website in
TYPO3.

When you create site packages in the future, you probably do not want to create
every file over and over again, but use a pre-built version of the site package
extension. Therefore, it make sense to store and maintain the current state in
a central place, such as a Git repository. Despite the fact that for a learning
experience it is always beneficial to develop the extension yourself, you can
also download the extension built in this tutorial below.


.. _download-site-package-extension:

Download sitepackage Extension
-------------------------------

`GitHub <https://github.com/TYPO3-Documentation/TYPO3CMS-Tutorial-SitePackage-Code>`_


.. _site-package-builder:

site package Builder
--------------------

Another option to create a sitepackage extension quickly is an online tool
developed by Benjamin Kott: the `sitepackage builder
<http://sitepackagebuilder.com/>`__.

.. figure::  /Images/ExternalImages/SitePackageBuilder.png
   :alt: Sitepackage Builder
   :class: with-shadow


.. _youtube-videos:

Videos on YouTube
-----------------

TYPO3 has an `official YouTube channel <https://www.youtube.com/channel/UCwpl8LY9Tr3PB26Kk2FYW_w>`__.

A video that may be useful:

In this three-parts series, Mathias Schreiber and Benjamin Kott set up a TYPO3
site from scratch by building a sitepackage extension.

Tutorial - Sitepackages - Part 1 of 3
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

`YouTube: Part 1 of 3 <https://www.youtube.com/watch?v=HtBmim7pc0o>`__

.. youtube:: HtBmim7pc0o


Tutorial - Sitepackages - Part 2 of 3
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

`YouTube: Part 2 of 3 <https://www.youtube.com/watch?v=deSMVfCSCXY>`__

.. youtube:: deSMVfCSCXY


Tutorial - Sitepackages - Part 3 of 3
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

`YouTube: Part 3 of 3 <https://www.youtube.com/watch?v=SEoWOBT0rQE>`__

.. youtube:: SEoWOBT0rQE

Searches
========

Other than the docs.typo3.org references, you can find additional information by
searching the Web. For example, try a search phrase such as
[ :aspect:`typo3 fluid` ] on a popular video website. If you have a specific
problem, think of key words or concepts to use in a search phrase. While
writing this tutorial, Web searches led to these specific references.

Questions
=========

Lastly, after searching to find information already published, you may want
to ask the TYPO3 community.

You can get information about where to get help on https://typo3.org/help.

Specifically, choose one of these options:

#. Ask **programming related questions** on
   `Stack Overflow <https://stackoverflow.com/search?q=typo3>`__ using the tag "typo3"
#. Ask general TYPO3 questions in the Slack channel #typo3-cms in the
   `TYPO3 Slack workspace <https://typo3.slack.com>`__.
   `Get your Slack invitation <https://my.typo3.org/slack/invite>`__ first.
