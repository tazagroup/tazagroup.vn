<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_hrms
 *
 * @copyright   (C) 2008 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Component\Hrms\Site\Model;

\defined('_JEXEC') or die;

use Joomla\CMS\Component\ComponentHelper;
use Joomla\CMS\Factory;
use Joomla\CMS\Language\Associations;
use Joomla\CMS\MVC\Factory\MVCFactoryInterface;
use Joomla\CMS\MVC\Model\ListModel;
use Joomla\Database\ParameterType;
use Joomla\Utilities\ArrayHelper;

/**
 * Methods supporting a list of hrm records.
 *
 * @since  1.6
 */
class TailieusModel extends ListModel
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
				'published', 'a.published',
				'created', 'a.created',
				'created_by', 'a.created_by',
				'modified', 'a.modified',
				'modified_by', 'a.modified_by',
				'ordering', 'a.ordering',
				'LoaiTM', 'a.LoaiTM',
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
	protected function populateState($ordering = 'a.id', $direction = 'asc')
	{
		$app = Factory::getApplication();

        $pk  = $app->input->getInt('LoaiTM');

		$this->setState('filter.LoaiTM', $pk);
		// Load the parameters.
		$params = ComponentHelper::getParams('com_hrms');
		$this->setState('params', $params);

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
		$id .= ':' . $this->getState('filter.LoaiTM');
		$id .= ':' . $this->getState('filter.published');
		$id .= ':' . $this->getState('filter.category_id');
		$id .= ':' . $this->getState('filter.access');
		$id .= ':' . $this->getState('filter.language');
		$id .= ':' . $this->getState('filter.level');
		$id .= ':' . serialize($this->getState('filter.tag'));

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

		// Select the required fields from the table.
		$query->select(
			$this->getState(
				'list.select',
				[
					$db->quoteName('a.id'),
					$db->quoteName('a.pid'),
					$db->quoteName('a.path'),
					$db->quoteName('a.toc'),
					$db->quoteName('a.level'),
					$db->quoteName('a.Tieude'),
					$db->quoteName('a.Mota'),
					$db->quoteName('a.LoaiTM'),
					$db->quoteName('a.created'),
					$db->quoteName('a.created_by'),					
					$db->quoteName('a.modified'),
					$db->quoteName('a.modified_by'),
					$db->quoteName('a.published'),
					$db->quoteName('a.ordering'),          
                    
				]
			)
		)->select([$db->quoteName('b.id', 'idTL'),$db->quoteName('b.Tieude', 'TenTailieu'),$db->quoteName('b.Url', 'Link')])
        ->from($db->quoteName('#__hrms_thumuc', 'a'))
        ->join('LEFT', $db->quoteName('#__hrms_tailieu', 'b'), $db->quoteName('a.id') . ' = ' . $db->quoteName('b.idTM'));
		// Filter by access level.
		if ($path = (string) $this->getState('filter.path'))
		{
			$query->where($db->quoteName('a.path') . ' = :path')
				->bind(':path', $access, ParameterType::INTEGER);
		}		
        if ($LoaiTM = (int) $this->getState('filter.LoaiTM'))
		{
			$query->where($db->quoteName('a.LoaiTM') . ' = :LoaiTM')
				->bind(':LoaiTM', $LoaiTM, ParameterType::INTEGER);
		}
		// Filter by published state.
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

		// Filter by category.
		$categoryId = $this->getState('filter.category_id');

		if (is_numeric($categoryId))
		{
			$categoryId = (int) $categoryId;
			$query->where($db->quoteName('a.catid') . ' = :categoryId')
				->bind(':categoryId', $categoryId, ParameterType::INTEGER);
		}

		// Filter on the level.
		if ($level = (int) $this->getState('filter.level'))
		{
			$query->where($db->quoteName('c.level') . ' <= :level')
				->bind(':level', $level, ParameterType::INTEGER);
		}

		// Filter by search in title
		if ($search = $this->getState('filter.search'))
		{
			if (stripos($search, 'id:') === 0)
			{
				$search = (int) substr($search, 3);
				$query->where($db->quoteName('a.id') . ' = :search')
					->bind(':search', $search, ParameterType::INTEGER);
			}
			else
			{
				$search = '%' . str_replace(' ', '%', trim($search)) . '%';
				$query->where('(' . $db->quoteName('a.name') . ' LIKE :search1 OR ' . $db->quoteName('a.alias') . ' LIKE :search2)')
					->bind([':search1', ':search2'], $search);
			}
		}

		// Filter on the language.
		if ($language = $this->getState('filter.language'))
		{
			$query->where($db->quoteName('a.language') . ' = :language')
				->bind(':language', $language);
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
	public function getItems()
	{
		$items  = parent::getItems();
		return $items;
	}    
    
    
}
