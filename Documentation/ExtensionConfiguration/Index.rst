.. include:: /Includes.rst.txt
.. highlight:: php

.. _extension-configuration:

=======================
Extension Configuration
=======================

Composer configuration :file:`composer.json`
============================================

In this tutorial we assumed, you
:ref:`installed TYPO3 with Composer <extension-installation>`.
Therefore the extension needs to contain its own :file:`composer.json`.

.. include:: /CodeSnippets/ExtensionConfiguration/ComposerJson.rst.txt

For historic reasons TYPO3 extension names are written in
lower case words and separated by underscores if there are more than one. This
is known as the extension key. The directory containing the extension should have
the same name as the extension key. Composer package names are written in
lower-case words but are by convention separated with dashes if there
is more than one word.

At the top of the :file:`composer.json` file we see the Composer package name
`t3docs/site-package` (with a dash) and at the bottom we see the TYPO3
extension key in the extras section - :file:`site_package` (with an underscore).
The Composer "name" consists of a vendor name followed by a forward slash and the
lowercase extension name with dashes.

.. hint::
   Make sure you don't mix up your underscores and dashes otherwise Composer
   will not find your site-package extension.

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

..  directory-tree::
    :level: 2
    :show-file-icons: true

    *   site_package/

        *   Configuration/

            *   TCA/

                *   Overrides/

                    *  sys_template.php

            *   TypoScript/

                *   constants.typoscript
                *   setup.typoscript

        *   Resources/

            *   Private/

                *   Layouts/

                    *   Page/

                        *   Default.html

                *   Partials/

                    *   Page/

                        *   Jumbotron.html

                *   Templates/

                    *   Page/

                        *   Default.html
            *   Public/

                *   Css/

                    *   website.css

                *   Icons

                    *   Extension.svg

                *   Images/

                    *   logo.png

                *   JavaScript/

                    *   website.js

        *   composer.json


At this point we can install the sitepackage extension in an TYPO3 instance,
which we will do in the next step.
