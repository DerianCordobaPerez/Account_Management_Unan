<?php

namespace App\Http\Controllers;

use App\Helpers\RedirectHelper;
use App\Helpers\ViewHelper;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    private RedirectHelper $redirectHelper;
    private ViewHelper $viewHelper;

    public function __construct()
    {
        // Requires the user to be authenticated to access this controller
        $this->middleware('auth');

        // Initialize the view helper
        $this->viewHelper = ViewHelper::getInstance();

        // Initialize the redirect helper
        $this->redirectHelper = RedirectHelper::getInstance();
    }

    /**
     * Display a listing of the resource.
     *
     * @return RedirectResponse|View
     */
    public function index(): RedirectResponse|View
    {
        return $this->viewHelper->render(
            'users.index',
            ['users' => User::all()]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return RedirectResponse|View
     */
    public function create(): RedirectResponse|View
    {
        return $this->viewHelper->render('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        return $this->redirectHelper->redirect('Admin', function () use ($request) {
            User::create($request->all());
            return redirect()->route('users.index')->with('success', 'Usuario creado correctamente.');
        });
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return RedirectResponse|View
     */
    public function show(User $user): RedirectResponse|View
    {
        return $this->viewHelper->render(
            'users.show',
            ['user' => $user]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user): RedirectResponse
    {
        return $this->redirectHelper->redirect('Admin', function () use ($user) {
            $user->delete();
            return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente');
        });
    }

    public function payments(User $user): RedirectResponse|View
    {
        return $this->viewHelper->render(
            'users.payments',
            [
                'user' => $user,
                'payments' => $user->payments
            ]
        );
    }
}
