<?php

namespace App\Http\Controllers;

use App\Helpers\RedirectHelper;
use App\Helpers\ViewHelper;
use App\Models\Role;
use App\Models\User;
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
     * @param Request $request
     * @return View|RedirectResponse
     */
    public function index(Request $request): View|RedirectResponse
    {
        // Get all users except the admin user
        $users = User::select()->whereNotIn('names', ['Administrator'])->get();

        // Check if the request search query is set
        if($request->has('search')) {
            $roles = Role::search($request->search);
        } else {
            $roles = Role::where('name', '!=', 'admin');
        }

        return $this->viewHelper->render(
            'roles.index',
            [
                'users' => $users,
                'roles' => $roles->orderBy('id')->paginate(10),
            ],
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
            $role = Role::create(['name' => $request->name]);

            if($request->description) {
                // Add description to the role
                $role->description = $request->description;
                $role->save();
            }

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
            if($request->name !== $role->name) {
                // Update the role name
                $role->update(['name' => $request->name]);
            }

            if($request->description !== $role->description) {
                // Update the role description
                $role->update(['description' => $request->description]);
            }

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

    /**
     * Get only the roles deleted
     *
     * @return View|RedirectResponse
     */
    public function trashed(): View|RedirectResponse
    {
        // Get the roles deleted
        $roles = Role::onlyTrashed()->get();

        return $this->viewHelper->render(
            'roles.trashed',
            ['roles' => $roles],
            ['admin']
        );
    }

    /**
     * Restore the specified role from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function restore($id): RedirectResponse
    {
        return $this->redirectHelper->redirect(['admin'], function() use($id) {
            // Restore the role
            Role::onlyTrashed()->find($id)->restore();

            // Count the roles deleted
            $count = Role::onlyTrashed()->count();

            if($count !== 0) {
                // Redirect to the role trashed page
                return redirect()->route('roles.trashed')->with('success', 'Rol restaurado correctamente.');
            }

            // Redirect to the role index page
            return redirect()->route('roles.index')->with('success', 'Rol restaurado correctamente.');
        });
    }

    public function force($id): RedirectResponse
    {
        return $this->redirectHelper->redirect(['admin'], function() use($id) {
            // Delete the role
            Role::onlyTrashed()->find($id)->forceDelete();

            // Count the roles deleted
            $count = Role::onlyTrashed()->count();

            if($count !== 0) {
                // Redirect to the role trashed page
                return redirect()->route('roles.trashed')->with('success', 'Rol eliminado correctamente.');
            }

            // Redirect to the role index page
            return redirect()->route('roles.index')->with('success', 'Rol eliminado correctamente.');
        });
    }
}
