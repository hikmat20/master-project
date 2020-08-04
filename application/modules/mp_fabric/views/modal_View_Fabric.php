<?php

if (!empty($this->uri->segment(3))) {
  $getC                 = $this->db->get_where('master_product_fabric', array('id_product' => $id))->row();
  $name_supplier        = $this->db->get_where('master_supplier', array('id_supplier' => $getC->id_supplier))->row();
  $name_country         = $this->db->get_where('master_country', array('id_country' => $getC->id_country))->row();
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

?>


<div class="box box-solid">
  <div class="box-body">

    <div class="row">
      <div class="col-md-4">
        <br>
        <br>
        <img class="image-responsive" id="blah" src="<?= empty($getC->photo_product) ? base_url('assets/img/master_fabric/noimage.jpg') : base_url('assets/img/master_fabric/' . $getC->photo_product) ?>" alt="" style="padding:10px;border:solid 1px #ddd;max-height:500px;background-image:cover" width="100%" />
      </div>

      <div class="col-md-8">
        <legend class="legend" style="font-size:26px"><strong><?= $getC->name_product ?></strong></legend>
        <div class="row">
          <div class="col-md-8">
            <table width="100%" class="table table-condensed">
              <tbody>
                <tr>
                  <td width="30%"><label for="">Id Product </label></td>
                  <td> <span><label class="label label-default label-md"><?= $getC->id_product ?></label></span></td>
                </tr>
                <tr>
                  <td width=""><label for="">Shipment</label></td>
                  <td> <span><?= $getC->shipment ?></span></td>
                </tr>
                <tr>
                  <td width=""><label for="">Supplier </label></td>
                  <td> <span><?= $name_supplier->nm_supplier_office ?></span></td>
                </tr>
                <tr>
                  <td width=""><label for="">Usage </label></td>
                  <td> <span>
                      <?php
                      // $usage = array();
                      $usages = explode(",", $getC->usage);
                      foreach ($usages as $value) { ?>
                        <label class="label label-info">
                          <?= $value; ?>
                        </label>&nbsp
                      <?php } ?>
                    </span></td>
                </tr>
                <tr>
                  <td width=""><label for="">Furniture Application</label></td>
                  <td> <span><?= ($getC) ? $getC->furniture_application : '-' ?></span></td>
                </tr>
                <tr>
                  <td width=""><label for="">Curtain Application</label></td>
                  <td> <span><?= ($getC) ? $getC->curtain_application  : '-' ?></span></td>
                </tr>
                <tr>
                  <td width=""><label for="">Pattern Type </label></td>
                  <td> <span>
                      <?php
                      // $usage = array();
                      $patternType = explode(",", $getC->id_pattern_type);
                      foreach ($patternType as $PatType) {
                        $pattern    = $this->db->get_where('master_pattern_type', array('id_pattern_type' => $PatType))->row();
                      ?>
                        <label class="label label-warning">
                          <?= $pattern->name_pattern_type; ?>
                        </label>&nbsp
                      <?php } ?>
                    </span></td>
                </tr>
                <tr>
                  <td width=""><label for="">Pattern Name</label></td>
                  <td> <span><?= ($getC) ? $name_pattern_name->name_pattern  : '-' ?></span></td>
                </tr>
                <tr>
                  <td width=""><label for="">Colour </label></td>
                  <td> <span>
                      <?php
                      // $usage = array();
                      $colours = explode(",", $getC->id_colour);
                      foreach ($colours as $colour) {
                        $colors    = $this->db->get_where('master_colour', array('id_colour' => $colour))->row();
                      ?>
                        <label class="label" style="background-color:<?= $colors->colour_code ?>">
                          <?= $colors->name_colour; ?>
                        </label>&nbsp
                      <?php } ?>
                    </span></td>
                </tr>
                <tr>
                  <td width=""><label for="">Characteristic </label></td>
                  <td> <span>
                      <?php
                      // $usage = array();
                      $charcters = explode(",", $getC->id_characteristic);
                      foreach ($charcters as $charcter) {
                        $charcterss   = $this->db->get_where('master_product_characteristic', array('id_characteristic' => $charcter))->row();
                      ?>
                        <label class="label bg-gray">
                          <?= $charcterss->name_characteristic; ?>
                        </label>&nbsp
                      <?php } ?>
                    </span></td>
                </tr>
                <tr>
                  <td width=""><label for="">Collection</label></td>
                  <td> <span><?= ($name_collection) ? $name_collection->name_collection  : '-' ?></span></td>
                </tr>
                <tr>
                  <td width=""><label for="">Class</label></td>
                  <td> <span><?= ($name_class) ? $name_class->name_class  : '-' ?></span></td>
                </tr>
                <tr>
                  <td width=""><label for="">Status</label></td>
                  <td> <span><?= ($getC->activation == 'aktif') ? '<label class="label bg-green">Active</label>' : '-' ?></span></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-md-4">
            <label for="">MOQ</label>
            <p><?= empty($getC->moq) ? '-' : $getC->moq . " " . $getC->id_uom ?></p>

            <label for="">Status Product</label>
            <p style=""><?= empty($getC->product_status) ? '-' : $getC->product_status ?></p>

            <label for="">Country of Origin</label>
            <p style=""><?= empty($name_country->name_country) ? '-' : $name_country->name_country ?></p>

            <label for="">Similar Name</label>
            <p style=""><?= empty($getC->similar_name) ? '-' : $getC->similar_name ?></p>

            <label for="">Buy Price</label>
            <p class="text-primary" style="font-size:20px">$<?= empty($getC->buy_price) ? '-' : number_format($getC->buy_price) ?></p>

            <label for="">Curs</label>
            <p class="text-primary" style="font-size:20px">Rp. <?= empty($getC->curs) ? '-' : number_format($getC->curs) ?></p>

            <label for="">Price List</label>
            <p class="text-info" style="font-size:28px">Rp. <?= empty($getC->pricelist) ? '-' : number_format($getC->pricelist) ?></p>


          </div>
        </div>
      </div>
    </div>

    <div class="content">
      <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-tabs-justify" role="tablist">
          <li role="presentation" class="active">
            <a href="#home" aria-controls="home" role="tab" data-toggle="tab">home</a>
          </li>
          <li role="presentation">
            <a href="#tab" aria-controls="tab" role="tab" data-toggle="tab">tab</a>
          </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="home">...</div>
          <div role="tabpanel" class="tab-pane" id="tab">...</div>
        </div>
      </div>

    </div>
    <!-- <div class="row">
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

    </div> -->
  </div>
</div>