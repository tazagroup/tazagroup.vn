<?php
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
class ChudeModel extends AdminModel
{
	use VersionableModelTrait;
	public $typeAlias = 'com_hrms.chude';
	protected $text_prefix = 'COM_HRMS';
	public function getForm($data = array(), $loadData = true)
	{
		// Get the form.
		$form = $this->loadForm('com_hrms.chudes', 'chudes', array('control' => 'jform', 'load_data' => $loadData));

		if (empty($form))
		{
			return false;
		}
		return $form;
	}
	protected function loadFormData()
	{
		// Check the session for previously entered form data.
		$data = Factory::getApplication()->getUserState('com_hrms.edit.chudes.data', array());
		if (empty($data))
		{
			$data = $this->getItem();
		}

		$this->preprocessData('com_hrms.chudes', $data);

		return $data;
	}
	public function save($data)
	{
		$input = Factory::getApplication()->input;
		return parent::save($data);
	}
    
  	public function delete(&$pks)
	{
		$return = parent::delete($pk);

		if ($return)
		{
			$db = $this->getDbo();
			$query = $db->getQuery(true)
				->delete($db->quoteName('#__hrms_chude'))
				->where($db->quoteName('id').'='. $pks);
			$db->setQuery($query);
			$db->execute();
		}

		return $return;
	}  
	public function getItem($pk = null)
	{
		if ($item = parent::getItem($pk))
		{
		}
		return $item;
	}
	protected function prepareTable($table)
	{
		$date = Factory::getDate();
		$user = Factory::getUser();
		if (empty($table->id))
		{
			if (empty($table->ordering))
			{
				$db = $this->getDbo();
				$query = $db->getQuery(true)
					->select('MAX(' . $db->quoteName('ordering') . ')')
					->from($db->quoteName('#__hrms_chude'))
                    ->where($db->quoteName('pid')."=".$db->quote($table->pid));
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
	public function publish(&$pks, $value = 1)
	{
		$result = parent::publish($pks, $value);
		// Clean extra cache for hrms
		$this->cleanCache('feed_parser');

		return $result;
	}
	protected function getReorderConditions($table)
	{
		return [
			$this->_db->quoteName('catid') . ' = ' . (int) $table->catid,
		];
	}
	protected function preprocessForm(Form $form, $data, $group = 'content')
	{
		parent::preprocessForm($form, $data, $group);
	}
    public function validate($form, $data, $group = null)
	{
		return parent::validate($form, $data, $group);
	}
}