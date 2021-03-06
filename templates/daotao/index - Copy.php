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
         <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#addchude"><i class="fas fa-plus-circle me-2" ></i>Th??m Ch??? ?????</button>       
          <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#addkhoahoc"><i class="fas fa-plus-circle me-2" ></i>Th??m T??i Li???u</button>            
          <button class="btn btn-primary  " data-bs-toggle="modal" data-bs-target="#duyettailieu"><i class="fas fa-user-check me-2"></i>Duy???t T??i Li???u <span class="badge bg-danger">4</span></button>   
          
<div class="modal fade" id="addkhoahoc" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="h6 modal-title">Th??m T??i Li???u</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                   <div class="mb-3">
    <div class="input-group">
        <span class="input-group-text">
         T??n T??i Li???u
        </span>
       <input type="text" class="form-control " id="exampleFormControlInput1" placeholder="T??n T??i Li???u">
    </div>
</div>
              <div class="mb-3">
              
            </div>
              <div class="mb-3">
    <div class="input-group">
        <span class="input-group-text">
          Ch??? ?????
        </span>
        <select class="form-select" id="chude" aria-label="Default select example">
                <option selected>Vui L??ng Ch???n</option>
                <option value="1">Sale</option>
                <option value="2">Marketing</option>
              </select>
    </div>
</div>
   <div class="mb-3">
                    Gi???i Thi???u                 
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
          T??c Gi??? Ch??nh
        </span>
        <select class="form-select" id="tacgia">
                  <option selected>T??c Gi???</option>
                  <option >T??c Gi??? 1</option>
                  <option >T??c Gi??? 2</option>
                 
                </select>
    </div>
</div>
       <div class="mb-3">
             ?????ng T??c Gi??? 
    <select chosen class="form-control text-danger" ng-model="Lichhop.idChutri" ng-options="s.id as s.name for s in Tacgia">
                 <option value="" selected>Vui l??ng ch???n</option>
        </select>

           
   <div class="mb-3">
    <div class="input-group">
        <span class="input-group-text">
          T??m Ki???m
        </span>
        <input type="text" class="form-control" placeholder="T??m Ki???m">
    </div>
</div>       
           
           
           
           <select id="states1" class="w-100" name="states1[]" multiple="multiple">
    <option value="AK">T??c Gi??? 1</option>
    <option value="AK">T??c Gi??? 2</option>
    <option value="AK">T??c Gi??? 3</option>
    <option value="AK">T??c Gi??? 4</option>
</select>
    
</div>          
            </div>
            <div class="modal-footer">
                <button type="button" class="text-white btn btn-info ms-2">L??u</button>
                <button type="button" class="text-white btn btn-success ms-2">L??u V?? G???i Duy???t</button>
                <button type="button" class="text-white btn btn-danger ms-2" data-bs-dismiss="modal">????ng</button>
            </div>
        </div>
    </div>
</div>
  
 <div class="modal fade" id="capnhattailieu" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="h6 modal-title">C???p Nh???t T??i Li???u</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                   <div class="mb-3">
    <div class="input-group">
        <span class="input-group-text">
         T??n T??i Li???u
        </span>
       <input type="text" class="form-control " id="exampleFormControlInput1" placeholder="T??n T??i Li???u">
    </div>
</div>
              <div class="mb-3">
              
            </div>
              <div class="mb-3">
    <div class="input-group">
        <span class="input-group-text">
          Ch??? ?????
        </span>
        <select class="form-select" id="chude" aria-label="Default select example">
                <option selected>Vui L??ng Ch???n</option>
                <option value="1">Sale</option>
                <option value="2">Marketing</option>
              </select>
    </div>
</div>
   <div class="mb-3">

         Gi???i Thi???u

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
          T??c Gi??? Ch??nh
        </span>
        <select class="form-select" id="tacgia" aria-label="Default select example">
                  <option selected>T??c Gi???</option>
                  <option >T??c Gi??? 1</option>
                  <option >T??c Gi??? 2</option>
                 
                </select>
    </div>
