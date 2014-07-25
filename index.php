<?php

/*

  $Id: index.php,v 1.1 2003/06/11 17:37:59 hpdl Exp $



  osCommerce, Open Source E-Commerce Solutions

  http://www.oscommerce.com



  Copyright (c) 2003 osCommerce



  Released under the GNU General Public License

*/



  require('includes/application_top.php');

// BOF Separate Pricing Per Customer

  if (isset($_SESSION['sppc_customer_group_id']) && $_SESSION['sppc_customer_group_id'] != '0') {

  $customer_group_id = $_SESSION['sppc_customer_group_id'];

  } else {

   $customer_group_id = '0';

  }

// EOF Separate Pricing Per Customer



// the following cPath references come from application_top.php

  $category_depth = 'top';

  if (isset($cPath) && tep_not_null($cPath)) {

    $categories_products_query = tep_db_query("select count(*) as total from " . TABLE_PRODUCTS_TO_CATEGORIES . " where categories_id = '" . (int)$current_category_id . "'");

    $cateqories_products = tep_db_fetch_array($categories_products_query);

    $category_parent_query = tep_db_query("select count(*) as total from " . TABLE_CATEGORIES . " where parent_id = '" . (int)$current_category_id . "'");

    $category_parent = tep_db_fetch_array($category_parent_query);



	if ( $cateqories_products['total'] > 0 && $category_parent['total'] > 0 )

	{

		$category_depth = 'multiple';

	}

	elseif ( $cateqories_products['total'] == 0 && $category_parent['total'] > 0 )

	{

		$category_depth = 'nested';

	}

	elseif ( $cateqories_products['total'] > 0 && $category_parent['total'] == 0 )

	{

		$category_depth = 'products';

	}

	elseif ( $cateqories_products['total'] == 0 && $category_parent['total'] == 0 )

	{

		$category_depth = 'products';

	}

	

    /*    

    if ($cateqories_products['total'] > 0) {

      $category_depth = 'products'; // display products

    } else {

      $category_parent_query = tep_db_query("select count(*) as total from " . TABLE_CATEGORIES . " where parent_id = '" . (int)$current_category_id . "'");

      $category_parent = tep_db_fetch_array($category_parent_query);

      if ($category_parent['total'] > 0) {

        $category_depth = 'nested'; // navigate through the categories

      } else {

        $category_depth = 'products'; // category has no products, but display the 'no products' message

      }

    }

    */

  }



  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_DEFAULT);

?>

<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">

<html <?php echo HTML_PARAMS; ?>>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">

<? 

if( $category_depth == 'top' ){

?>

<title>Auto-sport Colloction online website</title>

<meta name="Keywords" content="Autosport collection,f1 diecast model cars,F1 Racing Decals,Racing Team Cap,f1 figure set">

<meta name="Description" content="Autosportcollection.net is your online store where you can find f1 diecast model cars,F1 Racing Decals,Racing Team Cap,f1 figure set racing souvenir T-shirt and so on. It's design for all the racing model car hobbiers. Our shop shows all kinds of racing souvenir.">

<?

}else{



switch ($cPath) {

    case "5_27":

?>	

<title>Autosportcollection.net: F1 Mclaren Diecast Model Car</title>

<meta name="Keywords" content="1/18 Minichamps,Mclaren MP4,Mclaren MP4/4,Mclaren MP4/5B,Mclaren MP4/6,F1 Champion Ayrton Senna,Diecast Model Car">

<meta name="Description" content="Autosport collection Shop sales decals, display case, F1 cap, figure,model car,racing souvenir T-shirt. It's design for all the racing model car hobbiers,1/18 Minichamps,Mclaren MP4/4,F1 Champion Ayrton Senna,Diecast Model Car">

<?

        break;

    case "52":

?>	

<title>F1 RC Bodies-1/10 scale RC Bodies-Tamiya f103:Autosportcollection.net</title>

<meta name="Keywords" content="F1 RC Bodies,1/10 scale rc bodies,tamiya f103,tamiya f104">

<meta name="Description" content="1/10 2011 F1 Mclaren MP4-26 RC Body for Tamiya F104,1/10 2011 F1 Red Bull RB7 RC Body for Tamiya F104 Car, 1991 F1 Mclaren Mp4-6 Ayrton Senna World Champion RC Body, 1/10 1986 1987 F1 Senna JPS Lotus Renault 97T 98T RC Body for Tamiya F103 F104W">

<?

        break;

    default:

?>

<title>online website for auto-sport colloction</title>

<meta name="Keywords" content="Online store|online shop|decals|display case|F1|cap|figure|Figurine|Diecast Model|Pit set|Scale model| F1|tamiyaf104 RC Body|Scale f1 RC body|2011 F1 RC Body|F103 RC body|F1 rc body|1/10|1:10|1987|2011|1978|Lotus Honda 99T|F1 Mclaren MP4-26|F104 Hamilton|F1 Red Bull RB7|Ferrari F150|F1 World Champ-Lotus 79T|MGP W02|Electroplated|model car|racing car|racing souvenir|T-shirt|car hobbiers|F1 racing car| Marlboro|Camel|Ferrari|Honda|Kawasaki|LuchyStrike|Martini|Mobil|Nissan|Shell|Toyota|Trans Formers|Vodafone|Mild Seven|1/18|1/12|1/24|1/20|1/43|2011 Ferrari Team|2011 McLaren|2011 red bull|2011 Mercedes Benz|2011 Renualt|Ayrton Senna|Michael Schumacher|2010 Ferrari|2010 Red Bull|2010 Mclaren|Michael Schumacher|Ayrton Senna|birthday gifts|Souvenirs|">

<meta name="Description" content="Online store|online shop|decals|display case|F1|cap|figure|Figurine|Diecast Model|Pit set|Scale model| F1|tamiyaf104 RC Body|Scale f1 RC body|2011 F1 RC Body|F103 RC body|F1 rc body|1/10|1:10|1987|2011|1978|Lotus Honda 99T|F1 Mclaren MP4-26|F104 Hamilton|F1 Red Bull RB7|Ferrari F150|F1 World Champ-Lotus 79T|MGP W02|Electroplated|model car|racing car|racing souvenir|T-shirt|car hobbiers|F1 racing car| Marlboro|Camel|Ferrari|Honda|Kawasaki|LuchyStrike|Martini|Mobil|Nissan|Shell|Toyota|Trans Formers|Vodafone|Mild Seven|1/18|1/12|1/24|1/20|1/43|2011 Ferrari Team|2011 McLaren|2011 red bull|2011 Mercedes Benz|2011 Renualt|Ayrton Senna|Michael Schumacher|2010 Ferrari|2010 Red Bull|2010 Mclaren|Michael Schumacher|Ayrton Senna|birthday gifts|Souvenirs|">

<?		

}



}

?>

