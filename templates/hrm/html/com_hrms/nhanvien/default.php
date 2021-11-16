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
HTMLHelper::_( 'script', 'https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js', array( 'version' => 'auto' ), array( 'defer' => 'true' ) );
$User = Factory::getUser();
?>
<div ng-app="Site" ng-controller="Site" ng-init="OninitHoso();ReadListNhanVien()" class="bg-white shadow border-0 rounded border-light p-4 w-100">
    
    
<!--
  <div class="row py-4">
    <div class="btn-toolbar mb-2 mb-md-0 col-sm-3"> 
      <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#modal-addNhanvien" ng-click="Nhanvien={}"> <i class="fas fa-plus"></i> Tạo User </button>     
      <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#modal-uploadNhanvien"><i class="fas fa-upload"></i> </button>
<div class="modal fade" id="modal-uploadNhanvien"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="modal-uploadNhanvien" aria-hidden="true">
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
  </div>
-->
 


<div class="row position-relative">
      <div class="overflow-scroll">      
       <div class="d-flex">
        <div class="table mt-3 ghichu">  
 <table class="table table-scroll table-centered table-nowrap mb-0 rounded text-center table-bordered table-hover">
  <thead class="thead-light">
   <tr>
    <th style="width: 5%;"> 
        <div class="d-flex justify-content-center">
                  <div class="px-2 my-auto dropdown position-static">
                    <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div>
                        <h6><i class="fas fa-sliders-h"></i></h6>
                      </div>
                    </div>
                    <ul class="dropdown-menu">
                      <li class="p-2">
                        <div class="form-check form-switch"> Chủ Đề
                          <input class="form-check-input" type="checkbox" ng-model="tieude.td1" checked />
                        </div>
                      </li>
                      <li class="p-2">
                        <div class="form-check form-switch"> Tài Liệu Nguồn
                          <input class="form-check-input" type="checkbox" ng-model="tieude.td2" checked />
                        </div>
                      </li>
                      <li class="p-2">
                        <div class="form-check form-switch"> Giảng Viên
                          <input class="form-check-input" type="checkbox" ng-model="tieude.td3" checked />
                        </div>
                      </li>
                      <li class="p-2">
                        <div class="form-check form-switch"> Học Viên
                          <input class="form-check-input" type="checkbox" ng-model="tieude.td4" checked />
                        </div>
                      </li>
                      <li class="p-2">
                        <div class="form-check form-switch"> Trạng Thái
                          <input class="form-check-input" type="checkbox" ng-model="tieude.td7" checked />
                        </div>
                      </li>
                      <li class="p-2">
                        <div class="form-check form-switch"> Người Duyệt
                          <input class="form-check-input" type="checkbox" ng-model="tieude.td8" checked />
                        </div>
                      </li>
                      <li class="p-2">
                        <div class="form-check form-switch"> Ghi Chú
                          <input class="form-check-input" type="checkbox" ng-model="tieude.td9" checked />
                        </div>
                      </li>
                      <li class="p-2">
                        <div class="btn btn-primary" ng-click="LuuAnhien(tieude)">Lưu</div>
                      </li>
                    </ul>
                  </div>
                  <div>
                    <h6><i class="fas fa-plus-circle" data-bs-toggle="modal" data-bs-target="#CRUDNhanvien" ng-click="OninitNhanVien();"></i></h6>
                  </div>
                </div>
     </th>
    <th ng-show="tieude.td1==true" style="width: 15%;">
     <div class="dropdown position-static">
      <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
       <div class="d-flex justify-content-center flex-column">Họ Tên <i class="fas fa-ellipsis-h"></i></div>
      </div>
      <ul class="dropdown-menu">
       <li class="p-2">
        <div class="mb-3">
         <div class="input-group mb-2">
    <span class="input-group-text"> <i class="fas fa-search"></i> </span>
    <input ng-model="timkiem.Profile.Hoten" type="text" class="form-control col-12" placeholder="Tìm Kiếm">

    <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span>
    <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('idRoot')"> <i class="fas fa-sort-up"></i> </span>
    <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('idRoot')"> <i class="fas fa-sort-down"></i> </span>
