@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Departments
    </h2>
@endsection

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h1 class="card-title mb-0">Daftar Pegawai</h1>
                    <a href="{{ route('pegawai.create') }}" class="btn btn-dark ">Tambah Data</a>
                </div>
                <div class="card-body">
                    <table id="employeeTable" class="table table-striped nowrap" style="width:100%">
                        <thead class="table-dark ">
                            <tr>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                <th>Jabatan</th>
                                <th>Department</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>


    @push('scripts')
        <script>
            new DataTable('#example');
            $(document).ready(function() {
                $('#employeeTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('pegawai.index') }}',
                    responsive: true,
                    paging: true,
                    searching: true,
                    columns: [{
                            data: 'nama',
                            name: 'nama'
                        },
                        {
                            data: 'nip',
                            name: 'nip'
                        },
                        {
                            data: 'address',
                            name: 'alamat'
                        },
                        {
                            data: 'status',
                            name: 'status'
                        },
                        {
                            data: 'role',
                            name: 'role'
                        },
                        {
                            data: 'department',
                            name: 'department'
                        },
                        {
                            data: 'id',
                            name: 'aksi',
                            orderable: false,
                            searchable: false,
                            render: function(data, type, row, meta) {
                                return `<a href="/pegawai/${data}" class="btn btn-dark btn-sm">View</a>`;
                            }
                        },
                    ],
                });
            });
        </script>
    @endpush
@endsection