<base href="<?php echo (($request_type == 'SSL') ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG; ?>">

<link rel="stylesheet" type="text/css" href="stylesheet.css">

<? if ($category_depth == 'top'): ?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js"></script>

<? endif;?>





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

<body style="margin-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px;">

<!-- header //-->

<?php require(DIR_WS_INCLUDES . 'header.php'); ?>

<!-- header_eof //-->



<!-- body //-->

<table style="width:1000px" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td valign="top" class="col_left">

<!-- left_navigation //-->

<?php //require(DIR_WS_INCLUDES . 'column_left.php'); ?>

<!-- left_navigation_eof //-->

    </td>

<!-- body_text //-->

<?php

  if ($category_depth == 'nested') {

    $category_query = tep_db_query("select cd.categories_name, c.categories_image from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.categories_id = '" . (int)$current_category_id . "' and cd.categories_id = '" . (int)$current_category_id . "' and cd.language_id = '" . (int)$languages_id . "'");

    $category = tep_db_fetch_array($category_query);

?>

    <td class="col_center">

    		

<?php echo tep_draw_title_top();?>



				<?php echo $breadcrumb->trail(' &raquo; ')?>



<?php echo tep_draw_title_bottom();?>	

								

<? tep_draw_heading_top_3();?>



		

					<table border="0" cellspacing="0" cellpadding="0" align="center" class="box_width_cont product">

						<tr>

<?php

	if (isset($cPath) && strpos('_', $cPath)) {

// check to see if there are deeper categories within the current category

	  $category_links = array_reverse($cPath_array);

	  for($i=0, $n=sizeof($category_links); $i<$n; $i++) {

		$categories_query = tep_db_query("select count(*) as total from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.parent_id = '" . (int)$category_links[$i] . "' and c.categories_id = cd.categories_id and c.is_hide=0 and cd.language_id = '" . (int)$languages_id . "'");

		$categories = tep_db_fetch_array($categories_query);

		if ($categories['total'] < 1) {

		  // do nothing, go through the loop

		} else {

		  $categories_query = tep_db_query("select c.categories_id, cd.categories_name, c.categories_image, c.parent_id from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.parent_id = '" . (int)$category_links[$i] . "' and c.categories_id = cd.categories_id and c.is_hide=0 and cd.language_id = '" . (int)$languages_id . "' order by sort_order, cd.categories_name");

		  break; // we've found the deepest category the customer is in

		}

	  }

	} else {

	  $categories_query = tep_db_query("select c.categories_id, cd.categories_name, c.categories_image, c.parent_id from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.parent_id = '" . (int)$current_category_id . "' and c.categories_id = cd.categories_id and c.is_hide=0 and cd.language_id = '" . (int)$languages_id . "' order by sort_order, cd.categories_name");

	}



	$number_of_categories = tep_db_num_rows($categories_query);



	$rows = 0;

	while ($categories = tep_db_fetch_array($categories_query)) {

	  $rows++;

	  $cPath_new = tep_get_path($categories['categories_id']);

	  $width = (int)(100 / MAX_DISPLAY_CATEGORIES_PER_ROW) . '%';

	  echo '               

	  

		<td width="' . $width . '">'.tep_draw_prod_top().'

			<table cellpadding="0" cellspacing="0" border="0"  style="height:127px">

				<tr><td style="height:26px"><a href="' . tep_href_link(FILENAME_DEFAULT, $cPath_new) . '">' . $categories['categories_name'] . '</a></td></tr>

				<tr>

					<td align="center">'.tep_draw_prod_top_1().'<a href="' . tep_href_link(FILENAME_DEFAULT, $cPath_new) . '">' . tep_image(DIR_WS_IMAGES . $categories['categories_image'], $categories['categories_name'], SUBCATEGORY_IMAGE_WIDTH, SUBCATEGORY_IMAGE_HEIGHT) . '</a>'.tep_draw_prod_bottom_1().'

						</td>

				</tr>

			</table>'.tep_draw_prod_bottom().'

		</td>

	  ' . "\n";

				  if ($col!=(MAX_DISPLAY_CATEGORIES_PER_ROW-1)){

				  echo '

						<td>'.tep_draw_separator('spacer.gif', '2', '1').'</td>					

						';

				  }

				 else{	

				 		      

	  if ((($rows / MAX_DISPLAY_CATEGORIES_PER_ROW) == floor($rows / MAX_DISPLAY_CATEGORIES_PER_ROW)) && ($rows != $number_of_categories)) {

		echo '              

	</tr><tr><td colspan="'.(MAX_DISPLAY_CATEGORIES_PER_ROW + MAX_DISPLAY_CATEGORIES_PER_ROW -1).'">'.tep_draw_separator('spacer.gif', '1', '10').'</td></tr>' . "\n";

		echo '              <tr>' . "\n";

	  }

	}

	if ($col==MAX_DISPLAY_CATEGORIES_PER_ROW-1){

	$col=0;

	}else{

	$col++;

	}

}	



// needed for the new products module shown below

	$new_products_category_id = $current_category_id;

?>

					

					

				</table>

				<table cellpadding="0" cellspacing="0" border="0"><tr><td height="10"></td></tr></table>

				

<?  tep_draw_heading_bottom_3();?>

				

<?  tep_draw_heading_bottom();  ?>



<?php /*  tep_draw_separate();  */ ?>  <!--  /////////  -->



<?   tep_draw_heading_top();  ?>



<?

  if ( (!isset($new_products_category_id)) || ($new_products_category_id == '0') ) {

    $new_products_query = tep_db_query("select count(*) as total from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id where products_status = '1' order by p.products_date_added desc limit " . MAX_DISPLAY_NEW_PRODUCTS);

  } else {

    $new_products_query = tep_db_query("select count(*) as total from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c, " . TABLE_CATEGORIES . " c where p.products_id = p2c.products_id and p2c.categories_id = c.categories_id and c.parent_id = '" . (int)$new_products_category_id . "' and p.products_status = '1' order by p.products_date_added desc limit " . MAX_DISPLAY_NEW_PRODUCTS);

  }

  $new_products = tep_db_fetch_array($new_products_query);

  if ( $new_products['total'] > 0 )

  {

?>



<? new contentBoxHeading_WHATS_NEW($info_box_contents, true, false);?>

			

<? tep_draw_heading_top_3();?>			

			

			<?php include(DIR_WS_MODULES . FILENAME_NEW_PRODUCTS); ?></td>

			

<? 



   tep_draw_heading_bottom_3();      

   }

   

	//echo '<center>' . tep_display_banner('static', tep_banner_exists('dynamic', 'gp700')) . '</center>';   

?>

<? tep_draw_heading_bottom();?>		

		

	</td>

<?php

  } elseif ($category_depth == 'products' || isset($HTTP_GET_VARS['manufacturers_id'])) {

// create column list

    $define_list = array('PRODUCT_LIST_MODEL' => PRODUCT_LIST_MODEL,

                         'PRODUCT_LIST_NAME' => PRODUCT_LIST_NAME,

                         'PRODUCT_LIST_MANUFACTURER' => PRODUCT_LIST_MANUFACTURER,

                         'PRODUCT_LIST_PRICE' => PRODUCT_LIST_PRICE,

                         'PRODUCT_LIST_QUANTITY' => PRODUCT_LIST_QUANTITY,

                         'PRODUCT_LIST_WEIGHT' => PRODUCT_LIST_WEIGHT,

                         'PRODUCT_LIST_IMAGE' => PRODUCT_LIST_IMAGE,

                         'PRODUCT_LIST_BUY_NOW' => PRODUCT_LIST_BUY_NOW);



    asort($define_list);



    $column_list = array();

    reset($define_list);

    while (list($key, $value) = each($define_list)) {

      if ($value > 0) $column_list[] = $key;

    }



// BOF Separate Pricing Per Customer

// this will build the table with specials prices for the retail group or update it if needed

// this function should have been added to includes/functions/database.php

   if ($customer_group_id == '0') {

   tep_db_check_age_specials_retail_table();

   }

   $status_product_prices_table = false;

   $status_need_to_get_prices = false;



   // find out if sorting by price has been requested

   if ( (isset($HTTP_GET_VARS['sort'])) && (ereg('[1-8][ad]', $HTTP_GET_VARS['sort'])) && (substr($HTTP_GET_VARS['sort'], 0, 1) <= sizeof($column_list)) && $customer_group_id != '0' ){

    $_sort_col = substr($HTTP_GET_VARS['sort'], 0 , 1);

    if ($column_list[$_sort_col-1] == 'PRODUCT_LIST_PRICE') {

      $status_need_to_get_prices = true;

      }

   }



   if ($status_need_to_get_prices == true && $customer_group_id != '0') {

   $product_prices_table = TABLE_PRODUCTS_GROUP_PRICES.$customer_group_id;

   // the table with product prices for a particular customer group is re-built only a number of times per hour

   // (setting in /includes/database_tables.php called MAXIMUM_DELAY_UPDATE_PG_PRICES_TABLE, in minutes)

   // to trigger the update the next function is called (new function that should have been

   // added to includes/functions/database.php)

   tep_db_check_age_products_group_prices_cg_table($customer_group_id);

   $status_product_prices_table = true;



   } // end if ($status_need_to_get_prices == true && $customer_group_id != '0')

// EOF Separate Pricing Per Customer



    $select_column_list = '';



    for ($i=0, $n=sizeof($column_list); $i<$n; $i++) {

      switch ($column_list[$i]) {

        case 'PRODUCT_LIST_MODEL':

          $select_column_list .= 'p.products_model, ';

          break;

        case 'PRODUCT_LIST_NAME':

          $select_column_list .= 'pd.products_name, ';

          break;

        case 'PRODUCT_LIST_MANUFACTURER':

          $select_column_list .= 'm.manufacturers_name, ';

          break;

        case 'PRODUCT_LIST_QUANTITY':

          $select_column_list .= 'p.products_quantity, ';

          break;

        case 'PRODUCT_LIST_IMAGE':

          $select_column_list .= 'p.products_image, ';

          break;

        case 'PRODUCT_LIST_WEIGHT':

          $select_column_list .= 'p.products_weight, ';

          break;

      }

    }



// show the products of a specified manufacturer

    if (isset($HTTP_GET_VARS['manufacturers_id'])) {

      if (isset($HTTP_GET_VARS['filter_id']) && tep_not_null($HTTP_GET_VARS['filter_id'])) {

// We are asked to show only a specific category



// BOF Separate Pricing Per Customer

	  if ($status_product_prices_table == true) { // ok in mysql 5

		$listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, tmp_pp.products_price, p.products_tax_class_id, IF(tmp_pp.status, tmp_pp.specials_new_products_price, NULL) as specials_new_products_price, IF(tmp_pp.status, tmp_pp.specials_new_products_price, tmp_pp.products_price) as final_price from " . TABLE_PRODUCTS . " p left join " . $product_prices_table . " as tmp_pp using(products_id), " . TABLE_PRODUCTS_DESCRIPTION . " pd , " . TABLE_MANUFACTURERS . " m, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c where p.products_status = '1' and p.manufacturers_id = m.manufacturers_id and m.manufacturers_id = '" . (int)$HTTP_GET_VARS['manufacturers_id'] . "' and p.products_id = p2c.products_id and pd.products_id = p2c.products_id and pd.language_id = '" . (int)$languages_id . "' and p2c.categories_id = '" . (int)$HTTP_GET_VARS['filter_id'] . "'";		

	  } else { // either retail or no need to get correct special prices -- changed for mysql 5

		$listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, p.products_price, p.products_tax_class_id, IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status, s.specials_new_products_price, p.products_price) as final_price from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS_RETAIL_PRICES . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_MANUFACTURERS . " m, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c where p.products_status = '1' and p.manufacturers_id = m.manufacturers_id and m.manufacturers_id = '" . (int)$HTTP_GET_VARS['manufacturers_id'] . "' and p.products_id = p2c.products_id and pd.products_id = p2c.products_id and pd.language_id = '" . (int)$languages_id . "' and p2c.categories_id = '" . (int)$HTTP_GET_VARS['filter_id'] . "'";

	  } // end else { // either retail...

// EOF Separate Pricing Per Customer

        //$listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, p.products_price, p.products_tax_class_id, IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status, s.specials_new_products_price, p.products_price) as final_price from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_MANUFACTURERS . " m, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c where p.products_status = '1' and p.manufacturers_id = m.manufacturers_id and m.manufacturers_id = '" . (int)$HTTP_GET_VARS['manufacturers_id'] . "' and p.products_id = p2c.products_id and pd.products_id = p2c.products_id and pd.language_id = '" . (int)$languages_id . "' and p2c.categories_id = '" . (int)$HTTP_GET_VARS['filter_id'] . "'";

      } else {

// We show them all

// BOF Separate Pricing Per Customer

        if ($status_product_prices_table == true) { // ok in mysql 5

        $listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, tmp_pp.products_price, p.products_tax_class_id, IF(tmp_pp.status, tmp_pp.specials_new_products_price, NULL) as specials_new_products_price, IF(tmp_pp.status, tmp_pp.specials_new_products_price, tmp_pp.products_price) as final_price from " . TABLE_PRODUCTS . " p left join " . $product_prices_table . " as tmp_pp using(products_id), " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_MANUFACTURERS . " m where p.products_status = '1' and pd.products_id = p.products_id and pd.language_id = '" . (int)$languages_id . "' and p.manufacturers_id = m.manufacturers_id and m.manufacturers_id = '" . (int)$HTTP_GET_VARS['manufacturers_id'] . "'";	

	} else { // either retail or no need to get correct special prices -- changed for mysql 5

        $listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, p.products_price, p.products_tax_class_id, IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status, s.specials_new_products_price, p.products_price) as final_price from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS_RETAIL_PRICES . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_MANUFACTURERS . " m where p.products_status = '1' and pd.products_id = p.products_id and pd.language_id = '" . (int)$languages_id . "' and p.manufacturers_id = m.manufacturers_id and m.manufacturers_id = '" . (int)$HTTP_GET_VARS['manufacturers_id'] . "'";

	} // end else { // either retail...

// EOF Separate Pricing Per Customer

        //$listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, p.products_price, p.products_tax_class_id, IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status, s.specials_new_products_price, p.products_price) as final_price from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_MANUFACTURERS . " m where p.products_status = '1' and pd.products_id = p.products_id and pd.language_id = '" . (int)$languages_id . "' and p.manufacturers_id = m.manufacturers_id and m.manufacturers_id = '" . (int)$HTTP_GET_VARS['manufacturers_id'] . "'";

      }

    } else {

// show the products in a given categorie

      if (isset($HTTP_GET_VARS['filter_id']) && tep_not_null($HTTP_GET_VARS['filter_id'])) {

// We are asked to show only specific catgeory

// BOF Separate Pricing Per Customer

        if ($status_product_prices_table == true) { // ok for mysql 5

        $listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, tmp_pp.products_price, p.products_tax_class_id, IF(tmp_pp.status, tmp_pp.specials_new_products_price, NULL) as specials_new_products_price, IF(tmp_pp.status, tmp_pp.specials_new_products_price, tmp_pp.products_price) as final_price from " . TABLE_PRODUCTS . " p left join " . $product_prices_table . " as tmp_pp using(products_id), " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_MANUFACTURERS . " m, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c where p.products_status = '1' and p.manufacturers_id = m.manufacturers_id and m.manufacturers_id = '" . (int)$HTTP_GET_VARS['filter_id'] . "' and p.products_id = p2c.products_id and pd.products_id = p2c.products_id and pd.language_id = '" . (int)$languages_id . "' and p2c.categories_id = '" . (int)$current_category_id . "'";	

        } else { // either retail or no need to get correct special prices -- ok in mysql 5

        $listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, p.products_price, p.products_tax_class_id, IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status, s.specials_new_products_price, p.products_price) as final_price from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_MANUFACTURERS . " m, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c left join " . TABLE_SPECIALS_RETAIL_PRICES . " s using(products_id) where p.products_status = '1' and p.manufacturers_id = m.manufacturers_id and m.manufacturers_id = '" . (int)$HTTP_GET_VARS['filter_id'] . "' and p.products_id = p2c.products_id and pd.products_id = p2c.products_id and pd.language_id = '" . (int)$languages_id . "' and p2c.categories_id = '" . (int)$current_category_id . "'";

        } // end else { // either retail...

// EOF Separate Pricing Per Customer

        //$listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, p.products_price, p.products_tax_class_id, IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status, s.specials_new_products_price, p.products_price) as final_price from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_MANUFACTURERS . " m, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c where p.products_status = '1' and p.manufacturers_id = m.manufacturers_id and m.manufacturers_id = '" . (int)$HTTP_GET_VARS['filter_id'] . "' and p.products_id = p2c.products_id and pd.products_id = p2c.products_id and pd.language_id = '" . (int)$languages_id . "' and p2c.categories_id = '" . (int)$current_category_id . "'";

      } else {

// We show them all

// BOF Separate Pricing Per Customer --last query changed for mysql 5 compatibility

        if ($status_product_prices_table == true) {

	// original, no need to change for mysql 5

	$listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, tmp_pp.products_price, p.products_tax_class_id, IF(tmp_pp.status, tmp_pp.specials_new_products_price, NULL) as specials_new_products_price, IF(tmp_pp.status, tmp_pp.specials_new_products_price, tmp_pp.products_price) as final_price from " . TABLE_PRODUCTS_DESCRIPTION . " pd left join " . $product_prices_table . " as tmp_pp using(products_id), " . TABLE_PRODUCTS . " p left join " . TABLE_MANUFACTURERS . " m on p.manufacturers_id = m.manufacturers_id, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c where p.products_status = '1' and p.products_id = p2c.products_id and p.products_type != 30 and pd.products_id = p2c.products_id and pd.language_id = '" . (int)$languages_id . "' and p2c.categories_id = '" . (int)$current_category_id . "'";

        } else { // either retail or no need to get correct special prices -- changed for mysql 5

        //$listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, p.products_price, p.products_tax_class_id, IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status, s.specials_new_products_price, p.products_price) as final_price from " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_PRODUCTS . " p left join " . TABLE_MANUFACTURERS . " m on p.manufacturers_id = m.manufacturers_id left join " . TABLE_SPECIALS_RETAIL_PRICES . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c where p.products_status = '1' and p.products_id = p2c.products_id and pd.products_id = p2c.products_id and pd.language_id = '" . (int)$languages_id . "' and p2c.categories_id = '" . (int)$current_category_id . "'"; 

		$listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, p.products_price, p.products_tax_class_id, IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status, s.specials_new_products_price, p.products_price) as final_price from " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_PRODUCTS . " p left join " . TABLE_MANUFACTURERS . " m on p.manufacturers_id = m.manufacturers_id left join " . TABLE_SPECIALS_RETAIL_PRICES . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c where p.products_status = '1' and p.products_id = p2c.products_id and pd.products_id = p2c.products_id and p.products_type != 30 and pd.language_id = '" . (int)$languages_id . "' and p2c.categories_id = '" . (int)$current_category_id . "'"; 

      } // end else { // either retail...

