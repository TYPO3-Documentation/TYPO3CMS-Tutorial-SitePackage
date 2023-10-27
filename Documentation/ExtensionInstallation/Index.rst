.. include:: /Includes.rst.txt

.. _extension-installation:

======================
Extension installation
======================

This tutorial assumes that your TYPO3 instance is a brand new installation,
without any themes, templates, pages or content. See the :doc:`TYPO3
Installation Guide <t3install:Index>` for a detailed explanation on how to set up
a TYPO3 instance from scratch.

We highly recommend using :ref:`the Composer -based installation process
<t3start:install-extension-with-composer>`. During development you should work locally
on your machine, e.g. by running TYPO3 on ddev.

If you need to follow the legacy installation method, see :ref:`Site package
installation without Composer <extension-installation_without_composer>`.


.. _extension-installation_with_composer:

Extension installation in Composer mode
=======================================

From TYPO3 v11.4 if Composer is used, all extensions, including our
site package extension, must be installed via Composer.

As a site package is created with site-specific files it is usually best to keep
the files together in a version control system such as Git.

Create a directory for local version-controlled extensions at the
root-level of your Composer-based installation. The name is arbitrary, we use
:file:`packages/` here.

Then edit your :file:`composer.json` in the root of your installation directory
to add the path as a local repository.

Add the following lines:

.. code-block:: json
   :caption: page_root/composer.json

   {
      "name": "myvendor/site-package",
      "repositories": [
         {
            "type": "path",
            "url": "./packages/*"
         }
      ],
      "require": {
         "typo3/cms-core": "11.4",
         "..." : "..."
      },
      "..." : "..."
   }

Move your extension folder :file:`site_package/` into the :file:`packages/`
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

.. hint::

   From TYPO3 v11.4 all extensions required via Composer are
   automatically active. In previous versions it was still necessary
   to activate the extension after the Composer-based installation via the
   :guilabel:`Extension Manager`.

.. toctree::
   :titlesonly:
   :glob:

   *
