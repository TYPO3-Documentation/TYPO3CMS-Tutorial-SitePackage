.. include:: ../Includes.txt


.. extension-installation:

Extension Installation
----------------------

We reached a point now, where we can install the site package extension on a TYPO3 instance.

The instance should be clean, brand new... (see Installation Guide).

If you have SSH/FTP access to the server, ...

If you don't, create a ZIP file of your site_package folder...


.. typo3-backend-extension-manager:

TYPO3 Backend: Extension Manager
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

Login...

ADMIN TOOLS → Extensions → "Installed Extensions"

Search for "Site Package"

Click the "plus" icon to install the extension.


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
