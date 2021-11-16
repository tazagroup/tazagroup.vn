<div class="row position-relative">
  <div class="overflow-scroll">
    <div class="d-flex">
      <div class="table mt-3 ghichu">
        <table class="table dauviec table-centered table-nowrap mb-0 rounded text-center table-bordered table-hover">
          <thead class="thead-light">
            <tr>
              <th style="width: 5%;vertical-align: middle;" rowspan="3"> <div class="d-flex justify-content-center flex-column">
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
                    <h6><i class="fas fa-plus-circle" ng-click="OninitYeucauDT();" data-bs-toggle="modal" data-bs-target="#CRUDYeucau"></i></h6>
                  </div>
                </div>
              </th>
              <th ng-show="tieude.td1==true" style="width: 15%;vertical-align: middle;" rowspan="3"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Người Yêu Cầu <i class="fas fa-ellipsis-h"></i></div>
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
              <th ng-show="tieude.td1==true" style="width: 10%;vertical-align: middle;" rowspan="3"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Mã Yêu Cầu <i class="fas fa-ellipsis-h"></i></div>
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
              <th ng-show="tieude.td2==true" style="width: 20%;vertical-align: middle;" colspan="2"> <div class="d-flex justify-content-center flex-column">Học Viên Tham Dự </div>
              </th>
              <th ng-show="tieude.td5"  style="width: 10%;vertical-align: middle;" rowspan="3"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Y/c Đầu Ra <i class="fas fa-ellipsis-h"></i></div>
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
              <th ng-show="tieude.td7==true"  style="width:80%;vertical-align: middle;" colspan="8"> <div class="d-flex justify-content-center flex-column"> Chương Trình Đào Tạo </div>
              </th>
     <th ng-show="tieude.td13" style="width:10%; vertical-align: middle" rowspan="3"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Trạng Thái <i class="fas fa-ellipsis-h"></i></div>
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
                
                
              <th ng-show="tieude.td13" style="width:10%; vertical-align: middle" rowspan="3"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Đánh Giá <i class="fas fa-ellipsis-h"></i></div>
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
              <th ng-show="tieude.td13" style="width:10%; vertical-align: middle" rowspan="3"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Ghi Chú <i class="fas fa-ellipsis-h"></i></div>
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
            <tr>
              <th ng-show="tieude.td3==true" style="width:10%; vertical-align: middle" rowspan="2"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">BP Được ĐT <i class="fas fa-ellipsis-h"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="mb-3">
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                          <input ng-model="timkiem.Tenyeucaudt" type="text" class="form-control col-12" placeholder="Tìm Kiếm" />
                          <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Tenyeucaudt')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Tenyeucaudt')"> <i class="fas fa-sort-down"></i> </span> </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </th>
              <th ng-show="tieude.td4==true" style="width:10%; vertical-align: middle" rowspan="2"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Học Viên <i class="fas fa-ellipsis-h"></i></div>
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
              <th ng-show="tieude.td7==true" style="width:10%; vertical-align: middle" rowspan="2"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column"> GV Đề Xuất <i class="fas fa-ellipsis-h"></i> </div>
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
              <th ng-show="tieude.td6" style="width:10%; vertical-align: middle" colspan="2"> <div class="d-flex justify-content-center flex-column"> Thời Gian Bắt Đầu Đào Tạo </div>
              </th>
              <th ng-show="tieude.td9==true" style="width:10%; vertical-align: middle" colspan="2"> <div class="d-flex justify-content-center flex-column"> Tổng Thời Gian Đào Tạo </div>
              </th>
              <th ng-show="tieude.td10==true" style="width:10%; vertical-align: middle" rowspan="2"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column"> Hình Thức ĐT <i class="fas fa-ellipsis-h"></i> </div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="mb-3">
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                          <select chosen class="form-control text-danger" ng-model="timkiem.idDuyet" ng-options="s.id as s.name for s in RListNV">
                            <option value="" selected>Vui lòng chọn</option>
                          </select>
                          <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('idDuyet')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('idDuyet')"> <i class="fas fa-sort-down"></i> </span> </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </th>
              <th ng-show="tieude.td11==true" style="width:10%; vertical-align: middle" rowspan="2"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Trả Nội Dung <i class="fas fa-ellipsis-h"></i></div>
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
              <th ng-show="tieude.td13" style="width:10%; vertical-align: middle" rowspan="2"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Chi Phí DK <i class="fas fa-ellipsis-h"></i></div>
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
            <tr>
              <th ng-show="tieude.td6" style="width: 10%;"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column"> Dự Kiến <i class="fas fa-ellipsis-h"></i> </div>
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
              <th ng-show="tieude.td12" style="width: 10%;"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Triển Khai<i class="fas fa-ellipsis-h"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="mb-3">
                        <div class="input-group"> <span class="input-group-text"> Từ </span>
                          <input type="date" class="form-control text-danger" ng-model="Deadline.from" />
                          <span class="input-group-text" ng-click="Deadline={}"> <i class="fas fa-sync-alt"></i> </span> </div>
                      </div>
                      <div class="mb-3">
                        <div class="input-group"> <span class="input-group-text"> Đến </span>
                          <input type="date" class="form-control text-danger" ng-model="Deadline.to" />
                          <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Deadline')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Deadline')"> <i class="fas fa-sort-down"></i> </span> </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </th>
              <th ng-show="tieude.td8==true" style="width: 10%;"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column"> Dự Kiến<i class="fas fa-ellipsis-h"></i> </div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                        <select chosen class="form-control text-danger" ng-model="timkiem.TTYeucauDT" ng-options="s.id as s.Thuoctinh for s in TTYeucauDT">
                          <option value="" selected>Vui lòng chọn</option>
                        </select>
                        <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('TTYeucauDT')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('TTYeucauDT')"> <i class="fas fa-sort-down"></i> </span> </div>
                    </li>
                  </ul>
                </div>
              </th>
              <th ng-show="tieude.td9==true" style="width: 10%;"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column"> Triển Khai <i class="fas fa-ellipsis-h"></i> </div>
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
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="tl in RAYeucauDT | orderBy:propertyName:reverse | filter:timkiem |limitTo:limit:from | dateNgaytao:Ngaytao.from:Ngaytao.to" class="TL{{tl.id}}">
              <td style="width: 5%;">               
                <div class="dropdown position-static my-auto">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">{{$index+1}} <i class="fas fa-ellipsis-h my-auto"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2" data-bs-toggle="modal" data-bs-target="#addyeucaudt" ng-click="editYeucauDT(tl)" ng-if="Quyen.pq13"><i class="fas fa-edit text-info"></i> Sửa</li>
                    <li class="p-2" data-bs-toggle="modal" data-bs-target="#XoaHang" ng-click="editYeucauDT(tl)" ng-if="Quyen.pq14"><i class="fas fa-trash-alt text-danger"></i> Xóa</li>
                  </ul>
                </div></td>
              <td ng-show="tieude.td1" style="width: 15%;"> {{tl.idYeucau|Fname:RListNV}} </td>
              <td ng-show="tieude.td2" style="width: 10%;">{{tl.MaTL}}</td>
              <td ng-show="tieude.td3" style="width: 10%;">{{tl.BPDDT|FCustom:'Tennhom':RNhomnguoidung}}</td>
              <td ng-show="tieude.td4" style="width: 10%;"><div class="btn-group position-static"> <span data-bs-toggle="dropdown" data-bs-auto-close="outside"> <i class="fas fa-user-circle"></i> <i class="fas fa-user-circle" ng-repeat="tg in tl.HVTD | limitTo:2:0" ng-show="tl.HVTD.length >0"></i> <span ng-show="tl.HVTD.length >2"> + {{tl.HVTD.length-2}}</span> </span>
                  <ul class="dropdown-menu">
                    <li><span class="dropdown-item text-danger">{{tl.idTG|Fname:RListNV}}</span></li>
                    <li><span class="dropdown-item" ng-repeat="tg in tl.HVTD">{{tg | Fname:RListNV}}</span></li>
                  </ul>
                </div></td>
              <td ng-show="tieude.td5==true" style="width: 10%;"> <span ng-bind-html="tl.YCDR"></span></td>
              <td ng-show="tieude.td6==true" style="width: 10%;"> {{tl.GVDX|Fname:RListNV}} </td>
              <td ng-show="tieude.td12==true" style="width: 10%;"> {{tl.TGDTDK | date:'HH:mm'}} <br>
                {{tl.TGDTDK | date:'dd/MM/yy'}} </td>       
            <td ng-show="tieude.td12==true" style="width: 10%;"> {{tl.TGDTTT | date:'HH:mm'}} <br>
                {{tl.TGDTTT | date:'dd/MM/yy'}} </td>   
            <td ng-show="tieude.td12==true" style="width: 10%;"> {{tl.TTGDTDK | date:'HH:mm'}} <br>
                {{tl.TTGDTDK | date:'dd/MM/yy'}} </td>           
            <td ng-show="tieude.td12==true" style="width: 10%;"> {{tl.TTGDTTT | date:'HH:mm'}} <br>
                {{tl.TTGDTTT | date:'dd/MM/yy'}} </td>
              <td ng-show="tieude.td8==true" style="width: 10%;">{{tl.HTDT|FCustom:'Thuoctinh':Loaihinhhop}}</td>
              <td ng-show="tieude.td8==true" style="width: 10%;"><span ng-bind-html="tl.TraNDDT"></span></td>
              <td ng-show="tieude.td8==true" style="width: 10%;">{{tl.CPDK| currency:"":0}} đ</td>
              <td ng-show="tieude.td8==true" style="width: 10%;"><div class="btn-group position-static"> <span class="{{tl.Trangthai|FMaunen:TTDuyet}} {{tl.Trangthai|FMauchu:TTDuyet}} p-1 rounded" data-bs-toggle="dropdown" data-bs-auto-close="outside">{{tl.Trangthai|Ftitle:TTDuyet}}</span>
                  <ul class="dropdown-menu" ng-show="         
         {{<?php echo $this->idUser; ?>|Fduyet:tl.idDuyet}}">
                    <li ng-repeat="s1 in TTDuyet" ng-click="UpdateDuyetYeucau(tl.id,s1.id)">
                      <div class="dropdown-item"><span class="{{s1.id|FMaunen:TTDuyet}} {{s1.id|FMauchu:TTDuyet}} p-1 rounded">{{s1.Thuoctinh}}</span></div>
                    </li>
                  </ul>
                </div></td>
              <td ng-show="tieude.td8==true" style="width: 10%;"><span ng-bind-html="tl.Danhgia"></span></td>
              <td ng-show="tieude.td8==true" style="width: 10%;"><span ng-bind-html="tl.Ghichu"></span></td>
