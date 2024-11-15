:navigation-title: Settings
.. include:: /Includes.rst.txt

.. _extension-configuration:
.. _ec-directory-structure:
.. _site-sets-configuration:

============================================
Site settings: Further configuration options
============================================

..  versionadded:: 13.1
    Site sets and settings therein have been introduced with TYPO3 13.1.

In step :ref:`Minimal site package - Create a basic site
set <t3sitepackage:minimal-extension-siteset>` we created a basic site set for
our site package.

In step :ref:`content-mapping-site-set` we added dependencies to our site set.

..  contents::

.. _site_set:

The site set
============

..  versionchanged:: 13.1
    In TYPO3 v13.1 and above the TypoScript files are made available as
    sets and included in the site. For TYPO3 v12 read the section in
    the tutorial for TYPO3 v12.4:
    :ref:`Make TypoScript available (TYPO3 v12.4) <t3sitepackage-12:make-typoscript-available>`.

In step :ref:`Create a basic site set <t3sitepackage:minimal-extension-siteset>`
we already created a basic site set for your site package.

In step :ref:`Include the site sets of fluid-styled-content as
dependency <t3sitepackage:content-mapping-site-set>` we included the dependencies
to the site sets of :composer:`typo3/cms-fluid-styled-content`.

Your site set configuration should now look like this:

..  include:: /CodeSnippets/ExtensionConfiguration/SitePackage-config.rst.txt

Line 1 defines the name of the set. As the example site-package extension only
provides one set, the name of the set should be the same as the
:ref:`composer name <extension-configuration-composer>`.

In line 4 and 5 dependencies are defined. In this example the site package
depends on :composer:`typo3/cms-fluid-styled-content`, therefore the sets provided by this
system extension are included as dependency. By doing so all settings
and TypoScript definitions provided by the extension are automatically included.

Your site set folder now contains the following files:

..  directory-tree::
    :level: 2
    :show-file-icons: true

    *   site_package/Configuration/Sets/SitePackage

        *   config.yaml
        *   page.tsconfig
        *   setup.typoscript

.. _site_settings:

Introduce site settings to configure fluid-styled-content
=========================================================

Place a file called :file:`settings.yaml` in the folder
:path:`Configuration/Sets/SitePackage`.

We override some default settings of the site set
:ref:`Site set "Fluid Styled
Content" <typo3/cms-fluid-styled-content:site-set-fluid-styled-content>`:

..  include:: /CodeSnippets/ExtensionConfiguration/SitePackage-settings.rst.txt

Here we override some values for maximal image width in text-media content
elements, we enable a lightbox for images and set paths for overriding the
templates of that extension.

.. _settings-definitions-yaml-constants:

Setting definition
==================

Settings definitions are used to set values that can be used in the TypoScript
setup through out the project. Before they were kept in the file
:file:`constants.typoscript`. Since TYPO3 v13 they can be stored in the file
:file:`settings.definitions.yaml`. See
`settings.definitions.yaml <https://github.com/TYPO3-Documentation/TYPO3CMS-Tutorial-SitePackage-Code/blob/main/Configuration/Sets/SitePackage/settings.definitions.yaml>`__ in Github.

It is best practice to use them for values that might
want to be changed later on like paths, ids of important pages (contact,
imprint, a system folder that contains certain records, ...).
