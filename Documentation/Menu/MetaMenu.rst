:navigation-title: Breadcrumb

..  include:: /Includes.rst.txt

..  _meta-menu:

================================
Meta menu / Footer menu in TYPO3
================================

A meta menu - often but not always displayed in the footer of a website -
displays only selected pages like "Imprint", "Contact", "Data Privacy", ...

If you use a `Generated site package <https://docs.typo3.org/permalink/t3sitepackage:minimal-design>`_
it already contains a meta menu in the footer of the page.

To display a breadcrumb the `menu data processor <https://docs.typo3.org/permalink/t3tsref:menuprocessor>`_
can be used with the special type `List <https://docs.typo3.org/permalink/t3tsref:hmenu-special-list>`_
or `Directory <https://docs.typo3.org/permalink/t3tsref:hmenu-special-directory>`_.

The special menu type "List" allows you to specify a list of UIDs of pages that
should be displayed in the meta menu. The special menu type "Directory" allows
you to specify a folder or page of which all subpages should be displayed in
the menu. We take the second approach here.

..  _meta-menu-typoscript:

Menu of subpages TypoScript - the data processor
================================================

..  literalinclude:: /CodeSnippets/my_site_package/Configuration/Sets/SitePackage/TypoScript/Navigation/footerMenu.typoscript
    :caption: packages/my_site_package/Configuration/Sets/SitePackage/TypoScript/Navigation/footerMenu.typoscript
    :linenos:
    :emphasize-lines: 7-8

Line 4: Each data processor must have a unique id. We used 10 for the
`page-content data processor <https://docs.typo3.org/permalink/t3sitepackage:page-content-data-processor>`_
and 20 for the :ref:`Main menu <main-menu-creation>` and 30 for the
`Breadcrumb <https://docs.typo3.org/permalink/t3sitepackage:breadcrumb>`_
therefore we now use 40.

Line 6: The values processed by the data processor should be stored in variable
`footerMenu`.

Line 7: We configure the menu to use the special type
`Directory <https://docs.typo3.org/permalink/t3tsref:hmenu-special-directory>`_.

Line 8: The folder which contains the pages to be displayed in the footer menu
can be configured via site settings. You can find the definition of this setting
in file :file:`packages/my_site_package/Configuration/Sets/SitePackage/settings.definitions.yaml`.

..  _meta-menu-fluid:

Menu of subpages - Fluid template
=================================

The special type `directory` delivers the items of the meta menu as an array.
Therefore we can use the `For ViewHelper <f:for> <https://docs.typo3.org/permalink/t3viewhelper:typo3fluid-fluid-for>`_
to loop through these elements:

..  literalinclude:: /CodeSnippets/my_site_package/Resources/Private/PageView/Partials/Navigation/FooterMenu.html
    :caption: packages/my_site_package/Resources/Private/PageView/Partials/Navigation/FooterMenu.html
    :linenos:

The menu items can be displayed just as we have done in the
`Fluid partial of the main menu <https://docs.typo3.org/permalink/t3sitepackage:fluid-implement-main-menu>`_.

As we do not need to highlight active pages in the footer menu we omit those
conditions.

..  _meta-menu-list:

Switching to the menu type list
===============================

If it is more feasible for your project to list all pages that should be listed
in the meta menu, you can switch to using the special menu type "List" by
changing the TypoScript:

..  code-block:: diff
    :caption: packages/my_site_package/Configuration/Sets/SitePackage/settings.definitions.yaml (diff)

     40 = menu
     40 {
         as = footerMenu
    -    special = directory
    +    special = list
         special.value = {$MySitePackage.footerMenuRoot}
     }

You can now change the setting to accept a comma separated list of integers
and then list all pages that should be displayed in the meta menu. For example:

..  code-block:: diff
    :caption: packages/my_site_package/Configuration/Sets/SitePackage/TypoScript/Navigation/footerMenu.typoscript (diff)

     MySitePackage.footerMenuRoot:
       label: 'Footer menu root uid'
    -  description: 'The subpages of this page are displayed in the footer'
    +  description: 'These pages are displayed in the footer'
       category: MySitePackage.menus
    -  type: int
    +  type: stringlist
    -  default: 2
    +  default:
    +    - 5
    +    - 4
    +    - 3

We are using the type :ref:`stringlist <t3coreapi:confval-site-setting-type-stringlist>`
as - as of writing these lines - there is no integer list type in the settings yet.
