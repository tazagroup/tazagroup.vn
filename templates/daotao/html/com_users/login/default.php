<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   (C) 2009 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
use Joomla\ CMS\ Factory;
use Joomla\ CMS\ Router\ Route;
$app = Factory::getApplication();
$cookieLogin = $this->user->get('cookieLogin');

if (!empty($cookieLogin) || $this->user->get('guest'))
{
	// The user is not logged in or needs to provide a password.
	echo $this->loadTemplate('login');
}
else
{
  $app->Redirect(Route::_('dao-tao-dashboard.html'));
	//echo $this->loadTemplate('logout');
}
