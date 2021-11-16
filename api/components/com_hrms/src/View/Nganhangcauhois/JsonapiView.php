<?php
namespace Joomla\Component\Hrms\Api\View\Nganhangcauhois;
\defined('_JEXEC') or die;
use Joomla\CMS\Language\Multilanguage;
use Joomla\CMS\MVC\View\JsonApiView as BaseApiView;
class JsonapiView extends BaseApiView
{ 
    protected $fieldsToRenderItem = [
		        'id',
				'idTL',
				'idRoot',
				'idChude',
				'MaCH',
				'Cauhoi',
				'Traloi',
				'Dapan', 
				'Trangthai',
				'Capdo', 
				'idDuyet', 
				'published', 
				'ordering', 
				'Ngaytao',
				'idTao',
				'Tags',
				'Ghichu',
	];
protected $fieldsToRenderList = [
		        'id',
				'idTL',
				'idRoot',
  				'idChude',  
    	        'MaCH',
				'Cauhoi',
				'Traloi',
				'Dapan', 
				'Trangthai',
				'Capdo', 
				'idDuyet', 
				'published', 
				'ordering', 
				'Ngaytao',
				'idTao',
				'Tags',
    			'Ghichu',
	];

}