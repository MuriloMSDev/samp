<?php

function active($route)
{
    return request()->routeIs($route) ? 'active' : '';
}

function user($guard = 'user')
{
    return auth($guard)->user();
}

function input_error($errors, $name)
{
    return $errors->has($name) ? ' is-invalid' : '';
}
