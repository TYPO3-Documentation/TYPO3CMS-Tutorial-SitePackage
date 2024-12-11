:navigation-title: Assets
..  include:: /Includes.rst.txt
..  _theme-example-static-html:
..  _theme-example:
..  _design-template:
..  _assets-theme:

=======================
Asset handling in TYPO3
=======================

Assets usually include CSS files, JavaScript and images / icons used for design
purposes.

Within an extension, including a site package, assets can only be placed in folder
:path:`Resources/Public` and subfolders of this folder. This folder will be
symlinked into :path:`public/_assets/<some hash>`.

..  note::
    You **must never** reference any file in :path:`public/_assets` directly by
    using the hash in an absolute or relative URL. The hashes can change at any
    time. Only use TYPO3 library methods to reference the assets.

Read more about assets in :ref:`Getting started, assets <t3start:assets>`.

..  contents::

..  _referencing-assets:

Referencing assets
==================

You can reference assets by prefixing the path with `EXT:extension_name`, for
example `EXT:my_site_package`.

For example the path to the favicon can be configured in TypoScript like this:

..  code-block:: typoscript

    page {
        shortcutIcon = EXT:my_site_package/Resources/Public/Icons/favicon.ico
    }

And a CSS asset can be loaded in Fluid using the
`Asset.css ViewHelper <f:asset.css> <https://docs.typo3.org/permalink/t3viewhelper:typo3-fluid-asset-css>`_
like this:

..  code-block:: html

    <f:asset.css identifier="main" href="EXT:my_site_package/Resources/Public/Css/main.css" />

..  _theme-example-assets-symlink:

Repairing the symlinks from packages/my_site_package/Resources/Public into public/_assets
=========================================================================================

In case you installed a site package before it had a folder called
:path:`Resources/Public` the symlinks did not get automatically created
during Composer installation.

In that case you can tell Composer to
re-perform this initialization-process, which is done in the "dump-autoload" step.
During that process the symlinks will also be created by Composer.

..  code-block:: bash

    ddev composer dump-autoload

..  _asset-dependencies:

Managing asset dependencies in real life projects
=================================================

It is technically possible to use a CDN (Content Delivery Network) to include
libraries in TYPO3. However there are privacy and security risks attached to
this and it might be a GDPR Violation. Therefore we recommend to host all files
yourself by placing them in the :path:`Resources/Public` folder.

In a later step, you can use `npm <https://www.npmjs.com/>`__ (Node Package
Manager) to manage your JavaScript and CSS dependencies locally. We also
recommend using a JavaScript bundler like `Vite <https://vite.dev/>`__.

If you decide to use a frontend bundler, make sure that the resulting asset
files are placed in a publicly available folder, like :path:`Resources/Public`
in your site package.

There are also TYPO3 extensions like :composer:`praetorius/vite-asset-collector`
to bundle your TYPO3 frontend assets with Vite.
