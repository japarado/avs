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
                {{-- CUT --}}
                @foreach ($positions as $position)
                <div class="candidates__position">
                    <div class="candidates__position-container">
                    <div class="candidates__position-header">{{ $position->name }}</div>
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
                                            @if(count($position['candidates']) > 0)
												@foreach ($position->candidates as $candidate)
													<tr class="{{$candidate->trashed() ?? false ? "candidates__tr-border":""}}">
														<td>{{ $candidate->name }}</td>
														<td>{{ $candidate->strand->name }}</td>
														<td>{{ $position->name }}</td>
														<td><img class="candidates__img" src="{{ $candidate->image }}" alt="candidate image"/></td>
                                                        <td>
                                                            <div class="candidates__button-container">
                                                                <a href="{{route('admin.candidatesUpdate')}}" class="btn candidates__table-button client-custom-button">update</a>
                                                            </div>
															@if($candidate->trashed() ?? false)
                                                            <form class="candidates__button-container">
                                                                <button class="btn candidates__table-button client-custom-button-2">show</button>
                                                            </form>
                                                            @else
                                                            <form class="candidates__button-container">
                                                                <button class="btn candidates__table-button client-custom-button-2">hide</button>
                                                            </form>
                                                            @endif
                                                            <form class="candidates__button-container">
                                                                <button class="btn candidates__table-button client-custom-button">remove</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td>[empty]</td>
                                                    <td>[empty]</td>
                                                    <td>[empty]</td>
                                                    <td>[empty]</td>
                                                    <td></td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <a href="{{route('admin.candidatesAdd')}}" class="btn candidates__table-button client-custom-button">add</a>
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
                @endforeach
            </div>
        </div>
        <div class="d-flex justify-content-center mb-4">
            <a href="{{route('admin.dashboard')}}" class="btn btn-lg client-custom-button">Home</a>
        </div>
    </div>
</article>
@endsection

@section('footer')
    @include('inc.admin-footer')
@endsection
