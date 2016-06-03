/**
 * https://github.com/Studio-42/elFinder/wiki/Client-configuration-options-2.1
 * elfinder_xh/elfinder/js/elfinder.full.js
 * 
 * 'pixlr' : elfinder_xh/elfinder_custum/js/commands/pixlr.js
**/

// Active commands list
// If some required commands will be missed here, elFinder will add its
var elfinder_commands = [
	'pixlr',	// 2.1_n
	'netmount', 'netunmount',
	'open', 'opendir', 'reload', 'home', 'up', 'back', 'forward', 'getfile', 'quicklook', 
	'download', 'rm', 'duplicate', 'rename', 'mkdir', 'mkfile', 'upload', 'copy', 
	'cut', 'paste', 'edit', 'extract', 'archive', 'search', 'info', 'view', 'help',
	'resize', 'sort', 'places', 'chmod'
];

// UI plugins to load
//var elfinder_ui = ['toolbar', 'places', 'tree', 'path', 'stat'];
var elfinder_ui = ['toolbar', 'tree', 'path', 'stat'];

// toolbar configuration
var elfinder_toolbar = [
	['back', 'forward'],
	['netmount'],
//	['reload'],
//	['home', 'up'],
	['mkdir', 'mkfile', 'upload'],
	['open', 'download', 'getfile'],
	['info', 'chmod'],
	['quicklook'],
	['copy', 'cut', 'paste'],
	['rm'],
//	['duplicate', 'rename', 'edit', 'resize'],
	['duplicate', 'rename', 'edit', 'resize','pixlr'],	//2.1_n
	['extract', 'archive'],
	['search'],
	['view', 'sort'],
	['help'],
	// extra options
	{
		// auto hide on initial open
		autoHideUA: ['Mobile']
	}
];

// Options for Contextmenu config:
var elfinder_contextmenu = {
    // navbarfolder menu
	navbar : ['open', 'download', '|', 'upload', '|', 'copy', 'cut', 'paste', 'duplicate', '|', 'rm', '|', 'rename', '|', 'archive', '|', 'places', 'info', 'chmod', 'netunmount'],
    // current directory menu
	cwd    : ['reload', 'back', '|', 'upload', 'mkdir', 'mkfile', 'paste', '|', 'sort', '|', 'info'],  
    // current directory file menu
	files  : [
		'getfile', '|' ,'open', 'download', 'opendir', 'quicklook', '|', 'upload', 'mkdir', '|',
		'copy', 'cut', 'paste', 'duplicate', '|', 'rm', '|', 'edit', 'rename', 'resize',
		'pixlr',	// 2.1_n
		'|', 'archive', 'extract', '|', 'places', 'info', 'chmod']
};
