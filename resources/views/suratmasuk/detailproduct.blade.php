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
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
  <script>
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