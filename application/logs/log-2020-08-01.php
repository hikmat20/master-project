<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-08-01 00:12:55 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-08-01 00:13:02 --> Severity: Core Error --> Directive 'magic_quotes_gpc' is no longer available in PHP Unknown 0
ERROR - 2020-08-01 00:13:21 --> Query error: Table 'idefab_dev.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-01 00:13:21 --> Severity: Core Error --> Directive 'magic_quotes_gpc' is no longer available in PHP Unknown 0
ERROR - 2020-08-01 14:06:34 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-08-01 14:12:21 --> Query error: Table 'idefab_dev.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-01 14:12:26 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/ssc/idefab_dev/system/core/Output.php:528) /home/ssc/idefab_dev/system/core/Common.php 573
ERROR - 2020-08-01 14:12:26 --> Severity: Core Error --> Directive 'magic_quotes_gpc' is no longer available in PHP Unknown 0
ERROR - 2020-08-01 14:12:32 --> Severity: Core Error --> Directive 'magic_quotes_gpc' is no longer available in PHP Unknown 0
ERROR - 2020-08-01 14:12:37 --> Severity: Core Error --> Directive 'magic_quotes_gpc' is no longer available in PHP Unknown 0
ERROR - 2020-08-01 14:12:55 --> Severity: Core Error --> Directive 'magic_quotes_gpc' is no longer available in PHP Unknown 0
ERROR - 2020-08-01 14:13:00 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-08-01 14:13:03 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-08-01 17:25:24 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-08-01 17:29:44 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-08-01 17:35:28 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-08-01 17:46:50 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-08-01 17:54:11 --> Query error: Table 'idefab_dev.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-01 17:57:20 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-08-01 17:57:28 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-08-01 17:57:37 --> Query error: Table 'idefab_dev.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-01 17:57:42 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-08-01 17:58:21 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-08-01 17:58:28 --> Query error: Table 'idefab_dev.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-01 17:58:36 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-08-01 17:58:41 --> Query error: Table 'idefab_dev.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
