<div class="bg-white shadow border-0 rounded border-light p-4 w-100" ng-init="OninitQuytrinh();">
  <div class="row" ng-init="activeCD=true">
<!--
    <div ng-class="!localStorage.MenuCD ? 'col-3' : 'd-none'" class="position-relative overflow-scroll">
      <div class="row card mb-3">
        <div class="card-header p-2 d-flex bg-primary "> <span class="me-2 my-auto badge rounded-pill bg-info text-white">{{Vitri.length}}</span> <span class="ms-2 text-white"> Vị Trí Đào Tạo</span> </div>
        <div class="card-body p-2">
          <div class="input-group"> <span class="input-group-text"> <i class="fas fa-search"></i></i></span>
            <select chosen class="input-group-text form-control" ng-model="Locid" ng-options="s.Thuoctinh as s.Thuoctinh for s in Vitri">
              <option value="" selected>Vui lòng chọn</option>
            </select>
            <span class="input-group-text"><i class="fas fa-sync-alt mx-3 my-auto" ng-click="Locid=''"></i></span> </div>
        </div>
      </div>
      <ul class="nav nav-pills square nav-fill flex-column vertical-tab mb-3 mb-lg-0">
        <li class="nav-item" ng-repeat="item in Vitri |filter:Locid" ng-click="SelectQuytrinh(item)"> <a class="nav-link" ng-class="$first?'active':''" id="home-tab-3" data-bs-toggle="tab" href="#tab-{{item.id}}"><span class="d-block"> {{item.Thuoctinh}} </span></a> </li>
      </ul>
    </div>
