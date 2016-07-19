<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'HSE.' . $_EXTKEY,
	'Modulemanagement',
	'Modulverwaltung'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'HE-Module');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_hemodules_domain_model_modules', 'EXT:he_modules/Resources/Private/Language/locallang_csh_tx_hemodules_domain_model_modules.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_hemodules_domain_model_modules');
