<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.cassiopeia
 *
 * @copyright   (C) 2017 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined( '_JEXEC' )or die;

use Joomla\ CMS\ Factory;
use Joomla\ CMS\ HTML\ HTMLHelper;
use Joomla\ CMS\ Language\ Text;
use Joomla\ CMS\ Uri\ Uri;

/** @var Joomla\CMS\Document\HtmlDocument $this */

$app = Factory::getApplication();
$wa = $this->getWebAssetManager();

// Browsers support SVG favicons
$this->addHeadLink( HTMLHelper::_( 'image', 'joomla-favicon.svg', '', [], true, 1 ), 'icon', 'rel', [ 'type' => 'image/svg+xml' ] );
$this->addHeadLink( HTMLHelper::_( 'image', 'favicon.ico', '', [], true, 1 ), 'alternate icon', 'rel', [ 'type' => 'image/vnd.microsoft.icon' ] );
$this->addHeadLink( HTMLHelper::_( 'image', 'joomla-favicon-pinned.svg', '', [], true, 1 ), 'mask-icon', 'rel', [ 'color' => '#000' ] );

// Detecting Active Variables
$option = $app->input->getCmd( 'option', '' );
$view = $app->input->getCmd( 'view', '' );
$layout = $app->input->getCmd( 'layout', '' );
$task = $app->input->getCmd( 'task', '' );
$itemid = $app->input->getCmd( 'Itemid', '' );
$sitename = htmlspecialchars( $app->get( 'sitename' ), ENT_QUOTES, 'UTF-8' );
$menu = $app->getMenu()->getActive();
$pageclass = $menu !== null ? $menu->getParams()->get( 'pageclass_sfx', '' ) : '';

// Template path
$templatePath = 'templates/' . $this->template;

// Color Theme
$paramsColorName = $this->params->get( 'colorName', 'colors_standard' );
$assetColorName = 'theme.' . $paramsColorName;
$wa->registerAndUseStyle( $assetColorName, $templatePath . '/css/global/' . $paramsColorName . '.css' );
$this->getPreloadManager()->prefetch( $wa->getAsset( 'style', $assetColorName )->getUri(), [ 'as' => 'style' ] );

// Use a font scheme if set in the template style options
$paramsFontScheme = $this->params->get( 'useFontScheme', false );

if ( $paramsFontScheme ) {
  // Prefetch the stylesheet for the font scheme, actually we need to prefetch the font(s)
  $assetFontScheme = 'fontscheme.' . $paramsFontScheme;
  $wa->registerAndUseStyle( $assetFontScheme, $templatePath . '/css/global/' . $paramsFontScheme . '.css' );
  $this->getPreloadManager()->prefetch( $wa->getAsset( 'style', $assetFontScheme )->getUri(), [ 'as' => 'style' ] );
}

// Enable assets
$wa->usePreset( 'template.cassiopeia.' . ( $this->direction === 'rtl' ? 'rtl' : 'ltr' ) )->useStyle( 'template.active.language' )->useStyle( 'template.user' )->useScript( 'template.user' );

// Override 'template.active' asset to set correct ltr/rtl dependency
$wa->registerStyle( 'template.active', '', [], [], [ 'template.cassiopeia.' . ( $this->direction === 'rtl' ? 'rtl' : 'ltr' ) ] );

// Logo file or site title param
if ( $this->params->get( 'logoFile' ) ) {
  $logo = '<img src="' . Uri::root( true ) . '/' . htmlspecialchars( $this->params->get( 'logoFile' ), ENT_QUOTES ) . '" alt="' . $sitename . '">';
} elseif ( $this->params->get( 'siteTitle' ) ) {
  $logo = '<span title="' . $sitename . '">' . htmlspecialchars( $this->params->get( 'siteTitle' ), ENT_COMPAT, 'UTF-8' ) . '</span>';
}
else {
  $logo = HTMLHelper::_( 'image', 'logo.svg', $sitename, [ 'class' => 'logo d-inline-block' ], true, 0 );
}

$hasClass = '';

if ( $this->countModules( 'sidebar-left', true ) ) {
  $hasClass .= ' has-sidebar-left';
}

if ( $this->countModules( 'sidebar-right', true ) ) {
  $hasClass .= ' has-sidebar-right';
}

// Container
$wrapper = $this->params->get( 'fluidContainer' ) ? 'wrapper-fluid' : 'wrapper-static';

