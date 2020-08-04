<?php

if (!empty($this->uri->segment(3))) {
  $getC    = $this->db->get_where('master_product_collection', array('id_collection' => $id))->row();
}
$getI   = $this->db->query("SELECT MAX(id_collection) AS max_id FROM master_product_collection WHERE id_collection LIKE '%CL%' ORDER BY id_collection DESC LIMIT 1")->row();
//echo "$first_letter";
//exit;
$num = substr($getI->max_id, -5) + 1;
$id_collection = 'CL' . str_pad($num, 5, "0", STR_PAD_LEFT);


?>
<form class="" id="form-collection" action="" method="post" enctype="multipart/form-data">
  <div class="box box-success">
    <div class="box-body" style="">
      <div class="row">
        <div class="col-sm-12">

          <section id="DETAIL_COLLECTION_IDENTITY">
            <table id="my-grid" class="table table-striped table-bordered table-hover table-condensed" width="100%">
              <tbody>
                <tr style='background-color: #175477 !important; color: white; font-size: 15px !important;'>
                  <th class="text-center" colspan='2'>DETAIL COLLECTION</th>
                </tr>
                <tr id="my-grid-tr-id_collection">
                  <td width="20%" class="text-left vMid">Code <span class='text-red'>*</span></b></td>
                  <td class="text-left">
                    <label class="label_view">
                      <?= $getC->id_collection ?>
                    </label>
                    <label class="label_input">
                      <input type="hidden" name="type" value="<?= empty($getC->id_collection) ? 'add' : 'edit' ?>">
                      <input type="text" class="form-control input input-sm required w50" name="id_collection" id="id_collection" value="<?= empty($getC->id_collection) ? $id_collection : $getC->id_collection ?>" readonly>
                      <label class="label label-danger id_collection hideIt">Code Can't be empty!</label>
                    </label>
                  </td>
                </tr>

                <tr id="my-grid-tr-name_collection">
                  <td class="text-left vMid">Collection Name <span class='text-red'>*</span></b></td>
                  <td class="text-left">
                    <label class="label_view">
                      <?= $getC->name_collection ?>
                    </label>
                    <label class="label_input">
                      <?php
                      echo form_input(array('type' => 'text', 'id' => 'name_collection', 'name' => 'name_collection', 'class' => 'form-control input-sm required w60', 'placeholder' => 'Collection Name', 'autocomplete' => 'off', 'value' => empty($getC->name_collection) ? '' : $getC->name_collection))
                      ?>
                      <!--<a id="generate_id" class="btn btn-sm btn-primary" style="display:inline-block">Generate ID</a>-->
                      <label class="label label-danger name_collection hideIt">Collection Name Can't be empty!</label>
                    </label>
                  </td>
                </tr>

                <!-- <tr id="my-grid-tr-picture">
                  <td class="text-left vMid">Photo Collection <span class='text-red'>*</span></b></td>
                  <td class="text-left">
                    <label class="label_view">
                      <img src="<?= base_url() ?>/assets/img/collections/<?= $getC->photo_collection ?>" alt="<?= $getC->photo_collection ?>" width="400px">
                      <?= $getC->photo_collection ?>
                    </label>
                    <label class="label_input">
                      <input type="file" class="form-control w60" name="photo_collection" id="photo_collection">
                      <input type="hidden" class="form-control w60" name="old_photo" id="show_photo_collection" value="<?= $getC->photo_collection ?>">
                      <?php
                      if (!empty($getC->photo_collection)) { ?>
                        <img src="<?= base_url() ?>/assets/img/collections/<?= $getC->photo_collection ?>" alt="<?= $getC->photo_collection ?>" width="400px">
                      <?php } ?>
                      <label class="label label-danger type_collection hideIt">Photo Collection Can't be empty!</label>
                    </label>
                  </td>
                </tr> -->
              </tbody>
            </table>
            <div for="" class="label_view">
              <h4>Photo Collection</h4>
              <?php
              $photo = $this->db->get_where('photo_collection', ['id_collection' => $getC->id_collection])->result();
              foreach ($photo as $ph) { ?>

                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                  <?php
                  if (!empty($ph->photo_file)) { ?>
                    <a href="<?= base_url() . 'assets/img/collections/' . $ph->photo_file ?>" target="_blank" class="">
                      <img src="<?= base_url() . 'assets/img/collections/' . $ph->photo_file ?>" class="img-rounded center-block" style="margin:5px 0px" height="200px" width="200px">
                    </a>
                  <?php
                  }
                  ?>
                </div>
              <?php } ?>
            </div>
            <div class="label_input">
              <span for="">Photo Collection <span class='text-red'>*</span></span>
              <button type="button" id="add_photo" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Photo</button>
              <hr>
              <div class="upload_img">
                <table class="table-condensed table-bordered" id="data-photo" width="100%">
                  <thead class="bg-purple">
                    <tr>
                      <th width="8%">No.</th>
                      <th width="15%">Upload</th>
                      <th width="20%">Photo</th>
                      <th>Name</th>
                      <th>#</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $photo = $this->db->get_where('photo_collection', ['id_collection' => $getC->id_collection])->result();
                    $no = 0;
                    foreach ($photo as $ph) {
                      $no++ ?>
                      <tr class="list-photo">
                        <td><span class="numbering"><?= $no ?></span></td>
                        <td>
                          <button type="button" class="btn btn-sm btn-primary" onclick="$('#photo_<?= $no ?>').click()"><i class="fa fa-upload"></i> Upload</button>
                          <input type="file" name="photo_collection[]" id="photo_<?= $no ?>" data-id="<?= $no ?>" class="hidden form-control" onchange="tampilkanPreview(this,'preview_<?= $no ?>')">
                        </td>
                        <td>
                          <img id="preview_<?= $no ?>" src="<?= base_url() . 'assets/img/collections/' . $ph->photo_file ?>" class="text-left" style="height: 50px;margin: 0px auto;width: auto;">
                          <input type="hidden" name="photo_old[]" value="<?= $ph->photo_file ?>" class="form-control">
                        </td>
                        <td><input type="text" name="name_photo[]" class="form-control" placeholder="Name Photo" value="<?= $ph->name_photo ?>"> </td>
                        <td><button class="hapus_photo btn btn-sm btn-danger">x</button></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>

        </div>
        </section>

      </div>
    </div>
    <label class="label_input">
      <?php
      echo form_button(array('type' => 'button', 'class' => 'btn btn-md btn-success', 'style' => 'min-width:100px; float:right;', 'value' => 'save', 'content' => 'Save', 'id' => 'addCollectionSave')) . ' ';
      ?>
    </label>

  </div>
  </div>
</form>

<style>
  .inSp {
    text-align: center;
    display: inline-block;
    width: 100px;
  }

  .inSp2 {
    text-align: center;
    display: inline-block;
    width: 45%;
  }

  .inSpL {
    text-align: left;
  }

  .vMid {
    vertical-align: middle !important;
  }

  .w10 {
    display: inline-block;
    width: 10%;
  }

  .w15 {
    display: inline-block;
    width: 15%;
  }

  .w20 {
    display: inline-block;
    width: 20%;
  }

  .w30 {
    display: inline-block;
    width: 30%;
  }

  .w40 {
    display: inline-block;
    width: 40%;
  }

  .w50 {
    display: inline-block;
    width: 50%;
  }

  .w60 {
    display: inline-block;
    width: 60%;
  }

  .w70 {
    display: inline-block;
    width: 70%;
  }

  .w80 {
    display: inline-block;
    width: 80%;
  }

  .w90 {
    display: inline-block;
    width: 90%;
  }

  .w100 {
    display: inline-block;
    width: 100%;
  }

  .inline-block {
    display: inline-block;
  }

  .checkbox-label:hover {
    cursor: pointer;
  }

  .hideIt {
    display: none;
  }

  .showIt {
    display: block;
  }
</style>

<script type="text/javascript">
  function tampilkanPreview(gambar, idpreview) {
    var gb = gambar.files;
    var imageType = /image.*/;
    var imageSize = 2048;
    var preview = document.getElementById(idpreview);
    var reader = new FileReader();
    if (gb.length == 0) {
      $(preview).attr('src', '');
    } else {
      for (var i = 0; i < gb.length; i++) {
        var gbPreview = gb[i];
        fielSize = Math.ceil(gbPreview.size / 1024);
        console.log(fielSize);
        if (gbPreview.type.match(imageType)) {
          if (fielSize < imageSize) {
            preview.file = gbPreview;
            reader.onload = (function(element) {
              return function(e) {
                element.src = e.target.result;
              };
            })(preview);
            reader.readAsDataURL(gbPreview);
          } else {
            reader.onload = (function(element) {
              return function(e) {
                element.src = "";
              };
            })(preview);
            reader.readAsDataURL(gbPreview);
            swal({
              title: "Gagal!",
              text: "Ukuran gambar terlalu besar.",
              type: "error",
              timer: 2500,
              showConfirmButton: false
            });
            return false;
          }
        } else {
          reader.onload = (function(element) {
            return function(e) {
              element.src = "";
            };
          })(preview);
          reader.readAsDataURL(gbPreview);
          swal({
            title: "Gagal!",
            text: "Format gamabar tidak sesuai.",
            type: "error",
            timer: 2500,
            showConfirmButton: false
          });
          return false;
        }

      }
    }
  }
  //console.log($(".branch").length);
  if ('<?= $this->uri->segment(4) ?>' == 'view') {
    $('.label_view').css("display", "block");
    $('.label_input').css("display", "none");
  } else {
    $('.label_view').css("display", "none");
    $('.label_input').css("display", "block");
  }
  // alert('0')

  $(document).on('click', '.hapus_photo', function() {
    $(this).parents('tr').remove();
    if (parseInt($(".list-photo").length) == 0) {
      var x = 1;
    } else {
      var x = parseInt($(".list-photo").length) + 1;
    }
    for (var i = 0; i < x; i++) {
      $('.numbering').eq(i - 1).text(i);
    }

  })
</script>