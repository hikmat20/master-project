<?php

if (!empty($this->uri->segment(3))) {
  $getC                 = $this->db->get_where('master_product_fabric',array('id_product'=>$id))->row();
  $name_supplier        = $this->db->get_where('master_supplier',array('id_supplier'=>$getC->id_supplier))->row();
  $name_country         = $this->db->get_where('master_country',array('id_country'=>$getC->id_country))->row();
  $name_pattern_type    = $this->db->get_where('master_pattern_type',array('id_pattern_type'=>$getC->id_pattern_type))->row();
  $name_pattern_name    = $this->db->get_where('child_supplier_pattern',array('id_pattern'=>$getC->id_pattern_name))->row();
  $name_colour          = $this->db->get_where('master_product_colour',array('id_colour'=>$getC->id_colour))->row();
  $name_characteristic  = $this->db->get_where('master_product_characteristic',array('id_characteristic'=>$getC->id_characteristic))->row();
  $name_collection      = $this->db->get_where('master_product_collection',array('id_collection'=>$getC->id_collection))->row();
  $name_class           = $this->db->get_where('master_product_class',array('id_class'=>$getC->id_class))->row();
  $name_feature         = $this->db->get_where('master_product_feature',array('id_feature'=>$getC->id_feature))->row();
  $name_content         = $this->db->get_where('master_product_content',array('id_content'=>$getC->id_content))->row();
  $name_brand           = $this->db->get_where('master_product_brand',array('id_brand'=>$getC->id_brand))->row();
  $name_buy_price_curs  = $this->db->get_where('mata_uang',array('id_kurs'=>$getC->buy_price_curs))->row();
  $name_pricelist_curs  = $this->db->get_where('mata_uang',array('id_kurs'=>$getC->pricelist_curs))->row();
}
if ($this->uri->segment(4) == 'view') {
  $view = 'style="display:block"';
}else {
  $mode = 'input';
}

