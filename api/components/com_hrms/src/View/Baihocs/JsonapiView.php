<?php
namespace Joomla\Component\Hrms\Api\View\Baihocs;
\defined('_JEXEC') or die;
use Joomla\CMS\Language\Multilanguage;
use Joomla\CMS\MVC\View\JsonApiView as BaseApiView;
class JsonapiView extends BaseApiView
{ 
    protected $fieldsToRenderItem = [
        'id' ,
           'Tenbaihoc' ,
           'idTL' ,
           'idDT' ,
           'idRoot' ,
           'idDuyet' ,
           'Noidung' ,
           'Ghichu' ,
           'Trangthai' ,
           'published' ,
           'ordering' ,
           'Ngaytao' ,
           'idTao'
	];
protected $fieldsToRenderList = [
        'id' ,
           'Tenbaihoc' ,
           'idTL' ,
           'idDT' ,
           'idRoot' ,
           'idDuyet' ,
           'Noidung' ,
           'Ghichu' ,
           'Trangthai' ,
           'published' ,
           'ordering' ,
           'Ngaytao' ,
           'idTao'
	];

}