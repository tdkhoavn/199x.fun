<?php

function int_value($val)
{
    $val = str_replace('.', '', $val);
    return intval($val);
}
