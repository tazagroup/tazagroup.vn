<?php
/**
 * @package     Joomla.API
 * @subpackage  com_hrms
 *
 * @copyright   (C) 2019 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Component\Hrms\Api\Controller;

\defined('_JEXEC') or die;

use Joomla\CMS\MVC\Controller\ApiController;
use Joomla\CMS\Filter\InputFilter;

/**
 * The hrms controller
 *
 * @since  4.0.0
 */
class LotrinhsController extends ApiController
{
	/**
	 * The content type of the item.
	 *
	 * @var    string
	 * @since  4.0.0
	 */
	protected $contentType = 'lotrinhs';

	/**
	 * The default view for the display method.
	 *
	 * @var    string
	 * @since  3.0
	 */
	protected $default_view = 'lotrinhs';
        
    public function displayList()
	{
		$apiFilterInfo = $this->input->get('filter', [], 'array');
		$filter        = InputFilter::getInstance();		
        if (array_key_exists('Type', $apiFilterInfo))
		{
			$this->modelState->set('filter.Type', $filter->clean($apiFilterInfo['Type'], 'STR'));
		}             
		return parent::displayList();
	}
}
