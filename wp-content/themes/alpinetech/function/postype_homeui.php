<?php

if (function_exists('get_field')) {
    function get_group_field(string $group, string $field, $post_id = 0)
    {
        $group_data = get_field($group, $post_id);
        if (is_array($group_data) && array_key_exists($field, $group_data)) {
            return $group_data[$field];
        }
        return null;
    }

    function get_group_in_group_field(string $group, string $sub_group, string $field, $post_id = 0)
    {
        $group_data = get_field($group, $post_id);
        if (is_array($group_data) && array_key_exists($sub_group, $group_data)) {
            $sub_group_data = $group_data[$sub_group];
            if (is_array($sub_group_data) && array_key_exists($field, $sub_group_data)) {
                return $sub_group_data[$field];
            }
        }
        return null;
    }
}
