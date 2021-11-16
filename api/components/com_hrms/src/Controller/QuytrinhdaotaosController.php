<?php
namespace Joomla\Component\Hrms\Api\Controller;
\defined('_JEXEC') or die;
use Joomla\CMS\MVC\Controller\ApiController;
use Joomla\CMS\Filter\InputFilter;
class QuytrinhdaotaosController extends ApiController
{
	protected $contentType = 'quytrinhdaotaos';
	protected $default_view = 'quytrinhdaotaos';
    public function displayList()
	{
		$apiFilterInfo = $this->input->get('filter', [], 'array');
		$filter        = InputFilter::getInstance();		
        if (array_key_exists('published', $apiFilterInfo))
		{
			$this->modelState->set('filter.published', $filter->clean($apiFilterInfo['published'], 'STR'));
		}      
        if (array_key_exists('idVitri', $apiFilterInfo))
		{
			$this->modelState->set('filter.idVitri', $filter->clean($apiFilterInfo['idVitri'], 'INT'));
		}           
		return parent::displayList();
	} 
    
}
