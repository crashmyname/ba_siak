@extends('navbar.nav')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Report Surat Masuk Pages</h3>
                    <p class="text-subtitle text-muted">Report Surat Masuk</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Report Surat Masuk
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Report Surat Masuk Content</h4>
                </div>
                <div class="card-body">
                    <button type="submit" class="btn btn-outline-danger" id="reportpdf" title="Report PDF"><i class="bi bi-filetype-pdf"></i>
                    </button>
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
                                {{-- <th>Nama Product</th>
                                <th>Nama Supplier</th> --}}
                                <th>No Invoice</th>
                                <th>No Faktur</th>
                                <th>Nominal</th>
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
                    // {
                    //     data: 'nama_product',
                    //     name: 'nama_product',
                    // },
                    // {
                    //     data: 'nama_supplier',
                    //     name: 'nama_supplier',
                    // },
                    {
                        data: 'no_invoice',
                        name: 'no_invoice',
                    },
                    {
                        data: 'no_faktur',
                        name: 'no_faktur',
                    },
                    {
                        data: 'total',
                        name: 'total',
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
            $('#reportpdf').on('click', function(){
            var selectData = dataTable.rows({ selected: true}).data();
            if (selectData.length > 0) {
                    selectData.each(function (data) {
                        const iD = data.suratmasuk_id;
                        var url = "{{url('/reportsuratmasuk')}}"+"/"+iD;
                        window.open(url, '_blank');
                        // window.location.href="{{url('/viewparticipants')}}"+"/"+idSchedule;
                        var link = $('<a>', {
                            href: url,
                            text: 'Go to PDF',
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
        });
    </script>
@endsection
