<div class="bg-white shadow border-0 rounded border-light p-4 w-100" ng-init="OninitLoadLophoc(<?php echo $this->idUser; ?>)">
<div class="row" ng-if="CheckUserHV">
  <div class="col-3">
    <div class="card text-center mb-3">
      <div class="card-header bg-primary text-white d-flex"> Giảng Viên 
          <div class="ms-auto"><span class="badge bg-info">{{RSLophoc.idGV.length}}</span></div>
        </div>
      <div class="card-body text-start" ng-init="FCheckDanhgia(<?php echo $this->idUser; ?>,RSLophoc.Danhgia)"> <div ng-repeat="gv in RSLophoc.idGV" class="d-flex">
        <i ng-if="gv.Checkin!=0" class="far fa-check-circle text-success me-2"></i>
        <i ng-if="gv.Checkin==0" class="far fa-times-circle text-danger me-2"></i> 
          <small>{{gv.Giovao| date:'HH:mm dd/MM'}} - {{gv.id|Fname:RListNV}}</small>
          
<div ng-if="<?php echo $this->idUser; ?>==gv.id">
    <i class="fas fa-star" data-bs-toggle="modal" data-bs-target="#Danhgia" ng-if="CheckDanhgia=='0'"></i>      

    <div class="dropdown position-static" ng-if="CheckDanhgia!='0'">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center"> <i class="fas fa-star text-warning" ng-if="CheckDanhgia!='0'"></i> </div>
                  </div>
                  <div class="dropdown-menu">
                     <div class="p-3">
                         <div><span ng-repeat="x in [].constructor(CheckDanhgia.SoSao) track by $index"><i class="fas fa-star text-warning"></i></span></div>
                         <div class="px-4"><span ng-bind-html="CheckDanhgia.Binhluan"></span></div>
                      </div>
                  </div>
                </div>
          
          </div>
          </div> 
  
        </div>
    </div>
    <div class="card text-center mb-3">
      <div class="card-header bg-primary text-white d-flex"> Học Viên <div class="ms-auto"><span class="badge bg-info">{{RSLophoc.idHV.length}}</span></div>
        </div>
      <div class="card-body text-start">
        <div class="mb-2 d-flex"  ng-repeat="hv in RSLophoc.idHV">
        <i ng-if="hv.Checkin!=0" class="far fa-check-circle text-success me-2"></i>
        <i ng-if="hv.Checkin==0" class="far fa-times-circle text-danger me-2"></i>
       <i ng-if="hv.Nopbai!=0" class="fas fa-file text-success me-2" data-bs-toggle="modal" data-bs-target="#Xemlaibai" ng-click="VChamdiem(hv)"></i> 
       <i ng-if="hv.Nopbai==0" class="fas fa-file text-danger me-2"></i>     
           <small>{{hv.Giovao| date:'HH:mm dd/MM'}}<span class="mx-2">{{hv.id|Fname:RListNV}}</span></small>
            <div class="dropdown position-relative ms-auto" ng-if="(<?php echo $this->idUser; ?>|Fchecknx:hv.Nhanxet)==1">
            <div class="dropdown-toggle" data-bs-toggle="dropdown">
               <div class="d-flex justify-content-center"><i class="fas fa-comment-dots text-warning fs-4"></i> 
                              </div>
             </div>
              <span class="badge bg-danger position-absolute" style="top: -10px;left: 10px;">{{hv.Nhanxet.length}}</span>  
            <ul class="dropdown-menu vw-50">
               <li class="p-2">
                   <div ng-repeat="nx in hv.Nhanxet" ng-if="<?php echo $this->idUser; ?> == nx.gv ||Quyen.pq21">
                       <span ng-if="Quyen.pq21">{{nx.gv|Fname:RListNV}}</span> 
                       <span ng-if="!Quyen.pq21"><i class="fas fa-user-secret"></i></span> 
                       {{nx.nx}}</div>      
              </li>
             </ul>
          </div>
           <div class="dropdown position-static ms-auto" ng-if="(<?php echo $this->idUser; ?>|Fchecknx:hv.Nhanxet)==0 || hv.Type!=0">
            <div class="dropdown-toggle" data-bs-toggle="dropdown">
               <div class="d-flex justify-content-center">
                   <i class="fas fa-comment-dots fs-4"></i>
                </div>
             </div>
            <ul class="dropdown-menu vw-50">
               <li class="p-2">
                  <div class="mb-3 d-flex"> <span class="m-auto">Đánh Giá {{hv.id|Fname:RListNV}}</span> <button class="btn btn-info ms-auto" ng-click="CreadNhanxet(<?php echo $this->idUser; ?>,hv.id,Nhanxet,RSLophoc)">Gửi</button></div>
                <textarea ui-tinymce="tinymceOptions" ng-model="Nhanxet" class="form-control text-danger my-2" placeholder="Nhận Xét"></textarea>
              </li>
             </ul>
          </div>
            
          </div>
      </div>
    </div>
    <div class="card text-center mb-3">
      <div class="card-header bg-primary text-white"> Tiến Độ </div>
      <div class="card-body">
      <button class="btn btn-{{(HocvienHT.Checkin==0)?'danger':'info'}} p-2 rounded" ng-click="CheckinLophoc(RSLophoc,<?php echo $this->idUser; ?>)" ng-disabled="HocvienHT.StepHV!=0">Điểm Danh</button>  
        <button class="btn" ng-if="(Lambai==true || HocvienHT.Type!= 1)" ng-disabled="HocvienHT.StepHV!=1" ng-class="HocvienHT.StepHV<=1  ? 'btn-danger' : 'btn-info'" ng-click="StartKiemTra(RSLophoc,HocvienHT)">Kiểm Tra</button> 
       <button class="btn" ng-if="(HocvienHT.Type!= 1)" ng-disabled="HocvienHT.StepHV!=2" data-bs-toggle="modal" data-bs-target="#Danhgia" ng-class="HocvienHT.StepHV<=2  ? 'btn-danger' : 'btn-info'">Đánh Giá</button>  
        </div>
    </div>  
  </div>
  <div class="col-9">
    <div class="card text-center">
      <div class="card-header bg-primary text-white d-flex justify-content-center">
          <div class="dropdown position-static me-auto">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center"><i class="fas fa-star text-warning me-auto"></i></div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                        <div ng-repeat="dg in RSLophoc.Danhgia">
                         <span class="badge bg-info">   {{$index+1}} </span>
                           <span ng-if="Quyen.pq21"> {{dg.id|Fname:RListNV}}</span>
                            <span ng-if="!Quyen.pq21"><i class="fas fa-user-secret"></i></span> 
                            <span ng-repeat="y in [].constructor(dg.SoSao) track by $index"><i class="fas fa-star text-warning"></i></span>
                            <div ng-bind-html="dg.Binhluan" class="px-4"></div>
                        <hr>
                        </div>
                    </li>          
                  </ul>
                </div>
         <span class="m-auto"> {{RSLophoc.Tenlop}}</span> <span class="ms-auto bg-info text-white p-2 rounded" ng-if="Showcounter">Thời Gian Làm Bài : {{counter | counter | date:'HH:mm:ss'}}</span></div>
      <div class="card-body overflow-scroll">
        <div ng-bind-html="RSLophoc.Baihoc.Noidung" ng-if="!CheckKiemtra"></div>
        <div ng-if="CheckKiemtra" class="col-8 mx-auto">
        <div class="card text-center mb-2" ng-repeat="kt in CauhoiKTLH">
                <div class="card-header bg-primary text-white"> Câu hỏi {{$index+1}} - {{(kt.Dapan.type==0)?"Trắc Nghiệm":"Tự Luận"}} - {{kt.Diem}} Điểm </div>
                <div class="card-body">
                    <div ng-bind-html="kt.Cauhoi"></div>
                    <div ng-if="kt.Dapan.type==0" class="text-start">
                    <div ng-repeat="tl in kt.Traloi"> 
