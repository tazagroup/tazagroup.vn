<div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100" ng-init="OninitNhomnguoidung()">
    <div class="d-flex mb-3">
      <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#addnhom" ng-click="OninitNhomnguoidung()"><i class="fas fa-plus-circle me-2" ></i>Thêm Nhóm</button>
      <div class="modal fade" id="addnhom" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="h6 modal-title">{{Nhomnguoidung.Title}} Người Dùng</h2>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <div class="input-group"> <span class="input-group-text"> Tên Nhóm</span>
                  <input type="text" class="form-control" ng-model="Nhomnguoidung.Tennhom" placeholder="Tên Nhóm">
                </div>
              </div>
              <div class="mb-3">
                <div class="input-group"> <span class="input-group-text">Nhóm Cha</span>
                <select chosen class="form-control text-danger" ng-model="Nhomnguoidung.Parent" ng-options="s as s.Tennhom for s in RNhomnguoidung">
                 <option value="" selected>Vui lòng chọn</option>
        </select>
                </div>
              </div>
            <div class="mb-3">
             Mô Tả Nhóm   
           <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Nhomnguoidung.Mota" class="form-control text-danger"></textarea>
                
                </div>          
                
                
            </div>
            <div class="modal-footer">
      <button ng-show="Nhomnguoidung.CRUD==0" class="text-white btn btn-primary ms-2" ng-click="CreateNhomnguoidung(Nhomnguoidung)">Thêm</button>   
      <button ng-show="Nhomnguoidung.CRUD!=0" class="text-white btn btn-primary ms-2" ng-click="UpdateNhomnguoidung(Nhomnguoidung)">Cập Nhật</button>
              <button type="button" class="text-white btn btn-danger ms-2" data-bs-dismiss="modal">Đóng</button>
            </div>
          </div>
        </div>
      </div>
      
  <div class="modal fade" id="XoaHang" data-bs-backdrop="static" data-bs-keyboard="false">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"> Xóa Nhóm</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body"> Bạn có Chắc Chắn Xóa <span class="text-danger" ng-bind-html="Nhomnguoidung.Tennhom"></span> </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            <button type="button" class="btn btn-primary" ng-click="DeleteNhomnguoidung(Nhomnguoidung)"> Xóa</button>
          </div>
        </div>
      </div>
    </div>
        
        
    </div>
    <div class="row">
      <div class="table-responsive mt-3 ghichu">
              <table class="table table-centered mb-0 rounded text-center table-bordered table-hover">
                <thead class="thead-light">
                  <tr>
                    <th style="width:5%"> <div class="px-2 my-auto dropdown position-static">
                        <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside"> <span>#</span> </div>
                        <ul class="dropdown-menu">
                          <li class="p-2">
                            <div class="form-check form-switch">Tên Nhóm
                              <input class="form-check-input" type="checkbox" ng-model="tieude.td1" checked>
                            </div>
                          </li>
                          <li class="p-2">
                            <div class="form-check form-switch"> Người Dùng
                              <input class="form-check-input" type="checkbox" ng-model="tieude.td2" checked>
                            </div>
                          </li>
                          <li class="p-2">
                            <div class="form-check form-switch"> Mô Tả Nhóm
                              <input class="form-check-input" type="checkbox"  ng-model="tieude.td3" checked>
                            </div>
                          </li>
                            <li class="p-2">
                            <div class="form-check form-switch"> Phân Quyền
                              <input class="form-check-input" type="checkbox"  ng-model="tieude.td6" checked>
                            </div>
                          </li>                          
                          <li class="p-2">
                            <div class="form-check form-switch"> Người Tạo
                              <input class="form-check-input" type="checkbox" ng-model="tieude.td4" checked>
                            </div>
                          </li>
                          <li class="p-2">
                            <div class="form-check form-switch"> Ngày Tạo
                              <input class="form-check-input" type="checkbox" ng-model="tieude.td5" checked>
                            </div>
                          </li>
                          <li class="p-2">
                            <div class="btn btn-primary" ng-click="LuuAnhien(tieude)">Lưu</div>
                          </li>
                        </ul>
                      </div>
                    </th>
                    <th ng-show="tieude.td1==true" style="width:20%"> <div class="dropdown position-static">
                        <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                          <div class="d-flex justify-content-center"><i class="fas fa-ellipsis-v me-2 my-auto"></i> Tên Nhóm </div>
                        </div>
                        <ul class="dropdown-menu">
                          <li class="p-2">
                            <div class="mb-3">
                              <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                <input ng-model="timkiem" type="text" class="form-control col-12" placeholder="Tìm Kiếm">
                              </div>
                              <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-sort-amount-up-alt"></i> </span>
                                <input disabled class="form-control col-12" placeholder="Tăng Dần">
                              </div>
                              <div class="input-group"> <span class="input-group-text"> <i class="fas fa-sort-amount-down"></i> </span>
                                <input disabled class="form-control col-12" placeholder="Giảm Dần">
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </th>
                    <th ng-show="tieude.td2==true" style="width:50%"><div class="dropdown position-static" >
                        <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                          <div class="d-flex justify-content-center"><i class="fas fa-ellipsis-v me-2 my-auto"></i> Người Dùng</div>
                        </div>
                        <ul class="dropdown-menu">
                          <li class="p-2">
                            <div class="mb-3">
                              <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                <input ng-model="timkiem" type="text" class="form-control col-12" placeholder="Tìm Kiếm">
                              </div>
                              <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-sort-amount-up-alt"></i> </span>
                                <input disabled class="form-control col-12" placeholder="Tăng Dần">
                              </div>
                              <div class="input-group"> <span class="input-group-text"> <i class="fas fa-sort-amount-down"></i> </span>
                                <input disabled class="form-control col-12" placeholder="Giảm Dần">
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </th>
                    <th ng-show="tieude.td3==true" style="width:20%"> <div class="dropdown position-static">
                        <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                          <div class="d-flex justify-content-center"><i class="fas fa-ellipsis-v me-2 my-auto"></i> Mô Tả Nhóm</div>
                        </div>
                        <ul class="dropdown-menu">
                          <li class="p-2">
                            <div class="mb-3">
                              <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                <input ng-model="timkiem.Ghichu" type="text" class="form-control col-12" placeholder="Tìm Kiếm">
                                    <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                <input ng-model="timkiem.Ghichu" type="text" class="form-control col-12" placeholder="Tìm Kiếm">
                              </div>                        </div>
                                
                              <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-sort-amount-up-alt"></i> </span>
                                <input disabled class="form-control col-12" placeholder="Tăng Dần">
                              </div>
                              <div class="input-group"> <span class="input-group-text"> <i class="fas fa-sort-amount-down"></i> </span>
                                <input disabled class="form-control col-12" placeholder="Giảm Dần">
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </th>
 <th ng-show="tieude.td6==true" style="width:20%"> <div class="dropdown position-static">
                        <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                          <div class="d-flex justify-content-center"><i class="fas fa-ellipsis-v me-2 my-auto"></i> Phân Quyền</div>
                        </div>
                        <ul class="dropdown-menu">
                          <li class="p-2">
                            <div class="mb-3">
                              <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                <input ng-model="timkiem.Ghichu" type="text" class="form-control col-12" placeholder="Tìm Kiếm">
                                    <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                <input ng-model="timkiem.Ghichu" type="text" class="form-control col-12" placeholder="Tìm Kiếm">
                              </div>                        </div>
                                
                              <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-sort-amount-up-alt"></i> </span>
                                <input disabled class="form-control col-12" placeholder="Tăng Dần">
                              </div>
                              <div class="input-group"> <span class="input-group-text"> <i class="fas fa-sort-amount-down"></i> </span>
                                <input disabled class="form-control col-12" placeholder="Giảm Dần">
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </th>                     
                    <th ng-show="tieude.td4==true" style="width:10%"> <div class="dropdown position-static">
                        <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                          <div class="d-flex justify-content-center"><i class="fas fa-ellipsis-v me-2 my-auto"></i> Người Tạo</div>
                        </div>
                        <ul class="dropdown-menu">
                          <li class="p-2">
                            <div class="mb-3">
                              <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                <select chosen multiple class="form-control text-danger" ng-model="Lichhop.idChutri" ng-options="s.id as s.name for s in RListNV">
                                  <option value="" selected>Vui lòng chọn</option>
                                </select>
                              </div>
                              <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-sort-amount-up-alt"></i> </span>
                                <input disabled class="form-control col-12" placeholder="Tăng Dần">
                              </div>
                              <div class="input-group"> <span class="input-group-text"> <i class="fas fa-sort-amount-down"></i> </span>
                                <input disabled class="form-control col-12" placeholder="Giảm Dần">
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </th>
                    <th ng-show="tieude.td5==true" style="width:10%"><div class="dropdown position-static">
                        <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                          <div class="d-flex justify-content-center"><i class="fas fa-ellipsis-v me-2 my-auto"></i> Ngày tạo </div>
                        </div>
                        <ul class="dropdown-menu">
                          <li class="p-2">
                            <div class="mb-3">
                              <div class="input-group"> <span class="input-group-text"> Từ </span>
                                <input type="date" class="form-control text-danger" ng-model="dl.from" />
                              </div>
                            </div>
                            <div class="mb-3">
                              <div class="input-group"> <span class="input-group-text"> Đến </span>
                                <input type="date" class="form-control text-danger" ng-model="dl.to" />
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr ng-repeat="tl in RNhomnguoidung | filter:timkiem">
                    <td style="width:5%"><div class="dropdown position-static my-auto">
                        <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                          <div class="d-flex justify-content-center">{{$index+1}}</div>
                        </div>
                        <ul class="dropdown-menu">
                          <li class="p-2" data-bs-toggle="modal" data-bs-target="#addnhom" ng-click="editNhomnguoidung(tl)"> <i class="fas fa-edit text-info"></i> Sửa </li>
                          <li class="p-2" data-bs-toggle="modal" data-bs-target="#XoaHang" ng-click="editNhomnguoidung(tl)"> <i class="fas fa-trash-alt text-danger"></i> Xóa </li>
                        </ul>
                      </div></td>
                    <td align="left" style="width:20%" ng-show="tieude.td1==true">{{tl.level|level}}{{tl.Tennhom}}</td>
                    <td ng-show="tieude.td2==true" style="width:50%">
