 
/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */
/* Jquery */
window.$ = window.jQuery = require('jquery');

require('bootstrap');


/* pace-progress */
window.Pace = require('@dlghq/pace-progress');

/* Chart js */
require('admin-lte');

require('ionicons');

/* bootstrap */
//require('bootstrap.bundle');


/* toastr */
window.toastr = require('toastr');
toastr.options.preventDuplicates = true;


/* iCheck */
require('icheck');

/* jquery.flot */
require('jquery.flot');

/* jquery-flot-resize */
require('jquery-flot-resize'); 

/* jquery-flot-resize */
require('flot-pie'); 

/* devbridge-autocomplete */
require('devbridge-autocomplete');
/* Chart js */
require('chart.js/dist/Chart.min.js');


/* Datatables.net responsive*/
//require('@iconify/iconify');

require( 'datatables.net-bs4' );
require( 'datatables.net-buttons-bs4' );       
require( 'datatables.net-buttons/js/buttons.html5.js' );
require( 'datatables.net-buttons/js/buttons.print.js' );
require( 'datatables.net-responsive-bs4' );

 // ### Datatables
window.JSZip = require( 'jszip' );

// pdfMake
var pdfMake = require('pdfmake/build/pdfmake.js');
var pdfFonts = require('pdfmake/build/vfs_fonts.js');
pdfMake.vfs = pdfFonts.pdfMake.vfs;


