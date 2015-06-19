<div id="content">

Hello World!---- home<br><?php

echo basename($_SERVER['SCRIPT_FILENAME']).'/news/create', '<br>';
echo $_SERVER['HTTP_HOST'], '<br>';
echo $_SERVER['DOCUMENT_ROOT'], '<br>';
$adr = str_replace( $_SERVER['DOCUMENT_ROOT'], '', 'http://localhost/ci1/home');
echo basename($_SERVER['HTTP_HOST'].$adr.'index.php/news/create'), '<br>';?>
</div>