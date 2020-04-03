@extends('layouts/app')
@section('header')
@include('inc/dashboard-header')
@endsection
@section('content')
<article class="candidates">
    <div class="candidates__container">
        <div class="candidates__header">
            <div class="candidates__header-container">Candidates</div>
        </div>
        <div class="candidates__body">
            <div class="candidates__body-container">
                <div class="candidates__position">
                    <div class="candidates__position-container">
                        <div class="candidates__position-header">PResident</div>
                        <div class="candidates__position-body">
                            <div class="candidates__position-body-container">
                                <div class="candidates__table-container">
                                    <table class="candidates__table">
                                        <thead>
                                            <tr>
                                                <th>name</th>
                                                <th>strand</th>
                                                <th>position</th>
                                                <th>image</th>
                                                <th>actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>aw</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                                <td>@mdo</td>
                                                <td>
                                                    <a class="btn btn-lg client-custom-button">update</a>
                                                    <a class="btn btn-lg client-custom-button-2">hide</a>
                                                    <a class="btn btn-lg client-custom-button">remove</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>aw</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                                <td>@mdo</td>
                                                <td>
                                                    <a class="btn btn-lg client-custom-button">update</a>
                                                    <a class="btn btn-lg client-custom-button-2">hide</a>
                                                    <a class="btn btn-lg client-custom-button">remove</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <a class="btn btn-lg client-custom-button">add</a>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>
@endsection
