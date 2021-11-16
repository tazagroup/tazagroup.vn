<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_hrms
 *
 * @copyright   (C) 2008 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Component\Hrms\Administrator\Model;

\defined('_JEXEC') or die;

use Joomla\CMS\Application\ApplicationHelper;
use Joomla\CMS\Factory;
use Joomla\CMS\Form\Form;
use Joomla\CMS\Helper\TagsHelper;
use Joomla\CMS\Language\Associations;
use Joomla\CMS\Language\LanguageHelper;
use Joomla\CMS\MVC\Model\AdminModel;
use Joomla\CMS\Versioning\VersionableModelTrait;
use Joomla\Component\Categories\Administrator\Helper\CategoriesHelper;
use Joomla\Registry\Registry;

/**
 * Hrm model.
 *
 * @since  1.6
 */
class CaidatModel extends AdminModel
{
	use VersionableModelTrait;

	/**
	 * The type alias for this content type.
	 *
	 * @var      string
	 * @since    3.2
	 */
	public $typeAlias = 'com_hrms.caidat';
	protected $text_prefix = 'COM_HRMS';

	/**
	 * Method to test whether a record can be deleted.
	 *
	 * @param   object  $record  A record object.
	 *
	 * @return  boolean  True if allowed to delete the record. Defaults to the permission set in the component.
	 *
	 * @since   1.6
	 */
	protected function canDelete($record)
	{
		if (empty($record->id) || $record->published != -2)
		{
			return false;
		}

		if (!empty($record->catid))
		{
			return Factory::getUser()->authorise('core.delete', 'com_hrm.category.' . (int) $record->catid);
		}

		return parent::canDelete($record);
	}

	/**
	 * Method to test whether a record can have its state changed.
	 *
	 * @param   object  $record  A record object.
	 *
	 * @return  boolean  True if allowed to change the state of the record. Defaults to the permission set in the component.
	 *
	 * @since   1.6
	 */
	protected function canEditState($record)
	{
		if (!empty($record->catid))
		{
			return Factory::getUser()->authorise('core.edit.state', 'com_hrms.category.' . (int) $record->catid);
		}

		return parent::canEditState($record);
	}

	/**
	 * Method to get the record form.
	 *
	 * @param   array    $data      Data for the form.
	 * @param   boolean  $loadData  True if the form is to load its own data (default case), false if not.
	 *
	 * @return  \JForm    A \JForm object on success, false on failure
	 *
	 * @since   1.6
	 */
	public function getForm($data = array(), $loadData = true)
	{
		// Get the form.
		$form = $this->loadForm('com_hrms.caidats', 'caidats', array('control' => 'jform', 'load_data' => $loadData));

		if (empty($form))
		{
			return false;
		}

		return $form;
	}

	/**
	 * Method to get the data that should be injected in the form.
	 *
	 * @return  mixed  The data for the form.
	 *
	 * @since   1.6
	 */
	protected function loadFormData()
	{
		// Check the session for previously entered form data.
		$data = Factory::getApplication()->getUserState('com_hrms.edit.caidats.data', array());

		if (empty($data))
		{
			$data = $this->getItem();
		}

		$this->preprocessData('com_hrms.caidats', $data);

		return $data;
	}

	/**
	 * Method to save the form data.
	 *
	 * @param   array  $data  The form data.
	 *
	 * @return  boolean  True on success.
	 *
	 * @since   3.0
	 */
	public function save($data)
	{
		$input = Factory::getApplication()->input;
//        if (isset($data['Dulieu']) && is_array($data['Dulieu']))
//		{
//			$registry = new Registry($data['Dulieu']);
//			$data['Dulieu'] = (string) $registry;
//		}
		return parent::save($data);
	}
    
  	public function delete(&$pks)
	{
		$return = parent::delete($pk);

		if ($return)
		{
			$db = $this->getDbo();
			$query = $db->getQuery(true)
				->delete($db->quoteName('#__hrms_caidat'))
				->where($db->quoteName('id').'='. $pks);
			$db->setQuery($query);
			$db->execute();
		}

		return $return;
	}  

