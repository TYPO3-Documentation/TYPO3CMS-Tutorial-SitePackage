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
        'sourceFile' => 'EXT:site_package/Configuration/Sets/SitePackage/TypoScript/Navigation/menu.typoscript',
        'targetFileName' => 'TypoScript/menu.rst.txt',
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
        'sourceFile' => 'EXT:site_package/Resources/Private/PageView/Pages/Default.html',
        'targetFileName' => 'Fluid/TemplateDefault.rst.txt',
        'caption' => 'EXT:site_package/Resources/Private/PageView/Pages/Default.html',
        'showLineNumbers' => true
    ],
    [
        'action' => 'createCodeSnippet',
        'sourceFile' => 'EXT:site_package/Resources/Private/PageView/Partials/Header.html',
        'targetFileName' => 'Fluid/Header.rst.txt',
        'caption' => 'EXT:site_package/Resources/Private/PageView/Partials/Header.html',
        'showLineNumbers' => true
    ],
    [
        'action' => 'createCodeSnippet',
        'sourceFile' => 'EXT:site_package/Resources/Private/PageView/Partials/Navigation/Menu.html',
        'targetFileName' => 'Fluid/Menu.rst.txt',
        'caption' => 'EXT:site_package/Resources/Private/PageView/Partials/Navigation/Menu.html',
        'showLineNumbers' => true
    ],
    [
        'action' => 'createCodeSnippet',
        'sourceFile' => 'EXT:site_package/Resources/Private/ContentElements/Templates/MenuSubpages.html',
        'targetFileName' => 'Fluid/MenuSubpages.rst.txt',
        'caption' => 'EXT:site_package/Resources/Private/ContentElements/Templates/MenuSubpages.html',
        'showLineNumbers' => true
    ],
    [
        'action' => 'createCodeSnippet',
        'sourceFile' => 'EXT:site_package/Resources/Private/ContentElements/Templates/MenuSitemap.html',
        'targetFileName' => 'Fluid/MenuSitemap.rst.txt',
        'caption' => 'EXT:site_package/Resources/Private/ContentElements/Templates/MenuSitemap.html',
        'showLineNumbers' => true
    ],
    [
        'action' => 'createCodeSnippet',
        'sourceFile' => 'EXT:site_package/Resources/Private/ContentElements/Partials/Media/Rendering/Image.html',
        'targetFileName' => 'Fluid/Image.rst.txt',
        'caption' => 'EXT:site_package/Resources/Private/ContentElements/Partials/Media/Rendering/Image.html',
        'showLineNumbers' => true
    ],
];
