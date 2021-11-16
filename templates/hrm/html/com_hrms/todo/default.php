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
$this->id = $User->get('id');
?>
<div ng-init="Oninitdauviec('','<?php echo $this->id; ?>');OninitKehoach()">
  <div class="col-12 d-flex align-items-center justify-content-center">
    <div class="bg-white shadow border-0 rounded border-light p-3 w-100">   
    <div class="nav-wrapper position-relative">
    <ul class="nav nav-pills nav-fill flex-column flex-md-row">
        <li class="nav-item me-sm-2">
            <a class="nav-link mb-3 mb-md-0 d-flex align-items-center justify-content-center" ng-class="{'active': StateDV==2}" data-bs-toggle="pill" data-bs-target="#dauviec-2" ng-click="SetCookies(2)">
              <i class="fas fa-calendar-alt mx-2"></i>
              Lịch Họp Cá Nhân
            </a>
        </li>
        <li class="nav-item me-sm-2">
            <a class="nav-link mb-3 mb-md-0 d-flex align-items-center justify-content-center" ng-class="{'active': StateDV==1}" data-bs-toggle="pill" data-bs-target="#dauviec-1" ng-click="SetCookies(1)">
              <i class="fas fa-clipboard-list mx-2"></i>
              Đầu Việc
            </a>
        </li>
        <li class="nav-item me-sm-2">
            <a class="nav-link mb-3 mb-md-0 d-flex align-items-center justify-content-center" ng-class="{'active': StateDV==3}" data-bs-toggle="pill" data-bs-target="#dauviec-3" ng-click="SetCookies(3)">
              <i class="fas fa-project-diagram mx-2"></i>
              Kế Hoạch
            </a>
        </li>
    </ul>

<div class="tab-content">
  <div class="tab-pane fade"  ng-class="{'active show': StateDV==1}" id="dauviec-1" role="tabpanel">
      <div class="row py-4">
        <div class="col d-flex">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Taoviec"> Tạo Việc </button>  
          <div class="px-2 my-auto dropdown position-static">
              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                <div class="d-flex align-items-center"><i class="fas fa-sliders-h me-1"></i><span>Ẩn/Hiện</span></i></div>
              </div>
                <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="form-check form-switch"> Mã Số
                        <input class="form-check-input" type="checkbox" ng-model="tieude.td1" checked>
                      </div>
                    </li>
                    <li class="p-2">
                      <div class="form-check form-switch"> CTY
                        <input class="form-check-input" type="checkbox" ng-model="tieude.td2" checked>
                      </div>
                    </li>
                    <li class="p-2">
                      <div class="form-check form-switch"> Ngày Tạo
                        <input class="form-check-input" type="checkbox"  ng-model="tieude.td3" checked>
                      </div>
                    </li>
                       <li class="p-2">
                      <div class="form-check form-switch"> Review
                        <input class="form-check-input" type="checkbox"  ng-model="tieude.td11" checked>
                      </div>
                    </li>                
                    <li class="p-2">
                      <div class="form-check form-switch"> Deadline
                        <input class="form-check-input" type="checkbox" ng-model="tieude.td4" checked>
                      </div>
                    </li>
                    <li class="p-2">
                      <div class="form-check form-switch"> Nội dung
                        <input class="form-check-input" type="checkbox" ng-model="tieude.td5" checked>
                      </div>
                    </li>
                    <li class="p-2">
                      <div class="form-check form-switch"> Tính Chất
                        <input class="form-check-input" type="checkbox" ng-model="tieude.td6" checked>
                      </div>
                    </li>
                    <li class="p-2">
                      <div class="form-check form-switch"> Tình trạng
                        <input class="form-check-input" type="checkbox" ng-model="tieude.td7" checked>
                      </div>
                    </li>
                <li class="p-2">
                      <div class="form-check form-switch"> Người Giao
                        <input class="form-check-input" type="checkbox" ng-model="tieude.td8" checked>
                      </div>
                    </li> 
                      <li class="p-2">
                      <div class="form-check form-switch"> Người Nhận
                        <input class="form-check-input" type="checkbox" ng-model="tieude.td9" checked>
                      </div>
                    </li>
                   <li class="p-2">
                      <div class="form-check form-switch"> Ghi Chú
                        <input class="form-check-input" type="checkbox" ng-model="tieude.td10" checked>
                      </div>
                    </li> 
                   <li class="p-2">
                      <div class="btn btn-primary" ng-click="LuuAnhien(tieude)">Lưu</div>
                    </li>                     
                  </ul>
            </div>  
          <div class="mx-2 my-auto" ng-click="Lammoi()"><i class="fas fa-sync-alt"></i> <span>Làm Mới</span></div>
          <div ng-init="ReadGviec1()"></div>

