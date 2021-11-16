<div class="container">
  <div class="row">
    <div class="col-sm-2 mb-3">
      <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modal-chuyenkho"> <i class="fas fa-plus-circle"></i> </button>
    </div>
    <div class="col-sm-3 mb-3">
      <div class="input-group"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
        <input type="text" class="form-control" placeholder="Tìm Phiếu Chuyển Kho" aria-label="Search" ng-model="timphieuchuyen" />
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal-chuyenkho" tabindex="-1" role="dialog" aria-labelledby="modal-chuyenkho" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="h6 modal-title">Phiếu Chuyển Kho <span class="text-danger">Số {{PhieuChuyen}}</span></h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row mb-3">
          <div class="col-sm-4">
            <div class="input-group"> <span class="input-group-text"> Kho Nhận </span>
              <select class="form-select state" ng-model="idCNNhan" disabled>
                <option selected value="99999">Chọn Chi Nhánh</option>
                <option value="{{ct.id}}" ng-repeat="ct in Listcongty">{{ct.Ten}}</option>
              </select>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="input-group"> <span class="input-group-text"> Kho Chuyển </span>
              <select class="form-select state" ng-model="idCNChuyen">
                <option selected value="99999">Chọn Chi Nhánh</option>
                <option value="{{ct.id}}" ng-repeat="ct in Listcongty">{{ct.Ten}}</option>
              </select>
            </div>
          </div>
        </div>
        <button ng-click="addFck()" class="btn btn-primary mb-3"><i class="fas fa-plus-circle"></i></button>
        <div class="table-responsive">
          <table class="table table-bordered table-centered table-nowrap mb-0 rounded">
            <thead class="thead-light">
              <tr>
                <th>#</th>
                <th>Nguyên Vật Liệu</th>
                <th>Số Lượng</th>
                <th>Xóa</th>
              </tr>
            </thead>
            <tbody>
              <tr ng-repeat="Fck in Fcks">
                <td>{{$index+1}}</td>
                <td><select class="form-select state" ng-model="Fck.idNVL">
                    <option selected value="">Nguyên Vật Liệu</option>
                    <option value="{{lsnlv.id}}" ng-repeat="lsnlv in ListNguyenvatlieu">{{lsnlv.TenSP}}</option>
                  </select></td>
                <td><input ng-model="Fck.SoluongChuyen" type="number" class="form-control" placeholder="Số Lượng" /></td>
                <td><button ng-click="removeFck(Fck)" class="btn btn-danger"><i class="fas fa-minus-circle"></i></button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" ng-click="CreateChuyenkho(Fcks)">Tạo Mới</button>
        <button type="button" class="btn btn-link text-gray ms-auto" data-bs-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>
