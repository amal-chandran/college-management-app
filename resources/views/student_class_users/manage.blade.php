@extends('layouts.dashboard')

@section('content')

@if(Session::has('success_message'))
<div class="alert alert-success">
    <span class="fas fa-check"></span>
    {!! session('success_message') !!}

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>

</div>
@endif

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4 class="cards-title mb-0 float-left">Available Students</h4>
            </div>
            @if(count($nonAllotedStudents) == 0)
            <div class="card-body p-0 text-center">
                <h4>No Student Class Users Available.</h4>
            </div>
            @else
            <div class="card-body p-0">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($nonAllotedStudents as $studentClassUser)
                        <tr>

                            <td>{{ isset($studentClassUser->name) ? $studentClassUser->name : '' }}</td>
                            <td>

                                {!! Form::open([
                                'method' =>'POST',
                                'route' => ['student_class_users.student_class_user.store', $studentClassUser->id],
                                'style' => 'display: inline;',
                                ]) !!}
                                <div class="float-right" role="group">
                                    {!! Form::hidden('user_id',$studentClassUser->id) !!}
                                    {!! Form::hidden('student_class_id',$classID) !!}
                                    {!! Form::button('<span class="fas fa-plus" aria-hidden="true"></span> Add',
                                    [
                                    'type' => 'submit',
                                    'class' => 'btn btn-sm btn-success',
                                    'title' => 'Add User',
                                    ])
                                    !!}
                                </div>

                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if ($nonAllotedStudents->hasPages())
            <div class="card-footer">
                {!! $nonAllotedStudents->render() !!}
            </div>
            @endif
            @endif
        </div>
    </div>
    <div class="col">

        <div class="card">
            <div class="card-header">
                <h4 class="cards-title mb-0 float-left">Allocated</h4>
            </div>
            @if(count($allotedStudents) == 0)
            <div class="card-body p-0 text-center">
                <h4>No Student Class Users Available.</h4>
            </div>
            @else
            <div class="card-body p-0">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allotedStudents as $studentClassUser)
                        <tr>

                            <td>{{ isset($studentClassUser->user->name) ? $studentClassUser->user->name : '' }}</td>
                            <td>

                                {!! Form::open([
                                'method' =>'DELETE',
                                'route' => ['student_class_users.student_class_user.destroy', $studentClassUser->id],
                                'style' => 'display: inline;',
                                ]) !!}
                                <div class=" float-right" role="group">

                                    {!! Form::button('<span class="fas fa-trash" aria-hidden="true"></span> Delete',
                                    [
                                    'type' => 'submit',
                                    'class' => 'btn btn-sm btn-danger',
                                    'title' => 'Delete Student Class User',
                                    'onclick' => 'return confirm("' . 'Click Ok to delete Student Class User.' . '")'
                                    ])
                                    !!}
                                </div>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if ($allotedStudents->hasPages())
            <div class="card-footer">
                {!! $allotedStudents->render() !!}
            </div>
            @endif
            @endif
        </div>
    </div>
</div>


@endsection