// EOF Separate Pricing per Customer

        //$listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, p.products_price, p.products_tax_class_id, IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status, s.specials_new_products_price, p.products_price) as final_price from " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_PRODUCTS . " p left join " . TABLE_MANUFACTURERS . " m on p.manufacturers_id = m.manufacturers_id left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c where p.products_status = '1' and p.products_id = p2c.products_id and pd.products_id = p2c.products_id and pd.language_id = '" . (int)$languages_id . "' and p2c.categories_id = '" . (int)$current_category_id . "'";

      }

    }



    if ( (!isset($HTTP_GET_VARS['sort'])) || (!ereg('^[1-8][ad]$', $HTTP_GET_VARS['sort'])) || (substr($HTTP_GET_VARS['sort'], 0, 1) > sizeof($column_list)) ) {

      for ($i=0, $n=sizeof($column_list); $i<$n; $i++) {

        if ($column_list[$i] == 'PRODUCT_LIST_NAME') {

          $HTTP_GET_VARS['sort'] = $i+1 . 'a';

          $listing_sql .= " order by pd.products_name";

          break;

        }

      }

    } else {

      $sort_col = substr($HTTP_GET_VARS['sort'], 0 , 1);

      $sort_order = substr($HTTP_GET_VARS['sort'], 1);



      switch ($column_list[$sort_col-1]) {

        case 'PRODUCT_LIST_MODEL':

          $listing_sql .= " order by p.products_model " . ($sort_order == 'd' ? 'desc' : '') . ", pd.products_name";

          break;

        case 'PRODUCT_LIST_NAME':

          $listing_sql .= " order by pd.products_name " . ($sort_order == 'd' ? 'desc' : '');

          break;

        case 'PRODUCT_LIST_MANUFACTURER':

          $listing_sql .= " order by m.manufacturers_name " . ($sort_order == 'd' ? 'desc' : '') . ", pd.products_name";

          break;

        case 'PRODUCT_LIST_QUANTITY':

          $listing_sql .= " order by p.products_quantity " . ($sort_order == 'd' ? 'desc' : '') . ", pd.products_name";

          break;

        case 'PRODUCT_LIST_IMAGE':

          $listing_sql .= " order by pd.products_name";

          break;

        case 'PRODUCT_LIST_WEIGHT':

          $listing_sql .= " order by p.products_weight " . ($sort_order == 'd' ? 'desc' : '') . ", pd.products_name";

          break;

        case 'PRODUCT_LIST_PRICE':

          $listing_sql .= " order by final_price " . ($sort_order == 'd' ? 'desc' : '') . ", pd.products_name";

          break;

      }

    }