?>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.9/select2-bootstrap.css" rel="stylesheet" />
<div id="form-product" enctype="multipart/form-data">
  <div class="box box-success">
	<div class="box-body" style="">
    <div class="row">
      <div class="col-sm-12">
        <table class="table table-striped table-bordered table-hover table-condensed" width="100%">
          <tr>
            <th>
              <select class="form-control select2 type_accesories" name="type_accesories" style="width:100%">
                <option value="">None</option>
                <option value="Component">Component</option>
                <option value="Non Component">Non Component</option>
              </select>
            </th>
          </tr>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="row NonComponent hideIt">
        <div class="col-sm-12">
          <form class="" id="NonComponent" action="" method="post">
            <div class="col-sm-12 col-md-6 col-lg-6">
              <table id="NonComponent_left" class="table table-striped table-bordered table-hover table-condensed" width="100%">
                <tbody>
                  <tr style='background-color: #175477 !important; color: white; font-size: 15px !important;'>
                    <th class="text-center" colspan='2'>HEADER PRODUCT IDENTITY</th>
                  </tr>

                  <tr id="my-grid-tr-product_photo">
                    <td class="text-left vMid" width="22.5%">Photo <span class='text-red'>*</span></b></td>
                    <td class="text-left">
                      <label class="label_view">
                        <?=($getC)?$getC->product_photo:'-'?>
                      </label>
                      <label class="label_input">
                        <?php
                        echo form_input(array('type'=>'file','id'=>'nc_product_photo', "data-type_form"=>"nc",'name'=>'product_photo','class'=>'form-control input-sm required w50', 'onchange'=>"readURL(this);", 'placeholder'=>'Photo','autocomplete'=>'off','value'=>empty($getC->product_photo)?'':$getC->product_photo))
                        ?>
                        <img id="blah" src="<?=empty($getC)?'':base_url('assets/img/master_curtain/'.$getC->photo_product)?>" alt="" style="display:inline-block" width="100" />
                        <label class="label label-danger product_photo hideIt">Photo Can't be empty!</label>
                        <input type="hidden" name="filelama" id="filelama" class="form-control" value="<?= ($getC)?$getC->product_photo:''?>">
                      </label>
                    </td>
                  </tr>

                  <tr id="my-grid-tr-id_product">
                    <td class="text-left vMid">Item Code <span class='text-red'>*</span></b></td>
                    <td class="text-left">
                      <label class="label_view">
                        <?=$getC->id_product?>
                      </label>
                      <div class="label_input">
                        <input type="hidden" name="type" value="<?=empty($getC->id_product)?'add':'edit'?>">
                        <?php
                        if (!empty($getC)) {
                          $id_product = explode("-",$getC->id_product);
                        }
                        ?>
                        <div class="row col-sm-7">
                          <div class="input-group">
                            <input type="text" class="form-control required input-sm w20" name="id_product_1" id="nc_id_product_1" data-type_form="nc" value="<?=empty($getC->id_product)?'':$id_product[1]?>" readonly>
                            <span class="input-group-addon">-</span>
                            <input type="text" class="form-control required input-sm w20" name="id_product_2" id="nc_id_product_2" data-type_form="nc" value="<?=empty($getC->id_product)?'':$id_product[2]?>" readonly>
                            <!--
                            <span class="input-group-addon">-</span>
                            <input type="text" class="form-control required input-sm w20" name="id_product_3" id="id_product_3" value="<?=empty($getC->id_product)?'':$id_product[3]?>" readonly>
                            -->
                          </div>
                        </div>
                        <label class="label label-danger id_product hideIt">Code Can't be empty!</label>
                      </div>
                    </td>
                  </tr>

                  <tr id="my-grid-tr-name_product">
                    <td class="text-left vMid">Item Name <span class='text-red'>*</span></b></td>
                    <td class="text-left">
                      <label class="label_view">
                        <?=$getC->name_product?>
                      </label>
                      <div class="label_input">
                        <input type="text" class="form-control input input-sm required w50" name="name_product" id="nc_name_product" data-type_form="nc" value="<?=empty($getC->name_product)?'':$getC->name_product?>">
                        <label class="label label-danger name_product hideIt">item Name Can't be empty!</label>
                      </div>
                    </td>
                  </tr>

                  <tr id="my-grid-tr-id_supplier">
                    <td class="text-left vMid">Supplier <span class='text-red'>*</span></b></td>
                    <td class="text-left">
                      <label class="label_view">
                        <?=($getC)?$name_supplier->nm_supplier:'-'?>
                      </label>
                      <div class="label_input">
                        <select class="form-control input-sm required select2 id_supplier_input id_needed" data-width="150" name="id_supplier" id="nc_id_supplier" data-type_form="nc">
                        </select>
                        <label class="label label-danger id_supplier hideIt">Supplier Can't be empty!</label>

                      </div>
                    </td>
                  </tr>

                  <tr id="my-grid-tr-uom">
                    <td class="text-left vMid">UOM <span class='text-red'>*</span></b></td>
                    <td class="text-left">
                      <label class="label_view">
                        <?=($getC)?$getC->uom:'-'?>
                      </label>
                      <div class="label_input">
                        <select class="form-control required select2" data-width="200" name="uom" id="nc_uom" data-type_form="nc" style="width:60%">
                          <option value="">None</option>
                          <option value="PCS" <?=(!empty($getC) && $getC->uom == 'PCS')?'selected':''?> >PCS</option>
                          <option value="M" <?=(!empty($getC) && $getC->uom == 'M')?'selected':''?> >M</option>
                          <option value="Cube" <?=(!empty($getC) && $getC->uom == 'Cube')?'selected':''?> >Cube</option>
                        </select>
                        <div class="row col-sm-6 meteran hideIt" style="margin-top:1%">
                          <div class="input-group">
                            <input type="text" class="form-control input-sm numberOnly w20" name="m1" value="<?=empty($getC)?'':$getC->m1?>">
                            <span class="input-group-addon">X</span>
                            <input type="text" class="form-control input-sm numberOnly w20" name="m2" value="<?=empty($getC)?'':$getC->m2?>">
                          </div>
                        </div>
                        <label class="label label-danger uom hideIt">UOM Can't be empty!</label>

                      </div>
                    </td>
                  </tr>

                  <tr id="my-grid-tr-buy_price">
                    <td class="text-left vMid">Buy Price</td>
                    <td class="text-left">
                      <label class="label_view">
                        <?=($getC)?$getC->buy_price:'-'?>
                      </label>
                      <div class="label_input row col-sm-6">
                        <div class="input-group select2-bootstrap-append">
                          <span class="input-group-addon">Rp</span>
                          <input type="text" class="form-control input w50 numberOnly" name="buy_price" id="nc_buy_price" data-type_form="nc" style="display:inline-block" value="<?=empty($getC->buy_price)?'':$getC->buy_price?>">
                        </div>
                        <label class="label label-danger buy_price hideIt">Buy Price Can't be empty!</label>
                      </div>
                    </td>
                  </tr>

                  <tr id="my-grid-tr-selling_price">
                    <td class="text-left vMid">Selling Price</td>
                    <td class="text-left">
                      <label class="label_view">
                        <?=($getC)?$getC->selling_price:'-'?>
                      </label>
                      <div class="label_input row col-sm-6">
                        <div class="input-group select2-bootstrap-append">
                          <span class="input-group-addon">Rp</span>
                          <input type="text" class="form-control input w50 numberOnly" name="selling_price" id="nc_selling_price" data-type_form="nc" style="display:inline-block" value="<?=empty($getC->selling_price)?'':$getC->selling_price?>">
                        </div>
                        <label class="label label-danger selling_priceX hideIt">Selling Price Can't be empty!</label>
                      </div>
                    </td>
                  </tr>

                </tbody>
              </table>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
              <table id="NonComponent_right" class="table table-striped table-bordered table-hover table-condensed" width="100%">
                <thead>
                  <tr style='background-color: #175477; color: white; font-size: 15px;'>
                    <th class="text-center" colspan='2'>HEADER STATUS</th>
                  </tr>
                </thead>

                <tbody>

                  <tr id="my-grid-tr-product_status">
                    <td class="text-left vMid">Product Status <span class='text-red'>*</span></b></td>
                    <td class="text-left">
                      <label class="label_view">
                        <?=($getC)?$getC->product_status:'-'?>
                      </label>
                      <div class="label_input">
                        <div class="input-group select2-bootstrap-append">

                          <div class="input-group-btn">
                            <select class="form-control required select2" data-width="150" name="product_status" id="nc_product_status" data-type_form="nc" onchange="get_reason(this.value);" style="width:40%">
                              <option value="">None</option>
                              <option value="Indent">Indent</option>
                              <option value="Stock">Stock</option>
                              <option value="Discontinued">Discontinued</option>
                            </select>
                            <!--
                              <div class="status_reason_view hideIt">
                                <select class="form-control select2" name="product_status_reason" id="product_status_reason" style="width:40%">
                                  <option value="">None</option>
                                  <option value="Not Producted Anymore">Not Producted Anymore</option>
                                  <option value="Factory isn't open anymore">Factory isn't open anymore</option>
                                </select>
                              </div>
                            -->
                          </div>

                        </div>

                        <label class="label label-danger product_status hideIt">Status Can't be empty!</label>

                      </div>
                    </td>
                  </tr>

                  <tr id="my-grid-tr-activation">
                    <td class="text-left vMid">Status <span class='text-red'>*</span></b></td>
                    <td class="text-left">
                      <label class="label_view">
                        <?=($getC)?$getC->activation:'-'?>
                      </label>
                      <div class="label_input">
                        <select class="form-control required select2" data-width="150" name="activation" id="nc_activation" data-type_form="nc" style="width:40%">
                          <option value="aktif">Active</option>
                          <option value="nonaktif">Inactive</option>
                        </select>
                        <label class="label label-danger activation hideIt">Status Can't be empty!</label>

                      </div>
                    </td>
                  </tr>

                  <tr id="my-grid-tr-original_name">
                    <td class="text-left vMid">Original Name <span class='text-red'>*</span></b></td>
                    <td class="text-left">
                      <label class="label_view">
                        <?=$getC->original_name?>
                      </label>
                      <div class="label_input">
                        <input type="text" class="form-control input input-sm required w50" name="original_name" id="nc_original_name" data-type_form="nc" value="<?=empty($getC->original_name)?'':$getC->original_name?>">
                        <label class="label label-danger original_name hideIt">Name Can't be empty!</label>
                      </div>
                    </td>
                  </tr>

                  <tr id="my-grid-tr-id_colour">
                    <td class="text-left vMid">Colour <span class='text-red'>*</span></b></td>
                    <td class="text-left">
                      <label class="label_view">
                        <?=($getC)?$name_colour->name_colour:'-'?>
                      </label>
                      <div class="label_input input-group">
                        <select class="form-control input-sm required select2 id_needed w50" data-width="150" name="id_colour" data-type_form="nc" id="nc_id_colour">
                        </select>
                        <a id="addColour" class="btn btn-primary input-group-button" style="display:inline-block"><i class="fa fa-plus">&nbsp;</i></a>
                        <label class="label label-danger id_colour hideIt">Colour Can't be empty!</label>

                      </div>
                    </td>
                  </tr>

                  <tr id="my-grid-tr-description">
                    <td class="text-left vMid">Description</td>
                    <td class="text-left">
                      <label class="label_view">
                        <?=($getC)?$getC->description:'-'?>
                      </label>
                      <div class="label_input">
                        <textarea class="form-control w40" name="description" id="nc_description" data-type_form="nc">
                          <?empty($getC)?'':$getC->description?>
                        </textarea>
                        <label class="label label-danger descriptionX hideIt">Description Can't be empty!</label>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </form>
        </div>
      </div>
      <div class="row Component hideIt">
        <div class="col-sm-12">
          <form class="" id="Component" action="" method="post">
            <div class="row">
              <div class="col-sm-12">
                <div class="col-sm-12 col-md-6 col-lg-6">
                  <table id="Component_left" class="table table-striped table-bordered table-hover table-condensed" width="100%">
                    <tbody>
                      <tr style='background-color: #175477 !important; color: white; font-size: 15px !important;'>
                        <th class="text-center" colspan='2'>HEADER PRODUCT IDENTITY</th>
                      </tr>

                      <tr id="my-grid-tr-name_product">
                        <td class="text-left vMid">Product Name <span class='text-red'>*</span></b></td>
                        <td class="text-left">
                          <label class="label_view">
                            <?=$getC->name_product?>
                          </label>
                          <div class="label_input">
                            <input type="text" class="form-control input input-sm required w50" name="name_product" id="c_name_product" data-type_form="c" value="<?=empty($getC->name_product)?'':$getC->name_product?>">
                            <label class="label label-danger name_product hideIt">Product Name Can't be empty!</label>
                          </div>
                        </td>
                      </tr>

                      <tr id="my-grid-tr-product_photo">
                        <td class="text-left vMid">Photo <span class='text-red'>*</span></b></td>
                        <td class="text-left">
                          <label class="label_view">
                            <?=($getC)?$getC->product_photo:'-'?>
                          </label>
                          <label class="label_input">
                            <?php
                            echo form_input(array('type'=>'file','id'=>'product_photo','name'=>'product_photo','class'=>'form-control input-sm required w50', 'onchange'=>"readURL(this);", 'placeholder'=>'Photo','autocomplete'=>'off','value'=>empty($getC->product_photo)?'':$getC->product_photo))
                            ?>
                            <img id="blah" src="<?=empty($getC)?'':base_url('assets/img/master_fabric/'.$getC->photo_product)?>" alt="" style="display:inline-block" width="100" />
                            <label class="label label-danger product_photo hideIt">Photo Can't be empty!</label>
                            <input type="hidden" name="filelama" id="c_filelama" data-type_form="c" class="form-control" value="<?= ($getC)?$getC->product_photo:''?>">
                          </label>
                        </td>
                      </tr>

                      <tr id="my-grid-tr-original_name">
                        <td class="text-left vMid">Original Name <span class='text-red'>*</span></b></td>
                        <td class="text-left">
                          <label class="label_view">
                            <?=$getC->original_name?>
                          </label>
                          <div class="label_input">
                            <input type="text" class="form-control input input-sm required w50" name="original_name" id="c_original_name" data-type_form="c" value="<?=empty($getC->original_name)?'':$getC->original_name?>">
                            <label class="label label-danger original_name hideIt">Name Can't be empty!</label>
                          </div>
                        </td>
                      </tr>

                      <tr id="my-grid-tr-id_supplier">
                        <td class="text-left vMid">Supplier <span class='text-red'>*</span></b></td>
                        <td class="text-left">
                          <label class="label_view">
                            <?=($getC)?$name_supplier->nm_supplier:'-'?>
                          </label>
                          <div class="label_input">
                            <select class="form-control input-sm required select2 id_supplier_input id_needed" data-width="150" name="id_supplier" id="c_id_supplier" data-type_form="c">
                            </select>
                            <label class="label label-danger id_supplier hideIt">Supplier Can't be empty!</label>

                          </div>
                        </td>
                      </tr>

                      <tr id="my-grid-tr-id_product">
                        <td class="text-left vMid">Item Code <span class='text-red'>*</span></b></td>
                        <td class="text-left">
                          <label class="label_view">
                            <?=$getC->id_product?>
                          </label>
                          <div class="label_input">
                            <input type="hidden" name="type" value="<?=empty($getC->id_product)?'add':'edit'?>">
                            <?php
                            if (!empty($getC)) {
                              $id_product = explode("-",$getC->id_product);
                            }
                            ?>
                            <div class="row col-sm-7">
                              <div class="input-group">
                                <input type="text" class="form-control required input-sm w20" name="id_product_1" id="c_id_product_1" data-type_form="c" value="<?=empty($getC->id_product)?'':$id_product[1]?>" readonly>
                                <span class="input-group-addon">-</span>
                                <input type="text" class="form-control required input-sm w20" name="id_product_2" id="c_id_product_2" data-type_form="c" value="<?=empty($getC->id_product)?'':$id_product[2]?>" readonly>
                                <!--<span class="input-group-addon">-</span>
                                <input type="text" class="form-control required input-sm w20" name="id_product_3" id="c_id_product_3" data-type_form="c" value="<?=empty($getC->id_product)?'':$id_product[3]?>" readonly>-->
                              </div>
                            </div>
                            <a id="generate_id" class="btn btn-sm btn-primary" style="display:inline-block">Generate ID</a>
                            <label class="label label-danger id_product hideIt">Code Can't be empty!</label>
                          </div>
                        </td>
                      </tr>

                      <tr id="my-grid-tr-id_colour">
                        <td class="text-left vMid">Colour <span class='text-red'>*</span></b></td>
                        <td class="text-left">
                          <label class="label_view">
                            <?=($getC)?$name_colour->name_colour:'-'?>
                          </label>
                          <div class="label_input input-group">
                            <select class="form-control input-sm required select2 id_needed w50" data-width="150" name="id_colour" id="c_id_colour" data-type_form="c">
                            </select>
                            <a id="addColour" class="btn btn-primary input-group-button" style="display:inline-block"><i class="fa fa-plus">&nbsp;</i></a>
                            <label class="label label-danger id_colour hideIt">Colour Can't be empty!</label>

                          </div>
                        </td>
                      </tr>

                      <tr id="my-grid-tr-warranty">
                        <td class="text-left vMid">Warranty</td>
                        <td class="text-left">
                          <label class="label_view">
                            <?=($getC)?$getC->warranty:'-'?>
                          </label>
                          <div class="label_input">
                            <div class="input-group select2-bootstrap-append">
                              <input type="text" class="form-control input w50 numberOnly" name="warranty" id="c_warranty" data-type_form="c" style="display:inline-block" value="<?=empty($getC->warranty)?'':$getC->warranty?>">
                              <span class="input-group-addon">Year(s)</span>
                            </div>
                            <label class="label label-danger warranty hideIt">Warranty Can't be empty!</label>
                          </div>
                        </td>
                      </tr>

                      <tr id="my-grid-tr-width">
                        <td class="text-left vMid">Max Width</td>
                        <td class="text-left">
                          <label class="label_view">
                            <?=($getC)?$getC->width:'-'?>
                          </label>
                          <div class="label_input">
                            <div class="input-group select2-bootstrap-append">
                              <input type="text" class="form-control input w50 numberOnly" name="width" id="c_width" data-type_form="c" style="display:inline-block" value="<?=empty($getC->width)?'':$getC->width?>">
                              <span class="input-group-addon">m</span>
                            </div>
                            <label class="label label-danger width hideIt">Max Width Can't be empty!</label>
                          </div>
                        </td>
                      </tr>

                      <tr id="my-grid-tr-height">
                        <td class="text-left vMid">Max Height</td>
                        <td class="text-left">
                          <label class="label_view">
                            <?=($getC)?$getC->height:'-'?>
                          </label>
                          <div class="label_input">
                            <div class="input-group select2-bootstrap-append">
                              <input type="text" class="form-control input w50 numberOnly" name="height" id="c_height" data-type_form="c" style="display:inline-block" value="<?=empty($getC->height)?'':$getC->height?>">
                              <span class="input-group-addon">m</span>
                            </div>
                            <label class="label label-danger height hideIt">Max Height Can't be empty!</label>
                          </div>
                        </td>
                      </tr>

                      <tr id="my-grid-tr-weight">
                        <td class="text-left vMid">Max Weight</td>
                        <td class="text-left">
                          <label class="label_view">
                            <?=($getC)?$getC->weight:'-'?>
                          </label>
                          <div class="label_input">
                            <div class="input-group select2-bootstrap-append">
                              <input type="text" class="form-control input w50 numberOnly" name="weight" id="c_weight" data-type_form="c" style="display:inline-block" value="<?=empty($getC->weight)?'':$getC->weight?>">
                              <span class="input-group-addon">m</span>
                            </div>
                            <label class="label label-danger weight hideIt">Max Weight Can't be empty!</label>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                  <table id="Component_right" class="table table-striped table-bordered table-hover table-condensed" width="100%">
                    <thead>
                      <tr style='background-color: #175477; color: white; font-size: 15px;'>
                        <th class="text-center" colspan='2'>HEADER STATUS</th>
                      </tr>
                    </thead>

                    <tbody>

                      <tr id="my-grid-tr-type_product">
                        <td class="text-left vMid" width="20%">Type Product <span class='text-red'>*</span></b></td>
                        <td class="text-left">
                          <label class="label_view">
                            <?=($getC)?$getC->type_product:'-'?>
                          </label>
                          <div class="label_input">
                            <div class="row ">
                              <div class="col-sm-8">
                                <div class=" input-group">
                                  <select class="form-control required select2" data-width="150" name="type_product" id="c_type_product" data-type_form="c" style="width:40%">
                                    <option value="">None</option>
                                    <option value="Rail Decorative" <?=(!empty($getC) && $getC->type_product == 'Rail Decorative')?'selected':''?> >Rail Decorative</option>
                                    <option value="Rail Manual" <?=(!empty($getC) && $getC->type_product == 'Rail Manual')?'selected':''?> >Rail Manual</option>
                                    <option value="Rail Motorized" <?=(!empty($getC) && $getC->type_product == 'Rail Motorized')?'selected':''?> >Rail Motorized</option>
                                    <option value="Rooman Shade" <?=(!empty($getC) && $getC->type_product == 'Rooman Shade')?'selected':''?> >Rooman Shade</option>
                                    <option value="Roller Blind" <?=(!empty($getC) && $getC->type_product == 'Roller Blind')?'selected':''?> >Roller Blind</option>
                                    <option value="Shower Curtain" <?=(!empty($getC) && $getC->type_product == 'Shower Curtain')?'selected':''?> >Shower Curtain</option>
                                    <option value="Vertical blind" <?=(!empty($getC) && $getC->type_product == 'Vertical blind')?'selected':''?> >Vertical blind</option>
                                    <option value="Venetial Blind" <?=(!empty($getC) && $getC->type_product == 'Venetial Blind')?'selected':''?> >Venetial Blind</option>
                                    <option value="Wooden Blind" <?=(!empty($getC) && $getC->type_product == 'Wooden Blind')?'selected':''?> >Wooden Blind</option>
                                  </select>
                                  <!--<a id="addTypeProductTurunan" class="btn btn-primary input-group-button plus" style="display:inline-block"><i class="fa fa-plus">&nbsp;</i></a>-->
                                </div>
                              </div>
                            </div>
                            <label class="label label-danger type_product hideIt">Type Product Can't be empty!</label>

                          </div>
                        </td>
                      </tr>

                      <tr id="my-grid-tr-uom">
                        <td class="text-left vMid" width="20%">UOM <span class='text-red'>*</span></b></td>
                        <td class="text-left">
                          <label class="label_view">
                            <?=($getC)?$getC->uom:'-'?>
                          </label>
                          <div class="label_input">
                            <div class="row ">
                              <div class="col-sm-8">
                                <div class=" input-group">
                                  <select class="form-control required select2" data-width="150" name="uom" id="c_uom" data-type_form="c" style="width:40%">
                                    <option value="">None</option>
                                    <option value="m1" <?=(!empty($getC) && $getC->uom == 'm1')?'selected':''?> >m&#185;</option>
                                    <option value="m2" <?=(!empty($getC) && $getC->uom == 'm2')?'selected':''?> >m&#178;</option>
                                    <option value="m3" <?=(!empty($getC) && $getC->uom == 'm3')?'selected':''?> >m&#179;</option>
                                  </select>
                                  <a id="addUOMTurunan" class="btn btn-primary input-group-button plus" style="display:inline-block"><i class="fa fa-plus">&nbsp;</i></a>
                                </div>
                              </div>
                            </div>

                            <div class="row  hideIt uom_turunan" style="margin-top:1%">
                              <div class="col-sm-4">
                                <div class="input-group">
                                  <input type="text" class="form-control input w20 numberOnly" name="uom_turunan" id="c_uom_turunan" data-type_form="c" style="display:inline-block" value="<?=empty($getC->uom_turunan)?'':$getC->uom_turunan?>">
                                  <span class="input-group-addon">m</span>
                                </div>
                              </div>


                            </div>
                            <label class="label label-danger uom hideIt">UOM Can't be empty!</label>

                          </div>
                        </td>
                      </tr>

                      <tr id="my-grid-tr-min_order">
                        <td class="text-left vMid">Minimal Order</td>
                        <td class="text-left">
                          <label class="label_view">
                            <?=($getC)?$getC->min_order:'-'?>
                          </label>
                          <div class="label_input">
                            <input type="text" class="form-control w40 input input-sm numberOnly" name="min_order" id="c_min_order" data-type_form="c">
                            <label class="label label-danger min_orderX hideIt">Fabric Can't be empty!</label>

                          </div>
                        </td>
                      </tr>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-11" style="padding-left:2.5%">
                <div class="col-sm-2">
                  Basic Component
                </div>
                <div class="col-sm-4">
                  <a id="addBC" class="btn btn-sm btn-primary">Add Basic Component</a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <table id="basicComponent" class="table table-striped table-bordered table-hover table-condensed" width="100%">
                  <thead>
                    <tr style='background-color: #175477 !important; color: white; font-size: 15px !important;'>
                      <th class="text-center" colspan='7'>BASIC COMPONENT</th>
                    </tr>
                    <tr>
                      <td class="text-left vMid">Code </td>
                      <td class="text-left vMid">Component Name </td>
                      <td class="text-left vMid">Price/Qty(PCs) </td>
                      <td class="text-left vMid">Standard Qty. </td>
                      <td class="text-left vMid">UOM </td>
                      <td class="text-left vMid">Total Price </td>
                      <td class="text-left vMid">Action </td>
                    </tr>
                  </thead>
                  <tbody id="basicComponent_Detail">
                  </tbody>
                </table>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
		<?php
			echo form_button(array('type'=>'button','class'=>'btn btn-md btn-success label_input','style'=>'min-width:100px; float:right;','value'=>'save','content'=>'Save','id'=>'addCurtainSave')).' ';
		?>
	</div>
  </div>
