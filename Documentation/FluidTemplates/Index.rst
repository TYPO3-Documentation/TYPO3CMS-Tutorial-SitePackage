.. include:: /Includes.rst.txt
.. highlight:: html

.. _fluid-templates:

===============
Fluid Templates
===============

Before we describe how the static files discussed in the previous section
:ref:`design-template` can be converted into Fluid templates, we should understand
what *Fluid* is and what the main ideas behind this powerful rendering engine
are. It is important to point out that the following section is just a quick
introduction. Further details about Fluid can be found at the `project
repository at GitHub <https://github.com/TYPO3Fluid/Fluid>`__ for example.


.. _quick-introduction-to-fluid:

Quick Introduction to Fluid
===========================

Like many other templating engines, Fluid reads *template files*,
processes them and replaces certain variables and specific tags with dynamic
content. The result is a fully working website with a clean and valid HTML
output. Dynamic elements are automatically updated as required. Navigation
menus are a typical example for this type of content. A menu exists on all
pages across the entire website. Whenever pages are added, deleted or renamed,
the menu items change.

Fluid takes modern templating a step further. By using *ViewHelpers*,
developers can implement complex functionality and therefore extend the
original functionality of Fluid to their heart's content. ViewHelpers are built
in the programming language PHP. Having said that, website integrators or
editors are not required to learn or understand these (this is the
responsibility of a software developer). Integrators only need to **apply**
them -- and this is as easy as adding an HTML tag such as :html:`<image.../>` to an
HTML file.

More than 80 ViewHelpers are shipped with the TYPO3 core already. They enable
integrators and web developers to use translations of variables, generate forms
and dynamic links, resize images, embed other HTML files and even implement
logical functions such as :html:`if ... then ... else ...`. An overview of the
available ViewHelpers and how to apply them can be found in the `Fluid ViewHelper Documentation
<https://docs.typo3.org/other/typo3/view-helper-reference/main/en-us/Index.html>`__.


.. _ft-directory-structure:

Directory Structure
===================

Fluid requires a specific directory structure to store the template files. If
you are working through this tutorial now, this is a perfect time to create the
first set of folders of the sitepackage extension. The initial directory can
be named :file:`site_package/`, which we assume is located on your local
machine. You can also choose a different name such as "site_example" or
"site_clientname", but this tutorial uses "site_package".

The aforementioned folders for Fluid are all located as sub-directories of a
folder called :file:`Resources/`. Therefore, create the directory structure as
listed below.

..  directory-tree::
    :level: 4
    :show-file-icons: true

    *   EXT:my_sitepackage

        *   Resources

            *   Private

                *   Language

                *   Templates

                    *   Layouts

                    *   Pages

                    *   Partials

            *   Public

                *   Css

                *   Images

                *   JavaScript

                *   StaticTemplate

The :file:`Public/` directory branch is self-explanatory: it contains folders
such as :file:`Css/`, :file:`Images/`, :file:`JavaScript/` and
:file:`StaticTemplate/`. All files in these folders will be delivered to the
user (website visitors) *as they are*. These are **static** files which are not
modified by TYPO3 at all before they are sent to the user.

The :file:`Private/` directory with its two sub-folders :file:`Language/` and
:file:`Templates/` in contrast, requires some explanation.

.. _fluid-templates-folders-under-private:

Folders under 'Private/'
------------------------

.. _fluid-templates-folders-under-private-templates-layouts:

Templates/Layouts
~~~~~~~~~~~~~~~~~
HTML files, which build the overall *layout* of the website, are stored in the
:file:`Layouts/` folder. Typically this is only **one** construct for all
pages across the entire website. Pages can have different layouts of course,
but *page layouts* do not belong into the :file:`Layouts/` directory. They are
stored in the :file:`Templates/Pages/` directory (see below). In other words, the
:file:`Layouts/` directory should contain the global layout for the entire website
with elements which appear on all pages (e.g. the company logo, navigation
menu, footer area, etc.). This is the skeleton of your website.

.. _fluid-templates-folders-under-private-templates-pages:

Templates/Pages
~~~~~~~~~~~~~~~
The most important fact about HTML files in the :file:`Templates/Pages` directory
has been described above already: this folder contains layouts, which are page-
specific. Due to the fact that a website usually consists of a number of pages
and some pages possibly show a different layout than others (e.g. number of
columns), the :file:`Templates/Pages/` directory may contain one or multiple HTML files.

.. _fluid-templates-folders-under-private-templates-partials:

Templates/Partials
~~~~~~~~~~~~~~~~~~
The directory called :file:`Partials/` may contain small
snippets of HTML template files. "Partials" are similar to templates, but their
purpose is to represent small units, which are perfect to fulfil recurring
tasks. A good example of a partial is a specially styled box with content that
may appear on several pages. If this box would be part of a page layout, it
would be implemented in one or more HTML files inside the :file:`Templates/Pages/`
directory. If an adjustment of the box is required at one point in the future,
this would mean that several template files need to be updated. However, if we
store the HTML code of the box as a small HTML snippet into the :file:`Partials/`
directory, we can include this snippet at several places. An adjustment only
requires an update of the partial and therefore in one file only.

