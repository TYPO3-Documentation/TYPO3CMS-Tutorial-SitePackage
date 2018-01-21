.. include:: ../Includes.txt


.. extension-configuration:

Extension Configuration
-----------------------

.. extension-manager-configuration:

Extension Declaration File
^^^^^^^^^^^^^^^^^^^^^^^^^^

Every TYPO3 extension requires a configuration file (also known as the *extension declaration file*) to tell the TYPO3 instance some basic details of the extension, possible dependencies, etc. Without this file, TYPO3 would now know that the extension exist and as a consequence could not load it, nor display it in the *Extension Manager*.

This file is named ``ext_emconf.php`` and is expected in the root level of the extension. The content should look as follows.


::

    <?php
    $EM_CONF[$_EXTKEY] = [
      'title' => 'TYPO3 Site Package',
      'description' => 'TYPO3 Site Package',
      'category' => 'templates',
      'author' => '...',
      'author_email' => '...',
      'author_company' => '...',
      'version' => '1.0.0',
      'state' => 'stable',
      'constraints' => [
        'depends' => [
          'typo3' => '8.7.0-9.5.99',
          'fluid_styled_content' => '8.7.0-9.5.99'
        ],
        'conflicts' => [
        ],
      ],
      'uploadfolder' => 0,
      'createDirs' => '',
      'clearCacheOnLoad' => 1
    ];

The values can be customized of course. A more meaningful and longer description is recommended and defining some details about the author (``author``, ``author_email`` and ``author_company``) make also perfect sense. A detailed description of all configuration options can be found in the :ref:`TypoScript Reference <t3coreapi:declaration-file>`.

Create and customize this file and store it as ``site_package/ext_emconf.php``. The configration shown above will do the job, if you do not want to customize the declaration file at the moment.


.. extension-icon:

Extension Icon
^^^^^^^^^^^^^^

Not as important as the extension declaration file above, every extension can feature an icon as a PNG file. This image should be located in the root directory of the extension as well, and must be named ``ext_icon.png``. Choose the image size of 64x64 pixels.

.. @TODO: convert this into a proper "Info box"

It should be noted, that newer versions of TYPO3 support alternative formats and file locations. However, for the sake of simplicity, we stick to the specification outlined above for the time being.


.. make-typoscript-available:

Make TypoScript Available
^^^^^^^^^^^^^^^^^^^^^^^^^

In order to automatically load the TypoScript files we have created in the previous step, a new PHP file File ``sys_template.php`` needs to be created and stored in directory ``Configuration/TCA/Overrides/``. The content of this file should look like the following code.

::

    <?php
    defined('TYPO3_MODE') || die();

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
        'Site Package'
      );
    });


.. directory-structure:

Directory and File Structure
^^^^^^^^^^^^^^^^^^^^^^^^^^^^

Let's review the directory and file structure of the site package extension as it stands now.

::

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
    site_package/Resources/Public/Css/website.js
    site_package/Resources/Public/Images/
    site_package/Resources/Public/Images/logo.png
    site_package/Resources/Public/JavaScript
    site_package/Resources/Public/JavaScript/website.js

At this point we can install the site package extension in a TYPO3 instance, which we will do in the next step.
