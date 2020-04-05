@extends('layouts/app')
@section('header')
@include('inc/dashboard-header')
@endsection
@section('content')
<article class="student-list">
    <div class="student-list__container">
        <div class="student-list__actions">
            <div class="student-list__card">
                <div>
                    <div class="student-list__card-header">12 ABM 15</div>
                    <div class="student-list__card-body px-0">
                        <div class="student-list__card-body-container">
                            <div class="candidates__position-body">
                                <div class="candidates__position-body-container">
                                    <div class="candidates__table-container mx-0 mx-md-4">
                                        <table class="candidates__table student-list__table">
                                            <thead>
                                                <tr>
                                                    <th>status</th>
                                                    <th>cn</th>
                                                    <th>student number</th>
                                                    <th>full name</th>
                                                    <th>password</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($students as $student)
                                                <tr class="">
                                                    <td>{{$student['status']}}</td>
                                                    <td>{{$student['cn']}}</td>
                                                    <td>{{$student['student_number']}}</td>
                                                    <td>{{$student['full_name']}}</td>
                                                    <td>{{$student['password']}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="student-list__card-header">12 ABM 15</div>
                    <div class="student-list__card-body px-0">
                        <div class="student-list__card-body-container">
                            <div class="candidates__position-body">
                                <div class="candidates__position-body-container">
                                    <div class="candidates__table-container mx-0 mx-md-4">
                                        <table class="candidates__table student-list__table">
                                            <thead>
                                                <tr>
                                                    <th>status</th>
                                                    <th>cn</th>
                                                    <th>student number</th>
                                                    <th>full name</th>
                                                    <th>password</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($students as $student)
                                                <tr class="">
                                                    <td>{{$student['status']}}</td>
                                                    <td>{{$student['cn']}}</td>
                                                    <td>{{$student['student_number']}}</td>
                                                    <td>{{$student['full_name']}}</td>
                                                    <td>{{$student['password']}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center my-3">
                    <a href="{{route('admin.registryStudent')}}"
                        class="btn btn-lg client-custom-button-2 no-text-shadow">return</a>
                </div>
            </div>
        </div>
</article>
@endsection

@section('footer')
@include('inc.admin-footer')
@endsection
