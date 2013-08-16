<?php
require_once "FormV.php";

// php array of form validation rules
$rules = array(
    array(
        'field' => 'req',
        'label' => 'Required',
        'rules' => 'required'
    ),
    array(
        'field' => 'alphanumeric',
        'rules' => 'alpha_numeric'
    ),
    array( 
        'field' => 'password',
        'rules' => 'required'
    ),
    array(
        'field' => 'password_confirm',
        'label' => 'Password Confirmation',
        'rules' => 'required|matches[password]'
    ),
    array(
        'field' => 'email',
        'rules' => 'valid_email'
    ),
    array(
        'field' => 'minlength',
        'label' => 'Min Length',
        'rules' => 'min_length[8]'
    ),
    array(
        'field' => 'select_option',
        'label' => 'Select Option',
        'rules' => 'required'
    ),
    array(
        'field' => 'radio_input',
        'label' => 'Radio Input',
        'rules' => 'required'
    ),
    array(
        'field' => 'tos_checkbox',
        'label' => 'Terms of Service Check-box',
        'rules' => 'required'
    )
);

$formv = new Util\Form\FormV();
$formv->set_rules($rules);
$validation_js_code = $formv->get_js_validation_code($rules, 'example_form', 'form_errors');
$formSetter_js_code = $formv->get_js_formSetter_code('example_form'); 
// 2nd parameter here in the above method call is optional, 
// if not provided then the method will take $_POST;
// also you can provide any array with same field set (or field subset)
// to set the fields of the form when it loads 
// (this is usually in case of form edit)

$form_errors = '';
if(isset($_POST) && !empty($_POST)) {
    if($formv->run() == FALSE) {
        $form_errors = $formv->error_string();
    }
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <div id="form_errors"><?php echo $form_errors; ?></div>
    <form method="post" action="" id="example_form" name="example_form">
        <label>Required field: <input id="req" name="req" /></label>
        <br />
        <label>Alphanumeric field: <input id="alphanumeric" name="alphanumeric" /></label>
        <br />
        <label>Password: <input id="password" type="password" name="password" /></label>
        <br />
        <label>Password Confirmation (match password): <input id="password_confirm" type="password" name="password_confirm" /></label>
        <br />
        <label>Email: <input id="email" name="email" /></label>
        <br />
        <label>Min length field (min. 8 chars): <input id="minlength" name="minlength" /></label>
        <br />
        <label>Select:
            <select name="select_option" id="select_option">
                <option value="">Select an option</option>
                <option value="Option_1">Option 1</option>
                <option value="Option_2">Option 2</option>
                <option value="Option_3">Option 3</option>
                <option value="Option_4">Option 4</option>
                <option value="Option_5">Option 5</option>
                <option value="Option_6">Option 6</option>
            </select>
        </label>
        <br />
        <label><input type="radio" name="radio_input" value="1" /> Radio 1</label>
        <label><input type="radio" name="radio_input" value="2" /> Radio 2</label>
        <label><input type="radio" name="radio_input" value="3" /> Radio 3</label>
        <label><input type="radio" name="radio_input" value="4" /> Radio 4</label>
        <label><input type="radio" name="radio_input" value="5" /> Radio 5</label>
        <label><input type="radio" name="radio_input" value="6" /> Radio 6</label>
        <br />
        <label>Required checkbox (example: Terms of Service) <input id="tos_checkbox" type="checkbox" name="tos_checkbox" /></label>
        <br />
        <button class="button gray" type="submit">Submit</button>
    </form>
    <script type="text/javascript" src="FormV.min.js"></script>
    <?php echo $validation_js_code; ?>
    <?php echo $formSetter_js_code; ?>
</body>

</html>