<!--                        <span class="me-2 badge rounded-pill" ng-class="BaiKiemtra.Traloi['idCH'+kt.id]==tl  ? 'bg-danger' : 'bg-primary'" ng-click="BaiKiemtra.Traloi['idCH'+kt.id]=tl">{{$index+1|FABC}}</span>{{tl}}</div>-->
                        
         <span class="me-2 badge rounded-pill" ng-class="CheckTL['idCH'+kt.id]==tl.id  ? 'bg-danger' : 'bg-primary'" ng-click="HVTL(kt.id,tl.id);CheckTL['idCH'+kt.id]=tl.id">{{tl.id|FABC}}</span>{{tl.value}}</div>          
                    </div>
          <div ng-if="kt.Dapan.type==1" class="text-start">
                    <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Traloi.Tuluan" class="form-control text-danger" placeholder="Đáp Án Tự Luận" ng-change="HVTL(kt.id,Traloi.Tuluan)"></textarea>
                    </div>
                 </div>
              </div>        
            <button class="btn btn-success text-white" ng-click="HoanthanhKTLH(BaiKiemtra,HocvienHT,RSLophoc)">Hoàn Thành</button>
          </div>   
      </div>
    </div>
  </div>
</div>
<div class="row" ng-if="!CheckUserHV">
  <div class="text-center text-danger">
      Bạn Không Thuộc Lớp Này
    </div>
