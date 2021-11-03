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
extension. The content should look as follows:

.. include:: /CodeSnippets/ExtensionConfiguration/ExtEmconf.rst.txt

The values can and should be customized of course. A more meaningful and longer
description is recommended and defining some details about the author
(`author`, :code:`author_email` and :code:`author_company`) make also perfect
sense. A detailed description of all configuration options can be found in
:ref:`TYPO3 Explained: Declaration file <t3coreapi:extension-declaration>`.

Create and customize this file and store it as :file:`site_package/ext_emconf.php`.
The configuration shown above will do the job, if you do not want to customize
the declaration file at the moment.

Composer configuration
======================

If you are planning to work with a Composer-based installation (as we would
advise) the extension needs to contain its own :file:`composer.json`.

.. include:: /CodeSnippets/ExtensionConfiguration/ComposerJson.rst.txt

For historic reasons TYPO3 extension names have to be written in lower case
separated by underscores. We suggest to use the extension key for the directory
of the extension as well to minimize confusion. So the extension in the path
:file:`site_package` has to have the
same "extension-key" to be defined in the "extra" section of the composer.json.

The Composer name defined as "name" however has to consist of a vendor name
followed by a forward slash and the lowercase extension name with minus scores.

.. hint::
   If composer does not find your site-package extension check if you are
   using the correct separation chars in the correct places.


.. _extension-icon:

Extension icon
==============

Not as important as the extension declaration file above, but every extension can
feature an icon using a svg file. This image should be located at
:file:`Resources/Public/Icons/Extension.svg`.

.. note::

   PNG and GIF files are also allowed as Extensions icon. They are stored in
   :file:`Resources/Public/Icons/Extension.png` or
   :file:`Resources/Public/Icons/Extension.gif`


.. _make-typoscript-available:

Make TypoScript available
=========================

In order to automatically load the TypoScript files we have created in the
previous step, a new PHP file :file:`sys_template.php` needs to be created and
stored in directory :file:`Configuration/TCA/Overrides/`. The content of this file
should look like the following code:

.. include:: /CodeSnippets/ExtensionConfiguration/TcaOverrideSysTemplate.rst.txt


.. _directory-structure:

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
