<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_news
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;

if (!$list)
{
	return;
}
$col = 12/ (int)$params->get('count');
?>
<div class="mod-articlesnews newsflash row">
	<?php foreach ($list as $item) : ?>
		<div class="mod-articlesnews__item col-sm-<?php echo $col;?> animate-box fadeInLeft animated" itemscope itemtype="https://schema.org/Article">
			<?php require ModuleHelper::getLayoutPath('mod_articles_news', '_item'); ?>
		</div>
	<?php endforeach; ?>
</div>
