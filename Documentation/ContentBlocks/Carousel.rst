:navigation-title: Carousel
..  include:: /Includes.rst.txt

..  _carousel:

==============================
Carousel Content Block example
==============================

This content block demonstrates some additional features of
:composer:`friendsoftypo3/content-blocks`. We assume that you are already
familiar with the concepts described in chapter
`Custom Content Blocks <https://docs.typo3.org/permalink/t3sitepackage:content-blocks>`_.

..  contents:: Table of contents

..  _carousel-directory:

Directory structure of the carousel content element
===================================================

Additionally to the files that the jumbotron provides (compare
:ref:`content-blocks-jumbotron-directory`), the carousel comes with special CSS
and JavaScript needed for this element only.

Additionally it supplies a template for its display in the backend.

..  directory-tree::
    :level: 2
    :show-file-icons: true

    *   packages/my_site_package/ContentBlocks/ContentElements/carousel

        *   assets

            *   frontend.css
            *   frontend.js
            *   icon.svg

        *   language

            *   labels.xlf

        *   templates

            *   backend-preview.html
            *   frontend.html

        *   config.yaml

..  _carousel-configuration:

The carousel: A Content Block containing a collection of elements
=================================================================

The carousel can contain one or several items, each of which has an image,
header, and description:

..  literalinclude:: /CodeSnippets/my_site_package/ContentBlocks/ContentElements/carousel/config.yaml
    :caption: packages/my_site_package/ContentBlocks/ContentElements/carousel/config.yaml
    :linenos:

Line 8: We use a field of type
`Collection <https://docs.typo3.org/permalink/friendsoftypo3/content-blocks:field-type-collection>`_
to contain the items to be displayed in the carousel. This field type expects
an array of fields (line 10ff).

Line 15: We use the type
`File <https://docs.typo3.org/permalink/friendsoftypo3/content-blocks:field-type-file>`_
to reference the image for the carousel item. We allow images only (line 16)
and require exactly one image (lines 17 and 18).

Line 20: The title should be one line of text. We use the type
`Text <https://docs.typo3.org/permalink/friendsoftypo3/content-blocks:field-type-text>`_.

Line 22: The description may contain rich text. Therefore, we use the type
`Textarea <https://docs.typo3.org/permalink/friendsoftypo3/content-blocks:field-type-textarea>`_
and enable the Rich-Text Editor (line 23).

..  _carousel-fluid:

Frontend template: Fluid template for a Content Block with a Collection
=======================================================================

..  literalinclude:: /CodeSnippets/my_site_package/ContentBlocks/ContentElements/carousel/templates/frontend.html
    :caption: packages/my_site_package/ContentBlocks/ContentElements/carousel/templates/frontend.html
    :linenos:

Line 1: We use `Asset.css ViewHelper <f:asset.css> <https://docs.typo3.org/permalink/t3viewhelper:typo3-fluid-asset-css>`_
to load the provided CSS file only if a carousel is displayed on that page. The
`Asset collector <https://docs.typo3.org/permalink/t3coreapi:asset-collector>`_
takes care that the file is not loaded more then once per page. All Fluid
ViewHelpers prefixed with `cb:` are provided by :composer:`friendsoftypo3/content-blocks`
they are therefore not listed in the official View Helper reference. The inline
ViewHelper `cb:assetPath()` resolves paths to the `asset` folder of the current
content block.

Line 2: We use the `Asset.script ViewHelper <f:asset.script> <https://docs.typo3.org/permalink/t3viewhelper:typo3-fluid-asset-script>`_
to load the JavaScript file the same way.

Line 6: We use the `For ViewHelper <f:for> <https://docs.typo3.org/permalink/t3viewhelper:typo3fluid-fluid-for>`_
to loop through each item. We then render a button for each carousel item.

Line 11: We loop the items a second time to now display all carousel slides.

Line 13: The field `image` was defined with option `relationship: manyToOne` in
the :ref:`config.yaml <carousel-configuration>` it can therefore only contain
one image at maximum. As supplying an image is also mandatory `minitems: 1`
we can be sure there is always exactly one image. And just use the
`Image ViewHelper <f:image> <https://docs.typo3.org/permalink/t3viewhelper:typo3-fluid-image>`_
to display the image.

Line 16: As the field `{item.description}` is of type Textarea with rich-text
enabled we have to use the `Format.html ViewHelper <f:format.html> <https://docs.typo3.org/permalink/t3viewhelper:typo3-fluid-format-html>`_
to properly display it.

Line 23, 27: The previous and next buttons use localized text for their labels.
We use the `Translate ViewHelper <f:translate> <https://docs.typo3.org/permalink/t3viewhelper:typo3-fluid-translate>`_
to translate these labels and a view helper provided by the Content Block
extension to determine the path to the language file.

..  _carousel-backend-fluid:

Content Block with backend template
===================================

This Content Block contains a template to influence how the content elements
should be displayed in the TYPO3 backend in the Page module:

..  literalinclude:: /CodeSnippets/my_site_package/ContentBlocks/ContentElements/carousel/templates/backend-preview.html
    :caption: packages/my_site_package/ContentBlocks/ContentElements/carousel/templates/backend-preview.html
    :linenos:

The same fields like for the frontend template are available and the same
ViewHelpers can be used. However we display them in a simplified form.

Line 1: We are using the layout `Preview`, which already gives some structure to
the display of the backend element:

..  figure:: /Images/ContentBlocks/BackendLayout.png
    :alt: Screenshot of a Content Block in the TYPO3 Backend, demonstrating the sections of the layout

    The sections of a content element backend layout: (1) Header, (2) Content, (3) Footer

The line on the very top with the name of the content element, the icon and the
edit buttons is generated by TYPO3 automatically and cannot be influenced by
a backend template. It uses the label `title` defined in :file:`language/labels.xlf`
and the icon :file:`assets/icon.svg`.

As always we use the `Layout ViewHelper <f:layout> <https://docs.typo3.org/permalink/t3viewhelper:typo3fluid-fluid-layout>`_
to select the `Preview` layout.

Each section is declared using the `Section ViewHelper <f:section> <https://docs.typo3.org/permalink/t3viewhelper:typo3fluid-fluid-section>`_.

Line 10: We once more use the
`For ViewHelper <f:for> <https://docs.typo3.org/permalink/t3viewhelper:typo3fluid-fluid-for>`_
to loop through all items of the slider and display them one by one.

Line 21: Labels can and should also be localized in the backend. To not lose
context we prefixed all labels to be used in the backend with `backend.`.

..  tip::
    See also chapter `Backend Preview in the Content Blocks
    manual <https://docs.typo3.org/permalink/friendsoftypo3/content-blocks:api-backend-preview>`_.


..  _carousel-assets:

Content Block specific assets
=============================

The assets in folder :directory:`assets` can be loaded in the
:ref:`Frontend Template <carousel-fluid>`. They will only be loaded when the
Content Block is loaded on the current page. If compression
(:ref:`config.compressCss <t3tsref:confval-config-compresscss>`,
:ref:`config.compressJs <t3tsref:confval-config-compressjs>`) and concatenation
(:ref:`config.concatenateCss <t3tsref:confval-config-concatenatecss>`,
:ref:`concatenateJs <t3tsref:confval-config-concatenatejs>`) are enabled
all assets are compressed and concatenated into as few as possible small asset
files.

This also has the advantage that your JavaScript is only loaded if needed.
