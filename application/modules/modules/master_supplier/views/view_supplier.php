<?php

if (!empty($this->uri->segment(3))) {
  $getC             = $this->db->get_where('master_supplier', array('id_supplier' => $id))->row();
  $getCur           = $this->db->get('mata_uang')->result();
  $PIC_Office       = $this->db->get_where('child_supplier_pic_office', array('id_supplier' => $id))->result();
  $PIC_Factory      = $this->db->get_where('child_supplier_pic_factory', array('id_supplier' => $id))->result();
  $PIC_Excompany    = $this->db->get_where('child_supplier_pic_excompany', array('id_supplier' => $id))->result();
  $name_type        = $this->db->get_where('child_supplier_type', array('id_type' => $getC->id_type))->row();
  $country          = $this->db->get_where('negara', array('id' => $getC->id_country))->row();
  $prov             = $this->db->get_where('provinsi', array('id_prov' => $getC->id_prov))->row();
  $city             = $this->db->get_where('kabupaten', array('id_kab' => $getC->city_office))->row();
  $name_supcap      = $this->db->where_in('id_capacity', explode(";", $getC->id_capacity))->get('child_supplier_capacity')->result();
  $name_procat      = $this->db->get_where('master_product_category', array('id_category' => $getC->id_product_category))->row();
  $name_buscat      = $this->db->get_where('child_supplier_business_category', array('id_business' => $getC->id_business))->row();
  $name_toq         = $this->db->get_where('child_supplier_toq', array('id_toq' => $getC->id_toq))->row();
  $getSP            = $this->db->get_where('child_supplier_pic', array('id_supplier' => $id))->result();
  $getSB            = $this->db->get_where('child_supplier_bank', array('id_supplier' => $id))->result();
  //$getB     = $this->db->get_where('master_product_brand',array('id_supplier'=>$id))->result();
}

?>

