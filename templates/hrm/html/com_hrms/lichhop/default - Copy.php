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
<div ng-init="Oninitlichhop()">
  <div class="col-sm-12 d-flex align-items-center justify-content-center">
    <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100">
      <div id="calendar"></div>
    </div>
  </div>
  <div class="modal fade" tabindex="-1" id="modal-lichhop" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">{{Lichhop.Title}} lịch họp</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <div class="row">
              <div class="col-sm-6">
                <div class="input-group"> <span class="input-group-text">Loại Hình Họp</span>
                  <select chosen  ng-disabled="isdisabled" class="form-control text-danger" ng-model="Lichhop.idLoaihinh" ng-options="s.id as s.Thuoctinh for s in Loaihinhhop">
                    
                  </select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="input-group"> <span class="input-group-text"> Tiêu Đề Cuộc Họp </span>
                  <input type="text"  ng-disabled="isdisabled" class="form-control text-danger" ng-model="Lichhop.Tieude">
                </div>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="row">
              <div class="col-sm-6">
                <div class="input-group"> <span class="input-group-text"> Bắt đầu </span>
                  <input type="datetime-local" min="{{minDate}}"  ng-disabled="isdisabled" class="form-control text-danger" ng-model="Lichhop.NgayBD">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="input-group"> <span class="input-group-text"> Kết Thúc </span>
                  <input type="datetime-local"  ng-disabled="isdisabled" class="form-control text-danger" ng-model="Lichhop.NgayKT">
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
                  <input type="datetime-local" min="minDate"  ng-disabled="isdisabled" class="form-control text-danger" ng-model="Lichhop.Trienkhai">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="input-group"> <span class="input-group-text"> Thời gian review </span>
                  <input type="datetime-local" min="minDate"  ng-disabled="isdisabled" class="form-control text-danger" ng-model="Lichhop.Review">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="input-group"> <span class="input-group-text"> Thời gian hoàn thành </span>
                  <input type="datetime-local" min="{{minDate}}"  ng-disabled="isdisabled" class="form-control text-danger" ng-model="Lichhop.Hoanthanh">
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
                <div class="input-group"> <span class="input-group-text"> Kết quả thực hiện </span>
                  <textarea  ng-disabled="isdisabled" class="form-control text-danger" placeholder="Kết quả thực hiện" ng-model="Lichhop.KQTH"></textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="input-group"> <span class="input-group-text"> Kết quả mong đợi </span>
                  <textarea  ng-disabled="isdisabled" class="form-control text-danger" placeholder="Kết quả mong đợi" ng-model="Lichhop.KQMD"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="row">
              <div class="col-sm-6">
                <label>Hướng Triển Khai</label>
                 <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Lichhop.BPDC" class="form-control text-danger"></textarea> 
              </div>
              <div class="col-sm-6">
                <div class="input-group"> <span class="input-group-text"> Ngân sách </span>
                  <input  ng-disabled="isdisabled" class="form-control text-danger" type="number" ng-model="Lichhop.Ngansach">
                </div>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="row">
              <div class="col-sm-6">
                <div class="input-group"> <span class="input-group-text"> Các điều kiện khác </span>
                  <textarea  ng-disabled="isdisabled" class="form-control text-danger" placeholder="Các điều kiện khác (nếu có)" ng-model="Lichhop.DKkhac"></textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="input-group"> <span class="input-group-text"> Nguyên nhân thành công/thất bại </span>
                  <textarea  ng-disabled="isdisabled" class="form-control text-danger" placeholder="5 Why" ng-model="Lichhop.Nguyennhan"></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
          <button type="button" class="btn btn-primary" ng-click="CreateLichhop(Lichhop)" ng-show="Lichhop.CRUD!=1">Tạo Mới</button>
          <button type="button" class="btn btn-primary" ng-click="UpdateLichhop(Lichhop)" ng-show="Lichhop.CRUD==1">Cập Nhật</button>
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
</div>
