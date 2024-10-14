:navigation-title: Site sets
.. include:: /Includes.rst.txt

.. _site-sets-configuration:

========================================
Site sets: Further configuration options
========================================

..  versionadded:: 13.1
    Site sets have been introduced with TYPO3 13.1.

In step :ref:`Minimal site package - Create a basic site
set <t3sitepackage:minimal-extension-siteset>` we created a basic site set for
our site package.

In step :ref:`content-mapping-site-set` we added dependencies to our site set.

.. _settings-definitions-yaml-constants:

Setting definition
------------------

Settings definitions are used to set values that can be used in the TypoScript
setup through out the project. Before they were kept in the file
:file:`constants.typoscript`. Since TYPO3 v13 they can be stored in the file
:file:`settings.definitions.yaml`. See
`settings.definitions.yaml <https://github.com/TYPO3-Documentation/TYPO3CMS-Tutorial-SitePackage-Code/blob/main/Configuration/Sets/SitePackage/settings.definitions.yaml>`__ in Github.

It is best practise to use them for values that might
want to be changed later on like paths, ids of important pages (contact,
imprint, a system folder that contains certain records, ...).

..  todo: Add more content here
