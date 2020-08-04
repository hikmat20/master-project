<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-07-20 23:11:42 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-07-20 23:11:51 --> Query error: Table 'idefab_dev.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-07-20 23:12:27 --> 404 Page Not Found: ../modules/quotation_proses/controllers/Quotation_proses/qt_pro_deal
ERROR - 2020-07-20 23:12:40 --> 404 Page Not Found: ../modules/quotation_proses/controllers/Quotation_proses/qt_pro_deal
ERROR - 2020-07-20 23:12:48 --> 404 Page Not Found: ../modules/quotation_non_proses/controllers/Quotation_non_proses/qt_non_pro_deal
ERROR - 2020-07-20 23:14:44 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
