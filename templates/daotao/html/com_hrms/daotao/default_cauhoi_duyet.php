<div class="row position-relative">
  <div class="overflow-scroll">
    <div class="d-flex">
      <div class="table mt-3 ghichu">
        <table class="table dauviec table-centered table-nowrap mb-0 rounded text-center table-bordered table-hover">
          <thead class="thead-light">
            <tr>
              <th style="width: 10%;"> <div class="d-flex justify-content-center ">
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
                        <div class="form-check form-switch"> Mã Tài Liệu
                          <input class="form-check-input" type="checkbox" ng-model="tieude.td2" checked />
                        </div>
                      </li>
                      <li class="p-2">
                        <div class="form-check form-switch"> Tài Liệu
                          <input class="form-check-input" type="checkbox" ng-model="tieude.td3" checked />
                        </div>
                      </li>
                      <li class="p-2">
                        <div class="form-check form-switch"> Nội dung
                          <input class="form-check-input" type="checkbox" ng-model="tieude.td4" checked />
                        </div>
                      </li>
                      <li class="p-2">
                        <div class="form-check form-switch"> Tác Giả
                          <input class="form-check-input" type="checkbox" ng-model="tieude.td5" checked />
                        </div>
                      </li>
                      <li class="p-2">
                        <div class="form-check form-switch"> Ngày Hiệu Lực
                          <input class="form-check-input" type="checkbox" ng-model="tieude.td6" checked />
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
                  <div>
                    <h6><i class="fas fa-plus-circle" data-bs-toggle="modal" data-bs-target="#CRUDCauhoi"></i></h6>
                  </div>
                </div>
              </th>
              <th ng-show="tieude.td1" style="width: 15%;"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Chủ Đề <i class="fas fa-ellipsis-h"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="mb-3">
                        <div class="mb-3">
                          <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                            <select chosen class="form-control text-danger" ng-model="timkiem.idRoot" ng-options="s.id as s.Tenchude for s in RFChude">
                              <option value="" selected>Vui lòng chọn</option>
                            </select>
                            <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('idRoot')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('idRoot')"> <i class="fas fa-sort-down"></i> </span> </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </th>
              <th ng-show="tieude.td2" style="width: 20%;"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Tài Liệu Nguồn <i class="fas fa-ellipsis-h"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="mb-3">
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                          <select chosen class="form-control text-danger" ng-model="timkiem.idTL" ng-options="s.idTL as s.idTL|FTailieu:TailieuGoc for s in (RACauhoi|unique:'idTL')">
                            <option value="" selected>Vui lòng chọn</option>
                          </select>
                          <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('idTL')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('idTL')"> <i class="fas fa-sort-down"></i> </span> </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </th>
              <th ng-show="tieude.td3" style="width: 10%;"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Mã CH <i class="fas fa-ellipsis-h"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="mb-3">
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                          <input ng-model="timkiem.MaCH" type="text" class="form-control col-12" placeholder="Tìm Kiếm">
                          <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('MaCH')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('MaCH')"> <i class="fas fa-sort-down"></i> </span> </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </th>
              <th ng-show="tieude.td4" style="width: 20%;"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Câu Hỏi <i class="fas fa-ellipsis-h"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="mb-3">
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                          <input ng-model="timkiem.Cauhoi" type="text" class="form-control col-12" placeholder="Tìm Kiếm">
                          <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Cauhoi')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Cauhoi')"> <i class="fas fa-sort-down"></i> </span> </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </th>
              <th ng-show="tieude.td5" style="width: 20%;"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Trả Lời <i class="fas fa-ellipsis-h"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="mb-3">
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                          <input ng-model="timkiem.Traloi" type="text" class="form-control col-12" placeholder="Tìm Kiếm">
                          <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Traloi')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Traloi')"> <i class="fas fa-sort-down"></i> </span> </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </th>
              <th ng-show="tieude.td6" style="width: 20%;"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Đáp án <i class="fas fa-ellipsis-h"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="mb-3">
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                          <input ng-model="timkiem.Dapan.data" type="text" class="form-control col-12" placeholder="Tìm Kiếm">
                          <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Dapan')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Dapan')"> <i class="fas fa-sort-down"></i> </span> </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </th>
              <th ng-show="tieude.td7" style="width: 10%;"> 
         <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Cấp Độ <i class="fas fa-ellipsis-h"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="mb-3">
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                          <select multiple chosen class="form-control text-danger" ng-model="Capdo" ng-options="s.id as s.Thuoctinh for s in ListCapdo">
                          <option value="" selected>Vui lòng chọn</option>
                        </select>
                          <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Capdo')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Capdo')"> <i class="fas fa-sort-down"></i> </span> </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </th>
            <th ng-show="tieude.td8" style="width: 10%;"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Trạng Thái<i class="fas fa-ellipsis-h"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="mb-3">
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                          <select chosen class="form-control text-danger" ng-model="timkiem.Trangthai" ng-options="s.id as s.Thuoctinh for s in TTDuyet">
                            <option value="" selected>Vui lòng chọn</option>
                          </select>
                          <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Trangthai')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Trangthai')"> <i class="fas fa-sort-down"></i> </span> </div>
                      </div>
                    </li>
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
                            <option value="" selected>Vui lòng chọn</option>
                          </select>
                          <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('idTao')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('idTao')"> <i class="fas fa-sort-down"></i> </span> </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </th>
              <th ng-show="tieude.td10" style="width: 10%;"> <div class="dropdown position-static">
      <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
       <div class="d-flex justify-content-center flex-column">
        Người Duyệt <i class="fas fa-ellipsis-h"></i>
       </div>
      </div>
      <ul class="dropdown-menu">
       <li class="p-2">
        <div class="mb-3">
         <div class="input-group mb-2">
          <span class="input-group-text"> <i class="fas fa-search"></i> </span>
          <select chosen class="form-control text-danger" ng-model="timkiem.idDuyet" ng-options="s.id as s.name for s in (RListNV|FKiemduyet:NhomDuyet)">
           <option value="" selected>Vui lòng chọn</option>
          </select>
  <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('idDuyet')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('idDuyet')"> <i class="fas fa-sort-down"></i> </span>    
         </div>
        </div>
       </li>
      </ul>
     </div>
              </th>
              <th ng-show="tieude.td11" style="width: 10%;"> <div class="dropdown position-static">
      <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
       <div class="d-flex justify-content-center flex-column">
        Ngày 
        tạo <i class="fas fa-ellipsis-h"></i>
       </div>
      </div>
      <ul class="dropdown-menu">
       <li class="p-2">
        <div class="mb-3">
         <div class="input-group">
          <span class="input-group-text"> Từ </span>
          <input type="date" class="form-control text-danger" ng-model="Ngaytao.from" />
          <span class="input-group-text" ng-click="Ngaytao={}"> <i class="fas fa-sync-alt"></i> </span>    
         </div>
        </div>
        <div class="mb-3">
         <div class="input-group">
          <span class="input-group-text"> Đến </span>
          <input type="date" class="form-control text-danger" ng-model="Ngaytao.to" />
          <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Ngaytao')"> <i class="fas fa-sort-up"></i> </span>
 <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Ngaytao')"> <i class="fas fa-sort-down"></i> </span>    
         </div>
        </div>
       </li>
      </ul>
     </div>
              </th>
              <th ng-show="tieude.td12" style="width: 20%;">
                  
                  <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Ghi Chú <i class="fas fa-ellipsis-h"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="mb-3">
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                          <input ng-model="timkiem.Ghichu" type="text" class="form-control col-12" placeholder="Tìm Kiếm">
                          <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Ghichu')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Ghichu')"> <i class="fas fa-sort-down"></i> </span> </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </th>
        <th ng-show="tieude.td12" style="width: 20%;">
                  
                  <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Tags<i class="fas fa-ellipsis-h"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="mb-3">
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                          <input ng-model="timkiem.Tags" type="text" class="form-control col-12" placeholder="Tìm Kiếm">
                          <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Tags')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Tags')"> <i class="fas fa-sort-down"></i> </span> </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </th>         
                
            </tr>
