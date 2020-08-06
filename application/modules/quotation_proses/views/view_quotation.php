<form class="" id="form-quotation" action="" method="post" enctype="multipart/form-data">
  <div class=" box-solid">
    <div class="box-header with-border">
      <h3 class="box-title"><label for=""> CUSTOMER DATA INFORMATION</label></h3>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-12">
          <table width="100%">
            <tr>
              <td width="50%">
                <table width="100%" class="table-striped">
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
              </td>
              <td width="50%">
                <table width="100%" class="table-striped">
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
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-6">
        <label for="">Payment Term : <?= $data->payment_term == "TM" ? "Termin" : "Cash in Advance" ?></label>
        <?php if ($data->payment_term == 'TM') : ?>
          <table width="100%" class="table-striped table-bordered">
            <thead>
              <tr class="bg-gray">
                <th width="20px">No</th>
                <th>Requirements</th>
                <th width="150px" class="text-right">Value</th>
                <th width="80px" class="text-center">%</th>
                <th>Notes</th>
              </tr>
            </thead>
            <tbody class="list-termin">
              <?php $no = 0;
              foreach ($pay_term as $pt) : $no++ ?>
                <tr>
                  <td><?= $no ?></td>
                  <td><?= $pt->requirement ?></td>
                  <td class="text-right"><?= number_format($pt->value) ?></td>
                  <td class="text-center"><?= $pt->percent ?></td>
                  <td><?= $pt->notes ?></td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        <?php endif ?>
      </div>
    </div>
    <hr>
  </div>

  <div class="box box-solid">
    <div class="box-header with-border">
      <h3 class="box-title"><label for="">DETAIL DATA ORDER</label></h3>
    </div>
    <div class="box-body">
      <?php
      $no = 0;
      foreach ($rooms as $room) {
        $no++;
      ?>
        <legend><label>Deskripsi Jendela[<?= $no ?>]</label></legend>
        <div class="row">
          <div class="col-md-12">
            <table width="100%" class="table-striped">
              <tr>
                <td width="15%"><label>Ruangan</label></td>
                <td>: <?= $room->name_room ?></td>
              </tr>
              <tr>
                <td><label>Lantai</label></td>
                <td>: <?= $room->floor ?></td>
              </tr>
              <tr>
                <td><label>Jendela</label></td>
                <td>: <?= $room->window ?></td>
              </tr>
              <tr>
                <td><label>Lebar</label></td>
                <td>: <?= $room->width_window ?> cm</td>
              </tr>
              <tr>
                <td><label>Tinggi</label></td>
                <td>: <?= $room->height_window ?> cm</td>
              </tr>
              <tr>
                <td><label>Qty Unit</label></td>
                <td>: <?= $room->qty_unit ?> pcs</td>
              </tr>
              <tr>
                <td><label>Installation</label></td>
                <td>: <?= ucfirst($room->installation) ?></td>
              </tr>
            </table>
          </div>
        </div>
        <br>

        <!-- CURTAIN -->
        <?php
        $qttCurtain = $this->db->get_where('qtt_product_fabric', ['id_ruangan' => $room->id_ruangan, 'item' => 'curtain'])->row();
        if ($qttCurtain) { ?>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h4 class="box-title"><label> Curtain</label></h4>
            </div>
            <div class="box-body">
              <table width="100%" class="table-bordered table- table-striped">
                <thead>
                  <tr class="bg-primary">
                    <th width="20%" class="text-center">Item Code</th>
                    <th width="6%" class="text-center">Buka Arah</th>
                    <th width="5%" class="text-center">Panel</th>
                    <th width="5%" class="text-center">Qty/Unit(m)</th>
                    <th width="9%" class="text-center">Price(m)</th>
                    <th width="9%" class="text-center">Total Price</th>
                    <th width="7%" class="text-center">Discount(%)</th>
                    <th width="9%" class="text-center">Total</th>
                    <th width="10%" class="text-center">Status</th>
                    <th width="" class="text-center">Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td colspan="10"><label for="">Curtain Material</label></td>
                  </tr>
                  <tr>
                    <td>
                      <?php
                      $curtain = $this->db->get_where('master_product_fabric', ['id_product' => $qttCurtain->id_product])->row();
                      $t_hrg_kain = $qttCurtain->harga_kain * $qttCurtain->t_kain;
                      $total = $t_hrg_kain - ($t_hrg_kain * $qttCurtain->disc_persen / 100);
                      ?>
                      <label><?= $curtain->id_product ?></label><br>
                      <label><?= $curtain->name_product ?></label><br>
                      Width : <?= $curtain->width ?> cm<br>
                      Weight : <?= $curtain->weight ?> cm<br>
                      Content : <?= $curtain->content_percent ?>
                    </td>
                    <td style="vertical-align:top" class="text-center"><?= $qttCurtain->bukaan ?></td>
                    <td style="vertical-align:top" class="text-center"><?= $qttCurtain->round_up ?></td>
                    <td style="vertical-align:top" class="text-center"><?= $qttCurtain->t_kain ?> m</td>
                    <td style="vertical-align:top" class="text-right"><?= number_format($qttCurtain->harga_kain) ?></td>
                    <td style="vertical-align:top" class="text-right"><?= number_format($t_hrg_kain) ?></td>
                    <td style="vertical-align:top" class="text-center"><?= $qttCurtain->disc_persen ? $qttCurtain->disc_persen : '0' ?>%</td>
                    <td style="vertical-align:top" class="text-right"><?= number_format($total) ?></td>
                    <td style="vertical-align:top" class="text-center"><?= $curtain->product_status ?></td>
                    <td style="vertical-align:top"><?= $qttCurtain->keterangan ?></td>
                  </tr>
                  <tr>
                    <td colspan="10"><label for="">Rail Curtain</label></td>
                  </tr>
                  <?php
                  $rail = $this->db->get_where('mp_rail', ['id_rail' => $qttCurtain->rail_material])->row();
                  $total_rail = $qttCurtain->t_price - ($qttCurtain->t_price * $qttCurtain->diskon_rail / 100);
                  ?>
                  <tr>
                    <td><?= $rail->id_rail . " - " . $rail->name_product ?></td>
                    <td></td>
                    <td></td>
                    <td class="text-center"><?= $qttCurtain->width ?></td>
                    <td class="text-right"><?= number_format($qttCurtain->price) ?></td>
                    <td class="text-right"><?= number_format($qttCurtain->t_price) ?></td>
                    <td class="text-center"><?= $qttCurtain->diskon_rail ? number_format($qttCurtain->diskon_rail) : '0' ?>%</td>
                    </td>
                    <td class="text-right"><?= number_format($total_rail) ?></td>
                    <td class="text-center"><?= $rail->status_wh ?></td>
                    <td class=""><?= $qttCurtain->ket_rail ?></td>
                  </tr>
                  <tr>
                    <td colspan="10"><label for="">Jahitan</label></td>
                  </tr>
                  <?php
                  $jahitan = $this->db->get_where('sewing', ['id_sewing' => $qttCurtain->jahitan])->row();
                  $total_jahit = $qttCurtain->hrg_jahitan * $qttCurtain->t_kain;
                  $gtotal_jahitan = $total_jahit - ($total_jahit * $qttCurtain->disc_jahitan / 100);
                  ?>
                  <tr>
                    <td><?= $jahitan->item ?></td>
                    <td></td>
                    <td></td>
                    <td class="text-center"><?= $qttCurtain->t_kain ?></td>
                    <td class="text-right"><?= $qttCurtain->hrg_jahitan ? number_format($qttCurtain->hrg_jahitan) : '' ?></td>
                    <td class="text-right"><?= $total_jahit ? number_format($total_jahit) : '0' ?></td>
                    <td class="text-center"><?= $qttCurtain->disc_jahitan ? $qttCurtain->disc_jahitan : '0' ?>%</td>
                    <td class="text-right"><?= $gtotal_jahitan ? number_format($gtotal_jahitan) : '' ?></td>
                    <td class="text-right"></td>
                    <td class="text-right"></td>
                  </tr>
                  <?php
                  $af = $this->db->get_where('qtt_air_freight', ['id_ruangan' => $room->id_ruangan, 'item' => 'curtain'])->row();
                  ?>
                  <tr>
                    <td><label for=""> Air Freight Curtain</label></td>
                    <td></td>
                    <td></td>
                    <td class="text-center"><?= $qttCurtain->t_kain ?></td>
                    <td class="text-right"><?= $af != '' ? number_format($af->air_freight) : '' ?></td>
                    <td></td>
                    <td></td>
                    <td class="text-right"><?= $af != '' ? number_format($af->total_air_freight) : '' ?></td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
              <br>
            </div>
          </div>
          <br>
        <?php
        }
        ?>

        <!-- LINING -->
        <?php
        $qttLining = $this->db->get_where('qtt_product_fabric', ['id_ruangan' => $room->id_ruangan, 'item' => 'lining'])->row();
        if ($qttLining) { ?>
          <div class="box box-info">
            <div class="box-header with-border">
              <h4 class="box-title"><label> Lining</label></h4>
            </div>
            <div class="box-body">
              <table width="100%" class="table-bordered table- table-striped">
                <thead>
                  <tr class="bg-primary">
                    <th width="20%" class="text-center">Item Code</th>
                    <th width="6%" class="text-center">Buka Arah</th>
                    <th width="5%" class="text-center">Panel</th>
                    <th width="5%" class="text-center">Qty/Unit(m)</th>
                    <th width="9%" class="text-center">Price(m)</th>
                    <th width="9%" class="text-center">Total Price</th>
                    <th width="7%" class="text-center">Discount(%)</th>
                    <th width="9%" class="text-center">Total</th>
                    <th width="10%" class="text-center">Status</th>
                    <th width="" class="text-center">Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td colspan="10"><label for="">Lining Material</label></td>
                  </tr>
                  <tr>
                    <td>
                      <?php
                      $lining = $this->db->get_where('master_product_fabric', ['id_product' => $qttLining->id_product])->row();
                      $t_hrg_kain = $qttLining->harga_kain * $qttLining->t_kain;
                      $total = $t_hrg_kain - ($t_hrg_kain * $qttLining->disc_persen / 100);
                      ?>
                      <label><?= $lining->id_product ?></label><br>
                      <label><?= $lining->name_product ?></label><br>
                      Width : <?= $lining->width ?> cm<br>
                      Weight : <?= $lining->weight ?> cm<br>
                      Content : <?= $lining->content_percent ?>
                    </td>
                    <td style="vertical-align:top" class="text-center"><?= $qttLining->bukaan ?></td>
                    <td style="vertical-align:top" class="text-center"><?= $qttLining->round_up ?></td>
                    <td style="vertical-align:top" class="text-center"><?= $qttLining->t_kain ?> m</td>
                    <td style="vertical-align:top" class="text-right"><?= number_format($qttLining->harga_kain) ?></td>
                    <td style="vertical-align:top" class="text-right"><?= number_format($t_hrg_kain) ?></td>
                    <td style="vertical-align:top" class="text-center"><?= $qttLining->disc_persen ?>%</td>
                    <td style="vertical-align:top" class="text-right"><?= number_format($total) ?></td>
                    <td style="vertical-align:top" class="text-center"><?= $lining->product_status ?></td>
                    <td style="vertical-align:top"><?= $qttLining->keterangan ?></td>
                  </tr>
                  <tr>
                    <td colspan="10"><label for="">Rail Lining</label></td>
                  </tr>
                  <?php
                  $rail = $this->db->get_where('mp_rail', ['id_rail' => $qttLining->rail_material])->row();
                  $total_rail = $qttLining->t_price  - ($qttLining->t_price * $qttLining->diskon_rail / 100);
                  ?>
                  <tr>
                    <td><?= $rail->id_rail . ' - ' . $rail->name_product ?></td>
                    <td></td>
                    <td></td>
                    <td class="text-center"><?= $qttLining->width ?></td>
                    <td class="text-right"><?= number_format($qttLining->price) ?></td>
                    <td class="text-right"><?= number_format($qttLining->t_price) ?></td>
                    <td class="text-center"><?= number_format($qttLining->diskon_rail) ?>%</td>
                    <td class="text-right"><?= number_format($total_rail) ?></td>
                    <td class="text-center"><?= $rail->status_wh ?></td>
                    <td class=""><?= $qttLining->ket_rail ?></td>
                  </tr>
                  <tr>
                    <td colspan="10"><label for="">Jahitan</label></td>
                  </tr>
                  <?php
                  $jahitan = $this->db->get_where('sewing', ['id_sewing' => $qttLining->jahitan])->row();
                  $total_jahit = $qttLining->hrg_jahitan * $qttLining->t_kain;
                  $gtotal_jahit = $total_jahit - ($total_jahit * $qttLining->disc_jahitan / 100);
                  ?>
                  <tr>
                    <td><?= $jahitan->item ?></td>
                    <td></td>
                    <td></td>
                    <td class="text-center"><?= $qttLining->t_kain ?></td>
                    <td class="text-right"><?= number_format($qttLining->hrg_jahitan) ?></td>
                    <td class="text-right"><?= number_format($total_jahit) ?></td>
                    <td class="text-center"><?= number_format($qttLining->disc_jahitan) ?>%</td>
                    <td class="text-right"><?= number_format($gtotal_jahit) ?></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <?php
                  $afl = $this->db->get_where('qtt_air_freight', ['id_ruangan' => $room->id_ruangan, 'item' => 'lining'])->row();
                  ?>
                  <tr>
                    <td><label for=""> Air Freight Curtain</label></td>
                    <td></td>
                    <td></td>
                    <td class="text-center"><?= $qttLining->t_kain ?></td>
                    <td class="text-right"><?= $afl != '' ? number_format($afl->air_freight) : '' ?></td>
                    <td></td>
                    <td></td>
                    <td class="text-right"><?= $afl != '' ? number_format($afl->total_air_freight) : '' ?></td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
              <br>
            </div>
          </div>
          <br>
        <?php
        }
        ?>

        <!-- VITRAGE -->
        <?php
        $qttVitrage = $this->db->get_where('qtt_product_fabric', ['id_ruangan' => $room->id_ruangan, 'item' => 'vitrage'])->row();
        if ($qttVitrage) { ?>
          <div class="box box-warning">
            <div class="box-header with-border">
              <h4 class="box-title"><label> Vitrage</label></h4>
            </div>
            <div class="box-body">
              <table width="100%" class="table-bordered table-condensed table-striped">
                <thead>
                  <tr class="bg-primary">
                    <th width="20%" class="text-center">Item Code</th>
                    <th width="6%" class="text-center">Buka Arah</th>
                    <th width="5%" class="text-center">Panel</th>
                    <th width="5%" class="text-center">Qty/Unit(m)</th>
                    <th width="9%" class="text-center">Price(m)</th>
                    <th width="9%" class="text-center">Total Price</th>
                    <th width="7%" class="text-center">Discount(%)</th>
                    <th width="9%" class="text-center">Total</th>
                    <th width="10%" class="text-center">Status</th>
                    <th width="" class="text-center">Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td colspan="10"><label for=""> Vitrage Material</label></td>
                  </tr>
                  <tr>
                    <td>
                      <?php
                      $vitrage = $this->db->get_where('master_product_fabric', ['id_product' => $qttVitrage->id_product])->row();
                      $t_hrg_kain = $qttVitrage->harga_kain * $qttVitrage->t_kain;
                      $total = $t_hrg_kain - ($t_hrg_kain * $qttVitrage->disc_persen / 100);
                      ?>
                      <label><?= $vitrage->id_product ?></label><br>
                      <label><?= $vitrage->name_product ?></label><br>
                      Width : <?= $vitrage->width ?> cm<br>
                      Weight : <?= $vitrage->weight ?> cm<br>
                      Content : <?= $vitrage->content_percent ?>
                    </td>
                    <td style="vertical-align:top" class="text-center"><?= $qttVitrage->bukaan ?></td>
                    <td style="vertical-align:top" class="text-center"><?= $qttVitrage->round_up ?></td>
                    <td style="vertical-align:top" class="text-center"><?= $qttVitrage->t_kain ?> m</td>
                    <td style="vertical-align:top" class="text-right"><?= number_format($qttVitrage->harga_kain) ?></td>
                    <td style="vertical-align:top" class="text-right"><?= number_format($t_hrg_kain) ?></td>
                    <td style="vertical-align:top" class="text-center"><?= $qttVitrage->disc_persen ?>%</td>
                    <td style="vertical-align:top" class="text-right"><?= number_format($total) ?></td>
                    <td style="vertical-align:top" class="text-center"><?= $vitrage->product_status ?></td>
                    <td style="vertical-align:top"><?= $qttVitrage->keterangan ?></td>
                  </tr>
                  <tr>
                    <td colspan="10"><label for="">Rail Vitrage</label></td>
                  </tr>
                  <?php
                  $rail = $this->db->get_where('mp_rail', ['id_rail' => $qttVitrage->rail_material])->row();
                  $total_rail = $qttVitrage->price - ($qttVitrage->price * $qttVitrage->diskon_rail / 100);
                  ?>
                  <tr>
                    <td><?= $rail->id_rail . ' - ' . $rail->name_product ?></td>
                    <td></td>
                    <td></td>
                    <td class="text-center"><?= $qttVitrage->width ?></td>
                    <td class="text-right"><?= number_format($qttVitrage->price) ?></td>
                    <td class="text-right"><?= number_format($qttVitrage->t_price) ?></td>
                    <td class="text-center"><?= number_format($qttVitrage->diskon_rail) ?>%</td>
                    <td class="text-right"><?= number_format($total_rail) ?></td>
                    <td class="text-center"><?= $rail->status_wh ?></td>
                    <td class=""><?= $qttVitrage->ket_rail ?></td>
                  </tr>
                  <tr>
                    <td colspan="10"><label for="">Jahitan</label></td>
                  </tr>
                  <?php
                  $jahitan = $this->db->get_where('sewing', ['id_sewing' => $qttVitrage->jahitan])->row();
                  $total_jahit_v = $qttVitrage->hrg_jahitan * $qttVitrage->t_kain;
                  $gtotal_jahitan_v = $total_jahit_v - ($total_jahit_v * $qttVitrage->disc_jahitan / 100);

                  ?>
                  <tr>
                    <td><?= $jahitan->item ?></td>
                    <td class="text-right"></td>
                    <td class="text-right"></td>
                    <td class="text-center"><?= $qttVitrage->t_kain ?></td>
                    <td class="text-right"><?= number_format($qttVitrage->hrg_jahitan) ?></td>
                    <td class="text-right"><?= number_format($total_jahit_v) ?></td>
                    <td class="text-center"><?= number_format($qttVitrage->disc_jahitan) ?>%</td>
                    <td class="text-right"><?= number_format($gtotal_jahitan_v) ?></td>
                    <td class="text-right"></td>
                    <td class="text-right"></td>
                  </tr>
                  <?php
                  $afv = $this->db->get_where('qtt_air_freight', ['id_ruangan' => $room->id_ruangan, 'item' => 'vitrage'])->row();
                  ?>
                  <tr>
                    <td><label for=""> Air Freight Curtain</label></td>
                    <td></td>
                    <td></td>
                    <td class="text-center"><?= $qttVitrage->t_kain ?></td>
                    <td class="text-right"><?= $afv != '' ? number_format($afv->air_freight) : '' ?></td>
                    <td></td>
                    <td></td>
                    <td class="text-right"><?= $afv != '' ? number_format($afv->total_air_freight) : '' ?></td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
              <br>
            </div>
          </div>
          <br>
        <?php
        }
        ?>

        <!-- ACCESSORIESS -->
        <?php
        $qttAcc = $this->db->get_where('qtt_accessoriess', ['id_ruangan' => $room->id_ruangan])->result();
        if ($qttAcc) { ?>
          <div class="box box-danger">
            <div class="box-header with-border">
              <h4 class="box-title">
                <label> Accessoriess</label>
              </h4>
            </div>
            <div class="box-body">
              <table width="100%" class="table-bordered table-condensed table-striped">
                <thead>
                  <tr class="bg-primary">
                    <th width="">Item Code</th>
                    <th width="5%" class="text-center">Qty/m</th>
                    <th width="12%" class="text-right">Price</th>
                    <th width="12%" class="text-right">Subtotal</th>
                    <th width="5%" class="text-right">Disc.</th>
                    <th width="12%" class="text-right">Total Disc.</th>
                    <th width="12%" class="text-right">Total</th>
                  </tr>
                </thead>
                <?php
                $total_acc = $acc->price * $acc->qty;
                foreach ($qttAcc as $acc) { ?>
                  <tr>
                    <td><?= $acc->id_accessories . " - " . $acc->name_accessories ?></td>
                    <td class="text-center"><?= $acc->qty ?></td>
                    <td class="text-right"><?= number_format($acc->price) ?></td>
                    <td class="text-right"><?= number_format($acc->sub_price) ?></td>
                    <td class="text-right"><?= $acc->disc_acc ?></td>
                    <td class="text-right"><?= number_format($acc->val_disc_acc) ?></td>
                    <td class="text-right"><?= number_format($acc->t_price_acc) ?></td>
                  </tr>
                <?php
                }
                ?>
              </table>
            </div>
          </div>
          <br>
        <?php
        }
        ?>
      <?php
      }
      ?>
    </div>
  </div>

  <!-- DELIVERY COST -->
  <div class="box box-success">
    <div class="box-header with-border">
      <h4 class="box-title"><strong>Detail Delivery Cost</strong> <span class="text-red">*</span></h4>
    </div>
    <div class="box-body">
      <?php
      $qttDelivery = $this->db->get_where('qtt_delivery', ['id_quotation' => $data->id_quotation])->row();
      ?>
      <table class="table-condensed table-bordered table-striped" width="100%">
        <thead class="bg-blue">
          <tr>
            <th width="30%">City</th>
            <th>Delivery By</th>
            <th>Delivery Cost</th>
            <th>Keterangan</th>
          </tr>
        </thead>
        <?php
        if ($qttDelivery) { ?>

        <?php }

        ?>
        <tr>
          <td>
            <?= $qttDelivery->id_city ?>
          </td>
          <td>
            <?= $qttDelivery->via ?>
          </td>
          <td>
            <?= number_format($qttDelivery->price) ?>
          </td>
          <td>
            <?= $qttDelivery->keterangan ?>
          </td>
        </tr>
      </table>
    </div>
  </div>
  <br>

  <!-- ACCOMODATION -->
  <?php
  $meal_cost = $this->db->get_where('qtt_meal_cost', ['id_quotation' => $data->id_quotation])->result();
  $transport = $this->db->get_where('qtt_transport_cost', ['id_quotation' => $data->id_quotation])->result();
  $housing = $this->db->get_where('qtt_housing_cost', ['id_quotation' => $data->id_quotation])->result();
  $other = $this->db->get_where('qtt_other_cost', ['id_quotation' => $data->id_quotation])->result();

  if (
    !empty($meal_cost) ||
    !empty($transport) ||
    !empty($housing) ||
    !empty($other)
  ) :
  ?>
    <div class="box box-success">
      <div class="box-header with-border">
        <h4 class="box-title"><strong>Detail accomodation <span class="text-red">*</span></strong></h4>
      </div>
      <div class="box-body">
        <?php
        if (!empty($meal_cost)) :
        ?>
          <label for="">Meal & Pocket Money</label>
          <table class="table-condensed table-bordered table-striped" id="meal_cost" width="100%">
            <thead class="bg-blue">
              <tr>
                <th width="20%">Area</th>
                <th>Qty MP</th>
                <th>Total Day</th>
                <th>Cost MP/Day</th>
                <th class="text-right">Total</th>
                <th>Notes</th>
                <th>#</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 0;
              foreach ($meal_cost as $meal) : $no++; ?>
                <tr class="list_meal">
                  <td>
                    <select class="form-control select2" name="meal_cost[<?= $no ?>][meal_area]" data-id="<?= $no ?>">
                      <option value=""></option>
                      <?php
                      $areas = $this->db->get('kabupaten')->result();
                      foreach ($areas as $area) {
                      ?>
                        <option value="<?= $area->id_kab ?>" <?= $area->id_kab == $meal->area ? 'selected' : '' ?>><?= $area->nama ?></option>
                      <?php } ?>
                    </select>
                  </td>
                  <td><input value="<?= $meal->qty_mp ?>" id="qty_mp_meal<?= $no ?>" class="form-control text-right qty_mp_meal" type="number" name="meal_cost[<?= $no ?>][qty_mp_meal]" data-id="<?= $no ?>"></td>
                  <td><input value="<?= $meal->total_day ?>" id="total_day<?= $no ?>" class="form-control text-right total_day" type="number" name="meal_cost[<?= $no ?>][total_day]" data-id="<?= $no ?>"></td>
                  <td><input value="<?= number_format($meal->cost_mp_day) ?>" id="cost_mp_day<?= $no ?>" class="form-control numberOnly nominal text-right cost_mp_day" type="text" name="meal_cost[<?= $no ?>][cost_mp_day]" data-id="<?= $no ?>"></td>
                  <td><input value="<?= number_format($meal->total) ?>" id="total_meal<?= $no ?>" readonly class="form-control total_meal text-right" type="text" name="meal_cost[<?= $no ?>][total_meal]" data-id="<?= $no ?>"></td>
                  <td><input value="<?= $meal->notes ?>" id="notes_meal<?= $no ?>" class="form-control" type="text" name="meal_cost[<?= $no ?>][notes_meal]" data-id="<?= $no ?>"></td>
                  <td><button type="button" class="hapus_meal_cost btn btn-sm btn-danger">X</button></td>

                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <button class="btn btn-success" style="margin-top:7px" type="button" id="add_meal">
            <i class="fa fa-plus"></i> Add Meal & Pocket Money
          </button>
          <hr>
        <?php endif; ?>
        <?php
        if (!empty($transport)) : ?>
          <label for="">Transportation</label>
          <table class="table-condensed table-bordered table-striped" id="trans_cost" width="100%">
            <thead class="bg-blue">
              <tr>
                <th width="20%">Item Cost</th>
                <th width="15%">Transportation</th>
                <th>Origin</th>
                <th>Destination</th>
                <th width="7%">Qty MP</th>
                <th width="15%" class="text-right">Total</th>
                <th>Notes</th>
                <th>#</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 0;
              foreach ($transport as $trans) : $no++; ?>
                <tr>
                  <td>
                    <select data-id="<?= $no ?>" name="trans_cost[<?= $no ?>][item_cost]" id="item_cost<?= $no ?>" class="form-control select2">
                      <option value=""></option>
                      <?php
                      $transp = $this->db->get('transportasi')->result();
                      foreach ($transp as $tr) { ?>
                        <option value="<?= $tr->trans_code ?>" <?= $trans->item_cost == $tr->trans_code ? 'selected' : '' ?>><?= $tr->name_transportasi ?></option>
                      <?php } ?>
                    </select>
                  </td>
                  <td>
                    <select data-id="<?= $no ?>" name="trans_cost[<?= $no ?>][transport]" id="transport<?= $no ?>" class="form-control select2">' +
                      <option value="" <?= $trans->transportation == '' ? 'selected' : '' ?>></option>
                      <option value="Kereta" <?= $trans->transportation == 'Kereta' ? 'selected' : '' ?>>Kereta</option>
                      <option value="Pesawat" <?= $trans->transportation == 'Pesawat' ? 'selected' : '' ?>>Pesawat</option>
                      <option value="Bus" <?= $trans->transportation == 'Bus' ? 'selected' : '' ?>>Bus</option>
                      <option value="Mobil" <?= $trans->transportation == 'Mobil' ? 'selected' : '' ?>>Mobil</option>
                      <option value="Minibus" <?= $trans->transportation == 'Minibus' ? 'selected' : '' ?>>Minibus</option>
                      <option value="ELF" <?= $trans->transportation == 'ELF' ? 'selected' : '' ?>>ELF</option>
                    </select>
                  </td>
                  <td><input value="<?= $trans->origin ?>" type="text" data-id="<?= $no ?>" name="trans_cost[<?= $no ?>][origin]" id="origin<?= $no ?>" class="form-control"></td>
                  <td><input value="<?= $trans->destination ?>" type="text" data-id="<?= $no ?>" name="trans_cost[<?= $no ?>][destination]" id="destination<?= $no ?>" class="form-control"></td>
                  <td><input value="<?= $trans->qty_mp ?>" type="number" data-id="<?= $no ?>" name="trans_cost[<?= $no ?>][qty_mp]" id="qty_mp_transport<?= $no ?>" class="qty_mp_transport form-control"></td>
                  <td><input value="<?= number_format($trans->total) ?>" type="text" data-id="<?= $no ?>" name="trans_cost[<?= $no ?>][total]" id="total_transport<?= $no ?>" class="total_transport form-control text-right numberOnly nominal"></td>
                  <td><input value="<?= $trans->notes ?>" type="text" data-id="<?= $no ?>" name="trans_cost[<?= $no ?>][notes]" id="notes_transport<?= $no ?>" class="form-control"></td>
                  <td><button type="button" class="hapus_trans_cost btn btn-sm btn-danger">X</button></td>
                </tr>

              <?php endforeach ?>
            </tbody>
          </table>
          <button class="btn btn-success" style="margin-top:7px" id="add_transportation" type="button">
            <i class="fa fa-plus"></i> Add Transportation
          </button>
          <hr>
        <?php endif ?>
        <?php
        if (!empty($housing)) : ?>
          <label for="">Housing & Transport Site</label>
          <table class="table-condensed table-bordered table-striped" id="housing_cost" width="100%">
            <thead class="bg-blue">
              <tr>
                <th width="20%">Area</th>
                <th width="7%">Qty MP</th>
                <th>Amount Day</th>
                <th>Cost</th>
                <th width="15%">Total</th>
                <th>Notes</th>
                <th>#</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 0;
              foreach ($housing as $hous) : $no++; ?>
                <tr class="list_housing">
                  <td>
                    <select data-id="<?= $no ?>" class="form-control select2" name="housing_cost[<?= $no ?>][housing_area]">
                      <option value=""></option>
                      <?php $areas = $this->db->get('kabupaten')->result();
                      foreach ($areas as $area) {
                      ?>
                        <option value="<?= $area->id_kab ?>" <?= $hous->area == $area->id_kab ? 'selected' : '' ?>><?= $area->nama ?></option>
                      <?php }
                      ?>
                    </select>
                  </td>
                  <td><input value="<?= $hous->qty_mp ?>" type="number" min="0" data-id="<?= $no ?>" id="qty_mp_housing<?= $no ?>" name="housing_cost[<?= $no ?>][qty_mp_housing]" class="form-control text-right  qty_mp_housing"></td>
                  <td><input value="<?= $hous->amount_day ?>" type="number" min="0" data-id="<?= $no ?>" id="amount_day<?= $no ?>" name="housing_cost[<?= $no ?>][amount_day]" class="form-control text-right  amount_day"></td>
                  <td><input value="<?= number_format($hous->cost) ?>" type="text" data-id="<?= $no ?>" id="cost<?= $no ?>" name="housing_cost[<?= $no ?>][cost]" class="form-control nominal numberOnly  text-right cost"></td>
                  <td><input value="<?= number_format($hous->total) ?>" type="text" data-id="<?= $no ?>" id="total_housing_cost<?= $no ?>" name="housing_cost[<?= $no ?>][total_housing_cost]" readonly class="form-control nominal total_housing_cost text-right "></td>
                  <td><input value="<?= $hous->notes ?>" type="text" data-id="<?= $no ?>" id="notes_housing<?= $no ?>" name="housing_cost[<?= $no ?>][notes]" class="form-control"></td>
                  <td><button type="button" class="hapus_housing_cost btn btn-sm btn-danger">X</button></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <button class="btn btn-success" style="margin-top:7px" id="add_housing" type="button">
            <i class="fa fa-plus"></i> Add Housing & Transport Site
          </button>
        <?php endif; ?>
        <hr>
        <?php
        if (!empty($other)) : ?>
          <label for="">Other</label>
          <table class="table-condensed table-bordered table-striped" id="other_cost" width="100%">
            <thead class="bg-blue">
              <tr>
                <th>Item Name</th>
                <th>Cost</th>
                <th>#</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 0;
              foreach ($other as $oth) : $no++; ?>
                <tr class="list_other">
                  <td><input value="<?= $oth->item ?>" type="text" name="other_cost[<?= $no ?>][other_item]" class="form-control"></td>
                  <td><input value="<?= number_format($oth->cost) ?>" type="text" name="other_cost[<?= $no ?>][other_cost]" class="form-control text-right other_cost nominal numberOnly"></td>
                  <td><button type="button" class="btn btn-sm btn-danger hapus_oth_cost">X</button></td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
          <button class="btn btn-success" style="margin-top:7px" id="add_other" type="button">
            <i class="fa fa-plus"></i> Add Other
          </button>
        <?php endif ?>
      </div>
    </div>
  <?php endif ?>
  </div>

  <br>
  <!-- SUMMARY  -->

  <div class="box-body">
    <?php
    $sumCurtain = $this->db->query('SELECT
            SUM((harga_kain * t_kain) * qty) AS subtotal,
            SUM(((harga_kain * t_kain) * disc_persen )/100) AS discount,
            SUM((harga_kain * t_kain) - ((harga_kain * t_kain) * disc_persen )/100) AS total,
            SUM(t_kain) AS t_kain,
            SUM((hrg_jahitan * t_kain)) AS hrg_jahitan,
            SUM((val_disc_jahit  * t_kain)) AS disc_jahitan,
            SUM((t_hrg_jahitan  * t_kain)) AS total_jahitan,
            SUM(t_price) AS subtotal_rail,
            SUM(v_diskon_rail) AS discount_rail,
            SUM((t_price) - (v_diskon_rail )) AS total_rail
            FROM
              qtt_product_fabric
            WHERE id_quotation = "' . $data->id_quotation . '"')->row();

    $sumAcc = $this->db->query('SELECT SUM(t_price_acc) AS total_acc FROM qtt_accessoriess WHERE id_quotation = "' . $data->id_quotation . '"')->row();
    $sumRailAcc = $sumAcc->total_acc + $sumCurtain->subtotal_rail;

    $sumAf = $this->db->query('SELECT sum(total_air_freight) as total_air_freight from qtt_air_freight where id_quotation = "' . $data->id_quotation . '"')->row();
    $sumDeliv = $this->db->query('SELECT sum(price) as t_delivery from qtt_delivery where id_quotation = "' . $data->id_quotation . '"')->row();
    $sumMeal = $this->db->query('SELECT sum(total) as t_meal from qtt_meal_cost where id_quotation = "' . $data->id_quotation . '"')->row();
    $sumTrans = $this->db->query('SELECT sum(total) as t_trans from qtt_transport_cost where id_quotation = "' . $data->id_quotation . '"')->row();
    $sumHouse = $this->db->query('SELECT sum(total) as t_house from qtt_housing_cost where id_quotation = "' . $data->id_quotation . '"')->row();
    $sumOth = $this->db->query('SELECT sum(cost) as t_oth from qtt_other_cost where id_quotation = "' . $data->id_quotation . '"')->row();

    $sumBiaya = $sumCurtain->total_jahitan + $sumAf->total_air_freight + $sumDeliv->t_delivery + $sumMeal->t_meal + $sumTrans->t_trans + $sumHouse->t_house + $sumOth->t_oth;
    $sumDiscBiaya = $sumCurtain->disc_jahitan;
    $t_sumBiaya = $sumBiaya - $sumDiscBiaya;

    // $sumMoq = $this->db->query('SELECT sum(price) as subtotal_moq, sum(total) as t_moq, sum(val_disc) as disc_moq from qtt_moq where id_quotation = "' . $data->id_quotation . '"')->row();
    $subtotalFabric = $sumCurtain->subtotal;
    $discFabric = $sumCurtain->discount;
    $totalFabric = $sumCurtain->total;

    $subtotal = $totalFabric + $sumBiaya + $sumRailAcc;
    $ppn = ($subtotal * 10) / 100;
    $gTotal = $subtotal + $ppn;
    $qttHeader = $this->db->get_where('quotation_header', ['id_quotation' => $data->id_quotation])->row();

    ?>
    <input type="hidden" id="sumJahitan" value="<?= round($sumCurtain->total_jahitan) ?>">
    <input type="hidden" id="sumAirFreight" value="<?= $sumAf->total_air_freight ?>">
    <input type="hidden" id="sumDelivery" value="<?= $sumDeliv->t_delivery ?>">

    <input type="hidden" id="sumTotalAirFreight">
    <input type="hidden" id="sumMealCost" value="<?= $sumMeal->t_meal ?>">
    <input type="hidden" id="sumTransportCost" value="<?= $sumTrans->t_trans ?>">
    <input type="hidden" id="sumHousingCost" value="<?= $sumHouse->t_house ?>">
    <input type="hidden" id="sumOtherCost" value="<?= $sumOth->t_oth ?>">

    <div class="summary row">
      <div class="col-md-5 pull-right">
        <table class="table-condensed table-bordered table-striped" width="100%">
          <thead>
            <tr>
              <th>Item</th>
              <th class="text-right">Subtotal</th>
              <th class="text-right">Discount Total</th>
              <th class="text-right">Total</th>
            </tr>
          </thead>
          <tr>
            <td>Fabric</td>
            <td class="text-right"><?= number_format($subtotalFabric) ?> <input type="hidden" name="subtotalFabric" value=" <?= $subtotalFabric ?>"></td>
            <td class="text-right"><?= number_format($discFabric) ?> <input type="hidden" name="discFabric" value=" <?= $discFabric ?>"></td>
            <th class="text-right"><?= number_format($totalFabric) ?> <input type="hidden" id="sumFabric" name="totalFabric" value=" <?= $totalFabric ?>"></th>
          </tr>
          <tr>
            <td>Rail & Acc</td>
            <td class="text-right"><?= number_format($sumCurtain->subtotal_rail) ?> <input type="hidden" name="subtotal_rail" value=" <?= $sumCurtain->subtotal_rail ?>"></td>
            <td class="text-right"><?= number_format($sumCurtain->discount_rail) ?> <input type="hidden" name="discount_rail" value=" <?= $sumCurtain->discount_rail ?>"></td>
            <th class="text-right"><?= number_format($sumRailAcc) ?> <input type="hidden" id="sumRailAcc" name="sumRailAcc" value=" <?= $sumRailAcc ?>"></th>
          </tr>
          <tr>
            <td>Biaya</td>
            <td class="text-right"><span id="sumBiayaText"><?= number_format($sumBiaya) ?></span> <input type="hidden" name="sumBiaya" id="sumBiaya" value=" <?= $sumBiaya ?>"></td>
            <td class="text-right"><?= number_format($sumDiscBiaya) ?><input type="hidden" id="sumDiscBiaya" name="sumDiscBiaya" value="<?= $sumDiscBiaya ?>"></td>
            <th class="text-right"><span id="t_sumBiayaText"><?= number_format($t_sumBiaya) ?></span> <input type="hidden" id="t_sumBiaya" name="t_sumBiaya" value=" <?= $t_sumBiaya ?>"></th>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>Subtotal</td>
            <td colspan="3" class="text-right">
              <h4>
                <strong id="sumSubtotalText">
                  <?= number_format($subtotal) ?>
                </strong>
              </h4>
              <input type="hidden" id="sumSubtotal" name="subtotal" value=" <?= $subtotal ?>">
            </td>
          </tr>
          <tr>
            <td>PPN (10%)</td>
            <th colspan="3" class="text-right">
              <span id="ppnText"><?= number_format($ppn) ?></span>
              <input type="hidden" id="ppn" name="ppn" value=" <?= $ppn ?>">
            </th>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td><label for="">Total</label></td>
            <th colspan="3" class="text-right">
              <h4>
                <strong>
                  <span id="total_quotation">
                    <?= number_format($gTotal) ?>
                  </span>
                </strong>
              </h4>
              <input type="hidden" id="total_quotation_val" name="total" value=" <?= $gTotal ?>">
            </th>
          </tr>
          <tr>
            <td><label for="">Pembulatan</label></td>
            <td colspan="3" class="text-right"><input id="pembulatan_quotation" value="<?= number_format($qttHeader->rounding) ?>" name="rounding" type="text" class="required form-control text-right nominal numberOnly"></td>
          </tr>
          <tr>
            <td><label for="">Grand Total</label></td>
            <td colspan="3" class="text-right">
              <h4>
                <strong>
                  <span id="grand_total"><?= number_format($qttHeader->grand_total) ?>
                  </span>
                </strong>
              </h4>
              <input type="hidden" name="grand_total" id="grand_total_quotation" value="<?= $qttHeader->grand_total ?>" class="required form-control text-right">
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>

  <div class="box-footer">
    <button type="button" class="btn btn-md btn-primary pull-right" id="saveQuotation2"><i class="fa fa-save"></i> Save</button>
  </div>
</form>