..  include:: /Includes.rst.txt

..  _customize-content-elements:
..  _fluid-templates:

===============
Fluid Templates
===============

To understand the following section you need basic knowledge about how to use the
:ref:`Fluid templating engine <t3start:fluid-templates>` and
:ref:`TypoScript <t3start:typoscript>`.

This chapter is based on the following steps:

*   A Composer-based TYPO3 installation, at least version 13.4.
*   You have installed a
    `Generate a site package of type "Site Package Tutorial" <https://docs.typo3.org/permalink/t3sitepackage:minimal-design>`_,
    including the example page tree loaded in `Create initial pages <https://docs.typo3.org/permalink/t3sitepackage:typo3-backend-create-initial-pages>`_.
*   You have familiarized yourself with `Asset handling in TYPO3 <https://docs.typo3.org/permalink/t3sitepackage:assets-theme>`_
    (CSS, JavaScript, design related images, ...)

After this tutorial you have a better understanding of the example templates and
how to adjust them to your needs. You should also be able to create some
templates yourself.

If you prefer to start with a pure HTML template and build all templates
step by step, you can alternatively have a look a :ref:`fluid-templates-scratch`.

..  contents:: Topics covered in this chapter

..  toctree::
    :hidden: 1
    :glob:

    *

..  _pageview:

The page view
=============

The Fluid templates for the whole page have to be configured via TypoScript.

In the example site package that was `Generated for you <https://docs.typo3.org/permalink/t3sitepackage:minimal-design>`_
the according TypoScript can be found in file
:file:`packages/my_site_package/Configuration/Sets/SitePackage/TypoScript/page.typoscript`:

..  literalinclude:: /CodeSnippets/my_site_package/Configuration/Sets/SitePackage/TypoScript/page.typoscript
    :caption: packages/my_site_package/Configuration/Sets/SitePackage/TypoScript/page.typoscript
    :linenos:
    :emphasize-lines:  3,6

Line 3 defines that Fluid templates should be used for the page by using the
TypoScript object `PAGEVIEW <https://docs.typo3.org/permalink/t3tsref:cobj-pageview>`_.

In line 6 the default path to the page view templates is defined. The definition
could be extended in line 7 by a setting later own. For now assume all Fluid
templates for the page can be found in folder
:path:`packages/my_site_package/Resources/Private/PageView`.

..  _default-page-template:

The default page template
=========================

Unless a different page layout is chosen, `PAGEVIEW <https://docs.typo3.org/permalink/t3tsref:cobj-pageview>`_
expects the main template of the page in file :file:`PageView/Pages/Default.html` within
the defined folder (:path:`packages/my_site_package/Resources/Private/PageView`).

Let us have a look at this template now:

..  literalinclude:: /CodeSnippets/my_site_package/Resources/Private/PageView/Pages/Default.html
    :caption: packages/my_site_package/Resources/Private/PageView/Pages/Default.html
    :linenos:
    :emphasize-lines:  1,2,4

*   In line 1 the `Layout ViewHelper <f:layout> <https://docs.typo3.org/permalink/t3viewhelper:typo3fluid-fluid-layout>`_
    is defined to load a layout template from folder :path:`PageView/Layouts`. The file
    must have the same name of the templated, followed by `.html`, therefore
    file :file:`packages/my_site_package/Resources/Private/PageView/Layouts/PageLayout.html`
    is loaded as layout.
*   Line 2 starts a new section with name "Main", using the
    `Section ViewHelper <f:section> <https://docs.typo3.org/permalink/t3viewhelper:typo3fluid-fluid-section>`_.
*   In Line 4 and 7 partial templates are loaded from :path:`Partials`. They follow
    the same naming scheme like the Layout and are therefore located in
    files :file:`Documentation/CodeSnippets/my_site_package/Resources/Private/PageView/Partials/Content.html`
    and :file:`Documentation/CodeSnippets/my_site_package/Resources/Private/PageView/Partials/Stage.html`.
    To do this they use the `Render ViewHelper <f:render> <https://docs.typo3.org/permalink/t3viewhelper:typo3-fluid-render>`_.

