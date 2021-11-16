<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_hrms
 *
 * @copyright   (C) 2017 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Component\Hrms\Site\Helper;

\defined('_JEXEC') or die;

use Joomla\CMS\Categories\CategoryNode;
use Joomla\CMS\Language\Multilanguage;

/**
 * Hrms Component Route Helper
 *
 * @since  1.5
 */
abstract class RouteHelper
{
	/**
	 * getHrmRoute
	 *
	 * @param   int  $id        menu itemid
	 * @param   int  $catid     category id
	 * @param   int  $language  language
	 *
	 * @return string
	 */
	public static function getHrmRoute($id, $catid, $language = 0)
	{
		// Create the link
		$link = 'index.php?option=com_hrms&view=hrm&id=' . $id;

		if ((int) $catid > 1)
		{
			$link .= '&catid=' . $catid;
		}

		if ($language && $language !== '*' && Multilanguage::isEnabled())
		{
			$link .= '&lang=' . $language;
		}

		return $link;
	}

	/**
	 * getCategoryRoute
	 *
	 * @param   int  $catid     category id
	 * @param   int  $language  language
	 *
	 * @return string
	 */
	public static function getCategoryRoute($catid, $language = 0)
	{
		if ($catid instanceof CategoryNode)
		{
			$id = $catid->id;
		}
		else
		{
			$id = (int) $catid;
		}

		if ($id < 1)
		{
			$link = '';
		}
		else
		{
			// Create the link
			$link = 'index.php?option=com_hrms&view=category&id=' . $id;

			if ($language && $language !== '*' && Multilanguage::isEnabled())
			{
				$link .= '&lang=' . $language;
			}
		}

		return $link;
	}
}
