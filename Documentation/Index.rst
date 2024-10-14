.. include:: /Includes.rst.txt
..  _start:

===========================
TYPO3 site package tutorial
===========================

This tutorial describes step by step how to come from your first TYPO3
installation to the first basic site.

A working copy of the site package extension can be retrieved from the
`TYPO3CMS-Tutorial-SitePackage-Code`_ repository.

.. _TYPO3CMS-Tutorial-SitePackage-Code: https://github.com/TYPO3-Documentation/TYPO3CMS-Tutorial-SitePackage-Code/tree/main

----

..  card-grid::
    :columns: 1
    :columns-md: 2
    :gap: 4
    :class: pb-4
    :card-height: 100

    ..  card:: :ref:`Introduction <t3sitepackage:introduction>`

        Here we define the benefits of the site package: like the concepts of
        encapsulation, the concepts of dependency management, the clean
        separation from the userspace (fileadmin/FAL), some important security
        benefits, deployment and distributability advantages.

        ..  card-footer:: :ref:`Discover the benefits of a site package <t3sitepackage:introduction>`
            :button-style: btn btn-secondary stretched-link

    ..  card:: :ref:`Prerequisites <t3sitepackage:prerequisites>`

        In this section we mention the prerequisites that you need before
        you start with this tutorial.

        ..  card-footer:: :ref:`See the prerequisites <t3sitepackage:prerequisites>`
            :button-style: btn btn-secondary stretched-link

    ..  card:: :ref:`Create initial pages <t3sitepackage:typo3-backend-create-initial-pages>`

        Here we use :composer:`t3docs/site-package-data` to create a basic site
        configuration and some pages in the TYPO3 backend with some example
        content records.

        ..  card-footer:: :ref:`Create some dummy content <t3sitepackage:typo3-backend-create-initial-pages>`
            :button-style: btn btn-secondary stretched-link

    ..  card:: :ref:`Minimal site package <t3sitepackage:minimal-design>`

        Create a minimal site package that outputs "Hello World".

        ..  card-footer:: :ref:`Create a minimal site package <t3sitepackage:minimal-design>`
            :button-style: btn btn-secondary stretched-link

    ..  card:: :ref:`Assets <assets-theme>`

        Assets usually include CSS files, JavaScript and images / icons used
        for design purposes.

        ..  card-footer:: :ref:`Copy the assets into your site package <assets-theme>`
            :button-style: btn btn-secondary stretched-link

    ..  card:: :ref:`Fluid Template <t3sitepackage:fluid-templates>`

        We introduce the templating engine Fluid, that is used to render the
        html pieces in a logically manner. Then we describe the directory
        structure that is needed in a site package extension. We also
        explain the first steps to include the previously static files and
        html pieces using Fluid.

        ..  card-footer:: :ref:`Learn about Fluid and Templating <t3sitepackage:fluid-templates>`
            :button-style: btn btn-secondary stretched-link

    ..  card:: :ref:`Content mapping <t3sitepackage:content-mapping>`

        Here we explain the purpose of backend layouts. Additionally we
        introduce the DatabaseQueryProcessor which is used to render content
        from a special "colPos" previously defined in the backend layout.
        We use Fluid to output content from a specific colPos. By this we
        get to know the cObject ViewHelper.

        ..  card-footer:: :ref:`See how to use a backend layout <t3sitepackage:content-mapping>`
            :button-style: btn btn-secondary stretched-link


    ..  card:: :ref:`Main menu <t3sitepackage:main-menu-creation>`

        We introduce the main menu, explain how we build up a menu
        processor with TypoScript and how we can output the menu with Fluid.
        We introduce the so called "Debug ViewHelper".

        ..  card-footer:: :ref:`Learn to create & output a menu <t3sitepackage:main-menu-creation>`
            :button-style: btn btn-secondary stretched-link

    ..  card:: :ref:`Site sets <t3sitepackage:site-sets-configuration>`

        In this section we configure the site package using the new
        concept of site sets. The settings are now stored in a yaml file
        called :file:`settings.definitions.yaml`.

        ..  card-footer:: :ref:`Learn about the configuration of a site package <t3sitepackage:site-sets-configuration>`
            :button-style: btn btn-secondary stretched-link


    ..  card:: :ref:`Extension Configuration <t3sitepackage:extension-configuration>`

        We explain the needed composer configurations and we connect it with
        the site sets configurations that we made in the previous chapter.

        ..  card-footer:: :ref:`Discover the composer configurations <t3sitepackage:extension-configuration>`
            :button-style: btn btn-secondary stretched-link

    ..  card:: :ref:`Extension Installation <t3sitepackage:extension-installation>`

        In this section we go through the process of installing the site
        package extension with composer.

        ..  card-footer:: :ref:`Add your site package with composer <t3sitepackage:extension-installation>`
            :button-style: btn btn-secondary stretched-link

    ..  card:: :ref:`Summary <t3sitepackage:summary>`

        In this chapter we sum up the steps that we did after we have gone
        through this tutorial.

        ..  card-footer:: :ref:`See the summary <t3sitepackage:summary>`
            :button-style: btn btn-secondary stretched-link



..  toctree::
    :maxdepth: 2
    :titlesonly:
    :hidden:

    Introduction/Index
    Prerequisites/Index
    CreatePages/Index
    MinimalExample/Index
    Assets/Index
    FluidTemplates/Index
    ContentMapping/Index
    MainMenuCreation/Index
    TypoScriptConfiguration/Index
    ExtensionConfiguration/Index
    ExtensionInstallation/Index
    Summary/Index

..  toctree::
    :hidden:

    Sitemap
