<?php
    require_once ('resources/config.php');

    require_once (TEMPLATE_PATH.'/header.php');

    if (!$user->is_logged_in()) {
        $user->redirect('login.php');
    } else {
        $user->redirect('home.php');
    }

 ?>

 <?php
    require_once (TEMPLATE_PATH.'/footer.php');
  ?>
