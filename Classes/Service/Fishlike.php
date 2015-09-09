<?php
namespace Dkd\Fishlike\Service;

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

use TYPO3\CMS\Core\Database\DatabaseConnection;
use TYPO3\CMS\Core\SingletonInterface;

/**
 * Class ReferencesUsageTrackingService
 */
class Fishlike implements SingletonInterface {

	/**
	 * @var string
	 */
	protected $table = 'tx_fishlike_like';


	/**
	 * @param string $type
	 * @param integer $uid
	 */
	public function addLike($type, $uid) {
		$row = $this->getDatabaseConnection()->exec_SELECTgetSingleRow(
			'uid,counter',
			$this->table,
			'item_type = ' . $this->getDatabaseConnection()->fullQuoteStr(
				$type,
				$this->table) .
			' AND item_uid = ' . intval($uid)
		);

		if(isset($row['uid'])) {
			$counter = ++$row['counter'];
			$this->getDatabaseConnection()->exec_UPDATEquery(
				$this->table,
				'uid=' . $row['uid'],
				array('counter' => $counter)
			);
		} else {
			$counter = 1;
			$this->getDatabaseConnection()->exec_INSERTquery(
				$this->table,
				array(
					'item_uid' => intval($uid),
					'item_type' => $type,
					'counter' => $counter
				)
			);
		}
		return $counter;
	}

	/**
	 * Gets calculation counter
	 *
	 * @return integer
	 */
	public function getCounter($type, $uid) {
		$row = $this->getDatabaseConnection()->exec_SELECTgetSingleRow(
			'counter',
			$this->table,
			'item_type = ' . $this->getDatabaseConnection()->fullQuoteStr(
				$type,
				$this->table) .
			' AND item_uid = ' . intval($uid)
		);
		return isset($row['counter']) ? $row['counter'] : 0;
	}


	/**
	 * Return TYPO3 database connection
	 * @return DatabaseConnection
	 */
	protected function getDatabaseConnection() {
		return $GLOBALS['TYPO3_DB'];
	}
}
