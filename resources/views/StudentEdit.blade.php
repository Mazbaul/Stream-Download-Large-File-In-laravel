@extends('layout')

@section('title', 'Edit Student')

@section('content')
<div class="content">
  <div class="animated fadeIn">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header"><strong class="card-title">Edit Student</strong></div>
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('student-update',[$student->id]) }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ $student->first_name }}" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="last_name" class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ $student->last_name }}" required>

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }}">
                            <label for="age" class="col-md-4 control-label">Age</label>
                            <div class="col-md-6">
                                <input id="age" type="number" class="form-control" name="age" value="{{ $student->age }}" required>
                                @if ($errors->has('age'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('age') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('student_id') ? ' has-error' : '' }}">
                            <label for="student_id" class="col-md-4 control-label">Student Id</label>
                            <div class="col-md-6">
                                <input id="student_id" type="text" class="form-control" name="student_id" value="{{ $student->student_id }}" required>
                                @if ($errors->has('student_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('student_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('department_id') ? ' has-error' : '' }}">
                            <label for="department_d" class="col-md-4 control-label">Department</label>
                            <div class="col-md-6">
                                <select class="form-control" id="department_id" name="department_id">
                                  <?php $selected =false; ?>
                                  @foreach ($departments as $key => $department)
                                    <?php if ($department->id == $student->department_id):
                                      $selected =true;
                                      ?>
                                    <?php endif; ?>
                                    <option value="{{ $department->id }}" selected="{{ $selected }}">{{ $department->name }}</option>
                                  @endforeach
                                </select>
                                @if ($errors->has('department_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('department_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
              </div>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#subjects').select2();
        });
    </script>
@endpush
