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
<div class="row">
	<?php foreach ($list as $item) : ?>
		<div class="col-md-<?php echo $col;?> col-sm-<?php echo $col;?> animate-box fadeInLeft animated" itemscope itemtype="https://schema.org/Article">
   <div class="blog-entry animate-box" data-animate-effect="fadeInLeft">
			<?php require ModuleHelper::getLayoutPath('mod_articles_news', '_doinoi'); ?>
   </div>
		</div>
	<?php endforeach; ?>
</div>
