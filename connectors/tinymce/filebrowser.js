/*
* @author  Takashi Uchiyama
* @link    http://cmsimple-jp.org
* @version 2.0.1
* @date    2014-02-07
* @package elfinder_xh
*
* for TinyMCE3 & elFinder
* https://github.com/Studio-42/elFinder/wiki/Integration-with-TinyMCE-3.x
*/

function elFinderBrowser (field_name, url, type, win) {
  var elfinder_url = '%ELFINCERURL%connectors/for_tinymce3_elfinder_html.php';// use an absolute path!
  tinymce.activeEditor.windowManager.open({
    file: elfinder_url,
    title: 'elFinder_xh %ELFINCER_TITLE%',
    width: 900,  
    height: 550,
    resizable: 'yes',
    inline: 'yes',    // This parameter only has an effect if you use the inlinepopups plugin!
    popup_css: false, // Disable TinyMCE's default popup CSS
    close_previous: 'no'
  }, {
//    setUrl: function (url) {
//      win.document.getElementById(field_name).value = url;
    window: win,
    input: field_name
//    }
  });
  return false;
}
