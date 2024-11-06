@props(['type' => 'info'])

@php
    // Define alert styles based on the type
    $alertClasses = [
        'success' => 'alert alert-success',
        'error' => 'alert alert-danger',
        'info' => 'alert alert-info',
        'warning' => 'alert alert-warning',
    ][$type];
@endphp

@if (session()->has('message'))
    <div class="{{ $alertClasses }} d-flex align-items-center" role="alert">
        <span>{{ session('message') }}</span>
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
