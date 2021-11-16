<?php
namespace Joomla\Component\Hrms\Api\Controller;
\defined('_JEXEC') or die;
use Joomla\CMS\MVC\Controller\ApiController;
use Joomla\CMS\Filter\InputFilter;
class NhomnguoidungsController extends ApiController
{
	protected $contentType = 'nhomnguoidungs';
	protected $default_view = 'nhomnguoidungs';
    public function displayList()
	{
		$apiFilterInfo = $this->input->get('filter', [], 'array');
		$filter        = InputFilter::getInstance();		
        if (array_key_exists('published', $apiFilterInfo))
		{
			$this->modelState->set('filter.published', $filter->clean($apiFilterInfo['published'], 'STR'));
		} 
        if (array_key_exists('idUser', $apiFilterInfo))
		{
			$this->modelState->set('filter.idUser', $filter->clean($apiFilterInfo['idUser'], 'STR'));
		}           
		return parent::displayList();
	} 
    
}
