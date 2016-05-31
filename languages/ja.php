<?php

$plugin_tx['elfinder_xh']['menu_main']="インフォメーション";
$plugin_tx['elfinder_xh']['cf_deny_extensions']="Global denied file extensions.<br>Will be checked upon upload or rename a file";
	$plugin_tx['elfinder_xh']['cf_interface_width']="操作画面の 幅（単位:px または auto ）<br> デフォルト:auto";
	$plugin_tx['elfinder_xh']['cf_interface_height']="操作画面の 高さ (単位:px)<br> デフォルト:600";
	$plugin_tx['elfinder_xh']['cf_interface_theme']="テーマ（スキン）。<br> デフォルト:elfinder";
	$plugin_tx['elfinder_xh']['cf_interface_thumbnailSize']="サムネイルサイズ (単位:px)。サムネイルは正方形です。CSSの修正等が必要となりますので特別な場合を除いて変更しないほうが安全です<br> デフォルト:48";

$plugin_tx['elfinder_xh']['cf_interface_showDotFilesDirs']="ドット(.)で始まるファイルやデイィレクトリを表示する。<br>特別な場合を除いて、チェックしないほうが安全です";
$plugin_tx['elfinder_xh']['cf_trouble-Shoot_debugMode']="デバッグモードにする";
$plugin_tx['elfinder_xh']['cf_trouble-Shoot_xh-TemplateIsBootstrap']="Bootstrapタイプのテンプレートを使用してる場合にチェックを試す。<br>jQuery UIとのコンフリクトを回避します.";
$plugin_tx['elfinder_xh']['cf_trouble-Shoot_encoding']="このボリュームのローカルエンコーディング(サーバのファイルシステムエンコーディング)。<b>iconv</b>の有効な値が必要.ex1. ISO-8859-1 ex2. CP932<br> デフォルト： 空欄(=UTF-8)";
	$plugin_tx['elfinder_xh']['cf_developers_sampleShow']="elFinder のスタンドアローンとして使うサンプル（メニュー）を表示. 他のプラグインからelFinder_xhを使う例です. <br>これはプラグイン開発者向けです .";
	$plugin_tx['elfinder_xh']['cf_plugin-AutoRotate_enable']="JPEG画像の自動回転。<b>EXIF Orientation</b>でアップロード時に処理します.";
	$plugin_tx['elfinder_xh']['cf_plugin-AutoResize_enable']="画像の自動サイズ。アップロード時に処理します.";
	$plugin_tx['elfinder_xh']['cf_plugin-AutoResize_maxWidth']="最大幅 .このサイズ以上の幅は、このサイズに変更<br> デフォルト:1200";
	$plugin_tx['elfinder_xh']['cf_plugin-AutoResize_maxHeight']="最大高さ .このサイズ以上の高さは、このサイズに変更 <br> デフォルト:1200";
	$plugin_tx['elfinder_xh']['cf_plugin-Watermark_enable']="画像にウォーターマーク（すかし）を入れる";
	$plugin_tx['elfinder_xh']['cf_plugin-Watermark_source']="ウォーターマーク（すかし）の画像名(png). <br>I設置場所 : elfinder_xh/images/<br> 例: logo.png ( elfinder_xh/images/logo.png が使用されます) ";
	$plugin_tx['elfinder_xh']['cf_plugin-Watermark_marginRight']="ウォーターマーク（すかし）の右の配置場所。Margin pixel. <br>デフォルト:5";
	$plugin_tx['elfinder_xh']['cf_plugin-Watermark_marginBottom']="ウォーターマーク（すかし）の下からの配置場所.Margin pixel. <br>デフォルト:5";
	$plugin_tx['elfinder_xh']['cf_plugin-Normalizer_enable']="ァイル名やPath名等のUTF-8 Normalizer<br> * 必須条件 Class \"Normalizer\"(PHP 5 >= 5.3.0, PECL intl >= 1.0.0) または PEAR package \"I18N_UnicodeNormalizer\"";
	$plugin_tx['elfinder_xh']['cf_plugin-Normalizer_nfc']="正規化形式C：文字は正準等価性によって分解され、再度合成。結果として文字の並びが変換前と変わることもありうる。<br> デフォルト:true";
	$plugin_tx['elfinder_xh']['cf_plugin-Normalizer_nfkc']="正規化形式KC：文字は互換等価性によって分解され、正準等価性によって再度合成される。<br>デフォルト:true";
	$plugin_tx['elfinder_xh']['cf_plugin-Sanitizer_enable']="ファイル名やPath名等のサニタイズ。<br>\ / ? \" \< \> |  を _ に自動変更します";
	$plugin_tx['elfinder_xh']['cf_saveOtherSize_enable']="画像のアップロード時に別サイズの画像を作成します。<br>正規な機能ではありません。この機能は将来、変更される可能性があります。";
	$plugin_tx['elfinder_xh']['cf_saveOtherSize_maxWidth']="別サイズの画像の幅.<br>デフォルト: 300";
	$plugin_tx['elfinder_xh']['cf_saveOtherSize_maxHeight']="別サイズの画像の高さ<br>デフォルト: 300";
	$plugin_tx['elfinder_xh']['cf_saveOtherSize_jpgquality']="画像の品質<br>デフォルト: 70";
	$plugin_tx['elfinder_xh']['cf_saveOtherSize_dirName']="別サイズの画像の保存先<br> デフォルト:smallSize. ＊ディレクトリは [images]/smallSize となります<br> ";

	$plugin_tx['elfinder_xh']['syscheck_title']="システムチェック";
	$plugin_tx['elfinder_xh']['syscheck_phpversion']="あなたの PHP は %s です(&ge; %s)";
	$plugin_tx['elfinder_xh']['syscheck_extension']="エクステンション '%s'";
	$plugin_tx['elfinder_xh']['syscheck_encoding']="内部文字列 'UTF-8'";
	$plugin_tx['elfinder_xh']['syscheck_magic_quotes']="Magic quotes runtime off";
	$plugin_tx['elfinder_xh']['syscheck_writable']="フォルダー書込み '%s' ";
	$plugin_tx['elfinder_xh']['syscheck_removefile']="デモ用ファイルの削除（または名前変更） '%s' ";
	$plugin_tx['elfinder_xh']['syscheck_cautionmessage']="＊エクステンション GD または Imagick(imagemagick)が必要です<br>＊プラグイン：Normalizerを使用するのであれば、PHP >= 5.3.0、<a href=\"https://pecl.php.net/package/intl\" target=\"_blank\"> PECL intl</a> >= 1.0.0 または <a href=\"https://pear.php.net/package/I18N_UnicodeNormalizer\" target=\"_blank\">Pear I18N_UnicodeNormalizer</a> が必要です";
?>
