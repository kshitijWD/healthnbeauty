<?php include('../includes/db_config.php'); ?>
<?php

    $error = false;
    $response = array('error' => ['nameerr' => '', 'emailerr' => '', 'phoneerr' => '']);

    // collecting form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $msg = $_POST['message'];
    $cookie_concent = isset($_POST['cookies-consent'])?$_POST['cookies-consent']:'off';

    /* validating form data */
    // validating name
    if($name == ''){
        $error = true;
        $response['error']['nameerr'] = "Name field is required...!";
        // $response['post'] = json_encode($_POST);
    }

    // validating email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $response['error']['emailerr'] = "Invalid email provided...!";
    }

    if($email == ''){
        $error = true;
        $response['error']['emailerr'] = "email field is required...!";
    }

    // validating phone number
    if($phone == ''){
        $error = true;
        $response['error']['phoneerr'] = "phone number is required...!";
    }


    if($error){
        $response['status'] = false;
    }else{
        $response['status'] = true;
    }

    if(!$error){
        $sql = "INSERT INTO `contact_us`(`name`, `email`, `phone`, `msg`, `cookie_concent`) VALUES (?,?,?,?,?)";

        $stmt = $con->prepare($sql);
        $stmt->bind_param('sssss', $name, $email, $phone, $msg, $cookie_concent);

        if ($stmt->execute()) {
            $response['status'] = true;
            $response['message'] = 'Record saved successfully ...!';
        } else {
            $response['status'] = false;
            $response['message'] = "Record couldn't saved!";
        }
    }

    echo json_encode($response);
?>