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
<div class="bg-white shadow border-0 rounded border-light p-3 w-100">
  <h3 class="text-center"><?php echo $this->params->get('page_title'); ?></h3>
  <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Taothumuc"><i class="fas fa-folder-plus"></i> Tạo Thư Mục </button>-->
  <div class="row mt-3">
    <div class="table-responsive-xl">
      <table class="table table-centered table-nowrap mb-0 rounded text-center table-bordered">
        <thead class="thead-light">
          <tr>
            <th scope="col"> <div class="dropdown  position-static">
                <div class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  <div class="d-flex justify-content-center"> <i class="fas fa-sliders-h"></i></div>
                </div>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li class="p-2 small">
                    <div class="form-check form-switch"> Thời Gian
                      <input class="form-check-input" type="checkbox" ng-model="tieude.thoigian" checked>
                    </div>
                  </li>
                  <li class="p-2 small">
                    <div class="form-check form-switch"> Cty
                      <input class="form-check-input" type="checkbox" ng-model="tieude.cty" checked>
                    </div>
                  </li>
                  <li class="p-2 small">
                    <div class="form-check form-switch"> KHỐI
                      <input class="form-check-input" type="checkbox"  ng-model="tieude.khoi" checked>
                    </div>
                  </li>
                  <li class="p-2 small">
                    <div class="form-check form-switch"> PHÒNG
                      <input class="form-check-input" type="checkbox" ng-model="tieude.phong" checked>
                    </div>
                  </li>
                  <li class="p-2 small">
                    <div class="form-check form-switch"> Bộ Phận
                      <input class="form-check-input" type="checkbox" ng-model="tieude.bophan" checked>
                    </div>
                  </li>
                     <li class="p-2 small">
                    <div class="form-check form-switch"> Vị Trí
                      <input class="form-check-input" type="checkbox" ng-model="tieude.vitri" checked>
                    </div>
                  </li>
                     <li class="p-2 small">
                    <div class="form-check form-switch"> Nhân Viên
                      <input class="form-check-input" type="checkbox" ng-model="tieude.nhanvien" checked>
                    </div>
                  </li>
                     <li class="p-2 small">
                    <div class="form-check form-switch">KPI
                      <input class="form-check-input" type="checkbox" ng-model="tieude.kpi  " checked>
                    </div>
                  </li>
                  <li class="p-2 small">
                    <div class="form-check form-switch"> KẾ HOẠCH
                      <input class="form-check-input" type="checkbox" ng-model="tieude.kehoach" checked>
                    </div>
                  </li>
                  <li class="p-2 small">
                    <div class="form-check form-switch"> THỐNG KÊ
                      <input class="form-check-input" type="checkbox" ng-model="tieude.thongke" checked>
                    </div>
                  </li>
                  <li class="p-2 small">
                    <div class="form-check form-switch"> BÁO CÁO
                      <input class="form-check-input" type="checkbox" ng-model="tieude.baocao" checked>
                    </div>
                  </li>
                     <li class="p-2 small">
                    <div class="form-check form-switch"> File
                      <input class="form-check-input" type="checkbox" ng-model="tieude.file" checked>
                    </div>
                  </li>
                  <li class="p-2 small">
                    <div class="form-check form-switch"> GHI CHÚ
                      <input class="form-check-input" type="checkbox" ng-model="tieude.ghichu" checked>
                    </div>
                  </li>
                </ul>
              </div>
            </th>
            <th scope="col" ng-show="tieude.thoigian==true"> <div class="dropdown  position-static">
                <div class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  <div class="d-flex justify-content-center"> Thời Gian <i class="fas fa-ellipsis-v ms-auto"></i></div>
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
            <th scope="col" ng-show="tieude.cty==true"> <div class="dropdown  position-static">
                <div class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  <div class="d-flex"> Cty <i class="fas fa-ellipsis-v ms-auto"></i></div>
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
            <th scope="col" ng-show="tieude.khoi==true"> <div class="dropdown">
                <div class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  <div class="d-flex"> KHỐI <i class="fas fa-ellipsis-v ms-auto"></i></div>
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
            <th scope="col" ng-show="tieude.phong==true"> <div class="dropdown  position-static">
                <div class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  <div class="d-flex"> PHÒNG <i class="fas fa-ellipsis-v ms-auto"></i></div>
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
                     <th scope="col" ng-show="tieude.bophan==true"> <div class="dropdown  position-static">
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
                     <th scope="col" ng-show="tieude.vitri==true"> <div class="dropdown  position-static">
                <div class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  <div class="d-flex"> Vị Trí <i class="fas fa-ellipsis-v ms-auto"></i></div>
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
                     <th scope="col" ng-show="tieude.nhanvien==true"> <div class="dropdown  position-static">
                <div class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  <div class="d-flex"> Nhân Viên <i class="fas fa-ellipsis-v ms-auto"></i></div>
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
            <th scope="col" ng-show="tieude.kpi==true"> <div class="dropdown  position-static">
                <div class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  <div class="d-flex"> KPI <i class="fas fa-ellipsis-v ms-auto"></i></div>
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
            <th scope="col" ng-show="tieude.kehoach==true"> <div class="dropdown  position-static">
                <div class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  <div class="d-flex"> KẾ HOẠCH <i class="fas fa-ellipsis-v ms-auto"></i></div>
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
            <th scope="col" ng-show="tieude.thongke==true"> <div class="dropdown  position-static">
                <div class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  <div class="d-flex"> THỐNG KÊ <i class="fas fa-ellipsis-v ms-auto"></i></div>
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
            <th scope="col" ng-show="tieude.baocao==true"> <div class="dropdown  position-static">
                <div class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  <div class="d-flex"> BÁO CÁO <i class="fas fa-ellipsis-v ms-auto"></i></div>
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
                     <th scope="col" ng-show="tieude.file==true"> <div class="dropdown  position-static">
                <div class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  <div class="d-flex"> File <i class="fas fa-ellipsis-v ms-auto"></i></div>
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
            <th scope="col" ng-show="tieude.ghichu==true"> <div class="dropdown  position-static">
                <div class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  <div class="d-flex"> Ghi Chú <i class="fas fa-ellipsis-v ms-auto"></i></div>
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
          <tr ng-repeat="t in test">
            <td><div class="dropdown  position-static">
                <div class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  <div class="d-flex justify-content-center">{{$index+1}}</div>
                </div>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li class="p-2"> <i class="fas fa-edit text-info"></i> Sửa </li>
                  <li class="p-2"> <i class="fas fa-trash-alt text-danger"></i> Xóa </li>
                </ul>
              </div></td>
            <td ng-show="tieude.thoigian==true">{{t.Thoigian}}</td>
            <td ng-show="tieude.cty==true">{{t.Cty}}</td>
            <td ng-show="tieude.khoi==true">{{t.Khoi}}</td>
            <td ng-show="tieude.phong==true">{{t.Phong}}</td>
              <td ng-show="tieude.bophan==true">{{t.Bophan}}</td>
              <td ng-show="tieude.vitri==true">{{t.Vitri}}</td>
              <td ng-show="tieude.nhanvien==true">{{t.Nhanvien}}</td>
            <td ng-show="tieude.kpi==true">{{t.Kpi}}</td>
            <td ng-show="tieude.kehoach==true">{{t.Kehoach}}</td>
            <td ng-show="tieude.thongke==true">{{t.Thongke}}</td>
            <td ng-show="tieude.baocao==true">{{t.Baocao}}</td>
              <td ng-show="tieude.file==true">{{t.File}}</td>
            <td ng-show="tieude.ghichu==true">{{t.Ghichu}}</td>
          </tr>
          <tr ng-repeat="i in inputs">
            <td valign="middle" ng-click="delinput(i)"><i class="fas fa-minus-circle text-danger"></i></td>
            <td ng-show="tieude.thoigian==true"><input ng-model="input.Thoigian"  class="form-control" placeholder="Thời Gian"/></td>
            <td ng-show="tieude.cty==true"><input ng-model="input.Cty"  class="form-control" placeholder="Cty"/></td>
            <td ng-show="tieude.khoi==true"><input ng-model="input.Khoi" class="form-control" placeholder="Khối"/></td>
            <td ng-show="tieude.phong==true"><input ng-model="input.Phong" class="form-control" placeholder="Phòng"/></td>
              <td ng-show="tieude.vitri==true"><input ng-model="input.Vitri" class="form-control" placeholder="Vị Trí"/></td>
              <td ng-show="tieude.bophan==true"><input ng-model="input.Bophan" class="form-control" placeholder="Bộ Phận "/></td>
              <td ng-show="tieude.nhanvien==true"><input ng-model="input.Nhanvien" class="form-control" placeholder="Nhân Viên"/></td>
            <td ng-show="tieude.kpi==true"><input ng-model="input.Kpi"  class="form-control" placeholder="KPI"/></td>
            <td ng-show="tieude.kehoach==true"><input ng-model="input.Kehoach" class="form-control" placeholder="Kế Hoạch"/></td>
            <td ng-show="tieude.thongke==true"><input ng-model="input.Thongke" class="form-control" placeholder="Thống kê"/></td>
            <td ng-show="tieude.baocao==true"><input ng-model="input.Baocao" class="form-control" placeholder="Báo Cáo"/></td>
              <td ng-show="tieude.file==true"><input ng-model="input.File" class="form-control" placeholder="File"/></td>
            <td ng-show="tieude.ghichu==true"><input ng-model="input.Ghichu" class="form-control" placeholder="Ghi Chú"/></td>
          </tr>
          <tr>
            <td colspan="13" class="px-3"><div class="d-flex">
                <div class="me-auto" ng-click="addinput()" ><span class="text-info"><i class="fas fa-plus-circle"></i> Thêm Mới</span></div>
                <div class="ms-auto" ng-show="inputs.length!=0" ng-click="saveinput()"><span class="text-primary"><i class="fas fa-save text-success"></i> Lưu</span></div>
              </div></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="modal fade" id="Taothumuc" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"> {{Thumuc.Title}} Việc</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row p-3">
            <div class="mb-3">
              <div class="input-group"> <span class="input-group-text">Thư Mục </span>
                <input type="text" class="form-control" placeholder="Tiêu Đề" ng-model="Thumuc.Tieude">
              </div>
            </div>
            <div class="mb-3">
              <div class="input-group"> <span class="input-group-text">Thư Mục Cha</span>
                <select class="form-select" ng-model="Thumuc.Parent">
                  <option selected ng-value="0">Chọn Thư Mục Cha</option>
                  <option ng-value={{pr}} ng-repeat="pr in RLthumucs">{{pr.Tieude}}</option>
                </select>
              </div>
            </div>
            <div class="mb-3">
              <div class="input-group"> <span class="input-group-text">Mô Tả</span>
                <textarea class="form-control" ng-model="Thumuc.Mota"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
          <button type="button" ng-show="Thumuc.CRUD!=1" class="btn btn-primary" ng-click="CreateThumuc(Thumuc)"> Tạo Mới</button>
          <button type="button" ng-show="Thumuc.CRUD==1" class="btn btn-primary" ng-click="UpdateThumuc(Dauviec)">Cập Nhật</button>
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
