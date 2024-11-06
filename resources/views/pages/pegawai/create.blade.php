@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Tambah Data Pegawai
    </h2>
@endsection

@section('content')
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3 class="card-title mb-0">Tambah Data Pegawai</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data" id="employeeForm">
                    @csrf

                    {{-- Nama --}}
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>

                    {{-- NIP --}}
                    <div class="mb-3">
                        <label for="nip" class="form-label">NIP</label>
                        <input type="text" class="form-control" id="nip" name="nip" required>
                    </div>

                    {{-- Photo Upload --}}
                    <div class="mb-3">
                        <label for="photo" class="form-label">Upload Photo</label>
                        <input id="photo" name="photo" type="file" class="file-input" required>
                        <input type="hidden" id="photoPath" name="photoPath">
                    </div>

                    {{-- Tempat Lahir --}}
                    <div class="mb-3">
                        <label for="place_birth" class="form-label">Kota Kelahiran</label>
                        <select class="form-control" id="place_birth" name="place_birth" required>
                            <option value="">Pilih Kota</option>
                            @foreach ($regions as $region)
                                <option value="{{ $region->name }}">{{ $region->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Tanggal Lahir --}}
                    <div class="mb-3">
                        <label for="date_birth" class="form-label">Tanggal Lahir</label>
                        <input type="text" class="form-control" id="date_birth" name="date_birth" value="10/24/1984" />
                    </div>

                    {{-- Alamat --}}
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>

                    {{-- Nomor Telepon --}}
                    <div class="mb-3">
                        <label for="phone" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>

                    {{-- Email --}}
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <span id="email-error" style="color:red; display:none; font-size:10pt;">Email is already taken.</span>
                    </div>

                    {{-- Departemen --}}
                    <div class="mb-3">
                        <label for="id_departemen" class="form-label">Departemen</label>
                        <select class="form-control select2" id="id_departemen" name="id_departemen" required>
                            <option value="">Pilih Departemen</option>
                            @foreach ($departemens as $departement)
                                <option value="{{ $departement->id }}">{{ $departement->department_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Role --}}
                    <div class="mb-3">
                        <label for="id_role" class="form-label">Role</label>
                        <select class="form-control select2" id="id_role" name="id_role" required>
                            <option value="">Pilih Role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Tanggal Bergabung --}}
                    <div class="mb-3">
                        <label for="joining_date" class="form-label">Tanggal Bergabung</label>
                        <input type="text" class="form-control datepicker" id="joining_date" name="joining_date"
                            required>
                    </div>

                    {{-- Status --}}
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="aktif">Aktif</option>
                            <option value="tidak aktif">Tidak Aktif</option>
                        </select>
                    </div>

                    {{-- Dokumen Pendukung --}}
                    <div class="mb-3">
                        <label for="document" class="form-label">Dokumen Pendukung</label>
                        <div class="position-relative">
                            <div class="form-group mb-3">
                                <div class="form-control p-0">
                                    <div class="main-drag-area dropzone d-flex flex-column align-items-center justify-content-center text-muted opacity-75"  id="dropzone" style="height: 100%;">
                                        <svg class="mb-3" width="50px" height="50px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
                                            <path d="M41.636 8.404l1.017 7.237 17.579 4.71a5 5 0 0 1 3.587 5.914l-.051.21-6.73 25.114A5.002 5.002 0 0 1 53 55.233V56a5 5 0 0 1-4.783 4.995L48 61H16a5 5 0 0 1-4.995-4.783L11 56V44.013l-1.69.239a5 5 0 0 1-5.612-4.042l-.034-.214L.045 14.25a5 5 0 0 1 4.041-5.612l.215-.035 31.688-4.454a5 5 0 0 1 5.647 4.256zm-20.49 39.373l-.14.131L13 55.914V56a3 3 0 0 0 2.824 2.995L16 59h21.42L25.149 47.812a3 3 0 0 0-4.004-.035zm16.501-9.903l-.139.136-9.417 9.778L40.387 59H48a3 3 0 0 0 2.995-2.824L51 56v-9.561l-9.3-8.556a3 3 0 0 0-4.053-.009zM53 34.614V53.19a3.003 3.003 0 0 0 2.054-1.944l.052-.174 2.475-9.235L53 34.614zM48 27H31.991c-.283.031-.571.032-.862 0H16a3 3 0 0 0-2.995 2.824L13 30v23.084l6.592-6.59a5 5 0 0 1 6.722-.318l.182.159.117.105 9.455-9.817a5 5 0 0 1 6.802-.374l.184.162L51 43.721V30a3 3 0 0 0-2.824-2.995L48 27zm-37 5.548l-5.363 7.118.007.052a3 3 0 0 0 3.388 2.553L11 41.994v-9.446zM25.18 15.954l-.05.169-2.38 8.876h5.336a4 4 0 1 1 6.955 0L48 25.001a5 5 0 0 1 4.995 4.783L53 30v.88l5.284 8.331 3.552-13.253a3 3 0 0 0-1.953-3.624l-.169-.05L28.804 14a3 3 0 0 0-3.623 1.953zM21 31a4 4 0 1 1 0 8 4 4 0 0 1 0-8zm0 2a2 2 0 1 0 0 4 2 2 0 0 0 0-4zM36.443 6.11l-.175.019-31.69 4.453a3 3 0 0 0-2.572 3.214l.02.175 3.217 22.894 5.833-7.74a5.002 5.002 0 0 1 4.707-4.12L16 25h4.68l2.519-9.395a5 5 0 0 1 5.913-3.587l.21.051 11.232 3.01-.898-6.397a3 3 0 0 0-3.213-2.573zm-6.811 16.395a2 2 0 0 0 1.64 2.496h.593a2 2 0 1 0-2.233-2.496zM10 13a4 4 0 1 1 0 8 4 4 0 0 1 0-8zm0 2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" id="filePath" name="filePath">
                    </div>

                    <button type="submit" class="btn btn-dark px-4 py-2">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Initialize FileInput for Photo
            $("#photo").fileinput({
                showUpload: false,
                allowedFileExtensions: ["jpg", "jpeg", "png"],
                theme: "fas",
                maxFileSize: 2000,
                uploadExtraData: function() {
                    return {
                        '_token': "{{ csrf_token() }}"
                    };
                },
                uploadAsync: false,
                uploadUrl: "{{ route('upload.photo') }}",
                uploadSuccess: function(event, data) {
                    console.log("Photo uploaded successfully:", data.response.path);

                    $('#photoPath').val(data.response.path);
                },
                uploadError: function(event, data) {
                    console.error("Upload failed:", data);
                }
            });

            // Initialize Select2 for Kota Kelahiran, Role, and Departemen
            $('#place_birth').select2({
                theme: "classic"
            });

            // Initialize Dropzone for Document Upload
            Dropzone.autoDiscover = false;

            new Dropzone("#dropzone", {
                url: "{{ route('upload.docs') }}",
                maxFilesize: 10,
                acceptedFiles: ".pdf,.doc,.docx",
                addRemoveLinks: true,
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function(file, response) {
                    console.log("File uploaded successfully:", response.path);

                    $('#filePath').val(response.path);
                },
                error: function(file, response) {
                    console.error("Upload failed:", response);
                }
            });
        });


        $(function() {
            $('#date_birth').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'), 10)
            }, function(start, end, label) {
                $('#date_birth').val(start.format('YYYY-MM-DD'));
            });
        });

        $(function() {
            $('#joining_date').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'), 10)
            }, function(start, end, label) {
                $('#joining_date').val(start.format('YYYY-MM-DD'));
            });
        });

        $(document).ready(function() {
            $('#email').on('input', function() {
                let email = $(this).val();

                $.ajax({
                    url: '{{ route('check.email') }}', // Laravel route
                    method: 'POST',
                    data: {
                        email: email,
                        _token: '{{ csrf_token() }}' // Include CSRF token
                    },
                    success: function(response) {
                        if (response.exists) {
                            $('#email-error').show().text("Email is already taken.");
                        } else {
                            $('#email-error').hide();
                        }
                    }
                });
            });
        });
    </script>
@endpush