</div>
       <div class="mb-3">
<div class="mb-3">
             ?????ng T??c Gi???       
           <select id="states" class="w-100" name="states[]" multiple="multiple">
    <option value="AK">T??c Gi??? 1</option>
    <option value="AK">T??c Gi??? 2</option>
    <option value="AK">T??c Gi??? 3</option>
    <option value="AK">T??c Gi??? 4</option>
</select>
    
</div>
</div>          
            </div>
            <div class="modal-footer">
                <button type="button" class="text-white btn btn-info ms-2">C???p Nh???t</button>
                <button type="button" class="text-white btn btn-success ms-2">C???p Nh???t V?? G???i Duy???t</button>
                <button type="button" class="text-white btn btn-danger ms-2" data-bs-dismiss="modal">????ng</button>
            </div>
        </div>
    </div>
</div>         
          
 <div class="modal fade" id="addchude" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <p class="modal-title" id="modalTitleNotify">TH??M CH??? ?????</p>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
   <div class="mb-3">
    <div class="input-group">
        <span class="input-group-text">
         T??n Ch??? ?????
        </span>
        <input type="text" class="form-control" placeholder="T??n Ch??? ?????">
    </div>
</div> 
                              
             <div class="mb-3">
    <div class="input-group">
        <span class="input-group-text">
          Ch??? ????? Cha
        </span>
        <select class="form-select" id="country" aria-label="Default select example">
    <option selected>Vui l??ng ch???n</option>
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
                          <button type="button" class="btn btn-sm btn-primary">Th??m</button>
                        </div>
                      </div>
                    </div>
                  </div>
          
    <div class="modal fade" id="duyettailieu" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <p class="modal-title" id="modalTitleNotify">Duy???t T??i Li???u</p>
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
                  <th>T??i Li???u Ngu???n</th>
                  <th>T??c Gi???</th>
                  <th>Ch??? ?????</th>
                  <th>
<div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center"><i class="fas fa-ellipsis-v me-2 my-auto"></i> Ng??y C???p Nh???t </div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
T??? Ng??y
             <input type="date" class="form-control text-danger my-2" ng-model="dl.from" />       
?????n Ng??y
        <input type="date" class="form-control text-danger my-2" ng-model="dl.to" />        
                     
                    </li>
                  </ul>
                </div>
                    </th>
                  <th>T??nh Tr???ng</th>
                  <th>Ch???c N??ng</th>
                </tr>
              </thead>
              <tbody>
              <tr>
                  <td>1</td>
                  <td>T??i Li???u 1</td>
                  <td><img ng-src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png" alt="" class="avatar rounded-circle text-primary" src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png">
                  <img ng-src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png" alt="" class="avatar rounded-circle text-primary" src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png">
                  <img ng-src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png" alt="" class="avatar rounded-circle text-primary" src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png">
                    </td>
                  <td>Ch??? ????? 1</td>
                  <td>8/6/2021</td>
                  <td>Ch??a Duy???t</td>
                  <td><i class="fas fa-trash px-2" ng-click="Xoarow(item)"></i></td>
                </tr>
                  
                  
  <tr>
                  <td>2</td>
                  <td>T??i Li???u 2</td>
                  <td>
                  <img ng-src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png" alt="" class="avatar rounded-circle text-primary" src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png">
                    </td>
                  <td>Ch??? ????? 2</td>
                  <td>8/6/2021</td>
                  <td>Ch???nh S???a</td>
                  <td><i class="fas fa-trash px-2" ng-click="Xoarow(item)"></i></td>
                </tr> 
                  
 <tr>
                  <td>3</td>
                  <td>T??i Li???u 3</td>
                  <td><img ng-src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png" alt="" class="avatar rounded-circle text-primary" src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png">
                  <img ng-src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png" alt="" class="avatar rounded-circle text-primary" src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png">
                  <img ng-src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png" alt="" class="avatar rounded-circle text-primary" src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png">
                    </td>
                  <td>Ch??? ????? 1</td>
                  <td>8/6/2021</td>
                  <td>Ch??a Duy???t</td>
                  <td><i class="fas fa-trash px-2" ng-click="Xoarow(item)"></i></td>
                </tr>                 
 <tr>
                  <td>4</td>
                  <td>T??i Li???u 4</td>
                  <td>
                  <img ng-src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png" alt="" class="avatar rounded-circle text-primary" src="https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png">
                    </td>
                  <td>Ch??? ????? 3</td>
                  <td>8/6/2021</td>
                  <td>Ch???nh S???a</td>
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
                    <p class="modal-title" id="modalTitleNotify">S???a N???i Dung</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="py-3 text-center">
                      <p>{{sua.noidung}}</p>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary">S???a</button>
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
            <div class="card-header p-2">Danh S??ch Ch??? ?????</div>
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
                  <th>T??i Li???u Ngu???n</th>
                  <th>T??c Gi???</th>
                  <th>Ch??? ?????</th>
                  <th>
