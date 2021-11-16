<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_thongbao
 *
 * @copyright   (C) 2005 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Helper\ModuleHelper;
use Joomla\Module\Thongbao\Site\Helper\ThongbaoHelper;
require ModuleHelper::getLayoutPath('mod_thongbao', $params->get('layout', 'default'));
