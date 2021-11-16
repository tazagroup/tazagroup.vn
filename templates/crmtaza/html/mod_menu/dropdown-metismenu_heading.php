<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   (C) 2020 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\Utilities\ArrayHelper;

$attributes = [];

//if ($item->anchor_title)
//{
//	$attributes['title'] = $item->anchor_title;
//}

$attributes['class'] = 'nav-link d-flex justify-content-between align-items-center';
$attributes['data-bs-toggle']='collapse';
$attributes['data-bs-target']='#submenu-'.$item->id;
$attributes['class'] .= $item->anchor_css ? ' ' . $item->anchor_css : null;

$linktype = '<span><span class="sidebar-icon"><i class="'.$item->anchor_title.'"></i></span><span class="sidebar-text">'.$item->title.'</span></span>
';
if ($showAll && $item->deeper)
{
	$linktype .='<span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></span>';
};

if ($item->menu_image)
{
	$linktype = HTMLHelper::image($item->menu_image, $item->title);

	if ($item->menu_image_css)
	{
		$image_attributes['class'] = $item->menu_image_css;
		$linktype                  = HTMLHelper::image($item->menu_image, $item->title, $image_attributes);
	}

	if ($itemParams->get('menu_text', 1))
	{
		$linktype .= '<span class="image-title">' . $item->title . '</span>';
	}
}

if ($showAll && $item->deeper)
{
	$attributes['class'] .= '';
	$attributes['aria-haspopup'] = 'true';
	$attributes['aria-expanded'] = 'false';
	echo '<span ' . ArrayHelper::toString($attributes) . '>' . $linktype . '</span>';
}
else
{
	echo '<span ' . ArrayHelper::toString($attributes) . '>' . $linktype . '</span>';
}
