@extends('navbar.nav')
@section('content')
<div class="main-content container-fluid">
    <div class="page-title">
      <div class="row">
          <div class="col-12 col-md-6 order-md-1 order-last">
              <h3>Form Add Detail Product</h3>
              <p class="text-subtitle text-muted">Page of Form Detail Product.</p>
          </div>
          <div class="col-12 col-md-6 order-md-2 order-first">
              <nav aria-label="breadcrumb" class='breadcrumb-header'>
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Form Add Detail</li>
                  </ol>
              </nav>
          </div>
      </div>
  </div>
  <section id="multiple-column-form">
      <div class="row match-height">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">FORM INPUT DETAIL PRODUCT</h4>
            </div>
            <div class="card-content">
              <div class="card-body">
                  @if(session('notification'))
              <script>
                  document.addEventListener('DOMContentLoaded', function () {
                  Swal.fire({
                      title: '{{ session('notification.title') }}',
                      text: '{{ session('notification.text') }}',
                      icon: '{{ session('notification.icon') }}',
                      confirmButtonText: 'OK'
                  });
              });
              </script>
              @endif
              <form action="{{route('adddetail',$id)}}" class="form form-horizontal" method="post" enctype="multipart/form-data" id="dataFormParticipants">
                  @csrf
                  <div class="row">
                    <input type="hidden" name="id" id="id" value="{{$id}}">
                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <label for="first-name-column">ID Product</label>
                        <input list="datalist" class="form-control" name="product_id" id="product_id" required>
                        <datalist id="datalist">
                              <option value=""> - </option>
                              @foreach ($product as $item)
                                  <option value="{{$item->product_id}}">{{$item->nama_product}}</option>
                              @endforeach
                          </datalist>
                      </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                    <button type="button"
                      class="btn btn-primary me-1 mb-1"
                      name="simpan" id="simpan">Submit</button>
                      <button
                        type="reset"
                        class="btn btn-light-secondary me-1 mb-1"
                      >
                        Reset
                      </button>
                    </div>
                  </div>
                </form>
                <table class="table table-striped" id="dataTable">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Kode Product</th>
                          <th>Nama Product</th>
                          <th>Jumlah</th>
                          <th width="20%">Satuan</th>
                          <th>Keterangan</th>
                      </tr>
                  </thead>
                  <tbody>

                  </tbody>
              </table>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
  <script>
    $(document).ready(function() {
      var id = $('#id').val();
            var dataTable = $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                select: true,
                ajax: "{{url('/dproducts')}}"+'/'+id,
                columns: [{
                        data: 'product_id',
                        name: 'product_id',
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
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
          }
    );
    document.getElementById('simpan').addEventListener('click',function(){
      Swal.fire({
        title: 'Are you sure?',
        text: 'Is the data you entered correct?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes',
      }).then((result)=>{
        if(result.isConfirmed){
          document.getElementById('dataFormParticipants').submit();
          document.getElementById('dataFormParticipants').reset();
        }
      });
    });
    </script>
  @endsection