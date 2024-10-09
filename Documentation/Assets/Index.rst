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

..  _asset-dependencies:

Managing asset dependencies in real life projects
=================================================

It is technically possible to use a CDN (Content Delivery Network) to include
libraries in TYPO3. However there are privacy and security risks attached to
this and it might be a GDPR Violation. Therefore we recommend to host all files
yourself by placing them in the :path:`Resources/Public` folder.

In a later step, you can use `npm <https://www.npmjs.com/>`__ (Node Package
Manager) to manage your JavaScript and CSS dependencies locally. We also
recommend using a JavaScript bundler like `Vite <https://vite.dev/>`__
that optimizes and bundles your assets efficiently. Vite can handle module
bundling, minification, and hot module replacement during development.
Once you have built the final assets, place the minified versions in the
:path:`Resources/Public` folder for use in TYPO3.

There are also TYPO3 extensions like :composer:`praetorius/vite-asset-collector`
to bundle your TYPO3 frontend assets with Vite.

