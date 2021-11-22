<?php

namespace App\Http\Controllers;

use App\helpers\PdfHelper;
use App\helpers\ViewHelper;
use Illuminate\Http\Response;
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

    private PdfHelper $pdfHelper;

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

        // Inject the pdf helper
        $this->pdfHelper = PdfHelper::getInstance();
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
     * @return RedirectResponse|View
     */
    public function about(): RedirectResponse|View
    {
        return $this->viewHelper->render('about', ['user']);
    }

    /**
     * Download a PDF file
     *
     * @return Response
     */
    public function download(): Response
    {
        return $this->pdfHelper
            ->loadView('', [])
            ->download('test.pdf');
    }
}
