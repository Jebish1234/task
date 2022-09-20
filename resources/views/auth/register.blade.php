@extends('welcome')
 
@section('title', 'Register')

@if($errors->any())

<div class="alert alert-danger" role="alert">
    <ul>
    {!! implode('', $errors->all('<li>:message</li>')) !!}
    </ul>
</div>

@endif


@section('content')
    <div>
        <section class="h-100 h-custom" style="background-color: #8fc4b7;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-8 col-xl-6">
                        <div class="card rounded-3">
                            <div class="card-body p-4 p-md-5">
                                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Registration </h3>

                                    <form method="POST" action="{{route('aut.register')}}" class="px-md-2">
                                        @csrf
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form3Example1q">Name</label>
                                            <input type="text" id="form3Example1q" name='name' class="form-control" />
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 mb-4">
                                                <div class="form-outline mb-4">
                                                    <label class="form-label" for="email">Email</label>
                                                    <input type="email" id="email" name='email' class="form-control" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 mb-4">
                                                <div class="form-outline mb-4">
                                                    <label class="form-label" for="phone">Phone</label>
                                                    <input type="number" id="phone" name='phone' class="form-control" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 mb-4">
                                                <div class="form-outline mb-4">
                                                    <label class="form-label" for="address">Address</label>
                                                    <input type="text" id="address" name='address' class="form-control" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 mb-4">
                                                <div class="form-outline mb-4">
                                                    <label class="form-label" for="state">State</label>
                                                    <input type="text" id="state" name='state' class="form-control" />
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <button type="submit" class="btn btn-success btn-sm mb-1">Register</button>
                                            <a href="/">Already have Account</a>
                                        </div>

                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop