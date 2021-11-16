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
HTMLHelper::_( 'script', 'https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js', array( 'version' => 'auto' ), array( 'defer' => 'true' ) );
HTMLHelper::_( 'script', 'components/com_hrms/js/main.js', array( 'version' => 'auto' ), array( 'defer' => 'true' ) );
$User = Factory::getUser();
?>
<div ng-app="Site" ng-controller="Site" ng-init="ReadListNhanVien()">
  <div class="row py-4">
    <div class="btn-toolbar mb-2 mb-md-0 col-sm-3"> 
      <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#modal-addnhansu" ng-click="nhansu={}"> <i class="fas fa-plus"></i> Tạo User </button>     
    <div class="modal fade" id="modal-addnhansu"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                  <div class="modal-header">
                    <div class="container">
                      <div class="row">
                        <div class="col-6">
                          <h2 class="h6 modal-title">{{nhansu.name||"Thêm Mới Nhân Sự"}}</h2>
                        </div>
                        <div class="col-6">
                          <div class="text-end" ng-init="ediths==false">
                            <button ng-show="!ediths" class="btn btn-info" ng-click="ediths=!ediths">Sửa Hồ Sơ</button>
                            <button ng-show="ediths" class="btn text-white btn-success" ng-click="ediths=!ediths">Lưu</button>
                            <button ng-show="ediths" class="btn text-white btn-warning" ng-click="ediths=!ediths">Hủy</button>
                            <button class="btn btn-danger" data-bs-dismiss="modal">Đóng</button></button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-body">
    <div class="mb-2">Thông Tin Nhân Viên:</div>
                      
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="input-group mb-3"> <span class="input-group-text">Mã Nhân Viên</span>
                          <input class="form-control" type="text" ng-model="nhansu.MaNV" placeholder="VD: NV1_123">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="input-group mb-3"> <span class="input-group-text">Họ Tên</span>
                          <input class="form-control" type="text" ng-model="nhansu.name" placeholder="VD: Nguyễn Văn A">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="input-group mb-3"> <span class="input-group-text">Giới Tính</span>
                          <input class="form-control" type="text" ng-model="nhansu.Gioitinh" placeholder="{{lnv.Gioitinh}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="input-group mb-3"> <span class="input-group-text">Ngày Sinh</span>
                          <input class="form-control" type="text" ng-model="nhansu.Ngaysinh" placeholder="{{lnv.Gioitinh}}">
                        </div>
                      </div>
                      <div class="col-sm-8">
                        <div class="input-group mb-3"> <span class="input-group-text">Địa Chỉ</span>
                          <input class="form-control" type="text" ng-model="nhansu.Diachi" placeholder="{{lnv.Gioitinh}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="input-group mb-3"> <span class="input-group-text">SĐT</span>
                          <input class="form-control" type="text" ng-model="nhansu.SDT" placeholder="{{lnv.Gioitinh}}">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="input-group mb-3"> <span class="input-group-text">Email</span>
                          <input class="form-control" type="text" ng-model="nhansu.email" placeholder="{{lnv.Gioitinh}}">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="input-group mb-3"> <span class="input-group-text">Quốc Tịch</span>
                          <input class="form-control" type="text" ng-model="nhansu.Quoctich" placeholder="{{lnv.Gioitinh}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="input-group mb-3"> <span class="input-group-text">Trình Độ</span>
                          <input class="form-control" type="text" ng-model="nhansu.Trinhdo" placeholder="{{lnv.Gioitinh}}">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="input-group mb-3"> <span class="input-group-text">Trường Tốt Nghiệp</span>
                          <input class="form-control" type="text" ng-model="nhansu.TruongTN" placeholder="{{lnv.Gioitinh}}">
                        </div>
                      </div>
                    </div>             
    <div class="mb-2">Thông Tin Công Ty: </div> 
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="input-group mb-3"> <span class="input-group-text">Chức Danh</span>
                          <input class="form-control" type="text" ng-model="nhansu.Chucdanh" placeholder="{{lnv.Gioitinh}}">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="input-group mb-3"> <span class="input-group-text">Phòng Ban</span>
                          <input class="form-control" type="text" ng-model="nhansu.Phongban" placeholder="{{lnv.Gioitinh}}">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="input-group mb-3"> <span class="input-group-text">Mã Số Thuế</span>
                          <input class="form-control" type="text" ng-model="nhansu.MST" placeholder="{{lnv.Gioitinh}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-4">
                        <div class="input-group mb-3"> <span class="input-group-text">Số BHXH</span>
                          <input class="form-control" type="text" ng-model="nhansu.SoBHXH" placeholder="{{lnv.Gioitinh}}">
                        </div>
                      </div>
                     <div class="col-sm-4">
                        <div class="input-group mb-3"> <span class="input-group-text">Tình Trạng Làm Việc</span>
                          <input class="form-control" type="text" ng-model="nhansu.TTLV" placeholder="{{lnv.Gioitinh}}">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="input-group mb-3"> <span class="input-group-text">Tình Trạng Hồ Sơ</span>
                          <input class="form-control" type="text" ng-model="nhansu.TTHS" placeholder="{{lnv.Gioitinh}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="input-group mb-3"> <span class="input-group-text">Số KCB</span>
                          <input class="form-control" type="text" ng-model="nhansu.SoKCB" placeholder="{{lnv.Gioitinh}}">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="input-group mb-3"> <span class="input-group-text">Nơi KCB</span>
                          <input class="form-control" type="text" ng-model="nhansu.NoiKCB" placeholder="{{lnv.Gioitinh}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="input-group mb-3"> <span class="input-group-text">Ngày Vào</span>
                          <input class="form-control" type="text" ng-model="nhansu.Datein" placeholder="{{lnv.Gioitinh}}">
                        </div>
                      </div>   
                      <div class="col-sm-4">
                        <div class="input-group mb-3"> <span class="input-group-text">Ngày Nghỉ</span>
                          <input class="form-control" type="text" ng-model="nhansu.Dateout" placeholder="{{lnv.Gioitinh}}">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="input-group mb-3"> <span class="input-group-text">Thâm Niên</span>
                          <input class="form-control" type="text" ng-model="nhansu.Thamnien" disabled placeholder="{{lnv.Gioitinh}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="input-group mb-3"> <span class="input-group-text">Nguyên Nhân Nghỉ</span>
                          <textarea class="form-control" ng-model="nhansu.LydoNghi" placeholder="{{lnv.MaNV}}"></textarea>
                        </div>
                      </div>
                    </div>        
                  </div>
                </div>
              </div>
            </div>    
        
      <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#modal-uploadnhansu"><i class="fas fa-upload"></i> </button>
