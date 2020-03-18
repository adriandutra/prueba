<?php
namespace App\Helpers;
class BladeHelper
{
    public static function home($page, $last = false)
    {
        $request = request();
        $route = $request->getRequestUri();
        $top = strlen($route) - 1;
        $route = ($route[$top] != "/") ? $route .   "/" : $route;
        $doSelect = true;
        if ($last) {
            $arrayRoute = explode('/', $route);
            $top = count($arrayRoute) - 2;
            if ($arrayRoute[$top] != $page) {
                $doSelect = false;
            }
        }
        if ($doSelect) {
            $page = "$page";
            $select = (strpos($route, $page) !== FALSE) ? 'active' : '';
        } else {
            $select = '';
        }
        return "$select";
    }
    public static function selectPage($page, $last = false)
    {
        $request = request();
        $route = $request->getRequestUri();
        $top = strlen($route) - 1;
        $route = ($route[$top] != "/") ? $route . "/" : $route;
        $doSelect = true;
        if ($last) {
            $arrayRoute = explode('/', $route);
            $top = count($arrayRoute) - 2;
            if ($arrayRoute[$top] != $page) {
                $doSelect = false;
            }
        }
        if ($doSelect) {
            $page = "/$page/";
            $select = (strpos($route, $page) !== FALSE) ? 'active' : '';
        } else {
            $select = '';
        }
        return "$select";
    }
    public static function selectPage2($page, $last = false)
    {
        $request = request();
        $route = $request->getRequestUri();
        $top = strlen($route) - 1;
        $route = ($route[$top] != "/") ? $route . "/" : $route;
        $doSelect = true;
        if ($last) {
            $arrayRoute = explode('/', $route);
            $top = count($arrayRoute) - 2;
            if ($arrayRoute[$top] != $page) {
                $doSelect = false;
            }
        }
        if ($doSelect) {
            $page = "$page";
            $select = (strpos($route, $page) !== FALSE) ? 'selected' : '';
        } else {
            $select = '';
        }
        return "$select";
    }
    public static function selectPage3($page, $last = false)
    {
        $request = request();
        $route = $request->getRequestUri();
        $top = strlen($route) - 1;
        $route = ($route[$top] != "/") ? $route . "/" : $route;
        $doSelect = true;
        if ($last) {
            $arrayRoute = explode('/', $route);
            $top = count($arrayRoute) - 2;
            if ($arrayRoute[$top] != $page) {
                $doSelect = false;
            }
        }
        if ($doSelect) {
            $page = "/$page/";
            $select = (strpos($route, $page) !== FALSE) ? 'display:block' : '';
        } else {
            $select = '';
        }
        return "$select";
    }
    public static function selectPage4($page, $last = false)
    {
        $request = request();
        $route = $request->getRequestUri();
        $top = strlen($route) - 1;
        $route = ($route[$top] != "/") ? $route . "/" : $route;
        $doSelect = true;
        if ($last) {
            $arrayRoute = explode('/', $route);
            $top = count($arrayRoute) - 2;
            if ($arrayRoute[$top] != $page) {
                $doSelect = false;
            }
        }
        if ($doSelect) {
            $page = "/$page/";
            $select = (strpos($route, $page) !== FALSE) ? 'open' : '';
        } else {
            $select = '';
        }
        return "$select";
    }
    public static function selectSection($page, $last = false)
    {
        $request = request();
        $route = $request->getRequestUri();
        $top = strlen($route) - 1;
        $route = ($route[$top] != "/") ? $route . "/" : $route;
        $doSelect = true;
        if ($last) {
            $arrayRoute = explode('/', $route);
            $top = count($arrayRoute) - 2;
            if ($arrayRoute[$top] != $page) {
                $doSelect = false;
            }
        }
        if ($doSelect) {
            $page = "/$page/";
            $select = (strpos($route, $page) !== FALSE) ? 'menu-open' : '';
        } else {
            $select = '';
        }
        return "$select";
    }
}