@extends('layouts/app')
@section('header')
@include('inc/dashboard-header')
@endsection
@section('content')
<article class="student-list">
    <div class="student-list__container">
        <div class="student-list__actions">
            <div class="student-list__card">
                <div class="student-list__card-body px-0">
                    <div class="student-list__card-body-container">
                        <div class="candidates__position-body">
                            <div class="candidates__position-body-container">
                                <div class="candidates__table-container mx-0 mx-md-4">
                                    <table class="candidates__table student-list__table">
                                        <thead>
                                            <tr>
                                                <th>lvl</th>
                                                <th>strand</th>
                                                <th>section</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($sections as $section)
                                            <tr>
                                                <td>{{$section['level']}}</td>
                                                <td class="text-uppercase">{{$section['strand']}}</td>
                                                <td>{{$section['section']}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-center align-items-center mt-3">
                                    <a href="{{route('admin.registrySection')}}"
                                        class="btn btn-lg client-custom-button-2 no-text-shadow">return</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</article>
@endsection

@section('footer')
@include('inc.admin-footer')
@endsection
