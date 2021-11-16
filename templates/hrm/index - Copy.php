<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.cassiopeia
 *
 * @copyright   (C) 2017 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;

/** @var Joomla\CMS\Document\HtmlDocument $this */

$app = Factory::getApplication();
$wa  = $this->getWebAssetManager();

// Browsers support SVG favicons
$this->addHeadLink(HTMLHelper::_('image', 'joomla-favicon.svg', '', [], true, 1), 'icon', 'rel', ['type' => 'image/svg+xml']);
$this->addHeadLink(HTMLHelper::_('image', 'favicon.ico', '', [], true, 1), 'alternate icon', 'rel', ['type' => 'image/vnd.microsoft.icon']);
$this->addHeadLink(HTMLHelper::_('image', 'joomla-favicon-pinned.svg', '', [], true, 1), 'mask-icon', 'rel', ['color' => '#000']);

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = htmlspecialchars($app->get('sitename'), ENT_QUOTES, 'UTF-8');
$menu     = $app->getMenu()->getActive();
$pageclass = $menu !== null ? $menu->getParams()->get('pageclass_sfx', '') : '';

// Template path
$templatePath = 'templates/' . $this->template;

// Color Theme
$paramsColorName = $this->params->get('colorName', 'colors_standard');
$assetColorName  = 'theme.' . $paramsColorName;
$wa->registerAndUseStyle($assetColorName, $templatePath . '/css/global/' . $paramsColorName . '.css');
$this->getPreloadManager()->prefetch($wa->getAsset('style', $assetColorName)->getUri(), ['as' => 'style']);

// Use a font scheme if set in the template style options
$paramsFontScheme = $this->params->get('useFontScheme', false);

if ($paramsFontScheme)
{
	// Prefetch the stylesheet for the font scheme, actually we need to prefetch the font(s)
	$assetFontScheme  = 'fontscheme.' . $paramsFontScheme;
	$wa->registerAndUseStyle($assetFontScheme, $templatePath . '/css/global/' . $paramsFontScheme . '.css');
	$this->getPreloadManager()->prefetch($wa->getAsset('style', $assetFontScheme)->getUri(), ['as' => 'style']);
}

// Enable assets
$wa->usePreset('template.cassiopeia.' . ($this->direction === 'rtl' ? 'rtl' : 'ltr'))
	->useStyle('template.active.language')
	->useStyle('template.user')
	->useScript('template.user');

// Override 'template.active' asset to set correct ltr/rtl dependency
$wa->registerStyle('template.active', '', [], [], ['template.cassiopeia.' . ($this->direction === 'rtl' ? 'rtl' : 'ltr')]);

// Logo file or site title param
if ($this->params->get('logoFile'))
{
	$logo = '<img src="' . Uri::root(true) . '/' . htmlspecialchars($this->params->get('logoFile'), ENT_QUOTES) . '" alt="' . $sitename . '">';
}
elseif ($this->params->get('siteTitle'))
{
	$logo = '<span title="' . $sitename . '">' . htmlspecialchars($this->params->get('siteTitle'), ENT_COMPAT, 'UTF-8') . '</span>';
}
else
{
	$logo = HTMLHelper::_('image', 'logo.svg', $sitename, ['class' => 'logo d-inline-block'], true, 0);
}

$hasClass = '';

if ($this->countModules('sidebar-left', true))
{
	$hasClass .= ' has-sidebar-left';
}

if ($this->countModules('sidebar-right', true))
{
	$hasClass .= ' has-sidebar-right';
}

// Container
$wrapper = $this->params->get('fluidContainer') ? 'wrapper-fluid' : 'wrapper-static';

$this->setMetaData('viewport', 'width=device-width, initial-scale=1');

$stickyHeader = $this->params->get('stickyHeader') ? 'position-sticky sticky-top' : '';
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
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
    <link type="text/css" href="https://demo.themesberg.com/volt-pro/css/volt.css" rel="stylesheet">    
</head>

