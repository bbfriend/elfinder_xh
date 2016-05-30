<?php

$plugin_tx['elfinder_xh']['menu_main']="Informations";
$plugin_tx['elfinder_xh']['cf_interface_width']="The width of the elFinder main interface(in pixels or auto)<br> Dafult:auto";
$plugin_tx['elfinder_xh']['cf_interface_height']="The height of the elFinder main interface (in pixels).<br> Dafult:600";
$plugin_tx['elfinder_xh']['cf_interface_theme']="theme(skin)<br> Dafult:elfinder( recommend)";
$plugin_tx['elfinder_xh']['cf_interface_thumbnailSize']="Thumbnails size (in pixels). Thumbnails are square.<br>It becomes necessary CSS and etc. fixes. because it is safer not to change with the exception of the special cases<br> Dafult:48";
$plugin_tx['elfinder_xh']['cf_interface_showDotFilesDirs']="Show Files and Directories that start with a dot (.) <br>it is safer not check with the exception of the special cases";
$plugin_tx['elfinder_xh']['cf_trouble-Shoot_debugMode']="Start elFinder's Debug Mode ";
$plugin_tx['elfinder_xh']['cf_trouble-Shoot_xh-TemplateIsBootstrap']="If you are using Bootstrap type of template, Try Check on.<br>Maybe ,Conflict between Bootstrap and jQuery UI .";
$plugin_tx['elfinder_xh']['cf_trouble-Shoot_encoding']="This volume's local encoding. (server's file system encoding) It's necessary to be valid value to <b>iconv</b>.<br>ex1. ISO-8859-1 , ex2. CP932<br> Default empty(=UTF-8)";
$plugin_tx['elfinder_xh']['cf_developers_sampleShow']="Show Standalone integration of elFinder Sample. From any of the plugin, call the elfinder_xh. <br>This is For plugin developers .";
$plugin_tx['elfinder_xh']['cf_plugin-AutoRotate_enable']="Auto rotation on file upload of JPEG file by <b>EXIF Orientation</b>.";
$plugin_tx['elfinder_xh']['cf_plugin-AutoResize_enable']="Auto resize on image file upload.";
$plugin_tx['elfinder_xh']['cf_plugin-AutoResize_maxWidth']="MaxWidth .To resize . Greater than or equal to this size <br> Dafult:1200";
$plugin_tx['elfinder_xh']['cf_plugin-AutoResize_maxHeight']="MaxHeight .To resize Greater than or equal to this size <br> Dafult:1200";
$plugin_tx['elfinder_xh']['cf_plugin-Watermark_enable']="Print watermark on image file upload.";
$plugin_tx['elfinder_xh']['cf_plugin-Watermark_source']="Watermark PNG file name. <br>Installation location : elfinder_xh/images/<br> Ex: logo.png ( elfinder_xh/images/logo.png is used) ";
$plugin_tx['elfinder_xh']['cf_plugin-Watermark_marginRight']="Watermark's Right position. Margin pixel. <br> Dafult:5";
$plugin_tx['elfinder_xh']['cf_plugin-Watermark_marginBottom']="Watermark's Bottom position.Margin pixel. <br> Dafult:5";
$plugin_tx['elfinder_xh']['cf_plugin-Normalizer_enable']="UTF-8 Normalizer of file-name and file-path etc.<br> * This plugin require Class \"Normalizer\"(PHP 5 >= 5.3.0, PECL intl >= 1.0.0) or PEAR package \"I18N_UnicodeNormalizer\"";
$plugin_tx['elfinder_xh']['cf_plugin-Normalizer_nfc']="Canonical Decomposition followed by Canonical Composition<br>Dafult:true</p>";
$plugin_tx['elfinder_xh']['cf_plugin-Normalizer_nfkc']="Compatibility Decomposition followed by Canonical<br>Dafult:true";
$plugin_tx['elfinder_xh']['cf_plugin-Sanitizer_enable']="Sanitizer of file-name and file-path etc.<br>\\ / ? \" \\< \\> |  change to _";
$plugin_tx['elfinder_xh']['cf_middleimage_path']="<p>Directory for Middle Size Images </p>";
$plugin_tx['elfinder_xh']['cf_middleimage_maxwidth']="<p>Max width of Middle Image.dafult: 300</p>";
$plugin_tx['elfinder_xh']['cf_middleimage_maxheight']="<p>Max Height of Middle Image.dafult: 300</p>";
$plugin_tx['elfinder_xh']['cf_middleimage_jpgquality']="<p>Jpage Quality of Middle Image.dafult: 70</p>";
$plugin_tx['elfinder_xh']['syscheck_title']="System check";
$plugin_tx['elfinder_xh']['syscheck_phpversion']="Your PHP version %s &ge; %s";
$plugin_tx['elfinder_xh']['syscheck_extension']="Extension '%s' loaded";
$plugin_tx['elfinder_xh']['syscheck_encoding']="Encoding 'UTF-8' configured";
$plugin_tx['elfinder_xh']['syscheck_magic_quotes']="Magic quotes runtime off";
$plugin_tx['elfinder_xh']['syscheck_writable']="Folder '%s' writable";
$plugin_tx['elfinder_xh']['syscheck_removefile']="Demo File '%s' removed(or renamed)";
$plugin_tx['elfinder_xh']['syscheck_cautionmessage']="* Extensions GD <span style=\"color: #ff0000\">or</span> Imagick( convert imagemagick) require<br>* If you use the Plugin Normalizer: PHP>= 5.3.0, <a href=\"https://pecl.php.net/package/intl\" target=\"_blank\"> PECL intl</a> >= 1.0.0 or <a href=\"https://pear.php.net/package/I18N_UnicodeNormalizer\" target=\"_blank\">Pear I18N_UnicodeNormalizer</a> require";

?>
