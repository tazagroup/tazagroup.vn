<div class="bg-white shadow border-0 rounded border-light p-4 w-100" ng-init="OninitBaihoc();">
  <div class="d-flex mb-3">
   <div class="modal fade" id="addbaihoc" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-xl" role="document">
     <div class="modal-content">
      <div class="modal-header">
       <h2 class="h6 modal-title">Thêm Bài học</h2>
       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ng-click="OninitBaihoc()"></button>
      </div>
      <div class="modal-body">
       <div class="mb-3">
        <div class="input-group">
         <span class="input-group-text"> Tên Bài học </span>
         <input ng-model="Baihoc.Tenbaihoc" type="text" class="form-control" placeholder="Tên Bài học" />
        </div>
       </div>
       <div class="mb-3">
        <div class="row">
         <div class="col-sm-6">
          <div class="input-group">
           <span class="input-group-text"> Chủ đề </span>
           <select chosen class="form-control text-danger" ng-model="Baihoc.idChude" ng-options="s.id as s.Tenchude for s in RChude" ng-disabled="!CheckCD">
           
           </select>
          <span class="input-group-text"><input class="form-check-input me-2" type="checkbox" ng-model="CheckCD"> Sửa </span>    
          </div>
         </div>
         <div class="col-sm-6">
          <div class="input-group">
           <span class="input-group-text"> Tags </span>
           <select chosen multiple class="form-control text-danger" ng-model="Baihoc.Tags" ng-options="s.id as s.Thuoctinh for s in Congty">
            <option value="" selected></option>
           </select>
          </div>
         </div>
        </div>
       </div>
       <div class="mb-3">
        <div class="row">
         <div class="col-sm-6">
          <div class="input-group">
           <span class="input-group-text"> Dự Kiến Triển Khai </span>
           <input type="text" data-min-date="minDate" ng-model="Baihoc.DKTK" id="DKTK" class="form-control text-danger flatpickr-input" placeholder="Chọn Dự Kiến Triển Khai" data-input="" readonly="readonly" />
          </div>
         </div>
         <div class="col-sm-6">
          <div class="input-group">
           <span class="input-group-text"> Deadline </span>
           <input type="text" data-min-date="minDate" ng-model="Baihoc.Deadline" id="TLNDeadline" class="form-control text-danger flatpickr-input" placeholder="Chọn Deadline" data-input="" readonly="readonly" />
          </div>
         </div>
        </div>
       </div>
       <div class="row mb-3">
        <div class="col-sm-6">
         Nội Dung
         <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Baihoc.Mota" class="form-control text-danger"></textarea>
        </div>
        <div class="col-sm-6">
         Ghi Chú
         <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Baihoc.Ghichu" class="form-control text-danger"></textarea>
        </div>
       </div>
       <div class="mb-3">
         <form action="/index.php?option=com_hrms&task=Baihoc.uploadFileEditor&format=raw" class="dropzone" id="dropzoneFrom">
    </form>  
        <form>
         <div class="input-group">
         <span class="input-group-text">
          San_pham_1.pdf
          San_pham_2.pdf
          San_pham_3.pdf
          </span>   
          <input multiple type="file" name="files" id="files" class="form-control" onchange="angular.element(this).scope().loadFile(this.files)" />
          <span class="input-group-text">
           <button class="btn btn-primary text-white" ng-click="Uploadfile()">Upload</button>
          </span>
         </div>
        </form>
       </div>
       <div class="row mb-3">
        <div class="col-sm-6">
         Tác Giả Chính
         <select disable chosen class="form-control text-danger" ng-model="Baihoc.idTG" ng-options="s.id as s.name for s in RListNV">
         
         </select>
        </div>
 
        <div class="col-sm-6">
         Đồng Tác Giả
         <select chosen multiple class="form-control text-danger" ng-model="Baihoc.idGTG" ng-options="s.id as s.name for s in RListNV">
          <option value="" selected></option>
         </select>
        </div>
       </div>
       <div class="mb-3">
        Kiểm Duyệt
        <select chosen multiple class="form-control text-danger" ng-model="Baihoc.idDuyet" ng-options="s.id as s.name for s in (RListNV|FKiemduyet:NhomDuyet)">
         <option value="" selected></option>
        </select>
       </div>
      </div>
      <div class="modal-footer">
       <button ng-show="Baihoc.CRUD==0" type="button" class="text-white btn btn-info ms-2" ng-click="CreateBaihoc(Baihoc)">Lưu</button>
       <button ng-show="Baihoc.CRUD!=0" type="button" class="text-white btn btn-success ms-2" ng-click="UpdateBaihoc(Baihoc)">Cập Nhật</button>
       <button type="button" class="text-white btn btn-danger ms-2" data-bs-dismiss="modal" ng-click="OninitBaihoc()">Đóng</button>
      </div>
     </div>
    </div>
   </div>
   <div class="modal fade" id="XoaHang" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
     <div class="modal-content">
      <div class="modal-header">
       <h5 class="modal-title">Xóa Bài học</h5>
       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">Bạn có Chắc Chắn Xóa <span class="text-danger" ng-bind-html="Baihoc.Tenbaihoc"></span></div>
      <div class="modal-footer">
       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
       <button type="button" class="btn btn-primary" ng-click="DeleteBaihoc(Baihoc)">Xóa</button>
      </div>
     </div>
    </div>
   </div>
 
   <div class="modal fade" id="PDFView" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
     <div class="modal-content">
      <div class="modal-header">
       <h5 class="modal-title">{{FilePDF.Title}}</h5>
 <button type="button" class="btn-close" data-bs-dismiss="modal"></button>  
      </div>
      <div class="modal-body text-center p-0">
          
          <div id="iframe_div">
 </div>
          
 <!--
          
          <iframe ng-src="{{FilePDF.Link}}" frameborder="0" height="500px" width="100%" toolbar="0"></iframe>
 -->
      </div>
     </div>
    </div>
   </div>
  </div>
  <div class="row" ng-init="activeCD=true">
     <div ng-class="!localStorage.MenuCD ? 'col-3' : 'd-none'"><?php echo $this->loadTemplate('chude_baihoc'); ?></div>
     <div ng-class="!localStorage.MenuCD ? 'col-9' : 'col-12'">
    <nav>
         <div class="nav nav-tabs" id="nav-tab" role="tablist">
           <div>
             <button class="btn btn-primary me-2"  ng-click="Store('MenuCD',!localStorage.MenuCD)"><i class="fas fa-bars m-auto"></i></button>
           </div>
           <button class="nav-link" ng-class="{'active': localStorage.TabTLN==0}" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-baihoc" type="button" role="tab" aria-controls="nav-home" aria-selected="true" ng-click="Store('TabTLN',0);Phantrang(Daduyet,SLitem,Chontrang)">Bài học <span class="badge bg-info">{{Daduyet.length}}</span></button>
           <button class="nav-link" ng-class="{'active': localStorage.TabTLN==1}" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false" ng-click="Store('TabTLN',1);Phantrang(RABaihoc,SLitem,Chontrang)"> <i class="fas fa-user-check me-2"></i> Duyệt Bài học <span class="badge bg-danger">{{RABaihoc.length - Daduyet.length}}</span> </button>
      <div class="d-flex ms-auto"> 
       <div class="me-3">
           <div class="input-group">
               <span class="input-group-text"><span class="badge bg-primary me-2">{{RABaihoc.length}}</span>  Bài học </span>
           </div>
         </div>       
     <div class="me-3">
           <div class="input-group">
               <span class="input-group-text"> Trang </span>
             <select class="form-select" ng-model="Chontrang" ng-change="Pagechose(Chontrang)">
               <option selected ng-value="{{pag}}" ng-repeat="pag in Pagination">{{pag+1}}</option>
             </select>
                <span class="input-group-text">/ {{Sotrang || '0'}}</span>  
           </div>
         </div>
         <div>
           <div class="input-group"> <span class="input-group-text"> Hiển Thị </span>              
             <select class="form-select w-25" ng-model="SLitem" ng-change="Phantrang(RABaihoc,SLitem)" ng-options="s.value as s.title for s in SLHienthi">
             </select>
           </div>
         </div> </div>       
             
             
         </div>
       </nav>
    <div class="tab-content" id="nav-tabContent">
     <div class="tab-pane fade" ng-class="{'show active': localStorage.TabTLN==0}" id="nav-baihoc" role="tabpanel" aria-labelledby="nav-home-tab">
      <div class="row position-relative">
  <div class="overflow-scroll">
    <div class="d-flex">
      <div class="table mt-3 ghichu">
        <table class="table dauviec dauviec-sm table-centered table-nowrap mb-0 rounded text-center table-bordered table-hover">
          <thead class="thead-light">
            <tr>
              <th style="width: 10%;"> <div class="d-flex justify-content-center">
                  <div class="px-2 my-auto dropdown position-static">
                    <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div>
                        <h6><i class="fas fa-sliders-h"></i></h6>
                      </div>
                    </div>
                    <ul class="dropdown-menu">
                      <li class="p-2">
                        <div class="form-check form-switch"> Chủ Đề
                          <input class="form-check-input" type="checkbox" ng-model="tieude.td1" checked />
                        </div>
                      </li>
                      <li class="p-2">
                        <div class="form-check form-switch"> Tài Liệu Nguồn
                          <input class="form-check-input" type="checkbox" ng-model="tieude.td2" checked />
                        </div>
                      </li>
                      <li class="p-2">
                        <div class="form-check form-switch"> Giảng Viên
                          <input class="form-check-input" type="checkbox" ng-model="tieude.td3" checked />
                        </div>
                      </li>
                      <li class="p-2">
                        <div class="form-check form-switch"> Học Viên
                          <input class="form-check-input" type="checkbox" ng-model="tieude.td4" checked />
                        </div>
                      </li>
                      <li class="p-2">
                        <div class="form-check form-switch"> Trạng Thái
                          <input class="form-check-input" type="checkbox" ng-model="tieude.td7" checked />
                        </div>
                      </li>
                      <li class="p-2">
                        <div class="form-check form-switch"> Người Duyệt
                          <input class="form-check-input" type="checkbox" ng-model="tieude.td8" checked />
                        </div>
                      </li>
                      <li class="p-2">
                        <div class="form-check form-switch"> Ghi Chú
                          <input class="form-check-input" type="checkbox" ng-model="tieude.td9" checked />
                        </div>
                      </li>
                      <li class="p-2">
                        <div class="btn btn-primary" ng-click="LuuAnhien(tieude)">Lưu</div>
                      </li>
                    </ul>
                  </div>
                </div>
              </th>
