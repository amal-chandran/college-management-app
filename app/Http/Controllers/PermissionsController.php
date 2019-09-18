<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Permission;
use Illuminate\Http\Request;
use Exception;

class PermissionsController extends Controller
{

    /**
     * Display a listing of the permissions.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $permissions = Permission::paginate(25);

        return view('permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new permission.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('permissions.create');
    }

    /**
     * Store a new permission in the storage.
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

            Permission::create($data);

            return redirect()->route('permissions.permission.index')
                ->with('success_message', 'Permission was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified permission.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $permission = Permission::findOrFail($id);

        return view('permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified permission.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $permission = Permission::findOrFail($id);


        return view('permissions.edit', compact('permission'));
    }

    /**
     * Update the specified permission in the storage.
     *
     * @param  int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {

        $this->affirm($request);
        try {
            $data = $this->getData($request);

            $permission = Permission::findOrFail($id);
            $permission->update($data);

            return redirect()->route('permissions.permission.index')
                ->with('success_message', 'Permission was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified permission from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $permission = Permission::findOrFail($id);
            $permission->delete();

            return redirect()->route('permissions.permission.index')
                ->with('success_message', 'Permission was successfully deleted.');
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
            'name' => 'required|string|min:1|max:191',
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
        $data = $request->only(['name']);

        return $data;
    }
}
