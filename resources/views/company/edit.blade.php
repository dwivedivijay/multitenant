@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Edit Company/Tenant') }}
                </div>

                <div class="card-body m-0 p-0">
                    <div class="py-12">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-gray-200">
                                <form method="POST" action="{{ route('company.update',$task) }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" class="form-control" placeholder="Enter product name" id="name" name="name" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="regular_price">Product Regular Price:</label>
                                        <input type="text" class="form-control" placeholder="Enter product regular price" id="regular_price" name="regular_price" value="">
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