$this->setMetaData( 'viewport', 'width=device-width, initial-scale=1' );

$stickyHeader = $this->params->get( 'stickyHeader' ) ? 'position-sticky sticky-top' : '';
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
<jdoc:include type="metas" />
<jdoc:include type="styles" />
<jdoc:include type="scripts" />
    
<link rel="manifest" href="/manifest.json">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-title" content="Taza Skin Clinic">
<meta name="theme-color" content="#2F3BA2" />
<link rel="apple-touch-icon" href="/pwa/maskable_icon_x192.png">
<script>
if ('serviceWorker' in navigator) {
  window.addEventListener('load', () => {
    navigator.serviceWorker.register('/sw.js')
        .then((reg) => {
        });
  });
}
</script> 
<script>
    let deferredPrompt;
    window.addEventListener('beforeinstallprompt', function(event) {
      e.preventDefault();
      deferredPrompt = e;
    });

    </script>    
<link type="text/css" href="<?php echo $templatePath; ?>/css/sweetalert2.min.css" rel="stylesheet">
<link type="text/css" href="https://demo.themesberg.com/volt-pro/vendor/notyf/notyf.min.css" rel="stylesheet">
<link type="text/css" href="https://demo.themesberg.com/volt-pro/vendor/fullcalendar/main.min.css" rel="stylesheet">
<link type="text/css" href="https://demo.themesberg.com/volt-pro/vendor/apexcharts/dist/apexcharts.css" rel="stylesheet">
<link type="text/css" href="https://demo.themesberg.com/volt-pro/vendor/dropzone/dist/min/dropzone.min.css" rel="stylesheet">
<link type="text/css" href="https://demo.themesberg.com/volt-pro/vendor/choices.js/public/assets/styles/choices.min.css" rel="stylesheet">
<link type="text/css" href="https://demo.themesberg.com/volt-pro/vendor/leaflet/dist/leaflet.css" rel="stylesheet">
<link type="text/css" href="<?php echo $templatePath; ?>/css/vendor/volt.css" rel="stylesheet">
</head>

<body ng-app="myapp" ng-controller="Test">
  <main>
    <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100">
      <div class="d-flex mb-3">
         <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#addchude"><i class="fas fa-plus-circle me-2" ></i>Thêm Chủ Đề</button>       
          <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#addkhoahoc"><i class="fas fa-plus-circle me-2" ></i>Thêm Tài Liệu</button>            
          <button class="btn btn-primary  " data-bs-toggle="modal" data-bs-target="#duyettailieu"><i class="fas fa-user-check me-2"></i>Duyệt Tài Liệu <span class="badge bg-danger">4</span></button>   
          
<div class="modal fade" id="addkhoahoc" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="h6 modal-title">Thêm Tài Liệu</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                   <div class="mb-3">
    <div class="input-group">
        <span class="input-group-text">
         Tên Tài Liệu
        </span>
       <input type="text" class="form-control " id="exampleFormControlInput1" placeholder="Tên Tài Liệu">
    </div>
</div>
              <div class="mb-3">
              
            </div>
              <div class="mb-3">
    <div class="input-group">
        <span class="input-group-text">
          Chủ đề
        </span>
        <select class="form-select" id="chude" aria-label="Default select example">
                <option selected>Vui Lòng Chọn</option>
                <option value="1">Sale</option>
                <option value="2">Marketing</option>
              </select>
    </div>
</div>
   <div class="mb-3">
                    Giới Thiệu                 
       <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Lichhop.Noidung" class="form-control text-danger"></textarea> 

</div>
            <div  class="mb-3">
              </div>
              <div class="mb-3">
                <input class="form-control form-control-sm" id="formFileSm" type="file">
              </div>
                   <div class="mb-3">
    <div class="input-group">
        <span class="input-group-text">
          Tác Giả Chính
        </span>
        <select class="form-select" id="tacgia">
                  <option selected>Tác Giả</option>
                  <option >Tác Giả 1</option>
                  <option >Tác Giả 2</option>
                 
                </select>
    </div>
</div>
       <div class="mb-3">
             Đồng Tác Giả 
    <select chosen class="form-control text-danger" ng-model="Lichhop.idChutri" ng-options="s.id as s.name for s in Tacgia">
                 <option value="" selected>Vui lòng chọn</option>
        </select>

           
   <div class="mb-3">
    <div class="input-group">
        <span class="input-group-text">
          Tìm Kiếm
        </span>
        <input type="text" class="form-control" placeholder="Tìm Kiếm">
    </div>