<div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center"><i class="fas fa-ellipsis-v me-2 my-auto"></i> Ng??y t???o </div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
T??? Ng??y
             <input type="date" class="form-control text-danger my-2" ng-model="dl.from" />       
?????n Ng??y
        <input type="date" class="form-control text-danger my-2" ng-model="dl.to" />        
                     
                    </li>
                  </ul>
                </div>
                    </th>
                  <th>T??nh Tr???ng</th>
                  <th>Ch???c N??ng</th>
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
                    <p class="modal-title" id="modalTitleNotify">S???a N???i Dung</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="py-3 text-center">
                      <p>{{sua.noidung}}</p>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary">S???a</button>
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
        {id:'1',name:'T??c Gi??? 1'},
        {id:'2',name:'T??c Gi??? 2'},
        {id:'3',name:'T??c Gi??? 3'},
        {id:'4',name:'T??c Gi??? 4'},
        {id:'5',name:'T??c Gi??? 5'}
    ]
      $scope.Listchude = [{ id: 1, Tenchude: "Sale", Chudecon: [{ id: 1, tenchudecon: " Child 1" }, { id: 2, tenchudecon: "Child 2" }] },
      { id: 1, tenchude: "Marketing", chudecon: [] }]
      $scope.ListTest = [
        {
          id: 1,
          tailieu: "T??i Li???u 1",
          tacgia: "https://anh.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png",
          chude: "Ch??? ????? 1",
          ngaytao: "8/6/2021",
          tinhtrang: "Duy???t",
          noidung: "????? ngh??? t???t c??? c??c c?? quan, ????n v???, t??? ch???c, doanh nghi???p, ??o??n th??? tr??n ?????a b??n Th??nh ph??? th???c hi???n nghi??m c??c bi???n ph??p ph??ng ch???ng d???ch b???nh v?? quy ?????nh c??ch ly to??n x?? h???i theo Ch??? th??? s??? 17. B??? tr?? cho c??n b???, c??ng ch???c, vi??n ch???c, ng?????i lao ?????ng s??? d???ng c??ng ngh??? th??ng tin l??m vi???c t???i nh??, ch??? nh???ng ng?????i ???????c ph??p m???i ?????n l??m vi???c tr???c ti???p trong tr?????ng h???p th???t s??? c???n thi???t nh??: tr???c chi???n ?????u, tr???c c?? quan, x??? l?? t??i li???u m???t v?? c??c nhi???m v??? c???p b??ch c???n thi???t kh??c theo y??u c???u g???n v???i tr??ch nhi???m c???a ng?????i ?????ng ?????u t???ng c?? quan, ????n v??? v?? vi???c ki???m tra gi??m s??t c???a ch??nh quy???n c??c c???p t???i c?? s???."
        },
        {
          id: 2,
          tailieu: "T??i Li???u 2",
          tacgia: "https://scontent-hkg4-1.xx.fbcdn.net/v/t31.18172-8/18121323_619332001596572_2751862348460437617_o.jpg?_nc_cat=103&ccb=1-4&_nc_sid=09cbfe&_nc_ohc=bUprOH0BnTYAX-RsSw5&_nc_ht=scontent-hkg4-1.xx&oh=4ad3f01491b564e4ef9997ad07093d38&oe=61333161",
          chude: "Ch??? ????? 2",
          ngaytao: "8/6/2021",
          tinhtrang: "Duy???t",
          noidung:"T???i c??c khu v???c c?? nguy c?? ???v??ng da cam??? g???m c??c nh?? m??y, c?? s??? s???n xu???t, c?? quan, ????n v???, ch???, si??u th???, b???nh vi???n, c?? s??? kh??m ch???a b???nh."

        },
        {
          id: 3,
          tailieu: "T??i Li???u 3",
          tacgia: "https://cdn.bongdaplus.vn/Assets/Media/2018/02/01/56/bui-tien-dung-1.jpg",
          chude: "Ch??? ????? 3",
          ngaytao: "8/6/2021",
          tinhtrang: "Kh??ng Duy???t",
          noidung:"C?? quan y t??? v?? ch??nh quy???n c?? s??? ch??? ?????ng th???c hi???n vi???c x??t nghi???m nhanh kh??ng nguy??n theo t??nh h??nh, m???c ????? d???ch b???nh, linh ho???t trong t???ng t??nh hu???ng ?????m b???o ?????t k???t qu??? s??ng l???c nhanh nh???t, tranh th??? t???ng ng??y, t???ng gi???, tr??nh b??? s??t nguy c?? l??y nhi???m, ?????m b???o hi???u qu??? cao nh???t."
        },
        {
          id: 4,
          tailieu: "T??i Li???u 4",
          tacgia: "https://startuanit.net/wp-content/uploads/2021/05/New-Project-20.jpg",
          chude: "Ch??? ????? 4",
          ngaytao: "8/6/2021",
          tinhtrang: "Kh??ng Duy???t",
          noidung:"C?? quan y t??? v?? ch??nh quy???n c?? s??? ch??? ?????ng th???c hi???n vi???c x??t nghi???m nhanh kh??ng nguy??n theo t??nh h??nh, m???c ????? d???ch b???nh, linh ho???t trong t???ng t??nh hu???ng ?????m b???o ?????t k???t qu??? s??ng l???c nhanh nh???t, tranh th??? t???ng ng??y, t???ng gi???, tr??nh b??? s??t nguy c?? l??y nhi???m, ?????m b???o hi???u qu??? cao nh???t."
        },
        {
          id: 5,
          tailieu: "T??i Li???u 5",
          tacgia: "https://baoquocte.vn/stores/news_dataimages/nguyennga/072021/05/06/chuyen-nhuong-cau-thu-ronaldo-muon-gia-han-2-nam-man-utd-can-thanh-loc-doi-hinh-david-de-gea-quyet-tam-o-lai_2.jpg?rt=20210705061638",
          chude: "Ch??? ????? 5",
          ngaytao: "8/6/2021",
          tinhtrang: "Kh??ng Duy???t",
          noidung:"C?? quan y t??? v?? ch??nh quy???n c?? s??? ch??? ?????ng th???c hi???n vi???c x??t nghi???m nhanh kh??ng nguy??n theo t??nh h??nh, m???c ????? d???ch b???nh, linh ho???t trong t???ng t??nh hu???ng ?????m b???o ?????t k???t qu??? s??ng l???c nhanh nh???t, tranh th??? t???ng ng??y, t???ng gi???, tr??nh b??? s??t nguy c?? l??y nhi???m, ?????m b???o hi???u qu??? cao nh???t."
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
