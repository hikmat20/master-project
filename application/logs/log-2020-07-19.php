<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-07-19 14:11:42 --> Severity: Warning --> require_once(/home/ssc/idefab_dev/application/modules/dashboard/controllers/Dashboard.php): failed to open stream: Permission denied /home/ssc/idefab_dev/system/core/CodeIgniter.php 408
ERROR - 2020-07-19 14:11:42 --> Severity: Compile Error --> require_once(): Failed opening required '/home/ssc/idefab_dev/application/controllers/../modules/dashboard/controllers/Dashboard.php' (include_path='.:/usr/share/php') /home/ssc/idefab_dev/system/core/CodeIgniter.php 408
ERROR - 2020-07-19 14:12:54 --> Severity: Warning --> require_once(/home/ssc/idefab_dev/application/modules/dashboard/controllers/Dashboard.php): failed to open stream: Permission denied /home/ssc/idefab_dev/system/core/CodeIgniter.php 408
ERROR - 2020-07-19 14:12:54 --> Severity: Compile Error --> require_once(): Failed opening required '/home/ssc/idefab_dev/application/controllers/../modules/dashboard/controllers/Dashboard.php' (include_path='.:/usr/share/php') /home/ssc/idefab_dev/system/core/CodeIgniter.php 408
ERROR - 2020-07-19 14:13:45 --> Severity: Warning --> require_once(/home/ssc/idefab_dev/application/modules/dashboard/controllers/Dashboard.php): failed to open stream: Permission denied /home/ssc/idefab_dev/system/core/CodeIgniter.php 408
ERROR - 2020-07-19 14:13:45 --> Severity: Compile Error --> require_once(): Failed opening required '/home/ssc/idefab_dev/application/controllers/../modules/dashboard/controllers/Dashboard.php' (include_path='.:/usr/share/php') /home/ssc/idefab_dev/system/core/CodeIgniter.php 408
ERROR - 2020-07-19 14:25:12 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-07-19 15:04:45 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-07-19 22:58:30 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-07-19 22:58:40 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-07-19 22:58:45 --> Query error: Table 'idefab_dev.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
