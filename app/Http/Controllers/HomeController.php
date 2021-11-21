<?php

namespace App\Http\Controllers;

use App\helpers\ViewHelper;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
        // Require auth middleware except for the home page
        $this->middleware('auth')->except('home');

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
        return view('home');
    }

    /**
     * Show about page
     *
     * @return RedirectResponse|View
     */
    public function about(): RedirectResponse|View
    {
        return $this->viewHelper->render(['admin'],'about');
    }
}
