<?php
	mb_language("Japanese");
	mb_internal_encoding("UTF-8");

	$email = 's.koyama1011@gmail.com';//ここにDBから Select user_email where alert_time = "";
	$to      = $email;
	$subject = 'テストメール';
	$message = 'これはテストです。';
	$headers = 'From: hoge@hoge.com'."\r\n";

	if (mb_send_mail($to, $subject, $message, $headers))
	{
	    echo "メールが送信されました。";
	}
	else
	{
	    echo "メールの送信に失敗しました。";
	}
?>