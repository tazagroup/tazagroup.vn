<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_hrms
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined( '_JEXEC' )or die;

use Joomla\ CMS\ Factory;
use Joomla\ CMS\ Filter\ OutputFilter;
use Joomla\ CMS\ HTML\ HTMLHelper;
use Joomla\ CMS\ Language\ Text;
use Joomla\ CMS\ Layout\ FileLayout;
HTMLHelper::_( 'script', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', array( 'version' => 'auto' ), array( 'defer' => 'true' ) );
HTMLHelper::_( 'script', 'https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js', array( 'version' => 'auto' ), array( 'defer' => 'true' ) );
HTMLHelper::_( 'script', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', array( 'version' => 'auto' ), array( 'defer' => 'true' ) );
HTMLHelper::_( 'script', 'https://kendo.cdn.telerik.com/2021.2.616/js/kendo.all.min.js', array( 'version' => 'auto' ), array( 'defer' => 'true' ) );
HTMLHelper::_( 'script', 'https://cdnjs.cloudflare.com/ajax/libs/angular-ui/0.4.0/angular-ui.min.js', array( 'version' => 'auto' ), array( 'defer' => 'true' ) );
HTMLHelper::_( 'script', 'https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js', array( 'version' => 'auto' ), array( 'defer' => 'true' ) );
HTMLHelper::_( 'script', 'components/com_crms/js/qrcode.js', array( 'version' => 'auto' ), array( 'defer' => 'true' ) );
HTMLHelper::_( 'script', 'components/com_crms/js/html5-qrcode.min.js', array( 'version' => 'auto' ), array( 'defer' => 'true' ) );
HTMLHelper::_( 'script', 'components/com_crms/js/main.js', array( 'version' => 'auto' ), array( 'defer' => 'true' ) );
HTMLHelper::_( 'stylesheet', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css', array( 'version' => 'auto' ), array( 'defer' => 'true' ) );
HTMLHelper::_( 'stylesheet', 'components/com_crms/css/main.css', array( 'version' => 'auto' ), array( 'defer' => 'true' ) );
?>
<div class="col-12 d-flex align-items-center justify-content-center mt-3">
    <div ng-app="Site" ng-controller="Site" ng-init="OnInit()" class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100">
  <div class="container-fluid px-3">
    <div class="row mt-4 mb-3">
      <div class="col-8 ps-0">
        <div class="mb-2">
          <select class="form-select state" ng-model="idCN" ng-change="OnInit()">
            <option selected value="99999">Chọn Chi Nhánh</option>
            <option value="{{ct.id}}" ng-repeat="ct in Listcongty">{{ct.Ten}}</option>
          </select>

        </div>
      </div>
      <div class="col-4 px-0 text-end">
        <?php echo $this->loadTemplate('nguyenvatlieu'); ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12"> 
      <!-- Tab -->
      <nav>
        <div class="nav nav-tabs mb-4" id="nav-tab" role="tablist"> 
    <li class="nav-item nav-link active" id="nav-home-tab" data-bs-toggle="tab" href="#nav-kho1" role="tab" aria-controls="nav-home" aria-selected="true">Nhập Kho</li>
    <li class="nav-item nav-link" id="nav-profile-tab" data-bs-toggle="tab" href="#nav-kho2" role="tab" aria-controls="nav-profile" aria-selected="false">Xuất Kho</li>
    <li class="nav-item nav-link" id="nav-contact-tab" data-bs-toggle="tab" href="#nav-kho3" role="tab" aria-controls="nav-contact" aria-selected="false">Tồn Kho</li>
    <li class="nav-item nav-link" id="nav-contact-tab" data-bs-toggle="tab" href="#nav-kho4" role="tab" aria-controls="nav-contact" aria-selected="false">Chuyển Kho</li>
</div>

      </nav>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-kho1" role="tabpanel">
             <?php echo $this->loadTemplate('nhapkho'); ?>
        </div>
        <div class="tab-pane fade" id="nav-kho2" role="tabpanel">
            <?php echo $this->loadTemplate('xuatkho'); ?>
        </div>
        <div class="tab-pane fade" id="nav-kho3" role="tabpanel">
             <?php echo $this->loadTemplate('tonkho'); ?>
        </div>
        <div class="tab-pane fade" id="nav-kho4" role="tabpanel">
           <?php echo $this->loadTemplate('chuyenkho'); ?>
        </div>
      </div>
    </div>
  </div>
</div></div>
