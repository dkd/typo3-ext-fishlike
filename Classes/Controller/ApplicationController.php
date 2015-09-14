<?php
namespace Dkd\Fishlike\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Class ArchiveController
 */
class ApplicationController extends ActionController {
	/**
	 * Like action
	 * 
	 * @param string $type
	 * @param integer $uid
     * @return integer
	 */
	public function likeAction($type, $uid) {
		/** @var \Dkd\Fishlike\Service\Fishlike $service */
		$service = $this->objectManager->get('Dkd\Fishlike\Service\Fishlike');
		$count = 0;
		if(isset($this->settings['monitoredTypes'][$type])  && $this->settings['monitoredTypes'][$type] == 1) {
			$count = $service->addLike($type, $uid);
		}

		return json_encode(array('count' => $count));
	}

	/**
	 * Get counter action
	 *
	 * @param string $type
	 * @param integer $uid
     * @return integer
	 */
	public function getCounterAction($type, $uid) {
		/** @var \Dkd\Fishlike\Service\Fishlike $service */
		$service = $this->objectManager->get('\Dkd\Fishlike\Service\Fishlike');
		$count = 0;
		if(isset($this->settings['monitoredTypes'][$type])  && $this->settings['monitoredTypes'][$type] == 1) {
			$count = $service->getCounter($type, $uid);
		}
		return json_encode(array('count' => $count));
	}
}
