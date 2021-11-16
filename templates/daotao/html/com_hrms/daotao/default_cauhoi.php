<div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100" ng-init="OninitCauhoi()">
  <div class="modal fade" id="addcauhoi" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="h6 modal-title">Thêm Câu Hỏi</h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ng-click="OninitCauhoi()"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <div class="row">
              <div class="col-sm-4">
                <div class="input-group"> <span class="input-group-text"> Chủ Đề </span>
                  <select chosen class="form-control text-danger" ng-model="Cauhoi.idChude" ng-options="s.id as s.Tenchude for s in RChude">
                    <option value="" selected>Vui lòng chọn</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="input-group"> <span class="input-group-text"> Tags </span>
                  <select chosen multiple class="form-control text-danger" ng-model="Cauhoi.Tags" ng-options="s.id as s.Thuoctinh for s in Congty">
                    <option value="" selected></option>
                  </select>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="input-group"> <span class="input-group-text"> Cấp Độ </span>
                  <select chosen multiple class="form-control text-danger" ng-model="Cauhoi.Tags" ng-options="s.id as s.Thuoctinh for s in Congty">
                    <option value="" selected></option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-sm-6"> Câu Hỏi
              <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Cauhoi.Mota" class="form-control text-danger"></textarea>
            </div>
            <div class="col-sm-6"> Đáp án
              <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Cauhoi.Ghichu" class="form-control text-danger"></textarea>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-sm-12"> Trả Lời
              <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Cauhoi.Mota" class="form-control text-danger"></textarea>
            </div>
          </div>
          <div class="mb-3"> Kiểm Duyệt
            <select chosen multiple class="form-control text-danger" ng-model="Cauhoi.idDuyet" ng-options="s.id as s.name for s in RListNV">
              <option value="" selected></option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button ng-show="Cauhoi.CRUD==0" type="button" class="text-white btn btn-success ms-2" ng-click="CreateCauhoi(Cauhoi)">Lưu</button>
          <button ng-show="Cauhoi.CRUD!=0" type="button" class="text-white btn btn-success ms-2" ng-click="UpdateCauhoi(Cauhoi)">Cập Nhật</button>
          <button type="button" class="text-white btn btn-danger ms-2" data-bs-dismiss="modal" ng-click="OninitCauhoi()">Đóng</button>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div ng-class="!localStorage.MenuCD ? 'col-3' : 'd-none'"><?php echo $this->loadTemplate('chude_cauhoi'); ?></div>
    <div ng-class="!localStorage.MenuCD ? 'col-9' : 'col-12'">
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <div>
            <button class="btn btn-primary me-2"  ng-click="Store('MenuCD',!localStorage.MenuCD)"><i class="fas fa-bars m-auto"></i></button>
          </div>
          <button class="nav-link" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-cauhoi" type="button" role="tab" aria-controls="nav-home" aria-selected="true" ng-class="{'active': localStorage.TabCH==0}" ng-click="Store('TabCH',0);Phantrang(Daduyet,SLitem,Chontrang)">Ngân Hàng Câu Hỏi <span class="badge bg-info">{{Daduyet.length}}</span></button>
          <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false" ng-class="{'active': localStorage.TabCH==1}" ng-click="Store('TabCH',1);Phantrang(RACauhoi,SLitem,Chontrang)"> <i class="fas fa-user-check me-2"></i> Duyệt Câu hỏi <span class="badge bg-danger">{{RACauhoi.length-Daduyet.length}}</span> </button>
          <div class="d-flex ms-auto">
            <div class="me-3">
              <div class="input-group"> <span class="input-group-text"><span class="badge bg-primary me-2">{{RACauhoi.length}}</span> Câu hỏi </span> </div>
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
        <div class="tab-pane fade" ng-class="{'show active': localStorage.TabCH==0}" id="nav-cauhoi" role="tabpanel" aria-labelledby="nav-home-tab">
          <div class="row position-relative">
            <div class="row position-relative">
              <div class="overflow-scroll">
                <div class="d-flex">
                  <div class="table mt-3 ghichu">
                    <table class="table dauviec table-centered table-nowrap mb-0 rounded text-center table-bordered table-hover">
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
                              <div> </div>
                            </div>
                          </th>
                          <th ng-show="tieude.td1" style="width: 15%;"> <div class="dropdown position-static">
                              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="d-flex justify-content-center flex-column">Chủ Đề <i class="fas fa-ellipsis-h"></i></div>
                              </div>
                              <ul class="dropdown-menu">
                                <li class="p-2">
                                  <div class="mb-3">
                                    <div class="mb-3">
                                      <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                        <select chosen class="form-control text-danger" ng-model="timkiem.idRoot" ng-options="s.id as s.Tenchude for s in RFChude">
                                          <option value="" selected>Vui lòng chọn</option>
                                        </select>
                                        <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('idRoot')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('idRoot')"> <i class="fas fa-sort-down"></i> </span> </div>
                                    </div>
                                  </div>
                                </li>
                              </ul>
                            </div>
                          </th>
                          <th ng-show="tieude.td2" style="width: 20%;"> <div class="dropdown position-static">
                              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="d-flex justify-content-center flex-column">Tài Liệu Nguồn <i class="fas fa-ellipsis-h"></i></div>
                              </div>
                              <ul class="dropdown-menu">
                                <li class="p-2">
                                  <div class="mb-3">
                                    <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                      <select chosen class="form-control text-danger" ng-model="timkiem.idTL" ng-options="s.idTL as s.idTL|FTailieu:TailieuGoc for s in (RACauhoi|unique:'idTL')">
                                        <option value="" selected>Vui lòng chọn</option>
                                      </select>
                                      <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('idTL')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('idTL')"> <i class="fas fa-sort-down"></i> </span> </div>
                                  </div>
                                </li>
                              </ul>
                            </div>
                          </th>
                          <th ng-show="tieude.td3" style="width: 10%;"> <div class="dropdown position-static">
                              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="d-flex justify-content-center flex-column">Mã CH <i class="fas fa-ellipsis-h"></i></div>
                              </div>
                              <ul class="dropdown-menu">
                                <li class="p-2">
                                  <div class="mb-3">
                                    <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                      <input ng-model="timkiem.MaCH" type="text" class="form-control col-12" placeholder="Tìm Kiếm">
                                      <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('MaCH')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('MaCH')"> <i class="fas fa-sort-down"></i> </span> </div>
                                  </div>
                                </li>
                              </ul>
                            </div>
                          </th>
                          <th ng-show="tieude.td4" style="width: 20%;"> <div class="dropdown position-static">
                              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="d-flex justify-content-center flex-column">Câu Hỏi <i class="fas fa-ellipsis-h"></i></div>
                              </div>
                              <ul class="dropdown-menu">
                                <li class="p-2">
                                  <div class="mb-3">
                                    <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                      <input ng-model="timkiem.Cauhoi" type="text" class="form-control col-12" placeholder="Tìm Kiếm">
                                      <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Cauhoi')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Cauhoi')"> <i class="fas fa-sort-down"></i> </span> </div>
                                  </div>
                                </li>
                              </ul>
                            </div>
                          </th>
                          <th ng-show="tieude.td5" style="width: 20%;"> <div class="dropdown position-static">
                              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="d-flex justify-content-center flex-column">Trả Lời <i class="fas fa-ellipsis-h"></i></div>
                              </div>
                              <ul class="dropdown-menu">
                                <li class="p-2">
                                  <div class="mb-3">
                                    <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                      <input ng-model="timkiem.Traloi" type="text" class="form-control col-12" placeholder="Tìm Kiếm">
                                      <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Traloi')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Traloi')"> <i class="fas fa-sort-down"></i> </span> </div>
                                  </div>
                                </li>
                              </ul>
                            </div>
                          </th>
                          <th ng-show="tieude.td6" style="width: 20%;"> <div class="dropdown position-static">
                              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="d-flex justify-content-center flex-column">Đáp án <i class="fas fa-ellipsis-h"></i></div>
                              </div>
                              <ul class="dropdown-menu">
                                <li class="p-2">
                                  <div class="mb-3">
                                    <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                      <input ng-model="timkiem.Dapan.data" type="text" class="form-control col-12" placeholder="Tìm Kiếm">
                                      <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Dapan')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Dapan')"> <i class="fas fa-sort-down"></i> </span> </div>
                                  </div>
                                </li>
                              </ul>
                            </div>
                          </th>
                          <th ng-show="tieude.td7" style="width: 10%;"> <div class="dropdown position-static">
                              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="d-flex justify-content-center flex-column">Cấp Độ <i class="fas fa-ellipsis-h"></i></div>
                              </div>
                              <ul class="dropdown-menu">
                                <li class="p-2">
                                  <div class="mb-3">
                                    <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                      <select multiple chosen class="form-control text-danger" ng-model="Capdo" ng-options="s.id as s.Thuoctinh for s in ListCapdo">
                                        <option value="" selected>Vui lòng chọn</option>
                                      </select>
                                      <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Capdo')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Capdo')"> <i class="fas fa-sort-down"></i> </span> </div>
                                  </div>
                                </li>
                              </ul>
                            </div>
                          </th>
                          <th ng-show="tieude.td8" style="width: 10%;"> <div class="dropdown position-static">
                              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="d-flex justify-content-center flex-column">Trạng Thái<i class="fas fa-ellipsis-h"></i></div>
                              </div>
                              <ul class="dropdown-menu">
                                <li class="p-2">
                                  <div class="mb-3">
                                    <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                      <select chosen class="form-control text-danger" ng-model="timkiem.Trangthai" ng-options="s.id as s.Thuoctinh for s in TTDuyet">
                                        <option value="" selected>Vui lòng chọn</option>
                                      </select>
                                      <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Trangthai')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Trangthai')"> <i class="fas fa-sort-down"></i> </span> </div>
                                  </div>
                                </li>
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
                                        <option value="" selected>Vui lòng chọn</option>
                                      </select>
                                      <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('idTao')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('idTao')"> <i class="fas fa-sort-down"></i> </span> </div>
                                  </div>
                                </li>
                              </ul>
                            </div>
                          </th>
                          <th ng-show="tieude.td10" style="width: 10%;"> <div class="dropdown position-static">
                              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="d-flex justify-content-center flex-column"> Người Duyệt <i class="fas fa-ellipsis-h"></i> </div>
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
                          <th ng-show="tieude.td11" style="width: 10%;"> <div class="dropdown position-static">
                              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="d-flex justify-content-center flex-column"> Ngày 
                                  tạo <i class="fas fa-ellipsis-h"></i> </div>
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
                          <th ng-show="tieude.td12" style="width: 20%;"> <div class="dropdown position-static">
                              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="d-flex justify-content-center flex-column">Ghi Chú <i class="fas fa-ellipsis-h"></i></div>
                              </div>
                              <ul class="dropdown-menu">
                                <li class="p-2">
                                  <div class="mb-3">
                                    <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                      <input ng-model="timkiem.Ghichu" type="text" class="form-control col-12" placeholder="Tìm Kiếm">
                                      <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Ghichu')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Ghichu')"> <i class="fas fa-sort-down"></i> </span> </div>
                                  </div>
                                </li>
                              </ul>
                            </div>
                          </th>
                          <th ng-show="tieude.td12" style="width: 20%;"> <div class="dropdown position-static">
                              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="d-flex justify-content-center flex-column">Tags<i class="fas fa-ellipsis-h"></i></div>
                              </div>
                              <ul class="dropdown-menu">
                                <li class="p-2">
                                  <div class="mb-3">
                                    <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                      <input ng-model="timkiem.Tags" type="text" class="form-control col-12" placeholder="Tìm Kiếm">
                                      <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Tags')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Tags')"> <i class="fas fa-sort-down"></i> </span> </div>
                                  </div>
                                </li>
                              </ul>
                            </div>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="rc in Daduyet=(RACauhoi|filter:{Trangthai:2}) |FMT:Capdo:'Capdo' | orderBy:propertyName:reverse | filter:timkiem |limitTo:limit:from | dateNgaytao:Ngaytao.from:Ngaytao.to">
                          <td style="width: 10%;">
                                <div class="d-flex justify-content-center flex-column">{{$index+1}} </div>
                            </td>
                          <td ng-show="tieude.td1" style="width: 15%;">{{rc.idRoot|FTenchude:RChude}}</td>
                          <td ng-show="tieude.td2" style="width: 20%;">{{rc.idTL|FTailieu:TailieuGoc}}</td>
                          <td ng-show="tieude.td3" style="width: 10%;" data-bs-toggle="modal" data-bs-target="#DemoCauhoi" ng-click="DemoCauhoi(rc)">{{rc.MaCH}} <i class="fas fa-eye me-2 my-auto"></i></td>
                          <td ng-show="tieude.td4" style="width: 20%;"><div class="ellipsis" ng-bind-html="rc.Cauhoi"></div>
                            <div class="dropdown position-static">
                              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="d-flex justify-content-center"></div>
                              </div>
                              <ul class="dropdown-menu">
                                <li class="p-4 overflow-scroll">
                                  <div ng-bind-html="rc.Cauhoi"></div>
                                </li>
                              </ul>
                            </div></td>
                          <td ng-show="tieude.td5" style="width: 20%;" align="left"><div class="ellipsis"><span class="ms-2" ng-repeat="tl in rc.Traloi">{{$index+1|FABC}}. {{tl.value}}</span></div></td>
                          <td ng-show="tieude.td6" style="width: 20%;"><div class="ellipsis">
                              <div ng-if="rc.Dapan.type==1">
                                <div ng-bind-html="rc.Dapan.data"></div>
                              </div>
                              <div ng-if="rc.Dapan.type==0">
                                <div>{{rc.Dapan.data.value}}</div>
                              </div>
                            </div></td>
                          <td ng-show="tieude.td7" style="width: 10%;">{{rc.Capdo|Ftitle:ListCapdo}}</td>
                          <td ng-show="tieude.td8" style="width: 10%;"><div class="btn-group position-static"> <span class="{{rc.Trangthai|FMaunen:TTDuyet}} {{rc.Trangthai|FMauchu:TTDuyet}} p-1 rounded" data-bs-toggle="dropdown" data-bs-auto-close="outside">{{rc.Trangthai|Ftitle:TTDuyet}}</span>
                              <ul class="dropdown-menu" ng-show="         
         {{<?php echo $this->idUser; ?>|Fduyet:rc.idDuyet}}">
                                <li ng-repeat="s1 in TTDuyet" ng-click="UpdateTTDuyetCH(rc.id,s1.id)">
                                  <div class="dropdown-item"><span class="{{s1.id|FMaunen:TTDuyet}} {{s1.id|FMauchu:TTDuyet}} p-1 rounded">{{s1.Thuoctinh}}</span></div>
                                </li>
                              </ul>
                            </div></td>
                          <td ng-show="tieude.td9" style="width: 10%;"><div class="btn-group position-static"> <span data-bs-toggle="dropdown" data-bs-auto-close="outside"><i class="fas fa-user-circle"></i></span>
                              <ul class="dropdown-menu">
                                <li><span class="dropdown-item text-danger">{{rc.idTao|Fname:RListNV}}</span></li>
                              </ul>
                            </div></td>
                          <td ng-show="tieude.td10" style="width: 10%;"><div class="btn-group position-static" ng-if="rc.idDuyet"> <span data-bs-toggle="dropdown" data-bs-auto-close="outside"><i class="fas fa-user-circle"></i></span>
                              <ul class="dropdown-menu">
                                <li><span class="dropdown-item text-danger" ng-repeat="d in rc.idDuyet">{{d|Fname:RListNV}}</span></li>
                              </ul>
                            </div></td>
                          <td ng-show="tieude.td11" style="width: 10%;">{{rc.Ngaytao | date:'HH:mm'}} {{rc.Ngaytao | date:'dd/MM/yy'}}</td>
                          <td ng-show="tieude.td12" style="width: 20%;"><div ng-bind-html="rc.Ghichu"></div></td>
                          <td ng-show="tieude.td13" style="width: 20%;"><span ng-if="rc.Tags" class="bg-primary text-white p-2 rounded">{{rc.Tags|Ftitle:ListTagsTLN}}</span></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" ng-class="{'show active': localStorage.TabCH==1}" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"><?php echo $this->loadTemplate('cauhoi_duyet'); ?></div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="XoaHang" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Xóa Câu Hỏi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body"> Bạn có chắc chắn xóa <span class="text-danger" ng-bind-html="Cauhoi.Cauhoi"></span> </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" ng-click="DeleteCauhoi(Cauhoi)">Xóa</button>
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="DemoCauhoi" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg hinhcauhoi">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Xem Trước Câu Hỏi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
          <div class="card mb-3">
            <div class="card-header text-white bg-primary p-2">
              <div> Câu Hỏi</div>
            </div>
            <div class="card-body">
              <div ng-bind-html="Demo.Cauhoi"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <div class="card">
                <div class="card-header text-white bg-primary p-2">
                  <div> Trả Lời</div>
                </div>
                <div class="card-body text-start">
                  <div ng-repeat="tl in Demo.Traloi"><span class="me-2 badge rounded-pill bg-primary">{{tl.id|FABC}}</span> {{tl.value}}</div>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="card">
                <div class="card-header text-white bg-primary p-2">
                  <div> Đáp Án - {{Demo.Dapan.type==1 ? 'Tự Luận' : 'Trắc Nghiệm'}}</div>
                </div>
                <div class="card-body">
                  <div ng-if="Demo.Dapan.type==0"> <span class="me-2 badge rounded-pill bg-primary">{{Demo.Dapan.data.id|FABC}}</span> {{Demo.Dapan.data.value}}</div>
                  <div ng-if="Demo.Dapan.type!=0" ng-bind-html="Demo.Dapan.data"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="CRUDCauhoi" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{Cauhoi.Title}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row p-3">
          <div class="mb-3 col-3">
            <div class="input-group"> <span class="input-group-text">Chủ Đề</span>
              <input class="form-control" type="text" placeholder="{{Cauhoi.idRoot|FTenchude:RChude}}" disabled>
            </div>
          </div>
          <div class="mb-3 col-6">
            <div class="input-group"> <span class="input-group-text">Tài Liệu Nguồn</span>
              <select chosen class="form-control text-danger" ng-model="Cauhoi.idTL" ng-options="s.id as s.MaTL +' - '+ s.Tentailieu  for s in (TailieuGoc| filter:{Trangthai:'2'})" ng-change="LoadCD(Cauhoi.idTL)">
                <option value="" selected>Vui lòng chọn Tên Tài Liệu Nguồn</option>
              </select>
            </div>
          </div>
          <div class="mb-3 col-3">
            <div class="input-group"> <span class="input-group-text">Mã Câu Hỏi</span>
              <input type="text" class="form-control text-danger" placeholder="{{Cauhoi.MaCH}}" disabled>
            </div>
          </div>
          <div class="mb-3 col-12"> Câu hỏi
            <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Cauhoi.Cauhoi" class="form-control text-danger"></textarea>
          </div>
          <div class="mb-3 col-6"> 
