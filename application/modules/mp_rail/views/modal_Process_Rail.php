<?php

if (!empty($this->uri->segment(5))) {
  $getC                 = $this->db->get_where('mp_rail', array('id_rail' => $id))->row();
  $get_colour           = $this->db->get_where('mp_rail_colour', array('id_rail' => $id))->result();
  $get_addition         = $this->db->get_where('mp_rail_additional', array('id_rail' => $id))->result();
  $get_basic           = $this->db->get_where('mp_rail_basic', array('id_rail' => $id))->result();
  // $name_uom             = $this->db->get_where('master_uom', array('activation' => 'active'))->result();

  // echo "<pre>";
  // print_r($getC);
  // echo "</pre>";


  $name_supplier        = $this->db->get_where('master_supplier', array('id_supplier' => $getC->id_supplier))->row();
}
if ($this->uri->segment(4) == 'view') {
  $view = 'style="display:block"';
} else {
  $mode = 'input';
}

?>
<!-- <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.9/select2-bootstrap.css" rel="stylesheet" /> -->
<form class="" id="form-rail" action="" method="post" enctype="multipart/form-data">
  <div class="box box-success">
    <div class="box-body">
      <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6">
          <table id="my-grid1" class="table table-striped table-bordered table-hover table-condensed" width="100%">
            <tbody>
              <tr style='background-color: #175477 !important; color: white; font-size: 15px !important;'>
                <th class="text-center" colspan='2'>HEADER PRODUCT IDENTITY</th>
              </tr>

              <tr id="my-grid-tr-name_product">
                <td class="text-left vMid">Item Name <span class='text-red'>*</span></b></td>
                <td class="text-left">
                  <div class="label_input">
                    <input type="text" class="form-control input required w50 ucfirst" name="name_product" id="name_product" placeholder="Item Name" value="<?= empty($getC->name_product) ? '' : $getC->name_product ?>">
                    <small class="text-red name_product hideIt ">Code Can't be empty!</small>
                    </label>
                </td>
              </tr>

              <tr id="my-grid-tr-name_original">
                <td class="text-left vMid">Original Name <span class='text-red'>*</span></b></td>
                <td class="text-left">
                  <div class="label_input">
                    <input type="text" class="form-control input required w50 ucfirst" placeholder="Original Name" name="name_original" id="name_original" value="<?= empty($getC->name_original) ? '' : $getC->name_original ?>">
                    <small class="text-red name_original hideIt">Original Name Can't be empty!</small>
                    </label>
                </td>
              </tr>

              <tr id="my-grid-tr-id_supplier">
                <td class="text-left vMid">Supplier <span class='text-red'>*</span></b></td>
                <td class="text-left">
                  <div class="label_input">
                    <select class="form-control input-sm required select2" name="id_supplier" id="id_supplier">
                    </select>
                    <small class="text-red id_supplier hideIt">Supplier Can't be empty!</small>

                  </div>
                </td>
              </tr>

              <tr id="my-grid-tr-id_rail">
                <td class="text-left vMid">Item Code <span class='text-red'>*</span></b></td>
                <td class="text-left">
                  <div class="label_input">
                    <input type="hidden" name="type" value="<?= empty($getC->id_rail) ? 'add' : 'edit' ?>">
                    <input type="text" class="form-control input input-sm required w30" name="id_rail" id="id_rail" value="<?= empty($getC->id_rail) ? '' : $getC->id_rail ?>" readonly>
                    <small class="text-red id_rail hideIt">Code Can't be empty!</small>
                    </label>
                </td>
              </tr>

              <tr id="my-grid-tr-colour">
                <td class="text-left vMid">Colour Choice </td>
                <td class="text-left">
                  <div class="label_input">
                    <div class="colour_class_build">
                      <?php if ($getC) : ?>
                        <?php foreach ($get_colour as $key => $vc) : ?>
                          <div class="input-group colour_class_input">
                            <div class="input-group-btn">
                              <input class="form-control required colour" name="nm_color[]" style="width:200px; display:block;" value="<?= $vc->name_colour ?>">
                            </div>
                            <div class="input-group">
                              <input type="file" name="colour_photo[]" class="form-control required" placeholder="Photo" autocomplete="off">
                              <span class="input-group-btn"><a class="btn btn-sm btn-danger del_colour"><i class="fa fa-times"></i></a></span>
                            </div>
                          </div>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </div>
                    <div class="input-group-btn">
                      <a id="addListColour" class="btn btn-sm btn-success"><i class="fa fa-plus">&nbsp; List</i></a>
                    </div>
                    <small class="text-red colour hideIt">Colour Can't be empty!</small>

                  </div>
                </td>
              </tr>

              <tr id="my-grid-tr-warranty">
                <td class="text-left vMid">Warranty <span class='text-red'>*</span></td>
                <td class="text-left">
                  <label class="label_view">
                    <?= ($getC) ? $getC->warranty : '-' ?>
                  </label>
                  <div class="label_input">
                    <div class="input-group">
                      <input type="text" class=" w50 form-control required numberOnly" id="warranty" name="warranty" placeholder="Warranty" value="<?= empty($getC->warranty) ? '' : $getC->warranty ?>">
                      <div class="input-group-btn">
                        <select class="form-control required warranty_time" name="warranty_time" style="width:200px;display:inline-block">
                          <option value="Month">Month(s)</option>
                          <option value="Year">Year(s)</option>
                        </select>
                      </div>
                    </div>
                    <small class="text-red warranty hideIt">Warranty Can't be empty!</small>
                    <small class="text-red warranty_time hideIt">Warranty Time Can't be empty!</small>
                    </label>
                </td>
              </tr>

              <tr id="my-grid-tr-max_width">
                <td class="text-left vMid">Max Width <span class="text-red">*</span></td>
                <td class="text-left">
                  <label class="label_view">
                    <?= ($getC) ? $getC->max_width : '-' ?>
                  </label>
                  <div class="label_input">
                    <div class="input-group">
                      <input type="number" class="form-control required" id="max_width" name="max_width" placeholder="Max Width" value="<?= empty($getC->max_width) ? '' : $getC->max_width ?>">
                      <span class="input-group-addon">m</span>
                    </div>
                    <small class="text-red max_width hideIt">Max Width Can't be empty!</small>
                  </div>
                </td>
              </tr>

              <tr id="my-grid-tr-max_height">
                <td class="text-left vMid">Max Height <span class="text-red">*</span></td>
                <td class="text-left">
                  <label class="label_view">
                    <?= ($getC) ? $getC->max_height : '-' ?>
                  </label>
                  <div class="label_input">
                    <div class="input-group">
                      <input type="number" class="form-control required" id="max_height" name="max_height" placeholder="Max Height" value="<?= empty($getC->max_height) ? '' : $getC->max_height ?>">
                      <span class="input-group-addon">m</span>
                    </div>
                    <small class="text-red max_height hideIt">Max Height Can't be empty!</small>

                  </div>
                </td>
              </tr>

              <tr id="my-grid-tr-max_weight">
                <td class="text-left vMid">Max Weight <span class="text-red">*</span></td>
                <td class="text-left">
                  <label class="label_view">
                    <?= ($getC) ? $getC->max_weight : '-' ?>
                  </label>
                  <div class="label_input">
                    <div class="input-group">
                      <input type="number" class="form-control required" id="max_weight" name="max_weight" placeholder="Max Weight" value="<?= empty($getC->max_weight) ? '' : $getC->max_weight ?>">
                      <span class="input-group-addon">kg/m</span>
                    </div>
                    <small class="text-red max_weight hideIt">Max Weight Can't be empty!</small>
                  </div>
                </td>
              </tr>

              <tr id="my-grid-tr-activation">
                <td class="text-left vMid">Status <span class='text-red'>*</span></b></td>
                <td class="text-left">
                  <div class="label_input">
                    <select class="form-control required select2" name="activation" id="activation">
                      <!-- <option value=""></option> -->
                      <option value="aktif">Active</option>
                      <option value="nonaktif">Inactive</option>
                    </select>
                    <small class="text-red activation hideIt">Status Can't be empty!</small>
                    </label>
                </td>
              </tr>

            </tbody>
          </table>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6">
          <table id="my-grid4" class="table table-striped table-bordered table-hover table-condensed" width="100%">
            <thead>
              <tr style='background-color: #175477; color: white; font-size: 15px;'>
                <th class="text-center" colspan='2'>HEADER PRODUCTIVITY</th>
              </tr>
            </thead>

            <tbody>

              <tr id="my-grid-tr-rail_type">
                <td class="text-left vMid">Rail Type <b><span class='text-red'>*</span></b></td>
                <td class="text-left">
                  <div class="label_input">
                    <select type="text" class="form-control input required select2" name="rail_type" id="rail_type">
                      <option value=""></option>
                      <option value="Rail Decorative" <?= $getC->rail_type == 'Rail Decorative' ? 'selected' : ''; ?>>Rail Decorative</option>
                      <option value="Rail manual" <?= $getC->rail_type == 'Rail manual' ? 'selected' : ''; ?>>Rail manual</option>
                      <option value="Rail motorized" <?= $getC->rail_type == 'Rail motorized' ? 'selected' : ''; ?>>Rail motorized</option>
                      <option value="Rail roomanshade" <?= $getC->rail_type == 'Rail roomanshade' ? 'selected' : ''; ?>>Rail roomanshade</option>
                      <option value="Rail fungsional" <?= $getC->rail_type == 'Rail fungsional' ? 'selected' : ''; ?>>Rail fungsional</option>
                    </select>
                    <small class="text-red rail_type hideIt">Rail Type Can't be empty!</small>
                    </label>
                </td>
              </tr>

              <tr id="my-grid-tr-id_uom">
                <td class="text-left vMid">UOM <b><span class='text-red'>*</span></b></td>
                <td class="text-left">
                  <label class="label_view">
                    <?= ($getC) ? $getC->id_uom : '-' ?>
                  </label>
                  <div class="label_input">
                    <select class="form-control input required select2" name="id_uom" id="id_uom"></select>
                    <small class="text-red id_uom hideIt">Moq Can't be empty!</small>
                    </label>
                </td>
              </tr>

              <tr id="my-grid-tr-moq">
                <td class="text-left vMid">Moq</td>
                <td class="text-left">
                  <label class="label_view">
                    <?= ($getC) ? $getC->moq : '-' ?>
                  </label>
                  <div class="label_input">
                    <div class="input-group">
                      <input type="text" class="form-control input numberOnly" placeholder="Moq" name="moq" id="moq" value="<?= empty($getC->moq) ? '' : $getC->moq ?>" multiple>
                      <span class="input-group-addon">m</span>
                    </div>
                    <label class="label label-danger moqX hideIt">Moq Can't be empty!</label>
                    </label>
                </td>
              </tr>

              <tr id="my-grid-tr-system">
                <td class="text-left vMid">System</td>
                <td class="text-left">
                  <label class="label_view">
                    <?= ($getC) ? $getC->system : '-' ?>
                  </label>
                  <div class="label_input">
                    <div class="input-group select2-bootstrap-append">
                      <input type="text" class="form-control input" placeholder="System" name="system" id="system" value="<?= empty($getC->system) ? '' : $getC->system ?>" multiple>
                    </div>

                    <label class="label label-danger systemX hideIt">System Can't be empty!</label>

                    </label>
                </td>
              </tr>

              <!-- <tr id="my-grid-tr-leadtime">
                <td class="text-left vMid">Lead time/m <b><span class='text-red'>*</span></b></td>
                <td class="text-left">
                  <label class="label_view">
                    <?= ($getC) ? $getC->leadtime : '-' ?>
                  </label>
                  <div class="label_input">
                    <div class="input-group">
                      <input type="text" class="form-control required numberOnly" placeholder="Leadtime" name="leadtime" id="leadtime" value="<?= empty($getC->leadtime) ? '' : $getC->leadtime ?>" multiple>
                      <span class="input-group-addon">
                        minute(s)
                      </span>
                    </div>
                    <small class="text-red leadtime hideIt">Lead time/m Can't be empty!</small>
                    </label>
                </td>
              </tr> -->

              <!-- <tr id="my-grid-tr-tech_person">
                <td class="text-left vMid">Engineering Person <b><span class='text-red'>*</span></b></td>
                <td class="text-left">
                  <label class="label_view">
                    <?= ($getC) ? $getC->tech_person : '-' ?>
                  </label>
                  <div class="label_input">
                    <div class="input-group select2-bootstrap-append">
                      <input type="text" class="form-control required numberOnly" placeholder="Engineering Person" name="tech_person" id="tech_person" value="<?= empty($getC->tech_person) ? '' : $getC->tech_person ?>" multiple>
                      <span class="input-group-addon">
                        person(s)
                      </span>
                    </div>
                    <small class="text-red tech_person hideIt">Lead time/m Can't be empty!</small>
                    </label>
                </td>
              </tr> -->

              <tr id="my-grid-tr-status_wh">
                <td class="text-left vMid">Status Stock <span class="text-red">*</span></td>
                <td class="text-left">
                  <div class="label_input">
                    <select name="status_wh" id="status_wh" class="form-control required select2">
                      <option value=""></option>
                      <option value="indent_produksi" <?= $getC->status_wh == 'indent_produksi' ? 'selected' : ''; ?>>Indent Produksi</option>
                      <option value="ready_stock_supplier" <?= $getC->status_wh == 'ready_stock_supplier' ? 'selected' : ''; ?>>Ready Stock Supplier</option>
                      <option value="ready_stock_idefab" <?= $getC->status_wh == 'ready_stock_idefab' ? 'selected' : ''; ?>>Ready Stock Idefab</option>
                    </select>
                    <small class="text-red status_wh hideIt">Status Stock Can't be empty!</small>
                    </label>
                </td>
              </tr>

              <tr>
                <td>Buying</td>
                <td>
                  <div class="input-group select2-bootstrap-append">
                    <div class="input-group-addon">
                      <i>Rp.</i>
                    </div>
                    <input type="text" class="form-control text-right input numberOnly nominal" name="bc_buying_price" id="bc_buying_price" style="display:inline-block" placeholder="0" value="<?= empty($getC->bc_buying_price) ? '' : number_format($getC->bc_buying_price) ?>">
                  </div>
                </td>
              </tr>
              <tr>
                <td>Selling Price</td>
                <td>
                  <div class="input-group select2-bootstrap-append">
                    <div class="input-group-addon">
                      <i>Rp.</i>
                    </div>
                    <input type="text" readonly class="form-control input text-right numberOnly nominal" name="bc_selling_price" id="bc_selling_price" placeholder="0" style="display:inline-block" value="<?= empty($getC->bc_selling_price) ? '' : number_format($getC->bc_selling_price) ?>">
                  </div>
                </td>
              </tr>
              <tr>
                <td>Actual Selling Price</td>
                <td>
                  <div class="input-group select2-bootstrap-append">
                    <div class="input-group-addon">
                      <i>Rp.</i>
                    </div>
                    <input type="text" class="form-control input text-right numberOnly nominal" name="act_selling_price" id="act_selling_price" placeholder="0" style="display:inline-block" value="<?= empty($getC->act_selling_price) ? '' : number_format($getC->act_selling_price) ?>">
                  </div>
                </td>
              </tr>

              <tr id="my-grid-tr-remark">
                <td class="text-left vMid">Remark</td>
                <td class="text-left">
                  <textarea type="text" name="remark" class="form-control" id="remark" placeholder="Remark"><?= !empty($getC->remark) ? $getC->remark : '' ?></textarea>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="col-md-12">
          <label for="">Basic Component</label>
          <table id="my-grid2" class="table table-striped table-bordered table-hover table-condensed" width="100%">
            <thead>
              <tr id="my-grid-tr-head">
                <th width="5%" class="text-left vMid">#</th>
                <th width="30%" class="text-left vMid">Component</th>
                <th width="20%" class="text-left vMid">Id Componennt</th>
                <th width="10%" class="text-left vMid">Qty Std</th>
                <th width="10%" class="text-left vMid">UOM</th>
                <!-- <th width="20%" class="text-left vMid">Price</th> -->
              </tr>
            </thead>
            <tbody>
              <?php
              if ($getC) {
                $no = 0;
                foreach ($get_basic as $item) {
                  $no++ ?>
                  <tr class="list_component">
                    <th class="text-left vMid">
                      <button type="button" class="btn btn-sm btn-danger deleteComp">x</button>
                    </th>
                    <th class="text-left vMid">
                      <input type="hidden" class="idBsComp" data-id="<?= $no ?>" id="idBsComp<?= $no ?>" value="<?= $item->id_component ?>">
                      <select class="form-control select2 select-comp<?= $no ?> id_component" id="id_component<?= $no ?>" data-id="<?= $no ?>" name="id_component[]">
                    </th>
                    <th class="text-left vMid">
                      <input type="text" class="form-control id_comp<?= $no ?>" readonly placeholder="Id Component" value="<?= $item->id_component ?>">
                    </th>
                    <th class="text-left vMid">
                      <input type="text" class="form-control required" name="qty_bc[]" placeholder="Qty" value="<?= $item->qty ?>">
                    </th>
                    <th class="text-left vMid">
                      <input type="text" readonly class="form-control required uom_comp<?= $no ?>" name="bc_uom[]" placeholder="UOM" value="<?= $item->uom ?>">
                    </th>
                    <!-- <th class="text-left vMid">
                            <input type="text" class="form-control required price_bc<?= $no ?>" name="price_bc[]" placeholder="Price">
                          </th> -->
                  </tr>
              <?php
                }
              } ?>
            </tbody>

          </table>
          <label class="label_input">
            <a class="btn btn-sm btn-success" id="addBasic">Add Basic Component</a>
          </label>
          <br>
          <table class="table table-condensed">
            <tr id="my-grid-tr-product_photo">
              <!-- <td width="200px" class="text-left vMid">
                <label for="">Upload Photo</label>
              </td> -->
              <td class="text-left">
                <label class="label_input">
                  <span class="addPhoto <?= empty($getC->filelama) ? '' : 'hidden'; ?> btn btn-md btn-primary" for=""><i class="fa fa-upload"></i> Upload Foto</span>
                  <input type="file" name="product_photo" class="hidden" id="product_photo" onchange="readURL(this)">
                  <img id="blah" src="<?= empty($getC->filelama) ? '' : base_url('assets/img/master_rail/' . $getC->filelama) ?>" alt="" style="display:inline-block;width:100px;height:auto" />
                  <label class="label label-danger product_photo hideIt">Photo Can't be empty!</label>
                  <input type="hidden" name="filelama" id="filelama" class="form-control" value="<?= ($getC) ? $getC->filelama : '' ?>">
                </label>
              </td>
            </tr>
          </table>

        </div>
      </div>

    </div>
  </div>

  <div class="box box-warning">
    <div class="box-header">
      <div class="box-title">
        <label for="">Additional Component</label>
      </div>
      <div class="box-body">
        <table id="my-grid3" class="table table-striped table-bordered table-hover table-condensed" width="100%">
          <thead>
            <tr id="my-grid-tr-head">
              <th width="5%" class="text-left">#</th>
              <th width="20%" class="text-left">Component</th>
              <th width="10%" class="text-left">Id Component</th>
              <!-- <th width="5%" class="text-left">Qty Std</th> -->
              <th width="5%" class="text-left">UOM</th>
              <th width="10%" class="text-left">Buying Price</th>
              <th width="10%" class="text-left">Selling Price</th>
              <th class="text-left">Note</th>
            </tr>
          </thead>
          <tbody id="my-grid3-tbody">
            <?php
            if ($get_addition) {
              $no = 0;
              foreach ($get_addition as $value) {
                $no++ ?>
                <tr class="additional_comp">
                  <th width="5%" class="text-left vMid">
                    <button type="button" class="btn btn-sm btn-danger deleteAddComp">x</button>
                  </th>
                  <th class="text-left vMid">
                    <input type="hidden" class="idAddComp" data-id="<?= $no ?>" id="idAddComp<?= $no ?>" value="<?= $value->id_component ?>">
                    <select class="form-control select2 select-Addcomp<?= $no ?> id_Addcomponent" id="id_Addcomponent<?= $no ?>" data-id="<?= $no ?>" name="id_Addcomponent[]"></select>
                  </th>
                  <th class="text-left vMid">
                    <input type="text" class="form-control" readonly placeholder="Id Component" value="<?= $value->id_component ?>">
                  </th>
                  <!-- <th class="text-left vMid">
                    <input type="text" class="form-control required" name="qty_ac[]" placeholder="Qty" value="<?= $value->qty ?>">
                  </th> -->
                  <th class="text-left vMid">
                    <input type="text" readonly class="form-control required uom_Addcomp<?= $no ?>" name="uom_ac[]" placeholder="UOM" value="<?= $value->uom ?>">
                  </th>
                  <th class="text-left vMid">
                    <input type="text" class="form-control required text-right nominal buying_price_Addcomp<?= $no ?>" name=" buying_price_ac[]" placeholder="Buying Price" value="<?= number_format($value->buying_price) ?>">
                  </th>
                  <th class="text-left vMid">
                    <input type="text" class="form-control required text-right nominal selling_price_ac<?= $no ?>" name=" selling_price_ac[]" placeholder="Selling Price" value="<?= number_format($value->selling_price) ?>">
                  </th>
                  <th class="text-left vMid">
                    <input type="text" class="form-control note_ac<?= $no ?>" name=" note_ac[]" placeholder="Note" value="<?= $value->note ?>">
                  </th>
                </tr>
            <?php
              }
            } ?>
          </tbody>
        </table>
        <label class="label_input">
          <a class="btn btn-sm btn-success" id="addAddition">Add Additional Component</a>
        </label>
      </div>
    </div>
  </div>

  <div class="box-footer">
    <?php
    echo form_button(array('type' => 'button', 'class' => 'btn btn-md btn-success label_input', 'style' => 'min-width:100px; float:right;', 'value' => 'save', 'content' => 'Save', 'id' => 'addRailSave')) . ' ';
    ?>
  </div>