<!--
              <th ng-show="tieude.td1" style="width: 10%;"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Chủ Đề <i class="fas fa-ellipsis-h"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="mb-3">
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                          <select chosen class="form-control text-danger" ng-model="timkiem.idRoot" ng-options="s.idRoot as s.idRoot|FCustom:'Tenchude':RChude for s in (RABaihoc|unique:'idRoot')">
                           
                          </select>
                          <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('idRoot')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('idRoot')"> <i class="fas fa-sort-down"></i> </span> </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </th>
-->
 <th ng-show="tieude.td1" style="width: 20%;"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Tài Liệu Nguồn <i class="fas fa-ellipsis-h"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="mb-3">
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>                  
                          <select chosen class="form-control text-danger" ng-model="timkiem.idTL" ng-options="s.idTL as s.idTL|FCustom:'Tentailieu':RATailieu for s in (RABaihoc|unique:'idTL')">
                           <option value="" selected>Vui lòng chọn</option>   
                          </select>
                          <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('idTL')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('idTL')"> <i class="fas fa-sort-down"></i> </span> </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </th>               
              <th ng-show="tieude.td2" style="width: 20%;"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Tên Bài Học <i class="fas fa-ellipsis-h"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="mb-3">
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                          <input ng-model="timkiem.Tenbaihoc" type="text" class="form-control col-12" placeholder="Tìm Kiếm">
                          <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Tenbaihoc')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Tenbaihoc')"> <i class="fas fa-sort-down"></i> </span> </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </th>
              <th ng-show="tieude.td2" style="width: 10%;"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Đề Thi <i class="fas fa-ellipsis-h"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="mb-3">
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                        <select chosen class="form-control text-danger" ng-model="timkiem.ordering" ng-options="s.ordering as 'Đề Thi Số '+s.ordering for s in (RABaihoc|unique:'ordering')">
                         
                        </select> 
                          <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('ordering')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('ordering')"> <i class="fas fa-sort-down"></i> </span> </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </th>
              <th ng-show="tieude.td3" style="width: 10%;"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Nội Dung <i class="fas fa-ellipsis-h"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="input-group mb-2">
          <span class="input-group-text"> <i class="fas fa-search"></i> </span>
          <input ng-model="timkiem.Noidung" type="text" class="form-control col-12" placeholder="Tìm Kiếm" />
          <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span>
       <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Noidung')"> <i class="fas fa-sort-up"></i> </span>
    <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Noidung')"> <i class="fas fa-sort-down"></i> </span>           
         </div>
                    </li>
                  </ul>
                </div>
              </th>
              <th ng-show="tieude.td5" style="width: 10%;"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Trạng Thái<i class="fas fa-ellipsis-h"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="mb-3">
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                          <select multiple chosen class="form-control text-danger" ng-model="Trangthai" ng-options="s.id as s.Thuoctinh for s in TTDuyet">
                          </select>
                          <span class="input-group-text" ng-click="Trangthai=''"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Trangthai')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Trangthai')"> <i class="fas fa-sort-down"></i> </span> </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </th>
              <th ng-show="tieude.td6" style="width: 10%;"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Người Duyệt <i class="fas fa-ellipsis-h"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                
    
                          <select multiple chosen class="form-control text-danger" ng-model="Nguoiduyet" ng-options="s.idDuyet as s.idDuyet|FCustom:'name':RListNV for s in (RABaihoc|unique:'idDuyet')">
                           
                          </select>
                          <span class="input-group-text" ng-click="Nguoiduyet={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Nguoiduyet')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Nguoiduyet')"> <i class="fas fa-sort-down"></i> </span> </div>
                  </ul>
                </div>
              </th>
            <th ng-show="tieude.td9" style="width: 10%;"> <div class="dropdown position-static">
                              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="d-flex justify-content-center flex-column">Người Tạo<i class="fas fa-ellipsis-h"></i></div>
                              </div>
                              <ul class="dropdown-menu">
                                <li class="p-2">
                                  <div class="mb-3">
                                    <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                                      <select chosen class="form-control text-danger" ng-model="timkiem.idTao" ng-options="s.id as s.name for s in RListNV">
                                      </select>
                                      <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('idTao')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('idTao')"> <i class="fas fa-sort-down"></i> </span> </div>
                                  </div>
                                </li>
                              </ul>
                            </div>
                          </th>    
              <th ng-show="tieude.td7" style="width: 10%;"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Ghi Chú <i class="fas fa-ellipsis-h"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="input-group mb-2">
          <span class="input-group-text"> <i class="fas fa-search"></i> </span>
          <input ng-model="timkiem.Ghichu" type="text" class="form-control col-12" placeholder="Tìm Kiếm" />
          <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span>
       <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Ghichu')"> <i class="fas fa-sort-up"></i> </span>
    <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Ghichu')"> <i class="fas fa-sort-down"></i> </span>           
         </div>
                    </li>
                  </ul>
                </div>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="rd in Daduyet=(RABaihoc |FMT:Trangthai:'Trangthai'|FMT:Nguoiduyet:'idDuyet' | filter:timkiem| orderBy:propertyName:reverse |filter:{Trangthai:2})">
              <td style="width: 10%;"><div class="dropdown position-static my-auto">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown">
                    <div class="d-flex justify-content-center flex-column">{{$index+1}} <i class="fas fa-ellipsis-h my-auto"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2" ng-click="editBaihoc(rd)" data-bs-toggle="modal" data-bs-target="#CRUDBaihoc"><i class="fas fa-edit text-info"></i> Sửa</li>
                    <li class="p-2" data-bs-toggle="modal" data-bs-target="#XoaHang" ng-click="removeBaihoc(rd)" ng-if="Quyen.pq14"><i class="fas fa-trash-alt text-danger"></i> Xóa</li>
                  </ul>
                </div></td>
