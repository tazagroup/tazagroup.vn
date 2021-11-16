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
$id = $User->get('id');
?>
<div ng-init="Oninitdauviec('',<?php echo $id; ?>);OninitKehoach()">
  <div class="col-12 d-flex align-items-center justify-content-center">
    <div class="bg-white shadow border-0 rounded border-light p-3 w-100">
    <div class="nav-wrapper position-relative">
    <ul class="nav nav-pills nav-fill flex-column flex-md-row">
        <li class="nav-item me-sm-2">
            <a class="nav-link mb-3 mb-md-0 d-flex align-items-center justify-content-center active" data-bs-toggle="pill" data-bs-target="#dauviec-2">
              <i class="fas fa-calendar-alt mx-2"></i>
              Lịch Họp Cá Nhân
            </a>
        </li>
        <li class="nav-item me-sm-2">
            <a class="nav-link mb-3 mb-md-0 d-flex align-items-center justify-content-center" data-bs-toggle="pill" data-bs-target="#dauviec-1">
              <i class="fas fa-clipboard-list mx-2"></i>
              Đầu Việc
            </a>
        </li>
        <li class="nav-item me-sm-2">
            <a class="nav-link mb-3 mb-md-0 d-flex align-items-center justify-content-center" data-bs-toggle="pill" data-bs-target="#dauviec-3">
              <i class="fas fa-project-diagram mx-2"></i>
              Kế Hoạch
            </a>
        </li>
    </ul>

<div class="tab-content">
  <div class="tab-pane fade" id="dauviec-1" role="tabpanel">
      <div class="row py-4">
        <div class="col">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Taoviec"> Tạo Việc </button>     
          <div class="modal fade" id="Taoviec" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"> {{Dauviec.Title}} Việc</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row p-3">
                    <div class="mb-3">
                      <div class="input-group"> 
                        <span class="input-group-text">Công Ty</span>
         <select chosen class="form-control text-danger" ng-model="Dauviec.idCty" ng-options="s.id as s.Thuoctinh for s in Congty">
                 <option value="" selected>Vui lòng chọn</option>
        </select>
                      </div>
                    </div>
                    <div class="mb-3">
                      <div class="input-group"> <span class="input-group-text">Mục Tiêu </span>
                        <input type="text" class="form-control" placeholder="Mục tiêu" ng-model="Dauviec.Tieude">
                      </div>
                    </div>
                    <div class="mb-3">
                      <div class="input-group"> 
                          <span class="input-group-text">Tính Chất</span>
                               <select chosen class="form-control text-danger" ng-model="Dauviec.Uutien" ng-options="s1.id as s1.Thuoctinh for s1 in Uutien">
                 <option value="" selected>Vui lòng chọn</option>
        </select>
                      </div>
                    </div>
                    <div class="mb-3">
                      <div class="input-group"> <span class="input-group-text">Deadline</span>
                                  <input type="text" data-min-date=today ng-model="Dauviec.Deadline" class="form-control text-danger" min="{{minDate}}" id="NgayKT" placeholder="Chọn Deadline" data-input>        
<!--                        <input type="date" class="form-control" ng-model="Dauviec.Deadline">-->
                      </div>
                    </div> 
<!--
                      <div class="mb-3">
                          Nội dung
                      <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Dauviec.Noidung" class="form-control text-danger"></textarea>    
                    </div>                    
-->
                    <div class="mb-3" ng-init="ReadListNhanVien()">
                      <div class="input-group"> 
                          <span class="input-group-text">Người Nhận Việc</span>             
   <select chosen multiple class="w-100" ng-model="Dauviec.idNhan" ng-options="s3.id as s3.name for s3 in RListNV">
        </select>               
                      </div>
                    </div>   
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                  <button type="button" ng-show="Dauviec.CRUD!=1" class="btn btn-primary" ng-click="CreateDauviec(Dauviec,<?php echo $id; ?>)"> {{Dauviec.Title}}</button>
                  <button type="button" ng-show="Dauviec.CRUD==1" class="btn btn-primary" ng-click="UpdateDauviec(Dauviec,<?php echo $id; ?>)">{{Dauviec.Title}}</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
 <div class="row">
        <div class="table-responsive">
          <table class="table table-centered table-nowrap mb-0 rounded text-center table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Mã số</th>
                    <th>CTY</th>
                    <th>Ngày Tạo</th>
                    <th>Deadline</th>
                    <th>Nội Dung</th>
                    <th>Tính Chất</th>
                    <th>Tình Trạng</th>
                    <th>Người Giao</th>
                    <th>Người Nhận</th>
                    <th>Ghi Chú</th>
                </tr>
            </thead>
            <tbody>
              <tr ng-repeat="dv in RDauviec | filter:timkiem |orderBy:'-id'">
                <td>{{$index+1}}</td>
                <td>{{dv.MaViec}}</td>
                <td>{{dv.idCty|Ftitle:Congty}}</td>
                <td>{{dv.created | date:'yy-MM-dd HH:mm:ss'}}</td>
                <td>{{dv.Deadline | date:'dd/MM/yy'}}</td>
                <td>{{dv.Tieude}}</td>
                <td>
                    <div class="btn-group">
  
     <span class="{{dv.Uutien|FMaunen:Uutien}} {{dv.Uutien|FMauchu:Uutien}} p-1 rounded" data-bs-toggle="dropdown" data-bs-auto-close="outside">{{dv.Uutien|Ftitle:Uutien}}</span>                      
  <ul class="dropdown-menu">
    <li ng-repeat="s1 in Uutien" ng-click="UpdateUTViec(dv.id,s1.id)"><div class="dropdown-item"><span class="{{s1.id|FMaunen:Uutien}} {{s1.id|FMauchu:Uutien}} p-1 rounded">{{s1.Thuoctinh}}</span></div></li>
  </ul>
