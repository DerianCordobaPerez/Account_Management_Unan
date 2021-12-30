<?php

namespace App\Http\Controllers;

use App\Helpers\RedirectHelper;
use App\Helpers\ViewHelper;
use App\Models\Privilege;
use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RoleController extends Controller
{
    private ViewHelper $viewHelper;
    private RedirectHelper $redirectHelper;

    public function __construct()
    {
        // Requires the user to be authenticated to access this controller
        $this->middleware(['auth']);

        // Initialize the view helper
        $this->viewHelper = ViewHelper::getInstance();

        // Initialize the redirect helper
        $this->redirectHelper = RedirectHelper::getInstance();
    }

    /**
     * Display a listing of the resource.
     *
     * @return View|RedirectResponse
     */
    public function index(): View|RedirectResponse
    {
        // Get all roles except the admin role
        $roles = Role::select()->whereNotIn('name', ['admin'])->paginate(10);

        return $this->viewHelper->render(
            'roles.index',
            ['roles' => $roles],
            ['admin']
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view|RedirectResponse
     */
    public function create(): View|RedirectResponse
    {
        return $this->viewHelper->render(
            'roles.create',
            ['privileges' => Privilege::all()],
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
        return $this->redirectHelper->redirect(['admin'], function() use ($request) {
            // Create the role
            $role = Role::create([
                'name' => $request->name,
                'description' => $request->description,
            ]);

            // Redirect to the role index page
            return redirect()->route('roles.index')->with('success', 'Rol creado correctamente.');
        });
    }

    /**
     * Display the specified resource.
     *
     * @param Role $role
     * @return View|RedirectResponse
     */
    public function show(Role $role): View|RedirectResponse
    {
        return $this->viewHelper->render(
            'roles.show',
            ['role' => $role],
            ['admin']
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Role $role
     * @return View|RedirectResponse
     */
    public function edit(Role $role): View|RedirectResponse
    {
        return $this->viewHelper->render(
            'roles.edit',
            ['role' => $role],
            ['admin']
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Role $role
     * @return RedirectResponse
     */
    public function update(Request $request, Role $role): RedirectResponse
    {
        return $this->redirectHelper->redirect(['admin'], function() use ($request, $role) {
            // Update the role
            $role->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);

            // Redirect to the role index page
            return redirect()->route('roles.index')->with('success', 'Rol actualizado correctamente.');
        });
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Role $role
     * @return RedirectResponse
     */
    public function destroy(Role $role): RedirectResponse
    {
        return $this->redirectHelper->redirect(['admin'], function() use ($role) {
            // Delete the role
            $role->delete();

            // Redirect to the role index page
            return redirect()->route('roles.index')->with('success', 'Rol eliminado correctamente.');
        });
    }
}
