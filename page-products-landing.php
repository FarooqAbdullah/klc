<?php 
/*
Template Name: Products Landing Page
*/

get_header('shop'); the_post();
?>
    <div class="body_wrapper">

    <?php the_content(); 
	 $taxonomy     = 'product_cat';
  $orderby      = 'id';  
  $show_count   = 0;      // 1 for yes, 0 for no
  $pad_counts   = 0;      // 1 for yes, 0 for no
  $hierarchical = 1;      // 1 for yes, 0 for no  
  $title        = '';  
  $empty        = 0;

  $args = array(
         'taxonomy'     => $taxonomy,
         'orderby'      => $orderby,
         'show_count'   => $show_count,
         'pad_counts'   => $pad_counts,
         'hierarchical' => $hierarchical,
         'title_li'     => $title,
         'hide_empty'   => $empty
  );
 $all_categories = get_categories( $args );
 //echo '<pre>';
 //print_r($all_categories);
 //echo '</pre>';


	?>
   <!----Masonry -->
   <div class="vc_grid-container-wrapper vc_clearfix">

   <div class="vc_pageable-slide-wrapper vc_clearfix" id="masonry-grid-products" data-vc-grid-content="true">
   
   <?php  foreach ($all_categories as $cat) {
    if($cat->category_parent == 0) {
        $category_id = $cat->term_id;       
      //  echo '<br />category <a href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a>'; 
		$thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true ); 
        // get the image URL
        $image = wp_get_attachment_url( $thumbnail_id );
       // echo $image;		
	

     ?>
	 <div class="grid-item">
	 <a class="product-cat-hyper" href="<?php echo site_url(); ?>/product-category/<?php echo $cat->slug; ?>"><img src="<?php echo $image ?>" class=""></a>
	 <div class="overlay"></div>
	 <h2 class="product-category-name"> <?php echo $cat->name;?> </h2>
	 </div>
	 
   
<?php }       
}
 ?>



</div>

</div>

   <!--Masonry-->
   </div>
    
    
<?php get_footer(); ?>