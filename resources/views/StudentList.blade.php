@extends('layout')

@section('title', 'All Students')

@section('content')

    <div class="content">
        <div class="animated fadeIn">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">All Students</strong>
                        </div>
                        <div class="card-body">
                            <div id="bootstrap-data-table_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer" style="padding-top: 15px;">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="bootstrap-data-table" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="bootstrap-data-table_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="text-center" style="width: 6%;">SL</th>
                                                    <th class="text-center" style="width: 20%;">First Name</th>
                                                    <th class="text-center" style="width: 20%;">Last Name</th>
                                                    <th class="text-center" style="width: 17%;">Age</th>
                                                    <th class="text-center" style="width: 20%;">Student Id</th>
                                                    <th class="text-center" style="width: 20%;">Department</th>
                                                    <th class="text-center" style="width: 20%;">Subjects</th>
                                                    <th class="text-center" style="width: 17%;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $trRole = '';
                                                     $sl = 1;
                                                @endphp
                                                @forelse($students as $student)
                                                <tr role="row" class="{{$trRole = $trRole=='odd' ? 'even' : 'odd'}}">
                                                    <td class="text-center">{{$sl}}</td>
                                                    <td class="text-center">{{$student->first_name}}</td>
                                                    <td>{{$student->last_name}}</td>
                                                    <td class="text-center">{{$student->age}}</td>
                                                    <td>{{$student->student_id}}</td>
                                                    <td class="text-center">{{ @$student->departments->name}}</td>
                                                    <td class="text-center">{{ @$student->subjects->pluck('name')->implode(',') }}</td>
                                                    <td><a href="/student-profile/{{ $student->id }}" class="fa fa-user" title="Student Profile"> </a> <a href="/student-edit/{{ $student->id }}" class="fa fa-edit" title="Edit"> </a>
                                                      <a href="/student-delete/{{ $student->id }}" class="fa fa-trash" title="Delete"> </a>
                                                    </td>
                                                </tr>
                                                @php
                                                  $sl++;
                                                @endphp
                                                @empty
                                                <tr role="row">
                                                    <td class="text-center" colspan="6">No data found</td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="dataTables_paginate paging_simple_numbers pull-right" id="bootstrap-data-table_paginate">
                                            {{ $students->links('vendor.pagination.bootstrap-4') }}
                                        </div>
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
