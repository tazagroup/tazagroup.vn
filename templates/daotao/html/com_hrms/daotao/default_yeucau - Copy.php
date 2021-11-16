<div class="bg-white shadow border-0 rounded border-light p-4 w-100" ng-init="OninitTailieu();">
<!--
  <div class="d-flex mb-3">
    <div class="modal fade" id="addtailieu" data-bs-backdrop="static" data-bs-keyboard="false">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="h6 modal-title">Thêm Tài Liệu</h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ng-click="OninitTailieu()"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <div class="input-group"> <span class="input-group-text"> Tên Tài Liệu </span>
                <input ng-model="Tailieu.Tentailieu" type="text" class="form-control" placeholder="Tên Tài Liệu" />
              </div>
            </div>
            <div class="mb-3">
              <div class="row">
                <div class="col-sm-6">
                  <div class="input-group"> <span class="input-group-text"> Chủ đề </span>
                    <select chosen class="form-control text-danger" ng-model="Tailieu.idChude" ng-options="s.id as s.Tenchude for s in RChude" ng-disabled="!CheckCD">
                      <option value="" selected>Vui lòng chọn</option>
                    </select>
                    <span class="input-group-text">
                    <input class="form-check-input me-2" type="checkbox" ng-model="CheckCD">
                    Sửa </span> </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-group"> <span class="input-group-text"> Tags </span>
                    <select chosen multiple class="form-control text-danger" ng-model="Tailieu.Tags" ng-options="s.id as s.Thuoctinh for s in Congty">
                      <option value="" selected></option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="mb-3">
              <div class="row">
                <div class="col-sm-6">
                  <div class="input-group"> <span class="input-group-text"> Dự Kiến Triển Khai </span>
                    <input type="text" data-min-date="minDate" ng-model="Tailieu.DKTK" id="DKTK" class="form-control text-danger flatpickr-input" placeholder="Chọn Dự Kiến Triển Khai" data-input="" readonly="readonly" />
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-group"> <span class="input-group-text"> Deadline </span>
                    <input type="text" data-min-date="minDate" ng-model="Tailieu.Deadline" id="TLNDeadline" class="form-control text-danger flatpickr-input" placeholder="Chọn Deadline" data-input="" readonly="readonly" />
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-6"> Nội Dung
                <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Tailieu.Mota" class="form-control text-danger"></textarea>
              </div>
              <div class="col-sm-6"> Ghi Chú
                <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Tailieu.Ghichu" class="form-control text-danger"></textarea>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-6"> Tác Giả Chính
                <select disable chosen class="form-control text-danger" ng-model="Tailieu.idTG" ng-options="s.id as s.name for s in RListNV">
                  <option value="" selected>Vui lòng chọn</option>
                </select>
              </div>
              <div class="col-sm-6"> Đồng Tác Giả
                <select chosen multiple class="form-control text-danger" ng-model="Tailieu.idGTG" ng-options="s.id as s.name for s in RListNV">
                  <option value="" selected></option>
                </select>
              </div>
            </div>
            <div class="mb-3"> Kiểm Duyệt
              <select chosen multiple class="form-control text-danger" ng-model="Tailieu.idDuyet" ng-options="s.id as s.name for s in (RListNV|FKiemduyet:NhomDuyet)">
                <option value="" selected></option>
              </select>
            </div>
            <div class="mb-3">
              <form>
                <div ng-repeat="lk in Tailieu.Lienket"> <i class="fas fa-file-pdf me-2"></i> {{$index+1}} {{lk.name}} </div>
                <div class="input-group">
                  <div id="dropzone2" class="dropzone sm form-control" options="dzOptions" methods="dzMethods" callbacks="dzCallbacks" ng-dropzone></div>
                  <span class="input-group-text">
                  <button class="btn btn-primary" ng-if="showBtns" ng-click="dzMethods.processQueue();"> Tải Lên</button>
                  </span> </div>
              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button ng-show="Tailieu.CRUD==0" type="button" class="text-white btn btn-info ms-2" ng-click="CreateTailieu(Tailieu)">Lưu</button>
            <button ng-show="Tailieu.CRUD!=0" type="button" class="text-white btn btn-success ms-2" ng-click="UpdateTailieu(Tailieu)">Cập Nhật</button>
            <button type="button" class="text-white btn btn-danger ms-2" data-bs-dismiss="modal" ng-click="OninitTailieu()">Đóng</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="XoaHang" data-bs-backdrop="static" data-bs-keyboard="false">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Xóa Tài Liệu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">Bạn có Chắc Chắn Xóa <span class="text-danger" ng-bind-html="Tailieu.Tentailieu"></span></div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            <button type="button" class="btn btn-primary" ng-click="Delete(Tailieu)">Xóa</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="PDFView" data-bs-backdrop="static" data-bs-keyboard="false">
      <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">{{FilePDF.Title}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body text-center p-0">
            <div id="iframe_div" class="p-5"> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row" ng-init="activeCD=true">
    <div ng-class="!localStorage.MenuCD ? 'col-3' : 'd-none'"><?php echo $this->loadTemplate('chude'); ?></div>
    <div ng-class="!localStorage.MenuCD ? 'col-9' : 'col-12'">
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <div>
            <button class="btn btn-primary me-2"  ng-click="Store('MenuCD',!localStorage.MenuCD)"><i class="fas fa-bars m-auto"></i></button>
          </div>
          <button class="nav-link" ng-class="{'active': localStorage.TabTLN==0}" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-tailieu" type="button" role="tab" aria-controls="nav-home" aria-selected="true" ng-click="Store('TabTLN',0);Phantrang(Daduyet,SLitem,Chontrang)">Tài Liệu Nguồn <span class="badge bg-info">{{Daduyet.length}}</span></button>
          <button class="nav-link" ng-class="{'active': localStorage.TabTLN==1}" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false" ng-click="Store('TabTLN',1);Phantrang(RATailieu,SLitem,Chontrang)"> <i class="fas fa-user-check me-2"></i> Duyệt Tài Liệu <span class="badge bg-danger">{{RATailieu.length - Daduyet.length}}</span> </button>
          <div class="d-flex ms-auto">
            <div class="me-3">
              <div class="input-group"> <span class="input-group-text"><span class="badge bg-primary me-2">{{RATailieu.length}}</span> Tài Liệu </span> </div>
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
        <div class="tab-pane fade" ng-class="{'show active': localStorage.TabTLN==0}" id="nav-tailieu" role="tabpanel" aria-labelledby="nav-home-tab">
          <div class="row position-relative">
            <div class="overflow-scroll">
              <div class="d-flex">
                <div class="table mt-3 ghichu">
                  <table class="table dauviec table-centered table-nowrap mb-0 rounded text-center table-bordered table-hover">
                    <thead class="thead-light">
                      <tr>
                        <th style="width: 5%;"> <div class="px-2 my-auto dropdown position-static">
                            <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside"><span>#</span></div>
                            <ul class="dropdown-menu w-75">
                              <div class="row p-3">
                                <li class="p-2 col-3">
                                  <div class="form-check form-switch"> Chủ Đề
                                    <input class="form-check-input" type="checkbox" ng-model="tieude.td1" checked />
                                  </div>
                                </li>
                                <li class="p-2 col-3">
                                  <div class="form-check form-switch"> Mã Tài Liệu
                                    <input class="form-check-input" type="checkbox" ng-model="tieude.td2" checked />
                                  </div>
                                </li>
                                <li class="p-2 col-3">
                                  <div class="form-check form-switch"> Tài Liệu
                                    <input class="form-check-input" type="checkbox" ng-model="tieude.td3" checked />
                                  </div>
                                </li>
                                <li class="p-2 col-3">
                                  <div class="form-check form-switch"> Nội dung
                                    <input class="form-check-input" type="checkbox" ng-model="tieude.td4" checked />
                                  </div>
                                </li>
                                <li class="p-2 col-3">
                                  <div class="form-check form-switch"> Tác Giả
                                    <input class="form-check-input" type="checkbox" ng-model="tieude.td5" checked />
                                  </div>
                                </li>
                                <li class="p-2 col-3">
                                  <div class="form-check form-switch"> Ngày Hiệu Lực
                                    <input class="form-check-input" type="checkbox" ng-model="tieude.td6" checked />
                                  </div>
                                </li>
                                <li class="p-2 col-3">
                                  <div class="form-check form-switch"> Trạng Thái
                                    <input class="form-check-input" type="checkbox" ng-model="tieude.td7" checked />
                                  </div>
                                </li>
                                <li class="p-2 col-3">
                                  <div class="form-check form-switch"> Người Duyệt
                                    <input class="form-check-input" type="checkbox" ng-model="tieude.td8" checked />
                                  </div>
                                </li>
                                <li class="p-2 col-3">
                                  <div class="form-check form-switch"> Ghi Chú
                                    <input class="form-check-input" type="checkbox" ng-model="tieude.td9" checked />
                                  </div>
                                </li>
                                <li class="p-2 col-3">
                                  <div class="btn btn-primary" ng-click="LuuAnhien(tieude)">Lưu</div>
                                </li>
                              </div>
                            </ul>
                          </div>
                        </th>
                        <th ng-show="tieude.td1==true" style="width: 20%;"> <div class="dropdown position-static">
                            <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                              <div class="d-flex justify-content-center flex-column">Chủ Đề <i class="fas fa-ellipsis-h"></i></div>
                            </div>
                            <ul class="dropdown-menu">
                              <li class="p-2">
                                <div class="mb-3">
                                  <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                    <select chosen class="form-control text-danger" ng-model="timkiem.idRoot" ng-options="s.id as s.Tenchude for s in RFChude">
                                      <option value="" selected>Vui lòng chọn</option>
                                    </select>
                                    <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('idRoot')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('idRoot')"> <i class="fas fa-sort-down"></i> </span> </div>
                                </div>
                              </li>
                            </ul>
                          </div>
                        </th>
                        <th ng-show="tieude.td2" style="width: 10%;"> <div class="dropdown position-static">
                            <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                              <div class="d-flex justify-content-center flex-column">Mã TL <i class="fas fa-ellipsis-h"></i></div>
                            </div>
                            <ul class="dropdown-menu">
                              <li class="p-2">
                                <div class="mb-3">
                                  <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                    <input ng-model="timkiem.MaTL" type="text" class="form-control col-12" placeholder="Tìm Kiếm" />
                                    <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('MaTL')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('MaTL')"> <i class="fas fa-sort-down"></i> </span> </div>
                                </div>
                              </li>
                            </ul>
                          </div>
                        </th>
                        <th ng-show="tieude.td3==true" style="width:20%;"> <div class="dropdown position-static">
                          <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                            <div class="d-flex justify-content-center flex-column">Tài Liệu <i class="fas fa-ellipsis-h"></i></div>
                          </div>
                          <ul class="dropdown-menu">
                            <li class="p-2">
                              <div class="mb-3">
                                <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                  <input ng-model="timkiem.Tentailieu" type="text" class="form-control col-12" placeholder="Tìm Kiếm" />
                                  <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Tentailieu')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Tentailieu')"> <i class="fas fa-sort-down"></i> </span> </div>
                              </div>
                            </div>
                            </li>
                          </ul>
                        <th ng-show="tieude.td4==true" style="width: 20%;"> <div class="dropdown position-static">
                            <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                              <div class="d-flex justify-content-center flex-column">Nội dung <i class="fas fa-ellipsis-h"></i></div>
                            </div>
                            <ul class="dropdown-menu">
                              <li class="p-2">
                                <div class="mb-3">
                                  <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                    <input ng-model="timkiem.Mota" type="text" class="form-control col-12" placeholder="Tìm Kiếm" />
                                    <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Mota')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Mota')"> <i class="fas fa-sort-down"></i> </span> </div>
                                </div>
                              </li>
                            </ul>
                          </div>
                        </th>
                        <th ng-show="tieude.td5" style="width: 10%;"> <div class="dropdown position-static">
                            <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                              <div class="d-flex justify-content-center flex-column"> Tác 
                                Giả <i class="fas fa-ellipsis-h"></i> </div>
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
                        <th ng-show="tieude.td6" style="width: 10%;"> <div class="dropdown position-static">
                            <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                              <div class="d-flex justify-content-center flex-column">Ngày Hiệu Lực<i class="fas fa-ellipsis-h"></i></div>
                            </div>
                            <ul class="dropdown-menu">
                              <li class="p-2">
                                <div class="mb-3">
                                  <div class="input-group"> <span class="input-group-text"> Từ </span>
                                    <input type="date" class="form-control text-danger" ng-model="NHL.from" />
                                  </div>
                                </div>
                                <div class="mb-3">
                                  <div class="input-group"> <span class="input-group-text"> Đến </span>
                                    <input type="date" class="form-control text-danger" ng-model="NHL.to" />
                                  </div>
                                </div>
                              </li>
                            </ul>
                          </div>
                        </th>
                        <th ng-show="tieude.td7" style="width: 10%;"> <div class="dropdown position-static">
                            <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                              <div class="d-flex justify-content-center flex-column">Trạng Thái<i class="fas fa-ellipsis-h"></i></div>
                            </div>
                            <ul class="dropdown-menu">
                              <li class="p-2">
                                <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                  <select chosen class="form-control text-danger" ng-model="timkiem.TTHieuluc" ng-options="s.id as s.Thuoctinh for s in ListHieuluc">
                                    <option value="" selected>Vui lòng chọn</option>
                                  </select>
                                  <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> </div>
                              </li>
                            </ul>
                          </div>
                        </th>
                        <th ng-show="tieude.td8" style="width: 10%;"> <div class="dropdown position-static">
                            <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                              <div class="d-flex justify-content-center flex-column"> Người 
                                Duyệt <i class="fas fa-ellipsis-h"></i> </div>
                            </div>
                            <ul class="dropdown-menu">
                              <li class="p-2">
                                <div class="mb-3">
                                  <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                    <select chosen class="form-control text-danger" ng-model="timkiem.idDuyet" ng-options="s.id as s.name for s in (RListNV|FKiemduyet:NhomDuyet)">
                                      <option value="" selected>Vui lòng chọn</option>
                                    </select>
                                    <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('idDuyet')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('idDuyet')"> <i class="fas fa-sort-down"></i> </span> </div>
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
                                <div class="mb-3">
                                  <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                    <input ng-model="timkiem.Ghichu"class="form-control" placeholder="Tìm Kiếm" />
                                    <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Ghichu')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Ghichu')"> <i class="fas fa-sort-down"></i> </span> </div>
                                </div>
                              </li>
                            </ul>
                          </div>
                        </th>
                        <th ng-show="tieude.td9" style="width: 10%;"> <div class="dropdown position-static">
                            <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                              <div class="d-flex justify-content-center flex-column">Tags <i class="fas fa-ellipsis-h"></i></div>
                            </div>
                            <ul class="dropdown-menu">
                              <li class="p-2">
                                <div class="mb-3">
                                  <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                    <select chosen class="form-control text-danger" ng-model="timkiem.Tags" ng-options="s.id as s.Thuoctinh for s in Maviec">
                                      <option value="" selected>Vui lòng chọn</option>
                                    </select>
                                    <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Tags')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Tags')"> <i class="fas fa-sort-down"></i> </span> </div>
                                </div>
                              </li>
                            </ul>
                          </div>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr ng-repeat="tl in Daduyet = (RATailieu | filter:{Trangthai:'2'}) | orderBy:propertyName:reverse | filter:timkiem |limitTo:limit:from | dateNgaytao:Ngaytao.from:Ngaytao.to" class="TL{{tl.id}}">
                        <td style="width: 5%;"><div class="dropdown position-static my-auto">
                            <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                              <div class="d-flex justify-content-center flex-column">{{$index+1}} <i class="fas fa-ellipsis-h my-auto"></i></div>
                            </div>
                            <ul class="dropdown-menu">
                              <li class="p-2" data-bs-toggle="modal" data-bs-target="#addtailieu" ng-click="editTailieu(tl)" ng-if="Quyen.pq13"><i class="fas fa-edit text-info"></i> Sửa</li>
                              <li class="p-2" data-bs-toggle="modal" data-bs-target="#XoaHang" ng-click="editTailieu(tl)" ng-if="Quyen.pq14"><i class="fas fa-trash-alt text-danger"></i> Xóa</li>
                            </ul>
                          </div></td>
                        <td ng-show="tieude.td1" style="width: 20%;">{{tl.idRoot|FTenchude:RChude}}</td>
                        <td ng-show="tieude.td2" style="width: 10%;">{{tl.MaTL}}</td>
                        <td ng-show="tieude.td3" style="width: 20%;">
                            <div class="d-flex"> <span class="me-2">{{tl.Tentailieu}}</span>
                            <div ng-if="tl.Lienket.length!=0" class="d-flex"> <a ng-repeat="lk in tl.Lienket" data-bs-toggle="modal" data-bs-target="#PDFView" ng-click="SetPDF(lk)"><i class="fas fa-file-pdf me-2"></i></a> </div>
                          </div></td>
                        <td ng-show="tieude.td4" style="width: 20%;"><span ng-bind-html="tl.Mota"></span></td>
                        <td ng-show="tieude.td5" style="width: 10%;"><div class="btn-group position-static"> <span data-bs-toggle="dropdown" data-bs-auto-close="outside"> <i class="fas fa-user-circle"></i> <i class="fas fa-user-circle" ng-repeat="tg in tl.idGTG | limitTo:2:0" ng-show="tl.idGTG.length >0"></i> <span ng-show="tl.idGTG.length >2"> + {{tl.idGTG.length-2}}</span> </span>
                            <ul class="dropdown-menu">
                              <li><span class="dropdown-item text-danger">{{tl.idTG|Fname:RListNV}}</span></li>
                              <li><span class="dropdown-item" ng-repeat="tg in tl.idGTG">{{tg | Fname:RListNV}}</span></li>
                            </ul>
                          </div></td>
                        <td ng-show="tieude.td6" style="width: 10%;"><div ng-if="Quyen.pq15"> <span ng-if="tl.Ngayhieuluc!=null"> {{tl.Ngayhieuluc | date:'HH:mm'}} {{tl.Ngayhieuluc | date:'dd/MM/yy'}} </span>
                            <div class="dropdown position-static" ng-if="tl.Ngayhieuluc==null">
                              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="d-flex justify-content-center"><i class="fas fa-ellipsis-h"></i></div>
                              </div>
                              <ul class="dropdown-menu">
                                <li class="p-2"> Chọn Ngày
                                  <input type="datetime-local" class="form-control text-danger my-2" ng-model="tl.Ngayhieuluc" />
                                  <button class="btn btn-primary" ng-click="UpdateNgayhieuluc(tl)">Lưu</button>
                                </li>
                              </ul>
                            </div>
                          </div></td>
                        <td ng-show="tieude.td7" style="width: 10%;"><div class="btn-group position-static"> <span class="{{tl.TTHieuluc|FMaunen:ListHieuluc}} {{tl.TTHieuluc|FMauchu:ListHieuluc}} p-1 rounded" data-bs-toggle="dropdown" data-bs-auto-close="outside">{{tl.TTHieuluc|Ftitle:ListHieuluc}}</span>
                            <ul class="dropdown-menu" ng-if="Quyen.pq15">
                              <li ng-repeat="s3 in ListHieuluc" ng-click="UpdateHieuluc(tl.id,s3.id)" ng-if="Quyen.pq15">
                                <div class="dropdown-item"><span class="{{s1.id|FMaunen:ListHieuluc}} {{s3.id|FMauchu:ListHieuluc}} {{s3.id|FMaunen:ListHieuluc}} p-1 rounded">{{s3.Thuoctinh}}</span></div>
                              </li>
                            </ul>
                          </div></td>
                        <td ng-show="tieude.td8" style="width: 10%;"><div class="btn-group position-static"> <span ng-repeat="tg1 in tl.idDuyet | limitTo:3:0" data-bs-toggle="dropdown" data-bs-auto-close="outside"><i class="fas fa-user-circle"></i></span> <span ng-show="tl.idDuyet.length >3"> + {{tl.idDuyet.length-3}}</span>
                            <ul class="dropdown-menu">
                              <li><span class="dropdown-item" ng-repeat="tg1 in tl.idDuyet">{{tg1 | Fname:RListNV}}</span></li>
                            </ul>
                          </div></td>
                        <td ng-show="tieude.td9" style="width: 20%;"><div ng-show="tl.Ghichu!=NULL">
                            <div ng-bind-html="tl.Ghichu" class="ellipsis"></div>
                            <div class="dropdown position-static">
                              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="d-flex justify-content-center"><i class="fas fa-eye me-2 my-auto"></i></div>
                              </div>
                              <ul class="dropdown-menu">
                                <li class="p-2">
                                  <div ng-bind-html="tl.Ghichu"></div>
                                </li>
                              </ul>
                            </div>
                          </div></td>
                        <td ng-show="tieude.td13" style="width: 10%;"><div class="d-flex flex-column"> <span class="bg-primary text-white rounded mb-2" ng-repeat="tg in tl.Tags"><small> {{tg | Ftitle:Maviec}}</small></span> </div></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" ng-class="{'show active': localStorage.TabTLN==1}" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"><?php echo $this->loadTemplate('tailieunguon_duyet'); ?></div>
      </div>
    </div>
  </div>
-->


<?php echo $this->loadTemplate('yeucau_duyet'); ?>
</div>