</div>
                  </td>
                <td>
                    <div class="btn-group">
   <span class="{{dv.Trangthai|FMaunen:TTCongviec}} {{dv.Trangthai|FMauchu:TTCongviec}} p-1 rounded" data-bs-toggle="dropdown" data-bs-auto-close="outside">{{dv.Trangthai|Ftitle:TTCongviec}}</span>
  <ul class="dropdown-menu">
    <li><div class="dropdown-item text-success" ng-click="UpdateTTViec(dv,1)"><i class="fas fa-check"></i> Hoàn Thành</div></li>
    <li><div class="dropdown-item text-danger" ng-click="UpdateTTViec(dv,4)"><i class="fas fa-times"></i> Hủy</div></li>
  </ul>
</div>
                  </td>
                <td>
                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="{{dv.Vitri|Ftitle:Vitri}} - {{dv.Phongban|Ftitle:Bophan}}">{{dv.Nguoigiao}}</div></td>
                <td>{{dv.Nguoinhan}}</td>
                <td>
               <div class="dropdown position-static">
                                <div class="border-primary rounded-1 mh-2 p-2" data-bs-toggle="dropdown" ng-bind-html="dv.Ghichu" style="
    display: -webkit-box;
    max-height: 3.2rem;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: normal;
    -webkit-line-clamp: 3;
    line-height: 1.6rem;
