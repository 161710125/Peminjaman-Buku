<div id="keModal" class="modal fade" role="dialog" data-backdrop="static">
   <div class="modal-dialog">
      <div class="modal-content">
         <form method="POST" id="ke_form" enctype="multipart/form-data">
            {{csrf_field()}} {{ method_field('POST') }}
            <div class="modal-header" style="background-color: lightblue;">
               <button type="button" class="close" data-dismiss="modal" >&times;</button>
               <h4 class="modal-title" >Add Data</h4>
            </div>
            <div class="modal-body">
               <span id="form_output"></span>

               
                    <div class="form-group">
                              <label>No Pinjam Kembali</label>
                              <select name="nopjkb" id="nopjkb" class="single form-control" style="width: 460px">
                                <option disabled selected>Pilih No Pinjam</option>
                                @foreach($pinjam as $data)
                                <option value="{{ $data->id}}">{{ $data->nopjkb }}</option>
                                @endforeach
                              </select>
                        <span class="help-block has-error nopjkb_error"></span>
                      </div>
                      <div class="form-group">
                        <label>Nama Anggota</label>
                        <input type="text" name="id_agt" id="id_agt" class="form-control" placeholder=""/>
                        <span class="help-block has-error id_agt_error"></span>
                      </div>
                      <div class="form-group">
                        <label>Judul Buku</label>
                        <input type="text" name="judul" id="id_buku" class="form-control" placeholder=""/>
                        <span class="help-block has-error judul_error"></span>
                      </div>
                     <div class="form-group">
                            <label>Tanggal pinjam</label>
                            <input type="date" name="tglpjm" id="tglpjm" class="form-control"readonly>
                            <span class="help-block has-error tglpjm_error"></span>
                        </div>
                        <div class="form-group">
                            <label>Tanggal harus kembali</label>
                            <input type="date" name="tglhrskbl" id="tglhrskbl" class="form-control" readonly/>
                            <span class="help-block has-error tglhrskbl_error"></span>
                        </div>
                   <div class="form-group">
                     <label>Tanggal Kembali</label>
                     <input type="date" name="tglkbl" id="tglkbl" class="form-control">
                     <span class="help-block has-error tglkbl_error"></span>
                  </div>

            <div class="modal-footer">
               <input type="hidden" name="ke_id" id="ke_id" value=""/>
               <input type="hidden" name="button_action" id="button_action" value="insert"/>
               <input type="submit" name="submit" id="aksi" value="Tambah" class="btn btn-info" />
               <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
         </form>
      </div>
   </div>
</div>