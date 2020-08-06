<style>
    table .table-data td,
    table .table-data th {
        padding: 3px;
    }
</style>

<label for="">
    <h3>Ref. <?= $dataMso->id_mso ?></h3>
</label>
<hr>
<label for="">
    <h3 style="text-align: center;">CUSTOMER DATA INFORMATION</h3>
</label>
<table width="100%" class="table-striped">
    <tr>
        <td style="vertical-align: top;">
            <table width="100%" class="table-striped">
                <tbody>
                    <tr>
                        <td width="200px">
                            <label>Quotation Number</label>
                        </td>
                        <td>: <?= $data->id_quotation ?></td>
                        <input type="hidden" name="id_quotation" value="<?= $data->id_quotation ?>">
                    </tr>
                    <tr>
                        <td width="">
                            <label>PO Number</label>
                        </td>
                        <td>: <?= $data->no_po ?></td>
                        <input type="hidden" name="po_number" value="<?= $data->no_po ?>">
                    </tr>
                    <tr>
                        <td>
                            <label>Customer</label>
                        </td>
                        <td>: <?= $customer->name_customer ?></td>
                    </tr>
                    <tr>
                        <td>
                            <label>Category Customer</label>
                        </td>
                        <td>: <?= $cat_cust->name_category_customer ?></td>
                    </tr>
                    <tr>
                        <td>
                            <label>PIC</label>
                        </td>
                        <td>: <?= $pic_cust->name_pic ?></td>
                    </tr>
                    <tr>
                        <td>
                            <label>Telephone</label>
                        </td>
                        <td>: <?= $pic_cust->telephone ?></td>
                    </tr>
                    <tr>
                        <td>
                            <label>Address</label>
                        </td>
                        <td>: <?= $customer->address_office ?></td>
                    </tr>
                    <!-- <tr>
                                <td>
                                    <label>Discount Category</label>
                                </td>
                                <td>: <?= $disc_cat->name_cat ?> (<?= $data->val_disc_cat != '' ? $data->val_disc_cat . '%' : '' ?>)</td>
                            </tr> -->
                </tbody>
            </table>
        </td>
        <td style="vertical-align: top;">
            <table width="100%" class="table-striped">
                <tbody>
                    <tr>
                        <td width="200px">
                            <label>Date Quotation</label>
                        </td>
                        <td>: <?= $data->date ?></td>
                    </tr>
                    <tr>
                        <td>
                            <label>Type Project</label>
                        </td>
                        <td>: <?= $type_pro->nm_type_project ?></td>
                    </tr>
                    <tr>
                        <td>
                            <label>Project Name</label>
                        </td>
                        <td>: <?= $data->project_name ?></td>
                    </tr>
                    <tr>
                        <td>
                            <label>Category Sales</label>
                        </td>
                        <td>: <?= $data->sales_category ?></td>
                    </tr>
                    <tr>
                        <td>
                            <label>Marketing</label>
                        </td>
                        <td>: <?= $karyawan->nama_karyawan ?></td>
                    </tr>
                </tbody>
            </table>
        </td>
    </tr>
</table>
<hr>

<table class="table-striped" width="100%">
    <tr>
        <td width="200px">
            <label>MSO Number</label>
        </td>
        <td> :
            <?= $dataMso->id_mso ?>
        </td>
    </tr>
    <tr>
        <td width="">
            <label>Date MSO</label>
        </td>
        <td>:
            <?= $dataMso->date ?>
    </tr>
</table>

<hr>

<table class="table-striped" width="100%">
    <tr>
        <td style="vertical-align: top;">
            <table class="table-striped" width="100%">
                <tbody>
                    <tr>
                        <td width="200px">
                            <label for="">PIC Delivery <span class="text-red"> *</span></label>
                        </td>
                        <td width="300px"> :
                            <?= $dataMso->pic_delivery ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="">Delivery Phone <span class="text-red"> *</span></label>
                        </td>
                        <td>:
                            <?= $dataMso->delivery_phone ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="">Delivery Address <span class="text-red"> *</span></label>
                        </td>
                        <td>:
                            <?= $dataMso->delivery_addr ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="">PIC Installation <span class="text-red"> *</span></label>
                        </td>
                        <td>:
                            <?= $dataMso->pic_installation ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="">Installation Adress <span class="text-red"> *</span></label>
                        </td>
                        <td>:
                            <?= $dataMso->installation_addr ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="">Status <span class="text-red"> *</span></label>
                        </td>
                        <td>:
                            <?= $dataMso->status ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </td>
        <td style="vertical-align: top;">
            <table class="table-striped" width="100%">
                <tr>
                    <td width="200px">
                        <label for="">PIC Invoice <span class="text-red"> *</span></label>
                    </td>
                    <td>:
                        <?= $dataMso->pic_invoice ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="">Address Invoice <span class="text-red"> *</span></label>
                    </td>
                    <td>:
                        <?= $dataMso->address_inv ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="">Phone PIC invoice <span class="text-red"> *</span></label>
                    </td>
                    <td>:
                        <?= $dataMso->phone_pic_inv ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for=""> Jenis Penagihan</label>
                    </td>
                    <td>:
                        <?= $dataMso->jenis_tagihan ?>
                    </td>
                </tr>
                <tr>
                    <td>Payment Term</td>
                    <td> <label for="">: <?= $dataMso->payment_term == "TM" ? "Termin" : "Cash in Advance" ?></label></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <?php
                        if (!empty($dataMso)) {
                            $payment = $dataMso;
                        } else {
                            $payment = $data;
                        }
                        if ($payment->payment_term == 'TM') : ?>
                            <table width="100%" style="border-collapse: collapse;">
                                <thead>
                                    <tr class="bg-gray">
                                        <th width="10px">No</th>
                                        <th width="150px">Requirements</th>
                                        <th width="100px" style="text-align: right;">Value</th>
                                        <th width="50px">%</th>
                                        <th width="150px">Notes</th>
                                    </tr>
                                </thead>
                                <tbody class="list-termin">
                                    <?php
                                    if (!empty($pay_term_mso)) {
                                        $term = $pay_term_mso;
                                    } else {
                                        $term = $pay_term;
                                    }
                                    $no = 0;
                                    foreach ($term as $pt) : $no++ ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $pt->requirement ?></td>
                                            <td style="text-align: right;"><?= number_format($pt->value) ?></td>
                                            <td style="text-align: center;"><?= $pt->percent ?>%</td>
                                            <td><?= $pt->notes ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        <?php endif ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<hr>
<div class="">
    <strong>List Jendela</strong>
</div>
<table class=" table-data" border="1" style="border-collapse: collapse;" width="100%">
    <strong>List Jendela</strong>
    <thead>
        <tr>
            <th style="text-align: left;">No</th>
            <th style="text-align: left;">Ruangan</th>
            <th style="text-align: left;">Lantai</th>
            <th style="text-align: left;">Jendela</th>
            <th style="text-align: left;">Target Pemasangan</th>
            <th style="text-align: left;">Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 0;
        foreach ($rooms as $rm => $room) {
            $no++ ?>
            <tr>
                <td>
                    <?= $no ?>
                </td>
                <td>
                    <?= $room->name_room ?>
                </td>
                <td>
                    <?= $room->floor ?>
                </td>
                <td>
                    <?= $room->window ?>
                </td>
                <td>
                    <?= $room->installation_date ?>
                </td>
                <td>
                    <?= $room->notes ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>