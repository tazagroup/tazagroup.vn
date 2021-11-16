<div class="row position-relative">
 <div class="overflow-scroll">
  <div class="d-flex">
   <div class="table mt-3 ghichu">
    <table class="table dauviec table-centered table-nowrap mb-0 rounded text-center table-bordered table-hover">
     <thead class="thead-light">
      <tr>
       <th style="width: 10%;">
        <div class="d-flex justify-content-center">
         <div class="px-2 my-auto dropdown position-static">
          <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
           <div>
            <h6><i class="fas fa-sliders-h"></i></h6>
           </div>
          </div>
          <ul class="dropdown-menu">
           <li class="p-2">
            <div class="form-check form-switch">
             Chủ Đề
             <input class="form-check-input" type="checkbox" ng-model="tieude.td1" checked />
            </div>
           </li>
           <li class="p-2">
            <div class="form-check form-switch">
             Mã Tài Liệu
             <input class="form-check-input" type="checkbox" ng-model="tieude.td2" checked />
            </div>
           </li>
           <li class="p-2">
            <div class="form-check form-switch">
             Tài Liệu
             <input class="form-check-input" type="checkbox" ng-model="tieude.td3" checked />
            </div>
           </li>
           <li class="p-2">
            <div class="form-check form-switch">
             Nội dung
             <input class="form-check-input" type="checkbox" ng-model="tieude.td4" checked />
            </div>
           </li>
           <li class="p-2">
            <div class="form-check form-switch">
             Tác Giả
             <input class="form-check-input" type="checkbox" ng-model="tieude.td5" checked />
            </div>
           </li>
           <li class="p-2">
            <div class="form-check form-switch">
             Ngày Hiệu Lực
             <input class="form-check-input" type="checkbox" ng-model="tieude.td6" checked />
            </div>
           </li>
           <li class="p-2">
            <div class="form-check form-switch">
             Trạng Thái
             <input class="form-check-input" type="checkbox" ng-model="tieude.td7" checked />
            </div>
           </li>
           <li class="p-2">
            <div class="form-check form-switch">
             Người Duyệt
             <input class="form-check-input" type="checkbox" ng-model="tieude.td8" checked />
            </div>
           </li>
           <li class="p-2">
            <div class="form-check form-switch">
             Ghi Chú
             <input class="form-check-input" type="checkbox" ng-model="tieude.td9" checked />
            </div>
           </li>
           <li class="p-2">
            <div class="btn btn-primary" ng-click="LuuAnhien(tieude)">Lưu</div>
           </li>
          </ul>
         </div>
         <div>
          <h6><i class="fas fa-plus-circle" ng-click="addDethi()" data-bs-toggle="modal" data-bs-target="#CRUDDethi"></i></h6>
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
                          <select chosen class="form-control text-danger" ng-model="timkiem.idChude" ng-options="s.idChude as s.idChude|FCustom:'Tenchude':RChude for s in (Dethigoc|unique:'idChude')">
                           
                          </select>
                          <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('idChude')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('idChude')"> <i class="fas fa-sort-down"></i> </span> </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </th>
