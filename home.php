<?php
    require_once 'resources/config.php';

    require_once TEMPLATE_PATH.'/header.php';

    require_once ('resources/library/class.rubric.php');

    if ($user->is_logged_in()) {
        echo 'logged in';
    } else {
        echo 'not logged in';
    }

    $rubric = new Rubric($conn);

    if (isset($_POST['create_new_rubric_btn'])) {
        $table_name = trim($_POST['rubric_table_name_text_box']);
        $rubric->create_rubric_table($table_name);
    }

 ?>
<form method="post">
    <label for="rubric_table_name_text_box">Table name: </label>
    <input type="text" name="rubric_table_name_text_box">
    <button type="submit" name="create_new_rubric_btn">Create rubric</button>
</form>

<?php
    require_once TEMPLATE_PATH.'/footer.php';
 ?>
