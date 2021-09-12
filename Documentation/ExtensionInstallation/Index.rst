.. include:: ../Includes.txt

.. _extension-installation:

======================
Extension installation
======================

This tutorial assumes that your TYPO3 instance is a brand new installation,
without any themes, templates, pages or content. See the :ref:`TYPO3
Installation Guide <t3install:start>` for a detailed explanation how to set up
a TYPO3 instance from scratch.

We highly recommend to use :ref:`the Composer -based installation process
<t3install:composer-working-with>`. During development you should work locally
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

   {
      "name": "myvendor/site-package-myproject"
   }

require it by:

.. code-block:: bash

    composer require myvendor/site-package-myproject:@dev

.. hint::

   Starting with TYPO3 11.4 all extensions required via Composer are
   automatically considered active. In previous versions it is still necessary
   to activate the extension after the Composer-based installation via the
   :guilabel:`Extension Manager`.

.. _typo3-backend-create-initial-pages:

Create Initial Pages
====================

In the next step, we create some initial pages. You and your editors will be
able to create further pages, remove pages, enable and disable pages and
shuffle pages around in the future. The following page tree is just an example
as a starting point.

Go to **WEB → Page**. Assuming, we are using a fresh installation of TYPO3 as
outlined in section :ref:`prerequisites`, an almost empty area is shown in the
page tree area. The only entry is the name of the website as defined during the
installation process (e.g. "New TYPO3 site") with a grey TYPO3 logo.

By clicking the page icon with the "plus" at the top, and then dragging the
"standard page" icon to its appropriate position in the page tree, you can
build the following page tree. Enter the page names as shown (a double-click on
the page name allows you to rename it).

.. figure::  /Images/ManualScreenshots/CreateInitialPages.png
   :alt: Create Initial Pages
   :class: with-shadow

   Create initial pages


By default, all new pages are disabled (marked as a red icon at the bottom
right). Enable all pages by clicking the "Enable" link in the context menu.

.. figure::  /Images/ManualScreenshots/EnablePagesInContextMenu.png
   :alt: Enable Pages in Context Menu
   :class: with-shadow

   Enable Pages in Context Menu


Once all pages have been created, you should end up with the following page
tree.

.. figure::  /Images/ManualScreenshots/FinalPageTree.png
   :alt: Final Page Tree
   :class: with-shadow


.. .. code-block: : none
..
..   New TYPO3 site
..    │
..    └── example.com
..         │
..         ├── Page 1
..         │
..         ├── Page 2
..         │
..         └── Page 3


.. _typo3-backend-typoscript-template:

TypoScript Template
===================

Now we will add a TypoScript template to the site and include the TypoScript
configuration we have created during the development of our sitepackage. Do
not be confused about the terminology "template". In this context, we are
referring to TypoScript templates, not HTML/CSS/JS templates.

Go to **WEB → Template** and select the page named "example.com". Then, click
button "Create template for a new site" and change the dropdown box at the top
to "Info/Modify". Click button "Edit the whole template record", which opens an
editor for Constants and Setup. The latter contains a few example lines ("HELLO
WORLD!"). Remove these lines, so that the box is completely empty.

Change to tab "Includes" and look for the section "Include static (from
extensions)", which shows two boxes: "Selected Items" (left hand side) and
"Available Items" (right hand side). Under "Available Items", click "Site
Package (site_package)", which moves the entry to the left box.

.. figure::  /Images/ManualScreenshots/IncludeTypoScriptTemplate.png
   :alt: Include TypoScript Template
   :class: with-shadow

Now save your changes by clicking the "save" icon at the top.


Preview Page
============

At this point, it is a good time to preview what we have achieved so far. Go to
**WEB → View** and try a few different screen widths. The two buttons at the
top left of the screen (marker 1) allow you to show/hide the page tree and to
minimize the function menu at the left.

.. figure::  /Images/ManualScreenshots/ExtensionInstallationPreviewPage.png
   :alt: Preview Page
   :class: with-shadow

The preview shows the frontend with a menu (*NavBar*) at the top. In a mobile
view (narrow screen width), a button provides access to a toggle menu. However,
only one link is shown in the menu: "Home". The other pages we have created in
the backend are still missing. Besides the menu, a large "Hello, world!" greets
the visitors of the website. This is the "Jumbotron"-partial. Below that, three
columns are shown, each of them with a "Heading". In a mobile view, these
columns stack on top of each other nicely.

Let's update the Fluid template files and implement a simple menu and enable
dynamic content that can be edited in the TYPO3 backend in the next steps.