-->
    <th ng-show="tieude.td1" style="width: 10%;"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center flex-column">Tài Liệu Nguồn <i class="fas fa-ellipsis-h"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="mb-3">
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
     
                          <select chosen class="form-control text-danger" ng-model="timkiem.idTLN" ng-options="s.idTLN as s.idTLN|FCustom:'Tentailieu':RATailieu for s in (Dethigoc|unique:'idTLN')">
                                      <option value="" selected>Vui lòng chọn</option>   
                          </select>
                          <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('idChude')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('idChude')"> <i class="fas fa-sort-down"></i> </span> </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </th>      
       <th ng-show="tieude.td2" style="width: 10%;">
        <div class="dropdown position-static">
         <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
          <div class="d-flex justify-content-center flex-column">Mã Đề Thi <i class="fas fa-ellipsis-h"></i></div>
         </div>
            
            
         <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="mb-3">
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                        <select chosen class="form-control text-danger" ng-model="timkiem.ordering" ng-options="s.ordering as 'Đề Thi Số '+s.ordering for s in (Dethigoc|unique:'ordering')">
                         
                        </select> 
                          <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('ordering')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('ordering')"> <i class="fas fa-sort-down"></i> </span> </div>
                      </div>
                    </li>
                  </ul>
        </div>
       </th>
       <th ng-show="tieude.td2" style="width: 10%;">
                <div class="d-flex justify-content-center flex-column">Câu hỏi</div>
       </th>
       <th ng-show="tieude.td7" style="width: 10%;">
        <div class="dropdown position-static">
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
       <th ng-show="tieude.td6" style="width: 10%;">
        <div class="dropdown position-static">
         <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
          <div class="d-flex justify-content-center flex-column" ng-click="ResetDethi()">Người Tạo <i class="fas fa-ellipsis-h"></i></div>
         </div>
         <ul class="dropdown-menu">
          <li class="p-2">
           <div class="mb-3">
     <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                          <select chosen class="form-control text-danger" ng-model="timkiem.idTao" ng-options="s.idTao as s.idTao|Fname:RListNV for s in (Dethigoc|unique:'idTao')">
                           
                          </select>
                          <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('idTao')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('idTao')"> <i class="fas fa-sort-down"></i> </span> </div>
            
           </div>
          </li>
         </ul>
        </div>
       </th>
       <th ng-show="tieude.td8" style="width: 10%;">
        <div class="dropdown position-static">
         <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
          <div class="d-flex justify-content-center flex-column" ng-click="ResetDethi()">Người Duyệt <i class="fas fa-ellipsis-h"></i></div>
         </div>
         <ul class="dropdown-menu">
          <li class="p-2">
           <div class="mb-3">
            <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                
    
                          <select multiple chosen class="form-control text-danger" ng-model="Nguoiduyet" ng-options="s.idDuyet as s.idDuyet|FCustom:'name':RListNV for s in (Dethigoc|unique:'idDuyet')">
                           
                          </select>
                          <span class="input-group-text" ng-click="Nguoiduyet={}"> <i class="fas fa-sync-alt"></i> </span> <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Nguoiduyet')"> <i class="fas fa-sort-up"></i> </span> <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Nguoiduyet')"> <i class="fas fa-sort-down"></i> </span> </div>
           </div>
          </li>
         </ul>
        </div>
       </th>
       <th ng-show="tieude.td8" style="width: 10%;">
        <div class="dropdown position-static">
         <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
          <div class="d-flex justify-content-center flex-column">Ngày Tạo <i class="fas fa-ellipsis-h"></i></div>
         </div>
         <ul class="dropdown-menu">
       <li class="p-2">
        <div class="mb-3">
         <div class="input-group">
          <span class="input-group-text"> Từ </span>
          <input type="date" class="form-control text-danger" ng-model="timkiem.from" />
          <span class="input-group-text" ng-click="timkiem={}"> <i class="fas fa-sync-alt"></i> </span>    
         </div>
        </div>
        <div class="mb-3">
         <div class="input-group">
          <span class="input-group-text"> Đến </span>
          <input type="date" class="form-control text-danger" ng-model="timkiem.to" />
          <span ng-if="sortflag" class="input-group-text" ng-click="sortBy('Ngaytao')"> <i class="fas fa-sort-up"></i> </span>
 <span ng-if="!sortflag" class="input-group-text" ng-click="sortBy('Ngaytao')"> <i class="fas fa-sort-down"></i> </span>    
         </div>
        </div>
       </li>
      </ul>
        </div>
       </th>
       <th ng-show="tieude.td9" style="width: 20%;">
        <div class="dropdown position-static">
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
<!--
      <tr ng-if="Dethi.CRUD!=0">
       <td style="width: 10%;">
        <div class="d-flex justify-content-center" ng-show="Dethi.CRUD!=0">
         <h6 class="me-2"><i ng-show="Dethi.CRUD==1" class="fas fa-save text-info" ng-click="CreateDethi(Dethi)"></i></h6>
         <h6 class="me-2"><i ng-show="Dethi.CRUD==2" class="fas fa-edit text-info" ng-click="UpdateDethi(Dethi)"></i></h6>
         <h6 class="me-2"><i class="fas fa-minus-circle text-danger" ng-click="resetDethi()"></i></h6>
        </div>
       </td>
       <td ng-show="tieude.td1" style="width: 20%;">
        <div class="dropdown position-static">
         <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
          <div class="border-primary border-dotted rounded-1 mh-2 p-2">
           <p>{{Dethi.idChude|FTenchude:RChude}}</p>
          </div>
         </div>
         <ul class="dropdown-menu">
          <li class="p-2">
           <div class="input-group">
            <span class="input-group-text">Chủ Đề</span>
            <select chosen class="form-control text-danger" ng-model="Dethi.idChude" ng-options="s.id as s.Tenchude for s in RFChude">
            
            </select>
           </div>
          </li>
         </ul>
        </div>
       </td>
       <td ng-show="tieude.td2" style="width: 10%;"><div class="border-primary border-dotted rounded-1 mh-2 p-2">{{Dethi.MaDT}}</div></td>
       <td ng-show="tieude.td2" style="width: 20%;">
        <div class="d-flex">
         <div class="input-group justify-content-center" data-bs-toggle="modal" data-bs-target="#cauhoitodethi">
          <span class="input-group-text"><span class="badge bg-primary me-2">{{Dethi.idCH.length||'0'}}</span> Câu hỏi </span>
         </div>
        </div>
       </td>
       <td ng-show="tieude.td6" style="width: 10%;"></td>
       <td ng-show="tieude.td7" style="width: 10%;"></td>
       <td ng-show="tieude.td8" style="width: 10%;">
        <div class="dropdown position-static">
         <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
          <div class="border-primary border-dotted rounded-1 mh-2 p-2">
           <span class="ms-2" ng-repeat="id in Dethi.idDuyet"> <i class="fas fa-user-circle"></i></span>
          </div>
         </div>
         <ul class="dropdown-menu">
          <li class="p-2">
           <div class="input-group">
            <span class="input-group-text"> Người Duyệt </span>
            <select chosen multiple class="form-control text-danger" ng-model="Dethi.idDuyet" ng-options="s.id as s.name for s in (RListNV|FKiemduyet:NhomDuyet)">
            
            </select>
           </div>
          </li>
         </ul>
        </div>
       </td>
       <td ng-show="tieude.td9" style="width: 10%;"></td>
       <td ng-show="tieude.td9" style="width: 20%;">
        <div class="dropdown position-static">
         <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
          <div class="border-primary border-dotted rounded-1 mh-2 p-2" ng-bind-html="Dethi.Ghichu"></div>
         </div>
         <ul class="dropdown-menu">
          <li class="p-2">
           Ghi Chú
           <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Dethi.Ghichu" class="form-control text-danger"></textarea>
          </li>
         </ul>
        </div>
       </td>
      </tr>
