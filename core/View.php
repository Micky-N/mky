<?php

namespace Core;

use Core\Facades\Route;
use Exception;
use Core\MkyCompiler\MkyEngine;

class View
{
    /**
     * Displays the rendering of the view on the site
     *
     * @param string $view
     * @param array $params
     * @param bool $isModuleView
     * @return string|bool
     */
    public function render(string $view, array $params = [], bool $isModuleView = true)
    {
        try {
            $moduleBaseConfig = include ROOT . 'config/module.php';
            $test = 1993;
            $mkyServiceProvider = include ROOT.'/app/Providers/MkyServiceProvider.php';
            $config = array_merge(config('*', 'mkyEngine'), ($isModuleView ? config('*', 'module') : $moduleBaseConfig));
            $mkyEngine = new MkyEngine($config);
            $mkyEngine->addDirectives($mkyServiceProvider['directives'])
                ->addFormatters($mkyServiceProvider['formatters'])
                ->addGlobalVariable('_ENV', $_ENV)
                ->addGlobalVariable('test', $test);

            return $mkyEngine->view($view, $params);
        } catch (Exception $ex) {
            dd($ex);
        }
    }
}
