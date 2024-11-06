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
                    <h1 class="card-title mb-0">Daftar Departemen</h1>
                    
                </div>
                <div class="card-body">
                    <table id="employeeTable" class="table table-striped nowrap" style="width:100%">
                        <thead class="table-dark ">
                            <tr>
                                <th>Nama</th>
                                <th>Lokasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departments as $department)
                                <tr>
                                    <td>{{ $department->department_name }}</td>
                                    <td>{{ $department->location }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="pagination">
                        {{ $departments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('scripts')
        <script></script>
    @endpush
@endsection
