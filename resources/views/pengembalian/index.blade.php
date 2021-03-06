@extends('temp')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Tables Suplier</h1> 
          </div>
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Tables</li>
            </ol>
          </div> -->
        </div>
      </div><!-- /.container-fluid --> 
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <button type="button" name="add" id="Tambah" class="btn btn-primary">Add Data</button>
              <a href="{{ url('downloadExcel/xlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="panel panel-body">
                 <table id="ke_table" class="table table-bordered" style="width:100%">
                    <thead>
                            <th>Id</th>
                            <th>No kembali</th>
                            <th>Nama Anggota</th>
                            <th>Judul Buku</th>
                            <th>Tanggal kembali Buku</th>
                            <th>Tanggal Harus Kembali</th>
                            <th>Tanggal Kembali</th>
                            <th>Denda</th>
                       </tr>
                    </thead>
                 </table>
              </div>
            </div>
        </div>
      </div>
    </section>
  </div>
  @endsection
  @push('scripts')

    @include('pengembalian.form')
    <script type="text/javascript">
      $(document).ready(function() {
          //get ke dataTable
          $('#ke_table').DataTable({
             processing: true,
             serverSide: true,
             ajax: '/pen_json',
             columns: [
                { data: 'id', name: 'id' },
                { data: 'nopjkb', name: 'nopjkb' },
                { data: 'anggota', name: 'anggota' },
                { data: 'buku', name: 'buku' },
                { data: 'tglpjm', name: 'tglpjm' },
                { data: 'tglhrskbl', name: 'tglhrskbl' },
                { data: 'tglkbl', name: 'tglkbl' },
                { data: 'denda', name: 'denda' }
             ],
          });
           $('#Tambah').click(function(){
              $('#keModal').modal('show');
              $('#ke_form')[0].reset();
              $('#action').val('Tambah');
              $('.modal-title').text('Tambah Data');
              state = "insert";
            });
         
         $('.select').select2();
         $('#keModal').on('hidden.bs.modal', function(e){
          $(this).find('#ke_form')[0].reset();
          $('span.has-error').text('')
          $('.form-group.has-error').removeClass('has-error');
         });
         
           $('#ke_form').submit(function(e){
             $.ajaxSetup({
               header: {
                 'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
               }
             });
             e.preventDefault();
            //edit
            $.ajax({
               type: "POST",
               url: "{{url ('/kembali/edit')}}"+ '/' + $('#nopjkb').val(),
               // data: $('#ke_form').serialize(),
               data: new FormData(this),
               contentType: false,
               processData: false,
               dataType: 'json',
               success: function (data){
                 console.log(data);
                 $('#keModal').modal('hide');
                 $('#ke_table').DataTable().ajax.reload();
                 swal({
                                title: 'Success!',
                                text: data.message,
                                type: 'success',
                                timer: '1500'
                            })
               },
               error: function (data){
                $('input').on('keydown keypress keyup click change', function(){
                  $(this).parent().removeClass('has-error');
                  $(this).next('.help-block').hide()
                });
                var coba = new Array();
                console.log(data.responseJSON.errors);
                $.each(data.responseJSON.errors,function(name, value){
                  console.log(name);
                  coba.push(name);
                  $('input[name='+name+']').parent().addClass('has-error');
                  $('input[name='+name+']').next('.help-block').show().text(value);
                });
                $('input[name='+coba[0]+']').focus();
               }
             });
           

        });
            $(document).ready(function() {
                $('#nopjkb').on('change', function() {
                var katID = $('#nopjkb').val();
                console.log(katID);
          
                $.ajax({
                    url: '/myform/ajax/'+katID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('#id_agt').val(data.agt);
                        $('#id_buku').val(data.uku);
                        $('#tglpjm').val(data.pjm);
                        $('#tglhrskbl').val(data.hrs_kbl);
                    }
                });
                $['#id_agt','#id_buku'];
        });
    }); 
       });
    </script>
@endpush  