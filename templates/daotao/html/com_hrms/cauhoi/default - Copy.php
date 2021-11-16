
    <div>
  <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100">
    <div class="d-flex mb-3">
        <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#addchude1"><i class="fas fa-plus-circle me-2" ></i>Thêm Chủ Đề</button>
      <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#addcauhoi"><i class="fas fa-plus-circle me-2" ></i>Thêm Câu Hỏi</button>
      <div class="modal fade" id="addkhoahoc" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="h6 modal-title">Thêm Tài Liệu</h2>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <div class="input-group"> <span class="input-group-text"> Tên Tài Liệu </span>
                  <input type="text" class="form-control " id="exampleFormControlInput1" placeholder="Tên Tài Liệu">
                </div>
              </div>
              <div class="mb-3"> </div>
              <div class="mb-3">
                <div class="input-group"> <span class="input-group-text"> Chủ đề </span>
                  <select class="form-select" id="chude" aria-label="Default select example">
                    <option selected>Vui Lòng Chọn</option>
                    <option value="1">Sale</option>
                    <option value="2">Marketing</option>
                  </select>
                </div>
              </div>
              <div class="mb-3"> Giới Thiệu
                <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Lichhop.Noidung" class="form-control text-danger"></textarea>
              </div>
              <div  class="mb-3"> </div>
              <div class="mb-3">
                <input class="form-control form-control-sm" id="formFileSm" type="file">
              </div>
              <div class="mb-3">
                <div class="input-group"> <span class="input-group-text"> Tác Giả Chính </span>
                  <select class="form-select" id="tacgia">
                    <option selected>Tác Giả</option>
                    <option >Tác Giả 1</option>
                    <option >Tác Giả 2</option>
                  </select>
                </div>
              </div>
              <div class="mb-3"> Đồng Tác Giả
                <select chosen multiple class="form-control text-danger" ng-model="Lichhop.idChutri" ng-options="s.id as s.name for s in Tacgia">
                  <option value="" selected>Vui lòng chọn</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="text-white btn btn-info ms-2">Lưu</button>
              <button type="button" class="text-white btn btn-success ms-2">Lưu Và Gửi Duyệt</button>
              <button type="button" class="text-white btn btn-danger ms-2" data-bs-dismiss="modal">Đóng</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="capnhattailieu" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="h6 modal-title">Cập Nhật Tài Liệu</h2>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <div class="input-group"> <span class="input-group-text"> Tên Tài Liệu </span>
                  <input type="text" class="form-control " id="exampleFormControlInput1" placeholder="Tên Tài Liệu">
                </div>
              </div>
              <div class="mb-3"> </div>
              <div class="mb-3">
                <div class="input-group"> <span class="input-group-text"> Chủ đề </span>
                  <select class="form-select" id="chude" aria-label="Default select example">
                    <option selected>Vui Lòng Chọn</option>
                    <option value="1">Sale</option>
                    <option value="2">Marketing</option>
                  </select>
                </div>
              </div>
              <div class="mb-3"> Giới Thiệu
                <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Lichhop.Noidung" class="form-control text-danger"></textarea>
              </div>
              <div  class="mb-3"> </div>
              <div class="mb-3">
                <input class="form-control form-control-sm" id="formFileSm" type="file">
              </div>
              <div class="mb-3">
                <div class="input-group"> <span class="input-group-text"> Tác Giả Chính </span>
                  <select class="form-select" id="tacgia" aria-label="Default select example">
                    <option selected>Tác Giả</option>
                    <option >Tác Giả 1</option>
                    <option >Tác Giả 2</option>
                  </select>
                </div>
              </div>
              <div class="mb-3">
                <div class="mb-3"> Đồng Tác Giả
                  <select id="states" class="w-100" name="states[]" multiple="multiple">
                    <option value="AK">Tác Giả 1</option>
                    <option value="AK">Tác Giả 2</option>
                    <option value="AK">Tác Giả 3</option>
                    <option value="AK">Tác Giả 4</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="text-white btn btn-info ms-2">Cập Nhật</button>
              <button type="button" class="text-white btn btn-success ms-2">Cập Nhật Và Gửi Duyệt</button>
              <button type="button" class="text-white btn btn-danger ms-2" data-bs-dismiss="modal">Đóng</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="addchude" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify"
                    aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <p class="modal-title" id="modalTitleNotify">THÊM CHỦ ĐỀ</p>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <div class="input-group"> <span class="input-group-text"> Tên Chủ Đề </span>
                  <input type="text" class="form-control" placeholder="Tên Chủ Đề">
                </div>
              </div>
              <div class="mb-3">
                <div class="input-group"> <span class="input-group-text"> Chủ Đề Cha </span>
                  <select class="form-select" id="country" aria-label="Default select example">
                    <option selected>Vui lòng chọn</option>
                    <option value="1">Menu 1</option>
                    <option value="1"> - Menu 1.1</option>
                    <option value="1"> -- Menu 1.1.1</option>
                    <option value="1"> -- Menu 1.1.2</option>
                    <option value="1"> --- Menu 1.1.2.1</option>
                    <option value="1"> - Menu 1.2</option>
                    <option value="1">Menu 2</option>
                    <option value="1">Menu 3</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-primary">Thêm</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-3">
        <div class="card text-white bg-primary mb-3">
          <div class="card-header p-2">Danh Sách Chủ Đề</div>
        </div>
        <div class="accordion" id="accordionparent">
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#menu1"> Menu1 </button>
            </h2>
            <div id="menu1" class="accordion-collapse collapse" data-bs-parent="#accordionparent">
              <div class="accordion-body">
                <div class="accordion" id="accordionparent1">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                      <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#menu11"> Menu 1.1 </button>
                    </h2>
                    <div id="menu11" class="accordion-collapse collapse" data-bs-parent="#accordionparent1">
                      <div class="accordion-body">
                        <div class="accordion" id="accordionparent">
                          <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                              <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#menu1"> Menu1 </button>
                            </h2>
                            <div id="menu1" class="accordion-collapse collapse" data-bs-parent="#accordionparent">
                              <div class="accordion-body"> content1 </div>
                            </div>
                          </div>
                          <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                              <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#menu2"> Menu2 </button>
                            </h2>
                            <div id="menu2" class="accordion-collapse collapse" data-bs-parent="#accordionparent">
                              <div class="accordion-body"> content2 </div>
                            </div>
                          </div>
                          <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#menu2"> Menu3 </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionparent">
                              <div class="accordion-body"> Content3 </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                      <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#menu21"> Menu 1.2 </button>
                    </h2>
                    <div id="menu21" class="accordion-collapse collapse" data-bs-parent="#accordionparent1">
                      <div class="accordion-body"> content 1.2 </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#menu31"> Menu 1.3 </button>
                    </h2>
                    <div id="menu31" class="accordion-collapse collapse" data-bs-parent="#accordionparent1">
                      <div class="accordion-body"> Content 1.3 </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#menu2"> Menu2 </button>
            </h2>
            <div id="menu2" class="accordion-collapse collapse" data-bs-parent="#accordionparent">
              <div class="accordion-body"> content2 </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#menu3"> Menu3 </button>
            </h2>
            <div id="menu3" class="accordion-collapse collapse" data-bs-parent="#accordionparent">
              <div class="accordion-body"> Content3 </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-9">
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Tài Liệu Nguồn</button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fas fa-user-check me-2"></i> Duyệt Tài Liệu <span class="badge bg-danger">4</span></button>
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
                      class="btn btn-block btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#capnhattailieu"></i> <i class="fas fa-eye-slash px-2"></i> <i class="fas fa-trash px-2" ng-click="Xoarow(item)"></i></td>
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
   
  </div>

