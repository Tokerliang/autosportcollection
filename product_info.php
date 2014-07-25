<?php
/*
  $Id: product_info.php,v 1.97 2003/07/01 14:34:54 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_PRODUCT_INFO);
  // BOF: FWR Auctions  
  $oscAuctions->product_info_initiate();
  $oscAuctions->auctionsRefreshPage();
  // EOF: FWR Auctions

  $product_check_query = tep_db_query("select count(*) as total from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "' and pd.products_id = p.products_id and pd.language_id = '" . (int)$languages_id . "'");
  $product_check = tep_db_fetch_array($product_check_query);
// BOF Separate Pricing per Customer
  if (isset($_SESSION['sppc_customer_group_id']) && $_SESSION['sppc_customer_group_id'] != '0') {
    $customer_group_id = $_SESSION['sppc_customer_group_id'];
  } else {
    $customer_group_id = '0';
  }
// EOF Separate Pricing per Customer  
  $name_seo = '';
  $des_seo = '';
  $spec_seo = '';
  if ($product_check['total'] > 0) 
  {
  		$all_product_detail_query = tep_db_query("select pd.products_name, pd.products_description, pd.products_specification from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "' and pd.products_id = p.products_id and pd.language_id = '" . (int)$languages_id . "'");
		$all_product_detail = tep_db_fetch_array($all_product_detail_query);
		$name_seo = $all_product_detail['products_name'];
		$des_seo = $all_product_detail['products_description'];
		$spec_seo = $all_product_detail['products_specification'];
  }
?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<meta name="keywords" content="<?php echo nl2br(str_replace('&#9679;', '|', strip_tags($spec_seo) )); ?>" />
<meta name="description" content="<?php echo nl2br(str_replace('&#9679;', '|', strip_tags($des_seo) )); ?>" />
<?
if( $is_package_kit )
{
	?>
<title><?php echo '['. $title_seo .'] '. $name_seo . ' ' . TITLE; ?></title>
<?
}
else{
	?>
<title><?php echo $name_seo . ' ' . TITLE; ?></title>	
<?
}
?>
<base href="<?php echo (($request_type == 'SSL') ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG; ?>">
<link rel="stylesheet" type="text/css" href="stylesheet.css">
<script language="javascript"><!--
function popupWindow(url) {
  window.open(url,'popupWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=yes,copyhistory=no,width=100,height=100,screenX=150,screenY=150,top=150,left=150')
}
//--></script>


<!-- ---------SEO SEO ---------------------------------------->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-35873955-7']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
  
</script>
<!-- ---------SEO SEO ---------------------------------------->



</head>
<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">
<!-- header //-->
<?php require(DIR_WS_INCLUDES . 'header.php'); ?>
<!-- header_eof //-->

<!-- body //-->
<table style="width:1000px" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="col_left">
<!-- left_navigation //-->
<?php require(DIR_WS_INCLUDES . 'column_left.php'); ?>
<!-- left_navigation_eof //-->
    </td>
<!-- body_text //-->
    <td class="col_center"><?php echo tep_draw_form('cart_quantity', tep_href_link(FILENAME_PRODUCT_INFO, tep_get_all_get_params(array('action')) . 'action=add_product')); ?><table border="0" width="100%" cellspacing="0" cellpadding="0">
<?php
  if ($product_check['total'] < 1) {
?>
      <tr><td>
<? tep_draw_heading_top(); ?>

		<?php echo tep_draw_title_top();?>

					<?php echo TEXT_PRODUCT_NOT_FOUND;?>
			
		<?php echo tep_draw_title_bottom();?>
	
<? tep_draw_heading_top_1(); ?>				  
		

		
		<!-- 
		<table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">
          <tr class="infoBoxContents">
		  	<td> 
			-->
<!--BOF bundle product -->
				<table border="0" width="100%" cellspacing="0" cellpadding="2">
				  <tr>
					<td>
<?php
			  echo '<center><a href="' . tep_href_link('product_bundle_sell.php', '') . '">' . tep_image(DIR_WS_IMAGES .  'bundle.jpg') . '</a></center>'; 
?>
					</td>
				  </tr>
				</table>
<!--EOF bundle product -->
				<br style="line-height:1px;"><br style="line-height:12px;">
			
				<table border="0" width="100%" cellspacing="0" cellpadding="2">
				  <tr>
					<td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
					<td align="right"><?php echo '<a href="' . tep_href_link(FILENAME_DEFAULT) . '">' . tep_image_button('button_continue.gif', IMAGE_BUTTON_CONTINUE) . '</a>'; ?></td>
					<td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
				  </tr>
				</table>
				
			<!-- 	
			</td>
          </tr>
        </table>
		 -->
	
	
<? tep_draw_heading_bottom_1(); ?>

<? tep_draw_heading_bottom(); ?>

<?php
  } 
  else 
  {
    $product_info_query = tep_db_query("select p.products_id, pd.products_name, pd.products_description, pd.products_specification, pd.items_included, p.products_model, p.products_quantity, p.products_image, pd.products_url, p.products_price, p.products_tax_class_id, p.products_date_added, p.products_date_available, p.manufacturers_id, p.products_type from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "' and pd.products_id = p.products_id and pd.language_id = '" . (int)$languages_id . "'");
    $product_info = tep_db_fetch_array($product_info_query);
    
    $product_images_q = tep_db_query('select products_images_id, sort_order, images_name, images_description from products_images where products_id = "'.$product_info['products_id'].'" ORDER BY sort_order ASC');
    $images_all = array();
	while ($product_images_r = tep_db_fetch_array($product_images_q))  
	{
		$images_all[] = array('images_name' => $product_images_r['images_name'],
							  'images_id' => $product_images_r['products_images_id'],
							  'images_description' => $product_images_r['images_description'],
						      'images_sort_order' => $product_images_r['sort_order']);
	}
		
    tep_db_query("update " . TABLE_PRODUCTS_DESCRIPTION . " set products_viewed = products_viewed+1 where products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "' and language_id = '" . (int)$languages_id . "'");

    if ($new_price = tep_get_products_special_price($product_info['products_id'])) {
// BOF Separate Pricing per Customer
      if ($customer_group_id > 0) { // only need to check products_groups if customer is not retail
        $scustomer_group_price_query = tep_db_query("select customers_group_price from " . TABLE_PRODUCTS_GROUPS . " where products_id = '" . (int)$HTTP_GET_VARS['products_id']. "' and customers_group_id =  '" . $customer_group_id . "'");
        if ($scustomer_group_price = tep_db_fetch_array($scustomer_group_price_query)) {
          $product_info['products_price']= $scustomer_group_price['customers_group_price'];
	      }
      } // end if ($customer_group_id > 0)
// EOF Separate Pricing per Customer
      $products_price = '<s>' . $currencies->display_price($product_info['products_price'], tep_get_tax_rate($product_info['products_tax_class_id'])) . '</s> <span class="productSpecialPrice">' . $currencies->display_price($new_price, tep_get_tax_rate($product_info['products_tax_class_id'])) . '</span>';
	} else {
// BOF Separate Pricing per Customer
      if ($customer_group_id > 0) { // only need to check products_groups if customer is not retail
        $scustomer_group_price_query = tep_db_query("select customers_group_price from " . TABLE_PRODUCTS_GROUPS . " where products_id = '" . (int)$HTTP_GET_VARS['products_id']. "' and customers_group_id =  '" . $customer_group_id . "'");
        if ($scustomer_group_price = tep_db_fetch_array($scustomer_group_price_query)) {
        $product_info['products_price']= $scustomer_group_price['customers_group_price'];
	    }
    } // end if ($customer_group_id > 0)
// EOF Separate Pricing per Customer
      $products_price = $currencies->display_price($product_info['products_price'], tep_get_tax_rate($product_info['products_tax_class_id']));
    }

    // BOF: FWR Auctions
    $oscAuctions->product_infoProductsPrice($products_price, $product_info['products_price'], $product_info['products_tax_class_id']); 
    // EOF: FWR Auctions

//BOF check stock
	  $any_out_of_stock = 0;
      if (STOCK_CHECK == 'true') {
        $stock_check = tep_check_stock($product_info['products_id'], 1);
        if (tep_not_null($stock_check)) {
          $any_out_of_stock = 1;

        }
      }

//EOF check stock

    $products_name = $product_info['products_name'];
    /*
    if (tep_not_null($product_info['products_model'])) {
      $products_name = $product_info['products_name'] . ' <span class="smallText"><br>[' . $product_info['products_model'] . ']</span>';
    } else {
      $products_name = $product_info['products_name'];
    }*/
