<?php

function active($route)
{
    return request()->routeIs($route) ? 'active' : '';
}

function user($guard = 'user')
{
    return auth($guard)->user();
}
