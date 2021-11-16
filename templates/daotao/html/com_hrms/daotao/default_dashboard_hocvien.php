<div class="row p-5">
<ul class="nav nav-pills nav-fill mb-3">
  <li class="nav-item">
    <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#menu1">Lớp Học Của Tôi</button>
  </li>  
 <li class="nav-item">
    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#menu2">Kỳ Thi Của Tôi</button>
  </li> 
<li class="nav-item">
    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#menu3">Lộ Trình Học Tập</button>
  </li>
    <li class="nav-item">
    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#menu4">Thành Tích Học Tập</button>
  </li>

</ul>
<div class="tab-content">
  <div class="tab-pane fade show active" id="menu1" ng-init="FlatHSLH=0">
      <div class="input-group">
          <span class="input-group-text" ng-click="FlatHSLH=1" ng-class="FlatHSLH==1?'bg-primary text-white':''"><i class="fas fa-table"></i> </span> 
          <span class="input-group-text listviewHSLH" ng-click="FlatHSLH=0" ng-class="FlatHSLH==0?'bg-primary text-white':''"><i class="fas fa-calendar-alt"></i> </span> 
      </div>
      
      <div ng-show="FlatHSLH==1">
        <div class="row position-relative">
      <div class="overflow-scroll">
       <div class="d-flex">
        <div class="table mt-3 ghichu">
         <table class="table table-centered table-nowrap mb-0 rounded text-center table-bordered table-hover">
          <thead class="thead-light">
           <tr>
            <th style="width: 10%;">
             <div class="d-flex">
              <div class="px-2 m-auto dropdown position-static">
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
               <h6><i class="fas fa-plus-ciitemle" ng-click="addCauhoi()"></i></h6>
              </div>
             </div>
            </th>
            <th ng-show="tieude.td1" style="width: 30%;">
             <div class="dropdown position-static">
              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
               <div class="d-flex justify-content-center flex-column">Tên Bài Học <i class="fas fa-ellipsis-h"></i></div>
              </div>
              <ul class="dropdown-menu">
               <li class="p-2">
                <div class="mb-3">
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-seaitemh"></i> </span>
                  <input ng-model="timkiem" type="text" class="form-control col-12" placeholder="Tìm Kiếm" />
                 </div>
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-up-alt"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Tăng Dần" />
                 </div>
                 <div class="input-group">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-down"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Giảm Dần" />
                 </div>
                </div>
               </li>
              </ul>
             </div>
            </th>
            <th ng-show="tieude.td2" style="width: 10%;">
             <div class="dropdown position-static">
              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
               <div class="d-flex justify-content-center flex-column">Bắt Đầu <i class="fas fa-ellipsis-h"></i></div>
              </div>
              <ul class="dropdown-menu">
               <li class="p-2">
                <div class="mb-3">
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-seaitemh"></i> </span>
                  <input ng-model="timkiem" type="text" class="form-control col-12" placeholder="Tìm Kiếm" />
                 </div>
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-up-alt"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Tăng Dần" />
                 </div>
                 <div class="input-group">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-down"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Giảm Dần" />
                 </div>
                </div>
               </li>
              </ul>
             </div>
            </th>
            <th ng-show="tieude.td3" style="width: 10%;">
             <div class="dropdown position-static">
              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
               <div class="d-flex justify-content-center flex-column">Kết Thúc <i class="fas fa-ellipsis-h"></i></div>
              </div>
              <ul class="dropdown-menu">
               <li class="p-2">
                <div class="mb-3">
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-seaitemh"></i> </span>
                  <input ng-model="timkiem" type="text" class="form-control col-12" placeholder="Tìm Kiếm" />
                 </div>
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-up-alt"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Tăng Dần" />
                 </div>
                 <div class="input-group">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-down"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Giảm Dần" />
                 </div>
                </div>
               </li>
              </ul>
             </div>
            </th>
            <th ng-show="tieude.td4" style="width: 10%;">
             <div class="dropdown position-static">
              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
               <div class="d-flex justify-content-center flex-column">Giảng Viên <i class="fas fa-ellipsis-h"></i></div>
              </div>
              <ul class="dropdown-menu">
               <li class="p-2">
                <div class="mb-3">
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-seaitemh"></i> </span>
                  <input ng-model="timkiem.Ghichu" type="text" class="form-control col-12" placeholder="Tìm Kiếm" />
                  <div class="input-group mb-2">
                   <span class="input-group-text"> <i class="fas fa-seaitemh"></i> </span>
                   <input ng-model="timkiem.Ghichu" type="text" class="form-control col-12" placeholder="Tìm Kiếm" />
                  </div>
                 </div>
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-up-alt"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Tăng Dần" />
                 </div>
                 <div class="input-group">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-down"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Giảm Dần" />
                 </div>
                </div>
               </li>
              </ul>
             </div>
            </th>
            <th ng-show="tieude.td7" style="width: 10%;">
             <div class="dropdown position-static">
              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
               <div class="d-flex justify-content-center flex-column">Trạng Thái <i class="fas fa-ellipsis-h"></i></div>
              </div>
              <ul class="dropdown-menu">
               <li class="p-2">
                <div class="mb-3">
                 <div class="input-group mb-2" ng-click="timkiem={}">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-up-alt"></i> </span>
                 </div>
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-seaitemh"></i> </span>
                  <select chosen multiple class="form-control text-danger" ng-model="timkiem.Trangthai" ng-options="s.id as s.Thuoctinh for s in TTDuyet">
                   <option value="" selected>Vui lòng chọn</option>
                  </select>
                 </div>
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-up-alt"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Tăng Dần" />
                 </div>
                 <div class="input-group">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-down"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Giảm Dần" />
                 </div>
                </div>
               </li>
              </ul>
             </div>
            </th>
           </tr>
          </thead>
          <tbody>
           <tr ng-repeat="item in RLHSLH">
            <td style="width: 10%;">
             <div class="dropdown position-static my-auto">
              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
               <div class="d-flex justify-content-center flex-column">{{$index+1}} <i class="fas fa-ellipsis-h my-auto"></i></div>
              </div>
              <ul class="dropdown-menu">
               <li class="p-2" ng-click="editCauhoi(item)"><i class="fas fa-edit text-info"></i> Sửa</li>
               <li class="p-2" data-bs-toggle="modal" data-bs-target="#XoaHang" ng-click="editCauhoi(item)" ng-if="Quyen.pq14"><i class="fas fa-trash-alt text-danger"></i> Xóa</li>
              </ul>
             </div>
            </td>
            <td ng-show="tieude.td1" style="width: 30%;">{{item.Baihoc.Tenbaihoc}}</td>
            <td ng-show="tieude.td2" style="width: 10%;">
                    {{item.Batdau | date:'HH:mm'}} <br>
     {{item.Batdau | date:'dd/MM/yy'}}
               </td>
            <td ng-show="tieude.td3" style="width: 10%;">
                     {{item.Ketthuc | date:'HH:mm'}} <br>
     {{item.Ketthuc | date:'dd/MM/yy'}}
               </td>
            <td ng-show="tieude.td4" style="width: 10%;">
              <div class="btn-group position-static">
      <span ng-repeat="x in item.idGV | limitTo:1:0" data-bs-toggle="dropdown" data-bs-auto-close="outside"><i class="fas fa-user-circle"></i></span> <span ng-show="item.idGV.length >1"> + {{item.idGV.length-1}}</span>
      <ul class="dropdown-menu">
       <li><span class="dropdown-item" ng-repeat="x in item.idGV">{{x.id | Fname:RListNV}}</span></li>
      </ul>
     </div> 
