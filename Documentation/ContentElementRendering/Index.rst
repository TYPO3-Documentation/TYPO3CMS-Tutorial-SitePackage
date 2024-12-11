:navigation-title: Content Element rendering
..  include:: /Includes.rst.txt

..  _content-element-rendering:

====================================================
Overriding the default templates of content elements
====================================================

The content elements that are rendered up to this point are rendered by the
TYPO3 system extension Fluid Styled Content (:composer:`typo3/cms-fluid-styled-content`).

This extensions offers default templates to render content elements. Without
such an extension, no content would be rendered at all. The default
templates provided by this extension can be overridden with site settings
provided by Fluid Styled Content.

..  contents::

..  _content-element-rendering-settings:

Use Settings to override template paths of Fluid Styled Content
===============================================================

Site settings can be saved both in the site configuration and in the site
package extension.

We will save the settings to the site package but use the settings editor to
write the YAML for us.

Go to module :guilabel:`Site Management > Settings` and edit the settings of
your site. Override the paths to the templates of Fluid Styled Content like this:

..  figure:: /Images/SiteSettingsFsc.png
    :alt: Screenshot demonstrating the site settings module

    Override the templates of Fluid Styled Content

If you would click :guilabel:`Save` now, the settings would be saved to your
site configuration at :path:`config/sites/my-site/settings.yaml`. We however
want to save the settings to the site set of our site package extension.

Click the button :guilabel:`YAML export` to copy the configuration to your
Clipboard instead, then save it to the following file:

..  code-block:: yaml
    :caption: packages/site_package/Configuration/Sets/SitePackage/settings.yaml

    styles:
      templates:
        templateRootPath: 'EXT:my_site_package/Resources/Private/ContentElements/Templates'
        partialRootPath: 'EXT:my_site_package/Resources/Private/ContentElements/Partials'
        layoutRootPath: 'EXT:my_site_package/Resources/Private/ContentElements/Layouts'

Then close the settings editor without saving. You can now start overriding the
templates:

..  _content-element-rendering-menu-subpages:

Override the "Menu of Subpages" template
========================================

On "Page 1" of the example data a content element of type "Subpages" was added.
We now have to find out what this type is called in the database. The raw values
saved to the database are displayed in the TYPO3 backend when the debug mode
is activated:

..  figure:: /Images/MenuContentElement.png
    :alt: Screenshot demonstrating the backend debug mode for Content element "Subpages" on "Page 1"

    You can now see that the Type (saved in field `CType`) is stored as `menu_subpages`

Now we must find and copy the original template from Fluid Styled Content. TYPO3
extensions are saved by their composer key, here :composer:`typo3/cms-fluid-styled-content`,
into the folder :path:`vendor` during installation via Composer. You can find
the files belonging to Fluid Styled Content in folder
:path:`vendor/typo3/cms-fluid-styled-content` therefore. This folder is
structured similarly to your site package extension and you can find the original
templates in folder :path:`Resources/Private/PageView` here.

By convention the templates of Fluid Styled Content have the name of the `CType` in CamelCase. Copy file
:path:`vendor/typo3/cms-fluid-styled-content/Resources/Private/Templates/MenuSubpages.html`
into folder :path:`packages/my_site_package/Resources/Private/ContentElements/Templates/MenuSubpages.html`

Edit the file to add some classes as used in menus in Bootstrap, for example
like this:

..  literalinclude:: /CodeSnippets/my_site_package/Resources/Private/ContentElements/Templates/MenuSubpages.html
    :caption: packages/my_site_package/Resources/Private/ContentElements/Templates/MenuSubpages.html
    :linenos:

In most parts the changes we made are pretty straight forward. In line 9
we use the `Fluid inline notation <https://docs.typo3.org/permalink/t3coreapi:fluid-inline-notation>`_
of the :ref:`If ViewHelper <f:if> <t3viewhelper:typo3fluid-fluid-if>` to only
output class `active` if the page in the menu is in the root line.

..  _content-element-rendering-sitemap:

Override the sitemap template
=============================

In a similar fashion we now copy and adjust the template for the sitemap from
:path:`vendor/typo3/cms-fluid-styled-content/Resources/Private/Templates/MenuSitemap.html`
into folder :path:`packages/site_package/Resources/Private/ContentElements/Templates/MenuSitemap.html`
and then adjust it:

..  literalinclude:: /CodeSnippets/my_site_package/Resources/Private/ContentElements/Templates/MenuSitemap.html
    :caption: packages/my_site_package/Resources/Private/ContentElements/Templates/MenuSitemap.html
    :linenos:

We want to adjust the HTML output of the sitemap for different levels. The
original template however gives us no means to output the level.

Line 5 uses the ViewHelper :ref:`Render ViewHelper <f:render> <t3viewhelper:typo3-fluid-render>`
to render everything in the section defined in lines 8-23.

In the original template the argument `menu` was already passed on as variable to
the section. We now enhance this line to also pass on variable `level` set to 1.

In line 17 the section `Menu` recursively includes itself to display further
levels of the sitemap. We now add 1 to the level so that within the recursive
call we are in level 2.

In line 14 we use that level to determine which class to use for the page link,
using once more the `Fluid inline notation <https://docs.typo3.org/permalink/t3coreapi:fluid-inline-notation>`_
of the :ref:`If ViewHelper <f:if> <t3viewhelper:typo3fluid-fluid-if>`.

..  _content-element-rendering-image:

Override the partial template for image rendering
=================================================

The templates of some content elements use the
:ref:`Render ViewHelper <f:render> <t3viewhelper:typo3-fluid-render>` to include
a partial template. This is true wherever images are displayed for example.

Partials in turn can include different partials.

The templates for "Image" and "Textpic" both contain the following line:

..  code-block:: html
    :caption: vendor/typo3/cms-fluid-styled-content/Resources/Private/Templates/Image.html (Excerpt)

    <f:render partial="Media/Gallery" arguments="{_all}" />

If you open that partial, it includes yet another partial:

..  code-block:: html
    :caption: vendor/typo3/cms-fluid-styled-content/Resources/Private/Partials/Media/Gallery.html (Excerpt)

    <f:render partial="Media/Type" arguments="{file: column.media, dimensions: column.dimensions, data: data, settings: settings}" />

Which contains another until we finally arrive at
:path:`vendor/typo3/cms-fluid-styled-content/Resources/Private/Partials/Media/Rendering/Image.html`
which does contain the actual :ref:`Media ViewHelper <f:media> <t3viewhelper:typo3-fluid-media>`.

By overriding this one partial we can add a class to all images that are
displayed with the "Image" or "Text with Media" content elements. For example
we could display all images as circles by adding the class `rounded-circle`:

..  literalinclude:: /CodeSnippets/my_site_package/Resources/Private/ContentElements/Partials/Media/Rendering/Image.html
    :caption: packages/my_site_package/Resources/Private/ContentElements/Partials/Media/Rendering/Image.html
    :linenos:
