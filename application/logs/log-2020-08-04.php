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
