<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-07-21 08:28:06 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-07-21 08:28:11 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-07-21 08:28:18 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-07-21 08:30:24 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-07-21 08:57:33 --> Query error: Table 'idefab_dev.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-07-21 08:59:30 --> Query error: Cannot add or update a child row: a foreign key constraint fails (`idefab_dev`.`child_customer_pic`, CONSTRAINT `child_customer_pic_ibfk_1` FOREIGN KEY (`religion_pic`) REFERENCES `religion` (`id`)) - Invalid query: INSERT INTO `child_customer_pic` (`email_pic`, `id_customer`, `id_pic`, `name_pic`, `phone_pic`, `position_pic`, `religion_pic`) VALUES ('-','ED1514','ED1514-P01','Rina Meitia Nizar, Ibu','0818080134','-','')
ERROR - 2020-07-21 08:59:42 --> Query error: Cannot add or update a child row: a foreign key constraint fails (`idefab_dev`.`child_customer_pic`, CONSTRAINT `child_customer_pic_ibfk_1` FOREIGN KEY (`religion_pic`) REFERENCES `religion` (`id`)) - Invalid query: INSERT INTO `child_customer_pic` (`email_pic`, `id_customer`, `id_pic`, `name_pic`, `phone_pic`, `position_pic`, `religion_pic`) VALUES ('-','ED1514','ED1514-P01','Rina Meitia Nizar, Ibu','0818080134','-','')
ERROR - 2020-07-21 08:59:46 --> Query error: Cannot add or update a child row: a foreign key constraint fails (`idefab_dev`.`child_customer_pic`, CONSTRAINT `child_customer_pic_ibfk_1` FOREIGN KEY (`religion_pic`) REFERENCES `religion` (`id`)) - Invalid query: INSERT INTO `child_customer_pic` (`email_pic`, `id_customer`, `id_pic`, `name_pic`, `phone_pic`, `position_pic`, `religion_pic`) VALUES ('-','ED1514','ED1514-P01','Rina Meitia Nizar, Ibu','0818080134','-','')
ERROR - 2020-07-21 09:02:34 --> 404 Page Not Found: ../modules/quotation_proses/controllers/Quotation_proses/qt_pro_deal
ERROR - 2020-07-21 09:02:45 --> 404 Page Not Found: ../modules/quotation_proses/controllers/Quotation_proses/qt_pro_deal
ERROR - 2020-07-21 09:02:53 --> 404 Page Not Found: ../modules/quotation_proses/controllers/Quotation_proses/qt_pro_deal
ERROR - 2020-07-21 09:10:18 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/ssc/idefab_dev/application/modules/users/views/login_animate.php 6
ERROR - 2020-07-21 09:10:39 --> Query error: Table 'idefab_dev.view_invoice_payment' doesn't exist - Invalid query: SELECT
							  SUM(CASE WHEN umur <= 15 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_15,
							  SUM(CASE WHEN umur > 15 AND umur <= 30 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_30,
							  SUM(CASE WHEN umur > 30 AND umur <= 60 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_60,
							  SUM(CASE WHEN umur > 60 AND umur <= 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_90,
							  SUM(CASE WHEN umur > 90 THEN (hargajualtotal - jum_bayar) ELSE 0 END) AS umur_91
							FROM
								view_invoice_payment
							WHERE
								 (hargajualtotal - jum_bayar) > 0 AND kdcab=''
ERROR - 2020-07-21 09:10:44 --> 404 Page Not Found: ../modules/quotation_proses/controllers/Quotation_proses/qt_pro_deal
