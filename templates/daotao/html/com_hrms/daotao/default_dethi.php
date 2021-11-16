<div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100" ng-init="OninitDethi()">
  <div class="row">
    <div ng-class="!localStorage.MenuCD ? 'col-3' : 'd-none'"><?php echo $this->loadTemplate('chude_dethi'); ?></div>
    <div ng-class="!localStorage.MenuCD ? 'col-9' : 'col-12'">
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <div>
            <button class="btn btn-primary me-2"  ng-click="Store('MenuCD',!localStorage.MenuCD)"><i class="fas fa-bars m-auto"></i></button>
          </div>
          <button class="nav-link" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-cauhoi" type="button" role="tab" aria-controls="nav-home" aria-selected="true" ng-class="{'active': localStorage.TabDT==0}" ng-click="Store('TabDT',0);Phantrang(Daduyet,SLitem,Chontrang)">Ngân Hàng Đề Thi <span class="badge bg-info">{{Daduyet.length}}</span></button>
          <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false" ng-class="{'active': localStorage.TabDT==1}" ng-click="Store('TabDT',1);Phantrang(RADethi,SLitem,Chontrang)"> <i class="fas fa-user-check me-2"></i> Duyệt Đề Thi <span class="badge bg-danger">{{RADethi.length-Daduyet.length}}</span> </button>
          <div class="d-flex ms-auto">
            <div class="me-3">
              <div class="input-group"> <span class="input-group-text"><span class="badge bg-primary me-2">{{RADethi.length}}</span> Đề Thi </span> </div>
            </div>
            <div class="me-3">
              <div class="input-group"> <span class="input-group-text"> Trang </span>
                <select class="form-select" ng-model="Chontrang" ng-change="Pagechose(Chontrang)">
                  <option selected ng-value="{{pag}}" ng-repeat="pag in Pagination">{{pag+1}}</option>
                </select>
                <span class="input-group-text">/ {{Sotrang || '0'}}</span> </div>
            </div>
            <div>
              <div class="input-group"> <span class="input-group-text"> Hiển Thị </span>
                <select class="form-select w-25" ng-model="SLitem" ng-change="Phantrang(RATailieu,SLitem)" ng-options="s.value as s.title for s in SLHienthi">
                </select>
              </div>
            </div>
          </div>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade" ng-class="{'show active': localStorage.TabDT==0}" id="nav-cauhoi" role="tabpanel" aria-labelledby="nav-home-tab">
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
                            <div> </div>
                          </div>
                        </th>
<!--
                        <th ng-show="tieude.td1" style="width: 10%;"> <div class="dropdown position-static">
                            <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                              <div class="d-flex justify-content-center flex-column">Chủ Đề <i class="fas fa-ellipsis-h"></i></div>
                            </div>
                            <ul class="dropdown-menu">
                              <li class="p-2">
                                <div class="mb-3">
                                  <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                    <select chosen class="form-control text-danger" ng-model="timkiem.idChude" ng-options="s.idChude as s.idChude|FCustom:'Tenchude':RChude for s in (Dethigoc|unique:'idChude')">
                                    </select>
                                    <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('idChude')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('idChude')"> <i class="fas fa-sort-down"></i> </span> </div>
                                </div>
                              </li>
                            </ul>
                          </div>
                        </th>
