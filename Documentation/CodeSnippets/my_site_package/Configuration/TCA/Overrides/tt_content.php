<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

ExtensionManagementUtility::addTcaSelectItemGroup(
    'tt_content',
    'CType',
    'my_site_package',
    'LLL:EXT:my_site_package/Resources/Private/Language/locallang_be.xlf:content_element.group.my_site_package',
    'after:default',
);