</div>
   </div>
       </li>
      </ul>
     </div>
    </th>
    <th ng-show="tieude.td2==true" style="width: 10%;">
     <div class="dropdown position-static">
      <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
       <div class="d-flex justify-content-center flex-column">Công Ty <i class="fas fa-ellipsis-h"></i></div>
      </div>
      <ul class="dropdown-menu">
       <li class="p-2">
        <div class="mb-3">
         <div class="input-group mb-2">
          <span class="input-group-text"> <i class="fas fa-search"></i> </span>
          <input ng-model="timkiem.MaTL" type="text" class="form-control col-12" placeholder="Tìm Kiếm" />
             
        <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span>         
     <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('MaTL')"> <i class="fas fa-sort-up"></i> </span>
    <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('MaTL')"> <i class="fas fa-sort-down"></i> </span>
         </div>
        </div>
       </li>
      </ul>
     </div>
    </th>
    <th ng-show="tieude.td3==true" style="width:10%;">
     <div class="dropdown position-static">
<div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="d-flex justify-content-center flex-column">Khối <i class="fas fa-ellipsis-h"></i></div>
                </div>
        </div>
    </th>
    <th ng-show="tieude.td4==true" style="width: 10%;">
     <div class="dropdown position-static">
      <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
       <div class="d-flex justify-content-center flex-column">Phòng ban <i class="fas fa-ellipsis-h"></i></div>
      </div>
      <ul class="dropdown-menu">
       <li class="p-2">
        <div class="mb-3">
         <div class="input-group mb-2">
          <span class="input-group-text"> <i class="fas fa-search"></i> </span>
          <input ng-model="timkiem.Mota" type="text" class="form-control col-12" placeholder="Tìm Kiếm" />
              <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span>   
           <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Mota')"> <i class="fas fa-sort-up"></i> </span>
    <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Mota')"> <i class="fas fa-sort-down"></i> </span>           
         </div>
        </div>
       </li>
      </ul>
     </div>
    </th>
    <th ng-show="tieude.td5" style="width: 10%;"> 
         <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Bộ Phận <i class="fas fa-ellipsis-h"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="mb-3">
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
          <select chosen class="form-control text-danger" ng-model="timkiem.idTG" ng-options="s.id as s.name for s in RListNV">
           <option value="" selected>Vui lòng chọn</option>
          </select>
                          <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('idTG')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('idTG')"> <i class="fas fa-sort-down"></i> </span> </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </th>
     <th ng-show="tieude.td7==true" style="width: 10%;"> <div class="dropdown position-static">
                <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                <div class="d-flex justify-content-center flex-column"> Vị Trí <i class="fas fa-ellipsis-h"></i> </div>
              </div>
                <ul class="dropdown-menu">
                <li class="p-2">
                    <div class="mb-3">
                    <div class="input-group"> <span class="input-group-text"> Từ </span>
                        <input type="date" class="form-control text-danger" ng-model="Ngaytao.from" />
                        <span class="input-group-text" ng-click="Ngaytao={}"> <i class="fas fa-sync-alt"></i> </span> </div>
                  </div>
                    <div class="mb-3">
                    <div class="input-group"> <span class="input-group-text"> Đến </span>
                        <input type="date" class="form-control text-danger" ng-model="Ngaytao.to" />
                        <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Ngaytao')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Ngaytao')"> <i class="fas fa-sort-down"></i> </span> </div>
                  </div>
                  </li>
              </ul>
              </div>
          </th>
    <th ng-show="tieude.td6" style="width: 10%;"> <div class="dropdown position-static">
              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                <div class="d-flex justify-content-center flex-column"> Ngày Sinh <i class="fas fa-ellipsis-h"></i> </div>
              </div>
              <ul class="dropdown-menu">
                <li class="p-2">
                  <div class="mb-3">
                    <div class="input-group"> <span class="input-group-text"> Từ </span>
                      <input type="date" class="form-control text-danger" ng-model="Trienkhai.from" />
                      <span class="input-group-text" ng-click="Trienkhai={}"> <i class="fas fa-sync-alt"></i> </span> </div>
                  </div>
                  <div class="mb-3">
                    <div class="input-group"> <span class="input-group-text"> Đến </span>
                      <input type="date" class="form-control text-danger" ng-model="Trienkhai.to" />
                      <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Trienkhai')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Trienkhai')"> <i class="fas fa-sort-down"></i> </span> </div>
                  </div>
                </li>
              </ul>
            </div>
          </th>
    <th ng-show="tieude.td12" style="width: 10%;">
     <div class="dropdown position-static">
      <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
       <div class="d-flex justify-content-center flex-column">CMND/CCCD<i class="fas fa-ellipsis-h"></i></div>
      </div>
      <ul class="dropdown-menu">
       <li class="p-2">
        <div class="mb-3">
         <div class="input-group">
          <span class="input-group-text"> Từ </span>
          <input type="date" class="form-control text-danger" ng-model="Deadline.from" />
          <span class="input-group-text" ng-click="Deadline={}"> <i class="fas fa-sync-alt"></i> </span>    
         </div>
        </div>
        <div class="mb-3">
         <div class="input-group">
          <span class="input-group-text"> Đến </span>
          <input type="date" class="form-control text-danger" ng-model="Deadline.to" />
          <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Deadline')"> <i class="fas fa-sort-up"></i> </span>
 <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Deadline')"> <i class="fas fa-sort-down"></i> </span>    
         </div>
        </div>
       </li>
      </ul>
     </div>
    </th>
    <th ng-show="tieude.td8==true" style="width: 10%;">
     <div class="dropdown position-static">
      <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
       <div class="d-flex justify-content-center flex-column">
        SĐT <i class="fas fa-ellipsis-h"></i>
       </div>
      </div>
      <ul class="dropdown-menu">
       <li class="p-2">
        <div class="input-group mb-2">
          <span class="input-group-text"> <i class="fas fa-search"></i> </span>
          <select chosen class="form-control text-danger" ng-model="timkiem.TTTailieu" ng-options="s.id as s.Thuoctinh for s in TTTailieu">
           <option value="" selected>Vui lòng chọn</option>
          </select>
               <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('TTTailieu')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('TTTailieu')"> <i class="fas fa-sort-down"></i> </span>          
         </div>
       </li>
      </ul>
     </div>
    </th>
    <th ng-show="tieude.td9==true" style="width: 10%;">
     <div class="dropdown position-static">
      <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
       <div class="d-flex justify-content-center flex-column">
        Địa Chỉ <i class="fas fa-ellipsis-h"></i>
       </div>
      </div>
      <ul class="dropdown-menu">
       <li class="p-2">
        <div class="mb-3">
         <div class="input-group mb-2">
          <span class="input-group-text"> <i class="fas fa-search"></i> </span>
          <select chosen class="form-control text-danger" ng-model="timkiem.Trangthai" ng-options="s.id as s.Thuoctinh for s in TTDuyet">
           <option value="" selected>Vui lòng chọn</option>
          </select>
                          <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Trangthai')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Trangthai')"> <i class="fas fa-sort-down"></i> </span>    
         </div>
        </div>
       </li>
      </ul>
     </div>
    </th>
    <th ng-show="tieude.td10==true" style="width: 10%;">
     <div class="dropdown position-static">
      <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
       <div class="d-flex justify-content-center flex-column">
        Ngày Vào Làm <i class="fas fa-ellipsis-h"></i>
       </div>
      </div>
      <ul class="dropdown-menu">
       <li class="p-2">
        <div class="mb-3">
         <div class="input-group mb-2">
          <span class="input-group-text"> <i class="fas fa-search"></i> </span>
          <select chosen class="form-control text-danger" ng-model="timkiem.idDuyet" ng-options="s.id as s.name for s in RListNV">
           <option value="" selected>Vui lòng chọn</option>
          </select>
  <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('idDuyet')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('idDuyet')"> <i class="fas fa-sort-down"></i> </span>    
         </div>
        </div>
       </li>
      </ul>
     </div>
    </th>
    <th ng-show="tieude.td11==true" style="width: 10%;">
     <div class="dropdown position-static">
      <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
       <div class="d-flex justify-content-center flex-column">Email <i class="fas fa-ellipsis-h"></i></div>
      </div>
      <ul class="dropdown-menu">
       <li class="p-2">
        <div class="mb-3">
         <div class="input-group mb-2">
          <span class="input-group-text"> <i class="fas fa-search"></i> </span>
          <input ng-model="timkiem.Ghichu"class="form-control" placeholder="Tìm Kiếm" />
            <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Ghichu')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Ghichu')"> <i class="fas fa-sort-down"></i> </span>    
         </div>
        </div>
       </li>
      </ul>
     </div>
    </th>
    <th ng-show="tieude.td13" style="width: 10%;">
     <div class="dropdown position-static">
      <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
       <div class="d-flex justify-content-center flex-column">Zalo <i class="fas fa-ellipsis-h"></i></div>
      </div>
      <ul class="dropdown-menu">
       <li class="p-2">
        <div class="mb-3">
         <div class="input-group mb-2">
          <span class="input-group-text"> <i class="fas fa-search"></i> </span>
          <select chosen class="form-control text-danger" ng-model="timkiem.Tags" ng-options="s.id as s.Thuoctinh for s in Maviec">
           <option value="" selected>Vui lòng chọn</option>
          </select>
            <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Tags')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Tags')"> <i class="fas fa-sort-down"></i> </span>    
         </div>
         
         
        </div>
       </li>
      </ul>
     </div>
    </th>
    <th ng-show="tieude.td13" style="width: 10%;">
     <div class="dropdown position-static">
      <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
       <div class="d-flex justify-content-center flex-column">Facebook <i class="fas fa-ellipsis-h"></i></div>
      </div>
      <ul class="dropdown-menu">
       <li class="p-2">
        <div class="mb-3">
         <div class="input-group mb-2">
          <span class="input-group-text"> <i class="fas fa-search"></i> </span>
          <select chosen class="form-control text-danger" ng-model="timkiem.Tags" ng-options="s.id as s.Thuoctinh for s in Maviec">
           <option value="" selected>Vui lòng chọn</option>
          </select>
            <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Tags')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Tags')"> <i class="fas fa-sort-down"></i> </span>    
         </div>
         
         
        </div>
       </li>
      </ul>
     </div>
    </th>
   </tr>
  </thead>
  <tbody>
   <tr ng-repeat="nv in RListNV | orderBy:propertyName:reverse | filter:timkiem |limitTo:limit:from | dateNgaytao:Ngaytao.from:Ngaytao.to" class="TL{{nv.id}}">
    <td style="width: 5%;">
     <div class="dropdown position-static my-auto">
      <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
      <div class="d-flex justify-content-center flex-column">{{$index+1}} <i class="fas fa-ellipsis-h my-auto"></i></div>
      </div>
      <ul class="dropdown-menu">
       <li class="p-2" data-bs-toggle="modal" data-bs-target="#CRUDNhanvien" ng-click="editNhanvien(nv)"><i class="fas fa-edit text-info"></i> Sửa</li> 
       <li class="p-2" data-bs-toggle="modal" data-bs-target="#XoaHang" ng-click=""><i class="fas fa-trash-alt text-danger"></i> Xóa</li>
      </ul>
     </div>
    </td>
    <td ng-show="tieude.td1==true" style="width: 15%;"><div>{{nv.Profile.Hoten}}</div>
      <small>  {{nv.Profile.Email}}</small>
       </td>   
    <td ng-show="tieude.td1==true" style="width: 10%;">{{nv.Profile.Congty|FCustom:'Thuoctinh':Congty}} </td>
    <td ng-show="tieude.td1==true" style="width: 10%;">{{nv.Profile.Khoi|FCustom:'Thuoctinh':Khoi}}</td>
    <td ng-show="tieude.td1==true" style="width: 10%;">{{nv.Profile.Phongban|FCustom:'Thuoctinh':Phongban}}</td>
    <td ng-show="tieude.td1==true" style="width: 10%;">{{nv.Profile.Bophan|FCustom:'Thuoctinh':Bophan}}</td>
    <td ng-show="tieude.td1==true" style="width: 10%;">{{nv.Profile.Vitri|FCustom:'Thuoctinh':Vitri}}</td>
    <td ng-show="tieude.td1==true" style="width: 10%;">{{nv.Profile.Ngaysinh|date:'dd/MM/yy'}}</td>
    <td ng-show="tieude.td1==true" style="width: 10%;">{{nv.Profile.CMND}}</td>
    <td ng-show="tieude.td1==true" style="width: 10%;">{{nv.Profile.SDT}}</td>
    <td ng-show="tieude.td1==true" style="width: 10%;">{{nv.Profile.Diachi}}</td>
    <td ng-show="tieude.td1==true" style="width: 10%;">{{nv.Profile.NgayVL}}</td>
    <td ng-show="tieude.td1==true" style="width: 10%;"><span class="ellipsis ">{{nv.Profile.Email}}</span></td>
    <td ng-show="tieude.td1==true" style="width: 10%;">{{nv.Profile.Zalo}}</td>
    <td ng-show="tieude.td1==true" style="width: 10%;">{{nv.Profile.FB}}</td>
   </tr>
  </tbody>
 </table>
