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

..  _carousel-directory:

Directory structure of the carousel content element
===================================================

Additionally to the files that the jumbotron (compare
:ref:`content-blocks-jumbotron-directory`) the carousel comes with special CSS
and JavaScript needed for this element only.

Additionally it supplies a template for its display in the backend.

..  directory-tree::
    :level: 2
    :show-file-icons: true

    *   packages/my_site_package/ContentBlocks/ContentElements/jumbotron

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

Line 12: We use the type
`File <https://docs.typo3.org/permalink/friendsoftypo3/content-blocks:field-type-file>`_
to reference the image for the carousel item.

Line 14: The title should be one line of text. We use the type
`Text <https://docs.typo3.org/permalink/friendsoftypo3/content-blocks:field-type-text>`_.

Line 16: The description may contain rich text. Therefore, we use the type
`Textarea <https://docs.typo3.org/permalink/friendsoftypo3/content-blocks:field-type-textarea>`_
and enable the Rich-Text Editor (line 17).

..  _carousel-fluid:

Frontend template: Fluid template for a Content Block with a Collection
=======================================================================

..  literalinclude:: /CodeSnippets/my_site_package/ContentBlocks/ContentElements/carousel/templates/frontend.html
    :caption: packages/my_site_package/ContentBlocks/ContentElements/carousel/templates/frontend.html
    :linenos:

Line 1: We use `Asset.css ViewHelper <f:asset.css> <https://docs.typo3.org/permalink/t3viewhelper:typo3-fluid-asset-css>`_
to load the provided CSS file only if a carousel is displayed on that page. The
`Asset collector <https://docs.typo3.org/permalink/t3coreapi:asset-collector>`_
takes care that the file is not loaded more then once per page.

Line 2: We use the `Asset.script ViewHelper <f:asset.script> <https://docs.typo3.org/permalink/t3viewhelper:typo3-fluid-asset-script>`_
to load the JavaScript file the same way.

Line 6: We use the `For ViewHelper <f:for> <https://docs.typo3.org/permalink/t3viewhelper:typo3fluid-fluid-for>`_
to loop through each item. We then render a button for each carousel item.

Line 11: We loop the items a second time to now display all carousel slides.

Line 13: As the field of type "Files" may contain more then one file, the
variable {data.carousel_items} contains an array. We loop through the array
and display all images found.

Line 14: We use the `Image ViewHelper <f:image> <https://docs.typo3.org/permalink/t3viewhelper:typo3-fluid-image>`_
to display the image.

Line 18: As the field `{item.description}` is of type Textarea with rich-text
enabled we have to use the `Format.html ViewHelper <f:format.html> <https://docs.typo3.org/permalink/t3viewhelper:typo3-fluid-format-html>`_
to properly display it.

Line 25, 29: The previous and next buttons use localized text for their labels.
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
ViewHelpers can be used.
