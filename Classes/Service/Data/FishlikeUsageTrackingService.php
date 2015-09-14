<?php
namespace Dkd\Fishlike\Service\Data;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use Dkd\Aggregation\Logging\QueueItem;
use Dkd\Aggregation\Service\Data\UsageTrackingServiceInterface;
use TYPO3\CMS\Core\Database\DatabaseConnection;
use TYPO3\CMS\Core\SingletonInterface;


/**
 * Class ReferencesUsageTrackingService
 */
class FishlikeUsageTrackingService implements UsageTrackingServiceInterface {
	/**
	 * Queue item
	 * @var QueueItem
	 */
	protected $queueItem;

	/**
	 * Provider name
	 * @var string
	 */
	protected $provider = 'internal';

	/**
	 * Gets calculation counter
	 *
	 * @return integer
	 */
	public function getFishlikesCounter() {
		$row = $this->getDatabaseConnection()->exec_SELECTgetSingleRow(
			'counter',
			'tx_fishlike_like',
			'item_type = ' . $this->getDatabaseConnection()->fullQuoteStr(
				$this->queueItem->getType(),
				'tx_fishlike_like') .
			' AND item_uid = ' . intval($this->queueItem->getTypo3uid())
		);

		return $row['counter'];
	}

	/**
	 * Setup service
	 *
	 * @param QueueItem $item
	 * @return void
	 */
	public function setup(QueueItem $item) {
		$this->queueItem = $item;
	}

	/**
	 * Returns provider name
	 *
	 * @return string
	 */
	public function getProvider() {
		return $this->provider;
	}

	/**
	 * Return TYPO3 database connection
	 * @return DatabaseConnection
	 */
	protected function getDatabaseConnection() {
		return $GLOBALS['TYPO3_DB'];
	}
}