</div>       
           
           
           
           <select id="states1" class="w-100" name="states1[]" multiple="multiple">
    <option value="AK">Tác Giả 1</option>
    <option value="AK">Tác Giả 2</option>
    <option value="AK">Tác Giả 3</option>
    <option value="AK">Tác Giả 4</option>
</select>
    
</div>          
            </div>
            <div class="modal-footer">
                <button type="button" class="text-white btn btn-info ms-2">Lưu</button>
                <button type="button" class="text-white btn btn-success ms-2">Lưu Và Gửi Duyệt</button>
                <button type="button" class="text-white btn btn-danger ms-2" data-bs-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
  
 <div class="modal fade" id="capnhattailieu" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="h6 modal-title">Cập Nhật Tài Liệu</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                   <div class="mb-3">
    <div class="input-group">
        <span class="input-group-text">
         Tên Tài Liệu
        </span>
       <input type="text" class="form-control " id="exampleFormControlInput1" placeholder="Tên Tài Liệu">
    </div>
</div>
              <div class="mb-3">
              
            </div>
              <div class="mb-3">
    <div class="input-group">
        <span class="input-group-text">
          Chủ đề
        </span>
        <select class="form-select" id="chude" aria-label="Default select example">
                <option selected>Vui Lòng Chọn</option>
                <option value="1">Sale</option>
                <option value="2">Marketing</option>
              </select>
    </div>
</div>
   <div class="mb-3">

         Giới Thiệu

                         <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Lichhop.Noidung" class="form-control text-danger"></textarea> 
</div>
            <div  class="mb-3">
              </div>
              <div class="mb-3">
                <input class="form-control form-control-sm" id="formFileSm" type="file">
              </div>
                   <div class="mb-3">
    <div class="input-group">
        <span class="input-group-text">
          Tác Giả Chính
        </span>
        <select class="form-select" id="tacgia" aria-label="Default select example">
                  <option selected>Tác Giả</option>
                  <option >Tác Giả 1</option>
                  <option >Tác Giả 2</option>
                 
                </select>
    </div>
</div>
       <div class="mb-3">
<div class="mb-3">
             Đồng Tác Giả       
           <select id="states" class="w-100" name="states[]" multiple="multiple">
    <option value="AK">Tác Giả 1</option>
    <option value="AK">Tác Giả 2</option>
    <option value="AK">Tác Giả 3</option>
    <option value="AK">Tác Giả 4</option>
</select>
    
</div>
</div>          
            </div>
            <div class="modal-footer">
                <button type="button" class="text-white btn btn-info ms-2">Cập Nhật</button>
                <button type="button" class="text-white btn btn-success ms-2">Cập Nhật Và Gửi Duyệt</button>
                <button type="button" class="text-white btn btn-danger ms-2" data-bs-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>         
          
 <div class="modal fade" id="addchude" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <p class="modal-title" id="modalTitleNotify">THÊM CHỦ ĐỀ</p>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
   <div class="mb-3">
    <div class="input-group">
        <span class="input-group-text">
         Tên Chủ Đề
        </span>
        <input type="text" class="form-control" placeholder="Tên Chủ Đề">
    </div>
</div> 
                              
             <div class="mb-3">
    <div class="input-group">
        <span class="input-group-text">
          Chủ Đề Cha
        </span>
        <select class="form-select" id="country" aria-label="Default select example">
    <option selected>Vui lòng chọn</option>
    <option value="1">Menu 1</option>
    <option value="1"> - Menu 1.1</option>
    <option value="1"> -- Menu 1.1.1</option>
    <option value="1"> -- Menu 1.1.2</option>
    <option value="1"> --- Menu 1.1.2.1</option>
    <option value="1"> - Menu 1.2</option>
    <option value="1">Menu 2</option>
    <option value="1">Menu 3</option>
</select>
    </div>
