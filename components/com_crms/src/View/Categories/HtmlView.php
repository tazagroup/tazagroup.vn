<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_crms
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Component\Crms\Site\View\Categories;

\defined('_JEXEC') or die;

use Joomla\CMS\MVC\View\CategoriesView;

/**
 * Crm categories view.
 *
 * @since  1.5
 */
class HtmlView extends CategoriesView
{
	/**
	 * Language key for default page heading
	 *
	 * @var    string
	 * @since  3.2
	 */
	protected $pageHeading = 'COM_CRMS_DEFAULT_PAGE_TITLE';

	/**
	 * @var    string  The name of the extension for the category
	 * @since  3.2
	 */
	protected $extension = 'com_crms';
}
