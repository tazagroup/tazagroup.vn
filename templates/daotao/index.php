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
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" ng-app="App" ng-controller="Test">
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
<link type="text/css" href="https://demo.themesberg.com/volt-pro/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
<link type="text/css" href="https://demo.themesberg.com/volt-pro/vendor/notyf/notyf.min.css" rel="stylesheet">
<link type="text/css" href="https://demo.themesberg.com/volt-pro/vendor/fullcalendar/main.min.css" rel="stylesheet">
<link type="text/css" href="https://demo.themesberg.com/volt-pro/vendor/apexcharts/dist/apexcharts.css" rel="stylesheet">
<link type="text/css" href="https://demo.themesberg.com/volt-pro/vendor/dropzone/dist/min/dropzone.min.css" rel="stylesheet">
<link type="text/css" href="https://demo.themesberg.com/volt-pro/vendor/choices.js/public/assets/styles/choices.min.css" rel="stylesheet">
<link type="text/css" href="https://demo.themesberg.com/volt-pro/vendor/leaflet/dist/leaflet.css" rel="stylesheet">
<link type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/flatpickr.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf_viewer.min.css"/>
 <link type="text/css" href="<?php echo $templatePath; ?>/css/vendor/volt.css" rel="stylesheet">  
</head>

<body>
   <?php if ($this->countModules('daotao-menu', true)) : ?>
                <jdoc:include type="modules" name="daotao-menu" style="none" />
<?php endif; ?>     
    
<main>
  <jdoc:include type="message" />
  <jdoc:include type="component" />
</main>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>     
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
<script src="https://tazagroup.vn/media/vendor/tinymce/tinymce.min.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-sanitize/1.8.2/angular-sanitize.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-cookies/1.8.2/angular-cookies.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/ngInfiniteScroll/1.3.0/ng-infinite-scroll.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui/0.4.0/angular-ui.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script> 
<script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.js"></script> 
<script src="<?php echo $templatePath; ?>/js/chosen.jquery.min.js"></script> 
<script src="<?php echo $templatePath; ?>/js/angular-ui-tinymce.js"></script>    
<script src="<?php echo $templatePath; ?>/js/ng-dropzone.min.js"></script>  
<script src="/components/com_hrms/js/maincalendar.min.js"></script>    
<script src="/components/com_hrms/js/locales-all.min.js"></script>    
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-chosen-localytics/1.9.2/angular-chosen.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/flatpickr.min.js"></script> 
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
</body>
</html>