<!--
          <div class="mx-2 my-auto">
              <div class="dropdown position-static">
  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
   <i class="fas fa-filter me-1"></i> <span>Bộ Lọc</span>
  </div>
  <ul class="dropdown-menu">
    <li><div class="dropdown-item">Menu item</div></li>
    <li><div class="dropdown-item">Menu item</div></li>
    <li><div class="dropdown-item">Menu item</div></li>
  </ul>
</div>

          </div>
-->
        </div>  
      </div>
    
    
<!-- Đầu Việc -->  
   <?php echo $this->loadTemplate('dauviec'); ?> 
<!--  Đầu Việc --> 
    </div>
  <div class="tab-pane fade" ng-class="{'active show': StateDV==2}" id="dauviec-2" role="tabpanel">
      <ul class="list-group color-lichhop position-fixed" style="top:40%;right: 0;z-index:9" ng-init="anhien=true">
<button type="button" class="btn-close ms-auto color-lichhop-close" ng-click="anhien=!anhien"></button>
  <li ng-show="anhien==true" class="list-group-item bg-danger text-white">Cuộc Họp</li>
  <li ng-show="anhien==true" class="list-group-item bg-info text-white">Triển Khai</li>
  <li ng-show="anhien==true" class="list-group-item bg-warning text-white">Review</li>
  <li ng-show="anhien==true" class="list-group-item bg-success text-white">Hoàn Thành</li>
</ul>
    <div class="row py-4">
        
        <div id="calendar1"></div>
      </div>
    </div>
  <div class="tab-pane fade" ng-class="{'active show': StateDV==3}" id="dauviec-3" role="tabpanel">
    <?php echo $this->loadTemplate('kehoach'); ?> 
      
          </div>
</div>       
        
        
</div>    
    </div>
  </div>
    
    
    
  
<!--Modal-->
          <div class="modal fade" id="Taoviec" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title"> {{Dauviec.Title}} Việc</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ng-click="Oninitdauviec('',<?php echo $this->id; ?>)"></button>
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
                        Nội Dung
                  <textarea ui-tinymce="tinymceOptions" ng-model="Dauviec.Tieude" class="form-control text-danger"></textarea>         
                    </div>
<div class="mb-3 row">                    <div class="mb-3 col">
                      <div class="input-group"> 
                          <span class="input-group-text">Tính Chất</span>
                               <select chosen class="form-control text-danger" ng-model="Dauviec.Uutien" ng-options="s1.id as s1.Thuoctinh for s1 in Uutien">
                 <option value="" selected>Vui lòng chọn</option>
        </select>
                      </div>
                    </div>
                    <div class="mb-3 col">
                      <div class="input-group"> <span class="input-group-text">Deadline</span>
                                  <input type="text" data-min-date="minDate" ng-model="Dauviec.Deadline" id="DLDV" class="form-control text-danger" placeholder="Chọn Deadline" data-input>        
                      </div>
                    </div>
                        <div class="mb-3 col">
                      <div class="input-group"> <span class="input-group-text">Review</span>
                                  <input type="text" data-min-date="minDate" ng-model="Dauviec.Review" id="RVDV" class="form-control text-danger" placeholder="Chọn Review" data-input>   
                        <span class="input-group-text">                        
                            <button class="btn btn-sm btn-danger" ng-click="Checkreview()">Bỏ</button>
                      </span> 
                      </div>
                            
                          
                    </div>
                      
                      </div> 
                    <div class="mb-3" ng-init="ReadListNhanVien()">
                      <div class="input-group"> 
                          <span class="input-group-text">Người Nhận Việc</span>             
   <select chosen multiple class="w-100" ng-model="Dauviec.idThamgia" ng-options="s3.id as s3.name for s3 in RListNV">
        </select>               
                      </div>
                    </div> 
   <div class="mb-3">
                        Ghi Chú
                  <textarea ui-tinymce="tinymceOptions" ng-model="Dauviec.Ghichu" class="form-control text-danger"></textarea>         
                    </div>                   
                      
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" ng-click="Oninitdauviec('',<?php echo $this->id; ?>)">Đóng</button>
                  <button type="button" ng-show="Dauviec.CRUD!=1" class="btn btn-primary" ng-click="CreateGroupViec(Dauviec,<?php echo $this->id; ?>)"> {{Dauviec.Title}}</button>
                  <button type="button" ng-show="Dauviec.CRUD==1" class="btn btn-primary" ng-click="UpdateDauviec(Dauviec,<?php echo $this->id; ?>)">{{Dauviec.Title}}</button>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="XoaHang" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title"> Xóa Việc</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Bạn có Chắc Chắn Xóa <span class="text-danger" ng-bind-html="Dauviec.Tieude"></span>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                  <button type="button" class="btn btn-primary" ng-click="XoaDauviec(Dauviec)"> Xóa Việc</button>
                </div>
              </div>
            </div>
          </div>
          