<div  class="ellipsis">                        <span class="badge bg-primary me-2 p-2 mb-2" ng-repeat="nv in tl.idNguoidung">{{nv | Fname:RListNV}}</span></div>
                        
                      <div class="dropdown position-static">
                        <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                          <div class="d-flex justify-content-center"><i class="fas fa-plus-circle ms-2" ng-click="idNguoidung = tl.idNguoidung"></i> </div>
                        </div>
                        <ul class="dropdown-menu">
                          <li class="p-2">
                            <select chosen multiple class="form-control text-danger" ng-model="idNguoidung" ng-options="s.id as s.name for s in RListNV">
                              <option value="" selected>Vui lòng chọn</option>
                            </select>
                          </li>
                            <li class="p-2 text-center">
<button class="btn btn-primary me-2"  ng-click="ThemNguoidung(tl,idNguoidung)"><i class="fas fa-plus-circle me-2"></i>Lưu</button>
                          </li>    
                        </ul>
                      </div>       
                        
          
     
                      </td>
                    <td ng-show="tieude.td3==true" style="width:20%"><span ng-bind-html="tl.Mota"></span></td>
                    <td ng-show="tieude.td6==true" style="width:20%">
                        
              <div class="row">
        <div class="my-2">
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addphanquyen-{{tl.id}}" ng-click="editPhanquyen(tl)"><i class="fas fa-users-cog"></i></button>
          <div class="modal fade" id="addphanquyen-{{tl.id}}" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title"> Phân Quyền</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row p-3">                      
                    <div class="mb-3 col-4" ng-repeat="pq in ListPhanquyen">
                      <div class="form-check form-switch d-flex">
                                  <input class="form-check-input me-2" type="checkbox" ng-model="Phanquyen['pq'+pq.id]">
                <label class="form-check-label">{{pq.id}}.{{pq.Thuoctinh}}</label>   
                                </div>               
                            </div>
                  
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                  <button type="button" class="btn btn-primary" ng-click="UpdatePQ(tl.id,Phanquyen)">Cập Nhật</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>          
 </td>                      
                    <td ng-show="tieude.td4==true" style="width:10%">{{tl.idTao | Fname:RListNV}}</td>
                    <td ng-show="tieude.td5==true" style="width:10%">{{tl.Ngaytao | date:'HH:mm'}} <br>
                      {{tl.Ngaytao | date:'dd/MM/yy'}} </td>
                    
                
                  </tr>
                </tbody>
              </table>
            </div>
    </div>
  </div>