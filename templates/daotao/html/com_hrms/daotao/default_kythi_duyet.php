<?php
defined( '_JEXEC' )or die;
use Joomla\ CMS\ Router\ Route;
?>
<div class="row position-relative">
  <div class="overflow-scroll">
    <div class="d-flex">
      <div class="table mt-3 ghichu">
        <table class="table dauviec table-centered table-nowrap mb-0 rounded text-center table-bordered table-hover">
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
                    <h6><i class="fas fa-plus-circle" ng-click="addKythi()" data-bs-toggle="modal" data-bs-target="#CRUDKythi"></i></h6>
                  </div>
                </div>
              </th>
              <th ng-show="tieude.td1" style="width: 10%;"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Chủ Đề <i class="fas fa-ellipsis-h"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="mb-3">
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                          <select chosen class="form-control text-danger" ng-model="timkiem.idChude" ng-options="s.id as s.Tenchude for s in RFChude">
                            <option value="" selected>Vui lòng chọn</option>
                          </select>
                          <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('idChude')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('idChude')"> <i class="fas fa-sort-down"></i> </span> </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </th>
    <th ng-show="tieude.td2" style="width: 10%;"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Loại Kỳ Thi <i class="fas fa-ellipsis-h"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="mb-3">
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                          <input ng-model="timkiem.ordering" type="text" class="form-control col-12" placeholder="Tìm Kiếm">
                          <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('ordering')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('ordering')"> <i class="fas fa-sort-down"></i> </span> </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </th>            
              <th ng-show="tieude.td1" style="width: 10%;"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Tên Kỳ Thi <i class="fas fa-ellipsis-h"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="mb-3">
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                          <select chosen class="form-control text-danger" ng-model="timkiem.idChude" ng-options="s.id as s.Tenchude for s in RFChude">
                            <option value="" selected>Vui lòng chọn</option>
                          </select>
                          <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('idChude')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('idChude')"> <i class="fas fa-sort-down"></i> </span> </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </th>
              <th ng-show="tieude.td2" style="width: 10%;"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Hình Thức Thi <i class="fas fa-ellipsis-h"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="mb-3">
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                          <input ng-model="timkiem.ordering" type="text" class="form-control col-12" placeholder="Tìm Kiếm">
                          <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('ordering')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('ordering')"> <i class="fas fa-sort-down"></i> </span> </div>
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
                          <input ng-model="timkiem.ordering" type="text" class="form-control col-12" placeholder="Tìm Kiếm">
                          <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('ordering')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('ordering')"> <i class="fas fa-sort-down"></i> </span> </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </th>                
              <th ng-show="tieude.td2" style="width: 10%;"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Bắt Đầu<i class="fas fa-ellipsis-h"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="mb-3">
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                          <input ng-model="timkiem.ordering" type="text" class="form-control col-12" placeholder="Tìm Kiếm">
                          <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('ordering')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('ordering')"> <i class="fas fa-sort-down"></i> </span> </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </th>
              <th ng-show="tieude.td3" style="width: 10%;"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Kết Thúc<i class="fas fa-ellipsis-h"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="mb-3">
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                          <input ng-model="timkiem" type="text" class="form-control col-12" placeholder="Tìm Kiếm" />
                        </div>
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-sort-amount-up-alt"></i> </span>
                          <input disabled class="form-control col-12" placeholder="Tăng Dần" />
                        </div>
                        <div class="input-group"> <span class="input-group-text"> <i class="fas fa-sort-amount-down"></i> </span>
                          <input disabled class="form-control col-12" placeholder="Giảm Dần" />
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </th>              
              <th ng-show="tieude.td4" style="width: 10%;"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Tên Nhóm <i class="fas fa-ellipsis-h"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="mb-3">
                        <div class="input-group mb-2" ng-click="timkiem={}"> <span class="input-group-text"> <i class="fas fa-sort-amount-up-alt"></i> </span> </div>
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                          <select chosen multiple class="form-control text-danger" ng-model="timkiem.Trangthai" ng-options="s.id as s.Thuoctinh for s in TTDuyet">
                            <option value="" selected>Vui lòng chọn</option>
                          </select>
                        </div>
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-sort-amount-up-alt"></i> </span>
                          <input disabled class="form-control col-12" placeholder="Tăng Dần" />
                        </div>
                        <div class="input-group"> <span class="input-group-text"> <i class="fas fa-sort-amount-down"></i> </span>
                          <input disabled class="form-control col-12" placeholder="Giảm Dần" />
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </th>
              <th ng-show="tieude.td5" style="width: 10%;"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Học Viên <i class="fas fa-ellipsis-h"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="mb-3">
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                          <select chosen class="form-control text-danger" ng-model="Lichhop.idChutri" ng-options="s.id as s.name for s in RListNV">
                            <option value="" selected>Vui lòng chọn</option>
                          </select>
                        </div>
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-sort-amount-up-alt"></i> </span>
                          <input disabled class="form-control col-12" placeholder="Tăng Dần" />
                        </div>
                        <div class="input-group"> <span class="input-group-text"> <i class="fas fa-sort-amount-down"></i> </span>
                          <input disabled class="form-control col-12" placeholder="Giảm Dần" />
                        </div>
                      </div>
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
                          <select chosen class="form-control text-danger" ng-model="Lichhop.idChutri" ng-options="s.id as s.name for s in RListNV">
                            <option value="" selected>Vui lòng chọn</option>
                          </select>
                        </div>
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-sort-amount-up-alt"></i> </span>
                          <input disabled class="form-control col-12" placeholder="Tăng Dần" />
                        </div>
                        <div class="input-group"> <span class="input-group-text"> <i class="fas fa-sort-amount-down"></i> </span>
                          <input disabled class="form-control col-12" placeholder="Giảm Dần" />
                        </div>
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
                    <li class="p-2">
                      <div class="mb-3">
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                          <select chosen class="form-control text-danger" ng-model="Lichhop.idChutri" ng-options="s.id as s.name for s in RListNV">
                            <option value="" selected>Vui lòng chọn</option>
                          </select>
                        </div>
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-sort-amount-up-alt"></i> </span>
                          <input disabled class="form-control col-12" placeholder="Tăng Dần" />
                        </div>
                        <div class="input-group"> <span class="input-group-text"> <i class="fas fa-sort-amount-down"></i> </span>
                          <input disabled class="form-control col-12" placeholder="Giảm Dần" />
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </th>
              <th ng-show="tieude.td7" style="width: 20%;"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Ghi Chú <i class="fas fa-ellipsis-h"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="mb-3">
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                          <input ng-model="timkiem" type="text" class="form-control col-12" placeholder="Tìm Kiếm" />
                        </div>
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-sort-amount-up-alt"></i> </span>
                          <input disabled class="form-control col-12" placeholder="Tăng Dần" />
                        </div>
                        <div class="input-group"> <span class="input-group-text"> <i class="fas fa-sort-amount-down"></i> </span>
                          <input disabled class="form-control col-12" placeholder="Giảm Dần" />
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="rd in RAKythi | filter:timkiem">
              <td style="width: 10%;"><div class="dropdown position-static my-auto">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown">
                    <div class="d-flex justify-content-center flex-column">{{$index+1}} <i class="fas fa-ellipsis-h my-auto"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2" ng-click="editKythi(rd)" data-bs-toggle="modal" data-bs-target="#CRUDKythi"><i class="fas fa-edit text-info"></i> Sửa</li>
                    <li class="p-2" data-bs-toggle="modal" data-bs-target="#XoaHang" ng-click="removeKythi(rd)" ng-if="Quyen.pq14"><i class="fas fa-trash-alt text-danger"></i> Xóa</li>
                  </ul>
                </div></td>
              <td ng-show="tieude.td1" style="width: 10%;">{{rd.Dethi.idChude|FCustom:'Tenchude':RChude}}</td>
              <td ng-show="tieude.td3" style="width: 10%;">{{rd.Loaithi|FCustom:'Thuoctinh':ListLoaiKythi}}</td>
              <td ng-show="tieude.td2" style="width: 10%;">{{rd.Tenkythi}}</td>
              <td ng-show="tieude.td3" style="width: 10%;">{{rd.Hinhthuc|FCustom:'Title':ListHinhthuc}}</td>
              <td ng-show="tieude.td2" style="width: 10%;"><div ng-if="rd.Dethi" class="input-group justify-content-center" data-bs-toggle="modal" data-bs-target="#ShowDethi" ng-click="ShowDethi(rd)"> <span class="input-group-text">Đề Thi Số {{rd.Dethi.ordering}} </span> </div></td>
              <td ng-show="tieude.td3" style="width: 10%;"> {{rd.Batdau | date:'HH:mm'}} <br>
                {{rd.Batdau | date:'dd/MM/yy'}} </td>
              <td ng-show="tieude.td3" style="width: 10%;"> {{rd.Ketthuc | date:'HH:mm'}} <br>
                {{rd.Ketthuc | date:'dd/MM/yy'}} </td> 
              <td ng-show="tieude.td6" style="width: 10%;"><div class="btn-group position-static" ng-if="rd.idVitri.length!=0"> <span data-bs-toggle="dropdown" data-bs-auto-close="outside"><i class="fas fa-user-circle"></i> <span ng-if="rd.idVitri.length>2"> + {{rd.idVitri.length-1}}</span></span>
                  <ul class="dropdown-menu">
                    <li><span class="dropdown-item text-danger" ng-repeat="x in rd.idVitri">{{x|FCustom:'Tennhom':RNhomnguoidung}}</span></li>
                  </ul>
                </div></td>
  <td ng-show="tieude.td6" style="width: 10%;"><div class="btn-group position-static" ng-if="rd.idHV.length!=0"> <span data-bs-toggle="dropdown" data-bs-auto-close="outside"><i class="fas fa-user-circle"></i> <span ng-if="rd.idHV.length>2"> + {{rd.idHV.length-1}}</span></span>
                  <ul class="dropdown-menu">
                    <li><span class="dropdown-item text-danger" ng-repeat="x in rd.idHV">{{x|Fname:RListNV}}</span></li>
                  </ul>
                </div></td>              
              <td ng-show="tieude.td5" style="width: 10%;"><div class="btn-group position-static"> <span class="{{rd.Trangthai|FMaunen:TTDuyet}} {{rd.Trangthai|FMauchu:TTDuyet}} p-1 rounded" data-bs-toggle="dropdown" data-bs-auto-close="outside">{{rd.Trangthai|Ftitle:TTDuyet}}</span>
                  <ul class="dropdown-menu" ng-show="         
         {{<?php echo $this->idUser; ?>|Fduyet:rd.idDuyet}}">
                    <li ng-repeat="s1 in TTDuyet" ng-click="UpdateTTDuyetKT(rd.id,s1.id)">
                      <div class="dropdown-item"><span class="{{s1.id|FMaunen:TTDuyet}} {{s1.id|FMauchu:TTDuyet}} p-1 rounded">{{s1.Thuoctinh}}</span></div>
                    </li>
                  </ul>
                </div></td> 
                
   <td ng-show="tieude.td6" style="width: 10%;"><div class="btn-group position-static" ng-if="rd.idDuyet.length!=0"> <span data-bs-toggle="dropdown" data-bs-auto-close="outside"><i class="fas fa-user-circle"></i> <span ng-if="rd.idDuyet.length>2"> + {{rd.idDuyet.length-1}}</span></span>
                  <ul class="dropdown-menu">
                    <li><span class="dropdown-item text-danger" ng-repeat="x in rd.idDuyet">{{x|Fname:RListNV}}</span></li>
                  </ul>
                </div></td> 
              <td ng-show="tieude.td8" style="width: 20%;"><div ng-bind-html="rd.Ghichu"></div></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
