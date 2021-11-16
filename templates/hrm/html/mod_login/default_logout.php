<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_login
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined( '_JEXEC' )or die;

use Joomla\ CMS\ HTML\ HTMLHelper;
use Joomla\ CMS\ Language\ Text;
use Joomla\ CMS\ Router\ Route;

HTMLHelper::_( 'behavior.keepalive' );
?>

  <li class="nav-item dropdown ms-lg-3"><a class="nav-link dropdown-toggle pt-1 px-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <div class="media d-flex align-items-center">
      <svg class="avatar rounded-circle text-primary" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path>
      </svg>
      <div class="media-body ms-2 text-dark align-items-center d-none d-lg-block"><span class="mb-0 font-small fw-bold text-gray-900">
        <?php if ($params->get('greeting', 1)) : ?>
        <div class="mod-login-logout__login-greeting login-greeting">
          <?php if (!$params->get('name', 0)) : ?>
          <?php echo Text::sprintf(htmlspecialchars($user->get('name'))); ?>
          <?php else : ?>
          <?php echo Text::sprintf(htmlspecialchars($user->get('username'))); ?>
          <?php endif; ?>
        </div>
        <?php endif; ?>
        </span></div>
    </div>
    </a>
    <div class="dropdown-menu dashboard-dropdown dropdown-menu-end mt-2 py-1"> <a class="dropdown-item d-flex align-items-center" href="<?php echo Route::_('index.php?option=com_users&view=profile&layout=edit'); ?>"><i class="fas fa-cogs dropdown-icon text-info me-2"></i> Cài Đặt </a>
      <div role="separator" class="dropdown-divider my-1"></div>
      <a class="dropdown-item d-flex align-items-center" href="javascript:document.querySelector('#loginform').submit();">
      <svg class="dropdown-icon text-danger me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
      </svg>
      Đăng Xuất
      <form class="mod-login-logout form-vertical" action="<?php echo Route::_('index.php', true); ?>" method="post" id="loginform">
        <?php if ($params->get('profilelink', 0)) : ?>
        <ul class="mod-login-logout__options list-unstyled">
          <li> <a href="<?php echo Route::_('index.php?option=com_users&view=profile'); ?>"> <?php echo Text::_('MOD_LOGIN_PROFILE'); ?></a> </li>
        </ul>
        <?php endif; ?>
        <div class="mod-login-logout__button logout-button">
          <input type="submit" name="Submit" class="btn btn-primary d-none" value="<?php echo Text::_('JLOGOUT'); ?>">
          <input type="hidden" name="option" value="com_users">
          <input type="hidden" name="task" value="user.logout">
          <input type="hidden" name="return" value="<?php echo $return; ?>">
          <?php echo HTMLHelper::_('form.token'); ?> </div>
      </form>
      </a></div>
  </li>
