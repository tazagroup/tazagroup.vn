<?php
namespace Joomla\Component\Hrms\Api\View\Tinnhans;
\defined('_JEXEC') or die;
use Joomla\CMS\Language\Multilanguage;
use Joomla\CMS\MVC\View\JsonApiView as BaseApiView;
class JsonapiView extends BaseApiView
{
	protected $fieldsToRenderItem = [
        'id',
        'idGui',
        'idNhan',
        'Nguoigui',
        'Nguoinhan',
        'Tieude',
        'Noidung',
        'Ghichu',
        'Trangthai',	
        'published',	
        'ordering',	
        'created',
        'created_by',
        'modified',
        'modified_by'
	];

	protected $fieldsToRenderList = [
        'id',
        'idGui',
        'idNhan',
        'Nguoigui',
        'Nguoinhan',
        'Tieude',
        'Noidung',
        'Ghichu',
        'Trangthai',	
        'published',	
        'ordering',	
        'created',
        'created_by',
        'modified',
        'modified_by'
	];

}
