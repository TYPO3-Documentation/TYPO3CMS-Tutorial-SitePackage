:navigation-title: Adding content
..  include:: /Includes.rst.txt

..  _cm-typo3-backend-add-content:

================================
Add content in the TYPO3 backend
================================

The pages generated in step
:ref:`Create initial pages <t3sitepackage:typo3-backend-create-initial-pages>`
already contain some example content.

You can add additonal content in the backend. Go to
:guilabel:`Web > Page` and select any of the pages you created before,
(for example "Page 2"). Click the :guilabel:`+ Create new content` button
in the column labelled "*Main*" and choose the "Regular Text
Element" content element.

..  include:: /ContentMapping/_images/AddNewContentElement.rst.txt

..  include:: /ContentMapping/_images/ChooseRegularTextElement.rst.txt

Enter a headline and some arbitrary text in the Rich Text Editor (RTE).

..  include:: /ContentMapping/_images/EditRegularTextElement1.rst.txt

..  include:: /ContentMapping/_images/EditRegularTextElement2.rst.txt

Save your changes by clicking button :guilabel:`Save` at the top.
You can return to the previous view by clicking :guilabel:`Close`.

..  include:: /ContentMapping/_images/SaveAndCloseRegularTextElement.rst.txt

:ref:`Preview the page <t3sitepackage:cm-preview-page>` by clicking button
:guilabel:`View webpage`.

..  include:: /ContentMapping/_images/PreviewPageButton.rst.txt

Check that the content is displayed as expected.

..  include:: /ContentMapping/_images/VerifyPageContent.rst.txt

Whenever you edit the content elements on
a page the cache of the current page is automatically deleted. If the content
fails to update you should still delete the TYPO3 caches and force your
browser to reload.

There are many tips and tricks around content editing. The topic is described
in more depth in chapter
:ref:`Content Elements of the Editors Tutorial <t3editors:content-elements>`.
