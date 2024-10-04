.. include:: /Includes.rst.txt
.. _main-menu-creation:

=========
Main menu
=========

To display a main menu in our frontend output we need to provide the according
data and define the view by providing templates for it.

A data processor (see :ref:`dataProcessing <t3tsref:dataProcessing>`) can be
used to provide the data for the menu to the template and a Fluid template
partial do define the view of the menu.

.. _add-menu-processor:

Use the data processor `menu`
=============================

The :ref:`data processor 'menu' <t3tsref:MenuProcessor>` can be configured to
provide the data of all pages in your current site to your page template.

We save the TypoScript configuration for the menu into file
:file:`Configuration/TypoScript/Navigation/menu.typoscript`:

..  include:: /CodeSnippets/TypoScript/Navigation/menu.typoscript

.. _fluid-implement-main-menu:

Update the Fluid partial for the menu
=====================================

Until now we had static HTML in the file
:file:`Resources/Private/Templates/Partials/Navigation/Menu.html`.

We created that file in section :ref:`create_partial_header`.

Replace the static HTMl with Fluid:

A menu usually contains several menu entries. We use the
:ref:`t3viewhelper:typo3fluid-fluid-for` to iterate over all menu entries
and render them in turn:

..  include:: /CodeSnippets/Fluid/Menu.rst.txt

In each loop the current menu item is stored in variable `{menuItem}`.

You can use the :ref:`t3viewhelper:typo3-fluid-debug` to debug what kind of
data the variable contains like this:

..  code-block:: diff
    :caption: EXT:site_package/Resources/Private/Templates/Partials/Navigation/Menu.html (changed for debug output)

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

The menu in the page should now function and allow you to navigate from page to
page.

Delete the frontend caches and preview the changes:

When previewing the site as it stands now, we can verify if everything is
working as expected and if the menu is generated. Go to **WEB → View** and
check, if the menu reflects the pages you created in the backend. Add one or
two additional pages to the page tree and check to see if they appear in the preview. If
the menu does not change, you possibly need to flush the frontend caches,
then reload the preview.

.. include:: /Images/AutomaticScreenshots/FlushFrontendCaches.rst.txt

The preview in the screenshot above shows the menu with three page links: "Page
1", "Page 2" and "Page 3". If everything is working as expected, let's
configure the dynamic content rendering in the next step.
