<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_hrms
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Component\Hrms\Site\View\Tailieus;

\defined('_JEXEC') or die;

use Joomla\CMS\Categories\Categories;
use Joomla\CMS\Factory;
use Joomla\CMS\Feed\FeedFactory;
use Joomla\CMS\Helper\TagsHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\View\GenericDataException;
use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
use Joomla\Component\Hrms\Site\Helper\RouteHelper;

class HtmlView extends BaseHtmlView
{
	protected $state;
	protected $items;
	protected $print;
	protected $user = null;
	protected $pageclass_sfx = '';
	protected $params;
	public function display($tpl = null)
	{
		$app  = Factory::getApplication();
		$user = Factory::getUser();
        $this->items  = $this->get('Items');
        $this->form = $this->get('Form');
        $this->LoaiTM = $app->input->get('LoaiTM', 0, 'int');
		return parent::display($tpl);
	}
}
