<?php
    // associate rubric class with this view
    require_once('resources/library/class.rubric.php');

    require_once ('resources/config.php');

    require_once TEMPLATE_PATH.'/header.php';

    if (isset($_POST['create_new_rubric_btn'])) {

    }
 ?>

 <form method="post">

     <label for="rubric_criteria_text_box">Criteria</label>
     <input type="text" name="rubric_criteria_text_box" />

     <label for="rubric_fail_text_box">Fail percentage</label>
     <input type="text" name="rubric_fail_text_box" />

     <label for="rubric_pass_text_box">Pass percentage</label>
     <input type="text" name="rubric_pass_text_box" />

     <label for="rubric_merit_text_box">Merit percentage</label>
     <input type="text" name="rubric_merit_text_box" />

     <label for="rubric_distinction_text_box">Distinction percentage</label>
     <input type="text" name="rubric_distinction_text_box" />

     <button type="submit" name="create_new_rubric_btn">Create rubric</button>
 </form>
