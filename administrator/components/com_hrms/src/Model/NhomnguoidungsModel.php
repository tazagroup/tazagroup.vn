<?php
namespace Joomla\Component\Hrms\Administrator\Model;
\defined('_JEXEC') or die;
use Joomla\CMS\Component\ComponentHelper;
use Joomla\CMS\Factory;
use Joomla\CMS\Language\Associations;
use Joomla\CMS\MVC\Factory\MVCFactoryInterface;
use Joomla\CMS\MVC\Model\ListModel;
use Joomla\Database\ParameterType;
use Joomla\Utilities\ArrayHelper;
use Joomla\Registry\Registry;
class NhomnguoidungsModel extends ListModel
{
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
			);
		}

		parent::__construct($config, $factory);
	}
	protected function populateState($ordering = 'a.id', $direction = 'asc')
	{
		$app = Factory::getApplication();

		// Load the parameters.
		$params = ComponentHelper::getParams('com_hrms');
		$this->setState('params', $params);
		// List state information.
		parent::populateState($ordering, $direction);
	}
	protected function getStoreId($id = '')
	{
		// Compile the store id.
		$id .= ':' . $this->getState('filter.search');
		$id .= ':' . $this->getState('filter.published');
		$id .= ':' . $this->getState('filter.category_id');
		$id .= ':' . $this->getState('filter.access');
		$id .= ':' . $this->getState('filter.language');
		$id .= ':' . $this->getState('filter.level');
		$id .= ':' . serialize($this->getState('filter.tag'));

		return parent::getStoreId($id);
	}
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
					$db->quoteName('a.idNguoidung'),
					$db->quoteName('a.Tennhom'),
					$db->quoteName('a.level'),
					$db->quoteName('a.Mota'),
					$db->quoteName('a.Ghichu'),
					$db->quoteName('a.Trangthai'),
					$db->quoteName('a.Phanquyen'),
					$db->quoteName('a.published'),
					$db->quoteName('a.ordering'),
					$db->quoteName('a.Ngaytao'),
					$db->quoteName('a.idTao'),    
				]
			)
		)
        ->from($db->quoteName('#__hrms_nhomnguoidung', 'a'));
		// Filter by access level.
		if ($access = (int) $this->getState('filter.access'))
		{
			$query->where($db->quoteName('a.access') . ' = :access')
				->bind(':access', $access, ParameterType::INTEGER);
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
        if ($idUser = $this->getState('filter.idUser'))
		{
			if (stripos($idUser, 'id:') === 0)
			{
				$idUser = (int) substr($idUser, 3);
				$query->where($db->quoteName('a.idNguoidung') . ' = :idUser')
					->bind(':idUser', $idUser, ParameterType::INTEGER);
			}
			else
			{
				$idUser = '%' . str_replace(' ', '%', trim($idUser)) . '%';
				$query->where('(' . $db->quoteName('a.idNguoidung') . ' LIKE :idUser1 OR ' . $db->quoteName('a.idNguoidung') . ' LIKE :idUser2)')
					->bind([':idUser1', ':idUser2'], $idUser);
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
		$orderDirn = $this->state->get('list.direction', 'ASC');

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
//    public function getItems()
//	{
//		$items = parent::getItems();
//
//		foreach ($items as $item)
//		{
//			$item->typeAlias = 'com_hrms.nhomnguoidung';
//
//            			if (isset($item->Phanquyen))
//            			{
//            				$registry = new Registry($item->Phanquyen);
//            				$item->Phanquyen = $registry->toArray();
//            			}
//		}
//
//		return $items;
//	}  
}