<body>
    <nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none"><a class="navbar-brand me-lg-5"
            href="../index.html"><img class="navbar-brand-dark" src="https://tazagroup.vn/templates/tazagroup/images/tazagroup-logo-white.png" alt="Volt logo">
            <img class="navbar-brand-light" src="../assets/img/brand/dark.svg" alt="Volt logo"></a>
        <div class="d-flex align-items-center"><button class="navbar-toggler d-lg-none collapsed" type="button"
                data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu"
                aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        </div>
    </nav>
    <nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
        <div class="sidebar-inner px-4 pt-3">
            <div class="user-card d-flex d-md-none justify-content-between justify-content-md-center pb-4">
                <div class="d-flex align-items-center">
                    <div class="avatar-lg me-4"><img src="../assets/img/team/profile-picture-3.jpg"
                            class="card-img-top rounded-circle border-white" alt="Bonnie Green"></div>
                    <div class="d-block">
                        <h2 class="h5 mb-3">Hi, Jane</h2><a href="../pages/examples/sign-in.html"
                            class="btn btn-secondary btn-sm d-inline-flex align-items-center"><svg
                                class="icon icon-xxs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                </path>
                            </svg> Sign Out</a>
                    </div>
                </div>
                <div class="collapse-close d-md-none"><a href="#sidebarMenu" data-bs-toggle="collapse"
                        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="true"
                        aria-label="Toggle navigation"><svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg></a></div>
            </div>
            <ul class="nav flex-column pt-3 pt-md-0">
                <li class="nav-item"><a href="../index.html" class="nav-link d-flex align-items-center"><span
                            class="sidebar-icon"><img src="https://tazagroup.vn/templates/tazagroup/images/tazagroup-logo-white.png" height="20" width="20"
                                alt="Volt Logo"> </span><span class="mt-1 sidebar-text">Volt Overview</span></a></li>
                <li class="nav-item"><span class="nav-link collapsed d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse" data-bs-target="#submenu-dashboard"><span><span
                                class="sidebar-icon"><svg class="icon icon-xs me-2" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                    <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                                </svg> </span><span class="sidebar-text">Dashboard</span> </span><span
                            class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg></span></span>
                    <div class="multi-level collapse" role="list" id="submenu-dashboard" aria-expanded="false">
                        <ul class="flex-column nav">
                            <li class="nav-item"><a href="../pages/dashboard/dashboard.html" class="nav-link"><span
                                        class="sidebar-text-contracted">O</span> <span
                                        class="sidebar-text">Overview</span></a></li>
                            <li class="nav-item"><a href="../pages/dashboard/traffic-sources.html"
                                    class="nav-link"><span class="sidebar-text-contracted">T</span> <span
                                        class="sidebar-text">All Traffic</span></a></li>
                            <li class="nav-item"><a href="../pages/dashboard/app-analysis.html" class="nav-link"><span
                                        class="sidebar-text-contracted">P</span> <span class="sidebar-text">Product
                                        Analysis</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item active"><a href="../pages/kanban.html"
                        class="nav-link d-flex align-items-center justify-content-between"><span><span
                                class="sidebar-icon"><svg class="icon icon-xs me-2" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                    </path>
                                </svg> </span><span class="sidebar-text">Kanban</span></span></a></li>
                <li class="nav-item"><a href="../pages/messages.html"
                        class="nav-link d-flex align-items-center justify-content-between"><span><span
                                class="sidebar-icon"><svg class="icon icon-xs me-2" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z">
                                    </path>
                                    <path
                                        d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z">
                                    </path>
                                </svg> </span><span class="sidebar-text">Messages</span> </span><span
                            class="badge badge-sm bg-danger badge-pill notification-count">4</span></a></li>
                <li class="nav-item"><a href="../pages/users.html" class="nav-link"><span class="sidebar-icon"><svg
                                class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z">
                                </path>
                            </svg> </span><span class="sidebar-text">Users List</span></a></li>
                <li class="nav-item"><a href="../pages/transactions.html" class="nav-link"><span
                            class="sidebar-icon"><svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path>
                                <path fill-rule="evenodd"
                                    d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"
                                    clip-rule="evenodd"></path>
                            </svg> </span><span class="sidebar-text">Transactions</span></a></li>
                <li class="nav-item"><a href="../pages/tasks.html" class="nav-link"><span class="sidebar-icon"><svg
                                class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                <path fill-rule="evenodd"
                                    d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                    clip-rule="evenodd"></path>
                            </svg> </span><span class="sidebar-text">Task List</span></a></li>
                <li class="nav-item"><a href="../pages/settings.html" class="nav-link"><span class="sidebar-icon"><svg
                                class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                    clip-rule="evenodd"></path>
                            </svg> </span><span class="sidebar-text">Settings</span></a></li>
                <li class="nav-item"><a href="../pages/calendar.html" class="nav-link"><span class="sidebar-icon"><svg
                                class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                    clip-rule="evenodd"></path>
                            </svg> </span><span class="sidebar-text">Calendar</span></a></li>
                <li class="nav-item"><a href="../pages/map.html" class="nav-link"><span class="sidebar-icon"><svg
                                class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd"></path>
                            </svg> </span><span class="sidebar-text">Map</span></a></li>
                <li class="nav-item"><span class="nav-link collapsed d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse" data-bs-target="#submenu-app"><span><span class="sidebar-icon"><svg
                                    class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z"
                                        clip-rule="evenodd"></path>
                                </svg> </span><span class="sidebar-text">Tables</span> </span><span
                            class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg></span></span>
                    <div class="multi-level collapse" role="list" id="submenu-app" aria-expanded="false">
                        <ul class="flex-column nav">
                            <li class="nav-item"><a class="nav-link" href="../pages/tables/datatables.html"><span
                                        class="sidebar-text-contracted">D</span> <span
                                        class="sidebar-text">DataTables</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="../pages/tables/bootstrap-tables.html"><span
                                        class="sidebar-text-contracted">B</span> <span class="sidebar-text">Bootstrap
                                        Tables</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item"><span class="nav-link collapsed d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse" data-bs-target="#submenu-pages"><span><span class="sidebar-icon"><svg
                                    class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z"
                                        clip-rule="evenodd"></path>
                                    <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path>
                                </svg> </span><span class="sidebar-text">Page examples</span> </span><span
                            class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg></span></span>
                    <div class="multi-level collapse" role="list" id="submenu-pages" aria-expanded="false">
                        <ul class="flex-column nav">
                            <li class="nav-item"><a class="nav-link" href="../pages/examples/pricing.html"><span
                                        class="sidebar-text-contracted">P</span> <span
                                        class="sidebar-text">Pricing</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="../pages/examples/billing.html"><span
                                        class="sidebar-text-contracted">B</span> <span
                                        class="sidebar-text">Billing</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="../pages/examples/invoice.html"><span
                                        class="sidebar-text-contracted">I</span> <span
                                        class="sidebar-text">Invoice</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="../pages/examples/sign-in.html"><span
                                        class="sidebar-text-contracted">S</span> <span class="sidebar-text">Sign
                                        In</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="../pages/examples/sign-up.html"><span
                                        class="sidebar-text-contracted">S</span> <span class="sidebar-text">Sign
                                        Up</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="../pages/examples/forgot-password.html"><span
                                        class="sidebar-text-contracted">F</span> <span class="sidebar-text">Forgot
                                        password</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="../pages/examples/reset-password.html"><span
                                        class="sidebar-text-contracted">R</span> <span class="sidebar-text">Reset
                                        password</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="../pages/examples/lock.html"><span
                                        class="sidebar-text-contracted">L</span> <span
                                        class="sidebar-text">Lock</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="../pages/examples/404.html"><span
                                        class="sidebar-text-contracted">4</span> <span class="sidebar-text">404 Not
                                        Found</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="../pages/examples/500.html"><span
                                        class="sidebar-text-contracted">5</span> <span class="sidebar-text">500 Not
                                        Found</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item"><span class="nav-link collapsed d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse" data-bs-target="#submenu-components"><span><span
                                class="sidebar-icon"><svg class="icon icon-xs me-2" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"></path>
                                    <path fill-rule="evenodd"
                                        d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg> </span><span class="sidebar-text">Components</span> </span><span
                            class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg></span></span>
                    <div class="multi-level collapse" role="list" id="submenu-components" aria-expanded="false">
                        <ul class="flex-column nav">
                            <li class="nav-item"><a class="nav-link" target="_blank"
                                    href="https://themesberg.com/docs/volt-bootstrap-5-dashboard/components/accordions/"><span
                                        class="sidebar-text-contracted">A</span> <span class="sidebar-text">All
                                        Components</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="../pages/components/buttons.html"><span
                                        class="sidebar-text-contracted">B</span> <span
                                        class="sidebar-text">Buttons</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="../pages/components/notifications.html"><span
                                        class="sidebar-text-contracted">N</span> <span
                                        class="sidebar-text">Notifications</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="../pages/components/forms.html"><span
                                        class="sidebar-text-contracted">F</span> <span
                                        class="sidebar-text">Forms</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="../pages/components/modals.html"><span
                                        class="sidebar-text-contracted">M</span> <span
                                        class="sidebar-text">Modals</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="../pages/components/typography.html"><span
                                        class="sidebar-text-contracted">T</span> <span
                                        class="sidebar-text">Typography</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item"><a href="../pages/widgets.html" class="nav-link"><span class="sidebar-icon"><svg
                                class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z">
                                </path>
                            </svg> </span><span class="sidebar-text">Widgets</span></a></li>
                <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>
                <li class="nav-item"><a
                        href="https://themesberg.com/docs/volt-bootstrap-5-dashboard/getting-started/quick-start/"
                        target="_blank" class="nav-link d-flex align-items-center"><span class="sidebar-icon"><svg
                                class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                    clip-rule="evenodd"></path>
                            </svg> </span><span class="sidebar-text">Documentation <span
                                class="badge bg-secondary ms-1 text-gray-800 badge-sm">v1.4</span></span></a></li>
                <li class="nav-item"><a
                        href="https://themesberg.com/product/admin-dashboard/volt-premium-bootstrap-5-dashboard"
                        target="_blank" class="nav-link d-flex align-items-center"><span class="sidebar-icon"><svg
                                class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                                </path>
                            </svg> </span><span class="sidebar-text">Buy now</span></a></li>
                <li class="nav-item"><a href="https://themesberg.com" target="_blank"
                        class="nav-link d-flex align-items-center"><span class="sidebar-icon"><img
                                src="https://tazagroup.vn/templates/tazagroup/images/tazagroup-logo-white.png" height="20" width="28" alt="Themesberg Logo">
                        </span><span class="sidebar-text">Themesberg</span></a></li>
            </ul>
        </div>
    </nav>
    <main class="content">
        <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
            <div class="container-fluid px-0">
                <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
                    <div class="d-flex align-items-center"><button id="sidebar-toggle"
                            class="sidebar-toggle me-3 btn btn-icon-only d-none d-lg-inline-block align-items-center justify-content-center"><svg
                                class="toggle-icon" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg></button>
                        <form class="navbar-search form-inline" id="navbar-search-main">
                            <div class="input-group input-group-merge search-bar"><span class="input-group-text"
                                    id="topbar-addon"><svg class="icon icon-xs"
                                        x-description="Heroicon name: solid/search" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd"></path>
                                    </svg> </span><input type="text" class="form-control" id="topbarInputIconLeft"
                                    placeholder="Search" aria-label="Search" aria-describedby="topbar-addon"></div>
                        </form>
                    </div>
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item dropdown"><a
                                class="nav-link text-dark notification-bell unread dropdown-toggle"
                                data-unread-notifications="true" href="#" role="button" data-bs-toggle="dropdown"
                                data-bs-display="static" aria-expanded="false"><svg class="icon icon-sm text-gray-900"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z">
                                    </path>
                                </svg></a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-center mt-2 py-0">
                                <div class="list-group list-group-flush"><a href="#"
                                        class="text-center text-primary fw-bold border-bottom border-light py-3">Notifications</a>
                                    <a href="../pages/calendar.html"
                                        class="list-group-item list-group-item-action border-bottom">
                                        <div class="row align-items-center">
                                            <div class="col-auto"> <img alt="Image placeholder"
                                                    src="../assets/img/team/profile-picture-1.jpg"
                                                    class="avatar-md rounded"></div>
                                            <div class="col ps-0 ms-2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4 class="h6 mb-0 text-small">Jose Leos</h4>
                                                    </div>
                                                    <div class="text-end"><small class="text-danger">a few moments
                                                            ago</small></div>
                                                </div>
                                                <p class="font-small mt-1 mb-0">Added you to an event "Project stand-up"
                                                    tomorrow at 12:30 AM.</p>
                                            </div>
                                        </div>
                                    </a><a href="../pages/tasks.html"
                                        class="list-group-item list-group-item-action border-bottom">
                                        <div class="row align-items-center">
                                            <div class="col-auto"> <img alt="Image placeholder"
                                                    src="../assets/img/team/profile-picture-2.jpg"
                                                    class="avatar-md rounded"></div>
                                            <div class="col ps-0 ms-2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4 class="h6 mb-0 text-small">Neil Sims</h4>
                                                    </div>
                                                    <div class="text-end"><small class="text-danger">2 hrs ago</small>
                                                    </div>
                                                </div>
                                                <p class="font-small mt-1 mb-0">You've been assigned a task for "Awesome
                                                    new project".</p>
                                            </div>
                                        </div>
                                    </a><a href="../pages/tasks.html"
                                        class="list-group-item list-group-item-action border-bottom">
                                        <div class="row align-items-center">
                                            <div class="col-auto"> <img alt="Image placeholder"
                                                    src="../assets/img/team/profile-picture-3.jpg"
                                                    class="avatar-md rounded"></div>
                                            <div class="col ps-0 m-2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4 class="h6 mb-0 text-small">Roberta Casas</h4>
                                                    </div>
                                                    <div class="text-end"><small>5 hrs ago</small></div>
                                                </div>
                                                <p class="font-small mt-1 mb-0">Tagged you in a document called
                                                    "Financial plans",</p>
                                            </div>
                                        </div>
                                    </a><a href="../pages/single-message.html"
                                        class="list-group-item list-group-item-action border-bottom">
                                        <div class="row align-items-center">
                                            <div class="col-auto"> <img alt="Image placeholder"
                                                    src="../assets/img/team/profile-picture-4.jpg"
                                                    class="avatar-md rounded"></div>
                                            <div class="col ps-0 ms-2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4 class="h6 mb-0 text-small">Joseph Garth</h4>
                                                    </div>
                                                    <div class="text-end"><small>1 d ago</small></div>
                                                </div>
                                                <p class="font-small mt-1 mb-0">New message: "Hey, what's up? All set
                                                    for the presentation?"</p>
                                            </div>
                                        </div>
                                    </a><a href="../pages/single-message.html"
                                        class="list-group-item list-group-item-action border-bottom">
                                        <div class="row align-items-center">
                                            <div class="col-auto"> <img alt="Image placeholder"
                                                    src="../assets/img/team/profile-picture-5.jpg"
                                                    class="avatar-md rounded"></div>
                                            <div class="col ps-0 ms-2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4 class="h6 mb-0 text-small">Bonnie Green</h4>
                                                    </div>
                                                    <div class="text-end"><small>2 hrs ago</small></div>
                                                </div>
                                                <p class="font-small mt-1 mb-0">New message: "We need to improve the
                                                    UI/UX for the landing page."</p>
                                            </div>
                                        </div>
                                    </a><a href="#" class="dropdown-item text-center fw-bold rounded-bottom py-3"><svg
                                            class="icon icon-xxs text-gray-400 me-1" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                            <path fill-rule="evenodd"
                                                d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                clip-rule="evenodd"></path>
                                        </svg> View all</a></div>
                            </div>
                        </li>
                        <li class="nav-item dropdown ms-lg-3"><a class="nav-link dropdown-toggle pt-1 px-0" href="#"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="media d-flex align-items-center"><img class="avatar rounded-circle"
                                        alt="Image placeholder" src="../assets/img/team/profile-picture-3.jpg">
                                    <div class="media-body ms-2 text-dark align-items-center d-none d-lg-block"><span
                                            class="mb-0 font-small fw-bold text-gray-900">Bonnie Green</span></div>
                                </div>
                            </a>
                            <div class="dropdown-menu dashboard-dropdown dropdown-menu-end mt-2 py-1"><a
                                    class="dropdown-item d-flex align-items-center" href="#"><svg
                                        class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                            clip-rule="evenodd"></path>
                                    </svg> My Profile </a><a class="dropdown-item d-flex align-items-center"
                                    href="#"><svg class="dropdown-icon text-gray-400 me-2" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                            clip-rule="evenodd"></path>
                                    </svg> Settings </a><a class="dropdown-item d-flex align-items-center" href="#"><svg
                                        class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z"
                                            clip-rule="evenodd"></path>
                                    </svg> Messages </a><a class="dropdown-item d-flex align-items-center" href="#"><svg
                                        class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.796a4.002 4.002 0 01-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 004 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0110 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 00-2.346.033L7.246 4.668zM12 10a2 2 0 11-4 0 2 2 0 014 0z"
                                            clip-rule="evenodd"></path>
                                    </svg> Support</a>
                                <div role="separator" class="dropdown-divider my-1"></div><a
                                    class="dropdown-item d-flex align-items-center" href="#"><svg
                                        class="dropdown-icon text-danger me-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                        </path>
                                    </svg> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid px-3">
            <div class="row mt-4 mb-3">
                <div class="col-6 d-flex justify-content-between ps-0">
                    <div class="me-lg-3">
                        <div class="dropdown"><button
                                class="btn btn-secondary d-inline-flex align-items-center me-2 dropdown-toggle"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg
                                    class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg> New Task</button>
                            <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1"><a
                                    class="dropdown-item d-flex align-items-center" href="#"><svg
                                        class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z">
                                        </path>
                                    </svg> Add User </a><a class="dropdown-item d-flex align-items-center" href="#"><svg
                                        class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z">
                                        </path>
                                    </svg> Add Widget </a><a class="dropdown-item d-flex align-items-center"
                                    href="#"><svg class="dropdown-icon text-gray-400 me-2" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z">
                                        </path>
                                        <path d="M9 13h2v5a1 1 0 11-2 0v-5z"></path>
                                    </svg> Upload Files </a><a class="dropdown-item d-flex align-items-center"
                                    href="#"><svg class="dropdown-icon text-gray-400 me-2" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg> Preview Security</a>
                                <div role="separator" class="dropdown-divider my-1"></div><a
                                    class="dropdown-item d-flex align-items-center" href="#"><svg
                                        class="dropdown-icon text-danger me-2" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z"
                                            clip-rule="evenodd"></path>
                                    </svg> Upgrade to Pro</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 px-0 text-end">
                    <div class="btn-group"><button class="btn btn-gray-800"><svg class="icon icon-xs text-white"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"></path>
                                <path fill-rule="evenodd"
                                    d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg></button> <button class="btn btn-gray-800 text-white"><svg
                                class="icon icon-xs text-white" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg></button> <button class="btn btn-gray-800 text-white"><svg
                                class="icon icon-xs text-white" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg></button></div>
                </div>
            </div>
        </div>
        <div class="container-fluid kanban-container py-4 px-0">
            <div class="row d-flex flex-nowrap">
                <div class="col-12 col-lg-6 col-xl-4 col-xxl-3">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fs-6 fw-bold mb-0">To do</h5>
                        <div class="dropdown"><button type="button" class="btn btn-sm fs-6 px-1 py-0 dropdown-toggle"
                                id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"><svg
                                    class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                    </path>
                                </svg></button>
                            <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1"><a
                                    class="dropdown-item d-flex align-items-center" href="#"><svg
                                        class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM14 11a1 1 0 011 1v1h1a1 1 0 110 2h-1v1a1 1 0 11-2 0v-1h-1a1 1 0 110-2h1v-1a1 1 0 011-1z">
                                        </path>
                                    </svg> Add Card </a><a class="dropdown-item d-flex align-items-center" href="#"><svg
                                        class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 2a1 1 0 000 2h2a1 1 0 100-2H8z"></path>
                                        <path
                                            d="M3 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v6h-4.586l1.293-1.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L10.414 13H15v3a2 2 0 01-2 2H5a2 2 0 01-2-2V5zM15 11h2a1 1 0 110 2h-2v-2z">
                                        </path>
                                    </svg> Copy List </a><a class="dropdown-item d-flex align-items-center"
                                    href="#"><svg class="dropdown-icon text-gray-400 me-2" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg> Move List </a><a class="dropdown-item d-flex align-items-center"
                                    href="#"><svg class="dropdown-icon text-gray-400 me-2" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                        <path fill-rule="evenodd"
                                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                            clip-rule="evenodd"></path>
                                    </svg> Watch</a>
                                <div role="separator" class="dropdown-divider my-1"></div><a
                                    class="dropdown-item d-flex align-items-center" href="#"><svg
                                        class="dropdown-icon text-danger me-2" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg> Remove</a>
                            </div>
                        </div>
                    </div>
                    <div id="kanbanColumn1" class="list-group kanban-list">
                        <div class="card border-0 shadow p-4">
                            <div
                                class="card-header d-flex align-items-center justify-content-between border-0 p-0 mb-3">
                                <h3 class="h5 mb-0">variables.scss problems</h3>
                                <div>
                                    <div class="dropdown"><button type="button"
                                            class="btn btn-sm fs-6 px-1 py-0 dropdown-toggle" id="dropdownMenuLink"
                                            data-bs-toggle="dropdown" aria-expanded="false"><svg
                                                class="icon icon-xs text-gray-500" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                                </path>
                                                <path fill-rule="evenodd"
                                                    d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                    clip-rule="evenodd"></path>
                                            </svg></button>
                                        <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1"><a
                                                class="dropdown-item d-flex align-items-center" href="#"
                                                data-bs-toggle="modal" data-bs-target="#editTaskModal"><svg
                                                    class="dropdown-icon text-gray-400 me-2" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg> Edit Task </a><a class="dropdown-item d-flex align-items-center"
                                                href="#"><svg class="dropdown-icon text-gray-400 me-2"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 2a1 1 0 000 2h2a1 1 0 100-2H8z"></path>
                                                    <path
                                                        d="M3 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v6h-4.586l1.293-1.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L10.414 13H15v3a2 2 0 01-2 2H5a2 2 0 01-2-2V5zM15 11h2a1 1 0 110 2h-2v-2z">
                                                    </path>
                                                </svg> Copy Task </a><a class="dropdown-item d-flex align-items-center"
                                                href="#"><svg class="dropdown-icon text-gray-400 me-2"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                    </path>
                                                </svg> Add to favorites</a>
                                            <div role="separator" class="dropdown-divider my-1"></div><a
                                                class="dropdown-item d-flex align-items-center" href="#"><svg
                                                    class="dropdown-icon text-danger me-2" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg> Remove</a>
                                        </div>
                                        <div class="dropdown-menu dashboard-dropdown dropdown-menu-start py-0"
                                            aria-labelledby="dropdownMenuLink"><a
                                                class="dropdown-item fw-normal rounded-top" href="#"
                                                data-bs-toggle="modal" data-bs-target="#editTaskModal"><span
                                                    class="fas fa-edit"></span>Edit task</a> <a
                                                class="dropdown-item fw-normal" href="#"><span
                                                    class="far fa-clone"></span>Copy Task</a> <a
                                                class="dropdown-item fw-normal" href="#"><span
                                                    class="far fa-star"></span> Add to favorites</a>
                                            <div role="separator" class="dropdown-divider my-0"></div><a
                                                class="dropdown-item fw-normal text-danger rounded-bottom"
                                                href="#"><span class="fas fa-trash-alt"></span>Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <p>On line 672 you define $table_variants. Each instance of "color-level" needs to be
                                    changed to "shift-color".</p>
                                <h5 class="fs-6 fw-normal mt-4">3 Assignees</h5>
                                <div class="avatar-group"><a href="#" class="avatar" data-bs-toggle="tooltip"
                                        data-original-title="Ryan Tompson" data-bs-original-title="Ryan Tompson"
                                        title="Ryan Tompson"><img class="rounded" alt="Image placeholder"
                                            src="../assets/img/team/profile-picture-1.jpg"> </a><a href="#"
                                        class="avatar" data-bs-toggle="tooltip" data-original-title="Bonnie Green"
                                        data-bs-original-title="Bonnie Green" title="Bonnie Green"><img class="rounded"
                                            alt="Image placeholder" src="../assets/img/team/profile-picture-3.jpg">
                                    </a><a href="#" class="avatar" data-bs-toggle="tooltip"
                                        data-original-title="Alexander Smith" data-bs-original-title="Alexander Smith"
                                        title="Alexander Smith"><img class="rounded" alt="Image placeholder"
                                            src="../assets/img/team/profile-picture-2.jpg"></a></div>
                            </div>
                        </div>
                        <div class="card border-0 shadow p-4">
                            <div
                                class="card-header d-flex align-items-center justify-content-between border-0 p-0 mb-3">
                                <h3 class="h5 mb-0">Redesign homepage</h3>
                                <div>
                                    <div class="dropdown"><button type="button"
                                            class="btn btn-sm fs-6 px-1 py-0 dropdown-toggle" id="dropdownMenuLink"
                                            data-bs-toggle="dropdown" aria-expanded="false"><svg
                                                class="icon icon-xs text-gray-500" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                                </path>
                                                <path fill-rule="evenodd"
                                                    d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                    clip-rule="evenodd"></path>
                                            </svg></button>
                                        <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1"><a
                                                class="dropdown-item d-flex align-items-center" href="#"
                                                data-bs-toggle="modal" data-bs-target="#editTaskModal"><svg
                                                    class="dropdown-icon text-gray-400 me-2" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg> Edit Task </a><a class="dropdown-item d-flex align-items-center"
                                                href="#"><svg class="dropdown-icon text-gray-400 me-2"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 2a1 1 0 000 2h2a1 1 0 100-2H8z"></path>
                                                    <path
                                                        d="M3 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v6h-4.586l1.293-1.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L10.414 13H15v3a2 2 0 01-2 2H5a2 2 0 01-2-2V5zM15 11h2a1 1 0 110 2h-2v-2z">
                                                    </path>
                                                </svg> Copy Task </a><a class="dropdown-item d-flex align-items-center"
                                                href="#"><svg class="dropdown-icon text-gray-400 me-2"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                    </path>
                                                </svg> Add to favorites</a>
                                            <div role="separator" class="dropdown-divider my-1"></div><a
                                                class="dropdown-item d-flex align-items-center" href="#"><svg
                                                    class="dropdown-icon text-danger me-2" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg> Remove</a>
                                        </div>
                                        <div class="dropdown-menu dashboard-dropdown dropdown-menu-start py-0"
                                            aria-labelledby="dropdownMenuLink"><a
                                                class="dropdown-item fw-normal rounded-top" href="#"
                                                data-bs-toggle="modal" data-bs-target="#editTaskModal"><span
                                                    class="fas fa-edit"></span>Edit task</a> <a
                                                class="dropdown-item fw-normal" href="#"><span
                                                    class="far fa-clone"></span>Copy Task</a> <a
                                                class="dropdown-item fw-normal" href="#"><span
                                                    class="far fa-star"></span> Add to favorites</a>
                                            <div role="separator" class="dropdown-divider my-0"></div><a
                                                class="dropdown-item fw-normal text-danger rounded-bottom"
                                                href="#"><span class="fas fa-trash-alt"></span>Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0"><img src="../assets/img/themesberg-mockup.jpg"
                                    class="card-img-top mb-2 mb-lg-3" alt="themesberg marketplace">
                                <p>On line 672 you define $table_variants. Each instance of "color-level" needs to be
                                    changed to "shift-color".</p>
                                <h5 class="fs-6 fw-normal mt-4">2 Assignees</h5>
                                <div class="avatar-group"><a href="#" class="avatar" data-bs-toggle="tooltip"
                                        data-original-title="Ryan Tompson" data-bs-original-title="Ryan Tompson"
                                        title="Ryan Tompson"><img class="rounded" alt="Image placeholder"
                                            src="../assets/img/team/profile-picture-1.jpg"> </a><a href="#"
                                        class="avatar" data-bs-toggle="tooltip" data-original-title="Bonnie Green"
                                        data-bs-original-title="Bonnie Green" title="Bonnie Green"><img class="rounded"
                                            alt="Image placeholder" src="../assets/img/team/profile-picture-3.jpg"></a>
                                </div>
                            </div>
                        </div>
                        <div class="card border-0 shadow p-4">
                            <div
                                class="card-header d-flex align-items-center justify-content-between border-0 p-0 mb-2">
                                <h3 class="h5 mb-0">variables.scss problems</h3>
                                <div>
                                    <div class="dropdown"><button type="button"
                                            class="btn btn-sm fs-6 px-1 py-0 dropdown-toggle" id="dropdownMenuLink"
                                            data-bs-toggle="dropdown" aria-expanded="false"><svg
                                                class="icon icon-xs text-gray-500" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                                </path>
                                                <path fill-rule="evenodd"
                                                    d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                    clip-rule="evenodd"></path>
                                            </svg></button>
                                        <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1"><a
                                                class="dropdown-item d-flex align-items-center" href="#"
                                                data-bs-toggle="modal" data-bs-target="#editTaskModal"><svg
                                                    class="dropdown-icon text-gray-400 me-2" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg> Edit Task </a><a class="dropdown-item d-flex align-items-center"
                                                href="#"><svg class="dropdown-icon text-gray-400 me-2"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 2a1 1 0 000 2h2a1 1 0 100-2H8z"></path>
                                                    <path
                                                        d="M3 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v6h-4.586l1.293-1.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L10.414 13H15v3a2 2 0 01-2 2H5a2 2 0 01-2-2V5zM15 11h2a1 1 0 110 2h-2v-2z">
                                                    </path>
                                                </svg> Copy Task </a><a class="dropdown-item d-flex align-items-center"
                                                href="#"><svg class="dropdown-icon text-gray-400 me-2"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                    </path>
                                                </svg> Add to favorites</a>
                                            <div role="separator" class="dropdown-divider my-1"></div><a
                                                class="dropdown-item d-flex align-items-center" href="#"><svg
                                                    class="dropdown-icon text-danger me-2" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg> Remove</a>
                                        </div>
                                        <div class="dropdown-menu dashboard-dropdown dropdown-menu-start py-0"
                                            aria-labelledby="dropdownMenuLink"><a
                                                class="dropdown-item fw-normal rounded-top" href="#"
                                                data-bs-toggle="modal" data-bs-target="#editTaskModal"><span
                                                    class="fas fa-edit"></span>Edit task</a> <a
                                                class="dropdown-item fw-normal" href="#"><span
                                                    class="far fa-clone"></span>Copy Task</a> <a
                                                class="dropdown-item fw-normal" href="#"><span
                                                    class="far fa-star"></span> Add to favorites</a>
                                            <div role="separator" class="dropdown-divider my-0"></div><a
                                                class="dropdown-item fw-normal text-danger rounded-bottom"
                                                href="#"><span class="fas fa-trash-alt"></span>Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <p>On line 672 you define $table_variants. Each instance of "color-level" needs to be
                                    changed to "shift-color".</p>
                                <h5 class="fs-6 fw-normal mt-4">3 Assignees</h5>
                                <div class="avatar-group"><a href="#" class="avatar" data-bs-toggle="tooltip"
                                        data-original-title="Ryan Tompson" data-bs-original-title="Ryan Tompson"
                                        title="Ryan Tompson"><img class="rounded" alt="Image placeholder"
                                            src="../assets/img/team/profile-picture-1.jpg"> </a><a href="#"
                                        class="avatar" data-bs-toggle="tooltip" data-original-title="Bonnie Green"
                                        data-bs-original-title="Bonnie Green" title="Bonnie Green"><img class="rounded"
                                            alt="Image placeholder" src="../assets/img/team/profile-picture-3.jpg">
                                    </a><a href="#" class="avatar" data-bs-toggle="tooltip"
                                        data-original-title="Alexander Smith" data-bs-original-title="Alexander Smith"
                                        title="Alexander Smith"><img class="rounded" alt="Image placeholder"
                                            src="../assets/img/team/profile-picture-2.jpg"></a></div>
                            </div>
                        </div> <button type="button"
                            class="btn btn-outline-gray-500 d-inline-flex align-items-center justify-content-center dashed-outline new-card w-100"
                            data-bs-toggle="modal" data-bs-target="#KanbanAddCard"><svg class="icon icon-xs me-2"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg> Add another card</button>
                    </div>
                    <div class="d-grid">
                        <div class="modal fade" id="KanbanAddCard" tabindex="-1" aria-labelledby="KanbanAddCardLabel4"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content p-3">
                                    <div class="modal-header pb-0 border-0">
                                        <h5 class="modal-title fw-normal" id="KanbanAddCardLabel4">Add a new task</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body pb-0">
                                        <div class="mb-3"><input type="email" class="form-control"
                                                id="exampleFormControlInput1"
                                                placeholder="Enter a title for this card…"></div>
                                        <div class="mb-3"><textarea class="form-control"
                                                id="exampleFormControlTextarea1"
                                                placeholder="Enter a description for this card…" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer border-0 pt-0 justify-content-start"><button type="button"
                                            class="btn btn-outline-gray-500" data-bs-dismiss="modal">Close</button>
                                        <button type="button"
                                            class="btn btn-secondary d-inline-flex align-items-center"><svg
                                                class="icon icon-xs me-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg> Add card</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-4 col-xxl-3">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fs-6 fw-bold mb-0">In progress</h5>
                        <div class="dropdown"><button type="button" class="btn btn-sm fs-6 px-1 py-0 dropdown-toggle"
                                id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"><svg
                                    class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                    </path>
                                </svg></button>
                            <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1"><a
                                    class="dropdown-item d-flex align-items-center" href="#"><svg
                                        class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM14 11a1 1 0 011 1v1h1a1 1 0 110 2h-1v1a1 1 0 11-2 0v-1h-1a1 1 0 110-2h1v-1a1 1 0 011-1z">
                                        </path>
                                    </svg> Add Card </a><a class="dropdown-item d-flex align-items-center" href="#"><svg
                                        class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 2a1 1 0 000 2h2a1 1 0 100-2H8z"></path>
                                        <path
                                            d="M3 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v6h-4.586l1.293-1.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L10.414 13H15v3a2 2 0 01-2 2H5a2 2 0 01-2-2V5zM15 11h2a1 1 0 110 2h-2v-2z">
                                        </path>
                                    </svg> Copy List </a><a class="dropdown-item d-flex align-items-center"
                                    href="#"><svg class="dropdown-icon text-gray-400 me-2" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg> Move List </a><a class="dropdown-item d-flex align-items-center"
                                    href="#"><svg class="dropdown-icon text-gray-400 me-2" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                        <path fill-rule="evenodd"
                                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                            clip-rule="evenodd"></path>
                                    </svg> Watch</a>
                                <div role="separator" class="dropdown-divider my-1"></div><a
                                    class="dropdown-item d-flex align-items-center" href="#"><svg
                                        class="dropdown-icon text-danger me-2" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg> Remove</a>
                            </div>
                        </div>
                    </div>
                    <div id="kanbanColumn2" class="list-group kanban-list">
                        <div class="card border-0 shadow p-4">
                            <div
                                class="card-header d-flex align-items-center justify-content-between border-0 p-0 mb-3">
                                <h3 class="h5 mb-0">Redesign homepage</h3>
                                <div>
                                    <div class="dropdown"><button type="button"
                                            class="btn btn-sm fs-6 px-1 py-0 dropdown-toggle" id="dropdownMenuLink"
                                            data-bs-toggle="dropdown" aria-expanded="false"><svg
                                                class="icon icon-xs text-gray-500" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                                </path>
                                                <path fill-rule="evenodd"
                                                    d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                    clip-rule="evenodd"></path>
                                            </svg></button>
                                        <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1"><a
                                                class="dropdown-item d-flex align-items-center" href="#"
                                                data-bs-toggle="modal" data-bs-target="#editTaskModal"><svg
                                                    class="dropdown-icon text-gray-400 me-2" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg> Edit Task </a><a class="dropdown-item d-flex align-items-center"
                                                href="#"><svg class="dropdown-icon text-gray-400 me-2"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 2a1 1 0 000 2h2a1 1 0 100-2H8z"></path>
                                                    <path
                                                        d="M3 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v6h-4.586l1.293-1.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L10.414 13H15v3a2 2 0 01-2 2H5a2 2 0 01-2-2V5zM15 11h2a1 1 0 110 2h-2v-2z">
                                                    </path>
                                                </svg> Copy Task </a><a class="dropdown-item d-flex align-items-center"
                                                href="#"><svg class="dropdown-icon text-gray-400 me-2"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                    </path>
                                                </svg> Add to favorites</a>
                                            <div role="separator" class="dropdown-divider my-1"></div><a
                                                class="dropdown-item d-flex align-items-center" href="#"><svg
                                                    class="dropdown-icon text-danger me-2" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg> Remove</a>
                                        </div>
                                        <div class="dropdown-menu dashboard-dropdown dropdown-menu-start py-0"
                                            aria-labelledby="dropdownMenuLink"><a
                                                class="dropdown-item fw-normal rounded-top" href="#"
                                                data-bs-toggle="modal" data-bs-target="#editTaskModal"><span
                                                    class="fas fa-edit"></span>Edit task</a> <a
                                                class="dropdown-item fw-normal" href="#"><span
                                                    class="far fa-clone"></span>Copy Task</a> <a
                                                class="dropdown-item fw-normal" href="#"><span
                                                    class="far fa-star"></span> Add to favorites</a>
                                            <div role="separator" class="dropdown-divider my-0"></div><a
                                                class="dropdown-item fw-normal text-danger rounded-bottom"
                                                href="#"><span class="fas fa-trash-alt"></span>Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0"><img src="../assets/img/themesberg-mockup.jpg"
                                    class="card-img-top mb-2 mb-lg-3" alt="themesberg marketplace">
                                <p>On line 672 you define $table_variants. Each instance of "color-level" needs to be
                                    changed to "shift-color".</p>
                                <h5 class="fs-6 fw-normal mt-4">2 Assignees</h5>
                                <div class="avatar-group"><a href="#" class="avatar" data-bs-toggle="tooltip"
                                        data-original-title="Ryan Tompson" data-bs-original-title="Ryan Tompson"
                                        title="Ryan Tompson"><img class="rounded" alt="Image placeholder"
                                            src="../assets/img/team/profile-picture-1.jpg"> </a><a href="#"
                                        class="avatar" data-bs-toggle="tooltip" data-original-title="Bonnie Green"
                                        data-bs-original-title="Bonnie Green" title="Bonnie Green"><img class="rounded"
                                            alt="Image placeholder" src="../assets/img/team/profile-picture-3.jpg"></a>
                                </div>
                            </div>
                        </div>
                        <div class="card border-0 shadow p-4">
                            <div
                                class="card-header d-flex align-items-center justify-content-between border-0 p-0 mb-3">
                                <h3 class="h5 mb-0">Design banner</h3>
                                <div>
                                    <div class="dropdown"><button type="button"
                                            class="btn btn-sm fs-6 px-1 py-0 dropdown-toggle" id="dropdownMenuLink"
                                            data-bs-toggle="dropdown" aria-expanded="false"><svg
                                                class="icon icon-xs text-gray-500" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                                </path>
                                                <path fill-rule="evenodd"
                                                    d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                    clip-rule="evenodd"></path>
                                            </svg></button>
                                        <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1"><a
                                                class="dropdown-item d-flex align-items-center" href="#"
                                                data-bs-toggle="modal" data-bs-target="#editTaskModal"><svg
                                                    class="dropdown-icon text-gray-400 me-2" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg> Edit Task </a><a class="dropdown-item d-flex align-items-center"
                                                href="#"><svg class="dropdown-icon text-gray-400 me-2"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 2a1 1 0 000 2h2a1 1 0 100-2H8z"></path>
                                                    <path
                                                        d="M3 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v6h-4.586l1.293-1.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L10.414 13H15v3a2 2 0 01-2 2H5a2 2 0 01-2-2V5zM15 11h2a1 1 0 110 2h-2v-2z">
                                                    </path>
                                                </svg> Copy Task </a><a class="dropdown-item d-flex align-items-center"
                                                href="#"><svg class="dropdown-icon text-gray-400 me-2"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                    </path>
                                                </svg> Add to favorites</a>
                                            <div role="separator" class="dropdown-divider my-1"></div><a
                                                class="dropdown-item d-flex align-items-center" href="#"><svg
                                                    class="dropdown-icon text-danger me-2" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg> Remove</a>
                                        </div>
                                        <div class="dropdown-menu dashboard-dropdown dropdown-menu-start py-0"
                                            aria-labelledby="dropdownMenuLink"><a
                                                class="dropdown-item fw-normal rounded-top" href="#"
                                                data-bs-toggle="modal" data-bs-target="#editTaskModal"><span
                                                    class="fas fa-edit"></span>Edit task</a> <a
                                                class="dropdown-item fw-normal" href="#"><span
                                                    class="far fa-clone"></span>Copy Task</a> <a
                                                class="dropdown-item fw-normal" href="#"><span
                                                    class="far fa-star"></span> Add to favorites</a>
                                            <div role="separator" class="dropdown-divider my-0"></div><a
                                                class="dropdown-item fw-normal text-danger rounded-bottom"
                                                href="#"><span class="fas fa-trash-alt"></span>Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <p>On line 672 you define $table_variants. Each instance of "color-level" needs to be
                                    changed to "shift-color".</p>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <h5 class="h6 mb-0">Progress</h5>
                                    <div class="fw-bold small"><span>40%</span></div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 75%"
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <h5 class="fs-6 fw-normal mt-4">2 Assignees</h5>
                                <div class="avatar-group"><a href="#" class="avatar" data-bs-toggle="tooltip"
                                        data-original-title="Ryan Tompson" data-bs-original-title="Ryan Tompson"
                                        title="Ryan Tompson"><img class="rounded" alt="Image placeholder"
                                            src="../assets/img/team/profile-picture-1.jpg"> </a><a href="#"
                                        class="avatar" data-bs-toggle="tooltip" data-original-title="Bonnie Green"
                                        data-bs-original-title="Bonnie Green" title="Bonnie Green"><img class="rounded"
                                            alt="Image placeholder" src="../assets/img/team/profile-picture-3.jpg"></a>
                                </div>
                            </div>
                        </div> <button type="button"
                            class="btn btn-outline-gray-500 d-inline-flex align-items-center justify-content-center dashed-outline new-card w-100"
                            data-bs-toggle="modal" data-bs-target="#KanbanAddCard"><svg class="icon icon-xs me-2"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg> Add another card</button>
                    </div>
                    <div class="d-grid">
                        <div class="modal fade" id="KanbanAddCard2" tabindex="-1" aria-labelledby="KanbanAddCardLabel2"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content p-4">
                                    <div class="modal-header pb-0 border-0">
                                        <h5 class="modal-title fw-normal" id="KanbanAddCardLabel2">Add a new task</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body pb-0">
                                        <div class="mb-3"><input type="email" class="form-control"
                                                id="exampleFormControlInput2"
                                                placeholder="Enter a title for this card…"></div>
                                        <div class="mb-3"><textarea class="form-control"
                                                id="exampleFormControlTextarea2"
                                                placeholder="Enter a description for this card…" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer border-0 pt-0 justify-content-start"><button type="button"
                                            class="btn btn-outline-gray-500" data-bs-dismiss="modal">Close</button>
                                        <button type="button"
                                            class="btn btn-secondary d-inline-flex align-items-center"><svg
                                                class="icon icon-xs me-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg> Add card</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-4 col-xxl-3">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fs-6 fw-bold mb-0">Done</h5>
                        <div class="dropdown"><button type="button" class="btn btn-sm fs-6 px-1 py-0 dropdown-toggle"
                                id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"><svg
                                    class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                    </path>
                                </svg></button>
                            <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1"><a
                                    class="dropdown-item d-flex align-items-center" href="#"><svg
                                        class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM14 11a1 1 0 011 1v1h1a1 1 0 110 2h-1v1a1 1 0 11-2 0v-1h-1a1 1 0 110-2h1v-1a1 1 0 011-1z">
                                        </path>
                                    </svg> Add Card </a><a class="dropdown-item d-flex align-items-center" href="#"><svg
                                        class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 2a1 1 0 000 2h2a1 1 0 100-2H8z"></path>
                                        <path
                                            d="M3 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v6h-4.586l1.293-1.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L10.414 13H15v3a2 2 0 01-2 2H5a2 2 0 01-2-2V5zM15 11h2a1 1 0 110 2h-2v-2z">
                                        </path>
                                    </svg> Copy List </a><a class="dropdown-item d-flex align-items-center"
                                    href="#"><svg class="dropdown-icon text-gray-400 me-2" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg> Move List </a><a class="dropdown-item d-flex align-items-center"
                                    href="#"><svg class="dropdown-icon text-gray-400 me-2" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                        <path fill-rule="evenodd"
                                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                            clip-rule="evenodd"></path>
                                    </svg> Watch</a>
                                <div role="separator" class="dropdown-divider my-1"></div><a
                                    class="dropdown-item d-flex align-items-center" href="#"><svg
                                        class="dropdown-icon text-danger me-2" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg> Remove</a>
                            </div>
                        </div>
                    </div>
                    <div id="kanbanColumn3" class="list-group kanban-list">
                        <div class="card border-0 shadow p-4">
                            <div
                                class="card-header d-flex align-items-center justify-content-between border-0 p-0 mb-2">
                                <h3 class="h5 mb-0">variables.scss problems</h3>
                                <div>
                                    <div class="dropdown"><button type="button"
                                            class="btn btn-sm fs-6 px-1 py-0 dropdown-toggle" id="dropdownMenuLink"
                                            data-bs-toggle="dropdown" aria-expanded="false"><svg
                                                class="icon icon-xs text-gray-500" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                                </path>
                                                <path fill-rule="evenodd"
                                                    d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                    clip-rule="evenodd"></path>
                                            </svg></button>
                                        <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1"><a
                                                class="dropdown-item d-flex align-items-center" href="#"
                                                data-bs-toggle="modal" data-bs-target="#editTaskModal"><svg
                                                    class="dropdown-icon text-gray-400 me-2" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg> Edit Task </a><a class="dropdown-item d-flex align-items-center"
                                                href="#"><svg class="dropdown-icon text-gray-400 me-2"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 2a1 1 0 000 2h2a1 1 0 100-2H8z"></path>
                                                    <path
                                                        d="M3 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v6h-4.586l1.293-1.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L10.414 13H15v3a2 2 0 01-2 2H5a2 2 0 01-2-2V5zM15 11h2a1 1 0 110 2h-2v-2z">
                                                    </path>
                                                </svg> Copy Task </a><a class="dropdown-item d-flex align-items-center"
                                                href="#"><svg class="dropdown-icon text-gray-400 me-2"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                    </path>
                                                </svg> Add to favorites</a>
                                            <div role="separator" class="dropdown-divider my-1"></div><a
                                                class="dropdown-item d-flex align-items-center" href="#"><svg
                                                    class="dropdown-icon text-danger me-2" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg> Remove</a>
                                        </div>
                                        <div class="dropdown-menu dashboard-dropdown dropdown-menu-start py-0"
                                            aria-labelledby="dropdownMenuLink"><a
                                                class="dropdown-item fw-normal rounded-top" href="#"
                                                data-bs-toggle="modal" data-bs-target="#editTaskModal"><span
                                                    class="fas fa-edit"></span>Edit task</a> <a
                                                class="dropdown-item fw-normal" href="#"><span
                                                    class="far fa-clone"></span>Copy Task</a> <a
                                                class="dropdown-item fw-normal" href="#"><span
                                                    class="far fa-star"></span> Add to favorites</a>
                                            <div role="separator" class="dropdown-divider my-0"></div><a
                                                class="dropdown-item fw-normal text-danger rounded-bottom"
                                                href="#"><span class="fas fa-trash-alt"></span>Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <p>On line 672 you define $table_variants. Each instance of "color-level" needs to be
                                    changed to "shift-color".</p>
                                <h5 class="fs-6 fw-normal mt-4">3 Assignees</h5>
                                <div class="avatar-group"><a href="#" class="avatar" data-bs-toggle="tooltip"
                                        data-original-title="Ryan Tompson" data-bs-original-title="Ryan Tompson"
                                        title="Ryan Tompson"><img class="rounded" alt="Image placeholder"
                                            src="../assets/img/team/profile-picture-1.jpg"> </a><a href="#"
                                        class="avatar" data-bs-toggle="tooltip" data-original-title="Bonnie Green"
                                        data-bs-original-title="Bonnie Green" title="Bonnie Green"><img class="rounded"
                                            alt="Image placeholder" src="../assets/img/team/profile-picture-3.jpg">
                                    </a><a href="#" class="avatar" data-bs-toggle="tooltip"
                                        data-original-title="Alexander Smith" data-bs-original-title="Alexander Smith"
                                        title="Alexander Smith"><img class="rounded" alt="Image placeholder"
                                            src="../assets/img/team/profile-picture-2.jpg"></a></div>
                            </div>
                        </div>
                        <div class="card border-0 shadow p-4">
                            <div
                                class="card-header d-flex align-items-center justify-content-between border-0 p-0 mb-3">
                                <h3 class="h5 mb-0">Redesign homepage</h3>
                                <div>
                                    <div class="dropdown"><button type="button"
                                            class="btn btn-sm fs-6 px-1 py-0 dropdown-toggle" id="dropdownMenuLink"
                                            data-bs-toggle="dropdown" aria-expanded="false"><svg
                                                class="icon icon-xs text-gray-500" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                                </path>
                                                <path fill-rule="evenodd"
                                                    d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                    clip-rule="evenodd"></path>
                                            </svg></button>
                                        <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1"><a
                                                class="dropdown-item d-flex align-items-center" href="#"
                                                data-bs-toggle="modal" data-bs-target="#editTaskModal"><svg
                                                    class="dropdown-icon text-gray-400 me-2" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg> Edit Task </a><a class="dropdown-item d-flex align-items-center"
                                                href="#"><svg class="dropdown-icon text-gray-400 me-2"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 2a1 1 0 000 2h2a1 1 0 100-2H8z"></path>
                                                    <path
                                                        d="M3 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v6h-4.586l1.293-1.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L10.414 13H15v3a2 2 0 01-2 2H5a2 2 0 01-2-2V5zM15 11h2a1 1 0 110 2h-2v-2z">
                                                    </path>
                                                </svg> Copy Task </a><a class="dropdown-item d-flex align-items-center"
                                                href="#"><svg class="dropdown-icon text-gray-400 me-2"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                    </path>
                                                </svg> Add to favorites</a>
                                            <div role="separator" class="dropdown-divider my-1"></div><a
                                                class="dropdown-item d-flex align-items-center" href="#"><svg
                                                    class="dropdown-icon text-danger me-2" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg> Remove</a>
                                        </div>
                                        <div class="dropdown-menu dashboard-dropdown dropdown-menu-start py-0"
                                            aria-labelledby="dropdownMenuLink"><a
                                                class="dropdown-item fw-normal rounded-top" href="#"
                                                data-bs-toggle="modal" data-bs-target="#editTaskModal"><span
                                                    class="fas fa-edit"></span>Edit task</a> <a
                                                class="dropdown-item fw-normal" href="#"><span
                                                    class="far fa-clone"></span>Copy Task</a> <a
                                                class="dropdown-item fw-normal" href="#"><span
                                                    class="far fa-star"></span> Add to favorites</a>
                                            <div role="separator" class="dropdown-divider my-0"></div><a
                                                class="dropdown-item fw-normal text-danger rounded-bottom"
                                                href="#"><span class="fas fa-trash-alt"></span>Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0"><img src="../assets/img/themesberg-mockup.jpg"
                                    class="card-img-top mb-2 mb-lg-3" alt="themesberg marketplace">
                                <p>On line 672 you define $table_variants. Each instance of "color-level" needs to be
                                    changed to "shift-color".</p>
                                <h5 class="fs-6 fw-normal mt-4">2 Assignees</h5>
                                <div class="avatar-group"><a href="#" class="avatar" data-bs-toggle="tooltip"
                                        data-original-title="Ryan Tompson" data-bs-original-title="Ryan Tompson"
                                        title="Ryan Tompson"><img class="rounded" alt="Image placeholder"
                                            src="../assets/img/team/profile-picture-1.jpg"> </a><a href="#"
                                        class="avatar" data-bs-toggle="tooltip" data-original-title="Bonnie Green"
                                        data-bs-original-title="Bonnie Green" title="Bonnie Green"><img class="rounded"
                                            alt="Image placeholder" src="../assets/img/team/profile-picture-3.jpg"></a>
                                </div>
                            </div>
                        </div> <button type="button"
                            class="btn btn-outline-gray-500 d-inline-flex align-items-center justify-content-center dashed-outline new-card w-100"
                            data-bs-toggle="modal" data-bs-target="#KanbanAddCard"><svg class="icon icon-xs me-2"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg> Add another card</button>
                    </div>
                    <div class="d-grid">
                        <div class="modal fade" id="KanbanAddCard3" tabindex="-1" aria-labelledby="KanbanAddCardLabel3"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content p-4">
                                    <div class="modal-header pb-0 border-0">
                                        <h5 class="modal-title fw-normal" id="KanbanAddCardLabel3">Add a new task</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body pb-0">
                                        <div class="mb-3"><input type="email" class="form-control"
                                                id="exampleFormControlInput3"
                                                placeholder="Enter a title for this card…"></div>
                                        <div class="mb-3"><textarea class="form-control"
                                                id="exampleFormControlTextarea3"
                                                placeholder="Enter a description for this card…" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer border-0 pt-0 justify-content-start"><button type="button"
                                            class="btn btn-outline-gray-500" data-bs-dismiss="modal">Close</button>
                                        <button type="button"
                                            class="btn btn-secondary d-inline-flex align-items-center"><svg
                                                class="icon icon-xs me-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg> Add card</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-4 col-xxl-3">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fs-6 fw-bold mb-0">Deployed</h5>
                        <div class="dropdown"><button type="button" class="btn btn-sm fs-6 px-1 py-0 dropdown-toggle"
                                id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"><svg
                                    class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                    </path>
                                </svg></button>
                            <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1"><a
                                    class="dropdown-item d-flex align-items-center" href="#"><svg
                                        class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM14 11a1 1 0 011 1v1h1a1 1 0 110 2h-1v1a1 1 0 11-2 0v-1h-1a1 1 0 110-2h1v-1a1 1 0 011-1z">
                                        </path>
                                    </svg> Add Card </a><a class="dropdown-item d-flex align-items-center" href="#"><svg
                                        class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 2a1 1 0 000 2h2a1 1 0 100-2H8z"></path>
                                        <path
                                            d="M3 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v6h-4.586l1.293-1.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L10.414 13H15v3a2 2 0 01-2 2H5a2 2 0 01-2-2V5zM15 11h2a1 1 0 110 2h-2v-2z">
                                        </path>
                                    </svg> Copy List </a><a class="dropdown-item d-flex align-items-center"
                                    href="#"><svg class="dropdown-icon text-gray-400 me-2" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg> Move List </a><a class="dropdown-item d-flex align-items-center"
                                    href="#"><svg class="dropdown-icon text-gray-400 me-2" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                        <path fill-rule="evenodd"
                                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                            clip-rule="evenodd"></path>
                                    </svg> Watch</a>
                                <div role="separator" class="dropdown-divider my-1"></div><a
                                    class="dropdown-item d-flex align-items-center" href="#"><svg
                                        class="dropdown-icon text-danger me-2" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg> Remove</a>
                            </div>
                        </div>
                    </div>
                    <div id="kanbanColumn4" class="list-group kanban-list">
                        <div class="card border-0 shadow p-4">
                            <div
                                class="card-header d-flex align-items-center justify-content-between border-0 p-0 mb-2">
                                <h3 class="h5 mb-0">variables.scss problems</h3>
                                <div>
                                    <div class="dropdown"><button type="button"
                                            class="btn btn-sm fs-6 px-1 py-0 dropdown-toggle" id="dropdownMenuLink"
                                            data-bs-toggle="dropdown" aria-expanded="false"><svg
                                                class="icon icon-xs text-gray-500" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                                </path>
                                                <path fill-rule="evenodd"
                                                    d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                    clip-rule="evenodd"></path>
                                            </svg></button>
                                        <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1"><a
                                                class="dropdown-item d-flex align-items-center" href="#"
                                                data-bs-toggle="modal" data-bs-target="#editTaskModal"><svg
                                                    class="dropdown-icon text-gray-400 me-2" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg> Edit Task </a><a class="dropdown-item d-flex align-items-center"
                                                href="#"><svg class="dropdown-icon text-gray-400 me-2"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 2a1 1 0 000 2h2a1 1 0 100-2H8z"></path>
                                                    <path
                                                        d="M3 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v6h-4.586l1.293-1.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L10.414 13H15v3a2 2 0 01-2 2H5a2 2 0 01-2-2V5zM15 11h2a1 1 0 110 2h-2v-2z">
                                                    </path>
                                                </svg> Copy Task </a><a class="dropdown-item d-flex align-items-center"
                                                href="#"><svg class="dropdown-icon text-gray-400 me-2"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                    </path>
                                                </svg> Add to favorites</a>
                                            <div role="separator" class="dropdown-divider my-1"></div><a
                                                class="dropdown-item d-flex align-items-center" href="#"><svg
                                                    class="dropdown-icon text-danger me-2" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg> Remove</a>
                                        </div>
                                        <div class="dropdown-menu dashboard-dropdown dropdown-menu-start py-0"
                                            aria-labelledby="dropdownMenuLink"><a
                                                class="dropdown-item fw-normal rounded-top" href="#"
                                                data-bs-toggle="modal" data-bs-target="#editTaskModal"><span
                                                    class="fas fa-edit"></span>Edit task</a> <a
                                                class="dropdown-item fw-normal" href="#"><span
                                                    class="far fa-clone"></span>Copy Task</a> <a
                                                class="dropdown-item fw-normal" href="#"><span
                                                    class="far fa-star"></span> Add to favorites</a>
                                            <div role="separator" class="dropdown-divider my-0"></div><a
                                                class="dropdown-item fw-normal text-danger rounded-bottom"
                                                href="#"><span class="fas fa-trash-alt"></span>Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <p>On line 672 you define $table_variants. Each instance of "color-level" needs to be
                                    changed to "shift-color".</p>
                                <h5 class="fs-6 fw-normal mt-4">3 Assignees</h5>
                                <div class="avatar-group"><a href="#" class="avatar" data-bs-toggle="tooltip"
                                        data-original-title="Ryan Tompson" data-bs-original-title="Ryan Tompson"
                                        title="Ryan Tompson"><img class="rounded" alt="Image placeholder"
                                            src="../assets/img/team/profile-picture-1.jpg"> </a><a href="#"
                                        class="avatar" data-bs-toggle="tooltip" data-original-title="Bonnie Green"
                                        data-bs-original-title="Bonnie Green" title="Bonnie Green"><img class="rounded"
                                            alt="Image placeholder" src="../assets/img/team/profile-picture-3.jpg">
                                    </a><a href="#" class="avatar" data-bs-toggle="tooltip"
                                        data-original-title="Alexander Smith" data-bs-original-title="Alexander Smith"
                                        title="Alexander Smith"><img class="rounded" alt="Image placeholder"
                                            src="../assets/img/team/profile-picture-2.jpg"></a></div>
                            </div>
                        </div>
                        <div class="card border-0 shadow p-4">
                            <div
                                class="card-header d-flex align-items-center justify-content-between border-0 p-0 mb-3">
                                <h3 class="h5 mb-0">Redesign homepage</h3>
                                <div>
                                    <div class="dropdown"><button type="button"
                                            class="btn btn-sm fs-6 px-1 py-0 dropdown-toggle" id="dropdownMenuLink"
                                            data-bs-toggle="dropdown" aria-expanded="false"><svg
                                                class="icon icon-xs text-gray-500" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                                </path>
                                                <path fill-rule="evenodd"
                                                    d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                    clip-rule="evenodd"></path>
                                            </svg></button>
                                        <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1"><a
                                                class="dropdown-item d-flex align-items-center" href="#"
                                                data-bs-toggle="modal" data-bs-target="#editTaskModal"><svg
                                                    class="dropdown-icon text-gray-400 me-2" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg> Edit Task </a><a class="dropdown-item d-flex align-items-center"
                                                href="#"><svg class="dropdown-icon text-gray-400 me-2"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 2a1 1 0 000 2h2a1 1 0 100-2H8z"></path>
                                                    <path
                                                        d="M3 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v6h-4.586l1.293-1.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L10.414 13H15v3a2 2 0 01-2 2H5a2 2 0 01-2-2V5zM15 11h2a1 1 0 110 2h-2v-2z">
                                                    </path>
                                                </svg> Copy Task </a><a class="dropdown-item d-flex align-items-center"
                                                href="#"><svg class="dropdown-icon text-gray-400 me-2"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                    </path>
                                                </svg> Add to favorites</a>
                                            <div role="separator" class="dropdown-divider my-1"></div><a
                                                class="dropdown-item d-flex align-items-center" href="#"><svg
                                                    class="dropdown-icon text-danger me-2" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg> Remove</a>
                                        </div>
                                        <div class="dropdown-menu dashboard-dropdown dropdown-menu-start py-0"
                                            aria-labelledby="dropdownMenuLink"><a
                                                class="dropdown-item fw-normal rounded-top" href="#"
                                                data-bs-toggle="modal" data-bs-target="#editTaskModal"><span
                                                    class="fas fa-edit"></span>Edit task</a> <a
                                                class="dropdown-item fw-normal" href="#"><span
                                                    class="far fa-clone"></span>Copy Task</a> <a
                                                class="dropdown-item fw-normal" href="#"><span
                                                    class="far fa-star"></span> Add to favorites</a>
                                            <div role="separator" class="dropdown-divider my-0"></div><a
                                                class="dropdown-item fw-normal text-danger rounded-bottom"
                                                href="#"><span class="fas fa-trash-alt"></span>Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0"><img src="../assets/img/themesberg-mockup.jpg"
                                    class="card-img-top mb-2 mb-lg-3" alt="themesberg marketplace">
                                <p>On line 672 you define $table_variants. Each instance of "color-level" needs to be
                                    changed to "shift-color".</p>
                                <h5 class="fs-6 fw-normal mt-4">2 Assignees</h5>
                                <div class="avatar-group"><a href="#" class="avatar" data-bs-toggle="tooltip"
                                        data-original-title="Ryan Tompson" data-bs-original-title="Ryan Tompson"
                                        title="Ryan Tompson"><img class="rounded" alt="Image placeholder"
                                            src="../assets/img/team/profile-picture-1.jpg"> </a><a href="#"
                                        class="avatar" data-bs-toggle="tooltip" data-original-title="Bonnie Green"
                                        data-bs-original-title="Bonnie Green" title="Bonnie Green"><img class="rounded"
                                            alt="Image placeholder" src="../assets/img/team/profile-picture-3.jpg"></a>
                                </div>
                            </div>
                        </div> <button type="button"
                            class="btn btn-outline-gray-500 d-inline-flex align-items-center justify-content-center dashed-outline new-card w-100"
                            data-bs-toggle="modal" data-bs-target="#KanbanAddCard"><svg class="icon icon-xs me-2"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg> Add another card</button>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-4 col-xxl-3">
                    <div id="kanbanColumn5" class="list-group"></div>
                    <div class="d-grid"> <button type="button"
                            class="btn btn-outline-gray-500 d-inline-flex align-items-center justify-content-center dashed-outline new-card w-100"
                            data-bs-toggle="modal" data-bs-target="#KanbanAddCard"><svg class="icon icon-xs me-2"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg> Add another card</button>
                        <div class="modal fade" id="KanbanAddGroup5" tabindex="-1" aria-labelledby="KanbanAddGroupLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content p-4">
                                    <div class="modal-header pb-0 border-0">
                                        <h5 class="modal-title fw-normal" id="KanbanAddGroupLabel">Add a new group</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body pb-0">
                                        <div class="mb-3"><input type="email" class="form-control"
                                                id="exampleFormControlInput4"
                                                placeholder="Enter a title for this group"></div>
                                        <div class="mb-3"><textarea class="form-control"
                                                id="exampleFormControlTextarea4"
                                                placeholder="Enter a description for this group" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer border-0 pt-0 justify-content-start"><button type="button"
                                            class="btn btn-outline-primary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-success"><span
                                                class="fas fa-plus me-2"></span>Add group</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="editTaskModal" tabindex="-1" aria-labelledby="editTaskModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content p-lg-3">
                        <div class="modal-header align-items-start border-bottom">
                            <div class="d-block">
                                <h2 class="h5 mb-3">variables.scss problems</h2>
                                <div class="d-flex">
                                    <div class="d-block me-3 me-sm-4">
                                        <h5 class="fs-6 fw-bold text-gray-500" id="editTaskModalLabel">Members</h5>
                                        <div class="d-flex align-items-center"><a href="#" class="avatar"
                                                data-bs-toggle="tooltip" data-original-title="Ryan Tompson"
                                                data-bs-original-title="" title=""><img class="rounded"
                                                    alt="Image placeholder"
                                                    src="../assets/img/team/profile-picture-1.jpg"> </a><a href="#"
                                                class="avatar me-1" data-bs-toggle="tooltip"
                                                data-original-title="Romina Hadid" data-bs-original-title=""
                                                title=""><img class="rounded" alt="Image placeholder"
                                                    src="../assets/img/team/profile-picture-2.jpg"> </a><button
                                                class="btn btn-icon btn-sm btn-gray-200 d-inline-flex align-items-center"><svg
                                                    class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg></button></div>
                                    </div>
                                    <div class="d-block me-3">
                                        <h5 class="fs-6 fw-bold text-gray-500">Labels</h5>
                                        <div class="d-flex align-items-center"><a href="#"
                                                class="badge bg-success text-white rounded py-2 px-3 me-1">Design
                                            </a><button
                                                class="btn btn-sm btn-gray-200 d-inline-flex align-items-center"><svg
                                                    class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg></button></div>
                                    </div>
                                </div>
                            </div><button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body py-4">
                            <div class="row">
                                <div class="col-12 col-lg-9">
                                    <div class="row mb-4">
                                        <div class="col-auto">
                                            <div class="border border-3 rounded mb-2"><img class="image-sm rounded"
                                                    src="../assets/img/team/profile-picture-1.jpg"
                                                    alt="profile picture"></div>
                                            <div class="text-center"><a href="#" class="me-2"><svg class="icon icon-xs"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                                        </path>
                                                    </svg> </a><a href="#"><svg class="icon icon-xs" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z">
                                                        </path>
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z">
                                                        </path>
                                                    </svg></a></div>
                                        </div>
                                        <div class="col">
                                            <form><textarea class="form-control" id="exampleFormControlTextarea5"
                                                    placeholder="Leave a comment" rows="3"></textarea></form>
                                        </div>
                                    </div>
                                    <div class="row mb-4 mb-lg-0">
                                        <div class="col-12 mb-4">
                                            <div class="bg-gray-50 border border-gray-100 rounded p-3">
                                                <div class="d-flex align-items-center mb-2">
                                                    <h3 class="fs-6 mb-0 me-3">Bonnie Green</h3><small>32 minutes
                                                        ago</small>
                                                </div>
                                                <p class="text-dark mb-1">Pixel Pro is a premium Bootstrap 5 UI Kit
                                                    without jQuery featuring over 1000 components, 50+ sections and 35
                                                    example pages including a fully fledged user dashboard.</p><a
                                                    class="text-gray-700 hover:underline small" href="#">Edit</a>
                                                &middot; <a class="text-gray-700 hover:underline small"
                                                    href="#">Delete</a>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="bg-gray-50 border border-gray-100 rounded p-3">
                                                <div class="d-flex align-items-center mb-2">
                                                    <h3 class="fs-6 mb-0 me-3">Roy Fendley</h3><small>1 hour ago</small>
                                                </div>
                                                <p class="text-dark mb-1">Pixel Pro is a premium Bootstrap 5 UI Kit
                                                    without jQuery featuring over 1000 components, 50+ sections and 35
                                                    example pages including a fully fledged user dashboard.</p><a
                                                    class="text-gray-700 hover:underline small" href="#">Edit</a>
                                                &middot; <a class="text-gray-700 hover:underline small"
                                                    href="#">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <div class="d-grid gap-2"><a href="#"
                                            class="btn btn-sm btn-gray-200 d-inline-flex align-items-center rounded py-1 ps-3 text-start"><svg
                                                class="icon icon-xxs text-gray-500 me-2" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                                                </path>
                                            </svg> Members </a><a href="#"
                                            class="btn btn-sm btn-gray-200 d-inline-flex align-items-center rounded py-1 ps-3 text-start"><svg
                                                class="icon icon-xxs text-gray-500 me-2" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z"
                                                    clip-rule="evenodd"></path>
                                            </svg> Labels </a><a href="#"
                                            class="btn btn-sm btn-gray-200 d-inline-flex align-items-center rounded py-1 ps-3 text-start"><svg
                                                class="icon icon-xxs text-gray-500 me-2" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                                <path fill-rule="evenodd"
                                                    d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                                    clip-rule="evenodd"></path>
                                            </svg> Checklist </a><a href="#"
                                            class="btn btn-sm btn-gray-200 d-inline-flex align-items-center rounded py-1 ps-3 text-start"><svg
                                                class="icon icon-xxs text-gray-500 me-2" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                    clip-rule="evenodd"></path>
                                            </svg> Attachment </a><a href="#"
                                            class="btn btn-sm btn-gray-200 d-inline-flex align-items-center rounded py-1 ps-3 text-start"><svg
                                                class="icon icon-xxs text-gray-500 me-2" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                                    clip-rule="evenodd"></path>
                                            </svg> Due Date</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-start border-top">
                            <div class="d-none d-sm-flex"><a href="#"
                                    class="btn btn-gray-800 d-inline-flex align-items-center me-2"><svg
                                        class="icon icon-xs text-gray-300 me-2" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg> Move </a><a href="#"
                                    class="btn btn-gray-800 d-inline-flex align-items-center me-2"><svg
                                        class="icon icon-xs text-gray-300 me-2" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"></path>
                                        <path fill-rule="evenodd"
                                            d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg> Archive </a><a href="#"
                                    class="btn btn-gray-800 d-inline-flex align-items-center me-2"><svg
                                        class="icon icon-xs text-gray-300 me-2" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                        <path fill-rule="evenodd"
                                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                            clip-rule="evenodd"></path>
                                    </svg> Watch <svg class="icon icon-xxs text-success ms-2" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg> </a><a href="#"
                                    class="btn btn-gray-800 d-inline-flex align-items-center me-2"><svg
                                        class="icon icon-xxs text-gray-300 me-2" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z">
                                        </path>
                                    </svg> Share</a></div>
                            <div class="col-12 d-grid gap-2 d-sm-none"><a href="#"
                                    class="btn btn-gray-800 me-2 text-start"><span
                                        class="fas fa-arrow-right me-2"></span>Move</a> <a href="#"
                                    class="btn btn-gray-800 me-2 text-start"><span
                                        class="fas fa-archive me-2"></span>Archive</a> <a href="#"
                                    class="btn btn-gray-800 me-2 text-start"><span
                                        class="fas fa-eye me-2"></span>Watch<span
                                        class="fas fa-check-circle ms-3 text-success"></span></a> <a href="#"
                                    class="btn btn-gray-800 me-2 text-start"><span
                                        class="fas fa-share-alt me-2"></span>Share</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="bg-white rounded shadow p-5 mb-4 mt-4">
            <div class="row">
                <div class="col-12 col-md-4 col-xl-6 mb-4 mb-md-0">
                    <p class="mb-0 text-center text-lg-start">© 2019-<span class="current-year"></span> <a
                            class="text-primary fw-normal" href="https://themesberg.com" target="_blank">Themesberg</a>
                    </p>
                </div>
                <div class="col-12 col-md-8 col-xl-6 text-center text-lg-start">
                    <ul class="list-inline list-group-flush list-group-borderless text-md-end mb-0">
                        <li class="list-inline-item px-0 px-sm-2"><a href="https://themesberg.com/about">About</a></li>
                        <li class="list-inline-item px-0 px-sm-2"><a href="https://themesberg.com/themes">Themes</a>
                        </li>
                        <li class="list-inline-item px-0 px-sm-2"><a href="https://themesberg.com/blog">Blog</a></li>
                        <li class="list-inline-item px-0 px-sm-2"><a href="https://themesberg.com/contact">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
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
