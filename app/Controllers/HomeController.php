<?php

namespace App\Controllers;

use App\UserModule\Managers\UserManager;
use MkyCore\Abstracts\Controller;
use MkyCore\Cache;
use MkyCore\Cookie;
use MkyCore\Crypt;
use MkyCore\Facades\FileManager;
use MkyCore\Str;
use MkyCore\View;


/**
 * @Router('/', as: 'home')
 * @return View
 */
class HomeController extends Controller
{

    /**
     * @Router('/', as: 'index')
     * @return View
     */
    public function index(): View
    {
        return view('welcome');
    }
}