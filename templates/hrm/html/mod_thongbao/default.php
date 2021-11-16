<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_login
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Component\ComponentHelper;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Plugin\PluginHelper;
use Joomla\CMS\Router\Route;
?>
<li class="nav-item dropdown" ng-init="OninitTinnhan()">
    <a class="nav-link text-dark notification-bell unread dropdown-toggle" data-unread-notifications="true" href="#" role="button" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
        <i class="fas fa-bell icon icon-sm text-gray-900" style="font-size: 1.5rem"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-center mt-2 py-0">
        <div class="list-group list-group-flush">
            <a href="#" class="text-center text-primary fw-bold border-bottom border-light py-3">Thông Báo</a>
        </div>
        <div class="list-group list-group-flush" ng-repeat="tn in Rtinnhan">
            <div class="list-group-item list-group-item-action border-bottom">
          <div class="row align-items-center">
          <div class="col-3 text-center">
             <div> <i class="fas fa-user-circle display-4"></i></div>
             <div class="{{tn.Trangthai}} rounded"> <small>{{tn.Trangthai|Ftitle:TTThongbao}}</small></div>
              </div>
          <div class="col ps-0 ms-2">
              <div class="d-flex justify-content-between align-items-center">
              <div>
                  <h4 class="h6 mb-0 text-small">
                      <small class="text-danger"> {{tn.Nguoigui}}</small>   
                  </h4>
                </div>             
            </div>
              <p class="font-small mt-1 mb-0">{{tn.Tieude}}</p>
            </div>
              <div class="col ps-0 ms-2">
              <div class="text-end"><small class="text-info">{{tn.created}}</small></div>    
              <div class="d-flex justify-content-end align-items-center" ng-show="tn.Trangthai==0">
                  <button class="btn btn-info btn-sm mx-1" type="button" ng-click="UpdateTinnhan(2,tn)"><i class="fas fa-check"></i></button>
                  <button class="btn btn-danger btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#LydoHuy" ng-click="editThongbao(tn)"><i class="fas fa-times"></i></button>
            </div>
            </div>
        </div>
          </div> 
           
        </div>     
    </div>
</li>
<div class="modal fade" id="LydoHuy">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Lý do hủy việc</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <textarea ng-model="tn.Ghichu" class="form-control" placeholder="Lý Do Hủy Việc" ></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" ng-click="UpdateTinnhan(1,tn)">Lưu</button>
      </div>
    </div>
  </div>
</div>

