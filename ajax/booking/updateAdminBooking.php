<?php
require_once dirname(__FILE__, 3).'/vendor/autoload.php';

try {

    $booking = DB_CONNECT::DB()->table('booking');
    $booking->update()
        ->set('people', $_POST['people'])
        ->set('booking_status', $_POST['booking_status'])
        ->set('start_date', $_POST['start_date'])
        ->set('end_date', $_POST['end_date'].' 23:59:59')
        ->where('booking_code', $_POST['booking_code'])
        ->execute();

    throw new Exception('200');
} catch(Exception $e){
    $msg = $e->getMessage();
    $result['msg'] = $msg;
    if ($msg == '200') {
        echo '<script language="javascript">';
        echo "alert('성공하였습니다')";
        echo '</script>';
        echo "<script> location.href = '/admin/booking/edit.php?code={$_POST['booking_code']}' </script>";

    } else {
        echo '<script language="javascript">';
        echo "alert('$msg')";
        echo '</script>';
        echo "<script>history.go(-1)</script>";
    }
}
?>