:navigation-title: Menus

..  include:: /Includes.rst.txt

..  _menu:

========================
Rendering menus in TYPO3
========================

There are several strategies to display menus or other navigation elements like
breadcrumbs and sitemaps in TYPO3.

..  contents::

..  toctree::
    :glob:
    :hidden:

    *

..  _menu-content-element:

Menus as content elements
=========================

You can use a content element to display a menu. In the example data "Page 1"
contains a menu of subpages and page "Sitemap" a sitemap content element.

To adjust the templates of these content elements refer to chapter
`Overriding the default templates of content elements <https://docs.typo3.org/permalink/t3sitepackage:content-element-rendering>`_.

..  _menu-page-view:

Menus within the page view
==========================

A data processor (see also :ref:`dataProcessing <t3tsref:dataProcessing>`) can be
used to provide the data for one or several menus.

For menus usually the `menu data processor <https://docs.typo3.org/permalink/t3tsref:menuprocessor>`_,
which is provided by the TYPO3 Core, is used.

..  tip::
    Some extensions like :composer:`b13/menus` offer performant menus for
    large sites or like :composer:`georgringer/news` menus for special purposes.

.. _main-menu-creation:
.. _add-menu-processor:

TypoScrip configuration of the main menu
========================================

We use TypoScript to configure these menus. The main menu is configured like this:

..  literalinclude:: /CodeSnippets/my_site_package/Configuration/Sets/SitePackage/TypoScript/Navigation/menu.typoscript
    :caption: packages/my_site_package/Configuration/Sets/SitePackage/TypoScript/Navigation/menu.typoscript

This menu defines that the variable with the default name `menu` should contain
the information about the complete page tree of the current page.

System folders like the "Footer menu" from your example data, special page types
and pages excluded from the navigation are excluded.

A complete reference of this menu can be found in the TypoScript Reference:
`menu data processor <https://docs.typo3.org/permalink/t3tsref:menuprocessor>`_.

.. _fluid-implement-main-menu:

Fluid partial of the main menu
==============================

In :path:`packages/my_site_package/Resources/Private/PageView/Partials/Navigation/Menu.html`
you can find the partial that renders the main menu.

A menu usually contains several menu entries. We use the
:ref:`t3viewhelper:typo3fluid-fluid-for` to iterate over all menu entries
and render them in turn:

..  literalinclude:: /CodeSnippets/my_site_package/Resources/Private/PageView/Partials/Navigation/Menu.html
    :caption: packages/my_site_package/Resources/Private/PageView/Partials/Navigation/Menu.html
    :linenos:

In each loop the current menu item is stored in variable `{menuItem}`.

You can use the :ref:`t3viewhelper:typo3-fluid-debug` to debug what kind of
data the variable contains like this:

..  code-block:: diff
    :caption: packages/my_site_package/Resources/Private/PageView/Partials/Navigation/Menu.html (changed for debug output)

     <ul class="navbar-nav mr-auto">
         <f:for each="{menu}" as="menuItem">
     +       <f:debug>{menuItem}</f:debug>
             <li class="nav-item {f:if(condition: menuItem.active, then:'active')}">

The debug output on your page should now look like this:

..  code-block:: plaintext

    array(8 items)
        data => array(78 items)
        title => 'My page' (22 chars)
        link => '/my-page' (26 chars)
        target => '' (0 chars)
        active => 0 (integer)
        current => 0 (integer)
        spacer => 0 (integer)
        hasSubpages => 1 (integer)

The following data is of interest:

`{menuItem.data}`:
    Contains the raw data of the :ref:`database record <t3coreapi:database-records>`
    of the page for the menu item.
`{menuItem.link}`:
    The actual link to the page. For external links it contains the URL.
`{menuItem.target}`:
    This might contain "_blank" if the menu item represents an external link.
`{menuItem.title}`:
    The title to be displayed in the menu. By default the navigation title if set,
    the title otherwise.
`{menuItem.active}`
    Contains 1 if the page of the current menu item is in the rootline of the
    current page.

The construct `{f:if(condition: menuItem.active, then: 'active')}`
output the string "active" if `{menuItem.active}` is set. The syntax might look
confusing at first. It is an :ref:`t3viewhelper:typo3fluid-fluid-if`
displayed in the :ref:`Fluid inline notation <t3coreapi:fluid-inline-notation>`.

.. _main-menu-creation-preview:

Preview the page and use the menu
=================================

Whenever you change TypoScript files or Fluid templates, flush all caches:

..  code-block:: bash

    ddev typo3 cache:flush

..  figure:: /Images/MainMenuCreation/CheckMainMenu.png
    :alt: Checking from the backend if the menu is generated as expected.
    :class: with-shadow

    Checking from the backend if the menu is generated as expected.

.. _menu-types:

Different menu types
====================

We use the `menu data processor <https://docs.typo3.org/permalink/t3tsref:menuprocessor>`_
to demonstrate different menu types:

*   A breadcrumb configured in
    :file:`packages/my_site_package/Configuration/Sets/SitePackage/TypoScript/Navigation/breadcrumb.typoscript`
    and rendered in :file:`packages/my_site_package/Resources/Private/PageView/Partials/Navigation/Breadcrumb.html`.
*   A footer menu consisting of pages within a selected folder configured in
    :file:`packages/my_site_package/Configuration/Sets/SitePackage/TypoScript/Navigation/footerMenu.typoscript`
    and rendered in :file:`packages/my_site_package/Resources/Private/PageView/Partials/Navigation/FooterMenu.html`.
