:navigation-title: Adding content
..  include:: /Includes.rst.txt

..  _cm-typo3-backend-add-content:

================================
Add content in the TYPO3 backend
================================

Now it's a great time to add some content in the backend. Go to
:guilabel:`Web > Page` and select any of the pages you created before,
(for example "Page 1"). Click the :guilabel:`+ Content` button
in the column labelled "*Main*" and choose the "Regular Text
Element" content element.

..  include:: /Images/AutomaticScreenshots/CreateNewContentElement.rst.txt

Enter a headline and some arbitrary text in the Rich Text Editor (RTE)
and save your changes by clicking button :guilabel:`Save` at the top.
You can return to the previous view by clicking :guilabel:`Close`.

..  include:: /Images/AutomaticScreenshots/FillNewContentElement.rst.txt

The new content element appears in the appropriate column. Repeat this process
and enter some further content in the column "Jumbotron". The page module should
now look like this:

..  include:: /Images/AutomaticScreenshots/ContentMappingPreviewPage.rst.txt

..  contents::

..  _cm-preview-page:

Preview page
============

We have made changes to the Fluid templates of the extension above. It is
therefore necessary to :guilabel:`Flush frontend caches` in the Menu in the
top bar before you can preview the page properly:

..  include:: /Images/AutomaticScreenshots/FlushFrontendCaches.rst.txt

You can now preview your page:

..  include:: /Images/AutomaticScreenshots/ContentMappingPreviewPage.rst.txt
