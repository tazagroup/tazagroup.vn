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
    <div class="col-sm-5">
      <div class="row">
        <div class="col-6">
          <div class="input-group me-2 me-lg-3 fmxw-300"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
            <select class="form-select" ng-model="fieldsearch">
              <option selected value="">Tìm Theo</option>
              <option value="1">Họ Tên</option>
              <option value="2">Ngày Sinh</option>
            </select>
          </div>
        </div>
        <div class="col-6">
          <input ng-show="fieldsearch==1" type="text" class="form-control" ng-model="timkiem.name" placeholder="Tìm Nhân Viên" />
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="row">
        <div class="col-6">
          <div class="input-group"> <span class="input-group-text"> Trang </span>
              
            <select class="form-select" ng-model="chontrang" ng-change="Pagechose(chontrang)">
              <option selected ng-value="{{pag.id}}" ng-repeat="pag in Pagination">{{pag.value}}/{{sotrang}}</option>
            </select>
          </div>
        </div>
        <div class="col-6">
          <div class="input-group"> <span class="input-group-text"> Hiển Thị </span>
            <select class="form-select" ng-model="item" ng-change="Phantrang(RListNV,item)">
              <option value="10" selected>10</option>
              <option value="20">20</option>
              <option value="30">30</option>
              <option value="40">40</option>
              <option value="9999">All</option>
            </select>
          </div>
        </div>
      </div>
    </div>
  </div>
    
  <div class="card card-body shadow border-0 table-wrapper table-responsive">
    <table class="table user-table table-hover align-items-center">
      <thead>
        <tr>
          <th class="border-bottom">#</th>
          <th class="border-bottom">Họ Tên</th>
          <th class="border-bottom">Ngày Sinh</th>
          <th class="border-bottom">Giới Tính</th>
          <th class="border-bottom">Số Điện Thoại</th>
          <th class="border-bottom">Địa Chỉ</th>
          <th class="border-bottom">Ngày Vào Làm</th>
          <th class="border-bottom">Action</th>
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
            </a></td>
          <td><span class="fw-normal">{{lnv.Ngaysinh|date:'dd/MM/yyyy'}}</span></td>
          <td><span class="fw-normal d-flex align-items-center"> {{lnv.Gioitinh|Gioitinh:Gioitinh}} </span></td>
          <td><span class="fw-normal">{{lnv.SDT}}</span></td>
          <td><span class="fw-normal">{{lnv.Diachi}}</span></td>
          <td><span class="fw-normal">{{lnv.Datein}}</span></td>
          <td><div class="btn-group">
              <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path>
              </svg>
              <span class="visually-hidden">Toggle Dropdown</span> </button>
              <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1"> <a class="dropdown-item d-flex align-items-center" href="#">
                <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path
                                            fill-rule="evenodd"
                                            d="M10 1.944A11.954 11.954 0 012.166 5C2.056 5.649 2 6.319 2 7c0 5.225 3.34 9.67 8 11.317C14.66 16.67 18 12.225 18 7c0-.682-.057-1.35-.166-2.001A11.954 11.954 0 0110 1.944zM11 14a1 1 0 11-2 0 1 1 0 012 0zm0-7a1 1 0 10-2 0v3a1 1 0 102 0V7z"
                                            clip-rule="evenodd"
                                        ></path>
                </svg>
                Reset Pass </a> <a class="dropdown-item d-flex align-items-center" href="#">
                <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                  <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                </svg>
                View Details </a> <a class="dropdown-item d-flex align-items-center" href="#">
                <svg class="dropdown-icon text-danger me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path d="M11 6a3 3 0 11-6 0 3 3 0 016 0zM14 17a6 6 0 00-12 0h12zM13 8a1 1 0 100 2h4a1 1 0 100-2h-4z"></path>
                </svg>
                Suspend </a> </div>
            </div>
            <svg class="icon icon-xs text-danger ms-1" title="" data-bs-toggle="tooltip" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-bs-original-title="Delete" aria-label="Delete">
              <path
                                fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                clip-rule="evenodd"
                            ></path>
            </svg></td>
        </tr>
      </tbody>
    </table>
    <!--
        <div class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
            <nav aria-label="Page navigation example">
                <ul class="pagination mb-0">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
            <div class="fw-normal small mt-4 mt-lg-0">Showing <b>5</b> out of <b>25</b> entries</div>
        </div>
--> 
  </div>
</div>
