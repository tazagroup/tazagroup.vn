<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_hrms
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined( '_JEXEC' )or die;

use Joomla\ CMS\ Factory;
use Joomla\ CMS\ Filter\ OutputFilter;
use Joomla\ CMS\ HTML\ HTMLHelper;
use Joomla\ CMS\ Language\ Text;
use Joomla\ CMS\ Layout\ FileLayout;
use Joomla\ CMS\ Router\ Route;
$User = Factory::getUser();
//print_r($this->items);
function showCategories( $categories, $pid = 0, $char = '', $stt = 0 ) {
  // BƯỚC 2.1: LẤY DANH SÁCH CATE CON
  $cate_child = array();
echo '<div class="accordion" id="accordionExample">';
  foreach ( $categories as $key => $item ) {
    // Nếu là chuyên mục con thì hiển thị
    if ( $item->pid == $pid ) {
      $cate_child[] = $item;
      unset( $categories[ $key ] );
    }
  }

  // BƯỚC 2.2: HIỂN THỊ DANH SÁCH CHUYÊN MỤC CON NẾU CÓ
  if ( $cate_child ) {
    if ( $stt == 0 ) {
      // là cấp 1
    } else if ( $stt == 1 ) {
      // là cấp 2
    } else if ( $stt == 2 ) {
      // là cấp 3
    }
    ?>
  <?php foreach ($cate_child as $key => $item){ ?>
  <div class="accordion-item">
<div class="d-flex">    <button class="accordion-button p-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $item->id; ?>" aria-expanded="true" aria-controls="collapse-<?php echo $item->id; ?>"> <i class="fas fa-folder-open text-secondary me-2"></i> <?php echo  $item->Tieude; ?> </button>
            <i class="fas fa-folder-plus mx-2 my-auto p-2 bg-secondary text-white border rounded" data-bs-toggle="modal" data-bs-target="#Taothumuc"></i>
        <i class="fas fa-file-upload mx-2 my-auto p-2 bg-info text-white border rounded" data-bs-toggle="modal" data-bs-target="#Taofile" ng-click="editTailieu(<?php echo $item->id; ?>)"></i></div>  
     
  <div id="collapse-<?php echo $item->id; ?>" class="accordion-collapse collapse show">
          
  <div class="accordion-body pe-0">
            <div class="text-danger">
 <?php if ($item->TenTailieu) : ?>   
         <div class="text-info p-2 ps-0" data-bs-toggle="modal" data-bs-target="#Xempdf" ng-click="XemPDF('<?php echo $item->Link; ?>')">
               <i class="fas fa-file-pdf"></i> <?php echo $item->TenTailieu; ?>
<!--               <a ng-href="/tailieu/{{file.Link}}">{{file.TenTailieu}}</a>-->
           </div>  
 <?php endif; ?>              
      </div>
    <?php showCategories($categories, $item->id, $char.'|---', ++$stt); ?>
  </div>
</div>  
  </div>
  
<?php } ?>
<?php } ?>
 </div>   
<?php } ?>
<div class="col-12 d-flex align-items-center justify-content-center" ng-init="OninitTailieu();OninitThumuc(<?php echo $this->LoaiTM; ?>)">
  <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Taothumuc"><i class="fas fa-folder-plus"></i> Tạo Thư Mục </button>
    <div class="modal fade" id="Taothumuc" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"> {{Thumuc.Title}} Thư Mục</h5>
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
    <div class="mt-3">
      <?php showCategories($this->items); ?>
    </div>
    <div class="row">
      <div class="modal fade" id="Taofile" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"> Thêm Tài Liệu - {{idDM}}</h5>
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
          </div>   
    
  </div>
</div>