-->
     </thead>
     <tbody>
      <tr ng-repeat="rd in RADethi |FMT:Trangthai:'Trangthai'|FMT:Nguoiduyet:'idDuyet' | filter:timkiem| orderBy:propertyName:reverse">
       <td style="width: 10%;">
        <div class="dropdown position-static my-auto">
         <div class="dropdown-toggle" data-bs-toggle="dropdown">
          <div class="d-flex justify-content-center flex-column">{{$index+1}} <i class="fas fa-ellipsis-h my-auto"></i></div>
         </div>
         <ul class="dropdown-menu">
          <li class="p-2" ng-click="editDethi(rd)" data-bs-toggle="modal" data-bs-target="#CRUDDethi"><i class="fas fa-edit text-info"></i> Sửa</li>
          <!--                    <li class="p-2" ng-click="copyCauhoi(rc)"><i class="far fa-copy text-primary"></i> Sao Chép</li>-->
          <li class="p-2" data-bs-toggle="modal" data-bs-target="#XoaHang" ng-click="removeDethi(rd)" ng-if="Quyen.pq14"><i class="fas fa-trash-alt text-danger"></i> Xóa</li>
         </ul>
        </div>
       </td>
<!--       <td ng-show="tieude.td1" style="width: 10%;">{{rd.idChude|FTenchude:RChude}}</td>-->
       <td ng-show="tieude.td1" style="width: 10%;">{{rd.idTLN|FCustom:'Tentailieu':RATailieu}}</td>
       <td ng-show="tieude.td1" style="width: 10%;">Đề Thi Số {{rd.ordering}}</td>
       <td ng-show="tieude.td2" style="width: 10%;">
        <div class="input-group justify-content-center" data-bs-toggle="modal" data-bs-target="#cauhoiindethi" ng-click="ShowCauhoi(rd)">
         <span class="input-group-text"><span class="badge bg-primary me-2">{{rd.idCH.length}}</span> Câu hỏi </span>
        </div>
       </td>
       <td ng-show="tieude.td1" style="width: 10%;">
        <div class="btn-group position-static">
         <span class="{{rd.Trangthai|FMaunen:TTDuyet}} {{rd.Trangthai|FMauchu:TTDuyet}} p-1 rounded" data-bs-toggle="dropdown" data-bs-auto-close="outside">{{rd.Trangthai|Ftitle:TTDuyet}}</span>
         <ul class="dropdown-menu" ng-show="         
         {{<?php echo $this->idUser; ?>|Fduyet:rd.idDuyet}}">
          <li ng-repeat="s1 in TTDuyet" ng-click="UpdateTTDuyetDT(rd.id,s1.id)">
           <div class="dropdown-item"><span class="{{s1.id|FMaunen:TTDuyet}} {{s1.id|FMauchu:TTDuyet}} p-1 rounded">{{s1.Thuoctinh}}</span></div>
          </li>
         </ul>
        </div>
       </td>
       <td ng-show="tieude.td6" style="width: 10%;">
        <div class="btn-group position-static">
         <span data-bs-toggle="dropdown" data-bs-auto-close="outside"><i class="fas fa-user-circle"></i></span>
         <ul class="dropdown-menu">
          <li><span class="dropdown-item text-danger">{{rd.idTao|Fname:RListNV}}</span></li>
         </ul>
        </div>
       </td>
       <td ng-show="tieude.td7" style="width: 10%;">
        <div class="btn-group position-static" ng-if="rd.idDuyet.length!=0">
         <span data-bs-toggle="dropdown" data-bs-auto-close="outside"><i class="fas fa-user-circle"></i></span>
         <ul class="dropdown-menu">
          <li><span class="dropdown-item text-danger" ng-repeat="d in rd.idDuyet">{{d|Fname:RListNV}}</span></li>
         </ul>
        </div>
       </td>
       <td ng-show="tieude.td1" style="width: 10%;">{{rd.Ngaytao | date:'HH:mm'}} {{rd.Ngaytao | date:'dd/MM/yy'}}</td>
       <td ng-show="tieude.td1" style="width: 20%;"><div ng-bind-html="rd.Ghichu"></div></td>
      </tr>
     </tbody>
    </table>
   </div>
  </div>
 </div>
</div>

