@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Pegawai
    </h2>
@endsection

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="card shadow-sm">
                <div class="card-body">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>


    @push('scripts')
        <script>
           
        </script>
    @endpush
@endsection
