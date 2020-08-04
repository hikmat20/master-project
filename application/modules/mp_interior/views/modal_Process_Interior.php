<?php

if (!empty($this->uri->segment(3))) {
  $getC                 = $this->db->get_where('master_product_curtain',array('id_product'=>$id))->row();
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

            <tr id="my-grid-tr-upload_dl">
              <td class="text-left vMid">Upload Digital Library <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$getC->upload_dl:'-'?>
                </label>
                <div class="label_input">
                  <select class="form-control required select2" data-width="150" name="upload_dl" id="upload_dl" style="width:40%">
                    <option value="">None</option>
                    <option value="Yes" <?=(!empty($getC) && $getC->upload_dl == 'Yes')?'selected':''?> >Yes</option>
                    <option value="No" <?=(!empty($getC) && $getC->upload_dl == 'No')?'selected':''?> >No</option>
                  </select>
                  <label class="label label-danger upload_dl hideIt">Upload Digital Library Can't be empty!</label>

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
                  <input type="text" class="form-control input input-sm required w50" name="id_product" id="id_product" value="<?=empty($getC->id_product)?'':$getC->id_product?>" readonly>
                  <label class="label label-danger id_product hideIt">Code Can't be empty!</label>
                </label>
              </td>
            </tr>

            <tr id="my-grid-tr-name_product">
              <td class="text-left vMid">Product Name <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=$getC->name_product?>
                </label>
                <div class="label_input">
                  <input type="text" class="form-control input input-sm required w50" name="name_product" id="name_product" value="<?=empty($getC->name_product)?'':$getC->name_product?>">
                  <label class="label label-danger name_product hideIt">Product Name Can't be empty!</label>
                </label>
              </td>
            </tr>

            <tr id="my-grid-tr-id_supplier">
              <td class="text-left vMid">Supplier <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$name_supplier->nm_supplier:'-'?>
                </label>
                <div class="label_input">
                  <select class="form-control input-sm required select2 id_supplier_input id_needed" data-width="150" name="id_supplier" id="id_supplier">
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
                  <select class="form-control required select2" data-width="150" name="uom" id="uom" style="width:40%">
                    <option value="">None</option>
                    <option value="PCS" <?=(!empty($getC) && $getC->uom == 'PCS')?'selected':''?> >PCS</option>
                    <option value="M" <?=(!empty($getC) && $getC->uom == 'M')?'selected':''?> >M</option>
                    <option value="Cube" <?=(!empty($getC) && $getC->uom == 'Cube')?'selected':''?> >Cube</option>
                  </select>
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
                <div class="label_input">
                  <div class="input-group select2-bootstrap-append">
                    <!--
                      <div class="input-group-btn">
                        <select class="form-control input select2 w20" name="buy_price_curs" id="buy_price_curs">
                        </select>
                      </div>
                    -->
                    <input type="text" class="form-control input w50 numberOnly" name="buy_price" id="buy_price" style="display:inline-block" value="<?=empty($getC->buy_price)?'':$getC->buy_price?>">
                  </div>
                  <label class="label label-danger buy_price hideIt">Buy Price Can't be empty!</label>
                </label>
              </td>
            </tr>

            <tr id="my-grid-tr-selling_price">
              <td class="text-left vMid">Selling Price</td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$getC->selling_price:'-'?>
                </label>
                <div class="label_input">
                  <div class="input-group select2-bootstrap-append">
                    <!--
                      <div class="input-group-btn">
                        <select class="form-control input select2 w20" name="selling_price_curs" id="selling_price_curs">
                        </select>
                      </div>
                    -->
                    <input type="text" class="form-control input w50 numberOnly" name="selling_price" id="selling_price" style="display:inline-block" value="<?=empty($getC->selling_price)?'':$getC->selling_price?>">
                  </div>
                  <label class="label label-danger selling_priceX hideIt">Selling Price Can't be empty!</label>
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

            <tr id="my-grid-tr-product_status">
              <td class="text-left vMid">Status <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$getC->product_status:'-'?>
                </label>
                <div class="label_input">
                  <div class="input-group select2-bootstrap-append">

                    <div class="input-group-btn">
                      <select class="form-control required select2" data-width="150" name="product_status" id="product_status" onchange="get_reason(this.value);" style="width:40%">
                        <option value="">None</option>
                        <option value="Indent">Indent</option>
                        <option value="Stock">Stock</option>
                        <option value="Discontinued">Discontinued</option>
                      </select>
                      <div class="status_reason_view hideIt">
                        <select class="form-control select2" name="product_status_reason" id="product_status_reason" style="width:40%">
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

            <tr id="my-grid-tr-activation">
              <td class="text-left vMid">Status <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$getC->activation:'-'?>
                </label>
                <div class="label_input">
                  <select class="form-control required select2" data-width="150" name="activation" id="activation" style="width:40%">
                    <option value="aktif">Active</option>
                    <option value="nonaktif">Inactive</option>
                  </select>
                  <label class="label label-danger activation hideIt">Status Can't be empty!</label>

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
                  <input type="text" class="form-control input input-sm required w50" name="original_name" id="original_name" value="<?=empty($getC->original_name)?'':$getC->original_name?>">
                  <label class="label label-danger original_name hideIt">Name Can't be empty!</label>
                </label>
              </td>
            </tr>

            <tr id="my-grid-tr-id_colour">
              <td class="text-left vMid">Colour <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$name_colour->name_colour:'-'?>
                </label>
                <div class="label_input">
                  <select class="form-control input-sm required select2 id_needed" data-width="150" name="id_colour" id="id_colour">
                  </select>
                  <label class="label label-danger id_colour hideIt">Colour Can't be empty!</label>

                </div>
              </td>
            </tr>

            <tr id="my-grid-tr-fabric_status">
              <td class="text-left vMid">Fabric <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$getC->fabric_status:'-'?>
                </label>
                <div class="label_input">
                  <select class="form-control required select2" data-width="150" name="fabric_status" id="fabric_status" style="width:40%">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                  </select>
                  <label class="label label-danger fabric_status hideIt">Fabric Can't be empty!</label>

                </label>
              </td>
            </tr>
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
            <div class="col-sm-9 form-horizontal">
              <div class="form-group">
                <div class="col-sm-12">
                  <label class="label_view">
                    <?=$getD->id_content?>
                  </label>
                  <label class="label_input">
                    <div class="input-group select2-bootstrap-append">
                      <div class="input-group-btn">
                        <select class="form-control select2 required" name="id_content" id="id_content" style="width:200px; display:block;">
                        </select>
                      </div>
                      <div class="input-group">
                        <input type="text" class="form-control w50" name="content_percent" placeholder="Content Percentage" value="<?=empty($getC->content_percent)?'':$getC->content_percent?>">
                        <span class="input-group-addon">%</span>
                      </div>
                    </div>
                    <label class="label label-danger id_content hideIt">Content Can't be empty!</label>

                  </label>
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
                        <?=$getD->martindale?>
                      </div>
                      <div class="label_input inline mb-1">
                        <!--<div class="input-group">
                          <input type="text" class="form-control w50" name="martindale" id="martindale" placeholder="Martindale Percentage" value="<?=empty($getC->martindale)?'':$getC->martindale?>">
                          <span class="input-group-addon">rubs</span>
                        </div>--
                        <div class="input-group select2-bootstrap-append">
                          <input type="text" class="form-control" name="martindale" placeholder="" value="<?=empty($getC->martindale)?'':$getC->martindale?>">
                          <span class="input-group-addon">rubs</span>
                          <span class="input-group-addon"></span>
                          <span class="input-group-addon">ISO</span>
                          <div class="input-group-btn">
                            <select class="form-control iso select2" name="martindale_iso" id="martindale_iso" multiple>
                            </select>
                            <a id="addMartindale_iso" class="btn btn-primary iso_add" style="display:inline-block"><i class="fa fa-plus">&nbsp;</i></a>
                          </div>

                        </div>
                        <label class="label label-danger martindale hideIt" style="">Martindale Can't be empty!</label>
                        -->
                        <div class=" select2-bootstrap-append">
                          <div class="form-group col-md-6">
                            <div class="input-group">
                              <input type="text" class="form-control" name="martindale" placeholder="" value="<?=empty($getC->martindale)?'':$getC->martindale?>">
                              <span class="input-group-addon">rubs</span>
                            </div>
                          </div>
                          <div class="form-group col-md-6">
                            <div class="input-group">
                              <span class="input-group-addon">ISO</span>
                              <div class="input-group-btn">
                                <select class="form-control iso select2" name="martindale_iso" id="martindale_iso" multiple>
                                </select>
                                <a id="addWyzenbeek_iso" class="btn btn-primary iso_add" style="display:inline-block"><i class="fa fa-plus">&nbsp;</i></a>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>
                      <!--
                        <div class=" row form-inline">
                          <div class="col-md-4 col-sm-12">
                            <label for="martindale_iso" style="padding-left:5rubs">Martindale ISO </label>
                          </div>
                          <div class="col-md-8 col-sm-12">
                            <div class="label_view">
                              <?=$getD->martindale_iso?>
                            </div>
                            <div class="label_input inline">
                              <div class="form-inline select2-bootstrap-append">
                                <select class="form-control select2" name="martindale_iso" id="martindale_iso" placeholder="Martindale ISO" multiple="multiple">
                                  <option value=""></option>
                                </select>
                                <a id="addMartindale_iso" class="btn btn-sm iso_add btn-primary" style="display:inline-block"><i class="fa fa-plus">&nbsp;</i></a>
                              </div>
                              <label class="label label-danger martindale_iso hideIt" style="">Martindale Can't be empty!</label>
                            </div>
                          </div>
                        </div>
                      -->
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
                        <?=$getD->wyzenbeek?>
                      </div>
                      <div class="label_input inline mb-1">
                        <div class=" select2-bootstrap-append">
                          <div class="form-group col-md-6">
                            <div class="input-group">
                              <input type="text" class="form-control" name="wyzenbeek" placeholder="" value="<?=empty($getC->wyzenbeek)?'':$getC->wyzenbeek?>">
                              <span class="input-group-addon">rubs</span>
                            </div>
                          </div>
                          <div class="form-group col-md-6">
                            <div class="input-group">
                              <span class="input-group-addon">ISO</span>
                              <div class="input-group-btn">
                                <select class="form-control iso select2" name="wyzenbeek_iso" id="wyzenbeek_iso" multiple>
                                </select>
                                <a id="addWyzenbeek_iso" class="btn btn-primary iso_add" style="display:inline-block"><i class="fa fa-plus">&nbsp;</i></a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <label class="label label-danger martindale hideIt" style="">Wyzenbeek Can't be empty!</label>
                      </div>
                      <!--
                        <div class="row mb-1 form-inline">
                          <div class="col-md-4 col-sm-12">
                            <label for="wyzenbeek_iso" style="padding-left:5%">Wyzenbeek ISO </label>
                          </div>
                          <div class="col-md-8 col-sm-12">
                            <div class="label_view">
                              <?=$getD->wyzenbeek_iso?>
                            </div>
                            <div class="label_input inline">
                              <div class="form-inline select2-bootstrap-append">
                                <select class="form-control select2" name="wyzenbeek_iso" id="wyzenbeek_iso" placeholder="Martindale ISO" multiple="multiple">
                                  <option value=""></option>
                                </select>
                                <a id="addWyzenbeek_iso" class="btn btn-sm btn-primary" style="display:inline-block"><i class="fa fa-plus">&nbsp;</i></a>
                              </div>
                              <label class="label label-danger wyzenbeek_iso hideIt" style="">Wyzenbeek Can't be empty!</label>
                            </div>
                          </div>
                        </div>
                      -->
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
                        <?=$getD->fire_reterdant?>
                      </div>
                      <div class="label_input inline">
                        <div class="input-group select2-bootstrap-append">
                          <select class="form-control select2" name="fire_reterdant" id="fire_reterdant" style="width:150%;display:block">
                            <option value=""></option>
                            <option value="Certified">Certified</option>
                            <option value="Not Certified">Not Certified</option>
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
                        <?=$getD->water_repellent?>
                      </div>
                      <div class="label_input inline">
                        <div class="input-group select2-bootstrap-append">
                          <select class="form-control select2" name="water_repellent" id="water_repellent" style="width:150%;display:block">
                            <option value=""></option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
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
                        <?=$getD->stain_resistant?>
                      </div>
                      <div class="label_input inline">
                        <div class="input-group select2-bootstrap-append">
                          <select class="form-control select2" name="stain_resistant" id="stain_resistant" style="width:150%;display:block">
                            <option value=""></option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
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
                      <label class="row" for="width">Width</label>
                      <span class='text-red'>*</span></b>
                      <span style="float:right">:</span>
                    </div>

                    <div class="col-md-8 col-sm-12">
                      <div class="label_view">
                        <?=$getD->width?>
                      </div>
                      <div class="label_input inline">
                        <div class="input-group">
                          <input type="text" class="form-control required numberOnly" name="width" placeholder="Width" value="<?=empty($getC->width)?'':$getC->width?>">
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
                      <label class="row" for="width">Weight</label>
                      <span class='text-red'>*</span></b>
                      <span style="float:right">:</span>
                    </div>

                    <div class="col-md-8 col-sm-12">
                      <div class="label_view">
                        <?=$getD->weight?>
                      </div>
                      <div class="label_input inline">
                        <div class="input-group">
                          <input type="text" class="form-control required numberOnly" name="weight" placeholder="Weight" value="<?=empty($getC->weight)?'':$getC->weight?>">
                          <span class="input-group-addon">glm</span>
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
                        <?=$getD->horizontal?>
                      </div>
                      <div class="label_input inline">
                        <div class="input-group">
                          <input type="text" class="form-control w50 numberOnly" name="horizontal" id="horizontal" placeholder="Horizontal Percentage" value="<?=empty($getC->horizontal)?'':$getC->horizontal?>">
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
                        <?=$getD->vertical?>
                      </div>
                      <div class="label_input inline">
                        <div class="input-group">
                          <input type="text" class="form-control w50 numberOnly" name="vertical" id="vertical" placeholder="Vertical Percentage" value="<?=empty($getC->vertical)?'':$getC->vertical?>">
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
                    <?=$getD->color_fastness?>
                  </div>
                  <div class="label_input inline">
                    <div class="input-group">
                      <input type="text" class="form-control required numberOnly" name="color_fastness" placeholder="Width" value="<?=empty($getC->color_fastness)?'':$getC->color_fastness?>">
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
                    <?=$getD->anti_bacterial?>
                  </div>
                  <div class="label_input inline">
                    <div class="input-group select2-bootstrap-append">
                      <div class="input-group-btn">
                        <select class="form-control select2" name="anti_bacterial" id="anti_bacterial" >
                          <option value=""></option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
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
                    <?=$getD->additional_features?>
                  </div>
                  <div class="label_input inline">
                    <div class="input-group select2-bootstrap-append">
                      <div class="input-group-btn">
                        <select class="form-control select2" name="additional_features" id="additional_features" >
                          <option value=""></option>
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
                    <?=$getD->additional_features?>
                  </div>
                  <div class="label_input">
                    <div class="input-group select2-bootstrap-append">
                      <table class="table table-striped table-bordered table-hover table-condensed">
                        <thead>
                          <tr>
                            No.
                          </tr>
                          <tr>
                            Instruction
                          </tr>
                        </thead>
                        <tbody id="ci-tbody">

                        </tbody>
                      </table>
                      <div class="input-group-btn">
                        <input type="hidden" name="ci_val" id="ci_val" value="">
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
			echo form_button(array('type'=>'button','class'=>'btn btn-md btn-success label_input','style'=>'min-width:100px; float:right;','value'=>'save','content'=>'Save','id'=>'addFabricSave')).' ';
		?>
	</div>
</div>
</form>

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
    getPatternType();
    if ('<?=!empty($getC)?>') {
      getPatternName();
    }
    getColour();
    getCharacteristic();
    getCollection();
    getClass();
    getFeature();
    getCurs();
    getContent();
    getCountry();

    getSupplierType();
    getBrand();
    getToq();
    $(".datepicker").datepicker({
        format : "yyyy-mm-dd",
        showInputs: true,
        autoclose:true
    });
    $(".select2").select2({
      theme: "bootstrap",
      placeholder: "Choose An Option",
      allowClear: true,
      width: 'element'
      //dropdownParent: $("#form-fabric")
    });

    jQuery(document).on('keyup', '.bank_num', function(){
      var foo = $(this).val().split("-").join(""); // remove hyphens
      if (foo.length > 0) {
        foo = foo.match(new RegExp('.{1,4}', 'g')).join("-");
      }
      $(this).val(foo);
    });
    jQuery(document).on('change', '.id_supplier_input', function(){
      getPatternName();
      //console.log('OKAY');
    });
    jQuery(document).on('click', '#addPatternNameSavesssXXX', function(){
      //var valid = getValidation();
      //console.log(valid);
      var formdata = new FormData(document.getElementById("form-PatternName"));//$("#form-supplier").serialize();
      console.log(formdata);
      $.ajax({
        url: siteurl+"master_supplier/savePatternName",
        dataType : "json",
        type: 'POST',
        data: formdata,
        processData:false,
        contentType:false,
        cache:false,
        async:false,
        success: function(result){
          if(result.status=='1'){
            swal({
              title: "Sukses!",
              text: result['pesan'],
              type: "success",
              timer: 1500,
              showConfirmButton: false
            });
            setTimeout(function(){
              //DataTables('set');
              if (($("#ModalView2").data('bs.modal') || {}).isShown) {
                $("#ModalView2").modal('hide');
              }
              getPatternName();
            },1600);
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
        error: function (request, error) {
          console.log(arguments);
          alert(" Can't do because: " + error);
        }
      });
      //$("#ModalView").modal('hide');
    });


    $(document).on('click', '#saveSelBrand', function(e){
      var formdata = $("#form-selBrand").serialize();
      var selected = '';
      $('#my-grid input:checked').each(function() {
          //selected.push($(this).val());
          selected = selected+$(this).val()+';';
      });
      //console.log(selected);
      $('#id_brand').val(selected);
      $("#ModalView2").modal('hide');
    });
    $(document).on('click', '#generate_id', function(e){
      var name = $('#nm_supplier').val();
      if (name != '') {
        $.ajax({
          url: siteurl+active_controller+"getID",
          dataType : "json",
          type: 'POST',
          data: {nm:name},
          success: function(result){
            $('#id_supplier').val(result.id);
          },
          error: function (request, error) {
            console.log(arguments);
            alert(" Can't do because: " + error);
          }
        });
      }else {
        swal({
          title: "Warning!",
          text: "Complete Supplier name first, please!",
          type: "warning",
          timer: 3500,
          showConfirmButton: false
        });
      }

    });
    $(document).on('click', '.radioShipping', function(e){
      getProCat();
      /*var id_category = $('#id_category').val();
      var val = $(this).val();
      if (val != '') {
        $.ajax({
          url: siteurl+active_controller+"getProductCatOpt",
          dataType : "json",
          type: 'POST',
          data: {id_category:id_category,supplier_shipping:val},
          success: function(result){
            $('#id_category').html(result.html);
          },
          error: function (request, error) {
            console.log(arguments);
            alert(" Can't do because: " + error);
          }
        });
      }else {
        swal({
          title: "Warning!",
          text: "Complete Supplier name first, please!",
          type: "warning",
          timer: 3500,
          showConfirmButton: false
        });
      }*/

    });
    $(document).on('change', '#payment_option', function(e){
      var val = $(this).val();
      if (val == 'credit') {
        $('#credit_term').css({"display": "block"}).fadeIn(1000);
      }else {
        $('#credit_term').fadeOut(1000).css({"display": "none"});
      }

    });
    $(document).on('change', '#id_type', function(e){
      getBusCat();
    });
    $(document).on('change', '#id_business', function(e){
      getSupCap();
    });
    $(document).on('change', '#id_capacity', function(e){
      //  console.log($(this).val());
    });
    $(document).on('change', '#id_country', function(e){
      getCodeCountry();
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
    $(document).on('click change keyup paste blur', '#form-fabric .id_needed', function(e){
      var id_supplier = $('#id_supplier').val();
      var id_pattern_name = $('#id_pattern_name').val();
      var id_colour = $('#id_colour').val();

      //$('#id_product').val(id_supplier+'-'+id_pattern_name+'-'+id_colour);
      $('#id_product').val(id_pattern_name+'-'+id_colour);
      //console.log('AHAHAHAHA');
    });

    if ('<?php $getC ?>' != null) {
      getProCat();
      getBusCat();
      getSupCap();
    }
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
        $('#id_supplier').html(result.html);
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
        $('#id_colour').html(result.html);
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