-->
 <th ng-show="tieude.td1" style="width: 10%;"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Tài Liệu Nguồn <i class="fas fa-ellipsis-h"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="mb-3">
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
     
                          <select chosen class="form-control text-danger" ng-model="timkiem.idTLN" ng-options="s.idTLN as s.idTLN|FCustom:'Tentailieu':RATailieu for s in (Dethigoc|unique:'idTLN')">
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
                              <div class="d-flex justify-content-center flex-column">Mã Đề Thi <i class="fas fa-ellipsis-h"></i></div>
                            </div>
                            <ul class="dropdown-menu">
                              <li class="p-2">
                                <div class="mb-3">
                                  <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                    <select chosen class="form-control text-danger" ng-model="timkiem.ordering" ng-options="s.ordering as 'Đề Thi Số '+s.ordering for s in (Dethigoc|unique:'ordering')">
                                    </select>
                                    <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('ordering')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('ordering')"> <i class="fas fa-sort-down"></i> </span> </div>
                                </div>
                              </li>
                            </ul>
                          </div>
                        </th>
                        <th ng-show="tieude.td2" style="width: 10%;"> <div class="d-flex justify-content-center flex-column">Câu hỏi</div>
                        </th>
                        <th ng-show="tieude.td7" style="width: 10%;"> <div class="dropdown position-static">
                            <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                              <div class="d-flex justify-content-center flex-column">Trạng Thái<i class="fas fa-ellipsis-h"></i></div>
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
                              <div class="d-flex justify-content-center flex-column" ng-click="ResetDethi()">Người Tạo <i class="fas fa-ellipsis-h"></i></div>
                            </div>
                            <ul class="dropdown-menu">
                              <li class="p-2">
                                <div class="mb-3">
                                  <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                    <select chosen class="form-control text-danger" ng-model="timkiem.idTao" ng-options="s.idTao as s.idTao|Fname:RListNV for s in (Dethigoc|unique:'idTao')">
                                    </select>
                                    <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('idTao')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('idTao')"> <i class="fas fa-sort-down"></i> </span> </div>
                                </div>
                              </li>
                            </ul>
                          </div>
                        </th>
                        <th ng-show="tieude.td8" style="width: 10%;"> <div class="dropdown position-static">
                            <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                              <div class="d-flex justify-content-center flex-column" ng-click="ResetDethi()">Người Duyệt <i class="fas fa-ellipsis-h"></i></div>
                            </div>
                            <ul class="dropdown-menu">
                              <li class="p-2">
                                <div class="mb-3">
                                  <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                    <select multiple chosen class="form-control text-danger" ng-model="Nguoiduyet" ng-options="s.idDuyet as s.idDuyet|FCustom:'name':RListNV for s in (Dethigoc|unique:'idDuyet')">
                                    </select>
                                    <span class="input-group-text" ng-click="Nguoiduyet={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Nguoiduyet')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Nguoiduyet')"> <i class="fas fa-sort-down"></i> </span> </div>
                                </div>
                              </li>
                            </ul>
                          </div>
                        </th>
                        <th ng-show="tieude.td8" style="width: 10%;"> <div class="dropdown position-static">
                            <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                              <div class="d-flex justify-content-center flex-column">Ngày Tạo <i class="fas fa-ellipsis-h"></i></div>
                            </div>
                            <ul class="dropdown-menu">
                              <li class="p-2">
                                <div class="mb-3">
                                  <div class="input-group"> <span class="input-group-text"> Từ </span>
                                    <input type="date" class="form-control text-danger" ng-model="timkiem.from" />
                                    <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> </div>
                                </div>
                                <div class="mb-3">
                                  <div class="input-group"> <span class="input-group-text"> Đến </span>
                                    <input type="date" class="form-control text-danger" ng-model="timkiem.to" />
                                    <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Ngaytao')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Ngaytao')"> <i class="fas fa-sort-down"></i> </span> </div>
                                </div>
                              </li>
                            </ul>
                          </div>
                        </th>
                        <th ng-show="tieude.td9" style="width: 20%;"> <div class="dropdown position-static">
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
                      <tr ng-repeat="rd in Daduyet = (RADethi |FMT:Trangthai:'Trangthai'|FMT:Nguoiduyet:'idDuyet' | filter:timkiem| orderBy:propertyName:reverse |filter:{Trangthai:2})">
                        <td style="width: 10%;"><div class="dropdown position-static my-auto">
                            <div class="dropdown-toggle" data-bs-toggle="dropdown">
                              <div class="d-flex justify-content-center flex-column">{{$index+1}} <i class="fas fa-ellipsis-h my-auto"></i></div>
                            </div>
                            <ul class="dropdown-menu">
                              <li class="p-2" ng-click="editDethi(rd)"><i class="fas fa-edit text-info"></i> Sửa</li>
                              <!--                    <li class="p-2" ng-click="copyCauhoi(rc)"><i class="far fa-copy text-primary"></i> Sao Chép</li>-->
                              <li class="p-2" data-bs-toggle="modal" data-bs-target="#XoaHang" ng-click="removeDethi(rd)" ng-if="Quyen.pq14"><i class="fas fa-trash-alt text-danger"></i> Xóa</li>
                            </ul>
                          </div></td>
