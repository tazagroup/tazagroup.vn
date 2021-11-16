<div class="table-responsive py-4">
            <table class="table table-centered table-nowrap mb-0 rounded text-center table-bordered">
              <thead class="thead-light">
                <tr>
                  <th>#</th>
                  <th>Nguyên Vật Liệu</th>
                  <th>Hạn Sử Dụng</th>
                  <th class="text-success">Số Lượng Nhập</th>
                  <th class="text-danger">Số Lượng Xuất</th>
                  <th class="text-primary">Số Lượng Tồn</th>
                </tr>
              </thead>
              <tbody>
                <tr ng-repeat="ltk in ListTonKho" data-bs-toggle="modal" data-bs-target="#Tonkho-{{ltk.idNhap}}">
                  <td><div class="modal fade" id="Tonkho-{{ltk.idNhap}}" tabindex="-1" role="dialog" aria-labelledby="#Tonkho-{{ltk.idNhap}}" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h2 class="h6 modal-title">Tồn Kho {{ltk.TenSP}}</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="table-responsive py-4">
                              <table class="table table-centered table-nowrap mb-0 rounded table-bordered">
                                <thead class="thead-light">
                                  <tr>
                                    <th>#</th>
                                    <th>Nguyên Vật Liệu/Sản Phẩm</th>
                                    <th>Số Lượng Nhập</th>
                                    <th>Số Lượng Xuất</th>
                                    <th>Ngày Tạo</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr ng-repeat="lltk in ltk.dulieu">
                                    <td>{{$index+1}}</td>
                                    <td>{{lltk.TenSP}}</td>
                                    <td>{{lltk.SoluongNhap}} {{lltk.DVT}} </td>
                                    <td>{{lltk.SoluongXuat}} {{lltk.DVT}} </td>
                                    <td>{{lltk.created| date:"HH:mm dd/MM/yy"}}</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    {{$index+1}}</td>
                  <td>{{ltk.TenSP}}</td>
                  <td>{{ltk.HanSD | date:'dd/MM/yyyy'}}</td>                             
                  <td class="text-success">{{ltk.SLN}} {{ltk.DVT}} </td>
                  <td class="text-danger">{{ltk.SLX}} {{ltk.DVT}}</td>
                  <td class="text-primary">{{ltk.SLT}} {{ltk.DVT}}</td>
                </tr>
              </tbody>
            </table>
          </div>