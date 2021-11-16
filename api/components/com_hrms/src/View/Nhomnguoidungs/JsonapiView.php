<?php
namespace Joomla\Component\Hrms\Api\View\Nhomnguoidungs;
\defined('_JEXEC') or die;
use Joomla\CMS\Language\Multilanguage;
use Joomla\CMS\MVC\View\JsonApiView as BaseApiView;
class JsonapiView extends BaseApiView
{ 
    protected $fieldsToRenderItem = [
        'id',
        'pid',
        'idNguoidung',
        'Tennhom',
        'path',
        'level',
        'Mota',
        'Ghichu',
        'Trangthai',
        'Phanquyen',
        'published',
        'ordering',
        'Ngaytao',
        'idTao',    
	];
protected $fieldsToRenderList = [
        'id',
        'pid',
        'idNguoidung',    
        'Tennhom',
        'path',
        'level',
        'Mota',
        'Ghichu',
        'Trangthai',
        'Phanquyen',
        'published',
        'ordering',
        'Ngaytao',
        'idTao', 
	];

}