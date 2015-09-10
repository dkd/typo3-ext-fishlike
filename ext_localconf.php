<?php
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Dkd.' . $_EXTKEY,
	'like',
	array(
		'Application' => 'getCounter,like',
	),
	array(
		'Application' => 'getCounter,like',
	)
);
