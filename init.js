/**
 * https://github.com/Studio-42/elFinder/wiki/Client-configuration-options
**/
// UI plugins to load
//var elfinder_ui = ['toolbar', 'places', 'tree', 'path', 'stat'];
var elfinder_ui = ['toolbar', 'tree', 'path', 'stat'];

// toolbar configuration
var elfinder_toolbar = [
	['back', 'forward'],
	['reload'],
	['home', 'up'],
	['mkdir', 'mkfile', 'upload'],
	['open', 'download', 'getfile'],
	['info'],
	['quicklook'],
	['copy', 'cut', 'paste'],
	['rm'],
	['duplicate', 'rename', 'edit', 'resize'],
	['extract', 'archive'],
	['search'],
	['view'],
	['help']
];

/* Options for context menu: */
var elfinder_contextmenu = {
    // navbarfolder menu
    navbar : ['open', '|', 'copy', 'cut', 'paste', 'duplicate', '|', 'rm', '|', 'info'],
    // current directory menu
    cwd    : ['reload', 'back', '|', 'upload', 'mkdir', 'mkfile', 'paste', '|', 'info'],
    // current directory file menu
    files  : [
        'getfile', '|','open', 'quicklook', '|', 'download', '|', 'copy', 'cut', 'paste', 'duplicate', '|',
        'rm', '|', 'edit', 'rename', 'resize', '|', 'archive', 'extract', '|', 'info']
};
