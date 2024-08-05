@extends('navbar.nav')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>User Pages</h3>
                    <p class="text-subtitle text-muted">Data user</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Data User
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">User Content</h4>
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#primary" title="Add User">
                        <i class="bi bi-person-plus"></i>
                    </button>
                    <!--primary theme Modal -->
                    <div class="modal fade text-left" id="primary" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel160" aria-hidden="true">
                        <div class="modal-dialog modal-dialog modal-dialog-scrollable modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h5 class="modal-title white" id="myModalLabel160">Modal User
                                    </h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-md-12 col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Form Add User</h4>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <form class="form form-horizontal" id="formadduser" action="/adduser"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label>Username</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <input list="datalist" name="username" id="username"
                                                                        class="form-control">
                                                                    <datalist id="datalist">
                                                                        <option value=""> - </option>
                                                                    </datalist>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Nama</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <input type="text" name="name" id="name" class="form-control" required>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Password</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <input type="password" class="form-control"
                                                                        name="password" id="password">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Profil Picture</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <input type="file" class="form-control"
                                                                        name="profile" id="profile"
                                                                        accept=".jpeg,.jpg,.png,.webp">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Role</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <select name="role" id="role"
                                                                        class="form-control">
                                                                        <option value=""> - </option>
                                                                        <option value="Administrator"> Administrator
                                                                        </option>
                                                                        <option value="User"> User </option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-12 d-flex justify-content-end">
                                                                    <button type="submit"
                                                                        class="btn btn-primary me-1 mb-1" name="add"
                                                                        id="add">Submit</button>
                                                                    <button type="reset"
                                                                        class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-outline-warning" id="modalupuser" data-bs-toggle="modal"
                        data-bs-target="#warning" title="Update User">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                    <!--primary theme Modal -->
                    <div class="modal fade text-left" id="modalwarning" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel160" aria-hidden="true">
                        <div class="modal-dialog modal-dialog modal-dialog-scrollable modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-warning">
                                    <h5 class="modal-title white" id="myModalLabel160">Modal User
                                    </h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-md-12 col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Form Update User</h4>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <form class="form form-horizontal" id="formupdateuser" action=""
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label>Username</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <input type="text" name="username" id="upusername"
                                                                        class="form-control">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Nama</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <input type="text" class="form-control"
                                                                        name="name" id="upname">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Password</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <input type="password" class="form-control"
                                                                        name="password" id="uppassword">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Profil Picture</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <input type="file" class="form-control"
                                                                        name="profile" id="upprofile"
                                                                        accept=".jpeg,.jpg,.png,.webp">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Role</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <select name="role" id="uprole"
                                                                        class="form-control">
                                                                        <option value=""> - </option>
                                                                        <option value="Administrator"> Administrator
                                                                        </option>
                                                                        <option value="User"> User </option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-12 d-flex justify-content-end">
                                                                    <button type="submit"
                                                                        class="btn btn-primary me-1 mb-1" name="update"
                                                                        id="update">Submit</button>
                                                                    <button type="reset"
                                                                        class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-danger" id="deleteuser" title="Delete user"><i class="bi bi-trash"></i>
                    </button>
                </div>
                <div class="container">
                    <table class="table table-striped" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Profil</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
    </div>
    </section>
    <script type="text/javascript">
        $(document).ready(function() {
            var dataTable = $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                select: true,
                ajax: '{{ route('user') }}',
                columns: [{
                        data: 'user_id',
                        name: 'user_id',
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'username',
                        name: 'username',
                    },
                    {
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'role',
                        name: 'role',
                    },
                    {
                        data: 'profile',
                        name: 'profile',
                        render: function(data, type, row) {
                            var url = "{{ asset('storage/profil/') }}";
                            return `
                            <img src="${url}/${data}" width="15%" class="rounded">
                            `;
                        }
                    },
                ],
                lengthMenu: [10, 25, 50],
                dom: 'Blftrip',
                buttons: [
                    {
                        extend: 'pdf',
                        text: 'PDF',
                        exportOptions: {
                            columns: ':visible',
                            columnDefs: [{
                                targets: -1,
                                visible: false
                            }]
                        }
                    },
                    {
                        extend: 'print',
                        text: 'CETAK',
                        exportOptions: {
                            columns: ':visible',
                            columnDefs: [{
                                targets: -1,
                                visible: false
                            }]
                        }
                    },
                    {
                        extend: 'excel',
                        text: 'EXCEL',
                        exportOptions: {
                            columns: ':visible',
                            columnDefs: [{
                                targets: -1,
                                visible: false
                            }]
                        }
                    },
                    {
                        extend: 'colvis',
                        text: 'COLUMN VISIBLE',
                        exportOptions: {
                            columns: ':visible',
                            columnDefs: [{
                                targets: -1,
                                visible: false
                            }]
                        }
                    }
                ]
            })

            function reloadData() {
                dataTable.ajax.reload();
            }
            $('#add').on('click', function(e) {
                e.preventDefault();
                var url = "{{ route('adduser') }}";
                var formData = new FormData($('#formadduser')[0]);
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'POST',
                    url: url,
                    processData: false, // Jangan memproses data
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        if (response.status === 200) {
                            Swal.fire({
                                title: 'Success',
                                icon: 'success',
                                text: 'User berhasil ditambah',
                            });
                            reloadData();
                        } else {
                            Swal.fire({
                                title: 'Error',
                                icon: 'error',
                                text: 'Gagal membuat user',
                            })
                        }
                    },
                    error: function(error) {
                        console.error(error);
                        Swal.fire({
                            title: 'Error',
                            icon: 'error',
                            text: 'Error dalam melakukan fungsi',
                        })
                    }
                })
            })
            $('#modalupuser').on('click', function(e) {
                var selected = dataTable.rows({
                    selected: true
                }).data();
                console.log(selected);
                var nik = $('#upusername');
                var nama = $('#upname');
                // var pass = $('#uppassword');
                var pict = $('#upprofile');
                var role = $('#uprole');
                if (selected.length > 0) {
                    nik.val(selected[0].username);
                    nama.val(selected[0].name);
                    // pass.val(selected[0].password);
                    // pict.val(selected[0].profile);
                    role.empty();
                    var userRole = selected[0].role;
                    if (userRole == 'Administrator') {
                        $('<option>').val(userRole).text(userRole).appendTo(role);
                        $('<option>').val('User').text('User').appendTo(role);
                    } else {
                        $('<option>').val(userRole).text(userRole).appendTo(role);
                        $('<option>').val('Administrator').text('Administrator').appendTo(role);
                    }
                    role.val(userRole);
                    $('#modalwarning').modal('show');
                } else {
                    Swal.fire({
                        title: 'info',
                        icon: 'info',
                        text: 'No data selected',
                    });
                }
            });
            $('#update').on('click', function(e) {
                e.preventDefault();
                var selected = dataTable.rows({
                    selected: true
                }).data();
                if (selected.length == 0) {
                    Swal.fire({
                        title: 'Error',
                        icon: 'error',
                        text: 'Tidak ada data yang dipilih!',
                        showConfirmButton: false,
                        timer: 1500,
                        timerProgressBar: true,
                    });
                    return;
                }
                var row = selected[0];
                var uID = row.user_id;
                var updateUser = "{{ url('/user/') }}" + '/' + uID;
                var formID = '#formupdateuser';
                console.log(uID);
                Swal.fire({
                    title: 'Update',
                    icon: 'warning',
                    text: 'Apakah yakin data ingin diubah?',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Update!!',
                }).then((result) => {
                    if (result.isConfirmed) {
                        var formUpUser = new FormData($(formID)[0]);
                        for (var pair of formUpUser.entries()) {
                            console.log(pair[0] + ': ' + pair[1]);
                        }

                        $.ajax({
                            type: 'POST',
                            url: updateUser,
                            data: formUpUser,
                            contentType: false,
                            processData: false,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            dataType: 'json',
                            success: function(response) {
                                console.log(response);
                                if (response.status === 200) {
                                    Swal.fire({
                                        title: 'success',
                                        icon: 'success',
                                        text: 'Data berhasil diupdate',
                                        showConfirmButton: false,
                                        timer: 1500,
                                        timerProgressBar: true,
                                    })
                                    reloadData();
                                } else {
                                    Swal.fire({
                                        title: 'error',
                                        icon: 'Error',
                                        text: 'Data gagal diupdate',
                                        showConfirmButton: false,
                                        timer: 1500,
                                        timerProgressBar: true,
                                    })
                                }
                            },
                            error: function(error) {
                                console.error(error);
                                Swal.fire({
                                    title: 'Error',
                                    icon: 'error',
                                    text: 'Terjadi kesalahan saat memperbarui data',
                                    showConfirmButton: false,
                                    timer: 1500,
                                    timerProgressBar: true,
                                });
                            }
                        })
                    }
                })
            })
            $('#deleteuser').on('click', function(e) {
                var select = dataTable.rows({
                    selected: true
                }).data();
                if (select.length > 0) {
                    Swal.fire({
                        title: 'Delete',
                        icon: 'warning',
                        text: 'Yakin ingin dihapus?',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, Hapus!!',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            select.each(function(data) {
                                const uID = data.user_id;
                                $.ajax({
                                    type: 'DELETE',
                                    url: "{{ url('/user') }}" + '/' + uID,
                                    data: {
                                        _token: '{{ csrf_token() }}',
                                    },
                                    success: function(response) {
                                        if (response.status === 200) {
                                            Swal.fire({
                                                title: 'Success',
                                                icon: 'success',
                                                text: 'Data Berhasil dihapus',
                                                timer: 1500,
                                                timerProgressBar: true,
                                            });
                                            reloadData();
                                        } else {
                                            Swal.fire({
                                                title: 'error',
                                                icon: 'error',
                                                text: 'Data gagal dihapus',
                                                timer: 1500,
                                                timerProgressBar: true,
                                            })
                                        }
                                    }
                                })
                            })
                        }
                    })
                } else {
                    Swal.fire({
                        title: 'info',
                        icon: 'info',
                        text: 'No Data selected',
                    });
                }
            });
        });
    </script>
@endsection
