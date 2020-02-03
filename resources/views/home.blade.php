@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  Dashboard
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
   <div class="row">
                        <div class="col-12">
                        <!--  ==================================SESSION MESSAGES==================================  -->
                            @if (session()->has('message'))
                                <div class="alert alert-{!! session()->get('type')  !!} alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    {!! session()->get('message')  !!}
                                </div>
                            @endif
                        <!--  ==================================SESSION MESSAGES==================================  -->


                        <!--  ==================================VALIDATION ERRORS==================================  -->
                            @if($errors->any())
                                @foreach ($errors->all() as $error)

                                    <div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        {!!  $error !!}
                                    </div>

                            @endforeach
                         @endif
                        <!--  ==================================SESSION MESSAGES==================================  -->
                        </div>
                    </div>
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