<!--              <td ng-show="tieude.td1" style="width: 10%;">{{rd.idRoot|FTenchude:RChude}}</td>-->
              <td ng-show="tieude.td1" style="width: 20%;">{{rd.idTL|FCustom:'Tentailieu':RATailieu}}</td>
              <td ng-show="tieude.td2" style="width: 20%;">{{rd.Tenbaihoc}}</td>
              <td ng-show="tieude.td2" style="width: 10%;"><div ng-if="rd.Dethi" class="input-group justify-content-center" data-bs-toggle="modal" data-bs-target="#ShowDethi" ng-click="ShowDethi(rd)"> <span class="input-group-text">Đề Thi Số {{rd.Dethi.ordering}} </span> </div></td>
              </a>
              </td>
              <td ng-show="tieude.td3" style="width: 10%;"><i class="fas fa-eye me-2 my-auto" ng-click="XemNoidung(rd)" data-bs-toggle="modal" data-bs-target="#XemNoidung"></i></td>
              <td ng-show="tieude.td5" style="width: 10%;"><div class="btn-group position-static"> <span class="{{rd.Trangthai|FMaunen:TTDuyet}} {{rd.Trangthai|FMauchu:TTDuyet}} p-1 rounded" data-bs-toggle="dropdown" data-bs-auto-close="outside">{{rd.Trangthai|Ftitle:TTDuyet}}</span>
                  <ul class="dropdown-menu" ng-show="         
         {{<?php echo $this->idUser; ?>|Fduyet:rd.idDuyet}}">
                    <li ng-repeat="s1 in TTDuyet" ng-click="UpdateDuyetBaihoc(rd.id,s1.id)">
                      <div class="dropdown-item"><span class="{{s1.id|FMaunen:TTDuyet}} {{s1.id|FMauchu:TTDuyet}} p-1 rounded">{{s1.Thuoctinh}}</span></div>
                    </li>
                  </ul>
                </div></td>
              <td ng-show="tieude.td7" style="width: 10%;"><div class="btn-group position-static" ng-if="rd.idDuyet.length!=0"> <span data-bs-toggle="dropdown" data-bs-auto-close="outside"><i class="fas fa-user-circle"></i></span>
                  <ul class="dropdown-menu">
                    <li><span class="dropdown-item text-danger" ng-repeat="d in rd.idDuyet">{{d|Fname:RListNV}}</span></li>
                  </ul>
                </div></td>
    <td ng-show="tieude.td9" style="width: 10%;"><div class="btn-group position-static"> <span data-bs-toggle="dropdown" data-bs-auto-close="outside"><i class="fas fa-user-circle"></i></span>
                              <ul class="dropdown-menu">
                                <li><span class="dropdown-item text-danger">{{rd.idTao|Fname:RListNV}}</span></li>
                              </ul>
                            </div></td>      
              <td ng-show="tieude.td8" style="width: 10%;"><div ng-bind-html="rd.Ghichu" class="ellipsis"></div></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
     </div>
     <div class="tab-pane fade" ng-class="{'show active': localStorage.TabTLN==1}" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"><?php echo $this->loadTemplate('baihoc_duyet'); ?></div>
    </div>
   </div>
  </div>
 </div>
 
