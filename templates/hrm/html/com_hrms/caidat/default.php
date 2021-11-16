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
$User = Factory::getUser();
?>
<div class="col-12 d-flex align-items-center justify-content-center" ng-init="OninitCaidat()">
    <div class="bg-white shadow border-0 rounded border-light p-3 w-100">
  <div class="row my-3">
    <div class="col-2">
      <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#Themmoicaidat">Thêm mới</button>
    </div>
    <div class="col-6">
      <div class="input-group"> <span class="input-group-text"><i class="fas fa-search"></i> </span>
        <input class="form-control" placeholder="Tìm Kiếm">
      </div>
    </div>
  </div>
  <div class="col-12 d-flex align-items-center justify-content-center">
      
      <div class="row w-100">
  <div class="d-flex align-items-start">
  <div class="nav flex-column nav-pills me-3 col-sm-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <button class="nav-link p-2 mb-3 text-start" ng-class="{'active': $first }" data-bs-toggle="pill" data-bs-target="#v-pills-home-{{cdmenu.id}}" type="button" ng-repeat="cdmenu in RCaidat">{{cdmenu.id}} - {{cdmenu.Title}}</button>
  </div>
  <div class="tab-content w-100" id="v-pills-tabContent">
    <div class="tab-pane fade" ng-class="{'active show': $first }"  id="v-pills-home-{{cdcontent.id}}" ng-repeat="cdcontent in RCaidat">
        <div class="row"><div class="table-responsive">
            <table class="table table-centered table-nowrap mb-0 rounded text-center table-bordered">
              <thead>
                <tr>
                  <th scope="col">{{cdcontent.Title}}</th>
                  <th scope="col">
                      <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#Themmoicaidat" ng-click="EditCaidat(cdcontent)">Sửa</button>
                      <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#XoaCaidat" ng-click="EditCaidat(cdcontent)">Xóa</button> </th>
                </tr>  
                  <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Thuộc Tính</th>             
                  <th scope="col">Nhóm</th>             
                </tr>
              </thead>
              <tbody>
                <tr ng-repeat="cddl in cdcontent.Dulieu">
                  <td>{{cddl.id}}</td>
                  <td><div class="{{cddl.Mauchu}} {{cddl.Maunen}} p-1 rounded">{{cddl.Thuoctinh}}</div></td>
                  <td><div class="{{cddl.Mauchu}} {{cddl.Maunen}} p-1 rounded">{{cddl.Nhom}}</div></td>
                </tr>
              </tbody>
            </table>
          </div></div>
      </div>
  </div>
</div>    
  </div></div>
  <div class="modal fade" id="Themmoicaidat">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">{{Caidat.Header}} Cài Đặt</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12 row">
              <div class="col-6">
                <div class="input-group mb-3"> <span class="input-group-text">Tiêu Đề</span>
                  <input class="form-control" type="text" ng-model="Caidat.Title" placeholder="Tiêu Đề">
                </div>
              </div>
              <div class="col-6">
                <button class="btn btn-primary" ng-click="addDulieu()"><i class="fas fa-plus"></i></button>
              </div>
            </div>
            <div class="col-12 row" ng-repeat="Dulieu in Dulieus">
              <div class="col-sm-2">
                <div class="input-group mb-3"> <span class="input-group-text">ID</span>
                  <input class="form-control" ng-model="Dulieu.id" />
                </div>
              </div>
              <div class="col-sm-3">
                <div class="input-group mb-3"> <span class="input-group-text">Thuộc Tính</span>
                  <input class="form-control {{Dulieu.Mauchu}} {{Dulieu.Maunen}} " ng-model="Dulieu.Thuoctinh"/>
                </div>
              </div>
                 <div class="col-sm-2">
                <div class="input-group mb-3"> <span class="input-group-text">Nhóm</span>
                  <input class="form-control {{Dulieu.Mauchu}} {{Dulieu.Maunen}} " ng-model="Dulieu.Nhom"/>
                </div>
              </div>             
              <div class="col-sm-2">
                <div class="input-group mb-3"> <span class="input-group-text">Màu Chữ</span>
                <select class="form-select" ng-model="Dulieu.Mauchu">
    <option selected value="">Chọn màu chữ</option>
    <option value="text-white" class="text-primary">White</option>
    <option value="text-primary" class="text-primary">Primary</option>
    <option value="text-secondary" class="text-secondary">Secondary</option>
    <option value="text-success" class="text-success">Success</option>
    <option value="text-danger" class="text-danger">Danger</option>
    <option value="text-warning" class="text-warning">Warning</option>
    <option value="text-info" class="text-info">Info</option>
    <option value="text-light" class="text-light">Light</option>
</select>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="input-group mb-3"> <span class="input-group-text">Màu Nền</span>
<select class="form-select" ng-model="Dulieu.Maunen">
    <option selected value="">Chọn màu nền</option>
    <option value="bg-primary" class="text-white bg-primary">Primary</option>
    <option value="bg-secondary" class="text-white bg-secondary">Secondary</option>
    <option value="bg-success" class="text-white bg-success">Success</option>
    <option value="bg-danger" class="text-white bg-danger">Danger</option>
    <option value="bg-warning" class="text-white bg-warning">Warning</option>
    <option value="bg-info" class="text-white bg-info">Info</option>
    <option value="bg-gray-100" class="text-white bg-gray-100">Light</option>
    <option value="bg-gray-700" class="text-white bg-gray-700">Gray</option>
</select>
                </div>  
              </div>
               <div class="col-sm-1">
              <button ng-click="delDulieu(Dulieu)" class="btn btn-danger"><i class="fas fa-minus-circle"></i></button>    
              </div>               
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
          <button type="button" class="btn btn-info" ng-click="UpdateCaidat(Caidat,Dulieus)" ng-show="Caidat.CRUD !=0">Cập Nhật</button>
          <button type="button" class="btn btn-primary" ng-click="CreateCaidat(Caidat,Dulieus)" ng-show="Caidat.CRUD ==0">Tạo Mới</button>
        </div>
      </div>
    </div>
  </div>
        
<div class="modal fade" id="XoaCaidat">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Xóa Cài Đặt</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Bạn Có Muốn Xóa <span class="bg-danger text-white">{{Caidat.Title}}</span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" ng-click="DeleteCaidat()">Đồng Ý</button>
      </div>
    </div>
  </div>
</div>        
        
        
        </div>
</div>
