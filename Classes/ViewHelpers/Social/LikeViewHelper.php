<?php

namespace Dkd\Fishlike\ViewHelpers\Social;

/**
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

/**
 * ViewHelper to add a fishlike button
 *
 * @package TYPO3
 * @subpackage tx_news
 */
class LikeViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper {


	/**
	 * @var	string
	 */
	protected $tagName = 'a';

	/**
	 * Arguments initialization
	 *
	 * @return void
	 */
	public function initializeArguments() {
		$this->registerTagAttribute('class', 'string', 'Class of link');
		$this->registerTagAttribute('datatype', 'string', 'Object type');
		$this->registerTagAttribute('datauid', 'string', 'Object uid');
	}

	/**
	 * Render fishlike viewhelper
	 *
	 * @return string
	 */
	public function render() {
		$this->tag->addAttribute('href', '#');
		$this->tag->addAttribute('class', (!empty($this->arguments['class'])) ? $this->arguments['class'] : 'fishlike-button');

		// rewrite tags as it seems that it is not possible to have tags with a '-'.
		$rewriteTags = array('datatype', 'datauid');
		foreach ($rewriteTags as $tag) {
			if (!empty($this->arguments[$tag])) {
				$newTag = str_replace('data', 'data-', $tag);
				$this->tag->addAttribute($newTag, $this->arguments[$tag]);
				$this->tag->removeAttribute($tag);
			}
		}
		
		$this->tag->setContent($this->renderChildren());

		return $this->tag->render();
	}
}
