<?php
$ENABLE_ADD     = has_permission('Master_rail.Add');
$ENABLE_MANAGE  = has_permission('Master_rail.Manage');
$ENABLE_VIEW    = has_permission('Master_rail.View');
$ENABLE_DELETE  = has_permission('Master_rail.Delete');
$name_uom             = $this->db->get_where('master_uom', array('activation' => 'active'))->result();
?>

<link rel="stylesheet" href="<?= base_url('assets/plugins/datatables/dataTables.bootstrap.css') ?>">

<div class="nav-tabs-custom">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#Rail" data-toggle="tab" aria-expanded="true">Rail</a></li>
    <!--<li class=""><a href="#Pattern_name" data-toggle="tab" aria-expanded="false" >Master Pattern Name</a></li>
        <li class=""><a href="#Colour" data-toggle="tab" aria-expanded="false" >Master Colour</a></li>
        <li class=""><a href="#Characteristic" data-toggle="tab" aria-expanded="false" >Master Characteristic</a></li>
        <li class=""><a href="#Pattern_type" data-toggle="tab" aria-expanded="false" >Master Pattern Type</a></li>
        <li class=""><a href="#Supplier_type" data-toggle="tab" aria-expanded="false" >Master Supplier Type</a></li>
        <li class=""><a href="#Product_category" data-toggle="tab" aria-expanded="false" >Master Product Category</a></li>-->
  </ul>

  <div class="tab-content">
    <div class="tab-pane active" id="Rail">
      <div class="box box-primary">
        <div class="box-header">
          <div style="display:inline-block;width:100%;">
            <a class="btn btn-sm btn-success" href="javascript:void(0)" title="Add" onclick="add_data()" style="float:left;margin-right:8px"><i class="fa fa-plus">&nbsp;</i>New</a>
            <a class="btn btn-sm btn-danger pdf" id="pdf-report" style="float:right;margin:8px 8px 0 0"><i class="fa fa-file"></i> PDF</a>
            <a class="btn btn-sm btn-success excel" id="excel-report" style="float:right;margin:8px 8px 0 0"><i class="fa fa-table"></i> Excel</a>
          </div>

        </div>
        <div class="box-body">

          <table id="tableset" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th width="5">#</th>
                <th>Item Code</th>
                <th>Product Name</th>
                <th>Rail Type</th>
                <th>Supplier</th>
                <th>Status</th>
                <?php if ($ENABLE_MANAGE) : ?>
                  <th width="75">Action</th>
                <?php endif; ?>
              </tr>
            </thead>

            <tbody id="tbody-detail">

            </tbody>

            <tfoot>
              <tr>
                <th width="5">#</th>
                <th>Item Code</th>
                <th>Product Name</th>
                <th>Pattern Type</th>
                <th>Supplier</th>
                <th>Status</th>
                <?php if ($ENABLE_MANAGE) : ?>
                  <th width="75">Action</th>
                <?php endif; ?>
              </tr>
            </tfoot>
          </table>


        </div>
      </div>
    </div>

    <div class="tab-pane" id="Pattern_name">
      <div class="box box-primary">
        <div class="box-header">
          <div style="display:inline-block;width:100%;">
            <a class="btn btn-sm btn-success" href="javascript:void(0)" title="Add" onclick="add_data()" style="float:left;margin-right:8px"><i class="fa fa-plus">&nbsp;</i>New</a>
            <a class="btn btn-sm btn-danger pdf" id="pdf-report" style="float:right;margin:8px 8px 0 0"><i class="fa fa-file"></i> PDF</a>
            <a class="btn btn-sm btn-success excel" id="excel-report" style="float:right;margin:8px 8px 0 0"><i class="fa fa-table"></i> Excel</a>
          </div>

        </div>
        <div class="box-body">

          <table id="table_pattern_name" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th width="5">#</th>
                <th>Pattern ID</th>
                <th>Pattern Name</th>
                <th>Supplier Name</th>
                <?php if ($ENABLE_MANAGE) : ?>
                  <th width="75">Action</th>
                <?php endif; ?>
              </tr>
            </thead>

            <tbody id="tbody-table_pattern_name">

            </tbody>

            <tfoot>
              <tr>
                <th width="5">#</th>
                <th>Pattern ID</th>
                <th>Pattern Name</th>
                <th>Supplier Name</th>
                <?php if ($ENABLE_MANAGE) : ?>
                  <th width="75">Action</th>
                <?php endif; ?>
              </tr>
            </tfoot>
          </table>


        </div>
      </div>
    </div>

    <div class="tab-pane" id="Colour">
      <div class="box box-primary">
        <div class="box-header">
          <div style="display:inline-block;width:100%;">
            <a class="btn btn-sm btn-success" href="javascript:void(0)" title="Add" onclick="add_data_colour()" style="float:left;margin-right:8px"><i class="fa fa-plus">&nbsp;</i>New</a>
            <a class="btn btn-sm btn-danger pdf" id="pdf-report" style="float:right;margin:8px 8px 0 0"><i class="fa fa-file"></i> PDF</a>
            <a class="btn btn-sm btn-success excel" id="excel-report" style="float:right;margin:8px 8px 0 0"><i class="fa fa-table"></i> Excel</a>
          </div>

        </div>
        <div class="box-body">

          <table id="table_colour" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th width="5">#</th>
                <th>Colour ID</th>
                <th>Colour Name</th>
                <?php if ($ENABLE_MANAGE) : ?>
                  <th width="75">Action</th>
                <?php endif; ?>
              </tr>
            </thead>

            <tbody id="tbody-table_colour">

            </tbody>

            <tfoot>
              <tr>
                <th width="5">#</th>
                <th>Colour ID</th>
                <th>Colour Name</th>
                <?php if ($ENABLE_MANAGE) : ?>
                  <th width="75">Action</th>
                <?php endif; ?>
              </tr>
            </tfoot>
          </table>


        </div>
      </div>
    </div>

    <div class="tab-pane" id="Characteristic">
      <div class="box box-primary">
        <div class="box-header">
          <div style="display:inline-block;width:100%;">
            <a class="btn btn-sm btn-success" href="javascript:void(0)" title="Add" onclick="add_data_characteristic()" style="float:left;margin-right:8px"><i class="fa fa-plus">&nbsp;</i>New</a>
            <a class="btn btn-sm btn-danger pdf" id="pdf-report" style="float:right;margin:8px 8px 0 0"><i class="fa fa-file"></i> PDF</a>
            <a class="btn btn-sm btn-success excel" id="excel-report" style="float:right;margin:8px 8px 0 0"><i class="fa fa-table"></i> Excel</a>
          </div>

        </div>
        <div class="box-body">

          <table id="table_characteristic" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th width="5">#</th>
                <th>Characteristic ID</th>
                <th>Characteristic Name</th>
                <?php if ($ENABLE_MANAGE) : ?>
                  <th width="75">Action</th>
                <?php endif; ?>
              </tr>
            </thead>

            <tbody id="tbody-table_characteristic">

            </tbody>

            <tfoot>
              <tr>
                <th width="5">#</th>
                <th>Characteristic ID</th>
                <th>Characteristic Name</th>
                <?php if ($ENABLE_MANAGE) : ?>
                  <th width="75">Action</th>
                <?php endif; ?>
              </tr>
            </tfoot>
          </table>


        </div>
      </div>
    </div>

    <div class="tab-pane" id="Pattern_type">
      <div class="box box-primary">
        <div class="box-header">
          <div style="display:inline-block;width:100%;">
            <a class="btn btn-sm btn-success" href="javascript:void(0)" title="Add" onclick="add_data_patterntype()" style="float:left;margin-right:8px"><i class="fa fa-plus">&nbsp;</i>New</a>
            <a class="btn btn-sm btn-danger pdf" id="pdf-report" style="float:right;margin:8px 8px 0 0"><i class="fa fa-file"></i> PDF</a>
            <a class="btn btn-sm btn-success excel" id="excel-report" style="float:right;margin:8px 8px 0 0"><i class="fa fa-table"></i> Excel</a>
          </div>

        </div>
        <div class="box-body">

          <table id="table_Patterntype" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th width="5">#</th>
                <th>Pattern Type ID</th>
                <th>Pattern Type Name</th>
                <?php if ($ENABLE_MANAGE) : ?>
                  <th width="75">Action</th>
                <?php endif; ?>
              </tr>
            </thead>

            <tbody id="tbody-detail">

            </tbody>

            <tfoot>
              <tr>
                <th width="5">#</th>
                <th>Pattern Type ID</th>
                <th>Pattern Type Name</th>
                <?php if ($ENABLE_MANAGE) : ?>
                  <th width="75">Action</th>
                <?php endif; ?>
              </tr>
            </tfoot>
          </table>


        </div>
      </div>
    </div>

    <div class="tab-pane" id="Supplier_type">
      <div class="box box-primary">
        <div class="box-header">
          <div style="display:inline-block;width:100%;">
            <a class="btn btn-sm btn-success" href="javascript:void(0)" title="Add" onclick="add_SupplierType()" style="float:left;margin-right:8px"><i class="fa fa-plus">&nbsp;</i>New</a>
            <a class="btn btn-sm btn-danger pdf" id="pdf-report" style="float:right;margin:8px 8px 0 0"><i class="fa fa-file"></i> PDF</a>
            <a class="btn btn-sm btn-success excel" id="excel-report" style="float:right;margin:8px 8px 0 0"><i class="fa fa-table"></i> Excel</a>
          </div>

        </div>
        <div class="box-body">

          <table id="table_supplier_type" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th width="5">#</th>
                <th>Type ID</th>
                <th>Type Name</th>
                <th>Supplier Name</th>
                <?php if ($ENABLE_MANAGE) : ?>
                  <th width="75">Action</th>
                <?php endif; ?>
              </tr>
            </thead>

            <tbody id="tbody-table_pattern_name">

            </tbody>

            <tfoot>
              <tr>
                <th width="5">#</th>
                <th>Pattern ID</th>
                <th>Pattern Name</th>
                <th width="150">Supplier Name</th>
                <?php if ($ENABLE_MANAGE) : ?>
                  <th width="75">Action</th>
                <?php endif; ?>
              </tr>
            </tfoot>
          </table>


        </div>
      </div>
    </div>

    <div class="tab-pane" id="Product_category">
      <div class="box box-primary">
        <div class="box-header">
          <div style="display:inline-block;width:100%;">
            <a class="btn btn-sm btn-success" href="javascript:void(0)" title="Add" onclick="add_ProductCategory()" style="float:left;margin-right:8px"><i class="fa fa-plus">&nbsp;</i>New</a>
            <a class="btn btn-sm btn-danger pdf" id="pdf-report" style="float:right;margin:8px 8px 0 0"><i class="fa fa-file"></i> PDF</a>
            <a class="btn btn-sm btn-success excel" id="excel-report" style="float:right;margin:8px 8px 0 0"><i class="fa fa-table"></i> Excel</a>
          </div>

        </div>
        <div class="box-body">

          <table id="table_product_category" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th width="5">#</th>
                <th>Category ID</th>
                <th>Category Name</th>
                <th>Shipping Type</th>
                <?php if ($ENABLE_MANAGE) : ?>
                  <th width="75">Action</th>
                <?php endif; ?>
              </tr>
            </thead>

            <tbody id="tbody-table_product_category">

            </tbody>

            <tfoot>
              <tr>
                <th width="5">#</th>
                <th>Category ID</th>
                <th>Category Name</th>
                <th>Shipping Type</th>
                <?php if ($ENABLE_MANAGE) : ?>
                  <th width="75">Action</th>
                <?php endif; ?>
              </tr>
            </tfoot>
          </table>


        </div>
      </div>
    </div>
  </div>
