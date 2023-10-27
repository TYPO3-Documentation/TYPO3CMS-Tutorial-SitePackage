.. include:: /Includes.rst.txt
.. highlight:: php

.. _extension-configuration:

=======================
Extension Configuration
=======================

Composer configuration :file:`composer.json`
============================================

If you are planning to work with a Composer-based installation (as we would
advise) the extension needs to contain its own :file:`composer.json`.

.. include:: /CodeSnippets/ExtensionConfiguration/ComposerJson.rst.txt

For historic reasons TYPO3 extension names are written in
lower case words and separated by underscores if there are more than one. This
is known as the extension key. The directory containing the extension should have
the same name as the extension key. Composer package names are written in
lower-case words but are separated with dashes if there is more than one word.

At the top of the :file:`composer.json` file we see the Composer package name
`t3docs/site-package` (with a dash) and at the bottom we see the TYPO3
extension key in the extras section - :file:`site_package` (with an underscore).
The Composer "name" consists of a vendor name followed by a forward slash and the
lowercase extension name with dashes.



.. hint::
   Make sure you don't mix up your underscores and dashes otherwise Composer
   will not find your site-package extension.

.. _extension-manager-configuration:

Extension declaration file :file:`ext_emconf.php`
=================================================

From version 11 this file is only mandatory if you are not using Composer.
If you are using Composer you can omit this file as it is ignored by TYPO3
anyway.

If you are using a TYPO3 version below 11 or can't use
Composer for some reason create a file called :file:`ext_emconf.php` in
the root level of the extension. The content should look as follows:

.. include:: /CodeSnippets/ExtensionConfiguration/ExtEmconf.rst.txt

The values can and should be customized. A more meaningful and longer
description is recommended.

A detailed description of all configuration options can be found in
:ref:`TYPO3 Explained: Declaration file <t3coreapi:extension-declaration>`.

.. _extension-icon:

Extension icon
==============

Every extension can feature an icon using an SVG, PNG or GIF file.
The image should be stored in :file:`Resources/Public/Icons/`.

It is recommended that you use an SVG file called :file:`Extension.svg`.

.. _make-typoscript-available:

Make TypoScript available
=========================

In order to automatically load the TypoScript files we have created in the
previous step, a new PHP file :file:`sys_template.php` needs to be created and
stored in directory :file:`Configuration/TCA/Overrides/`. The content of this file
should look like the following code:

.. include:: /CodeSnippets/ExtensionConfiguration/TcaOverrideSysTemplate.rst.txt


.. _ec-directory-structure:

Directory and file structure
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
    site_package/Resources/Public/Icons/Extension.svg
    site_package/Resources/Public/Images/
    site_package/Resources/Public/Images/logo.png
    site_package/Resources/Public/JavaScript
    site_package/Resources/Public/JavaScript/website.js

At this point we can install the sitepackage extension in an TYPO3 instance,
which we will do in the next step.
