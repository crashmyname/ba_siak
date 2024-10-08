@extends('navbar.nav')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Report Surat Keluar Pages</h3>
                    <p class="text-subtitle text-muted">Report Surat Keluar</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Report Surat Keluar
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Report Surat Keluar Content</h4>
                </div>
                <div class="card-body">
                    Tanggal : <input type="date" id="date" class="form-control">
                    <button type="submit" class="btn btn-outline-danger" id="reportpdfkeluar" title="Report PDF"><i class="bi bi-filetype-pdf"></i>
                    </button>
                </div>
                <div class="container">
                    <table class="table table-striped" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Surat Keluar</th>
                                <th>Tanggal terima</th>
                                <th>Tanggal Pembuatan</th>
                                <th>No Po</th>
                                <th>No Invoice</th>
                                <th>No Faktur</th>
                                <th width="20%">Nominal</th>
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
                ajax: '{{ route('suratkeluar') }}',
                columns: [{
                        data: 'suratkeluar_id',
                        name: 'suratkeluar_id',
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'no_suratkeluar',
                        name: 'no_suratkeluar',
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
                        data: 'nominal',
                        name: 'nominal',
                        render: function(data,type,row){
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
            $('#reportpdfkeluar').on('click', function(){
            var selectData = dataTable.rows({ selected: true}).data();
            if (selectData.length > 0) {
                    selectData.each(function (data) {
                        const iD = data.suratkeluar_id;
                        const tanggal = $('#date').val();
                        var url = "{{url('/reportsuratkeluar')}}"+"/"+iD+'/'+tanggal;
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