?>

    <td class="col_center">



<? tep_draw_heading_top();?>									

<?php

// optional Product List Filter

/*      if (PRODUCT_LIST_FILTER > 0) {

      if (isset($HTTP_GET_VARS['manufacturers_id'])) {

        $filterlist_sql = "select distinct c.categories_id as id, cd.categories_name as name from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c, " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where p.products_status = '1' and p.products_id = p2c.products_id and p2c.categories_id = c.categories_id and p2c.categories_id = cd.categories_id and cd.language_id = '" . (int)$languages_id . "' and p.manufacturers_id = '" . (int)$HTTP_GET_VARS['manufacturers_id'] . "' order by cd.categories_name";

      } else {

        $filterlist_sql= "select distinct m.manufacturers_id as id, m.manufacturers_name as name from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c, " . TABLE_MANUFACTURERS . " m where p.products_status = '1' and p.manufacturers_id = m.manufacturers_id and p.products_id = p2c.products_id and p2c.categories_id = '" . (int)$current_category_id . "' order by m.manufacturers_name";

      }

      $filterlist_query = tep_db_query($filterlist_sql);

      if (tep_db_num_rows($filterlist_query) > 1) {

        echo '            <td align="center" class="main">' . tep_draw_form('filter', FILENAME_DEFAULT, 'get') . TEXT_SHOW . '&nbsp;';

        if (isset($HTTP_GET_VARS['manufacturers_id'])) {

          echo tep_draw_hidden_field('manufacturers_id', $HTTP_GET_VARS['manufacturers_id']);

          $options = array(array('id' => '', 'text' => TEXT_ALL_CATEGORIES));

        } else {

          echo tep_draw_hidden_field('cPath', $cPath);

          $options = array(array('id' => '', 'text' => TEXT_ALL_MANUFACTURERS));

        }

        echo tep_draw_hidden_field('sort', $HTTP_GET_VARS['sort']);

        while ($filterlist = tep_db_fetch_array($filterlist_query)) {

          $options[] = array('id' => $filterlist['id'], 'text' => $filterlist['name']);

        }

        echo tep_draw_pull_down_menu('filter_id', $options, (isset($HTTP_GET_VARS['filter_id']) ? $HTTP_GET_VARS['filter_id'] : ''), 'onchange="this.form.submit()"');

        echo tep_hide_session_id() . '</form></td>' . "\n";

      }

    }

  */

