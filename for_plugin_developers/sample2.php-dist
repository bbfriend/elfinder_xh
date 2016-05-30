<?php
/*
 * * @Original : https://www-you.com/en/integratsiya-na-elfinder/
*/
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US"><head profile="http://gmpg.org/xfn/11">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="../jquery/popupwindow/jquery.popupwindow.js"></script>
<title>Sample2:Standalone integration of elFinder</title>

<script type="text/javascript"> 
	$(function()
	{
		$('.popupwindow').on('click', function(event) {
			event.preventDefault();
			$.popupWindow('../connectors/for_standalone_elfinder_html.php', {
				width: 950,
				height: 550
			});
		});
	});
	//absolute_path : ex .http://･･･/userfiles/images/**.jpeg
	//relative_path : ex .userfiles/images/**.jpeg
	function processFile(absolute_path,relative_path){
		$('#picture').html('<img src="' + absolute_path + '" />');
		$('#featured_image_rela').val(relative_path);
		$('#featured_image_abso').val(absolute_path);
	}
</script>
        </head>
        <body>
            <div id="main">
                <h1>Standalone integration of elFinder</h1>
                <h2>Simple Type</h2>
                <div id="picture">
                    <span>Image is displayed here</span>
                </div>
                    <input type="text" id="featured_image_rela" placeholder="Relative_path Image">
					<br>
                    <input type="text" id="featured_image_abso" placeholder="Absolute_path Image">
					<br>
                    <button type="button" class="popupwindow" > Select Image </button>

            </div>
        </body>
</html>
