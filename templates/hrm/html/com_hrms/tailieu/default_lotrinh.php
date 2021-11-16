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
    <div class="row ">
      <div class="p-3">
        <div class="d-flex bg-gray-100 py-3">
          <div class="px-2 dropdown position-static" >
            <div class="dropdown-toggle" type="button" id="dropdownfilter" data-bs-toggle="dropdown" aria-expanded="false">
              <div class="d-flex align-items-center"> <i class="fas fa-filter me-1"></i><span>Filter</span></i></div>
            </div>
            <ul class="dropdown-menu" aria-labelledby="dropdownfilter">
              <li class="p-2 ">
                <select id="state" class="w-100" name="state">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                </select>
              </li>
            </ul>
          </div>
        <div class="px-2 dropdown position-static" >
            <div class="dropdown-toggle" type="button" id="dropdowngroup" data-bs-toggle="dropdown" aria-expanded="false">
              <div class="d-flex align-items-center"> <i class="fas fa-equals  me-1"></i><span>Group</span></i></div>
            </div>
             <ul  class="dropdown-menu" aria-labelledby="dropdowngroup">
                <li class="p-2 "><i class="far fa-building me-1"></i>Cty</a>
                <li class="p-2 "><i class="fas fa-cube me-1"></i>Khối</a>
                <li class="p-2 "><i class="fab fa-delicious me-1"></i> Bộ Phận</a>
              </div>
          </ul>
          <div class="px-2 dropdown position-static" >
            <div class="dropdown-toggle" type="button" id="dropdownsort" data-bs-toggle="dropdown" aria-expanded="false">
              <div class="d-flex align-items-center"><i class="fas fa-sort-amount-down me-1"></i><span>Sort</span></div>
            </div >
             <ul  class="dropdown-menu " aria-labelledby="dropdownsort">
                <li class="p-2 "><i class="far fa-building me-1"></i>Cty</li>
                <li class="p-2 "><i class="fas fa-cube me-1"></i>Khối</li>
                <li class="p-2 "><i class="fab fa-delicious me-1"></i>Bộ Phận</li>
              </div>
          </ul>
         
            <div class="px-2 dropdown position-static" >
              <div class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="d-flex align-items-center"><i class="fas fa-sliders-h me-1"></i><span>Customize</span></i></div>
              </div>
                <ul class="dropdown-menu">
                    <li class="p-2 small">
                      <div class="form-check form-switch"> Khối
                        <input class="form-check-input" type="checkbox" ng-model="tieude.khoi" checked>
                      </div>
                    </li>
                    <li class="p-2 small">
                      <div class="form-check form-switch"> Phòng
                        <input class="form-check-input" type="checkbox" ng-model="tieude.phong" checked>
                      </div>
                    </li>
                    <li class="p-2 small">
                      <div class="form-check form-switch"> Vị Trí
                        <input class="form-check-input" type="checkbox"  ng-model="tieude.vitri" checked>
                      </div>
                    </li>
                    <li class="p-2 small">
                      <div class="form-check form-switch"> File
                        <input class="form-check-input" type="checkbox" ng-model="tieude.file" checked>
                      </div>
                    </li>
                    <li class="p-2 small">
                      <div class="form-check form-switch"> Ngày Ban hành
                        <input class="form-check-input" type="checkbox" ng-model="tieude.ngay" checked>
                      </div>
                    </li>
                    <li class="p-2 small">
                      <div class="form-check form-switch"> Tình Trạng
                        <input class="form-check-input" type="checkbox" ng-model="tieude.tinhtrang" checked>
                      </div>
                    </li>
                    <li class="p-2 small">
                      <div class="form-check form-switch"> Ghi Chú
                        <input class="form-check-input" type="checkbox" ng-model="tieude.ghichu" checked>
                      </div>
                    </li>
                  </ul>
            </div>
          </div>
      </div>
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
                      <div class="form-check form-switch"> Khối
                        <input class="form-check-input" type="checkbox" ng-model="tieude.khoi" checked>
                      </div>
                    </li>
                    <li class="p-2 small">
                      <div class="form-check form-switch"> Phòng
                        <input class="form-check-input" type="checkbox" ng-model="tieude.phong" checked>
                      </div>
                    </li>
                    <li class="p-2 small">
                      <div class="form-check form-switch"> Vị Trí
                        <input class="form-check-input" type="checkbox"  ng-model="tieude.vitri" checked>
                      </div>
                    </li>
                    <li class="p-2 small">
                      <div class="form-check form-switch"> File
                        <input class="form-check-input" type="checkbox" ng-model="tieude.file" checked>
                      </div>
                    </li>
                    <li class="p-2 small">
                      <div class="form-check form-switch"> Ngày Ban hành
                        <input class="form-check-input" type="checkbox" ng-model="tieude.ngay" checked>
                      </div>
                    </li>
                    <li class="p-2 small">
                      <div class="form-check form-switch"> Tình Trạng
                        <input class="form-check-input" type="checkbox" ng-model="tieude.tinhtrang" checked>
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
              <th scope="col" ng-show="tieude.khoi==true"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex justify-content-center"> Khối <i class="fas fa-ellipsis-v ms-auto"></i></div>
                  </div>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li class="p-2">
                      <input class="form-control" placeholder="Tìm Kiếm" ng-model="timkiem.khoi"/>
                    </li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-sort-amount-up-alt"></i> A - Z </a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-sort-amount-down"></i> Z- A </a></li>
                  </ul>
                </div>
              </th>
              <th scope="col" ng-show="tieude.phong==true"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex"> Phòng <i class="fas fa-ellipsis-v ms-auto"></i></div>
                  </div>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li class="p-2">
                      <input class="form-control" placeholder="Tìm Kiếm" />
                    </li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-sort-amount-up-alt"></i> A - Z </a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-sort-amount-down"></i> Z- A </a></li>
                  </ul>
                </div>
              </th>
              <th scope="col" ng-show="tieude.vitri==true"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex"> Vị Trí <i class="fas fa-ellipsis-v ms-auto"></i></div>
                  </div>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li class="p-2">
                      <input class="form-control" placeholder="Tìm Kiếm" />
                    </li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-sort-amount-up-alt"></i> A - Z </a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-sort-amount-down"></i> Z- A </a></li>
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
                    <li><a class="dropdown-item" href="#"><i class="fas fa-sort-amount-up-alt"></i> A - Z </a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-sort-amount-down"></i> Z- A </a></li>
                  </ul>
                </div>
              </th>
              <th scope="col" ng-show="tieude.ngay==true"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex"> Ngày Ban Hành <i class="fas fa-ellipsis-v ms-auto"></i></div>
                  </div>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li class="p-2">
                      <input class="form-control" placeholder="Tìm Kiếm" />
                    </li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-sort-amount-up-alt"></i> A - Z </a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-sort-amount-down"></i> Z- A </a></li>
                  </ul>
                </div>
              </th>
              <th scope="col" ng-show="tieude.tinhtrang==true"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex"> Tình Trạng <i class="fas fa-ellipsis-v ms-auto"></i></div>
                  </div>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li class="p-2">
                      <input class="form-control" placeholder="Tìm Kiếm" />
                    </li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-sort-amount-up-alt"></i> A - Z </a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-sort-amount-down"></i> Z- A </a></li>
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
                    <li><a class="dropdown-item" href="#"><i class="fas fa-sort-amount-up-alt"></i> A - Z </a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-sort-amount-down"></i> Z- A </a></li>
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
              <td ng-show="tieude.khoi==true">{{t.idKhoi | Ftitle:Khoi}}</td>
              <td ng-show="tieude.phong==true">{{t.idPhong | Ftitle:Phong}}</td>
              <td ng-show="tieude.bophan==true">{{t.idBophan}}</td>
              <td ng-show="tieude.vitri==true">{{t.idVitri | Ftitle:Vitri}}</td>
              <td ng-show="tieude.file==true">{{t.Tenfile}}</td>
              <td ng-show="tieude.ngay==true">{{t.Ngaybanhanh | date:'dd/MM/yyyy'}}</td>
              <td ng-show="tieude.tinhtrang==true">{{t.Tinhtrang | Ftitle:TTLotrinh}}</td>
              <td ng-show="tieude.ghichu==true">{{t.Ghichu}}</td>
            </tr>
            <tr ng-repeat="i in inputs">
              <td valign="middle" ng-click="delinput(i)"><i class="fas fa-minus-circle text-danger"></i></td>
              <td ng-show="tieude.khoi==true"><select chosen class="w-100" ng-model="i.idKhoi" ng-options="s.id as s.Thuoctinh for s in Khoi">
                  <option value="" selected>Vui lòng chọn</option>
                </select></td>
              <td ng-show="tieude.phong==true"><select chosen class="w-100" ng-model="i.idPhong" ng-options="s1.id as s1.Thuoctinh for s1 in Phong">
                  <option value="" selected>Vui lòng chọn</option>
                </select></td>
              <td ng-show="tieude.bophan==true"><input ng-model="i.idBophan" class="form-control" placeholder="Bộ Phận"/></td>
              <td ng-show="tieude.vitri==true"><select chosen class="w-100" ng-model="i.idVitri" ng-options="s2.id as s2.Thuoctinh for s2 in Vitri">
                  <option value="" selected>Vui lòng chọn</option>
                </select></td>
              <td ng-show="tieude.file==true"><input ng-model="i.Tenfile" type="file" class="form-control" placeholder="File"/></td>
              <td ng-show="tieude.ngay==true"><input ng-model="i.Ngaybanhanh" type="datetime-local" class="form-control" placeholder="Ngày Ban Hành" format-value="yyyy-MM-ddTHH:mm"/></td>
              <td ng-show="tieude.tinhtrang==true"><select chosen class="w-100" ng-model="i.Tinhtrang" ng-options="s3.id as s3.Thuoctinh for s3 in TTLotrinh">
                  <option value="" selected>Vui lòng chọn</option>
                </select></td>
              <td ng-show="tieude.ghichu==true"><input ng-model="i.Ghichu" class="form-control" placeholder="Ghi Chú"/></td>
            </tr>
            <tr>
              <td colspan="8" class="px-3"><div class="d-flex">
                  <div class="me-auto" ng-click="addinput()" ><span class="btn btn-primary"><i class="fas fa-plus-circle"></i> Thêm Mới</span> </div>
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
