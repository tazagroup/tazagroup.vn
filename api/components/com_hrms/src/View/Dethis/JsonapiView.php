<?php
namespace Joomla\Component\Hrms\Api\View\Dethis;
\defined('_JEXEC') or die;
use Joomla\CMS\Language\Multilanguage;
use Joomla\CMS\MVC\View\JsonApiView as BaseApiView;
class JsonapiView extends BaseApiView
{ 
    protected $fieldsToRenderItem = [
        'id',
        'idChude',
        'idTLN',
        'idCH',
        'Tendethi',
        'Tenchude',
        'MaDT',
        'idDuyet',
        'Trangthai',
        'published',
        'ordering',	
        'Ngaytao',	
        'idTao',	
        'Tags',
        'Ghichu',        
	];
protected $fieldsToRenderList = [
        'id',
        'idChude',
        'idTLN',
        'idCH',
        'Tendethi',
        'Tenchude',
        'MaDT',
        'idDuyet',
        'Trangthai',
        'published',
        'ordering',	
        'Ngaytao',	
        'idTao',	
        'Tags',
        'Ghichu', 
	];

}