<?php
namespace Joomla\Component\Hrms\Api\View\Quytrinhdaotaos;
\defined('_JEXEC') or die;
use Joomla\CMS\Language\Multilanguage;
use Joomla\CMS\MVC\View\JsonApiView as BaseApiView;
class JsonapiView extends BaseApiView
{ 
    protected $fieldsToRenderItem = [
        'id' ,
           'idVitri' ,
           'Noidung' ,
           'Mota' ,
           'TGDT' ,
           'LichDT' ,
           'idHV' ,
           'idDoituong' ,
           'Ghichu' ,
           'idDuyet' ,
           'Trangthai' ,
           'published' ,
           'ordering' ,
           'Ngaytao' ,
           'idTao'
	];
protected $fieldsToRenderList = [
        'id' ,
           'idVitri' ,
           'Noidung' ,
           'Mota' ,
           'TGDT' ,
           'LichDT' ,
           'idHV' ,
           'idDoituong' ,
           'Ghichu' ,
           'idDuyet' ,
           'Trangthai' ,
           'published' ,
           'ordering' ,
           'Ngaytao' ,
           'idTao'
	];

}