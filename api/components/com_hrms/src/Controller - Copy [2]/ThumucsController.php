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
class ThumucsController extends ApiController
{
	/**
	 * The content type of the item.
	 *
	 * @var    string
	 * @since  4.0.0
	 */
	protected $contentType = 'thumucs';

	/**
	 * The default view for the display method.
	 *
	 * @var    string
	 * @since  3.0
	 */
	protected $default_view = 'thumucs';
    
    public function displayList()
	{
		$apiFilterInfo = $this->input->get('filter', [], 'array');
		$filter        = InputFilter::getInstance();		
        if (array_key_exists('path', $apiFilterInfo))
		{
			$this->modelState->set('filter.path', $filter->clean($apiFilterInfo['path'], 'STR'));
		}       
        if (array_key_exists('LoaiTM', $apiFilterInfo))
		{
			$this->modelState->set('filter.LoaiTM', $filter->clean($apiFilterInfo['LoaiTM'], 'INT'));
		}       
		return parent::displayList();
	}
    
}