<!--
              <td ng-show="tieude.td9==true" style="width: 10%;"><div class="btn-group position-static"> <span class="{{tl.Trangthai|FMaunen:TTDuyet}} {{tl.Trangthai|FMauchu:TTDuyet}} p-1 rounded" data-bs-toggle="dropdown" data-bs-auto-close="outside">{{tl.Trangthai|Ftitle:TTDuyet}}</span>
                  <ul class="dropdown-menu" ng-show="         
       {{<?php echo $this->idUser; ?>|Fduyet:tl.idDuyet}}">
                    <li ng-repeat="s1 in TTDuyet" ng-click="UpdateTTDuyet(tl.id,s1.id)">
                      <div class="dropdown-item"><span class="{{s1.id|FMaunen:TTDuyet}} {{s1.id|FMauchu:TTDuyet}} p-1 rounded">{{s1.Thuoctinh}}</span></div>
                    </li>
                  </ul>
                </div></td>
              <td ng-show="tieude.td10==true" style="width: 10%;"><div class="btn-group position-static"> <span ng-repeat="tg1 in tl.idDuyet | limitTo:3:0" data-bs-toggle="dropdown" data-bs-auto-close="outside"><i class="fas fa-user-circle"></i></span> <span ng-show="tl.idDuyet.length >3"> + {{tl.idDuyet.length-3}}</span>
                  <ul class="dropdown-menu">
                    <li><span class="dropdown-item" ng-repeat="tg1 in tl.idDuyet">{{tg1 | Fname:RListNV}}</span></li>
                  </ul>
                </div></td>
              <td ng-show="tieude.td11==true" style="width: 20%;"><div ng-show="tl.Ghichu!=NULL">
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
-->
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
