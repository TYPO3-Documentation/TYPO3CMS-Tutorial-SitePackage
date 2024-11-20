:navigation-title: Subpage layout
..  include:: /Includes.rst.txt

..  _subpage-layout:

=========================
Additional subpage layout
=========================

Edit the file
:file:`packages/my-site-package/Resources/Private/Templates/Pages/Subpage.html`.

Exchange the main content area just as we have done before with the default
template. Now
replace the content area of the sidebar with the content elements in the Fluid
variable :html:`{sidebarContent}`.

..  literalinclude:: _codesnippets/_SubpageWithSection.diff
    :caption: Resources/Private/Templates/Pages/Subpage.html (diff)

..  contents::

..  _cm-create-subpage-backend-layout:

Create a subpage page layout with page TSconfig
===============================================

We now create a subpage layout with two columns and row for the jumbotron in a
new file :file:`packages/my-site-package/Configuration/TsConfig/Page/PageLayout/Subpage.tsconfig`
containing :ref:`page TSconfig <t3tsref:setting-page-tsconfig>`. :

..  include:: /CodeSnippets/PageLayout/Subpage.rst.txt

.. _cm-switch_backend_layout:

Switch to the two column layout with a sidebar for subpages
==========================================================

You can now use the `Two Column` backend layout for the `Start page` subpages
at :guilabel:` Appearance >  Page Layout > Backend Layout`.
Edit the page properties of `Start page` to use the backend layout
"Two Columns" for subpages.

..  include:: _images/SwitchBackendLayoutForSubpages.rst.txt

After saving you will be able to see on "Page 1" that the content of the columns "main" and
"jumbotron" remains unchanged while there is a third column "sidebar".
This is due to the fact that the backend layout "Default" and "TwoColumns"
use the same colPos number for these columns.

The pages generated in step Create initial pages already contain
"Menu of subpages" an example content in "sidebar" column.

..  include:: _images/BackendLayoutTwoColumns.rst.txt

Preview the page once more. A sidebar will appear in the frontend:

..  include:: _images/TwoColumnsPreviewPage.rst.txt
