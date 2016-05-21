<?php
/*
 * Include file to enable and configure
 * elfinder for TinyMCE3.
 *
 * @author  Takashi Uchiyama
 * @link    http://cmsimple-jp.org
 * @version 1.0.1
 */

if (!function_exists('sv') || preg_match('/tinymce.php/i', sv('PHP_SELF')))
    die('Access denied');

function elfinder_xh_tinymce_init() {

    global $pth;

    //if (!isset($_SESSION['xh_session'])) { return ''; }
    if (!XH_ADM) {
        return '';
    }

    //elfinder_xh - Init
    include_once($pth['folder']['plugins'] . 'elfinder_xh/elfinder.php');

    //Callback-Function for TinyMCE
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