<div class="content">
  <legend class="legend"><strong><?= $getC->nm_supplier_office ?></strong></legend>
  <!-- <span class="pull-left"><?= $getC->id_supplier ?></span> -->
  <!-- <hr> -->
  <div class="nav-tabs-custom">
    <ul class="nav nav-tabs nav-justified">
      <li class="active">
        <a href="#office" aria-controls="office" role="tab" data-toggle="tab"><strong>Office</strong></a>
      </li>
      <li>
        <a href="#factory" aria-controls="tab" role="tab" data-toggle="tab"><strong>Factory</strong> </a>
      </li>
      <li>
        <a href="#excompany" aria-controls="tab" role="tab" data-toggle="tab"><strong>Export Company</strong> </a>
      </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane active" id="office">
        <!-- <h4 style="margin:1em 0px">Detail Supplier Office</h4> -->
        <span class="span">Detail Supplier Office</span>
        <div class="row" style="line-height:15px;margin-top:1em;">
          <div class="col-md-6">
            <table class="table-condensed" width="100%">
              <tr>
                <td width="30%"><label for="">ID Supplier</label></td>
                <td><label for="">:</label> <?= $getC->id_supplier ?></td>
              </tr>
              <tr>
                <td><label for="">Input Date</label></td>
                <td><label for="">:</label> <?= $getC->input_date ?></td>
              </tr>
              <tr>
                <td><label for="">Shipping</label></td>
                <td><label for="">:</label> <?= $getC->supplier_shipping ?></td>
              </tr>
              <tr>
                <td><label for="">Telephone</label></td>
                <td><label for="">:</label> <?= $getC->telephone_office_1 . ", " . $getC->telephone_office_2 ?></td>
              </tr>
              <tr>
                <td><label for="">Fax</label></td>
                <td><label for="">:</label> <?= $getC->fax_office ?></td>
              </tr>
              <tr>
                <td><label for="">Owner</label></td>
                <td><label for="">:</label> <?= $getC->owner ?></td>
              </tr>
            </table>
          </div>
          <div class="col-md-6">
            <table class="table-condensed" width="100%">
              <tr>
                <td width="30%"><label for="">Country</label></td>
                <td><label for="">:</label> <?= $country->nm_negara ?></td>
              </tr>
              <tr>
                <td><label for="">Province</label></td>
                <td><label for="">:</label> <?= $prov->nama ?></td>
              </tr>
              <tr>
                <td><label for="">City</label></td>
                <td><label for="">:</label> <?= $city->nama ?></td>
              </tr>
              <tr>
                <td><label for="">Address</label></td>
                <td><label for="">:</label> <?= $getC->address_office ?></td>
              </tr>
              <tr>
                <td><label for="">ZIP Code</label></td>
                <td><label for="">:</label> <?= $getC->zip_code_office ?></td>
              </tr>
            </table>
          </div>
        </div>
        <br>

        <div class="span" style="margin:1em 0px">PIC Office</div>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
          <?php foreach ($PIC_Office as $key => $pic_office) { ?>

            <div class="panel panel-default">
              <div class="panel-heading" role="tab">
                <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?= $key ?>" aria-expanded="true" aria-controls="collapseOne">
                    <?= $key + 1 . ". &nbsp" . $pic_office->pic_name ?>
                  </a>
                </h4>
              </div>
              <div id="collapse_<?= $key ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                  <div class="row" style="line-height:15px;margin-top:1em;">
                    <div class="col-md-6">
                      <table class="table-condensed" width="100%">
                        <tr>
                          <td width="30%"><label for="">PIC Name</label></td>
                          <td><label for="">:</label> <?= $pic_office->pic_name ?></td>
                        </tr>
                        <tr>
                          <td><label for="">Position</label></td>
                          <td><label for="">:</label> <?= $pic_office->pic_position ?></td>
                        </tr>
                        <tr>
                          <td><label for="">Phone</label></td>
                          <td><label for="">:</label> <?= $pic_office->pic_phone ?></td>
                        </tr>
                        <tr>
                          <td><label for="">WhatsApp Number</label></td>
                          <td><label for="">:</label> <?= $pic_office->pic_wa ?></td>
                        </tr>
                        <tr>
                          <td><label for="">E-mail</label></td>
                          <td><label for="">:</label> <?= $pic_office->pic_email ?></td>
                        </tr>
                        <tr>
                          <td><label for="">WeChat ID</label></td>
                          <td><label for="">:</label> <?= $pic_office->pic_wechat ?></td>
                        </tr>
                        <tr>
                          <td><label for="">Website</label></td>
                          <td><label for="">:</label> <?= $pic_office->pic_web ?></td>
                        </tr>
                      </table>
                    </div>
                    <div class="col-md-6">
                      <a target="_blank" href="<?= base_url('assets/img/master_supplier/PIC_Office/' . $pic_office->pic_card) ?>">
                        <img class="image_resposive" style="width:auto;height:200px" src="<?= base_url('assets/img/master_supplier/PIC_Office/' . $pic_office->pic_card) ?>" alt="pic_card">
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>

      </div>
      <div class="tab-pane" id="factory">
        <span style="margin:1em 0px">Detail Supplier Factory</span>
        <div class="row" style="line-height:15px;margin-top:1em;">
          <div class="col-md-6">
            <table class="table-condensed" width="100%">
              <tr>
                <td width="30%"><label for="">Factory Name</label></td>
                <td><label for="">:</label> <?= $getC->nm_supplier_factory ?></td>
              </tr>
              <tr>
                <td><label for="">Telephone</label></td>
                <td><label for="">:</label> <?= $getC->telephone_factory_1 . ", " . $getC->telephone_factory_2 ?></td>
              </tr>
              <tr>
                <td><label for="">Fax</label></td>
                <td><label for="">:</label> <?= $getC->fax_factory ?></td>
              </tr>
              <tr>
                <td><label for="">Owner</label></td>
                <td><label for="">:</label> <?= $getC->owner_factory ?></td>
              </tr>
            </table>
          </div>
          <div class="col-md-6">
            <?php $country_factory = $this->db->get_where('negara', array('id' => $getC->id_country_factory))->row(); ?>
            <?php $prov_factory = $this->db->get_where('provinsi', array('id_prov' => $getC->id_prov_factory))->row(); ?>
            <?php $city_factory = $this->db->get_where('kabupaten', array('id_kab' => $getC->city_factory))->row(); ?>
            <table class="table-condensed" width="100%">
              <tr>
                <td width="30%"><label for="">Country</label></td>
                <td><label for="">:</label> <?= $country_factory->nm_negara ?></td>
              </tr>
              <tr>
                <td><label for="">Province</label></td>
                <td><label for="">:</label> <?= $prov_factory->nama ?></td>
              </tr>
              <tr>
                <td><label for="">City</label></td>
                <td><label for="">:</label> <?= $city_factory->nama ?></td>
              </tr>
              <tr>
                <td><label for="">Address</label></td>
                <td><label for="">:</label> <?= $getC->address_factory ?></td>
              </tr>
              <tr>
                <td><label for="">ZIP Code</label></td>
                <td><label for="">:</label> <?= $getC->zip_code_factory ?></td>
              </tr>
            </table>
          </div>
        </div>

        <div class="span" style="margin:1em 0px">PIC Factory</div>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
          <?php foreach ($PIC_Factory as $key => $pic_factory) { ?>

            <div class="panel panel-default">
              <div class="panel-heading" role="tab">
                <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_factory_<?= $key ?>" aria-expanded="true" aria-controls="collapseOne">
                    <?= $key + 1 . ". &nbsp" . $pic_factory->pic_name ?>
                  </a>
                </h4>
              </div>
              <div id="collapse_factory_<?= $key ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                  <div class="row" style="line-height:15px;margin-top:1em;">
                    <div class="col-md-6">
                      <table class="table-condensed" width="100%">
                        <tr>
                          <td width="30%"><label for="">PIC Name</label></td>
                          <td><label for="">:</label> <?= $pic_factory->pic_name ?></td>
                        </tr>
                        <tr>
                          <td><label for="">Position</label></td>
                          <td><label for="">:</label> <?= $pic_factory->pic_position ?></td>
                        </tr>
                        <tr>
                          <td><label for="">Phone</label></td>
                          <td><label for="">:</label> <?= $pic_factory->pic_phone ?></td>
                        </tr>
                        <tr>
                          <td><label for="">WhatsApp Number</label></td>
                          <td><label for="">:</label> <?= $pic_factory->pic_wa ?></td>
                        </tr>
                        <tr>
                          <td><label for="">E-mail</label></td>
                          <td><label for="">:</label> <?= $pic_factory->pic_email ?></td>
                        </tr>
                        <tr>
                          <td><label for="">WeChat ID</label></td>
                          <td><label for="">:</label> <?= $pic_factory->pic_wechat ?></td>
                        </tr>
                        <tr>
                          <td><label for="">Website</label></td>
                          <td><label for="">:</label> <?= $pic_factory->pic_web ?></td>
                        </tr>
                      </table>
                    </div>
                    <div class="col-md-6">
                      <a target="_blank" href="<?= base_url('assets/img/master_supplier/PIC_Factory/' . $pic_factory->pic_card) ?>">
                        <img class="image_resposive" style="width:auto;height:200px" src="<?= base_url('assets/img/master_supplier/PIC_Factory/' . $pic_factory->pic_card) ?>" alt="pic_card">
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
      <div class="tab-pane" id="excompany">
        <span style="margin:1em 0px">Detail Supplier Excompany</span>
        <div class="row" style="line-height:15px;margin-top:1em;">
          <div class="col-md-6">
            <table class="table-condensed" width="100%">
              <tr>
                <td width="30%"><label for="">Name Excport Company</label></td>
                <td><label for="">:</label> <?= $getC->nm_supplier_excompany ?></td>
              </tr>
              <tr>
                <td><label for="">Telephone</label></td>
                <td><label for="">:</label> <?= $getC->telephone_excompany_1 . ", " . $getC->telephone_excompany_2 ?></td>
              </tr>
              <tr>
                <td><label for="">Fax</label></td>
                <td><label for="">:</label> <?= $getC->fax_excompany ?></td>
              </tr>
              <tr>
                <td><label for="">Owner</label></td>
                <td><label for="">:</label> <?= $getC->owner_excompany ?></td>
              </tr>
            </table>
          </div>
          <div class="col-md-6">
            <?php $country_excompany = $this->db->get_where('negara', array('id' => $getC->id_country_factory))->row(); ?>
            <?php $prov_excompany = $this->db->get_where('provinsi', array('id_prov' => $getC->id_prov_excompany))->row(); ?>
            <?php $city_excompany = $this->db->get_where('kabupaten', array('id_kab' => $getC->city_excompany))->row(); ?>
            <table class="table-condensed" width="100%">
              <tr>
                <td width="30%"><label for="">Country</label></td>
                <td><label for="">:</label> <?= $country_excompany->nm_negara ?></td>
              </tr>
              <tr>
                <td><label for="">Province</label></td>
                <td><label for="">:</label> <?= $prov_excompany->nama ?></td>
              </tr>
              <tr>
                <td><label for="">City</label></td>
                <td><label for="">:</label> <?= $city_excompany->nama ?></td>
              </tr>
              <tr>
                <td><label for="">Address</label></td>
                <td><label for="">:</label> <?= $getC->address_excompany ?></td>
              </tr>
              <tr>
                <td><label for="">ZIP Code</label></td>
                <td><label for="">:</label> <?= $getC->zip_code_excompany ?></td>
              </tr>
            </table>
          </div>
        </div>

        <div class="span" style="margin:1em 0px">PIC Export Company</div>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
          <?php foreach ($PIC_Excompany as $key => $pic_excompany) { ?>

            <div class="panel panel-default">
              <div class="panel-heading" role="tab">
                <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_excompany_<?= $key ?>" aria-expanded="true" aria-controls="collapseOne">
                    <?= $key + 1 . ". &nbsp" . $pic_excompany->pic_name ?>
                  </a>
                </h4>
              </div>
              <div id="collapse_excompany_<?= $key ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                  <div class="row" style="line-height:15px;margin-top:1em;">
                    <div class="col-md-6">
                      <table class="table-condensed" width="100%">
                        <tr>
                          <td width="30%"><label for="">PIC Name</label></td>
                          <td><label for="">:</label> <?= $pic_excompany->pic_name ?></td>
                        </tr>
                        <tr>
                          <td><label for="">Position</label></td>
                          <td><label for="">:</label> <?= $pic_excompany->pic_position ?></td>
                        </tr>
                        <tr>
                          <td><label for="">Phone</label></td>
                          <td><label for="">:</label> <?= $pic_excompany->pic_phone ?></td>
                        </tr>
                        <tr>
                          <td><label for="">WhatsApp Number</label></td>
                          <td><label for="">:</label> <?= $pic_excompany->pic_wa ?></td>
                        </tr>
                        <tr>
                          <td><label for="">E-mail</label></td>
                          <td><label for="">:</label> <?= $pic_excompany->pic_email ?></td>
                        </tr>
                        <tr>
                          <td><label for="">WeChat ID</label></td>
                          <td><label for="">:</label> <?= $pic_excompany->pic_wechat ?></td>
                        </tr>
                        <tr>
                          <td><label for="">Website</label></td>
                          <td><label for="">:</label> <?= $pic_excompany->pic_web ?></td>
                        </tr>
                      </table>
                    </div>
                    <div class="col-md-6">
                      <a target="_blank" href="<?= base_url('assets/img/master_supplier/PIC_Excompany/' . $pic_excompany->pic_card) ?>">
                        <img class="image_resposive" style="width:auto;height:200px" src="<?= base_url('assets/img/master_supplier/PIC_Excompany/' . $pic_excompany->pic_card) ?>" alt="pic_card">
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
  <hr>
  <div style="margin:1em auto;">Detail Supplier Productivity</div>
  <div class="row">
    <div class="col-md-6">
      <table class="table-condensed" width="100%" style="line-height:15px">
        <tr>
          <td width="30%">
            <label for="">Supplier Type</label>
            <p><?= $name_type->name_type ?></p>
          </td>
        </tr>
        <tr>
          <td>
            <label for="">Busines Catregory</label>
            <p><?= $name_buscat->name_business ?></p>
          </td>
        </tr>
        <tr>
          <td>
            <label for="">Capacity</label>
            <p>
              <?php foreach ($name_supcap as $key) {
                echo "<label class='label bg-gray'>" . $key->name_capacity . "</label> ";
              } ?>
            </p>
          </td>
        </tr>
        <tr>
          <td>
            <label for="">Product Category</label>
            <p><?= $name_procat->name_category ?></p>
          </td>
        </tr>
        <tr>
          <td>
            <label for="">Agent Name</label>
            <p><?= $getC->agent_name ?></p>
          </td>
        </tr>
        <tr>
          <td>
            <label for="">Remarks</label>
            <p><?= $getC->remarks ?></p>
          </td>
        </tr>
      </table>
    </div>
    <div class="col-md-6">
      <table class="table-condensed" width="100%" style="line-height:15px">
        <tr>
          <td width="30%">
            <label for="">Website</label>
            <p>
              <a href="https://<?= $getC->website ?>">
                <?= $getC->website ?>
                <sup><i class="fa fa-external-link"></i></sup>
              </a>
            </p>
          </td>
          </td>
        </tr>
        <tr>
          <td>
            <label for="">NPWP Number</label>
            <p><?= $prov->nama ?></p>
          </td>
        </tr>
        <tr>
          <td>
            <label for="">NPWP Name</label>
            <p><?= $city->nama ?></p>
          </td>
        </tr>
        <tr>
          <td>
            <label for="">NPWP Address</label>
            <p><?= $getC->npwp_address ?></p>
          </td>
        </tr>
        <tr>
          <td>
            <label for="">Supplier Status</label>
            <p><?= $getC->activation_factory == 'active' ? "<span class='badge bg-green'>" . ucfirst($getC->activation) . "</span>" : ''; ?></p>
          </td>
        </tr>
        <tr>
          <td>
            <label for="">Status excompany</label>
            <p><?= $getC->activation_factory == 'active' ? "<span class='badge bg-green'>" . ucfirst($getC->activation_factory) . "</span>" : ''; ?>
            </p>
          </td>
        </tr>
      </table>
    </div>
  </div>
</div>