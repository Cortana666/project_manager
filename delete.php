<?php
    require_once 'config.php';

    if (!empty($_GET)) {
        if (empty($_GET['name'])) {
            echo 'error';
            exit;
        }

        unlink($config_dir.$_GET['name']);

        header('Location:index.php');
    }
?>