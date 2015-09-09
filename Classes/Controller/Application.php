<?php
namespace Dkd\Fishlike\Controller;

use TYPO3\CMS\Extensionmanager\Controller\ActionController;

/**
 * Class ArchiveController
 */
class ApplicationController extends ActionController {
	/**
	 * like action
	 * 
	 * @param $type
	 * @param $uid
     * @return integer
	 */
	public function likeAction($type, $uid) {
		/** @var \Dkd\Fishlike\Service\Fishlike $service */
		$service = $this->objectManager->get('Dkd\Fishlike\Service\Fishlike');
		return $service->addLike($type, $uid);
	}

	/**
	 * get counter action
	 *
	 * @param $type
	 * @param $uid
     * @return integer
	 */
	public function getCounterAction($type, $uid) {
		/** @var \Dkd\Fishlike\Service\Fishlike $service */
		$service = $this->objectManager->get('\Dkd\Fishlike\Service\Fishlike');
		return $service->getCounter($type, $uid);
	}
}