<!--                        <td ng-show="tieude.td1" style="width: 10%;">{{rd.idChude|FTenchude:RChude}}</td>-->
                        <td ng-show="tieude.td1" style="width: 10%;">{{rd.idTLN|FCustom:'Tentailieu':RATailieu}}</td>
                        <td ng-show="tieude.td1" style="width: 10%;">Đề Thi Số {{rd.ordering}}</td>
                        <td ng-show="tieude.td2" style="width: 10%;"><div class="input-group justify-content-center" data-bs-toggle="modal" data-bs-target="#cauhoiindethi" ng-click="ShowCauhoi(rd)"> <span class="input-group-text"><span class="badge bg-primary me-2">{{rd.idCH.length}}</span> Câu hỏi </span> </div></td>
                        <td ng-show="tieude.td1" style="width: 10%;"><div class="btn-group position-static"> <span class="{{rd.Trangthai|FMaunen:TTDuyet}} {{rd.Trangthai|FMauchu:TTDuyet}} p-1 rounded" data-bs-toggle="dropdown" data-bs-auto-close="outside">{{rd.Trangthai|Ftitle:TTDuyet}}</span>
                            <ul class="dropdown-menu" ng-show="         
         {{<?php echo $this->idUser; ?>|Fduyet:rd.idDuyet}}">
                              <li ng-repeat="s1 in TTDuyet" ng-click="UpdateTTDuyetDT(rd.id,s1.id)">
                                <div class="dropdown-item"><span class="{{s1.id|FMaunen:TTDuyet}} {{s1.id|FMauchu:TTDuyet}} p-1 rounded">{{s1.Thuoctinh}}</span></div>
                              </li>
                            </ul>
                          </div></td>
                        <td ng-show="tieude.td6" style="width: 10%;"><div class="btn-group position-static"> <span data-bs-toggle="dropdown" data-bs-auto-close="outside"><i class="fas fa-user-circle"></i></span>
                            <ul class="dropdown-menu">
                              <li><span class="dropdown-item text-danger">{{rd.idTao|Fname:RListNV}}</span></li>
                            </ul>
                          </div></td>
                        <td ng-show="tieude.td7" style="width: 10%;"><div class="btn-group position-static" ng-if="rd.idDuyet.length!=0"> <span data-bs-toggle="dropdown" data-bs-auto-close="outside"><i class="fas fa-user-circle"></i></span>
                            <ul class="dropdown-menu">
                              <li><span class="dropdown-item text-danger" ng-repeat="d in rd.idDuyet">{{d|Fname:RListNV}}</span></li>
                            </ul>
                          </div></td>
                        <td ng-show="tieude.td1" style="width: 10%;">{{rd.Ngaytao | date:'HH:mm'}} {{rd.Ngaytao | date:'dd/MM/yy'}}</td>
                        <td ng-show="tieude.td1" style="width: 20%;"><div ng-bind-html="rd.Ghichu"></div></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" ng-class="{'show active': localStorage.TabDT==1}" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"><?php echo $this->loadTemplate('dethi_duyet'); ?></div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="cauhoitodethi" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Thêm Câu Hỏi Vào Đề Thi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-6">
              <div class="input-group mb-3"> <span class="input-group-text">Tài Liệu Nguồn</span>
                <select multiple chosen class="form-control text-danger" ng-model="Dethi.idTailieu" ng-options="s.id as s.MaTL +' - '+s.Tentailieu for s in TailieuGoc">
                </select>
                <span class="input-group-text" ng-click="Dethi.idTailieu=''"> <i class="fas fa-sync-alt" ng-click="ResetCauhoi();dtsearch={}"></i> </span> <span class="input-group-text"><span class="badge bg-info me-2">{{RC.length}}</span> Câu Hỏi</span> </div>
              <!--
     <div class="row mb-3">
