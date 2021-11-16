<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_hrms
 *
 * @copyright   (C) 2009 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Component\Hrms\Site\Service;

\defined('_JEXEC') or die;

use Joomla\CMS\Categories\Categories;

/**
 * Hrm Component Category Tree
 *
 * @since  1.6
 */
class Category extends Categories
{
	/**
	 * Constructor
	 *
	 * @param   array  $options  options
	 */
	public function __construct($options = array())
	{
		$options['table'] = '#__hrms';
		$options['extension'] = 'com_hrms';
		$options['statefield'] = 'published';
		parent::__construct($options);
	}
}
