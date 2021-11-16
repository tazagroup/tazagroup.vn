<?php
/**
 * @package     Joomla.API
 * @subpackage  com_hrms
 *
 * @copyright   (C) 2019 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Component\Hrms\Api\View\Tailieus;

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
        'idTM',
        'idCty',
        'idKhoi',
        'idPB',
        'idBP',
        'idVitri',
        'Tieude',	
        'File',	
        'Bieumau',	
        'Ghichu',	
        'published',		
        'ordering',	
        'Ngaytao',
        'idTao' 
	];

	/**
	 * The fields to render items in the documents
	 *
	 * @var  array
	 * @since  4.0.0
	 */
	protected $fieldsToRenderList = [
        'id',
        'idTM',
        'idCty',
        'idKhoi',
        'idPB',
        'idBP',
        'idVitri',
        'Tieude',	
        'File',	
        'Bieumau',	
        'Ghichu',	
        'published',		
        'ordering',	
        'Ngaytao',
        'idTao' 
	];

}
