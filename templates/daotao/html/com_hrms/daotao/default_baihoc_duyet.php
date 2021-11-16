<?php
defined( '_JEXEC' )or die;
use Joomla\ CMS\ Router\ Route;
?>
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
                    <h6><i class="fas fa-plus-circle" ng-click="addBaihoc()" data-bs-toggle="modal" data-bs-target="#CRUDBaihoc"></i></h6>
                  </div>
                </div>
              </th>
  <th ng-show="tieude.td1" style="width: 20%;"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Tài Liệu Nguồn <i class="fas fa-ellipsis-h"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="mb-3">
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>                  
                          <select chosen class="form-control text-danger" ng-model="timkiem.idTL" ng-options="s.idTL as s.idTL|FCustom:'Tentailieu':RATailieu for s in (RABaihoc|unique:'idTL')">
                           <option value="" selected>Vui lòng chọn</option>   
                          </select>
                          <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('idTL')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('idTL')"> <i class="fas fa-sort-down"></i> </span> </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </th>              
              <th ng-show="tieude.td2" style="width: 20%;"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Tên Bài Học <i class="fas fa-ellipsis-h"></i></div>
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
                    <div class="d-flex justify-content-center flex-column">Đề Thi <i class="fas fa-ellipsis-h"></i></div>
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
                    <div class="d-flex justify-content-center flex-column">Nội Dung <i class="fas fa-ellipsis-h"></i></div>
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
                    <div class="d-flex justify-content-center flex-column">Trạng Thái<i class="fas fa-ellipsis-h"></i></div>
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
              <th ng-show="tieude.td6" style="width: 10%;"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Người Duyệt <i class="fas fa-ellipsis-h"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                      <select multiple chosen class="form-control text-danger" ng-model="Nguoiduyet" ng-options="s.idDuyet as s.idDuyet|FCustom:'name':RListNV for s in (RABaihoc|unique:'idDuyet')">
                       
                      </select>
                      <span class="input-group-text" ng-click="Nguoiduyet={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Nguoiduyet')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Nguoiduyet')"> <i class="fas fa-sort-down"></i> </span> </div>
                  </ul>
                </div>
              </th>
     <th ng-show="tieude.td9" style="width: 10%;"> <div class="dropdown position-static">
                              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="d-flex justify-content-center flex-column">Người Tạo<i class="fas fa-ellipsis-h"></i></div>
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
          <tbody>
            <tr ng-repeat="rd in RABaihoc |FMT:Trangthai:'Trangthai'|FMT:Nguoiduyet:'idDuyet' | filter:timkiem| orderBy:propertyName:reverse">
              <td style="width: 10%;"><div class="dropdown position-static my-auto">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown">
                    <div class="d-flex justify-content-center flex-column">{{$index+1}} <i class="fas fa-ellipsis-h my-auto"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2" ng-click="editBaihoc(rd)" data-bs-toggle="modal" data-bs-target="#CRUDBaihoc"><i class="fas fa-edit text-info"></i> Sửa</li>
                    <li class="p-2" data-bs-toggle="modal" data-bs-target="#XoaHang" ng-click="removeBaihoc(rd)" ng-if="Quyen.pq14"><i class="fas fa-trash-alt text-danger"></i> Xóa</li>
                  </ul>
                </div></td>
              <td ng-show="tieude.td1" style="width: 20%;">{{rd.idTL|FCustom:'Tentailieu':RATailieu}}
                </td>
              <td ng-show="tieude.td2" style="width: 20%;">{{rd.Tenbaihoc}}</td>
              <td ng-show="tieude.td2" style="width: 10%;"><div ng-if="rd.Dethi" class="input-group justify-content-center" data-bs-toggle="modal" data-bs-target="#ShowDethi" ng-click="ShowDethi(rd)"> <span class="input-group-text">Đề Thi Số {{rd.Dethi.ordering}} </span> </div></td>
              </a>
              </td>
              <td ng-show="tieude.td3" style="width: 10%;"><i class="fas fa-eye me-2 my-auto" ng-click="XemNoidung(rd)" data-bs-toggle="modal" data-bs-target="#XemNoidung"></i></td>
              <td ng-show="tieude.td5" style="width: 10%;">
                  <div class="btn-group position-static"> <span class="{{rd.Trangthai|FMaunen:TTDuyet}} {{rd.Trangthai|FMauchu:TTDuyet}} p-1 rounded" data-bs-toggle="dropdown" data-bs-auto-close="outside">{{rd.Trangthai|Ftitle:TTDuyet}}</span>
                  <ul class="dropdown-menu" ng-show="         
         {{<?php echo $this->idUser; ?>|Fduyet:rd.idDuyet}}">
                    <li ng-repeat="s1 in TTDuyet" ng-click="UpdateDuyetBaihoc(rd.id,s1.id)">
                      <div class="dropdown-item"><span class="{{s1.id|FMaunen:TTDuyet}} {{s1.id|FMauchu:TTDuyet}} p-1 rounded">{{s1.Thuoctinh}}</span></div>
                    </li>
                  </ul>
                </div></td>
              <td ng-show="tieude.td7" style="width: 10%;"><div class="btn-group position-static" ng-if="rd.idDuyet.length!=0"> <span data-bs-toggle="dropdown" data-bs-auto-close="outside"><i class="fas fa-user-circle"></i></span>
                  <ul class="dropdown-menu">
                    <li><span class="dropdown-item text-danger" ng-repeat="d in rd.idDuyet">{{d|Fname:RListNV}}</span></li>
                  </ul>
                </div></td>
<td ng-show="tieude.td9" style="width: 10%;"><div class="btn-group position-static"> <span data-bs-toggle="dropdown" data-bs-auto-close="outside"><i class="fas fa-user-circle"></i></span>
                              <ul class="dropdown-menu">
                                <li><span class="dropdown-item text-danger">{{rd.idTao|Fname:RListNV}}</span></li>
                              </ul>
                            </div></td>          
              <td ng-show="tieude.td8" style="width: 10%;"><div ng-bind-html="rd.Ghichu" class="ellipsis"></div></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
