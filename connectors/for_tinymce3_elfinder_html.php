<?php
/*
 * For tinymce3 connector :
 * https://github.com/Studio-42/elFinder/wiki/Integration-with-TinyMCE-3.x
 * 
 * 
*/
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
		<script src="../elfinder_custum/js/commands/pixlr.js"></script>
		<!-- TinyMCE Popup class (REQUIRED) -->
		<script type="text/javascript" src="../../tinymce/tiny_mce/tiny_mce_popup.js"></script>
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
		  var FileBrowserDialogue = {
		    init: function() {
		      // Here goes your code for setting your custom things onLoad.
		    },
		    mySubmit: function (URL) {
		      var win = tinyMCEPopup.getWindowArg('window');

		      // pass selected file path to TinyMCE
		      win.document.getElementById(tinyMCEPopup.getWindowArg('input')).value = URL;

//		      // force the TinyMCE dialog to refresh and fill in the image dimensions
		      // are we an image browser?
		      if (typeof(win.ImageDialog) != 'undefined') {
		        // update image dimensions
		        if (win.ImageDialog.getImageData) {
		          win.ImageDialog.getImageData();
		        }
		        // update preview if necessary
		        if (win.ImageDialog.showPreviewImage) {
		          win.ImageDialog.showPreviewImage(URL);
		        }
		      }

		      // close popup window
		      tinyMCEPopup.close();
		    }
		  }

		  tinyMCEPopup.onInit.add(FileBrowserDialogue.init, FileBrowserDialogue);

		  $().ready(function() {
		    var elf = $('#elfinder').elfinder({
		      // set your elFinder options here
		      url: './connector.minimal_xh.php',  // connector URL
		      lang: "<?php echo $_SESSION['elfinder']['lang']; ?>",
		      height: '520',
		      dateFormat:"<?php echo $_SESSION['elfinder']['dateformat']; ?>",
		      fancyDateFormat : '$1 H:m:i',
		      commands : elfinder_commands,
		      ui    : elfinder_ui,
		      uiOptions : {
			      toolbar     : elfinder_toolbar
		      },
		      contextmenu : elfinder_contextmenu,
		      getFileCallback: function(file) { // editor callback
		        // file.url - commandsOptions.getfile.onlyURL = false (default)
		        // file     - commandsOptions.getfile.onlyURL = true
//		        FileBrowserDialogue.mySubmit(file.url); // Full URL path:selected file to TinyMCE
		        FileBrowserDialogue.mySubmit(file.path); // Relative path :selected file to TinyMCE
		      }
		    }).elfinder('instance');
		  });
		</script>
	</head>
	<body>

		<!-- Element where elFinder will be created (REQUIRED) -->
		<div id="elfinder"></div>

	</body>
</html>