.. include:: /Includes.rst.txt
..  _introduction:
..  _start:

===========================
TYPO3 site package tutorial
===========================

A site package is a custom :ref:`TYPO3 extension <t3start:concepts-extensions>`
that contains files regarding the theme and functionality of a site.

This tutorial describes step by step how to come from your first TYPO3
installation to the first basic site.

You can download the example site package used in this tutorial from GitHub:
https://github.com/TYPO3-Documentation/site_package

..  note::
    The example site package is structured for educational purposes and is
    not intended for use in production environments.

----

..  card-grid::
    :columns: 1
    :columns-md: 2
    :gap: 4
    :class: pb-4
    :card-height: 100

    ..  card:: :ref:`Prerequisites <t3sitepackage:prerequisites>`

        In this section we mention the prerequisites that you need before
        you start with this tutorial.

        ..  card-footer:: :ref:`See the prerequisites <t3sitepackage:prerequisites>`
            :button-style: btn btn-secondary stretched-link

    ..  card:: :ref:`Generate a site package <t3sitepackage:minimal-design>`

        Generate a site package using the official Site Package Builder and
        install it.

        ..  card-footer:: :ref:`Generate a site package <t3sitepackage:minimal-design>`
            :button-style: btn btn-secondary stretched-link

    ..  card:: :ref:`Create initial pages <t3sitepackage:typo3-backend-create-initial-pages>`

        Here we use the initialization data provided by your site package
        to create some initial pages including dummy content.

        ..  card-footer:: :ref:`Create some dummy content <t3sitepackage:typo3-backend-create-initial-pages>`
            :button-style: btn btn-secondary stretched-link

    ..  card:: :ref:`Assets <assets-theme>`

        Assets usually include CSS files, JavaScript and images / icons used
        for design purposes.

        ..  card-footer:: :ref:`Understand using assets into your site package <assets-theme>`
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

    ..  card:: :ref:`Content Blocks <content-blocks>`

        We explain how the TYPO3 Extension :composer:`friendsoftypo3/content-blocks`
        can be used to create custom Content Elements, for example for a jumbotron
        or slider.

        ..  card-footer:: :ref:`Learn to create custom Content Elements <content-blocks>`
            :button-style: btn btn-secondary stretched-link

    ..  card:: :ref:`Extension Configuration <t3sitepackage:extension-configuration>`

        We explain the needed composer configurations and we connect it with
        the site sets configurations that we made in the previous chapter.

        ..  card-footer:: :ref:`Discover the composer configurations <t3sitepackage:extension-configuration>`
            :button-style: btn btn-secondary stretched-link

    ..  card:: :ref:`Next steps <t3sitepackage:next-steps>`

        In this chapter we describe the next steps which you can do with your
        new site package.

        ..  card-footer:: :ref:`See the next steps <t3sitepackage:next-steps>`
            :button-style: btn btn-secondary stretched-link

..  toctree::
    :maxdepth: 2
    :titlesonly:
    :hidden:

    Prerequisites/Index
    MinimalExample/Index
    CreatePages/Index
    Assets/Index
    FluidTemplates/Index
    ContentMapping/Index
    MainMenuCreation/Index
    SiteSets/Index
    ContentElementRendering/Index
    ContentBlocks/Index
    Faq/Index
    NextSteps/Index

..  toctree::
    :hidden:

    Sitemap