?>
      <tr>
        <td>
		
<? tep_draw_heading_top(); ?>

<?php echo tep_draw_title_top();?>

			<?php echo $breadcrumb->trail(' &raquo; ')?> 
			
<?php echo tep_draw_title_bottom();?>	
	
								
<? tep_draw_heading_top_1(); ?>	
<? /*  tep_draw_heading_top_2();  */?>		
		
												<table cellspacing="0" cellpadding="0" border="0" class="product">
													<tr><td>
															<table cellspacing="0" cellpadding="0" border="0">
																<tr><td height="100%">

		<table cellpadding="0" cellspacing="0" border="0">
			<tr><td style="vertical-align:middle; height:28px;"><em><center><?php echo $products_name; ?><br><span class="productSpecialPrice"><?=$products_price?></span></center></em><br><center><?php echo tep_draw_hidden_field('products_id', $product_info['products_id']) . (($product_info['products_price']  > 0 && !$oscAuctions->productShowAuction() && $any_out_of_stock!=1)? tep_image_submit('button_big_add_to_cart.gif', IMAGE_BUTTON_IN_CART) : $stock_check ); ?></center></td></tr>
			
			<!--Add the add to bookmark  -->
			<tr><td style="vertical-align:left; height:28px;">
				<table><tr><td>
					<div align="left">
					<a rel="nofollow" style="text-decoration:none;" href="http://www.facebook.com/share.php?u=/" onClick="window.open('http://www.facebook.com/share.php?u='+encodeURIComponent(document.title)+'&amp;d=&amp;tag=&amp;u='+encodeURIComponent(location.href));return false;" title="Share this site with your facebook friends"><img src="images/addto/AddTo_Facebook.gif" rel="image_src" width="20" height="20" border="0" style="padding-bottom:1px;" /></a>
					<a rel="nofollow" style="text-decoration:none;" href="http://www.yahoo.com/" onClick="window.open('http://myweb2.search.yahoo.com/myresults/bookmarklet?t='+encodeURIComponent(document.title)+'&amp;d=&amp;ei=UTF-8&amp;u='+encodeURIComponent(location.href));return false;" title="Share this site with your yahoo friends" ><img src="images/addto/AddTo_Yahoo.gif" alt="Add to: Yahoo" name="Yahoo" width="20" height="20" border="0" id="Yahoo" style="padding-bottom:1px;"></a>
					<a rel="nofollow" style="text-decoration:none;" href="http://digg.com/" onClick="window.open('http://digg.com/submit?phase=2&amp;url='+encodeURIComponent(location.href)+'&amp;bodytext=&amp;tags=&amp;title='+encodeURIComponent(document.title));return false;" title="Add to: Digg" ><img src="images/addto/AddTo_Digg.gif" alt="Add to: Digg" name="Digg" width="20" height="20" border="0" id="Digg" style="padding-bottom:1px;"></a>
					<a rel="nofollow" style="text-decoration:none;" href="http://www.google.com/" onClick="window.open('http://www.google.com/bookmarks/mark?op=add&amp;hl=co.uk&amp;bkmk='+encodeURIComponent(location.href)+'&amp;annotation=&amp;labels=&amp;title='+encodeURIComponent(document.title));return false;" title="Add to: Google" > <img src="images/addto/AddTo_Google.gif" alt="Add to: Google" name="Google" width="20" height="20" border="0" id="Google" style="padding-bottom:1px;"></a>
					<a rel="nofollow" style="text-decoration:none;" href="http://del.icio.us/" onClick="window.open('http://del.icio.us/post?v=2&amp;url='+encodeURIComponent(location.href)+'&amp;notes=&amp;tags=&amp;title='+encodeURIComponent(document.title));return false;" title="Add to: Del.icio.us" > <img style="padding-bottom:1px;" src="images/addto/AddTo_Delicious.gif" alt="Add to: Del.icio.us" name="Delicious" border="0" id="Delicious"> </a>
					</div>
				</td></tr></table>
			</td></tr>
 
 <?php
