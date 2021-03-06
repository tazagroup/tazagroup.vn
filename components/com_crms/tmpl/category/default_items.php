<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_crms
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\String\PunycodeHelper;
use Joomla\CMS\Uri\Uri;
use Joomla\Component\Crms\Site\Helper\RouteHelper;

$n         = count($this->items);
$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn  = $this->escape($this->state->get('list.direction'));

?>
<div class="com-crms-category__items">
	<?php if (empty($this->items)) : ?>
		<p><?php echo Text::_('COM_CRMS_NO_ARTICLES'); ?></p>
	<?php else : ?>
		<form action="<?php echo htmlspecialchars(Uri::getInstance()->toString(), ENT_COMPAT, 'UTF-8'); ?>" method="post" name="adminForm" id="adminForm">
			<?php if ($this->params->get('filter_field') !== 'hide' || $this->params->get('show_pagination_limit')) : ?>
				<fieldset class="com-crms-category__filters filters btn-toolbar">
					<?php if ($this->params->get('filter_field') !== 'hide' && $this->params->get('filter_field') == '1') : ?>
						<div class="btn-group">
							<label class="filter-search-lbl visually-hidden" for="filter-search">
								<?php echo Text::_('COM_CRMS_FILTER_LABEL') . '&#160;'; ?>
							</label>
							<input type="text" name="filter-search" id="filter-search" value="<?php echo $this->escape($this->state->get('list.filter')); ?>" class="inputbox" onchange="document.adminForm.submit();" placeholder="<?php echo Text::_('COM_CRMS_FILTER_SEARCH_DESC'); ?>">
						</div>
					<?php endif; ?>
					<?php if ($this->params->get('show_pagination_limit')) : ?>
						<div class="btn-group float-end">
							<label for="limit" class="visually-hidden">
								<?php echo Text::_('JGLOBAL_DISPLAY_NUM'); ?>
							</label>
							<?php echo $this->pagination->getLimitBox(); ?>
						</div>
					<?php endif; ?>
				</fieldset>
			<?php endif; ?>
			<ul class="com-crms-category__category category list-striped list-condensed">
				<?php foreach ($this->items as $i => $item) : ?>
					<?php if ($this->items[$i]->published == 0) : ?>
						<li class="system-unpublished cat-list-row<?php echo $i % 2; ?>">
					<?php else : ?>
						<li class="cat-list-row<?php echo $i % 2; ?>">
					<?php endif; ?>
					<?php if ($this->params->get('show_articles')) : ?>
						<span class="list-hits badge bg-info float-end">
							<?php echo Text::sprintf('COM_CRMS_NUM_ARTICLES_COUNT', $item->numarticles); ?>
						</span>
					<?php endif; ?>
					<span class="list float-start">
						<div class="list-title">
							<a href="<?php echo Route::_(RouteHelper::getCrmRoute($item->slug, $item->catid)); ?>">
								<?php echo $item->name; ?>
							</a>
						</div>
					</span>
					<?php if ($this->items[$i]->published == 0) : ?>
						<span class="badge bg-warning text-light">
							<?php echo Text::_('JUNPUBLISHED'); ?>
						</span>
					<?php endif; ?>
					<br>
					<?php if ($this->params->get('show_link')) : ?>
						<?php $link = PunycodeHelper::urlToUTF8($item->link); ?>
						<span class="list float-start">
							<a href="<?php echo $item->link; ?>">
								<?php echo $link; ?>
							</a>
						</span>
						<br>
					<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
			<?php // Add pagination links ?>
			<?php if (!empty($this->items)) : ?>
				<?php if (($this->params->def('show_pagination', 2) == 1 || ($this->params->get('show_pagination') == 2)) && ($this->pagination->pagesTotal > 1)) : ?>
					<div class="com-crms-category__pagination w-100">
						<?php if ($this->params->def('show_pagination_results', 1)) : ?>
							<p class="counter float-end pt-3 pe-2">
								<?php echo $this->pagination->getPagesCounter(); ?>
							</p>
						<?php endif; ?>
						<?php echo $this->pagination->getPagesLinks(); ?>
					</div>
				<?php endif; ?>
			<?php endif; ?>
		</form>
	<?php endif; ?>
</div>

