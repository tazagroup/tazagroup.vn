<div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100">
<div class="row">
  <div class="col">
    <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Khóa Học Của Tôi</button>
      
        <button class="nav-link " id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Kỳ Thi Của Tôi</button>
          <button class="nav-link " id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Lộ Trình Học Tập Của Tôi</button>
          <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fas fa-user-check me-2"></i> Lịch Sửa Học Tập</button>
        </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="table-responsive mt-3">
              <table class="table table-centered table-nowrap mb-0 rounded
                        text-center
                        table-bordered
                       table-hover   
                      ">
                <thead class="thead-light">
                  <tr>
                    <th>#</th>
                    <th>Tài Liệu Nguồn</th>
                    <th>Tác Giả</th>
                    <th>Chủ Đề</th>
                    <th> <div class="dropdown position-static">
                        <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                          <div class="d-flex justify-content-center"><i class="fas fa-ellipsis-v me-2 my-auto"></i> Ngày tạo </div>
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
                    <th>Tình Trạng</th>
                    <th>Người Duyệt</th>
                    <th>Chức Năng</th>
                  </tr>
                </thead>
                <tbody>
                  <tr ng-repeat="item in ListTest ">
                    <td>{{$index+1}}</td>
                    <td>{{item.tailieu}}</td>
                    <td><img ng-src="{{item.tacgia}}" alt="" class="avatar rounded-circle text-primary"> <img ng-src="{{item.tacgia}}" alt="" class="avatar rounded-circle text-primary"> <img ng-src="{{item.tacgia}}" alt="" class="avatar rounded-circle text-primary"></td>
                    <td>{{item.chude}}</td>
                    <td>{{item.ngaytao}}</td>
                    <td>{{item.tinhtrang}}</td>
                    <td>{{item.nguoiduyet}}</td>
                    <td><i class="fas fa-tools px-2" ng-click="suanoidung(item)" type="button"
                      class="btn btn-block btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#capnhatdethiU"></i> <i class="fas fa-eye-slash px-2"></i> <i class="fas fa-trash px-2" ng-click="Xoarow(item)"></i></td>
                  </tr>
                </tbody>
              </table>
              
              <!-- Modal Content -->
              <div class="modal fade" id="modalsuachua" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify"
              aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <p class="modal-title" id="modalTitleNotify">Sửa Nội Dung</p>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="py-3 text-center">
                        <p>{{sua.noidung}}</p>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-sm btn-primary">Sửa</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End of Modal Content --> 
            </div>
          </div>
          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="table-responsive mt-3">
              <table class="
                        table table-centered table-nowrap
                        mb-0
                        rounded
                        text-center
                        table-bordered
                       table-hover   
                      ">
                <thead class="thead-light">
                  <tr>
                    <th>#</th>
                    <th>Tài Liệu Nguồn</th>
                    <th>Tác Giả</th>
                    <th>Chủ Đề</th>
                    <th> <div class="dropdown position-static">
                        <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                          <div class="d-flex justify-content-center"><i class="fas fa-ellipsis-v me-2 my-auto"></i> Ngày Cập Nhật </div>
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
                    <th>Tình Trạng</th>
                    <th>Người Duyệt</th>
                    <th>Chức Năng</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Tài Liệu 1</td>
                    <td><img ng-src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png" alt="" class="avatar rounded-circle text-primary" src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png"> <img ng-src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png" alt="" class="avatar rounded-circle text-primary" src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png"> <img ng-src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png" alt="" class="avatar rounded-circle text-primary" src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png"></td>
                    <td>Chủ Đề 1</td>
                    <td>8/6/2021</td>
                    <td>Chưa Duyệt</td>
                    <td>Trần Thị Tố Uyên</td>
                    <td><i class="fas fa-trash px-2" ng-click="Xoarow(item)"></i></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Tài Liệu 2</td>
                    <td><img ng-src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png" alt="" class="avatar rounded-circle text-primary" src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png"></td>
                    <td>Chủ Đề 2</td>
                    <td>8/6/2021</td>
                    <td>Chỉnh Sửa</td>
                    <td>Trần Thị Tố Uyên</td>
                    <td><i class="fas fa-trash px-2" ng-click="Xoarow(item)"></i></td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Tài Liệu 3</td>
                    <td><img ng-src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png" alt="" class="avatar rounded-circle text-primary" src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png"> <img ng-src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png" alt="" class="avatar rounded-circle text-primary" src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png"> <img ng-src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png" alt="" class="avatar rounded-circle text-primary" src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png"></td>
                    <td>Chủ Đề 1</td>
                    <td>8/6/2021</td>
                    <td>Chưa Duyệt</td>
                    <td>Trần Thị Tố Uyên</td>
                    <td><i class="fas fa-trash px-2" ng-click="Xoarow(item)"></i></td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Tài Liệu 4</td>
                    <td><img ng-src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png" alt="" class="avatar rounded-circle text-primary" src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png"></td>
                    <td>Chủ Đề 3</td>
                    <td>8/6/2021</td>
                    <td>Chỉnh Sửa</td>
                    <td>Trần Thị Tố Uyên</td>
                    <td><i class="fas fa-trash px-2" ng-click="Xoarow(item)"></i></td>
                  </tr>
                </tbody>
              </table>
              
              <!-- Modal Content -->
              <div class="modal fade" id="modalsuachua" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify"
              aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <p class="modal-title" id="modalTitleNotify">Sửa Nội Dung</p>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="py-3 text-center">
                        <p>{{sua.noidung}}</p>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-sm btn-primary">Sửa</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>