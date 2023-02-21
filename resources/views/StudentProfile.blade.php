@extends('layout')

@section('title', 'Add Student')

@section('content')
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">About {{ $student->first_name.' '.$student->last_name }}</strong>
                        </div>
                        <div class="card-body">
                            <div>
                                <div class="card-body">
                                    <div class="form-group text-center">
                                    </div>
                                    <div class="row">
                                     <strong>Name : </strong>{{ $student->first_name.' '.$student->last_name }}
                                    </div>
                                    <div class="row">
                                      <strong>Age  : </strong>{{ $student->age }}
                                    </div>
                                    <div class="row">
                                      <strong>Student Id : </strong>{{ $student->student_id }}
                                    </div>
                                    <div class="row">
                                      <strong>Department : </strong>{{ $student->departments->name }}
                                    </div>
                                    <div class="row">
                                      <strong>Subjects : </strong>{{ $student->subjects->pluck('name')->implode(',') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- .card -->
                </div><!--/.col-->
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

@endsection
