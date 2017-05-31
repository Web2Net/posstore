<?php

    date_default_timezone_set('Europe/Kiev');
    //define('CHARSET', 'windows-1251');
    define('CHARSET', 'utf-8');
    
    //define('WEB2NET', '1');

// Авторизация
    define('USERS_TABLE','user_item');
    define('SES_ID',session_id());
// /Авторизация 
// Таблици связанные с товарами
    //define('TABLE_ITEMS_CATEGORY','items_category_new');
    define('TABLE_ITEMS_CATEGORY','items_category');
    define('TABLE_ITEMS_FILTERS','items_filter');
    define('TABLE_ITEMS','shop_item');
    define('TABLE_TEMP_ITEMS','items_temp');
// /Таблици связанные с товарами   
	
    define('DB_HOST', 'db14.freehost.com.ua');
   // define('DB_HOST', 'localhost');    
    define('DB_NAME', 'posstore_db');
    define('DB_USER', 'posstore_db');
//    define('DB_USER', 'root');    
    define('DB_PASS', 'RQRK0oGop');
//    define('DB_PASS', '');    
    
    define('USER_IP', getenv ("REMOTE_ADDR"));
    define('PAGE_REF', getenv("HTTP_REFERER"));    
    define('SITE_PATH', getenv("DOCUMENT_ROOT"));
    define('SITE_URL', "http://".getenv("HTTP_HOST"));
    define('ADM_SITE_URL',SITE_URL.'/cms');
    define('PAGE_URL', SITE_URL.getenv("REQUEST_URI"));    
    
    define('PATH_EMAIL_BASE', SITE_PATH.'/cms/sender/e-mail_base'); // Рассылка  
     
    define('PATH_DUMP',       SITE_PATH.'/archives');  // Где лежат дампы БД
    define('EXT_DUMP',  'sql');                           // Разширение для дампов БД
    
    define('PATH_DESIGN',        '/index_files');
    define('PATH_SITE_DESIGN',       '/site/design');
    //define('PATH_DESIGN',       '/site/design/t_1');
    
    define('PATH_LIB',          '/lib');
    define('PATH_MAGIC',        '/magic');
    define('PATH_TPL',          'site/tpl');
    define('PATH_IMG',          '/index_files/img');                             
    define('PATH_INC',          PATH_TPL.'/inc');
    define('PATH_IMG_ITEMS',    '/product-image');
    define('PATH_IMG_ART',      PATH_IMG.'/art');

    define('PATH_TPL_ADMIN',          '/cms/tpl');
    define('PATH_INC_ADMIN',          PATH_TPL_ADMIN.'/inc');
    define('PATH_IMG_ADMIN',          '/cms/design');
    
    define('PATH_INC_MOBI',          PATH_TPL.'/mobi/inc');
    define('PATH_DESIGN_MOBI',       '/site/design/mobi');
    define('PATH_IMG_MOBI',          PATH_DESIGN_MOBI.'/img');
    
    define('CURRENCY','грн');

        define('PROCENT_NADBAVKI_0_50','25');
        define('PROCENT_NADBAVKI_50_100','20');
        define('PROCENT_NADBAVKI_100_200','10');
        define('PROCENT_NADBAVKI_200_500','10');
        define('PROCENT_NADBAVKI_500_1000','5');
        define('PROCENT_NADBAVKI_1000_','3');
        
        define('SITE_NAME', 'POS Store');
        define('SITE_NAME_FULL', 'Интернет магазин '.SITE_NAME);
        define('META_T_DEFAULT', ' Интернет-магазин POS материалов');
        define('META_K_DEFAULT', 'Рамка, Стойка, Универсальные держатели, Держатели-подставки, Иголка, Кассеты, Разделители, Воблеры, стопперы, Карманы, Таблички, маркеры, Покупательские корзины, Клик-рамы');
        define('META_D_DEFAULT', 'Без POS материалов не может существовать ни один современный успешный магазин или другой торговый объект.');        
        
        define('RAZDELYALKA', '::'); // Используется для разделения слов, фраз
    
        define('EMAIL_BOSS',      'artemchukalex@gmail.com');
        define('EMAIL_ADMIN',     'toltecos@ukr.net,you@mkr.com.ua,artemchukalex@gmail.com,psydema@ukr.net');
        define('EMAIL_FEEDBACK',  'artemchukalex@gmail.com');
        define('EMAIL_WEBMASTER', 'you@mkr.com.ua');
        define('EMAIL_OFFICE',    'artemchukalex@gmail.com');
        define('EMAIL_SHOP',    'artemchukalex@gmail.com');
        define('EMAIL_UNSUBCRIBE','artemchukalex@gmail.com');
        define('CONTACT_TEL_MOB', '+38 (067) 264-60-61');
        define('CONTACT_TEL_OFFICE', '+38 (044) 500-16-73');
        define('CONTACT_ICQ', '');
        define('CONTACT_SKYPE', 'artemchuk-oa');
        define('CONTACT_ADRESS', '02160, г. Киев, пр-т. Воссоединения, 19, офис 114');
    
   
?>
