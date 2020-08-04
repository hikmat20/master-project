<form class="" id="form-quotation" action="" method="post" enctype="multipart/form-data">
  <div class=" box-solid">
    <div class="box-header">
      <table id="my-grid3" class="table-condensed" width="100%">
        <thead>
          <tr>
            <th class="text">CUSTOMER DATA INFORMATION</th>
          </tr>
        </thead>
      </table>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-6">
          <table width="100%" class="-condensed">
            <tbody>
              <tr>
                <td width="30%">
                  <label>Quotation Number</label>
                </td>
                <td>: <?= $data->id_quotation ?></td>
                <input type="hidden" name="id_quotation" value="<?= $data->id_quotation ?>">
              </tr>
              <tr>
                <td>
                  <label>Customer</label>
                </td>
                <td>: <?= $customer->name_customer ?></td>
              </tr>
              <tr>
                <td>
                  <label>PIC</label>
                </td>
                <td>: <?= $pic_cust->name_pic ?></td>
              </tr>
              <tr>
                <td>
                  <label>Address</label>
                </td>
                <td>: <?= $customer->address_office ?></td>
              </tr>
              <tr>
                <td>
                  <label>Category Customer</label>
                </td>
                <td>: <?= $cat_cust->name_category_customer ?></td>
              </tr>
              <tr>
                <td>
                  <label>Discount Category</label>
                </td>
                <td>: <?= $disc_cat->name_cat ?> (<?= $data->val_disc_cat != '' ? $data->val_disc_cat . '%' : '' ?>)</td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="col-md-6">
          <table width="100%" class="-condensed">
            <tbody>
              <tr>
                <td width="30%">
                  <label>Date</label>
                </td>
                <td>: <?= $data->date ?></td>
              </tr>
              <tr>
                <td>
                  <label>Category Sales</label>
                </td>
                <td>: <?= $data->sales_category ?></td>
              </tr>
              <tr>
                <td>
                  <label>Type Project</label>
                </td>
                <td>: <?= $type_pro->nm_type_project ?></td>
              </tr>
              <tr>
                <td>
                  <label>Marketing</label>
                </td>
                <td>: <?= $karyawan->nama_karyawan ?></td>
              </tr>
              <tr>
                <td>
                  <label>Nett Price / PPN</label>
                </td>
                <td>: <?= $data->net == '0' ? 'No' : 'Yes' ?> / <?= $data->ppn == '0' ? 'No' : 'Yes' ?></td>
              </tr>
              <tr>
                <td>
                  <label>Project Name</label>
                </td>
                <td>: <?= $data->project_name ?></td>
              </tr>
            </tbody>
          </table>

        </div>
      </div>
      <hr>
      <table id="my-grid3" class="table-condensed" width="100%">
        <thead>
          <tr>
            <th class="text">QUOTATION LOST INFORMATION</th>
          </tr>
        </thead>
      </table>
      <div class="row">
        <div class="col-md-6">
          <div class="fom-horizontal">

            <div class="form-group">
              <label class="control-label col-sm-3" style="margin: 5px 0px;" for="">Reason for losing </label>
              <div class="col-sm-9">
                <textarea type="text" id="reason" style="margin: 5px 0px;" class="required form-control" name="reason" placeholder="Type the reason here.."></textarea>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="box-footer">
      <button type="button" class="btn btn-md btn-primary pull-right" id="saveLostQtt"><i class="fa fa-save"></i> Save</button>
    </div>
</form>

<script type="text/javascript">
  $(document).on('click change keyup paste blur', '.required', function(e) {
    //console.log('AHAHAHAHA');
    var val = $(this).val();
    var id = $(this).attr('id');
    if (val == '') {
      //$('.'+id).addClass('hideIt');
      $('#' + id).css('border-color', 'red');
    } else {
      $('#' + id).css('border-color', '');
      // $('.' + id).css('display', 'none');
    }
  });

  // $(function() {
  //   $('[data-toggle="tooltip"]').tooltip()
  // })
  jQuery(document).on('click', '#saveLostQtt', function() {
    var valid = getValidation();
    // alert(valid)
    // exit();
    if (valid) {
      // var formdata = $("#form-quotation").serialize();
      var formdata = new FormData($("#form-quotation")[0]);
      console.log(formdata);
      // exit();
      $.ajax({
        url: siteurl + active_controller + "saveLostQtt",
        dataType: "json",
        type: 'POST',
        data: formdata,
        contentType: false,
        cache: false,
        processData: false,
        async: false,
        success: function(result) {
          if (result.status == '1') {
            swal({
              title: "Sukses!",
              text: result['pesan'],
              type: "success",
              timer: 1500,
              showConfirmButton: false
            });
            setTimeout(function() {
              open(siteurl + active_controller + 'qt_pro_open', '_self');
            }, 1600);
          } else {
            swal({
              title: "Gagal!",
              text: result['pesan'],
              type: "error",
              timer: 1500,
              showConfirmButton: false
            });
          };
        },
        error: function(request, error) {
          console.log(arguments);
          alert(" Can't do because: " + error);
        }
      });
    } else {
      swal({
        title: "Gagal!",
        text: 'Please fill in the blank form!',
        type: "error",
        timer: 1500,
        showConfirmButton: false
      });
    }
  });
</script>