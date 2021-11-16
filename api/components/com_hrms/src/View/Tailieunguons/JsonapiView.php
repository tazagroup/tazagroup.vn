<?php
namespace Joomla\Component\Hrms\Api\View\Tailieunguons;
\defined('_JEXEC') or die;
use Joomla\CMS\Language\Multilanguage;
use Joomla\CMS\MVC\View\JsonApiView as BaseApiView;
class JsonapiView extends BaseApiView
{ 
    protected $fieldsToRenderItem = [
        'id',
        'idChude',
        'idTG',
        'idGTG',
        'idRoot',
        'MaCH',
        'Tentailieu',
        'MaTL',  
        'Mota',
        'Lienket',  
        'Ghichu',
        'Trangthai',
        'TTTailieu',
        'TTHieuluc',
        'Tags',
        'DKTK',
        'Deadline',
        'Ngayhieuluc',
        'idDuyet',
        'Kiemduyet',
        'published',
        'ordering',	
        'Ngaytao',
        'idTao',									
        
	];
protected $fieldsToRenderList = [
        'id',
        'idChude',
        'idTG',
        'idGTG',
        'idRoot',
        'MaCH',
        'Tentailieu',
        'MaTL',  
        'Mota',
        'Lienket',  
        'Ghichu',
        'Trangthai',
        'TTTailieu',
        'TTHieuluc',
        'Tags',
        'DKTK',
        'Deadline',
        'Ngayhieuluc',
        'idDuyet',
        'Kiemduyet',
        'published',
        'ordering',	
        'Ngaytao',
        'idTao',
	];

}