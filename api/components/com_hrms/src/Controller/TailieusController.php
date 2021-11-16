<?php
namespace Joomla\Component\Hrms\Api\Controller;
\defined('_JEXEC') or die;
use Joomla\CMS\MVC\Controller\ApiController;
use Joomla\CMS\Filter\InputFilter;
class TailieusController extends ApiController
{
	protected $contentType = 'tailieus';
	protected $default_view = 'tailieus';
    public function displayList()
	{
		$apiFilterInfo = $this->input->get('filter', [], 'array');
		$filter        = InputFilter::getInstance();		
        if (array_key_exists('published', $apiFilterInfo))
		{
			$this->modelState->set('filter.published', $filter->clean($apiFilterInfo['published'], 'STR'));
		} 
       if (array_key_exists('idTM', $apiFilterInfo))
		{
			$this->modelState->set('filter.idTM', $filter->clean($apiFilterInfo['idTM'], 'STR'));
		}        
		return parent::displayList();
	} 
    
}




