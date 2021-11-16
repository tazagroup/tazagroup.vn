<?php
/**
 * @package     Joomla.API
 * @subpackage  com_hrms
 *
 * @copyright   (C) 2019 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Component\Hrms\Api\View\Todos;

\defined('_JEXEC') or die;

use Joomla\CMS\Language\Multilanguage;
use Joomla\CMS\MVC\View\JsonApiView as BaseApiView;
/**
 * The Hrms view
 *
 * @since  4.0.0
 */
class JsonapiView extends BaseApiView
{
	/**
	 * The fields to render item in the documents
	 *
	 * @var  array
	 * @since  4.0.0
	 */
	protected $fieldsToRenderItem = [
        'id',
        'MaViec',
        'idCty',
        'idNhomviec',
        'idLich',
        'idGiao',
        'Khoi',
        'Phongban',
        'Bophan',
        'Vitri',
        'Nguoigiao',
        'idNhan',
        'Nguoinhan',
        'Tieude',
        'Noidung',
        'Uutien',
        'Deadline',
        'Danhgia',	
        'Lydo',
        'Baihoc',
        'Ghichu',
        'Trangthai',	
        'published',	
        'ordering',	
        'created',
        'created_by',
        'modified',
        'modified_by'
        
	];

	/**
	 * The fields to render items in the documents
	 *
	 * @var  array
	 * @since  4.0.0
	 */
	protected $fieldsToRenderList = [
        'id',
        'MaViec',
        'idCty',
        'idNhomviec',
        'idLich',
        'idGiao',
        'Khoi',
        'Phongban',
        'Bophan',
        'Vitri',
        'Nguoigiao',
        'idNhan',
        'Nguoinhan',
        'Tieude',
        'Noidung',
        'Uutien',
        'Deadline',
        'Danhgia',	
        'Lydo',
        'Baihoc',
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
