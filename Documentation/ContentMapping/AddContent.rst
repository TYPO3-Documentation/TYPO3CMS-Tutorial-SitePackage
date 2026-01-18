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

..  figure:: /Images/ContentMapping/AddNewContentElement.png
    :zoom: gallery
    :alt: Create new content element

    Create new content element

..  figure:: /Images/ContentMapping/ChooseRegularTextElement.png
    :zoom: gallery
    :alt: Choose "Regular Text Element"

    Choose "Regular Text Element"

Enter a headline and some arbitrary text in the Rich Text Editor (RTE).

..  figure:: /Images/ContentMapping/EditRegularTextElement1.png
    :zoom: gallery
    :alt: Enter a headline

    Enter a headline

..  figure:: /Images/ContentMapping/EditRegularTextElement2.png
    :zoom: gallery
    :alt: Enter some arbitrary text in the Rich Text Editor (RTE)

    Enter some arbitrary text in the Rich Text Editor (RTE)

Save your changes by clicking button :guilabel:`Save` at the top.
You can return to the previous view by clicking :guilabel:`Close`.

..  figure:: /Images/ContentMapping/SaveAndCloseRegularTextElement.png
    :zoom: gallery
    :alt: Save and close the new content element

    Save and close the new content element

:ref:`Preview the page <t3sitepackage:cm-preview-page>` by clicking button
:guilabel:`View webpage`.

..  figure:: /Images/ContentMapping/PreviewPageButton.png
    :zoom: gallery
    :alt: View webpage button

    View webpage button

Check that the content is displayed as expected.

..  figure:: /Images/ContentMapping/VerifyPageContent.png
    :zoom: gallery
    :alt: Verify if your new content is displayed on the page

    Verify if your new content is displayed on the page

Whenever you edit the content elements on
a page the cache of the current page is automatically deleted. If the content
fails to update you should still delete the TYPO3 caches and force your
browser to reload.

There are many tips and tricks around content editing. The topic is described
in more depth in chapter
:ref:`Content Elements of the Editors Tutorial <t3editors:content-elements>`.
