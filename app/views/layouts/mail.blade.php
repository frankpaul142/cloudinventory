<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>CloudInventory</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        @section('styles')
            <style type="text/css">
                html, body, div, form, fieldset, legend, label, img, tr{
                    margin: 0;
                    padding: 0;
                }
                table{
                    border-collapse: collapse;
                    border-spacing: 0;
                }
                th, td{
                    text-align: left;
                }
                h1, h2, h3, h4, h5, h6, th, td, caption { 
                    font-weight:normal; 
                }
                img { 
                    border: 0; display:block; padding:0; margin:0;
                }
            </style>
        @show
    </head>
    <body bgcolor="#ffffff">
        @yield('content')
    </body>
</html>