</td>
            <td ng-show="tieude.td4" style="width: 10%;"> {{item.Trangthai}}</td>
           </tr>
          </tbody>
         </table>
        </div>
       </div>
      </div>
     </div>  
      </div>
     <div  ng-show="FlatHSLH==0"> <div id="HSLophoc" class="d-block"></div>
      </div>
      <div class="row">
          <div class="modal fade" id="HosoLophoc" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Tên Lớp Học : {{HosoLophoc.Tenlop}}</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row p-3">
                    <div class="mb-3">
                      <div class="input-group"> <span class="input-group-text">Tên Bài Học </span> <span class="form-control text-info font-weight-bold"> {{HosoLophoc.Baihoc.Tenbaihoc}} </span> </div>
                    </div>
                    <div class="mb-3">
                      <div class="input-group"> <span class="input-group-text">Thời Gian Học Từ : </span> <span class="form-control text-info font-weight-bold"> {{HosoLophoc.Batdau|date:'HH:mm:ss'}} </span> <span class="input-group-text">Đến : </span> <span class="form-control text-info font-weight-bold"> {{HosoLophoc.Ketthuc|date:'HH:mm:ss'}} </span> <span class="input-group-text text-danger"><a href="dao-tao-lop-hoc-chi-tiet#{{HosoLophoc.MaLop}}">Vào Lớp</a></span></div>
                    </div>
                    <div class="mb-3" ng-repeat="gv in HosoLophoc.idGV">
                      <div class="input-group"> <span class="input-group-text">Giảng Viên {{$index+1}} </span>
          <span class="form-control text-info font-weight-bold"> {{gv.id|Fname:RListNV}} </span>        
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
              </div>
            </div>
          </div>
      </div>
      
      
    </div>
  <div class="tab-pane fade" id="menu2" ng-init="FlatHSKT=0">
 <div class="input-group">
          <span class="input-group-text" ng-click="FlatHSKT=1" ng-class="FlatHSKT==1?'bg-primary text-white':''"><i class="fas fa-table"></i> </span> 
          <span class="input-group-text listviewHSLH" ng-click="FlatHSKT=0" ng-class="FlatHSKT==0?'bg-primary text-white':''"><i class="fas fa-calendar-alt"></i> </span> 
      </div>     
  <div class="row position-relative" ng-show="FlatHSKT==1">
      <div class="overflow-scroll">
       <div class="d-flex">
        <div class="table mt-3 ghichu">
         <table class="table table-centered table-nowrap mb-0 rounded text-center table-bordered table-hover">
          <thead class="thead-light">
           <tr>
            <th style="width: 10%;">
             <div class="d-flex">
              <div class="px-2 m-auto dropdown position-static">
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
               <h6><i class="fas fa-plus-ciitemle" ng-click="addCauhoi()"></i></h6>
              </div>
             </div>
            </th>
            <th ng-show="tieude.td1" style="width: 30%;">
             <div class="dropdown position-static">
              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
               <div class="d-flex justify-content-center flex-column">Tên Kỳ Thi <i class="fas fa-ellipsis-h"></i></div>
              </div>
              <ul class="dropdown-menu">
               <li class="p-2">
                <div class="mb-3">
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-seaitemh"></i> </span>
                  <input ng-model="timkiem" type="text" class="form-control col-12" placeholder="Tìm Kiếm" />
                 </div>
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-up-alt"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Tăng Dần" />
                 </div>
                 <div class="input-group">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-down"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Giảm Dần" />
                 </div>
                </div>
               </li>
              </ul>
             </div>
            </th>
       <th ng-show="tieude.td2" style="width: 10%;">
             <div class="dropdown position-static">
              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
               <div class="d-flex justify-content-center flex-column">Loại Kỳ Thi <i class="fas fa-ellipsis-h"></i></div>
              </div>
              <ul class="dropdown-menu">
               <li class="p-2">
                <div class="mb-3">
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-seaitemh"></i> </span>
                  <input ng-model="timkiem" type="text" class="form-control col-12" placeholder="Tìm Kiếm" />
                 </div>
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-up-alt"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Tăng Dần" />
                 </div>
                 <div class="input-group">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-down"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Giảm Dần" />
                 </div>
                </div>
               </li>
              </ul>
             </div>
            </th> 
    <th ng-show="tieude.td2" style="width: 10%;">
             <div class="dropdown position-static">
              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
               <div class="d-flex justify-content-center flex-column">Hình Thức Thi <i class="fas fa-ellipsis-h"></i></div>
              </div>
              <ul class="dropdown-menu">
               <li class="p-2">
                <div class="mb-3">
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-seaitemh"></i> </span>
                  <input ng-model="timkiem" type="text" class="form-control col-12" placeholder="Tìm Kiếm" />
                 </div>
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-up-alt"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Tăng Dần" />
                 </div>
                 <div class="input-group">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-down"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Giảm Dần" />
                 </div>
                </div>
               </li>
              </ul>
             </div>
            </th>          
               
            <th ng-show="tieude.td2" style="width: 10%;">
             <div class="dropdown position-static">
              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
               <div class="d-flex justify-content-center flex-column">Bắt Đầu <i class="fas fa-ellipsis-h"></i></div>
              </div>
              <ul class="dropdown-menu">
               <li class="p-2">
                <div class="mb-3">
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-seaitemh"></i> </span>
                  <input ng-model="timkiem" type="text" class="form-control col-12" placeholder="Tìm Kiếm" />
                 </div>
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-up-alt"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Tăng Dần" />
                 </div>
                 <div class="input-group">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-down"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Giảm Dần" />
                 </div>
                </div>
               </li>
              </ul>
             </div>
            </th>
            <th ng-show="tieude.td3" style="width: 10%;">
             <div class="dropdown position-static">
              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
               <div class="d-flex justify-content-center flex-column">Kết Thúc <i class="fas fa-ellipsis-h"></i></div>
              </div>
              <ul class="dropdown-menu">
               <li class="p-2">
                <div class="mb-3">
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-seaitemh"></i> </span>
                  <input ng-model="timkiem" type="text" class="form-control col-12" placeholder="Tìm Kiếm" />
                 </div>
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-up-alt"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Tăng Dần" />
                 </div>
                 <div class="input-group">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-down"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Giảm Dần" />
                 </div>
                </div>
               </li>
              </ul>
             </div>
            </th>
            <th ng-show="tieude.td4" style="width: 10%;">
             <div class="dropdown position-static">
              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
               <div class="d-flex justify-content-center flex-column">Trạng Thái <i class="fas fa-ellipsis-h"></i></div>
              </div>
              <ul class="dropdown-menu">
               <li class="p-2">
                <div class="mb-3">
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-seaitemh"></i> </span>
                  <input ng-model="timkiem.Ghichu" type="text" class="form-control col-12" placeholder="Tìm Kiếm" />
                  <div class="input-group mb-2">
                   <span class="input-group-text"> <i class="fas fa-seaitemh"></i> </span>
                   <input ng-model="timkiem.Ghichu" type="text" class="form-control col-12" placeholder="Tìm Kiếm" />
                  </div>
                 </div>
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-up-alt"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Tăng Dần" />
                 </div>
                 <div class="input-group">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-down"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Giảm Dần" />
                 </div>
                </div>
               </li>
              </ul>
             </div>
            </th>
           </tr>
          </thead>
          <tbody>
           <tr ng-repeat="item in RLHSKT">
            <td style="width: 10%;">
             <div class="dropdown position-static my-auto">
              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
               <div class="d-flex justify-content-center flex-column">{{$index+1}} <i class="fas fa-ellipsis-h my-auto"></i></div>
              </div>
              <ul class="dropdown-menu">
               <li class="p-2" ng-click="editCauhoi(item)"><i class="fas fa-edit text-info"></i> Sửa</li>
               <li class="p-2" data-bs-toggle="modal" data-bs-target="#XoaHang" ng-click="editCauhoi(item)" ng-if="Quyen.pq14"><i class="fas fa-trash-alt text-danger"></i> Xóa</li>
              </ul>
             </div>
            </td>
            <td ng-show="tieude.td1" style="width: 30%;">{{item.Tenkythi}}</td>
            <td ng-show="tieude.td1" style="width: 30%;">{{item.Loaithi|FCustom:'Thuoctinh':ListLoaiKythi}}</td>
            <td ng-show="tieude.td1" style="width: 30%;">{{item.Hinhthuc|FCustom:'Title':ListHinhthuc}}</td>
            <td ng-show="tieude.td2" style="width: 10%;">
                    {{item.Batdau | date:'HH:mm'}} <br>
     {{item.Batdau | date:'dd/MM/yy'}}
               </td>
            <td ng-show="tieude.td3" style="width: 10%;">
                     {{item.Ketthuc | date:'HH:mm'}} <br>
     {{item.Ketthuc | date:'dd/MM/yy'}}
               </td>
            <td ng-show="tieude.td4" style="width: 10%;"> {{item.Trangthai}}</td>
           </tr>
          </tbody>
         </table>
        </div>
       </div>
      </div>
     </div>    
      
      <div id="HSKythi" ng-show="FlatHSKT==0" class="d-block"></div>
      <div class="row">
          <div class="modal fade" id="HosoKythi" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tên Kỳ Thi : {{HosoKythi.Tenkythi}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row p-3">
            <div class="mb-3">
              <div class="input-group"> <span class="input-group-text">Đề Thi </span> <span class="form-control text-info font-weight-bold"> {{HosoKythi.Dethi.Tendethi}}</span> </div>
            </div>
               <div class="mb-3">
              <div class="input-group"> <span class="input-group-text">Loại Hình Thi </span> <span class="form-control text-info font-weight-bold"> {{HosoKythi.Loaithi|FCustom:'Thuoctinh':ListLoaiKythi}}</span> </div>
            </div>    
           <div class="mb-3">
              <div class="input-group"> <span class="input-group-text">Hình Thức Thi </span> <span class="form-control text-info font-weight-bold"> {{HosoKythi.Hinhthuc|FCustom:'Title':ListHinhthuc}}</span> </div>
            </div>              
            <div class="mb-3">
              <div class="input-group"> <span class="input-group-text">Thời Gian Thi Từ : </span> <span class="form-control text-info font-weight-bold"> {{HosoKythi.Batdau|date:'HH:mm:ss'}} </span> <span class="input-group-text">Đến : </span> <span class="form-control text-info font-weight-bold"> {{HosoKythi.Ketthuc|date:'HH:mm:ss'}} </span></div>
            </div>
            <div class="mb-3" ng-repeat="gv in HosoKythi.idGV">
              <div class="input-group"> <span class="input-group-text">Giảng Viên {{$index+1}} </span>
  <span class="form-control text-info font-weight-bold"> {{gv.id|Fname:RListNV}} </span>        
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
  </div>
      </div></div>
  <div class="tab-pane fade" id="menu3">
      
<div class="overflow-scroll">
       <div class="d-flex">
        <div class="table mt-3 ghichu">
         <table class="table table-centered table-nowrap mb-0 rounded text-center table-bordered table-hover">
          <thead class="thead-light">
           <tr>
               <th ng-show="tieude.td1" style="width: 10%;">
             <div class="dropdown position-static">
              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
               <div class="d-flex justify-content-center flex-column"># <i class="fas fa-ellipsis-h"></i></div>
              </div>
              <ul class="dropdown-menu">
               <li class="p-2">
                <div class="mb-3">
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                  <input ng-model="timkiem" type="text" class="form-control col-12" placeholder="Tìm Kiếm" />
                 </div>
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-up-alt"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Tăng Dần" />
                 </div>
                 <div class="input-group">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-down"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Giảm Dần" />
                 </div>
                </div>
               </li>
              </ul>
             </div>
            </th>            
            <th ng-show="tieude.td1" style="width: 30%;">
             <div class="dropdown position-static">
              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
               <div class="d-flex justify-content-center flex-column">Lộ Trình Học <i class="fas fa-ellipsis-h"></i></div>
              </div>
              <ul class="dropdown-menu">
               <li class="p-2">
                <div class="mb-3">
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                  <input ng-model="timkiem" type="text" class="form-control col-12" placeholder="Tìm Kiếm" />
                 </div>
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-up-alt"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Tăng Dần" />
                 </div>
                 <div class="input-group">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-down"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Giảm Dần" />
                 </div>
                </div>
               </li>
              </ul>
             </div>
            </th>
            <th ng-show="tieude.td2" style="width: 20%;">
             <div class="dropdown position-static">
              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
               <div class="d-flex justify-content-center flex-column">Thực Tế <i class="fas fa-ellipsis-h"></i></div>
              </div>
              <ul class="dropdown-menu">
               <li class="p-2">
                <div class="mb-3">
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                  <input ng-model="timkiem" type="text" class="form-control col-12" placeholder="Tìm Kiếm" />
                 </div>
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-up-alt"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Tăng Dần" />
                 </div>
                 <div class="input-group">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-down"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Giảm Dần" />
                 </div>
                </div>
               </li>
              </ul>
             </div>
            </th>
    <th ng-show="tieude.td2" style="width: 10%;">
             <div class="dropdown position-static">
              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
               <div class="d-flex justify-content-center flex-column">Ngày bắt Đầu<i class="fas fa-ellipsis-h"></i></div>
              </div>
              <ul class="dropdown-menu">
               <li class="p-2">
                <div class="mb-3">
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                  <input ng-model="timkiem" type="text" class="form-control col-12" placeholder="Tìm Kiếm" />
                 </div>
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-up-alt"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Tăng Dần" />
                 </div>
                 <div class="input-group">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-down"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Giảm Dần" />
                 </div>
                </div>
               </li>
              </ul>
             </div>
            </th>
 <th ng-show="tieude.td2" style="width: 10%;">
             <div class="dropdown position-static">
              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
               <div class="d-flex justify-content-center flex-column">Ngày Kết Thúc <i class="fas fa-ellipsis-h"></i></div>
              </div>
              <ul class="dropdown-menu">
               <li class="p-2">
                <div class="mb-3">
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                  <input ng-model="timkiem" type="text" class="form-control col-12" placeholder="Tìm Kiếm" />
                 </div>
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-up-alt"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Tăng Dần" />
                 </div>
                 <div class="input-group">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-down"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Giảm Dần" />
                 </div>
                </div>
               </li>
              </ul>
             </div>
            </th>
  <th ng-show="tieude.td2" style="width: 20%;">
             <div class="dropdown position-static">
              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
               <div class="d-flex justify-content-center flex-column">Ghi Chú <i class="fas fa-ellipsis-h"></i></div>
              </div>
              <ul class="dropdown-menu">
               <li class="p-2">
                <div class="mb-3">
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                  <input ng-model="timkiem" type="text" class="form-control col-12" placeholder="Tìm Kiếm" />
                 </div>
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-up-alt"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Tăng Dần" />
                 </div>
                 <div class="input-group">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-down"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Giảm Dần" />
                 </div>
                </div>
               </li>
              </ul>
             </div>
            </th>              
           </tr>
          </thead>
          <tbody>
            <tr>
             <th style="width: 10%;">1</th>       
            <th ng-show="tieude.td1" style="width: 30%;">
             Khóa học cơ bản 1
            </th>
            <th ng-show="tieude.td2" style="width: 20%;">
             <span class="badge bg-info">Đã Hoàn Thành</span>
            </th>
             <th ng-show="tieude.td2" style="width: 10%;">
             08/10/2021
            </th> 
             <th ng-show="tieude.td2" style="width: 10%;">
             08/10/2021
            </th> 
            <th ng-show="tieude.td2" style="width: 10%;">
            </th>       
           </tr>
              <tr>
             <th style="width: 10%;">2</th>       
            <th ng-show="tieude.td1" style="width: 30%;">
             Khóa học cơ bản 2
            </th>
            <th ng-show="tieude.td2" style="width: 20%;">
             <span class="badge bg-danger">Chưa Hoàn Thành</span>
            </th>
             <th ng-show="tieude.td2" style="width: 10%;">

            </th> 
             <th ng-show="tieude.td2" style="width: 10%;">

            </th> 
            <th ng-show="tieude.td2" style="width: 10%;">
            </th>       
           </tr>
       <tr>
             <th style="width: 10%;">3</th>       
            <th ng-show="tieude.td1" style="width: 30%;">
             Khóa học Nâng Cao 1
            </th>
            <th ng-show="tieude.td2" style="width: 20%;">
             <span class="badge bg-danger">Chưa Hoàn Thành</span>
            </th>
             <th ng-show="tieude.td2" style="width: 10%;">

            </th> 
             <th ng-show="tieude.td2" style="width: 10%;">

            </th> 
            <th ng-show="tieude.td2" style="width: 10%;">
            </th>       
           </tr>  
         <tr>
             <th style="width: 10%;">4</th>       
            <th ng-show="tieude.td1" style="width: 30%;">
             Khóa học Nâng Cao 2
            </th>
            <th ng-show="tieude.td2" style="width: 20%;">
            <span class="badge bg-danger"> Chưa Hoàn Thành</span>
            </th>
             <th ng-show="tieude.td2" style="width: 10%;">

            </th> 
             <th ng-show="tieude.td2" style="width: 10%;">

            </th> 
            <th ng-show="tieude.td2" style="width: 10%;">
            </th>       
           </tr>             
          </tbody>
         </table>
        </div>
       </div>
      </div>
    
    
    </div>
  <div class="tab-pane fade" id="menu4">
      <div class="row position-relative">
      <div class="overflow-scroll">
       <div class="d-flex">
        <div class="table mt-3 ghichu">
         <table class="table dauviec table-centered table-nowrap mb-0 rounded text-center table-bordered table-hover">
          <thead class="thead-light">
           <tr>
            <th style="width: 10%;">
             <div class="d-flex">
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
             </div>
            </th>
            <th ng-show="tieude.td1" style="width: 20%;">
             <div class="dropdown position-static">
              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
               <div class="d-flex justify-content-center flex-column">Loại Kỳ Thi <i class="fas fa-ellipsis-h"></i></div>
              </div>
              <ul class="dropdown-menu">
               <li class="p-2">
                <div class="mb-3">
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                  <input ng-model="timkiem" type="text" class="form-control col-12" placeholder="Tìm Kiếm" />
                 </div>
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-up-alt"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Tăng Dần" />
                 </div>
                 <div class="input-group">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-down"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Giảm Dần" />
                 </div>
                </div>
               </li>
              </ul>
             </div>
            </th>
            <th ng-show="tieude.td2" style="width: 30%;">
             <div class="dropdown position-static">
              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
               <div class="d-flex justify-content-center flex-column">Hình Thức Kiểm Tra <i class="fas fa-ellipsis-h"></i></div>
              </div>
              <ul class="dropdown-menu">
               <li class="p-2">
                <div class="mb-3">
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                  <input ng-model="timkiem" type="text" class="form-control col-12" placeholder="Tìm Kiếm" />
                 </div>
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-up-alt"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Tăng Dần" />
                 </div>
                 <div class="input-group">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-down"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Giảm Dần" />
                 </div>
                </div>
               </li>
              </ul>
             </div>
            </th>
            <th ng-show="tieude.td3" style="width: 30%;">
             <div class="dropdown position-static">
              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
               <div class="d-flex justify-content-center flex-column">Lần Kiểm Tra <i class="fas fa-ellipsis-h"></i></div>
              </div>
              <ul class="dropdown-menu">
               <li class="p-2">
                <div class="mb-3">
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                  <input ng-model="timkiem" type="text" class="form-control col-12" placeholder="Tìm Kiếm" />
                 </div>
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-up-alt"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Tăng Dần" />
                 </div>
                 <div class="input-group">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-down"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Giảm Dần" />
                 </div>
                </div>
               </li>
              </ul>
             </div>
            </th>
            <th ng-show="tieude.td4" style="width: 30%;">
             <div class="dropdown position-static">
              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
               <div class="d-flex justify-content-center flex-column">Điểm Số <i class="fas fa-ellipsis-h"></i></div>
              </div>
              <ul class="dropdown-menu">
               <li class="p-2">
                <div class="mb-3">
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                  <input ng-model="timkiem.Ghichu" type="text" class="form-control col-12" placeholder="Tìm Kiếm" />
                  <div class="input-group mb-2">
                   <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                   <input ng-model="timkiem.Ghichu" type="text" class="form-control col-12" placeholder="Tìm Kiếm" />
                  </div>
                 </div>
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-up-alt"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Tăng Dần" />
                 </div>
                 <div class="input-group">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-down"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Giảm Dần" />
                 </div>
                </div>
               </li>
              </ul>
             </div>
            </th>
            <th ng-show="tieude.td5" style="width: 10%;">
             <div class="dropdown position-static">
              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
               <div class="d-flex justify-content-center flex-column">Hệ Số <i class="fas fa-ellipsis-h"></i></div>
              </div>
              <ul class="dropdown-menu">
               <li class="p-2">
                <div class="mb-3">
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                  <select chosen multiple class="form-control text-danger" ng-model="Lichhop.idChutri" ng-options="s.id as s.name for s in RListNV">
                   <option value="" selected>Vui lòng chọn</option>
                  </select>
                 </div>
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-up-alt"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Tăng Dần" />
                 </div>
                 <div class="input-group">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-down"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Giảm Dần" />
                 </div>
                </div>
               </li>
              </ul>
             </div>
            </th>
            <th ng-show="tieude.td7" style="width: 10%;">
             <div class="dropdown position-static">
              <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
               <div class="d-flex justify-content-center flex-column">Tổng Điểm <i class="fas fa-ellipsis-h"></i></div>
              </div>
              <ul class="dropdown-menu">
               <li class="p-2">
                <div class="mb-3">
                 <div class="input-group mb-2" ng-click="timkiem={}">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-up-alt"></i> </span>
                 </div>
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                  <select chosen multiple class="form-control text-danger" ng-model="timkiem.Trangthai" ng-options="s.id as s.Thuoctinh for s in TTDuyet">
                   <option value="" selected>Vui lòng chọn</option>
                  </select>
                 </div>
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-up-alt"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Tăng Dần" />
                 </div>
                 <div class="input-group">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-down"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Giảm Dần" />
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
                <div class="mb-3">
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                  <input ng-model="timkiem" type="text" class="form-control col-12" placeholder="Tìm Kiếm" />
                 </div>
                 <div class="input-group mb-2">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-up-alt"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Tăng Dần" />
                 </div>
                 <div class="input-group">
                  <span class="input-group-text"> <i class="fas fa-sort-amount-down"></i> </span>
                  <input disabled class="form-control col-12" placeholder="Giảm Dần" />
                 </div>
                </div>
               </li>
              </ul>
             </div>
            </th>
           </tr>
          </thead>
          <tbody>
            <tr>
            <th style="width: 10%;">
             <div class="d-flex">
              <div class="px-2 my-auto dropdown position-static">
                  1
              </div>
             </div>
            </th>
            <th ng-show="tieude.td1" style="width: 20%;">
             Kiểm Tra Theo Bài Học
            </th>
            <th ng-show="tieude.td2" style="width: 30%;">
             Online
            </th>
            <th ng-show="tieude.td3" style="width: 30%;">
             1
            </th>
            <th ng-show="tieude.td4" style="width: 30%;">
             7
            </th>
            <th ng-show="tieude.td5" style="width: 10%;">
             1
            </th>
            <th ng-show="tieude.td7" style="width: 10%;">
             7
            </th>
            <th ng-show="tieude.td9" style="width: 20%;">
             
            </th>
           </tr>
          </tbody>
         </table>
        </div>
       </div>
      </div>
     </div>dsfds
    </div>
</div>
    
</div>
