<?php
// https://github.com/TYPO3-Documentation/t3docs-codesnippets
// ddev exec vendor/bin/typo3  restructured_api_tools:php_domain public/fileadmin/TYPO3CMS-Tutorial-SitePackage/Documentation/CodeSnippets/

return [
    # code Snippets Setup
    [
        'action' => 'createCodeSnippet',
        'sourceFile' => 'typo3conf/ext/site_package/Configuration/TypoScript/constants.typoscript',
        'targetFileName' => 'TypoScript/Constants.rst.txt',
        'caption' => 'EXT:site_package/Configuration/TypoScript/constants.typoscript',
        'showLineNumbers' => true
    ],
    [
        'action' => 'createCodeSnippet',
        'sourceFile' => 'typo3conf/ext/site_package/Configuration/TypoScript/setup.typoscript',
        'targetFileName' => 'TypoScript/Setup.rst.txt',
        'caption' => 'EXT:site_package/Configuration/TypoScript/setup.typoscript',
        'showLineNumbers' => true
    ],
    [
        'action' => 'createCodeSnippet',
        'sourceFile' => 'typo3conf/ext/site_package/Configuration/TypoScript/Setup/Page.typoscript',
        'targetFileName' => 'TypoScript/Page.rst.txt',
        'caption' => 'EXT:site_package/Configuration/TypoScript/Setup/Page.typoscript',
        'showLineNumbers' => true
    ],
    [
        'action' => 'createCodeSnippet',
        'sourceFile' => 'typo3conf/ext/site_package/Configuration/TypoScript/Setup/Part1FluidTemplateSection.typoscript',
        'targetFileName' => 'TypoScript/Part1FluidTemplateSection.rst.txt',
        'caption' => 'EXT:site_package/Configuration/TypoScript/Setup/Part1FluidTemplateSection.typoscript',
        'showLineNumbers' => true
    ],
    [
        'action' => 'createCodeSnippet',
        'sourceFile' => 'typo3conf/ext/site_package/Configuration/TypoScript/Setup/Part2CssFileInclusion.typoscript',
        'targetFileName' => 'TypoScript/Part2CssFileInclusion.rst.txt',
        'caption' => 'EXT:site_package/Configuration/TypoScript/Setup/Part2CssFileInclusion.typoscript',
        'showLineNumbers' => true
    ],
    [
        'action' => 'createCodeSnippet',
        'sourceFile' => 'typo3conf/ext/site_package/Configuration/TypoScript/Setup/Part4GlobalConfiguration.typoscript',
        'targetFileName' => 'TypoScript/Part4GlobalConfiguration.rst.txt',
        'caption' => 'EXT:site_package/Configuration/TypoScript/Setup/Part4GlobalConfiguration.typoscript',
        'showLineNumbers' => true
    ],
    [
        'action' => 'createCodeSnippet',
        'sourceFile' => 'typo3conf/ext/site_package/Configuration/TypoScript/Setup/Part5MenuProcessor.typoscript',
        'targetFileName' => 'TypoScript/Part5MenuProcessor.rst.txt',
        'caption' => 'EXT:site_package/Configuration/TypoScript/Setup/Part5MenuProcessor.typoscript',
        'showLineNumbers' => true
    ],
    [
        'action' => 'createCodeSnippet',
        'sourceFile' => 'typo3conf/ext/site_package/Configuration/TypoScript/Setup/Part6ProcessedContent.typoscript',
        'targetFileName' => 'TypoScript/Part6ProcessedContent.rst.txt',
        'caption' => 'EXT:site_package/Configuration/TypoScript/Setup/Part6ProcessedContent.typoscript',
        'showLineNumbers' => true
    ],

    #code Snippets Extension Configuration

    [
        'action' => 'createCodeSnippet',
        'sourceFile' => 'typo3conf/ext/site_package/ext_emconf.php',
        'targetFileName' => 'ExtensionConfiguration/ExtEmconf.rst.txt',
        'caption' => 'EXT:site_package/ext_emconf.php',
        'showLineNumbers' => true
    ],
    [
        'action' => 'createCodeSnippet',
        'sourceFile' => 'typo3conf/ext/site_package/composer.json',
        'targetFileName' => 'ExtensionConfiguration/ComposerJson.rst.txt',
        'caption' => 'EXT:site_package/composer.json',
        'showLineNumbers' => true
    ],
    [
        'action' => 'createCodeSnippet',
        'sourceFile' => 'typo3conf/ext/site_package/Configuration/TCA/Overrides/pages.php',
        'targetFileName' => 'ExtensionConfiguration/TcaOverridePages.rst.txt',
        'caption' => 'EXT:site_package/Configuration/TCA/Overrides/pages.php',
        'showLineNumbers' => true
    ],
    [
        'action' => 'createCodeSnippet',
        'sourceFile' => 'typo3conf/ext/site_package/Configuration/TCA/Overrides/sys_template.php',
        'targetFileName' => 'ExtensionConfiguration/TcaOverrideSysTemplate.rst.txt',
        'caption' => 'EXT:site_package/Configuration/TCA/Overrides/sys_template.php',
        'showLineNumbers' => true
    ],

    # code Snippets Fluid


    [
        'action' => 'createCodeSnippet',
        'sourceFile' => 'typo3conf/ext/site_package/Resources/Public/StaticTemplate/Step1Default.html',
        'targetFileName' => 'Fluid/Step1Default.rst.txt',
        'caption' => 'EXT:site_package/Resources/Public/StaticTemplate/Step1Default.html',
        'showLineNumbers' => true
    ],
    [
        'action' => 'createCodeSnippet',
        'sourceFile' => 'typo3conf/ext/site_package/Resources/Public/StaticTemplate/Step2Default.html',
        'targetFileName' => 'Fluid/Step2Default.rst.txt',
        'caption' => 'EXT:site_package/Resources/Public/StaticTemplate/Step2Default.html',
        'showLineNumbers' => true
    ],
    [
        'action' => 'createCodeSnippet',
        'sourceFile' => 'typo3conf/ext/site_package/Resources/Public/StaticTemplate/Step3Default.html',
        'targetFileName' => 'Fluid/Step3Default.rst.txt',
        'caption' => 'EXT:site_package/Resources/Public/StaticTemplate/Step3Default.html',
        'showLineNumbers' => true
    ],
    [
        'action' => 'createCodeSnippet',
        'sourceFile' => 'typo3conf/ext/site_package/Resources/Private/Templates/Page/Default.html',
        'targetFileName' => 'Fluid/TemplateDefault.rst.txt',
        'caption' => 'EXT:site_package/Resources/Private/Templates/Page/Default.html',
        'showLineNumbers' => true
    ],
    [
        'action' => 'createCodeSnippet',
        'sourceFile' => 'typo3conf/ext/site_package/Resources/Private/Templates/Page/TwoColumns.html',
        'targetFileName' => 'Fluid/TemplateTwoColumns.rst.txt',
        'caption' => 'EXT:site_package/Resources/Private/Templates/Page/TwoColumns.html',
        'showLineNumbers' => true
    ],
    [
        'action' => 'createCodeSnippet',
        'sourceFile' => 'typo3conf/ext/site_package/Resources/Private/Partials/Page/Jumbotron.html',
        'targetFileName' => 'Fluid/PartialJumbotron.rst.txt',
        'caption' => 'EXT:site_package/Resources/Private/Partials/Page/Jumbotron.html',
        'showLineNumbers' => true
    ],
    [
        'action' => 'createCodeSnippet',
        'sourceFile' => 'typo3conf/ext/site_package/Resources/Private/Layouts/Page/Default.html',
        'targetFileName' => 'Fluid/Layout.rst.txt',
        'caption' => 'EXT:site_package/Resources/Private/Layouts/Page/Default.html',
        'showLineNumbers' => true
    ],
];
