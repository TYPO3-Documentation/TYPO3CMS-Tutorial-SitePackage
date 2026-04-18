:navigation-title: Subpage layout
..  include:: /Includes.rst.txt

..  _subpage-layout:

=========================
Additional subpage layout
=========================

Edit the file
:file:`packages/my-site-package/Resources/Private/Templates/Pages/Subpage.fluid.html`.

Exchange the main content area just as we have done before with the default
template. Now
replace the content area of the sidebar with the content elements in the Fluid
variable :html:`{sidebarContent}`.

..  literalinclude:: _codesnippets/_SubpageWithSection.diff
    :caption: Resources/Private/Templates/Pages/Subpage.fluid.html (diff)

..  contents::

..  _cm-create-subpage-backend-layout:

Create a subpage page layout with page TSconfig
===============================================

We now create a subpage layout with two columns and a row for the stage in a
new file :file:`packages/my-site-package/Configuration/TsConfig/Page/PageLayout/Subpage.tsconfig`
containing :ref:`page TSconfig <t3tsref:setting-page-tsconfig>`. :

..  literalinclude:: /CodeSnippets/my_site_package/Configuration/Sets/SitePackage/PageTsConfig/BackendLayouts/subpage.tsconfig
    :language: typoscript
    :caption: packages/my_site_package/Configuration/Sets/SitePackage/PageTsConfig/BackendLayouts/subpage.tsconfig
    :linenos:

.. _cm-switch_backend_layout:

Switch to the two column layout with a sidebar for subpages
===========================================================

You can now use the "Subpage" backend layout for the `Start page` subpages
at :guilabel:` Appearance >  Layout > Backend Layout`.
Edit the page properties of `Start page` to use the backend layout
"Subpage" for subpages.

..  figure:: /Images/ContentMapping/SwitchBackendLayoutForSubpages.png
    :zoom: gallery
    :alt: Switch to the backend layout "Subpage" for subpages

    Switch to the backend layout "Subpage" for subpages

After saving you will be able to see on "Page 1" that the content of the columns "Normal" and
"Stage" remains unchanged while there is a third column "Right".
This is due to the fact that the backend layout "Default" and "Subpage"
use the same colPos number for these columns.

The pages generated in step "Create initial pages" already contain
"Menu of subpages" an example content in "Right" column.

..  figure:: /Images/ContentMapping/BackendLayoutTwoColumns.png
    :zoom: gallery
    :alt: A new column "Right" appears

    A new column "Right" appears


Preview the page once more. A sidebar will appear in the frontend:

..  figure:: /Images/ContentMapping/TwoColumnsPreviewPage.png
    :zoom: gallery
    :alt: The sidebar appears in the frontend

    The sidebar appears in the frontend