<!--
            <tr ng-if="Cauhoi.CRUD!=0">
              <td style="width: 10%;"><div class="d-flex justify-content-center" ng-show="Cauhoi.CRUD!=0">
                  <h6 class="me-2"><i ng-show="Cauhoi.CRUD==1" class="fas fa-save text-info" ng-click="CreateCauhoi(Cauhoi)"></i></h6>
                  <h6 class="me-2"><i ng-show="Cauhoi.CRUD==2" class="fas fa-edit text-info" ng-click="UpdateCauhoi(Cauhoi)"></i></h6>
                  <h6 class="me-2"><i class="fas fa-minus-circle text-danger" ng-click="resetCauhoi()"></i></h6>
                </div></td>
              <td ng-show="tieude.td1" style="width: 20%;"><div class="border-primary border-dotted rounded-1 mh-2 p-2">{{Cauhoi.idRoot|FTenchude:RChude}}</div></td>
              <td ng-show="tieude.td2" style="width: 20%;"><div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="border-primary border-dotted rounded-1 mh-2 p-2">
                      <p>{{Cauhoi.idTL | FTailieu:TailieuGoc}}</p>
                    </div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="input-group"> <span class="input-group-text"> Tài Liệu</span>
                        <select chosen class="form-control text-danger" ng-model="Cauhoi.idTL" ng-options="s.id as s.MaTL +' - '+ s.Tentailieu  for s in (TailieuGoc| filter:{Trangthai:'2'})" ng-change="LoadCD(Cauhoi.idTL)">
                          <option value="" selected>Vui lòng chọn Tên Tài Liệu Nguồn</option>
                        </select>
                      </div>
                    </li>
                  </ul>
                </div></td>
              <td ng-show="tieude.td2" style="width: 10%;">
                  <div class="border-primary border-dotted rounded-1 mh-2 p-2">{{Cauhoi.MaCH}}</div>
                  
                </td>
              <td ng-show="tieude.td4" style="width: 20%;">
                  
        <div class="row">
        <div class="my-2">      
