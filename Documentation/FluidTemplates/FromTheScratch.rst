:navigation-title: Fluid from the scratch
..  include:: /Includes.rst.txt

..  _fluid-templates-scratch:

================================
Fluid Templates from the Scratch
================================


..  contents::

..  _implement-templates-files:
..  _the-page-layout-file:
..  _create_template:

Create the Fluid templates
==========================

Copy the main :ref:`static HTML file <theme-example-static-html>` from
:file:`Resources/Public/StaticTemplate/default.html`
to :file:`Resources/Private/PageView/Pages/Default.html`. You can override
the file created in step :ref:`Minimal site package - The TYPO3 Fluid
version <t3sitepackage:minimal-extension-fluid>`. The file name must begin
with a capital letter

The template name `Default.html` is used as a fall back if no other template
names are defined. Do not change it for now.

Even though this file ends on `.html` it will be interpreted by the templating
engine Fluid.

TYPO3 takes care of creating the outermost HTML structure of the site, including
the `<html>` and `<head>` tags therefore they need to be removed from the
template:

..  literalinclude:: _codesnippets/_remove_head.diff
    :caption: Resources/Private/PageView/Pages/Default.html (difference)

The Fluid template :file:`Default.html` now contains only the HTML
code inside the body:

..  literalinclude:: _codesnippets/_DefaultWithoutHead.html
    :caption: Resources/Private/PageView/Pages/Default.html

Flush the caches and preview the page. You should now see a pure HTML page
without any styles or images. We will add them in a further step.

..  todo: Link to cache and preview pages in getting started once they exist

..  todo: Add link to trouble shooting page once
https://github.com/TYPO3-Documentation/TYPO3CMS-Tutorial-GettingStarted/issues/441
is done.

..  note::
    Each time you change a Fluid template you must flush the caches. Fluid
    templates preprocessed into PHP files and stored in the folder
    :path:`var/cache/code/fluid_template`.

..  _typoscript-configuration-css-js-inclusion:
..  _assets:

Load assets (CSS, JavaScript)
-----------------------------

Load all CSS which had been removed in step :ref:`create_template`
using the :ref:`Asset.css ViewHelper <f:asset.css> <t3viewhelper:typo3-fluid-asset-css>`.

Replace `<script>` tags in the body by using the
:ref:`Asset.script ViewHelper <f:asset.script> <t3viewhelper:typo3-fluid-asset-script>`.

..  literalinclude:: _codesnippets/_assets.diff
    :caption: Resources/Private/PageView/Pages/Default.html (difference)

The path to the assets will be resolved by TYPO3. `EXT:` tells TYPO3 that this is
an extension path. `my_site_package` is the
:ref:`Extension name defined in the composer.json <extension-configuration-composer>`.

Flush all caches and preview the page.
..  todo: Link to cache and preview pages in getting started once they exist

When you load your page and inspect it with the developer tools of your browser
you will notice that the assets are loaded from paths like
`/_assets/99a57ea771f379715c522bf185e9a315/Css/main.css?1728057333`. You must
never try to use these path directly, for example as absolute paths. They can
change at any time. Only use the `EXT:` syntax.

When you now preview the page you will notice that the your page is loaded
with the dummy content from the template and functioning CSS and JavaScript.
The logo however is not found.

..  _images:

Load images in Fluid
--------------------

Replace all `<img>` tags in the template with the
:ref:`Image ViewHelper <f:image> <t3viewhelper:typo3-fluid-image>`:

..  literalinclude:: _codesnippets/_replace_images.diff
    :caption: Resources/Private/PageView/Pages/Default.html (difference)

Just like happened with the CSS paths in step :ref:`assets` the path to the
image is now replaced in the output by a path like
`/_assets/99a57ea771f379715c522bf185e9a315/Images/logo.svg?1728057333`.

..  _create_partial_jumbotron:
..  _partials:

Split up the template into partials
-----------------------------------

If you compare the two static templates
:file:`Resources/Public/StaticTemplate/default.html`
and :file:`Resources/Public/StaticTemplate/subpagepage.html` they share many
parts like the footer or the header with the menu. In order to reuse those parts
we extract them to their own Fluid files. These are called partials and stored
in path :path:`Resources/Private/PageView/Partials`.

We can use the :ref:`Render ViewHelper <f:render> <t3viewhelper:typo3-fluid-render>`
to render the partial in the correct place.

Remove the header from the template and replace it with a render ViewHelper:

..  literalinclude:: _codesnippets/_remove_header.diff
    :caption: Resources/Private/PageView/Pages/Default.html (difference)

Move the Fluid code you just remove to a file called
:file:`my-site-package/Resources/Private/PageView/Partials/Header.html`.

Do the same with the stage, the breadcrumb, and the footer.

You should now have the following files:

