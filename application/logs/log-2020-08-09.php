<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-08-09 00:20:54 --> Severity: Notice --> Undefined variable: datgroupmenu /home/ssc/idefab_dev/application/modules/menus/views/menus_form.php 70
ERROR - 2020-08-09 08:46:17 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-08-09 11:22:36 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-08-09 11:22:42 --> Query error: Table 'idefab_db.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-09 11:27:29 --> Query error: Unknown column 'id_quotation' in 'where clause' - Invalid query: SELECT *
FROM `quotation_header`
WHERE `id_quotation` IS NULL
ERROR - 2020-08-09 11:27:32 --> Query error: Unknown column 'id_quotation' in 'where clause' - Invalid query: SELECT *
FROM `quotation_header`
WHERE `id_quotation` IS NULL
ERROR - 2020-08-09 11:27:34 --> Query error: Unknown column 'id_quotation' in 'where clause' - Invalid query: SELECT *
FROM `quotation_header`
WHERE `id_quotation` IS NULL
ERROR - 2020-08-09 11:27:45 --> Query error: Unknown column 'id_quotation' in 'where clause' - Invalid query: SELECT *
FROM `quotation_header`
WHERE `id_quotation` IS NULL
ERROR - 2020-08-09 13:49:27 --> Query error: Unknown column 'id_ruangan' in 'where clause' - Invalid query: SELECT *
FROM `qtt_additional_comp_rail`
WHERE `id_ruangan` = 'RM00001-01'
AND `id_quotation` = 'QU08-F120-00010'
ERROR - 2020-08-09 13:50:23 --> Query error: Unknown column 'sectison' in 'where clause' - Invalid query: SELECT *
FROM `qtt_additional_comp_rail`
WHERE `sectison` = 1
AND `id_quotation` = 'QU08-F120-00010'
ERROR - 2020-08-09 14:25:55 --> Severity: Error --> Call to undefined method CI_DB_mysqli_driver::result() /home/ssc/idefab_dev/application/modules/quotation_proses/views/modal_Process_Quotation.php 285
ERROR - 2020-08-09 14:26:20 --> Severity: Error --> Call to undefined method CI_DB_mysqli_driver::result() /home/ssc/idefab_dev/application/modules/quotation_proses/views/modal_Process_Quotation.php 285
ERROR - 2020-08-09 14:28:28 --> Query error: Unknown column 'c.zname_component' in 'field list' - Invalid query: SELECT `a`.*, `c`.`zname_component`
FROM `qtt_additional_comp_rail` `a`
JOIN `mp_rail_additional` `b` ON `a`.`id_additional_comp` = `b`.`id_rail_add`
JOIN `master_component` `c` ON `b`.`id_component` = `c`.`id`
WHERE `a`.`section` = 1
AND `a`.`id_quotation` = 'QU08-F120-00013'
AND `a`.`item` = 'curtain'
ERROR - 2020-08-09 15:41:38 --> Query error: Unknown column 'id_quotation' in 'where clause' - Invalid query: SELECT *
FROM `master_product_fabric`
WHERE `id_product` = '1011-011-001'
AND `id_quotation` = 'QU08-F120-00013'
ERROR - 2020-08-09 23:23:00 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
