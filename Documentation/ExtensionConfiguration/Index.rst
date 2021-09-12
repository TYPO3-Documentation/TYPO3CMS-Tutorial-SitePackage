.. include:: ../Includes.txt
.. highlight:: php

.. _extension-configuration:

=======================
Extension Configuration
=======================

.. _extension-manager-configuration:

Extension Declaration File
==========================

Every TYPO3 extension requires a configuration file (also known as the
:ref:`extension declaration file <t3coreapi:extension-declaration>`) to
tell the TYPO3 instance some basic details of
the extension, possible dependencies, etc. Without this file, TYPO3 would not
know that the extension exists and as a consequence could not load it, nor
display it in the *Extension Manager*.

This file is named :file:`ext_emconf.php` and is expected in the root level of the
extension. The content should look as follows::

   <?php
   $EM_CONF[$_EXTKEY] = [
      'title' => 'TYPO3 Sitepackage',
      'description' => 'TYPO3 Sitepackage',
      'category' => 'templates',
      'author' => '...',
      'author_email' => '...',
      'author_company' => '...',
      'version' => '1.0.0',
      'state' => 'stable',
      'constraints' => [
         'depends' => [
            'typo3' => '11.4.0-11.5.99',
            'fluid_styled_content' => '11.4.0-11.5.99'
         ],
         'conflicts' => [
         ],
      ],
      'uploadfolder' => 0,
      'createDirs' => '',
      'clearCacheOnLoad' => 1
   ];

The values can and should be customized of course. A more meaningful and longer
description is recommended and defining some details about the author
(`author`, :code:`author_email` and :code:`author_company`) make also perfect sense. A
detailed description of all configuration options can be found in
:ref:`TYPO3 Explained: Declaration file <t3coreapi:extension-declaration>`.

Create and customize this file and store it as :file:`site_package/ext_emconf.php`.
The configuration shown above will do the job, if you do not want to customize
the declaration file at the moment.

Composer configuration
======================

If you are planning to work with a Composer-based installation (as we would
advise) the extension needs to contain its own :file:`composer.json`.

.. code-block:: json

   {
      "name": "t3docs/site-package",
      "type": "typo3-cms-extension",
      "description": "Example site package from the site package tutorial",
      "authors": [
         {
            "name": "TYPO3 CMS Documentation Team",
            "role": "Developer",
            "homepage": "https://typo3.org/community/teams/documentation"
         },
         {
            "name": "The TYPO3 Community",
            "role": "Contributor",
            "homepage": "https://typo3.org/community/"
         }
      ],
      "homepage": "https://github.com/TYPO3-Documentation/TYPO3CMS-Tutorial-SitePackage-Code",
      "license": "MIT",
      "keywords": [
         "typo3",
         "site package",
         "documentation"
      ],
      "support": {
         "issues": "https://github.com/TYPO3-Documentation/t3docs-screenshots/issues"
      },
      "extra": {
         "typo3/cms": {
            "extension-key": "site_package"
         }
      }
   }

For historic reasons TYPO3 extension names have to be written in lower case
separated by underscores. The path name and the extension name have to be
the same. So the extension in the path :file:`site_package` has to have the
same "extension-key" to be defined in the "extra" section of the composer.json.

The Composer name defined as "name" however has to consist of a vendor name
followed by a forward slash and the lowercase extension name with minus scores.

.. hint::
   If composer does not find your site-package extension check if you are
   using the correct separation chars in the correct places.


.. _extension-icon:

Extension Icon
==============

Not as important as the extension declaration file above, but every extension can
feature an icon using a PNG file. This image should be located in the root
directory of the extension as well, and must be named :file:`ext_icon.png`.
Choose or create an image of 64px width by 64px height.

.. note::

   Newer versions of TYPO3 support alternative formats and file locations.
   However, for the sake of simplicity we will stick to the specification outlined
   above.


.. _make-typoscript-available:

Make TypoScript Available
=========================

In order to automatically load the TypoScript files we have created in the
previous step, a new PHP file :file:`sys_template.php` needs to be created and
stored in directory :file:`Configuration/TCA/Overrides/`. The content of this file
should look like the following code::

   <?php
   defined('TYPO3') or die();

   call_user_func(function()
   {
      /**
       * Extension key
       */
      $extensionKey = 'site_package';

      /**
       * Default TypoScript
       */
      \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
         $extensionKey,
         'Configuration/TypoScript',
         'Sitepackage'
      );
   });


.. _directory-structure:

Directory and File Structure
============================

Let's review the directory and file structure of the sitepackage extension as
it stands now.

.. code-block:: none

    site_package/
    site_package/Configuration
    site_package/Configuration/TCA
    site_package/Configuration/TCA/Overrides
    site_package/Configuration/TCA/Overrides/sys_template.php
    site_package/Configuration/TypoScript
    site_package/Configuration/TypoScript/constants.typoscript
    site_package/Configuration/TypoScript/setup.typoscript
    site_package/ext_emconf.php
    site_package/ext_icon.png
    site_package/Resources
    site_package/Resources/Private
    site_package/Resources/Private/Layouts
    site_package/Resources/Private/Layouts/Page
    site_package/Resources/Private/Layouts/Page/Default.html
    site_package/Resources/Private/Partials
    site_package/Resources/Private/Partials/Page
    site_package/Resources/Private/Partials/Page/Jumbotron.html
    site_package/Resources/Private/Templates
    site_package/Resources/Private/Templates/Page
    site_package/Resources/Private/Templates/Page/Default.html
    site_package/Resources/Public
    site_package/Resources/Public/Css
    site_package/Resources/Public/Css/website.css
    site_package/Resources/Public/Images/
    site_package/Resources/Public/Images/logo.png
    site_package/Resources/Public/JavaScript
    site_package/Resources/Public/JavaScript/website.js

At this point we can install the sitepackage extension in a TYPO3 instance,
which we will do in the next step.
