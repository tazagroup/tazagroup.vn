<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_hrms
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
HTMLHelper::_( 'script', 'https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js', array( 'version' => 'auto' ), array( 'defer' => 'true' ) );
HTMLHelper::_( 'script', 'https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js', array( 'version' => 'auto' ), array( 'defer' => 'true' ) );
HTMLHelper::_( 'script', 'https://cdnjs.cloudflare.com/ajax/libs/mouse0270-bootstrap-notify/3.1.3/bootstrap-notify.min.js', array( 'version' => 'auto' ), array( 'defer' => 'true' ) );
HTMLHelper::_( 'script', 'administrator/components/com_hrms/js/main.js', array( 'version' => 'auto' ), array( 'defer' => 'true' ) );
HTMLHelper::_( 'stylesheet', 'administrator/components/com_hrms/css/main.css', array( 'version' => 'auto' ), array( 'defer' => 'true' ) );
$user      = Factory::getUser();
?>
<div class="row mt-3" ng-app="Admin" ng-controller="Admin" ng-init="ReadCauhoi()">
    <div id="accordion" class="col-sm-3">
  <div class="card">
    <div class="card-header bg-primary text-white" data-toggle="collapse" href="#menu1">
        Wellcomekit
    </div>
    <div id="menu1" class="collapse show" data-parent="#accordion">
      <div class="card-body">
       <a href="<?php echo Route::_('index.php?option=com_hrms&view=cauhoi'); ?>" class="nav-link active"> Câu hỏi thường gặp</a>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header bg-primary text-white" data-toggle="collapse" href="#menu2">
        Thông tin cá nhân
    </div>
    <div id="menu2" class="collapse" data-parent="#accordion">
      <div class="card-body">
        Lorem ipsum..
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header bg-primary text-white" data-toggle="collapse" href="#menu3">
       Sơ đồ tổ chức
    </div>
    <div id="menu3" class="collapse" data-parent="#accordion">
      <div class="card-body">
        Lorem ipsum..
      </div>
    </div>
  </div>

</div>
    
 <div class="col-sm-9">
   <div class="d-flex justify-content-between align-items-center m-3">
           <button class="btn btn-primary">Thêm mới</button>  
        <div class="d-flex"> 
            <input type="file" name="file" class="form-control mx-3"  
                   onchange="angular.element(this).scope().loadFile(this.files)" />  
            <button class="btn btn-primary" ng-click="handleFile()">Import</button>
       </div>
     </div>  
     <div class="table-responsive-sm">          
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>#</th>
        <th>Câu Hỏi</th>
        <th>Trả Lời</th>
        <th>Ngày Tạo</th>
        <th>Người Tạo</th>
        <th>Trạng Thái</th>
      </tr>
    </thead>
    <tbody>
      <tr ng-repeat="lch in ListCauhoi">
        <td>{{$index+1}}</td>
        <td>{{lch.attributes.Cauhoi}}</td>
        <td>{{lch.attributes.Traloi}}</td>
        <td>{{lch.attributes.created}}</td>
        <td>{{lch.attributes.created_by}}</td>
        <td>{{lch.attributes.published}}</td>
      </tr>
    </tbody>
  </table>
  </div>
    </div>   
</div>

