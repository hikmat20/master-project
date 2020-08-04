<form action="" method="POST" class="form-horizontal" role="form">
  <div class="box box-solid">
    <div class="box-header with-border">
      <h4 class="box-title">Create Master Seles Order Proses</h4>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="input" class="col-sm-3 ">Select ID Quotation</label>
            <div class="col-sm-9">
              <select id="id_qtt" class="form-control select2">
                <option value=""></option>
                <?php
                foreach ($data as $dataQtt) { ?>
                  <option value="<?= $dataQtt->id_quotation ?>"><?= $dataQtt->id_quotation ?></option>
                <?php } ?>
              </select>
              <button style="margin-top: 10px;" type="button" class="btn btn-md btn-primary create_mso">Create MSO</button>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <div class="data_mso"></div>
    </div>
</form>


<script type="text/javascript">
  $(".select2").select2({
    placeholder: "Choose An Option",
    allowClear: true,
    width: '100%'
  });

  $(document).on('click', '.create_mso', function() {
    let id = $('#id_qtt').val();
    let type = 'add';
    if (id == '') {
      swal({
        title: "Sorry!",
        text: "Please choose an ID Quotation number'",
        type: "warning",
      })
    } else {
      $.ajax({
        type: 'POST',
        url: siteurl + active_controller + 'dataMso',
        data: {
          'id': id,
          'type': type
        },
        success: function(result) {
          $(".data_mso").html(result);
        }
      })
    }
  })
</script>