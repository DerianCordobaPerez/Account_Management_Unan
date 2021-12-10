<?php

namespace App\Http\Controllers;

use App\helpers\ViewHelper;
use Illuminate\View\View;

/**
 *
 */
class HomeController extends Controller
{
    /**
     * @var ViewHelper
     */
    private ViewHelper $viewHelper;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Require auth middleware
        $this->middleware('auth');

        // Inject the view helper
        $this->viewHelper = ViewHelper::getInstance();
    }

    /**
     * Show home page.
     *
     * @return View
     */
    public function home(): View
    {
        return $this->viewHelper->render('home');
    }

    /**
     * Show about page
     *
     * @return View
     */
    public function about(): View
    {
        return $this->viewHelper->render('about');
    }
}
