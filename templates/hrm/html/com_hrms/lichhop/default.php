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
$user = Factory::getUser();
?>
<div ng-init="Oninitlichhop('','<?php echo $user->get('id'); ?>')">
  <div class="col-sm-12 d-flex align-items-center justify-content-center">
    <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100">
      <div id="calendar"></div>
    </div>
  </div>
  <div class="modal fade" tabindex="-1" id="modal-lichhop" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">{{Lichhop.Title}} {{Lichhop.id}} lịch họp</h5> 
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ng-click="Oninitlichhop(Lichhop.NgayBD,<?php echo $user->get('id'); ?>)"></button>
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
               <input type="text" ng-disabled="isdisabled" data-min-date=today ng-model="Lichhop.NgayKT" class="form-control text-danger" min="{{minDate}}" id="NgayKT" placeholder="Chọn Ngày Kết Thúc" data-input>     
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
                <div class="input-group"> <span class="input-group-text"> Chủ trì </span>
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
                <div class="input-group"> <span class="input-group-text"> Ngân sách </span>
                  <input ng-disabled="isdisabled" class="form-control text-danger" type="number" ng-model="Lichhop.Ngansach">
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
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" ng-click="Oninitlichhop(Lichhop.NgayBD,<?php echo $user->get('id'); ?>)">Đóng</button>
          <button type="button" class="btn btn-primary" ng-click="CreateLichhop(Lichhop)" ng-show="Lichhop.CRUD!=1">Tạo Mới</button>
          <button type="button" class="btn btn-primary" ng-click="UpdateLichhop(Lichhop)" ng-show="Lichhop.CRUD==1">Cập Nhật</button>
         <button type="button" class="btn btn-danger" ng-click="XoaLichhop(Lichhop)">Hủy Lịch</button>   
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade bg-primary" id="BPDC" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-body"> <?php echo $this->form->renderField('bpdc'); ?> </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" ng-click="Updatebpdc()" data-bs-dismiss="modal">Lưu thay đổi</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade bg-primary" id="HuongTK" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Hướng Triển Khai</h5>
        </div>
        <div class="modal-body"> <?php echo $this->form->renderField('huongtk'); ?> </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" ng-click="UpdateHuongTK()" data-bs-dismiss="modal">Lưu thay đổi</button>
        </div>
      </div>
    </div>
  </div>
 <ul class="list-group color-lichhop position-fixed" style="top:40%;right: 0;z-index:9" ng-init="anhien=true">
<button type="button" class="btn-close ms-auto color-lichhop-close" ng-click="anhien=!anhien"></button>
  <li ng-show="anhien==true" class="list-group-item bg-danger text-white">Cuộc Họp</li>
  <li ng-show="anhien==true" class="list-group-item bg-info text-white">Triển Khai</li>
  <li ng-show="anhien==true" class="list-group-item bg-warning text-white">Review</li>
  <li ng-show="anhien==true" class="list-group-item bg-success text-white">Hoàn Thành</li>
</ul>
</div>
