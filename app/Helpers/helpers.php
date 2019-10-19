<?php

function active($route, $params = [])
{
    if (!request()->routeIs($route)) {
        return '';
    }

    if (empty($params)) {
        return 'active';
    }

    $query = request()->query();
    foreach ($params as $key => $value) {
        if (isset($query[$key]) && $query[$key] == $value) {
            return 'active';
        }
    }
    return '';
}

function user($guard = 'user')
{
    return auth($guard)->user();
}

function input_error($errors, $name)
{
    return $errors->has($name) ? ' is-invalid' : '';
}

function voted($comment, $positive)
{
    return user()->voted($comment, $positive);
}

function search_params($params = [])
{
    return array_merge(request()->query(), $params);
}
