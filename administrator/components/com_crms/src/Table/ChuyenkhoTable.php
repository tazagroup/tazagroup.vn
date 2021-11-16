<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_crms
 *
 * @copyright   (C) 2005 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Component\Crms\Administrator\Table;

\defined('_JEXEC') or die;

use Joomla\CMS\Application\ApplicationHelper;
use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\String\PunycodeHelper;
use Joomla\CMS\Table\Table;
use Joomla\CMS\Tag\TaggableTableInterface;
use Joomla\CMS\Tag\TaggableTableTrait;
use Joomla\CMS\Versioning\VersionableTableInterface;
use Joomla\Database\DatabaseDriver;
use Joomla\String\StringHelper;

/**
 * Chuyenkho Table class.
 *
 * @since  1.6
 */
class ChuyenkhoTable extends Table implements VersionableTableInterface, TaggableTableInterface
{
	use TaggableTableTrait;

	/**
	 * Indicates that columns fully support the NULL value in the database
	 *
	 * @var    boolean
	 * @since  4.0.0
	 */
	protected $_supportNullValue = true;

	/**
	 * Ensure the params, metadata and images are json encoded in the bind method
	 *
	 * @var    array
	 * @since  3.3
	 */
	protected $_jsonEncode = array('params', 'metadata', 'images');

	/**
	 * Constructor
	 *
	 * @param   DatabaseDriver  $db  A database connector object
	 */
	public function __construct(DatabaseDriver $db)
	{
		$this->typeAlias = 'com_crms.chuyenkhos';
		parent::__construct('#__crms_chuyenkho', 'id', $db);
	}

	/**
	 * Overloaded check method to ensure data integrity.
	 *
	 * @return  boolean  True on success.
	 */
	public function check()
	{
		try
		{
			parent::check();
		}
		catch (\Exception $e)
		{
			$this->setError($e->getMessage());

			return false;
		}
//
//		// Check for valid name.
//		if (trim($this->name) == '')
//		{
//			$this->setError(Text::_('COM_CRMS_WARNING_PROVIDE_VALID_NAME'));
//
//			return false;
//		}
//
//		if (empty($this->alias))
//		{
//			$this->alias = $this->name;
//		}
//
//		$this->alias = ApplicationHelper::stringURLSafe($this->alias, $this->language);
//
//		if (trim(str_replace('-', '', $this->alias)) == '')
//		{
//			$this->alias = Factory::getDate()->format('Y-m-d-H-i-s');
//		}
//
//		// Check for a valid category.
//		if (!$this->catid = (int) $this->catid)
//		{
//			$this->setError(Text::_('JLIB_DATABASE_ERROR_CATEGORY_REQUIRED'));
//
//			return false;
//		}
//
//		// Check the publish down date is not earlier than publish up.
//		if ((int) $this->publish_down > 0 && $this->publish_down < $this->publish_up)
//		{
//			$this->setError(Text::_('JGLOBAL_START_PUBLISH_AFTER_FINISH'));
//
//			return false;
//		}
//
//		// Clean up description -- eliminate quotes and <> brackets
//		if (!empty($this->metadesc))
//		{
//			// Only process if not empty
//			$bad_characters = array("\"", '<', '>');
//			$this->metadesc = StringHelper::str_ireplace($bad_characters, '', $this->metadesc);
//		}
//
//		if (is_null($this->hits))
//		{
//			$this->hits = 0;
//		}

		return true;
	}

	/**
	 * Overridden \JTable::store to set modified data.
	 *
	 * @param   boolean  $updateNulls  True to update fields even if they are null.
	 *
	 * @return  boolean  True on success.
	 *
	 * @since   1.6
	 */
	public function store($updateNulls = true)
	{
		$date = Factory::getDate();
		$user = Factory::getUser();

		// Set created date if not set.
		if (!(int) $this->created)
		{
			$this->created = $date->toSql();
		}

		if ($this->id)
		{
			// Existing item
			$this->modified_by = $user->get('id');
			$this->modified    = $date->toSql();
		}
		else
		{
			// Field created_by can be set by the user, so we don't touch it if it's set.
			if (empty($this->created_by))
			{
				$this->created_by = $user->get('id');
			}

			if (!(int) $this->modified)
			{
				$this->modified = $this->created;
			}

			if (empty($this->modified_by))
			{
				$this->modified_by = $this->created_by;
			}
		}
//		// Verify that the alias is unique
//		$table = Table::getInstance('ChuyenkhoTable', __NAMESPACE__ . '\\', array('dbo' => $this->_db));
//
//		if (($table->id != $this->id || $this->id == 0))
//		{
//			$this->setError(Text::_('COM_CRMS_ERROR_UNIQUE_ALIAS'));
//
//			return false;
//		}

		return parent::store($updateNulls);
	}

	/**
	 * Get the type alias for the history table
	 *
	 * @return  string  The alias as described above
	 *
	 * @since   4.0.0
	 */
	public function getTypeAlias()
	{
		return $this->typeAlias;
	}
}