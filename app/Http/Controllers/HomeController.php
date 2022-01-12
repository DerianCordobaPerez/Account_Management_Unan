<?php

namespace App\Http\Controllers;

use App\Helpers\DateHelper;
use App\Helpers\ExchangeRateHelper;
use App\Helpers\ViewHelper;
use App\Models\Concept;
use App\Models\ExchangeRate;
use App\Models\Payment;
use App\Models\Role;
use App\Models\User;
use App\Services\ExchangeRateService;
use Carbon\Traits\Date;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\App;
use Illuminate\View\View;
use SoapFault;

/**
 *
 */
class HomeController extends Controller
{
    use DateHelper;

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
     * @return View|RedirectResponse
     * @throws SoapFault
     */
    public function home(): View|RedirectResponse
    {
        if(auth()->user()->authorize('cajero')) {
            return redirect()->route('payments.index');
        }

        if(auth()->user()->isAdmin()) {
            return $this->viewHelper->render(
                'admin.index',
                [
                    'title' => 'Panel de administración',
                    'concepts' => Concept::all()->count(),
                    'payments' => Payment::all()->count(),
                    'users' => User::where('active', true)->count(),
                    'roles' => Role::where('name', '!=', 'admin')->count(),
                ],
            );
        }

        // Get last payment user
        $latestPayment = auth()->user()->payments()->orderBy('payment_registration_date', 'desc')->first();

        // Get records by latest 3 months for the user
        $records = auth()->user()->payments()->whereBetween('payment_registration_date', [
            $this->getFirstDayOfLastThreeMonths(),
            $this->getLastDayOfLastThreeMonths(),
        ])->get();

        //Split records by month
        $recordsByMonth = $records->groupBy(function ($record) {
            return $record->payment_registration_date->format('Y-m');
        });

        // Get total amount of records for each month
        $totalAmountByMonth = [];

        foreach ($recordsByMonth as $month => $values) {
            $totalAmountByMonth[$month] = $values->sum('amount');
        }

        // Get periods for the last 3 months
        $periods = $this->getPeriodsForLastThreeMonths();

        return $this->viewHelper->render(
            'home',
            [
                'exchangeRate' => ExchangeRate::first()->value,
                'title' => 'Panel principal',
                'latestPayment' => $latestPayment,
                'period' => $this->getPeriod($latestPayment->payment_registration_date ?? null),
                'periods' => $periods,
                'totalAmountByMonth' => $totalAmountByMonth,
            ],
            ['usuario']
        );
    }

    /**
     * Show about page
     *
     * @return View
     */
    public function about(): View
    {
        return $this->viewHelper->render('about', ['title' => 'Acerca de'], ['usuario']);
    }
}
