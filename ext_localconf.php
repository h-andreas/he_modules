<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'HSE.' . $_EXTKEY,
	'Modulemanagement',
	array(
		'Modules' => 'list, show, new, create, edit, update, delete',
		'Studyprograms' => 'list, show, new, create, edit, update, delete',
		
	),
	// non-cacheable actions
	array(
		'Modules' => 'create, update, delete',
		'Studyprograms' => 'create, update, delete',
		
	)
);
