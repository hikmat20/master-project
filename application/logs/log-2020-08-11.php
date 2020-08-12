<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-08-11 09:04:04 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-08-11 09:04:12 --> Query error: Table 'idefab_db.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-11 09:14:19 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-08-11 09:14:35 --> Query error: Table 'idefab_db.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-11 09:14:54 --> Query error: Unknown column 'id_quotation' in 'field list' - Invalid query: SELECT max(LEFT(id_quotation,5)) idQ FROM quotation_header ORDER BY id_quotation DESC LIMIT 1
ERROR - 2020-08-11 09:14:57 --> Query error: Unknown column 'id_quotation' in 'field list' - Invalid query: SELECT max(LEFT(id_quotation,5)) idQ FROM quotation_header ORDER BY id_quotation DESC LIMIT 1
ERROR - 2020-08-11 09:15:08 --> Severity: Warning --> Creating default object from empty value /home/ssc/idefab_dev/application/modules/quotation_proses/views/form_lining_panel.php 7
ERROR - 2020-08-11 09:15:08 --> Severity: Warning --> Creating default object from empty value /home/ssc/idefab_dev/application/modules/quotation_proses/views/form_lining_panel.php 7
ERROR - 2020-08-11 09:20:54 --> Query error: Unknown column 'id_quotation' in 'field list' - Invalid query: SELECT max(LEFT(id_quotation,5)) idQ FROM quotation_header ORDER BY id_quotation DESC LIMIT 1
ERROR - 2020-08-11 09:29:08 --> Severity: Warning --> Creating default object from empty value /home/ssc/idefab_dev/application/modules/quotation_proses/views/form_lining_panel.php 7
ERROR - 2020-08-11 09:29:08 --> Severity: Warning --> Creating default object from empty value /home/ssc/idefab_dev/application/modules/quotation_proses/views/form_lining_panel.php 7
ERROR - 2020-08-11 09:31:57 --> Severity: Warning --> Creating default object from empty value /home/ssc/idefab_dev/application/modules/quotation_proses/views/form_lining_panel.php 7
ERROR - 2020-08-11 09:31:57 --> Severity: Warning --> Creating default object from empty value /home/ssc/idefab_dev/application/modules/quotation_proses/views/form_lining_panel.php 7
ERROR - 2020-08-11 09:32:10 --> Query error: Table 'idefab_db.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-11 09:34:51 --> Severity: Warning --> Creating default object from empty value /home/ssc/idefab_dev/application/modules/quotation_proses/views/form_lining_panel.php 7
ERROR - 2020-08-11 09:34:51 --> Severity: Warning --> Creating default object from empty value /home/ssc/idefab_dev/application/modules/quotation_proses/views/form_lining_panel.php 7
ERROR - 2020-08-11 10:24:59 --> Severity: Warning --> Creating default object from empty value /home/ssc/idefab_dev/application/modules/quotation_proses/views/form_lining_panel.php 7
ERROR - 2020-08-11 10:24:59 --> Severity: Warning --> Creating default object from empty value /home/ssc/idefab_dev/application/modules/quotation_proses/views/form_lining_panel.php 7
ERROR - 2020-08-11 11:39:05 --> Query error: Table 'idefab_db.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-11 14:04:58 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-08-11 14:07:38 --> Query error: Table 'idefab_db.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-11 14:07:42 --> Query error: Table 'idefab_db.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-11 17:33:10 --> Severity: Parsing Error --> syntax error, unexpected '?>' /home/ssc/idefab_dev/application/modules/quotation_proses/views/form_jahit_lining.php 31
ERROR - 2020-08-11 17:33:10 --> Severity: Parsing Error --> syntax error, unexpected '?>' /home/ssc/idefab_dev/application/modules/quotation_proses/views/form_jahit_lining.php 31
ERROR - 2020-08-11 17:34:06 --> Query error: Unknown column 'id_quptation' in 'where clause' - Invalid query: SELECT *
FROM `qtt_product_fabric`
WHERE `id_ruangan` = 'RM00001-01'
AND `id_quptation` IS NULL
AND `jahitan` = 'SR00002'
ERROR - 2020-08-11 17:34:06 --> Query error: Unknown column 'id_quptation' in 'where clause' - Invalid query: SELECT *
FROM `qtt_product_fabric`
WHERE `id_ruangan` = 'RM00001-02'
AND `id_quptation` IS NULL
AND `jahitan` = 'SR00008'
ERROR - 2020-08-11 17:35:00 --> Query error: Unknown column 'id_quptation' in 'where clause' - Invalid query: SELECT *
FROM `qtt_product_fabric`
WHERE `id_ruangan` = 'RM00001-01'
AND `id_quptation` IS NULL
AND `jahitan` = 'SR00002'
ERROR - 2020-08-11 17:35:00 --> Query error: Unknown column 'id_quptation' in 'where clause' - Invalid query: SELECT *
FROM `qtt_product_fabric`
WHERE `id_ruangan` = 'RM00001-02'
AND `id_quptation` IS NULL
AND `jahitan` = 'SR00008'
ERROR - 2020-08-11 19:30:32 --> Query error: Table 'idefab_db.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-11 19:41:29 --> Query error: Unknown column 'id_quptation' in 'where clause' - Invalid query: SELECT *
FROM `qtt_product_fabric`
WHERE `id_ruangan` = 'RM00001-01'
AND `id_quptation` IS NULL
AND `jahitan` = 'SR00002'
ERROR - 2020-08-11 19:41:29 --> Query error: Unknown column 'id_quptation' in 'where clause' - Invalid query: SELECT *
FROM `qtt_product_fabric`
WHERE `id_ruangan` = 'RM00001-02'
AND `id_quptation` IS NULL
AND `jahitan` = 'SR00008'
ERROR - 2020-08-11 20:04:04 --> Query error: Unknown column 'id_quptation' in 'where clause' - Invalid query: SELECT *
FROM `qtt_product_fabric`
WHERE `id_ruangan` = 'RM00001-01'
AND `id_quptation` IS NULL
AND `jahitan` = 'SR00002'
ERROR - 2020-08-11 20:04:05 --> Query error: Unknown column 'id_quptation' in 'where clause' - Invalid query: SELECT *
FROM `qtt_product_fabric`
WHERE `id_ruangan` = 'RM00001-02'
AND `id_quptation` IS NULL
AND `jahitan` = 'SR00008'
ERROR - 2020-08-11 20:05:13 --> Query error: Unknown column 'id_quptation' in 'where clause' - Invalid query: SELECT *
FROM `qtt_product_fabric`
WHERE `id_ruangan` = 'RM00001-01'
AND `id_quptation` IS NULL
AND `jahitan` = 'SR00002'
ERROR - 2020-08-11 20:05:13 --> Query error: Unknown column 'id_quptation' in 'where clause' - Invalid query: SELECT *
FROM `qtt_product_fabric`
WHERE `id_ruangan` = 'RM00001-02'
AND `id_quptation` IS NULL
AND `jahitan` = 'SR00008'
