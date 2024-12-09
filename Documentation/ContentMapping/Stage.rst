:navigation-title: Stage
..  include:: /Includes.rst.txt

..  _jumbotron-partial:
..  _jumbotron-content-records:
..  _slide-mode:

========================================================
The Stage: Fall back to content of parent page (sliding)
========================================================

..  contents::

..  _slide-mode-pagelayout:

Page Layout with slide mode
===========================

The page layout contains a definition for the stage area in lines 10-19:

..  literalinclude:: _codesnippets/_Default.tsconfig
    :language: typoscript
    :caption: packages/my_site_package/Configuration/Sets/SitePackage/PageTsConfig/BackendLayouts/default.tsconfig
    :linenos:
    :emphasize-lines: 10-19

The definition is similar to the one we have seen for the main content area in
section `Create a default page layout with page TSconfig <https://docs.typo3.org/permalink/t3sitepackage:content-mapping-backend-layout>`_.

There are some key differences:

*   The stage has the
    :ref:`colPos <t3tsref:confval-mod-web-layout-backendlayouts-backendlayout-title-config-backend-layout-rows-row-columns-col-colpos>`
    `1`, therefore all content elements in the stage area will automatically have
    a `1` instead of a `0` in field "Column" / database column `colPos`.
*   The :ref:`identifier <t3tsref:confval-mod-web-layout-backendlayouts-backendlayout-title-config-backend-layout-rows-row-columns-col-identifier>`
    is `stage` therefore the content of the content area is available as
    variable `{content.stage.records}` in the partial template.
*   The :ref:`slideMode <t3tsref:confval-mod-web-layout-backendlayouts-backendlayout-title-config-backend-layout-rows-row-columns-col-slidemode>`
    is set to `slide` therefore if no content is found in the content area on
    the current page, TYPO3 will look one page up etc until content is found
    or the page root is reached.

..  _slide-mode-template:

Using a content area with slide mode
====================================

The content elements will be automatically found and provided to your template.
Therefore the template for the area "Stage" looks no different from the one
for the main area except that is uses the corresponding variable of course:

..  include:: /CodeSnippets/Fluid/Stage.rst.txt