-->
    <div ng-class="!localStorage.MenuCD ? 'col-12' : 'col-12'">
      <button class="btn btn-primary me-2"  ng-click="Store('MenuCD',!localStorage.MenuCD)"><i class="fas fa-bars m-auto"></i></button>
      <span class="m-auto badge">
      <h3>{{Quytrinh.TenVitri}}</h3>
      </span>
      <div class="card border-0">
        <div class="card-body py-0">
          <div class="tab-content" id="tabcontent">
            <div ng-repeat="item1 in Vitri |filter:Locid" class="tab-pane fade" ng-class="$first?'active show':''" id="tab-{{item1.id}}">
              <div class="row position-relative">
                <div class="overflow-scroll">
                  <div class="d-flex">
                    <div class="table mt-3 ghichu">
                      <table class="table dauviec dauviec-sm table-centered table-nowrap mb-0 rounded text-center table-bordered table-hover">
                        <thead class="thead-light">
                          <tr>
                            <th style="width: 10%;"> <div class="d-flex justify-content-center ">
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
                                      <div class="form-check form-switch"> Mã Tài Liệu
                                        <input class="form-check-input" type="checkbox" ng-model="tieude.td2" checked />
                                      </div>
                                    </li>
                                    <li class="p-2">
                                      <div class="form-check form-switch"> Tài Liệu
                                        <input class="form-check-input" type="checkbox" ng-model="tieude.td3" checked />
                                      </div>
                                    </li>
                                    <li class="p-2">
                                      <div class="form-check form-switch"> Nội dung
                                        <input class="form-check-input" type="checkbox" ng-model="tieude.td4" checked />
                                      </div>
                                    </li>
                                    <li class="p-2">
                                      <div class="form-check form-switch"> Tác Giả
                                        <input class="form-check-input" type="checkbox" ng-model="tieude.td5" checked />
                                      </div>
                                    </li>
                                    <li class="p-2">
                                      <div class="form-check form-switch"> Ngày Hiệu Lực
                                        <input class="form-check-input" type="checkbox" ng-model="tieude.td6" checked />
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
                                  <h6><i class="fas fa-plus-circle" data-bs-toggle="modal" data-bs-target="#CRUDForm"></i></h6>
                                </div>
                              </div>
                            </th>
              <th ng-show="tieude.td1" style="width: 10%;"> <div class="dropdown position-static">
                                <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                  <div class="d-flex justify-content-center flex-column">Vị Trí<i class="fas fa-ellipsis-h"></i></div>
                                </div>
                                <ul class="dropdown-menu">
                                  <li class="p-2">
                                    <div class="mb-3">
                                      <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                        <select chosen class="form-control text-danger" ng-model="timkiem.idRoot" ng-options="s.idRoot as s.idRoot|FCustom:'Tenchude':RChude for s in (RAQuytrinh|unique:'idRoot')">
                                        </select>
                                        <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('idRoot')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('idRoot')"> <i class="fas fa-sort-down"></i> </span> </div>
                                    </div>
                                  </li>
                                </ul>
                              </div>
                            </th>  
                             <th ng-show="tieude.td1" style="width: 10%;"> <div class="dropdown position-static">
                                <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                  <div class="d-flex justify-content-center flex-column">Nội dung<i class="fas fa-ellipsis-h"></i></div>
                                </div>
                                <ul class="dropdown-menu">
                                  <li class="p-2">
                                    <div class="mb-3">
                                      <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                        <select chosen class="form-control text-danger" ng-model="timkiem.idRoot" ng-options="s.idRoot as s.idRoot|FCustom:'Tenchude':RChude for s in (RAQuytrinh|unique:'idRoot')">
                                        </select>
                                        <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('idRoot')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('idRoot')"> <i class="fas fa-sort-down"></i> </span> </div>
                                    </div>
                                  </li>
                                </ul>
                              </div>
                            </th>                       
                            <th ng-show="tieude.td1" style="width: 20%;"> <div class="dropdown position-static">
                                <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                  <div class="d-flex justify-content-center flex-column">Mô Tả<i class="fas fa-ellipsis-h"></i></div>
                                </div>
                                <ul class="dropdown-menu">
                                  <li class="p-2">
                                    <div class="mb-3">
                                      <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                        <select chosen class="form-control text-danger" ng-model="timkiem.idRoot" ng-options="s.idRoot as s.idRoot|FCustom:'Tenchude':RChude for s in (RAQuytrinh|unique:'idRoot')">
                                        </select>
                                        <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('idRoot')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('idRoot')"> <i class="fas fa-sort-down"></i> </span> </div>
                                    </div>
                                  </li>
                                </ul>
                              </div>
                            </th>
                            <th ng-show="tieude.td2" style="width: 10%;"> <div class="dropdown position-static">
                                <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                  <div class="d-flex justify-content-center flex-column">Thời Gian<i class="fas fa-ellipsis-h"></i></div>
                                </div>
                                <ul class="dropdown-menu">
                                  <li class="p-2">
                                    <div class="mb-3">
                                      <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                        <input ng-model="timkiem.Tenquytrinh" type="text" class="form-control col-12" placeholder="Tìm Kiếm">
                                        <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Tenquytrinh')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Tenquytrinh')"> <i class="fas fa-sort-down"></i> </span> </div>
                                    </div>
                                  </li>
                                </ul>
                              </div>
                            </th>
                            <th ng-show="tieude.td2" style="width: 10%;"> <div class="dropdown position-static">
                                <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                  <div class="d-flex justify-content-center flex-column">Lịch<i class="fas fa-ellipsis-h"></i></div>
                                </div>
                                <ul class="dropdown-menu">
                                  <li class="p-2">
                                    <div class="mb-3">
                                      <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                        <select chosen class="form-control text-danger" ng-model="timkiem.ordering" ng-options="s.ordering as 'Đề Thi Số '+s.ordering for s in (RAQuytrinh|unique:'ordering')">
                                        </select>
                                        <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('ordering')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('ordering')"> <i class="fas fa-sort-down"></i> </span> </div>
                                    </div>
                                  </li>
                                </ul>
                              </div>
                            </th>
                            <th ng-show="tieude.td3" style="width: 10%;"> <div class="dropdown position-static">
                                <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                  <div class="d-flex justify-content-center flex-column">Học Viên <i class="fas fa-ellipsis-h"></i></div>
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
                                  <div class="d-flex justify-content-center flex-column">Đối Tượng<i class="fas fa-ellipsis-h"></i></div>
                                </div>
                                <ul class="dropdown-menu">
                                  <li class="p-2">
                                    <div class="mb-3">
                                      <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                        <select multiple chosen class="form-control text-danger" ng-model="Trangthai" ng-options="s.id as s.Thuoctinh for s in TTDuyet">
                                        </select>
                                        <span class="input-group-text" ng-click="Trangthai=''"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Trangthai')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Trangthai')"> <i class="fas fa-sort-down"></i> </span> </div>
                                    </div>
                                  </li>
                                </ul>
                              </div>
                            </th>
                            
                <th ng-show="tieude.td6" style="width: 10%;"> <div class="dropdown position-static">
                                <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                  <div class="d-flex justify-content-center flex-column">Trạng Thái <i class="fas fa-ellipsis-h"></i></div>
                                </div>
                                <ul class="dropdown-menu">
                                  <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                    <select multiple chosen class="form-control text-danger" ng-model="Nguoiduyet" ng-options="s.idDuyet as s.idDuyet|FCustom:'name':RListNV for s in (RAQuytrinh|unique:'idDuyet')">
                                    </select>
                                    <span class="input-group-text" ng-click="Nguoiduyet={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Nguoiduyet')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Nguoiduyet')"> <i class="fas fa-sort-down"></i> </span> </div>
                                </ul>
                              </div>
                            </th>  
   <th ng-show="tieude.td6" style="width: 10%;"> <div class="dropdown position-static">
                                <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                  <div class="d-flex justify-content-center flex-column">Người Duyệt <i class="fas fa-ellipsis-h"></i></div>
                                </div>
                                <ul class="dropdown-menu">
                                  <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                    <select multiple chosen class="form-control text-danger" ng-model="Nguoiduyet" ng-options="s.idDuyet as s.idDuyet|FCustom:'name':RListNV for s in (RAQuytrinh|unique:'idDuyet')">
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
                          <tr ng-repeat="rd in RQuytrinh = RAQuytrinh">
                            <td style="width: 10%;"><div class="dropdown position-static my-auto">
                                <div class="dropdown-toggle" data-bs-toggle="dropdown">
                                  <div class="d-flex justify-content-center flex-column">{{$index+1}} <i class="fas fa-ellipsis-h my-auto"></i></div>
                                </div>
                                <ul class="dropdown-menu">
                                  <li class="p-2" ng-click="editQuytrinh(rd)" data-bs-toggle="modal" data-bs-target="#CRUDForm"><i class="fas fa-edit text-info"></i> Sửa</li>
                                  <li class="p-2" data-bs-toggle="modal" data-bs-target="#XoaHang" ng-click="removeQuytrinh(rd)" ng-if="Quyen.pq14"><i class="fas fa-trash-alt text-danger"></i> Xóa</li>
                                </ul>
                              </div></td>
                            <td ng-show="tieude.td1" style="width: 10%;">{{rd.idVitri}}</span></td>       
                            <td ng-show="tieude.td1" style="width: 10%;"><span ng-bind-html="rd.Noidung"></span></td>                                      
                            <td ng-show="tieude.td1" style="width: 20%;"><span class="ellipsis" ng-bind-html="rd.Mota"></span><i class="fas fa-eye me-2 my-auto" ng-click="XemNoidung(rd)" data-bs-toggle="modal" data-bs-target="#XemNoidung"></i></td>
                            <td ng-show="tieude.td2" style="width: 10%;">{{rd.TGDT}}</td>
                            <td ng-show="tieude.td2" style="width: 10%;">{{rd.LichDT}}</td>
                            <td ng-show="tieude.td2" style="width: 10%;">
                             <div class="btn-group position-static" ng-if="rd.idHV.length!=0"> 
                            <span data-bs-toggle="dropdown" data-bs-auto-close="outside">
                        <i class="fas fa-user-circle"></i> <span ng-if="rd.idHV.length>1">+{{rd.idHV.length-1}}</span> </span>
                                <ul class="dropdown-menu">
                                  <li><span class="dropdown-item text-danger" ng-repeat="d in rd.idHV">{{d|Fname:RListNV}}</span></li>
                                </ul>
                              </div> 
                              
                              </td>
                            <td ng-show="tieude.td2" style="width: 10%;">{{rd.idDoituong}}</td>
                            <td ng-show="tieude.td5" style="width: 10%;"><div class="btn-group position-static"> <span class="{{rd.Trangthai|FMaunen:TTDuyet}} {{rd.Trangthai|FMauchu:TTDuyet}} p-1 rounded" data-bs-toggle="dropdown" data-bs-auto-close="outside">{{rd.Trangthai|Ftitle:TTDuyet}}</span>
                                <ul class="dropdown-menu" ng-show="         
           {{<?php echo $this->idUser; ?>|Fduyet:rd.idDuyet}}">
                                  <li ng-repeat="s1 in TTDuyet" ng-click="UpdateDuyetQuytrinh(rd.id,s1.id)">
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
                            <td ng-show="tieude.td8" style="width: 10%;"><div class="ellipsis" ng-bind-html="rd.Ghichu"></div></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="XemNoidung" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Nội Dung {{ViewNoidung.Tenlop}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="ytplayer">
        <div class="row p-3">
          <div class="container text-center noidung" ng-bind-html="ViewNoidung.Noidung"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" ng-click="CloseYoutube()" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="CRUDForm" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{Quytrinh.Title}} {{Quytrinh.TenVitri}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row p-3">
          <div class="mb-3 col-6">
            <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Quytrinh.Noidung" class="form-control text-danger" placeholder="Nội Dung"></textarea>
          </div>       
        <div class="mb-3 col-6">
            <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Quytrinh.Mota" class="form-control text-danger" placeholder="Mô Tả"></textarea>
          </div>
          <div class="mb-3 col-6">
            <div class="input-group"> <span class="input-group-text">Thời Gian</span>   
                            <input type="text" ng-model="Quytrinh.TGDT" id="LHKT" class="form-control text-danger flatpickr-input" placeholder="Chọn Thời Gian Đào Tạo">  
            </div>
          </div>
          <div class="mb-3 col-6">
            <div class="input-group"> <span class="input-group-text">Lịch</span>
                 <input type="text" ng-model="Quytrinh.LichDT" id="LHKT" class="form-control text-danger flatpickr-input" placeholder="Chọn Lịch Đào Tạo">      
            </div>
          </div>
          <div class="mb-3 col-4">
            <div class="input-group"> <span class="input-group-text">Học Viên</span>
                <select chosen multiple class="form-control text-danger" ng-model="Quytrinh.idHV" ng-options="s.id as s.name for s in RListNV">
                        </select>
                      </div>  
          </div>
          <div class="mb-3 col-4">
                <div class="input-group"> <span class="input-group-text">Đối Tượng</span>
                        <select chosen class="form-control text-danger" ng-model="Quytrinh.idDoituong" ng-options="s.id as s.Title for s in Doituongnhanvien">
                          <option value="" selected>Vui lòng chọn</option>
                        </select>
                      </div>  
          </div>
          <div class="mb-3 col-4">
            <div class="input-group"> <span class="input-group-text">Người Duyệt</span>
              <select multiple chosen class="w-100" ng-model="Quytrinh.idDuyet" ng-options="s.id as s.name for s in (RListNV|FKiemduyet:NhomDuyet)">
              </select>
            </div>
          </div>
          <div class="mb-3">
            <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Quytrinh.Ghichu" class="form-control text-danger" placeholder="Ghi Chú"></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button ng-if="Quytrinh.CRUD==0" class="btn btn-info" ng-click="CreateQuytrinh(Quytrinh)">Tạo Mới</button>
        <button ng-if="Quytrinh.CRUD!=0"class="btn btn-success text-white" ng-click="UpdateQuytrinh(Quytrinh)">Cập Nhật</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="ShowDethi" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-dialog-scrollable modal-lg hinhcauhoi">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> Đề Thi Số {{Dethiso}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div ng-repeat="ch in RCauhoiindethi">
            <div class="card mb-3">
              <div class="card-header text-white bg-primary p-2">
                <div> Câu Số {{$index+1}} - {{ch.Diem}} Điểm</div>
              </div>
              <div class="card-body"> <span ng-bind-html="ch.Cauhoi"></span>
                <div ng-if="ch.Dapan.type==1">
                  <textarea class="form-control" placeholder="Trả Lời"></textarea>
                </div>
                <div ng-if="ch.Dapan.type==0">
                  <div ng-repeat="tl in ch.Traloi"> <span class="me-2 badge rounded-pill bg-primary">{{tl.id|FABC}}</span> {{tl.value}}</div>
                </div>
              </div>
              <div class="card-footer text-white bg-info p-2">
                <div ng-if="ch.Dapan.type==0">Đáp Án Trắc Nghiệm : <span class="me-2 badge rounded-pill bg-danger">{{ch.Dapan.data.id|FABC}}</span> {{ch.Dapan.data.value}} </div>
                <div ng-if="ch.Dapan.type!=0">Đáp Án Tự Luận :<span ng-bind-html="ch.Dapan.data"></span> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" class="btn btn-secondary" data-bs-dismiss="modal">
        Đóng
        </button>
      </div>
    </div>
  </div>
</div>
