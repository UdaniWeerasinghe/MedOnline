<html>
<body> 

<!-- @section('content') -->
    <div class="container">
        <header>@extends('layouts.app')</header>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">MedOnline</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <h2>What is MedOnline ?</h2>
                                    <p>We are a dedicated group to make the lives easier for
                                    people who are busy to take care of them! We provide home-delivery
                                    service of your own prescription with quality supply of medicines from
                                    50+ suppliers both from overseas and local. </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- @endsection -->
    <div>
    <!-- <footer class = 'row'>
        @include('includes.footer')
    </footer> -->
    </div>
</body>
</html>