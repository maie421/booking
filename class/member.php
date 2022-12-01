<?php

require_once dirname(__FILE__, 2).'/vendor/autoload.php';

class MEMBER
{

    function getMemberByCode($member_code)
    {
        $member = DB_CONNECT::DB()->table('member');

        return $member->select()
            ->where('member_code', '=', $member_code) ->limit(1)
            ->get();
    }


    function getLoginMemberTypeByCode()
    {
        $member = DB_CONNECT::DB()->table('member');
        $member_data = $member->select()
            ->where('member_code', '=', COMMON::getSession('member_code')) ->limit(1)
            ->get();

        if($member_data){
            return $member_data['type'];
        }

        return $member_data;
    }

}

?>