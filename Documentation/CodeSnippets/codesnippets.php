<?php
// https=>//github.com/TYPO3-Documentation/t3docs-codesnippets
// ddev exec vendor/bin/typo3  restructured_api_tools:php_domain public/fileadmin/TYPO3CMS-Tutorial-SitePackage/Documentation/CodeSnippets/

return [
    # code Snippets Setup
    [
        'action' => 'createCodeSnippet',
        'sourceFile' => 'EXT:site_package/Configuration/Sets/SitePackage/setup.typoscript',
        'targetFileName' => 'TypoScript/Setup.rst.txt',
        'caption' => 'EXT:site_package/Configuration/Sets/SitePackage/setup.typoscript',
        'showLineNumbers' => true
    ],
    [
        'action' => 'createCodeSnippet',
        'sourceFile' => 'EXT:site_package/Configuration/TypoScript/Setup/Page.typoscript',
        'targetFileName' => 'TypoScript/Page.rst.txt',
        'caption' => 'EXT:site_package/Configuration/TypoScript/Setup/Page.typoscript',
        'showLineNumbers' => true
    ],
    [
        'action' => 'createCodeSnippet',
        'sourceFile' => 'EXT:site_package/Configuration/TypoScript/Setup/pageview.typoscript',
        'targetFileName' => 'TypoScript/pageview.rst.txt',
        'caption' => 'EXT:site_package/Configuration/TypoScript/Setup/pageview.typoscript',
        'showLineNumbers' => true
    ],
    [
        'action' => 'createCodeSnippet',
        'sourceFile' => 'EXT:site_package/Configuration/TypoScript/Setup/Part4GlobalConfiguration.typoscript',
        'targetFileName' => 'TypoScript/Part4GlobalConfiguration.rst.txt',
        'caption' => 'EXT:site_package/Configuration/TypoScript/Setup/Part4GlobalConfiguration.typoscript',
        'showLineNumbers' => true
    ],
    [
        'action' => 'createCodeSnippet',
        'sourceFile' => 'EXT:site_package/Configuration/TypoScript/Setup/Navigation/menu.typoscript',
        'targetFileName' => 'TypoScript/Navigation/menu.typoscript',
        'showLineNumbers' => true
    ],

    #code Snippets Extension Configuration
    [
        'action' => 'createCodeSnippet',
        'sourceFile' => 'EXT:site_package/Configuration/Sets/SitePackage/settings.yaml',
        'targetFileName' => 'ExtensionConfiguration/SitePackage-settings.rst.txt',
        'caption' => 'EXT:site_package/Configuration/Sets/SitePackage/settings.yaml',
        'showLineNumbers' => true
    ],
    [
        'action' => 'createCodeSnippet',
        'sourceFile' => 'EXT:site_package/Configuration/Sets/SitePackage/setup.typoscript',
        'targetFileName' => 'ExtensionConfiguration/SitePackage-setup.rst.txt',
        'caption' => 'EXT:site_package/Configuration/Sets/SitePackage/setup.typoscript',
    ],
    [
        'action' => 'createCodeSnippet',
        'sourceFile' => 'EXT:site_package/Configuration/Sets/SitePackage/settings.definitions.yaml',
        'targetFileName' => 'ExtensionConfiguration/SitePackage-settings-definitions-yaml.rst.txt',
        'caption' => 'EXT:site_package/Configuration/Sets/SitePackage/settings.definitions.yaml',
    ],
    [
        'action' => 'createCodeSnippet',
        'sourceFile' => 'EXT:site_package/Configuration/Sets/SitePackage/page.tsconfig',
        'targetFileName' => 'ExtensionConfiguration/SitePackage-page-tsconfig.rst.txt',
        'caption' => 'EXT:site_package/Configuration/Sets/SitePackage/page.tsconfig',
        'language' => 'typoscript',
    ],

    # code Snippets Fluid
    [
        'action' => 'createCodeSnippet',
        'sourceFile' => 'EXT:site_package/Resources/Private/Templates/Pages/Default.html',
        'targetFileName' => 'Fluid/TemplateDefault.rst.txt',
        'caption' => 'EXT:site_package/Resources/Private/Templates/Pages/Default.html',
        'showLineNumbers' => true
    ],
    [
        'action' => 'createCodeSnippet',
        'sourceFile' => 'EXT:site_package/Resources/Private/Templates/Partials/Jumbotron.html',
        'targetFileName' => 'Fluid/PartialJumbotron.rst.txt',
        'caption' => 'EXT:site_package/Resources/Private/Templates/Partials/Jumbotron.html',
        'showLineNumbers' => true
    ],
    [
        'action' => 'createCodeSnippet',
        'sourceFile' => 'EXT:site_package/Resources/Private/Templates/Partials/Header.html',
        'targetFileName' => 'Fluid/Header.rst.txt',
        'caption' => 'EXT:site_package/Resources/Private/Templates/Partials/Header.html',
        'showLineNumbers' => true
    ],
    [
        'action' => 'createCodeSnippet',
        'sourceFile' => 'EXT:site_package/Resources/Private/Templates/Partials/Navigation/Menu.html',
        'targetFileName' => 'Fluid/Menu.rst.txt',
        'caption' => 'EXT:site_package/Resources/Private/Templates/Partials/Navigation/Menu.html',
        'showLineNumbers' => true
    ],
];
