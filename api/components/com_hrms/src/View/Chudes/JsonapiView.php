<?php
namespace Joomla\Component\Hrms\Api\View\Chudes;
\defined('_JEXEC') or die;
use Joomla\CMS\Language\Multilanguage;
use Joomla\CMS\MVC\View\JsonApiView as BaseApiView;
class JsonapiView extends BaseApiView
{ 
    protected $fieldsToRenderItem = [
        'id',
        'pid',
        'path',
        'level',
        'Toc',
        'Tenchude',
        'Mota',
        'published',
        'ordering',
        'Ngaytao',
        'idTao',       
	];
protected $fieldsToRenderList = [
        'id',
        'pid',
        'path',
        'level',    
        'Toc',    
        'Tenchude',
        'Mota',
        'published',
        'ordering',
        'Ngaytao',
        'idTao', 
	];

}