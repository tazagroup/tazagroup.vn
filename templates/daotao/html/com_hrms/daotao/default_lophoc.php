<div class="bg-white shadow border-0 rounded border-light p-4 w-100" ng-init="OninitLophoc();">
 <div class="row" ng-init="activeCD=true">
    <div ng-class="!localStorage.MenuCD ? 'col-3' : 'd-none'"><?php echo $this->loadTemplate('chude_baihoc'); ?></div>
    <div ng-class="!localStorage.MenuCD ? 'col-9' : 'col-12'">
   <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <div>
            <button class="btn btn-primary me-2"  ng-click="Store('MenuCD',!localStorage.MenuCD)"><i class="fas fa-bars m-auto"></i></button>
          </div>
          <button class="nav-link" ng-class="{'active': localStorage.TabTLN==0}" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-lophoc" type="button" role="tab" aria-controls="nav-home" aria-selected="true" ng-click="Store('TabTLN',0);Phantrang(Daduyet,SLitem,Chontrang)">Lớp Học <span class="badge bg-info">{{Daduyet.length}}</span></button>
          <button class="nav-link" ng-class="{'active': localStorage.TabTLN==1}" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false" ng-click="Store('TabTLN',1);Phantrang(RALophoc,SLitem,Chontrang)"> <i class="fas fa-user-check me-2"></i> Duyệt Lớp Học <span class="badge bg-danger">{{RALophoc.length - Daduyet.length}}</span> </button>
     <div class="d-flex ms-auto"> 
      <div class="me-3">
          <div class="input-group">
              <span class="input-group-text"><span class="badge bg-primary me-2">{{RALophoc.length}}</span>  Lớp Học </span>
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
            <select class="form-select w-25" ng-model="SLitem" ng-change="Phantrang(RALophoc,SLitem)" ng-options="s.value as s.title for s in SLHienthi">
            </select>
          </div>
        </div> </div>       
            
            
        </div>
      </nav>
   <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade" ng-class="{'show active': localStorage.TabTLN==0}" id="nav-lophoc" role="tabpanel" aria-labelledby="nav-home-tab">
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
<!--
              <th ng-show="tieude.td1" style="width: 10%;"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Chủ Đề <i class="fas fa-ellipsis-h"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="mb-3">
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                          <select chosen class="form-control text-danger" ng-model="timkiem.idRoot" ng-options="s.idRoot as s.idRoot|FCustom:'Tenchude':RChude for s in (RALophoc|unique:'idRoot')">
                            <option value="" selected>Vui lòng chọn</option>
                          </select>
                          <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('idRoot')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('idRoot')"> <i class="fas fa-sort-down"></i> </span> </div>
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
                          <select chosen class="form-control text-danger" ng-model="timkiem.idTL" ng-options="s.idTL as s.idTL|FCustom:'Tentailieu':RATailieu for s in (RALophoc|unique:'idTL')">
                            <option value="" selected>Vui lòng chọn</option>
                          </select>
                          <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('idRoot')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('idRoot')"> <i class="fas fa-sort-down"></i> </span> </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </th>               
              <th ng-show="tieude.td1" style="width: 10%;"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Bài Học <i class="fas fa-ellipsis-h"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="mb-3">
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                          <select chosen class="form-control text-danger" ng-model="timkiem.idBH" ng-options="s.idBH as s.idBH|FCustom:'Tenbaihoc':Baihocgoc for s in (RALophoc|unique:'idBH')">
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
                    <div class="d-flex justify-content-center flex-column">Tên Lớp <i class="fas fa-ellipsis-h"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="mb-3">
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                          <input ng-model="timkiem.Tenlop" type="text" class="form-control col-12" placeholder="Tìm Kiếm">
                          <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Tenlop')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Tenlop')"> <i class="fas fa-sort-down"></i> </span> </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </th>
              <th ng-show="tieude.td2" style="width: 10%;"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Đề Thi<i class="fas fa-ellipsis-h"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="mb-3">
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                          <select chosen class="form-control text-danger" ng-model="timkiem.ordering" ng-options="s.ordering as 'Đề Thi Số '+s.ordering for s in (RALophoc|unique:'ordering')">
                            <option value="" selected>Vui lòng chọn</option>
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
                      <div class="mb-3">
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                          <input ng-model="timkiem.Baihoc.Noidung" type="text" class="form-control col-12" placeholder="Tìm Kiếm" />
                          <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Baihoc.Noidung')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Baihoc.Noidung')"> <i class="fas fa-sort-down"></i> </span> </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </th>
              <th ng-show="tieude.td6" style="width: 10%;"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Bắt Đầu <i class="fas fa-ellipsis-h"></i></div>
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
              <th ng-show="tieude.td6" style="width: 10%;"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Kết Thúc <i class="fas fa-ellipsis-h"></i></div>
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
              <th ng-show="tieude.td4" style="width: 10%;"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Giảng Viên <i class="fas fa-ellipsis-h"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                        <select multiple chosen class="form-control text-danger" ng-model="timkiem.idGV" ng-options="s.id as s.name for s in RListNV">
                          <option value="" selected>Vui lòng chọn</option>
                        </select>
                        <span class="input-group-text" ng-click="Giangvien={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Giangvien')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Giangvien')"> <i class="fas fa-sort-down"></i> </span> </div>
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
                          <select multiple chosen class="form-control text-danger" ng-model="timkiem.idGV" ng-options="s.id as s.name for s in RListNV">
                            <option value="" selected>Vui lòng chọn</option>
                          </select>
                          <span class="input-group-text" ng-click="Giangvien={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Giangvien')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Giangvien')"> <i class="fas fa-sort-down"></i> </span> </div>
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
                          <select multiple chosen class="form-control text-danger" ng-model="Trangthai" ng-options="s.id as s.Thuoctinh for s in TTDuyet">
                            <option value="" selected>Vui lòng chọn</option>
                          </select>
                          <span class="input-group-text" ng-click="Trangthai=''"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Trangthai')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Trangthai')"> <i class="fas fa-sort-down"></i> </span> </div>
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
                          <select multiple chosen class="form-control text-danger" ng-model="Nguoiduyet" ng-options="s.idDuyet as s.idDuyet|FCustom:'name':RListNV for s in (RALophoc|unique:'idDuyet')">
                            <option value="" selected>Vui lòng chọn</option>
                          </select>
                          <span class="input-group-text" ng-click="Nguoiduyet=''"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Nguoiduyet')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Nguoiduyet')"> <i class="fas fa-sort-down"></i> </span> </div>
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
                          <input ng-model="timkiem.Ghichu" type="text" class="form-control col-12" placeholder="Tìm Kiếm" />
                          <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Ghichu')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Ghichu')"> <i class="fas fa-sort-down"></i> </span> </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="rd in Daduyet=(RALophoc |FMT:Trangthai:'Trangthai'|FMT:Nguoiduyet:'idDuyet' | filter:timkiem| orderBy:propertyName:reverse|filter:{Trangthai:2})">
              <td style="width: 10%;">
                    <div class="d-flex justify-content-center flex-column">{{$index+1}}</div></td>
