<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-08-05 08:39:54 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-08-05 08:40:12 --> Query error: Table 'idefab_db.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-05 08:43:39 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-08-05 08:43:45 --> Query error: Table 'idefab_db.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-05 08:44:25 --> Severity: Error --> Call to undefined function mcrypt_create_iv() /home/ssc/idefab_dev/application/modules/users/controllers/Setting.php 428
ERROR - 2020-08-05 08:45:09 --> Severity: Error --> Call to undefined function mcrypt_create_iv() /home/ssc/idefab_dev/application/modules/users/controllers/Setting.php 428
ERROR - 2020-08-05 09:01:35 --> Query error: Table 'idefab_db.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-05 09:01:39 --> Query error: Table 'idefab_db.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-05 09:01:50 --> Severity: Notice --> Undefined offset: 1 /home/ssc/idefab_dev/application/modules/users/controllers/Setting.php 246
ERROR - 2020-08-05 09:01:50 --> Severity: Notice --> Undefined offset: 1 /home/ssc/idefab_dev/application/modules/users/controllers/Setting.php 248
ERROR - 2020-08-05 09:01:50 --> Severity: Notice --> Undefined offset: 1 /home/ssc/idefab_dev/application/modules/users/controllers/Setting.php 249
ERROR - 2020-08-05 09:01:50 --> Severity: Notice --> Undefined offset: 1 /home/ssc/idefab_dev/application/modules/users/controllers/Setting.php 261
ERROR - 2020-08-05 09:01:50 --> Severity: Notice --> Undefined offset: 1 /home/ssc/idefab_dev/application/modules/users/controllers/Setting.php 261
ERROR - 2020-08-05 09:02:37 --> Severity: Notice --> Undefined offset: 1 /home/ssc/idefab_dev/application/modules/users/controllers/Setting.php 246
ERROR - 2020-08-05 09:02:37 --> Severity: Notice --> Undefined offset: 1 /home/ssc/idefab_dev/application/modules/users/controllers/Setting.php 248
ERROR - 2020-08-05 09:02:37 --> Severity: Notice --> Undefined offset: 1 /home/ssc/idefab_dev/application/modules/users/controllers/Setting.php 249
ERROR - 2020-08-05 09:02:37 --> Severity: Notice --> Undefined offset: 1 /home/ssc/idefab_dev/application/modules/users/controllers/Setting.php 261
ERROR - 2020-08-05 09:02:37 --> Severity: Notice --> Undefined offset: 1 /home/ssc/idefab_dev/application/modules/users/controllers/Setting.php 261
ERROR - 2020-08-05 09:44:55 --> Query error: Table 'idefab_db.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-05 10:25:24 --> Query error: Table 'idefab_db.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-05 10:25:31 --> Severity: Parsing Error --> syntax error, unexpected 'if' (T_IF), expecting ':' /home/ssc/idefab_dev/application/modules/mso_proses/views/view_mso.php 259
ERROR - 2020-08-05 10:25:49 --> Severity: Parsing Error --> syntax error, unexpected 'if' (T_IF), expecting ':' /home/ssc/idefab_dev/application/modules/mso_proses/views/view_mso.php 259
ERROR - 2020-08-05 10:26:17 --> Severity: Warning --> Creating default object from empty value /home/ssc/idefab_dev/application/modules/quotation_proses/views/form_curtain_panel.php 14
ERROR - 2020-08-05 10:44:01 --> Query error: Table 'idefab_db.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-05 10:49:02 --> Severity: Warning --> Creating default object from empty value /home/ssc/idefab_dev/application/modules/quotation_proses/views/form_curtain_panel.php 14
ERROR - 2020-08-05 11:32:26 --> The upload path does not appear to be valid.
ERROR - 2020-08-05 12:47:59 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-08-05 12:51:12 --> Severity: Notice --> Undefined offset: 1 /home/ssc/idefab_dev/application/modules/users/controllers/Setting.php 246
ERROR - 2020-08-05 12:51:12 --> Severity: Notice --> Undefined offset: 1 /home/ssc/idefab_dev/application/modules/users/controllers/Setting.php 248
ERROR - 2020-08-05 12:51:12 --> Severity: Notice --> Undefined offset: 1 /home/ssc/idefab_dev/application/modules/users/controllers/Setting.php 249
ERROR - 2020-08-05 12:51:12 --> Severity: Notice --> Undefined offset: 1 /home/ssc/idefab_dev/application/modules/users/controllers/Setting.php 261
ERROR - 2020-08-05 12:51:12 --> Severity: Notice --> Undefined offset: 1 /home/ssc/idefab_dev/application/modules/users/controllers/Setting.php 261
ERROR - 2020-08-05 12:53:21 --> Severity: Notice --> Undefined offset: 1 /home/ssc/idefab_dev/application/modules/users/controllers/Setting.php 246
ERROR - 2020-08-05 12:53:21 --> Severity: Notice --> Undefined offset: 1 /home/ssc/idefab_dev/application/modules/users/controllers/Setting.php 248
ERROR - 2020-08-05 12:53:21 --> Severity: Notice --> Undefined offset: 1 /home/ssc/idefab_dev/application/modules/users/controllers/Setting.php 249
ERROR - 2020-08-05 12:53:21 --> Severity: Notice --> Undefined offset: 1 /home/ssc/idefab_dev/application/modules/users/controllers/Setting.php 261
ERROR - 2020-08-05 12:53:21 --> Severity: Notice --> Undefined offset: 1 /home/ssc/idefab_dev/application/modules/users/controllers/Setting.php 261
ERROR - 2020-08-05 12:53:44 --> Severity: Notice --> Undefined offset: 1 /home/ssc/idefab_dev/application/modules/users/controllers/Setting.php 220
ERROR - 2020-08-05 12:53:44 --> Severity: Notice --> Undefined offset: 1 /home/ssc/idefab_dev/application/modules/users/controllers/Setting.php 221
ERROR - 2020-08-05 12:53:44 --> Severity: Notice --> Undefined offset: 1 /home/ssc/idefab_dev/application/modules/users/controllers/Setting.php 233
ERROR - 2020-08-05 12:53:44 --> Severity: Notice --> Undefined offset: 1 /home/ssc/idefab_dev/application/modules/users/controllers/Setting.php 233
ERROR - 2020-08-05 12:53:57 --> Severity: Notice --> Undefined offset: 1 /home/ssc/idefab_dev/application/modules/users/controllers/Setting.php 233
ERROR - 2020-08-05 12:53:57 --> Severity: Notice --> Undefined offset: 1 /home/ssc/idefab_dev/application/modules/users/controllers/Setting.php 233
ERROR - 2020-08-05 12:53:57 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:15 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:54:28 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 54
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 12:55:33 --> Severity: Notice --> Undefined index: View /home/ssc/idefab_dev/application/modules/users/views/user_permissions.php 55
ERROR - 2020-08-05 13:02:51 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-08-05 13:02:57 --> Query error: Table 'idefab_db.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-05 13:04:30 --> Query error: Table 'idefab_db.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-05 13:04:56 --> Query error: Table 'idefab_db.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-05 13:18:12 --> Query error: Table 'idefab_db.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-05 13:23:00 --> Severity: Notice --> Undefined variable: datgroupmenu /home/ssc/idefab_dev/application/modules/menus/views/menus_form.php 70
ERROR - 2020-08-05 13:24:23 --> Query error: Table 'idefab_db.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-05 13:24:26 --> Query error: Table 'idefab_db.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-05 13:25:30 --> 404 Page Not Found: ../modules/quotation_non_proses/controllers/Quotation_non_proses/qt_non_pro_deal
ERROR - 2020-08-05 13:30:42 --> Severity: Notice --> Undefined variable: datgroupmenu /home/ssc/idefab_dev/application/modules/menus/views/menus_form.php 70
ERROR - 2020-08-05 13:32:43 --> Query error: Table 'idefab_db.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-05 13:32:43 --> 404 Page Not Found: ../modules/quotation_non_proses/controllers/Quotation_non_proses/qt_non_pro_close
ERROR - 2020-08-05 13:32:58 --> Severity: Notice --> Undefined variable: datgroupmenu /home/ssc/idefab_dev/application/modules/menus/views/menus_form.php 70
ERROR - 2020-08-05 13:33:34 --> Severity: Notice --> Undefined variable: datgroupmenu /home/ssc/idefab_dev/application/modules/menus/views/menus_form.php 70
ERROR - 2020-08-05 13:34:39 --> Severity: Notice --> Undefined variable: datgroupmenu /home/ssc/idefab_dev/application/modules/menus/views/menus_form.php 70
ERROR - 2020-08-05 13:35:09 --> Severity: Notice --> Undefined variable: datgroupmenu /home/ssc/idefab_dev/application/modules/menus/views/menus_form.php 70
ERROR - 2020-08-05 13:35:22 --> Severity: Notice --> Undefined variable: datgroupmenu /home/ssc/idefab_dev/application/modules/menus/views/menus_form.php 70
ERROR - 2020-08-05 13:35:27 --> Severity: Notice --> Undefined variable: datgroupmenu /home/ssc/idefab_dev/application/modules/menus/views/menus_form.php 70
ERROR - 2020-08-05 13:39:28 --> Query error: Table 'idefab_db.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-05 13:39:30 --> Query error: Table 'idefab_db.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-05 13:41:02 --> Query error: Table 'idefab_db.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-05 13:42:15 --> Query error: Table 'idefab_db.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-05 13:42:49 --> Query error: Table 'idefab_db.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-05 13:44:05 --> Query error: Table 'idefab_db.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-05 13:44:36 --> Severity: Notice --> Undefined variable: datgroupmenu /home/ssc/idefab_dev/application/modules/menus/views/menus_form.php 70
ERROR - 2020-08-05 13:44:40 --> Query error: Table 'idefab_db.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-05 14:13:18 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-08-05 14:13:52 --> Query error: Table 'idefab_db.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-05 14:14:11 --> Query error: Table 'idefab_db.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-05 14:15:52 --> Query error: Table 'idefab_db.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-05 14:32:33 --> Query error: Unknown column 'b.nasme_class' in 'field list' - Invalid query: SELECT a.*,b.nasme_class from master_product_fabric a inner join master_product_class b on a.id_class = b.id_class where a.id_product = '1012-014-007'
ERROR - 2020-08-05 15:02:34 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-08-05 15:02:41 --> Query error: Table 'idefab_db.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-05 15:24:19 --> Severity: error --> Exception: Unable to locate the model you have specified: QuotationNonProsesModel /home/ssc/idefab_dev/system/core/Loader.php 344
ERROR - 2020-08-05 15:25:01 --> Query error: Unknown column 'name_producr' in 'field list' - Invalid query: SELECT id_product, name_producr FROM master_product_fabric WHERE activation = '1'
ERROR - 2020-08-05 15:26:14 --> Query error: Unknown column 'name_producr' in 'field list' - Invalid query: SELECT id_product, name_producr FROM master_product_fabric WHERE activation = '1'
ERROR - 2020-08-05 15:54:24 --> Severity: Error --> Allowed memory size of 1073741824 bytes exhausted (tried to allocate 32 bytes) /home/ssc/idefab_dev/system/database/drivers/mysqli/mysqli_result.php 183
ERROR - 2020-08-05 15:54:52 --> Severity: Error --> Allowed memory size of 1073741824 bytes exhausted (tried to allocate 32 bytes) /home/ssc/idefab_dev/system/database/drivers/mysqli/mysqli_result.php 183
ERROR - 2020-08-05 15:55:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'WHERE b.activation = 'aktif' and status = '1'' at line 1 - Invalid query: SELECT a.id_product, a.name_product FROM master_product_fabric a left join pricelist_fabric b WHERE b.activation = 'aktif' and status = '1'
ERROR - 2020-08-05 15:55:30 --> Query error: Table 'idefab_db.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-08-05 16:31:44 --> Severity: Warning --> Invalid argument supplied for foreach() /home/ssc/idefab_dev/application/modules/quotation_non_proses/views/form_add_quotation.php 724
ERROR - 2020-08-05 16:39:44 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-08-05 22:55:11 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-08-05 22:55:17 --> Query error: Table 'idefab_db.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