	/**
	 * Method to get a single record.
	 *
	 * @param   integer  $pk  The id of the primary key.
	 *
	 * @return  mixed  Object on success, false on failure.
	 *
	 * @since   1.6
	 */
	public function getItem($pk = null)
	{
		if ($item = parent::getItem($pk))
		{
//            $registry = new Registry($item->Dulieu);
//			$item->Dulieu = $registry->toArray();
		}
		return $item;
	}

	/**
	 * Prepare and sanitise the table prior to saving.
	 *
	 * @param   \JTable  $table  The table object
	 *
	 * @return  void
	 */
	protected function prepareTable($table)
	{
		$date = Factory::getDate();
		$user = Factory::getUser();

		$table->name = htmlspecialchars_decode($table->name, ENT_QUOTES);
		$table->alias = ApplicationHelper::stringURLSafe($table->alias, $table->language);

		if (empty($table->alias))
		{
			$table->alias = ApplicationHelper::stringURLSafe($table->name, $table->language);
		}

		if (empty($table->id))
		{
			// Set the values
			$table->created = $date->toSql();

			// Set ordering to the last item if not set
			if (empty($table->ordering))
			{
				$db = $this->getDbo();
				$query = $db->getQuery(true)
					->select('MAX(' . $db->quoteName('ordering') . ')')
					->from($db->quoteName('#__hrms_caidat'));
				$db->setQuery($query);
				$max = $db->loadResult();

				$table->ordering = $max + 1;
			}
		}
		else
		{
			// Set the values
			$table->modified = $date->toSql();
			$table->modified_by = $user->get('id');
		}

		// Increment the content version number.
		$table->version++;
	}

	/**
	 * Method to change the published state of one or more records.
	 *
	 * @param   array    &$pks   A list of the primary keys to change.
	 * @param   integer  $value  The value of the published state.
	 *
	 * @return  boolean  True on success.
	 *
	 * @since   1.6
	 */
	public function publish(&$pks, $value = 1)
	{
		$result = parent::publish($pks, $value);

		// Clean extra cache for hrms
		$this->cleanCache('feed_parser');

		return $result;
	}

	/**
	 * A protected method to get a set of ordering conditions.
	 *
	 * @param   object  $table  A record object.
	 *
	 * @return  array  An array of conditions to add to ordering queries.
	 *
	 * @since   1.6
	 */
	protected function getReorderConditions($table)
	{
		return [
			$this->_db->quoteName('catid') . ' = ' . (int) $table->catid,
		];
	}

	/**
	 * A protected method to get a set of ordering conditions.
	 *
	 * @param   \JForm  $form   The form object.
	 * @param   array   $data   The data to be injected into the form
	 * @param   string  $group  The plugin group to process
	 *
	 * @return  array  An array of conditions to add to add to ordering queries.
	 *
	 * @since   1.6
	 */
	protected function preprocessForm(Form $form, $data, $group = 'content')
	{
		parent::preprocessForm($form, $data, $group);
	}

	/**
	 * Is the user allowed to create an on the fly category?
	 *
	 * @return  boolean
	 *
	 * @since   3.6.1
	 */

	/**
	 * Method to validate the form data.
	 *
	 * @param   Form    $form   The form to validate against.
	 * @param   array   $data   The data to validate.
	 * @param   string  $group  The name of the field group to validate.
	 *
	 * @return  array|boolean  Array of filtered data if valid, false otherwise.
	 *
	 * @see     JFormRule
	 * @see     JFilterInput
	 * @since   3.9.25
	 */
	public function validate($form, $data, $group = null)
	{
		// Don't allow to change the users if not allowed to access com_users.
		if (!Factory::getUser()->authorise('core.manage', 'com_users'))
		{
			if (isset($data['created_by']))
			{
				unset($data['created_by']);
			}
		}

		return parent::validate($form, $data, $group);
	}
}
