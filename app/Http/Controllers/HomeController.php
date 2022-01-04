<?php

namespace App\Http\Controllers;

use App\Helpers\ExchangeRateHelper;
use App\Helpers\ViewHelper;
use App\Models\Role;
use DateTime;
use Exception;
use Illuminate\View\View;
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
     * @throws Exception
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

        // Get last payment of the user
        $latestPayment = auth()->user()->payments()->orderBy('created_at', 'desc')->first();

        // Set locate to Spanish
        setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');

        // Get the last payment date
        $date = str_replace('/', '-', $latestPayment->date_made_payment);
        $month = strftime('%B', strtotime($date));

        return $this->viewHelper->render(
            'home',
            [
                'exchangeRate' => $this->exchangeRateHelper->build()->get(),
                'title' => 'Panel principal',
                'latestPayment' => $latestPayment,
                'month' => $month,
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
