
          <div class="container">
            <div class="row">
              <div class="col-sm-2 mb-3">
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modal-nhapkho"><i class="fas fa-plus-circle"></i></button>
              </div>
              <!--
        <div class="col-sm-2 mb-3">
            <select class="form-select" ng-model="sltphieunhap">
                <option value="10" selected>10 / Trang</option>
                <option value="20">20 / Trang</option>
                <option value="50">50 / Trang</option>
                <option value="100">100 / Trang</option>
                <option value="all">All</option>
            </select>
        </div>
        <div class="col-sm-2 mb-3">
            <select class="form-select" ng-model="trangnhap" ng-change="Pagechose(idPage)">
                <option value="" selected>Chọn Trang</option>
                <option ng-value="{{pag.id}}" ng-repeat="pag in Pagination">Trang {{pag.value}}</option>
            </select>
        </div>
-->
              <div class="col-sm-3 mb-3">
                <div class="input-group"> <span class="input-group-text">
                  <svg class="icon icon-xxs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                  </svg>
                  </span>
                  <input type="text" class="form-control" placeholder="Tìm Phiếu Nhập" aria-label="Search" ng-model="timphieunhap" />
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="modal-nhapkho" tabindex="-1" role="dialog" aria-labelledby="modal-nhapkho" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="h6 modal-title">Phiếu Nhập Kho <span class="text-danger">Số {{PhieuNhap}}</span></h2>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <button ng-click="addFnk()" class="btn btn-primary mb-3"><i class="fas fa-plus-circle"></i></button>
                    <div class="table-responsive">
                      <table class="table table-centered table-nowrap mb-0 rounded table-bordered">
                        <thead class="thead-light">
                          <tr>
                            <th>#</th>
                            <th>Nguyên Vật Liệu</th>
                            <th>Số Lượng</th>
                            <th>Tổng Tiền</th>
                            <th>Hạn SD</th>
                            <th>Ghi Chú</th>
                            <th>Xóa</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr ng-repeat="Fnk in Fnks">
                            <td>{{$index+1}}</td>
                            <td>
                                <select class="form-select state" ng-model="Fnk.NVL">
                                <option selected value="">Nguyên Vật Liệu</option>
                                <option ng-value='{"id":lsnlv.id,"DVT":lsnlv.DVT}' ng-repeat="lsnlv in ListNguyenvatlieu">{{lsnlv.TenSP}}</option>
                              </select></td>
                            <td>                             
                            <div class="input-group">
        <input ng-model="Fnk.SoluongNhap" type="number" class="form-control" placeholder="Số Lượng" />
        <span class="input-group-text">
          {{Fnk.NVL.DVT}}
        </span>
    </div>  
                              
                              </td>
                            <td><input ng-model="Fnk.GiaNhap" class="form-control" placeholder="Giá"></td>
                            <td><input ng-model="Fnk.HanSD" class="form-control" placeholder="Giá" type="date" min="{{minDate|date:'yyyy-MM-yy'}}"></td>
                            <td><input ng-model="Fnk.Ghichu" class="form-control" placeholder="Ghi Chú"></td>
                            <td><button ng-click="removeFnk(Fnk)" class="btn btn-danger"><i class="fas fa-minus-circle"></i></button></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-info" ng-click="CreateNhapkho(Fnks)">Tạo Mới</button>
                  <button type="button" class="btn btn-link text-gray ms-auto" data-bs-dismiss="modal">Đóng</button>
                </div>
              </div>
            </div>
          </div>
          <div class="table-responsive mt-3">
            <table class="table table-centered table-nowrap mb-0 rounded text-center table-bordered">
              <thead class="thead-light">
                <tr>
                  <th>Phiếu Kho</th>
                  <th>Tổng Hàng</th>
                  <th>Tổng Tiền</th>
                  <th>Tạo Bởi</th>
                  <th>Ngày Tạo</th>
                </tr>
              </thead>
              <tbody>
                <tr ng-repeat="lnk in ListNhapkho | filter:timphieunhap" data-bs-toggle="modal" data-bs-target="#Phieunhap-{{lnk.PhieuNhap}}">
                  <td><div class="modal fade" id="Phieunhap-{{lnk.PhieuNhap}}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h2 class="h6 modal-title">Phiếu Nhập Kho #{{lnk.PhieuNhap}}</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="table-responsive py-4">
                              <table class="table table-centered table-nowrap mb-0 rounded table-bordered">
                                <thead class="thead-light">
                                  <tr>
                                    <th>#</th>
                                    <th>QRCode</th>
                                    <th>Nguyên Vật Liệu/Sản Phẩm</th>
                                    <th>Số Lượng</th>
                                    <th>Tổng Tiền</th>
                                    <th>Hạn Sử Dụng</th>
                                    <th>Ngày Tạo</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr ng-repeat="llnk in lnk.dulieu">
                                    <td>{{$index+1}}</td>
                                    <td><div kendo-qrcode k-size="'150'" k-error-correction="'L'" ng-model="llnk.qrcode"></div>
                                      </td>
                                    <td>{{llnk.TenSP}}</td>
                                    <td>{{llnk.SoluongNhap}} {{llnk.DVT}} </td>
                                    <td>{{llnk.GiaNhap| currency:"":0}} đ</td>
                                    <td>{{llnk.HanSD | date:"dd/MM/yy"}}</td>
                                    <td>{{llnk.created| date:"HH:mm dd/MM/yy"}}</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    Phiếu Nhập #{{lnk.PhieuNhap}} </td>
                  <td> {{lnk.SLN}} </td>
                  <td> {{lnk.TT | currency:"":0}} đ </td>
                  <td> {{lnk.Nguoitao}} </td>
                  <td> {{lnk.Ngaytao | date:"HH:mm dd/MM/yy"}} </td>
                </tr>
              </tbody>
            </table>
          </div>