<div id="supModal" class="modal fade" role="dialog" data-backdrop="static">
   <div class="modal-dialog">
      <div class="modal-content">
         <form method="POST" id="sup_form" enctype="multipart/form-data">
            {{csrf_field()}} {{ method_field('POST') }}
            <div class="modal-header" style="background-color: lightblue;">
               <button type="button" class="close" data-dismiss="modal" >&times;</button>
               <h4 class="modal-title" >Add Data</h4>
            </div>
            <div class="modal-body">
               <span id="form_output"></span>

               
                    <div class="form-group">
                                <input type="hidden" id="id" name="id">
                                <label>No Pinjam</label>
                                <input type="text" name="nopjkb" id="nopjkb" class="form-control" placeholder="Masukkan No pinjam buku"/>
                                <span class="help-block has-error nopjkb_error"></span>
                        </div>

                        <div class="form-group {{ $errors->has('id_agt') ? 'has-error' : '' }}">

                     <label>Jenis Buku</label>
                     <select class="form-control select" name="id_agt" id="id_agt" style="width: 468px">
                        <option disabled selected>Pilih Jenis Buku</option>
                        @foreach($anggota as $data)
                        <option value="{{$data->id}}">{{$data->namaagt}}</option>
                        @endforeach
                     </select>
                     <span class="help-block has-error jenis_error">
                  </div>

                        <div class="form-group {{ $errors->has('id_buku') ? 'has-error' : '' }}">

                     <label>Jenis Buku</label>
                     <select class="form-control select" name="id_buku" id="id_buku" style="width: 468px">
                        <option disabled selected>Pilih Jenis Buku</option>
                        @foreach($buku as $data)
                        <option value="{{$data->id}}">{{$data->judul}}</option>
                        @endforeach
                     </select>
                     <span class="help-block has-error jenis_error">
                  </div>

                     <div class="form-group">
                            <label>Tanggal pinjam</label>
                            <input type="date" name="tglpjm" id="tglpjm" class="form-control" value="{{ carbon\carbon::today()->toDateString() }}" readonly>
                            <span class="help-block has-error tglpjm_error"></span>
                        </div>

                        <div class="form-group">
                            <label>Tanggal harus kembali</label>
                            <input type="date" name="tglhrskbl" id="tglhrskbl" class="form-control" value="{{ carbon\carbon::now()->addDays(2)->toDateString() }}" readonly/>
                            <span class="help-block has-error tglhrskbl_error"></span>
                        </div>
                        
                   <div class="form-group">
                     <label>Tanggal Kembali</label>
                     <input type="date" name="tglkbl" id="tglkbl" class="form-control">
                     <span class="help-block has-error kota_error"></span>
                  </div>

            <div class="modal-footer">
               <input type="hidden" name="student_id" id="student_id" value=""/>
               <input type="hidden" name="button_action" id="button_action" value="insert"/>
               <input type="submit" name="submit" id="aksi" value="Tambah" class="btn btn-info" />
               <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" />
            </div>
         </form>
      </div>
   </div>
</div>