</form>

<style>
  /* #content>.select2-container {
    width: 100% !important;
  } */

  .soft-border {
    border: 0 0 2px 0 !important;
    border-color: #b9a4a4;
    background-image: linear-gradient(to right, #6075af, white) !important;
  }

  .list_spec {
    padding-left: 2% !important;
  }
</style>

<script type="text/javascript">
  $(document).on('change', '#bc_buying_price', function() {
    var buy = $(this).val();
    selling = parseInt(buy.replace(/,/g, '')) * 3;
    $('#bc_selling_price').val(('' + selling).replace(/\B(?=(?:\d{3})+(?!\d))/g, ','));
  });


  jQuery(document).on('keyup change focus paste', '.nominal', function() {
    var val = this.value;
    val = val.replace(/[^0-9\.]/g, '');

    if (val != "") {
      valArr = val.split(',');
      valArr[0] = (parseInt(valArr[0], 10)).toLocaleString();
      val = valArr.join(',');
    }

    this.value = val;
  });
  $(document).ready(function() {
    $(".datepicker").datepicker({
      format: "yyyy-mm-dd",
      showInputs: true,
      autoclose: true
    });
    $(".select2").select2({
      // theme: "bootstrap",
      placeholder: "Choose An Option",
      allowClear: true,
      width: '100%',
      dropdownParent: $("#form-rail")
    });


    jQuery(document).on('keyup', '.bank_num', function() {
      var foo = $(this).val().split("-").join(""); // remove hyphens
      if (foo.length > 0) {
        foo = foo.match(new RegExp('.{1,4}', 'g')).join("-");
      }
      $(this).val(foo);
    });


    $(document).on('click change keyup paste blur', '#form-rail .form-control', function(e) {
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

    if ('<?= $this->uri->segment(4) ?>' == 'view') {
      $('.label_view').css("display", "block");
      $('.label_input').css("display", "none");
    } else {
      $('.label_view').css("display", "none");
      $('.label_input').css("display", "block");
    }
    console.log('<?= $this->uri->segment(4) ?>');
  });
  getSupplier();

  function getSupplier() {
    if ('<?= ($getC->id_supplier) ?>' != null) {
      var id_selected = '<?= $getC->id_supplier ?>';
    } else if ($('#id_supplier').val() != null || $('#id_supplier').val() != '') {
      var id_selected = $('#id_supplier').val();
    } else {
      var id_selected = '';
    }
    //console.log(id_selected);
    var column = '';
    var column_fill = '';
    var column_name = 'nm_supplier_office';
    var table_name = 'master_supplier';
    var key = 'id_supplier';
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
        $('#id_supplier').html(result.html);
      },
      error: function(request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });

  }

  function getFeature() {
    if ('<?= ($getC->id_feature) ?>' != null) {
      var id_selected = '<?= $getC->id_feature ?>';
    } else if ($('#id_feature').val() != null || $('#id_feature').val() != '') {
      var id_selected = $('#id_feature').val();
    } else {
      var id_selected = '';
    }
    //console.log(id_selected);
    var column = '';
    var column_fill = '';
    var column_name = 'name_feature';
    var table_name = 'master_product_feature';
    var key = 'id_feature';
    var act = '';
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
        $('#additional_features').html(result.html);
      },
      error: function(request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });

  }
  getUOM();

  function getUOM() {
    if ('<?= ($getC->id_uom) ?>' != null) {
      var id_selected = '<?= $getC->id_uom ?>';
    } else if ($('#id_uom').val() != null || $('#id_uom').val() != '') {
      var id_selected = $('#id_uom').val();
    } else {
      var id_selected = '';
    }
    //console.log(id_selected);
    var column = '';
    var column_fill = '';
    var column_name = 'name_uom';
    var table_name = 'master_uom';
    var key = 'id_uom';
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
        $('#id_uom').html(result.html);
      },
      error: function(request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });

  }


  var x = parseInt($('.list_component').length);
  if (x > 0) {
    for (let i = 0; i < x; i++) {
      e = parseInt(i) + 1;
      getComp(e);
    }
  }

  function getComp(x) {
    if ($('#idBsComp' + x).val() != '') {
      id_selected = $('#idBsComp' + x).val();
    } else {
      id_selected = '';
    }
    //console.log(id_selected);
    var column = '';
    var column_fill = '';
    var column_name = 'name_component';
    var table_name = 'master_component';
    var key = 'id';
    var act = '';
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
        //$('#id_uom').html(result.html);
        $('#id_component' + x).html(result.html);

      },
      error: function(request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });

  }

  $(document).on('change', '.id_component', function() {
    var x = $(this).data('id');
    var id_comp = $(this).val();
    $.ajax({
      url: siteurl + active_controller + "getUom",
      dataType: "json",
      type: 'POST',
      data: {
        id: id_comp
      },
      success: function(result) {
        var comp = result['component'][0];
        console.log(comp.uom);
        $('.uom_comp' + x).val(comp.uom);
        $('.id_comp' + x).val(comp.id);
        // $('#id_component' + x).html(result.html);
      }
    });
  });


  $(document).on('change', '.id_Addcomponent', function() {
    var x = $(this).data('id');
    var id_comp = $(this).val();
    $.ajax({
      url: siteurl + active_controller + "getUom",
      dataType: "json",
      type: 'POST',
      data: {
        id: id_comp
      },
      success: function(result) {
        var comp = result['component'][0];
        console.log(comp.uom);
        $('.uom_Addcomp' + x).val(comp.uom);
        $('.id_addComp' + x).val(comp.id);
        // $('#id_component' + x).html(result.html);
      }
    });
  });

  var x = parseInt($('.additional_comp').length);
  if (x > 0) {
    for (let i = 0; i < x; i++) {
      e = parseInt(i) + 1;
      getAddComp(e);
    }
  }

  function getAddComp(x) {
    // alert(x)
    if ($('#idAddComp' + x).val() != '') {
      id_selected = $('#idAddComp' + x).val();
    } else {
      id_selected = '';
    }
    //console.log(id_selected);
    var column = '';
    var column_fill = '';
    var column_name = 'name_component';
    var table_name = 'master_component';
    var key = 'id';
    var act = '';
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
        //$('#id_uom').html(result.html);
        $('#id_Addcomponent' + x).html(result.html);

      },
      error: function(request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });

  }


  $(document).on('change', '#id_supplier', function(e) {
    var id_sup = $('#id_supplier').val();
    if (id_sup != '') {
      $.ajax({
        url: siteurl + active_controller + "getID",
        dataType: "json",
        type: 'POST',
        data: {
          id: id_sup
        },
        success: function(result) {
          // alert(result.id);
          $('#id_rail').val(id_sup + "-" + result.id);
        },
        error: function(request, error) {
          console.log(arguments);
          alert(" Can't do because: " + error);
        }
      });
    } else {
      swal({
        title: "Warning!",
        text: "Complete Supplier name first, please!",
        type: "warning",
        timer: 1500,
        showConfirmButton: false
      });
    }

  });

  function readURL(input) {
    console.log('XC');
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#blah')
          .attr('src', e.target.result)
          .width(150);
        $('.addPhoto').addClass('hidden');
      };

      reader.readAsDataURL(input.files[0]);
    }
  }

  function get_reason(val) {
    if (val == 'Discontinued') {
      $('.status_reason_view').removeClass('hideIt');
      $('.status_reason_view').css('display', 'block');
    } else {
      $('.status_reason_view').addClass('hideIt');
      $('.status_reason_view').css('display', 'none');
    }
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
            scrollTop: $("#form-rail").offset().top
          }, 2000);
          count = count + 1;
        }

      } else if ((node == 'INPUT' && type == 'text') || (node == 'SELECT') || (node == 'TEXTAREA') || (node == 'INPUT' && type == 'number')) {
        if ($(this).val() == null || $(this).val() == '') {
          var name = $(this).attr('id');

          $('.' + name).removeClass('hideIt');
          $('.' + name).css('display', 'inline-block', );
          $('#' + name).css('border-color', 'red');

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