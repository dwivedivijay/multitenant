@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Users') }}

                    <a href="{{ route('companyuser.create') }}" class="float-right">{{ __('Add User') }}</a>
                </div>

                <div class="card-body m-0 p-0">
                    <div class="py-12">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-2 bg-white border-b border-gray-200">
                                <table width="100" class="w-full text-sm text-left text-gray-500 w-100">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-3 py-1 text-left">Name</th>
                                        <th scope="col" class="px-3 py-1 text-left">Email</th>
                                        <th scope="col" class="px-3 py-1"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($userslist as $user)
                                        <tr class="bg-white border-b">
                                            <td class="px-3 py-1 font-medium text-gray-900 whitespace-nowrap">
                                                {{ $user->name }}
                                            </td>
                                            <td class="px-3 py-1 font-medium text-gray-900 whitespace-nowrap">
                                                {{ $user->email }}
                                            </td>
                                            <td class="px-3 py-1">
                                                <a href="#{{ route('company.edit', $user) }}">Edit</a>
                                                {{--<form method="POST" action="{{ route('tasks.destroy', $company) }}" class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="bg-red-600" onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>--}}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="bg-white border-b">
                                            <td colspan="2"
                                                class="px-3 py-1 font-medium text-gray-900 whitespace-nowrap">
                                                {{ __('No tasks found') }}
                                            </td>
                                        </tr>
                                    @endforelse
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
@endsection
