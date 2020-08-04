<?php

if (!empty($this->uri->segment(3))) {
  $getC                 = $this->db->get_where('master_product_fabric', array('id_product' => $id))->row();
  $name_supplier        = $this->db->get_where('master_supplier', array('id_supplier' => $getC->id_supplier))->row();
  $name_country         = $this->db->get_where('master_country', array('id_country' => $getC->id_country))->row();
  $name_pattern_type    = $this->db->get_where('master_pattern_type', array('id_pattern_type' => $getC->id_pattern_type))->row();
  $name_pattern_name    = $this->db->get_where('child_supplier_pattern', array('id_pattern' => $getC->id_pattern_name))->row();
  $name_characteristic  = $this->db->get_where('master_product_characteristic', array('id_characteristic' => $getC->id_characteristic))->row();
  $name_collection      = $this->db->get_where('master_product_collection', array('id_collection' => $getC->id_collection))->row();
  $name_class           = $this->db->get_where('master_product_class', array('id_class' => $getC->id_class))->row();
  $name_feature         = $this->db->get_where('master_product_feature', array('id_feature' => $getC->id_feature))->row();
  $name_content         = $this->db->get_where('master_product_content', array('id_content' => $getC->id_content))->row();
  $name_brand           = $this->db->get_where('master_product_brand', array('id_brand' => $getC->id_brand))->row();
  $name_buy_price_curs  = $this->db->get_where('mata_uang', array('id_kurs' => $getC->buy_price_curs))->row();
  $name_pricelist_curs  = $this->db->get_where('mata_uang', array('id_kurs' => $getC->pricelist_curs))->row();
}
$name_uom             = $this->db->get_where('master_uom', array('activation' => 'active'))->result();
if ($this->uri->segment(4) == 'view') {
  $view = 'style="display:block"';
} else {
  $mode = 'input';
}

