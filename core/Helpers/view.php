<?php


if(!function_exists('asset')){
    function asset($path)
    {
        $newPath = (defined('ROOT') ? ROOT : './') . 'public' . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . $path;
        $newPath = str_replace('\\', '/', $newPath);
        return $newPath;
    }
}

if(!function_exists('auth')){
    function auth()
    {
        return (new \Core\AuthManager())->getAuth();
    }
}


if(!function_exists('authorize')){
    function authorize(string $permission, $subject)
    {
        return \Core\Facades\Permission::test($permission, $subject);
    }
}