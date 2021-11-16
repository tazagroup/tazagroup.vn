<div class="row">
  <div class="table-responsive">
    <table class="table dauviec table-hover table-centered table-nowrap mb-0 rounded text-center table-bordered">
      <thead>
        <tr>
          <th style="width:5%">#</th>
          <th ng-show="tieude.td1==true" style="width:10%"> <div class="dropdown position-static">
              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                <div class="d-flex justify-content-center"><i class="fas fa-ellipsis-v me-2 my-auto"></i> Mã số </div>
              </div>
              <ul class="dropdown-menu">
                <li class="p-2">
                  <input class="form-control" placeholder="Tìm Kiếm" ng-model="timkiem.MaViec"/>
                </li>
              </ul>
            </div>
          </th>
          <th ng-show="tieude.td2==true" style="width:10%"> <div class="dropdown position-static">
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
          <th ng-show="tieude.td3==true" style="width:10%"> <div class="dropdown position-static">
              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                <div class="d-flex justify-content-center"><i class="fas fa-ellipsis-v me-2 my-auto"></i> Ngày Tạo </div>
              </div>
              <ul class="dropdown-menu">
                <li class="p-2"> Từ Ngày
                  <input type="date" class="form-control text-danger my-2" ng-model="SNT.from" />
                  Đến Ngày
                  <input type="date" class="form-control text-danger my-2" ng-model="SNT.to" />
                </li>
              </ul>
            </div>
          </th>
          <th ng-show="tieude.td11==true" style="width:10%"> <div class="dropdown position-static">
              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                <div class="d-flex justify-content-center"><i class="fas fa-ellipsis-v me-2 my-auto"></i> Review </div>
              </div>
              <ul class="dropdown-menu">
                <li class="p-2"> Từ Ngày
                  <input type="date" class="form-control text-danger my-2" ng-model="Review.from" />
                  Đến Ngày
                  <input type="date" class="form-control text-danger my-2" ng-model="Review.to" />
                </li>
              </ul>
            </div>
          </th>
          <th ng-show="tieude.td4==true" style="width:10%"> <div class="dropdown position-static">
              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                <div class="d-flex justify-content-center"><i class="fas fa-ellipsis-v me-2 my-auto"></i> Deadline </div>
              </div>
              <ul class="dropdown-menu">
                <li class="p-2"> Từ Ngày
                  <input type="date" class="form-control text-danger my-2" ng-model="dl.from" />
                  Đến Ngày
                  <input type="date" class="form-control text-danger my-2" ng-model="dl.to" />
                </li>
              </ul>
            </div>
          </th>
          <th ng-show="tieude.td5==true" style="width:25%"> <div class="dropdown position-static">
              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                <div class="d-flex justify-content-center"><i class="fas fa-ellipsis-v me-2 my-auto"></i> Nội Dung </div>
              </div>
              <ul class="dropdown-menu">
                <li class="p-2">
                  <input class="form-control" placeholder="Tìm Kiếm" ng-model="timkiem.Tieude"/>
                </li>
              </ul>
            </div></th>
          <th ng-show="tieude.td6==true" style="width:10%"> <div class="dropdown position-static">
              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                <div class="d-flex justify-content-center"><i class="fas fa-ellipsis-v me-2 my-auto"></i> TC </div>
              </div>
              <ul class="dropdown-menu">
                <li class="p-2">
                  <select chosen class="form-control text-danger" ng-model="timkiem.Uutien" ng-options="s1.id as s1.Thuoctinh for s1 in Uutien">
                    <option value="" selected ng-click="Lammoi()">Tất Cả</option>
                  </select>
                </li>
              </ul>
            </div>
          </th>
          <th ng-show="tieude.td7==true" style="width:10%"> <div class="dropdown position-static">
              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                <div class="d-flex justify-content-center"><i class="fas fa-ellipsis-v me-2 my-auto"></i> TT </div>
              </div>
              <ul class="dropdown-menu">
                <li class="p-2">
                  <select chosen class="form-control" ng-model="timkiem.Trangthai" ng-options="s2.id as s2.Thuoctinh for s2 in TTCongviec">
                    <option value="" selected ng-click="Lammoi()">Tất Cả</option>
                  </select>
                </li>
              </ul>
            </div>
          </th>
          <th ng-show="tieude.td8==true" style="width:10%"> <div class="dropdown position-static">
              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                <div class="d-flex justify-content-center"><i class="fas fa-ellipsis-v me-2 my-auto"></i> Giao </div>
              </div>
              <ul class="dropdown-menu">
                <li class="p-2">
                  <select chosen class="form-control" ng-model="timkiem.idGiao" ng-options="s8.id as s8.name for s8 in RListNV">
                    <option value="" selected ng-click="Lammoi()">Tất cả</option>
                  </select>
                </li>
              </ul>
            </div>
          </th>
          <th ng-show="tieude.td9==true" style="width:10%"> <div class="dropdown position-static">
              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                <div class="d-flex justify-content-center"><i class="fas fa-ellipsis-v me-2 my-auto"></i> Nhận </div>
              </div>
              <ul class="dropdown-menu">
                <li class="p-2">
                  <select chosen class="form-control" ng-model="timkiem.idThamgia" ng-options="s8.id as s8.name for s8 in RListNV">
                    <option value="" selected ng-click="Lammoi()">Tất cả</option>
                  </select>
                </li>
              </ul>
            </div>
          </th>
          <th ng-show="tieude.td10==true" style="width:25%">Ghi Chú</th>
        </tr>
      </thead>
      <tbody>
        <tr ng-repeat="dv in RNhomviec | filter:timkiem | orderBy:propertyName:reverse | dateDeadline:dl.from:dl.to| dateNgaytao:SNT.from:SNT.to | dateReview:Review.from:Review.to"> 
          <!--              <tr ng-repeat="dv in RNhomviec">-->
          <td style="width:5%"><div class="dropdown">
              <div class="dropdown-toggle" type="button" data-bs-toggle="dropdown">
                <div class="d-flex justify-content-center">{{$index+1}}</div>
              </div>
              <ul class="dropdown-menu">
                <li class="p-2" data-bs-toggle="modal" data-bs-target="#Taoviec" ng-click="editDauviec(dv)"> <i class="fas fa-edit text-info"></i> Sửa </li>
                <li class="p-2" data-bs-toggle="modal" data-bs-target="#XoaHang" ng-click="delDauviec(dv)"> <i class="fas fa-trash-alt text-danger"></i> Xóa </li>
              </ul>
            </div></td>
          <td ng-show="tieude.td1==true" style="width:10%">{{dv.MaViec}}</td>
          <td ng-show="tieude.td2==true" style="width:10%">{{dv.idCty|Ftitle:Congty}}</td>
          <td ng-show="tieude.td3==true" style="width:10%">{{dv.Ngaytao|date:'HH:mm dd/MM/yy'}}</td>
          <td ng-show="tieude.td11==true" style="width:10%">{{dv.Review |date:'HH:mm dd/MM/yy'}}</td>
          <td ng-show="tieude.td4==true" style="width:10%">{{dv.Deadline|date:'HH:mm dd/MM/yy'}}</td>
          <td ng-show="tieude.td5==true" style="width:25%">
              <div ng-bind-html="dv.Tieude" class="ellipsis"></div>
              </td>
          <td ng-show="tieude.td6==true" style="width:10%"><div class="btn-group position-static"> <span class="{{dv.Uutien|FMaunen:Uutien}} {{dv.Uutien|FMauchu:Uutien}} p-1 rounded" data-bs-toggle="dropdown" data-bs-auto-close="outside">{{dv.Uutien|Ftitle:Uutien}}</span>
              <ul class="dropdown-menu">
                <li ng-repeat="s1 in Uutien" ng-click="UpdateUTViec(dv.id,s1.id)">
                  <div class="dropdown-item"><span class="{{s1.id|FMaunen:Uutien}} {{s1.id|FMauchu:Uutien}} p-1 rounded">{{s1.Thuoctinh}}</span></div>
                </li>
              </ul>
            </div></td>
          <td ng-show="tieude.td7==true" style="width:10%"><div class="btn-group position-static"> <span class="{{dv.Trangthai|FMaunen:TTCongviec}} {{dv.Trangthai|FMauchu:TTCongviec}} p-1 rounded" data-bs-toggle="dropdown" data-bs-auto-close="outside">{{dv.Trangthai|Ftitle:TTCongviec}}</span>
              <ul class="dropdown-menu">
                <li>
                  <div class="dropdown-item text-success" ng-click="UpdateTTViec(dv,1)"><i class="fas fa-check"></i> Hoàn Thành</div>
                </li>
                <li>
                  <div class="dropdown-item text-danger" ng-click="UpdateTTViec(dv,4)"><i class="fas fa-times"></i> Hủy</div>
                </li>
              </ul>
            </div></td>
          <td ng-show="tieude.td8==true" style="width:10%">
             
  
              
              
              <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center"><i class="fas fa-user-circle"></i></div> </div>

                  <ul class="dropdown-menu">
                    <li class="p-2">    
                     <div class="text-center">{{dv.Nguoigiao}}</div>
                    </li>
                  </ul>                  </div>
            </td>
          <td ng-show="tieude.td9==true" style="width:10%">
              <div class="btn-group position-static"> 
                  <span ng-repeat="tg in dv.idThamgia | limitTo:3:0" data-bs-toggle="dropdown" data-bs-auto-close="outside"><i class="fas fa-user-circle"></i></span> <span ng-show="dv.idThamgia.length >3"> + {{dv.idThamgia.length-3}}</span>
              <ul class="dropdown-menu">
                <li><span class="dropdown-item" ng-repeat="tg in dv.idThamgia">{{tg | Fname:RListNV}}</span></li>
              </ul>
            </div></td>
          <td ng-show="tieude.td10==true" style="width:25%">
            <div ng-bind-html="dv.Ghichu" class="ellipsis"></div>
              <div class="dropdown position-static" ng-show="dv.Ghichu!=''">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center"><i class="fas fa-eye me-2 my-auto"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">    
                      <div ng-bind-html="dv.Ghichu" class="ghichu"></div>
                    </li>
                  </ul>
                </div>
            <a class="text-danger" ng-show="dv.idLich!=null" data-bs-toggle="modal" data-bs-target="#modal-lichhop" ng-click="editBienban(dv.idLich)">Biên bản họp</a></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