<!--              <td ng-show="tieude.td1" style="width: 10%;">{{rd.idRoot|FTenchude:RChude}}</td>-->
                              <td ng-show="tieude.td1" style="width: 10%;">{{rd.idTL|FCustom:'Tentailieu':RATailieu}}   
                </td>
              <td ng-show="tieude.td1" style="width: 10%;"><a href="https://tazagroup.vn/dao-tao-lop-hoc-chi-tiet#{{rd.MaLop}}" target="_blank">{{rd.idBH|FCustom:'Tenbaihoc':Baihocgoc}}</a></td>
              <td ng-show="tieude.td2" style="width: 10%;">{{rd.Tenlop}} <a ng-if="rd.LinkMeet!=0" ng-href="{{rd.LinkMeet}}" target="_blank"><i class="fas fa-external-link-alt"></i></a></td>
              <td ng-show="tieude.td2" style="width: 10%;"><div ng-if="rd.Baihoc.Dethi" class="input-group justify-content-center" data-bs-toggle="modal" data-bs-target="#ShowDethi" ng-click="ShowDethi(rd.Baihoc)"> <span class="input-group-text">Đề Thi Số {{rd.Baihoc.Dethi.ordering}} </span> </div></td>
              <td ng-show="tieude.td3" style="width: 10%;"><i class="fas fa-eye me-2 my-auto" ng-click="XemNoidung(rd)" data-bs-toggle="modal" data-bs-target="#XemNoidung"></i></td>
              <td ng-show="tieude.td3" style="width: 10%;"> {{rd.Batdau | date:'HH:mm'}} <br>
                {{rd.Batdau | date:'dd/MM/yy'}} </td>
              <td ng-show="tieude.td3" style="width: 10%;"> {{rd.Ketthuc | date:'HH:mm'}} <br>
                {{rd.Ketthuc | date:'dd/MM/yy'}} </td>
              <td ng-show="tieude.td4" style="width: 10%;"><div class="btn-group position-static" ng-if="rd.idGV.length!=0"> <span data-bs-toggle="dropdown" data-bs-auto-close="outside"><i class="fas fa-user-circle"></i> <span ng-if="rd.idGV.length>2"> + {{rd.idGV.length-1}}</span></span>
                  <ul class="dropdown-menu">
                    <li><span class="dropdown-item text-danger" ng-repeat="x in rd.idGV">{{x.id|Fname:RListNV}}</span></li>
                  </ul>
                </div></td>
              <td ng-show="tieude.td6" style="width: 10%;"><div class="btn-group position-static" ng-if="rd.idHV.length!=0"> <span data-bs-toggle="dropdown" data-bs-auto-close="outside"><i class="fas fa-user-circle"></i> <span ng-if="rd.idHV.length>2"> + {{rd.idHV.length-1}}</span></span>
                  <ul class="dropdown-menu">
                    <li><span class="dropdown-item text-danger" ng-repeat="x in rd.idHV">{{x.id|Fname:RListNV}}</span></li>
                  </ul>
                </div></td>
              <td ng-show="tieude.td5" style="width: 10%;"><div class="btn-group position-static"> <span class="{{rd.Trangthai|FMaunen:TTDuyet}} {{rd.Trangthai|FMauchu:TTDuyet}} p-1 rounded" data-bs-toggle="dropdown" data-bs-auto-close="outside">{{rd.Trangthai|Ftitle:TTDuyet}}</span>
                  <ul class="dropdown-menu" ng-show="         
         {{<?php echo $this->idUser; ?>|Fduyet:rd.idDuyet}}">
                    <li ng-repeat="s1 in TTDuyet" ng-click="UpdateTTDuyetLH(rd.id,s1.id)">
                      <div class="dropdown-item"><span class="{{s1.id|FMaunen:TTDuyet}} {{s1.id|FMauchu:TTDuyet}} p-1 rounded">{{s1.Thuoctinh}}</span></div>
                    </li>
                  </ul>
                </div></td>
              <td ng-show="tieude.td7" style="width: 10%;"><div class="btn-group position-static" ng-if="rd.idDuyet.length!=0"> <span data-bs-toggle="dropdown" data-bs-auto-close="outside"><i class="fas fa-user-circle"></i></span>
                  <ul class="dropdown-menu">
                    <li><span class="dropdown-item text-danger" ng-repeat="d in rd.idDuyet">{{d|Fname:RListNV}}</span></li>
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
    <div class="tab-pane fade" ng-class="{'show active': localStorage.TabTLN==1}" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"><?php echo $this->loadTemplate('lophoc_duyet'); ?></div>
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
                  <div class="row p-3"><div class="container text-center" ng-bind-html="ViewNoidung.Baihoc.Noidung"></div></div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
              </div>
            </div>
          </div>