</div>
       </div>
      </div>
     </div>

  
    
    
<div class="modal fade" id="CRUDNhanvien"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <div class="container">
            <div class="row">
              <div class="col-6">
                <h2 class="h6 modal-title">{{Nhanvien.Title}}</h2>
              </div>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
          </div>
        </div>
        <div class="modal-body">
          <div class="mb-2">Thông Tin Nhân Viên:</div>
          <div class="row">
            <div class="col-sm-4">
              <div class="input-group mb-3"> <span class="input-group-text">Mã Nhân Viên</span>
                <input class="form-control" type="text" ng-model="Nhanvien.Profile.MaNV" placeholder="VD: NV1_123">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="input-group mb-3"> <span class="input-group-text">Họ Tên</span>
                <input class="form-control" type="text" ng-model="Nhanvien.Profile.Hoten" placeholder="VD: Nguyễn Văn A">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="input-group mb-3"> <span class="input-group-text">Giới Tính</span>
                <input class="form-control" type="text" ng-model="Nhanvien.Profile.Gioitinh" placeholder="{{lnv.Gioitinh}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="input-group mb-3"> <span class="input-group-text">Ngày Sinh</span>
                <input class="form-control" type="text" ng-model="Nhanvien.Profile.Ngaysinh" placeholder="{{lnv.Gioitinh}}">
              </div>
            </div>
            <div class="col-sm-8">
              <div class="input-group mb-3"> <span class="input-group-text">Địa Chỉ</span>
                <input class="form-control" type="text" ng-model="Nhanvien.Profile.Diachi" placeholder="{{lnv.Gioitinh}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="input-group mb-3"> <span class="input-group-text">SĐT</span>
                <input class="form-control" type="text" ng-model="Nhanvien.Profile.SDT" placeholder="{{lnv.Gioitinh}}">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="input-group mb-3"> <span class="input-group-text">Email</span>
                <input class="form-control" type="text" ng-model="Nhanvien.Profile.Email" placeholder="{{lnv.Gioitinh}}">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="input-group mb-3"> <span class="input-group-text">Quốc Tịch</span>
                <input class="form-control" type="text" ng-model="Nhanvien.Quoctich" placeholder="{{lnv.Gioitinh}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="input-group mb-3"> <span class="input-group-text">Trình Độ</span>
                <input class="form-control" type="text" ng-model="Nhanvien.Trinhdo" placeholder="{{lnv.Gioitinh}}">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="input-group mb-3"> <span class="input-group-text">Trường Tốt Nghiệp</span>
                <input class="form-control" type="text" ng-model="Nhanvien.TruongTN" placeholder="{{lnv.Gioitinh}}">
              </div>
            </div>
          </div>
          <div class="mb-2">Thông Tin Công Ty: </div>
          <div class="row">
                 <div class="col-sm-4 mb-3">
                   <div class="input-group"> <span class="input-group-text">Công Ty</span>
                     <select chosen class="form-control text-danger" ng-model="Nhanvien.Profile.Congty" ng-options="s.id as s.Thuoctinh for s in Congty">
                       <option value="" selected>Vui lòng chọn</option>
                     </select>
                   </div> 
            </div>         
            <div class="col-sm-4 mb-3">
                   <div class="input-group"> <span class="input-group-text">Khối</span>
                     <select chosen class="form-control text-danger" ng-model="Nhanvien.Profile.Khoi" ng-options="s.id as s.Thuoctinh for s in Khoi">
                       <option value="" selected>Vui lòng chọn</option>
                     </select>
                   </div> 
            </div>  
  <div class="col-sm-4 mb-3">
                   <div class="input-group"> <span class="input-group-text">Phòng Ban</span>
                     <select chosen class="form-control text-danger" ng-model="Nhanvien.Profile.Phongban" ng-options="s.id as s.Thuoctinh for s in Phongban">
                       <option value="" selected>Vui lòng chọn</option>
                     </select>
                   </div> 
            </div>
 <div class="col-sm-4 mb-3">
                   <div class="input-group"> <span class="input-group-text">Bộ Phận</span>
                     <select chosen class="form-control text-danger" ng-model="Nhanvien.Profile.Bophan" ng-options="s.id as s.Thuoctinh for s in Bophan">
                       <option value="" selected>Vui lòng chọn</option>
                     </select>
                   </div> 
            </div>
  <div class="col-sm-4 mb-3">
                   <div class="input-group"> <span class="input-group-text">Vị Trí</span>
                     <select chosen class="form-control text-danger" ng-model="Nhanvien.Profile.Vitri" ng-options="s.id as s.Thuoctinh for s in Vitri">
                       <option value="" selected>Vui lòng chọn</option>
                     </select>
                   </div> 
            </div>            
            <div class="col-sm-4">
              <div class="input-group mb-3"> <span class="input-group-text">Chức Danh</span>
                <input class="form-control" type="text" ng-model="Nhanvien.Chucdanh" placeholder="{{lnv.Gioitinh}}">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="input-group mb-3"> <span class="input-group-text">Phòng Ban</span>
                <input class="form-control" type="text" ng-model="Nhanvien.Phongban" placeholder="{{lnv.Gioitinh}}">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="input-group mb-3"> <span class="input-group-text">Mã Số Thuế</span>
                <input class="form-control" type="text" ng-model="Nhanvien.MST" placeholder="{{lnv.Gioitinh}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="input-group mb-3"> <span class="input-group-text">Số BHXH</span>
                <input class="form-control" type="text" ng-model="Nhanvien.SoBHXH" placeholder="{{lnv.Gioitinh}}">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="input-group mb-3"> <span class="input-group-text">Tình Trạng Làm Việc</span>
                <input class="form-control" type="text" ng-model="Nhanvien.TTLV" placeholder="{{lnv.Gioitinh}}">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="input-group mb-3"> <span class="input-group-text">Tình Trạng Hồ Sơ</span>
                <input class="form-control" type="text" ng-model="Nhanvien.TTHS" placeholder="{{lnv.Gioitinh}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="input-group mb-3"> <span class="input-group-text">Số KCB</span>
                <input class="form-control" type="text" ng-model="Nhanvien.SoKCB" placeholder="{{lnv.Gioitinh}}">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="input-group mb-3"> <span class="input-group-text">Nơi KCB</span>
                <input class="form-control" type="text" ng-model="Nhanvien.NoiKCB" placeholder="{{lnv.Gioitinh}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="input-group mb-3"> <span class="input-group-text">Ngày Vào</span>
                <input class="form-control" type="text" ng-model="Nhanvien.Datein" placeholder="{{lnv.Gioitinh}}">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="input-group mb-3"> <span class="input-group-text">Ngày Nghỉ</span>
                <input class="form-control" type="text" ng-model="Nhanvien.Dateout" placeholder="{{lnv.Gioitinh}}">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="input-group mb-3"> <span class="input-group-text">Thâm Niên</span>
                <input class="form-control" type="text" ng-model="Nhanvien.Thamnien" disabled placeholder="{{lnv.Gioitinh}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="input-group mb-3"> <span class="input-group-text">Nguyên Nhân Nghỉ</span>
                <textarea class="form-control" ng-model="Nhanvien.LydoNghi" placeholder="{{lnv.MaNV}}"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" ng-show="Nhanvien.CRUD!=1" class="btn btn-primary" ng-click="">Tạo Mới</button>
          <button type="button" ng-show="Nhanvien.CRUD==1" class="btn btn-primary" ng-click="UpdateNhanvien(Nhanvien)">Cập Nhật</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
  </div>    
  
