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
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" ng-app="Site" ng-controller="Site">
<head>
<jdoc:include type="metas" />
<jdoc:include type="styles" />
<jdoc:include type="scripts" />
<link type="text/css" href="https://demo.themesberg.com/volt-pro/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
<link type="text/css" href="https://demo.themesberg.com/volt-pro/vendor/notyf/notyf.min.css" rel="stylesheet">
<link type="text/css" href="https://demo.themesberg.com/volt-pro/vendor/fullcalendar/main.min.css" rel="stylesheet">
<link type="text/css" href="https://demo.themesberg.com/volt-pro/vendor/apexcharts/dist/apexcharts.css" rel="stylesheet">
<link type="text/css" href="https://demo.themesberg.com/volt-pro/vendor/dropzone/dist/min/dropzone.min.css" rel="stylesheet">
<link type="text/css" href="https://demo.themesberg.com/volt-pro/vendor/choices.js/public/assets/styles/choices.min.css" rel="stylesheet">
<link type="text/css" href="https://demo.themesberg.com/volt-pro/vendor/leaflet/dist/leaflet.css" rel="stylesheet">
<link type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/flatpickr.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/css/select2.min.css"/>
 <link type="text/css" href="<?php echo $templatePath; ?>/css/vendor/volt.css" rel="stylesheet">  
</head>
<body>
<?php if ($this->countModules('hrm-sidebar', true)) : ?>
<nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
    <a class="navbar-brand me-lg-5"
            href="/dashboard">
        <img class="navbar-brand-dark" src="https://tazagroup.vn/templates/tazagroup/images/tazagroup-logo-white.png"> 
        <img class="navbar-brand-light" src="https://tazagroup.vn/templates/tazagroup/images/tazagroup-logo-white.png"></a>
  <div class="d-flex align-items-center">
    <button class="navbar-toggler d-lg-none collapsed" type="button"
                data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu"
                aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
  </div>
</nav>
<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
  <div class="sidebar-inner px-4 pt-3">
    <div class="user-card d-flex d-md-none justify-content-between justify-content-md-center pb-4">
      <div class="d-flex align-items-center">
        <img class="navbar-brand-dark w-25" src="https://tazagroup.vn/templates/tazagroup/images/tazagroup-logo-white.png">
      </div>
      <div class="collapse-close d-md-none"><a href="#sidebarMenu" data-bs-toggle="collapse"
                        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="true"
                        aria-label="Toggle navigation">
        <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
        </svg>
        </a></div>
    </div>
    <jdoc:include type="modules" name="hrm-sidebar" style="none" />
  </div>
</nav>
<?php endif; ?>
<main class="content">
 <?php if ($this->countModules('hrm-dangnhap', true)) : ?>
  <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
    <div class="container-fluid px-0">
      <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
        <div class="d-flex align-items-center">
          <button id="sidebar-toggle"
                            class="sidebar-toggle me-3 btn btn-icon-only d-none d-lg-inline-block align-items-center justify-content-center">
          <svg
                                class="toggle-icon" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                    clip-rule="evenodd"></path>
          </svg>
          </button>
<!--
          <form class="navbar-search form-inline" id="navbar-search-main">
            <div class="input-group input-group-merge search-bar"><span class="input-group-text"
                                    id="topbar-addon">
              <svg class="icon icon-xs"
                                        x-description="Heroicon name: solid/search" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd"></path>
              </svg>
              </span>
              <input type="text" class="form-control" id="topbarInputIconLeft"
                                    placeholder="Search" aria-label="Search" aria-describedby="topbar-addon">
            </div>
          </form>
-->
        </div>
          <ul class="navbar-nav align-items-center">
              <jdoc:include type="modules" name="hrm-thongbao" style="none" />
              <jdoc:include type="modules" name="hrm-dangnhap" style="none" />
         </ul>    
  
      </div>
    </div>
  </nav>
<?php endif; ?>    
  <div class="container-fluid py-4 px-0">
    <jdoc:include type="message" />
    <jdoc:include type="component" />
  </div>
  <?php if ($this->countModules('hrm-footer', true)) : ?>
  <footer class="bg-white rounded shadow p-5 mb-4 mt-4">
    <div class="row">
      <div class="col-12 col-md-4 col-xl-6 mb-4 mb-md-0">
        <p class="mb-0 text-center text-lg-start">© 2019-<span class="current-year"></span> <a
                            class="text-primary fw-normal" href="https://themesberg.com" target="_blank">Taza Group</a> </p>
      </div>
      <div class="col-12 col-md-8 col-xl-6 text-center text-lg-start">
        <ul class="list-inline list-group-flush list-group-borderless text-md-end mb-0">
          <li class="list-inline-item px-0 px-sm-2"><a href="#">
            <h3><i class="fab fa-facebook-square"></i></h3>
            </a></li>
          <li class="list-inline-item px-0 px-sm-2"><a href="#">
            <h3><i class="fab fa-google-plus-square"></i></h3>
            </a> </li>
          <li class="list-inline-item px-0 px-sm-2"><a href="#">
            <h3><i class="fab fa-youtube-square"></i></h3>
            </a></li>
          <li class="list-inline-item px-0 px-sm-2"><a href="#">
            <h3><i class="fab fa-instagram-square"></i></h3>
            </a> </li>
        </ul>
      </div>
    </div>
  </footer>
  <?php endif; ?>
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
<script src="<?php echo $templatePath; ?>/js/main.js"></script>     
<script>
document.addEventListener('focusin', function (e) {
     let closest = e.target.closest(".tox-tinymce-aux, .tox-dialog, .moxman-window, .tam-assetmanager-root");
     if (closest !== null && closest !== undefined) {
          e.stopImmediatePropagation();
     }
});
</script>    
    
    </script>  
</body>
</html>