<div class="col-3"><div class="input-group">
 <span class="input-group-text">Số Câu Dễ</span>
<input class="form-control" type="number" ng-model="Ngaunhien.Caude">
</div></div>
<div class="col-3"><div class="input-group">
 <span class="input-group-text">Số Câu Trung Bình</span>
<input class="form-control" type="number" ng-model="Ngaunhien.CauTB">
</div></div> 
<div class="col-3"> <div class="input-group">
 <span class="input-group-text">Số Câu Khó</span>
<input class="form-control" type="number" ng-model="Ngaunhien.Caukho">
</div> </div>       
<div class="col-3"> 
<button class="btn btn-primary">Ngẫu Nhiên</button> </div>         
    </div>                     
-->
              <div class="row position-relative">
                <div class="overflow-scroll" style="height: 60vh;">
                  <div class="d-flex">
                    <div class="table mt-3 ghichu">
                      <table class="table table-centered table-nowrap mb-0 rounded text-center table-bordered table-hover">
                        <thead class="thead-light">
                          <tr>
                            <th style="width: 10%;"><div class="d-flex justify-content-center">
                                <div class="dropdown position-static">
                                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                    <div class="d-flex justify-content-center flex-column"># <i class="fas fa-ellipsis-h"></i></div>
                                  </div>
                                  <ul class="dropdown-menu">
                                    <li class="p-2">
                                      <div class="mb-3">
                                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                              
                                          <select chosen class="form-control text-danger" ng-model="dtsearch.Dapan.type" ng-options="s.id as s.title for s in TypeCauhoi">
                                               <option value="" selected>Vui lòng chọn</option>
                                          </select>
                                          <span class="input-group-text" ng-click="dtsearch={}"> <i class="fas fa-sync-alt"></i> </span> </div>
                                      </div>
                                    </li>
                                  </ul>
                                </div>
                              </div></th>
                            <th style="width: 20%;"><div class="d-flex justify-content-center">Điểm</div></th>
                            <th ng-show="tieude.td1" style="width: 20%;"> <div class="dropdown position-static">
                                <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                  <div class="d-flex justify-content-center flex-column">Mã Câu Hỏi <i class="fas fa-ellipsis-h"></i></div>
                                </div>
                                <ul class="dropdown-menu">
                                  <li class="p-2">
                                    <div class="mb-3">
                                      <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                        <input class="form-control" type="text" ng-model="dtsearch.MaCH">
                                        <span class="input-group-text" ng-click="dtsearch={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('MaCH')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('MaCH')"> <i class="fas fa-sort-down"></i> </span> </div>
                                    </div>
                                  </li>
                                </ul>
                              </div>
                            </th>
                            <th ng-show="tieude.td1" style="width: 20%;"> <div class="dropdown position-static">
                                <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                  <div class="d-flex justify-content-center flex-column">Câu Hỏi<i class="fas fa-ellipsis-h"></i></div>
                                </div>
                                <ul class="dropdown-menu">
                                  <li class="p-2">
                                    <div class="mb-3">
                                      <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                        <input class="form-control" type="text" ng-model="dtsearch.Cauhoi">
                                        <span class="input-group-text" ng-click="dtsearch={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Cauhoi')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Cauhoi')"> <i class="fas fa-sort-down"></i> </span> </div>
                                    </div>
                                  </li>
                                </ul>
                              </div>
                            </th>
                            <th ng-show="tieude.td2" style="width: 20%;"> <div class="dropdown position-static">
                                <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                  <div class="d-flex justify-content-center flex-column">Cấp Độ <i class="fas fa-ellipsis-h"></i></div>
                                </div>
                                <ul class="dropdown-menu">
                                  <li class="p-2">
                                    <div class="mb-3">
                                      <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                        <select chosen class="form-control text-danger" ng-model="dtsearch.Capdo" ng-options="s.id as s.Thuoctinh for s in ListCapdo">
                                        </select>
                                        <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Capdo')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Capdo')"> <i class="fas fa-sort-down"></i> </span> </div>
                                    </div>
                                  </li>
                                </ul>
                              </div>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr ng-repeat="ch in RC = (RACauhoi |FMT:Dethi.idTailieu:'idTL' | filter:{Trangthai:2} |filter:dtsearch | orderBy:propertyName:reverse)">
                            <td style="width: 10%;" ng-click="AddToDethi(ch)"><i class="fas fa-plus-circle"></i>
                              <div><span class="badge rounded-pill text-white" ng-class="ch.Dapan.type==0?'bg-primary':'bg-danger'">{{ch.Dapan.type==0?'Trắc Nghiệm':'Tự Luận'}}</span></div></td>
                            <td style="width:20%;"><input class="form-control me-2" type="number" ng-model="ch.Diem"/></td>
                            <td ng-show="tieude.td1" style="width: 20%;">{{ch.MaCH}}</td>
                            <td ng-show="tieude.td1" style="width: 20%;"><span ng-bind-html="ch.Cauhoi"></span></td>
                            <td ng-show="tieude.td1" style="width: 20%;">{{ch.Capdo|Ftitle:ListCapdo}}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="row position-relative">
                <div class="overflow-scroll" style="height: 70vh;">
                  <div ng-repeat="ch in RCHDT | orderBy:'$index':true">
                    <div class="card mb-3">
                      <div class="card-header text-white bg-primary p-2 d-flex">
                        <div class="me-2">Câu Số {{$index+1}} - </div>
                        <div class="me-2 d-flex">
                          <input class="form-control w-25" ng-model="ch.Diem" ng-if="FlagSD" />
                          <span ng-if="!FlagSD">{{ch.Diem}}</span> <span class="mx-2 my-auto">Điểm</span> <i class="fas fa-edit text-white me-2 my-auto" ng-click="FlagSD=!FlagSD" ng-show="!FlagSD"></i> <i class="fas fa-save text-white me-2 my-auto" ng-click="Suadiem(ch);FlagSD=!FlagSD" ng-show="FlagSD"></i> </div>
                        <div class="ms-auto"> <i class="fas fa-minus-circle text-white" ng-click="RemoveFromDethi(ch)"></i> </div>
                      </div>
                      <div class="card-body"> <span ng-bind-html="ch.Cauhoi"></span>
                        <div ng-if="ch.Dapan.type==1">
                          <textarea class="form-control" placeholder="Trả Lời"></textarea>
                        </div>
                        <div ng-if="ch.Dapan.type==0">
                          <div ng-repeat="tl in ch.Traloi"><span class="me-2 badge rounded-pill bg-primary">{{tl.id|FABC}}</span> {{tl.value}}</div>
                        </div>
                      </div>
                      <div class="card-footer text-white bg-info p-2">
                        <div ng-if="ch.Dapan.type==0">Đáp Án Trắc Nghiệm : <span class="badge rounded-pill bg-danger">{{ch.Dapan.data.id|FABC}}</span> {{ch.Dapan.data.value}}</div>
                        <div ng-if="ch.Dapan.type!=0">Đáp Án Tự Luận : <span ng-bind-html="ch.Dapan.data"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer"> {{Dethi.Cauhoi}} <span class="input-group-text">Đã Chọn <span class="badge bg-primary mx-2">{{Dethi.idCH.length||'0'}}</span> Câu hỏi </span>
          <button type="button" class="btn btn-primary" class="btn btn-secondary" data-bs-dismiss="modal">
          Lưu
          </button>
        </div>
      </div>
    </div>
  </div>
  <div class="dethimodal">
    <div class="modal fade" id="XoaHang" data-bs-backdrop="static" data-bs-keyboard="false">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Xóa Câu Hỏi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body"> Bạn có chắc chắn xóa <span class="text-danger">Đề Thi Số {{Dethi.ordering}}</span> </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" ng-click="DeleteDethi(Dethi)">Xóa</button>
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Đóng</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="cauhoiindethi" data-bs-backdrop="static" data-bs-keyboard="false">
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
  </div>
  <div class="modal fade" id="CRUDDethi" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">{{Dethi.Title}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row p-3">
            <div class="mb-3 col-6">
              <div class="input-group"> <span class="input-group-text">Tài Liệu Nguồn</span>
                <select chosen class="form-control text-danger" ng-model="Dethi.idTLN" ng-options="s.id as s.MaTL +' - '+s.Tentailieu for s in (TailieuGoc|filter:{Trangthai:2})">
                </select>
              </div>
            </div>
            <div class="mb-3 col-6">
              <div class="input-group"> <span class="input-group-text">Người Duyệt</span>
                <select multiple chosen class="w-100" ng-model="Dethi.idDuyet" ng-options="s.id as s.name for s in (RListNV|FKiemduyet:NhomDuyet)">
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="input-group mb-3"> <span class="input-group-text">Tài Liệu Nguồn</span>
                <select multiple chosen class="form-control text-danger" ng-model="Dethi.idTailieu" ng-options="s.id as s.MaTL +' - '+s.Tentailieu for s in TailieuGoc">
                </select>
                <span class="input-group-text" ng-click="Dethi.idTailieu=''"> <i class="fas fa-sync-alt" ng-click="ResetCauhoi();dtsearch={}"></i> </span> <span class="input-group-text"><span class="badge bg-info me-2">{{RC.length}}</span> Câu Hỏi</span> </div>
              <div class="row position-relative">
                <div class="overflow-scroll" style="height: 60vh;">
                  <div class="d-flex">
                    <div class="table mt-3 ghichu">
                      <table class="table table-centered table-nowrap mb-0 rounded text-center table-bordered table-hover">
                        <thead class="thead-light">
                          <tr>
                            <th style="width: 10%;"><div class="d-flex justify-content-center">
                                <div class="dropdown position-static">
                                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                    <div class="d-flex justify-content-center flex-column"># <i class="fas fa-ellipsis-h"></i></div>
                                  </div>
                                  <ul class="dropdown-menu">
                                    <li class="p-2">
                                      <div class="mb-3">
                                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                          <select chosen class="form-control text-danger" ng-model="dtsearch.Dapan.type" ng-options="s.id as s.title for s in TypeCauhoi">
                                              <option value="" selected>Vui lòng chọn</option>
                                          </select>
                                          <span class="input-group-text" ng-click="dtsearch={}"> <i class="fas fa-sync-alt"></i> </span> </div>
                                      </div>
                                    </li>
                                  </ul>
                                </div>
                              </div></th>
                            <th style="width: 20%;"><div class="d-flex justify-content-center">Điểm</div></th>
                            <th ng-show="tieude.td1" style="width: 20%;"> <div class="dropdown position-static">
                                <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                  <div class="d-flex justify-content-center flex-column">Mã Câu Hỏi <i class="fas fa-ellipsis-h"></i></div>
                                </div>
                                <ul class="dropdown-menu">
                                  <li class="p-2">
                                    <div class="mb-3">
                                      <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                        <input class="form-control" type="text" ng-model="dtsearch.MaCH">
                                        <span class="input-group-text" ng-click="dtsearch={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('MaCH')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('MaCH')"> <i class="fas fa-sort-down"></i> </span> </div>
                                    </div>
                                  </li>
                                </ul>
                              </div>
                            </th>
                            <th ng-show="tieude.td1" style="width: 20%;"> <div class="dropdown position-static">
                                <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                  <div class="d-flex justify-content-center flex-column">Câu Hỏi<i class="fas fa-ellipsis-h"></i></div>
                                </div>
                                <ul class="dropdown-menu">
                                  <li class="p-2">
                                    <div class="mb-3">
                                      <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                        <input class="form-control" type="text" ng-model="dtsearch.Cauhoi">
                                        <span class="input-group-text" ng-click="dtsearch={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Cauhoi')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Cauhoi')"> <i class="fas fa-sort-down"></i> </span> </div>
                                    </div>
                                  </li>
                                </ul>
                              </div>
                            </th>
                            <th ng-show="tieude.td2" style="width: 20%;"> <div class="dropdown position-static">
                                <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                  <div class="d-flex justify-content-center flex-column">Cấp Độ <i class="fas fa-ellipsis-h"></i></div>
                                </div>
                                <ul class="dropdown-menu">
                                  <li class="p-2">
                                    <div class="mb-3">
                                      <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                        <select chosen class="form-control text-danger" ng-model="dtsearch.Capdo" ng-options="s.id as s.Thuoctinh for s in ListCapdo">
                                        </select>
                                        <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Capdo')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Capdo')"> <i class="fas fa-sort-down"></i> </span> </div>
                                    </div>
                                  </li>
                                </ul>
                              </div>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr ng-repeat="ch in RC = (RACauhoi |FMT:Dethi.idTailieu:'idTL' | filter:{Trangthai:2} |filter:dtsearch | orderBy:propertyName:reverse)">
                            <td style="width: 10%;" ng-click="AddToDethi(ch)"><i class="fas fa-plus-circle"></i>
                              <div><span class="badge rounded-pill text-white" ng-class="ch.Dapan.type==0?'bg-primary':'bg-danger'">{{ch.Dapan.type==0?'Trắc Nghiệm':'Tự Luận'}}</span></div></td>
                            <td style="width:20%;"><input class="form-control me-2" type="number" ng-model="ch.Diem"/></td>
                            <td ng-show="tieude.td1" style="width: 20%;">{{ch.MaCH}}</td>
                            <td ng-show="tieude.td1" style="width: 20%;"><span ng-bind-html="ch.Cauhoi"></span></td>
                            <td ng-show="tieude.td1" style="width: 20%;">{{ch.Capdo|Ftitle:ListCapdo}}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="row position-relative">
                <div class="overflow-scroll" style="height: 70vh;">
                  <div ng-repeat="ch in RCHDT | orderBy:'$index':true">
                    <div class="card mb-3">
                      <div class="card-header text-white bg-primary p-2 d-flex">
                        <div class="me-2">Câu Số {{$index+1}} - </div>
                        <div class="me-2 d-flex">
                          <input class="form-control w-25" ng-model="ch.Diem" ng-if="FlagSD" />
                          <span ng-if="!FlagSD">{{ch.Diem}}</span> <span class="mx-2 my-auto">Điểm</span> <i class="fas fa-edit text-white me-2 my-auto" ng-click="FlagSD=!FlagSD" ng-show="!FlagSD"></i> <i class="fas fa-save text-white me-2 my-auto" ng-click="Suadiem(ch);FlagSD=!FlagSD" ng-show="FlagSD"></i> </div>
                        <div class="ms-auto"> <i class="fas fa-minus-circle text-white" ng-click="RemoveFromDethi(ch)"></i> </div>
                      </div>
                      <div class="card-body"> <span ng-bind-html="ch.Cauhoi"></span>
                        <div ng-if="ch.Dapan.type==1">
                          <textarea class="form-control" placeholder="Trả Lời"></textarea>
                        </div>
                        <div ng-if="ch.Dapan.type==0">
                          <div ng-repeat="tl in ch.Traloi"><span class="me-2 badge rounded-pill bg-primary">{{tl.id|FABC}}</span> {{tl.value}}</div>
                        </div>
                      </div>
                      <div class="card-footer text-white bg-info p-2">
                        <div ng-if="ch.Dapan.type==0">Đáp Án Trắc Nghiệm : <span class="badge rounded-pill bg-danger">{{ch.Dapan.data.id|FABC}}</span> {{ch.Dapan.data.value}}</div>
                        <div ng-if="ch.Dapan.type!=0">Đáp Án Tự Luận : <span ng-bind-html="ch.Dapan.data"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           <div class="mb-3">
              <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Dethi.Ghichu" class="form-control text-danger" placeholder="Ghi Chú"></textarea>
            </div>     
                
          </div>
        </div>
        <div class="modal-footer">
          <button  class="btn btn-info" ng-click="CreateDethi(Dethi)">Tạo Mới</button>
          <button  class="btn btn-success text-white" ng-click="UpdateDethi(Dethi)">Cập Nhật</button>
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
  </div>
</div>
