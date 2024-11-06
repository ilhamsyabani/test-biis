@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Tambah Data Pegawai
    </h2>
@endsection

@section('content')
    <div class="container my-5">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3 class="card-title mb-0">Detail Data Pegawai</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Profile Section -->
                    <div class="col-md-3 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <img class="rounded-circle mt-1 mb-4" width="200px" height="200px"
                                src="{{ $employe->photo ? asset('storage/' .$employe->photo) : 'https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg' }}"
                                alt="Employee Photo">

                            <span class="font-weight-bold mt-2">{{ $employe->nama }}</span>
                            <span class="text-black-50">{{ $employe->email }}</span>
                        </div>
                    </div>

                    <!-- Employee Details Section -->
                    <div class="col-md-5 border-right">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4>Profile Detail</h4>
                            </div>
                            <div class="mt-3">
                                <div class="row mb-2 d-flex">
                                    <span class="labels col-md-4">NIP : </span>
                                    <span class="col-md-8 text-muted">{{ $employe->nip }}</span>
                                </div>
                                <div class="row mb-2 d-flex">
                                    <span class="labels col-md-4">Alamat : </span>
                                    <span class="col-md-8 text-muted">{{ $employe->address }}</span>
                                </div>
                                <div class="row mb-2 d-flex">
                                    <span class="labels col-md-4">Tempat lahir : </span>
                                    <span class="col-md-8 text-muted">{{ $employe->place_birth }}</span>
                                </div>
                                <div class="row mb-2 d-flex">
                                    <span class="labels col-md-4">Tanggal lahir : </span>
                                    <span class="col-md-8 text-muted">{{ $employe->date_birth }}</span>
                                </div>
                                <div class="row mb-2 d-flex">
                                    <span class="labels col-md-4">Nomor HP : </span>
                                    <span class="col-md-8 text-muted">{{ $employe->phone }}</span>
                                </div>
                                <div class="row mb-2 d-flex">
                                    <span class="labels col-md-4">Depatemen : </span>
                                    <span class="col-md-8 text-muted">{{ $employe->department->department_name }}</span>
                                </div>
                                <div class="row mb-2 d-flex">
                                    <span class="labels col-md-4">Jabatan : </span>
                                    <span class="col-md-8 text-muted">{{ $employe->role->role_name }}</span>
                                </div>
                                <div class="row mb-2 d-flex">
                                    <span class="labels col-md-4">Status : </span>
                                    <span class="col-md-8 text-muted">{{ $employe->status }}</span>
                                </div>
                            </div>                            
                        </div>
                    </div>

                    <!-- Document Section -->
                    <div class="col-md-4">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="font-weight-bold">Dokumen Pegawai</span>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <span>
                                    @if ($employe->document)
                                        <a href="{{ asset('storage/' .$employe->document) }}" target="_blank" class="text-info">Lihat Dokumen</a>
                                    @else
                                        <span class="text-muted">Tidak ada dokumen</span>
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Add any custom scripts here if necessary
    </script>
@endpush
