<?php

function int_value($val)
{
    $val = str_replace('.', '', $val);
    return intval($val);
}

function get_members($members, $member_ids)
{
    $members = $members->whereIn('id', $member_ids);
    return $members;
}
