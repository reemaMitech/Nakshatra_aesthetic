<?php
use CodeIgniter\Controller;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception as PHPMailerException;;

require_once 'src/Exception.php';
require_once 'src/PHPMailer.php';
require_once 'src/SMTP.php';




function testemail()
{
    // $email = 'siddheshkadge214@gmail.com';
    $email = 'reema.mitech@gmail.com';
    $subject = 'for text';
    $body = 'This is the body of the email.';

    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'reema.mitech@gmail.com';
        $mail->Password = 'dmbfxsgioqehdshy';
        // $mail->Password = 'lxnpuyvyefpbcukr';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients

        $mail->setFrom('reema.mitech@gmail.com', 'MITECH');
        $mail->addAddress($email, 'Recipient Name');

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AltBody = strip_tags($body); // Optional: Plain text version of the email body

        // Send email
        $mail->send();
        echo 'Email has been sent successfully';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

function leaveemail($from_date, $to_date, $rejoining_date, $reason, $sender_name, $handovername, $admin_data, $sender_email)
{
    // // echo  $sender_name;
    //     echo "<pre>";print_r($sender_email);exit();

    $subject = 'Leave Application Of ' . $sender_name;

    // Convert date strings to timestamps
    $from_date_timestamp = strtotime($from_date);
    $to_date_timestamp = strtotime($to_date);
    
    // Calculate the number of days (assuming $from_date and $to_date are inclusive)
    if ($from_date_timestamp !== false && $to_date_timestamp !== false) {
        $numberOfDays = ($to_date_timestamp - $from_date_timestamp) / (60 * 60 * 24) + 1; // Adding 1 to include both start and end date
    } else {
        $numberOfDays = 'a specific number of'; // Fallback message if date conversion fails
    }

    // Start building the body of the email using HTML for consistent styling
    $body = "<p style='color: black; font-family: Arial, sans-serif;'>Dear Sir/Madam,</p>
    <p style='color: black; font-family: Arial, sans-serif;'>I, $sender_name, request you to kindly sanction me $numberOfDays days of leave from $from_date to $to_date for $reason. 
    I will ensure that all my current responsibilities and tasks are completed before my leave begins.</p>";
    
    // Add the line about handing over duties only if $handovername is not empty
    if (!empty($handovername)) {
        $body .= "<p style='color: black; font-family: Arial, sans-serif;'>During my absence, I will hand over my duties to $handovername, who has agreed to take on this responsibility after our discussion.</p>";
    }

    $body .= "<p style='color: black; font-family: Arial, sans-serif;'>I will rejoin my duties (office) on $rejoining_date.</p>
    <p style='color: black; font-family: Arial, sans-serif;'>I look forward to your approval.</p>
    <p style='color: black; font-family: Arial, sans-serif;'>Regards,<br>$sender_name</p>";

    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        // $mail->Host = 'mail.marketingintelligence.tech';
        $mail->Host = 'smtp.gmail.com';

        $mail->SMTPAuth = true;
        // $mail->Username = 'office@marketingintelligence.tech';
        // $mail->Password = 'pr%Wn+&ca6F9';

        $mail->Username = 'reema.mitech@gmail.com';
        $mail->Password = 'rqphzuwlelmirhox';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        // $mail->setFrom('office@marketingintelligence.tech', 'MITECH');
        $mail->setFrom('reema.mitech@gmail.com', 'Nakshatra Aesthetic Beauty Product');

        $mail->addCC($sender_email); 
        if (!empty($admin_data)) {
            $firstAdmin = array_shift($admin_data);
            $mail->addAddress($firstAdmin->email, $firstAdmin->first_name." ".$firstAdmin->middle_name." ".$firstAdmin->middle_name);
            foreach ($admin_data as $admin) { 
                $mail->addCC($admin->email, $admin->first_name." ".$admin->middle_name." ".$admin->middle_name); // Other admins as CC
            }
        } else {
            // Fallback if no admin data is provided
            $mail->addAddress('default@domain.com', 'Default Recipient');
        }
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body; // Email body with HTML tags
        $mail->AltBody = strip_tags($body); // Optional: Plain text version of the email body

        // Send email
        $mail->send();



        echo 'Email has been sent successfully';
    } catch (Exception $e) {

        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}









