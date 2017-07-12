@echo off
cd\
cd xampp\mysql\bin
mysql --user=root --password= -e "DROP DATABASE IF EXISTS vos_demo"
mysql --user=root --password= -e "CREATE DATABASE vos_demo"
mysql --user=root --password= -D vos_demo < C:\xampp\htdocs\VOSHRM.CONFIG\voshrms_demo.sql
php -f C:\xampp\htdocs\VOSHRM.CONFIG\VOSHRM_DEMO_DATABASE_RESTORE.php
@echo Database restored and Password encrypted!
exit