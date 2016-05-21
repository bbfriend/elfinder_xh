<?php
/**
 * elFinder_XH connector.
 *
 * @author    BBFeiend 
 * @copyright 2016  <http://cmsimple-jp.org>
 * @Ver 
*/

//error_reporting(0); // Set E_ALL for debuging

if (session_id() == '') {
    session_start();
}

$startPath = $_SESSION['elfinder']['startpath'];

// read elFinder_XH config.php
include_once dirname(__FILE__).DIRECTORY_SEPARATOR. '../config/config.php';

include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'../elfinder/php/elFinderConnector.class.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'../elfinder/php/elFinder.class.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'../elfinder/php/elFinderVolumeDriver.class.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'../elfinder/php/elFinderVolumeLocalFileSystem.class.php';

/**
 * Simple function to demonstrate how to control file access using "accessControl" callback.
 * This method will disable accessing files/folders starting from '.' (dot)
 *
 * @param  string  $attr  attribute name (read|write|locked|hidden)
 * @param  string  $path  file path relative to volume root directory started with directory separator
 * @return bool|null
 **/
function access($attr, $path, $data, $volume) {
	return strpos(basename($path), '.') === 0       // if file/folder begins with '.' (dot)
		? !($attr == 'read' || $attr == 'write')    // set read+write to false, other (locked+hidden) set to true
		:  null;                                    // else elFinder decide it itself
}
// Set File Type
$upload_allow = array();
if($_SESSION['elfinder']['type'] == 'images'){
	//images
	$upload_maxsize = $_SESSION['elfinder']["images_maxsize"];
	$upload_allow = array('image');
}elseif($_SESSION['elfinder']['type'] == 'media'){
	//media
	$uploadmaxsize = $_SESSION['elfinder']["downloads_maxsize"];
	$upload_allow = array('video','audio');
}elseif($_SESSION['elfinder']['type'] == 'downloads'){
   //downloads
	$uploadmaxsize = $_SESSION['elfinder']["downloads_maxsize"];
	$upload_allow = array('application');
}elseif(  ($_SESSION['elfinder']['type'] == 'userfiles')
		||($_SESSION['elfinder']['type'] == '') ){
   //Top(userfiles) and TinyMCE
	$uploadmaxsize = $_SESSION['elfinder']["downloads_maxsize"];
	$upload_allow = array('image','video','audio','application','text');
}

//Dont delete folder 
$not_del_folder =	"/(". 
					rtrim($_SESSION['elfinder']['folders']["images"],'/') . '|'.
					rtrim($_SESSION['elfinder']['folders']["downloads"],'/') . '|'.
					rtrim($_SESSION['elfinder']['folders']["media"],'/') . 
					")$/";

