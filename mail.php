<?php
    function protect($str) {
        return trim(strip_tags(addslashes($str)));
    }

    function sendEmail($from, $to, $subject, $body, $type) {
        require_once "Mail.php";
        $host = "email-smtp.us-west-2.amazonaws.com";
        $port = "587";
        $username = "AKIAIEDWXXQYYUHD5VTQ";
        $password = "BIm8pnta+3ojL7wRMHy1gglefJhhzZYlK969eCelJFnD";

        $headers = array (
            'From' => $from,
            'To' => $to,
            'Subject' => $subject,
            'Reply-To' => $from,
            'MIME-Version' => '1.0',
            'Content-type' => 'text/' . $type . '; charset=UTF-8'
        );
        $smtp = Mail::factory('smtp', array (
            'host' => $host,
            'port' => $port,
            'auth' => true,
            'username' => $username,
            'password' => $password
        ));

        $mail = $smtp->send($to, $headers, $body);  //Send Email
        if (PEAR::isError($mail)) { //Check for Errors
          echo("<p>" . $mail->getMessage() . "</p>");
          return false;
      } else {
          return true;
      }
    }

    if($_POST['register']){ // Input from Registrations Page
        $firstName = protect($_POST['name-first']);
        $lastName = protect($_POST['name-last']);
        $email = protect($_POST['email']);
        $phone = protect($_POST['phone']);
        $church = protect($_POST['church']);
        $payment = protect($_POST['payment']);
        $diet = protect($_POST['diet']);
        $comment = protect($_POST['comment']);

        if ($lastName == "test" || $lastName == "Test") {
            $from2 = "TWBC Registrations <registrations@twbcnorth.com>";
            $to2 =  $firstName . $lastname ." <" . $email . ">";
            $subject2 = "Tasmanian Women's Bible Conference Registration";
            $body2 = "<html><body>";
                $body2 .= "<p>Dear " . $firstName . "</p>";
                $body2 .= "<p>Thankyou for registering for this years conference. We will send you another email once we have received your payment to confirm your registration.</p>";
                switch ($payment) {
                    case 'Direct deposit':
                        $body2 .= "<p>Please make your direct deposit to:</p>";
                        $body2 .= "<table>";
                            $body2 .= "<tr><td><strong>Account Name:</strong></td><td>TWBC</td></tr>";
                            $body2 .= "<tr><td><strong>Bank:</strong></td><td>My State</td></tr>";
                            $body2 .= "<tr><td><strong>BSB:</strong></td><td>807009</td></tr>";
                            $body2 .= "<tr><td><strong>Account No:</strong></td><td>51416286</td></tr>";
                        $body2 .= "</table>";
                        $body2 .= "<p>Please include your surname and initial as the reference</p>";
                        break;
                    case 'Cheque in post':
                        $body2 .= "<p>Please send your cheque to:</p>";
                        $body2 .= "<table>";
                            $body2 .= "<tr><td>TWBC,</td></tr>";
                            $body2 .= "<tr><td>38 Brooklyn Rd,</td></tr>";
                            $body2 .= "<tr><td>Youngtown, TAS. 7249</td></tr>";
                        $body2 .= "</table>";
                        break;
                    case 'Cash to committee member':
                        $body2 .= "<p>Please give your cash payment to one of the committee members to complete your registration.</p>";
                        break;
                    default:
                        break;
                }
                $body2 .= "<p>For your records, this is the information you have provided us with. If anything appears to be incorrect please contact us.</p>";
                $body2 .= "<table>";
                    $body2 .= "<tr><td><strong>Name:</strong></td><td>" . $firstName . " " . $lastName . "</td></tr>";
                    $body2 .= "<tr><td><strong>Email:</strong></td><td>" . $email . "</td></tr>";
                    $body2 .= "<tr><td><strong>Phone:</strong></td><td>" . $phone . "</td></tr>";
                    $body2 .= "<tr><td><strong>Mobile:</strong></td><td>" . $mobile . "</td></tr>";
                    $body2 .= "<tr><td><strong>Church:</strong></td><td>" . $church . "</td></tr>";
                    $body2 .= "<tr><td><strong>Special Diet:</strong></td><td>" . $diet . "</td></tr>";
                    $body2 .= "<tr><td><strong>Comments:</strong></td><td>" . $comment . "</td></tr>";
                $body2 .= "</table>";
                $body2 .= "<p>
                    Kind regards,<br />
                    The TWBC North Committee<br />
                    twbcnorth@outlook.com
                </p>";
            $body2 .= "</body></html>";

            if (sendEmail($from2, $to2, $subject2, $body2, 'html')) { // Send Email
                if($payment == "Direct deposit") {
                    header("Location: /register.php?pt=d");
                } else if($payment == "Cheque in post") {
                    header("Location: /register.php?pt=p");
                } else {
                    header("Location: /register.php?pt=o");
                }
            }
        } else {
            // Message to be Sent to Committee
            $from = "TWBC North Registrations <registrations@twbcnorth.com>";
            $to = "TWBC North <twbcnorth@outlook.com>";
            //$to = "TWBC North <cmrnclffrd@gmail.com>";  // Testing
            $subject = "New Registration: " . $firstName . " " . $lastName;
            $body = "<html><body>";
                $body .= "<h2>New Registration</h2>";
                $body .= "<table>";
                    $body .= "<tr><td><strong>Name:</strong></td><td>" . $firstName . " " . $lastName . "</td></tr>";
                    $body .= "<tr><td><strong>Email:</strong></td><td>" . $email . "</td></tr>";
                    $body .= "<tr><td><strong>Phone:</strong></td><td>" . $phone . "</td></tr>";
                    $body .= "<tr><td><strong>Mobile:</strong></td><td>" . $mobile . "</td></tr>";
                    $body .= "<tr><td><strong>Church:</strong></td><td>" . $church . "</td></tr>";
                    $body .= "<tr><td><strong>Payment:</strong></td><td>" . $payment . "</td></tr>";
                    $body .= "<tr><td><strong>Special Diet:</strong></td><td>" . $diet . "</td></tr>";
                    $body .= "<tr><td><strong>Comments:</strong></td><td>" . $comment . "</td></tr>";
                $body .= "</table>";
            $body .= "</body></html>";

            // Message to be Sent to Registrant
            $from2 = "TWBC North Registrations <registrations@twbcnorth.com>";
            $to2 =  $firstName . $lastname ." <" . $email . ">";
            $subject2 = "Tasmanian Women's Bible Conference Registration";
            $body2 = "Dear ".$firstName."\r\n";
            $body2 .= "\r\n";
            $body2 .= "Thankyou for registering for this years conference. We will send you another email once we have received your payment to confirm your registration.\r\n";
            $body2 .= "\r\n";
            switch ($payment) {
                case 'Direct deposit':
                    $body2 .= "Please make your direct deposit to:\r\n";
                    $body2 .= "Account Name: TWBC\r\n";
                    $body2 .= "Bank: My State\r\n";
                    $body2 .= "BSB: 807009\r\n";
                    $body2 .= "Account No: 51416286\r\n";
                    $body2 .= "Please include your surname and initial as the reference\r\n";
                    break;
                case 'Cheque in post':
                    $body2 .= "Please send your cheque to:\r\n";
                    $body2 .= "TWBC,\r\n";
                    $body2 .= "38 Brooklyn Rd,\r\n";
                    $body2 .= "Youngtown, TAS. 7249\r\n";
                    break;
                case 'Cash to committee member':
                    $body2 .= "Please give your cash payment to one of the committee members to complete your registration.\r\n";
                    break;
                default:
                    break;
            }
            $body2 .= "\r\n";
            $body2 .= "For your knowledge this is the information you have provided us with. If anything appears to be incorrect please contact us via return email or calling Louise on 0422 926 053.\r\n";
            $body2 .= "Name: ".$firstName." ".$lastName."\r\n";
            $body2 .= "Email: ".$email."\r\n";
            $body2 .= "Phone: ".$phone."\r\n";
            $body2 .= "Church: ".$church."\r\n";
            $body2 .= "Special Diet: ".$diet."\r\n";
            $body2 .= "Comment: ".$comment."\r\n";
            $body2 .= "\r\n";
            $body2 .= "Kind regards,\r\n";
            $body2 .= "The TWBC North Committee\r\n";
            $body2 .= "twbcnorth@outlook.com";

            if (sendEmail($from, $to, $subject, $body, 'html') && sendEmail($from2, $to2, $subject2, $body2, 'plain')) { // Send Emails
                if($payment == "Direct deposit") {
                    header("Location: /register.php?pt=d");
                } else if($payment == "Cheque in post") {
                    header("Location: /register.php?pt=p");
                } else {
                    header("Location: /register.php?pt=o");
                }
            }
        }
    } else if($_POST['contact']){   // Input from Contact Page
        header("Location: /contact.php");


        $name = protect($_POST['name']);
        $email = protect($_POST['email']);
        $message = protect($_POST['message']);

        // Message to be Sent
        $from = "TWBC North Registrations <registrations@twbcnorth.com>";
        $to = "TWBC North <twbcnorth@outlook.com>";
        //$to = "TWBC North <cmrnclffrd@gmail.com>";  // Testing
        $subject = "Tasmanian Women's Bible Conference Contact";
        $body = "New contact message from twbcnorth.com.\r\n";
        $body .= "\r\n";
        $body .= "From: " . $name . "\r\n";
        $body .= "Email: " . $email . "\r\n";
        $body .= "\r\n";
        $body .= "Message: \r\n";
        $body .= $message . "\r\n";

        // if (sendEmail($from, $to, $subject, $body, 'plain')) {   // Send Emails
        //     header("Location: /contact.php?m=sent");
        // }
    } else {    // Arrived from unkown location
        header("Location: /404.php");
    }
?>
