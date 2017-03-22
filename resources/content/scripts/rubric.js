function error(data) {
    // if the status returned from the controller is 'OK' there is no error
    if (data.status && data.status === "OK") {
        return false;
    } else {
        // there is an error
        return true;
    }
}

function display_error(data) {
    switch (data.status) {
        case "ERROR":
        // displays the error in a red popup box
            alert('error from display_error function');
        break;
        // displays the warning in a yellow popup box
        case "WARNING":
            alert('warning from display_error function');
        break;
        default:
        // displays messages that are not errors or warnings but may contain appropriate information
            alert('success from display_error function')
    }
}

$.getJSON("http://localhost/rubric/json.rubric.php?action=get_tables", function(result) {
        // if there is no error
        if (!error(result)) {
            // generate a success message in a toastr success popup
            // store the selected object in a variable
            var select = $('#dropdown');
            // iterate though the dropdown
            $.each(result.data.tables, function(key, val) {
                // add each option to the select list
                $(select)
                    .append($("<option></option>")
                    .attr("value", val)
                    .text(val));
            });
        }
        else {
            // displays error if failed
            alert('error');
            display_error(result);
        }
    });
