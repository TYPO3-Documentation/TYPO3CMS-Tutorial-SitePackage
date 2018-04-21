.. include:: ../Includes.txt


.. extension-installation:

Extension Installation
----------------------

This tutorial assumes, that the TYPO3 instance is a brand new installation, without any themes, templates, pages or content yet. Ssee the :ref:`TYPO3 Installation Guide <t3install:start>` for a detailed explanation how to set up a TYPO3 instance from scratch. For the sake of simplicity, it is also assumed, that TYPO3 has been installed the *traditional way*, by extracting the source package into the web directory **without** using PHP *composer*.

By using this method, extensions (e.g. the site package extension) can be installed using the Extension Manager, which is a so-called *module* of the backend of TYPO3. Before we can install the site package extension, we have to transfer the files from our local machine to the TYPO3 server (if all files and directories have been created on the local machine though).

In case you have SSH/FTP access to the server, copy the directory ``site_package`` (including all files and sub-directories) to the following directory in your TYPO3 instance: ``typo3conf/ext/``.

If you do not have SSH/FTP access, create a ZIP file of the **content** of your ``site_package`` folder. It is important that the ZIP archive does not contain the directory ``site_package`` and its files and directories inside this folder. The files and folders must be directly located on the first level of ZIP archive.

.. @TODO clarify, if the file name of the ZIP is relevant.


.. typo3-backend-extension-manager:

Extension Manager
^^^^^^^^^^^^^^^^^

First of all, login at the backend of TYPO3 as a user with administrator privileges. At the left side you find a section **ADMIN TOOLS** with a module named "Extensions". Open this module and make sure, the drop down box on the right hand side shows "Installed Extensions". If you uploaded the site package extension via SSH/FTP already, search for "Site Package". If you created a ZIP file, upload the ZIP'ed extension by clicking the upload icon (see marker 1).

.. @TODO screenshot

Once the site package extension appears in the list, you can install it by clicking the "plus" icon, if not already done.


.. typo3-backend-create-initial-pages:

Create Initial Pages
^^^^^^^^^^^^^^^^^^^^

In the next step, we create some initial pages. You and your editors will be able to create further pages, remove pages, enable and disable pages and shuffle pages around in the future. The following page tree is just an example as a starting point.

Go to **WEB → Page**. Assuming, we are using a fresh installation of TYPO3 as outlined in section xxx, an almost empty area is shown in the page tree area. The only entry is the name of the website as defined during the installation process (e.g. "New TYPO3 site") with a grey TYPO3 logo.

.. @TODO replace xxx above

By clicking the page icon with the "plus" at the top, and then dragging the "standard page" icon to its appropriate position in the page tree, you can build the following page tree.

.. @TODO screenshot

By default, all new pages are disabled (marked as a red icon at the bottom right). Enable all pages by clicking the "Enable" link in the context menu.

.. @TODO screenshot

Once all pages have been created, you should end up with exactly the following page tree.

.. @TODO screenshot


.. typo3-backend-typoscript-template:

TypoScript Template
^^^^^^^^^^^^^^^^^^^

Now we will add a TypoScript template to the site and include the TypoScript configuration we have created during the development of our site package. Do not be confused about the terminology "template". In this context, we are referring to a so-called TypoScript template, not a HTML/CSS/JS template.

Go to **WEB → Template** and select the page named "example.com". Then, click button "Create template for a new site" and change the dropdown box at the top to "Info/Modify". Click button "Edit the whole template record", which opens an editor for Constants and Setup. The latter contains a few example lines ("HELLO WORLD!"). Remove these lines, so that the box is completely empty.

Change to tab "Includes" and look for section "Include static (from extensions)", which shows two boxes: "Selected Items" (left hand side) and "Available Items" (right hand side). Under "Available Items", click "Site Package (site_package)", which moves the entry to the left box.

.. @TODO screenshot

Now save your changes by clicking the "save" icon at the top.


Preview Page
^^^^^^^^^^^^

At this point, it is a good time to preview what we have done so far. Go to **WEB → View** and switch the width to "Auto Size".

.. @TODO describe what we see
..
.. menu not working
.. jumbotron
.. three columns

Let's update the Fluid template files and implement a simple menu and enable dynamic content that can be edited in the TYPO3 backend.
We will do this in the next steps.