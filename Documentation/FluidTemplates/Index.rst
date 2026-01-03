..  include:: /Includes.rst.txt

..  _customize-content-elements:
..  _fluid-templates:

===============
Fluid Templates
===============

To understand the following section you need basic knowledge of the
:ref:`Fluid templating engine <t3start:fluid-templates>` and
:ref:`TypoScript <t3start:typoscript>`.

This chapter assumes the following:

*   A Composer-based TYPO3 installation, at least version 13.4.
*   You have installed a
    `Generate a site package of type "Site Package Tutorial" <https://docs.typo3.org/permalink/t3sitepackage:minimal-design>`_,
    including the example page tree loaded in `Create initial pages <https://docs.typo3.org/permalink/t3sitepackage:typo3-backend-create-initial-pages>`_.
*   You are familiar with `Asset handling in TYPO3 <https://docs.typo3.org/permalink/t3sitepackage:assets-theme>`_
    (CSS, JavaScript, design related images, etc)

After this tutorial you will have a better understanding of Fluid templates and
how to customize them to your needs. You should also be able to create some
Fluid templates yourself.

If you prefer to start with an HTML template and build it up to a Fluid template
step by step, have a look at :ref:`fluid-templates-scratch`.

..  contents:: Topics covered in this chapter

..  toctree::
    :hidden: 1
    :glob:

    *

..  _pageview:

The page view
=============

The Fluid templates that we will use to output the frontend pages have to be configured via TypoScript.

In the site package that was `Generated for you <https://docs.typo3.org/permalink/t3sitepackage:minimal-design>`_,
the TypoScript configuration can be found in
:file:`packages/my_site_package/Configuration/Sets/SitePackage/TypoScript/page.typoscript`:

..  literalinclude:: /CodeSnippets/my_site_package/Configuration/Sets/SitePackage/TypoScript/page.typoscript
    :caption: packages/my_site_package/Configuration/Sets/SitePackage/TypoScript/page.typoscript
    :linenos:
    :emphasize-lines:  3,6

Line 3 defines that Fluid templates should be configured using the
`PAGEVIEW <https://docs.typo3.org/permalink/t3tsref:cobj-pageview>`_ TypoScript object .

Line 6 defines the default path to the page view templates. We can add further
paths to the definition in line 7 with a site setting later on. For now assume all Fluid
templates for the page can be found in folder
:path:`packages/my_site_package/Resources/Private/PageView`.

..  _default-page-template:

The default page template
=========================

Unless a different page layout is chosen, `PAGEVIEW <https://docs.typo3.org/permalink/t3tsref:cobj-pageview>`_
expects the main template of the page to be :file:`PageView/Pages/Default.html` in
the folder :path:`packages/my_site_package/Resources/Private/PageView` (the path
that we defined above).

Let's have a look at this default page template:

..  literalinclude:: /CodeSnippets/my_site_package/Resources/Private/PageView/Pages/Default.html
    :caption: packages/my_site_package/Resources/Private/PageView/Pages/Default.html
    :linenos:
    :emphasize-lines:  1,2,4

*   In line 1 the `Layout ViewHelper <f:layout> <https://docs.typo3.org/permalink/t3viewhelper:typo3fluid-fluid-layout>`_
    loads a layout template from the :path:`PageView/Layouts` folder. The layout
    file is referred to by name, with an `.html` on the end. The layout file here is
    :file:`packages/my_site_package/Resources/Private/PageView/Layouts/PageLayout.html`.
*   Line 2 starts a section called "Main", using the
    `Section ViewHelper <f:section> <https://docs.typo3.org/permalink/t3viewhelper:typo3fluid-fluid-section>`_.
*   Lines 4 and 7 load partial templates from the :path:`Partials` folder. They follow
    the same naming scheme as the layout: they are located in
    :file:`packages/my_site_package/Resources/Private/PageView/Partials/Content.html`
    and :file:`packages/my_site_package/Resources/Private/PageView/Partials/Stage.html`.
    The partials are loaded with the `Render ViewHelper <f:render> <https://docs.typo3.org/permalink/t3viewhelper:typo3-fluid-render>`_.

