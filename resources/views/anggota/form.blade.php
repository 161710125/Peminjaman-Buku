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
               <input type="hidden" name="id" id="id">

               <div class="form-group">
                  <label>Nomor Anggota :</label>
                  <input type="number" name="noagt" id="noagt" class="form-control" placeholder="121" />
                  <span class="help-block has-error noagt_error"></span>
               </div>

               <div class="form-group">
                  <label>Nama Anggota :</label>
                  <input type="text" name="namaagt" id="namaagt" class="form-control" placeholder="John Bred" />
                  <span class="help-block has-error namaagt_error"></span>
               </div>

               <div class="form-group">
                  <label>Alamat :</label>
                  <textarea name="alamat" id="alamat" class="form-control" placeholder="Kp Lebak Bulus no 121"></textarea>
                  <span class="help-block has-error alamat_error"></span>
               </div>

               <div class="form-group">
                  <label>Kota :</label>
                  <input type="text" name="kota" id="kota" class="form-control" placeholder="Jakarta" />
                  <span class="help-block has-error kota_error"></span>
               </div>

               <div class="form-group">
                  <label>Nomor Handphone :</label>
                  <input type="text" name="telp" id="telp" class="form-control" placeholder="089xxxxxxxxxxx" />
                  <span class="help-block has-error telp_error"></span>
               </div>

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