?>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.9/select2-bootstrap.css" rel="stylesheet" />
<form class="" id="form-fabric" action="" method="post" enctype="multipart/form-data">
  <div class="box box-success">
    <div class="box-body" style="">

      <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6">
          <table id="my-grid3" class="table table-striped table-bordered table-hover table-condensed" width="100%">
            <tbody>
              <tr style='background-color: #175477 !important; color: white; font-size: 15px !important;'>
                <th class="text-center" colspan='2'>HEADER PRODUCT IDENTITY</th>
              </tr>

              <tr id="my-grid-tr-product_photo">
                <td class="text-left vMid" width="30%">Photo <span class='text-red'>*</span></b></td>
                <td class="text-left" width="70%  ">
                  <label class="label_input">
                    <?php
                    echo form_input(array('type' => 'file', 'id' => 'product_photo', 'name' => 'product_photo', 'class' => 'form-control', 'onchange' => "readURL(this);", 'placeholder' => 'Photo', 'autocomplete' => 'off', 'value' => empty($getC->product_photo) ? '' : $getC->product_photo))
                    ?>
                    <img id="blah" src="<?= empty($getC) ? '' : base_url('assets/img/master_fabric/' . $getC->photo_product) ?>" alt="" style="display:inline-block" width="100" />
                    <label class="label label-danger product_photo hideIt">Photo Can't be empty!</label>
                    <input type="hidden" name="filelama" id="filelama" class="form-control" value="<?= ($getC) ? $getC->product_photo : '' ?>">
                  </label>
                </td>
              </tr>

              <tr id="my-grid-tr-shipment">
                <td class="text-left vMid">Shipment <span class='text-red'>*</span></b></td>
                <td class="text-left">
                  <div class="label_input">
                    <select class="form-control required select2" name="shipment" id="shipment" style="width:200px">
                      <option value="">None</option>
                      <option value="Local" <?= (!empty($getC) && $getC->shipment == 'Local') ? 'selected' : '' ?>>Local</option>
                      <option value="Import" <?= (!empty($getC) && $getC->shipment == 'Import') ? 'selected' : '' ?>>Import</option>
                    </select>
                    <label class="label label-danger shipment hideIt">Shipment Can't be empty!</label>

                  </div>
                </td>
              </tr>

              <tr id="my-grid-tr-id_supplier">
                <td class="text-left vMid">Supplier <span class='text-red'>*</span></b></td>
                <td class="text-left">
                  <div class="label_input">
                    <select <?= ($getC) ? 'disabled' : '' ?> class="form-control required w100 select2 id_supplier_input id_needed" name="id_supplier" id="id_supplier" style="width:200px">
                    </select>
                    <?= $getC->id_supplier != '' ? '<input type="hidden" name="id_supplier" value="' . $getC->id_supplier . '">' : '' ?>
                    <label class="label label-danger id_supplier hideIt">Supplier Can't be empty!</label>

                  </div>
                </td>
              </tr>

              <tr id="my-grid-tr-usage">
                <td class="text-left vMid">Usage <span class='text-red'>*</span></b></td>
                <td class="text-left">
                  <label class="label_view">
                    <?= ($getC) ? $getC->usage : '-' ?>
                  </label>
                  <div class="label_input">
                    <?php $usage = array();
                    if ($getC) :
                      $usage = explode(",", $getC->usage);
                    endif; ?>
                    <div class="checkbox">
                      <label><input type="checkbox" class="required" name="usage[]" value="Curtain" <?= (in_array("Curtain", $usage)) ? "checked" : "" ?>> Curtain</label>
                    </div>
                    <div class="checkbox">
                      <label><input type="checkbox" class="required" name="usage[]" value="Lining" <?= (in_array("Lining", $usage)) ? "checked" : "" ?>> Lining</label>
                    </div>
                    <div class="checkbox">
                      <label><input type="checkbox" class="required" name="usage[]" value="Vitrage" <?= (in_array("Vitrage", $usage)) ? "checked" : "" ?>> Vitrage</label>
                    </div>
                    <div class="checkbox">
                      <label><input type="checkbox" class="required" name="usage[]" value="Furniture" <?= (in_array("Furniture", $usage)) ? "checked" : "" ?>> Furniture</label>
                    </div>
                    <label class="label label-danger usage hideIt">Usage Can't be empty!</label>

                  </div>
                </td>
              </tr>

              <tr id="my-grid-tr-furniture_application">
                <td class="text-left vMid">Furniture Application <span class='text-red'>*</span></b></td>
                <td class="text-left">
                  <label class="label_view">
                    <?= ($getC) ? $getC->furniture_application : '-' ?>
                  </label>
                  <div class="label_input">
                    <select class="form-control required select2" name="furniture_application" id="furniture_application" style="width:200px">
                      <option value="">None</option>
                      <option value="indoor" <?= (!empty($getC) && $getC->furniture_application == 'indoor') ? 'selected' : '' ?>>Indoor</option>
                      <option value="outdoor" <?= (!empty($getC) && $getC->furniture_application == 'outdoor') ? 'selected' : '' ?>>Outdoor</option>
                    </select>
                    <label class="label label-danger furniture_application hideIt">Furniture Application Can't be empty!</label>

                  </div>
                </td>
              </tr>

              <tr id="my-grid-tr-curtain_application">
                <td class="text-left vMid">Curtain Application</td>
                <td class="text-left">
                  <label class="label_view">
                    <?= ($getC) ? $getC->curtain_application : '-' ?>
                  </label>
                  <div class="label_input">
                    <select class="form-control select2" name="curtain_application" id="curtain_application" style="width:200px">
                      <option value="">None</option>
                      <option value="Blackout" <?= (!empty($getC) && $getC->curtain_application == 'Blackout') ? 'selected' : '' ?>>Blackout</option>
                      <option value="Dimout" <?= (!empty($getC) && $getC->curtain_application == 'Dimout') ? 'selected' : '' ?>>Dimout</option>
                      <option value="Non Blackout Curtain" <?= (!empty($getC) && $getC->curtain_application == 'Non Blackout Curtain') ? 'selected' : '' ?>>Non Blackout Curtain</option>
                      <option value="Sheer" <?= (!empty($getC) && $getC->curtain_application == 'Sheer') ? 'selected' : '' ?>>Sheer</option>
                    </select>
                    <label class="label label-danger curtain_applicationX hideIt">Curtain Application Can't be empty!</label>

                  </div>
                </td>
              </tr>

              <tr id="my-grid-tr-id_pattern_type">
                <td class="text-left vMid">Pattern Type <span class='text-red'>*</span></b></td>
                <td class="text-left">
                  <div class="label_input">
                    <div class="input-group">
                      <select class="form-control w90 required select2" multiple name="id_pattern_type[]" id="id_pattern_type" style="width:200px">
                      </select>
                      <div class="input-group-btn">
                        <a id="addPatternType" class="btn btn-primary" style="display:inline-block"><i class="fa fa-plus">&nbsp;</i></a>
                      </div>
                    </div>
                    <label class="label label-danger id_pattern_type hideIt">Pattern Type Can't be empty!</label>
                  </div>
                </td>
              </tr>

              <tr id="my-grid-tr-id_pattern_name">
                <td class="text-left vMid">Pattern Name <span class='text-red'>*</span></b></td>
                <td class="text-left">
                  <div class="label_input">
                    <div class="input-group">
                      <select <?= empty($getC->id_product) ? '' : 'disabled' ?> class="form-control input-sm required select2 id_needed" name="id_pattern_name" id="id_pattern_name" style="width:200px">
                      </select>
                      <?= $getC->id_product != '' ? '<input type="hidden" id="id_patt" name="id_pattern_name" value="' . $getC->id_pattern_name . '">' : '' ?>
                      <div class="input-group-btn">
                        <a id="addPatternName" class="btn btn-primary" style="display:inline-block"><i class="fa fa-plus">&nbsp;</i></a>
                      </div>
                    </div>
                    <label class="label label-danger id_pattern_name hideIt">Pattern Name Can't be empty!</label>
                  </div>
                </td>
              </tr>

              <tr id="my-grid-tr-id_colour">
                <td class="text-left vMid">Colour Type <span class='text-red'>*</span></b></td>
                <td class="text-left">
                  <div class="label_input">
                    <select class="form-control input-sm required select2 " multiple name="id_colour[]" id="id_colour" style="width:200px">
                    </select>
                    <label class="label label-danger id_colour hideIt">Colour Can't be empty!</label>

                  </div>
                </td>
              </tr>

              <tr id="my-grid-tr-id_characteristic">
                <td class="text-left vMid">Characteristic <span class='text-red'>*</span></b></td>
                <td class="text-left">
                  <div class="label_input">
                    <select class="form-control input-sm required select2" multiple name="id_characteristic[]" id="id_characteristic" style="width:200px">
                    </select>
                    <label class="label label-danger id_characteristic hideIt">Characteristic Can't be empty!</label>

                  </div>
                </td>
              </tr>

              <!-- <tr id="my-grid-tr-id_brand">
                <td class="text-left vMid">Brand</td>
                <td class="text-left">
                  <label class="label_view">
                    <?= ($getC) ? $name_brand->name_brand : '-' ?>
                  </label>
                  <div class="label_input form-inline">
                    <select class="form-control select2" name="id_brand" id="id_brand" style="margin-right:-18px;width:200px">

                    </select>
                    <a id="addBrand" class="btn btn-sm btn-primary" style="display:inline-block"><i class="fa fa-plus">&nbsp;</i></a>
                    <label class="label label-danger id_brand hideIt">Brand Can't be empty!</label>
                  </div>
                </td>
              </tr> -->

              <tr id="my-grid-tr-id_collection">
                <td class="text-left vMid">Collection</td>
                <td class="text-left">
                  <div class="label_input">
                    <div class="input-group">
                      <select class="form-control select2 id_collection" name="id_collection" id="id_collection" style="margin-right:-18px;width:200px">
                      </select>
                      <div class="input-group-btn">
                        <a id="addCollection" class="btn btn-primary" style="display:inline-block"><i class="fa fa-plus">&nbsp;</i></a>
                      </div>
                    </div>
                    <label class="label label-danger id_collection hideIt">Collection Can't be empty!</label>
                  </div>
                </td>
              </tr>

              <tr id="my-grid-tr-id_class">
                <td class="text-left vMid">Class</td>
                <td class="text-left">
                  <div class="label_input">
                    <div class="input-group">
                      <select class="form-control select2" name="id_class" id="id_class" style="margin-right:-18px;width:200px">
                      </select>
                      <div class="input-group-btn">
                        <a id="addClass" class="btn btn-primary" style="display:inline-block"><i class="fa fa-plus">&nbsp;</i></a>
                      </div>
                    </div>
                    <label class="label label-danger id_class hideIt">Class Can't be empty!</label>
                  </div>
                </td>
              </tr>

              <tr id="my-grid-tr-original_id_product">
                <td class="text-left vMid">Original Code <span class='text-red'>*</span></td>
                <td class="text-left">
                  <div class="label_input">
                    <input type="text" class="form-control input required" name="original_id_product" id="original_id_product" value="<?= !empty($getC->original_id_product) ? $getC->original_id_product : '-' ?>">
                    <label class="label label-danger original_id_product hideIt">Code Can't be empty!</label>
                </td>
              </tr>

              <tr id="my-grid-tr-id_product">
                <td class="text-left vMid">Product Code <span class='text-red'>*</span></b></td>
                <td class="text-left">
                  <div class="label_input">
                    <input type="hidden" name="type" value="<?= empty($getC->id_product) ? 'add' : 'edit' ?>">
                    <div class="input-group">
                      <div class="input-group">
                        <input type="text" readonly class="form-control required" placeholder="Id Product" name="id_product" id="id_product" value="<?= empty($getC->id_product) ? '' : substr($getC->id_product, 0, -4) ?>">
                        <span class="input-group-btn">
                          <input type="text" style="width:150px" <?= empty($getC->id_product) ? '' : 'readonly' ?> class="form-control required" name="id_product_m" id="id_product_m" placeholder="Input Id Product" value="<?= empty($getC->id_product) ? '' : substr($getC->id_product, -3) ?>">
                        </span>
                      </div>
                    </div>
                    <label class="label label-danger id_product_m id_product hideIt">Id Product Can't be empty!</label>
                    </label>
                </td>
              </tr>

              <tr id="my-grid-tr-name_product">
                <td class="text-left vMid">Product Name <span class='text-red'>*</span></b></td>
                <td class="text-left">
                  <div class="label_input">
                    <input type="text" class="form-control required ucfirst" name="name_product" id="name_product" value="<?= empty($getC->name_product) ? '' : $getC->name_product ?>">
                    <label class="label label-danger name_product hideIt">Code Can't be empty!</label>
                    </label>
                </td>
              </tr>

              <tr id="my-grid-tr-activation">
                <td class="text-left vMid">Status <span class='text-red'>*</span></b></td>
                <td class="text-left">
                  <div class="label_input">
                    <select class="form-control required select2" name="activation" id="activation" style="width:200px">
                      <option value="aktif" <?= $getC->activation == 'aktif' ? 'selected' : ''; ?>>Active</option>
                      <option value="nonaktif" <?= $getC->activation == 'nonaktif' ? 'selected' : ''; ?>>Inactive</option>
                    </select>
                    <label class="label label-danger activation hideIt">Status Can't be empty!</label>

                    </label>
                </td>
              </tr>

            </tbody>
          </table>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6">
          <table id="my-grid2" class="table table-striped table-bordered table-hover table-condensed" width="100%">
            <thead>
              <tr style='background-color: #175477; color: white; font-size: 15px;'>
                <th class="text-center" colspan='2'>HEADER PRODUCTIVITY</th>
              </tr>
            </thead>

            <tbody>
              <tr id="my-grid-tr-buy_price">
                <td class="text-left vMid" width="30%">Buy Price</td>
                <td class="text-left">
                  <div class="label_input">
                    <div class="input-group select2-bootstrap-append">
                      <div class="input-group-btn">
                        <select class="form-control input select2_curs" name="buy_price_curs" id="buy_price_curs">
                        </select>
                      </div>
                      <input type="text" class="form-control text-right w50" name="buy_price" id="buy_price" style="display:inline-block" value="<?= empty($getC->buy_price) ? '' : number_format((float) $getC->buy_price, 2) ?>">
                    </div>
                    <label class="label label-danger buy_price hideIt">Buy Price Can't be empty!</label>
                    </label>
                </td>
              </tr>

              <tr id="my-grid-tr-curs">
                <td class="text-left vMid">Curs</td>
                <td class="text-left">
                  <div class="label_input">
                    <div class="input-group select2-bootstrap-append">
                      <div class="input-group-addon">
                        <i>
                          Rp.
                        </i>
                      </div>
                      <input type="text" class="form-control text-right nominal numberOnly" name="curs" id="curs" style="display:inline-block" value="<?= empty($getC->curs) ? '' : number_format($getC->curs) ?>">
                    </div>
                    <label class="label label-danger curs hideIt">Curs Can't be empty!</label>
                    </label>
                </td>
              </tr>

              <tr id="my-grid-tr-pricelist">
                <td class="text-left vMid">Buy Price (Rp)</td>
                <td class="text-left">
                  <div class="label_input">
                    <div class="input-group select2-bootstrap-append">
                      <span class="input-group-addon">
                        IDR
                        <input type="hidden" name="pricelist_curs" id="pricelist_curs" value="IDR">
                        <!-- <select class="form-control input select2_curs" name="pricelist_curs" id="pricelist_curs">
                        </select> -->
                      </span>
                      <input type="text" readonly class="form-control  text-right nominal numberOnly" name="pricelist" id="pricelist" style="display:inline-block" value="<?= empty($getC->pricelist) ? '' : number_format($getC->pricelist) ?>">
                    </div>
                    <label class="label label-danger pricelistX hideIt">Price List Can't be empty!</label>
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
                    <div class="input-group select2-bootstrap-append">
                      <input type="text" class="form-control input" name="moq" id="moq" value="<?= empty($getC->moq) ? '' : $getC->moq ?>" multiple>
                      <div class="input-group-btn">
                        <select class="form-control input select2_150" name="id_uom" id="id_uom">

                        </select>
                      </div>
                    </div>

                    <label class="label label-danger moqX hideIt">Moq Can't be empty!</label>

                    </label>
                </td>
              </tr>

              <tr id="my-grid-tr-product_status">
                <td class="text-left vMid">Status <span class='text-red'>*</span></b></td>
                <td class="text-left">
                  <label class="label_view">
                    <?= ($getC) ? $getC->product_status : '-' ?>
                  </label>
                  <div class="label_input">
                    <div class="input-group select2-bootstrap-append">
                      <div class="input-group-btn">
                        <select class="form-control required select2" name="product_status" id="product_status" onchange="get_reason(this.value);" style="width:200px">
                          <option value="">None</option>
                          <option value="Indent" <?= $getC->product_status == 'Indent' || $getC->product_status == 'INDENT' ? 'selected' : ''; ?>>Indent</option>
                          <option value="Stock" <?= $getC->product_status == 'Stock' || $getC->product_status == 'STOCK'  ? 'selected' : ''; ?>>Stock</option>
                          <option value="Discontinued" <?= $getC->product_status == 'Discontinued' ? 'selected' : ''; ?>>Discontinued</option>
                        </select>
                        <div class="status_reason_view hideIt">
                          <select class="form-control select2" name="product_status_reason" id="product_status_reason">
                            <option value="">None</option>
                            <option value="Not Producted Anymore">Not Producted Anymore</option>
                            <option value="Factory isn't open anymore">Factory isn't open anymore</option>
                          </select>
                        </div>
                      </div>

                    </div>

                    <label class="label label-danger product_status hideIt">Status Can't be empty!</label>

                    </label>
                </td>
              </tr>

              <tr id="my-grid-tr-id_country">
                <td class="text-left vMid">Country of Origin </td>
                <td class="text-left">
                  <label class="label_view">
                    <?= ($getC) ? $name_country->name_country : '-' ?>
                  </label>
                  <div class="label_input">
                    <select class="form-control input-sm select2" name="id_country" id="id_country" style="width:200px">
                    </select>
                    <label class="label label-danger id_countryX hideIt">Country of Origin Can't be empty!</label>

                    </label>
                </td>
              </tr>

              <tr id="my-grid-tr-similar_name">
                <td class="text-left vMid">Similar Name</td>
                <td class="text-left">
                  <div class="label_input">
                    <select class="form-control select2" name="similar_name[]" id="similar_name" style="width:250px;display:block" multiple>
                    </select>
                    <label class="label label-danger similar_name hideIt">Similar Name Can't be empty!</label>
                    </label>
                </td>
              </tr>

              <!--
            <tr>
              <td class="text-left vMid">Status</td>
              <td class="text-left">
                <select class="form-control select2" name="activation" >
                  <option value="active">Active</option>
                  <option value="inactive">Inactive</option>
                </select>
              </td>
            </tr>
            -->
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="row">
          <div class="col-sm-12" style='background-color: #175477; color: white; font-size: 15px; text-align:center; padding:1%; width:95%; margin-left:2.5%'>
            <strong>
              DETAIL <span class='text-red'>*</span></b>
            </strong>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-7 col-md-7 col-sm-12" style='padding:1%;margin-left:2.75%'>
            <div class="row 1_content ">
              <div class="col-sm-3 soft-border">
                <label for="content">
                  Content <span class='text-red'>*</span></b>
                </label>
                <span style="float:right">:</span>
              </div>
              <div class="col-sm-7 form-horizontal content_build">
                <?php
                $data_content = explode(",", $getC->content_percent);
                $no = 0;
                foreach ($data_content as $key => $val_con) {
                  $no++ ?>
                  <div class="content_class">
                    <label class="label_input">
                      <div class="input-group">
                        <input type="text" class="form-control" name="content_percent[]" placeholder="Content Percentage" value="<?= $val_con ?>">
                        <span class="input-group-btn">
                          <button type="button" class="deleteContent btn btn-danger">x</button>
                        </span>
                      </div>
                      <small class="text-red id_content hideIt">Content Can't be empty!</small>
                    </label>
                  </div>
                <?php } ?>

              </div>
              <div class="col-sm-2 form-horizontal">
                <div class="input-group select2-bootstrap-append">
                  <!-- <div class="input-group-btn">
                    <a id="addContent" class="btn btn-sm btn-primary"><i class="fa fa-plus">&nbsp; Content</i></a>
                  </div> -->
                  <div class="input-group-btn">
                    <a id="addListContent" class="btn btn-sm btn-success"><i class="fa fa-plus">&nbsp; List</i></a>
                  </div>
                </div>
              </div>
            </div>
            <hr>
            <div class="row 2_spesification ">
              <div class="col-sm-3 soft-border">
                <label>
                  Spesification
                </label>
                <span style="float:right">:</span>
              </div>
              <div class="col-sm-9 form-horizontal bordered">
                <div class="form-group">

                  <div class="list_spec mb-1 2_1_judul">
                    <label>
                      Abration/Durability
                    </label>
                  </div>
                  <div class="list_spec mb-1 2_1_1_martindale">
                    <div class="form-inline mb-1">
                      <div class="col-md-4 col-sm-12">
                        <li>
                          <label for="martindale">Martindale</label>
                          <span style="float:right">:</span>
                        </li>
                      </div>
                      <div class="col-md-8 col-sm-12">
                        <div class="label_view mb-1">
                          <?= $getD->martindale ?>
                        </div>
                        <div class="label_input inline mb-1">
                          <div class=" select2-bootstrap-append">
                            <div class="form-group col-md-6">
                              <div class="input-group">
                                <input type="text" class="form-control" name="martindale" placeholder="" value="<?= empty($getC->martindale) ? '' : $getC->martindale ?>">
                                <span class="input-group-addon">rubs</span>
                              </div>
                            </div>
                            <div class="form-group col-md-6">
                              <div class="input-group">
                                <span class="input-group-addon">ISO</span>
                                <div class="input-group-btn">
                                  <input type="text" name="martindale_iso" class="form-control" id="martindale_iso" multiple value="<?= empty($getC->martindale_iso) ? '' : $getC->martindale_iso; ?>">
                                  <!-- <select class="form-control iso select2_curs" name="martindale_iso" id="martindale_iso" multiple></select> -->
                                  <!-- <a id="addWyzenbeek_iso" class="btn btn-primary iso_add" style="display:inline-block"><i class="fa fa-plus">&nbsp;</i></a> -->
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="list_spec mb-1 2_1_2_wyzenbeek">
                    <div class="form-inline mb-1">
                      <div class="col-md-4 col-sm-12">
                        <li>
                          <label for="wyzenbeek">Wyzenbeek</label>
                          <span style="float:right">:</span>
                        </li>
                      </div>
                      <div class="col-md-8 col-sm-12">
                        <div class="label_view mb-1">
                          <?= $getD->wyzenbeek ?>
                        </div>
                        <div class="label_input inline mb-1">
                          <div class=" select2-bootstrap-append">
                            <div class="form-group col-md-6">
                              <div class="input-group">
                                <input type="text" class="form-control" name="wyzenbeek" placeholder="" value="<?= empty($getC->wyzenbeek) ? '' : $getC->wyzenbeek ?>">
                                <span class="input-group-addon">rubs</span>
                              </div>
                            </div>
                            <div class="form-group col-md-6">
                              <div class="input-group">
                                <span class="input-group-addon">ISO</span>
                                <div class="input-group-btn">
                                  <input type="text" name="wyzenbeek_iso" class="form-control" id="wyzenbeek_iso" multiple value="<?= empty($getC->wyzenbeek_iso) ? '' : $getC->wyzenbeek_iso; ?>">
                                  <!-- <select class=" form-control iso select2_curs" name="wyzenbeek_iso" id="wyzenbeek_iso" multiple></select> -->
                                  <!-- <a id="addWyzenbeek_iso" class="btn btn-primary iso_add" style="display:inline-block"><i class="fa fa-plus">&nbsp;</i></a> -->
                                </div>
                              </div>
                            </div>
                          </div>
                          <label class="label label-danger martindale hideIt" style="">Wyzenbeek Can't be empty!</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="list_spec mb-1 2_3_fire_reterdant">
                    <div class="form-inline">
                      <div class="col-md-4 col-sm-12">
                        <label class="row" for="fire_reterdant">Fire Reterdant</label>
                        <span style="float:right">:</span>
                      </div>

                      <div class="col-md-8 col-sm-12">
                        <div class="label_view">
                          <?= $getD->fire_reterdant ?>
                        </div>
                        <div class="label_input inline">
                          <div class="input-group select2-bootstrap-append">
                            <select class="form-control select2" name="fire_reterdant" id="fire_reterdant" style="width:150%;display:block">
                              <option value=""></option>
                              <option value="Certified" <?= $getC->fire_reterdant == 'Certified' ? 'selected' : '' ?>>Certified</option>
                              <option value="Not Certified" <?= $getC->fire_reterdant == 'Not Certified' ? 'selected' : '' ?>>Not Certified</option>
                            </select>
                          </div>
                          <label class="label label-danger fire_reterdant hideIt" style="">Fire Reterdant Can't be empty!</label>
                        </div>
                      </div>

                    </div>
                  </div>
                  <div class="list_spec mb-1 2_4_water_repellent">
                    <div class="form-inline">
                      <div class="col-md-4 col-sm-12">
                        <label class="row" for="water_repellent">Water Repellent</label>
                        <span style="float:right">:</span>
                      </div>

                      <div class="col-md-8 col-sm-12">
                        <div class="label_view">
                          <?= $getD->water_repellent ?>
                        </div>
                        <div class="label_input inline">
                          <div class="input-group select2-bootstrap-append">
                            <select class="form-control select2" name="water_repellent" id="water_repellent" style="width:150%;display:block">
                              <option value=""></option>
                              <option value="Yes" <?= $getC->water_repellent == 'Yes' ? 'selected' : '' ?>>Yes</option>
                              <option value="No" <?= $getC->water_repellent == 'No' ? 'selected' : '' ?>>No</option>
                            </select>
                          </div>
                          <label class="label label-danger water_repellent hideIt" style="">Water Repellent Can't be empty!</label>
                        </div>
                      </div>

                    </div>
                  </div>
                  <div class="list_spec mb-1 2_5_stain_resistant">
                    <div class="form-inline">
                      <div class="col-md-4 col-sm-12">
                        <label class="row" for="stain_resistant">Stain Resistant</label>
                        <span style="float:right">:</span>
                      </div>

                      <div class="col-md-8 col-sm-12">
                        <div class="label_view">
                          <?= $getD->stain_resistant ?>
                        </div>
                        <div class="label_input inline">
                          <div class="input-group select2-bootstrap-append">
                            <select class="form-control select2" name="stain_resistant" id="stain_resistant" style="width:150%;display:block">
                              <option value=""></option>
                              <option value="Yes" <?= $getC->stain_resistant == 'Yes' ? 'selected' : '' ?>>Yes</option>
                              <option value="No" <?= $getC->stain_resistant == 'No' ? 'selected' : '' ?>>No</option>
                            </select>
                          </div>
                          <label class="label label-danger stain_resistant hideIt" style="">Stain Resistant Can't be empty!</label>
                        </div>
                      </div>

                    </div>
                  </div>

                </div>
              </div>
            </div>
            <hr>
            <div class="row 3_size">
              <div class="col-sm-3 soft-border">
                <label>
                  Size
                </label>
                <span style="float:right">:</span>
              </div>
              <div class="col-sm-9 form-horizontal">
                <div class="form-group">
                  <div class="list_spec mb-1 3_1_width">
                    <div class="form-inline">
                      <div class="col-md-4 col-sm-12">
                        <label class="row" for="width">Width <span class='text-red'>*</span></b></label>
                        <span style="float:right">:</span>
                      </div>

                      <div class="col-md-8 col-sm-12">
                        <div class="label_view">
                          <?= $getD->width ?>
                        </div>
                        <div class="label_input inline">
                          <div class="input-group">
                            <input type="text" class="form-control required numberOnly" name="width" placeholder="Width" value="<?= empty($getC->width) ? '' : $getC->width ?>">
                            <span class="input-group-addon">CM</span>
                          </div>
                          <label class="label label-danger width hideIt" style="">Width Can't be empty!</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="list_spec mb-1 3_2_weight">
                    <div class="form-inline">
                      <div class="col-md-4 col-sm-12">
                        <label class="row" for="width">Weight <span class='text-red'>*</span></b></label>
                        <span style="float:right">:</span>
                      </div>

                      <div class="col-md-8 col-sm-12">
                        <div class="label_view">
                          <?= $getD->weight ?>
                        </div>
                        <div class="label_input inline">
                          <div class="input-group">
                            <input type="text" class="form-control required numberOnly" name="weight" placeholder="Weight" value="<?= empty($getC->weight) ? '' : $getC->weight ?>">
                            <span class="input-group-addon">gsm</span>
                          </div>
                          <label class="label label-danger weight hideIt" style="">Weight Can't be empty!</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="list_spec mb-1 3_3_judul">
                    <label>
                      Repeat Size :
                    </label>
                  </div>
                  <div class="list_spec mb-1 3_3_1_horizontal">
                    <div class="form-inline">
                      <div class="col-md-4 col-sm-12">
                        <li>
                          <label for="horizontal">Horizontal</label>
                          <span style="float:right">:</span>
                        </li>
                      </div>
                      <div class="col-md-8 col-sm-12">
                        <div class="label_view">
                          <?= $getD->horizontal ?>
                        </div>
                        <div class="label_input inline">
                          <div class="input-group">
                            <input type="text" class="form-control w50" name="horizontal" id="horizontal" placeholder="Horizontal Percentage" value="<?= empty($getC->horizontal) ? '' : $getC->horizontal ?>">
                            <span class="input-group-addon">CM</span>
                          </div>
                          <label class="label label-danger horizontal hideIt" style="">Horizontal Can't be empty!</label>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="list_spec mb-1 3_3_2_vertical">
                    <div class="form-inline">
                      <div class="col-md-4 col-sm-12">
                        <li>
                          <label for="vertical">Vertical</label>
                          <span style="float:right">:</span>
                        </li>
                      </div>
                      <div class="col-md-8 col-sm-12">
                        <div class="label_view">
                          <?= $getD->vertical ?>
                        </div>
                        <div class="label_input inline">
                          <div class="input-group">
                            <input type="text" class="form-control w50" name="vertical" id="vertical" placeholder="Vertical Percentage" value="<?= empty($getC->vertical) ? '' : $getC->vertical ?>">
                            <span class="input-group-addon">CM</span>
                          </div>
                          <label class="label label-danger vertical hideIt" style="">Vertical Can't be empty!</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <hr>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12" style='padding:1%;margin-left:5%'>
            <div class="form-group">
              <div class="row mb-1 4_1_color_fastness">
                <div class="form-inline">
                  <div class="col-md-4 col-sm-12">
                    <label class="row" for="width">Color Fastness (Grade) </label>
                    <span class='text-red'>*</span></b>
                    <span style="float:right">:</span>
                  </div>

                  <div class="col-md-8 col-sm-12">
                    <div class="label_view">
                      <?= $getD->color_fastness ?>
                    </div>
                    <div class="label_input inline">
                      <div class="input-group">
                        <!--<input type="text" class="form-control required numberOnly" name="color_fastness" placeholder="Width" value="<?= empty($getC->color_fastness) ? '' : $getC->color_fastness ?>">-->
                        <select class="form-control required" name="color_fastness" id="color_fastness">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                        </select>
                      </div>
                      <label class="label label-danger color_fastness hideIt" style="">Width Can't be empty!</label>
                    </div>
                  </div>

                </div>
              </div>
              <div class="row mb-1 4_2_anti_bacterial">
                <div class="form-inline">
                  <div class="col-md-4 col-sm-12">
                    <label class="row" for="width">Anti Bacterial </label>
                    <span class='text-red'>*</span></b>
                    <span style="float:right">:</span>
                  </div>

                  <div class="col-md-8 col-sm-12">
                    <div class="label_view">
                      <?= $getD->anti_bacterial ?>
                    </div>
                    <div class="label_input inline">
                      <div class="input-group select2-bootstrap-append">
                        <div class="input-group-btn">
                          <select class="form-control select2_150" name="anti_bacterial" id="anti_bacterial">
                            <option value=""></option>
                            <option value="Yes" <?= $getC->anti_bacterial == 'Yes' ? 'selected' : ''; ?>>Yes</option>
                            <option value="No" <?= $getC->anti_bacterial == 'No' ? 'selected' : ''; ?>>No</option>
                          </select>
                        </div>

                      </div>
                      <label class="label label-danger anti_bacterial hideIt" style="">Anti Bacterial Can't be empty!</label>
                    </div>
                  </div>

                </div>
              </div>
              <div class="row mb-1 4_3_additional_features">
                <div class="form-inline">
                  <div class="col-md-4 col-sm-12">
                    <label class="row" for="width">Additional Features </label>
                    <span class='text-red'>*</span></b>
                    <span style="float:right">:</span>
                  </div>

                  <div class="col-md-8 col-sm-12">
                    <div class="label_view">
                      <?= $getD->additional_features ?>
                    </div>
                    <div class="label_input inline">
                      <div class="input-group select2-bootstrap-append">
                        <div class="input-group-btn">
                          <select class="form-control select2_150" name="additional_features" id="additional_features">
                            <!-- <option value=""></option> -->
                          </select>
                          <a id="addFeature" class="btn btn-primary" style="display:inline-block"><i class="fa fa-plus">&nbsp;</i></a>
                        </div>

                      </div>
                      <label class="label label-danger additional_features hideIt" style="">Additional Features Can't be empty!</label>
                    </div>
                  </div>

                </div>
              </div>
              <div class="row mb-1 4_4_care_instruction">
                <div class="form-inline">
                  <div class="col-md-4 col-sm-12">
                    <label class="row" for="width">Care Instruction </label>
                    <span class='text-red'>*</span></b>
                    <span style="float:right">:</span>
                  </div>

                  <div class="col-md-8 col-sm-12">
                    <div class="label_view">
                      <?= $getD->additional_features ?>
                    </div>
                    <div class="label_input">
                      <div class="input-group select2-bootstrap-append">
                        <div class="ci_list">
                          <?php
                          if (!empty($getC->ci_val)) {
                            $list = explode(",", $getC->ci_val);
                            foreach ($list as $key => $af) {
                              echo "<li>" . $af . "</li><br>";
                            }
                          } ?>

                        </div>
                        <div class="input-group-btn">
                          <input type="hidden" name="ci_val" id="ci_val" value="">
                          <input type="hidden" name="ci_show" id="ci_show" value="">
                          <a id="addCi" class="btn btn-primary" style="display:inline-block"><i class="fa fa-plus">&nbsp;</i></a>
                          <!--
                        -->
                        </div>

                      </div>
                      <label class="label label-danger additional_features hideIt" style="">Additional Features Can't be empty!</label>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <?php
      echo form_button(array('type' => 'button', 'class' => 'btn btn-md btn-success label_input', 'style' => 'min-width:100px; float:right;', 'value' => 'save', 'content' => 'Save', 'id' => 'addFabricSave')) . ' ';
      ?>
    </div>
  </div>
