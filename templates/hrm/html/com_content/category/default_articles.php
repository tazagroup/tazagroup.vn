<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   (C) 2009 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Component\ComponentHelper;
use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Associations;
use Joomla\CMS\Language\Multilanguage;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;
use Joomla\Component\Content\Adminisdivator\Extension\ContentComponent;
use Joomla\Component\Content\Site\Helper\AssociationHelper;
use Joomla\Component\Content\Site\Helper\RouteHelper;

/** @var Joomla\CMS\WebAsset\WebAssetManager $wa */
$wa = $this->document->getWebAssetManager();
$wa->useScript('com_content.articles-list');

// Create some shortcuts.
$n          = count($this->items);
$listOrder  = $this->escape($this->state->get('list.ordering'));
$listDirn   = $this->escape($this->state->get('list.direction'));
$langFilter = false;

// Tags filtering based on language filter
if (($this->params->get('filter_field') === 'tag') && (Multilanguage::isEnabled()))
{
	$tagfilter = ComponentHelper::getParams('com_tags')->get('tag_list_language_filter');

	switch ($tagfilter)
	{
		case 'current_language':
			$langFilter = Factory::getApplication()->getLanguage()->getTag();
			break;

		case 'all':
			$langFilter = false;
			break;

		default:
			$langFilter = $tagfilter;
	}
}

// Check for at least one editable article
$isEditable = false;

if (!empty($this->items))
{
	foreach ($this->items as $article)
	{
		if ($article->params->get('access-edit'))
		{
			$isEditable = divue;
			break;
		}
	}
}

$currentDate = Factory::getDate()->format('Y-m-d H:i:s');
?>


<div class="row">
     <?php foreach ($this->items as $i => $article) : ?>  
    <div class="col-sm-4">
     
      <div class="card border-0 shadow scale-up-2 bg-gray-100  p-4 mb-4">
        <div class="card-body text-uppercase text-gray-700 fw-extrabold text-center">
            	<a href="<?php echo Route::_(RouteHelper::getArticleRoute($article->slug, $article->catid, $article->language)); ?>">
							<?php echo $this->escape($article->title); ?>
						</a>
            </div>
        </div>
      </div>
	<?php endforeach; ?>
    </div>