..  directory-tree::
    :level: 3
    :show-file-icons: true

    *   packages/my_site_package/Resources/Private/PageView

        *   Pages

            *   Default.html
            *   Subpage.html

        *   Partials

            *   Footer.html
            *   Header.html
            *   Stage.html

The Fluid template :file:`Resources/Private/PageView/Pages/Default.html`
should now look like this:

..  literalinclude:: _codesnippets/_DefaultWithPartials.html
    :caption: Resources/Private/PageView/Pages/Default.html

You will learn how to display the dynamic content in chapter :ref:`content-mapping`.

..  _create_partial_header:

Extract the menu into a partial
-------------------------------

Partials can also be rendered from within another partial. We move the menu in
the partial :file:`Resources/Private/PageView/Partials/Header.html` to its
own partial, :file:`Resources/Private/PageView/Partials/Navigation/Menu.html`:

..  literalinclude:: _codesnippets/_remove_menu_from_header.diff
    :caption: packages/my_site_package/Resources/Private/PageView/Partials/Header.html (Difference)

The :ref:`Render ViewHelper <f:render> <t3viewhelper:typo3-fluid-render>` is used
the same like from within the template.

Chapter :ref:`Main menu <t3sitepackage:main-menu-creation>` will teach you how
to make the menu work.

..  _create_partial_footer_menu:

Extract the footer menu into a partial
-------------------------------

We can also move the footer menu from
the partial :file:`Resources/Private/PageView/Partials/Footer.html` to its
own partial, :file:`Resources/Private/PageView/Partials/Navigation/FooterMenu.html`:

..  literalinclude:: _codesnippets/_remove_menu_from_footer.diff
    :caption: packages/my_site_package/Resources/Private/PageView/Partials/Footer.html (Difference)

The footer menu partial looks like this:

..  literalinclude:: _codesnippets/_FooterMenuPartial.html
    :caption: Resources/Private/PageView/Partials/Navigation/FooterMenu.html

..  _create_section:

Move the content into a section
-------------------------------

You can also move a part of the template into a section, surrounded by a
:ref:`Section ViewHelper <f:section> <t3viewhelper:typo3fluid-fluid-section>`
and use the :ref:`Render ViewHelper <f:render> <t3viewhelper:typo3-fluid-render>`
with argument `section` to render it.

We move the content, including the Stage into such a section:

..  literalinclude:: _codesnippets/_move_content_to_section.diff
    :caption: Resources/Private/PageView/Pages/Default.html (difference)

The result looks like this:

..  literalinclude:: _codesnippets/_DefaultWithSection.html
    :caption: Resources/Private/PageView/Pages/Default.html

You will learn how to display the dynamic content in chapter :ref:`content-mapping`.

..  _subpage:

The Fluid template for the subpage
==================================

We can repeat the above steps for the subpage and write such a template:

..  literalinclude:: _codesnippets/_SubpageWithSection.html
    :caption: Resources/Private/PageView/Pages/Subpage.html
    :linenos:
    :emphasize-lines: 1-9

..  _create_partial_breadcrumb:

Extract the breadcrumb into a partial
-------------------------------------

The subpage template contain a breadcrumb, between stage and content, that
you can also move to a partial.

The breadcrum partial looks like this:

..  literalinclude:: _codesnippets/_BreadcrumbPartial.html
    :caption: Resources/Private/PageView/Partials/Navigation/Breadcrumb.html

..  _the-website-layout-file:

Extract the repeated part to a layout
=====================================

Lines 1-9 of file `Subpage.html` in step :ref:`subpage` step are exactly the
same like in file :file:`Resources/Private/PageView/Pages/Default.html`.

We can extract these lines into a so called Fluid layout and load them with the
:ref:`Layout ViewHelper <f:layout> <t3viewhelper:typo3fluid-fluid-layout>`:

..  literalinclude:: _codesnippets/_include_layout.diff
    :caption: Resources/Private/PageView/Pages/Subpage.html (difference)

Save the extracted layout to a file called
:file:`Resources/Private/PageView/Layouts/Layout.html`. This file now contains
the following:

..  literalinclude:: /CodeSnippets/my_site_package/Resources/Private/PageView/Layouts/PageLayout.html
    :caption: packages/my_site_package/Resources/Private/PageView/Layouts/PageLayout.html
    :linenos:

Repeat the same for file :file:`Resources/Private/PageView/Pages/Default.html`.

..  directory-tree::
    :level: 3
    :show-file-icons: true

    *   packages/my_site_package/Resources/Private/PageView

        *   Layouts

            *   Layout.html

        *   Pages

            *   Default.html
            *   Subpage.html

        *   Partials

            *   Navigation

                *   Breadcrumb.html
                *   FooterMenu.html
                *   Menu.html

            *   Footer.html
            *   Header.html
            *   Stage.html

You can find the complete site package extension at this step at branch
`main-step/fluid <https://github.com/TYPO3-Documentation/TYPO3CMS-Tutorial-SitePackage-Code/tree/main-step/fluid>`__.