<!--
  <div class="card card-body shadow border-0 table-wrapper table-responsive">
    <table class="table user-table table-hover align-items-center">
      <thead>
        <tr>
          <th class="border-bottom">#</th>
          <th class="border-bottom">
              <input class="form-control" placeholder="Họ Tên" ng-model="timkiem.name">
          </th>
          <th class="border-bottom ">
              Ngày Sinh
              <input type="date" class="form-control" placeholder="Ngày Sinh" 
                     ng-model="timkiem.Ngaysinh "required>
          </th>
          <th class="border-bottom">  
              <select class="form-select w-auto pe-5"<p></p>" ng-model="timkiem.Gioitinh">
                <option  selected value="">Giới Tính</option>
                <option value="0">Nam</option>
                <option value="1">Nữ</option>
              </select>
            </th>
          <th class="border-bottom">
              <input class="form-control "  placeholder="Số Điện Thoại" ng-model="timkiem.SDT">    
            </th>
          <th class="border-bottom">
              <input class="form-control" placeholder="Địa Chỉ" ng-model="timkiem.Diachi">
          </th>
          <th class="border-bottom">
              <input class="form-control" type="date"  placeholder="Ngày Vào Làm" ng-model="timkiem.datein">
          </th>
        </tr>
      </thead>
      <tbody>
        <tr ng-repeat="lnv in RListNV | limitTo:limit:from | filter:timkiem" data-bs-toggle="modal" data-bs-target="#modal-addNhanvien" ng-click="editnv(lnv)">
          <td> {{$index+1}}</td>
          <td>
              <a href="#" class="d-flex align-items-center"> <img ng-show="lnv.hinhanh!=''" ng-src="{{lnv.hinhanh}}" class="avatar rounded-circle me-3"/>
                <svg ng-show="lnv.hinhanh==''" class="avatar rounded-circle me-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path>
                </svg>
                <div class="d-block"> <span class="fw-bold">{{lnv.name}}</span>
                  <div class="small text-gray">{{lnv.email}}</div>
                </div>
            </a>
          </td>
          <td><span class="fw-normal">{{lnv.Ngaysinh|date:'dd/MM/yyyy'}}</span></td>
          <td><span class="fw-normal d-flex align-items-center"> {{lnv.Gioitinh|Gioitinh:Gioitinh}} </span></td>
          <td><span class="fw-normal">{{lnv.SDT}}</span></td>
          <td><span class="fw-normal">{{lnv.Diachi}}</span></td>
          <td><span class="fw-normal">{{lnv.Datein}}</span></td>   
        </tr>
      </tbody>
    </table>
  </div>
-->
</div>
