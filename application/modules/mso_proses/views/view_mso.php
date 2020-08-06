<form class="" id="form-quotation" action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="type" class="form-control" value="<?= $type ?>">

    <div class=" box-solid">
        <div class="box-header">
            <table id="my-grid3" class="table" width=" 100%">
                <thead>
                    <tr>
                        <th class="text">CUSTOMER DATA INFORMATION</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
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
                                <td width="30%">
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
                </div>

                <div class="col-md-6">
                    <table width="100%" class="table-striped">
                        <tbody>
                            <tr>
                                <td width="30%">
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

                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <table class="table-striped" width="100%">
                        <tr>
                            <td width="30%">
                                <label>MSO Number</label>
                            </td>
                            <td>
                                <?= $dataMso->id_mso ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="30%">
                                <label>Date MSO</label>
                            </td>
                            <td>
                                <?= $dataMso->date ?>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table-striped payment_term" width="100%">
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <table class="table-striped" width="100%">
                        <tr>
                            <td width="30%">
                                <label for="">PIC Delivery <span class="text-red"> *</span></label>
                            </td>
                            <td> :
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
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table-striped" width="100%">
                        <tr>
                            <td width="30%">
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
                            <th width="30%">Payment Term</th>
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
                                                    <td class="text-right"><?= number_format($pt->value) ?></td>
                                                    <td class="text-center"><?= $pt->percent ?>%</td>
                                                    <td><?= $pt->notes ?></td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                <?php endif ?>
                            </td>
                        </tr>

                    </table>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <table class="table-stiped table-condensed" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Ruangan</th>
                                <th>Lantai</th>
                                <th>Jendela</th>
                                <th>Target Pemasangan</th>
                                <th>Keterangan</th>
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
                </div>
            </div>
        </div>
</form>

<script type="text/javascript">
    $(".select2").select2({
        placeholder: "Choose An Option",
        allowClear: true,
        width: '100%'
    });
    jQuery(document).on('click', '#saveMso', function() {
        var valid = getValidation();
        // alert(valid)
        if (valid) {
            // var formdata = $("#form-quotation").serialize();
            var formdata = new FormData($("#form-quotation")[0]);
            // console.log(formdata);
            // exit();
            $.ajax({
                url: siteurl + active_controller + "saveDataMso",
                dataType: "json",
                type: 'POST',
                data: formdata,
                contentType: false,
                cache: false,
                processData: false,
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
                            open(siteurl + active_controller, '_self');
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
    });
</script>