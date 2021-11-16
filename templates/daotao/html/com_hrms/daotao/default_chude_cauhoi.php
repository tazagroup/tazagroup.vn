<div class="chude" ng-init="ReadChude()"> 
        <div class="row card text-white bg-primary mb-3" ng-if="Quyen.pq9">
    <div class="card-header p-2 d-flex">
        <span class="me-2 my-auto badge rounded-pill bg-warning"> {{(RChude|filter:{level:0}).length}}</span>
        <span class="me-2 my-auto badge rounded-pill bg-info">{{Cauhoigoc.length}}</span>
        <span class="ms-2"> Danh Sách Chủ Đề</span> 
        <i class="fas fa-sync-alt mx-3 my-auto" ng-click="ResetCauhoi()"></i>
        <i class="fas fa-plus-circle ms-auto me-3 my-auto" data-bs-toggle="modal" data-bs-target="#addchude" ng-click="prcheck=true"></i>
    </div>
</div>
      <script type="text/ng-template" id="categoryTree">
    <div class="accordion" id="accordionparent-{{category.level}}" ng-if="category.children">
        <div ng-repeat="category in category.children" class="level-{{category.level}} accordion-item row">
            <h2 class="accordion-header col" ng-click="t['CD'+category.id]=!t['CD'+category.id];Loccauhoi(category,t)">
              <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#a{{category.id}}"  ng-class="{'collapsed': !localStorage.CDCHActive['CD'+category.id]}">
              <span class="me-2 badge rounded-pill bg-warning">{{category.id |FCChudecon:RChude}}</span> <span class="me-2 badge rounded-pill bg-info">{{category|FSTailieu:Cauhoigoc}}</span>{{category.Toc}}. {{category.Tenchude}} 
          </button>
            </h2>
                 <div class="dropdown position-static col-1 my-auto">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center"><i class="fas fa-ellipsis-v me-2 my-auto col-1"></i></div>
                  </div>
<ul class="dropdown-menu">
              <li ng-if="Quyen.pq10" class="p-2" data-bs-toggle="modal" data-bs-target="#addchude" ng-click="editChudecon(category)"> <i class="fas fa-plus-circle me-2"></i> Thêm Chủ Đề </li>
              <?php if($this->id=='1'): ?>
              <li class="p-2" data-bs-toggle="modal" data-bs-target="#addtailieu" ng-click="editTailieucon(category)"> <i class="fas fa-plus-circle me-2"></i> Thêm Tài Liệu </li>
                <?php endif;?> 
              <li ng-if="Quyen.pq11" class="p-2" data-bs-toggle="modal" data-bs-target="#addchude" ng-click="editChude(category)"> <i class="fas fa-edit text-info me-2"></i> Sửa </li>
              <li ng-if="Quyen.pq12" class="p-2" data-bs-toggle="modal" data-bs-target="#XoaChude" ng-click="editChude(category)"> <i class="fas fa-trash-alt text-danger me-2"></i> Xóa </li>
            </ul>
                </div>  
            <div id="a{{category.id}}" class="accordion-collapse collapse" data-bs-parent="#accordionparent-{{category.level-1}}" ng-class="{'show': localStorage.CDCHActive['CD'+category.id]}">
              <div class="accordion-body" ng-include="'categoryTree'">{{category.Tenchude}} </div>
            </div>  
       </div>
   </div>
    </script>
      <div class="accordion" id="accordionparent">
        <div ng-repeat="category in categories" class="level-{{category.level}} accordion-item row">
                      <h2 class="accordion-header col" ng-click="t['CD'+category.id]=!t['CD'+category.id];Loccauhoi(category,t)">
        <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#a{{category.id}}"  ng-class="{'collapsed': !localStorage.CDCHActive['CD'+category.id]}">
              <span class="me-2 badge rounded-pill bg-warning">{{category.id |FCChudecon:RChude}}</span> <span class="me-2 badge rounded-pill bg-info">{{category|FSTailieu:Cauhoigoc}}</span>{{category.Toc}}. {{category.Tenchude}} 
          </button>
            </h2>
            
          <div class="dropdown position-static col-1 my-auto">
            <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
              <div class="d-flex justify-content-center"><i class="fas fa-ellipsis-v me-2 my-auto col-1"></i></div>
            </div>
            <ul class="dropdown-menu">
              <li ng-if="Quyen.pq10" class="p-2" data-bs-toggle="modal" data-bs-target="#addchude" ng-click="editChudecon(category)"> <i class="fas fa-plus-circle me-2"></i> Thêm Chủ Đề </li>
               <?php if($this->id=='1'): ?>
                <li class="p-2" data-bs-toggle="modal" data-bs-target="#addtailieu" ng-click="editTailieucon(category)"> <i class="fas fa-plus-circle me-2"></i> Thêm Tài Liệu </li>
                       <?php endif;?> 
              <li ng-if="Quyen.pq11" class="p-2" data-bs-toggle="modal" data-bs-target="#addchude" ng-click="editChude(category)"> <i class="fas fa-edit text-info me-2"></i> Sửa </li>
              <li ng-if="Quyen.pq12" class="p-2" data-bs-toggle="modal" data-bs-target="#XoaChude" ng-click="editChude(category)"> <i class="fas fa-trash-alt text-danger me-2"></i> Xóa </li>
            </ul>
          </div>
          <div id="a{{category.id}}" class="accordion-collapse collapse" data-bs-parent="#accordionparent" ng-class="{'show': localStorage.CDCHActive['CD'+category.id]}">
            <div class="accordion-body" ng-include="'categoryTree'">{{category.Tenchude}} </div>
          </div>
        </div>
      </div>

</div>


<div class="modal fade" id="addchude" data-bs-backdrop="static" data-bs-keyboard="false">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <p class="modal-title">THÊM CHỦ ĐỀ</p>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ng-click="OninitChude()"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <div class="input-group"> <span class="input-group-text"> Tên Chủ Đề </span>
                <input type="text" class="form-control" placeholder="Tên Chủ Đề" ng-model="Chude.Tenchude">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>  
            <button ng-show="Chude.CRUD!=1" type="button" class="btn btn-primary" ng-click="CreateChude(Chude)">Thêm</button>
            <button ng-show="Chude.CRUD==1" type="button" class="btn btn-info" ng-click="UpdateChude(Chude)">Cập Nhật</button>
          </div>
        </div>
      </div>
    </div>

<div class="modal fade" id="XoaChude" data-bs-backdrop="static" data-bs-keyboard="false">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"> Xóa Chủ Đề</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body"> Bạn có Chắc Chắn Xóa <span class="text-danger" ng-bind-html="Chude.Tenchude"></span> </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            <button type="button" class="btn btn-primary" ng-click="DeleteChude(Chude)"> Xóa</button>
          </div>
        </div>
      </div>
    </div>

