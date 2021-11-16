<?php
namespace Joomla\Component\Hrms\Api\View\Thongbaos;
\defined('_JEXEC') or die;
use Joomla\CMS\Language\Multilanguage;
use Joomla\CMS\MVC\View\JsonApiView as BaseApiView;
class JsonapiView extends BaseApiView
{ 
    protected $fieldsToRenderItem = [
        'id' ,
           'idGui' ,
           'idNhan' ,
           'Danhmuc' ,
           'Noidung' ,
           'Link' ,
           'Mota' ,
           'Trangthai' ,
           'published' ,
           'ordering' ,
           'Ngaytao' ,
           'idTao'
	];
protected $fieldsToRenderList = [
        'id' ,
           'idGui' ,
           'idNhan' ,
           'Danhmuc' ,
           'Noidung' ,
           'Link' ,
           'Mota' ,
           'Trangthai' ,
           'published' ,
           'ordering' ,
           'Ngaytao' ,
           'idTao'
	];

}