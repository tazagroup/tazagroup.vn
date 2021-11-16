<div class="mt-2">
  <div class="nav nav-pills nav-fill flex-column flex-md-row mt-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <button class="nav-link me-sm-2 active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Ngày</button>
    <button class="nav-link me-sm-2" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Tuần</button>
    <button class="nav-link me-sm-2" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Tháng</button>
    <button class="nav-link me-sm-2" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-bienban">Biên Bản Họp</button>
  </div>
  <div class="tab-content col" id="v-pills-tabContent">
    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
      <div class="row">
        <div class="my-2">
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addkehoach"><i class="fas fa-plus-circle"></i> Thêm Mới</button>
          <div class="modal fade" id="addkehoach" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title"> {{Kehoachngay.Title}} Việc</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row p-3">
                    <div class="mb-3">
                      <div class="input-group"> <span class="input-group-text">Nội DUng </span>
                        <input type="text" class="form-control" placeholder="Mục tiêu" ng-model="Kehoachngay.Tieude">
                      </div>
                    </div>
                    <div class="mb-3">
                                          Nôi dung      
                      <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Kehoachngay.Noidung" class="form-control text-danger"></textarea>
                    </div>
                    <div class="mb-3">
                      <div class="input-group"> <span class="input-group-text">Deadline</span>
                        <input type="date" class="form-control" ng-model="Kehoachngay.Deadline">
                      </div>
                    </div>
                    <div class="mb-3" ng-init="ReadListNhanVien()">
                      <div class="input-group"> <span class="input-group-text">Người Nhận Việc</span>
                        <select chosen class="w-100" ng-model="Kehoachngay.idNhan" ng-options="s.id as s.name for s in RListNV">
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                  <button type="button" ng-show="Kehoachngay.CRUD!=1" class="btn btn-primary" ng-click="CreateDauviec(Kehoachngay,<?php echo $this->id; ?>)"> Tạo Mới</button>
                  <button type="button" ng-show="Kehoachngay.CRUD==1" class="btn btn-primary" ng-click="UpdateDauviec(Kehoachngay,<?php echo $this->id; ?>)">Cập Nhật</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row py-3">
        <div class="table-responsive-xl">
          <table class="table table-centered table-nowrap mb-0 rounded text-center table-bordered">
            <thead>
            <th> 
              <td colspan="5" scope="col">Kế Hoạch Ngày: 10/4/2021</td>
              </th>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nội Dung</th>
              <th scope="col">Mục Tiêu</th>
              <th scope="col">Thực Hiện</th>
              <th scope="col">Ghi Chú</th>
            </tr>
            </thead>
            
            <tbody>
              <tr ng-repeat="kh in RKehoach">
                <td ng-click="editKehoach(kh)">{{$index+1}}</td>
                <td><div ng-bind-html="kh.Noidung"></div></td>
                <td><div ng-bind-html="kh.Muctieu"></div></td>
                <td><div ng-bind-html="kh.Thuchien"></div></td>
                <td><div ng-bind-html="kh.Ghichu"></div></td>
              </tr>
              <tr ng-repeat="i in inputs">
                <td valign="middle" ng-click="delinput(i)"><i class="fas fa-minus-circle text-danger"></i></td>
                <td><div class="dropdown position-static">
                    <div class="border-primary border-dotted rounded-1 mh-2 p-2" data-bs-toggle="dropdown" ng-bind-html="Kehoachngay.Noidung"></div>
                    <ul class="dropdown-menu w-75 p-3">
                      <li>
                        <div class="text-center p-2">Nhập Nội Dung</div>
                        <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Kehoachngay.Noidung" class="form-control text-danger"></textarea>
                      </li>
                    </ul>
                  </div></td>
                <td><div class="dropdown position-static">
                    <div class="border-primary border-dotted rounded-1 mh-2" data-bs-toggle="dropdown" ng-bind-html="Kehoachngay.Muctieu"></div>
                    <ul class="dropdown-menu w-75 p-3">
                      <li>
                        <div class="text-center p-2">Nhập Mục Tiêu</div>
                        <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Kehoachngay.Muctieu" class="form-control text-danger"></textarea>
                      </li>
                    </ul>
                  </div></td>
                <td><div class="dropdown position-static">
                    <div class="border-primary border-dotted rounded-1 mh-2" data-bs-toggle="dropdown" ng-bind-html="Kehoachngay.Thuchien"></div>
                    <ul class="dropdown-menu w-75 p-3">
                      <li>
                        <div class="text-center p-2">Nhập Thực Hiện</div>
                        <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Kehoachngay.Thuchien" class="form-control text-danger"></textarea>
                      </li>
                    </ul>
                  </div></td>
                <td><div class="dropdown position-static">
                    <div class="border-primary border-dotted rounded-1 mh-2" data-bs-toggle="dropdown" ng-bind-html="Kehoachngay.Ghichu"></div>
                    <ul class="dropdown-menu w-75 p-3">
                      <li>
                        <div class="text-center p-2">Nhập Ghi Chú</div>
                        <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Kehoachngay.Ghichu" class="form-control text-danger"></textarea>
                      </li>
                    </ul>
                  </div></td>
              </tr>
              <tr>
                <td colspan="5" class="px-3"><div class="d-flex">
                    <div class="me-auto" ng-click="addinput()"><span class="btn btn-primary"><i class="fas fa-plus-circle"></i> Thêm Mới</span> </div>
                    <div class="ms-auto" ng-show="inputs.length!=0"> <span class="btn btn-danger" ng-click="resetinput()"><i class="fas fa-sync-alt"></i> Hủy</span> <span class="btn btn-info" ng-click="CreateKehoachngay(Kehoachngay)"><i class="fas fa-save"></i> Lưu</span> </div>
                  </div></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel">...</div>
    <div class="tab-pane fade" id="v-pills-bienban" role="tabpanel">
      <div class="row py-3">
        <div class="row py-4">
          <div class="col d-flex">
            <div class="px-2 my-auto dropdown position-static">
              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                <div class="d-flex align-items-center"><i class="fas fa-sliders-h me-1"></i><span>Ẩn/Hiện</span></i></div>
              </div>
              <ul class="dropdown-menu">
                <li class="p-2">
                  <div class="form-check form-switch"> Mã Số
                    <input class="form-check-input" type="checkbox" ng-model="tieude.td1" checked>
                  </div>
                </li>
                <li class="p-2">
                  <div class="form-check form-switch"> CTY
                    <input class="form-check-input" type="checkbox" ng-model="tieude.td2" checked>
                  </div>
                </li>
                <li class="p-2">
                  <div class="form-check form-switch"> Chủ Trì
                    <input class="form-check-input" type="checkbox"  ng-model="tieude.td3" checked>
                  </div>
                </li>
                <li class="p-2">
                  <div class="form-check form-switch"> Tham gia
                    <input class="form-check-input" type="checkbox" ng-model="tieude.td4" checked>
                  </div>
                </li>
                <li class="p-2">
                  <div class="form-check form-switch"> Ngày Triển Khai
                    <input class="form-check-input" type="checkbox" ng-model="tieude.td5" checked>
                  </div>
                </li>
                <li class="p-2">
                  <div class="form-check form-switch"> Ngày Review
                    <input class="form-check-input" type="checkbox" ng-model="tieude.td6" checked>
                  </div>
                </li>
                <li class="p-2">
                  <div class="form-check form-switch"> Ngày Hoàn Thành
                    <input class="form-check-input" type="checkbox" ng-model="tieude.td7" checked>
                  </div>
                </li>
                <li class="p-2">
                  <div class="form-check form-switch"> Nội Dung
                    <input class="form-check-input" type="checkbox" ng-model="tieude.td8" checked>
                  </div>
                </li>
                <li class="p-2">
                  <div class="form-check form-switch"> Hướng Triển Khai
                    <input class="form-check-input" type="checkbox" ng-model="tieude.td9" checked>
                  </div>
                </li>
                <li class="p-2">
                  <div class="form-check form-switch"> KQ Thực Hiện
                    <input class="form-check-input" type="checkbox" ng-model="tieude.td10" checked>
                  </div>
                </li>
                <li class="p-2">
                  <div class="form-check form-switch"> KQ Mong Đợi
                    <input class="form-check-input" type="checkbox" ng-model="tieude.td11" checked>
                  </div>
                </li>
                <li class="p-2">
                  <div class="form-check form-switch"> Biện Pháp
                    <input class="form-check-input" type="checkbox" ng-model="tieude.td12" checked>
                  </div>
                </li>
                <li class="p-2">
                  <div class="form-check form-switch"> Ngân Sách
                    <input class="form-check-input" type="checkbox" ng-model="tieude.td13" checked>
                  </div>
                </li>
                <li class="p-2">
                  <div class="form-check form-switch"> Điều Kiện
                    <input class="form-check-input" type="checkbox" ng-model="tieude.td14" checked>
                  </div>
                </li>
                <li class="p-2">
                  <div class="form-check form-switch"> Nguyên Nhân
                    <input class="form-check-input" type="checkbox" ng-model="tieude.td15" checked>
                  </div>
                </li>
              </ul>
            </div>
            <div class="mx-2 my-auto" ng-click="Lammoi()"><i class="fas fa-sync-alt"></i> <span>Làm Mới</span></div>
            
            <!--
          <div class="mx-2 my-auto">
              <div class="dropdown position-static">
  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
   <i class="fas fa-filter me-1"></i> <span>Bộ Lọc</span>
  </div>
  <ul class="dropdown-menu">
    <li><div class="dropdown-item">Menu item</div></li>
    <li><div class="dropdown-item">Menu item</div></li>
    <li><div class="dropdown-item">Menu item</div></li>
  </ul>
