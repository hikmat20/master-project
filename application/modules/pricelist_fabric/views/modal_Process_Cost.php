<?php

if (!empty($this->uri->segment(3))) {

  $getC  = $this->db->query("SELECT a.*,b.name_class from master_product_fabric a inner join master_product_class b on a.id_class = b.id_class where a.id_product = '$id'")->row();
  $cost  = $this->db->query("SELECT * from pricelist_fabric where id_product = '$id' and activation ='aktif'")->row();
  // print_r($getC->id_product);
}
if ($this->uri->segment(4) == 'view') {
  $view = 'style="display:block"';
} else {
  $mode = 'input';
}

?>
<form class="" id="form-data" action="" method="post" enctype="multipart/form-data">
  <div class="box box-success">
    <div class="box-body" style="">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
          <table id="my-grid3" class="table table-striped table-bordered table-hover table-condensed" width="100%">
            <tbody>
              <tr style='background-color: #175477 !important; color: white; font-size: 15px !important;'>
                <th class="text-center" colspan='3'>DETAIL APPROVAL FABRIC COST</th>
              </tr>

              <tr id="my-grid-tr-name_item">
                <td class="text-left vMid">Item Name <span class='text-red'>*</span></b></td>
                <td class="text-left">
                  <label class="label_view">
                    <?= ($getC) ? $getC->name_product : '-' ?>
                  </label>
                  <label class="label_input">
                    <input type="hidden" name="type" value="<?= empty($getC->id_product) ? 'add' : 'edit' ?>">
                    <input type="hidden" name="id_product" id="id_product" value="<?= $getC->id_product ?>">
                    <select class="form-control required w50 select2" name="id_product" id="nm_item"></select>
                    <!-- <span class="btn btn-default btn-sm view_produk" title="View Data Produk"><i class="fa fa-search"></i></span> -->
                    <div id="cek_data"></div>
                    <!--<a id="generate_id" class="btn btn-sm btn-primary" style="display:inline-block">Generate ID</a>-->
                    <label class="label label-danger nm_item hideIt">Item Name Can't be empty!</label>
                  </label>
                </td>
              </tr>

              <tr id="my-grid-tr-price">
                <td class="text-left vMid">Buying Price <span class='text-red'>*</span></b></td>
                <td class="text-left">
                  <label class="label_view">
                    <?= ($getC) ? number_format($getC->pricelist) : '-' ?>
                  </label>
                  <label class="label_input">
                    <div class="w40">
                      <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">Rp.</span>
                        <input class="form-control text-right" name="price" id="price" readonly value="<?= ($getC) ? number_format($getC->buy_price) : '' ?>">
                        <span class="input-group-addon" id="basic-addon2">.00</span>
                      </div>
                    </div>
                    <label class="label label-danger material hideIt">Material Can't be empty!</label>
                  </label>
                </td>
              </tr>

              <tr id="my-grid-tr-class">
                <td class="text-left vMid">Class <span class='text-red'>*</span></b></td>
                <td class="text-left">
                  <label class="label_view">
                    <?= ($getC) ? $getC->name_class : '-' ?>
                  </label>
                  <label class="label_input">
                    <!-- <select class="form-control required w50 select2" name="id_class" id="id_class">
                      <option value=""></option>
                      <?php
                      $classes = $this->db->get_where('master_product_class', ['activation' => 'active'])->result();
                      foreach ($classes as $class) {
                      ?>
                        <option <?= $class->id_class == $getC->id_class ? 'selected' : '' ?> value="<?= $class->id_class ?>"><?= $class->name_class ?></option>
                      <?php
                      }
                      ?>
                    </select> -->
                    <input type="text" class="w40 form-control" name="class" id="class" readonly value="<?= ($getC) ? $getC->name_class : '' ?>">
                    <input type="hidden" class="w40 form-control" name="id_class" id="id_class" readonly value="<?= ($getC) ? $getC->id_class : '' ?>">
                    <!-- <span class="input-group-addon" id="basic-addon2">%</span> -->

                    <label class="label label-danger fabric-cost hideIt">Class Product Can't be empty!</label>
                  </label>
                </td>
              </tr>

              <tr id="my-grid-tr-price-list">
                <td class="text-left vMid">Selling Price<span class='text-red'>*</span></b></td>
                <td class="text-left">
                  <label class="label_view">
                    Rp. <?= ($cost) ? number_format($cost->pricelist) : '-' ?>
                  </label>
                  <label class="label_input">
                    <div class="w40">
                      <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">Rp.</span>
                        <input class="form-control text-right nominal numberOnly" name="price-list" id="price-list" value="<?= ($cost) ? number_format($cost->pricelist) : '' ?>">
                        <span class="input-group-addon" id="basic-addon2">.00</span>
                      </div>
                    </div>
                    <label class="label label-danger price-list hideIt">Pricelist Can't be empty!</label>

                  </label>
                </td>
              </tr>

              <label class="label_view">
                <tr id="my-grid-tr-status ">
                  <td class="text-left vMid label_view" width="30%">Status</b></td>
                  <td class="text-left">
                    <label class="label_view">
                      <?= ($getC && $getC->status == '1') ? '<span class="badge bg-green">Approved</span>' : '<span class="badge bg-orange">Witing Approval</span>' ?>
                    </label>

                  </td>
                </tr>
              </label>

            </tbody>
          </table>
        </div>
      </div>
      <label class="label_input">
        <?php
        echo form_button(array('type' => 'button', 'class' => 'btn btn-md btn-success label_input', 'style' => 'min-width:100px; float:right;', 'value' => 'save', 'content' => 'Save', 'id' => 'addSave')) . ' ';
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

  .hideIt {
    display: none;
  }

  .showIt {
    display: block;
  }