</div>                  
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-sm btn-primary">Thêm</button>
                        </div>
                      </div>
                    </div>
                  </div>
          
    <div class="modal fade" id="duyettailieu" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <p class="modal-title" id="modalTitleNotify">Duyệt Tài Liệu</p>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
   <div class="table-responsive mt-3">
            <table class="
                        table table-centered table-nowrap
                        mb-0
                        rounded
                        text-center
                        table-bordered
                       table-hover   
                      ">
              <thead class="thead-light">
                <tr>
                  <th>#</th>
                  <th>Tài Liệu Nguồn</th>
                  <th>Tác Giả</th>
                  <th>Chủ Đề</th>
                  <th>
<div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center"><i class="fas fa-ellipsis-v me-2 my-auto"></i> Ngày Cập Nhật </div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
Từ Ngày
             <input type="date" class="form-control text-danger my-2" ng-model="dl.from" />       
Đến Ngày
        <input type="date" class="form-control text-danger my-2" ng-model="dl.to" />        
                     
                    </li>
                  </ul>
                </div>
                    </th>
                  <th>Tình Trạng</th>
                  <th>Chức Năng</th>
                </tr>
              </thead>
              <tbody>
              <tr>
                  <td>1</td>
                  <td>Tài Liệu 1</td>
                  <td><img ng-src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png" alt="" class="avatar rounded-circle text-primary" src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png">
                  <img ng-src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png" alt="" class="avatar rounded-circle text-primary" src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png">
                  <img ng-src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png" alt="" class="avatar rounded-circle text-primary" src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png">
                    </td>
                  <td>Chủ Đề 1</td>
                  <td>8/6/2021</td>
                  <td>Chưa Duyệt</td>
                  <td><i class="fas fa-trash px-2" ng-click="Xoarow(item)"></i></td>
                </tr>
                  
                  
  <tr>
                  <td>2</td>
                  <td>Tài Liệu 2</td>
                  <td>
                  <img ng-src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png" alt="" class="avatar rounded-circle text-primary" src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png">
                    </td>
                  <td>Chủ Đề 2</td>
                  <td>8/6/2021</td>
                  <td>Chỉnh Sửa</td>
                  <td><i class="fas fa-trash px-2" ng-click="Xoarow(item)"></i></td>
                </tr> 
                  
 <tr>
                  <td>3</td>
                  <td>Tài Liệu 3</td>
                  <td><img ng-src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png" alt="" class="avatar rounded-circle text-primary" src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png">
                  <img ng-src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png" alt="" class="avatar rounded-circle text-primary" src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png">
                  <img ng-src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png" alt="" class="avatar rounded-circle text-primary" src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png">
                    </td>
                  <td>Chủ Đề 1</td>
                  <td>8/6/2021</td>
                  <td>Chưa Duyệt</td>
                  <td><i class="fas fa-trash px-2" ng-click="Xoarow(item)"></i></td>
                </tr>                 
 <tr>
                  <td>4</td>
                  <td>Tài Liệu 4</td>
                  <td>
                  <img ng-src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png" alt="" class="avatar rounded-circle text-primary" src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png">
                    </td>
                  <td>Chủ Đề 3</td>
                  <td>8/6/2021</td>
                  <td>Chỉnh Sửa</td>
                  <td><i class="fas fa-trash px-2" ng-click="Xoarow(item)"></i></td>
                </tr>                 
              </tbody>
            </table>
            
            <!-- Modal Content -->
            <div class="modal fade" id="modalsuachua" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify"
              aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <p class="modal-title" id="modalTitleNotify">Sửa Nội Dung</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="py-3 text-center">
                      <p>{{sua.noidung}}</p>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary">Sửa</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- End of Modal Content --> 
          </div>        
                        </div>
                      </div>
                    </div>
                  </div>         
      </div>
      <div class="row">
        <div class="col-3">
          <div class="card text-white bg-primary mb-3">
            <div class="card-header p-2">Danh Sách Chủ Đề</div>
          </div>
          <div class="accordion" id="accordionparent">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#menu1"> Menu1 </button>
              </h2>
              <div id="menu1" class="accordion-collapse collapse" data-bs-parent="#accordionparent">
                <div class="accordion-body">
                  <div class="accordion" id="accordionparent1">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#menu11"> Menu 1.1 </button>
                      </h2>
                      <div id="menu11" class="accordion-collapse collapse" data-bs-parent="#accordionparent1">
                        <div class="accordion-body"> 
                           <div class="accordion" id="accordionparent">
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#menu1">
           Menu1
        </button>
      </h2>
      <div id="menu1" class="accordion-collapse collapse" data-bs-parent="#accordionparent">
        <div class="accordion-body">
                 content1      
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#menu2">
           Menu2
        </button>
      </h2>
      <div id="menu2" class="accordion-collapse collapse" data-bs-parent="#accordionparent">
        <div class="accordion-body">
                content2
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#menu2">
            Menu3
        </button>
      </h2>
      <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionparent">
        <div class="accordion-body">
              Content3
        </div>
      </div>
    </div>
