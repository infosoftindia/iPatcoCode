<?php

if(function_exists('admin_head')){
admin_head('<link href="'.base_url(PLUGINS).'filer/css/jquery.filer.css" rel="stylesheet">');
admin_head('<link href="'.base_url(PLUGINS).'filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet">');
}
if(function_exists('admin_footer')){
admin_footer('<script src="'.base_url(PLUGINS).'filer/js/jquery.filer.min.js" type="text/javascript"></script>');
}