<div>
    <h5>Ngân hàng câu hỏi</h5>
  <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100">
    <div class="d-flex mb-3">
        <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#addchude1"><i class="fas fa-plus-circle me-2" ></i>Thêm Chủ Đề</button>
      <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#addcauhoi"><i class="fas fa-plus-circle me-2" ></i>Thêm Câu Hỏi</button>
      <div class="modal fade" id="addkhoahoc" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="h6 modal-title">Thêm Tài Liệu</h2>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <div class="input-group"> <span class="input-group-text"> Tên Tài Liệu </span>
                  <input type="text" class="form-control " id="exampleFormControlInput1" placeholder="Tên Tài Liệu">
                </div>
              </div>
              <div class="mb-3"> </div>
              <div class="mb-3">
                <div class="input-group"> <span class="input-group-text"> Chủ đề </span>
                  <select class="form-select" id="chude" aria-label="Default select example">
                    <option selected>Vui Lòng Chọn</option>
                    <option value="1">Sale</option>
                    <option value="2">Marketing</option>
                  </select>
                </div>
              </div>
              <div class="mb-3"> Giới Thiệu
                <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Lichhop.Noidung" class="form-control text-danger"></textarea>
              </div>
              <div  class="mb-3"> </div>
              <div class="mb-3">
                <input class="form-control form-control-sm" id="formFileSm" type="file">
              </div>
              <div class="mb-3">
                <div class="input-group"> <span class="input-group-text"> Tác Giả Chính </span>
                  <select class="form-select" id="tacgia">
                    <option selected>Tác Giả</option>
                    <option >Tác Giả 1</option>
                    <option >Tác Giả 2</option>
                  </select>
                </div>
              </div>
              <div class="mb-3"> Đồng Tác Giả
                <select chosen multiple class="form-control text-danger" ng-model="Lichhop.idChutri" ng-options="s.id as s.name for s in Tacgia">
                  <option value="" selected>Vui lòng chọn</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="text-white btn btn-info ms-2">Lưu</button>
              <button type="button" class="text-white btn btn-success ms-2">Lưu Và Gửi Duyệt</button>
              <button type="button" class="text-white btn btn-danger ms-2" data-bs-dismiss="modal">Đóng</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="capnhattailieu" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="h6 modal-title">Cập Nhật Tài Liệu</h2>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <div class="input-group"> <span class="input-group-text"> Tên Tài Liệu </span>
                  <input type="text" class="form-control " id="exampleFormControlInput1" placeholder="Tên Tài Liệu">
                </div>
              </div>
              <div class="mb-3"> </div>
              <div class="mb-3">
                <div class="input-group"> <span class="input-group-text"> Chủ đề </span>
                  <select class="form-select" id="chude" aria-label="Default select example">
                    <option selected>Vui Lòng Chọn</option>
                    <option value="1">Sale</option>
                    <option value="2">Marketing</option>
                  </select>
                </div>
              </div>
              <div class="mb-3"> Giới Thiệu
                <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Lichhop.Noidung" class="form-control text-danger"></textarea>
              </div>
              <div  class="mb-3"> </div>
              <div class="mb-3">
                <input class="form-control form-control-sm" id="formFileSm" type="file">
              </div>
              <div class="mb-3">
                <div class="input-group"> <span class="input-group-text"> Tác Giả Chính </span>
                  <select class="form-select" id="tacgia" aria-label="Default select example">
                    <option selected>Tác Giả</option>
                    <option >Tác Giả 1</option>
                    <option >Tác Giả 2</option>
                  </select>
                </div>
              </div>
              <div class="mb-3">
                <div class="mb-3"> Đồng Tác Giả
                  <select id="states" class="w-100" name="states[]" multiple="multiple">
                    <option value="AK">Tác Giả 1</option>
                    <option value="AK">Tác Giả 2</option>
                    <option value="AK">Tác Giả 3</option>
                    <option value="AK">Tác Giả 4</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="text-white btn btn-info ms-2">Cập Nhật</button>
              <button type="button" class="text-white btn btn-success ms-2">Cập Nhật Và Gửi Duyệt</button>
              <button type="button" class="text-white btn btn-danger ms-2" data-bs-dismiss="modal">Đóng</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="addchude" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify"
                    aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <p class="modal-title" id="modalTitleNotify">THÊM CHỦ ĐỀ</p>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <div class="input-group"> <span class="input-group-text"> Tên Chủ Đề </span>
                  <input type="text" class="form-control" placeholder="Tên Chủ Đề">
                </div>
              </div>
              <div class="mb-3">
                <div class="input-group"> <span class="input-group-text"> Chủ Đề Cha </span>
                  <select class="form-select" id="country" aria-label="Default select example">
                    <option selected>Vui lòng chọn</option>
                    <option value="1">Menu 1</option>
                    <option value="1"> - Menu 1.1</option>
                    <option value="1"> -- Menu 1.1.1</option>
                    <option value="1"> -- Menu 1.1.2</option>
                    <option value="1"> --- Menu 1.1.2.1</option>
                    <option value="1"> - Menu 1.2</option>
                    <option value="1">Menu 2</option>
                    <option value="1">Menu 3</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-primary">Thêm</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-3">
        <div class="card text-white bg-primary mb-3">
          <div class="card-header p-2">Danh Sách Chủ Đề</div>
        </div>
        <div class="accordion" id="accordionparent">
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#menu1"> Menu1 </button>
            </h2>
            <div id="menu1" class="accordion-collapse collapse" data-bs-parent="#accordionparent">
              <div class="accordion-body">
                <div class="accordion" id="accordionparent1">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                      <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#menu11"> Menu 1.1 </button>
                    </h2>
                    <div id="menu11" class="accordion-collapse collapse" data-bs-parent="#accordionparent1">
                      <div class="accordion-body">
                        <div class="accordion" id="accordionparent">
                          <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                              <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#menu1"> Menu1 </button>
                            </h2>
                            <div id="menu1" class="accordion-collapse collapse" data-bs-parent="#accordionparent">
                              <div class="accordion-body"> content1 </div>
                            </div>
                          </div>
                          <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                              <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#menu2"> Menu2 </button>
                            </h2>
                            <div id="menu2" class="accordion-collapse collapse" data-bs-parent="#accordionparent">
                              <div class="accordion-body"> content2 </div>
                            </div>
                          </div>
                          <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#menu2"> Menu3 </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionparent">
                              <div class="accordion-body"> Content3 </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                      <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#menu21"> Menu 1.2 </button>
                    </h2>
                    <div id="menu21" class="accordion-collapse collapse" data-bs-parent="#accordionparent1">
                      <div class="accordion-body"> content 1.2 </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#menu31"> Menu 1.3 </button>
                    </h2>
                    <div id="menu31" class="accordion-collapse collapse" data-bs-parent="#accordionparent1">
                      <div class="accordion-body"> Content 1.3 </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#menu2"> Menu2 </button>
            </h2>
            <div id="menu2" class="accordion-collapse collapse" data-bs-parent="#accordionparent">
              <div class="accordion-body"> content2 </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#menu3"> Menu3 </button>
            </h2>
            <div id="menu3" class="accordion-collapse collapse" data-bs-parent="#accordionparent">
              <div class="accordion-body"> Content3 </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-9">
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Tài Liệu Nguồn</button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fas fa-user-check me-2"></i> Duyệt Tài Liệu <span class="badge bg-danger">4</span></button>
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
                      class="btn btn-block btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#capnhattailieu"></i> <i class="fas fa-eye-slash px-2"></i> <i class="fas fa-trash px-2" ng-click="Xoarow(item)"></i></td>
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

        
        
        
  </div>