<div class="modal fade" id="modal-uploadnhansu"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="modal-uploadnhansu" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="h6 modal-title">Import Nhân Sự</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                 <div class="d-flex">
       <div class="mx-3"> <input type="file" name="file" class="form-control" onchange="angular.element(this).scope().loadFile(this.files)" /></div>
                <button type="button" class="btn btn-sm btn-outline-primary" ng-click="handleFile()">Bắt Đầu</button>
             </div> 
            </div>
        </div>
    </div>
</div>
        
        
      <button class="btn btn-primary me-2"><i class="fas fa-download"></i> </button>
      </div>
  </div>
    
  <div class="card card-body shadow border-0 table-wrapper table-responsive">
    <table class="table user-table table-hover align-items-center">
      <thead>
        <tr>
          <th class="border-bottom">#</th>
          <th class="border-bottom">
              <input class="form-control" placeholder="Họ Tên" ng-model="timkiem.name">
          </th>
          <th class="border-bottom ">
              Ngày Sinh
<!--
              <input type="date" class="form-control" placeholder="Ngày Sinh" 
                     ng-model="timkiem.Ngaysinh "required>
-->
          </th>
          <th class="border-bottom">  
              <select class="form-select w-auto pe-5"<p></p>" ng-model="timkiem.Gioitinh">
                <option  selected value="">Giới Tính</option>
                <option value="0">Nam</option>
                <option value="1">Nữ</option>
              </select>
            </th>
          <th class="border-bottom">
              <input class="form-control "  placeholder="Số Điện Thoại" ng-model="timkiem.SDT">    
            </th>
          <th class="border-bottom">
              <input class="form-control" placeholder="Địa Chỉ" ng-model="timkiem.Diachi">
          </th>
          <th class="border-bottom">
              <input class="form-control" type="date"  placeholder="Ngày Vào Làm" ng-model="timkiem.datein">
          </th>
        </tr>
      </thead>
      <tbody>
        <tr ng-repeat="lnv in RListNV | limitTo:limit:from | filter:timkiem" data-bs-toggle="modal" data-bs-target="#modal-addnhansu" ng-click="editnv(lnv)">
          <td> {{$index+1}}</td>
          <td>
              <a href="#" class="d-flex align-items-center"> <img ng-show="lnv.hinhanh!=''" ng-src="{{lnv.hinhanh}}" class="avatar rounded-circle me-3"/>
                <svg ng-show="lnv.hinhanh==''" class="avatar rounded-circle me-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path>
                </svg>
                <div class="d-block"> <span class="fw-bold">{{lnv.name}}</span>
                  <div class="small text-gray">{{lnv.email}}</div>
                </div>
            </a>
          </td>
          <td><span class="fw-normal">{{lnv.Ngaysinh|date:'dd/MM/yyyy'}}</span></td>
          <td><span class="fw-normal d-flex align-items-center"> {{lnv.Gioitinh|Gioitinh:Gioitinh}} </span></td>
          <td><span class="fw-normal">{{lnv.SDT}}</span></td>
          <td><span class="fw-normal">{{lnv.Diachi}}</span></td>
          <td><span class="fw-normal">{{lnv.Datein}}</span></td>   
        </tr>
      </tbody>
    </table>
  </div>
</div>
