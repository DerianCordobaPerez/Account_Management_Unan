<?php

namespace App\Http\Controllers;

use App\Helpers\RedirectHelper;
use App\Helpers\ViewHelper;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\JsonResponse;
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
        $users = User::select()->whereNotIn('names', ['Administrator']);

        if(request('search')) {
            $users = User::where('names', 'like', '%' . request('search') . '%')
                ->orWhere('lastnames', 'like', '%' . request('search') . '%')
                ->orWhere('email', 'like', '%' . request('search') . '%')
                ->orWhere('identification', 'like', '%' . request('search') . '%')
                ->orWhere('phone', 'like', '%' . request('search') . '%');
        }

        return $this->viewHelper->render(
            'users.index',
            ['users' => $users->orderBy('names')->paginate(10)],
            ['admin']
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
        return $this->redirectHelper->redirect('admin', function () use ($request) {
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
            ['user' => $user],
            ['admin', 'Administrator'],
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
        return $this->redirectHelper->redirect('Admin', function() use($user) {
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
            ],
            ['admin']
        );
    }

    public function disable(User $user): RedirectResponse
    {
        return $this->redirectHelper->redirect(['admin'], function() use($user) {
            // Disable the user
            $user->update(['active' => false]);

            // Redirect to the users index
            return redirect()->route('users.index')->with('success', 'Usuario deshabilitado correctamente');
        });
    }

    public function enable(User $user): RedirectResponse
    {
        return $this->redirectHelper->redirect(['admin'], function() use($user) {
            // Enable the user
            $user->update(['active' => true]);

            // Redirect to the users index
            return redirect()->route('users.index')->with('success', 'Usuario habilitado correctamente');
        });
    }

    public function assignRole(User $user): RedirectResponse|View
    {
        // Gets all the roles that the user does not contain
        $roles = Role::select()->whereNotIn('name', ['admin'])->get();

        return $this->viewHelper->render(
            'users.assign-role',
            [
                'user' => $user,
                'roles' => $roles
            ],
            ['admin']
        );
    }

    public function assignRoleStore(Request $request, User $user): RedirectResponse
    {
        return $this->redirectHelper->redirect(['admin'], function() use($request, $user) {
            $user->roles()->sync($request->roles);
            return redirect()->route('roles.index')->with('success', 'Roles asignados correctamente');
        });
    }
}