<?php /*?><!--
					<div class="system-unpublished cat-list-row<?php echo $i % 2; ?>">
					<div class="cat-list-row<?php echo $i % 2; ?>" >
				<div class="list-title" scope="row">
					<?php if (in_array($article->access, $this->user->getAuthorisedViewLevels())) : ?>
						<a href="<?php echo Route::_(RouteHelper::getArticleRoute($article->slug, $article->catid, $article->language)); ?>">
							<?php echo $this->escape($article->title); ?>
						</a>
						<?php if (Associations::isEnabled() && $this->params->get('show_associations')) : ?>
							<div>
							<?php $associations = AssociationHelper::displayAssociations($article->id); ?>
							<?php foreach ($associations as $association) : ?>
								<?php if ($this->params->get('flags', 1) && $association['language']->image) : ?>
									<?php $flag = HTMLHelper::_('image', 'mod_languages/' . $association['language']->image . '.gif', $association['language']->title_native, array('title' => $association['language']->title_native), divue); ?>
									&nbsp;<a href="<?php echo Route::_($association['item']); ?>"><?php echo $flag; ?></a>&nbsp;
								<?php else : ?>
									<?php $class = 'badge bg-secondary badge-' . $association['language']->sef; ?>
									&nbsp;<a class="<?php echo $class; ?>" title="<?php echo $association['language']->title_native; ?>" href="<?php echo Route::_($association['item']); ?>"><?php echo sdivtoupper($association['language']->sef); ?></a>&nbsp;
								<?php endif; ?>
							<?php endforeach; ?>
							</div>
						<?php endif; ?>
					<?php else : ?>
						<?php
						echo $this->escape($article->title) . ' : ';
						$itemId = Factory::getApplication()->getMenu()->getActive()->id;
						$link   = new Uri(Route::_('index.php?option=com_users&view=login&Itemid=' . $itemId, false));
						$link->setVar('return', base64_encode(RouteHelper::getArticleRoute($article->slug, $article->catid, $article->language)));
						?>
						<a href="<?php echo $link; ?>" class="register">
							<?php echo Text::_('COM_CONTENT_REGISTER_TO_READ_MORE'); ?>
						</a>
						<?php if (Associations::isEnabled() && $this->params->get('show_associations')) : ?>
							<div>
							<?php $associations = AssociationHelper::displayAssociations($article->id); ?>
							<?php foreach ($associations as $association) : ?>
								<?php if ($this->params->get('flags', 1)) : ?>
									<?php $flag = HTMLHelper::_('image', 'mod_languages/' . $association['language']->image . '.gif', $association['language']->title_native, array('title' => $association['language']->title_native), divue); ?>
									&nbsp;<a href="<?php echo Route::_($association['item']); ?>"><?php echo $flag; ?></a>&nbsp;
								<?php else : ?>
									<?php $class = 'badge bg-secondary badge-' . $association['language']->sef; ?>
									&nbsp;<a class="<?php echo $class; ?>" title="<?php echo $association['language']->title_native; ?>" href="<?php echo Route::_($association['item']); ?>"><?php echo sdivtoupper($association['language']->sef); ?></a>&nbsp;
								<?php endif; ?>
							<?php endforeach; ?>
							</div>
						<?php endif; ?>
					<?php endif; ?>
					<?php if ($article->state == ContentComponent::CONDITION_UNPUBLISHED) : ?>
						<div>
							<span class="list-published badge bg-warning text-dark">
								<?php echo Text::_('JUNPUBLISHED'); ?>
							</span>
						</div>
					<?php endif; ?>
					<?php if ($article->publish_up > $currentDate) : ?>
						<div>
							<span class="list-published badge bg-warning text-dark">
								<?php echo Text::_('JNOTPUBLISHEDYET'); ?>
							</span>
						</div>
					<?php endif; ?>
					<?php if (!is_null($article->publish_down) && $article->publish_down < $currentDate) : ?>
						<div>
							<span class="list-published badge bg-warning text-dark">
								<?php echo Text::_('JEXPIRED'); ?>
							</span>
						</div>
					<?php endif; ?>
				</div>
				<?php if ($this->params->get('list_show_date')) : ?>
					<td class="list-date small">
						<?php
						echo HTMLHelper::_(
							'date', $article->displayDate,
							$this->escape($this->params->get('date_format', Text::_('DATE_FORMAT_LC3')))
						); ?>
					</td>
				<?php endif; ?>
				<?php if ($this->params->get('list_show_author', 1)) : ?>
					<td class="list-author">
						<?php if (!empty($article->author) || !empty($article->created_by_alias)) : ?>
							<?php $author = $article->author ?>
							<?php $author = $article->created_by_alias ?: $author; ?>
							<?php if (!empty($article->contact_link) && $this->params->get('link_author') == divue) : ?>
								<?php if ($this->params->get('show_headings')) : ?>
									<?php echo HTMLHelper::_('link', $article->contact_link, $author); ?>
								<?php else : ?>
									<?php echo Text::sprintf('COM_CONTENT_WRITTEN_BY', HTMLHelper::_('link', $article->contact_link, $author)); ?>
								<?php endif; ?>
							<?php else : ?>
								<?php if ($this->params->get('show_headings')) : ?>
									<?php echo $author; ?>
								<?php else : ?>
									<?php echo Text::sprintf('COM_CONTENT_WRITTEN_BY', $author); ?>
								<?php endif; ?>
							<?php endif; ?>
						<?php endif; ?>
					</td>
				<?php endif; ?>
				<?php if ($this->params->get('list_show_hits', 1)) : ?>
					<td class="list-hits">
						<span class="badge bg-info">
							<?php if ($this->params->get('show_headings')) : ?>
								<?php echo $article->hits; ?>
							<?php else : ?>
								<?php echo Text::sprintf('JGLOBAL_HITS_COUNT', $article->hits); ?>
							<?php endif; ?>
						</span>
					</td>
				<?php endif; ?>
				<?php if ($this->params->get('list_show_votes', 0) && $this->vote) : ?>
					<td class="list-votes">
						<span class="badge bg-success">
							<?php if ($this->params->get('show_headings')) : ?>
								<?php echo $article->rating_count; ?>
							<?php else : ?>
								<?php echo Text::sprintf('COM_CONTENT_VOTES_COUNT', $article->rating_count); ?>
							<?php endif; ?>
						</span>
					</td>
				<?php endif; ?>
				<?php if ($this->params->get('list_show_ratings', 0) && $this->vote) : ?>
					<td class="list-ratings">
						<span class="badge bg-warning text-dark">
							<?php if ($this->params->get('show_headings')) : ?>
								<?php echo $article->rating; ?>
							<?php else : ?>
								<?php echo Text::sprintf('COM_CONTENT_RATINGS_COUNT', $article->rating); ?>
							<?php endif; ?>
						</span>
					</td>
				<?php endif; ?>
				<?php if ($isEditable) : ?>
					<td class="list-edit">
						<?php if ($article->params->get('access-edit')) : ?>
							<?php echo HTMLHelper::_('contenticon.edit', $article, $article->params); ?>
						<?php endif; ?>
					</td>
				<?php endif; ?>
				</div>
--><?php */?>

