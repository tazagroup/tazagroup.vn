<?php
/**
 * @package     Joomla.API
 * @subpackage  com_crms
 *
 * @copyright   (C) 2019 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Component\Crms\Api\View\Chuyenkhos;

\defined('_JEXEC') or die;

use Joomla\CMS\Language\Multilanguage;
use Joomla\CMS\MVC\View\JsonApiView as BaseApiView;
use Joomla\Component\Crms\Api\Serializer\CrmsSerializer;

/**
 * The Crms view
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
				'idCNChuyen',
				'idCNNhan', 
				'idNVL',
                'TenSP',
				'SoluongChuyen', 
				'PhieuChuyen', 
				'KiemDuyet', 
				'NguoiDuyet', 
				'Ghichu', 
				'Soluong', 
				'Trangthai', 
				'published',
				'created',
				'created_by', 
				'modified', 
				'modified_by',
				'ordering',
	];

	/**
	 * The fields to render items in the documents
	 *
	 * @var  array
	 * @since  4.0.0
	 */
	protected $fieldsToRenderList = [
				'id',
				'idCNChuyen',
				'idCNNhan', 
				'idNVL',
                'TenSP',
				'SoluongChuyen', 
				'PhieuChuyen', 
				'KiemDuyet', 
				'NguoiDuyet', 
				'Ghichu', 
				'Soluong', 
				'Trangthai', 
				'published',
				'created',
				'created_by', 
				'modified', 
				'modified_by',
				'ordering',
	];
    
}
