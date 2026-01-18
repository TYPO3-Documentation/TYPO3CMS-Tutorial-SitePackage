:navigation-title: Custom Content Blocks
..  include:: /Includes.rst.txt

..  _content-blocks:

=====================
Custom Content Blocks
=====================

When we filled the `stage with content <https://docs.typo3.org/permalink/t3sitepackage:slide-mode>`_
we noticed that the content does not look like the content within the original
HTMl layout.

This is because the stage does not contain normal content, as provided by
Fluid-Styled Content, but a Jumbotron element or a slider.

..  contents:: Table of contents

..  note::
    The extension :composer:`friendsoftypo3/content-blocks` is not an official
    part of the TYPO3 Core yet. It is also possible to
    `Create a custom content element with TYPO3 Core only <https://docs.typo3.org/permalink/t3coreapi:adding-your-own-content-elements>`_.

..  toctree::
    :glob:
    :hidden:

    *

..  _content-blocks-installation:

Install extension Content Blocks
================================

The extension :composer:`friendsoftypo3/content-blocks` is an extension that
is not part of the TYPO3 Core but maintained by a group of community members.

There are plans to integrate this extension into the Core, however at the
time of writing there are no finite decisions yet.

First install the extension :composer:`friendsoftypo3/content-blocks`:

..  code-block:: bash

    ddev composer req friendsoftypo3/content-blocks

Set up the extension and delete all caches:

..  code-block:: bash

    ddev typo3 extension:setup
    ddev typo3 cache:flush

..  _content-blocks-jumbotron:

The jumbotron Content Block
===========================

The site package you generated in step
`Generate a site package <https://docs.typo3.org/permalink/t3sitepackage:minimal-design>`_
comes with two content elements. We look at the more basic content elements first.

You can now replace the content element in the area "Stage" of start page with
one of type "Jumbotron".

..  figure:: /Images/ContentBlocks/CreateContentElement.png
    :zoom: lightbox
    :alt: Screenshot of the "New Page Content" dialog with the Carousel and Jumbotron as additional features

    The new Content Blocks "Jumbotron" and "Carousel"

You can now create a jumbotron with a button and a link.

Directory :path:`packages/my_site_package/ContentBlocks/ContentElements` contains
one directory for each Content Block that can be used as normal Content Elements.

..  _content-blocks-jumbotron-directory:

Directory structure of a Content Block
--------------------------------------

A Content Block consists of a configuration (:file:`config.yaml`), a template and
optionally assets and or language files:

The jumbotron consists of the following files:

..  directory-tree::
    :level: 2
    :show-file-icons: true

    *   packages/my_site_package/ContentBlocks/ContentElements/jumbotron

        *   assets

            *   icon.svg

        *   language

            *   labels.xlf

        *   templates

            *   frontend.html

        *   config.yaml

..  _content-blocks-jumbotron-config:

The configuration of the jumbotron Content Block
------------------------------------------------

File :path:`packages/my_site_package/ContentBlocks/ContentElements/jumbotron/config.yaml`
defines what fields should be available for the Content Block in the backend:

..  literalinclude:: /CodeSnippets/my_site_package/ContentBlocks/ContentElements/jumbotron/config.yaml
    :caption: packages/my_site_package/ContentBlocks/ContentElements/jumbotron/config.yaml
    :linenos:

Each Content Block must have a unique name with a prefix of your choice that
should be unique within your project. (Line 1)

It is possible to use fields that are already pre-defined in the TYPO3 Core like
`header` (Line 8) and `bodytext` (Line 11).

We also newly define two fields, one of type `Text <https://docs.typo3.org/permalink/friendsoftypo3/content-blocks:field-type-text>`_
(Line 15-19) and one of type `Link <https://docs.typo3.org/permalink/friendsoftypo3/content-blocks:field-type-link>`_
(Line 21-23). You can find all available types here: `Field Types <https://docs.typo3.org/permalink/friendsoftypo3/content-blocks:field-types>`_.

The meaning behind the other settings here can be found in the
`YAML reference of the Content Blocks guide <https://docs.typo3.org/permalink/friendsoftypo3/content-blocks:yaml-reference>`_.

..  _content-blocks-jumbotron-template:

The jumbotron template
----------------------

The frontend template for the Content Block "Jumbotron" is a normal Fluid
template. You already used Fluid for the
`Page templates <https://docs.typo3.org/permalink/t3sitepackage:fluid-templates>`_
and to adjust the templates of Fluid-Styled Content elements in chapter
`Overriding the default templates of content elements <https://docs.typo3.org/permalink/t3sitepackage:content-element-rendering>`_.

..  literalinclude:: /CodeSnippets/my_site_package/ContentBlocks/ContentElements/jumbotron/templates/frontend.html
    :caption: packages/my_site_package/ContentBlocks/ContentElements/jumbotron/templates/frontend.html
    :linenos:

Line 3: The values of the database entry of the current content element can be
found in variable `{data}`. In this line we render the content of the field
`header`. The field was defined in line 8 of the :file:`config.yaml`.

Line 4: Here we output the content of field `bodytext` as this field is a
Rich-Text Editor we use the
`Format.html ViewHelper <f:format.html> <https://docs.typo3.org/permalink/t3viewhelper:typo3-fluid-format-html>`_
to format and sanitize the output.

Line 5: We use the `Link.typolink ViewHelper <f:link.typolink> <https://docs.typo3.org/permalink/t3viewhelper:typo3-fluid-link-typolink>`_
to render a link to the target that was defined in our custom field `button_link`.

..  _content-blocks-carousel:

The carousel Content Block
==========================

The carousel Content block is provided in the generated site package as an
example on how to create a content block that contains on repeated items, here a
carousel with multiple slides.

It is described in chapter `Carousel Content Block example <https://docs.typo3.org/permalink/t3sitepackage:carousel>`_.

..  _content-blocks-next:

Next steps
==========

*   Learn how to use the `Kickstart command <https://docs.typo3.org/permalink/friendsoftypo3/content-blocks:cb-skeleton>`_
    to create your own Content Blocks.
