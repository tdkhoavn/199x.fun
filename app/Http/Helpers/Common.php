<?php

use Illuminate\Support\Str;

/**
 * get options data for render select, radio, checkox or show the text of status
 *
 * @param str $key, str $first
 *
 * @return array
 */
function get_flags($key = '')
{
    switch ($key) {
        case 'gender_status':
            return [
                1 => 'Nam',
                2 => 'Nữ',
                3 => 'Khác',
            ];
        default:
            break;
    }
}

/**
 * get value from function get_flags()
 *
 * @param str $key, str $val
 *
 * @return str
 */
function get_val_flag($key = '', $val = '')
{
    $flags = get_flags($key);
    if (!$flags) {
        return null;
    }
    return isset($flags[$val]) ? $flags[$val] : null;
}

/**
 * get key from function get_flags()
 *
 * @param str $key, str $val
 *
 * @return str
 */
function get_key_flag($key = '', $val = '')
{
    $flags = array_flip(get_flags($key));
    return isset($flags[$val]) ? $flags[$val] : null;
}

function int_value($val)
{
    $val = str_replace('.', '', $val);
    return intval($val);
}

function get_member_name($members, $member_ids, $delimeter, $limit = 50)
{
    $members = $members->whereIn('id', $member_ids);
    if ($members->isEmpty()) {
        return '《Một mình》';
    }

    return Str::limit(
        $members->pluck('name')->implode($delimeter),
        $limit,
        '...'
    );
}

function get_avatar_path($user)
{
    return $user->id . DIRECTORY_SEPARATOR . $user->avatar;
}
