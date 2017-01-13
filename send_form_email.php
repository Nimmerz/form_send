<?php

// ----------------------------------------------------------------------------------------------------
// - Display Errors
// ----------------------------------------------------------------------------------------------------
//ini_set('display_errors', 'On');
//ini_set('html_errors', 0);

// ----------------------------------------------------------------------------------------------------
// - Error Reporting
// ----------------------------------------------------------------------------------------------------
error_reporting(-1);

// ----------------------------------------------------------------------------------------------------
// - Shutdown Handler
// ----------------------------------------------------------------------------------------------------
//function ShutdownHandler()
//{
//    if (@is_array($error = @error_get_last())) {
//        return (@call_user_func_array('ErrorHandler', $error));
//    };
//
//    return (TRUE);
//};
//
//register_shutdown_function('ShutdownHandler');

// ----------------------------------------------------------------------------------------------------
// - Error Handler
// ----------------------------------------------------------------------------------------------------
//function ErrorHandler($type, $message, $file, $line)
//{
//    $_ERRORS = Array(
//        0x0001 => 'E_ERROR',
//        0x0002 => 'E_WARNING',
//        0x0004 => 'E_PARSE',
//        0x0008 => 'E_NOTICE',
//        0x0010 => 'E_CORE_ERROR',
//        0x0020 => 'E_CORE_WARNING',
//        0x0040 => 'E_COMPILE_ERROR',
//        0x0080 => 'E_COMPILE_WARNING',
//        0x0100 => 'E_USER_ERROR',
//        0x0200 => 'E_USER_WARNING',
//        0x0400 => 'E_USER_NOTICE',
//        0x0800 => 'E_STRICT',
//        0x1000 => 'E_RECOVERABLE_ERROR',
//        0x2000 => 'E_DEPRECATED',
//        0x4000 => 'E_USER_DEPRECATED'
//    );

//    if (!@is_string($name = @array_search($type, @array_flip($_ERRORS)))) {
//        $name = 'E_UNKNOWN';
//    };
//
//    return (print(@sprintf("%s Error in file \xBB%s\xAB at line %d: %s\n", $name, @basename($file), $line, $message)));
//}
//
//;
//
//$old_error_handler = set_error_handler("ErrorHandler");
///////////////////////////

// Pear library includes
// You should have the pear lib installed
//include_once('Mail.php');
//include_once('Mail/mime.php');

//Settings
//$max_allowed_file_size = 20480; // size in KB
//$allowed_extensions = array("jpg", "jpeg", "gif", "bmp", "png");
//$upload_folder = './uploads/'; //<-- this folder must be writeable by the script formerly ./uploads/
//$your_email = 'example@email.com';//<<--  update this to your email address (my email subbed out)

//$errors = '';
//echo '<pre>';
//
//var_dump($_FILES);
//
//die();
//if (isset($_POST)) {
//    echo json_encode($_POST);
//}


//if(isset($_POST['submit']))
//{
//
//
//
//
//    //Get the uploaded file information
//    $name_of_uploaded_file =  basename($_FILES['uploaded_file']['name']);
//
//    //get the file extension of the file
//    $type_of_uploaded_file = substr($name_of_uploaded_file,
//        strrpos($name_of_uploaded_file, ' . ') + 1);
//
//    $size_of_uploaded_file = $_FILES["uploaded_file"]["size"]/1024;

///------------Do Validations-------------
//    if(empty($_POST['name'])||empty($_POST['email']))
//    {
//        $errors .= "\n Name and Email are required fields. ";
//    }
//    if(IsInjected($_POST['email']))
//    {
//        $errors .= "\n Bad email value!";
//    }
//
//    if($size_of_uploaded_file > $max_allowed_file_size )
//    {
//        $errors .= "\n Size of file should be less than $max_allowed_file_size";
//    }
//
//    //------ Validate the file extension -----
//    $allowed_ext = false;
//    for($i=0; $i<sizeof($allowed_extensions); $i++)
//    {
//        if(strcasecmp($allowed_extensions[$i],$type_of_uploaded_file) == 0)
//        {
//            $allowed_ext = true;
//        }
//    }
//
//    if(!$allowed_ext)
//    {
//        $errors .= "\n The uploaded file is not supported file type. ".
//            " Only the following file types are supported: ".implode(',',$allowed_extensions);
//    }

//send the email
//    if(empty($errors))
//    {
//        //copy the temp. uploaded file to uploads folder
//        $path_of_uploaded_file = $upload_folder . $name_of_uploaded_file;
//        $tmp_path = $_FILES["uploaded_file"]["tmp_name"];
//
//        if(is_uploaded_file($tmp_path))
//        {
//            if(!copy($tmp_path,$path_of_uploaded_file))
//            {
//                $errors .= '\n error while copying the uploaded file';
//            }
//        }

//        //send the email
//        $name = $_POST['name'];
//        $visitor_email = $_POST['email'];
//        $user_message = $_POST['message'];
//        $to = $your_email;
//        $subject="New form submission";
//        $from = $your_email;
//        $text = "A user  $name has sent you this message:\n $user_message";


//        $message = new Mail_mime();
//        $message->setHTMLBody($text);
//        $message->addAttachment($path_of_uploaded_file);
//        $body = $message->get();
//        $extraheaders = array("From"=>$from, "Subject"=>$subject,"Reply-To"=>$visitor_email);
//        $headers = $message->headers($extraheaders);
//        $mail = Mail::factory("mail");
//        $mail->send($to, $headers, $body);