// BOF: FWR Auctions     
$oscAuctions->productInfoNotRegisteredCustomerMessage();

$oscAuctions->product_infoShowBids($product_info);

// EOF: FWR Auctions 
 ?>
			<tr><td align="center">
			<? 	
			
			if ( $product_info['products_type'] == 30 )
			{
				$subproduttotal_price = 0;
				$subproduct_check_query = tep_db_query('select count(*) as total from products_to_subproducts where products_id="' . (int)$HTTP_GET_VARS['products_id'] . '"');
				$subproduct_check = tep_db_fetch_array($subproduct_check_query);
				if ($subproduct_check['total'] > 0) 
				{
					$prod_type_array = array();
					$subproduct_id_array = array();
					$all_subproduct_id_query = tep_db_query("select pts.subproducts_id, pts.qty, pts.sort_order from products_to_subproducts pts, products p where pts.products_id = '". (int)$HTTP_GET_VARS['products_id'] ."' and p.products_id = pts.products_id");
					while ( $all_subproduct_id = tep_db_fetch_array($all_subproduct_id_query) ) 
					{
						//echo $all_subproduct_id['subproducts_id']."<br>";
						$all_subproduct_detail_query = tep_db_query("select p.products_type, pd.products_name, pd.products_description, pd.products_specification, p.products_model, p.products_type, p.products_price, p.products_image from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_id = '" . $all_subproduct_id['subproducts_id'] . "' and pd.products_id = p.products_id and pd.language_id = '" . (int)$languages_id . "'"); 
						$all_subproduct_detail = tep_db_fetch_array($all_subproduct_detail_query);
						//echo $all_subproduct_detail['products_type']."<br>";
						if( tep_not_null($all_subproduct_detail) )
						{
							$prod_type_array[] = $all_subproduct_detail['products_type'];
							$subproduct_id_array[] = $all_subproduct_id['subproducts_id'];
							$subproduct_id_array[][] = $all_subproduct_id['qty'] . '|' . $all_subproduct_id['sort_order'];
						}
					}
        		
					$final_prod_type = array_unique( $prod_type_array );
					
					echo '<table width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" border="0">';
					echo '<tr><td align="center">'.tep_image(DIR_WS_IMAGES . 'items_included.gif', 'Items Included').'</td></tr>';
					sort($final_prod_type);
					echo '<tr><td align=center><table cellpadding="0" cellspacing="0" border="1"><tr><td><b>Products Name</b></td><td><b>Qty</b></td></tr>';
					for( $i=0; $i<count($final_prod_type); $i++)
					{
						$namebyTyep_query = tep_db_query("select * from products_type where products_type_id = '".$final_prod_type[$i]."'");
						$namebyTyep = tep_db_fetch_array($namebyTyep_query);
						
						
        		
						for( $q=0; $q<count($subproduct_id_array); $q++)
						{
							$all_subproduct_detail_images_query = tep_db_query('select images_name, sort_order from products_images where products_id ="'.$subproduct_id_array[$q].'" ORDER BY sort_order ASC');
							$all_subproduct_detail_images = tep_db_fetch_array($all_subproduct_detail_images_query);
											
							$all_subproduct_detail_query = tep_db_query("select p.products_type, pd.products_name, pd.products_description, pd.products_specification, p.products_model, p.products_type, p.products_price, p.products_image from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_id = '" . $subproduct_id_array[$q] . "' and p.products_type = '".$final_prod_type[$i]."' and pd.products_id = p.products_id and pd.language_id = '" . (int)$languages_id . "'"); 
							while ( $all_subproduct_detail = tep_db_fetch_array($all_subproduct_detail_query) ) 
							{
								if ( tep_not_null($all_subproduct_detail) )
								{						
									$abcd = explode("|", $subproduct_id_array[$q+1][0]); 
																							
									if( $abcd[1] == 1)
									{					
 										echo '<tr><td align="left">'.$all_subproduct_detail['products_name'] . " " . $currencies->display_price( $all_subproduct_detail['products_price'], tep_get_tax_rate($product_info['products_tax_class_id'])) . "</td><td width='20'> x " . $abcd[0] . '</td></tr>';
										(double)$subproduttotal_price =  (double)$subproduttotal_price + (double)$all_subproduct_detail['products_price'] * (int)$abcd[0];
									}
								}
							}
						}		
						
					}
					echo "</table>";
					echo "</table>";
						
					(double)$saveproduct_price = (double)$subproduttotal_price - (double)$product_info['products_price'];	
					if ($saveproduct_price>0 )
					{	
						echo '<b style="font-size:17px;color: #0000CC">Total Value = </b><b style="font-size:17px; color: #FF0000">' . $currencies->display_price( $subproduttotal_price, tep_get_tax_rate($product_info['products_tax_class_id'])) . '</b>, <b style="font-size:17px; color: #0000CC">Now Saving for more than</b> <b style="font-size:17px; color: #FF0000">' . $currencies->display_price( $saveproduct_price, tep_get_tax_rate($product_info['products_tax_class_id'])).'</b>';
					}
					echo '<br><br>';
				}			
			}
			?>
		<table cellpadding="0" cellspacing="0" border="0" align="center" class="prod_info" style="">
			<tr><td class="pic" align="center">			 
			<br style="line-height:1px;">			
			<?php 
			//echo tep_image(DIR_WS_IMAGES . 'RC_Expert.gif', 'Rc-Expert.com Online Shop');			
			?>			
			<script language="javascript"><!--
			document.write('<?php echo '<a href="javascript:popupWindow(\\\'' . tep_href_link(FILENAME_POPUP_IMAGE, 'pID=' . $product_info['products_id']) . '\\\')">' . tep_image(DIR_WS_IMAGES . 'productPhoto/' . $images_all[0]['images_name'], addslashes($product_info['products_name']), 500, '', ' style="margin:0px 0px 0px 0px;"') . ''; ?>');
			//--></script>
			<noscript>
			<?php echo '<a href="' . tep_href_link(DIR_WS_IMAGES . $product_info['products_image']) . '" target="_blank">' . tep_image(DIR_WS_IMAGES . $product_info['products_image'], $product_info['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT, ' style="margin:0px 0px 0px 0px;"') . ''; ?>
			</noscript>
			
			<?php /*  echo tep_draw_prod_bottom();  */
				//draw small images
			if( sizeof($images_all) > 0 )
			{
				for ($i=1,$n=sizeof($images_all); $i<$n; $i++)
				{
					
		 	?>
		 		
		 		<script language="javascript"><!--
				document.write('<?php echo '<a href="javascript:popupWindow(\\\''.tep_href_link(FILENAME_POPUP_IMAGE, 'pID=' . $product_info['products_id'].'&images_id='.$images_all[$i]['images_sort_order']).'\\\')">'.tep_image('images/productPhoto/'.$images_all[$i]['images_name'], addslashes($product_info['products_name']), 90, 90 ).'</a>' ?>');
				//--></script>
		 	<?php
		 			if($i%5==0)
					{
						echo '<br style="line-height:1px;">';
					}
				}
			}
			?>
			
						</td></tr>
						<tr><td align="center">
			<script language="javascript"><!--
			document.write('<?php echo '<div><a href="javascript:popupWindow(\\\'' . tep_href_link(FILENAME_POPUP_IMAGE, 'pID=' . $product_info['products_id']) . '\\\')">' . TEXT_CLICK_TO_ENLARGE . '</a></div>'; ?>');
			//--></script>
			<noscript>
			<?php echo '<div><a href="' . tep_href_link(DIR_WS_IMAGES . $product_info['products_image']) . '" target="_blank"><br style="line-height:1px">' . TEXT_CLICK_TO_ENLARGE . '</a></div>'; ?>
			</noscript>
			
			</td></tr>
		</table>			<!-- <center><a style="color:#0000FF; font-size:12px " href="http://ww3.rc-expert.com/" target="_blank"><u>For Combo Packages including servos / gyro , please click here</u></a></center><br> -->
			</td></tr>
		</table>														
		
																
																   </td></tr>
					 							  
															</table>
														</td>
													</tr>
												</table>
<? /*  tep_draw_heading_bottom_2();  */?>
				  <table cellspacing="0" cellpadding="0" border="0" align="center">
				   <tr><td height="5"></td></tr>
				   <tr><td height="1" class="">
<div class="padd3">
	<?php echo stripslashes($product_info['products_description']); ?><br>
	<?
	echo stripslashes($product_info['products_specification']).'<br>'; 	
	?> 
</div>		
	<? 	
	if( tep_not_null($product_info['items_included']) ) 
	{		
		echo stripslashes($product_info['items_included']);
	}
	?>
	<?php
	if ( $product_info['products_type'] == 30 )
	{
		//echo stripslashes($product_info['items_included']);
		$my_col = 0;
		$my_row = 0;
		$info_box_contents = array();
		$subproduct_check_query = tep_db_query('select count(*) as total from products_to_subproducts where products_id="' . (int)$HTTP_GET_VARS['products_id'] . '"');
		$subproduct_check = tep_db_fetch_array($subproduct_check_query);
		if ($subproduct_check['total'] > 0) 
		{
			$prod_type_array = array();
			$subproduct_id_array = array();
			$all_subproduct_id_query = tep_db_query("select pts.subproducts_id, pts.qty, pts.sort_order from products_to_subproducts pts, products p where pts.products_id = '". (int)$HTTP_GET_VARS['products_id'] ."' and p.products_id = pts.products_id");
			while ( $all_subproduct_id = tep_db_fetch_array($all_subproduct_id_query) ) 
			{
				//echo $all_subproduct_id['subproducts_id']."<br>";
				$all_subproduct_detail_query = tep_db_query("select p.products_type, pd.products_name, pd.products_description, pd.products_specification, p.products_model, p.products_type, p.products_price, p.products_image from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_id = '" . $all_subproduct_id['subproducts_id'] . "' and pd.products_id = p.products_id and pd.language_id = '" . (int)$languages_id . "'"); 
				$all_subproduct_detail = tep_db_fetch_array($all_subproduct_detail_query);
				//echo $all_subproduct_detail['products_type']."<br>";
				if( tep_not_null($all_subproduct_detail) )
				{
					$prod_type_array[] = $all_subproduct_detail['products_type'];
					$subproduct_id_array[] = $all_subproduct_id['subproducts_id'];
					$subproduct_id_array[][] = $all_subproduct_id['qty'] . '|' . $all_subproduct_id['sort_order'];
				}
			}

			$final_prod_type = array_unique( $prod_type_array );

			echo '<table width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" border="0">';
			echo '<tr><td align="center">'.tep_image(DIR_WS_IMAGES . 'package_content.gif', 'Package Content').'</td></tr>';
			sort($final_prod_type);
			for( $i=0; $i<count($final_prod_type); $i++)
			{
				$namebyTyep_query = tep_db_query("select * from products_type where products_type_id = '".$final_prod_type[$i]."'");
				$namebyTyep = tep_db_fetch_array($namebyTyep_query);
				echo "<tr><td bgcolor='#CCCCCC'>";
				if ( tep_not_null($namebyTyep) )
				{ 
					echo "<b>". $namebyTyep['type_name']."</b></td></tr><tr><td align=center>";
				}

				for( $q=0; $q<count($subproduct_id_array); $q++)
				{
					$all_subproduct_detail_images_query = tep_db_query('select images_name, sort_order from products_images where products_id ="'.$subproduct_id_array[$q].'" ORDER BY sort_order ASC');
					$all_subproduct_detail_images = tep_db_fetch_array($all_subproduct_detail_images_query);
									
					$all_subproduct_detail_query = tep_db_query("select p.products_type, pd.products_name, pd.products_description, pd.products_specification, p.products_model, p.products_type, p.products_price, p.products_image from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_id = '" . $subproduct_id_array[$q] . "' and p.products_type = '".$final_prod_type[$i]."' and pd.products_id = p.products_id and pd.language_id = '" . (int)$languages_id . "'"); 
					while ( $all_subproduct_detail = tep_db_fetch_array($all_subproduct_detail_query) ) 
					{
						if ( tep_not_null($all_subproduct_detail) )
						{						
							$abcd = explode("|", $subproduct_id_array[$q+1][0]); 
																					
							if( $abcd[1] == 1)
							{					
 								$info_box_contents[$my_row][$my_col] = array('align' => 'center',
											'params' => '',
                                           	'text' => '<table cellpadding="0" cellspacing="0" border="1" width="100" height="120"><tr><td align="center">'.$all_subproduct_detail['products_name'] . " x " . $abcd[0] . "<br>" . tep_image(DIR_WS_IMAGES . 'productPhoto/' . $all_subproduct_detail_images['images_name'], addslashes($all_subproduct_detail['products_name']), '200', '', ' style="margin:0px 0px 0px 0px;"') ."<br>" . $currencies->display_price( $all_subproduct_detail['products_price'], tep_get_tax_rate($product_info['products_tax_class_id'])) . " x " . $abcd[0] . '</td></tr></table>' );	
    							$my_col ++;
    							if ($my_col > 2) 
								{
      								$my_col = 0;
 									$my_row ++;
      							}
								$col++;								
							}							
						}
					}
				}		
				new contentBox($info_box_contents);
				$my_col = 0;
				$my_row = 0;
				$col = 0;
			    $info_box_contents = array();
				echo "</td></tr>";
			}
			echo "</table><br><br>";
			
//------------------------------------------------------------------------------------------------------------------------------------
			
		}		
	}		
	?> 	
				  </td></tr></table>	
<? tep_draw_heading_top_2();?>

<?php

// BOF: FWR Auctions
if (!$oscAuctions->productShowAuction()) {
// EOF: FWR Auctions
    $products_attributes_query = tep_db_query("select count(*) as total from " . TABLE_PRODUCTS_OPTIONS . " popt, " . TABLE_PRODUCTS_ATTRIBUTES . " patrib where patrib.products_id='" . (int)$HTTP_GET_VARS['products_id'] . "' and patrib.options_id = popt.products_options_id and popt.language_id = '" . (int)$languages_id . "'");
    $products_attributes = tep_db_fetch_array($products_attributes_query);
    if ($products_attributes['total'] > 0) {
?>
									<table cellpadding="0" cellspacing="0" class="box_width_cont product">
												<tr><td height="25" colspan="2"><strong><?php echo TEXT_PRODUCT_OPTIONS; ?></strong></td></tr>		 
<?php
      $products_options_name_query = tep_db_query("select distinct popt.products_options_id, popt.products_options_name from " . TABLE_PRODUCTS_OPTIONS . " popt, " . TABLE_PRODUCTS_ATTRIBUTES . " patrib where patrib.products_id='" . (int)$HTTP_GET_VARS['products_id'] . "' and patrib.options_id = popt.products_options_id and popt.language_id = '" . (int)$languages_id . "' order by popt.products_options_name");
      while ($products_options_name = tep_db_fetch_array($products_options_name_query)) {
        $products_options_array = array();
        $products_options_query = tep_db_query("select pov.products_options_values_id, pov.products_options_values_name, pa.options_values_price, pa.price_prefix from " . TABLE_PRODUCTS_ATTRIBUTES . " pa, " . TABLE_PRODUCTS_OPTIONS_VALUES . " pov where pa.products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "' and pa.options_id = '" . (int)$products_options_name['products_options_id'] . "' and pa.options_values_id = pov.products_options_values_id and pov.language_id = '" . (int)$languages_id . "'");
        while ($products_options = tep_db_fetch_array($products_options_query)) {
          $products_options_array[] = array('id' => $products_options['products_options_values_id'], 'text' => $products_options['products_options_values_name']);
          if ($products_options['options_values_price'] != '0') {
            $products_options_array[sizeof($products_options_array)-1]['text'] .= ' (' . $products_options['price_prefix'] . $currencies->display_price($products_options['options_values_price'], tep_get_tax_rate($product_info['products_tax_class_id'])) .') ';
          }
        }

        if (isset($cart->contents[$HTTP_GET_VARS['products_id']]['attributes'][$products_options_name['products_options_id']])) {
          $selected_attribute = $cart->contents[$HTTP_GET_VARS['products_id']]['attributes'][$products_options_name['products_options_id']];
        } else {
          $selected_attribute = false;
        }
?>
            <tr>
              <td class="main"><?php echo $products_options_name['products_options_name'] . ':'; ?></td>
              <td class="main"><?php echo tep_draw_pull_down_menu('id[' . $products_options_name['products_options_id'] . ']', $products_options_array, $selected_attribute); ?></td>
            </tr>
			<tr><td height="10" colspan="2"></td></tr>
<?php
      }
?>
          </table>
<?php
    }
    
// BOF: FWR Auctions
}
// EOF: FWR Auctions

    $reviews_query = tep_db_query("select count(*) as count from " . TABLE_REVIEWS . " where products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "'");
    $reviews = tep_db_fetch_array($reviews_query);
    if ($reviews['count'] > 0) {
?>
						<table cellpadding="0" cellspacing="0" class="product box_width_cont">
							<tr><td class="line_h"><?php echo TEXT_CURRENT_REVIEWS . ' ' . $reviews['count']; ?></td></tr>
							<tr><td height="17"></td></tr>
						</table>
<?php
    }

    if (tep_not_null($product_info['products_url'])) {
?>
						<table cellpadding="0" cellspacing="0" class="product box_width_cont">
							<tr><td class="line_h"><?php echo sprintf(TEXT_MORE_INFORMATION, tep_href_link(FILENAME_REDIRECT, 'action=url&goto=' . urlencode($product_info['products_url']), 'NONSSL', true, false)); ?></td></tr>
							<tr><td height="17"></td></tr>
						</table>
<?php
    }


    if ($product_info['products_date_available'] > date('Y-m-d H:i:s')) {
?>
						<table cellpadding="0" cellspacing="0" class="product box_width_cont">
							<tr><td class="line_h"><?php echo sprintf(TEXT_DATE_AVAILABLE, tep_date_long($product_info['products_date_available'])); ?></td></tr>
							<tr><td height="17"></td></tr>
						</table>
<?php
    } else {
?>
						<table cellpadding="0" cellspacing="0" class="product box_width_cont">
							<tr><td class="line_h"><?php //echo sprintf(TEXT_DATE_ADDED, tep_date_long($product_info['products_date_added'])); ?></td></tr>
							<tr><td height="17"></td></tr>
						</table>
<?php
    }

?>

<?php
// BOF: FWR Auctions
if(!$oscAuctions->productShowAuction()){
// EOF: FWR Auctions
?> 
		<!-- 
		<table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">
          <tr class="infoBoxContents"><td>
			 -->
			<table border="0" width="100%" cellspacing="0" cellpadding="0" class="product box_width_cont">
              <tr>
                <td class="main bg_input" align="center"><?php echo '<a href="' . tep_href_link(FILENAME_PRODUCT_REVIEWS, tep_get_all_get_params()) . '">' . tep_image_button('button_reviews.gif', IMAGE_BUTTON_REVIEWS) . '</a>'; ?><?php echo tep_draw_separator('spacer.gif', '15', '1'); ?><?php echo tep_draw_hidden_field('products_id', $product_info['products_id']) . (($product_info['products_price'] > 0 && $any_out_of_stock != 1) ? tep_image_submit('button_add_to_cart1.gif', IMAGE_BUTTON_IN_CART) :'&nbsp;'); ?></td>
              </tr>
			  <tr><td>
			  <br><br>
<?
	  echo "Browse for more products in the same category as this item:<br>";
	  echo '<b>'.$breadcrumb->trail(' &raquo; ').'</b>'; 
?>	  								
			  </td></tr>
            </table><br style="line-height:1px;"><br style="line-height:10px;">

			<!-- 
			</td></tr>
        </table>
			 -->
<?php
// BOF: FWR Auctions
}
// EOF: FWR Auctions
?>

<? tep_draw_heading_bottom_2();?>

<? tep_draw_heading_bottom_1(); ?>

<?php tep_draw_heading_bottom();?>	

<?php
    if ((USE_CACHE == 'true') && empty($SID)) {
      echo tep_cache_also_purchased(3600);
    } else {
      include(DIR_WS_MODULES . FILENAME_ALSO_PURCHASED_PRODUCTS);
    }
  }
?>
        </td>
      </tr>
    </table>
<?php 
// BOF: FWR Auctions
if (!$oscAuctions->productShowAuction()) {
?>		
	</form>
<?php
}
// EOF: FWR Auctions
?>  	
	</td>
<!-- body_text_eof //-->
    <td class="col_right">
<!-- right_navigation //-->
<?php require(DIR_WS_INCLUDES . 'column_right.php'); ?>
<!-- right_navigation_eof //-->
    </td>
  </tr>
</table>
<!-- body_eof //-->

<!-- footer //-->
<?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
<!-- footer_eof //--></body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>