<div class="table-responsive-xl mt-3">
  <table class="table table-bordered table-centered table-nowrap mb-0 rounded text-center">
    <thead class="thead-light">
      <tr>
        <th>Phiếu Kho</th>
        <th>CN Nhận</th>
        <th>CN Chuyển</th>
        <th>Tổng Hàng</th>
        <th>Tạo Bởi</th>
        <th>Ngày Tạo</th>
        <th>Kiểm Duyệt</th>
      </tr>
    </thead>
    <tbody>
      <tr ng-repeat="lck in ListChuyenkho | filter:timphieuchuyen">
        <td><div class="modal fade" id="Phieuchuyen-{{lck.data.PhieuChuyen}}" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="h6 modal-title">Phiếu Chuyển Kho #{{lck.data.PhieuChuyen}}</h2>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="table-responsive-xl py-4">
                    <table class="table table-centered table-bordered table-nowrap mb-0 rounded">
                      <thead class="thead-light">
                        <tr>
                          <th>#</th>
                          <th>Nguyên Vật Liệu/Sản Phẩm</th>
                          <th>Số Lượng Yêu Cầu</th>
                          <th>Số Lượng Chuyển</th>
                          <th>Ngày Tạo</th>
                          <th>Kiểm Duyệt</th>
                          <th>Ghi Chú</th>
                        </tr>
                      </thead>
                      <tbody ng-repeat="llck in lck.dulieu">
                        <tr>
                          <td rowspan="2" valign="middle">{{$index+1}}</td>
                          <td>{{llck.TenSP}}</td>
                          <td>{{llck.SoluongChuyen}} {{llck.DVT}} </td>
                          <td>{{llck.Soluong}} {{llck.DVT}} </td>
                          <td>{{llck.created| date:"HH:mm dd/MM/yy"}}</td>
                          <td><div class="btn-group dropstart">
                              <button class="btn {{llck.KiemDuyet | FKDBT}} dropdown-toggle"id="dropdownMenuClickableInside" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false"> <i class="fas {{llck.KiemDuyet | FKD}} align-middle"></i> </button>
                              <ul class="dropdown-menu dropdown-menu-lg" aria-labelledby="dropdownMenuClickableInside">
                                <li><a class="dropdown-item" href="#" ng-click="PheDuyet(llck,1)">Đồng Ý</a></li>
                                <li> <a class="dropdown-item" href="#" ng-click="PheDuyet(llck,2)">Từ Chối </a>
                                  <div class="p-3">
                                    <textarea ng-model="llck.Ghichu" class="form-control" placeholder="Lý Do Từ Chối"></textarea>
                                  </div>
                                </li>
                              </ul>
                            </div>
                            
                            <!-- Modal -->
                            
                            <div class="modal fade bg-primary" data-bs-backdrop="static" id="ScanCK-{{llck.id}}" tabindex="-1" aria-hidden="true">
                              <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Chuyển Kho
                                      <button ng-click="CKScanQR(llck)" class="btn btn-primary"><i class="fas fa-barcode"></i></button>
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
<!--                                      {{Fckcts}} -{{llck}}-->
                                    <div id="ckqr-{{llck.id}}" class="border p-3 m-auto w-100"></div>
                                    <div class="mb-3">
                                      <div class="table-responsive">
                                        <table class="table table-centered table-nowrap mb-0 table-bordered">
                                          <thead class="thead-light">
                                            <tr>
                                              <th>#</th>
                                              <th>Nguyên Vật Liệu</th>
                                              <th>Số Lượng Tồn</th>
                                              <th>Hạn Sử Dụng</th>
                                              <th>Số Lượng Xuất</th>
                                              <th>Ghi Chú</th>
                                              <th>Xóa</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr ng-repeat="Fckct in Fckcts">
                                              <td>{{$index+1}}</td>
                                              <td><input class="form-control" placeholder="{{Fckct.TenSP}}" disabled/></td>
                                              <td><input class="form-control" placeholder="{{Fckct.SoluongTon}} {{Fckct.DVT}}" disabled/></td>
                                              <td><input class="form-control" placeholder="{{Fckct.HanSD|date:'dd/MM/yyyy'}}" disabled/></td>
                                              <td><input ng-model="Fckct.SLX" type="number" class="form-control" placeholder="Số Lượng" ng-change="CheckSLXK(Fckct.SLX,Fckct.SoluongTon)"/></td>
                                              <td><input ng-model="Fckct.Ghichu" class="form-control" placeholder="Ghi Chú"></td>
                                              <td><button ng-click="removeFckct(Fckct)" class="btn btn-danger"><i class="fas fa-minus-circle"></i></button></td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-info" ng-click="CreateChuyenkhoCT(Fckcts,llck)" ng-disabled=checkedxk>Chuyển Kho</button>
                                    <button type="button" class="btn btn-link text-gray ms-auto" data-bs-dismiss="modal">Đóng</button>
                                  </div>
                                </div>
                              </div>
                            </div></td>
                          <td>{{llck.Ghichu}}</td>
                        </tr>
                        <tr>
                          <td colspan="6">
    <ul class="steps" ng-show="llck.KiemDuyet==1">
  <li class="step" ng-class="{'step-active' : llck.Trangthai==0 }">
    <div class="step-content">                        
          <button data-bs-toggle="modal" data-bs-target="#ScanCK-{{llck.id}}" class="btn step-circle"><i class="fas fa-exchange-alt"></i></button>
      <span class="step-text m-3">Chưa Chuyển</span>
    </div>
  </li>
  <li class="step mx-4" ng-class="{'step-active' : llck.Trangthai==1 }">
    <div class="step-content">
  <button class="btn step-circle" ng-click="UpdateChuyenkhoCT(llck)"><i class="fas fa-truck-moving"></i></button>
      <span class="step-text m-3">Đã Chuyển</span>
    </div>
  </li>
  <li class="step" ng-class="{'step-active' : llck.Trangthai==2 }">
    <div class="step-content">
      <button class="btn step-circle"><i class="fas fa-check-circle text-white"></i></button>
      <span class="step-text m-3">Đã Nhận</span>
    </div>
  </li>
</ul>
                              <div class="text-danger" ng-show="llck.KiemDuyet!=1">Chưa Kiểm Duyệt</div></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#Phieuchuyen-{{lck.data.PhieuChuyen}}">Phiếu Chyển Kho #{{lck.data.PhieuChuyen}}</div></td>
        <td>{{lck.data.idCNNhan | FTK:Listcongty }}</td>
        <td>{{lck.data.idCNChuyen | FTK:Listcongty }} </td>
        <td>{{lck.data.SoluongChuyen}}</td>
        <td>{{lck.data.Nguoitao}}</td>
        <td>{{lck.data.created | date:"HH:mm dd/MM/yy"}}</td>
        <td><button class="btn {{lck.data.KiemDuyet | FKDBT}}"><i class="fas {{lck.data.KiemDuyet | FKD}} align-middle" ></i> </button></td>
      </tr>
    </tbody>
  </table>
</div>
