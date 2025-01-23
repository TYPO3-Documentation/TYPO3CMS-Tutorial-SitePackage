:navigation-title: Breadcrumb

.. include:: /Includes.rst.txt

..  _breadcrumb:

=========================================
Breadcrumb / rootline navigation in TYPO3
=========================================

If you use a `Generated site package <https://docs.typo3.org/permalink/t3sitepackage:minimal-design>`_
it already contains a breadcrumb navigation on the subpages.

To display a breadcrumb the `menu data processor <https://docs.typo3.org/permalink/t3tsref:menuprocessor>`_
can be used with the special type `Rootline <https://docs.typo3.org/permalink/t3tsref:hmenu-special-rootline>`_.

..  _breadcrumb-typoscript:

Breadcrumb TypoScript - the data processor
==========================================

..  literalinclude:: /CodeSnippets/my_site_package/Configuration/Sets/SitePackage/TypoScript/Navigation/breadcrumb.typoscript
    :caption: packages/my_site_package/Configuration/Sets/SitePackage/TypoScript/Navigation/breadcrumb.typoscript
    :linenos:
    :emphasize-lines: 6-8

Line 4: Each data processor must have a unique id. We used 10 for the
`page-content data processor <https://docs.typo3.org/permalink/t3sitepackage:page-content-data-processor>`_
and 20 for the :ref:`Main menu <main-menu-creation>` therefore we now use 30.

Line 6: We configure the menu to use the special type
`Rootline <https://docs.typo3.org/permalink/t3tsref:hmenu-special-rootline>`_.

Line 7: We use the property :ref:`special.range <t3tsref:confval-hmenu-rootline-special-range>`
to define that the breadcrumb should start at the root level (0) of the site and
include the level of the current page (-1).

Line 8: As the default variable of the menu data processor `menu` is already in
use for the main menu, we rename the variable to be used for the breadcrumb to
`breadcrumb`.

..  _breadcrumb-fluid:

Breadcrumb navigation Fluid template
====================================

The special type `breadcrumb` delivers the items of the rootline as an array.
Therefore we can use the `For ViewHelper <f:for> <https://docs.typo3.org/permalink/t3viewhelper:typo3fluid-fluid-for>`_
to loop through these elements:

..  literalinclude:: /CodeSnippets/my_site_package/Resources/Private/PageView/Partials/Navigation/Breadcrumb.html
    :caption: packages/my_site_package/Resources/Private/PageView/Partials/Navigation/Breadcrumb.html
    :linenos:


Line 1, 5: The data of the breadcrumb navigation can be found in variable
`{breadcrumb}`. We defined this in line 8 of the :ref:`TypoScript <breadcrumb-typoscript>`.

Line 6: As all items in the breadcrumb navigation are in the rootline of the
current page all are marked as `active`. We therefore check if the page of the
entry to be displayed is the `current` page.
