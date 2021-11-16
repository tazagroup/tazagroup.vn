<?php
namespace Joomla\Component\Hrms\Api\View\Gtodos;
\defined('_JEXEC') or die;
use Joomla\CMS\Language\Multilanguage;
use Joomla\CMS\MVC\View\JsonApiView as BaseApiView;
class JsonapiView extends BaseApiView
{ 
    protected $fieldsToRenderItem = [
        'id',
        'idCty',
        'idLich',
        'idGiao',
        'idThamgia',
        'Nguoigiao',
        'Tieude',
        'MaViec',
        'Trangthai',	
        'Deadline',	
        'Review',	
        'Ghichu',	
        'Uutien',	
        'Ngaytao',	
        'published',	
        'ordering',	
        'created',
        'created_by',
        'modified',
        'modified_by'
	];
protected $fieldsToRenderList = [
        'id',
        'idCty',
        'idLich',
        'idGiao',
        'idThamgia',
        'Nguoigiao',
        'Tieude',
        'MaViec',
        'Trangthai',
        'Deadline',
        'Review',
        'Ghichu',	
         'Uutien',
        'Ngaytao',
        'published',	
        'ordering',	
        'created',
        'created_by',
        'modified',
        'modified_by'
	];

}