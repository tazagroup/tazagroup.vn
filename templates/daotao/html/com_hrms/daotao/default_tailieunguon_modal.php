<div class="table-responsive mt-3 ghichu">
              <table class="table table-centered table-nowrap mb-0 rounded text-center table-bordered table-hover">
                <thead class="thead-light">
                  <tr>
                    <th style="width:5%"> <div class="px-2 my-auto dropdown position-static">
                        <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside"> <span>#</span> </div>
                        <ul class="dropdown-menu">
                          <li class="p-2">
                            <div class="form-check form-switch">Tài Liệu
                              <input class="form-check-input" type="checkbox" ng-model="tieude.td1" checked>
                            </div>
                          </li>
                          <li class="p-2">
                            <div class="form-check form-switch"> Chủ Đề
                              <input class="form-check-input" type="checkbox" ng-model="tieude.td2" checked>
                            </div>
                          </li>
                          <li class="p-2">
                            <div class="form-check form-switch"> Nội dung
                              <input class="form-check-input" type="checkbox" ng-model="tieude.td7" checked>
                            </div>
                          </li>
                          <li class="p-2">
                            <div class="form-check form-switch"> Tác Giả
                              <input class="form-check-input" type="checkbox"  ng-model="tieude.td3" checked>
                            </div>
                          </li>
                          <li class="p-2">
                            <div class="form-check form-switch"> Ngày Tạo
                              <input class="form-check-input" type="checkbox" ng-model="tieude.td4" checked>
                            </div>
                          </li>
                          <li class="p-2">
                            <div class="form-check form-switch"> Tình Trạng
                              <input class="form-check-input" type="checkbox" ng-model="tieude.td5" checked>
                            </div>
                          </li>
                          <li class="p-2">
                            <div class="form-check form-switch"> Người Duyệt
                              <input class="form-check-input" type="checkbox" ng-model="tieude.td6" checked>
                            </div>
                          </li>
                          <li class="p-2">
                            <div class="form-check form-switch"> Ghi Chú
                              <input class="form-check-input" type="checkbox" ng-model="tieude.td8" checked>
                            </div>
                          </li>
                          <li class="p-2">
                            <div class="btn btn-primary" ng-click="LuuAnhien(tieude)">Lưu</div>
                          </li>
                        </ul>
                      </div>
                    </th>
                    <th ng-show="tieude.td2==true" style="width:20%"> <div class="dropdown position-static">
                        <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                          <div class="d-flex justify-content-center"><i class="fas fa-ellipsis-v me-2 my-auto"></i> Chủ Đề </div>
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
                    <th ng-show="tieude.td1==true" style="width:50%"><div class="dropdown position-static" >
                        <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                          <div class="d-flex justify-content-center"><i class="fas fa-ellipsis-v me-2 my-auto"></i> Tài Liệu </div>
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
                    <th ng-show="tieude.td7==true" style="width:20%"> <div class="dropdown position-static">
                        <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                          <div class="d-flex justify-content-center"><i class="fas fa-ellipsis-v me-2 my-auto"></i> Nội dung </div>
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
                    <th ng-show="tieude.td3==true" style="width:10%"> <div class="dropdown position-static">
                        <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                          <div class="d-flex justify-content-center"><i class="fas fa-ellipsis-v me-2 my-auto"></i> Tác Giả</div>
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
                    <th ng-show="tieude.td4==true" style="width:10%"><div class="dropdown position-static">
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
                    <th ng-show="tieude.td5==true" style="width:10%"> <div class="dropdown position-static">
                        <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                          <div class="d-flex justify-content-center"><i class="fas fa-ellipsis-v me-2 my-auto"></i>Tình Trạng</div>
                        </div>
                        <ul class="dropdown-menu">
                          <li class="p-2">
                            <div class="mb-3">
                            <div class="input-group mb-2" ng-click="timkiem={}"> <span class="input-group-text"> <i class="fas fa-sort-amount-up-alt"></i> </span>
                              </div>  
                              <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                <select chosen multiple class="form-control text-danger" ng-model="timkiem.Trangthai" ng-options="s.id as s.Thuoctinh for s in TTDuyet">
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
                    <th ng-show="tieude.td6==true" style="width:10%"> <div class="dropdown position-static">
                        <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                          <div class="d-flex justify-content-center"><i class="fas fa-ellipsis-v me-2 my-auto"></i> Người Duyệt</div>
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
                    <th ng-show="tieude.td8==true" style="width:20%"> <div class="dropdown position-static">
                        <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                          <div class="d-flex justify-content-center"><i class="fas fa-ellipsis-v me-2 my-auto"></i> Ghi Chú </div>
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
                  </tr>
                </thead>
                <tbody>
                  <tr ng-repeat="tl in RDuyetTailieu | filter:timkiem">
                    <td style="width:5%"><div class="dropdown position-static my-auto">
                        <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                          <div class="d-flex justify-content-center">{{$index+1}}</div>
                        </div>
                        <ul class="dropdown-menu">
                          <li class="p-2" data-bs-toggle="modal" data-bs-target="#addtailieu" ng-click="editTailieu(tl)"> <i class="fas fa-edit text-info"></i> Sửa </li>
                          <li class="p-2" data-bs-toggle="modal" data-bs-target="#XoaHang" ng-click="editTailieu(tl)"> <i class="fas fa-trash-alt text-danger"></i> Xóa </li>
                        </ul>
                      </div></td>
                    <td ng-show="tieude.td2==true" style="width:20%">{{tl.idChude | FTenchude:RChude}}</td>
                    <td ng-show="tieude.td1==true" style="width:50%"><a href="..{{tl.Lienket || '#'}}" data-bs-toggle="modal" data-bs-target="#PDFView" ng-click="PDFView(tl.Lienket)">{{tl.Tentailieu}}</a></td>
                    <td ng-show="tieude.td7==true" style="width:20%"><span ng-bind-html="tl.Mota"></span></td>
                    <td ng-show="tieude.td3==true" style="width:10%"><div class="btn-group position-static"> <span data-bs-toggle="dropdown" data-bs-auto-close="outside"><i class="fas fa-user-circle"></i> <i class="fas fa-user-circle" ng-repeat="tg in tl.idGTG | limitTo:2:0"  ng-show="tl.idGTG.length >0"></i> <span ng-show="tl.idGTG.length >2"> + {{tl.idGTG.length-2}}</span> </span>
                        <ul class="dropdown-menu">
                          <li> <span class="dropdown-item text-danger">{{tl.idTG|Fname:RListNV}}</span</li>
                          <li> <span class="dropdown-item" ng-repeat="tg in tl.idGTG">{{tg | Fname:RListNV}}</span</li>
                        </ul>
                      </div>
                    <td ng-show="tieude.td4==true" style="width:10%">{{tl.Ngaytao | date:'HH:mm'}} <br>
                      {{tl.Ngaytao | date:'dd/MM/yy'}} </td>
                    <td ng-show="tieude.td5==true" style="width:10%"><div class="btn-group position-static"> <span class="{{tl.Trangthai|FMaunen:TTDuyet}} {{tl.Trangthai|FMauchu:TTDuyet}} p-1 rounded"  data-bs-toggle="dropdown" data-bs-auto-close="outside">{{tl.Trangthai|Ftitle:TTDuyet}}</span>
                        <ul class="dropdown-menu">
                          <li ng-repeat="s1 in TTDuyet" ng-click="UpdateTTDuyet(tl.id,s1.id)">
                            <div class="dropdown-item"><span class="{{s1.id|FMaunen:TTDuyet}} {{s1.id|FMauchu:TTDuyet}} p-1 rounded">{{s1.Thuoctinh}}</span></div>
                          </li>
                        </ul>
                      </div></td>
                    <td ng-show="tieude.td6==true" style="width:10%"><div class="btn-group position-static"> <span ng-repeat="tg1 in tl.idDuyet | limitTo:3:0" data-bs-toggle="dropdown" data-bs-auto-close="outside"><i class="fas fa-user-circle"></i></span> <span ng-show="tl.idDuyet.length >3"> + {{tl.idDuyet.length-3}}</span>
                        <ul class="dropdown-menu">
                          <li><span class="dropdown-item" ng-repeat="tg1 in tl.idDuyet">{{tg1 | Fname:RListNV}}</span></li>
                        </ul>
                      </div></td>
                    <td ng-show="tieude.td8==true" style="width:20%"><div  ng-show="tl.Ghichu!=NULL">
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
                  </tr>
                </tbody>
              </table>
            </div>