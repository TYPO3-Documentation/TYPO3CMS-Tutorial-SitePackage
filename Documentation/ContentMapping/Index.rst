:navigation-title: Content mapping
..  include:: /Includes.rst.txt

..  _content-mapping:

=========================================
Display the content elements on your page
=========================================

In step `The page view <https://docs.typo3.org/permalink/t3sitepackage:pageview>`_
we had a first look at the TypoScript configuration for the page view.

Now let us see how the content is mapped to its position in the templates.

..  contents::

.. _content-mapping-site-set:

Dependency on Fluid Styled Content
==================================

In step `Look at the a basic site set <https://docs.typo3.org/permalink/t3sitepackage:minimal-extension-siteset>`_
We inspected site set configuration that was generated for you by the Site
Package Builder. Now let us have another look:

..  literalinclude:: /CodeSnippets/my_site_package/Configuration/Sets/SitePackage/config.yaml
    :caption: packages/my_site_package/Configuration/Sets/SitePackage/config.yaml
    :language: yaml
    :linenos:
    :emphasize-lines: 3-5

In lines 3-5 a dependency to the sets provided by the system extension
:composer:`typo3/cms-fluid-styled-content` is defined. These sets define
default Fluid templates and very basic CSS for your site. Without using such
an extension you would have to define all content elements and their rendering
yourself.

..  _cm-dynamic-content-rendering-in-typoscript:
..  _backend-page-layouts:
..  _content-mapping-backend-layout:

The page layout / backend layout
================================

The :ref:`page TSconfig <t3tsref:setting-page-tsconfig>` definition in :
file:`Configuration/Sets/SitePackage/PageTsConfig/BackendLayouts/default.tsconfig`
contains our default page layout. For historic reasons this setting is also
called "backend layout", even though it influences the page layouts of both
the :guilabel:`Web > Page` module as well as the output of a page in the frontend.

..  literalinclude:: /CodeSnippets/my_site_package/Configuration/Sets/SitePackage/PageTsConfig/BackendLayouts/default.tsconfig
    :caption: packages/my_site_package/Configuration/Sets/SitePackage/PageTsConfig/BackendLayouts/default.tsconfig
    :linenos:

..  versionchanged:: TYPO3 13

    Each area in the page layout becomes an identifier that can be used during
    content mapping. If no content element is added in the backend of that page and
    the slide mode is activated, content from the parent page is displayed. This is
    useful for design elements like side bars, jumbotrons or banners that should be
    the same for a page and its subpage. You can find all details of the
    :ref:`Page / backend layouts in the TSconfig reference <t3tsref:backend-layouts>`.

When you make changes to the files of an extension it is usually necessary
to flush all caches by hitting the button.

..  figure:: /Images/AutomaticScreenshots/FlushAllCaches.png
    :class: with-shadow

    Flush all caches

After flushing the all caches the new backend layout is available in the page
properties at :guilabel:` Appearance >  Page Layout > Backend Layout`.

..  figure:: /Images/AutomaticScreenshots/ChooseBackendLayout.png
    :class: with-shadow

    Choose the page / backend layout

..  _choose_page_layout:

Choose the page layout in the page properties
---------------------------------------------

If you followed step
:ref:`Load the example data automatically <t3sitepackage:load-example-data>`
the areas "Stage" and "Main" should already contain some example content.

.. figure:: /Images/AutomaticScreenshots/CreateNewContentElement.png
   :class: with-shadow

   Create new content element

In the database each content element record is stored in the table
:sql:`tt_content`. This table has a column called `colPos`. If the value stored
in column `colPos` is the same as defined in the page layout in page TSconfig
the content element is displayed in the according area of the page layout.

It is considered best practice to store the main content in an area with
`colPos=0`. This makes switching between different layouts easier.

..  _cm-typo3-backend-create-pages:
..  _page-content-data-processor:

Content rendering via page-content data processor
=================================================

