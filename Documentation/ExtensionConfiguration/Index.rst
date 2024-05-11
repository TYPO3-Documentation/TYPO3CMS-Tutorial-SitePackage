.. include:: /Includes.rst.txt
.. highlight:: php

.. _extension-configuration:

=======================
Extension Configuration
=======================


.. _extension-configuration-composer:

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

Set for providing TypoScript
============================

..  versionchanged:: 13.1
    In TYPO3 v13.1 and above the TypoScript files are made available as
    sets and included in the site. For TYPO3 v12 read the section in
    the tutorial for TYPO3 v12.4:
    :ref:`Make TypoScript available (TYPO3 v12.4) <t3sitepackage-12:make-typoscript-available>`.

In order to make the TypoScript files available, we have created in section
:ref:`TypoScript configuration <t3sitepackage:typoscript-configuration>` we
create a site set that can be included by the site configuration later-on.

Create a folder: :path:`Configuration/Sets/MySitePackage/` and put a file
called :file:`config.yaml` into it:

..  include:: /CodeSnippets/ExtensionConfiguration/SitePackage-config.rst.txt

Line 1 defines the name of the set. As the example site-package extension only
provides one set, the name of the set should be the same as the
:ref:`composer name <extension-configuration-composer>`.

In line 4 and 5 dependencies are defined. In this example the site package
depends on :t3src:`fluid_styled_content`, therefore the sets provided by this
system extension are included as dependency. By doing so all settings
and TypoScript definitions provided by the extension are automatically included.

In the same folder we can place a file called :file:`settings.yaml` that we use
to override some default settings of :t3src:`fluid_styled_content`:

..  include:: /CodeSnippets/ExtensionConfiguration/SitePackage-settings.rst.txt

Here we override some values for maximal image width in text-media content
elements, we enable a lightbox for images and set paths for overriding the
templates of that extension.

Then we put a file called :file:`setup.typoscript` into this folder. We use
this file to include all TypoScript needed from the folder
:path:`Configuration/TypoScript`. It would also be possible to place the
TypoScript directly into this file. But we want to split our TypoScript into
different files.

..  include:: /CodeSnippets/ExtensionConfiguration/SitePackage-setup.rst.txt

As we only have a few lines of TypoScript constants we define them directly in
a file called :file:`constants.typoscript` in this folder:

..  include:: /CodeSnippets/ExtensionConfiguration/SitePackage-constants.rst.txt

Last we add a file called :file:`page.tsconfig` which includes the backend page
layouts we create in :ref:`backend-page-layouts`:

..  include:: /CodeSnippets/ExtensionConfiguration/SitePackage-page-tsconfig.rst.txt

.. _ec-directory-structure:

Directory and file structure
============================

Let's review the directory and file structure of the sitepackage extension as
it stands now.

..  directory-tree::
    :level: 2
    :show-file-icons: true

    *   site_package/

    *   Configuration

        *   Sets

            *   MySitePackage

                config.yaml
                constants.typoscript
                setup.typoscript

        *   TypoScript

    *   Resources

        *   Private

            *   Layouts

                *   Page

                    *   Default.html

            *   Partials

                *   Page

                    *   Jumbotron.html

            *   Templates

                *   Page

                    *   Default.html

        *   Public

            *   Css

                *   website.css

            *   Icons/Extension.svg

            *   Images/

                *   logo.png

            *   JavaScript

                *   website.js

        *   composer.json

At this point we can install the sitepackage extension in an TYPO3 instance,
which we will do in the next step.
