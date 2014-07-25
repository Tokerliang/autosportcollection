<style>

.b{	padding-bottom: 10px}

.r{	padding-right:10px}

.model a{color:#E60012; font-weight:bold; margin-bottom: 5px; text-decoration: none}

.model a:hover{text-decoration: underline}

.name a{color:#333; height: 50px;text-decoration: none; margin-top:5px}

.name a:hover{text-decoration: underline}

.blueBorder{border:1px solid #00A0E9}

.orangeBorder{border:1px solid #F5C000}



#newProductPanel{height: 210px; overflow: hidden;}

#newProductTable{position: relative;}

</style>



<script type="text/javascript">



function scrollProduct(){

	var height = $('#newProductTable tr:first td:first').outerHeight();

	var dur = 4000;

	if(height < 20) {height=80; dur=0} 

	$('#newProductTable').animate({top: 0-height},dur,afterScroll);

}



function afterScroll(){

	$('#newProductTable tr:first').appendTo('#newProductTable');

	$('#newProductTable').css('top',0);

	

	setTimeout(scrollProduct,2000);

}

</script>



<?

function hasNextProduct(){

	return $GLOBALS['nextProductIndex'] < $GLOBALS['cntProducts'];

}



function buildNextProduct($showMoreInfo = false){

	global $products;

	global $nextProductIndex;

	global $picWidth;

	global $picHeight;

	

	$current = $products[$nextProductIndex];



	$detailPageLink = tep_href_link(FILENAME_PRODUCT_INFO,'products_id='.$current['products_id']);

	$buyNowLink = 'products_new.php?action=buy_now&products_id='.$current['products_id'];

	

	$moreInfo = '';

	if ($showMoreInfo){

		

		//BOF check stock

		$any_out_of_stock = 0;

		if (STOCK_CHECK == 'true') {

			$stock_check = tep_check_stock($current['products_id'], 1);

			if (tep_not_null($stock_check)) {

			  $any_out_of_stock = 1;

			}

		}

		

		$buyNowOrOutOfStock = $any_out_of_stock ? '<font style="line-height:1.5" color=red>Out of Stock</font>' : '<a href="'.$buyNowLink.'"><img src="includes/languages/english/images/buttons/button_add_to_cart2.gif"></a>';

		

		//EOF check stock

		

		$moreInfo .= '<table>

<tr>

	<td></td>

	<td width=100><a target="_blank" href="'.$detailPageLink.'"><img src="includes/languages/english/images/buttons/button_details.gif"></a></td>

</tr>

<tr>

	<td align=right style="padding:3px 20px 0 0;"><font color="#FC8121">$ '.round($current['products_price'],2).'</font></td>

	<td>'.$buyNowOrOutOfStock.'</td>

</tr></table>';

	}

	

	if (hasNextProduct()){

		echo '<td class="b r" align=center><a target="_blank" href="'.$detailPageLink.'"><img src="getThumbnail.php?w='.$picWidth.'&h='.$picHeight.'&images_id='.$current['products_images_id'].'" /></a></td>';

		echo '<td class="b"><div class="name"><a target="_blank" href="'.$detailPageLink.'">'.$current['products_name'].'</a></div>'.$moreInfo.'</td>';

	}else {

		echo '<td>&nbsp;</td><td>&nbsp;</td>';

	}

	

	$GLOBALS['nextProductIndex']++;

}

?>



<?

$ids = array(1654,1490,1239,1172,1180,1184,2041,2039);

$ids = implode(',',$ids);

$picWidth = 130;

$picHeight = 60;



// exclude the align products ==> p2c.categories_id not in(...)



$sql = 'select p.products_id,p.products_model,pd.products_name,pi.products_images_id

from products p inner join products_to_categories p2c using(products_id), products_description pd, products_images pi

where p.products_id = pd.products_id

and pd.language_id = 1

and p.products_id = pi.products_id

and pi.type = 1

and p.products_status = 1

and p2c.categories_id not in(46,47,48,53,54,49,58,50,62,51,63,65,52,66,67,68,69,70,71,72,73)

order by rand() limit 8';



$query = tep_db_query($sql);



$products = array();



while ($p = tep_db_fetch_array($query)){

	$products[] = $p;

}



$cntProducts = count($products);

$nextProductIndex = 0;



?>





<div id=newProductPanel>

<table width=100% cellpadding=0 border=0 cellspacing=0 id=newProductTable>

	<? while (hasNextProduct()): ?>

	<tr>

		<? buildNextProduct(); ?>

		<? buildNextProduct(); ?>

	</tr>

	<? endwhile; ?>

</table>

</div>

<script>

	scrollProduct();

</script>



<div id=main_banner style="border-top:10px solid #ccc; margin-top: 5px">

<img src="images/banners/01.jpg" border="0" usemap="#Map" />

<map name="Map" id="Map">

  <area shape="rect" coords="1,2,484,203" href="<?=tep_href_link('index.php', "cPath=5") ?>" title="Model Car" />

  <area shape="rect" coords="485,4,785,200" href="<?=tep_href_link('index.php', "cPath=4") ?>" title="Figure" />

</map>

<img src="images/banners/02.jpg" border="0" usemap="#Map2" />

<map name="Map2" id="Map2">

  <area shape="rect" coords="3,5,433,202" href="<?=tep_href_link('index.php', "cPath=52") ?>" title="F1 RC BODY" />

  <area shape="rect" coords="438,4,786,203" href="<?=tep_href_link('index.php', "cPath=1") ?>" title="Decals" />

</map>



	<!--

<img src="http://dev.yeshobby.com/attachment/Mon_1003/10_5_52db0b440b46c7c.jpg" />

<a href="<?//=tep_href_link('product_info.php','products_id=3006') ?>"><img src="http://dev.yeshobby.com/attachment/Mon_1001/10_5_e131493752b3ee9.jpg" /></a>

-->

</div>

<div style="font-size:12px;text-align:left;padding-top:8px;">

  <div style="line-height:20px; margin-top:10px;">
  Autosportcollection.net is your online store where you can find f1 diecast model cars,F1 Racing Decals,Racing Team Cap,f1 figure set racing souvenir T-shirt and so on. It's design for all the racing model car hobbiers. Our shop shows all kinds of racing souvenir.
</div>
<div style="line-height:20px; margin-top:10px;">
[For racing decals] of F1 racing car,we have classic F1 Racing Decals, Classic Racing Stickers ,Marlboro,Camel,Ferrari,Honda,Kawasaki,LuchyStrike,Martini,Mobil,Nissan,Shell,Toyota,Trans Formers,Vodafone,Mild Seven Convension and so on.And 1/18 MiniChamps 1/12 MiniChamps 1/24 MiniChamps 1/20 MiniChamps 1/43 MiniChamps all size including.
</div>
<div style="line-height:20px; margin-top:10px;">
[For model car], We offer a wide range from all teams including 2011 Ferrari Team,2011 McLaren, 2011 red bull,2011 Mercedes Benz,2011 Renualt,Ayrton Senna,Michael Schumacher and many more.You can choose what you want here and enjoy them. 
We also sell different figure,such as 2010 Ferrari,2010 Red Bull,2010 Mclaren,Michael Schumacher,Ayrton Senna and other styles.It's easier to buy an item as birthday gifts or Souvenirs.
</div>
<div style="line-height:20px; margin-top:10px;">
[For Racing Team T-shirt and Racing Team Cap] , there's lots of styles in our website.DIfferent colour,different range,There always something you like here. Buying your discount performance racing parts in our website is the most exciting way to shop. Probably just as exciting as car racing. 
Your satisfaction is Autosportcollection.net great support
</div>
</div>







