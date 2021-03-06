<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_crms
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Component\Crms\Site\View\Category;

\defined('_JEXEC') or die;

use Joomla\CMS\MVC\View\CategoryView;
use Joomla\Component\Crms\Site\Helper\RouteHelper;

/**
 * HTML View class for the Crms component
 *
 * @since  1.0
 */
class HtmlView extends CategoryView
{
	/**
	 * @var    string  Default title to use for page title
	 * @since  3.2
	 */
	protected $defaultPageTitle = 'COM_CRMS_DEFAULT_PAGE_TITLE';

	/**
	 * @var    string  The name of the extension for the category
	 * @since  3.2
	 */
	protected $extension = 'com_crms';

	/**
	 * @var    string  The name of the view to link individual items to
	 * @since  3.2
	 */
	protected $viewName = 'crm';

	/**
	 * Execute and display a template script.
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  mixed  A string if successful, otherwise an Error object.
	 */
	public function display($tpl = null)
	{
		$this->commonCategoryDisplay();

		// Flag indicates to not add limitstart=0 to URL
		$this->pagination->hideEmptyLimitstart = true;

		// Prepare the data.
		// Compute the crm slug.
		foreach ($this->items as $item)
		{
			$item->slug = $item->alias ? ($item->id . ':' . $item->alias) : $item->id;
			$temp       = $item->params;
			$item->params = clone $this->params;
			$item->params->merge($temp);
		}

		return parent::display($tpl);
	}

	/**
	 * Prepares the document
	 *
	 * @return  void
	 */
	protected function prepareDocument()
	{
		parent::prepareDocument();

		$menu = $this->menu;
		$id = (int) @$menu->query['id'];

		if ($menu && (!isset($menu->query['option']) || $menu->query['option'] !== 'com_crms' || $menu->query['view'] === 'crm'
			|| $id != $this->category->id))
		{
			$path = array(array('title' => $this->category->title, 'link' => ''));
			$category = $this->category->getParent();

			while ((!isset($menu->query['option']) || $menu->query['option'] !== 'com_crms' || $menu->query['view'] === 'crm'
				|| $id != $category->id) && $category->id > 1)
			{
				$path[] = array('title' => $category->title, 'link' => RouteHelper::getCategoryRoute($category->id, $category->language));
				$category = $category->getParent();
			}

			$path = array_reverse($path);

			foreach ($path as $item)
			{
				$this->pathway->addItem($item['title'], $item['link']);
			}
		}
	}
}