</div> 
<div class="row">
        <div class="my-2">
          <div class="modal fade" id="Danhgia" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title"> Đánh Giá Buổi Học</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row p-3">
                    <div class="mb-3">
                      <div class="input-group"> 
                        <span class="input-group-text">Đánh Giá </span>
                     <div class="form-control" ng-init="SLSao=1">  
    <i class="fas fa-star ms-3" ng-click="SLSao=1" ng-class="SLSao >=1  ? 'text-warning' : ''"></i>
    <i class="fas fa-star ms-3" ng-click="SLSao=2" ng-class="SLSao >=2  ? 'text-warning' : ''"></i>
    <i class="fas fa-star ms-3" ng-click="SLSao=3" ng-class="SLSao >=3  ? 'text-warning' : ''"></i>
    <i class="fas fa-star ms-3" ng-click="SLSao=4" ng-class="SLSao >=4  ? 'text-warning' : ''"></i>
    <i class="fas fa-star ms-3" ng-click="SLSao=5" ng-class="SLSao >=5  ? 'text-warning' : ''"></i>
                        </div>
                      </div>
                    </div>
                    <div class="mb-3">
                      <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="reviewlh" class="form-control text-danger" placeholder="Bình Luận"></textarea>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">Đóng</button>
                  <button type="button" ng-show="Kehoachngay.CRUD!=1" class="btn btn-primary" ng-click="Danhgialophoc(SLSao,reviewlh,RSLophoc,HocvienHT.id)"> Gửi</button>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>    
<div class="modal fade" id="Xemlaibai" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title"> Xem Lại Bài Làm</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row p-3">
<div class="col-12">  
    <div class="text-center text-info p-2">Bài Làm Học Viên</div>
    <div ng-repeat="bl in BailamHV">
                        <div class="card">
                        <div class="card-header p-2 bg-primary text-white">Câu hỏi số {{$index+1}} -  {{bl.Diem}} Điểm</div>
                        <div class="card-body">
                       <span ng-bind-html="bl.Cauhoi"></span>     
                            </div>                      
                    <div class="card-footer">
                     Học Viên Trả Lời {{bl.DAHV|FCustom:'check':bl.Traloi}}:  <span ng-bind-html="bl.DAHV" ng-if="bl.Dapan.type==1"></span>     
                    <span ng-if="bl.Dapan.type==0"><span class="me-2 badge rounded-pill" ng-class="(bl.DAHV|FCustom:'check':bl.Traloi)==0?'bg-danger':'bg-info'">{{bl.DAHV|FABC}}</span>{{bl.DAHV|FDAHV:bl.Traloi}}</span>     
                        
                    <div class=""> Đáp Án : <span ng-bind-html="bl.Dapan.data" ng-if="bl.Dapan.type==1"></span> <span ng-repeat="x in bl.Traloi" ng-if="x.check==1" ng-if="bl.Dapan.type==0"><span class="me-2 badge rounded-pill bg-info">{{x.id|FABC}}</span> {{x.value}}</span> </div>  
                            </div>
                            
                        </div>
                      </div>
                      </div> 
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">Đóng</button>
                  <button type="button" ng-show="Kehoachngay.CRUD!=1" class="btn btn-primary" ng-click=""> Gửi</button>

                </div>
              </div>
            </div>
          </div>    
    
    
    
