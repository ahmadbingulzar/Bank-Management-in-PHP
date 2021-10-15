<?php 
header("location:login.php");
?>


<IfModule mod_rewrite.c>


        RewriteEngine On
        RewriteBase /
       
        RewriteCond %{REQUEST_FILENAME} !-f
        RewriteCond %{REQUEST_FILENAME} !-d
        RewriteCond %{QUERY_STRING} !^Actions [NC]
        RewriteRule ^(.*)$ /crud/views/pages/$1 [L]


</IfModule>

