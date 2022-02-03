<?php

use Symfony\Component\Dotenv\Dotenv;


if(!function_exists('_env')){
    function _env(string $key, string $default = null)
    {
        $dotenv = new Dotenv();
        $dotenv->load(dirname(__DIR__) . '/../.env');
        return !empty($_ENV[$key]) ? $_ENV[$key] : $default;
    }
}

if(!function_exists('config')){
    function config(string $configName = '*', string $configFile = 'app')
    {
        try {
            $config = \Core\App::getConfig()[$configFile];
            if($configName === '*'){
                return $config;
            }
            $configName = array_filter(explode('.', $configName));
            foreach ($configName as $c) {
                if(isset($config[$c])){
                    $config = $config[$c];
                } else {
                    throw new Exception("Config '$c' does not exist", 12);
                }
            }
            return $config;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}

if(!function_exists('includeAll')){
    function includeAll($folder)
    {
        foreach (glob("{$folder}/*.php") as $filename) {
            include $filename;
        }
    }
}