<div class="border-primary border-dotted rounded-1 mh-2 p-2" data-bs-toggle="modal" data-bs-target="#addkehoach" ng-bind-html="Cauhoi.Cauhoi"></div> 
          <div class="modal fade" id="addkehoach" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title"> Câu Hỏi</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Cauhoi.Cauhoi" class="form-control text-danger"></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
 </td>
              <td ng-show="tieude.td3" style="width: 20%;"><div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="border-primary border-dotted rounded-1 mh-2 p-2">
                      <div ng-repeat="tl in inputs"><span class="me-2 badge rounded-pill bg-primary">{{$index+1|FABC}}</span> {{tl.value}}</div>
                     <div ng-repeat="tl in inputs"><span class="me-2 badge rounded-pill bg-primary">{{tl.id|FABC}}</span>{{tl.value}} </div>      
                    </div>
                  </div>
                  <ul class="dropdown-menu p-3 w-50">
                    <li class="p-2">
                      <div class="p-2 text-center mb-3">Trả Lời</div>
                      <div>
                        <div class="text-center" ng-click="addinput()">
                          <button class="btn btn-primary"><i class="fas fa-plus-circle"></i></button>
                        </div> 
                    <div class="form-check d-flex p-0 mb-3" ng-repeat="i1 in inputs"> 
                            <span class="m-auto p-2 me-2 badge rounded-pill bg-primary">{{$index+1|
FABC}}</span> 
                          <input type="hidden" class="form-control" ng-model="i1.id" ng-init="i1.id=$index+1"/>
                          <input class="form-control" ng-model="i1.value" />
                            
                          </div>                   
                          
                      </div>
                    </li>
                  </ul>
                </div></td>
              <td ng-show="tieude.td4" style="width: 20%;"><div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="border-primary border-dotted rounded-1 mh-2 p-2">
                      <div  ng-if="Cauhoi.Dapan.type==0">Trắc Nghiệm
                        <span>{{Cauhoi.Dapan.data.value}}</span>
                        </div>             
                        <div ng-if="Cauhoi.Dapan.type==1">Tự Luận
                        <div ng-bind-html="Cauhoi.Dapan.data"></div>
                        </div>
                    </div>
                  </div>
                  <ul class="dropdown-menu p-3">
                    <li class="p-2">
                      <div class="p-2">Đáp án</div>
                      <div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="Radtraloi" id="Radtraloi1" value="0" ng-model="Cauhoi.Dapan.type" checked />
                          <label class="form-check-label" for="Radtraloi1"> Trắc Nghiệm </label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="Radtraloi" id="Radtraloi2" value="1" ng-model="Cauhoi.Dapan.type"/>
                          <label class="form-check-label" for="Radtraloi2"> Tự Luận </label>
                        </div>
                      </div>
                    </li>
                    <li class="p-2" ng-show="Cauhoi.Dapan.type==0">
                      <div class="form-check d-flex p-0 mb-3" ng-repeat="i1 in inputs">
                        <span class="m-auto p-2" ng-click="CheckDapan(i1)"><span class="me-2 badge rounded-pill" ng-class="i1.check==true?'bg-danger':'bg-primary'">{{i1.id|FABC}}</span> </span>
                        <input class="form-control" ng-model="i1.value" disabled />
                      </div>
                    </li>
                    <li class="p-2" ng-show="Cauhoi.Dapan.type==1">
                      <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Cauhoi.Dapan.data" class="form-control text-danger"></textarea>
                    </li>
                  </ul>
                </div></td>
              <td ng-show="tieude.td5" style="width: 10%;"><div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="border-primary border-dotted rounded-1 mh-2 p-2">{{Cauhoi.Capdo|Ftitle:ListCapdo}}</div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="input-group"> <span class="input-group-text">Cấp Độ </span>
                        <select chosen class="form-control text-danger" ng-model="Cauhoi.Capdo" ng-options="s.id as s.Thuoctinh for s in ListCapdo">
                          <option value="" selected>Vui lòng chọn</option>
                        </select>
                      </div>
                    </li>
                  </ul>
                </div></td>
              <td ng-show="tieude.td6" style="width: 10%;"></td>
              <td ng-show="tieude.td7" style="width: 10%;"></td>
              <td ng-show="tieude.td8" style="width: 10%;"><div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="border-primary border-dotted rounded-1 mh-2 p-2"> <span class="ms-2" ng-repeat="id in Cauhoi.idDuyet"> <i class="fas fa-user-circle"></i></span> </div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="input-group"> <span class="input-group-text"> Người Duyệt </span>
                        <select chosen multiple class="form-control text-danger" ng-model="Cauhoi.idDuyet" ng-options="s.id as s.name for s in (RListNV|FKiemduyet:NhomDuyet)">
                          <option value="" selected>Vui lòng chọn</option>
                        </select>
                      </div>
                    </li>
                  </ul>
                </div></td>
              <td ng-show="tieude.td9" style="width: 10%;"></td>
              <td ng-show="tieude.td9" style="width: 20%;"><div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="border-primary border-dotted rounded-1 mh-2 p-2" ng-bind-html="Cauhoi.Ghichu"></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2"> Ghi Chú
                      <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Cauhoi.Ghichu" class="form-control text-danger"></textarea>
                    </li>
                  </ul>
                </div></td>
             <td ng-show="tieude.td9" style="width: 20%;"><div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="border-primary border-dotted rounded-1 mh-2 p-2">{{Cauhoi.Tags|Ftitle:ListTagsTLN}}</div>
                  </div> 
                  <ul class="dropdown-menu">
                    <li class="p-2">           
                    <div class="input-group"> <span class="input-group-text">Tags</span>
                       <select chosen class="form-control text-danger" ng-model="Cauhoi.Tags" ng-options="s.id as s.Thuoctinh for s in ListTagsTLN">
                          <option value="" selected>Vui lòng chọn</option>
                        </select>
                      </div> 
                    </li>
                  </ul>
                </div></td>     
            </tr>