</div>
                          </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#menu21"> Menu 1.2 </button>
                      </h2>
                      <div id="menu21" class="accordion-collapse collapse" data-bs-parent="#accordionparent1">
                        <div class="accordion-body"> content 1.2 </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#menu31"> Menu 1.3 </button>
                      </h2>
                      <div id="menu31" class="accordion-collapse collapse" data-bs-parent="#accordionparent1">
                        <div class="accordion-body"> Content 1.3 </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#menu2"> Menu2 </button>
              </h2>
              <div id="menu2" class="accordion-collapse collapse" data-bs-parent="#accordionparent">
                <div class="accordion-body"> content2 </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#menu3"> Menu3 </button>
              </h2>
              <div id="menu3" class="accordion-collapse collapse" data-bs-parent="#accordionparent">
                <div class="accordion-body"> Content3 </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-9">
          <div class="table-responsive mt-3">
            <table class="
                        table table-centered table-nowrap
                        mb-0
                        rounded
                        text-center
                        table-bordered
                       table-hover   
                      ">
              <thead class="thead-light">
                <tr>
                  <th>#</th>
                  <th>Tài Liệu Nguồn</th>
                  <th>Tác Giả</th>
                  <th>Chủ Đề</th>
                  <th>
<div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center"><i class="fas fa-ellipsis-v me-2 my-auto"></i> Ngày tạo </div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
Từ Ngày
             <input type="date" class="form-control text-danger my-2" ng-model="dl.from" />       
Đến Ngày
        <input type="date" class="form-control text-danger my-2" ng-model="dl.to" />        
                     
                    </li>
                  </ul>
                </div>
                    </th>
                  <th>Tình Trạng</th>
                  <th>Chức Năng</th>
                </tr>
              </thead>
              <tbody>
                <tr ng-repeat="item in ListTest ">
                  <td>{{$index+1}}</td>
                  <td>{{item.tailieu}}</td>
                  <td><img ng-src="{{item.tacgia}}" alt="" class="avatar rounded-circle text-primary">
                      <img ng-src="{{item.tacgia}}" alt="" class="avatar rounded-circle text-primary">
                      <img ng-src="{{item.tacgia}}" alt="" class="avatar rounded-circle text-primary">
                    </td>
                  <td>{{item.chude}}</td>
                  <td>{{item.ngaytao}}</td>
                  <td>{{item.tinhtrang}}</td>
                  <td><i class="fas fa-tools px-2" ng-click="suanoidung(item)" type="button"
                      class="btn btn-block btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#capnhattailieu"></i> <i class="fas fa-eye-slash px-2"></i> <i class="fas fa-trash px-2" ng-click="Xoarow(item)"></i></td>
                </tr>
              </tbody>
            </table>
            
            <!-- Modal Content -->
            <div class="modal fade" id="modalsuachua" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify"
              aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <p class="modal-title" id="modalTitleNotify">Sửa Nội Dung</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="py-3 text-center">
                      <p>{{sua.noidung}}</p>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary">Sửa</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- End of Modal Content --> 
          </div>
        </div>
      </div>
</div>
   <!-- End of tab -->
    </div>
    </div>
    </div>
  </main>    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<script src="https://tazagroup.vn/media/vendor/tinymce/tinymce.min.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>    
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-sanitize/1.8.2/angular-sanitize.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-cookies/1.8.2/angular-cookies.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui/0.4.0/angular-ui.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>    
<script src="https://cdnjs.cloudflare.com/ajax/libs/ng-dropzone/2.0.2/ng-dropzone.min.js"></script> 
<script src="components/com_hrms/js/OrgChart.js"></script> 
<script src="components/com_hrms/js/maincalendar.min.js"></script>    
<script src="components/com_hrms/js/locales-all.min.js"></script>  
<!--<script src="<?php echo $templatePath; ?>/js/tinymce.js"></script>   -->
<script src="<?php echo $templatePath; ?>/js/select2.min.js"></script>   
<script src="<?php echo $templatePath; ?>/js/chosen.jquery.min.js"></script>   
<script src="<?php echo $templatePath; ?>/js/angular-ui-tinymce.js"></script>   
   
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>    
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-chosen-localytics/1.9.2/angular-chosen.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/flatpickr.min.js"></script>
<script src="components/com_hrms/js/main.js"></script>   
 
