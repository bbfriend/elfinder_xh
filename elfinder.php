<?php
/**
 * Elfinder plugin elfinder.php
 * 
 * @author David Stutz https://github.com/davidstutz
 * @author Takashi Uchiyama https://github.com/bbfriend/elfinder_xh
 * @version 1.01
 * @license GPLv3
 * 
 *  This file is part of the elfinder filebrowser plugin for CMSimple.
 *
 *  The plugin is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The plugin is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 *  GNU General Public License for more details.
 *
 *  @see <http://www.gnu.org/licenses/>.
 */

 /**
 * @class Elfinder
 * 
 * Elfinder class for generla informartion and script including.
 * 
 */
class Elfinder {
	
	/**
	 * @static
	 * @public
	 * Get plugin's name.
	 * 
	 * @return <string> name
	 */
	static function name()
	{
		return "elFinder_XH filebrowser plugin.";
	}
	
	/**
	 * @static
	 * @public
	 * Get plugin's release date.
	 * 
	 * @return <string> release date.
	 */
	static function release_date() 
	{
	   return "2016/05/20";
	}
	
	/**
	 * @static
	 * @public
	 * Get plugin's author.
	 * 
	 * @return <string> author.
	 */
	static function author()
	{
		return "David Stutz / Takashi Uchiyama";
	}
	
	/**
	 * @static
	 * @public
	 * Get plugin's website.
	 * 
	 * @return <string> website link
	 */
	static function github()
	{
		return '<a href="https://github.com/davidstutz/cmsimple-elfinder" target="_blank">davidstutz/cmsimple-elfinder</a> <a href="https://github.com/bbfriend/elfinde_xh" target="_blank">bbfriend/elfinde_xh</a>';
	}
	
	/**
	 * @static
	 * @public
	 * Get plugin's description.
	 * 
	 * @return <string> description
	 */
	static function description()
	{
		return '<q>elFinder is an open-source file manager for web, written in JavaScript using jQuery UI. Creation is inspired by simplicity and convenience of Finder program used in Mac OS X operating system.</q>';
	}
	
	/**
	 * @static
	 * @public
	 * Legal notes on elfinder.
	 * 
	 * @return <string> legal
	 */
	static function legal()
	{
		return 'JQuery and JQuery-UI license: MIT and GPL - see <a href="http://en.wikipedia.org/wiki/MIT_License">Wikipedia MIT License</a> - <a href="http://en.wikipedia.org/wiki/Gpl">Wikipedia MIT License</a><br />';
	}
	
	/**
	 * @static
	 * @public
	 * Include jquery.
	 * 
	 * @global hjs
	 * @global pth
	 * @global plugin
	 *
	 */
	public static function include_jquery()
	{
		global $pth, $plugin, $hjs;
		$plugin = basename(dirname(__FILE__),"/");
		
		static $jquery_included = FALSE;
		
		if (!$jquery_included)
		{
			$hjs .= '<script src="'.$pth['folder']['plugins'] . $plugin . '/jquery/js/jquery-1.12.2.min.js" type="text/javascript"></script>';
			$hjs .= '<script src="'.$pth['folder']['plugins'] . $plugin . '/jquery/js/jquery-ui-1.11.4.min.js" type="text/javascript"></script>';
			
			$jquery_included = TRUE;
		}
	}
	
