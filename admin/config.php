<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);
//DB
$DB_HOST = 'forcecrm.mysql.ukraine.com.ua';
$DB_NAME = 'forcecrm_sart';
$DB_USER = 'forcecrm_sart';
$DB_PASSWORD = 'nqjub2qz';
           
//Admin
$ALANG = 'ru';
$PROJECT_NAME = "Sartorius";
$ADMIN_SESSION_AUTH = 1;
$YANDEX_TRANSLATE_API_KEY = 'trnsl.1.1.20170103T150641Z.f693759668b9d203.03fc0b872fcc7aa74056236f043bf5a3b0b2be80';

$LANGS = array('1'=>'Рус','2'=>'Укр');
$LANGS_MARKS = array('1' => 'ru', '2' => 'uk');

//Tables
$TABLE_ITEMS="catalog_products";

$TABLE_DOCS_RUBS="docs_rubs";
$TABLE_DOCS="docs";
$TABLE_NEWS_RUBS="news_rubs";
$TABLE_NEWS="news";

$TABLE_USERS_RUBS="utypes";
$TABLE_USERS="users";
$TABLE_MAIL="emails";
$TABLE_TAGS = "tags";

$TABLE_ADMINS_GROUPS="admins_groups";
$TABLE_ADMINS="admins";
$TABLE_ADMINS_MENU="admins_menu";
$TABLE_ADMINS_MENU_ASSOC="admins_menu_assoc";
$TABLE_ADMINS_LOG="admins_log";
