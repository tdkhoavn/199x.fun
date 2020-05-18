<?php

function int_value($val)
{
    $val = str_replace('.', '', $val);
    return intval($val);
}

function get_badge_event($type, $name)
{
    switch ($type) {
        case 1:
            return '<span class="badge">' . $name . '</span>';
        case 2:
            return '<span class="badge">' . $name . '</span>';
        case 3:
            return '<span class="badge">' . $name . '</span>';
    }
}

function get_members($members, $member_ids)
{
    $members = $members->whereIn('id', $member_ids);
    return $members;
}
