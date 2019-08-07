<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	if ( ! function_exists('escapeString'))
    {
        function escapeString($val)
        {
            $db = get_instance()->db->conn_id;
		    $val = mysqli_real_escape_string($db, $val);
		    return $val;
        }
    }