</div>



<form id="form-modal" action="" method="post">
  <div class="modal fade" id="ModalView">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="head_title"></h4>
        </div>
        <div class="modal-body" id="view">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="ModalView2">
    <div class="modal-dialog" style='width:30%; '>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="head_title2"></h4>
        </div>
        <div class="modal-body" id="view2">
        </div>
        <div class="modal-footer">
          <!--<button type="button" class="btn btn-primary">Save</button>-->
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="ModalView3">
    <div class="modal-dialog" style='width:30%; '>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="head_title3"></h4>
        </div>
        <div class="modal-body" id="view3">
        </div>
        <div class="modal-footer">
          <!--<button type="button" class="btn btn-primary">Save</button>-->
          <button type="button" class="btn btn-default close3" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- modal -->
</form>
<!-- Modal Bidus-->
<script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables/dataTables.bootstrap.min.js') ?>"></script>
<!-- End Modal Bidus-->
<style>
  .box-primary {

    border: 1px solid #ddd;
  }
</style>
<script type="text/javascript">
  $(document).ready(function() {
    //var table = $('#example1').DataTable();
    DataTables('set');

    $("#excel-report").on('click', function() {
      if (document.getElementById("hide-click").classList.contains('hide_colly')) {
        window.location.href = siteurl + "barang_wset/downloadExcel/hide";
      } else {
        window.location.href = siteurl + "barang_wset/downloadExcel/unhide";
      }
    });

    $("#pdf-report").on('click', function() {
      if (document.getElementById("hide-click").classList.contains('hide_colly')) {
        window.open = siteurl + "barang_wset/print_rekap/hide";
      } else {
        window.open = siteurl + "barang_wset/print_rekap/unhide";
      }
    });


    //Modal1 Rail
    $('#ModalView3').on('hidden.bs.modal', function() {
      $('body').addClass('modal-open');
      $("#head_title3").html("");
      $("#view3").html("");
    });
    $('#ModalView2').on('hidden.bs.modal', function() {
      $('body').addClass('modal-open');
      $("#head_title2").html("");
      $("#view2").html("");
    });
    $('#ModalView').on('hidden.bs.modal', function() {
      $("#head_title").html("");
      $("#view").html("");
    });

    jQuery(document).on('click', '#addListColour', function(e) {
      var target = '' +
        '<div class="input-group colour_class_input">' +
        '  <div class="input-group-btn">' +
        '    <input class="form-control input-sm required" name="nm_color[]" style="width:200px; display:block;">' +
        '  </div>' +
        '  <div class="input-group">' +
        '    <input type="file" name="colour_photo[]" class="form-control input-sm required w50 colour_photo" placeholder="Photo" autocomplete="off">' +
        '    <span class="input-group-btn"><a class="btn btn-sm btn-danger del_colour"><i class="fa fa-times"></i></a></span>' +
        '  </div>' +
        '</div>';
      $(".colour_class_build").append(target);

    });

    jQuery(document).on('click', '.colour_class_input .del_colour', function() {
      console.log('a');
      $(this).parents('.colour_class_input').remove();

    });

    jQuery(document).on('click', '#addAddition', function(e) {
      var x = parseInt($('.additional_comp').length) + 1;
      var target = '' +
        '<tr class="additional_comp">' +
        '<th width="5%" class="text-left vMid">' +
        '      <button type="button" class="btn btn-sm btn-danger deleteAddComp">x</button>' +
        '    </th>' +
        '    <th class="text-left vMid">' +
        '      <select class="form-control select-Addcomp' + x + ' id_Addcomponent" id="id_Addcomponent' + x + '" data-id="' + x + '" name="id_Addcomponent[]">' +
        '    </th>' +
        '    <th class="text-left vMid">' +
        '      <input type="text" readonly class="form-control id_addComp' + x + '" placeholder="Id Component">' +
        '    </th>' +
        // '    <th class="text-left vMid">' +
        // '      <input type="text" class="form-control required" name="qty_ac[]" placeholder="Qty">' +
        // '    </th>' +
        '    <th class="text-left vMid">' +
        '      <input type="text" readonly class="form-control required uom_Addcomp' + x + '" name="uom_ac[]" placeholder="UOM">' +
        '    </th>' +
        '    <th class="text-left vMid">' +
        '      <input type="text" class="form-control required text-right nominal buying_price_Addcomp' + x + '" name="buying_price_ac[]" placeholder="Buying Price">' +
        '    </th>' +
        '    <th class="text-left vMid">' +
        '      <input type="text" class="form-control required text-right nominal selling_price_ac' + x + '" name="selling_price_ac[]" placeholder="Selling Price">' +
        '    </th>' +
        '    <th class="text-left vMid">' +
        '      <input type="text" class="form-control note_ac' + x + '" name="note_ac[]" placeholder="Note">' +
        '    </th>' +
        '</tr>';
      $("#my-grid3 tbody").append(target);
      getAddComp(x);
      $(".select-Addcomp" + x).select2({
        // theme: "bootstrap",
        placeholder: "Choose An Option",
        allowClear: true,
        width: '100%',
        dropdownParent: $("#form-rail")
      });
      /*if (target == 'addMartindale_iso') {
      }
      else {
        $("#wyzenbeek_iso").append('<option value="'+value+'">'+value+'</option>');
      }*/
      if (($("#ModalView2").data('bs.modal') || {}).isShown) {
        $("#ModalView2").modal('hide');
      }
    });

    jQuery(document).on('click', '#addBasic', function(e) {
      var x = parseInt($('.list_component').length) + 1;
      // alert(x);
      var target = '' +
        '  <tr class="list_component">' +
        '    <th class="text-left vMid">' +
        '      <button type="button" class="btn btn-sm btn-danger deleteComp">x</button>' +
        '    </th>' +
        '    <th class="text-left vMid">' +
        '      <select class="form-control select-comp' + x + ' id_component" id="id_component' + x + '" data-id="' + x + '" name="id_component[]">' +
        '    </th>' +
        '    <th class="text-left vMid">' +
        '      <input type="text" readonly class="form-control id_comp' + x + '" placeholder="Id Componennt">' +
        '    </th>' +
        '    <th class="text-left vMid">' +
        '      <input type="text" class="form-control required" name="qty_bc[]" placeholder="Qty">' +
        '    </th>' +
        '    <th class="text-left vMid">' +
        '      <input type="text" readonly class="form-control required uom_comp' + x + '" name="bc_uom[]" placeholder="UOM">' +
        '    </th>' +
        // '    <th class="text-left vMid">' +
        // '      <input type="text" class="form-control required price_bc' + x + '" name="price_bc[]" placeholder="Price">' +
        // '    </th>' +
        '  </tr>';
      $("#my-grid2 tbody").append(target);
      getComp(x);
      // getUOMBC();
      $(".select-comp" + x).select2({
        // theme: "bootstrap",
        placeholder: "Choose An Option",
        allowClear: true,
        width: '100%',
        dropdownParent: $("#form-rail")
      });
      /*if (target == 'addMartindale_iso') {
      }
      else {
        $("#wyzenbeek_iso").append('<option value="'+value+'">'+value+'</option>');
      }*/
      if (($("#ModalView2").data('bs.modal') || {}).isShown) {
        $("#ModalView2").modal('hide');
      }
    });

    jQuery(document).on('click', '.list_component .deleteComp', function() {
      //console.log('a');
      $(this).parents('.list_component').remove();

    });

    jQuery(document).on('click', '.additional_comp .deleteAddComp', function() {
      //console.log('a');
      $(this).parents('.additional_comp').remove();

    });

    jQuery(document).on('click', '#addRailSave', function() {
      var valid = getValidation();
      // alert(valid);
      //console.log(valid);
      if (valid) {
        var formdata = new FormData(document.getElementById("form-rail")); //$("#form-supplier").serialize();
        // console.log(formdata);
        $.ajax({
          url: siteurl + active_controller + "saveRail",
          dataType: "json",
          type: 'POST',
          data: formdata,
          processData: false,
          contentType: false,
          cache: false,
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
                DataTables('set');
                if (($("#ModalView3").data('bs.modal') || {}).isShown) {
                  $("#ModalView3").modal('hide');
                } else {
                  $("#ModalView").modal('hide');
                }

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

      //$("#ModalView").modal('hide');
    });

    //EDIT
    $(document).on('click', '.edit', function() {
      var id = $(this).data('id_product');
      $(".modal-dialog").css('width', '90%');
      $("#head_title").html("<b>Edit Rail</b>");
      $("#view").load(siteurl + active_controller + '/modal_Process/Rail/add/' + id);
      $("#ModalView").modal();
    })

    //DETAIL

    //DELETE
    $(document).on('click', '.delete', function(e) {
      var id_product = $(this).data('id_product');
      swal({
          title: "Are you sure?",
          text: "You will not be able to process again this data!",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Yes",
          cancelButtonText: "Cancel",
          closeOnConfirm: false,
          closeOnCancel: false,
          showLoaderOnConfirm: true
        },
        function(isConfirm) {
          if (isConfirm) {
            $.ajax({
              url: siteurl + active_controller + "deleteData",
              dataType: "json",
              type: 'POST',
              data: {
                id_rail: id_product
              },
              success: function(result) {
                swal({
                  title: "Save Success!",
                  text: result.msg,
                  type: "success",
                  timer: 1500,
                  showCancelButton: false,
                  showConfirmButton: false,
                  allowOutsideClick: false
                });
                DataTables('set');
              },
              error: function(request, error) {
                console.log(arguments);
                swal({
                  title: "Error Message !",
                  text: 'An Error Occured During Process. Please try again..',
                  type: "warning",
                  timer: 5000,
                  showCancelButton: false,
                  showConfirmButton: false,
                  allowOutsideClick: false
                });
              }
            });

          } else {
            swal("Batal Proses", "Data bisa diproses nanti", "error");
            return false;
          }
        });
    });
  });

  function add_data() {
    $(".modal-dialog").css('width', '90%');
    $("#head_title").html("<b>Add Rail</b>");
    $("#view").load(siteurl + active_controller + '/modal_Process/Rail/add/');
    $("#ModalView").modal();
  }

  jQuery(document).on('keyup keypress blur', '.numberOnly', function() {
    if ((event.which < 48 || event.which > 57) && (event.which < 46 || event.which > 46) && event.which != 43) {
      event.preventDefault();
    }
  });

  function DataTables(set = null) {
    var dataTable = $('#tableset').DataTable({
      "serverSide": true,
      "stateSave": true,
      "bAutoWidth": true,
      "destroy": true,
      "responsive": true,
      "oLanguage": {
        "sSearch": "<b>Live Search : </b>",
        "sLengthMenu": "_MENU_ &nbsp;&nbsp;<b>Records Per Page</b>&nbsp;&nbsp;",
        "sInfo": "Showing _START_ to _END_ of _TOTAL_ entries",
        "sInfoFiltered": "(filtered from _MAX_ total entries)",
        "sZeroRecords": "No matching records found",
        "sEmptyTable": "No data available in table",
        "sLoadingRecords": "Please wait - loading...",
        "oPaginate": {
          "sPrevious": "Prev",
          "sNext": "Next"
        }
      },
      "aaSorting": [
        [1, "asc"]
      ],
      "columnDefs": [{
        "targets": 'no-sort',
        "orderable": false,
      }],
      "sPaginationType": "simple_numbers",
      "iDisplayLength": 5,
      "aLengthMenu": [
        [5, 10, 20, 50, 100, 150],
        [5, 10, 20, 50, 100, 150]
      ],
      "ajax": {
        url: siteurl + active_controller + 'getDataJSON',
        type: "post",
        data: function(d) {
          d.activation = 'aktif'
        },
        cache: false,
        error: function() {
          $(".my-grid-error").html("");
          $("#my-grid").append('<tbody class="my-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
          $("#my-grid_processing").css("display", "none");
        }
      }
    });

  }
</script>