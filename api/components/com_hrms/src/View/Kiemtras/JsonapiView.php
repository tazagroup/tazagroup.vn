<?php
namespace Joomla\Component\Hrms\Api\View\Kiemtras;
\defined('_JEXEC') or die;
use Joomla\CMS\Language\Multilanguage;
use Joomla\CMS\MVC\View\JsonApiView as BaseApiView;
class JsonapiView extends BaseApiView
{ 
    protected $fieldsToRenderItem = [
        'id' ,
           'idLop' ,
           'idHV' ,
           'Diem' ,
           'Loai' ,
           'HVtraloi' ,
           'GVCham' ,
           'Batdau' ,
           'Ketthuc' ,
           'Trangthai' ,
           'published' ,
           'ordering' ,
           'Ngaytao' ,
           'idTao'
	];
protected $fieldsToRenderList = [
           'id' ,
           'idLop' ,
           'idHV' ,
           'Diem' ,
           'Loai' ,
           'HVtraloi' ,
           'GVCham' ,
           'Batdau' ,
           'Ketthuc' ,
           'Trangthai' ,
           'published' ,
           'ordering' ,
           'Ngaytao' ,
           'idTao'
	];

}