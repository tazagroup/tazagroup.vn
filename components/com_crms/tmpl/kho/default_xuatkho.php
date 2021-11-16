
<div class="container">
  <div class="row">
    <div class="col-sm-2 mb-3">
      <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modal-xuatkho"> <i class="fas fa-plus-circle"></i> </button>
    </div>
    <div class="col-sm-3 mb-3">
      <div class="input-group"> <span class="input-group-text">
        <i class="fas fa-search"></i>
        </span>
        <input type="text" class="form-control" placeholder="Tìm Phiếu Xuất" aria-label="Search" ng-model="timphieuxuat" />
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal-xuatkho" tabindex="-1" role="dialog" aria-labelledby="modal-xuatkho" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="h6 modal-title">Phiếu Xuất Kho <span class="text-danger">Số {{PhieuXuat}}</span></h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <button ng-click="ScanQR()" class="btn btn-primary mb-3"><i class="fas fa-plus-circle"></i></button>    
    <div id="reader" class="border p-3 m-auto w-100"></div>
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
                <tr ng-repeat="Fxk in Fxks">
                  <td>{{$index+1}}</td>
                  <td><input class="form-control" placeholder="{{Fxk.TenSP}}" disabled/></td>
                  <td><input class="form-control" placeholder="{{Fxk.SoluongTon}} {{Fxk.DVT}}" disabled/></td>
                  <td><input class="form-control" placeholder="{{Fxk.HanSD|date:'dd/MM/yyyy'}}" disabled/></td>
                  <td><input ng-model="Fxk.SLX" type="number" class="form-control" placeholder="Số Lượng" ng-change="CheckSLXK(Fxk.SLX,Fxk.SoluongTon)"/></td>
                  <td><input ng-model="Fxk.Ghichu" class="form-control" placeholder="Ghi Chú"></td>
                  <td><button ng-click="removeFxk(Fxk)" class="btn btn-danger"><i class="fas fa-minus-circle"></i></button></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" ng-click="CreateXuatkho(Fxks)" ng-disabled=checkedxk>Tạo Mới</button>       
        <button type="button" class="btn btn-link text-gray ms-auto" data-bs-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>
<div class="table-responsive mt-3">
  <table class="table table-centered table-bordered table-nowrap mb-0 rounded text-center">
    <thead class="thead-light">
      <tr>
        <th>Phiếu Kho</th>
        <th>Tổng Hàng Xuất</th>
        <th>Tạo Bởi</th>
        <th>Ngày Tạo</th>
      </tr>
    </thead>
    <tbody>
      <tr ng-repeat="lxk in ListXuatkho |filter:timphieuxuat" data-bs-toggle="modal" data-bs-target="#PhieuXuat-{{lxk.PhieuXuat}}">
        <td><div class="modal fade" id="PhieuXuat-{{lxk.PhieuXuat}}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="h6 modal-title">Phiếu Xuất Kho #{{lxk.PhieuXuat}}</h2>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="table-responsive py-4">
                    <table class="table table-centered table-bordered table-nowrap mb-0 rounded">
                      <thead class="thead-light">
                        <tr>
                          <th>#</th>
                          <th>Nguyên Vật Liệu/Sản Phẩm</th>
                          <th>Số Lượng</th>
                          <th>Ngày Tạo</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="llxk in lxk.dulieu">
                          <td>{{$index+1}}</td>
                          <td>{{llxk.TenSP}}</td>
                          <td>{{llxk.SoluongXuat}} {{llxk.DVT}} </td>
                          <td>{{llxk.created| date:"HH:mm dd/MM/yy"}}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          Phiếu Xuất #{{lxk.PhieuXuat}} </td>
        <td> {{lxk.SLX}} </td>
        <td> {{lxk.Nguoitao}} </td>
        <td> {{lxk.Ngaytao | date:"HH:mm dd/MM/yy"}} </td>
      </tr>
    </tbody>
  </table>
</div>
