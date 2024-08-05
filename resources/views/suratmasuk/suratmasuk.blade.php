@extends('navbar.nav')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Surat Masuk Pages</h3>
                    <p class="text-subtitle text-muted">Data Surat Masuk</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Data Surat Masuk
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Surat Masuk Content</h4>
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#primary" title="Add Surat Masuk">
                        <i class="bi bi-person-plus"></i>
                    </button>
                    <!--primary theme Modal -->
                    <div class="modal fade text-left" id="primary" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel160" aria-hidden="true">
                        <div class="modal-dialog modal-dialog modal-dialog-scrollable modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h5 class="modal-title white" id="myModalLabel160">Modal Surat Masuk
                                    </h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-md-12 col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Form Add Surat Masuk</h4>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <form class="form form-horizontal" id="formaddsuratmasuk" action="/addsuratmasuk"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label>No Surat Masuk</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <input type="text" name="no_suratmasuk" id="no_suratmasuk"
                                                                        class="form-control">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Tanggal Terima</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <input type="date" name="tgl_terima" id="tgl_terima" class="form-control" required>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Tanggal Pembuatan</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <input type="date" class="form-control"
                                                                        name="tgl_pembuatan" id="tgl_pembuatan">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>No PO</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <input type="text" name="no_po" id="no_po" class="form-control">
                                                                </div>
                                                                {{-- <div class="col-md-4">
                                                                    <label>Select Product</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <select name="product_id" id="product_id" class="form-control">
                                                                        <option value="">-</option>
                                                                        @foreach ($product as $item)
                                                                            <option value="{{$item->product_id}}">{{$item->nama_product}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div> --}}
                                                                <div class="col-md-4">
                                                                    <label>No Invoice</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <input type="text" name="no_invoice" id="no_invoice" class="form-control">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>No Faktur</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <input type="text" name="no_faktur" id="no_faktur" class="form-control">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>PPN</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <input type="text" name="ppn" id="ppn" class="form-control">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Total</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <input type="text" name="total" id="total" class="form-control">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Upload Berkas PDF</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <input type="file" name="berkas" id="berkas" class="form-control">
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
                    <button type="button" class="btn btn-outline-warning" id="modalupsuratmasuk" data-bs-toggle="modal"
                        data-bs-target="#warning" title="Update Surat Masuk">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                    <!--primary theme Modal -->
                    <div class="modal fade text-left" id="modalwarning" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel160" aria-hidden="true">
                        <div class="modal-dialog modal-dialog modal-dialog-scrollable modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-warning">
                                    <h5 class="modal-title white" id="myModalLabel160">Modal Surat Masuk
                                    </h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-md-12 col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Form Update Surat Masuk</h4>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <form class="form form-horizontal" id="formupdatesuratmasuk" action=""
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label>No Surat Masuk</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <input type="text" name="no_suratmasuk" id="upno_suratmasuk"
                                                                        class="form-control">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Tanggal Terima</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <input type="date" name="tgl_terima" id="uptgl_terima" class="form-control" required>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Tanggal Pembuatan</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <input type="text" class="form-control"
                                                                        name="tgl_pembuatan" id="uptgl_pembuatan">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>No PO</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <input type="text" name="no_po" id="upno_po" class="form-control">
                                                                </div>
                                                                {{-- <div class="col-md-4">
                                                                    <label>Select Product</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <select name="product_id" id="upproduct_id" class="form-control">
                                                                        <option value="">-</option>
                                                                        @foreach ($product as $item)
                                                                            <option value="{{$item->product_id}}">{{$item->nama_product}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div> --}}
                                                                <div class="col-md-4">
                                                                    <label>No Invoice</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <input type="text" name="no_invoice" id="upno_invoice" class="form-control">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>No Faktur</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <input type="text" name="no_faktur" id="upno_faktur" class="form-control">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>PPN</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <input type="text" name="ppn" id="upppn" class="form-control">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Total</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <input type="text" name="total" id="uptotal" class="form-control">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Berkas</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <input type="file" name="berkas" class="form-control" id="upberkas" class="form-control">
                                                                    <iframe src="" width="100%" id="pdfViewer" height="500px" frameborder="0"></iframe>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Keterangan</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <textarea name="keterangan" id="upketerangan" class="form-control" cols="10" rows="2"></textarea>
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
                    <button type="submit" class="btn btn-outline-danger" id="deletesuratmasuk" title="Delete Surat Masuk"><i class="bi bi-trash"></i>
                    </button>
                    <a id="addProduct" type="button" title="Add Product" target="_blank" class="btn btn-outline-info"><i class="bi bi-nut-fill"></i></a>
                </div>
                <div class="container">
                    <table class="table table-striped" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Surat Masuk</th>
                                <th>Tanggal terima</th>
                                <th>Tanggal Pembuatan</th>
                                <th>No Po</th>
                                <th>No Invoice</th>
                                <th>No Faktur</th>
                                <th>PPN</th>
                                <th>Total</th>
                                <th>Berkas</th>
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
                ajax: '{{ route('suratmasuk') }}',
                columns: [{
                        data: 'suratmasuk_id',
                        name: 'suratmasuk_id',
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'no_suratmasuk',
                        name: 'no_suratmasuk',
                    },
                    {
                        data: 'tgl_terima',
                        name: 'tgl_terima',
                    },
                    {
                        data: 'tgl_pembuatan',
                        name: 'tgl_pembuatan',
                    },
                    {
                        data: 'no_po',
                        name: 'no_po',
                    },
                    {
                        data: 'no_invoice',
                        name: 'no_invoice',
                    },
                    {
                        data: 'no_faktur',
                        name: 'no_faktur',
                    },
                    {
                        data: 'ppn',
                        name: 'ppn',
                    },
                    {
                        data: 'total',
                        name: 'total',
                    },
                    {
                        data: 'berkas',
                        name: 'berkas',
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
                var url = "{{ route('addsuratmasuk') }}";
                var formData = new FormData($('#formaddsuratmasuk')[0]);
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
                                text: 'Surat Masuk berhasil ditambah',
                            });
                            reloadData();
                        } else {
                            Swal.fire({
                                title: 'Error',
                                icon: 'error',
                                text: 'Gagal membuat Surat Masuk',
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
            $('#modalupsuratmasuk').on('click', function(e) {
                var selected = dataTable.rows({
                    selected: true
                }).data();
                console.log(selected);
                var no_suratmasuk = $('#upno_suratmasuk');
                var tgl_terima = $('#uptgl_terima');
                var tgl_pembuatan = $('#uptgl_pembuatan');
                var no_po = $('#upno_po');
                // var product_id = $('#upproduct_id');
                // var nama_supplier = $('#upnama_supplier');
                var no_invoice = $('#upno_invoice');
                var no_faktur = $('#upno_faktur');
                var ppn = $('#upppn');
                var total = $('#uptotal');
                var berkas = $('#pdfViewer');
                var keterangan = $('#upketerangan');
                if (selected.length > 0) {
                    no_suratmasuk.val(selected[0].no_suratmasuk);
                    tgl_terima.val(selected[0].tgl_terima);
                    tgl_pembuatan.val(selected[0].tgl_pembuatan);
                    no_po.val(selected[0].no_po);
                    // product_id.val(selected[0].product_id);
                    // nama_supplier.val(selected[0].nama_supplier);
                    no_invoice.val(selected[0].no_invoice);
                    no_faktur.val(selected[0].no_faktur);
                    ppn.val(selected[0].ppn);
                    total.val(selected[0].total);
                    berkas.attr('src','storage/berkas/'+selected[0].berkas);
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
                var sID = row.suratmasuk_id;
                var updateSuratmasuk = "{{ url('/suratmasuk/') }}" + '/' + sID;
                var formID = '#formupdatesuratmasuk';
                console.log(sID);
                Swal.fire({
                    title: 'Update',
                    icon: 'warning',
                    text: 'Apakah yakin data ingin diubah?',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Update!!',
                }).then((result) => {
                    if (result.isConfirmed) {
                        var formUpSuratmasuk = new FormData($(formID)[0]);
                        for (var pair of formUpSuratmasuk.entries()) {
                            console.log(pair[0] + ': ' + pair[1]);
                        }

                        $.ajax({
                            type: 'POST',
                            url: updateSuratmasuk,
                            data: formUpSuratmasuk,
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
            $('#addProduct').on('click', function(){
                var selectData = dataTable.rows({ selected: true}).data();
                if (selectData.length > 0) {
                        selectData.each(function (data) {
                            const idSuratmasuk = data.suratmasuk_id;
                            var url = "{{url('/dproduct')}}"+"/"+idSuratmasuk;
                            window.open(url, '_blank');
                            var link = $('<a>', {
                                href: url,
                                text: 'Go to Add Product',
                                class: 'btn btn-primary',
                                target: '_blank',
                            });

                            // Tambahkan tombol ke dokumen
                            $('#buttonContainer').append(link);
                        });
                } else {
                    Swal.fire({
                        icon: 'info',
                        title: 'Info',
                        text: 'No data selected.',
                    });
                };
            });
            $('#deletesuratmasuk').on('click', function(e) {
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
                                const sID = data.suratmasuk_id;
                                $.ajax({
                                    type: 'DELETE',
                                    url: "{{ url('/suratmasuk') }}" + '/' + sID,
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
