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
<div class="bg-white shadow border-0 rounded border-light p-3 w-100" ng-init="OninitTungphongban(<?php echo $this->LoaiTM; ?>)">
  <h3 class="text-center"><?php echo $this->params->get('page_title'); ?></h3>
  <div class="row position-relative">
    <div class="overflow-scroll">
      <div class="d-flex">
        <div class="table mt-3 ghichu">
          <table class="table dauviec dauviec-sm table-centered table-nowrap mb-0 rounded text-center table-bordered table-hover">
            <thead class="thead-light">
              <tr>
                <th style="width: 10%;"> <div class="d-flex justify-content-center">
                    <div class="px-2 my-auto dropdown position-static">
                      <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                        <div>
                          <h6><i class="fas fa-sliders-h"></i></h6>
                        </div>
                      </div>
                      <ul class="dropdown-menu">
                        <li class="p-2">
                          <div class="form-check form-switch"> Công Ty
                            <input class="form-check-input" type="checkbox" ng-model="tieude.td1" checked />
                          </div>
                        </li>
                        <li class="p-2">
                          <div class="form-check form-switch"> Khối
                            <input class="form-check-input" type="checkbox" ng-model="tieude.td2" checked />
                          </div>
                        </li>
                        <li class="p-2">
                          <div class="form-check form-switch"> Phòng Ban
                            <input class="form-check-input" type="checkbox" ng-model="tieude.td3" checked />
                          </div>
                        </li>
                        <li class="p-2">
                          <div class="form-check form-switch"> Bộ Phận
                            <input class="form-check-input" type="checkbox" ng-model="tieude.td4" checked />
                          </div>
                        </li>
                        <li class="p-2">
                          <div class="form-check form-switch"> Vị Trí
                            <input class="form-check-input" type="checkbox" ng-model="tieude.td7" checked />
                          </div>
                        </li>
                        <li class="p-2">
                          <div class="form-check form-switch"> Quy Trình
                            <input class="form-check-input" type="checkbox" ng-model="tieude.td8" checked />
                          </div>
                        </li>
                        <li class="p-2">
                          <div class="form-check form-switch"> Quy Định
                            <input class="form-check-input" type="checkbox" ng-model="tieude.td9" checked />
                          </div>
                        </li>
                        <li class="p-2">
                          <div class="form-check form-switch"> Cẩm Nang
                            <input class="form-check-input" type="checkbox" ng-model="tieude.td9" checked />
                          </div>
                        </li>
                        <li class="p-2">
                          <div class="btn btn-primary" ng-click="LuuAnhien(tieude)">Lưu</div>
                        </li>
                      </ul>
                    </div>
                    <div>
                      <h6><i class="fas fa-plus-circle" ng-click="resetTungphongban()" data-bs-toggle="modal" data-bs-target="#CRUDForm"></i></h6>
                    </div>
                  </div>
                </th>
                <th ng-show="tieude.td1" style="width: 10%;"> <div class="dropdown position-static">
                    <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="d-flex justify-content-center flex-column">Công Ty <i class="fas fa-ellipsis-h"></i></div>
                    </div>
                    <ul class="dropdown-menu">
                      <li class="p-2">
                        <div class="mb-3">
                          <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                            <select chosen class="form-control text-danger" ng-model="timkiem.idRoot" ng-options="s.idRoot as s.idRoot|FCustom:'Tenchude':RChude for s in (RABaihoc|unique:'idRoot')">
                            </select>
                            <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('idRoot')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('idRoot')"> <i class="fas fa-sort-down"></i> </span> </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </th>
                <th ng-show="tieude.td2" style="width: 10%;"> <div class="dropdown position-static">
                    <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="d-flex justify-content-center flex-column">Khối <i class="fas fa-ellipsis-h"></i></div>
                    </div>
                    <ul class="dropdown-menu">
                      <li class="p-2">
                        <div class="mb-3">
                          <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                            <input ng-model="timkiem.Tenbaihoc" type="text" class="form-control col-12" placeholder="Tìm Kiếm">
                            <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Tenbaihoc')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Tenbaihoc')"> <i class="fas fa-sort-down"></i> </span> </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </th>
                <th ng-show="tieude.td2" style="width: 10%;"> <div class="dropdown position-static">
                    <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="d-flex justify-content-center flex-column">Phòng Ban <i class="fas fa-ellipsis-h"></i></div>
                    </div>
                    <ul class="dropdown-menu">
                      <li class="p-2">
                        <div class="mb-3">
                          <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                            <select chosen class="form-control text-danger" ng-model="timkiem.ordering" ng-options="s.ordering as 'Đề Thi Số '+s.ordering for s in (RABaihoc|unique:'ordering')">
                            </select>
                            <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('ordering')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('ordering')"> <i class="fas fa-sort-down"></i> </span> </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </th>
                <th ng-show="tieude.td3" style="width: 10%;"> <div class="dropdown position-static">
                    <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="d-flex justify-content-center flex-column">Bộ Phận <i class="fas fa-ellipsis-h"></i></div>
                    </div>
                    <ul class="dropdown-menu">
                      <li class="p-2">
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                          <input ng-model="timkiem.Noidung" type="text" class="form-control col-12" placeholder="Tìm Kiếm" />
                          <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Noidung')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Noidung')"> <i class="fas fa-sort-down"></i> </span> </div>
                      </li>
                    </ul>
                  </div>
                </th>
                <th ng-show="tieude.td5" style="width: 10%;"> <div class="dropdown position-static">
                    <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="d-flex justify-content-center flex-column">Vị Trí<i class="fas fa-ellipsis-h"></i></div>
                    </div>
                    <ul class="dropdown-menu">
                      <li class="p-2">
                        <div class="mb-3">
                          <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                            <select multiple chosen class="form-control text-danger" ng-model="Trangthai" ng-options="s.id as s.Thuoctinh for s in TTDuyet">
                            </select>
                            <span class="input-group-text" ng-click="Trangthai={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Trangthai')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Trangthai')"> <i class="fas fa-sort-down"></i> </span> </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </th>
                <th ng-show="tieude.td6" style="width: 15%;"> <div class="dropdown position-static">
                    <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="d-flex justify-content-center flex-column">Tiêu Đề <i class="fas fa-ellipsis-h"></i></div>
                    </div>
                    <ul class="dropdown-menu">
                      <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                        <select multiple chosen class="form-control text-danger" ng-model="Nguoiduyet" ng-options="s.idDuyet as s.idDuyet|FCustom:'name':RListNV for s in (RABaihoc|unique:'idDuyet')">
                        </select>
                        <span class="input-group-text" ng-click="Nguoiduyet={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Nguoiduyet')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Nguoiduyet')"> <i class="fas fa-sort-down"></i> </span> </div>
                    </ul>
                  </div>
                </th>
                  <th ng-show="tieude.td6" style="width: 15%;"> <div class="dropdown position-static">
                    <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="d-flex justify-content-center flex-column">File<i class="fas fa-ellipsis-h"></i></div>
                    </div>
                    <ul class="dropdown-menu">
                      <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                        <select multiple chosen class="form-control text-danger" ng-model="Nguoiduyet" ng-options="s.idDuyet as s.idDuyet|FCustom:'name':RListNV for s in (RABaihoc|unique:'idDuyet')">
                        </select>
                        <span class="input-group-text" ng-click="Nguoiduyet={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Nguoiduyet')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Nguoiduyet')"> <i class="fas fa-sort-down"></i> </span> </div>
                    </ul>
                  </div>
                </th>
                <th ng-show="tieude.td9" style="width: 15%;"> <div class="dropdown position-static">
                    <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="d-flex justify-content-center flex-column">Biểu Mẫu<i class="fas fa-ellipsis-h"></i></div>
                    </div>
                    <ul class="dropdown-menu">
                      <li class="p-2">
                        <div class="mb-3">
                          <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                            <select chosen class="form-control text-danger" ng-model="timkiem.idTao" ng-options="s.id as s.name for s in RListNV">
                            </select>
                            <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('idTao')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('idTao')"> <i class="fas fa-sort-down"></i> </span> </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </th>
                <th ng-show="tieude.td7" style="width: 10%;"> <div class="dropdown position-static">
                    <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="d-flex justify-content-center flex-column">Ghi Chú <i class="fas fa-ellipsis-h"></i></div>
                    </div>
                    <ul class="dropdown-menu">
                      <li class="p-2">
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                          <input ng-model="timkiem.Ghichu" type="text" class="form-control col-12" placeholder="Tìm Kiếm" />
                          <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Ghichu')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Ghichu')"> <i class="fas fa-sort-down"></i> </span> </div>
                      </li>
                    </ul>
                  </div>
                </th>
              </tr>
            </thead>
            <tbody style="height: 60vh!important">
              <tr ng-repeat="rd in RATungphongban | filter:timkiem| orderBy:propertyName:reverse">
                <td style="width: 10%;"><div class="dropdown position-static my-auto">
                    <div class="dropdown-toggle" data-bs-toggle="dropdown">
                      <div class="d-flex justify-content-center flex-column">{{$index+1}} <i class="fas fa-ellipsis-h my-auto"></i></div>
                    </div>
                    <ul class="dropdown-menu">
                      <li class="p-2" ng-click="editTungphongban(rd)" data-bs-toggle="modal" data-bs-target="#CRUDForm"><i class="fas fa-edit text-info"></i> Sửa</li>
                      <li class="p-2" data-bs-toggle="modal" data-bs-target="#XoaHang" ng-click="removeTungphongban(rd)"><i class="fas fa-trash-alt text-danger"></i> Xóa</li>
                    </ul>
                  </div></td>
                <td ng-show="tieude.td1" style="width: 10%;">{{rd.idCty|FCustom:'Thuoctinh':Congty}}</td>
                <td ng-show="tieude.td2" style="width: 10%;">{{rd.idKhoi|FCustom:'Thuoctinh':Khoi}}</td>
                <td ng-show="tieude.td2" style="width: 10%;">{{rd.idPB|FCustom:'Thuoctinh':Phongban}}</td>
                <td ng-show="tieude.td2" style="width: 10%;">{{rd.idBP|FCustom:'Thuoctinh':Bophan}}</td>
                <td ng-show="tieude.td2" style="width: 10%;">{{rd.idVitri|FCustom:'Thuoctinh':Vitri}}</td>
                <td ng-show="tieude.td2" style="width: 15%;">{{rd.Tieude}}</td>
                <td ng-show="tieude.td2" style="width: 15%;">{{rd.File}}</td>
                <td ng-show="tieude.td2" style="width: 15%;">{{rd.Bieumau}}</td>
                <td ng-show="tieude.td2" style="width: 10%;"><span ng-bind-html="rd.Ghichu"></span></td>                  
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="CRUDForm" data-bs-backdrop="static">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> {{Tungphongban.Title}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row p-3">
          <div class="mb-3 col-6">
            <div class="input-group"> <span class="input-group-text">Công Ty</span>
              <select chosen class="form-control text-danger" ng-model="Tungphongban.idCty" ng-options="s.id as s.Thuoctinh for s in Congty">
                <option value="" selected>Vui lòng chọn</option>
              </select>
            </div>
          </div>
          <div class="mb-3 col-6">
            <div class="input-group"> <span class="input-group-text">Khối</span>
              <select chosen class="form-control text-danger" ng-model="Tungphongban.idKhoi" ng-options="s.id as s.Thuoctinh for s in Khoi">
                <option value="" selected>Vui lòng chọn</option>
              </select>
            </div>
          </div>
          <div class="mb-3 col-6">
            <div class="input-group"> <span class="input-group-text">Phòng Ban</span>
              <select chosen class="form-control text-danger" ng-model="Tungphongban.idPB" ng-options="s.id as s.Thuoctinh for s in Phongban">
                <option value="" selected>Vui lòng chọn</option>
              </select>
            </div>
          </div>
          <div class="mb-3 col-6">
            <div class="input-group"> <span class="input-group-text">Bộ Phận</span>
              <select chosen class="form-control text-danger" ng-model="Tungphongban.idBP" ng-options="s.id as s.Thuoctinh for s in Bophan">
                <option value="" selected>Vui lòng chọn</option>
              </select>
            </div>
          </div>
          <div class="mb-3 col-6">
            <div class="input-group"> <span class="input-group-text">Vị Trí</span>
              <select chosen class="form-control text-danger" ng-model="Tungphongban.idVitri" ng-options="s.id as s.Thuoctinh for s in Vitri">
                <option value="" selected>Vui lòng chọn</option>
              </select>
            </div>
          </div>
          <div class="mb-3 col-6">
            <div class="input-group"> <span class="input-group-text">Tài Liệu </span>
              <input type="text" class="form-control" placeholder="Vui lòng nhập tên tài liệu" ng-model="Tungphongban.Tieude">
            </div>
          </div>
          <div class="mb-3">
            <div class="input-group"> <span class="input-group-text">File (Upload)</span> 
                                  <div id="dropzone2" class="dropzone sm form-control" options="dzOptions" methods="dzMethods" callbacks="dzCallbacks" ng-dropzone></div>
            </div>
          </div>
          <div class="mb-3">
            <div class="input-group"> <span class="input-group-text">Biểu Mẫu (Upload) </span>
                  <div id="dropzone2" class="dropzone sm form-control" options="dzOptions1" methods="dzMethods1" callbacks="dzCallbacks1" ng-dropzone></div>
            </div>
          </div>
      <div class="mb-3">
            <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Tungphongban.Ghichu" class="form-control text-danger" placeholder="Ghi Chú"></textarea> 
          </div>      
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="button" ng-show="Tungphongban.CRUD!=1" class="btn btn-primary" ng-click="CreateTungphongban(Tungphongban)"> Tạo Mới</button>
        <button type="button" ng-show="Tungphongban.CRUD==1" class="btn btn-primary" ng-click="UpdateTungphongban(Tungphongban)">Cập Nhật</button>
      </div>
    </div>
  </div>
</div> 
    <div class="modal fade" id="XoaHang" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
     <div class="modal-content">
      <div class="modal-header">
       <h5 class="modal-title">Xóa Bài học</h5>
       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">Bạn có Chắc Chắn Xóa <span class="text-danger" ng-bind-html="Baihoc.Tenbaihoc"></span></div>
      <div class="modal-footer">
       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
       <button type="button" class="btn btn-primary" ng-click="DeleteTungphongban(Tungphongban)">Xóa</button>
      </div>
     </div>
    </div>
   </div>
</div>
