<?php
namespace Joomla\Component\Hrms\Api\View\Kythis;
\defined('_JEXEC') or die;
use Joomla\CMS\Language\Multilanguage;
use Joomla\CMS\MVC\View\JsonApiView as BaseApiView;
class JsonapiView extends BaseApiView
{ 
    protected $fieldsToRenderItem = [
           'id' ,
           'idDT' ,
           'Tenkythi' ,
           'Loaithi' ,
           'Hinhthuc' ,
           'Lanthi' ,
           'Batdau' ,
           'Ketthuc' ,
           'idVitri' ,
           'idHV' ,
           'idDuyet' ,
           'Ghichu' ,
           'Trangthai' ,
           'published' ,
           'ordering' ,
           'Ngaytao' ,
           'idTao'
	];
protected $fieldsToRenderList = [
           'id' ,
           'idDT' ,
           'Tenkythi' ,
           'Loaithi' ,
           'Hinhthuc' ,
           'Lanthi' ,
           'Batdau' ,
           'Ketthuc' ,
           'idVitri' ,
           'idHV' ,
           'idDuyet' ,
           'Ghichu' ,
           'Trangthai' ,
           'published' ,
           'ordering' ,
           'Ngaytao' ,
           'idTao'
	];

}