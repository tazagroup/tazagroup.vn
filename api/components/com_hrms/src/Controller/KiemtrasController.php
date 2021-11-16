<?php
namespace Joomla\Component\Hrms\Api\Controller;
\defined('_JEXEC') or die;
use Joomla\CMS\MVC\Controller\ApiController;
use Joomla\CMS\Filter\InputFilter;
class KiemtrasController extends ApiController
{
	protected $contentType = 'kiemtras';
	protected $default_view = 'kiemtras';
    public function displayList()
	{
		$apiFilterInfo = $this->input->get('filter', [], 'array');
		$filter        = InputFilter::getInstance();		
        if (array_key_exists('published', $apiFilterInfo))
		{
			$this->modelState->set('filter.published', $filter->clean($apiFilterInfo['published'], 'STR'));
		}  
        if (array_key_exists('idLop', $apiFilterInfo))
		{
			$this->modelState->set('filter.idLop', $filter->clean($apiFilterInfo['idLop'], 'STR'));
		} 
        if (array_key_exists('idHV', $apiFilterInfo))
		{
			$this->modelState->set('filter.idHV', $filter->clean($apiFilterInfo['idHV'], 'STR'));
		}           
		return parent::displayList();
	} 
    
}
