<div class="panel panel-primary detailAccessoriess<?= $no ?>">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <table class="table-condensed table-striped table-hover" width="100%" data-id="<?= $no ?>" id="accProduct<?= $no ?>">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id</th>
                            <th>Accessoriess Name</th>
                            <th class="text-center">UOM</th>
                            <th class="text-right">Price</th>
                            <th class="text-right" width="10%">Qty</th>
                            <th class="text-right">Subtotal</th>
                            <th class="text-right" width="10%">Discount</th>
                            <th class="text-right">Total Discount</th>
                            <th class="text-right">Total Price</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $num = 0;
                        foreach ($accessoriess as $acc => $dataAcc) {
                            $num++ ?>
                            <tr>
                                <td><?= $num ?></td>
                                <td> <?= $dataAcc->id_accessories ?>
                                    <input type="hidden" name="product_acc[<?= $no ?>][<?= $acc ?>][id_acc]" value="<?= $dataAcc->id_accessories ?>">
                                    <input type="hidden" name="product_acc[<?= $no ?>][<?= $acc ?>][section]" value="<?= $acc ?>">
                                </td>
                                <td><?= $dataAcc->name_accessories ?>
                                    <input type="hidden" style="width:100%" name="product_acc[<?= $no ?>][<?= $acc ?>][name_accessories]" value="<?= $dataAcc->name_accessories ? $dataAcc->name_accessories : '' ?>" class="form-control input-sm numberOnly text-right" placeholder="0" maxLength="3" min="0" max="100">
                                </td>
                                <td class="text-center"><?= $dataAcc->uom ?>
                                    <input type="hidden" style="width:100%" name="product_acc[<?= $no ?>][<?= $acc ?>][uom]" value="<?= $dataAcc->uom ? $dataAcc->uom : '' ?>" class="form-control input-sm numberOnly nominal value text-right" placeholder="0">
                                </td>
                                <td class="text-right"> <?= number_format($dataAcc->price) ?>
                                    <input type="hidden" id="price_acc<?= $dataAcc->id_accessories ?>" data-id="<?= $dataAcc->id_accessories ?>" style="width:100%" name="product_acc[<?= $no ?>][<?= $acc ?>][price]" value="<?= $dataAcc->price ? ($dataAcc->price) : '' ?>" class="form-control text-right" placeholder="0">
                                </td>
                                <td>
                                    <input type="number" id="qty_acc<?= $dataAcc->id_accessories ?>" data-id="<?= $dataAcc->id_accessories ?>" style="width:100%" name="product_acc[<?= $no ?>][<?= $acc ?>][qty]" value="<?= $dataAcc->qty != '' ? $dataAcc->qty : '' ?>" class="form-control qty_acc text-right" placeholder="0">
                                </td>
                                <td class="text-right"> <span class="sub_price_acc<?= $dataAcc->id_accessories ?>" id="sub_price_acc<?= $no ?>" data-id="<?= $dataAcc->id_accessories ?>"><?= number_format($dataAcc->sub_price) ?></span>
                                    <input type="hidden" id="sub_price_acc<?= $dataAcc->id_accessories ?>" data-id="<?= $dataAcc->id_accessories ?>" style="width:100%" name="product_acc[<?= $no ?>][<?= $acc ?>][sub_price]" value="<?= $dataAcc->sub_price != '' ? ($dataAcc->sub_price) : '' ?>" class="form-control text-right" placeholder="0">
                                </td>
                                <td class="text-right">
                                    <input type="number" min="0" id="disc_acc<?= $dataAcc->id_accessories ?>" data-id="<?= $dataAcc->id_accessories ?>" style="width:100%" name="product_acc[<?= $no ?>][<?= $acc ?>][disc_acc]" value="<?= $dataAcc->disc_acc != '' ? ($dataAcc->disc_acc) : '' ?>" class="form-control disc_acc text-right" placeholder="0">
                                </td>
                                <td class="text-right"> <span class="v_disc_acc<?= $dataAcc->id_accessories ?>" data-id="<?= $dataAcc->id_accessories ?>"><?= number_format($dataAcc->val_disc_acc) ?></span>
                                    <input type="hidden" id="v_disc_acc<?= $dataAcc->id_accessories ?>" data-id="<?= $dataAcc->id_accessories ?>" style="width:100%" name="product_acc[<?= $no ?>][<?= $acc ?>][val_disc_acc]" value="<?= $dataAcc->val_disc_acc != '' ? ($dataAcc->val_disc_acc) : '' ?>" class="form-control text-right" placeholder="0">
                                </td>
                                <td class="text-right"> <span class="t_price_acc<?= $dataAcc->id_accessories ?>" data-id="<?= $dataAcc->id_accessories ?>"><?= number_format($dataAcc->t_price_acc) ?></span>
                                    <input type="hidden" id="t_price_acc<?= $dataAcc->id_accessories ?>" data-id="<?= $dataAcc->id_accessories ?>" style="width:100%" name="product_acc[<?= $no ?>][<?= $acc ?>][t_price]" value="<?= $dataAcc->t_price_acc != '' ? ($dataAcc->t_price_acc) : '' ?>" class="form-control text-right" placeholder="0">
                                </td>
                                <td class="text-center">
                                    <a class="text-red hapus" href="javascript:void(0)" title="Hapus Item"><i class="fa fa-times"></i></a><span class="numbering"></span>
                                </td>
                            </tr> <?php
                                }
                                    ?>
                    </tbody>
                </table><br>
                <button type="button" class="btn btn-sm btn-primary addData" data-type="accessoriess" data-product="accessoriess" data-id="<?= $no ?>" id="addAcc<?= $no ?>">Add Accessoriess</button>
            </div>
        </div>
    </div>
</div>