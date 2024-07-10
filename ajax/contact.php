<?php
include('../connection/config.php');

if (isset($_POST['formType']) && $_POST['formType'] == "contact_form") {
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $date = $_POST['date'];
    $currentDateTime = date('Y-m-d H:i:s');

    $addContct = mysqli_query($con, "INSERT INTO `contact`(`name`, `phone`, `subject`, `date`, `msg`,`date_time`) VALUES ('$name','$phone','$subject','$date','$message','$currentDateTime')");

    if ($addContct) {
        $data['message'] = 'Thanks, we will connect you shortly..';
        $data['status'] = true;
    } else {
        $data['message'] = 'Error occur in contact us';
        $data['status'] = false;
    }
}

echo json_encode($data);
