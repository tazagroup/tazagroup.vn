<?php
/**
 * @package     Joomla.API
 * @subpackage  com_crms
 *
 * @copyright   (C) 2019 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
namespace Joomla\Component\Crms\Api\Controller;
\defined('_JEXEC') or die;
use Joomla\CMS\MVC\Controller\ApiController;
use Joomla\CMS\Filter\InputFilter;
/**
 * The crms controller
 *
 * @since  4.0.0
 */
class TonkhosController extends ApiController
{
	/**
	 * The content type of the item.
	 *
	 * @var    string
	 * @since  4.0.0
	 */
	protected $contentType = 'tonkhos';
	/**
	 * The default view for the display method.
	 *
	 * @var    string
	 * @since  3.0
	 */
	protected $default_view = 'tonkhos';
    
    public function displayList()
	{
		$apiFilterInfo = $this->input->get('filter', [], 'array');
		$filter        = InputFilter::getInstance();		
        if (array_key_exists('idCN', $apiFilterInfo))
		{
			$this->modelState->set('filter.idCN', $filter->clean($apiFilterInfo['idCN'], 'INT'));
		}       
        if (array_key_exists('idNhap', $apiFilterInfo))
		{
			$this->modelState->set('filter.idNhap', $filter->clean($apiFilterInfo['idNhap'], 'INT'));
		}  
        if (array_key_exists('qrcode', $apiFilterInfo))
		{
			$this->modelState->set('filter.qrcode', $filter->clean($apiFilterInfo['qrcode'], 'STR'));
		} 
        if (array_key_exists('Last', $apiFilterInfo))
		{
			$this->modelState->set('filter.Last', $filter->clean($apiFilterInfo['Last'], 'INT'));
		}
		return parent::displayList();
	}
}
