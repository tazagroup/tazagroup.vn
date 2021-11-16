<?php
namespace Joomla\Component\Hrms\Api\Controller;
\defined('_JEXEC') or die;
use Joomla\CMS\MVC\Controller\ApiController;
use Joomla\CMS\Filter\InputFilter;
class YeucaudaotaosController extends ApiController
{
	protected $contentType = 'yeucaudaotaos';
	protected $default_view = 'yeucaudaotaos';
    public function displayList()
	{
		$apiFilterInfo = $this->input->get('filter', [], 'array');
		$filter        = InputFilter::getInstance();		
        if (array_key_exists('published', $apiFilterInfo))
		{
			$this->modelState->set('filter.published', $filter->clean($apiFilterInfo['published'], 'STR'));
		}           
		return parent::displayList();
	} 
    
}
