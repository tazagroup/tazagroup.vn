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

<body>
<?php if ($this->countModules('crm-sidebar', true)) : ?>    
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
    <jdoc:include type="modules" name="crm-sidebar" style="none" />
  </div>
</nav>
<?php endif; ?>
<main class="content">
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
        </div>
<!--
        <ul class="navbar-nav align-items-center">
          <li class="nav-item dropdown"><a class="nav-link text-dark notification-bell unread dropdown-toggle" data-unread-notifications="true" href="#" role="button" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
            <svg class="icon icon-sm text-gray-900" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path>
            </svg>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-center mt-2 py-0">
              <div class="list-group list-group-flush"><a href="#" class="text-center text-primary fw-bold border-bottom border-light py-3">Notifications</a> <a href="../pages/calendar.html" class="list-group-item list-group-item-action border-bottom">
                <div class="row align-items-center">
                  <div class="col-auto"> <img alt="Image placeholder" src="https://tazagroup.vn/templates/tazagroup/images/logo-white.png" class="avatar-md rounded"></div>
                  <div class="col ps-0 ms-2">
                    <div class="d-flex justify-content-between align-items-center">
                      <div>
                        <h4 class="h6 mb-0 text-small">Jose Leos</h4>
                      </div>
                      <div class="text-end"><small class="text-danger">a few moments ago</small></div>
                    </div>
                    <p class="font-small mt-1 mb-0">Added you to an event "Project stand-up" tomorrow at 12:30 AM.</p>
                  </div>
                </div>
                </a><a href="../pages/tasks.html" class="list-group-item list-group-item-action border-bottom">
                <div class="row align-items-center">
                  <div class="col-auto"> <img alt="Image placeholder" src="../assets/img/team/profile-picture-2.jpg" class="avatar-md rounded"></div>
                  <div class="col ps-0 ms-2">
                    <div class="d-flex justify-content-between align-items-center">
                      <div>
                        <h4 class="h6 mb-0 text-small">Neil Sims</h4>
                      </div>
                      <div class="text-end"><small class="text-danger">2 hrs ago</small></div>
                    </div>
                    <p class="font-small mt-1 mb-0">You've been assigned a task for "Awesome new project".</p>
                  </div>
                </div>
                </a><a href="../pages/tasks.html" class="list-group-item list-group-item-action border-bottom">
                <div class="row align-items-center">
                  <div class="col-auto"> <img alt="Image placeholder" src="../assets/img/team/profile-picture-3.jpg" class="avatar-md rounded"></div>
                  <div class="col ps-0 m-2">
                    <div class="d-flex justify-content-between align-items-center">
                      <div>
                        <h4 class="h6 mb-0 text-small">Roberta Casas</h4>
                      </div>
                      <div class="text-end"><small>5 hrs ago</small></div>
                    </div>
                    <p class="font-small mt-1 mb-0">Tagged you in a document called "Financial plans",</p>
                  </div>
                </div>
                </a><a href="../pages/single-message.html" class="list-group-item list-group-item-action border-bottom">
                <div class="row align-items-center">
                  <div class="col-auto"> <img alt="Image placeholder" src="../assets/img/team/profile-picture-4.jpg" class="avatar-md rounded"></div>
                  <div class="col ps-0 ms-2">
                    <div class="d-flex justify-content-between align-items-center">
                      <div>
                        <h4 class="h6 mb-0 text-small">Joseph Garth</h4>
                      </div>
                      <div class="text-end"><small>1 d ago</small></div>
                    </div>
                    <p class="font-small mt-1 mb-0">New message: "Hey, what's up? All set for the presentation?"</p>
                  </div>
                </div>
                </a><a href="../pages/single-message.html" class="list-group-item list-group-item-action border-bottom">
                <div class="row align-items-center">
                  <div class="col-auto"> <img alt="Image placeholder" src="../assets/img/team/profile-picture-5.jpg" class="avatar-md rounded"></div>
                  <div class="col ps-0 ms-2">
                    <div class="d-flex justify-content-between align-items-center">
                      <div>
                        <h4 class="h6 mb-0 text-small">Bonnie Green</h4>
                      </div>
                      <div class="text-end"><small>2 hrs ago</small></div>
                    </div>
                    <p class="font-small mt-1 mb-0">New message: "We need to improve the UI/UX for the landing page."</p>
                  </div>
                </div>
                </a><a href="#" class="dropdown-item text-center fw-bold rounded-bottom py-3">
                <svg class="icon icon-xxs text-gray-400 me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                  <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                </svg>
                View all</a></div>
            </div>
          </li>
          <li class="nav-item dropdown ms-lg-3"><a class="nav-link dropdown-toggle pt-1 px-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="media d-flex align-items-center"><img class="avatar rounded-circle" alt="Image placeholder" src="https://tazagroup.vn/templates/tazagroup/images/logo-white.png">
              <div class="media-body ms-2 text-dark align-items-center d-none d-lg-block"><span class="mb-0 font-small fw-bold text-gray-900">Nhân Viên</span></div>
            </div>
            </a>
            <div class="dropdown-menu dashboard-dropdown dropdown-menu-end mt-2 py-1"><a class="dropdown-item d-flex align-items-center" href="#">
              <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path>
              </svg>
              My Profile </a><a class="dropdown-item d-flex align-items-center" href="#">
              <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
              </svg>
              Settings </a><a class="dropdown-item d-flex align-items-center" href="#">
              <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z" clip-rule="evenodd"></path>
              </svg>
              Messages </a><a class="dropdown-item d-flex align-items-center" href="#">
              <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.796a4.002 4.002 0 01-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 004 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0110 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 00-2.346.033L7.246 4.668zM12 10a2 2 0 11-4 0 2 2 0 014 0z" clip-rule="evenodd"></path>
              </svg>
              Support</a>
              <div role="separator" class="dropdown-divider my-1"></div>
              <a class="dropdown-item d-flex align-items-center" href="#">
              <svg class="dropdown-icon text-danger me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
              </svg>
              Logout</a></div>
          </li>
        </ul>
