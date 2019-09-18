<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Attendee;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Exception;

class AttendeesController extends Controller
{

    /**
     * Display a listing of the attendees.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $attendees = Attendee::with('student', 'attendance')->paginate(25);

        return view('attendees.index', compact('attendees'));
    }

    /**
     * Show the form for creating a new attendee.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $students = User::pluck('name', 'id')->all();
        $attendances = Attendance::pluck('created_at', 'id')->all();

        return view('attendees.create', compact('students', 'attendances'));
    }

    /**
     * Store a new attendee in the storage.
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

            Attendee::create($data);

            return redirect()->route('attendees.attendee.index')
                ->with('success_message', 'Attendee was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    public function storeOrUpdate(Request $request)
    {
        $data = $request->only(['attendance_id', 'student_id', 'status']);

        try {


            foreach ($data['student_id'] as $key => $value) {
                Attendee::updateOrCreate(['attendance_id' => $data['attendance_id'], "student_id" => $value], ['status' => $data['status'][$value]]);
            }

            return back()
                ->with('success_message', 'Attendees was successfully saved.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified attendee.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $attendee = Attendee::with('student', 'attendance')->findOrFail($id);

        return view('attendees.show', compact('attendee'));
    }

    /**
     * Show the form for editing the specified attendee.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $attendee = Attendee::findOrFail($id);
        $students = User::pluck('name', 'id')->all();
        $attendances = Attendance::pluck('created_at', 'id')->all();

        return view('attendees.edit', compact('attendee', 'students', 'attendances'));
    }

    /**
     * Update the specified attendee in the storage.
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

            $attendee = Attendee::findOrFail($id);
            $attendee->update($data);

            return redirect()->route('attendees.attendee.index')
                ->with('success_message', 'Attendee was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified attendee from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $attendee = Attendee::findOrFail($id);
            $attendee->delete();

            return redirect()->route('attendees.attendee.index')
                ->with('success_message', 'Attendee was successfully deleted.');
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
            'student_id' => 'nullable',
            'attendance_id' => 'nullable',
            'status' => 'nullable',
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
        $data = $request->only(['student_id', 'attendance_id', 'status']);

        return $data;
    }
}
