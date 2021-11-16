<div class="bg-white shadow border-0 rounded border-light p-4 w-100" ng-init="OninitDashboard(<?php echo $this->idUser; ?>);">
  <div class="card text-center" ng-init="ShowTQ=true" ng-if="idNhom==7">
    <div class="card-header p-2"> Tổng Quan <i class="fas fa-eye" ng-click="ShowTQ=!ShowTQ" ng-show="ShowTQ"></i> <i class="fas fa-eye-slash" ng-click="ShowTQ=!ShowTQ" ng-show="!ShowTQ"></i></div>
    <div class="card-body p-2" ng-show="ShowTQ">
      <div class="row mb-3">
        <div class="col-6 mb-3">
          <div class="card text-center">
            <div class="card-header p-2"> KPI Thời Gian Đào Tạo </div>
            <div class="card-body p-2 row">
              <div class="col-6 mb-3">Nhân Viên Thử Việc</div>
               <div class="col-6 mb-3">20</div>  
              <div class="col-6 mb-3">Nhân Viên Chính Thức</div>
              <div class="col-6 mb-3">40</div> 
            </div>
          </div>
        </div>
        <div class="col-6 mb-3">
          <div class="card text-center">
            <div class="card-header p-2"> KPI Chứng Chỉ Đào Tạo </div>
            <div class="card-body p-2 row">
              <div class="col-12 mb-3">Nhân Viên Đạt Chứng Chỉ / Tổng Nhân Viên</div>
              <div class="col-12 mb-3">12/20</div>
            </div>
          </div>
        </div>
        <div class="col-6 mb-3">
          <div class="card text-center">
            <div class="card-header p-2"> KPI Các Lớp Đào Tạo </div>
            <div class="card-body p-2 row">
              <div class="col-6 mb-3">Lớp đào tạo đề nghị</div>
              <div class="col-6 mb-3">10</div>    
              <div class="col-6 mb-3">Lớp đào tạo thực hiện</div>
              <div class="col-6 mb-3">20</div>
            </div>
          </div>
        </div>
        <div class="col-6 mb-3">
          <div class="card text-center">
            <div class="card-header p-2"> KPI Hài Lòng Đào Tạo </div>
            <div class="card-body p-2 row">
              <div class="col-6 mb-3">Tỉ lệ Hài Lòng</div>
              <div class="col-6 mb-3">Tỉ lệ Đánh Giá</div>
              <div class="col-6 mb-3">10/20</div>
              <div class="col-6 mb-3">15/30</div>
            </div>
          </div>
        </div>
        <div class="col-6 mb-3">
          <div class="card text-center">
            <div class="card-header p-2"> KPI Ngân Sách Đào Tạo </div>
            <div class="card-body p-2 row">
              <div class="col-6 mb-3">Tổng chi phí đào tạo / tháng</div>
             <div class="col-6 mb-3">2.000.000</div>
              <div class="col-6 mb-3">Chi phí đào tạo bình quân cho mỗi nhân viên/ tháng</div>
              <div class="col-6 mb-3">100.000</div>
            </div>
          </div>
        </div>
     <div class="col-6 mb-3">
          <div class="card text-center">
            <div class="card-header p-2"> KPI Xây Dựng Nội Dung Đào Tạo </div>
            <div class="card-body p-2 row">
              <div class="col-6 mb-3">Đào Tạo Online</div>
              <div class="col-6 mb-3">10</div>  
              <div class="col-6 mb-3">Đào Tạo Offline</div>
              <div class="col-6 mb-3">20</div>  
              <div class="col-6 mb-3">Đào Tạo Tự Học</div>
              <div class="col-6 mb-3">30</div>
            </div>
          </div>
        </div>     
        <div class="col-6 mb-3">
          <div class="card text-center">
            <div class="card-header p-2"> KPI xây dựng nội dung đào tạo </div>
            <div class="card-body p-2 row">
              <div class="col-6 mb-3">Số bài đào tạo được xây dựng mới trong tháng</div>
              <div class="col-6 mb-3">10</div>  
            </div>
          </div>
        </div>
          
          
        </div>
      </div>
  </div>
  <div  ng-if="Quyen.pq19"><?php echo $this->loadTemplate('dashboard_hocvien'); ?> </div>
</div>
