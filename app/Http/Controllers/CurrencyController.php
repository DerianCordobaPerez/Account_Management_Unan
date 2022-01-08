<?php

namespace App\Http\Controllers;

use App\Helpers\RedirectHelper;
use App\Helpers\ViewHelper;
use App\Models\Currency;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CurrencyController extends Controller
{

    private ViewHelper $viewHelper;
    private RedirectHelper $redirectHelper;

    public function __construct()
    {
        // Check if user is logged in
        $this->middleware(['auth']);

        // Inject ViewHelper and RedirectHelper
        $this->viewHelper = ViewHelper::getInstance();
        $this->redirectHelper = RedirectHelper::getInstance();
    }

    /**
     * Display a listing of the resource.
     *
     * @return View|RedirectResponse
     */

    public function index(): View|RedirectResponse
    {
        return $this->viewHelper->render(
            'currencies.index',
            ['currencies' => Currency::all()],
            ['admin']
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View|RedirectResponse
     */
    public function create(): View|RedirectResponse
    {
        return $this->viewHelper->render(
            'currencies.create',
            [],
            ['admin']
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        return $this->redirectHelper->redirect('admin', function() use ($request) {
            Currency::create([
                'name' => $request->name,
                'abbreviation' => $request->abbreviation,
                'country' => $request->country,
            ]);

            return redirect()->route('currencies.index')->with('success', 'Moneda agregada correctamente');
        });
    }

    /**
     * Display the specified resource.
     *
     * @param Currency $currency
     * @return \Illuminate\Http\Response
     */
    public function show(Currency $currency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Currency $currency
     * @return View|RedirectResponse
     */
    public function edit(Currency $currency): View|RedirectResponse
    {
        return $this->viewHelper->render(
            'currencies.edit',
            ['currency' => $currency],
            ['admin']
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Currency $currency
     * @return RedirectResponse
     */
    public function update(Request $request, Currency $currency): RedirectResponse
    {
        return $this->redirectHelper->redirect('admin', function() use ($request, $currency) {
            $currency->update([
                'name' => $request->name,
                'abbreviation' => $request->abbreviation,
                'country' => $request->country,
            ]);

            return redirect()->route('currencies.index')->with('success', 'Moneda actualizada correctamente');
        });
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Currency $currency
     * @return RedirectResponse
     */
    public function destroy(Currency $currency)
    {
        return $this->redirectHelper->redirect('admin', function() use ($currency) {
            $currency->delete();
            return redirect()->route('currencies.index')->with('success', 'Moneda eliminada correctamente');
        });
    }
}