// Get the right image for the top-right

    $image = DIR_WS_IMAGES . 'table_background_list.gif';

    if (isset($HTTP_GET_VARS['manufacturers_id'])) {

      $image = tep_db_query("select manufacturers_image from " . TABLE_MANUFACTURERS . " where manufacturers_id = '" . (int)$HTTP_GET_VARS['manufacturers_id'] . "'");

      $image = tep_db_fetch_array($image);

      $image = $image['manufacturers_image'];

    } elseif ($current_category_id) {

      $image = tep_db_query("select categories_image from " . TABLE_CATEGORIES . " where categories_id = '" . (int)$current_category_id . "'");

      $image = tep_db_fetch_array($image);

      $image = $image['categories_image'];

    }

?>

      <?php include(DIR_WS_MODULES . FILENAME_PRODUCT_LISTING); ?>

	  

	  <?php include(DIR_WS_MODULES . 'product_list_pack.php'); ?>

		

<? tep_draw_heading_bottom_3();?>



<? tep_draw_heading_bottom();?>		

		<?php 

		//echo '<br><center>' . tep_display_banner('static', tep_banner_exists('dynamic', 'gp700')) . '</center>';   

		?>

	  </td>

<?php

  } 

  elseif ($category_depth == 'multiple') {

    $category_query = tep_db_query("select cd.categories_name, c.categories_image from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.categories_id = '" . (int)$current_category_id . "' and cd.categories_id = '" . (int)$current_category_id . "' and cd.language_id = '" . (int)$languages_id . "'");

    $category = tep_db_fetch_array($category_query);

?>

    <td class="col_center">

	

	

<?php echo tep_draw_title_top();?>



				<?php echo $breadcrumb->trail(' &raquo; ')?>

			

<?php echo tep_draw_title_bottom();?>	

								

<? tep_draw_heading_top_3();?>



					<table border="0" cellspacing="0" cellpadding="0" align="center" class="box_width_cont product">

						<tr>

<?php

	if (isset($cPath) && strpos('_', $cPath)) {

// check to see if there are deeper categories within the current category

	  $category_links = array_reverse($cPath_array);

	  for($i=0, $n=sizeof($category_links); $i<$n; $i++) {

		$categories_query = tep_db_query("select count(*) as total from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.parent_id = '" . (int)$category_links[$i] . "' and c.categories_id = cd.categories_id and cd.language_id = '" . (int)$languages_id . "'");

		$categories = tep_db_fetch_array($categories_query);

		if ($categories['total'] < 1) {

		  // do nothing, go through the loop

		} else {

		  $categories_query = tep_db_query("select c.categories_id, cd.categories_name, c.categories_image, c.parent_id from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.parent_id = '" . (int)$category_links[$i] . "' and c.categories_id = cd.categories_id and cd.language_id = '" . (int)$languages_id . "' order by sort_order, cd.categories_name");

		  break; // we've found the deepest category the customer is in

		}

	  }

	} else {

	  $categories_query = tep_db_query("select c.categories_id, cd.categories_name, c.categories_image, c.parent_id from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.parent_id = '" . (int)$current_category_id . "' and c.categories_id = cd.categories_id and cd.language_id = '" . (int)$languages_id . "' order by sort_order, cd.categories_name");

	}



	$number_of_categories = tep_db_num_rows($categories_query);



	$rows = 0;

	while ($categories = tep_db_fetch_array($categories_query)) {

	  $rows++;

	  $cPath_new = tep_get_path($categories['categories_id']);

	  $width = (int)(100 / MAX_DISPLAY_CATEGORIES_PER_ROW) . '%';

	  echo '               

	  

		<td width="' . $width . '">'.tep_draw_prod_top().'

			<table cellpadding="0" cellspacing="0" border="0"  style="height:127px">

				<tr><td style="height:26px"><a href="' . tep_href_link(FILENAME_DEFAULT, $cPath_new) . '">' . $categories['categories_name'] . '</a></td></tr>

				<tr>

					<td align="center">'.tep_draw_prod_top_1().'<a href="' . tep_href_link(FILENAME_DEFAULT, $cPath_new) . '">' . tep_image(DIR_WS_IMAGES . $categories['categories_image'], $categories['categories_name'], SUBCATEGORY_IMAGE_WIDTH, SUBCATEGORY_IMAGE_HEIGHT) . '</a>'.tep_draw_prod_bottom_1().'

						</td>

				</tr>

			</table>'.tep_draw_prod_bottom().'

		</td>

	  ' . "\n";

				  if ($col!=(MAX_DISPLAY_CATEGORIES_PER_ROW-1)){

				  echo '

						<td>'.tep_draw_separator('spacer.gif', '2', '1').'</td>					

						';

				  }

				 else{	

				 		      

	  if ((($rows / MAX_DISPLAY_CATEGORIES_PER_ROW) == floor($rows / MAX_DISPLAY_CATEGORIES_PER_ROW)) && ($rows != $number_of_categories)) {

		echo '              

	</tr><tr><td colspan="'.(MAX_DISPLAY_CATEGORIES_PER_ROW + MAX_DISPLAY_CATEGORIES_PER_ROW -1).'">'.tep_draw_separator('spacer.gif', '1', '10').'</td></tr>' . "\n";

		echo '              <tr>' . "\n";

	  }

	}

	if ($col==MAX_DISPLAY_CATEGORIES_PER_ROW-1){

	$col=0;

	}else{

	$col++;

	}

}	



// needed for the new products module shown below

	$new_products_category_id = $current_category_id;

?>

					

					

				</table>

				<br>



<?

// create column list

    $define_list = array('PRODUCT_LIST_MODEL' => PRODUCT_LIST_MODEL,

                         'PRODUCT_LIST_NAME' => PRODUCT_LIST_NAME,

                         'PRODUCT_LIST_MANUFACTURER' => PRODUCT_LIST_MANUFACTURER,

                         'PRODUCT_LIST_PRICE' => PRODUCT_LIST_PRICE,

                         'PRODUCT_LIST_QUANTITY' => PRODUCT_LIST_QUANTITY,

                         'PRODUCT_LIST_WEIGHT' => PRODUCT_LIST_WEIGHT,

                         'PRODUCT_LIST_IMAGE' => PRODUCT_LIST_IMAGE,

                         'PRODUCT_LIST_BUY_NOW' => PRODUCT_LIST_BUY_NOW);



    asort($define_list);



    $column_list = array();

    reset($define_list);

    while (list($key, $value) = each($define_list)) {

      if ($value > 0) $column_list[] = $key;

    }



// BOF Separate Pricing Per Customer

// this will build the table with specials prices for the retail group or update it if needed

// this function should have been added to includes/functions/database.php

   if ($customer_group_id == '0') {

   tep_db_check_age_specials_retail_table();

   }

   $status_product_prices_table = false;

   $status_need_to_get_prices = false;



   // find out if sorting by price has been requested

   if ( (isset($HTTP_GET_VARS['sort'])) && (ereg('[1-8][ad]', $HTTP_GET_VARS['sort'])) && (substr($HTTP_GET_VARS['sort'], 0, 1) <= sizeof($column_list)) && $customer_group_id != '0' ){

    $_sort_col = substr($HTTP_GET_VARS['sort'], 0 , 1);

    if ($column_list[$_sort_col-1] == 'PRODUCT_LIST_PRICE') {

      $status_need_to_get_prices = true;

      }

   }



   if ($status_need_to_get_prices == true && $customer_group_id != '0') {

   $product_prices_table = TABLE_PRODUCTS_GROUP_PRICES.$customer_group_id;

   // the table with product prices for a particular customer group is re-built only a number of times per hour

   // (setting in /includes/database_tables.php called MAXIMUM_DELAY_UPDATE_PG_PRICES_TABLE, in minutes)

   // to trigger the update the next function is called (new function that should have been

   // added to includes/functions/database.php)

   tep_db_check_age_products_group_prices_cg_table($customer_group_id);

   $status_product_prices_table = true;



   } // end if ($status_need_to_get_prices == true && $customer_group_id != '0')

// EOF Separate Pricing Per Customer



    $select_column_list = '';



    for ($i=0, $n=sizeof($column_list); $i<$n; $i++) {

      switch ($column_list[$i]) {

        case 'PRODUCT_LIST_MODEL':

          $select_column_list .= 'p.products_model, ';

          break;

        case 'PRODUCT_LIST_NAME':

          $select_column_list .= 'pd.products_name, ';

          break;

        case 'PRODUCT_LIST_MANUFACTURER':

          $select_column_list .= 'm.manufacturers_name, ';

          break;

        case 'PRODUCT_LIST_QUANTITY':

          $select_column_list .= 'p.products_quantity, ';

          break;

        case 'PRODUCT_LIST_IMAGE':

          $select_column_list .= 'p.products_image, ';

          break;

        case 'PRODUCT_LIST_WEIGHT':

          $select_column_list .= 'p.products_weight, ';

          break;

      }

    }



// show the products of a specified manufacturer

    if (isset($HTTP_GET_VARS['manufacturers_id'])) {

      if (isset($HTTP_GET_VARS['filter_id']) && tep_not_null($HTTP_GET_VARS['filter_id'])) {

// We are asked to show only a specific category



// BOF Separate Pricing Per Customer

	  if ($status_product_prices_table == true) { // ok in mysql 5

		$listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, tmp_pp.products_price, p.products_tax_class_id, IF(tmp_pp.status, tmp_pp.specials_new_products_price, NULL) as specials_new_products_price, IF(tmp_pp.status, tmp_pp.specials_new_products_price, tmp_pp.products_price) as final_price from " . TABLE_PRODUCTS . " p left join " . $product_prices_table . " as tmp_pp using(products_id), " . TABLE_PRODUCTS_DESCRIPTION . " pd , " . TABLE_MANUFACTURERS . " m, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c where p.products_status = '1' and p.manufacturers_id = m.manufacturers_id and m.manufacturers_id = '" . (int)$HTTP_GET_VARS['manufacturers_id'] . "' and p.products_id = p2c.products_id and pd.products_id = p2c.products_id and pd.language_id = '" . (int)$languages_id . "' and p2c.categories_id = '" . (int)$HTTP_GET_VARS['filter_id'] . "'";		

	  } else { // either retail or no need to get correct special prices -- changed for mysql 5

		$listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, p.products_price, p.products_tax_class_id, IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status, s.specials_new_products_price, p.products_price) as final_price from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS_RETAIL_PRICES . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_MANUFACTURERS . " m, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c where p.products_status = '1' and p.manufacturers_id = m.manufacturers_id and m.manufacturers_id = '" . (int)$HTTP_GET_VARS['manufacturers_id'] . "' and p.products_id = p2c.products_id and pd.products_id = p2c.products_id and pd.language_id = '" . (int)$languages_id . "' and p2c.categories_id = '" . (int)$HTTP_GET_VARS['filter_id'] . "'";

	  } // end else { // either retail...

// EOF Separate Pricing Per Customer

        //$listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, p.products_price, p.products_tax_class_id, IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status, s.specials_new_products_price, p.products_price) as final_price from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_MANUFACTURERS . " m, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c where p.products_status = '1' and p.manufacturers_id = m.manufacturers_id and m.manufacturers_id = '" . (int)$HTTP_GET_VARS['manufacturers_id'] . "' and p.products_id = p2c.products_id and pd.products_id = p2c.products_id and pd.language_id = '" . (int)$languages_id . "' and p2c.categories_id = '" . (int)$HTTP_GET_VARS['filter_id'] . "'";

      } else {

// We show them all

// BOF Separate Pricing Per Customer

        if ($status_product_prices_table == true) { // ok in mysql 5

        $listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, tmp_pp.products_price, p.products_tax_class_id, IF(tmp_pp.status, tmp_pp.specials_new_products_price, NULL) as specials_new_products_price, IF(tmp_pp.status, tmp_pp.specials_new_products_price, tmp_pp.products_price) as final_price from " . TABLE_PRODUCTS . " p left join " . $product_prices_table . " as tmp_pp using(products_id), " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_MANUFACTURERS . " m where p.products_status = '1' and pd.products_id = p.products_id and pd.language_id = '" . (int)$languages_id . "' and p.manufacturers_id = m.manufacturers_id and m.manufacturers_id = '" . (int)$HTTP_GET_VARS['manufacturers_id'] . "'";	

	} else { // either retail or no need to get correct special prices -- changed for mysql 5

        $listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, p.products_price, p.products_tax_class_id, IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status, s.specials_new_products_price, p.products_price) as final_price from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS_RETAIL_PRICES . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_MANUFACTURERS . " m where p.products_status = '1' and pd.products_id = p.products_id and pd.language_id = '" . (int)$languages_id . "' and p.manufacturers_id = m.manufacturers_id and m.manufacturers_id = '" . (int)$HTTP_GET_VARS['manufacturers_id'] . "'";

	} // end else { // either retail...

// EOF Separate Pricing Per Customer

        //$listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, p.products_price, p.products_tax_class_id, IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status, s.specials_new_products_price, p.products_price) as final_price from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_MANUFACTURERS . " m where p.products_status = '1' and pd.products_id = p.products_id and pd.language_id = '" . (int)$languages_id . "' and p.manufacturers_id = m.manufacturers_id and m.manufacturers_id = '" . (int)$HTTP_GET_VARS['manufacturers_id'] . "'";

      }

    } else {

// show the products in a given categorie

      if (isset($HTTP_GET_VARS['filter_id']) && tep_not_null($HTTP_GET_VARS['filter_id'])) {

// We are asked to show only specific catgeory

// BOF Separate Pricing Per Customer

        if ($status_product_prices_table == true) { // ok for mysql 5

        $listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, tmp_pp.products_price, p.products_tax_class_id, IF(tmp_pp.status, tmp_pp.specials_new_products_price, NULL) as specials_new_products_price, IF(tmp_pp.status, tmp_pp.specials_new_products_price, tmp_pp.products_price) as final_price from " . TABLE_PRODUCTS . " p left join " . $product_prices_table . " as tmp_pp using(products_id), " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_MANUFACTURERS . " m, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c where p.products_status = '1' and p.manufacturers_id = m.manufacturers_id and m.manufacturers_id = '" . (int)$HTTP_GET_VARS['filter_id'] . "' and p.products_id = p2c.products_id and pd.products_id = p2c.products_id and pd.language_id = '" . (int)$languages_id . "' and p2c.categories_id = '" . (int)$current_category_id . "'";	

        } else { // either retail or no need to get correct special prices -- ok in mysql 5

        $listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, p.products_price, p.products_tax_class_id, IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status, s.specials_new_products_price, p.products_price) as final_price from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_MANUFACTURERS . " m, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c left join " . TABLE_SPECIALS_RETAIL_PRICES . " s using(products_id) where p.products_status = '1' and p.manufacturers_id = m.manufacturers_id and m.manufacturers_id = '" . (int)$HTTP_GET_VARS['filter_id'] . "' and p.products_id = p2c.products_id and pd.products_id = p2c.products_id and pd.language_id = '" . (int)$languages_id . "' and p2c.categories_id = '" . (int)$current_category_id . "'";

        } // end else { // either retail...

// EOF Separate Pricing Per Customer

        //$listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, p.products_price, p.products_tax_class_id, IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status, s.specials_new_products_price, p.products_price) as final_price from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_MANUFACTURERS . " m, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c where p.products_status = '1' and p.manufacturers_id = m.manufacturers_id and m.manufacturers_id = '" . (int)$HTTP_GET_VARS['filter_id'] . "' and p.products_id = p2c.products_id and pd.products_id = p2c.products_id and pd.language_id = '" . (int)$languages_id . "' and p2c.categories_id = '" . (int)$current_category_id . "'";

      } else {

// We show them all

// BOF Separate Pricing Per Customer --last query changed for mysql 5 compatibility

        if ($status_product_prices_table == true) {

	// original, no need to change for mysql 5

	$listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, tmp_pp.products_price, p.products_tax_class_id, IF(tmp_pp.status, tmp_pp.specials_new_products_price, NULL) as specials_new_products_price, IF(tmp_pp.status, tmp_pp.specials_new_products_price, tmp_pp.products_price) as final_price from " . TABLE_PRODUCTS_DESCRIPTION . " pd left join " . $product_prices_table . " as tmp_pp using(products_id), " . TABLE_PRODUCTS . " p left join " . TABLE_MANUFACTURERS . " m on p.manufacturers_id = m.manufacturers_id, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c where p.products_status = '1' and p.products_id = p2c.products_id and pd.products_id = p2c.products_id and pd.language_id = '" . (int)$languages_id . "' and p2c.categories_id = '" . (int)$current_category_id . "'";

        } else { // either retail or no need to get correct special prices -- changed for mysql 5

        $listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, p.products_price, p.products_tax_class_id, IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status, s.specials_new_products_price, p.products_price) as final_price from " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_PRODUCTS . " p left join " . TABLE_MANUFACTURERS . " m on p.manufacturers_id = m.manufacturers_id left join " . TABLE_SPECIALS_RETAIL_PRICES . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c where p.products_status = '1' and p.products_id = p2c.products_id and pd.products_id = p2c.products_id and pd.language_id = '" . (int)$languages_id . "' and p2c.categories_id = '" . (int)$current_category_id . "'"; 

      } // end else { // either retail...

