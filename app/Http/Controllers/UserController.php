<?php

namespace App\Http\Controllers;

use App\Helpers\DateHelper;
use App\Helpers\RedirectHelper;
use App\Helpers\ViewHelper;
use App\Models\Payment;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    use DateHelper;

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
     * @param Request $request
     * @return RedirectResponse|View
     */
    public function index(Request $request): RedirectResponse|View
    {
        // Check if the request search query is set
        if($request->has('search')) {
            $users = User::search($request->search)->orderBy('names')->paginate(10);
            $users->withQueryString();
        } else {
            $users = User::select()->whereNotIn('names', ['Administrator'])->orderBy('names')->paginate(10);
        }

        return $this->viewHelper->render(
            'users.index',
            ['users' => $users],
            ['cajero']
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

    public function search(Request $request): JsonResponse
    {
        $users = User::search($request->search)->orderBy('identification')->get()->pluck('identification');
        return response()->json($users);
    }

    public function payments(Request $request, User $user): RedirectResponse|View
    {
        [$name] = explode(' ', $user->names);

        // Check if the request search query is set
        if($request->has('month')) {
            $payments = $user->payments()->whereMonth('payment_registration_date', $request->month)->paginate(10);
        } else {
            $payments = $user->payments()->orderBy('created_at', 'desc')->paginate(10);
        }

        return $this->viewHelper->render(
            'users.payments',
            [
                'name' => $name,
                'user' => $user,
                'payments' => $payments,
                'months' => $this->spanishMonths
            ],
            ['cajero', 'usuario']
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
