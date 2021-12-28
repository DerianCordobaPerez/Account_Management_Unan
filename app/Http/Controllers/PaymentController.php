<?php

namespace App\Http\Controllers;

use App\Helpers\ViewHelper;
use App\Models\Payment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PaymentController extends Controller
{

    private ViewHelper $viewHelper;

    public function __construct()
    {
        // Inject the view helper
        $this->viewHelper = ViewHelper::getInstance();
    }

    /**
     * Display a listing of the resource.
     *
     * @return RedirectResponse|View
     */
    public function index(): View|RedirectResponse
    {
        return $this->viewHelper->render(
            'payments.index',
            ['payments' => Payment::latest()->paginate(5)],
            ['admin']
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return RedirectResponse|View
     */
    public function create(): View|RedirectResponse
    {
        return $this->viewHelper->render('payments.create', null, ['admin']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Payment $payment
     * @return RedirectResponse|View
     */
    public function show(Payment $payment): View|RedirectResponse
    {
        return $this->viewHelper->render(
            'payments.show',
            ['payment' => $payment]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