-->
      </div>
    </div>
  </nav>
  <div class="container-fluid px-0">
    <jdoc:include type="message" />
    <jdoc:include type="component" />
  </div>
  <?php if ($this->countModules('crm-footer', true)) : ?>
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
<!--
  <section id="installBanner" class="banner">
    <button id="installBtn" class="btn btn-primary">Install app</button>
	</section>
-->
</main>
<script src="https://demo.themesberg.com/volt-pro/vendor/@popperjs/core/dist/umd/popper.min.js"></script> 
<script src="https://demo.themesberg.com/volt-pro/vendor/bootstrap/dist/js/bootstrap.min.js"></script> 
<script src="https://demo.themesberg.com/volt-pro/vendor/onscreen/dist/on-screen.umd.min.js"></script> 
<script src="https://demo.themesberg.com/volt-pro/vendor/nouislider/distribute/nouislider.min.js"></script> 
<script src="https://demo.themesberg.com/volt-pro/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script> 
<script src="https://demo.themesberg.com/volt-pro/vendor/countup.js/dist/countUp.umd.js"></script> 
<script src="https://demo.themesberg.com/volt-pro/vendor/apexcharts/dist/apexcharts.min.js"></script> 
<script src="https://demo.themesberg.com/volt-pro/vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script> 
<script src="https://demo.themesberg.com/volt-pro/vendor/simple-datatables/dist/umd/simple-datatables.js"></script> 
<script src="https://demo.themesberg.com/volt-pro/vendor/sweetalert2/dist/sweetalert2.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script> 
<script src="https://demo.themesberg.com/volt-pro/vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script> 
<script src="https://demo.themesberg.com/volt-pro/vendor/fullcalendar/main.min.js"></script> 
<script src="https://demo.themesberg.com/volt-pro/vendor/dropzone/dist/min/dropzone.min.js"></script> 
<script src="https://demo.themesberg.com/volt-pro/vendor/choices.js/public/assets/scripts/choices.min.js"></script> 
<script src="https://demo.themesberg.com/volt-pro/vendor/notyf/notyf.min.js"></script> 
<script src="https://demo.themesberg.com/volt-pro/vendor/leaflet/dist/leaflet.js"></script> 
<script src="https://demo.themesberg.com/volt-pro/vendor/svg-pan-zoom/dist/svg-pan-zoom.min.js"></script> 
<script src="https://demo.themesberg.com/volt-pro/vendor/svgmap/dist/svgMap.min.js"></script> 
<script src="https://demo.themesberg.com/volt-pro/vendor/simplebar/dist/simplebar.min.js"></script> 
<script src="https://demo.themesberg.com/volt-pro/vendor/sortablejs/Sortable.min.js"></script> 
<script async defer="defer" src="https://buttons.github.io/buttons.js"></script> 
<script src="https://demo.themesberg.com/volt-pro/assets/js/volt.js"></script> 
<script
        type="text/javascript">(function () { window['__CF$cv$params'] = { r: '65da3e6d9d3608eb', m: '410bfe81ae6ca014df18fae73d2f21896f62ace4-1623408263-1800-ASSGPnn5/HUgM7tu7U615g10FJwdC67zfg5mrLWYgAiiq8WHuGt8huZvf7mZJdpC/JJch1I4Pb6b7cOb7KqiOgQYxTqTPdx9ar8dS7fzQU3T/33PpfHFnVqefwghwWjVrM3b3NugBDgrGLgxl1UwEW8=', s: [0x9ac5d39323, 0x64e6f80d04], } })();</script>
</body>
</html>
