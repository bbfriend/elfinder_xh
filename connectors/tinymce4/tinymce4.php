<?php
/*
 * Include file to enable and configure
 * elFinder for TinyMCE4.
 *
 * @author  Takashi Uchiyama
 * @link    http://cmsimple-jp.org
 * @version 1.01
 */
if (!function_exists('sv') || preg_match('/tinymce4.php/i', sv('PHP_SELF')))
    die('Access denied');

function elfinder_xh_tinymce4_init() {

    global $pth;

    //if (!isset($_SESSION['xh_session'])) { return ''; }
    if (!XH_ADM) {
        return '';
    }

    //elfinder - Init
    include_once($pth['folder']['plugins'] . 'elfinder_xh/elfinder.php');

    //Callback-Function for TinyMCE4
    $_SESSION['tinymce_fb_callback'] = 'elFinderBrowser';

	/* Include elfinder. */
	Elfinder::include_elfinder();

    $elfinder_url = CMSIMPLE_ROOT . 'plugins/elfinder_xh/';

    $script = file_get_contents(dirname(__FILE__) . '/filebrowser.js');

    $script = str_replace('%ELFINCERURL%', $elfinder_url, $script);
    $script = str_replace('%ELFINCER_TITLE%', ELFINDER_XH_VERSION, $script);

    return $script;
}

?>