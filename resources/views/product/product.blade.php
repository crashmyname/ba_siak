@extends('navbar.nav')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Product Pages</h3>
                    <p class="text-subtitle text-muted">Data Product</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Data Product
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Product Content</h4>
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#primary" title="Add Product">
                        <i class="bi bi-person-plus"></i>
                    </button>
                    <!--primary theme Modal -->
                    <div class="modal fade text-left" id="primary" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel160" aria-hidden="true">
                        <div class="modal-dialog modal-dialog modal-dialog-scrollable modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h5 class="modal-title white" id="myModalLabel160">Modal Product
                                    </h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-md-12 col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Form Add Product</h4>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <form class="form form-horizontal" id="formaddproduct" action="/addproduct"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label>Nama Supplier</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <input type="text" name="nama_supplier" id="nama_supplier"
                                                                        class="form-control">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Kode Product</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <input type="text" name="kode_product" id="kode_product" class="form-control" required>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Nama Product</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <input type="text" class="form-control"
                                                                        name="nama_product" id="nama_product">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Jumlah</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <input type="number" name="jumlah" id="jumlah" class="form-control">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Satuan</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <input type="text" name="satuan" id="satuan" class="form-control">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Keterangan</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <textarea name="keterangan" id="keterangan" cols="10" rows="2" class="form-control"></textarea>
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
                    <button type="button" class="btn btn-outline-warning" id="modalupproduct" data-bs-toggle="modal"
                        data-bs-target="#warning" title="Update Product">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                    <!--primary theme Modal -->
                    <div class="modal fade text-left" id="modalwarning" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel160" aria-hidden="true">
                        <div class="modal-dialog modal-dialog modal-dialog-scrollable modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-warning">
                                    <h5 class="modal-title white" id="myModalLabel160">Modal Product
                                    </h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-md-12 col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Form Update Product</h4>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <form class="form form-horizontal" id="formupdateproduct" action=""
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label>Nama Supplier</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <input type="text" name="nama_supplier" id="upnama_supplier"
                                                                        class="form-control">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Kode Product</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <input type="text" name="kode_product" id="upkode_product" class="form-control" required>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Nama Product</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <input type="text" class="form-control"
                                                                        name="nama_product" id="upnama_product">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Jumlah</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <input type="number" name="jumlah" id="upjumlah" class="form-control">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Satuan</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <input type="text" name="satuan" id="upsatuan" class="form-control">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Keterangan</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <textarea name="keterangan" id="upketerangan" cols="10" rows="2" class="form-control"></textarea>
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
                    <button type="submit" class="btn btn-outline-danger" id="deleteproduct" title="Delete Product"><i class="bi bi-trash"></i>
                    </button>
                </div>
                <div class="container">
                    <table class="table table-striped" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Supplier</th>
                                <th>Kode Product</th>
                                <th>Nama Product</th>
                                <th>Jumlah</th>
                                <th>Satuan</th>
                                <th>Keterangan</th>
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
                ajax: '{{ route('product') }}',
                columns: [{
                        data: 'product_id',
                        name: 'product_id',
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'nama_supplier',
                        name: 'nama_supplier',
                    },
                    {
                        data: 'kode_product',
                        name: 'kode_product',
                    },
                    {
                        data: 'nama_product',
                        name: 'nama_product',
                    },
                    {
                        data: 'jumlah',
                        name: 'jumlah',
                    },
                    {
                        data: 'satuan',
                        name: 'satuan',
                        render: function(data,type, row){
                            var number = parseFloat(data).toFixed(2);
                            return 'Rp ' + number.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                        }
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan',
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
                var url = "{{ route('addproduct') }}";
                var formData = new FormData($('#formaddproduct')[0]);
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
                                text: 'Product berhasil ditambah',
                            });
                            reloadData();
                        } else {
                            Swal.fire({
                                title: 'Error',
                                icon: 'error',
                                text: 'Gagal membuat Product',
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
            $('#modalupproduct').on('click', function(e) {
                var selected = dataTable.rows({
                    selected: true
                }).data();
                console.log(selected);
                var nama_supplier = $('#upnama_supplier');
                var kode_product = $('#upkode_product');
                var nama_product = $('#upnama_product');
                var jumlah = $('#upjumlah');
                var satuan = $('#upsatuan');
                var keterangan = $('#upketerangan');
                if (selected.length > 0) {
                    nama_supplier.val(selected[0].nama_supplier);
                    kode_product.val(selected[0].kode_product);
                    nama_product.val(selected[0].nama_product);
                    jumlah.val(selected[0].jumlah);
                    satuan.val(selected[0].satuan);
                    keterangan.val(selected[0].keterangan);
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
                var pID = row.product_id;
                var updateProduct = "{{ url('/product/') }}" + '/' + pID;
                var formID = '#formupdateproduct';
                console.log(pID);
                Swal.fire({
                    title: 'Update',
                    icon: 'warning',
                    text: 'Apakah yakin data ingin diubah?',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Update!!',
                }).then((result) => {
                    if (result.isConfirmed) {
                        var formUpProduct = new FormData($(formID)[0]);
                        for (var pair of formUpProduct.entries()) {
                            console.log(pair[0] + ': ' + pair[1]);
                        }

                        $.ajax({
                            type: 'POST',
                            url: updateProduct,
                            data: formUpProduct,
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
            $('#deleteproduct').on('click', function(e) {
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
                                const pID = data.product_id;
                                $.ajax({
                                    type: 'DELETE',
                                    url: "{{ url('/product') }}" + '/' + pID,
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
