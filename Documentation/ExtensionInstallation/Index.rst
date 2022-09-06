.. include:: /Includes.rst.txt

.. _extension-installation:

======================
Extension installation
======================

This tutorial assumes that your TYPO3 instance is a brand new installation,
without any themes, templates, pages or content. See the :doc:`TYPO3
Installation Guide <t3install:Index>` for a detailed explanation how to set up
a TYPO3 instance from scratch.

We highly recommend to use :ref:`the Composer -based installation process
<t3start:install-extension-with-composer>`. During development you should work locally
on your machine for example by running TYPO3 on ddev.

If you need to follow the legacy way of installation, see :ref:`Site package
installation without Composer <extension-installation_without_composer>`.


.. _extension-installation_with_composer:

Extension installation in Composer mode
=======================================

Starting with TYPO3 11.4 if composer is used, all extensions, including the
site package extension must be installed via Composer.

As a site package is usually developed together with the site-specific files it
is usually desirable to keep them together in a version control system like
Git.

Therefore create a directory for all locally version-controlled extension at
root-level of your Composer -based installation. The name is arbitrary, we use
:file:`local_packages` here.

Then edit your :file:`composer.json` in the root of your installation directory
to add the path as a local repository.

Add the following lines:

.. code-block:: json
   :caption: page_root/composer.json

   {
      "name": "myvendor/my-project",
      "repositories": [
         {
            "type": "path",
            "url": "./local_packages/*"
         }
      ],
      "require": {
         "typo3/cms-core": "11.4",
         "..." : "..."
      },
      "..." : "..."
   }

Move your the extension folder :file:`site_package` directly into the folder
:file:`local_packages`. Then *require* the extension via Composer  using the
`name` defined in the site package extensions :file:`composer.json` now located
at :file:`local_packages/site_package/`. For example if you defined the name as

.. code-block:: json
   :caption: local_packages/site_package/composer.json

   {
      "name": "myvendor/site-package-myproject"
   }

require it by:

.. code-block:: bash
   :caption: Execute in directory page_root

    composer require myvendor/site-package-myproject:@dev

.. hint::

   Starting with TYPO3 11.4 all extensions required via Composer are
   automatically considered active. In previous versions it is still necessary
   to activate the extension after the Composer-based installation via the
   :guilabel:`Extension Manager`.

.. toctree::
   :titlesonly:
   :glob:

   *
