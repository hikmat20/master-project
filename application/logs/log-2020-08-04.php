<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-08-04 08:44:32 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-08-04 08:54:10 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/ssc/idefab_dev/application/modules/mp_fabric/controllers/Mp_fabric.php:112) /home/ssc/idefab_dev/system/core/Common.php 573
ERROR - 2020-08-04 08:54:10 --> Severity: Core Error --> Directive 'register_globals' is no longer available in PHP Unknown 0
ERROR - 2020-08-04 09:24:15 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-08-04 09:24:20 --> Query error: Table 'idefab_db.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-04 09:24:20 --> Severity: Core Error --> Directive 'register_globals' is no longer available in PHP Unknown 0
ERROR - 2020-08-04 09:52:58 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/ssc/idefab_dev/system/core/Output.php:528) /home/ssc/idefab_dev/system/core/Common.php 573
ERROR - 2020-08-04 09:52:58 --> Severity: Core Error --> Directive 'register_globals' is no longer available in PHP Unknown 0
ERROR - 2020-08-04 09:52:58 --> Severity: Core Error --> Directive 'register_globals' is no longer available in PHP Unknown 0
ERROR - 2020-08-04 09:54:32 --> Severity: Core Error --> Directive 'register_globals' is no longer available in PHP Unknown 0
ERROR - 2020-08-04 10:23:53 --> Severity: Core Error --> Directive 'register_globals' is no longer available in PHP Unknown 0
ERROR - 2020-08-04 10:26:11 --> Severity: Warning --> date_format() expects parameter 1 to be DateTimeInterface, string given /home/ssc/idefab_dev/application/modules/quotation_proses/views/print_quotation1.php 32
ERROR - 2020-08-04 10:37:38 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/ssc/idefab_dev/application/libraries/Mpdf.php:7464) /home/ssc/idefab_dev/system/core/Common.php 573
ERROR - 2020-08-04 10:37:38 --> Severity: Core Error --> Directive 'register_globals' is no longer available in PHP Unknown 0
ERROR - 2020-08-04 10:50:12 --> Severity: Core Error --> Directive 'register_globals' is no longer available in PHP Unknown 0
ERROR - 2020-08-04 10:50:16 --> Severity: Core Error --> Directive 'register_globals' is no longer available in PHP Unknown 0
ERROR - 2020-08-04 11:08:11 --> Severity: Core Error --> Directive 'register_globals' is no longer available in PHP Unknown 0
ERROR - 2020-08-04 13:49:24 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-08-04 16:43:26 --> Query error: Table 'idefab_db.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-04 18:00:25 --> Query error: Unknown column 'payment_term' in 'field list' - Invalid query: UPDATE `mso_proses_header` SET `date` = '2020-07-24', `id_quotation` = '00004/IDF/PR/07/20', `no_po` = 'PO-OO0/MSO/200', `pic_delivery` = 'asd', `delivery_phone` = 'asd', `delivery_addr` = 'sdf', `pic_installation` = 'df', `installation_addr` = 'df', `pic_invoice` = 'JJHJ', `phone_pic_inv` = 'hj', `address_inv` = 'jhj', `payment_term` = 'TM', `payment_percent_1` = NULL, `payment_value_1` = NULL, `payment_percent_2` = NULL, `payment_value_2` = NULL, `tempo_week` = '20', `status` = 'PROSES', `modified_on` = '2020-08-04 18:00:25', `modified_by` = '1'
WHERE `id_mso` = '00001/MSO/07/20'
ERROR - 2020-08-04 18:00:27 --> Query error: Unknown column 'payment_term' in 'field list' - Invalid query: UPDATE `mso_proses_header` SET `date` = '2020-07-24', `id_quotation` = '00004/IDF/PR/07/20', `no_po` = 'PO-OO0/MSO/200', `pic_delivery` = 'asd', `delivery_phone` = 'asd', `delivery_addr` = 'sdf', `pic_installation` = 'df', `installation_addr` = 'df', `pic_invoice` = 'JJHJ', `phone_pic_inv` = 'hj', `address_inv` = 'jhj', `payment_term` = 'TM', `payment_percent_1` = NULL, `payment_value_1` = NULL, `payment_percent_2` = NULL, `payment_value_2` = NULL, `tempo_week` = '20', `status` = 'PROSES', `modified_on` = '2020-08-04 18:00:27', `modified_by` = '1'
WHERE `id_mso` = '00001/MSO/07/20'
ERROR - 2020-08-04 18:01:32 --> Query error: Unknown column 'payment_term' in 'field list' - Invalid query: UPDATE `mso_proses_header` SET `date` = '2020-07-24', `id_quotation` = '00004/IDF/PR/07/20', `no_po` = 'PO-OO0/MSO/200', `pic_delivery` = 'asd', `delivery_phone` = 'asd', `delivery_addr` = 'sdf', `pic_installation` = 'df', `installation_addr` = 'df', `pic_invoice` = 'JJHJ', `phone_pic_inv` = 'hj', `address_inv` = 'jhj', `payment_term` = 'TM', `payment_percent_1` = NULL, `payment_value_1` = NULL, `payment_percent_2` = NULL, `payment_value_2` = NULL, `tempo_week` = '20', `status` = 'PROSES', `modified_on` = '2020-08-04 18:01:32', `modified_by` = '1'
WHERE `id_mso` = '00001/MSO/07/20'
ERROR - 2020-08-04 18:01:33 --> Query error: Unknown column 'payment_term' in 'field list' - Invalid query: UPDATE `mso_proses_header` SET `date` = '2020-07-24', `id_quotation` = '00004/IDF/PR/07/20', `no_po` = 'PO-OO0/MSO/200', `pic_delivery` = 'asd', `delivery_phone` = 'asd', `delivery_addr` = 'sdf', `pic_installation` = 'df', `installation_addr` = 'df', `pic_invoice` = 'JJHJ', `phone_pic_inv` = 'hj', `address_inv` = 'jhj', `payment_term` = 'TM', `payment_percent_1` = NULL, `payment_value_1` = NULL, `payment_percent_2` = NULL, `payment_value_2` = NULL, `tempo_week` = '20', `status` = 'PROSES', `modified_on` = '2020-08-04 18:01:33', `modified_by` = '1'
WHERE `id_mso` = '00001/MSO/07/20'
