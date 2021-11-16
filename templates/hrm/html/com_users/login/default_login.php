<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   (C) 2009 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined( '_JEXEC' )or die;

use Joomla\ CMS\ Component\ ComponentHelper;
use Joomla\ CMS\ HTML\ HTMLHelper;
use Joomla\ CMS\ Language\ Text;
use Joomla\ CMS\ Plugin\ PluginHelper;
use Joomla\ CMS\ Router\ Route;

HTMLHelper::_( 'behavior.keepalive' );
HTMLHelper::_( 'behavior.formvalidator' );

$usersConfig = ComponentHelper::getParams( 'com_users' );

?>
<div class="col-12 d-flex align-items-center justify-content-center">
  <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
    <div class="text-center text-md-center mb-4 mt-md-0">
      <h1 class="mb-0 h3">Đăng Nhập Hệ Thống</h1>
    </div>
    <form action="<?php echo Route::_('index.php?option=com_users&task=user.login'); ?>" class="mt-4" method="post">
      <div class="form-group mb-4">
        <label for="email">Số Điện Thoại</label>
        <div class="input-group"><span class="input-group-text" id="basic-addon1">
          <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
          </svg>
          </span>
          <input type="text" class="form-control" placeholder="0987654321" autofocus="" required="" name="username" id="username">
        </div>
      </div>
      <div class="form-group">
        <div class="form-group mb-4">
          <label for="password">Mật Khẩu</label>
          <div class="input-group"><span class="input-group-text" id="basic-addon2">
            <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
            </svg>
            </span>
            <input type="password" name="password" id="password" value="" autocomplete="current-password" class="form-control required form-control-danger invalid" size="25" maxlength="99" required="" data-min-length="12" aria-invalid="true" placeholder="Mật Khẩu">
          </div>
        </div>
        <div class="d-flex justify-content-between align-items-top mb-4">
          <?php if (PluginHelper::isEnabled('system', 'remember')) : ?>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="yes" id="remember">
            <label class="form-check-label mb-0" for="remember">Ghi Nhớ</label>
          </div>
          <?php endif; ?>
          <div><a href="<?php echo Route::_('index.php?option=com_users&view=reset'); ?>" class="small text-right">Quên Mật Khẩu</a></div>
        </div>
      </div>
      <div class="d-grid">
      <?php $return = $this->form->getValue('return', '', $this->params->get('login_redirect_url', $this->params->get('login_redirect_menuitem'))); ?>
      <input type="hidden" name="return" value="<?php echo base64_encode($return); ?>">
      <?php echo HTMLHelper::_('form.token'); ?>   
        <button type="submit" class="btn btn-gray-800">Đăng Nhập</button>
      </div>
    </form>
  </div>
</div>