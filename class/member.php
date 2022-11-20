<?php

require_once dirname(__FILE__, 2).'/vendor/autoload.php';

class MEMBER
{

    function getMemberByCode($member_code)
    {
        $room = DB_CONNECT::DB()->table('member');

        return $room->select()
            ->where('member_code', '=', $member_code) ->limit(1)
            ->get();
    }
}

?>