<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_crms
 *
 * @copyright   (C) 2008 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;
use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Associations;
use Joomla\CMS\Language\Multilanguage;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Session\Session;
HTMLHelper::_( 'script', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', array( 'version' => 'auto' ), array( 'defer' => 'true' ) );
HTMLHelper::_( 'script', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array( 'version' => 'auto' ), array( 'defer' => 'true' ) );
HTMLHelper::_( 'script', 'https://ajax.googleapis.com/ajax/libs/angularjs/1.8.0/angular.min.js', array( 'version' => 'auto' ), array( 'defer' => 'true' ) );
HTMLHelper::_( 'script', 'https://cdnjs.cloudflare.com/ajax/libs/mouse0270-bootstrap-notify/3.1.3/bootstrap-notify.min.js', array( 'version' => 'auto' ), array( 'defer' => 'true' ) );
HTMLHelper::_( 'script', 'administrator/components/com_crms/js/main.js', array( 'version' => 'auto' ), array( 'defer' => 'true' ) );
HTMLHelper::_( 'stylesheet', 'administrator/components/com_crms/css/main.css', array( 'version' => 'auto' ), array( 'defer' => 'true' ) );
$user      = Factory::getUser();
?>
<div class="row mt-3">
    <div id="accordion" class="col-sm-3">
  <div class="card">
    <div class="card-header bg-primary text-white" data-toggle="collapse" href="#menu1">
       <a href="<?php echo Route::_('index.php?option=com_crms&view=kho'); ?>" class="nav-link active"> Kho</a>
    </div>
    <div id="menu1" class="collapse show" data-parent="#accordion">
      <div class="card-body">
       <a href="<?php echo Route::_('index.php?option=com_crms&view=cauhoi'); ?>" class="nav-link active"> Câu hỏi thường gặp</a>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header bg-primary text-white" data-toggle="collapse" href="#menu2">
        Dịch Vụ
    </div>
    <div id="menu2" class="collapse" data-parent="#accordion">
      <div class="card-body">
        Lorem ipsum..
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header bg-primary text-white" data-toggle="collapse" href="#menu3">
       Khách hàng
    </div>
    <div id="menu3" class="collapse" data-parent="#accordion">
      <div class="card-body">
        Lorem ipsum..
      </div>
    </div>
  </div>
</div>
    
 <div class="col-sm-9">
    </div>   
</div>
