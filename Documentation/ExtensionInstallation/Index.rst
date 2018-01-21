.. include:: ../Includes.txt


.. extension-installation:

Extension Installation
----------------------

This tutorial assumes, that the TYPO3 instance is a brand new installation, without any themes, templates, pages or content yet. Ssee the :ref:`TYPO3 Installation Guide <t3install:start>` for a detailed explanation how to set up a TYPO3 instance from scratch. For the sake of simplicity, it is also assumed, that TYPO3 has been installed the *traditional way*, by extracting the source package into the web directory **without** "composer".

By using this method, extensions (e.g. the site package extension) can be installed via the Extension Manager, which is a so-called *module* of the backend of TYPO3. Before we can install the site package extension, we have to transfer the files from our local machine to the TYPO3 server (if all files and directories have been created on the local machine though).

In case you have SSH/FTP access to the server, copy the directory ``site_package`` (including all files and sub-directories) to the following directory in your TYPO3 instance: ``typo3conf/ext/``.

If you do not have SSH/FTP access, create a ZIP file of the **content** of your ``site_package`` folder. It is important that the ZIP archive does not contain the directory ``site_package`` and its files and directories inside this folder. The files and folders must be directly located on the first level of ZIP archive.

.. @TODO clarify, if the file name of the ZIP is relevant.


.. typo3-backend-extension-manager:

TYPO3 Backend: Extension Manager
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

First of all, login at the backend of TYPO3 as a user with administrator privileges. At the left side you find a section "ADMIN TOOLS" with a module named "Extensions". Open this module and make sure, the drop down box on the right hand side shows "Installed Extensions". If you have uploaded the site package extension via SSH/FTP already, search for "Site Package". If you have created a ZIP file, upload the ZIP'ed extension by clicking the upload icon (see marker 1).

.. @TODO screenshot

Once the site package extension appears in the list, you can install it by clicking the "plus" icon.


.. typo3-backend-create-pages:

TYPO3 Backend: Create Pages:
^^^^^^^^^^^^^^^^^^^^^^^^^^^^

WEB → Page

::

    NEW TYPO3 site
      example.com
        Page 1
        Page 2


.. typo3-backend-typoscript-template:

TYPO3 Backend: Template
^^^^^^^^^^^^^^^^^^^^^^^

WEB → Template → page "example.com" → Create template for a new site

Change to "Info/Modify"

Edit the whole template record

Remove everything in box "Setup:"

Change to tab "Includes".

Under "Available Items", click "Site Package (site_package)", which moves the entry to the left box.

→ Save


Preview Page
^^^^^^^^^^^^

WEB → View (switch Width to "Auto Size").

.. @TODO describe what we see
..
.. menu not working
.. jumbotron
.. three columns

Let's update the Fluid template files and implement a simple menu and enable dynamic content that can be edited in the TYPO3 backend.
We will do this in the next steps.