<?php

function route_class($route, $params = [], $class = 'active')
{
    if (
        !request()->routeIs($route) &&
        !request()->fullUrlIs($route) &&
        !request()->is($route)
    ) {
        return '';
    }

    if (empty($params)) {
        return $class;
    }

    $query = request()->query();
    foreach ($params as $key => $value) {
        if (isset($query[$key]) && $query[$key] == $value) {
            return $class;
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

function method_badge($method)
{
    $method = ucfirst($method);
    switch (strtolower($method)) {
        case 'get':
            $color = 'success';
            break;
        case 'post':
        case 'put':
        case 'patch':
            $color = 'primary';
            break;
        case 'delete':
            $color = 'danger';
            break;
        default:
            return '';
    }

    return "<span class='badge badge-{$color}'>{$method}</span>";
}
