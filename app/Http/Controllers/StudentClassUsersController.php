<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\StudentClass;
use App\StudentClassUser;
use App\User;
use Illuminate\Http\Request;
use Exception;

class StudentClassUsersController extends Controller
{

    /**
     * Display a listing of the student class users.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $studentClassUsers = StudentClassUser::with('studentclass','user')->paginate(25);

        return view('student_class_users.index', compact('studentClassUsers'));
    }

    public function manage($classID)
    {
       $allotedStudents= StudentClassUser::pluck('student_class_user.user_id')->all();
        // return $allotedStudents;
       $nonAllotedStudents=User::whereNotIn('users.id',$allotedStudents)->join("user_has_roles",'users.id','=','user_has_roles.user_id')
       ->join("roles",function ($join){ $join->on('roles.id','=','user_has_roles.role_id')->where("roles.name","=","student"); })
       ->select("users.*")
       ->paginate(25);
    //    return $nonAllotedStudents;
    //    ->get();

    //    $nonAllotedStudents=User::join("student_class_user",'users.id',"!=","student_class_user.user_id")
    //    ->join("user_has_roles",'users.id','=','user_has_roles.user_id')
    //    ->join("roles",function ($join){ $join->on('roles.id','=','user_has_roles.role_id')->where("roles.name","=","student"); })
    //    ->select("users.*");

    //    if ($nonAllotedStudents->isEmpty()) {
    //     $nonAllotedStudents=User::join("user_has_roles",'users.id','=','user_has_roles.user_id')
    //     ->join("roles",function ($join){ $join->on('roles.id','=','user_has_roles.role_id')->where("roles.name","=","student"); })
    //     ->select("users.*");
    //    }

       $allotedStudents= StudentClassUser::with('user')->where('student_class_user.student_class_id','=',$classID)->paginate(25);


// $nonAllotedStudents=$nonAllotedStudents->paginate(25);

        return view("student_class_users.manage",compact('allotedStudents','nonAllotedStudents','classID'));
    }

    /**
     * Show the form for creating a new student class user.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {

        $studentClasses = StudentClass::pluck('batch','id' )->all();
        $users = User::pluck('name','id')->all();

        return view('student_class_users.create', compact('studentClasses','users'));
    }

    /**
     * Store a new student class user in the storage.
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

            StudentClassUser::create($data);

            return back()
            // ->route('student_class_users.student_class_user.index')
                ->with('success_message', 'Student Class User was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified student class user.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $studentClassUser = StudentClassUser::with('studentclass','user')->findOrFail($id);

        return view('student_class_users.show', compact('studentClassUser'));
    }

    /**
     * Show the form for editing the specified student class user.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $studentClassUser = StudentClassUser::findOrFail($id);
        $studentClasses = StudentClass::pluck('batch','id' )->all();
$users = User::pluck('name','id')->all();

        return view('student_class_users.edit', compact('studentClassUser','studentClasses','users'));
    }

    /**
     * Update the specified student class user in the storage.
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

            $studentClassUser = StudentClassUser::findOrFail($id);
            $studentClassUser->update($data);

            return redirect()->route('student_class_users.student_class_user.index')
                ->with('success_message', 'Student Class User was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified student class user from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $studentClassUser = StudentClassUser::findOrFail($id);
            $studentClassUser->delete();

            return back()
            // ->route('student_class_users.student_class_user.index')
                ->with('success_message', 'Student Class User was successfully deleted.');
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
            'student_class_id' => 'nullable',
            'user_id' => 'nullable',
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
        $data = $request->only(['student_class_id', 'user_id']);

        return $data;
    }

}
