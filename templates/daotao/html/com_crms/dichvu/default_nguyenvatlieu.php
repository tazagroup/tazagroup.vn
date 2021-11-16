<div class="dropdown">
          <button class="btn btn-gray-800 text-white dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path>
          </svg>
          </button>
          <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1" data-popper-placement="bottom-start" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 41px);"> <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#Nguyenvatlieu"> <i class="fab fa-product-hunt mx-2"></i> Nguyên Vật Liệu </a> <a class="dropdown-item d-flex align-items-center" href="#"> <i class="fas fa-cog mx-2"></i> Cấu Hình Kho </a> </div>
          <div class="modal fade" id="Nguyenvatlieu" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable text-start" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="h6 modal-title">Nguyên Vật Liệu</h2>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="d-flex justify-content-start align-items-center m-3">
                    <button class="btn btn-primary me-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Thêm nguyên vật liệu mới"><i class="fas fa-plus"></i></button>
                    <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#ImportNVL"><i class="fas fa-file-upload"></i></button>
                    <button class="btn btn-primary me-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Export nguyên vật liệu"><i class="fas fa-file-download"></i></button>
                  </div>
                  <div class="table-responsive py-4 text-right">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2 mb-3">
                          <select class="form-select" ng-model="Sltrang">
                            <option value="10" selected>10 / Trang</option>
                            <option value="20">20 / Trang</option>
                            <option value="50">50 / Trang</option>
                            <option value="100">100 / Trang</option>
                            <option value="all">All</option>
                          </select>
                        </div>
                        <div class="col-sm-2 mb-3">
                          <select class="form-select" ng-model="idPage" ng-change="Pagechose(idPage)">
                            <option value="" selected >Chọn Trang</option>
                            <option ng-value="{{pag.id}}" ng-repeat="pag in Pagination">Trang {{pag.value}}</option>
                          </select>
                        </div>
                        <div class="col-sm-3 mb-3">
                          <div class="input-group"> <span class="input-group-text">
                            <svg class="icon icon-xxs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                            </svg>
                            </span>
                            <input type="text" class="form-control" placeholder="Tìm Kiếm" aria-label="Search" ng-model="timnvl">
                          </div>
                        </div>
                      </div>
                    </div>
                    <table class="table table-centered table-nowrap mb-0 rounded">
                      <thead class="thead-light">
                        <tr>
                          <th>#</th>
                          <th>Mã SP</th>
                          <th>Tên SP</th>
                          <th>ĐVT</th>
                          <th>Chức Năng</th>
                          <th>Cách Sử Dụng</th>
                          <th>Lưu ý</th>
                          <th>Quy Trình</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="lnvl in ListNguyenvatlieu | limitTo:Sltrang:fromitem">
                          <td>{{$index+1}}</td>
                          <td>{{lnvl.MaSP}}</td>
                          <td>{{lnvl.TenSP}}</td>
                          <td>{{lnvl.DVT}}</td>
                          <td>{{lnvl.Chucnang}}</td>
                          <td>{{lnvl.Cachsudung}}</td>
                          <td>{{lnvl.Luuy}}</td>
                          <td>{{lnvl.Quytrinh}}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade bg-primary" data-bs-backdrop="static" id="ImportNVL" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="h6 modal-title">Import Nguyên Vật Liệu</h2>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="d-flex">
                    <input type="file" name="file" class="form-control mx-3"  
                   onchange="angular.element(this).scope().loadFile(this.files)" />
                    <button class="btn btn-primary" ng-click="handleFile()">Import</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>