//$message = new Mail_mime();
//$message->setTXTBody($text);
//$message->addAttachment($path_of_uploaded_file);
//$body = $message->get();
//$extraheaders = array("From"=>$from, "Subject"=>$subject,"Reply-To"=>$visitor_email);
//$headers = $message->headers($extraheaders);
//$mail = Mail::factory("mail");
//$mail->send($to, $headers, $body);
//redirect to 'thank - you page
//        header('Location: thank-you.html');
//    }
//}
///////////////////////////Functions/////////////////
// Function to validate against any email injection attempts
//function IsInjected($str)
//{
//    $injections = array('(\n+)',
//        '(\r+)',
//        '(\t+)',
//        '(%0A+)',
//        '(%0D+)',
//        '(%08+)',
//        '(%09+)'
//    );
//    $inject = join('|', $injections);
//    $inject = "/$inject/i";
//    if (preg_match($inject, $str)) {
//        return true;
//    } else {
//        return false;
//    }
//}


$recipient_email = "Nimmerz@yandex.ru"; //recepient
$from_email = "info@your_domain.com: "; //from email using site domain.


if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
    die('Sorry Request must be Ajax POST'); //exit script
}


if ($_POST) {


    $sender_email = filter_var($_POST["email"], FILTER_SANITIZE_STRING); //capture sender email
    $subject = 'Form submitted';
    $message = filter_var($_POST["message"], FILTER_SANITIZE_STRING); //capture message
    $attachments = $_FILES['file_attach'];


    //php validation
//    if(!filter_var($sender_email, FILTER_VALIDATE_EMAIL)){ //email validation
//        print json_encode(array('type'=>'error', 'text' => 'Please enter a valid email!'));
//        exit;
//    }
//    if(strlen($message)<3){ //check emtpy message
//        print json_encode(array('type'=>'error', 'text' => 'Too short message! Please enter something.'));
//        exit;
//    }


    $file_count = count($attachments['name']); //count total files attached
    $boundary = md5("sanwebe.com");

    if ($file_count > 0) { //if attachment exists
        //header

        $fl = "submit.txt";
        $a = file_get_contents($fl);
        $a++;
        $fp = fopen($fl, "c+");
        $fw = fputs($fp, $a);
        fclose($fp);

        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "From:" . $from_email . '#00'.$a."\r\n";
        $headers .= "Reply-To: " . $sender_email . "" . "\r\n";
        $headers .= "Content-Type: multipart/mixed; boundary = $boundary\r\n\r\n";


        $mail_body = "Email: " . $sender_email . "\r\nMessage: " . $message;


        //message text
        $body = "--$boundary\r\n";
        $body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
        $body .= "Content-Transfer-Encoding: base64\r\n\r\n";
        $body .= chunk_split(base64_encode($mail_body));
        //attachments
        for ($x = 0; $x < $file_count; $x++) {
            if (!empty($attachments['name'][$x])) {

                if ($attachments['error'][$x] > 0) //exit script and output error if we encounter any
                {
                    $mymsg = array(
                        1 => "The uploaded file exceeds the upload_max_filesize directive in php.ini",
                        2 => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form",
                        3 => "The uploaded file was only partially uploaded",
                        4 => "No file was uploaded",
                        6 => "Missing a temporary folder");
                    print  json_encode(array('type' => 'error', $mymsg[$attachments['error'][$x]]));
                    exit;
                }

                //get file info
                $file_name = $attachments['name'][$x];
                $file_size = $attachments['size'][$x];
                $file_type = $attachments['type'][$x];

                //read file
                $handle = fopen($attachments['tmp_name'][$x], "r");
                $content = fread($handle, $file_size);
                fclose($handle);
                $encoded_content = chunk_split(base64_encode($content)); //split into smaller chunks (RFC 2045)

                $body .= "--$boundary\r\n";
                $body .= "Content-Type: $file_type; name=" . $file_name . "\r\n";
                $body .= "Content-Disposition: attachment; filename=" . $file_name . "\r\n";
                $body .= "Content-Transfer-Encoding: base64\r\n";
                $body .= "X-Attachment-Id: " . rand(1000, 99999) . "\r\n\r\n";
                $body .= $encoded_content;
            }
        }
    } else { //send plain email otherwise

        $fl = "submit.txt";
        $b = file_get_contents($fl);
        $b = $a;

        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "From:" . $from_email . '#00'.$b."\r\n";
//        $headers .= "Reply-To: " . $sender_email . "" . "\r\n";
//        "Reply-To: ".$sender_email. "\n" .
//        "X-Mailer: PHP/" . phpversion();
//        $body = $message;
        $headers .= "Content-Type: multipart/mixed; boundary = $boundary\r\n\r\n";


        $mail_body = "Email: " . $sender_email;

        //message text
        $body = "--$boundary\r\n";
        $body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
        $body .= "Content-Transfer-Encoding: base64\r\n\r\n";
        $body .= chunk_split(base64_encode($mail_body));
    }

    $sentMail = mail($recipient_email, $subject, $body, $headers);
    if ($sentMail) //output success or failure messages
    {
        print json_encode(array('type' => 'done', 'text' => 'Thank you for your request'));
        exit;
    } else {
        print json_encode(array('type' => 'error', 'text' => 'Could not send mail! Please check your PHP mail configuration.'));
        exit;
    }
}


?>