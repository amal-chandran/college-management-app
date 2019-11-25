<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Permission;
use App\Role;
use App\RoleHasPermission;
use Illuminate\Http\Request;
use Exception;

class RoleHasPermissionsController extends Controller
{

    /**
     * Display a listing of the role has permissions.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $roleHasPermissions = RoleHasPermission::with('permission', 'role')->paginate(25);

        return view('role_has_permissions.index', compact('roleHasPermissions'));
    }

    /**
     * Show the form for creating a new role has permission.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Permissions = Permission::pluck('name', 'id')->all();
        $Roles = Role::pluck('name', 'id')->all();

        return view('role_has_permissions.create', compact('Permissions', 'Roles'));
    }


    public function manage($roleID)
    {

        $allotedPermissions = Role::find($roleID)->permissions;
        $nonAllotedPermissions = Permission::whereNotIn('id', $allotedPermissions->pluck('id')->all())->paginate(25);
        $allotedPermissions = Permission::whereIn('id', $allotedPermissions->pluck('id')->all())->paginate(25);

        return view('role_has_permissions.manage', compact('allotedPermissions', 'nonAllotedPermissions', 'roleID'));
    }
    /**
     * Store a new role has permission in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $this->affirm($request);
        try {
            $data = $this->getData($request);

            RoleHasPermission::create($data);

            return redirect()->back()
                // route('role_has_permissions.role_has_permission.index')
                ->with('success_message', 'Role Has Permission was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified role has permission.
     *
     * @param int $permission
     *
     * @return Illuminate\View\View
     */
    public function show($permission, $role)
    {
        $roleHasPermission = RoleHasPermission::with('permission', 'role')->findOrFail($permission);

        return view('role_has_permissions.show', compact('roleHasPermission'));
    }

    /**
     * Show the form for editing the specified role has permission.
     *
     * @param int $permission
     *
     * @return Illuminate\View\View
     */
    public function edit($permission, $role)
    {
        $roleHasPermission = RoleHasPermission::where('permission_id', '=', $permission)->where('role_id', '=', $role)->get();
        if ($roleHasPermission->isEmpty()) throw new Exception("Error Processing Request", 1);
        $roleHasPermission = $roleHasPermission->first();

        $Permissions = Permission::pluck('name', 'id')->all();
        $Roles = Role::pluck('name', 'id')->all();

        return view('role_has_permissions.edit', compact('roleHasPermission', 'Permissions', 'Roles'));
    }

    /**
     * Update the specified role has permission in the storage.
     *
     * @param  int $permission
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($permission, $role, Request $request)
    {

        $this->affirm($request);
        try {
            $data = $this->getData($request);

            $roleHasPermission = RoleHasPermission::where('permission_id', '=', $permission)->where('role_id', '=', $role)->get();
            if ($roleHasPermission->isEmpty()) throw new Exception("Error Processing Request", 1);
            $roleHasPermission = $roleHasPermission->first();

            $roleHasPermission->update($data);

            return redirect()->route('role_has_permissions.role_has_permission.index')
                ->with('success_message', 'Role Has Permission was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified role has permission from the storage.
     *
     * @param  int $permission
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($permission, $role)
    {
        try {
            $roleHasPermission = RoleHasPermission::where('permission_id', '=', $permission)->where('role_id', '=', $role)->get();
            if ($roleHasPermission->isEmpty()) throw new Exception("Error Processing Request", 1);
            $roleHasPermission = $roleHasPermission->first();

            $roleHasPermission->delete();

            return redirect()->back()
                // route('role_has_permissions.role_has_permission.index')
                ->with('success_message', 'Role Has Permission was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Validate the given request with the defined rules.
     *
     * @param  Illuminate\Http\Request  $request
     *
     * @return boolean
     */
    protected function affirm(Request $request)
    {
        $rules = [
            'permission_id' => 'required',
            'role_id' => 'required',
        ];


        return $this->validate($request, $rules);
    }


    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request
     * @return array
     */
    protected function getData(Request $request)
    {
        $data = $request->only(['permission_id', 'role_id']);

        return $data;
    }
}
