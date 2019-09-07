<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\StudentClass;
use App\Subject;
use App\User;
use Illuminate\Http\Request;
use Exception;

class SubjectsController extends Controller
{

    /**
     * Display a listing of the subjects.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $subjects = Subject::with('teacher','studentclass')->paginate(25);

        return view('subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new subject.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $teachers = User::pluck('name','id')->all();
$studentClasses = StudentClass::pluck('batch','id')->all();

        return view('subjects.create', compact('teachers','studentClasses'));
    }

    /**
     * Store a new subject in the storage.
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

            Subject::create($data);

            return redirect()->route('subjects.subject.index')
                ->with('success_message', 'Subject was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified subject.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $subject = Subject::with('teacher','studentclass')->findOrFail($id);

        return view('subjects.show', compact('subject'));
    }

    /**
     * Show the form for editing the specified subject.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        $teachers = User::pluck('name','id')->all();
$studentClasses = StudentClass::pluck('batch','id')->all();

        return view('subjects.edit', compact('subject','teachers','studentClasses'));
    }

    /**
     * Update the specified subject in the storage.
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

            $subject = Subject::findOrFail($id);
            $subject->update($data);

            return redirect()->route('subjects.subject.index')
                ->with('success_message', 'Subject was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified subject from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $subject = Subject::findOrFail($id);
            $subject->delete();

            return redirect()->route('subjects.subject.index')
                ->with('success_message', 'Subject was successfully deleted.');
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
            'name' => 'string|min:1|max:255|nullable',
            'teacher_id' => 'nullable',
            'student_class_id' => 'nullable',
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
        $data = $request->only(['name', 'teacher_id', 'student_class_id']);

        return $data;
    }

}
