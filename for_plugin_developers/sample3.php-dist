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
    <title>Sample3:Standalone integration of elFinder</title>
    <link href='http://fonts.googleapis.com/css?family=Tauri' rel='stylesheet' type='text/css'>

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

    <style type="text/css">
        * {
            margin: 0px;
            padding: 0px;
        }
        
        body {
            background : #ececec;
            font-family: 'Tauri', sans-serif;
        }
        #main {
            width: 900px;
            margin: auto;
        }

        h1 {
            font-size: 36px;
            color: #333;
            text-shadow: 2px 2px 0px #fff;
            text-transform: uppercase;
            text-align: center;
        }

        h2 {
            font-size: 18px;
            color: #333;
            float: right;
            margin-bottom: 30px;
        }

        .clear {
            clear: both;
        }

        a {
            color: cornflowerblue;
            text-decoration: none;
            text-shadow: 2px 2px 0px #fff;
        }

        h2 span {
            color: #4d4d4d;
            font-style: italic;
            text-shadow: 2px 2px 0px #fff;
        }

        .button-group {
            width: 400px;
        }

        input[type="text"] {
            padding: 10px;
            width: 300px;
            background: #666;
            border: 1px solid #333;
            box-shadow: inset 1px 1px 1px 0px #4F4F4F, inset -1px -1px 1px 0px #4F4F4F;
            color: #fff;
            font-family: 'Tauri', sans-serif;
            text-shadow: 0px 1px 1px rgba(0,0,0,0.75);
            float: left;
        }
        button.browse {
            float: right;
            width: 78px;
            background: #32b50e; /* Old browsers */
            /* IE9 SVG, needs conditional override of 'filter' to 'none' */
            background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzMyYjUwZSIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiMwYzdmMGEiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
            background: -moz-linear-gradient(top,  #32b50e 0%, #0c7f0a 100%); /* FF3.6+ */
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#32b50e), color-stop(100%,#0c7f0a)); /* Chrome,Safari4+ */
            background: -webkit-linear-gradient(top,  #32b50e 0%,#0c7f0a 100%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(top,  #32b50e 0%,#0c7f0a 100%); /* Opera 11.10+ */
            background: -ms-linear-gradient(top,  #32b50e 0%,#0c7f0a 100%); /* IE10+ */
            background: linear-gradient(to bottom,  #32b50e 0%,#0c7f0a 100%); /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#32b50e', endColorstr='#0c7f0a',GradientType=0 ); /* IE6-8 */
            border: none;
            padding: 9px;
            border: 1px solid #146307;
            border-left: 0px;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
            color: #fff;
            font-family: 'Tauri', sans-serif;
            box-shadow: inset 1px 1px 1px 0px #36C10F, inset -1px -1px 1px 0px #36C10F;
            text-shadow: 0px 1px 1px rgba(0,0,0,0.75);
            cursor: pointer;
        }

        #picture {
            border-radius: 5px;
            border: 5px solid #fff;
            width: 390px;
            height: 390px;
            margin-bottom: 10px;
            vertical-align: middle;
        }
        
        #picture img{
            width: 390px;
            height: 390px;
        }

        #picture span {
            display: block;
            padding: 10px;
            color: #A6A6A6;
            font-size: 24px;
            text-align: center;
            font-family: 'Tauri', sans-serif;
            text-shadow: 2px 2px 0px #fff;
            margin-top: 150px;
        }
    </style>
</head>
        <body>
            <div id="main">
                <h1>Standalone integration of elFinder</h1>
                <h2>Design by <span>Martin Andreev - <a href="http://www-you.com">WWW-YOU</a></span></h2>
                <div class="clear"></div>
                <div id="picture">
                    <span>No picture?Use the browse button to select one!</span>
                </div>
                <div class="button-group">
                    <input type="text" id="featured_image_rela" placeholder="Relative_path Image" readonly name="featured_image" />
                    <input type="text" id="featured_image_abso" placeholder="Absolute_path Image" readonly name="featured_image" />

                    <button type="button" class="browse popupwindow"> Browse </button>
					</a>
                </div>
            </div>
        </body>
</html>
