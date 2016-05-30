<?php
/*
 * For Stand alone connector : Called from other Plugin
 * 
 * @author:    BBFeiend 
 * @copyright 2016  <http://cmsimple-jp.org>
 * @Ver 1.01
 * 
*/
/******Useage:Your plugin ***************************************
*Step1: <head>...</head> ***
 * See Option of jquery.popupwindow.js : https://github.com/mkdynamic/jquery-popupwindow
 *		or elfinder_xh/jquery/popupwindow/jquery.popupwindow.js
 * Change [your plugin's Path ]: ex.$pth['folder']['plugins']

	<!-- jquery.min.js : If necessary  -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="[your plugin's Path]/elfinder_xh/jquery/popupwindow/jquery.popupwindow.js"></script>
	<script type="text/javascript"> 
		var profiles =
		{
			elfinder_windows:
			{
				height:550,	// sets the height in pixels of the window.
				width:950,	// sets the width in pixels of the window.
				center:1,	// should we center the window? {1 (YES) or 0 (NO)}. overrides top and left
				location:0, // determines whether the address bar is displayed {1 (YES) or 0 (NO)}.
				menubar:0	// determines whether the menu bar is displayed {1 (YES) or 0 (NO)}.
			},
		};

		$(function()
		{
			$(".popupwindow").popupwindow(profiles);
		});
		//absolute_path : ex .http://･･･/userfiles/images/**.jpeg
		//relative_path : ex .userfiles/images/**.jpeg
		function processFile(absolute_path,relative_path){
			$('#picture').html('<img src="' + absolute_path + '" />');
			$('#featured_image_rela').val(relative_path);
			$('#featured_image_abso').val(absolute_path);
		}
	</script>

*Step2:<body>...</body> (between your <form ...> ...</form>)
 * Add add your name(name="..") , style(ex.calss="...")
 * Change [your plugin's Path ]: ex.$pth['folder']['plugins']

	<div id="picture">
		<span>Image is displayed here</span>
	</div>
	<input type="text" id="featured_image_rela" placeholder="Relative_path Image" name="">
	<br>
	<input type="text" id="featured_image_abso" placeholder="Absolute_path Image" name="">
	<br>
	<a href="[your plugin's Path]/elfinder_xh/connectors/for_standalone_elfinder_html.php" class="popupwindow" rel="elfinder_windows">
	<button type="button" id="imageUpload" > Select Image </button>
	</a>

*Step3: (Example) Add Style :<head>...</head> ***

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
**********************************************/
if (!el_logincheck() ) { //Not login 
    session_destroy();
    header('Location: ../../../');
}
/**
 * Returns wether the user is logged in.
 *
 * @global array The configuration of the core.
 *
 * @return bool.
 */
function el_logincheck()
{
    if (session_id() == '') {
        session_start();
    }
    $el_root = $_SESSION["elfinder"]["sn"];

    return isset($_SESSION['xh_password'])
        && isset($_SESSION['xh_password'][$el_root])
        && $_SESSION['xh_password'][$el_root] == $_SESSION['elfinder']['password']
        && isset($_SESSION['xh_user_agent'])
        && $_SESSION['xh_user_agent'] == md5($_SERVER['HTTP_USER_AGENT']);
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>elFinder 2.1.x source version with PHP connector</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2" />

		<!-- jQuery and jQuery UI (REQUIRED) -->
		<link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

		<!-- elFinder CSS (REQUIRED) -->
		<link rel="stylesheet" type="text/css" href="../elfinder/css/elfinder.min.css">
		<link rel="stylesheet" type="text/css" href="../elfinder_theme/<?php echo $_SESSION['elfinder']['theme']; ?>/css/theme.css">
		<!-- Custom CSS  -->
		<link rel="stylesheet" type="text/css" href="../css/stylesheet.css">

		<!-- elFinder JS (REQUIRED) -->
		<script src="../elfinder/js/elfinder.min.js"></script>

		<!-- GoogleDocs Quicklook plugin for GoogleDrive Volume (OPTIONAL) -->
		<!--<script src="js/extras/quicklook.googledocs.js"></script>-->

		<script src="../init.js"></script>

<?php 
	if( $_SESSION['elfinder']['lang'] != 'en'){
?>
		<!-- elFinder translation (OPTIONAL) -->
		<script src="../elfinder/js/i18n/elfinder.<?php echo $_SESSION['elfinder']['lang']; ?>.js"></script>
<?php
	}
?>
		<!-- elFinder initialization (REQUIRED) -->
		<script type="text/javascript" charset="utf-8">
		  $().ready(function() {
		    var elf = $('#elfinder').elfinder({
		      // set your elFinder options here
		      url: './connector.minimal_xh.php',  // connector URL
		      lang: "<?php echo $_SESSION['elfinder']['lang']; ?>",
		      height: '520',
		      dateFormat:"<?php echo $_SESSION['elfinder']['dateformat']; ?>",
		      fancyDateFormat : '$1 H:m:i',
		      ui    : elfinder_ui,
		      uiOptions : {
			      toolbar     : elfinder_toolbar
		      },
		      contextmenu : elfinder_contextmenu,
		      getFileCallback : function(file) {
		        // file.url - commandsOptions.getfile.onlyURL = false (default)
		        // file     - commandsOptions.getfile.onlyURL = true

		//        file.url  // Full URL path:selected file
		//        file.path // Relative path :selected file
		        window.opener.processFile(file.url,file.path);

		        window.close();
		      },
		      resizable: false
		    }).elfinder('instance');
		  });
		</script>
	</head>
	<body>

		<!-- Element where elFinder will be created (REQUIRED) -->
		<div id="elfinder"></div>

	</body>
</html>