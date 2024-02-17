.. include:: /Includes.rst.txt

.. _typo3-backend-create-initial-pages:

====================
Create initial pages
====================

In the next step, we create some initial pages. You and your editors will be
able to create further pages, remove pages, enable and disable pages and
shuffle pages around in the future. The following page tree is just an example
as a starting point.

Go to module :guilabel:`Web > Page`. Assuming, we are using a
fresh installation of TYPO3 as
outlined in section :ref:`prerequisites`, an almost empty area is shown in the
page tree area. The only entry is the name of the website as defined during the
installation process (e.g. "New TYPO3 site") with a grey TYPO3 logo.

By clicking the page icon with the "plus" at the top, and then dragging the
"standard page" icon to its appropriate position in the page tree, you can
build the following page tree. Enter the page names as shown (a double-click on
the page name allows you to rename it).

.. include:: /Images/AutomaticScreenshots/CreateInitialPages.rst.txt

By default, all new pages are disabled (marked as a red icon at the bottom
right). Enable all pages by clicking the "Enable" link in the context menu.

.. include:: /Images/AutomaticScreenshots/EnablePagesInContextMenu.rst.txt

Once all pages have been created, you should end up with the following page
tree.

.. include:: /Images/AutomaticScreenshots/FinalPageTree.rst.txt

.. _typo3-backend-typoscript-template:

TypoScript template
===================

Now we will add a TypoScript template to the site and include the TypoScript
configuration we have created during the development of our sitepackage. Do
not be confused about the terminology "template". In this context, we are
referring to TypoScript templates, not HTML/CSS/JS templates.

Go to :guilabel:`Web > Template` and select the page named "example.com". Then, click
button "Create template for a new site" and change the dropdown box at the top
to "Info/Modify". Click button "Edit the whole template record".

.. include:: /Images/AutomaticScreenshots/EditTemplateRecord.rst.txt

This opens an
editor for Constants and Setup. The latter contains a few example lines ("HELLO
WORLD!"). Remove these lines, so that the box is completely empty.

Include the TypoScript of the EXT:sitepackage
---------------------------------------------

Go to section :guilabel:`Includes > Include static (from extensions)`.

You should find the item "Site Package (site_package)" in the list
:guilabel:`Available Items`. Click on this item to make it appear in the list
:guilabel:`Selected Items`.

.. include:: /Images/AutomaticScreenshots/IncludeTypoScriptTemplate.rst.txt

Now save your changes by clicking the :guilabel:`Save` button at the top.

.. hint::
   The item "Site Package" was created by the file
   :file:`Configuration/TCA/Overrides/sys_template.php` in the step
   :ref:`Make TypoScript available <make-typoscript-available>`.


Preview the page
================

At this point, it is a good time to preview what we have achieved so far. Go to
:guilabel:`Web > View` and try a few different screen widths. The two buttons at the
top left of the screen (marker 1) allow you to show/hide the page tree and to
minimize the function menu at the left.

.. include:: /Images/AutomaticScreenshots/ExtensionInstallationPreviewPage.rst.txt

The preview shows the frontend with a menu (*NavBar*) at the top. In a mobile
view (narrow screen width), a button provides access to a toggle menu. However,
only one link is shown in the menu: "Home". The other pages we have created in
the backend are still missing. Besides the menu, a large "Hello, world!" greets
the visitors of the website. This is the "Jumbotron"-partial. Below that, three
columns are shown, each of them with a "Heading". In a mobile view, these
columns stack on top of each other nicely.

Let's update the Fluid template files and implement a simple menu and enable
dynamic content that can be edited in the TYPO3 backend in the next steps.