</style>

<script type="text/javascript">
  $(document).on('keyup paste change input', '#profit', function() {
    let profit = $(this).val();
    let id = $(this).val();

    if ($('#rate-price').val() == '') {
      alert('Mohon pilih Produk terlebih dahulu!');
      $(this).val('');
    } else {
      pricelist(profit);
    }
  })

  $(document).on('change paste', '#nm_item', function(e) {
    e.preventDefault();
    var id = $(this).val();

    $.ajax({
      url: siteurl + active_controller + "cekData",
      type: 'POST',
      data: {
        'id': id
      },
      dataType: 'JSON',
      success: function(result) {
        if (result.data > 0) {
          $('#cek_data').html('<span class="text-red"><i class="fa fa-close"></i> Data already exist.<span>');
          $('#price').val('');
          $('#rate-price').val('');
          $('#bottom-price').val('');
          $('#price-list').val('');
          $('#profit').val('');
          $('#addSave').prop('disabled', true);

        } else {
          rate_cost(id);
          $('#cek_data').html('<span class="text-green"><i class="fa fa-check"></i> Data not available.<span>');
          $('#price-list').val('');
          $('#bottom-price').val('');
          $('#profit').val('');
          $('#addSave').prop('disabled', false);
        }

      }
    });

  })

  function rate_cost(id) {
    $.ajax({
      url: siteurl + active_controller + "getPrice",
      type: 'POST',
      data: {
        'id': id
      },
      dataType: 'JSON',
      success: function(result) {
        // console.log(result)
        if (result.data != null) {
          var price = result.data.pricelist;
          var cls = result.data.id_class;
          $('#price').val(('' + price).replace(/\B(?=(?:\d{3})+(?!\d))/g, ','));
          // getClass(cls);
          // console.log(result.dtClass);

          if (result.dtClass != null) {
            value_sale = result.dtClass.value_sale;
            $('#id_class').val(result.dtClass.id_class);
            $('#class').val(result.dtClass.name_class);

          } else {
            value_sale = '0';

          }
          selingPrice = parseFloat(value_sale) * parseInt(price);
          $('#price-list').val(('' + selingPrice).replace(/\B(?=(?:\d{3})+(?!\d))/g, ','));

        } else {
          $('#price').val('0');
          $('#class').val('');
        }

      }
    });
  }

  function pricelist(profit) {

    let rate = $('#rate-price').val().replace(/,/g, '');
    let btPrice = parseInt(rate * profit / 100) + parseInt(rate);
    let pricelist = parseInt(btPrice * 2);

    if (profit == '' || profit == '0') {
      $('#bottom-price').val('');
      $('#price-list').val('');
    } else {
      $('#bottom-price').val(('' + btPrice).replace(/\B(?=(?:\d{3})+(?!\d))/g, ","));
      $('#price-list').val(('' + pricelist).replace(/\B(?=(?:\d{3})+(?!\d))/g, ","));
    }
  }



  $(document).ready(function() {
    getFabric()

    $(".datepicker").datepicker({
      format: "yyyy-mm-dd",
      showInputs: true,
      autoclose: true
    });
    $(".select2").select2({
      placeholder: "Choose An Option",
      allowClear: true,
      width: '40%',
      dropdownParent: $("#form-data")
    });
    $('.select2-search--inline').css('margin-right', '5%');
    $('.select2-search--inline').css('width', '100%');
    $('.select2-search__field').css('margin-right', '5%');
    $('.select2-search__field').css('width', '90% !important');
    $('.select2-search__field').css('padding-right', '5%');

    $(document).on('click change keyup paste blur', '#form-data .form-control', function(e) {
      //console.log('AHAHAHAHA');
      var val = $(this).val();
      var id = $(this).attr('id');
      if (val == '') {
        //$('.'+id).addClass('hideIt');
        $('.' + id).css('display', 'inline-block');
      } else {
        $('.' + id).css('display', 'none');
      }
    });

    if ('<?= ($getC->id_product) ?>' != '') {
      $('#nm_item').prop("disabled", true);
    } else {
      $('#nm_item').prop("disabled", false);
    }
    if ('<?= $this->uri->segment(4) ?>' == 'view') {
      $('.label_view').css("display", "block");
      $('.label_input').css("display", "none");
    } else {
      $('.label_view').css("display", "none");
      $('.label_input').css("display", "block");
    }
    console.log('<?= $this->uri->segment(4) ?>');
  });

  function getClass(cls = '') {
    if (cls != '') {
      var id_selected = cls;
    } else {
      var id_selected = '';
    }
    //console.log(id_selected);
    var column = 'activation';
    var column_fill = 'active';
    var column_name = 'name_class';
    var table_name = 'master_product_class';
    var key = 'id_class';
    var act = 'free';
    $.ajax({
      url: siteurl + active_controller + "getOpt",
      dataType: "json",
      type: 'POST',
      data: {
        id_selected: id_selected,
        column: column,
        column_fill: column_fill,
        column_name: column_name,
        table_name: table_name,
        key: key,
        act: act
      },
      success: function(result) {
        $('#id_class').html(result.html);
      },
      error: function(request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });

  }

  function getFabric() {
    if ('<?= ($getC->id_product) ?>' != null) {
      var id_selected = '<?= $getC->id_product ?>';
    } else if ($('#nm_item').val() != null || $('#nm_item').val() != '') {
      var id_selected = $('#nm_item').val();
    } else {
      var id_selected = '';
    }
    //console.log(id_selected);
    var column = 'activation';
    var column_fill = 'aktif';
    var column_name = 'name_product';
    var table_name = 'master_product_fabric';
    var key = 'id_product';
    var act = 'free';
    $.ajax({
      url: siteurl + active_controller + "getOpt",
      dataType: "json",
      type: 'POST',
      data: {
        id_selected: id_selected,
        column: column,
        column_fill: column_fill,
        column_name: column_name,
        table_name: table_name,
        key: key,
        act: act
      },
      success: function(result) {
        $('#nm_item').html(result.html);
      },
      error: function(request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });

  }

  function getValidation() {
    var count = 0;
    var success = true;
    $(".required").each(function() {
      var node = $(this).prop('nodeName');
      var type = $(this).attr('type');
      //console.log(type);
      var success = true;
      if (node == 'INPUT' && type == 'radio') {
        //$("input[name='"+$(this).attr('id')+"']:checked").val();
        var c = 0;
        //console.log($(this).attr('name'));
        //console.log($("."+$(this).attr('name')).parents('td').html());
        $("input[name='" + $(this).attr('name') + "']").each(function() {
          if ($(this).prop('checked') == true) {
            c++;
          }
        });
        if (c == 0) {
          //console.log('berhasil');

          var name = $(this).attr('name');
          $('.' + name).removeClass('hideIt');
          $('.' + name).css('display', 'inline-block');
          $('html, body, .modal').animate({
            scrollTop: $("#form-data").offset().top
          }, 2000);
          count = count + 1;
        }

      } else if ((node == 'INPUT' && type == 'text') || (node == 'SELECT')) {
        if ($(this).val() == null || $(this).val() == '') {
          var name = $(this).attr('id');

          name.replace('[]', '');
          $('.' + name).removeClass('hideIt');
          $('.' + name).css('display', 'inline-block');
          $('html, body, .modal').animate({
            scrollTop: $("#form-data").offset().top
          }, 2000);
          //console.log(name);
          count = count + 1;
        }
      }

    });
    console.log(count);
    if (count == 0) {
      //console.log(success);
      return success;
    } else {
      return false;
    }
  }
</script>