..  versionadded:: TYPO3 13
    The TypoScript object `PAGEVIEW` and the data processor `page-content`
    have been added.

    If you are using TYPO3 v12.4 read :ref:`content element mapping in TYPO3
    v12.4 <t3sitepackage/12:cm-typo3-backend-create-pages>`

The TypoScript object :ref:`PAGEVIEW <t3tsref:cobj-pageview>`, defined in the
TypoScript file :file:`Configuration/Sets/SitePackage/TypoScript/page.typoscript`,
uses a data processor to facilitate content mapping.

The used data processor is of type :ref:`page-content <t3tsref:PageContentFetchingProcessor>`-

..  literalinclude:: /CodeSnippets/my_site_package/Configuration/Sets/SitePackage/TypoScript/page.typoscript
    :caption: packages/my_site_package/Configuration/Sets/SitePackage/TypoScript/page.typoscript
    :linenos:
    :emphasize-lines: 12

This data processor provides the variable `content` to your Fluid template. It
needs no further configuration.

You can debug this variable in the main section of your template using the
:ref:`Debug ViewHelper <f:debug> <t3viewhelper:typo3-fluid-debug>`:

..  literalinclude:: _codesnippets/_SectionMainDebug.diff
    :caption: Resources/Private/PageView/Pages/Default.html (diff)

The debug output after clearing all caches and previewing the page should look
like this:

..  figure:: /Images/ContentMapping/contents_debug.png
    :alt: Screenshot of the debug output of {content}

    The debug output should contain sections "stage" and "main"

..  tip::
    Does your debug output show "NULL" instead? Check the following:

    *   Is `{content}` spelled correctly and uses the correct syntax?
    *   Did you :ref:`define and include the page layout <backend-page-layouts>`?
    *   Did you :ref:`choose the correct page layout in the page properties <choose_page_layout>`?
    *   Did you define the correct data processor `page-content` in TypoScript?
    *   Did you override the default variable name using
        :confval:`as <t3tsref:pagecontentfetchingprocessor-as>` in the data processor?

..  _cm-fluid-typoscript-mapping:

Map the content areas to their respective section in the page template
======================================================================

Open the file :file:`packages/my_site_package/Resources/Private/PageView/Pages/Default.html`
and locate the section called "Main".

It uses the `Render ViewHelper <f:render> <https://docs.typo3.org/permalink/t3viewhelper:typo3-fluid-render>`_
to delegate rendering of the content elements of one section to the partial
:file:`packages/my_site_package/Resources/Private/PageView/Partials/Content.html`.

..  literalinclude:: /CodeSnippets/my_site_package/Resources/Private/PageView/Pages/Default.html
    :caption: packages/my_site_package/Resources/Private/PageView/Pages/Default.html
    :linenos:
    :emphasize-lines: 7

As the main content area uses the content area defined with identifier `main`
(compare section :ref:`backend-page-layouts`) variable `{content.main.records}`
is used to display the content from the main area.

Similarly the content from the stage is displayed:

..  literalinclude:: /CodeSnippets/my_site_package/Resources/Private/PageView/Partials/Stage.html
    :caption: packages/my_site_package/Resources/Private/PageView/Partials/Stage.html

..  _content-element-partial:
..  _content-element-typoscript:

Delegate the rendering of the content elements to TypoScript
============================================================

In TYPO3 13 unfortunately there is at time of writing no easy way to render the
content elements. We therefore have to delegate rendering of the single
content elements to TypoScript by using the
`CObject ViewHelper <f:cObject> <https://docs.typo3.org/permalink/t3viewhelper:typo3-fluid-cobject>`_:

..  literalinclude:: /CodeSnippets/my_site_package/Resources/Private/PageView/Partials/Content.html
    :caption: packages/my_site_package/Resources/Private/PageView/Partials/Content.html
    :linenos:

Wherever we need to render the content elements of a section of the page we
include this partial and pass the content elements to be rendered to it, just
like we did in section

..  _content-element-next-steps:

Next steps
==========

..  toctree::
    :glob:

    TypoScript
    Stage
    SubpageLayout
    AddContent
    *
