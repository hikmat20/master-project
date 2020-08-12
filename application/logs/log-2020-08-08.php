<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-08-08 00:10:01 --> Query error: Unknown column 'id_quotation' in 'where clause' - Invalid query: SELECT *
FROM `quotation_header`
WHERE `id_quotation` IS NULL
ERROR - 2020-08-08 00:13:25 --> Severity: Parsing Error --> syntax error, unexpected '<' /home/ssc/idefab_dev/application/modules/quotation_proses/controllers/Quotation_proses.php 1650
ERROR - 2020-08-08 00:13:29 --> Severity: Parsing Error --> syntax error, unexpected '<' /home/ssc/idefab_dev/application/modules/quotation_proses/controllers/Quotation_proses.php 1650
ERROR - 2020-08-08 00:13:33 --> Severity: Parsing Error --> syntax error, unexpected '<' /home/ssc/idefab_dev/application/modules/quotation_proses/controllers/Quotation_proses.php 1650
ERROR - 2020-08-08 00:24:04 --> Query error: Unknown column 'id_quotation' in 'field list' - Invalid query: SELECT max(LEFT(id_quotation,5)) idQ FROM quotation_header ORDER BY id_quotation DESC LIMIT 1
ERROR - 2020-08-08 00:47:19 --> Severity: Parsing Error --> syntax error, unexpected end of file /home/ssc/idefab_dev/application/modules/quotation_proses/controllers/Quotation_proses.php 440
ERROR - 2020-08-08 00:49:03 --> Severity: Parsing Error --> syntax error, unexpected end of file, expecting variable (T_VARIABLE) or '$' /home/ssc/idefab_dev/application/modules/quotation_proses/controllers/Quotation_proses.php 1058
ERROR - 2020-08-08 00:51:26 --> Query error: Unknown column 'id_qxuotation' in 'where clause' - Invalid query: SELECT *
FROM `qtt_product_fabric`
WHERE `id_ruangan` = 'RM00001-01'
AND `id_qxuotation` = 'QU08-F120-00002'
AND `jahitan` = 'SR00004'
ERROR - 2020-08-08 00:51:26 --> Query error: Unknown column 'id_qxuotation' in 'where clause' - Invalid query: SELECT *
FROM `qtt_product_fabric`
WHERE `id_ruangan` = 'RM00001-02'
AND `id_qxuotation` = 'QU08-F120-00002'
AND `jahitan` = 'SR00006'
ERROR - 2020-08-08 00:52:50 --> Query error: Unknown column 'id_qxuotation' in 'where clause' - Invalid query: SELECT *
FROM `qtt_product_fabric`
WHERE `id_ruangan` = 'RM00001-02'
AND `id_qxuotation` = 'QU08-F120-00002'
ERROR - 2020-08-08 00:52:50 --> Query error: Unknown column 'id_qxuotation' in 'where clause' - Invalid query: SELECT *
FROM `qtt_product_fabric`
WHERE `id_ruangan` = 'RM00001-01'
AND `id_qxuotation` = 'QU08-F120-00002'
ERROR - 2020-08-08 01:06:35 --> Query error: Table 'idefab_db.mp_rail_additio-nal' doesn't exist - Invalid query: SELECT *, `c`.`name_component`
FROM `qtt_additional_comp_rail` `a`
JOIN `mp_rail_additio-nal` `b` ON `a`.`id_additional_comp` = `b`.`id_rail_add`
JOIN `master_component` `c` ON `b`.`id_component` = `c`.`id`
WHERE `a`.`id_quotation` = 'QU08-F120-00003'
AND `item` = 'vitrage'
AND `section` = '1'
ERROR - 2020-08-08 01:06:35 --> Query error: Table 'idefab_db.mp_rail_additio-nal' doesn't exist - Invalid query: SELECT *, `c`.`name_component`
FROM `qtt_additional_comp_rail` `a`
JOIN `mp_rail_additio-nal` `b` ON `a`.`id_additional_comp` = `b`.`id_rail_add`
JOIN `master_component` `c` ON `b`.`id_component` = `c`.`id`
WHERE `a`.`id_quotation` = 'QU08-F120-00003'
AND `item` = 'vitrage'
AND `section` = '2'
ERROR - 2020-08-08 01:17:50 --> Severity: Parsing Error --> syntax error, unexpected end of file, expecting variable (T_VARIABLE) or quoted-string and whitespace (T_ENCAPSED_AND_WHITESPACE) or ${ (T_DOLLAR_OPEN_CURLY_BRACES) or {$ (T_CURLY_OPEN) /home/ssc/idefab_dev/application/modules/quotation_proses/controllers/Quotation_proses.php 458
ERROR - 2020-08-08 01:24:37 --> Query error: Unknown column 'a.xid_quotation' in 'where clause' - Invalid query: SELECT `a`.*, `c`.`name_component`
FROM `qtt_basic_comp_rail` `a`
JOIN `mp_rail_basic` `b` ON `a`.`id_basic_comp` = `b`.`id_rail_basic`
JOIN `master_component` `c` ON `b`.`id_component` = `c`.`id`
WHERE `a`.`xid_quotation` = 'QU08-F120-00003'
AND `a`.`item` = 'a.vitrage'
AND `a`.`section` = '1'
ERROR - 2020-08-08 01:24:37 --> Query error: Unknown column 'a.xid_quotation' in 'where clause' - Invalid query: SELECT `a`.*, `c`.`name_component`
FROM `qtt_basic_comp_rail` `a`
JOIN `mp_rail_basic` `b` ON `a`.`id_basic_comp` = `b`.`id_rail_basic`
JOIN `master_component` `c` ON `b`.`id_component` = `c`.`id`
WHERE `a`.`xid_quotation` = 'QU08-F120-00003'
AND `a`.`item` = 'a.vitrage'
AND `a`.`section` = '2'
ERROR - 2020-08-08 07:35:40 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-08-08 08:33:39 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-08-08 08:47:05 --> Query error: Table 'idefab_db.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-08 10:14:10 --> Query error: Unknown column 'id_quotation' in 'field list' - Invalid query: SELECT max(LEFT(id_quotation,5)) idQ FROM quotation_header ORDER BY id_quotation DESC LIMIT 1
ERROR - 2020-08-08 10:14:49 --> Query error: Unknown column 'id_quotation' in 'field list' - Invalid query: SELECT max(LEFT(id_quotation,5)) idQ FROM quotation_header ORDER BY id_quotation DESC LIMIT 1
ERROR - 2020-08-08 10:18:09 --> Query error: Unknown column 'b.id_quotation' in 'on clause' - Invalid query: SELECT
				  a.id_mso, a.id_quotation,a.date,c.name_customer,d.nm_type_project, a.no_po,a.date_po,a.status
				FROM
				  mso_proses_header a 
          left join quotation_header b on a.id_quotation=b.id_quotation 
          left join master_customer c on b.id_customer=c.id_customer
          left join type_project d on b.id_type_project=d.id_type_project
          WHERE 1=1 and a.status = 'PROSES'  AND a.activation = '1'  
				AND (
  				 a.id_mso LIKE '%%'
  			OR a.id_quotation LIKE '%%'
  			OR a.date LIKE '%%'
				OR c.name_customer LIKE '%%'
				OR d.nm_type_project LIKE '%%'
  	        )
			
ERROR - 2020-08-08 10:27:23 --> Query error: Unknown column 'id_quotation' in 'where clause' - Invalid query: SELECT *
FROM `quotation_header`
WHERE `id_quotation` = 'QU08/F120/00001'
ERROR - 2020-08-08 10:31:47 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-08-08 10:42:22 --> Query error: Unknown column 'id_quotation' in 'where clause' - Invalid query: SELECT *
FROM `quotation_header`
WHERE `id_quotation` = 'QU08/F120/00001'
ERROR - 2020-08-08 10:48:35 --> Query error: Table 'idefab_db.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-08 10:54:42 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-08-08 10:55:49 --> Query error: Unknown column 'id_quotation' in 'where clause' - Invalid query: SELECT *
FROM `quotation_header`
WHERE `id_quotation` IS NULL
ERROR - 2020-08-08 10:55:51 --> Query error: Unknown column 'id_quotation' in 'where clause' - Invalid query: SELECT *
FROM `quotation_header`
WHERE `id_quotation` IS NULL
ERROR - 2020-08-08 10:56:03 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-08-08 10:57:42 --> Query error: Table 'idefab_db.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-08 11:32:24 --> Severity: Warning --> Creating default object from empty value /home/ssc/idefab_dev/application/modules/quotation_proses/views/form_curtain_nonpanel.php 19
ERROR - 2020-08-08 11:32:26 --> Severity: Warning --> Creating default object from empty value /home/ssc/idefab_dev/application/modules/quotation_proses/views/form_curtain_panel.php 17
ERROR - 2020-08-08 11:39:48 --> Severity: Warning --> Creating default object from empty value /home/ssc/idefab_dev/application/modules/quotation_proses/views/form_curtain_nonpanel.php 19
ERROR - 2020-08-08 11:40:00 --> Severity: Warning --> Creating default object from empty value /home/ssc/idefab_dev/application/modules/quotation_proses/views/form_curtain_panel.php 17
ERROR - 2020-08-08 11:44:50 --> Query error: Unknown column 'id_quotation' in 'field list' - Invalid query: SELECT max(LEFT(id_quotation,5)) idQ FROM quotation_header ORDER BY id_quotation DESC LIMIT 1
ERROR - 2020-08-08 11:44:59 --> Query error: Unknown column 'id_quotation' in 'where clause' - Invalid query: SELECT *
FROM `quotation_header`
WHERE `id_quotation` = '00003/IDF/PR/07/20'
ERROR - 2020-08-08 12:17:07 --> Severity: Warning --> Creating default object from empty value /home/ssc/idefab_dev/application/modules/quotation_proses/views/form_curtain_panel.php 17
ERROR - 2020-08-08 12:26:43 --> Query error: Unknown column 'a.item' in 'where clause' - Invalid query: SELECT *
FROM `qtt_ext_commission`
WHERE `id_quotation` = 'QU08-F120-00010'
AND `a`.`item` = 'rail-curtain'
AND `a`.`section` = '1'
ERROR - 2020-08-08 12:26:44 --> Query error: Unknown column 'a.item' in 'where clause' - Invalid query: SELECT *
FROM `qtt_ext_commission`
WHERE `id_quotation` = 'QU08-F120-00011'
AND `a`.`item` = 'rail-curtain'
AND `a`.`section` = '2'
ERROR - 2020-08-08 12:26:55 --> Query error: Unknown column 'a.item' in 'where clause' - Invalid query: SELECT *
FROM `qtt_ext_commission`
WHERE `id_quotation` = 'QU08-F120-00010'
AND `a`.`item` = 'rail-curtain'
AND `a`.`section` = '1'
ERROR - 2020-08-08 12:26:55 --> Query error: Unknown column 'a.item' in 'where clause' - Invalid query: SELECT *
FROM `qtt_ext_commission`
WHERE `id_quotation` = 'QU08-F120-00011'
AND `a`.`item` = 'rail-curtain'
AND `a`.`section` = '2'
ERROR - 2020-08-08 12:27:04 --> Query error: Unknown column 'a.item' in 'where clause' - Invalid query: SELECT *
FROM `qtt_ext_commission`
WHERE `id_quotation` = 'QU08-F120-00010'
AND `a`.`item` = 'rail-curtain'
AND `a`.`section` = '1'
ERROR - 2020-08-08 12:27:05 --> Query error: Unknown column 'a.item' in 'where clause' - Invalid query: SELECT *
FROM `qtt_ext_commission`
WHERE `id_quotation` = 'QU08-F120-00011'
AND `a`.`item` = 'rail-curtain'
AND `a`.`section` = '2'
ERROR - 2020-08-08 13:11:59 --> Severity: Warning --> Creating default object from empty value /home/ssc/idefab_dev/application/modules/quotation_proses/views/form_lining_panel.php 11
ERROR - 2020-08-08 13:15:22 --> Severity: Warning --> Creating default object from empty value /home/ssc/idefab_dev/application/modules/quotation_proses/views/form_lining_panel.php 11
ERROR - 2020-08-08 13:23:54 --> Query error: Unknown column 'id_quotation' in 'where clause' - Invalid query: SELECT *
FROM `quotation_header`
WHERE `id_quotation` = '00003/IDF/PR/07/20'
ERROR - 2020-08-08 16:29:28 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-08-08 17:20:58 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-08-08 17:21:03 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-08-08 17:21:10 --> Severity: Warning --> Creating default object from empty value /home/ssc/idefab_dev/application/modules/quotation_proses/views/form_lining_panel.php 7
ERROR - 2020-08-08 17:32:10 --> Severity: Warning --> Creating default object from empty value /home/ssc/idefab_dev/application/modules/quotation_proses/views/form_lining_panel.php 7
ERROR - 2020-08-08 17:58:16 --> Severity: Parsing Error --> syntax error, unexpected 'if' (T_IF) /home/ssc/idefab_dev/application/modules/quotation_proses/views/form_lining_panel.php 249
ERROR - 2020-08-08 17:58:18 --> Severity: Parsing Error --> syntax error, unexpected 'if' (T_IF) /home/ssc/idefab_dev/application/modules/quotation_proses/views/form_lining_panel.php 249
ERROR - 2020-08-08 17:58:47 --> Severity: Parsing Error --> syntax error, unexpected 'if' (T_IF) /home/ssc/idefab_dev/application/modules/quotation_proses/views/form_lining_panel.php 249
ERROR - 2020-08-08 17:58:47 --> Severity: Parsing Error --> syntax error, unexpected 'if' (T_IF) /home/ssc/idefab_dev/application/modules/quotation_proses/views/form_lining_panel.php 249
ERROR - 2020-08-08 22:23:26 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-08-08 22:23:32 --> Query error: Table 'idefab_db.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-08 22:23:35 --> Query error: Table 'idefab_db.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
