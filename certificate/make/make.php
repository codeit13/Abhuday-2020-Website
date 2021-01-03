<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/db/config.php';
$post = $_POST;
$json = array();
$json['post'] = $post;

$senderEmailId = 'techno_forum@birlainstitute.co.in';
$senderEmailPass = '7Z57wy2xn)5z';

if (!empty($post['action']) && $post['action']=="generateCertificate") {
    $timeNow = time();

    $name = $post['awardedTo'];
    $position = $post['position'];
    $competitionName = $post['competitionName'];
    $competitionDate = date('d-M-Y', $timeNow);

    $certificateId = $timeNow;
    $studentEmailId = $post['email'];
    $imageName = $certificateId . '.png';
    $created_at = $timeNow;

    $sql = "INSERT INTO certificates (certificate_id, image, awarded_to, comp_name, comp_date, position, created_at, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ssssssss", $certificateId, $imageName, $name, $competitionName, $competitionDate, $position, $created_at, $studentEmailId);

        // Attempt to execute the prepared statement
        if ($res = mysqli_stmt_execute($stmt)) {
            // Store result
            mysqli_stmt_store_result($stmt);
        } else {
            $json['msg'] =  "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    if ($res) {
        $nameFont="./Anton-Regular.ttf";
        $textFont="./OpenSans-Regular.ttf";
        $certificateUsed = $position . ".png";
        $font_size = 100;
        $image=imagecreatefrompng($certificateUsed);
        $textColor=imagecolorallocate($image, 19, 21, 22);
        $nameColor=imagecolorallocate($image, 40, 57, 101);
        $certificateIdColor=imagecolorallocate($image, 255, 255, 255);







        // Get image Width and Height
        $image_width = imagesx($image);
        $image_height = imagesy($image);

        // // Get Bounding Box Size
        // $name_box = imagettfbbox(250, 0, $nameFont, strtoupper($name));
        //
        // // Get your Text Width and Height
        // $name_width = $name_box[2]-$name_box[0];
        // $name_height = $name_box[7]-$name_box[1];
        //
        // // Calculate coordinates of the text
        // $x = ($image_width/2) - ($name_width/2);
        // $y = ($image_height/2) - ($name_height/2);
        //
        // imagettftext($image, 100, 0, $x, $y-10, $nameColor, $nameFont, strtoupper($name));




        $image_box = imagettfbbox(50, 0, $textFont, $name);

        // Get your Text Width and Height
        $box_width = $image_box[2]-$image_box[0];
        $box_height = $image_box[7]-$image_box[1];

        // Calculate coordinates of the text
        $x = ($image_width/2) - ($box_width/2);
        $y = ($image_height/2) - ($box_height/2);

        imagettftext($image, 64, 0, $x, $y+135, $nameColor, $nameFont, strtoupper($name));










        $text_box = imagettfbbox(50, 0, $textFont, $competitionName);

        // Get your Text Width and Height
        $text_width = $text_box[2]-$text_box[0];
        $text_height = $text_box[7]-$text_box[1];

        // Calculate coordinates of the text
        $x = ($image_width/2) - ($text_width/2);
        $y = ($image_height/2) - ($text_height/2);

        if ($competitionName == 'How to get away with a Murder') {
            $xDifference = 280;
            $yDifference = 0;
        } elseif ($competitionName == 'Literature Quiz') {
            $xDifference = 20;
            $yDifference = 0;
        } elseif ($competitionName == 'Hikayat') {
            $xDifference = -90;
            $yDifference = 0;
        } elseif ($competitionName == 'Nirvana') {
            $xDifference = -80;
            $yDifference = 8;
        } elseif ($competitionName == 'Feel the Beat') {
            $xDifference = 0;
            $yDifference = 5;
        } elseif ($competitionName == 'Alankar') {
            $xDifference = -90;
            $yDifference = 5;
        } elseif ($competitionName == 'Plot Twist') {
            $xDifference = -60;
            $yDifference = 5;
        } elseif ($competitionName == 'Shutter Up') {
            $xDifference = -40;
            $yDifference = 0;
        }

        imagettftext($image, 32, 0, $x+305+$xDifference, $y+265+$yDifference, $nameColor, $nameFont, strtoupper($competitionName));







        imagepng($image, '../certificates/' . $imageName);
        imagedestroy($image);

        $json['image'] = $imageName;
        $json['status'] = 'success';

        $file_path = 'https://abhuday.birlainstitute.co.in/certificate/certificates/' . $imageName;
        // $file_path_pdf = '../pdfs/' . str_replace('jpg', 'pdf', $imageName);

        // SEND MAIL

        $subject = "You have been awarded a certificate for Abhuday 2k20 Event";

        $emailMessageContent = $subject;

        $message = "<h1>$emailMessageContent</h1>";
        $message .= "<h4>Certificate File <img src='$file_path'></h4>";

        $header = "From:admin@birlainstitute.co.in \r\n";
        // $header .= "Cc:afgh@somedomain.com \r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";

        $retval = mail($studentEmailId, $subject, $message, $header);

        // if ($retval == true) {
        //     $json['status'] = "success";
        // } else {
        //     $json['status'] = "failed";
        // }
    } else {
        $json['status'] = 'failed';
    }

    $json['link'] = $link;

    header('Content-Type: application/json');
    echo json_encode($json);
}

function imagettftextSp($image, $size, $angle, $x, $y, $color, $font, $text, $spacing = 0)
{
    if ($spacing == 0) {
        imagettftext($image, $size, $angle, $x, $y, $color, $font, $text);
    } else {
        $textArr = explode(' ', $text);
        $temp_x = $x;
        for ($i = 0; $i < count($textArr); $i++) {
            $bbox = imagettftext($image, $size, $angle, $temp_x, $y, $color, $font, $textArr[$i]);
            $temp_x += $spacing + ($bbox[2] - $bbox[0]);
        }
    }
}
