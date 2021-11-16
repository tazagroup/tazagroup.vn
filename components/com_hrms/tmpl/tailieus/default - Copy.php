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
use Joomla\CMS\Router\Route;
$User = Factory::getUser();
//print_r($this->items);
function showCategories($categories, $pid = 0, $char = '', $stt = 0)
{
    // BƯỚC 2.1: LẤY DANH SÁCH CATE CON
    $cate_child = array();
    foreach ($categories as $key => $item)
    {
        // Nếu là chuyên mục con thì hiển thị
        if ($item->pid == $pid)
        {
            $cate_child[] = $item;
            unset($categories[$key]);
        }
    }
     
    // BƯỚC 2.2: HIỂN THỊ DANH SÁCH CHUYÊN MỤC CON NẾU CÓ
    if ($cate_child)
    {
        if ($stt == 0){
            // là cấp 1
        }
        else if ($stt == 1){
            // là cấp 2
        }
        else if ($stt == 2){
            // là cấp 3
        }
         
        echo '<div class="accordion" id="accordionExample">';
        foreach ($cate_child as $key => $item)
        {
            // Hiển thị tiêu đề chuyên mục
            echo '<div class="accordion-item">
<div class="d-flex">
  <h2 class="accordion-header flex-fill" id="headingOne">
     '.$item->Tieude.'
    </h2>
    <button class="btn btn-primary">Thêm Thư Mục</button>
    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'.$item->id.'" aria-expanded="true" aria-controls="collapseOne">
    </button></div>
    <div id="collapse'.$item->id.'" class="accordion-collapse collapse">
      <div class="accordion-body">
      '.$item->id.' <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Taofile" ng-click="editTailieu('.$item->id.')"><i class="fas fa-file-upload"></i></button>
     <div class="text-danger">'.$item->Link.'</div>';
       showCategories($categories, $item->id, $char.'|---', ++$stt);
       echo '</div>
      </div>
    </div>';
//            echo '<div class="text-danger">'.$item->Link.'</div>';
//            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
//            showCategories($categories, $item->id, $char.'|---', ++$stt);
//            echo '</div>';
        }
        echo '</div>';
    }
}

?>
<div class="col-12 d-flex align-items-center justify-content-center" ng-init="OninitTailieu();OninitThumuc(<?php echo $this->LoaiTM; ?>)">  
    <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100">
             <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Taothumuc"><i class="fas fa-folder-plus"></i> Tạo Thư Mục </button>
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
                      <div class="input-group"> 
                          <span class="input-group-text">Thư Mục Cha</span>
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
<div class="mt-3">      <?php showCategories($this->items); ?>  </div>
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
                                <?php echo HTMLHelper::_('form.token'); ?>
							</div>
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
</div>   
    
