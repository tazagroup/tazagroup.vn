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
use Joomla\ CMS\ Router\ Route;
?>
<div ng-init="OninitLotrinh(<?php echo $this->LoaiTM; ?>)" class="col-12 d-flex align-items-center justify-content-center">
  <div class="bg-white shadow border-0 rounded border-light p-3 w-100">
    <h3 class="text-center"><?php echo $this->params->get('page_title'); ?></h3>
    
    <!--
<select id="states" class="w-100" name="states[]" multiple="multiple" ng-model="xyz">
        <option value="AK">Alaska</option>
    <option value="{{z.id}}" ng-repeat="z in Khoi">{{z.Thuoctinh}}</option>
</select>
--> 
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Taothumuc"><i class="fas fa-folder-plus"></i> Tạo Thư Mục </button>-->
    <div class="row mt-3">
      <div class="table-responsive-xl">
        <table class="table table-centered table-nowrap mb-0 rounded text-center table-bordered">
          <thead class="thead-light">
            <tr>
              <th scope="col"> <div class="dropdown position-static">
                <div class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  <div class="d-flex justify-content-center"> <i class="fas fa-sliders-h"></i></div>
                </div>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li class="p-2 small">
                  <div class="form-check form-switch"> Cty
                    <input class="form-check-input" type="checkbox" ng-model="tieude.cty" checked>
                  </div>
                </li>
                <li class="p-2 small">
                  <div class="form-check form-switch"> Thời Gian
                    <input class="form-check-input" type="checkbox" ng-model="tieude.thoigian" checked>
                  </div>
                </li>
                <li class="p-2 small">
                  <div class="form-check form-switch"> Người Chủ Trì
                    <input class="form-check-input" type="checkbox"  ng-model="tieude.nguoichutri" checked>
                  </div>
                </li>
                <li class="p-2 small">
                  <div class="form-check form-switch"> Bộ Phận
                    <input class="form-check-input" type="checkbox" ng-model="tieude.bophan" checked>
                  </div>
                </li>
              </th>
              <th scope="col" ng-show="tieude.khoi==true"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex justify-content-center"> Cty <i class="fas fa-ellipsis-v ms-auto"></i></div>
                  </div>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li class="p-2">
                      <input class="form-control" placeholder="Tìm Kiếm" ng-model="timkiem.cty"/>
                    </li>
                    <li><a class="dropdown-item" href="#">A - Z <i class="fas fa-sort-amount-up-alt"></i></a></li>
                    <li><a class="dropdown-item" href="#">Z- A <i class="fas fa-sort-amount-down"></i></a></li>
                  </ul>
                </div>
              </th>
              <th scope="col" ng-show="tieude.phong==true"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex"> Thời Gian <i class="fas fa-ellipsis-v ms-auto"></i></div>
                  </div>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li class="p-2">
                      <input class="form-control" placeholder="Tìm Kiếm" />
                    </li>
                    <li><a class="dropdown-item" href="#">A - Z <i class="fas fa-sort-amount-up-alt"></i></a></li>
                    <li><a class="dropdown-item" href="#">Z- A <i class="fas fa-sort-amount-down"></i></a></li>
                  </ul>
                </div>
              </th>
              <th scope="col" ng-show="tieude.nguoichutri==true"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex"> Người Chủ Trì <i class="fas fa-ellipsis-v ms-auto"></i></div>
                  </div>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li class="p-2">
                      <input class="form-control" placeholder="Tìm Kiếm" />
                    </li>
                    <li><a class="dropdown-item" href="#">A - Z <i class="fas fa-sort-amount-up-alt"></i></a></li>
                    <li><a class="dropdown-item" href="#">Z- A <i class="fas fa-sort-amount-down"></i></a></li>
                  </ul>
                </div>
              </th>
              <th scope="col" ng-show="tieude.bophan==true"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex"> Bộ Phận <i class="fas fa-ellipsis-v ms-auto"></i></div>
                  </div>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li class="p-2">
                      <input class="form-control" placeholder="Tìm Kiếm" />
                    </li>
                    <li><a class="dropdown-item" href="#">A - Z <i class="fas fa-sort-amount-up-alt"></i></a></li>
                    <li><a class="dropdown-item" href="#">Z- A <i class="fas fa-sort-amount-down"></i></a></li>
                  </ul>
                </div>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="t in RLotrinhs | filter:timkiem">
              <td><div class="dropdown">
                  <div class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex justify-content-center">{{$index+1}}</div>
                  </div>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li class="p-2" data-bs-toggle="modal" data-bs-target="#Suahang" ng-click="editLotrinh(t)"> <i class="fas fa-edit text-info"></i> Sửa </li>
                    <li class="p-2" data-bs-toggle="modal" data-bs-target="#XoaHang"> <i class="fas fa-trash-alt text-danger"></i> Xóa </li>
                  </ul>
                </div></td>
              <td ng-show="tieude.cty==true">{{t.Cty }}</td>
              <td ng-show="tieude.thoigian==true">{{t.Thoigian}}</td>
              <td ng-show="tieude.nguoichutri==true">{{t.Nguoichutri}}</td>
              <td ng-show="tieude.bophan==true">{{t.Bophan }}</td>
            </tr>
            <tr ng-repeat="i in inputs">
              <td valign="middle" ng-click="delinput(i)"><i class="fas fa-minus-circle text-danger"></i></td>
              <td ng-show="tieude.cty==true"><input ng-model="i.Cty" class="form-control" placeholder="Cty"/></td>
              <td ng-show="tieude.thoigian==true"><input ng-model="i.Thoigian" class="form-control" placeholder="Thời Gian"/></td>
              <td ng-show="tieude.nguoichutri==true"><input ng-model="i.Nguoichutri" class="form-control" placeholder="Người Chủ Trì"/></td>
              <td ng-show="tieude.bophan==true"><input ng-model="i.Bophan" class="form-control" placeholder="Bộ Phận"/></td>
            </tr>
            <tr>
              <td colspan="8" class="px-3"><div class="d-flex">
                  <div class="me-auto" ng-click="addinput()" ><span class="btn btn-primary"><i class="fas fa-plus-circle"></i> Thêm Mới</span></div>
                  <div class="ms-auto" ng-show="inputs.length!=0"> <span class="btn btn-danger" ng-click="resetinput()"><i class="fas fa-sync-alt" ></i> Hủy</span> <span class="btn btn-info" ng-click="CreateLotrinh(inputs)"><i class="fas fa-save"></i> Lưu</span> </div>
                </div></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="modal fade" id="Suahang" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"> Chỉnh Sửa</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row p-3">
              <div class="mb-3">
                <div class="input-group"> <span class="input-group-text">Khối</span>
                  <select chosen class="w-100" ng-model="Lotrinh.idKhoi" ng-options="s.id as s.Thuoctinh for s in Khoi">
                    <option value="" selected>Vui lòng chọn</option>
                  </select>
                </div>
              </div>
              <div class="mb-3">
                <div class="input-group"> <span class="input-group-text">Phòng</span>
                  <select chosen class="w-100" ng-model="Lotrinh.idPhong" ng-options="s1.id as s1.Thuoctinh for s1 in Phong">
                    <option value="" selected>Vui lòng chọn</option>
                  </select>
                </div>
              </div>
              <div class="mb-3">
                <div class="input-group"> <span class="input-group-text">Vị Trí</span>
                  <select chosen class="w-100" ng-model="Lotrinh.idVitri" ng-options="s2.id as s2.Thuoctinh for s2 in Vitri">
                    <option value="" selected>Vui lòng chọn</option>
                  </select>
                </div>
              </div>
              <div class="mb-3">
                <div class="input-group"> <span class="input-group-text">{{Lotrinh.Tenfile}}</span>
                  <input ng-model="Lotrinh.Tenfile" type="file" class="form-control" placeholder="File"/>
                </div>
              </div>
              <div class="mb-3">
                <div class="input-group"> <span class="input-group-text">Ngày Ban hành</span>
                  <input ng-model="Lotrinh.Ngaybanhanh" type="datetime-local" class="form-control" placeholder="Ngày Ban Hành"/>
                </div>
              </div>
              <div class="mb-3">
                <div class="input-group"> <span class="input-group-text">Tình Trạng</span>
                  <input ng-model="Lotrinh.Tinhtrang" class="form-control" placeholder="Tình Trạng"/>
                </div>
              </div>
              <div class="mb-3">
                <div class="input-group"> <span class="input-group-text">Ghi Chú</span>
                  <input ng-model="Lotrinh.Ghichu" class="form-control" placeholder="Ghi Chú"/>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            <button type="button" class="btn btn-primary" ng-click="">Cập Nhật</button>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="modal fade" id="Taofile" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"> Thêm Tài Liệu</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row p-3">
                <form id="UpTailieu" method="post" action="<?php echo Route::_('index.php?option=com_hrms&task=Tailieu.uploadFile');?>" enctype="multipart/form-data">
                  <div class="input-group">
                    <input type="hidden" class="address" name="address">
                    <input type="file" name="files" class="form-control" required onchange="angular.element(this).scope().loadFile(this.files)">
                    <?php echo HTMLHelper::_('form.token'); ?> </div>
                  </span>
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
              <button type="button" class="btn btn-primary" ng-click="CreateTailieu()"> Tạo Mới</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
