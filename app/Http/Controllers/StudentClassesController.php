<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\StudentClass;
use App\User;
use Illuminate\Http\Request;
use Exception;

class StudentClassesController extends Controller
{

    /**
     * Display a listing of the student classes.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $studentClasses = StudentClass::with('classteacher')->paginate(25);

        return view('student_classes.index', compact('studentClasses'));
    }

    /**
     * Show the form for creating a new student class.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $classTeachers = User::pluck('name','id')->all();

        return view('student_classes.create', compact('classTeachers'));
    }

    /**
     * Store a new student class in the storage.
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

            StudentClass::create($data);

            return redirect()->route('student_classes.student_class.index')
                ->with('success_message', 'Student Class was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified student class.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $studentClass = StudentClass::with('classteacher')->findOrFail($id);

        return view('student_classes.show', compact('studentClass'));
    }

    /**
     * Show the form for editing the specified student class.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $studentClass = StudentClass::findOrFail($id);
        $classTeachers = User::pluck('name','id')->all();

        return view('student_classes.edit', compact('studentClass','classTeachers'));
    }

    /**
     * Update the specified student class in the storage.
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

            $studentClass = StudentClass::findOrFail($id);
            $studentClass->update($data);

            return redirect()->route('student_classes.student_class.index')
                ->with('success_message', 'Student Class was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified student class from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $studentClass = StudentClass::findOrFail($id);
            $studentClass->delete();

            return redirect()->route('student_classes.student_class.index')
                ->with('success_message', 'Student Class was successfully deleted.');
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
            'batch' => 'string|min:1|nullable',
            'branch' => 'string|min:1|nullable',
            'class_teacher_id' => 'nullable',
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
        $data = $request->only(['batch', 'branch', 'class_teacher_id']);

        return $data;
    }

}