<div class="input-group">            <span class="input-group-text d-flex flex-column justify-content-center">
            <div>Trả Lời</div>
            <button class="btn btn-primary" ng-click="addinput()"><i class="fas fa-plus-circle"></i></button>
            </span>
            <div class="form-control">
              <div class="form-check d-flex p-0 mb-3" ng-repeat="i1 in inputs"> <span class="m-auto p-2 me-2 badge rounded-pill bg-primary">{{$index+1|
                FABC}}</span>
                <input type="hidden" class="form-control" ng-model="i1.id" ng-init="i1.id=$index+1"/>
                <input class="form-control" ng-model="i1.value" />
                  <i class="fas fa-minus-circle ms-2 my-auto text-danger" ng-click="delinput(i1)"></i>
              </div>
            </div></div>
          </div>
          <div class="mb-3 col-6">
            <div class="input-group"> <span class="input-group-text">Đáp án</span>
              <div class="form-control">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="Radtraloi" id="Radtraloi1" value="0" ng-model="Cauhoi.Dapan.type" checked />
                  <label class="form-check-label" for="Radtraloi1"> Trắc Nghiệm </label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="Radtraloi" id="Radtraloi2" value="1" ng-model="Cauhoi.Dapan.type"/>
                  <label class="form-check-label" for="Radtraloi2"> Tự Luận </label>
                </div>
              </div>
              <div class="p-2" ng-show="Cauhoi.Dapan.type==0">
                <div class="form-check d-flex p-0 mb-3" ng-repeat="i1 in inputs"> <span class="m-auto p-2" ng-click="CheckDapan(i1)"><span class="me-2 badge rounded-pill" ng-class="i1.check==true?'bg-danger':'bg-primary'">{{i1.id|FABC}}</span> </span>
                  <input class="form-control" ng-model="i1.value" disabled />
                </div>
              </div>
              <div class="p-2" ng-show="Cauhoi.Dapan.type==1">
                <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Cauhoi.Dapan.data" class="form-control text-danger"></textarea>
              </div>
            </div>
          </div>
          <div class="mb-3 col-6">
