<?php

namespace App\Http\Controllers;

use App\Helpers\ExchangeRateHelper;
use App\Helpers\ViewHelper;
use Illuminate\View\View;
use App\Models\Role;
use SoapFault;

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
     * @var ExchangeRateHelper
     */
    private ExchangeRateHelper $exchangeRateHelper;

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

        // Inject the exchange rate helper
        $this->exchangeRateHelper = ExchangeRateHelper::getInstance();
    }

    /**
     * Show home page.
     *
     * @return View
     * @throws SoapFault
     */
    public function home(): View
    {
        if(auth()->user()->isAdmin()) {
            return $this->viewHelper->render(
                'admin.index',
                [
                    'roles' => Role::select()->whereNotIn('name', ['admin', 'Admin'])->get(),
                    'title' => 'Panel de administración',
                ]
            );
        }

        return $this->viewHelper->render(
            'home',
            [
                'exchangeRate' => $this->exchangeRateHelper->build()->get(),
                'title' => 'Panel principal',
            ]
        );
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