// EOF Separate Pricing per Customer

        //$listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, p.products_price, p.products_tax_class_id, IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status, s.specials_new_products_price, p.products_price) as final_price from " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_PRODUCTS . " p left join " . TABLE_MANUFACTURERS . " m on p.manufacturers_id = m.manufacturers_id left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c where p.products_status = '1' and p.products_id = p2c.products_id and pd.products_id = p2c.products_id and pd.language_id = '" . (int)$languages_id . "' and p2c.categories_id = '" . (int)$current_category_id . "'";

      }

    }



    if ( (!isset($HTTP_GET_VARS['sort'])) || (!ereg('^[1-8][ad]$', $HTTP_GET_VARS['sort'])) || (substr($HTTP_GET_VARS['sort'], 0, 1) > sizeof($column_list)) ) {

      for ($i=0, $n=sizeof($column_list); $i<$n; $i++) {

        if ($column_list[$i] == 'PRODUCT_LIST_NAME') {

          $HTTP_GET_VARS['sort'] = $i+1 . 'a';

          $listing_sql .= " order by pd.products_name";

          break;

        }

      }

    } else {

      $sort_col = substr($HTTP_GET_VARS['sort'], 0 , 1);

      $sort_order = substr($HTTP_GET_VARS['sort'], 1);



      switch ($column_list[$sort_col-1]) {

        case 'PRODUCT_LIST_MODEL':

          $listing_sql .= " order by p.products_model " . ($sort_order == 'd' ? 'desc' : '') . ", pd.products_name";

          break;

        case 'PRODUCT_LIST_NAME':

          $listing_sql .= " order by pd.products_name " . ($sort_order == 'd' ? 'desc' : '');

          break;

        case 'PRODUCT_LIST_MANUFACTURER':

          $listing_sql .= " order by m.manufacturers_name " . ($sort_order == 'd' ? 'desc' : '') . ", pd.products_name";

          break;

        case 'PRODUCT_LIST_QUANTITY':

          $listing_sql .= " order by p.products_quantity " . ($sort_order == 'd' ? 'desc' : '') . ", pd.products_name";

          break;

        case 'PRODUCT_LIST_IMAGE':

          $listing_sql .= " order by pd.products_name";

          break;

        case 'PRODUCT_LIST_WEIGHT':

          $listing_sql .= " order by p.products_weight " . ($sort_order == 'd' ? 'desc' : '') . ", pd.products_name";

          break;

        case 'PRODUCT_LIST_PRICE':

          $listing_sql .= " order by final_price " . ($sort_order == 'd' ? 'desc' : '') . ", pd.products_name";

          break;

      }

    }

    

    $image = DIR_WS_IMAGES . 'table_background_list.gif';

    if (isset($HTTP_GET_VARS['manufacturers_id'])) {

      $image = tep_db_query("select manufacturers_image from " . TABLE_MANUFACTURERS . " where manufacturers_id = '" . (int)$HTTP_GET_VARS['manufacturers_id'] . "'");

      $image = tep_db_fetch_array($image);

      $image = $image['manufacturers_image'];

    } elseif ($current_category_id) {

      $image = tep_db_query("select categories_image from " . TABLE_CATEGORIES . " where categories_id = '" . (int)$current_category_id . "'");

      $image = tep_db_fetch_array($image);

      $image = $image['categories_image'];

    }