The use of partials is optional, whereas files in the :file:`Layouts/` and
:file:`Templates/Pages` directories are mandatory for a typical sitepackage
extension.

The sitepackage extension described in this tutorial focuses on the
implementation of pages, rather than specific content elements.

.. _fluid-templates-folders-under-private-language:

Language
~~~~~~~~
The directory :file:`Language/` may contain :file:`.xlf` files that are used for
the localization of labels and text strings (frontend as well as backend) by
TYPO3. This topic is not strictly related to the Fluid template engine and is
documented in section
:ref:`Internationalization and Localization <t3coreapi:internationalization>`.


.. _implement-templates-files:

Implement template files
========================

Based on the facts explained above, it should be easy to copy the *static
files* from the :ref:`design-template` into the appropriate folders of the site
package directory structure.

The custom CSS file, as well as the custom JavaScript file, are files which
will be maintained by a developer and never modified by TYPO3 at all. The same
applies to the logo. However, TYPO3 may create a *modified copy* of the image,
but should never manipulate the original image file (the "source"). Therefore,
all three files can be classified as *static* and copied to the :file:`Public/`
folder as follows.

* :file:`site_package/Resources/Public/Css/website.css`
* :file:`site_package/Resources/Public/JavaScript/website.js`
* :file:`site_package/Resources/Public/Images/logo.svg`

As discussed before, the Bootstrap and jQuery files should be ignored for the
time being. This leaves us with the :file:`index.html` file, more precisely with
the :html:`<body>`-part of that file.

Due to the fact that this file needs to be rendered and enriched with dynamic
content from the CMS, it can not be *static* and the content of this file will
not be sent to the user directly. Therefore, this file should be stored
somewhere inside the :file:`Resources/Private/` directory. The question about
the exact sub-directory pops up though: is :file:`Templates/Layouts`
or :file:`Templates/Pages` the perfect fit?

In our case, directory :file:`Templates/Pages` is the correct
folder, because this is the entry point for all page templates, despite the
fact that our :file:`index.html` file in fact implements the layout of the entire
site. Therefore, the :file:`index.html` file gets copied into
:file:`Templates/Pages` and renamed to :file:`Default.html` (in order
to visualize that this file represents the layout of a default page).

As a result, we end up with the following structure.

..  directory-tree::
    :level: 3
    :show-file-icons: true

    *   EXT:my_sitepackage

        *   Resources

            *   Private

                *   Language

                *   Templates

                    *   Layouts

                    *   Pages

                        *   Default.html
                        *   Subpage.html

                    *   Partials

            *   Public

                *   Css

                    *   website.css

                *   Images

                    *   logo.svg

                *   JavaScript

                    *   website.js

                *   StaticTemplate


The point is that TYPO3 follows the *convention over configuration* principle.
This is a software design paradigm to decrease the number of decisions that a
web developer is required to make. Simply learn and follow the conventions
(e.g. that the path should be :file:`Resources/Private/Templates/`) and the
development will be smooth, easy and straight forward. In addition, if another
web developer (e.g. one of your colleagues) looks at your sitepackage
extension, they know the locations and naming of files. This reduces
development time significantly, e.g. if an issue needs to be investigated or a
change should be implemented.

Furthermore, you might want to consider technologies such as Sass, SCSS and
TypeScript for improved productivity and maintainability of your style sheets
and JavaScript code. For the sake of simplicity, this tutorial uses the basic
implementation of Cascading Style Sheets (CSS) and JavaScript files.

.. _the-page-layout-file:
.. _create_template:

Create the Fluid templates
==========================

Copy the :ref:`static HTML file <design-template>` from
:file:`Resources/Public/StaticTemplate/index.html`
to :file:`Resources/Private/Templates/Pages/Default.html`.

Even though this file ends on `.html` it will be interpreted by the templating
engine Fluid.

TYPO3 takes care of creating the outermost HTML structure of the site, including
the `<html>` and `<head>` tags therefore they need to be removed from the
template:

..  literalinclude:: _codesnippets/_assets.diff
    :caption: Resources/Private/Templates/Pages/Default.html (difference)

The Fluid template :file:`Default.html` now contains only the HTML
code inside the body:

..  literalinclude:: _codesnippets/_DefaultWithoutHead.html
    :caption: Resources/Private/Templates/Pages/Default.html

..  _typoscript-configuration-css-js-inclusion:
..  _assets:

Load assets (CSS, JavaScript)
-----------------------------

Load all CSS which had been removed in step :ref:`create_template`
using the :ref:`Asset.css ViewHelper <f:asset.css> <t3viewhelper:typo3-fluid-asset-css>`.

Replace `<script>` tags in the body by using the
:ref:`Asset.script ViewHelper <f:asset.script> <t3viewhelper:typo3-fluid-asset-script>`.

