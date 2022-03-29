:orphan:

.. include:: /Includes.rst.txt

.. _extension-installation_without_composer:

=======================================
Extension installation without composer
=======================================

If TYPO3 has been installed the *legacy way*, by extracting the source
package into the web directory **without** using PHP *composer* follow this
tutorial for installation of the site-package extension:

By using this method, extensions (e.g. the sitepackage extension) can be
installed using the Extension Manager, which is a *module* found in the
backend of TYPO3.

It is highly recommended that you work locally on your machine using for
example ddev.

Copy the directory :file:`site_package` (including all files and
sub-directories) to the following directory in your TYPO3 instance:
:file:`typo3conf/ext/`.

You can also create a ZIP file of the **content** of your
:file:`site_package` folder and name it :file:`site_package.zip`. It is
important that the ZIP archive does not
contain the directory :file:`site_package` and its files and directories inside
this folder. The files and folders must be directly located on the first level
of ZIP archive.

.. _typo3-backend-extension-manager:

Extension manager
=================

First of all, login at the backend of TYPO3 as a user with administrator
privileges. At the left side you find a section :guilabel:`Admin Tools`
with a module :guilabel:`Extensions` (marker 1). Open this module and
make sure, the drop down box on the right hand side shows :guilabel:`Installed
Extensions` (marker 2). If you have already
uploaded the site package extension, search for "Site
Package". If you created a ZIP file, upload the ZIP'ed extension by clicking
the upload icon (marker 3).

.. figure::  /Images/ManualScreenshots/ExtensionManager.png
   :alt: Extension Manager
   :class: with-shadow

   TYPO3 Extension Manager


.. _typo3-backend-extension-manager_activation:

Extension activation
====================

Once the site package extension appears in the list, you can activate it by
clicking the "plus" icon (marker 4).
