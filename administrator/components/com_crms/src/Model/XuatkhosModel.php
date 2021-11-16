<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_crms
 *
 * @copyright   (C) 2008 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Component\Crms\Administrator\Model;

\defined('_JEXEC') or die;

use Joomla\CMS\Component\ComponentHelper;
use Joomla\CMS\Factory;
use Joomla\CMS\Language\Associations;
use Joomla\CMS\MVC\Factory\MVCFactoryInterface;
use Joomla\CMS\MVC\Model\ListModel;
use Joomla\Database\ParameterType;
use Joomla\Utilities\ArrayHelper;

/**
 * Methods supporting a list of crm records.
 *
 * @since  1.6
 */
class XuatkhosModel extends ListModel
{
	/**
	 * Constructor.
	 *
	 * @param   array                $config   An optional associative array of configuration settings.
	 * @param   MVCFactoryInterface  $factory  The factory.
	 *
	 * @see    \Joomla\CMS\MVC\Model\BaseDatabaseModel
	 * @since   3.2
	 */
	public function __construct($config = array(), MVCFactoryInterface $factory = null)
	{
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id', 'a.id',
				'idCN', 'a.idCN',
				'idNhap', 'a.idNhap',
				'SoluongXuat', 'a.SoluongXuat',
				'GiaXuat', 'a.GiaXuat',
				'PhieuXuat', 'a.PhieuXuat',
				'published', 'a.published',
				'created', 'a.created',
				'created_by', 'a.created_by',
				'modified', 'a.modified',
				'modified_by', 'a.modified_by',
				'ordering', 'a.ordering',
			);
		}

		parent::__construct($config, $factory);
	}

	/**
	 * Method to auto-populate the model state.
	 *
	 * Note. Calling getState in this method will result in recursion.
	 *
	 * @param   string  $ordering   An optional ordering field.
	 * @param   string  $direction  An optional direction (asc|desc).
	 *
	 * @return  void
	 *
	 * @since   1.6
	 */
	protected function populateState($ordering = 'a.id', $direction = 'DESC')
	{
		$app = Factory::getApplication();

		// Load the parameters.
		$params = ComponentHelper::getParams('com_crms');
		$this->setState('params', $params);
		$PhieuXuat = $this->getUserStateFromRequest($this->context . '.filter.PhieuXuat', 'filter_xuatkhos');
		$this->setState('filter.PhieuXuat', $PhieuXuat);
		// List state information.
		parent::populateState($ordering, $direction);
	}

	/**
	 * Method to get a store id based on model configuration state.
	 *
	 * This is necessary because the model is used by the component and
	 * different modules that might need different sets of data or different
	 * ordering requirements.
	 *
	 * @param   string  $id  A prefix for the store id.
	 *
	 * @return  string  A store id.
	 */
	protected function getStoreId($id = '')
	{
		// Compile the store id.
		$id .= ':' . $this->getState('filter.PhieuXuat');
		$id .= ':' . $this->getState('filter.idNhap');
		$id .= ':' . $this->getState('filter.idCN');

		return parent::getStoreId($id);
	}

	/**
	 * Build an SQL query to load the list data.
	 *
	 * @return  \JDatabaseQuery
	 */
	protected function getListQuery()
	{
		// Create a new query object.
		$db    = $this->getDbo();
		$query = $db->getQuery(true);
		$user  = Factory::getUser();

		$query->select(
			$this->getState(
				'list.select',
				[
					$db->quoteName('a.id'),
					$db->quoteName('a.idCN'),
					$db->quoteName('a.idNhap'),
					$db->quoteName('a.SoluongXuat'),
					$db->quoteName('a.GiaXuat'),
					$db->quoteName('a.PhieuXuat'),
					$db->quoteName('a.created'),
					$db->quoteName('a.created_by'),					
					$db->quoteName('a.modified'),
					$db->quoteName('a.modified_by'),
					$db->quoteName('a.published'),
					$db->quoteName('a.ordering'),
				]
			)
		)->select([$db->quoteName('d.TenSP', 'TenSP'),$db->quoteName('c.name', 'Nguoitao'),$db->quoteName('e.DVT', 'DVT')])
        ->from($db->quoteName('#__crms_xuatkho', 'a'))
        ->join('LEFT', $db->quoteName('#__crms_nhapkho', 'b'), $db->quoteName('b.id') . ' = ' . $db->quoteName('a.idNhap'))
        ->join('LEFT', $db->quoteName('#__users', 'c'), $db->quoteName('c.id') . ' = ' . $db->quoteName('a.created_by'))
        ->join('LEFT', $db->quoteName('#__crms_nguyenvatlieu', 'd'), $db->quoteName('d.id') . ' = ' . $db->quoteName('b.idNVL'))
        ->join('LEFT', $db->quoteName('#__crms_donvitinh', 'e'), $db->quoteName('e.id') . ' = ' . $db->quoteName('d.idDVT'));     
        if ($PhieuXuat = (int) $this->getState('filter.PhieuXuat'))
		{    
			$query->where($db->quoteName('a.PhieuXuat') . ' = :PhieuXuat')
				->bind(':PhieuXuat', $PhieuXuat, ParameterType::INTEGER);  
		}       
        if ($idCN = (int) $this->getState('filter.idCN'))
		{    
			$query->where($db->quoteName('a.idCN') . ' = :idCN')
				->bind(':idCN', $idCN, ParameterType::INTEGER);  
		}
		$published = (string) $this->getState('filter.published');

		if (is_numeric($published))
		{

			$published = (int) $published;
			$query->where($db->quoteName('a.published') . ' = :published')
				->bind(':published', $published, ParameterType::INTEGER);
		}
		elseif ($published === '')
		{
			$query->where($db->quoteName('a.published') . ' IN (0, 1)');
		}
        
		// Add the list ordering clause.
		$orderCol  = $this->state->get('list.ordering', 'a.id');
		$orderDirn = $this->state->get('list.direction', 'DESC');

		if ($orderCol == 'a.ordering' || $orderCol == 'category_title')
		{
			$ordering = [
				$db->quoteName('c.title') . ' ' . $db->escape($orderDirn),
				$db->quoteName('a.ordering') . ' ' . $db->escape($orderDirn),
			];
		}
		else
		{
			$ordering = $db->escape($orderCol) . ' ' . $db->escape($orderDirn);
		}

		$query->order($ordering);

		return $query;
	}
}