<div class="modal fade" id="XemNoidung" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Nội Dung {{ViewNoidung.Tenlop}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="ytplayer">
        <div class="row p-3">
          <div class="container text-center noidung" ng-bind-html="ViewNoidung.Noidung"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" ng-click="CloseYoutube()" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="CRUDBaihoc" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{Baihoc.Title}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row p-3">
          <div class="mb-3 col-6">
            <div class="input-group"> <span class="input-group-text">Tài Liệu Nguồn</span>
              <select chosen class="form-control text-danger" ng-model="Baihoc.idTL" ng-options="s.id as s.MaTL +' - '+s.Tentailieu for s in (TailieuGoc|filter:{Trangthai:2})">
              </select>
            </div>
          </div>
          <div class="mb-3 col-6">
            <div class="input-group"> <span class="input-group-text">Tên Bài Học</span>
              <input type="text" class="form-control" placeholder="Nhập Tên Bài Học" ng-model="Baihoc.Tenbaihoc">
            </div>
          </div>
          <div class="mb-3">
            <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Baihoc.Noidung" class="form-control text-danger" placeholder="Nội Dung"></textarea>
          </div>
          <div class="mb-3 col-6">
            <div class="input-group"> <span class="input-group-text">Người Duyệt</span>
              <select multiple chosen class="w-100" ng-model="Baihoc.idDuyet" ng-options="s.id as s.name for s in (RListNV|FKiemduyet:NhomDuyet)">
              </select>
            </div>
          </div>
          <div class="mb-3 col-6">
            <div class="input-group"> <span class="input-group-text">Đề Thi</span>
              <select chosen class="form-control text-danger" ng-model="Baihoc.idDT" ng-options="s.id as s.Tendethi for s in (Dethigoc|filter:{Trangthai:2})">
              </select>
             <span class="input-group-text"><i class="fas fa-sync-alt mx-3 my-auto" ng-click="ResetDethi()"></i></span>   
                
            </div>
          </div>
          <div class="mb-3">
            <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Baihoc.Ghichu" class="form-control text-danger" placeholder="Ghi Chú"></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button ng-if="Baihoc.CRUD==0" class="btn btn-info" ng-click="CreateBaihoc(Baihoc)">Tạo Mới</button>
        <button ng-if="Baihoc.CRUD!=0"class="btn btn-success text-white" ng-click="UpdateBaihoc(Baihoc)">Cập Nhật</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="ShowDethi" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-dialog-scrollable modal-lg hinhcauhoi">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> Đề Thi Số {{Dethiso}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
              <div ng-repeat="ch in RCauhoiindethi">
            <div class="card mb-3">
              <div class="card-header text-white bg-primary p-2">
                  <div> Câu Số {{$index+1}} - {{ch.Diem}} Điểm</div>
                </div>
              <div class="card-body">
                  <span ng-bind-html="ch.Cauhoi"></span>
                <div ng-if="ch.Dapan.type==1">
                  <textarea class="form-control" placeholder="Trả Lời"></textarea>
                </div>
                <div ng-if="ch.Dapan.type==0">
                  <div ng-repeat="tl in ch.Traloi"> <span class="me-2 badge rounded-pill bg-primary">{{tl.id|FABC}}</span> {{tl.value}}</div>
                </div>
                </div>
                <div class="card-footer text-white bg-info p-2">
                    <div ng-if="ch.Dapan.type==0">Đáp Án Trắc Nghiệm : <span class="me-2 badge rounded-pill bg-danger">{{ch.Dapan.data.id|FABC}}</span> {{ch.Dapan.data.value}} </div>
                    <div ng-if="ch.Dapan.type!=0">Đáp Án Tự Luận :<span ng-bind-html="ch.Dapan.data"></span> </div>
                </div>   
            </div>    
              </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" class="btn btn-secondary" data-bs-dismiss="modal">
        Đóng
        </button>
      </div>
    </div>
  </div>
</div>
