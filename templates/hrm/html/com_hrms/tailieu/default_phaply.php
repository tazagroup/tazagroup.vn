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
                      <div class="form-check form-switch"> Hình Thức
                        <input class="form-check-input" type="checkbox" ng-model="tieude.hinhthuc" checked>
                      </div>
                    </li>
                    <li class="p-2 small">
                      <div class="form-check form-switch"> Phân Loại
                        <input class="form-check-input" type="checkbox"  ng-model="tieude.phanloai" checked>
                      </div>
                    </li>
                    <li class="p-2 small">
                      <div class="form-check form-switch"> Chi Nhánh
                        <input class="form-check-input" type="checkbox" ng-model="tieude.chinhanh" checked>
                      </div>
                    </li>
                    <li class="p-2 small">
                      <div class="form-check form-switch"> Sản Phẩm
                        <input class="form-check-input" type="checkbox" ng-model="tieude.sanpham" checked>
                      </div>
                    </li>
                    <li class="p-2 small">
                      <div class="form-check form-switch"> file
                        <input class="form-check-input" type="checkbox" ng-model="tieude.file" checked>
                      </div>
                    </li>
                    <li class="p-2 small">
                      <div class="form-check form-switch"> Ngườu Lưu  Trữ
                        <input class="form-check-input" type="checkbox" ng-model="tieude.nguoiluutru" checked>
                      </div>
                    </li>
                    <li class="p-2 small">
                      <div class="form-check form-switch"> Nơi Lưu Trữ
                        <input class="form-check-input" type="checkbox" ng-model="tieude.noiluutru" checked>
                      </div>
                    </li>
                    <li class="p-2 small">
                      <div class="form-check form-switch"> Ghi Chú
                        <input class="form-check-input" type="checkbox" ng-model="tieude.ghichu" checked>
                      </div>
                    </li>
                  </ul>
                </div>
              </th>
              <th scope="col" ng-show="tieude.cty==true"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex justify-content-center"> Cty <i class="fas fa-ellipsis-v ms-auto"></i></div>
                  </div>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li class="p-2">
                      <input class="form-control" placeholder="Tìm Kiếm" ng-model="timkiem.khoi"/>
                    </li>
                    <li><a class="dropdown-item" href="#">A - Z <i class="fas fa-sort-amount-up-alt"></i></a></li>
                    <li><a class="dropdown-item" href="#">Z- A <i class="fas fa-sort-amount-down"></i></a></li>
                  </ul>
                </div>
              </th>
              <th scope="col" ng-show="tieude.hinhthuc==true"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex"> Hình Thức <i class="fas fa-ellipsis-v ms-auto"></i></div>
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
              <th scope="col" ng-show="tieude.phanloai==true"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex">Phân Loại <i class="fas fa-ellipsis-v ms-auto"></i></div>
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
              <th scope="col" ng-show="tieude.chinhanh==true"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex"> Chi Nhánh <i class="fas fa-ellipsis-v ms-auto"></i></div>
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
              <th scope="col" ng-show="tieude.sanpham==true"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex">Sản Phẩm <i class="fas fa-ellipsis-v ms-auto"></i></div>
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
              <th scope="col" ng-show="tieude.file==true"> <div class="dropdown position-static">
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
              <th scope="col" ng-show="tieude.nguoiluutru==true"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex"> Người Lưu Trữ <i class="fas fa-ellipsis-v ms-auto"></i></div>
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
              <th scope="col" ng-show="tieude.noiluutru==true"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex"> Nơi Lưu Trữ <i class="fas fa-ellipsis-v ms-auto"></i></div>
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
              <th scope="col" ng-show="tieude.ghichu==true"> <div class="dropdown position-static">
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
              <td><div class="dropdown position-static">
                  <div class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex justify-content-center">{{$index+1}}</div>
                  </div>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li class="p-2" data-bs-toggle="modal" data-bs-target="#Suahang" ng-click="editLotrinh(t)"> <i class="fas fa-edit text-info"></i> Sửa </li>
                    <li class="p-2" data-bs-toggle="modal" data-bs-target="#XoaHang"> <i class="fas fa-trash-alt text-danger"></i> Xóa </li>
                  </ul>
                </div></td>
              <td ng-show="tieude.cty==true">{{t.Cty }}</td>
              <td ng-show="tieude.hinhthuc==true">{{t.Hinhthuc }}</td>
              <td ng-show="tieude.phanloai==true">{{t.Phanloai}}</td>
              <td ng-show="tieude.chinhanh==true">{{t.Chinhanh }}</td>
              <td ng-show="tieude.sanpham==true">{{t.Sanpham}}</td>
              <td ng-show="tieude.file==true">{{t.Tenfile}}</td>
              <td ng-show="tieude.nguoiluutru==true">{{t.Nguoiluutru }}</td>
              <td ng-show="tieude.noiluutru==true">{{t.Noiluutru }}</td>
              <td ng-show="tieude.ghichu==true">{{t.Ghichu}}</td>
            </tr>
            <tr ng-repeat="i in inputs">
              <td valign="middle" ng-click="delinput(i)"><i class="fas fa-minus-circle text-danger"></i></td>
              <td ng-show="tieude.cty==true"><input ng-model="input.Cty"  class="form-control" placeholder="Cty"/></td>
              <td ng-show="tieude.hinhthuc==true"><input ng-model="input.Hinhthuc"  class="form-control" placeholder="Hình Thức"/></td>
              <td ng-show="tieude.phanloai==true"><input ng-model="i.Phanloai" class="form-control" placeholder="Phân Loại"/></td>
              <td ng-show="tieude.chinhanh==true"><input ng-model="i.Chinhanh" class="form-control" placeholder="Chi Nhánh"/></td>
              <td ng-show="tieude.sanpham==true"><input ng-model="i.Sanpham" class="form-control" placeholder="Sản Phẩm"/></td>
              <td ng-show="tieude.file==true"><input ng-model="i.Tenfile" type="file" class="form-control" placeholder="File"/></td>
              <td ng-show="tieude.nguoiluutru==true"><input ng-model="i.nguoiluutru" class="form-control" placeholder="Người Lưu Trữ" /></td>
              <td ng-show="tieude.noiluutru==true"><input ng-model="i.Noiluutru" class="form-control" placeholder="Nơi Lưu Trữ"/></td>
              <td ng-show="tieude.ghichu==true"><input ng-model="i.Ghichu" class="form-control" placeholder="Ghi Chú"/></td>
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