</div>

          </div>
--> 
          </div>
        </div>
        <div class="table-responsive-xl">
          <table class="table dauviec table-centered table-nowrap mb-0 rounded text-center table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col" ng-show="tieude.td1==true">Mã Việc</th>
                <th scope="col" ng-show="tieude.td2==true">CTY
                  <div class="dropdown position-static">
                    <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="d-flex justify-content-center"><i class="fas fa-ellipsis-v me-2 my-auto"></i> <span>CTY</span></div>
                    </div>
                    <ul class="dropdown-menu">
                      <li class="p-2">
                        <select chosen class="form-control text-danger" ng-model="timkiem.idCty" ng-options="s1.id as s1.Thuoctinh for s1 in Congty">
                          <option value="" selected ng-click="Lammoi()">Tất Cả</option>
                        </select>
                      </li>
                    </ul>
                  </div>
                </th>
                <th scope="col" ng-show="tieude.td3==true">Chủ Trì</th>
                <th scope="col" ng-show="tieude.td4==true">Tham Gia</th>
                <th scope="col" ng-show="tieude.td5==true">Ngày Triển khai</th>
                <th scope="col" ng-show="tieude.td6==true">Ngày Review</th>
                <th scope="col" ng-show="tieude.td7==true">Ngày Hoàn Thành</th>
                <th scope="col" ng-show="tieude.td8==true">Nội dung</th>
                <th scope="col" ng-show="tieude.td9==true">Hướng triển khai</th>
                <th scope="col" ng-show="tieude.td10==true">KQ thực hiện</th>
                <th scope="col" ng-show="tieude.td11==true">KQ mong đợi</th>
                <th scope="col" ng-show="tieude.td12==true">Biện pháp</th>
                <th scope="col" ng-show="tieude.td13==true">Ngân Sách</th>
                <th scope="col" ng-show="tieude.td14==true">Điều kiện</th>
                <th scope="col" ng-show="tieude.td15==true">Nguyên nhân</th>
              </tr>
            </thead>
            <tbody>
              <tr ng-repeat="bb in RLichs |filter:timkiem">
                <td data-bs-toggle="modal" data-bs-target="#modal-lichhop" ng-click="editBienban(bb.id)">{{$index+1}} </td>
                <td ng-show="tieude.td1==true">{{bb.MaViec}}</td>
                <td ng-show="tieude.td2==true">{{bb.idCty|Ftitle:Congty}}</td>
                <td ng-show="tieude.td3==true">{{bb.idChutri|Fname:RListNV}}</td>
                <td ng-show="tieude.td4==true"><div class="btn-group position-static"> <span ng-repeat="tg1 in bb.idThamgia | limitTo:3:0" data-bs-toggle="dropdown" data-bs-auto-close="outside"><i class="fas fa-user-circle"></i></span> <span ng-show="bb.idThamgia.length >3"> + {{bb.idThamgia.length-3}}</span>
                    <ul class="dropdown-menu">
                      <li><span class="dropdown-item" ng-repeat="tg1 in bb.idThamgia">{{tg1 | Fname:RListNV}}</span></li>
                    </ul>
                  </div></td>
                <td ng-show="tieude.td5==true">{{bb.Trienkhai |date:'HH:mm dd/MM/yy'}}</td>
                <td ng-show="tieude.td6==true">{{bb.Review |date:'HH:mm dd/MM/yy'}}</td>
                <td ng-show="tieude.td7==true">{{bb.Hoanthanh |date:'HH:mm dd/MM/yy'}}</td>
                <td ng-show="tieude.td8==true"><div class="ellipsis" ng-bind-html="bb.Noidung"></div></td>
                <td ng-show="tieude.td9==true"><div class="ellipsis" ng-bind-html="bb.Trienkhai"></div></td>
                <td ng-show="tieude.td10==true"><div class="ellipsis" ng-bind-html="bb.KQTH"></div></td>
                <td ng-show="tieude.td11==true"><div class="ellipsis" ng-bind-html="bb.KQMD"></div></td>
                <td ng-show="tieude.td12==true"><div class="ellipsis" ng-bind-html="bb.BPDC"></div></td>
                <td ng-show="tieude.td13==true"><div class="ellipsis" ng-bind-html="bb.Ngansach"></div></td>
                <td ng-show="tieude.td14==true"><div class="ellipsis" ng-bind-html="bb.DKkhac"></div></td>
                <td ng-show="tieude.td15==true"><div class="ellipsis" ng-bind-html="bb.Nguyennhan"></div></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
