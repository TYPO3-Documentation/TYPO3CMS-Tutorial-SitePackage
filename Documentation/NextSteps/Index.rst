..  include:: /Includes.rst.txt

..  _next-steps:

==========
Next Steps
==========

..   contents::

..  _next-steps-enhance-sitepackage:

Enhance the site package
========================

The site package extension, as it stands now, still has some shortfalls. Let us
have a closer look what you could or should do as the next steps to address
these.

..  rst-class:: bignums

#.  Navigation menu features one level only

    The bigger the website becomes, the more likely is a multi-level page
    structure required. This means, editors will likely create sub-pages of the
    root page "Page 1" for example. At the moment, the menu does not support
    sub-pages.

    If this becomes a requirement, the TypoScript code used to generate the menu
    (see chapter :ref:`main-menu-creation`) and the Fluid template file that
    outputs the menu (:file:`Resources/Private/Layouts/Page/Default.html`) need
    to be updated.

    Learn more about the menu data processor :ref:`menu data processor <t3tsref:MenuProcessor>`

#.  Stage has no background image

    The Stage stands as a place holder for various options in our example.
    Some readers may like to implement a banner with rotating images, some prefer a
    text content element or a video player instead. All this and much more is
    possible with TYPO3, but beyond the scope of this tutorial.

#.  There are no icons for pages in the menu

    It would be possible to define an additional field in the :sql:`pages`
    table to store an icon for each page and then output them in the menu for
    example.

#.  There is not footer

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

..  _download-site-package-extension:

Download the example site package extension
===========================================

..  include:: /_Includes/_DownloadSitePackage.rst.txt


..  _next-steps-further-readings:

Further readings
================

..  _site-package-builder:

Site package builder
--------------------

Another option to create a sitepackage extension quickly is an online tool
developed by Benjamin Kott: the `sitepackage builder
<http://sitepackagebuilder.com/>`__.

..  _youtube-videos:

Videos on YouTube
-----------------

TYPO3 has an `official YouTube channel <https://www.youtube.com/channel/UCwpl8LY9Tr3PB26Kk2FYW_w>`__.

..  _next-steps-questions:

Where to ask questions
======================

Lastly, after searching to find information already published, you may want
to ask the TYPO3 community.

You can get information about where to get help on https://typo3.org/help.

Specifically, choose one of these options:

#.  The TYPO3 community has a forum at https://talk.typo3.org/ where you can
    `Ask TYPO3 related questions <https://talk.typo3.org/c/typo3-questions/19>`__.
#.  `Meet the TYPO3 Community <https://typo3.org/community/meet>`__ you
    can go to a `Local TYPO3 User Group <https://typo3.org/community/meet/user-groups>`__
    meet us online on Slack (`How to get your TYPO3 Slack account <https://typo3.org/community/meet/chat-slack>`__)
    and/or find us at numerous `events <https://typo3.org/community/events>`_.