</form>

<style>
  #content>.select2-container {
    /* width: 100% !important; */
  }

  .soft-border {
    border: 0 0 2px 0 !important;
    border-color: #b9a4a4;
    background-image: linear-gradient(to right, #6075af, white) !important;
  }

  .list_spec {
    padding-left: 2% !important;
  }

  .select2-selection--single {
    height: 100% !important;
  }

  .select2-selection__rendered {
    word-wrap: break-word !important;
    text-overflow: inherit !important;
    white-space: normal !important;
  }
</style>

<script type="text/javascript">
  $('.content_build').on('click', '.deleteContent', function() {
    //console.log('a');
    $(this).parents('.content_class').remove();
    if (parseInt($(".content_class").length) == 0) {
      var x = 1;
    } else {
      var x = parseInt($(".content_class").length) + 1;
    }
    for (var i = 0; i < x; i++) {
      $('.numbering_picoffice').eq(i - 1).text(i);
    }
    /*if (parseInt(document.getElementById("tfoot-pic").rows.length) == 0) {
      var x=1;
    }else {
      var x = parseInt(document.getElementById("tfoot-pic").rows.length)+1;
    }
    for (var i = 0; i < x; i++) {
      $('.numbering').eq(i-1).text(i);
    }*/
  });

  $(document).on('blur', '#curs,#buy_price', function() {
    var buy_price = $('#buy_price').val().replace(/,/g, "");

    var curs = $('#curs').val().replace(/,/g, "");
    pricelist = parseFloat(buy_price) * parseInt(curs);
    if (isNaN(pricelist)) {
      $('#pricelist').val('0');
    } else {
      // $('#pricelist').val(pricelist);
      $('#pricelist').val(("" + pricelist).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
    }
  });

  $(document).ready(function() {

    $(".datepicker").datepicker({
      format: "yyyy-mm-dd",
      showInputs: true,
      autoclose: true
    });
    $(".select2").select2({
      theme: "bootstrap",
      placeholder: "Choose An Option",
      allowClear: true,
      width: '100%',
      dropdownParent: $("#form-fabric")
    });
    $(".select2_curs").select2({
      theme: "bootstrap",
      placeholder: "Choose An Option",
      allowClear: true,
      width: '100',
      dropdownParent: $("#form-fabric")
    });
    $(".select2_150").select2({
      theme: "bootstrap",
      placeholder: "Choose An Option",
      allowClear: true,
      width: '150',
      dropdownParent: $("#form-fabric")
    });

    jQuery(document).on('keyup', '.bank_num', function() {
      var foo = $(this).val().split("-").join(""); // remove hyphens
      if (foo.length > 0) {
        foo = foo.match(new RegExp('.{1,4}', 'g')).join("-");
      }
      $(this).val(foo);
    });

    jQuery(document).on('change', '.id_supplier_input', function() {
      getPatternName();
      //console.log('OKAY');
    });

    $(document).on('click', '#saveSelBrand', function(e) {
      var formdata = $("#form-selBrand").serialize();
      var selected = '';
      $('#my-grid input:checked').each(function() {
        //selected.push($(this).val());
        selected = selected + $(this).val() + ';';
      });
      //console.log(selected);
      $('#id_brand').val(selected);
      $("#ModalView2").modal('hide');
    });

    $(document).on('click change keyup paste blur', '#form-fabric .form-control', function(e) {
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
    $(document).on('click change keyup paste blur', '#form-fabric .id_needed', function(e) {
      var id_supplier = $('#id_supplier').val();
      var id_pattern_name = $('#id_pattern_name').val();
      var id_colour = $('#id_colour').val();

      $('#id_product').val(id_pattern_name);
      if (id_pattern_name != '') {
        $.ajax({
          url: siteurl + active_controller + "getID",
          dataType: "json",
          type: 'POST',
          data: {
            id: id_pattern_name
          },
          success: function(result) {
            $('#id_product_m').val(result.id);
          },
          error: function(request, error) {
            console.log(arguments);
            alert(" Can't do because: " + error);
          }
        });
      } else {
        // swal({
        //   title: "Warning!",
        //   text: "Complete Supplier name first, please!",
        //   type: "warning",
        //   timer: 3500,
        //   showConfirmButton: false
        // });
        return false;
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
  getPatternType();
  getColour();
  getCharacteristic();
  getCollection();
  getClass();
  getFeature();
  getCurs();
  getContent();
  getUOM();
  getCursPricelist();
  getSimilar();
  getPatternName();
  getCountry();

  function getCountry() {
    if ('<?= ($getC->id_country) ?>' != null) {
      var id_selected = '<?= $getC->id_country ?>';
    } else if ($('#id_country').val() != null || $('#id_country').val() != '') {
      var id_selected = $('#id_country').val();
    } else {
      var id_selected = '';
    }
    //console.log(id_selected);
    var column = '';
    var column_fill = '';
    var column_name = 'name_country';
    var table_name = 'master_country';
    var key = 'id_country';
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
        $('#id_country').html(result.html);
      },
      error: function(request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });

  }

  function getSupplier() {
    if ('<?= $getC->id_supplier ?>' != null) {
      var id_selected = '<?= $getC->id_supplier ?>';
    } else if ($('#id_supplier').val() != null || $('#id_supplier').val() != '') {
      var id_selected = $('#id_supplier').val();
    } else {
      var id_selected = '';
    }
    // alert(id_selected)
    console.log(id_selected);
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

  function getPatternType() {
    var pattern_type = <?php echo json_encode(explode(",", $getC->id_pattern_type)); ?>;
    var id_selected = 'multiple';

    //console.log(id_selected);
    var column = '';
    var column_fill = '';
    var column_name = 'name_pattern_type';
    var table_name = 'master_pattern_type';
    var key = 'id_pattern_type';
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
        $('#id_pattern_type').html(result.html);
        $('#id_pattern_type').val(pattern_type);
      },
      error: function(request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });

  }

  function getPatternName() {
    if ('<?= ($getC->id_pattern_name) ?>' != '') {
      var id_selected = '<?= $getC->id_pattern_name ?>';
    } else if ($('#id_pattern_name').val() != null || $('#id_pattern_name').val() != '') {
      var id_selected = $('#id_pattern_name').val();
    } else {
      var id_selected = '';
    }
    var id_sup = '<?= (empty($getC)) ? "" : $getC->id_supplier ?>';
    // alert(id_sup);
    // alert(id_selected);
    if (id_sup == '') {
      id_sup = $('#id_supplier').val();
    }
    console.log(id_sup);
    //console.log($('#id_supplier').val());
    var column = 'id_supplier';
    var column_fill = id_sup;
    var column_name = 'name_pattern';
    var table_name = 'child_supplier_pattern';
    var key = 'id_pattern';
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
        $('#id_pattern_name').html(result.html);
        // $('#similar_name').html(result.html);
      },
      error: function(request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });

  }

  function getColour() {
    var color_type = <?php echo json_encode(explode(",", $getC->id_colour)); ?>;
    var id_selected = 'multiple';
    //console.log(id_selected);
    var column = '';
    var column_fill = '';
    var column_name = 'name_colour';
    var table_name = 'master_colour';
    var key = 'id_colour';
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
        $('#id_colour').html(result.html);
        $('#id_colour').val(color_type);
      },
      error: function(request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });

  }

  function getCharacteristic() {
    var character = <?php echo json_encode(explode(",", $getC->id_characteristic)); ?>;
    var id_selected = 'multiple';
    //console.log(id_selected);
    var column = '';
    var column_fill = '';
    var column_name = 'name_characteristic';
    var table_name = 'master_product_characteristic';
    var key = 'id_characteristic';
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
        $('#id_characteristic').html(result.html);
        $('#id_characteristic').val(character);
      },
      error: function(request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });

  }

  function getCollection() {
    if ('<?= ($getC->id_collection) ?>' != null) {
      var id_selected = '<?= $getC->id_collection ?>';
    } else if ($('#id_collection').val() != null || $('#id_collection').val() != '') {
      var id_selected = $('#id_collection').val();
    } else {
      var id_selected = '';
    }
    //console.log(id_selected);
    var column = '';
    var column_fill = '';
    var column_name = 'name_collection';
    var table_name = 'master_product_collection';
    var key = 'id_collection';
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
        $('#id_collection').html(result.html);
      },
      error: function(request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });

  }

  function getClass() {
    if ('<?= ($getC->id_class) ?>' != null) {
      var id_selected = '<?= $getC->id_class ?>';
    } else if ($('#id_class').val() != null || $('#id_class').val() != '') {
      var id_selected = $('#id_class').val();
    } else {
      var id_selected = '';
    }
    //console.log(id_selected);
    var column = '';
    var column_fill = '';
    var column_name = 'name_class';
    var table_name = 'master_product_class';
    var key = 'id_class';
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
        $('#id_class').html(result.html);
      },
      error: function(request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });

  }

  function getFeature() {
    if ('<?= ($getC->additional_features) ?>' != null) {
      var id_selected = '<?= $getC->additional_features ?>';
    } else if ($('#additional_features').val() != null || $('#additional_features').val() != '') {
      var id_selected = $('#additional_features').val();
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

  function getCurs() {
    if ('<?= ($getC->buy_price_curs) ?>' != '') {
      var id_selected = '<?= $getC->buy_price_curs ?>';
    } else {
      var id_selected = '6';
    }
    // alert(id_selected);
    //console.log(id_selected);
    var column = '';
    var column_fill = '';
    var column_name = 'kode';
    var table_name = 'mata_uang';
    var key = 'id_kurs';
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
        $('#buy_price_curs').html(result.html);
        // $('#pricelist_curs').html(result.html);
      },
      error: function(request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });

  }

  function getCursPricelist() {
    if ('<?= ($getC->pricelist_curs) ?>' != null) {
      var id_selected = '<?= $getC->pricelist_curs ?>';
    } else if ($('#pricelist_curs').val() != null || $('#pricelist_curs').val() != '') {
      var id_selected = $('#pricelist_curs').val();
    } else {
      var id_selected = '';
    }
    // alert(id_selected);
    //console.log(id_selected);
    var column = '';
    var column_fill = '';
    var column_name = 'kode';
    var table_name = 'mata_uang';
    var key = 'id_kurs';
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
        // $('#buy_price_curs').html(result.html);
        $('#pricelist_curs').html(result.html);
      },
      error: function(request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });

  }

  function getContent() {
    if ('<?= ($getC->id_content) ?>' != null) {
      var id_selected = '<?= $getC->id_content ?>';
    } else if ($('#id_content' + x).val() != null || $('#id_content' + x).val() != '') {
      var id_selected = $('#id_content' + x).val();
    } else {
      var id_selected = '';
    }
    //console.log(id_selected);
    var column = '';
    var column_fill = '';
    var column_name = 'name_content';
    var table_name = 'master_product_content';
    var key = 'id_content';
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
        $('.id_content').html(result.html);
      },
      error: function(request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });

  }

  function getCodeCountry() {

    var id_selected = $('#id_country').val();
    //console.log(id_selected);
    var column = 'code';
    var column_fill = '';
    var column_name = 'name_country';
    var table_name = 'master_country';
    var key = 'id_country';
    var act = 'free';
    $.ajax({
      url: siteurl + active_controller + "getVal",
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
        $('.telephone_code').val(result.html);
      },
      error: function(request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });

  }

  function getSupplierType() {
    if ('<?= ($getC->id_type) ?>' != null) {
      var id_selected = '<?= $getC->id_type ?>';
    } else if ($('#id_type').val() != null || $('#id_type').val() != '') {
      var id_selected = $('#id_type').val();
    } else {
      var id_selected = '';
    }
    var column = '';
    var column_fill = '';
    var column_name = 'name_type';
    var table_name = 'child_supplier_type';
    var key = 'id_type';
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
        $('#id_type').html(result.html);
      },
      error: function(request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });

  }

  function getSimilar() {
    var similar = <?php echo json_encode(explode(";", $getC->similar_name)); ?>;
    var id_selected = 'multiple';

    var id_sup = '<?= (empty($getC)) ? "" : $getC->id_supplier ?>';
    if (id_sup == '') {
      id_sup = $('#id_supplier').val();
    }
    //console.log(id_selected);
    var column = 'id_pattern_type';
    var column_fill = similar;
    var column_name = 'name_product';
    var table_name = 'master_product_fabric';
    var key = 'id_product';
    var act = '';
    $.ajax({
      url: siteurl + active_controller + "getSimilar",
      // url: siteurl + active_controller + "getOpt",
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
        $('#similar_name').html(result.html);
        $('#similar_name').val(similar);
        // alert(similar)
      },
      error: function(request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });

  }

  function getBrand() {
    var id_brand = <?php echo json_encode(explode(";", $getC->id_brand)); ?>;
    var id_selected = 'multiple';
    //console.log(id_selected);
    var column = '';
    var column_fill = '';
    var column_name = 'name_brand';
    var table_name = 'master_product_brand';
    var key = 'id_brand';
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
        $('#id_brand').html(result.html);
        $('#id_brand').val(id_brand);
      },
      error: function(request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });

  }

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
        $('#id_uom').html(result.html);
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
            scrollTop: $("#form-rail").offset().top
          }, 2000);
          count = count + 1;
        }

      } else if ((node == 'INPUT' && type == 'text') || (node == 'SELECT') || (node == 'TEXTAREA') || (node == 'INPUT' && type == 'number')) {
        if ($(this).val() == null || $(this).val() == '') {
          var name = $(this).attr('id');

          // name.replace('[]', '');
          $('.' + name).removeClass('hideIt');
          $('.' + name).css('display', 'inline-block');

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

  function readURL(input) {
    console.log('XC');
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#blah')
          .attr('src', e.target.result)
          .width(150)
          .height(200);
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
</script>