// Documentation for connector options:
// https://github.com/Studio-42/elFinder/wiki/Connector-configuration-options
// https://github.com/Studio-42/elFinder/wiki/Connector-configuration-options-2.1
$opts = array(
//	'debug' => true,
	
	'bind' =>

		array(
			'upload' => array('smallImage'),

			'upload.presave' => array(
//				'smallImage',
				'Plugin.AutoRotate.onUpLoadPreSave',//elFinder Plugin AutoRotate
				'Plugin.AutoResize.onUpLoadPreSave',//elFinder Plugin AutoResize
				'Plugin.Watermark.onUpLoadPreSave',	//elFinder Plugin Watermark
				'Plugin.Normalizer.onUpLoadPreSave',//elFinder Plugin Normalizer
				'Plugin.Sanitizer.onUpLoadPreSave'	//elFinder Plugin Sanitizer
			),
			'upload.pre mkdir.pre mkfile.pre rename.pre archive.pre ls.pre' => array(
				'Plugin.Normalizer.cmdPreprocess',	//elFinder Plugin Normalizer
				'Plugin.Sanitizer.cmdPreprocess'	//elFinder Plugin Sanitizer
			),
			'ls' => array(
				'Plugin.Normalizer.cmdPostprocess',	//elFinder Plugin Normalizer
				'Plugin.Sanitizer.cmdPostprocess'	//elFinder Plugin Sanitizer
			),
		),
	// global configure (optional)
	'plugin' =>
		array(
		 //elFinder Plugin AutoRotate
			'AutoRotate' => array(
				'enable'         => $plugin_cf['elfinder_xh']['plugin-AutoRotate_enable'],//true or false
				'quality'        => 95          // JPEG image save quality
			),
		 //elFinder Plugin AutoResize
			'AutoResize' => array(
				'enable'         => $plugin_cf['elfinder_xh']['plugin-AutoResize_enable'],//true or false
				'maxWidth'       => $plugin_cf['elfinder_xh']['plugin-AutoResize_maxWidth'],// Over Width ,resize Size 
				'maxHeight'      => $plugin_cf['elfinder_xh']['plugin-AutoResize_maxHeight'],// Over Height ,resize Size (maxwidth is priority)
				'quality'        => 95,         // JPEG image save quality
				'preserveExif'   => false,      // Preserve EXIF data (Imagick only)
				'targetType'     => IMG_GIF|IMG_JPG|IMG_PNG|IMG_WBMP // Target image formats ( bit-field )
			),
		 //elFinder Plugin Watermark
			'Watermark' => array(
				'enable'         => $plugin_cf['elfinder_xh']['plugin-Watermark_enable'],//true or false
				'source'         => dirname(__FILE__) . "/../images/".$plugin_cf['elfinder_xh']['plugin-Watermark_source'],
				'marginRight'    => $plugin_cf['elfinder_xh']['plugin-Watermark_marginRight'],// Margin right pixel
				'marginBottom'   => $plugin_cf['elfinder_xh']['plugin-Watermark_marginBottom'],// Margin bottom pixel
				'quality'        => 95,         // JPEG image save quality
				'transparency'   => 70,         // Water mark image transparency ( other than PNG )
				'targetType'     => IMG_GIF|IMG_JPG|IMG_PNG|IMG_WBMP, // Target image formats ( bit-field )
				'targetMinPixel' => 200         // Target image minimum pixel size
			),
		 //elFinder Plugin Normalizer
			'Normalizer' => array(
				'enable'    => $plugin_cf['elfinder_xh']['plugin-Normalizer_enable'],
				'nfc'       => $plugin_cf['elfinder_xh']['plugin-Normalizer_nfc'],
				'nfkc'      => $plugin_cf['elfinder_xh']['plugin-Normalizer_nfkc'],
				'lowercase' => false,
 				'convmap'   => array()
			),
		 //elFinder Plugin Sanitizer
			'Sanitizer' => array(
				'enable' => $plugin_cf['elfinder_xh']['plugin-Sanitizer_enable'],//true or false
				'targets'  => array('\\','/',':','*','?','"','<','>','|'), // target chars
				'replace'  => '_'    // replace to this
			)
		),

	'roots'	=> array(
		array(
			'driver'	=> 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
			'path'		=> $_SESSION['elfinder']['root'] . $_SESSION['elfinder']['startpath'],
			'URL'		=> 'http://'.$_SESSION['elfinder']['url'] . $_SESSION['elfinder']['startpath'],
			'tmbSize'	=> $plugin_cf['elfinder_xh']['interface_thumbnailSize'],
			'attributes'=> array(
			    array(
			        'pattern'	=> $not_del_folder, // ex. /(images|downloads|media)$/
			        'read'		=> true,
			        'write'		=> true,
			        'locked'	=> true
			        ),
			    array(
			        'pattern'	=> '/XHdebug.txt/i', 
			        'read'		=> false,
			        'write'		=> false,
			        'locked' => true,
			        'hidden' => true
			        ),
			    array(
			        'pattern'	=> '/\.(exe|html|php|py|pl|sh|xml)$/i', 
			        'read'		=> false,
			        'write'		=> false,
			        'locked' => true,
//			        'hidden' => true
			        )
			),

			'uploadDeny'		=> array('all'),     // All Mimetypes not allowed to upload
			'uploadMaxSize'	=> $upload_maxsize,
			'uploadAllow'	=> $upload_allow,

			'disabled' => array('zipdl'),//Disable folder download
//			'encoding'    => 'CP932', //
			'locale'		=> $_SESSION['elfinder']['locale'],
			'uploadOrder'	=> array('deny', 'allow'),
			'accessControl'	=> 'access'                     // disable and hide dot starting files (OPTIONAL)
		)
	)
);
/** Add in the future ?
 *	https://github.com/Studio-42/elFinder/issues/1331
 *
**/
/*
function smallImage($cmd, $result, $args, $elfinder, $volume) {
    // make image maxsize
    $maxWidth = 300;
    $maxHeight = 300;
    $jpgQuality = 70;
//    $smallsDir = set_realpath('./resources/smallSize/');
    $smallsDir = $_SESSION['elfinder']['root'] . $_SESSION["elfinder"]["folders"]["images"] .'smallSize/';

    if ($volume && $result && isset($result['added'])) {

        foreach($result['added'] as $item) {
            if ($file = $volume->file($item['hash'])) {
                $path = $volume->getPath($item['hash']);
                if (strpos($file['mime'], 'image/') === 0 && ($srcImgInfo = @getimagesize($path))) {
                    $zoom = min(($maxWidth/$srcImgInfo[0]),($maxHeight/$srcImgInfo[1]));
                    $width = round($srcImgInfo[0] * $zoom);
                    $height = round($srcImgInfo[1] * $zoom);
                    $tfp = tmpfile();
                    $info = stream_get_meta_data($tfp);
                    $temp = $info['uri'];
                    if ($src = fopen($path, 'rb')) {
                        stream_copy_to_stream($src, $tfp);
                        fclose($src);
                        if ($volume->imageUtil('resize', $temp, compact('width', 'height', 'jpgQuality'))) {
                            @copy($temp, $smallsDir . '/' . $file['name']);
                        }
                    }
                }
            }
        }
    }
}
****/


// run elFinder
$connector = new elFinderConnector(new elFinder($opts));
$connector->run();