"></div>
                                <ul class="dropdown-menu w-75 p-3">
                                  <li><div class="text-center p-2">Nhập Ghi Chú </div>
                                    <textarea ui-tinymce="tinymceOptions" ng-model="dv.Ghichu" class="form-control text-danger"></textarea>
                                      <button class="btn btn-success text-white mt-3" ng-click="UpdateGhichu(dv.id,dv.Ghichu)"> Lưu </button>
                                  </li>
                                </ul>
                              </div>     
                  </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>   
    
    
    </div>
  <div class="tab-pane fade show active" id="dauviec-2" role="tabpanel">
    <div class="row py-4">
        <div id="calendar1"></div>
      </div>
    </div>
  <div class="tab-pane fade" id="dauviec-3" role="tabpanel">

              <div class="nav nav-pills nav-fill flex-column flex-md-row mt-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link me-sm-2 active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Ngày</button>
                <button class="nav-link me-sm-2" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Tuần</button>
                <button class="nav-link me-sm-2" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Tháng</button>
                <button class="nav-link me-sm-2" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-bienbanhop" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Biên Bản Họp</button>   
              </div>
              <div class="tab-content col" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    
      <div class="row py-3">
          
          
          
          
        <div class="table-responsive-xl">
          <table class="table table-centered table-nowrap mb-0 rounded text-center table-bordered">
            <thead>
              <th>
                <td colspan="5" scope="col">Kế Hoạch Ngày: 10/4/2021</td>
              </th>         
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nội Dung</th>
                <th scope="col">Mục Tiêu</th>
                <th scope="col">Thực Hiện</th>
                <th scope="col">Ghi Chú</th>
              </tr>
            </thead>
            <tbody>          
                <tr ng-repeat="kh in RKehoach">
                <td ng-click="editKehoach(kh)">{{$index+1}}</td>
                <td><div ng-bind-html="kh.Noidung"></div></td>
                <td><div ng-bind-html="kh.Muctieu"></div></td>
                <td><div ng-bind-html="kh.Thuchien"></div></td>
                <td><div ng-bind-html="kh.Ghichu"></div></td>
              </tr>  
                <tr ng-repeat="i in inputs">
                   <td valign="middle" ng-click="delinput(i)"><i class="fas fa-minus-circle text-danger"></i></td>
                            <td><div class="dropdown position-static">
                                <div class="border-primary border-dotted rounded-1 mh-2 p-2" data-bs-toggle="dropdown" ng-bind-html="Kehoachngay.Noidung"></div>
                                <ul class="dropdown-menu w-75 p-3">
                                  <li><div class="text-center p-2">Nhập Nội Dung</div>
                                    <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Kehoachngay.Noidung" class="form-control text-danger"></textarea>
                                  </li>
                                </ul>
                              </div></td>
                            <td>
                       <div class="dropdown position-static">
                                <div class="border-primary border-dotted rounded-1 mh-2" data-bs-toggle="dropdown" ng-bind-html="Kehoachngay.Muctieu"></div>
                                <ul class="dropdown-menu w-75 p-3">
                                  <li><div class="text-center p-2">Nhập Mục Tiêu</div>
                                    <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Kehoachngay.Muctieu" class="form-control text-danger"></textarea>
                                  </li>
                                </ul>
                              </div>         
                                </td>
                            <td>
                            <div class="dropdown position-static">
                                <div class="border-primary border-dotted rounded-1 mh-2" data-bs-toggle="dropdown" ng-bind-html="Kehoachngay.Thuchien"></div>
                                <ul class="dropdown-menu w-75 p-3">
                                  <li><div class="text-center p-2">Nhập Thực Hiện</div>
                                    <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Kehoachngay.Thuchien" class="form-control text-danger"></textarea>
                                  </li>
                                </ul>
                              </div>    
                                </td>
                            <td>
                            <div class="dropdown position-static">
                                <div class="border-primary border-dotted rounded-1 mh-2" data-bs-toggle="dropdown" ng-bind-html="Kehoachngay.Ghichu"></div>
                                <ul class="dropdown-menu w-75 p-3">
                                  <li><div class="text-center p-2">Nhập Ghi Chú</div>
                                    <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Kehoachngay.Ghichu" class="form-control text-danger"></textarea>
                                  </li>
                                </ul>
                              </div>    
                                </td>
                          </tr>       
   <tr>
              <td colspan="5" class="px-3"><div class="d-flex">
                  <div class="me-auto" ng-click="addinput()"><span class="btn btn-primary"><i class="fas fa-plus-circle"></i> Thêm Mới</span>  </div>
                  <div class="ms-auto" ng-show="inputs.length!=0"> <span class="btn btn-danger" ng-click="resetinput()"><i class="fas fa-sync-alt"></i> Hủy</span> <span class="btn btn-info" ng-click="CreateKehoachngay(Kehoachngay)"><i class="fas fa-save"></i> Lưu</span> </div>
                </div></td>
            </tr>             
            </tbody>
          </table>
        </div>         
      </div>              
                  </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
              </div>
      
      </div>
</div>       
        
        
</div>    
    </div>
  </div>
    
    
  <div class="modal fade" tabindex="-1" id="modal-lichhop" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">{{Lichhop.Title}} lịch họp</h5>{{idChutri}}
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ng-click="Oninitlichhop(Lichhop.NgayBD,<?php echo $id; ?>)"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <div class="row">
              <div class="col-sm-4">
                <div class="input-group"> <span class="input-group-text">Loại Hình Họp</span>
                  <select chosen  ng-disabled="isdisabled" class="form-control text-danger" ng-model="Lichhop.idLoaihinh" ng-options="s.id as s.Thuoctinh for s in Loaihinhhop">
                    
                  </select>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="input-group"> <span class="input-group-text"> Tiêu Đề </span>
                  <input type="text"  ng-disabled="isdisabled" class="form-control text-danger" ng-model="Lichhop.Tieude">
                </div>
              </div>
               <div class="col-sm-4">
                <div class="input-group"> <span class="input-group-text"> Công Ty </span>
                  <select chosen class="form-control text-danger" ng-disabled="isdisabled" ng-model="Lichhop.idCty" ng-options="s7.id as s7.Thuoctinh for s7 in Congty">
                 <option value="" selected>Vui lòng chọn</option>
        </select>
                </div>
              </div>               
            </div>
          </div>
          <div class="mb-3">
            <div class="row">
              <div class="col-sm-6">
                <div class="input-group"> <span class="input-group-text"> Bắt đầu </span>
<!--                  <input type="datetime-local" min="{{minDate}}"  ng-disabled="isdisabled" class="form-control text-danger" ng-model="Lichhop.NgayBD">-->
                    <input type="text" ng-disabled="isdisabled" data-min-date=today ng-model="Lichhop.NgayBD" class="form-control text-danger" id="NgayBD" placeholder="Chọn Ngày Bắt Đầu" data-input>   
                    
                </div>
              </div>
              <div class="col-sm-6">
                <div class="input-group"> <span class="input-group-text"> Kết Thúc </span>
               <input type="text" ng-disabled="isdisabled" data-min-date=today ng-model="Lichhop.NgayKT" class="form-control text-danger" min="{{minDate}}" id="NgayKT" placeholder="Chọn Ngày Kết Thúc" data-input>     
