@extends ('welcome')


@section('content')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            Name
                        </th>
                        <th>
                            email
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            {{ Auth::user()->name }}
                        </td>
                        <td>
                            {{ Auth::user()->email }}
                        </td>
                        <td>
                            <a href={{ route('logout') }}>
                                Logout
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-black border-b border-golden-200">
                        You're logged in!
                    </div>

                </div>
            </div>
        </div>
    </x-app-layout>
@endsection