..  _layout-template:

The Fluid layout template
=========================

The outermost HTML on a page/pages is defined by a layout template:

..  literalinclude:: /CodeSnippets/my_site_package/Resources/Private/PageView/Layouts/PageLayout.html
    :caption: /CodeSnippets/my_site_package/Resources/Private/PageView/Layouts/PageLayout.html
    :linenos:
    :emphasize-lines:  5

The layout template takes care of loading assets that
are needed on all pages, like CSS and JavaScript. It uses the `Asset collector <https://docs.typo3.org/permalink/t3coreapi:asset-collector>`_.

The asset collector is configured using the `Asset.css ViewHelper <f:asset.css> <https://docs.typo3.org/permalink/t3viewhelper:typo3-fluid-asset-css>`_
and `Asset.script ViewHelper <f:asset.script> <https://docs.typo3.org/permalink/t3viewhelper:typo3-fluid-asset-script>`_.

Also, the layout template renders sections using a
`Section ViewHelper <f:section> <https://docs.typo3.org/permalink/t3viewhelper:typo3fluid-fluid-section>`_.
The sections are defined in the page template. The "Main" section in line 5
is defined in lines 2-10 of the "Default" page template. It is possible to define
optional sections (not shown here).

Our layout template also loads some partials, for example, to display the
menu and the footer.

..  _page-html-structure:

Outermost HTML structure (body, head)
=====================================

The outermost HTML is not usually handled in Fluid templates. It
is configured via TypoScript configuration of the
`PAGE <https://docs.typo3.org/permalink/t3tsref:object-type-page>`_ object.

For example, you can use the :ref:`shortcutIcon <t3tsref:confval-page-shortcuticon>`
option to load a favicon, :ref:`meta <t3tsref:confval-page-meta>` to define meta tags,
and :ref:`bodyTagAdd <t3tsref:confval-page-bodytagadd>` to add attributes to the body tag.

The page object, including examples, is described in detail in the TypoScript
reference. See `Configure the PAGE in TypoScript <https://docs.typo3.org/permalink/t3tsref:guide-page>`_.

..  _partial-template:

The footer: Example of a partial template
=========================================

In the :ref:`layout template <layout-template>` the following partial was loaded:

..  literalinclude:: /CodeSnippets/my_site_package/Resources/Private/PageView/Partials/Footer.html
    :caption: /CodeSnippets/my_site_package/Resources/Private/PageView/Partials/Footer.html
    :linenos:
    :emphasize-lines:  5-7,11

Line 5 uses a `Link.page ViewHelper <f:link.page> <https://docs.typo3.org/permalink/t3viewhelper:typo3-fluid-link-page>`_
to link to the start page. The start page is the same as the root page and is found in the
`{site.rootPageId}` variable.

The variable `{site}` is automatically provided by the
`PAGEVIEW <https://docs.typo3.org/permalink/t3tsref:cobj-pageview>`_ TypoScript object. All
variables are described in the TypoScript Reference. See
`Default variables in Fluid templates <https://docs.typo3.org/permalink/t3tsref:cobj-pageview-data>`_.

Line 6 uses an `Image ViewHelper <f:image> <https://docs.typo3.org/permalink/t3viewhelper:typo3-fluid-image>`_
to display a logo in the footer. The path to the logo and its alt tag are
defined in the site package settings definitions. See
`Setting definitions <https://docs.typo3.org/permalink/t3sitepackage:settings-definitions-yaml-constants>`_.

Line 11 adds another partial. This partial displays a menu in the
footer. See :ref:`Configuring the menus <main-menu-creation>`.

..  _fluid-templates-next-steps:

Next steps: Fetch the content and configure the menus
=====================================================

*   :ref:`Fetch and display the content <content-mapping>`
*   :ref:`Configure the menus <main-menu-creation>`