<!--                  <input type="datetime-local"  ng-disabled="isdisabled" class="form-control text-danger" ng-model="Lichhop.NgayKT">-->
                </div>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="row">
              <div class="col-sm-6">
                <div class="input-group"> <span class="input-group-text"> Chủ trì </span>
                  <select chosen  ng-disabled="isdisabled" class="form-control text-danger" ng-model="Lichhop.idChutri" ng-options="s.id as s.name for s in RListNV">
                    <option value="" selected>Vui lòng chọn</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="input-group"> <span class="input-group-text"> Hỗ trợ </span>
                  <select chosen multiple  ng-disabled="isdisabled" class="form-control text-danger" ng-model="Lichhop.idThamgia" ng-options="u.id as u.name for u in RListNV">
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="row">
              <div class="col-sm-4">
                <div class="input-group"> <span class="input-group-text"> Thời gian triển khai </span>
<!--                  <input type="datetime-local" min="minDate"  ng-disabled="isdisabled" class="form-control text-danger" ng-model="Lichhop.Trienkhai">-->
                 <input type="text" ng-disabled="isdisabled" data-min-date=today ng-model="Lichhop.Trienkhai" class="form-control text-danger" min="{{minDate}}" id="NgayTK" placeholder="Chọn Ngày Triển Khai" data-input>  
                </div>
              </div>
              <div class="col-sm-4">
                <div class="input-group"> <span class="input-group-text"> Thời gian review </span>
<!--                  <input type="datetime-local" min="minDate"  ng-disabled="isdisabled" class="form-control text-danger" ng-model="Lichhop.Review">-->
             <input type="text" ng-disabled="isdisabled" data-min-date=today ng-model="Lichhop.Review" class="form-control text-danger" min="{{minDate}}" id="NgayRV" placeholder="Chọn Ngày Review" data-input>        
                </div>
              </div>
              <div class="col-sm-4">
                <div class="input-group"> <span class="input-group-text"> Thời gian hoàn thành </span>
               <input type="text" ng-disabled="isdisabled" data-min-date=today ng-model="Lichhop.Hoanthanh" class="form-control text-danger" min="{{minDate}}" id="NgayHT" placeholder="Chọn Ngày Hoàn Thành" data-input>     
                    
<!--                    <input type="datetime-local" min="{{minDate}}"  ng-disabled="isdisabled" class="form-control text-danger" ng-model="Lichhop.Hoanthanh">-->
                </div>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="row">
              <div class="col-sm-6">
                  <label>Nội Dung</label>
                 <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Lichhop.Noidung" class="form-control text-danger"></textarea> 
<!--
                <div class="input-group"> <span class="input-group-text"> Nội dung </span>
                    
                  <textarea  ng-disabled="isdisabled" class="form-control text-danger" placeholder="Nội dung" ng-model="Lichhop.Noidung"></textarea>
                </div>
-->
              </div>
              <div class="col-sm-6">
                   <label>Hướng Triển Khai</label>
                 <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Lichhop.HuongTK" class="form-control text-danger"></textarea> 
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="row">
              <div class="col-sm-6">
                    Kết quả thực hiện
                 <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Lichhop.KQTH" class="form-control text-danger"></textarea>   
              </div>
              <div class="col-sm-6">
                  Kết quả mong đợi
           <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Lichhop.KQMD" class="form-control text-danger"></textarea> 
                </div>
              </div>
            </div>
          <div class="mb-3">
            <div class="row">
              <div class="col-sm-6">
                <label>Biện Pháp Điều Chỉnh</label>
                 <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Lichhop.BPDC" class="form-control text-danger"></textarea> 
              </div>
              <div class="col-sm-6 m-auto">
                <div class="input-group"> <span class="input-group-text"> Ngân sách </span>
                  <input  ng-disabled="isdisabled" class="form-control text-danger" type="number" ng-model="Lichhop.Ngansach">
                </div>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="row">
              <div class="col-sm-6">
            Các điều kiện khác      
         <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Lichhop.DKkhac" class="form-control text-danger"></textarea> 
              </div>
              <div class="col-sm-6">
                Nguyên nhân thành công/thất bại  
                     <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Lichhop.Nguyennhan" class="form-control text-danger"></textarea>       
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" ng-click="Oninitlichhop(Lichhop.NgayBD,<?php echo $id; ?>)">Đóng</button>
          <button type="button" class="btn btn-primary" ng-click="CreateLichhop(Lichhop)" ng-show="Lichhop.CRUD!=1">Tạo Mới</button>
          <button type="button" class="btn btn-primary" ng-click="UpdateLichhop(Lichhop)" ng-show="Lichhop.CRUD==1">Cập Nhật</button>
        </div>
      </div>
    </div>
  </div>  
    
</div>