-->
          </thead>
          <tbody>
            <tr ng-repeat="rc in RACauhoi |FMT:Capdo:'Capdo' | orderBy:propertyName:reverse | filter:timkiem |limitTo:limit:from | dateNgaytao:Ngaytao.from:Ngaytao.to" ng-class="isedit==rc.id?'bg-primary text-white':''">
              <td style="width: 10%;"><div class="dropdown position-static my-auto">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown">
                    <div class="d-flex justify-content-center flex-column">{{$index+1}} <i class="fas fa-ellipsis-h my-auto"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2" ng-click="editCauhoi(rc)" data-bs-toggle="modal" data-bs-target="#CRUDCauhoi"><i class="fas fa-edit text-info"></i> Sửa</li>
                    <li class="p-2" ng-click="copyCauhoi(rc)" data-bs-toggle="modal" data-bs-target="#CRUDCauhoi"><i class="far fa-copy text-primary"></i> Sao Chép</li>
                    <li class="p-2" data-bs-toggle="modal" data-bs-target="#XoaHang" ng-click="removeCauhoi(rc)" ng-if="Quyen.pq14"><i class="fas fa-trash-alt text-danger"></i> Xóa</li>
                  </ul>
                </div></td>
              <td ng-show="tieude.td1" style="width: 15%;">{{rc.idRoot|FTenchude:RChude}}</td>
              <td ng-show="tieude.td2" style="width: 20%;">{{rc.idTL|FTailieu:TailieuGoc}}</td>
              <td ng-show="tieude.td3" style="width: 10%;" data-bs-toggle="modal" data-bs-target="#DemoCauhoi" ng-click="DemoCauhoi(rc)">{{rc.MaCH}} <i class="fas fa-eye me-2 my-auto"></i></td>
              <td ng-show="tieude.td4" style="width: 20%;"><div class="ellipsis" ng-bind-html="rc.Cauhoi"></div>
                </td>
              <td ng-show="tieude.td5" style="width: 20%;" align="left">
                  <div class="ellipsis"><span class="ms-2" ng-repeat="tl in rc.Traloi">{{$index+1|FABC}}. {{tl.value}}</span></div>
                </td>
              <td ng-show="tieude.td6" style="width: 20%;">
              <div class="ellipsis">  <div ng-if="rc.Dapan.type==1">
                  <div ng-bind-html="rc.Dapan.data"></div>
                </div>
                <div ng-if="rc.Dapan.type==0">
                  <div>{{rc.Dapan.data.value}}</div>
                </div> </div> 
                </td>
              <td ng-show="tieude.td7" style="width: 10%;">{{rc.Capdo|Ftitle:ListCapdo}}</td>
              <td ng-show="tieude.td8" style="width: 10%;"><div class="btn-group position-static"> <span class="{{rc.Trangthai|FMaunen:TTDuyet}} {{rc.Trangthai|FMauchu:TTDuyet}} p-1 rounded" data-bs-toggle="dropdown" data-bs-auto-close="outside">{{rc.Trangthai|Ftitle:TTDuyet}}</span>
                  <ul class="dropdown-menu" ng-show="         
         {{<?php echo $this->idUser; ?>|Fduyet:rc.idDuyet}}">
                    <li ng-repeat="s1 in TTDuyet" ng-click="UpdateTTDuyetCH(rc.id,s1.id)">
                      <div class="dropdown-item"><span class="{{s1.id|FMaunen:TTDuyet}} {{s1.id|FMauchu:TTDuyet}} p-1 rounded">{{s1.Thuoctinh}}</span></div>
                    </li>
                  </ul>
                </div></td>
              <td ng-show="tieude.td9" style="width: 10%;"><div class="btn-group position-static"> <span data-bs-toggle="dropdown" data-bs-auto-close="outside"><i class="fas fa-user-circle"></i></span>
                  <ul class="dropdown-menu">
                    <li><span class="dropdown-item text-danger">{{rc.idTao|Fname:RListNV}}</span></li>
                  </ul>
                </div></td>
              <td ng-show="tieude.td10" style="width: 10%;">
                <div class="btn-group position-static" ng-if="rc.idDuyet"> 
                    <span data-bs-toggle="dropdown" data-bs-auto-close="outside"><i class="fas fa-user-circle"></i></span>
                  <ul class="dropdown-menu">
                    <li><span class="dropdown-item text-danger" ng-repeat="d in rc.idDuyet">{{d|Fname:RListNV}}</span></li>
                  </ul>
                </div></td>
              <td ng-show="tieude.td11" style="width: 10%;">{{rc.Ngaytao | date:'HH:mm'}} {{rc.Ngaytao | date:'dd/MM/yy'}}</td>
              <td ng-show="tieude.td12" style="width: 20%;"><div ng-bind-html="rc.Ghichu"></div></td>
              <td ng-show="tieude.td13" style="width: 20%;">
                  <div ng-if="rc.Tags.length!=0"><span ng-repeat="x in rc.Tags" class="badge bg-info">{{x|Ftitle:ListTags}}</span>
                  </div>
                </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