<!--Modal End          -->
          
  <div class="modal fade" tabindex="-1" id="modal-lichhop" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">{{Lichhop.Title}} lịch họp</h5> 
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ng-click="Oninitdauviec(Lichhop.NgayBD,<?php echo $this->id; ?>)"></button>
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
              <div class="col-sm-4">
                <div class="input-group"> <span class="input-group-text"> Bắt đầu </span>
<!--                  <input type="datetime-local" min="{{minDate}}"  ng-disabled="isdisabled" class="form-control text-danger" ng-model="Lichhop.NgayBD">-->
                    <input type="text" ng-disabled="isdisabled" data-min-date=today ng-model="Lichhop.NgayBD" class="form-control text-danger" id="NgayBD" placeholder="Chọn Ngày Bắt Đầu" data-input>   
                    
                </div>
              </div>
              <div class="col-sm-4">
                <div class="input-group"> <span class="input-group-text"> Kết Thúc </span>
               <input type="text" ng-disabled="isdisabled" ng-model="Lichhop.NgayKT" class="form-control text-danger" min="{{minDate}}" id="NgayKT" placeholder="Chọn Ngày Kết Thúc" data-input>     
<!--                  <input type="datetime-local"  ng-disabled="isdisabled" class="form-control text-danger" ng-model="Lichhop.NgayKT">-->
                </div>
              </div>
               <div class="col-sm-4">
             
                   <div class="form-check form-switch">
                          <span> Chỉ Hiện Cuộc Họp </span>
                        <input class="form-check-input ng-pristine ng-valid ng-not-empty ng-touched" type="checkbox" ng-model="Lichhop.TShow" checked="">
                      </div> 
                    
              </div>               
            </div>
          </div>
          <div class="mb-3">
            <div class="row">
              <div class="col-sm-6">
                <div class="input-group" ng-init="Lichhop.idChutri = <?php echo $this->id ;?>"> <span class="input-group-text"> Chủ trì </span>
                    <input disabled class="form-control" placeholder="{{Lichhop.idChutri |Fname:RListNV}}" />
<!--
                  <select chosen  ng-disabled="isdisabled" class="form-control text-danger" ng-model="Lichhop.idChutri" ng-options="s.id as s.name for s in RListNV">
                    <option value="" selected>Vui lòng chọn</option>
                  </select>
-->
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
                <div class="input-group"> <span class="input-group-text"> Ngân Sách </span>
                  <input  ng-disabled="isdisabled" class="form-control text-danger" type="number" ng-model="Lichhop.Ngansach">
                    <span class="input-group-text bg-danger text-white"> {{Lichhop.Ngansach || '0'  | currency:"":0 }} đ</span>
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
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" ng-click="Oninitdauviec(Lichhop.NgayBD,<?php echo $this->id; ?>)">Đóng</button>
          <button type="button" class="btn btn-primary" ng-click="CreateLichhop(Lichhop)" ng-show="Lichhop.CRUD!=1">Tạo Mới</button>
          <button type="button" class="btn btn-primary" ng-click="UpdateLichhop(Lichhop)" ng-show="Lichhop.CRUD==1">Cập Nhật</button>
          <button type="button" class="btn btn-danger" ng-click="XoaLichhop(Lichhop)">Hủy Lịch</button>
        </div>
      </div>
    </div>
  </div>        
          

</div>
