<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

ExtensionManagementUtility::addTcaSelectItemGroup(
    'tt_content',
    'CType',
    'my_site_package',
    'LLL:site_package.backend.content_elements:group.site_package',
    'after:default',
);
