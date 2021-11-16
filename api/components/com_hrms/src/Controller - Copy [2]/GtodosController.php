<?php
namespace Joomla\Component\Hrms\Api\Controller;
\defined('_JEXEC') or die;
use Joomla\CMS\MVC\Controller\ApiController;
use Joomla\CMS\Filter\InputFilter;
class GtodosController extends ApiController
{
	protected $contentType = 'gtodos';
	protected $default_view = 'gtodos';
    public function displayList()
	{
		$apiFilterInfo = $this->input->get('filter', [], 'array');
		$filter        = InputFilter::getInstance();		
        if (array_key_exists('published', $apiFilterInfo))
		{
			$this->modelState->set('filter.published', $filter->clean($apiFilterInfo['published'], 'STR'));
		}     
        if (array_key_exists('idLich', $apiFilterInfo))
		{
			$this->modelState->set('filter.idLich', $filter->clean($apiFilterInfo['idLich'], 'INT'));
		} 
        if (array_key_exists('idChutri', $apiFilterInfo))
		{
			$this->modelState->set('filter.idChutri', $filter->clean($apiFilterInfo['idChutri'], 'INT'));
		}          
		return parent::displayList();
	} 
    
}