..  literalinclude:: _codesnippets/_assets.diff
    :caption: Resources/Private/Templates/Pages/Default.html (difference)

The path to the assets will be resolved by TYPO3. `EXT:` tells TYPO3 that this is
an extension path. `site_package` is the
:ref:`Extension name defined in the composer.json <extension-configuration-composer>`.

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
    :caption: Resources/Private/Templates/Pages/Default.html (difference)

Just like happened with the CSS paths in step :ref:`assets` the path to the
image is now replaced in the output by a path like
`/_assets/99a57ea771f379715c522bf185e9a315/Images/logo.svg?1728057333`.

..  _create_partial_jumbotron:
..  _partials:

Split up the Template into partials
-----------------------------------

If you compare the two static templates
:file:`Resources/Public/StaticTemplate/default.html`
and :file:`Resources/Public/StaticTemplate/subpagepage.html` they share many
parts like the footer or the header with the menu. In order to reuse those parts
we extract them to their own Fluid files. These are called partials and stored
in path :path:`Resources/Private/Templates/Partials`.

We can use the :ref:`Render ViewHelper <f:render> <t3viewhelper:typo3-fluid-render>`
to render the partial in the correct place.

Remove the header from the template and replace it with a render ViewHelper:

..  literalinclude:: _codesnippets/_remove_header.diff
    :caption: Resources/Private/Templates/Pages/Default.html (difference)

Move the Fluid code you just remove to a file called
:file:`sitepackage/Resources/Private/Templates/Partials/Header.html`.

Do the same with the jumbotron, the breadcrumb, and the footer.

You should now have the following files:

..  directory-tree::
    :level: 3
    :show-file-icons: true

    *   EXT:my_sitepackage/Resources/Private/Templates

    *   Layouts

        * [empty]

    *   Pages

        *   Default.html
        *   Subpage.html

    *   Partials

        *   Footer.html
        *   Header.html
        *   Jumbotron.html

The Fluid template :file:`Resources/Private/Templates/Pages/Default.html`
should now look like this:

..  literalinclude:: _codesnippets/_DefaultWithPartials.html
    :caption: Resources/Private/Templates/Pages/Default.html

You will learn how to display the dynamic content in chapter :ref:`content-mapping`.

..  _create_partial_header:

Extract the menu into a partial
-------------------------------

Partials can also be rendered from within another partial. We move the menu in
the partial :file:`Resources/Private/Templates/Partials/Header.html` to its
own partial, :file:`Resources/Private/Templates/Partials/Navigation/Menu.html`:

..  literalinclude:: _codesnippets/_remove_menu_from_header.diff
    :caption: EXT:site_package/Resources/Private/Templates/Partials/Header.html (Difference)

The :ref:`Render ViewHelper <f:render> <t3viewhelper:typo3-fluid-render>` is used
the same like from within the template.

Chapter :ref:`Main menu <t3sitepackage:main-menu-creation>` will teach you how
to make the menu work.

..  _create_section:

Move the content into a section
-------------------------------

You can also move a part of the template into a section, surrounded by a
:ref:`Section ViewHelper <f:section> <t3viewhelper:typo3fluid-fluid-section>`
and use the :ref:`Render ViewHelper <f:render> <t3viewhelper:typo3-fluid-render>`
with argument `section` to render it.

We move the content, including the Jumbotron into such a section:

..  literalinclude:: _codesnippets/_move_content_to_section.diff
    :caption: Resources/Private/Templates/Pages/Default.html (difference)

The result looks like this:

..  literalinclude:: _codesnippets/_DefaultWithSection.html
    :caption: Resources/Private/Templates/Pages/Default.html

You will learn how to display the dynamic content in chapter :ref:`content-mapping`.

.. _subpage:

The Fluid template for the subpage
==================================

We can repeat the above steps for the subpage and write such a template:

..  literalinclude:: _codesnippets/_SubpageWithSection.html
    :caption: Resources/Private/Templates/Pages/Subpage.html
    :linenos:
    :emphasize-lines: 1-9

.. _the-website-layout-file:

Extract the repeated part to a layout
=====================================

Lines 1-9 are exactly the same like in file
:file:`Resources/Private/Templates/Pages/Default.html`. We can extract these
lines into a so called Fluid layout and load them with the
:ref:`Layout ViewHelper <f:layout> <t3viewhelper:typo3fluid-fluid-layout>`:

..  literalinclude:: _codesnippets/_include_layout.diff
    :caption: Resources/Private/Templates/Pages/Subpage.html (difference)

Save the extracted layout to a file called
:file:`Resources/Private/Templates/Layouts/Layout.html`. This file now contains
the following:

..  include:: /CodeSnippets/Fluid/Layout.rst.txt

Repeat the same for file :file:`Resources/Private/Templates/Pages/Default.html`.

..  directory-tree::
    :level: 3
    :show-file-icons: true

    *   EXT:my_sitepackage/Resources/Private/Templates

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
            *   Jumbotron.html

.. toctree::
   :titlesonly:

   MoreInformation/Index
