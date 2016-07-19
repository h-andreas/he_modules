<?php

if (!isset($GLOBALS['TCA']['tx_hetools_domain_model_studyprograms']['ctrl']['type'])) {
	if (file_exists($GLOBALS['TCA']['tx_hetools_domain_model_studyprograms']['ctrl']['dynamicConfigFile'])) {
		require_once($GLOBALS['TCA']['tx_hetools_domain_model_studyprograms']['ctrl']['dynamicConfigFile']);
	}
	// no type field defined, so we define it here. This will only happen the first time the extension is installed!!
	$GLOBALS['TCA']['tx_hetools_domain_model_studyprograms']['ctrl']['type'] = 'tx_extbase_type';
	$tempColumnstx_hemodules_tx_hetools_domain_model_studyprograms = array();
	$tempColumnstx_hemodules_tx_hetools_domain_model_studyprograms[$GLOBALS['TCA']['tx_hetools_domain_model_studyprograms']['ctrl']['type']] = array(
		'exclude' => 1,
		'label'   => 'LLL:EXT:he_modules/Resources/Private/Language/locallang_db.xlf:tx_hemodules.tx_extbase_type',
		'config' => array(
			'type' => 'select',
			'renderType' => 'selectSingle',
			'items' => array(
				array('Studyprograms','Tx_HeModules_Studyprograms')
			),
			'default' => 'Tx_HeModules_Studyprograms',
			'size' => 1,
			'maxitems' => 1,
		)
	);
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_hetools_domain_model_studyprograms', $tempColumnstx_hemodules_tx_hetools_domain_model_studyprograms, 1);
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
	'tx_hetools_domain_model_studyprograms',
	$GLOBALS['TCA']['tx_hetools_domain_model_studyprograms']['ctrl']['type'],
	'',
	'after:' . $GLOBALS['TCA']['tx_hetools_domain_model_studyprograms']['ctrl']['label']
);

$tmp_he_modules_columns = array(

	'course' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:he_modules/Resources/Private/Language/locallang_db.xlf:tx_hemodules_domain_model_studyprograms.course',
		'config' => array(
			'type' => 'check',
			'default' => 0
		)
	),
);

$tmp_he_modules_columns['modules'] = array(
	'config' => array(
		'type' => 'passthrough',
	)
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_hetools_domain_model_studyprograms',$tmp_he_modules_columns);

/* inherit and extend the show items from the parent class */

if(isset($GLOBALS['TCA']['tx_hetools_domain_model_studyprograms']['types']['1']['showitem'])) {
	$GLOBALS['TCA']['tx_hetools_domain_model_studyprograms']['types']['Tx_HeModules_Studyprograms']['showitem'] = $GLOBALS['TCA']['tx_hetools_domain_model_studyprograms']['types']['1']['showitem'];
} elseif(is_array($GLOBALS['TCA']['tx_hetools_domain_model_studyprograms']['types'])) {
	// use first entry in types array
	$tx_hetools_domain_model_studyprograms_type_definition = reset($GLOBALS['TCA']['tx_hetools_domain_model_studyprograms']['types']);
	$GLOBALS['TCA']['tx_hetools_domain_model_studyprograms']['types']['Tx_HeModules_Studyprograms']['showitem'] = $tx_hetools_domain_model_studyprograms_type_definition['showitem'];
} else {
	$GLOBALS['TCA']['tx_hetools_domain_model_studyprograms']['types']['Tx_HeModules_Studyprograms']['showitem'] = '';
}
$GLOBALS['TCA']['tx_hetools_domain_model_studyprograms']['types']['Tx_HeModules_Studyprograms']['showitem'] .= ',--div--;LLL:EXT:he_modules/Resources/Private/Language/locallang_db.xlf:tx_hemodules_domain_model_studyprograms,';
$GLOBALS['TCA']['tx_hetools_domain_model_studyprograms']['types']['Tx_HeModules_Studyprograms']['showitem'] .= 'course';

$GLOBALS['TCA']['tx_hetools_domain_model_studyprograms']['columns'][$GLOBALS['TCA']['tx_hetools_domain_model_studyprograms']['ctrl']['type']]['config']['items'][] = array('LLL:EXT:he_modules/Resources/Private/Language/locallang_db.xlf:tx_hetools_domain_model_studyprograms.tx_extbase_type.Tx_HeModules_Studyprograms','Tx_HeModules_Studyprograms');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
	'',
	'EXT:/Resources/Private/Language/locallang_csh_.xlf'
);