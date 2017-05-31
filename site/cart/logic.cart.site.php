<?php
define('CART_ITEM_TABLE','cart_item');
define('CART_TAG_TABLE','cart_tag');
define('CART_ITEM_IMG_PATH', "/image/cart/item");
define('CART_TAG_IMG_PATH', "/image/cart/tag");

define('CART_NAME', 'Корзина');

class Cart {	

function siteCart() {

foreach ($_REQUEST as $key=>$val){
$str="$".$key."=\$val;";
eval($str);}

if(isset($_SERVER['REQUEST_URI'])){
$seodata = explode("/",str_replace("?display=ajax","",$_SERVER['REQUEST_URI']));
$mod = $seodata[1];
$com = $seodata[2];
$item = $seodata[3];    
$param = $seodata[4];
}

//$param=str_replace("?display=ajax","",$param);
$tpl=new SiteModTpl;

if($com=="incart"){


if($item!=NULL){

if($param=='del'){
unset($_SESSION['shop_item'][$item]);
}else{


$shop_item=Shop::itemDataId($item);

if($_SESSION['shop_item'][$item]==NULL){
$_SESSION['shop_item'][$item]['item']=$shop_item;
$_SESSION['shop_item'][$item]['hm']=$param;
}else{
$_SESSION['shop_item'][$item]['hm']=$_SESSION['shop_item'][$item]['hm']+$param;
}

}
$stoit=0;
$count_item=0;

}

if($_SESSION['shop_item']!=NULL){
foreach($_SESSION['shop_item'] as $key=>$val){
$cena=Price::getPrice($val['item']['postavschik'],$val['item']['price_roznica'],$val['item']['price_diler'],$val['item']['ddp']);
$ocena=$cena*$val['hm'];
$stoit=$stoit+$ocena;
$count_item=$count_item+$val['hm'];
}}




//$count_item=count($_SESSION['shop_item']);

//unset($_SESSION['shop_item']);

$tpl->assign('count_item',$count_item);
$tpl->assign('stoit',$stoit);
$tpl->assign('shop_item',$shop_item);
$tpl->assign('count_shop_item',count($_SESSION['shop_item']));

$c_cont["content"]=$tpl->get("viget-item-list");

}
if($com=="buy"){
if($_SESSION['shop_item']!=NULL){
$c_cont["content"]=$tpl->get("buy-item-list");
}else{
$c_cont["content"]='<div align="center" style="margin-top:50px;">Ваша корзина пуста</div>';
}
$metatitle=CART_NAME;	// в этом файле
$c_cont["meta"]["title"]=SITE_NAME." ".RAZDELYALKA." ".$metatitle;// в cfg.php;
$c_cont["meta"]["description"]=SITE_NAME_FULL;// в cfg.php;
$c_cont["meta"]["keywords"]=META_K_DEFAULT; // в cfg.php;
}
if($com=="ok"&&$z_name!=""&&$z_phone!=""&&$z_mail!=""){
	
$metatitle=CART_NAME;	// в этом файле
$c_cont["meta"]["title"]=SITE_NAME." ".RAZDELYALKA." Заказ отправлен";// в cfg.php;
$c_cont["meta"]["description"]=SITE_NAME_FULL;// в cfg.php;
$c_cont["meta"]["keywords"]=META_K_DEFAULT; // в cfg.php;

	
$c_cont["content"]=$tpl->get("buy-ok");

$shop_connect=";";
if($_SESSION['shop_item']!=NULL){foreach($_SESSION['shop_item'] as $key=>$val){
$shop_connect.=	$key."/".$val['hm'].";";
}}




$arr_value['connect']=';3;';

if(isset($z_phone) && $z_phone !== ""){
	$arr_value['caption']=trim($z_phone);
}
if(isset($z_mail) && $z_mail !== ""){
	$arr_value['seolink']=trim($z_mail);
}
if(isset($z_name) && $z_name !== ""){
	$arr_value['desc_short']=trim(str_replace('"','&quot;',$z_name));
}

$arr_value['desc_full']=trim($desc_full);
$arr_value['show']=1;
$arr_value['hit']=$hit;
$arr_value['p1']=$shop_connect;

$arr_value['meta_t']=$meta_t!=''?str_replace('"','&quot;',$meta_t):$arr_value['caption'];
$arr_value['meta_d']=$meta_d!=''?str_replace('"','&quot;',$meta_d):$arr_value['desc_short'];
$arr_value['meta_k']=$meta_k;

$arr_value['date']=$date!=""?$date:date("Y-m-d H:i:s");

$nowdata=getdate(time());
$arr_value['pos']=$pos!=''&&$pos!=0?$pos:$nowdata[0];


$table=CART_ITEM_TABLE;
SYS::varDump($arr_value,__FILE__,__LINE__,'arr_value');

$db = new mysql;
$id = $db->insertSQL ($arr_value, $table);

$name_from = SITE_NAME;
$email_from = EMAIL_SHOP;
$name_to = trim(str_replace('"','&quot;',$z_name));
$email_to = trim($_POST['z_mail']);
$data_charset="UTF-8";
$send_charset="UTF-8";
$subject = "Заказ №".$id." принят ".Time::formatMonth(date("Y-M-d H:i:s"))." ".date("H:i");
$GLOBALS['z_id']=$id;
$body=$tpl->get("cart-mail");

Email::send_mime_mail($name_from,$email_from,$name_to,$email_to, $data_charset,  $send_charset, $subject, $body);

$name_to = trim('Новый заказ');
//define('EMAIL_SHOP','toltecos@ukr.net');
$email_to = explode(",",trim(EMAIL_ADMIN));
$body=$tpl->get("admin-cart-mail");

if($email_to!=NULL){

    foreach($email_to as $key=>$val){
        Email::send_mime_mail($name_from,$email_from,$name_to,$val,$data_charset,$send_charset,$subject,$body);
    }

}

//mail($email_to,$subject,$body);


unset($_SESSION['shop_item']);

}
return $c_cont;

}




}
?>
