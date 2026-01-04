.. include:: /Includes.rst.txt

.. _typo3-backend-create-initial-pages:

====================
Create initial pages
====================

To follow this tutorial you need to have a few pages in your page tree and some
content elements on those pages. You also need a basic site configuration.

The site package you build in chapter
`Generate a site package <https://docs.typo3.org/permalink/t3sitepackage:minimal-design>`_
creates a folder called :path:`Initialisation`. This folder contains an example
page tree with some dummy content in file
:file:`packages/my_site_package/Initialisation/data.xml`,
and an example site configuration in file
:file:`packages/my_site_package/Initialisation/Site/main/config.yaml`. Folder
:path:`packages/my_site_package/Initialisation/data.xml.files` contains
some example images to demonstrate using certain content elements.

..  contents::

..  _load-example-data:

Load the example data automatically
===================================

After installing the site package you downloaded from https://get.typo3.org/sitepackage
run the following command:

..  code-block:: bash

    ddev typo3 extension:setup

Loading the data might take a few seconds. If you do not see the new pages try
reloading the backend.

..  figure:: PageModule.png
    :alt: Screenshot of the backend module "Page" with the loaded example data

    The page tree in the module :guilabel:`Content > Layout` now contains a few example pages.

..  note::
    This only works for site packages of type "Site Package Tutorial". The ones
    based on the Bootstrap Package or Fluid Styled Content do not contain example
    data.

.. _typo3-backend-site:

Site configuration
==================

If you followed :ref:`load-example-data` a basic configuration has
been created for you.

The site configuration is stored in a file called
:file:`config/sites/main/config.yaml`. You can edit this file in the
backend module :guilabel:`Sites > Setup`:

..  figure:: SiteConfiguration.png
    :alt: Screenshot of the backend module "Site Management"

    Edit the site configuration in  :guilabel:`Sites > Setup`

If you want to create a site configuration manually see
:ref:`Create a new site configuration <t3start:site-configuration>` in the
"Getting Started Tutorial".
