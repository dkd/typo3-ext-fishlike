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

/** @var \Dkd\Aggregation\Logging\UsageTrackingServiceManager $usageTrackingServiceManager */
$usageTrackingServiceManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
	'Dkd\\Aggregation\\Logging\\UsageTrackingServiceManager'
);

$usageTrackingServiceManager->register(
	'pages',
	'Dkd\\Fishlike\\Service\\Data\\FishlikeUsageTrackingService',
	array('fishlikes')
);

$usageTrackingServiceManager->register(
	'tx_news',
	'Dkd\\Fishlike\\Service\\Data\\FishlikeUsageTrackingService',
	array('fishlikes')
);
