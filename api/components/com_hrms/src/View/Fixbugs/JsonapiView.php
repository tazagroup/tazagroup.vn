<?php
namespace Joomla\Component\Hrms\Api\View\Fixbugs;
\defined('_JEXEC') or die;
use Joomla\CMS\Language\Multilanguage;
use Joomla\CMS\MVC\View\JsonApiView as BaseApiView;
class JsonapiView extends BaseApiView
{ 
    protected $fieldsToRenderItem = [
        'id' ,
           'url' ,
           'Noidung' ,
           'Level' ,
           'Trangthai' ,
           'published' ,
           'ordering' ,
           'Ngaytao' ,
           'idTao'
	];
protected $fieldsToRenderList = [
        'id' ,
           'url' ,
           'Noidung' ,
           'Level' ,
           'Trangthai' ,
           'published' ,
           'ordering' ,
           'Ngaytao' ,
           'idTao'
	];

}