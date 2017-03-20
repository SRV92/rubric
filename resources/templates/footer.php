<div id="footer">
    <div class="container">
        <?php
            if (!$user->is_logged_in()) {
                echo '<a href="login.php">Login</a>';
            } else {
                echo '<a href="logout.php?logout=true">Logout</a>';
            }
         ?>
    </div>
</div>
