<?php

function send_swift_mail($to, $subject, $message) {

    $data['text']=$message;
       $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        $headers .= 'From: info@reeqalnahl.com ' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
                mail($to,$subject,$message,$headers);
//   Mail::send('front.emails.mail', $data, function($newmessage)use($to,$subject) {
//          $newmessage->to($to)->subject
//             ($subject);
//          $newmessage->from('info@reeqalnahl.com','ريق النحل');
//       });
      return TRUE;
//    $transport = new \Swift_SmtpTransport('localhost', 25);
//
//    // Create the Mailer using your created Transport
//    $mailer = new \Swift_Mailer($transport);
//    $toarray = explode(',', $to);
//    $ccarray=[];
//    if(array_key_exists(1, $toarray))
//          $ccarray= array_slice($toarray, 1);          
//    // Create a message
//    $message1 = (new \Swift_Message($subject))
//            ->setFrom(['info@reeqalnahl.com'])
//            ->setTo($toarray[0])
//            ->setCc($ccarray)
//            ->setBody('')
//            ->addPart($message, 'text/html');
//
//    // Send the message
//    if (!$mailer->send($message1, $errors)) {
//        // Dump the log contents
//        // NOTE: The EchoLogger dumps in realtime so dump() does nothing for it. We use ArrayLogger instead.
//        return "Error:" . $logger->dump();
//    } else {
//        return "Successfull.";
//    }
}