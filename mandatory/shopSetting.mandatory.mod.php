<?

class mandatoryShopSetting
{
    static function mandatoryElements()
    {
        
    
        //mandatoryShopSetting::setSetting();
    
        mandatoryShopSetting::getShopSetting("shop_setting"); // Устанавливаем курс доллара и минимальную сумму бесплатной доставки
        //mandatoryShopSetting::getSetting("kurs_usd"); // Устанавливаем курс доллара
        //mandatoryShopSetting::getSetting("min_summa_dostavki");// Устанавливаем минимальную сумму бесплатной доставки
        
        //mandatoryShopSetting::getNavigate("main");
        //mandatoryShopSetting::getNavigate("second");
        //mandatoryShopSetting::getNavigateItems();
        //mandatoryShopSetting::getImagesMain();
        //mandatoryShopSetting::getBirthday();
    }
    
    static function setSetting()
    {
	    $query = "SELECT * FROM `shop_setting`";
        $res = mysql_query($query);
		mysql::queryError($res,$query);

        while ($row = mysql_fetch_assoc($res))
        {
        	   $setting[] = $row;
        }

        return $setting;
    }
/*
    static function getSetting($val)
    {
	    $db = new mysql;
        
        
        $from="`shop_setting`";
        $where="`description` = '{$val}'";
        $row = $db->origSelectSQL("", $from, $where, "", "");
        
        if($val == "kurs_usd"){define('KURS_USD',$row[0]["value"]);}
        if($val == "min_summa_dostavki"){define('MIN_SUMMA_DOSTAVKI',$row[0]['value']);}
         

        return $res = $row;
    }
*/    
    static function getShopSetting($file_name)
    {
        $GLOBALS["shop_setting"] = INI::Get($file_name);
        $shop_setting = $GLOBALS["shop_setting"];

        define('KURS_USD',$shop_setting[0]["value"]);  
        define('MIN_SUMMA_DOSTAVKI',$shop_setting[1]['value']);
    }
//include_once (SITE_PATH.PATH_MAGIC."/ini/shop_setting.ini");
//define('KURS_USD',$shop_setting[0]["value"]);    
 /*   
    static function getMinSummaDostavki()
    {
	    $db = new mysql;
        
        $from="`shop_setting`";
        $where="`description` = 'min_summa_dostavki'";
        $row = $db->origSelectSQL("", $from, $where, "", "");

        define('MIN_SUMMA_DOSTAVKI',$row[0]['value']);
        return $min_summa_dostavki = $row;
    }
 */   
    
/*
    function setSetting($function_name)
    {
        $db = new mysql;
        
        $from="`cfg_global`";
        $where="`function_name` = '{$function_name}' AND `enable`='1'";
        $row = $db->origSelectSQL("", $from, $where, "", "");
        if($row)
        {
            return TRUE;
        }       
        else
        {
            return FALSE;
        } 
    }
 
    
    function getBirthday()
    {
        $db = new mysql;
        $select = "";
        $from="`contacts`";
        $where="`birthday_day`='".date("d")."' AND `birthday_month`='".date("m")."'";
        $birthday = $db->origSelectSQL($select, $from, $where, "", "");
        $birthday = $birthday[0];
        if($birthday !== NULL)
        {
            foreach($birthday as $key=>$val)
            {
               $_SESSION['birthday'][$key] = $val."<br />";
            }
        }
        //mail("psydema@ukr.net","Днюха", "tetx");
    }
    
    function getNavigate($val)
    {
        unset($_SESSION['navigate'][$val]);
        
        $db =new mysql;
        $select = "";
        $from="`nav`";
        $where="`location`='{$val}' AND `showing_{$_SESSION['lang']}`='Y'";
        $_SESSION['navigate'][$val] = $db->origSelectSQL($select, $from, $where, "`order_show`", "");
        
    }
    
    function getNavigateItems()
    {
        unset($_SESSION['navigate']['items']);
        
        $db =new mysql;
        $select = "";
        $from=TABLE_ITEMS_CATEGORY;
        $where="`enabled`='1'";
        $_SESSION['navigate']['items'] = $db->origSelectSQL($select, $from, $where, "`order_show`", "");
//SYS::varDump($_SESSION['navigate']['items'],__FILE__,__LINE__);
    }
    
    function getImagesMain()
    {
        $imagecode=array(1,2,3,4,5);
        shuffle($imagecode);
        $_SESSION["images_main"] = $imagecode;
    }

    
    function getVideogid()
    {
        unset($_SESSION['videogid']);
        
        $db =new mysql;
        $select = "id, seo, image_small, caption"; 
        $from="`art_article`";
        $where="`type`='videogid' AND `enabled`='1'";
        $_SESSION['videogid'] = $db->origSelectSQL($select, $from, $where, "`date` DESC", "1"); 
    }
    
*/
    
    
}
?>