?>



      <?php include(DIR_WS_MODULES . 'product_listing_m.php'); ?>			



				<table cellpadding="0" cellspacing="0" border="0"><tr><td height="10"></td></tr></table>

				

<?  tep_draw_heading_bottom_3();?>

				

<?  tep_draw_heading_bottom();  ?>



<?php /*  tep_draw_separate();  */ ?>  <!--  /////////  -->



<?   tep_draw_heading_top();  ?>



<?

  if ( (!isset($new_products_category_id)) || ($new_products_category_id == '0') ) {

    $new_products_query = tep_db_query("select count(*) as total from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id where products_status = '1' order by p.products_date_added desc limit " . MAX_DISPLAY_NEW_PRODUCTS);

  } else {

    $new_products_query = tep_db_query("select count(*) as total from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c, " . TABLE_CATEGORIES . " c where p.products_id = p2c.products_id and p2c.categories_id = c.categories_id and c.parent_id = '" . (int)$new_products_category_id . "' and p.products_status = '1' order by p.products_date_added desc limit " . MAX_DISPLAY_NEW_PRODUCTS);

  }

  $new_products = tep_db_fetch_array($new_products_query);

  if ( $new_products['total'] > 0 )

  {

?>



<? new contentBoxHeading_WHATS_NEW($info_box_contents, true, false);?>

			

<? tep_draw_heading_top_3();?>			

			

			<?php include(DIR_WS_MODULES . FILENAME_NEW_PRODUCTS); ?></td>

		

<? 

   tep_draw_heading_bottom_3();

   }

?>



<? tep_draw_heading_bottom();?>		

		

	</td>

<?	  	

  } else { // default page

?>

    <td class="col_center">

			

<?php /*  require(DIR_WS_BOXES . 'panel_top.php');  */ ?>

	

<? tep_draw_heading_top();?>

						

<?   new contentBoxHeading('New Products');  ?>



<? tep_draw_heading_top_3();?>



		<?php include(DIR_WS_MODULES . 'column_middle.php'); ?>

		<table border="0" cellspacing="0" cellpadding="0" align="center" class="box_width_cont product">

          <tr><td><?php //include(DIR_WS_MODULES . FILENAME_UPCOMING_PRODUCTS); ?></td></tr>

        </table>

<?php // require(DIR_WS_BOXES . 'panel_bottom.php'); ?>		

<? tep_draw_heading_bottom_3();?>



<? tep_draw_heading_bottom();?>		

		

		</td>

<?php

  }

?>

<!-- body_text_eof //-->

    <td class="col_right">

<!-- right_navigation //-->

<?php



	require(DIR_WS_INCLUDES . 'column_right.php'); 



?>

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

