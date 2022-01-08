<?php

namespace App\Http\Controllers;

use App\Helpers\RedirectHelper;
use App\Helpers\ViewHelper;
use App\Models\Concept;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ConceptController extends Controller
{
    private ViewHelper $viewHelper;
    private RedirectHelper $redirectHelper;

    public function __construct()
    {
        // Check if the user is logged in
        $this->middleware(['auth']);

        // Inject the view helper
        $this->viewHelper = ViewHelper::getInstance();

        // Inject the redirect helper
        $this->redirectHelper = RedirectHelper::getInstance();
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View|RedirectResponse
     */
    public function index(Request $request): View|RedirectResponse
    {
        if($request->has('search')) {
            $concepts = Concept::search($request->search)->orderBy('id')->paginate(10);
            $concepts->withQueryString();
        } else {
            $concepts = Concept::latest()->orderBy('id')->paginate(10);
        }

        return $this->viewHelper->render(
            'concepts.index',
            ['concepts' => $concepts],
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
            'concepts.create',
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
        return $this->redirectHelper->redirect(['admin'], function() use($request) {
            // Create concept
            $concept = Concept::create([
                'name' => $request->name,
                'price' => $request->price,
            ]);

            if($request->description) {
                $concept->description = $request->description;
                $concept->save();
            }

            // Redirect to the index page
            return redirect()->route('concepts.index')->with('success', 'Concepto creado correctamente.');
        });
    }

    /**
     * Display the specified resource.
     *
     * @param Concept $concept
     * @return \Illuminate\Http\Response
     */
    public function show(Concept $concept)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Concept $concept
     * @return View|RedirectResponse
     */
    public function edit(Concept $concept): View|RedirectResponse
    {
        return $this->viewHelper->render(
            'concepts.edit',
            ['concept' => $concept],
            ['admin']
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Concept $concept
     * @return RedirectResponse
     */
    public function update(Request $request, Concept $concept): RedirectResponse
    {
        return $this->redirectHelper->redirect(['admin'], function() use($request, $concept) {
            // Update concept
            $concept->name = $request->name;
            $concept->price = $request->price;

            // Check if the description is not empty
            if($request->description) {
                $concept->description = $request->description;
            }

            $concept->save();

            // Redirect to the index page
            return redirect()->route('concepts.index')->with('success', 'Concepto actualizado correctamente.');
        });
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Concept $concept
     * @return RedirectResponse
     */
    public function destroy(Concept $concept): RedirectResponse
    {
        return $this->redirectHelper->redirect(['admin'], function() use($concept) {
            // Delete concept
            $concept->delete();

            // Redirect to the index page
            return redirect()->route('concepts.index')->with('success', 'Concepto eliminado correctamente.');
        });
    }
}
