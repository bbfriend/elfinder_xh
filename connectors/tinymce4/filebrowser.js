/*
* @author  Takashi Uchiyama
* @link    http://cmsimple-jp.org
* @version 2.0.1
* for TinyMCE 4x & elFinder
* https://github.com/Studio-42/elFinder/wiki/Integration-with-TinyMCE-4.x
*/

function elFinderBrowser (field_name, url, type, win) {
  tinymce.activeEditor.windowManager.open({
    file: '%ELFINCERURL%connectors/for_tinymce4_elfinder_html.php',// use an absolute path!
    title: 'elFinder_xh %ELFINCER_TITLE%',
    width: 900,
    height: 550,
    resizable: 'yes'
  }, {
    setUrl: function (url) {
      win.document.getElementById(field_name).value = url;
    }
  });
  return false;
}
