:navigation-title: Settings
..  include:: /Includes.rst.txt

..  _extension-configuration:
..  _ec-directory-structure:
..  _site-sets-configuration:

============================================
Site settings: Further configuration options
============================================

..  versionadded:: 13.1
    Site sets and settings therein have been introduced with TYPO3 13.1.

In step :ref:`Minimal site package - Create a basic site
set <t3sitepackage:minimal-extension-siteset>` we created a basic site set for
our site package.


..  contents:: Table of Contents

..  toctree::
    :titlesonly:
    :glob:

    */Index

..  _site_set:

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
dependency <t3sitepackage:content-mapping-site-set>` we included the
dependencies to the site sets of :composer:`typo3/cms-fluid-styled-content`.

Your site set configuration should now look like this:

..  literalinclude:: /CodeSnippets/my_site_package/Configuration/Sets/SitePackage/config.yaml
    :caption: packages/my_site_package/Configuration/Sets/SitePackage/config.yaml
    :language: yaml
    :linenos:

Line 1 defines the name of the set. As the example site-package extension only
provides one set, the name of the set should be the same as the
:ref:`composer name <extension-configuration-composer>`.

In line 4 and 5 dependencies are defined. In this example the site package
depends on :composer:`typo3/cms-fluid-styled-content`, therefore the sets
provided by this system extension are included as dependency. By doing so all
settings and TypoScript definitions provided by the extension are automatically
included.

Your site set folder now contains the following files:

..  directory-tree::
    :level: 2
    :show-file-icons: true

    *   my_site_package/Configuration/Sets/SitePackage

        *   config.yaml
        *   page.tsconfig
        *   setup.typoscript

..  _site_settings:

Introduce site settings to configure fluid-styled-content
=========================================================

Place a file called :file:`settings.yaml` in the folder
:path:`Configuration/Sets/SitePackage`.

We override some default settings of the site set
:ref:`Site set "Fluid Styled
Content" <typo3/cms-fluid-styled-content:site-set-fluid-styled-content>`:

..  literalinclude:: /CodeSnippets/my_site_package/Configuration/Sets/SitePackage/settings.yaml
    :caption: packages/my_site_package/Configuration/Sets/SitePackage/settings.yaml
    :language: yaml
    :linenos:

Here we override some values for maximal image width in text-media content
elements, we enable a lightbox for images and set paths for overriding the
templates of that extension.

Settings can also be used in conditions:
`Check if a setting/constant is set to a certain value <https://docs.typo3.org/permalink/t3tsref:condition-examples-constant>`_.