<div class="modal fade" id="CRUDLophoc" data-bs-backdrop="static" data-bs-keyboard="false">
<div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{Lophoc.Title}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row p-3">
          <div class="mb-3 col-6">
            <div class="input-group"> <span class="input-group-text">Bài Học</span>
              <select chosen class="form-control text-danger" ng-model="Lophoc.idBH" ng-options="s.id as s.Tenbaihoc for s in (Baihocgoc|filter:{Trangthai:2})">
                <option value="" selected>Vui lòng chọn</option>
              </select>
            </div>
          </div>
        <div class="mb-3 col-6">
            <div class="input-group"> <span class="input-group-text">Tên Lớp Học</span>
              <input type="text" class="form-control" placeholder="Nhập Tên Lớp" ng-model="Lophoc.Tenlop">
            </div>
          </div>     
        <div class="mb-3 col-6">
            <div class="input-group"> 
                <span class="input-group-text">Thời Gian Bắt Đầu</span>
                <input type="text" ng-model="Lophoc.Batdau" id="LHBD" class="form-control text-danger flatpickr-input" placeholder="Chọn Thời Gian Bắt Đầu">
            </div>
          </div>       
        <div class="mb-3 col-6">
            <div class="input-group"> 
                <span class="input-group-text">Thời Gian Kết Thúc</span>
           <input type="text" ng-model="Lophoc.Ketthuc" id="LHKT" class="form-control text-danger flatpickr-input" placeholder="Chọn Thời Gian Kết Thúc">
            </div>
          </div>
            <div class="mb-3 col-6">
            <div class="input-group"> <span class="input-group-text">Giảng Viên</span>
                <select multiple chosen class="w-100" ng-model="Lophoc.idGV" ng-options="s.id as s.name for s in (RListNV|FKiemduyet:NhomGV)">
              </select>
            </div>
          </div>
          <div class="mb-3 col-6">
            <div class="input-group"> <span class="input-group-text">Học Viên</span>
              <select multiple chosen class="w-100" ng-model="Lophoc.idHV" ng-options="s.id as s.name for s in RListNV">
              </select>
            </div>
          </div>
       
            <div class="mb-3 col-6">
            <div class="input-group"> <span class="input-group-text">Người Duyệt</span>
              <select multiple chosen class="w-100" ng-model="Lophoc.idDuyet" ng-options="s.id as s.name for s in (RListNV|FKiemduyet:NhomDuyet)">
              </select>
            </div>
          </div>   
            
           <div class="mb-3 col-6">
            <div class="input-group"> <span class="input-group-text">Link Meet</span>
              <input type="text" class="form-control" placeholder="Nhập Link" ng-model="Lophoc.LinkMeet">
            </div>
          </div>        
          <div class="mb-3">
            <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Lophoc.Ghichu" class="form-control text-danger" placeholder="Ghi Chú"></textarea>
          </div>          
        </div>
      </div>
      <div class="modal-footer">
        <button ng-if="Lophoc.CRUD==0" class="btn btn-info" ng-click="CreateLophoc(Lophoc)">Tạo Mới</button>
        <button ng-if="Lophoc.CRUD!=0"class="btn btn-success text-white" ng-click="UpdateLophoc(Lophoc)">Cập Nhật</button>
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

<div class="modal fade" id="XoaHang" data-bs-backdrop="static" data-bs-keyboard="false">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Xóa Lớp Học</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body"> Bạn có chắc chắn xóa <span class="text-danger">Đề Thi Số {{Lophoc.Tenlop}}</span> </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" ng-click="DeleteLophoc(Lophoc)">Xóa</button>
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Đóng</button>
          </div>
        </div>
      </div>
    </div>