<div class="input-group"> <span class="input-group-text">Cấp Độ </span>
                        <select chosen class="form-control text-danger" ng-model="Cauhoi.Capdo" ng-options="s.id as s.Thuoctinh for s in ListCapdo">
                          <option value="" selected>Vui lòng chọn</option>
                        </select>
                      </div>
          </div>     
            <div class="mb-3 col-6">
<div class="input-group"> <span class="input-group-text"> Người Duyệt </span>
                        <select chosen multiple class="form-control text-danger" ng-model="Cauhoi.idDuyet" ng-options="s.id as s.name for s in (RListNV|FKiemduyet:NhomDuyet)">
                          <option value="" selected>Vui lòng chọn</option>
                        </select>
                      </div>
          </div>
          <div class="mb-3 col-8">
              Ghi Chú
            <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Cauhoi.Ghichu" class="form-control text-danger"></textarea>
          </div>          
            <div class="mb-3 col-4">
            <div class="input-group"> <span class="input-group-text">Tags</span>
                       <select multiple chosen class="form-control text-danger" ng-model="Cauhoi.Tags" ng-options="s.id as s.Thuoctinh for s in ListTags">
                          <option value="" selected>Vui lòng chọn</option>
                        </select>
                      </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button ng-if="Cauhoi.CRUD==0" class="btn btn-info" ng-click="CreateCauhoi(Cauhoi)">Tạo Mới</button>
        <button ng-if="Cauhoi.CRUD!=0"class="btn btn-success text-white" ng-click="UpdateCauhoi(Cauhoi)">Cập Nhật</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>
