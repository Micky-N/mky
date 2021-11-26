<?php

use Symfony\Component\Dotenv\Dotenv;

function configEnv()
{
    $dotenv = new Dotenv();
    $dotenv->load(ROOT . '.env');
}

if (!function_exists('_env')) {
    function _env(string $key, string $default = null)
    {
        configEnv();
        return $_ENV[$key] ?: $default;
    }
}

if (!function_exists('config')) {
    function config($configName)
    {
        try {
            $config = include ROOT . 'core/Config.php';
            $configName = array_filter(explode('.', $configName));
            foreach ($configName as $c) {
                if (isset($config[$c])) {
                    $config = $config[$c];
                } else {
                    throw new Exception("Le point de config '$c' n'existe pas", 12);
                }
            }
            return $config;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}

if (!function_exists('includeAll')) {
    function includeAll($folder)
    {
        foreach (glob("{$folder}/*.php") as $filename) {
            include $filename;
        }
    }
}
