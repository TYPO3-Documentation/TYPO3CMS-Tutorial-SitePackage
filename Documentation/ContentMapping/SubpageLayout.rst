:navigation-title: Subpage layout
..  include:: /Includes.rst.txt

..  _subpage-layout:

=========================
Additional subpage layout
=========================

Edit the file :file:`TwoColumns.html` in the same directory. Exchange the
main content area just as we have done before with the default template. Now
replace the content area of the sidebar with the content elements in the Fluid
variable :html:`{sidebarContent}`.

You can compare your result to the example in our site extension:
`TwoColumns.html <https://github.com/TYPO3-Documentation/TYPO3CMS-Tutorial-SitePackage-Code/blob/main/Resources/Private/Templates/Page/TwoColumns.html>`_.


.. _cm-switch_backend_layout:

Switch to the two column layout with a sidebar
==============================================

You can switch the used page backend layout in the page properties at
:guilabel:` Appearance >  Page Layout > Backend Layout`. Edit the page
properties of your page to use the backend layout "Two Columns".

..  include:: /Images/AutomaticScreenshots/SwitchBackendLayout.rst.txt

After saving you will see that the content of the columns "main" and
"jumbotron" remains unchanged while there is a third column "sidebar".
This is due to the fact that the backend layout "Default" and "TwoColumns"
use the same colPos number for these columns.

..  include:: /Images/AutomaticScreenshots/BackendLayoutTwoColumns.rst.txt

Enter some content to the sidebar. You could for example use the content element
"Menu of subpages" to display a menu in the sidebar.

Preview the page once more. A sidebar will appear in the frontend:

..  include:: /Images/AutomaticScreenshots/TwoColumnsPreviewPage.rst.txt
