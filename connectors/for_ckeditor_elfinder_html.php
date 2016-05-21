<?php
/*
 * For ckeditor connector :
 * https://github.com/Studio-42/elFinder/wiki/Integration-with-CKEditor
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
		  // Helper function to get parameters from the query string.
		  function getUrlParam(paramName) {
		    var reParam = new RegExp('(?:[\?&]|&amp;)' + paramName + '=([^&]+)', 'i') ;
		    var match = window.location.search.match(reParam) ;

		    return (match && match.length > 1) ? match[1] : '' ;
		  }

		  $().ready(function() {
		    var funcNum = getUrlParam('CKEditorFuncNum');

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
//		        window.opener.CKEDITOR.tools.callFunction(funcNum, file.url);// Full URL path:selected file
		        window.opener.CKEDITOR.tools.callFunction(funcNum, file.path);// Relative path :selected file
		        elf.destroy();
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