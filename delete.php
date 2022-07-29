<?php
    $config_dir = '/etc/nginx/conf.d/';
    // $config_dir = '/usr/local/etc/nginx/servers/';

    if (!empty($_GET)) {
        if (empty($_GET['name'])) {
            echo 'error';
        }

        unlink($config_dir.$_GET['name']);

        header('Location:index.php');
    }
?>