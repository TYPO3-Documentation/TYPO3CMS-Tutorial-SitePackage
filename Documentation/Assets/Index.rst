:navigation-title: Assets
..  include:: /Includes.rst.txt
..  _design-template:
..  _assets-theme:

============================
Copy the assets of the theme
============================

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

..  _theme-example:

The example theme
=================

For the purpose of demonstration we created a theme based on Bootstrap and some
custom CSS / JavaScript.

You can download the files of the example theme from
https://github.com/TYPO3-Documentation/site_package/tree/main/Resources/Public

Now copy these files into folder :path:`Resources/Public` of your site package.

..  _theme-example-static-html:

The static HTML templates
=========================

In folder :path:`Resources/Public/StaticTemplate` you will now find two HTML
files. We will use these as example to create the
:ref:`Fluid templates <fluid-templates>` in the next step. Afterwards they can
be deleted or kept for reference.

During local development you can open these directly (using paths from your
operating system) in your browser to see what the site should look like after
we are finished with the site package.

..  note::
    If you want to work with your own theme or received a theme from a frontend
    developer make sure that all paths used within the theme are relative.

..  _theme-example-assets-symlink:

Symlinking Resources/Public into public/_assets
===============================================

When creating your :ref:`Minimal site package <t3sitepackage:minimal-design>`
your extension did not yet have a folder :path:`Resources/Public`. The symlink
from :folder:`public/_assets` gets automatically created during Composer
installation.

However as you newly created the folder, you must tell Composer to re-perform this initialization-process, which is done in the "dump-autoload" step.
autoload. During that process the symlinks will also be created by Composer.

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

