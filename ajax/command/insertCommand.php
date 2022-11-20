<?php
require_once dirname(__FILE__, 3).'/vendor/autoload.php';

try {
    $booking = DB_CONNECT::DB()->table('command');
    $booking->insert(
        [
            'command_code' => uniqid('c'),
            'member_code' => 'm6377727b479e0',
            'room_code' => $_POST['room_code'],
            'command' => $_POST['command'],
            'create_date' => date("Y-m-d H:i:s"),
        ]
    )->execute();
    throw new Exception('200');
} catch(Exception $e){
    $msg = $e->getMessage();
    $result['msg'] = $msg;

    if ($msg == '200') {
        echo "<script>location.href='/room/?code={$_POST['room_code']}'</script>";
    } else {
        echo '<script language="javascript">';
        echo "alert('$msg')";
        echo '</script>';
        echo "<script>history.back()</script>";
    }
}
?>