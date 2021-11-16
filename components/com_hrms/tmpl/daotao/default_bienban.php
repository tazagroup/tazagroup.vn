<div ng-init="OninitTailieu();OninitThumuc(<?php echo $this->LoaiTM; ?>)" class="col-12 d-flex align-items-center justify-content-center">
  <div class="bg-white shadow border-0 rounded border-light p-3 w-100">
    <h3 class="text-center"><?php echo $this->params->get('page_title'); ?></h3>
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Taothumuc"><i class="fas fa-folder-plus"></i> Tạo Thư Mục </button>-->
    <div class="row mt-3">
      <div class="table-responsive-xl">
        <table class="table table-centered table-nowrap mb-0 rounded text-center table-bordered">
          <thead class="thead-light">
            <tr>
              <th scope="col"> <div class="dropdown">
                  <div class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex justify-content-center"> <i class="fas fa-sliders-h"></i></div>
                  </div>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li class="p-2 small">
                      <div class="form-check form-switch"> Khối
                        <input class="form-check-input" type="checkbox" ng-model="tieude.khoi" checked>
                      </div>
                    </li>
                    <li class="p-2 small">
                      <div class="form-check form-switch"> Phòng
                        <input class="form-check-input" type="checkbox" ng-model="tieude.phong" checked>
                      </div>
                    </li>
                    <li class="p-2 small">
                      <div class="form-check form-switch"> Vị Trí
                        <input class="form-check-input" type="checkbox"  ng-model="tieude.vitri" checked>
                      </div>
                    </li>
                    <li class="p-2 small">
                      <div class="form-check form-switch"> File
                        <input class="form-check-input" type="checkbox" ng-model="tieude.file" checked>
                      </div>
                    </li><li class="p-2 small">
                      <div class="form-check form-switch"> Ngày Ban hành
                        <input class="form-check-input" type="checkbox" ng-model="tieude.ngay" checked>
                      </div>
                    </li><li class="p-2 small">
                      <div class="form-check form-switch"> Tình Trạng
                        <input class="form-check-input" type="checkbox" ng-model="tieude.tinhtrang" checked>
                      </div>
                    </li><li class="p-2 small">
                      <div class="form-check form-switch"> Ghi Chú
                        <input class="form-check-input" type="checkbox" ng-model="tieude.ghichu" checked>
                      </div>
                    </li>
                  </ul>
                </div>
              </th>
              <th scope="col" ng-show="tieude.khoi==true"> <div class="dropdown">
                  <div class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex justify-content-center"> Khối <i class="fas fa-ellipsis-v ms-auto"></i></div>
                  </div>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li class="p-2">
                      <input class="form-control" placeholder="Tìm Kiếm" />
                    </li>
                    <li><a class="dropdown-item" href="#">A - Z <i class="fas fa-sort-amount-up-alt"></i></a></li>
                    <li><a class="dropdown-item" href="#">Z- A <i class="fas fa-sort-amount-down"></i></a></li>
                  </ul>
                </div>
              </th>
              <th scope="col" ng-show="tieude.phong==true"> <div class="dropdown">
                  <div class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex"> Phòng <i class="fas fa-ellipsis-v ms-auto"></i></div>
                  </div>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li class="p-2">
                      <input class="form-control" placeholder="Tìm Kiếm" />
                    </li>
                    <li><a class="dropdown-item" href="#">A - Z <i class="fas fa-sort-amount-up-alt"></i></a></li>
                    <li><a class="dropdown-item" href="#">Z- A <i class="fas fa-sort-amount-down"></i></a></li>
                  </ul>
                </div>
              </th>
              <th scope="col" ng-show="tieude.vitri==true"> <div class="dropdown">
                  <div class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex"> Vị Trí <i class="fas fa-ellipsis-v ms-auto"></i></div>
                  </div>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li class="p-2">
                      <input class="form-control" placeholder="Tìm Kiếm" />
                    </li>
                    <li><a class="dropdown-item" href="#">A - Z <i class="fas fa-sort-amount-up-alt"></i></a></li>
                    <li><a class="dropdown-item" href="#">Z- A <i class="fas fa-sort-amount-down"></i></a></li>
                  </ul>
                </div>
              </th>
              <th scope="col" ng-show="tieude.file==true"> <div class="dropdown">
                  <div class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex"> File <i class="fas fa-ellipsis-v ms-auto"></i></div>
                  </div>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li class="p-2">
                      <input class="form-control" placeholder="Tìm Kiếm" />
                    </li>
                    <li><a class="dropdown-item" href="#">A - Z <i class="fas fa-sort-amount-up-alt"></i></a></li>
                    <li><a class="dropdown-item" href="#">Z- A <i class="fas fa-sort-amount-down"></i></a></li>
                  </ul>
                </div>
              </th>
              <th scope="col" ng-show="tieude.ngay==true"> <div class="dropdown">
                  <div class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex"> Ngày Ban Hành <i class="fas fa-ellipsis-v ms-auto"></i></div>
                  </div>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li class="p-2">
                      <input class="form-control" placeholder="Tìm Kiếm" />
                    </li>
                    <li><a class="dropdown-item" href="#">A - Z <i class="fas fa-sort-amount-up-alt"></i></a></li>
                    <li><a class="dropdown-item" href="#">Z- A <i class="fas fa-sort-amount-down"></i></a></li>
                  </ul>
                </div>
              </th>
              <th scope="col" ng-show="tieude.tinhtrang==true"> <div class="dropdown">
                  <div class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex"> Tình Trạng <i class="fas fa-ellipsis-v ms-auto"></i></div>
                  </div>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li class="p-2">
                      <input class="form-control" placeholder="Tìm Kiếm" />
                    </li>
                    <li><a class="dropdown-item" href="#">A - Z <i class="fas fa-sort-amount-up-alt"></i></a></li>
                    <li><a class="dropdown-item" href="#">Z- A <i class="fas fa-sort-amount-down"></i></a></li>
                  </ul>
                </div>
              </th>
              <th scope="col" ng-show="tieude.ghichu==true"> <div class="dropdown">
                  <div class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex"> Ghi Chú <i class="fas fa-ellipsis-v ms-auto"></i></div>
                  </div>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li class="p-2">
                      <input class="form-control" placeholder="Tìm Kiếm" />
                    </li>
                    <li><a class="dropdown-item" href="#">A - Z <i class="fas fa-sort-amount-up-alt"></i></a></li>
                    <li><a class="dropdown-item" href="#">Z- A <i class="fas fa-sort-amount-down"></i></a></li>
                  </ul>
                </div>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="t in test">
              <td>
                  <div class="dropdown">
                  <div class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex justify-content-center">{{$index+1}}</div>
                  </div>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li class="p-2">
                      <i class="fas fa-edit text-info"></i> Sửa
                    </li>                
                 <li class="p-2">
                      <i class="fas fa-trash-alt text-danger"></i> Xóa
                    </li>
  
                  </ul>
                </div>
                </td>
              <td ng-show="tieude.khoi==true">{{t.khoi}}</td>
              <td ng-show="tieude.phong==true">{{t.Phong}}</td>
              <td ng-show="tieude.vitri==true">{{t.Vitri}}</td>
              <td ng-show="tieude.file==true">{{t.File}}</td>
              <td ng-show="tieude.ngay==true">{{t.Ngay}}</td>
              <td ng-show="tieude.tinhtrang==true">{{t.Tinhtrang}}</td>
              <td ng-show="tieude.ghichu==true">{{t.Ghichu}}</td>
            </tr>
            <tr ng-repeat="i in inputs">
              <td valign="middle" ng-click="delinput(i)"><i class="fas fa-minus-circle text-danger"></i></td>
              <td ng-show="tieude.khoi==true"><input ng-model="input.khoi" class="form-control" placeholder="Khối"/></td>
              <td ng-show="tieude.phong==true"><input ng-model="input.Phong" class="form-control" placeholder="Phòng"/></td>
              <td ng-show="tieude.vitri==true"><input ng-model="input.Vitri" class="form-control" placeholder="Vị Trí"/></td>
              <td ng-show="tieude.file==true"><input ng-model="input.File" class="form-control" placeholder="File"/></td>
              <td ng-show="tieude.ngay==true"><input ng-model="input.Ngay" type="date" class="form-control" placeholder="Ngày Ban Hành"/></td>
              <td ng-show="tieude.tinhtrang==true"><input ng-model="input.Tinhtrang" class="form-control" placeholder="Tình Trạng"/></td>
              <td ng-show="tieude.ghichu==true"><input ng-model="input.Ghichu" class="form-control" placeholder="Ghi Chú"/></td>
            </tr>
            <tr>
              <td colspan="8" class="px-3">
