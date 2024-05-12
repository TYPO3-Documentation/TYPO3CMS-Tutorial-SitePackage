.. include:: /Includes.rst.txt

.. _extension-installation:

======================
Extension installation
======================

This tutorial assumes that your TYPO3 instance is a brand new installation,
without any themes, templates, pages or content.

We assume that you are working on your local machine using DDEV and that you
followed these steps:

:ref:`Installing TYPO3 with DDEV <t3start:installation-ddev-tutorial>`

.. _extension-installation_with_composer:

Install the site package you just created
=========================================

From all extensions, including our site package extension, must be installed
via Composer.

As a site package is created with site-specific files it is usually best to keep
the files together in a version control system such as Git.

Create a directory for local version-controlled extensions at the
root-level of your installation. The name is arbitrary, we use
:file:`packages/` here.

Then edit your :file:`composer.json` in the root of your installation directory
to add the path as a local repository.

Add the following lines:

.. code-block:: json
   :caption: page_root/composer.json

   {
      "name": "myvendor/mysite",
      "repositories": [
         {
            "type": "path",
            "url": "./packages/*"
         }
      ],
      "require": {
         "typo3/cms-core": "^12.4",
         "..." : "..."
      },
      "..." : "..."
   }

Move your extension folder :path:`site_package/` into the :path:`packages/`
folder. Then *require* the extension via Composer using the
package name defined in the site package extension's :file:`composer.json` now located
at :file:`packages/site_package/`

.. code-block:: json
   :caption: packages/site_package/composer.json

   {
      "name": "myvendor/site-package"
   }

require it by:

.. code-block:: bash
   :caption: Execute in directory page_root

    composer require myvendor/site-package:@dev

Project file structure
======================

Your project should now have the following structure:

..  directory-tree::
    :level: 1
    :show-file-icons: true

    *   .ddev

        *   :ref:`[Some configuration] <t3start:installation-ddev-tutorial>`

    *   config

        *   sites

            *   :ref:`[site identifier] <typo3-backend-site>`

                *   config.yaml

    *   packages

        *   site_package

            *   [All sitepackage files]

            *   composer.json

    *   public

        *   fileadmin

            *   [Images for content, PDFs, ...]

        *   [public files needed by TYPO3]

    *   var

        *   log
        *   [private files needed by TYPO3]

    *   vendor

        *   [All installed packages, including TYPO3 source]

    *   composer.json
    *   composer.lock
