<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<?php include_http_metas() ?>
<?php include_metas() ?>
<?php include_title() ?>
<link rel="shortcut icon" href="/favicon.ico" />
<?php include_stylesheets() ?>
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <h1><?php  echo image_tag("logo.jpg")?></h1>
            
            </div>
            <div class="login-container">
            <div class="login-box">
            <?php include_partial('global/flashes') ?>
            <?php echo $sf_content ?></div>
        </div>
    </div>
</body>
</html>