<div class="d-flex">                <div class="me-auto" ng-click="addinput()" ><span class="text-info"><i class="fas fa-plus-circle"></i> Thêm Mới</span></div>
                <div class="ms-auto" ng-show="inputs.length!=0" ng-click="saveinput()"><span class="text-primary"><i class="fas fa-save text-success"></i> Lưu</span></div></div>
                </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="modal fade" id="Taothumuc" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"> {{Thumuc.Title}} Việc</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row p-3">
              <div class="mb-3">
                <div class="input-group"> <span class="input-group-text">Thư Mục </span>
                  <input type="text" class="form-control" placeholder="Tiêu Đề" ng-model="Thumuc.Tieude">
                </div>
              </div>
              <div class="mb-3">
                <div class="input-group"> <span class="input-group-text">Thư Mục Cha</span>
                  <select class="form-select" ng-model="Thumuc.Parent">
                    <option selected ng-value="0">Chọn Thư Mục Cha</option>
                    <option ng-value={{pr}} ng-repeat="pr in RLthumucs">{{pr.Tieude}}</option>
                  </select>
                </div>
              </div>
              <div class="mb-3">
                <div class="input-group"> <span class="input-group-text">Mô Tả</span>
                  <textarea class="form-control" ng-model="Thumuc.Mota"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            <button type="button" ng-show="Thumuc.CRUD!=1" class="btn btn-primary" ng-click="CreateThumuc(Thumuc)"> Tạo Mới</button>
            <button type="button" ng-show="Thumuc.CRUD==1" class="btn btn-primary" ng-click="UpdateThumuc(Dauviec)">Cập Nhật</button>
          </div>
        </div>
      </div>
    </div>
    
    <!--<div class="row mt-3">  
    <div class="p-2 col-12 border" ng-repeat="dm in Rthumucs | orderBy:'data.path'">
    <div class="row">     
    <div class="p-3 col-sm-9">
        {{dm.data.level|level}} {{dm.data.toc}} {{dm.data.Tieude}} 
        </div>
        <div class="col-sm-3 text-end">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Taofile" ng-click="editTailieu(dm.data)"><i class="fas fa-file-upload"></i></button>
        </div>
       <div class="d-flex">
           
<div ng-repeat="file in dm.dulieu">           <button class="btn btn-secondary mx-2" data-bs-toggle="modal" data-bs-target="#Xempdf" ng-click="XemPDF(file.Link)">
               {{file.TenTailieu}}
           </button>
           
         <div class="modal fade" id="Xempdf" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row p-3">  
                         <iframe ng-src="{{url}}" style="width:100%; height:500px;" frameborder="0"></iframe>   
                  </div>
                </div>
              </div>
            </div>
          </div> </div> 
        </div>
    </div>
    </div>
  </div>--> 
  </div>
  <div class="row">
    <div class="modal fade" id="Taofile" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> Thêm Tài Liệu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row p-3">
              <form id="UpTailieu" method="post" action="<?php echo Route::_('index.php?option=com_hrms&task=Tailieu.uploadFile');?>" enctype="multipart/form-data">
                <div class="input-group">
                  <input type="hidden" class="address" name="address">
                  <input type="file" name="files" class="form-control" required onchange="angular.element(this).scope().loadFile(this.files)">
                  <?php echo HTMLHelper::_('form.token'); ?> </div>
                </span>
              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            <button type="button" class="btn btn-primary" ng-click="CreateTailieu()"> Tạo Mới</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
