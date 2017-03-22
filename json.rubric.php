<?php
    require_once ('resources/config.php');
    require_once ('resources/library/class.rubric.php');

    // main program body
    $rubric = new Rubric($conn);
    $response = new Schema();

    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'get_tables':
                echo $response->get_response($rubric->get_tables());
                break;
            case 'get_table_contents':
                if(isset($_GET['table'])) {
                    echo $response->get_response($rubric->get_table_contents($_GET['table']));
                }

            default:
                # code...
                break;
        }
    }
?>
