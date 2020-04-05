@extends('layouts/app')

@section('content')
<article class="result-doc">
    <div class="result-doc__container">
        <div class="result-doc__logo-container">
            <img class="result-doc__logo-pru" src="{{asset('img/pru.png')}}" />
        </div>
        <div class="">
            <div class="result-doc__header">
                <div class="result-doc__header-container">
                    <div class="result-doc__logo">
                        <img class="result-doc__logo-img" src="{{asset('img/doc-header.png')}}" />
                    </div>
                    <div class="result-doc__header-text">
                        <span class="result-doc__header-title">results</span>
                        <div class="result-doc__header-content">
                            Rm. 7D Buenaventura Garcia Paredes, O.P.<br/>March 21, 2020
                        </div>
                    </div>
                </div>
            </div>
            <div class="result-doc__body">
                <div class="result-doc__body-container">
                    <table class="result-doc__table">
                        <thead>
                            <tr>
                                <th colspan="2">12ABM15</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Voted</td>
                                <td>45</td>
                            </tr>
                            <tr>
                                <td>Voted</td>
                                <td>45</td>
                            </tr>
                            <tr>
                                <td>Voted</td>
                                <td>45</td>
                            </tr>
                            <tr class="result-doc__table-row-custom">
                                <td>Voted</td>
                                <td>45</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="result-doc__table">
                        <thead>
                            <tr>
                                <th colspan="2">President</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Name</td>
                                <td>Votes</td>
                            </tr>
                            <tr>
                                <td>Voted</td>
                                <td>45</td>
                            </tr>
                            <tr>
                                <td>Voted</td>
                                <td>45</td>
                            </tr>
                            <tr class="result-doc__table-row-custom">
                                <td>Voted</td>
                                <td>45</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="result-doc__table">
                        <thead>
                            <tr>
                                <th colspan="2">12ABM15</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Voted</td>
                                <td>45</td>
                            </tr>
                            <tr>
                                <td>Voted</td>
                                <td>45</td>
                            </tr>
                            <tr>
                                <td>Voted</td>
                                <td>45</td>
                            </tr>
                            <tr class="result-doc__table-row-custom">
                                <td>Voted</td>
                                <td>45</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="result-doc__footer">
                <div class="result-doc__footer-container">
                    <div class="result-doc__footer-body">
                        <div class="result-doc__footer-text">
                            I agree that the result presented above is accurate according to the UST SHS IURIS SYSTEM:
                        </div>
                        <div class="result-doc__sign result-doc__footer-text">
                            Signature Over Printed Name of Polling Station Deputy
                        </div>
                        <div class="result-doc__footer-text">
                            Double Checked by:
                        </div>
                        <div class="result-doc__sign result-doc__footer-text">
                            Signature Over Printed Name of Legal Division
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>
@endsection
