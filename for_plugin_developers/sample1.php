<?php
/**
 *  elfinder_UsedPlugin 
 *
 *   This Plugin is Sample of Standalone integration of elFinder_xh
 *  
 * @package	elfinder_UsedPlugin
 * @copyright	Copyright (c) 2015 T.Uchiyama <http://cmsimple-jp.org/>
 * @license	http://www.gnu.org/licenses/gpl-3.0.en.html GNU GPLv3
 * @version 1.0.1
 * @link	http://cmsimple-jp.org
 */

if (!XH_ADM ) {
    return;
}

/*
 * Prevent direct access.
 */
if (!defined('CMSIMPLE_XH_VERSION')) {
    header('HTTP/1.0 403 Forbidden');
    exit;
}

function elfinder_standalone_sample1(){
	global $cf,$pth,$o, $hjs;

	$init_popupwindow = <<< EOM
<script src="{$pth['folder']['plugins']}elfinder_xh/jquery/popupwindow/jquery.popupwindow.js"></script>
<script type="text/javascript">
	$(function()
	{
		$('.popupwindow').on('click', function(event) {
			event.preventDefault();
			$.popupWindow('{$pth['folder']['plugins']}elfinder_xh/connectors/for_standalone_elfinder_html.php', {
				width: 950,
				height: 550
			});
		});
	});
	//absolute_path : ex .http://еее/userfiles/images/**.jpeg
	//relative_path : ex .userfiles/images/**.jpeg
	function processFile(absolute_path,relative_path){
		$('#picture').html('<img src="' + absolute_path + '" />');
		$('#featured_image_rela').val(relative_path);
		$('#featured_image_abso').val(absolute_path);
	}
</script>
EOM;

	$hjs .= $init_popupwindow;


	$add_style = <<< EOM
<style type="text/css">
	#picture {
		border-radius: 5px;
		border: 5px solid #dfdfdf;
		width: 200px;
		height: 200px;
		margin-bottom: 10px;
		vertical-align: middle;
	}

	#picture img{
		width: 200px;
		height: 200px;
	}
</style>
EOM;
	$hjs .= $add_style;

	/** 
      * add your name & Style : <input ... name="..." class="..." >
      * 
    ***/
	$show_strings = <<< EOM
                <h1>Standalone integration of elFinder</h1>
                <h2>Simple Type</h2>
                <p> Source file: elfinder_xh/for_plugin_developers/sample1.php</p>
                <div id="picture">
                    <span>Image is displayed here</span>
                </div>
                    <input type="text" id="featured_image_rela" placeholder="Relative_path Image">
					<br>
                    <input type="text" id="featured_image_abso" placeholder="Absolute_path Image">
					<br>
                    <button type="button" class="popupwindow" > Select Image </button>
            </div>
EOM;


	$o .= $show_strings;
}

?>