	/**
	 * @static
	 * @public
	 * Init elfinder.
	 * 
	 * @global pth
	 * @global plugin
	 * @global hjs
	 * @global sl
	 */
	public static function include_elfinder()
	{
	 	global $pth, $plugin, $hjs, $sl,$plugin_cf;
		$plugin = basename(dirname(__FILE__),"/");
		
		static $elfinder_included = FALSE;
		
		if (!$elfinder_included)
		{
			$hjs .= '<link rel="stylesheet" href="' . $pth['folder']['plugins'] . $plugin . '/elfinder/css/elfinder.min.css" type="text/css" media="screen" charset="utf-8">';
			$hjs .= '<link rel="stylesheet" href="' . $pth['folder']['plugins'] . $plugin . '/elfinder_theme/'. $plugin_cf[$plugin]['interface_theme'] . '/css/theme.css" type="text/css" media="screen" charset="utf-8">';
			$hjs .= '<link rel="stylesheet" href="' . $pth['folder']['plugins'] . $plugin . '/css/stylesheet.css" type="text/css" media="screen" charset="utf-8">';

			$hjs .= '<script src="' . $pth['folder']['plugins'] . $plugin . '/elfinder/js/elfinder.min.js" type="text/javascript" charset="utf-8"></script>';
			if( $sl != 'en'){
				$hjs .= '<script src="' . $pth['folder']['plugins'] . $plugin . '/elfinder/js/i18n/elfinder.' . $_SESSION['elfinder']['lang'] . '.js" type="text/javascript" charset="utf-8"></script>';
			}
			$hjs .= '<script src="' . $pth['folder']['plugins'] . $plugin . '/init.js" type="text/javascript"></script>';
			
			$elfinder_included = TRUE;
		}
	}



/**
 * Returns the system checks.
 *
 * @return string  The (X)HTML.
 */
	public static function systemChecks()
	{ // RELEASE-TODO
	    global $pth, $tx, $plugin_tx,$plugin;

		//Requirements
		$equire_php_ver = '5.2'; //PHP VERSION
		$equire_exts = array( //PHP extensions
			1 => 'gd',
			2 => 'imagick',
			3 => 'intl',
			4 => 'I18N_UnicodeNormalizer'
		);
		$equire_folders = array( //Folders
			0 => $pth['folder']['userfiles'],
			1 => $pth['folder']['images'],
			2 => $pth['folder']['downloads'],
			3 => $pth['folder']['media']
		);

		$warn_files = array( 
			0 => $pth['folder']['plugins'].$plugin.'/elfinder/elfinder.html',
			1 => $pth['folder']['plugins'].$plugin.'/elfinder/php/connector.minimal.php',
		);

	    $ptx = $plugin_tx[$plugin];
	    $imgdir = $pth['folder']['plugins'].$plugin.'/help/images/';
	    $ok = tag('img src="'.$imgdir.'ok.png" alt="ok"');
	    $warn = tag('img src="'.$imgdir.'warn.png" alt="warning"');
	    $fail = tag('img src="'.$imgdir.'fail.png" alt="failure"');

	    $o = '<h2>'.$ptx['syscheck_title'].'</h2>';
		//Caution Message 
		$o .= $ptx['syscheck_cautionmessage'].tag('br');
		//PHP VERSION 
	    $o .= (version_compare(PHP_VERSION, $equire_php_ver) >= 0 ? $ok : $fail)
		    .'&nbsp;&nbsp;'.sprintf($ptx['syscheck_phpversion'], PHP_VERSION,$equire_php_ver)
		    .tag('br')."\n";
		//PHP extensions
	    foreach ($equire_exts as $ext) {
			$o .= (extension_loaded($ext) ? $ok : $fail)
				.'&nbsp;&nbsp;'.sprintf($ptx['syscheck_extension'], $ext).tag('br')."\n";
		}
		//Other PHP func etc.
//	    $o .= (!get_magic_quotes_runtime() ? $ok : $fail)
//		    .'&nbsp;&nbsp;'.$ptx['syscheck_magic_quotes'].tag('br')."\n";
		//UTF-8 Check
	    $o .= (strtoupper($tx['meta']['codepage']) == 'UTF-8' ? $ok : $fail)
		    .'&nbsp;&nbsp;'.$ptx['syscheck_encoding'].tag('br')."\n";
		//Folder writable
	    foreach ($equire_folders as $folder) {
			$o .= (is_writable($folder) ? $ok : $warn)
				.'&nbsp;&nbsp;'.sprintf($ptx['syscheck_writable'], $folder).tag('br')."\n";
	    }
		//File Check 
	    foreach ($warn_files as $files) {
			$o .= (file_exists($files) ? $warn : $ok)
				.'&nbsp;&nbsp;'.sprintf($ptx['syscheck_removefile'], $files).tag('br')."\n";
	    }
	    return $o;
	}


}