<script src="https://demo.themesberg.com/volt-pro/vendor/@popperjs/core/dist/umd/popper.min.js"></script> 
<script src="https://demo.themesberg.com/volt-pro/vendor/bootstrap/dist/js/bootstrap.min.js"></script> 
<script src="https://demo.themesberg.com/volt-pro/vendor/onscreen/dist/on-screen.umd.min.js"></script> 
<script src="https://demo.themesberg.com/volt-pro/vendor/nouislider/distribute/nouislider.min.js"></script> 
<script src="https://demo.themesberg.com/volt-pro/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script> 
<script src="https://demo.themesberg.com/volt-pro/vendor/countup.js/dist/countUp.umd.js"></script> 
<script src="https://demo.themesberg.com/volt-pro/vendor/apexcharts/dist/apexcharts.min.js"></script> 
<script src="https://demo.themesberg.com/volt-pro/vendor/simple-datatables/dist/umd/simple-datatables.js"></script> 
<script src="https://demo.themesberg.com/volt-pro/vendor/sweetalert2/dist/sweetalert2.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script> 
<script src="https://demo.themesberg.com/volt-pro/vendor/choices.js/public/assets/scripts/choices.min.js"></script> 
<script src="https://demo.themesberg.com/volt-pro/vendor/notyf/notyf.min.js"></script> 
<script src="https://demo.themesberg.com/volt-pro/vendor/leaflet/dist/leaflet.js"></script> 
<script src="https://demo.themesberg.com/volt-pro/vendor/svg-pan-zoom/dist/svg-pan-zoom.min.js"></script> 
<script src="https://demo.themesberg.com/volt-pro/vendor/svgmap/dist/svgMap.min.js"></script> 
<script src="https://demo.themesberg.com/volt-pro/vendor/simplebar/dist/simplebar.min.js"></script> 
<script src="https://demo.themesberg.com/volt-pro/vendor/sortablejs/Sortable.min.js"></script> 
<script async defer="defer" src="https://buttons.github.io/buttons.js"></script> 
<script src="<?php echo $templatePath; ?>/js/volt/volt.js"></script>  

  <script>
    var app = angular.module('myapp', ['ui.filters', 'localytics.directives', 'ngSanitize', 'ui.tinymce','ngCookies']);
    app.controller("Test", function ($scope) {
    $scope.tinymceOptions = {
    language : 'vi',
    menubar: false,
    plugins: 'link image fullscreen lists',
    toolbar: 'undo redo | bold underline italic | alignleft aligncenter alignright | bullist numlist insert/edit link |outdent indent fullscreen',
    branding: false
  };
    $scope.Tacgia =
        [
        {id:'1',name:'Tác Giả 1'},
        {id:'2',name:'Tác Giả 2'},
        {id:'3',name:'Tác Giả 3'},
        {id:'4',name:'Tác Giả 4'},
        {id:'5',name:'Tác Giả 5'}
    ]
      $scope.Listchude = [{ id: 1, Tenchude: "Sale", Chudecon: [{ id: 1, tenchudecon: " Child 1" }, { id: 2, tenchudecon: "Child 2" }] },
      { id: 1, tenchude: "Marketing", chudecon: [] }]
      $scope.ListTest = [
        {
          id: 1,
          tailieu: "Tài Liệu 1",
          tacgia: "https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png",
          chude: "Chủ Đề 1",
          ngaytao: "8/6/2021",
          tinhtrang: "Duyệt",
          noidung: "Đề nghị tất cả các cơ quan, đơn vị, tổ chức, doanh nghiệp, đoàn thể trên địa bàn Thành phố thực hiện nghiêm các biện pháp phòng chống dịch bệnh và quy định cách ly toàn xã hội theo Chỉ thị số 17. Bố trí cho cán bộ, công chức, viên chức, người lao động sử dụng công nghệ thông tin làm việc tại nhà, chỉ những người được phép mới đến làm việc trực tiếp trong trường hợp thật sự cần thiết như: trực chiến đấu, trực cơ quan, xử lý tài liệu mật và các nhiệm vụ cấp bách cần thiết khác theo yêu cầu gắn với trách nhiệm của người đứng đầu từng cơ quan, đơn vị và việc kiểm tra giám sát của chính quyền các cấp tại cơ sở."
        },
        {
          id: 2,
          tailieu: "Tài Liệu 2",
          tacgia: "https://scontent-hkg4-1.xx.fbcdn.net/v/t31.18172-8/18121323_619332001596572_2751862348460437617_o.jpg?_nc_cat=103&ccb=1-4&_nc_sid=09cbfe&_nc_ohc=bUprOH0BnTYAX-RsSw5&_nc_ht=scontent-hkg4-1.xx&oh=4ad3f01491b564e4ef9997ad07093d38&oe=61333161",
          chude: "Chủ Đề 2",
          ngaytao: "8/6/2021",
          tinhtrang: "Duyệt",
          noidung:"Tại các khu vực có nguy cơ “vùng da cam” gồm các nhà máy, cơ sở sản xuất, cơ quan, đơn vị, chợ, siêu thị, bệnh viện, cơ sở khám chữa bệnh."

        },
        {
          id: 3,
          tailieu: "Tài Liệu 3",
          tacgia: "https://cdn.bongdaplus.vn/Assets/Media/2018/02/01/56/bui-tien-dung-1.jpg",
          chude: "Chủ Đề 3",
          ngaytao: "8/6/2021",
          tinhtrang: "Không Duyệt",
          noidung:"Cơ quan y tế và chính quyền cơ sở chủ động thực hiện việc xét nghiệm nhanh kháng nguyên theo tình hình, mức độ dịch bệnh, linh hoạt trong từng tình huống đảm bảo đạt kết quả sàng lọc nhanh nhất, tranh thủ từng ngày, từng giờ, tránh bỏ sót nguy cơ lây nhiễm, đảm bảo hiệu quả cao nhất."
        },
        {
          id: 4,
          tailieu: "Tài Liệu 4",
          tacgia: "https://startuanit.net/wp-content/uploads/2021/05/New-Project-20.jpg",
          chude: "Chủ Đề 4",
          ngaytao: "8/6/2021",
          tinhtrang: "Không Duyệt",
          noidung:"Cơ quan y tế và chính quyền cơ sở chủ động thực hiện việc xét nghiệm nhanh kháng nguyên theo tình hình, mức độ dịch bệnh, linh hoạt trong từng tình huống đảm bảo đạt kết quả sàng lọc nhanh nhất, tranh thủ từng ngày, từng giờ, tránh bỏ sót nguy cơ lây nhiễm, đảm bảo hiệu quả cao nhất."
        },
        {
          id: 5,
          tailieu: "Tài Liệu 5",
          tacgia: "https://baoquocte.vn/stores/news_dataimages/nguyennga/072021/05/06/chuyen-nhuong-cau-thu-ronaldo-muon-gia-han-2-nam-man-utd-can-thanh-loc-doi-hinh-david-de-gea-quyet-tam-o-lai_2.jpg?rt=20210705061638",
          chude: "Chủ Đề 5",
          ngaytao: "8/6/2021",
          tinhtrang: "Không Duyệt",
          noidung:"Cơ quan y tế và chính quyền cơ sở chủ động thực hiện việc xét nghiệm nhanh kháng nguyên theo tình hình, mức độ dịch bệnh, linh hoạt trong từng tình huống đảm bảo đạt kết quả sàng lọc nhanh nhất, tranh thủ từng ngày, từng giờ, tránh bỏ sót nguy cơ lây nhiễm, đảm bảo hiệu quả cao nhất."
        },


      ];

      $scope.AddTest = function (data) {
        var row = {
          id: $scope.ListTest.length + 1,
          tailieu: data.Ten,
          tacgia: data.Chucvu,
          chude: data.Chinhanh,
          ngaytao: data.email,
          tinhtrang: data.phone,

        };
        $scope.ListTest.push(row);
        console.log($scope.ListTest);
      };
      $scope.XoaTest = function (data) {
        $scope.ListTest.splice(data, 1);
        console.log($scope.ListTest);
      };
      $scope.suanoidung = function (item) {
    
        $scope.sua = item;
        
      };
    });
  </script>
</body>
</html>
