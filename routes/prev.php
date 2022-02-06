<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/prev')->group(function() {
    Route::prefix('dashboard')->group(function () {
        Route::view('default', 'dashboard.index')->name('default');
        Route::view('crypto', 'dashboard.crypto')->name('crypto');
        Route::view('ecommerce', 'dashboard.ecommerce')->name('ecommerce');

        Route::view('light-layout-rtl', 'starterkit.light-layout-rtl')->name('light-layout-rtl');
        Route::view('light-layout-box', 'starterkit.light-layout-box')->name('light-layout-box');
        Route::view('dark-layout', 'starterkit.dark-layout')->name('dark-layout');
        Route::view('dark-layout-rtl', 'starterkit.dark-layout-rtl')->name('dark-layout-rtl');
        Route::view('dark-layout-box', 'starterkit.dark-layout-box')->name('dark-layout-box');
        Route::view('vertical-layout-box', 'starterkit.vertical-layout-box')->name('vertical-layout-box');
        Route::view('vertical-layout-rtl', 'starterkit.vertical-layout-rtl')->name('vertical-layout-rtl');
    });

    Route::prefix('widgets')->group(function () {
        Route::view('general-widget', 'widgets.general-widget')->name('general-widget');
        Route::view('chart-widget', 'widgets.chart-widget')->name('chart-widget');
    });	

    Route::prefix('ui-elements')->group(function () {
        Route::view('state-color', 'ui-elements.state-color')->name('state-color');
        Route::view('typography', 'ui-elements.typography')->name('typography');
        Route::view('buttons', 'ui-elements.buttons')->name('buttons');
        Route::view('avatars', 'ui-elements.avatars')->name('avatars');
        Route::view('helper-classes', 'ui-elements.helper-classes')->name('helper-classes');
        Route::view('grid', 'ui-elements.grid')->name('grid');
        Route::view('tag-pills', 'ui-elements.tag-pills')->name('tag-pills');
        Route::view('progress-bar', 'ui-elements.progress-bar')->name('progress-bar');
        Route::view('modal', 'ui-elements.modal')->name('modal');
        Route::view('alert', 'ui-elements.alert')->name('alert');
        Route::view('popover', 'ui-elements.popover')->name('popover');
        Route::view('tooltip', 'ui-elements.tooltip')->name('tooltip');
        Route::view('loader', 'ui-elements.loader')->name('loader');
        Route::view('dropdown', 'ui-elements.dropdown')->name('dropdown');
        Route::view('tab-bootstrap', 'ui-elements.tab-bootstrap')->name('tab-bootstrap');
        Route::view('tab-material', 'ui-elements.tab-material')->name('tab-material');
        Route::view('accordion', 'ui-elements.accordion')->name('accordion');
        Route::view('navs', 'ui-elements.navs')->name('navs');
        Route::view('list', 'ui-elements.list')->name('list');
        Route::view('scrollable', 'ui-elements.scrollable')->name('scrollable');
        Route::view('tree', 'ui-elements.tree')->name('tree');
        Route::view('bootstrap-notify', 'ui-elements.bootstrap-notify')->name('bootstrap-notify');
        Route::view('rating', 'ui-elements.rating')->name('rating');
        Route::view('dropzone', 'ui-elements.dropzone')->name('dropzone');
        Route::view('tour', 'ui-elements.tour')->name('tour');
        Route::view('sweet-alert2', 'ui-elements.sweet-alert2')->name('sweet-alert2');
        Route::view('modal-animated', 'ui-elements.modal-animated')->name('modal-animated');
        Route::view('owl-carousel', 'ui-elements.owl-carousel')->name('owl-carousel');
        Route::view('ribbons', 'ui-elements.ribbons')->name('ribbons');
        Route::view('pagination', 'ui-elements.pagination')->name('pagination');
        Route::view('steps', 'ui-elements.steps')->name('steps');
        Route::view('breadcrumb', 'ui-elements.breadcrumb')->name('breadcrumb');
        Route::view('range-slider', 'ui-elements.range-slider')->name('range-slider');
        Route::view('image-cropper', 'ui-elements.image-cropper')->name('image-cropper');
        Route::view('sticky', 'ui-elements.sticky')->name('sticky');
        Route::view('raised-button', 'ui-elements.raised-button')->name('raised-button');
    });

    Route::prefix('icons')->group(function () {
        Route::view('font-awesome', 'icons.font-awesome')->name('font-awesome');
        Route::view('ico-icon', 'icons.ico-icon')->name('ico-icon');
        Route::view('themify-icon', 'icons.themify-icon')->name('themify-icon');
        Route::view('feather-icon', 'icons.feather-icon')->name('feather-icon');
        Route::view('whether-icon', 'icons.whether-icon')->name('whether-icon');
        Route::view('pe7-icon', 'icons.pe7-icon')->name('pe7-icon');
        Route::view('ionic-icon', 'icons.ionic-icon')->name('ionic-icon');
    });     

    Route::prefix('perk-ui')->group(function () {
        Route::view('animate', 'perk-ui.animate')->name('animate');
        Route::view('scroll-reval', 'perk-ui.scroll-reval')->name('scroll-reval');
        Route::view('aos', 'perk-ui.aos')->name('aos');
        Route::view('tilt', 'perk-ui.tilt')->name('tilt');
        Route::view('wow', 'perk-ui.wow')->name('wow');
        Route::view('hide-on-scroll', 'perk-ui.hide-on-scroll')->name('hide-on-scroll');
        Route::view('vertical', 'perk-ui.vertical')->name('vertical');
        Route::view('mega-menu', 'perk-ui.mega-menu')->name('mega-menu');
        Route::view('fix-header', 'perk-ui.fix-header')->name('fix-header');
        Route::view('fix-header&amp;sidebar', 'perk-ui.fix-header&amp;sidebar')->name('fix-header&amp;sidebar');
        Route::view('basic-card', 'perk-ui.basic-card')->name('basic-card');
        Route::view('theme-card', 'perk-ui.theme-card')->name('theme-card');
        Route::view('tabbed-card', 'perk-ui.tabbed-card')->name('tabbed-card');
        Route::view('dragable-card', 'perk-ui.dragable-card')->name('dragable-card');
        Route::view('button-builder', 'perk-ui.button-builder')->name('button-builder');
        Route::view('form-builder-1', 'perk-ui.form-builder-1')->name('form-builder-1');
    });

    Route::prefix('forms')->group(function () {
        Route::view('form-validation', 'forms.form-validation')->name('form-validation');
        Route::view('base-input', 'forms.base-input')->name('base-input');
        Route::view('radio-checkbox-control', 'forms.radio-checkbox-control')->name('radio-checkbox-control');
        Route::view('input-group', 'forms.input-group')->name('input-group');
        Route::view('megaoptions', 'forms.megaoptions')->name('megaoptions');
        Route::view('datepicker', 'forms.datepicker')->name('datepicker');
        Route::view('time-picker', 'forms.time-picker')->name('time-picker');
        Route::view('datetimepicker', 'forms.datetimepicker')->name('datetimepicker');
        Route::view('daterangepicker', 'forms.daterangepicker')->name('daterangepicker');
        Route::view('touchspin', 'forms.touchspin')->name('touchspin');
        Route::view('select2', 'forms.select2')->name('select2');
        Route::view('switch', 'forms.switch')->name('switch');
        Route::view('typeahead', 'forms.typeahead')->name('typeahead');
        Route::view('clipboard', 'forms.clipboard')->name('clipboard');
        Route::view('default-form', 'forms.default-form')->name('default-form');
        Route::view('form-wizard', 'forms.form-wizard')->name('form-wizard');
        Route::view('form-wizard-two', 'forms.form-wizard-two')->name('form-wizard-two');
        Route::view('form-wizard-three', 'forms.form-wizard-three')->name('form-wizard-three');
        Route::view('form-wizard-four', 'forms.form-wizard-four')->name('form-wizard-four');
    });

    Route::prefix('tables')->group(function () { 
        Route::view('bootstrap-basic-table', 'tables.bootstrap-basic-table')->name('bootstrap-basic-table');
        Route::view('bootstrap-sizing-table', 'tables.bootstrap-sizing-table')->name('bootstrap-sizing-table');
        Route::view('bootstrap-border-table', 'tables.bootstrap-border-table')->name('bootstrap-border-table');
        Route::view('bootstrap-styling-table', 'tables.bootstrap-styling-table')->name('bootstrap-styling-table');
        Route::view('table-components', 'tables.table-components')->name('table-components');
        Route::view('datatable-basic-init', 'tables.datatable-basic-init')->name('datatable-basic-init');
        Route::view('datatable-advance', 'tables.datatable-advance')->name('datatable-advance');
        Route::view('datatable-styling', 'tables.datatable-styling')->name('datatable-styling');
        Route::view('datatable-ajax', 'tables.datatable-ajax')->name('datatable-ajax');
        Route::view('datatable-server-side', 'tables.datatable-server-side')->name('datatable-server-side');
        Route::view('datatable-plugin', 'tables.datatable-plugin')->name('datatable-plugin');
        Route::view('datatable-api', 'tables.datatable-api')->name('datatable-api');
        Route::view('datatable-data-source', 'tables.datatable-data-source')->name('datatable-data-source');
        Route::view('datatable-ext-autofill', 'tables.datatable-ext-autofill')->name('datatable-ext-autofill');
        Route::view('datatable-ext-basic-button', 'tables.datatable-ext-basic-button')->name('datatable-ext-basic-button');
        Route::view('datatable-ext-col-reorder', 'tables.datatable-ext-col-reorder')->name('datatable-ext-col-reorder');
        Route::view('datatable-ext-fixed-header', 'tables.datatable-ext-fixed-header')->name('datatable-ext-fixed-header');
        Route::view('datatable-ext-html-5-data-export', 'tables.datatable-ext-html-5-data-export')->name('datatable-ext-html-5-data-export');
        Route::view('datatable-ext-key-table', 'tables.datatable-ext-key-table')->name('datatable-ext-key-table');
        Route::view('datatable-ext-responsive', 'tables.datatable-ext-responsive')->name('datatable-ext-responsive');
        Route::view('datatable-ext-row-reorder', 'tables.datatable-ext-row-reorder')->name('datatable-ext-row-reorder');
        Route::view('datatable-ext-scroller', 'tables.datatable-ext-scroller')->name('datatable-ext-scroller');
        Route::view('jsgrid-table', 'tables.jsgrid-table')->name('jsgrid-table');
    });     

    Route::prefix('charts')->group(function () { 
        Route::view('chart-apex', 'charts.chart-apex')->name('chart-apex');
        Route::view('chart-google', 'charts.chart-google')->name('chart-google');
        Route::view('chart-sparkline', 'charts.chart-sparkline')->name('chart-sparkline');
        Route::view('chart-flot', 'charts.chart-flot')->name('chart-flot');
        Route::view('chart-radial', 'charts.chart-radial')->name('chart-radial');
        Route::view('chart-knob', 'charts.chart-knob')->name('chart-knob');
        Route::view('chart-morris', 'charts.chart-morris')->name('chart-morris');
        Route::view('chartjs', 'charts.chartjs')->name('chartjs');
        Route::view('chartist', 'charts.chartist')->name('chartist');
        Route::view('chart-peity', 'charts.chart-peity')->name('chart-peity');
    });     

    Route::prefix('apps')->group(function () { 
        Route::view('product', 'apps.product')->name('product');
        Route::view('product-page', 'apps.product-page')->name('product-page');
        Route::view('list-products', 'apps.list-products')->name('list-products');
        Route::view('payment-details', 'apps.payment-details')->name('payment-details');
        Route::view('order-history', 'apps.order-history')->name('order-history');
        Route::view('invoice-template', 'apps.invoice-template')->name('invoice-template');
        Route::view('pricing', 'apps.pricing')->name('pricing');
        Route::view('blog', 'apps.blog')->name('blog');
        Route::view('blog-single', 'apps.blog-single')->name('blog-single');
        Route::view('add-post', 'apps.add-post')->name('add-post');
        Route::view('timeline-v-1', 'apps.timeline-v-1')->name('timeline-v-1');
        Route::view('timeline-v-2', 'apps.timeline-v-2')->name('timeline-v-2');
        Route::view('timeline-small', 'apps.timeline-small')->name('timeline-small');
        Route::view('gallery', 'apps.gallery')->name('gallery');
        Route::view('gallery-with-description', 'apps.gallery-with-description')->name('gallery-with-description');
        Route::view('gallery-masonry', 'apps.gallery-masonry')->name('gallery-masonry');
        Route::view('masonry-gallery-with-disc', 'apps.masonry-gallery-with-disc')->name('masonry-gallery-with-disc');
        Route::view('gallery-hover', 'apps.gallery-hover')->name('gallery-hover');
        Route::view('job-cards-view', 'apps.job-cards-view')->name('job-cards-view');
        Route::view('job-list-view', 'apps.job-list-view')->name('job-list-view');
        Route::view('job-details', 'apps.job-details')->name('job-details');
        Route::view('job-apply', 'apps.job-apply')->name('job-apply');
        Route::view('learning-list-view', 'apps.learning-list-view')->name('learning-list-view');
        Route::view('learning-detailed', 'apps.learning-detailed')->name('learning-detailed');
    });     

    Route::prefix('new-apps')->group(function () { 
        Route::view('user-profile', 'new_apps.user-profile')->name('user-profile');
        Route::view('edit-profile', 'new_apps.edit-profile')->name('edit-profile');
        Route::view('user-cards', 'new_apps.user-cards')->name('user-cards');
        Route::view('email-application', 'new_apps.email-application')->name('email-application');
        Route::view('email-compose', 'new_apps.email-compose')->name('email-compose');
        Route::view('chat', 'new_apps.chat')->name('chat');
        Route::view('chat-video', 'new_apps.chat-video')->name('chat-video');
        Route::view('calendar', 'new_apps.calendar')->name('calendar');
        Route::view('calendar-event', 'new_apps.calendar-event')->name('calendar-event');
        Route::view('calendar-advanced', 'new_apps.calendar-advanced')->name('calendar-advanced');
        Route::view('social-app', 'new_apps.social-app')->name('social-app');
        Route::view('to-do', 'new_apps.to-do')->name('to-do');
        Route::view('summernote', 'new_apps.summernote')->name('summernote');
        Route::view('ckeditor', 'new_apps.ckeditor')->name('ckeditor');
        Route::view('simple-mde', 'new_apps.simple-mde')->name('simple-mde');
        Route::view('ace-code-editor', 'new_apps.ace-code-editor')->name('ace-code-editor');
        Route::view('faq', 'new_apps.faq')->name('faq');
        Route::view('knowledgebase', 'new_apps.knowledgebase')->name('knowledgebase');
        Route::view('internationalization', 'new_apps.internationalization')->name('internationalization');
        Route::view('map-js', 'new_apps.map-js')->name('map-js');
        Route::view('vector-map', 'new_apps.vector-map')->name('vector-map');
    });

    Route::prefix('pages')->group(function () { 
        Route::view('sample-page', 'pages.sample-page')->name('sample-page');
        Route::view('support-ticket', 'pages.support-ticket')->name('support-ticket');
        Route::view('search', 'pages.search')->name('search');
        Route::view('error-400', 'pages.error-400')->name('error-400');
        Route::view('error-404', 'pages.error-404')->name('error-404');
        Route::view('error-500', 'pages.error-500')->name('error-500');
        Route::view('maintenance', 'pages.maintenance')->name('maintenance');
        Route::view('login', 'pages.login')->name('login');
        Route::view('signup', 'pages.signup')->name('signup');
        Route::view('forget-password', 'pages.forget-password')->name('forget-password');
        Route::view('comingsoon', 'pages.comingsoon')->name('comingsoon');
        Route::view('comingsoon-bg-video', 'pages.comingsoon-bg-video')->name('comingsoon-bg-video');
        Route::view('comingsoon-bg-img', 'pages.comingsoon-bg-img')->name('comingsoon-bg-img');
    });
});