</div>

<style>
  #content>.select2-container {
    width: 100% !important;
  }

  .soft-border{
    border: 0 0 2px 0 !important;
    border-color: #b9a4a4;
    background-image: linear-gradient(to right, #6075af , white) !important;
  }
  .list_spec{
    padding-left:2% !important;
  }

</style>

<script type="text/javascript">

	$(document).ready(function(){
    getSupplier();
    getColour();
    //getCurs();
    $(".datepicker").datepicker({
        format : "yyyy-mm-dd",
        showInputs: true,
        autoclose:true
    });
    $(".select2").select2({
      theme: "bootstrap",
      placeholder: "Choose An Option",
      allowClear: true,
      width: 'auto'
      //dropdownParent: $("#form-fabric")
    });

    jQuery(document).on('keyup', '.bank_num', function(){
      var foo = $(this).val().split("-").join(""); // remove hyphens
      if (foo.length > 0) {
        foo = foo.match(new RegExp('.{1,4}', 'g')).join("-");
      }
      $(this).val(foo);
    });
    $(document).on('click change keyup paste blur', '#form-fabric .form-control', function(e){
      //console.log('AHAHAHAHA');
      var val = $(this).val();
      var id = $(this).attr('id');
      if (val == '') {
        //$('.'+id).addClass('hideIt');
        $('.'+id).css('display','inline-block');
      }else {
        $('.'+id).css('display','none');
      }
    });
    $(document).on('click change keyup paste blur', '.form-active .id_needed', function(e){
      if ($('.type_accesories').val() == 'Component') {
        var ad = 'c_';
      }else {
        var ad = 'nc_';
      }
      //console.log(ad);
      var id_supplier = $('#'+ad+'id_supplier').val();
      $.ajax({
        url: siteurl+active_controller+"getIDAcc",
        dataType : "json",
        type: 'POST',
        data: {
          id_supplier:id_supplier
        },
        success: function(result){
          $('#'+ad+'id_product_1').val(id_supplier);
          $('#'+ad+'id_product_2').val(pad(result.id_product_2,3));
          //$('#id_product_3').html(result.html);
        },
        error: function (request, error) {
          console.log(arguments);
          alert(" Can't do because: " + error);
        }
      });
      //$('#id_product').val(id_supplier+'-'+id_pattern_name+'-'+id_colour);
      //$('#id_product').val(id_pattern_name+'-'+id_colour);
      //console.log('AHAHAHAHA');
    });
    $(document).on('click change keyup paste blur', '#form-product .type_accesories', function(e){
      var type = $('.type_accesories').val();
      if (type == 'Non Component') {
        $('#Component').removeClass('form-active');
        $('#NonComponent').addClass('form-active');
        $('.NonComponent').removeClass('hideIt');
        $('.NonComponent').css('display', 'block');
        $('.Component').addClass('hideIt');
        $('.Component').css('display', 'none');
        //console.log(type);
      }else if (type == 'Component'){
        $('#NonComponent').removeClass('form-active');
        $('#Component').addClass('form-active');
        $('.Component').removeClass('hideIt');
        $('.Component').css('display', 'block');
        $('.NonComponent').addClass('hideIt');
        $('.NonComponent').css('display', 'none');
        //console.log(type);
      }else {
        $('.NonComponent').addClass('hideIt');
        $('.NonComponent').css('display', 'none');
        $('.Component').addClass('hideIt');
        $('.Component').css('display', 'none');
      }
    });
    $(document).on('click change keyup paste blur', '#form-product #nc_uom', function(e){
      var val = $(this).val();
      if (val == 'M') {
        $('.meteran').removeClass('hideIt');
        $('.meteran').css('display','block');
      }else {
        $('.meteran').addClass('hideIt');
        $('.meteran').css('display','none');

      }
    });
    $(document).on('click', '#form-product #addUOMTurunan', function(e){
      var minus = '<i class="fa fa-minus">&nbsp;</i>';
      var plus = '<i class="fa fa-plus">&nbsp;</i>';
      if ($(".plus")[0]) {
        $("#addUOMTurunan").removeClass('plus');
        $("#addUOMTurunan").addClass('minus');
        $("#addUOMTurunan").html(minus);
        $(".uom_turunan").removeClass('hideIt');
        $(".uom_turunan").addClass('showIt');
        $(".uom_turunan").css('display','block');
      }else if ($(".minus")[0]) {
        $("#addUOMTurunan").removeClass('minus');
        $("#addUOMTurunan").addClass('plus');
        $("#addUOMTurunan").html(plus);
        $(".uom_turunan").removeClass('showIt');
        $(".uom_turunan").addClass('hideIt');
        $(".uom_turunan").css('display','none');
      }
    });
    $(document).on('click', '#generate_id', function(e){
        var name = $('#name_product').val();
        if (name != '') {
          $.ajax({
            url: siteurl+active_controller+"getID",
            dataType : "json",
            type: 'POST',
            data: {nm:name},
            success: function(result){
              $('#id_customer').val(result.id);
            },
            error: function (request, error) {
              console.log(arguments);
              alert(" Can't do because: " + error);
            }
          });
        }else {
          swal({
            title: "Warning!",
            text: "Complete Customer name first, please!",
            type: "warning",
            timer: 3500,
            showConfirmButton: false
          });
        }

      });


    if ('<?= $this->uri->segment(4) ?>' == 'view') {
      $('.label_view').css("display","block");
      $('.label_input').css("display","none");
    }else {
      $('.label_view').css("display","none");
      $('.label_input').css("display","block");
    }
    console.log('<?= $this->uri->segment(4) ?>');
	});

  function getCountry() {
    if ('<?=($getC->id_country)?>' != null) {
      var id_selected = '<?=$getC->id_country?>';
    }else if ($('#id_country').val() != null || $('#id_country').val() != '') {
      var id_selected = $('#id_country').val();
    }else {
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
      url: siteurl+active_controller+"getOpt",
      dataType : "json",
      type: 'POST',
      data: {
        id_selected:id_selected,
        column:column,
        column_fill:column_fill,
        column_name:column_name,
        table_name:table_name,
        key:key,
        act:act
      },
      success: function(result){
        $('#id_country').html(result.html);
      },
      error: function (request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });

  }
  function getSupplier() {
    if ('<?=($getC->id_supplier)?>' != null) {
      var id_selected = '<?=$getC->id_supplier?>';
    }else if ($('#id_supplier').val() != null || $('#id_supplier').val() != '') {
      var id_selected = $('#id_supplier').val();
    }else {
      var id_selected = '';
    }
    //console.log(id_selected);
    var column = '';
    var column_fill = '';
    var column_name = 'nm_supplier';
    var table_name = 'master_supplier';
    var key = 'id_supplier';
    var act = 'free';
    $.ajax({
      url: siteurl+active_controller+"getOpt",
      dataType : "json",
      type: 'POST',
      data: {
        id_selected:id_selected,
        column:column,
        column_fill:column_fill,
        column_name:column_name,
        table_name:table_name,
        key:key,
        act:act
      },
      success: function(result){
        $('#nc_id_supplier').html(result.html);
        $('#c_id_supplier').html(result.html);
      },
      error: function (request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });

  }
  function getPatternType() {
    if ('<?=($getC->id_pattern_type)?>' != null) {
      var id_selected = '<?=$getC->id_pattern_type?>';
    }else if ($('#id_pattern_type').val() != null || $('#id_pattern_type').val() != '') {
      var id_selected = $('#id_pattern_type').val();
    }else {
      var id_selected = '';
    }
    //console.log(id_selected);
    var column = '';
    var column_fill = '';
    var column_name = 'name_pattern_type';
    var table_name = 'master_pattern_type';
    var key = 'id_pattern_type';
    var act = 'free';
    $.ajax({
      url: siteurl+active_controller+"getOpt",
      dataType : "json",
      type: 'POST',
      data: {
        id_selected:id_selected,
        column:column,
        column_fill:column_fill,
        column_name:column_name,
        table_name:table_name,
        key:key,
        act:act
      },
      success: function(result){
        $('#id_pattern_type').html(result.html);
      },
      error: function (request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });

  }
  function getPatternName() {
    if ('<?=($getC->id_pattern_name)?>' != null) {
      var id_selected = '<?=$getC->id_pattern_name?>';
    }else if ($('#id_pattern_name').val() != null || $('#id_pattern_name').val() != '') {
      var id_selected = $('#id_pattern_name').val();
    }else {
      var id_selected = '';
    }
    var id_sup = '<?=(empty($getC))?"":$getC->id_supplier?>';
    if (id_sup == '') {
      id_sup = $('#id_supplier').val();
    }
    console.log(id_sup);
    //console.log($('#id_supplier').val());
    var column = 'id_supplier';
    var column_fill = $('#id_supplier').val();
    var column_name = 'name_pattern';
    var table_name = 'child_supplier_pattern';
    var key = 'id_pattern';
    var act = '';
    $.ajax({
      url: siteurl+active_controller+"getOpt",
      dataType : "json",
      type: 'POST',
      data: {
        id_selected:id_selected,
        column:column,
        column_fill:column_fill,
        column_name:column_name,
        table_name:table_name,
        key:key,
        act:act
      },
      success: function(result){
        $('#id_pattern_name').html(result.html);
        $('#similar_name').html(result.html);
      },
      error: function (request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });

  }
  function getColour() {
    if ('<?=($getC->id_colour)?>' != null) {
      var id_selected = '<?=$getC->id_colour?>';
    }else if ($('#id_colour').val() != null || $('#id_colour').val() != '') {
      var id_selected = $('#id_colour').val();
    }else {
      var id_selected = '';
    }
    //console.log(id_selected);
    var column = '';
    var column_fill = '';
    var column_name = 'name_colour';
    var table_name = 'master_colour';
    var key = 'id_colour';
    var act = 'free';
    $.ajax({
      url: siteurl+active_controller+"getOpt",
      dataType : "json",
      type: 'POST',
      data: {
        id_selected:id_selected,
        column:column,
        column_fill:column_fill,
        column_name:column_name,
        table_name:table_name,
        key:key,
        act:act
      },
      success: function(result){
        $('#nc_id_colour').html(result.html);
        $('#c_id_colour').html(result.html);
      },
      error: function (request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });

  }
  function getCharacteristic() {
    if ('<?=($getC->id_characteristic)?>' != null) {
      var id_selected = '<?=$getC->id_characteristic?>';
    }else if ($('#id_characteristic').val() != null || $('#id_characteristic').val() != '') {
      var id_selected = $('#id_characteristic').val();
    }else {
      var id_selected = '';
    }
    //console.log(id_selected);
    var column = '';
    var column_fill = '';
    var column_name = 'name_characteristic';
    var table_name = 'master_product_characteristic';
    var key = 'id_characteristic';
    var act = 'free';
    $.ajax({
      url: siteurl+active_controller+"getOpt",
      dataType : "json",
      type: 'POST',
      data: {
        id_selected:id_selected,
        column:column,
        column_fill:column_fill,
        column_name:column_name,
        table_name:table_name,
        key:key,
        act:act
      },
      success: function(result){
        $('#id_characteristic').html(result.html);
      },
      error: function (request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });

  }
  function getCollection() {
    if ('<?=($getC->id_collection)?>' != null) {
      var id_selected = '<?=$getC->id_collection?>';
    }else if ($('#id_collection').val() != null || $('#id_collection').val() != '') {
      var id_selected = $('#id_collection').val();
    }else {
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
      url: siteurl+active_controller+"getOpt",
      dataType : "json",
      type: 'POST',
      data: {
        id_selected:id_selected,
        column:column,
        column_fill:column_fill,
        column_name:column_name,
        table_name:table_name,
        key:key,
        act:act
      },
      success: function(result){
        $('#id_collection').html(result.html);
      },
      error: function (request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });

  }
  function getClass() {
    if ('<?=($getC->id_class)?>' != null) {
      var id_selected = '<?=$getC->id_class?>';
    }else if ($('#id_class').val() != null || $('#id_class').val() != '') {
      var id_selected = $('#id_class').val();
    }else {
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
      url: siteurl+active_controller+"getOpt",
      dataType : "json",
      type: 'POST',
      data: {
        id_selected:id_selected,
        column:column,
        column_fill:column_fill,
        column_name:column_name,
        table_name:table_name,
        key:key,
        act:act
      },
      success: function(result){
        $('#id_class').html(result.html);
      },
      error: function (request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });

  }
  function getFeature() {
    if ('<?=($getC->id_feature)?>' != null) {
      var id_selected = '<?=$getC->id_feature?>';
    }else if ($('#id_feature').val() != null || $('#id_feature').val() != '') {
      var id_selected = $('#id_feature').val();
    }else {
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
      url: siteurl+active_controller+"getOpt",
      dataType : "json",
      type: 'POST',
      data: {
        id_selected:id_selected,
        column:column,
        column_fill:column_fill,
        column_name:column_name,
        table_name:table_name,
        key:key,
        act:act
      },
      success: function(result){
        $('#additional_features').html(result.html);
      },
      error: function (request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });

  }
  function getCurs() {
    if ('<?=($getC->id_kurs)?>' != null) {
      var id_selected = '<?=$getC->id_kurs?>';
    }else if ($('#id_kurs').val() != null || $('#id_kurs').val() != '') {
      var id_selected = $('#id_kurs').val();
    }else {
      var id_selected = '';
    }
    //console.log(id_selected);
    var column = '';
    var column_fill = '';
    var column_name = 'kode';
    var table_name = 'mata_uang';
    var key = 'id_kurs';
    var act = '';
    $.ajax({
      url: siteurl+active_controller+"getOpt",
      dataType : "json",
      type: 'POST',
      data: {
        id_selected:id_selected,
        column:column,
        column_fill:column_fill,
        column_name:column_name,
        table_name:table_name,
        key:key,
        act:act
      },
      success: function(result){
        $('#buy_price_curs').html(result.html);
        $('#pricelist_curs').html(result.html);
      },
      error: function (request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });

  }
  function getContent() {
    if ('<?=($getC->id_content)?>' != null) {
      var id_selected = '<?=$getC->id_content?>';
    }else if ($('#id_content').val() != null || $('#id_content').val() != '') {
      var id_selected = $('#id_content').val();
    }else {
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
      url: siteurl+active_controller+"getOpt",
      dataType : "json",
      type: 'POST',
      data: {
        id_selected:id_selected,
        column:column,
        column_fill:column_fill,
        column_name:column_name,
        table_name:table_name,
        key:key,
        act:act
      },
      success: function(result){
        $('#id_content').html(result.html);
      },
      error: function (request, error) {
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
      url: siteurl+active_controller+"getVal",
      dataType : "json",
      type: 'POST',
      data: {
        id_selected:id_selected,
        column:column,
        column_fill:column_fill,
        column_name:column_name,
        table_name:table_name,
        key:key,
        act:act
      },
      success: function(result){
        $('.telephone_code').val(result.html);
      },
      error: function (request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });

  }
  function getSupplierType() {
    if ('<?=($getC->id_type)?>' != null) {
      var id_selected = '<?=$getC->id_type?>';
    }else if ($('#id_type').val() != null || $('#id_type').val() != '') {
      var id_selected = $('#id_type').val();
    }else {
      var id_selected = '';
    }
    var column = '';
    var column_fill = '';
    var column_name = 'name_type';
    var table_name = 'child_supplier_type';
    var key = 'id_type';
    var act = '';
    $.ajax({
      url: siteurl+active_controller+"getOpt",
      dataType : "json",
      type: 'POST',
      data: {
        id_selected:id_selected,
        column:column,
        column_fill:column_fill,
        column_name:column_name,
        table_name:table_name,
        key:key,
        act:act
      },
      success: function(result){
        $('#id_type').html(result.html);
      },
      error: function (request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });

  }
  function getBrand() {
    var id_brand    = <?php echo json_encode(explode(";",$getC->id_brand) );?>;
    var id_selected = 'multiple';
    //console.log(id_selected);
    var column = '';
    var column_fill = '';
    var column_name = 'name_brand';
    var table_name = 'master_product_brand';
    var key = 'id_brand';
    var act = '';
    $.ajax({
      url: siteurl+active_controller+"getOpt",
      dataType : "json",
      type: 'POST',
      data: {
        id_selected:id_selected,
        column:column,
        column_fill:column_fill,
        column_name:column_name,
        table_name:table_name,
        key:key,
        act:act
      },
      success: function(result){
        $('#id_brand').html(result.html);
        $('#id_brand').val(id_brand);
      },
      error: function (request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });

  }
  function getProCat() {
    if ('<?=($getC->id_category)?>' != null) {
      var id_selected = '<?=$getC->id_category?>';
    }else if ($('#id_category').val() != null || $('#id_category').val() != '') {
      var id_selected = $('#id_category').val();
    }else {
      var id_selected = '';
    }
    var column = 'supplier_shipping';
    var column_fill = $("input[name='supplier_shipping']:checked").val();
    var column_name = 'name_category';
    var table_name = 'master_product_category';
    var key = 'id_category';
    var act = 'free';
    $.ajax({
      url: siteurl+active_controller+"getOpt",
      dataType : "json",
      type: 'POST',
      data: {
        id_selected:id_selected,
        column:column,
        column_fill:column_fill,
        column_name:column_name,
        table_name:table_name,
        key:key,
        act:act
      },
      success: function(result){
        $('#id_category').html(result.html);
      },
      error: function (request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });

  }
  function getBusCat() {
    if ('<?=($getC->id_business)?>' != null) {
      var id_selected = '<?=$getC->id_business?>';
    }else if ($('#id_business').val() != null || $('#id_business').val() != '') {
      var id_selected = $('#id_business').val();
    }else {
      var id_selected = '';
    }
    var column = 'id_type';
    var column_fill = $("#id_type").val();
    var column_name = 'name_business';
    var table_name = 'child_supplier_business_category';
    var key = 'id_business';
    var act = 'free';
    $.ajax({
      url: siteurl+active_controller+"getOpt",
      dataType : "json",
      type: 'POST',
      data: {
        id_selected:id_selected,
        column:column,
        column_fill:column_fill,
        column_name:column_name,
        table_name:table_name,
        key:key,
        act:act
      },
      success: function(result){
        $('#id_business').html(result.html);
      },
      error: function (request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });

  }
  function getSupCap() {
    var id_capacity    = <?php echo json_encode(explode(";",$getC->id_capacity) );?>;
    var id_selected = 'multiple';
    //console.log(id_selected);
    var column = 'id_business';
    var column_fill = $('#id_business').val();
    var column_name = 'name_capacity';
    var table_name = 'child_supplier_capacity';
    var key = 'id_capacity';
    var act = 'free';
    $.ajax({
      url: siteurl+active_controller+"getOpt",
      dataType : "json",
      type: 'POST',
      data: {
        id_selected:id_selected,
        column:column,
        column_fill:column_fill,
        column_name:column_name,
        table_name:table_name,
        key:key,
        act:act
      },
      success: function(result){
        $('#id_capacity').html(result.html);
        $('#id_capacity').val(id_capacity);
      },
      error: function (request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });

  }
  function getToq() {
    if ('<?=($getC->id_toq)?>' != null) {
      var id_selected = '<?=$getC->id_toq?>';
    }else if ($('#id_toq').val() != null || $('#id_toq').val() != '') {
      var id_selected = $('#id_toq').val();
    }else {
      var id_selected = '';
    }
    //console.log(id_selected);
    var column = '';
    var column_fill = '';
    var column_name = 'name_toq';
    var table_name = 'child_supplier_toq';
    var key = 'id_toq';
    var act = '';
    $.ajax({
      url: siteurl+active_controller+"getOpt",
      dataType : "json",
      type: 'POST',
      data: {
        id_selected:id_selected,
        column:column,
        column_fill:column_fill,
        column_name:column_name,
        table_name:table_name,
        key:key,
        act:act
      },
      success: function(result){
        $('#id_toq').html(result.html);
      },
      error: function (request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });

  }
  function readURL(input) {
    console.log('XC');
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
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
      $('.status_reason_view').css('display','block');
    }else {
      $('.status_reason_view').addClass('hideIt');
      $('.status_reason_view').css('display','none');
    }
  }
</script>
