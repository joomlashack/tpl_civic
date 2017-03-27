<?php
/**
 * @package     Tripod
 * @subpackage  Overrider
 *
 * @copyright   Copyright (C) 2005 - 2014 Joomlashack. Meritage Assets.  All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

$app = JFactory::getApplication();

$template = $app->getTemplate(true);

	$this->wrightElementsStructure = Array(
		'image',
		'icons',
		'div.title-article',
			'title',
		'/div',
		'article-info',
		'legendtop',
		'content',
        'legendbottom',
        'article-info-below',
        'article-info-split',
        'bottom'

	);

$this->wrightExtraClass = "overlapped";

require_once(JPATH_THEMES.'/'.$app->getTemplate().'/'.'wright'.'/'.'html'.'/'.'overrider.php');
include(Overrider::getOverride('com_content.article'));
?>
