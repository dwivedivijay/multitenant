@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Create Company/Tenant') }}
                    <a href="{{ route('company.list') }}" class="float-right">{{ __('Back to List') }}</a>
                </div>

                <div class="card-body m-0 p-0">
                    <div class="py-12">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-gray-200">
                                @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-dismissible">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @endif

                                @if ($message = Session::get('failed'))
                                <div class="alert alert-danger alert-dismissible"> 
                                    <strong>{{ $message }}</strong>
                                </div>
                                @endif
                                
                                
                                <form method="POST" action="{{ route('company.store') }}">
                                    @csrf
                                    <div><label for="name">Domain:</label></div>
                                    <div class="form-group input-group">
                                        <input value="{{Request::old('domain')}}" class="form-control" id="domain" name="domain" placeholder="Enter subdomain" required="" type="text">
                                        <div class="input-group-prepend"> <span class="input-group-text">.{{ config('app.main_domain') }}</span> </div>
                                        @error('domain') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Admin Name:</label>
                                        <input value="{{Request::old('name')}}" type="text" class="form-control" placeholder="Enter Name" id="name" name="name" value="">
                                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Admin Email:</label>
                                        <input value="{{Request::old('email')}}"  type="text" class="form-control" placeholder="Enter Email" id="email" name="email" value="">
                                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Admin Password:</label>
                                        <input type="password" class="form-control" placeholder="Enter Password" id="password" name="password" value="">
                                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="flex mt-4">
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection