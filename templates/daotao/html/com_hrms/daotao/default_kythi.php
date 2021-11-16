<div class="bg-white shadow border-0 rounded border-light p-4 w-100" ng-init="OninitKythi();">
  <div class="row" ng-init="activeCD=true">
     <div ng-class="!localStorage.MenuCD ? 'col-3' : 'd-none'"><?php echo $this->loadTemplate('chude_baihoc'); ?></div>
     <div ng-class="!localStorage.MenuCD ? 'col-9' : 'col-12'">
    <nav>
         <div class="nav nav-tabs" id="nav-tab" role="tablist">
           <div>
             <button class="btn btn-primary me-2"  ng-click="Store('MenuCD',!localStorage.MenuCD)"><i class="fas fa-bars m-auto"></i></button>
           </div>
           <button class="nav-link" ng-class="{'active': localStorage.TabTLN==0}" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-kythi" type="button" role="tab" aria-controls="nav-home" aria-selected="true" ng-click="Store('TabTLN',0);Phantrang(Daduyet,SLitem,Chontrang)">Kỳ Thi <span class="badge bg-info">{{Daduyet.length}}</span></button>
           <button class="nav-link" ng-class="{'active': localStorage.TabTLN==1}" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false" ng-click="Store('TabTLN',1);Phantrang(RAKythi,SLitem,Chontrang)"> <i class="fas fa-user-check me-2"></i> Duyệt Kỳ Thi <span class="badge bg-danger">{{RAKythi.length - Daduyet.length}}</span> </button>
      <div class="d-flex ms-auto"> 
       <div class="me-3">
           <div class="input-group">
               <span class="input-group-text"><span class="badge bg-primary me-2">{{RAKythi.length}}</span>  Kỳ Thi </span>
           </div>
         </div>       
     <div class="me-3">
           <div class="input-group">
               <span class="input-group-text"> Trang </span>
             <select class="form-select" ng-model="Chontrang" ng-change="Pagechose(Chontrang)">
               <option selected ng-value="{{pag}}" ng-repeat="pag in Pagination">{{pag+1}}</option>
             </select>
                <span class="input-group-text">/ {{Sotrang || '0'}}</span>  
           </div>
         </div>
         <div>
           <div class="input-group"> <span class="input-group-text"> Hiển Thị </span>              
             <select class="form-select w-25" ng-model="SLitem" ng-change="Phantrang(RAKythi,SLitem)" ng-options="s.value as s.title for s in SLHienthi">
             </select>
           </div>
         </div> </div>       
             
             
         </div>
       </nav>
    <div class="tab-content" id="nav-tabContent">
     <div class="tab-pane fade" ng-class="{'show active': localStorage.TabTLN==0}" id="nav-kythi" role="tabpanel" aria-labelledby="nav-home-tab">
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
            <tr ng-repeat="rd in Daduyet = (RAKythi|filter:{Trangthai:2} | filter:timkiem)">
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
     </div>
     <div class="tab-pane fade" ng-class="{'show active': localStorage.TabTLN==1}" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"><?php echo $this->loadTemplate('kythi_duyet'); ?></div>
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
      <div class="modal-body">
        <div class="row p-3">
          <div class="container text-center" ng-bind-html="ViewNoidung.Mota"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="CRUDKythi" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{Kythi.Title}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row p-3">
        <div class="mb-3 col-4">
                      <div class="input-group"> <span class="input-group-text">Loại Kỳ Thi</span>
                        <select chosen class="form-control text-danger" ng-model="Kythi.Loaithi" ng-options="s.id as s.Thuoctinh for s in ListLoaiKythi">
                          <option value="" selected>Vui lòng chọn</option>
                        </select>
                      </div>  
          </div>    
         <div class="mb-3 col-4">
            <div class="input-group"> <span class="input-group-text">Tên Kỳ Thi</span>
              <input type="text" class="form-control" placeholder="Nhập Tên Kỳ Thi" ng-model="Kythi.Tenkythi">
            </div>
          </div>  
          <div class="mb-3 col-4">
            <div class="input-group"> <span class="input-group-text">Đề Thi</span>
              <select chosen class="form-control text-danger" ng-model="Kythi.idDT" ng-options="s.id as s.Tendethi for s in (Dethigoc|filter:{Trangthai:2})">
                <option value="" selected>Vui lòng chọn</option>
              </select>
            </div>
          </div>  
            <div class="mb-3 col-6">
            <div class="input-group"> <span class="input-group-text">Hình Thức Thi</span>
             <select chosen class="form-control text-danger" ng-model="Kythi.Hinhthuc" ng-options="s.id as s.Title for s in ListHinhthuc">
                          <option value="" selected>Vui lòng chọn</option>
                        </select>
            </div>
          </div>         
          <div class="mb-3 col-6">
            <div class="input-group"> <span class="input-group-text">Thời Gian Bắt Đầu</span>
              <input type="text" ng-model="Kythi.Batdau" id="LHBD" class="form-control text-danger flatpickr-input" placeholder="Chọn Thời Gian Bắt Đầu">
            </div>
          </div>
          <div class="mb-3 col-6">
            <div class="input-group"> <span class="input-group-text">Thời Gian Kết Thúc</span>
              <input type="text" ng-model="Kythi.Ketthuc" id="LHKT" class="form-control text-danger flatpickr-input" placeholder="Chọn Thời Gian Kết Thúc">
            </div>
          </div>
          <div class="mb-3 col-6">
            <div class="input-group"> <span class="input-group-text">Tên Nhóm</span>
              <select multiple chosen class="w-100" ng-model="Kythi.idVitri" ng-options="s.id as s.Tennhom for s in RNhomnguoidung">
              </select>
            </div>
          </div>
          <div class="mb-3 col-6">
            <div class="input-group"> <span class="input-group-text">Học Viên</span>
              <select multiple chosen class="w-100" ng-model="Kythi.idHV" ng-options="s.id as s.name for s in RListNV">
              </select>
            </div>
          </div>
          <div class="mb-3">
            <div class="input-group"> <span class="input-group-text">Người Duyệt</span>
              <select multiple chosen class="w-100" ng-model="Kythi.idDuyet" ng-options="s.id as s.name for s in (RListNV|FKiemduyet:NhomDuyet)">
              </select>
            </div>
          </div>
          <div class="mb-3">
            <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Kythi.Ghichu" class="form-control text-danger" placeholder="Ghi Chú"></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button ng-if="Kythi.CRUD==0" class="btn btn-info" ng-click="CreateKythi(Kythi)">Tạo Mới</button>
        <button ng-if="Kythi.CRUD!=0"class="btn btn-success text-white" ng-click="UpdateKythi(Kythi)">Cập Nhật</button>
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
              <div class="card-body">
                  <span ng-bind-html="ch.Cauhoi"></span>
                <div ng-if="ch.Dapan.type==1">
                  <textarea class="form-control" placeholder="Trả Lời"></textarea>
                </div>
                <div ng-if="ch.Dapan.type==0">
                  <div ng-repeat="tl in ch.Traloi"> <span class="me-2 badge rounded-pill bg-primary">{{tl.id|FABC}}</span> {{tl.value}}</div>
                </div>
                </div>
                <div class="card-footer text-white bg-success p-2">
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
 