..  _layout-template:

The Fluid layout template
=========================

The outer most HTML that is needed for all different page layouts is usually
defined in a layout template:

..  literalinclude:: /CodeSnippets/my_site_package/Resources/Private/PageView/Layouts/PageLayout.html
    :caption: /CodeSnippets/my_site_package/Resources/Private/PageView/Layouts/PageLayout.html
    :linenos:
    :emphasize-lines:  5

The layout template takes care of loading assets like CSS and JavaScript that
are needed on all pages, using the `Asset collector <https://docs.typo3.org/permalink/t3coreapi:asset-collector>`_.

To configure the asset collector, the `Asset.css ViewHelper <f:asset.css> <https://docs.typo3.org/permalink/t3viewhelper:typo3-fluid-asset-css>`_
and `Asset.script ViewHelper <f:asset.script> <https://docs.typo3.org/permalink/t3viewhelper:typo3-fluid-asset-script>`_
are used.

The layout also renders sections that need to be defined with the
`Section ViewHelper <f:section> <https://docs.typo3.org/permalink/t3viewhelper:typo3fluid-fluid-section>`_
in the page template. In line 5 the section is rendered, which is defined in line
2-10 of the "Default" page template. It is possible to define several sections
and to define optional sections. We do not demonstrate that here.

The layout template also loads some more partials, for example to display
menu and the footer.

..  _page-html-structure:

Outer most HTML structure (body, head)
======================================

The outer most HTML structure is usually not handled by your custom templates. It
can be configured via the TypoScript configuration of the
`PAGE <https://docs.typo3.org/permalink/t3tsref:object-type-page>`_ object.

For example you can use option :ref:`shortcutIcon <t3tsref:confval-page-shortcuticon>`
to load a favicon, :ref:`meta <t3tsref:confval-page-meta>` to define meta tags,
or add tags to the body tag using :ref:`bodyTagAdd <t3tsref:confval-page-bodytagadd>`.

The page object, including examples is described in detail in the TypoScript
reference, chapter `Configure the PAGE in TypoScript <https://docs.typo3.org/permalink/t3tsref:guide-page>`_.

..  _partial-template:

The footer: Example for a partial template
==========================================

In the :ref:`layout template <layout-template>` the following partial was loaded:

..  literalinclude:: /CodeSnippets/my_site_package/Resources/Private/PageView/Partials/Footer.html
    :caption: /CodeSnippets/my_site_package/Resources/Private/PageView/Partials/Footer.html
    :linenos:
    :emphasize-lines:  5-7,11

Line 5 uses the `Link.page ViewHelper <f:link.page> <https://docs.typo3.org/permalink/t3viewhelper:typo3-fluid-link-page>`_
to link to the start page, which is the same like the root page and found in the
variable `{site.rootPageId}`.

The variable `{site}` is automatically provided by the
`PAGEVIEW <https://docs.typo3.org/permalink/t3tsref:cobj-pageview>`_. All
available variables are described in the TypoScript Reference, section
`Default variables in Fluid templates <https://docs.typo3.org/permalink/t3tsref:cobj-pageview-data>`_.

Line 6 uses the `Image ViewHelper <f:image> <https://docs.typo3.org/permalink/t3viewhelper:typo3-fluid-image>`_
to display a logo in the footer. The path to the logo and its alt tag are
defined in the settings definition. More about this in chapter
`Setting definition <https://docs.typo3.org/permalink/t3sitepackage:settings-definitions-yaml-constants>`_.

In line 11 yet another partial is included. This partial displays a menu in the
footer. More about this topic in chapter :ref:`Configure the menus <main-menu-creation>`.

..  _fluid-templates-next-steps:

Next steps: Fetch the content and configure the menus
=====================================================

*   :ref:`Fetch and display the content <content-mapping>`
*   :ref:`Configure the menus <main-menu-creation>`
