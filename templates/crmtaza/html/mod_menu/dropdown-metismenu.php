<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   (C) 2020 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\WebAsset\WebAssetManager;
use Joomla\Utilities\ArrayHelper;

/** @var WebAssetManager $wa */
$wa = $app->getDocument()->getWebAssetManager();
$wa->registerAndUseScript('metismenu', 'media/templates/cassiopeia/js/mod_menu/menu-metismenu.min.js', [], [], ['metismenujs']);

$attributes          = [];
$attributes['class'] = 'nav flex-column pt-3 pt-md-0 ' . $class_sfx;

if ($tagId = $params->get('tag_id', ''))
{
	$attributes['id'] = $tagId;
}

$start = (int) $params->get('startLevel', 1);

?>
<ul <?php echo ArrayHelper::toString($attributes); ?>>

<li class="nav-item"><a href="/crmtaza" class="nav-link d-flex align-items-center"><span class="sidebar-icon"><img src="https://tazagroup.vn/templates/tazagroup/images/logo-white.png" height="20" width="20" alt="Taza Group"> </span><span class="mt-1 sidebar-text">Taza Group</span></a></li>    
    
<?php foreach ($list as $i => &$item)
{
	// Skip sub-menu items if they are set to be hidden in the module's options
	if (!$showAll && $item->level > $start)
	{
		continue;
	}

	$itemParams = $item->getParams();
	$class      = [];
	$class[]    = 'nav-item item-' . $item->id . ' level-' . ($item->level - $start + 1);

	if ($item->id == $default_id)
	{
		$class[] = 'default';
	}

	if ($item->id == $active_id || ($item->type === 'alias' && $itemParams->get('aliasoptions') == $active_id))
	{
		$class[] = 'current';
	}

	if (in_array($item->id, $path))
	{
		$class[] = 'active';
	}
	elseif ($item->type === 'alias')
	{
		$aliasToId = $itemParams->get('aliasoptions');

		if (count($path) > 0 && $aliasToId == $path[count($path) - 1])
		{
			$class[] = 'active';
		}
		elseif (in_array($aliasToId, $path))
		{
			$class[] = 'alias-parent-active';
		}
	}

	if ($item->type === 'separator')
	{
		$class[] = 'divider';
	}

	if ($showAll)
	{
		if ($item->deeper)
		{
			$class[] = 'deeper';
		}

		if ($item->parent)
		{
			$class[] = 'parent';
		}
	}

	echo '<li class="' . implode(' ', $class) . '">';

	switch ($item->type) :
		case 'separator':
		case 'component':
		case 'heading':
		case 'url':
			require ModuleHelper::getLayoutPath('mod_menu', 'dropdown-metismenu_' . $item->type);
			break;

		default:
			require ModuleHelper::getLayoutPath('mod_menu', 'dropdown-metismenu_url');
	endswitch;

	switch (true) :
		// The next item is deeper.
		case $showAll && $item->deeper:
			echo '<div class="multi-level collapse" id="submenu-'.$item->id.'">
            <ul class="flex-column nav">';
			break;

		// The next item is shallower.
		case $item->shallower:
			echo '</li>';
			echo str_repeat('</ul></div></li>', $item->level_diff);
			break;

		// The next item is on the same level.
		default:
			echo '</li>';
			break;
	endswitch;
}
?>
<li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>
<li class="nav-item"><a href="/hrm" target="_blank" class="nav-link d-flex align-items-center"><span class="sidebar-icon"></span><span class="sidebar-text">
    © 2019-2021 Taza Group
    </span></a></li>

    
</ul>
