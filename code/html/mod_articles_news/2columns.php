<?php
// Wright v.3 Override: Joomla 2.5.16 and 3.2
/**
 * @package		Joomla.Site
 * @subpackage	mod_articles_news
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

?>

<?php
	$cont = 0
?>

<div class="newsflash-2columns<?php echo $params->get('moduleclass_sfx'); // Wright v.3: Added row-fluid  class ?>">
	<?php for ($i = 0, $n = count($list); $i < $n; $i ++) :
		$item = $list[$i]; ?>

		<?php if ($cont % 2 ==  0): ?>
			<div class="row-fluid">
		<?php endif; ?>
		<div class="span6"> <?php // Wright v.3: Added span3 class for 4 columns ?>

			<?php require JModuleHelper::getLayoutPath('mod_articles_news', '_item2');

			if ($n > 1 && (($i < $n - 1) || $params->get('showLastSeparator'))) : ?>

				<span class="article-separator">&#160;</span>

			<?php endif; ?>

		</div>
		<?php if ($cont % 2 !=  0 || $cont == $n - 1): ?>
			</div>
		<?php endif; ?>
		<?php
			$cont = $cont + 1;
		?>
	<?php endfor; ?>
</div>
