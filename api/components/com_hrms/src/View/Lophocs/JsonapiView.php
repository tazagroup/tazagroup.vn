<?php
namespace Joomla\Component\Hrms\Api\View\Lophocs;
\defined('_JEXEC') or die;
use Joomla\CMS\Language\Multilanguage;
use Joomla\CMS\MVC\View\JsonApiView as BaseApiView;
class JsonapiView extends BaseApiView
{ 
    protected $fieldsToRenderItem = [
        'id',
        'Tenlop',
        'MaLop',
        'LinkMeet',
        'idGV',
        'idTL',
        'idHV',
        'idBH',
        'idRoot',
        'Batdau',
        'Ketthuc',
        'idDuyet',
        'Mota',
        'Danhgia',
        'Nhanxet',
        'Ghichu',
        'Trangthai',
        'published',
        'ordering',	
        'idTao',    
	];
protected $fieldsToRenderList = [
        'id',
        'Tenlop',
        'MaLop',
        'LinkMeet',
        'idGV',  
        'idTL',
        'idHV',
        'idBH',
        'idRoot',
        'Batdau',
        'Ketthuc',
        'idDuyet',
        'Mota',
        'Danhgia',
        'Nhanxet',
        'Ghichu',
        'Trangthai',
        'published',
        'ordering',	
        'idTao',
	];

}