<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_crms
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Component\Crms\Site\View\Dichvu;

\defined('_JEXEC') or die;

use Joomla\CMS\Categories\Categories;
use Joomla\CMS\Factory;
use Joomla\CMS\Feed\FeedFactory;
use Joomla\CMS\Helper\TagsHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\View\GenericDataException;
use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
use Joomla\Component\Crms\Site\Helper\RouteHelper;
class HtmlView extends BaseHtmlView
{
	public function display($tpl = null)
	{
		$app  = Factory::getApplication();
		$user = Factory::getUser();
		return parent::display($tpl);
	}

}
