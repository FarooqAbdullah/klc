<?php
global $mk_options;

$mk_footer_class = $show_footer_old = $show_footer = '';
$post_id = global_get_post_id();
if($post_id) {
  $show_footer_old = get_post_meta($post_id, '_footer', true );
  $show_footer = get_post_meta($post_id, '_template', true );

}

if($mk_options['footer_size'] == 'true') {
  $mk_footer_class .= 'mk-background-stretch';
}
if($mk_options['disable_footer'] == 'false' || ($show_footer_old == 'false' || $show_footer == 'no-footer' || $show_footer == 'no-header-footer' || $show_footer == 'no-header-title-footer' || $show_footer == 'no-footer-title')) {
  $mk_footer_class .= ' mk-footer-disable';
}

if($mk_options['footer_type'] == '2') {
  $mk_footer_class .= ' mk-footer-unfold';
}

$boxed_footer = (isset($mk_options['boxed_footer']) && !empty($mk_options['boxed_footer'])) ? $mk_options['boxed_footer'] : 'true';
$boxed_footer_css = ($boxed_footer == 'true') ? ' mk-grid' : ' fullwidth-footer';

?>
<section id="mk-footer" class="<?php echo $mk_footer_class; ?>" <?php echo get_schema_markup('footer'); ?>>
<?php if($mk_options['disable_footer'] == 'true' && ($show_footer_old != 'false' && $show_footer != 'no-footer' && $show_footer != 'no-header-footer' && $show_footer != 'no-header-title-footer' && $show_footer != 'no-footer-title')) : ?>
<div class="footer-wrapper<?php echo $boxed_footer_css;?>">
<div class="mk-padding-wrapper">
<?php
$footer_column = $mk_options['footer_columns'];
if(is_numeric($footer_column)):
	switch ( $footer_column ):
		case 1:
		$class = '';
			break;
		case 2:
			$class = 'mk-col-1-2';
			break;
		case 3:
			$class = 'mk-col-1-3';
			break;
		case 4:
			$class = 'mk-col-1-4';
			break;
		case 5:
			$class = 'mk-col-1-5';
			break;
		case 6:
			$class = 'mk-col-1-6';
			break;
	endswitch;
	for( $i=1; $i<=$footer_column; $i++ ):
?>
<div class="<?php echo $class; ?>"><?php mk_sidebar_generator( 'get_footer_sidebar' )  ?></div>
<?php endfor;

else :

switch($footer_column):
		case 'third_sub_third':
?>
		<div class="mk-col-1-3"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
		<div class="mk-col-2-3">
			<div class="mk-col-1-3"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
			<div class="mk-col-1-3"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
			<div class="mk-col-1-3"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
		</div>
<?php
			break;
		case 'sub_third_third':
?>
		<div class="mk-col-2-3">
			<div class="mk-col-1-3"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
			<div class="mk-col-1-3"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
			<div class="mk-col-1-3"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
		</div>
		<div class="mk-col-1-3"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
<?php
			break;
		case 'third_sub_fourth':
?>
		<div class="mk-col-1-3"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
		<div class="mk-col-2-3 last">
			<div class="mk-col-1-4"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
			<div class="mk-col-1-4"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
			<div class="mk-col-1-4"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
			<div class="mk-col-1-4"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
		</div>
<?php
			break;
		case 'sub_fourth_third':
?>
		<div class="mk-col-2-3">
			<div class="mk-col-1-4"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
			<div class="mk-col-1-4"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
			<div class="mk-col-1-4"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
			<div class="mk-col-1-4"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
		</div>
		<div class="mk-col-1-3"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
<?php
			break;
		case 'half_sub_half':
?>
		<div class="mk-col-1-2"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
		<div class="mk-col-1-2">
			<div class="mk-col-1-2"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
			<div class="mk-col-1-2"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
		</div>
<?php
			break;
		case 'half_sub_third':
?>
		<div class="mk-col-1-2"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
		<div class="mk-col-1-2">
			<div class="mk-col-1-3"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
			<div class="mk-col-1-3"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
			<div class="mk-col-1-3"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
		</div>
<?php
			break;
		case 'sub_half_half':
?>
		<div class="mk-col-1-2">
			<div class="mk-col-1-2"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
			<div class="mk-col-1-2"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
		</div>
		<div class="mk-col-1-2"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
<?php
			break;
		case 'sub_third_half':
?>
		<div class="mk-col-1-2">
			<div class="mk-col-1-3"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
			<div class="mk-col-1-3"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
			<div class="mk-col-1-3"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
		</div>
		<div class="mk-col-1-2"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
<?php
			break;
	endswitch;

endif;?>
<div class="clearboth"></div>
</div>
    <button class="btn btn-primary" id="custom-measurement">Measurement</button>
</div>
<?php endif;?>
<?php if ( $mk_options['disable_sub_footer'] == 'true' && ($show_footer_old != 'false' && $show_footer != 'no-footer' && $show_footer != 'no-header-footer' && $show_footer != 'no-header-title-footer' && $show_footer != 'no-footer-title')) { ?>
<div id="sub-footer">
	<div class="<?php echo $boxed_footer_css;?>">
		<?php if ( !empty( $mk_options['footer_logo'] ) ) {?>
		<div class="mk-footer-logo">
		    <a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo( 'name' ); ?>"><img alt="<?php bloginfo( 'name' ); ?>" src="<?php echo $mk_options['footer_logo']; ?>" /></a>
		</div>
		<?php } ?>

    	<span class="mk-footer-copyright"><?php echo stripslashes($mk_options['copyright']); ?></span>
    	<?php do_action('footer_menu'); ?>
	</div>
	<div class="clearboth"></div>
</div>
<?php } ?>

</section>





</div>
<?php


	do_action( 'side_dashboard');


	if($mk_options['custom_js']) :

	?>
		<script type="text/javascript">
		<?php echo stripslashes($mk_options['custom_js']); ?>
		</script>
	<?php

	endif;

	if($mk_options['analytics']){
		?>
		<script type="text/javascript">
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', '<?php echo stripslashes($mk_options['analytics']); ?>']);
		  _gaq.push(['_trackPageview']);

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>
	<?php } ?>

</div>

	<?php 
		if ($mk_options['go_to_top'] != 'false') {
			echo '<a href="#" class="mk-go-top"><i class="mk-icon-chevron-up"></i></a>';
		}
	?>
	
	<?php
		do_action('quick_contact');
		do_action('full_screen_search_form');
	?>


	<!-- Apply custom styles before runing other javascripts as they 
	might be based on those styles as well -->
	<?php
		global $app_dynamic_styles;
		global $app_modules;

		$app_dynamic_styles_ids = array();
		$app_dynamic_styles_inject = '';

		$ken_styles_length = count($app_dynamic_styles);

		if ($ken_styles_length > 0) {
			foreach ($app_dynamic_styles as $key => $val) { 
				$app_dynamic_styles_ids[] = $val["id"]; 
				$app_dynamic_styles_inject .= $val["inject"];
			};
		}

		$modulesLength = count($app_modules);


		if ($modulesLength > 0) {
			foreach ($app_modules as $key => $val) { 
				$modules[] = $val["name"]; 
				$params[] = $val["params"];
			};
		}

	?>
	<script type="text/javascript">
		var dynamic_styles = '<?php echo mk_clean_init_styles($app_dynamic_styles_inject); ?>';
		var dynamic_styles_ids = (<?php echo json_encode($app_dynamic_styles_ids); ?> != null) ? <?php echo json_encode($app_dynamic_styles_ids); ?> : [];

		var styleTag = document.createElement('style'),
			head = document.getElementsByTagName('head')[0];

		styleTag.type = 'text/css';
		styleTag.setAttribute('data-ajax', '');
		styleTag.innerHTML = dynamic_styles;
		head.appendChild(styleTag);
	</script>
	<!-- Custom styles applied -->

	<?php wp_footer(); ?>

	<!--<script src="<?php echo site_url(); ?>/wp-content/themes/klnyc/js/theme.js"></script>-->
	
	<!-- Apply ajax styles and run JSON triggered js modules -->
	<script type="text/javascript">
		window.$ = jQuery

		$('.mk-dynamic-styles').each(function() {
			$(this).remove();
		});

		function ajaxStylesInjector() {
			$('.mk-dynamic-styles').each(function() {
				var $this = $(this),
					id = $this.attr('id'),
					commentedStyles = $this.html();
					styles = commentedStyles
							 .replace('<!--', '')
							 .replace('-->', '');


				if(dynamic_styles_ids.indexOf(id) === -1) {
					$('style[data-ajax]').append(styles);
					$this.remove();
				}

				dynamic_styles_ids.push(id);
			});
		};

		<?php 
			if ($modulesLength > 0) {
				for ($i = 0; $i < $modulesLength; $i++) {
					echo "abb.modules." . $modules[$i] . ".init({";
						foreach ($params[$i] as $key => $val) {
							echo $key . ": '$val',";
						}
					echo "}); \n";
				} 

				echo "abb.init();";
			}
		?>
		
	</script>
	<?php if (!is_user_logged_in()){ ?>
	<!-- Login Modal -->
<div class="modal fade" id="ModalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">



            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="row">                   
                    <div class="col-lg-12 col-md-12 col-sm-12 loginBox">
                        <h2>LOG IN TO KLNYC</h2>
<!--								<div class="fbLogin"> <i class="fa fa-facebook-square"></i> Login with Facebook</div>-->
                        <?php do_action('wordpress_social_login'); ?>
                        <hr/> <p class="LoginMessage">Login with your email address. </p>
<?php echo do_shortcode('[login-form]'); ?>


                    </div>

                </div>
                <div class="clearfix"></div>
            </div>

        </div>
    </div>
</div>
<!-- Login Modal -->

<!-- Register Modal -->
<div class="modal fade" id="ModalRegister" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">



            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="row">
                   
                    <div class="col-lg-12 col-md-12 col-sm-12 loginBox">
                        <h2 class="joinKlnyc">JOIN KLNYC</h2>
                        <p class="joinDesc">Receive customized looks amd weekly updates in your inbox. </p>
                        <?php do_action('wordpress_social_login'); ?>
                        <hr/> <p style="  margin-bottom: 17px;">Sign Up with your email address. </p>
<?php echo do_shortcode('[register_form]'); ?>

                    </div>

                </div>
                <div class="clearfix"></div>
            </div>

        </div>
    </div>
</div>
<!-- Register Modal -->


<!-- Reset Modal -->
<div class="modal fade" id="ModalReset" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">



            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="row">
                    <div class="col-sm-5 col-md-5 RestPassBox">
                        <div class="ResetImage">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/reset.jpg" />
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-7 loginBox resetPasswordBox">
                        <h2>RESET PASSWORD</h2>

                        <p>Enter your email address below. You will receive instructions<br/>
                            on how to reset your password via email. </p>
<?php echo do_shortcode('[wppb-recover-password]'); ?>
                    </div>

                </div>
                <div class="clearfix"></div>
            </div>

        </div>
    </div>
</div>
<!-- Reset Modal -->
	<?php } ?>

<div id="custom-measurement-body" class="custom-measurement-body-wrapper">
    <a href="javascript:void(0)" class="close">X</a>
    <div class="cw-container">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h2 class="enter-your-measurement">Enter your Measurements in 15 minutes</h2>
            <p class="p-head">All you need is a Friend <span>&</span> a Measuring Tape</p>
            <p class="p-head-slug">
                * Alternatively download this measurement form and take it to a local tailor (e.g. a neighborhood dry cleaner) and have them measure you.
            </p>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <form>
                <div class="row english-metric">
                    <label>
                        English vs Metric System:
                        <input type="radio" name="length_unit"/> Inches
                        <input type="radio" name="length_unit"/> Cm
                    </label>
                </div>
                <div class="row enter-height-gender">
                    <div>
                        <label>First enter your height, weight, age and gender: </label>
                    </div>
                    <div>
                        <p>
                            Height <input type="text" name="feet"/> <span>FT</span>
                            <input type="text" name="inch"/> <span>IN</span>
                        </p>
                        <p>
                            Weight <input type="text" name="weight"/> <span>LBS</span>
                        </p>
                        <p>
                            AGE <input type="text" name="age"/> <span>YRS</span>
                        </p>
                        <p>
                            Gender <input type="text" name="gender"/>
                        </p>
                    </div>
                </div>
                <div class="row video-form">
                    <div class="col-lg-8 col-mg-8 col-sm-12 col-xs-12">
                        <table>
                        <thead>
                            <tr>
                                <th colspan="2">Jacket/Shirt Measurements</th>
                                <th colspan="2">Pant Measurements</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    Neck
                                </td>
                                <td>
                                    <input type="text" name="neck"/> <span>IN</span>
                                </td>
                                <td>
                                    Waist
                                </td>
                                <td>
                                    <input type="text" name="waist"/> <span>IN</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    CHEST
                                </td>
                                <td>
                                    <input type="text" name="chest"/> <span>IN</span>
                                </td>
                                <td>
                                    Thigh
                                </td>
                                <td>
                                    <input type="text" name="thigh"/> <span>IN</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Stomach
                                </td>
                                <td>
                                    <input type="text" name="stomach"/> <span>IN</span>
                                </td>
                                <td>
                                    Knee
                                </td>
                                <td>
                                    <input type="text" name="knee"/> <span>IN</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Hip
                                </td>
                                <td>
                                    <input type="text" name="hip"/> <span>IN</span>
                                </td>
                                <td>
                                    Rise
                                </td>
                                <td>
                                    <input type="text" name="rise"/> <span>IN</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Length
                                </td>
                                <td>
                                    <input type="text" name="length"/> <span>IN</span>
                                </td>
                                <td>
                                    Pant Length
                                </td>
                                <td>
                                    <input type="text" name="p-length"/> <span>IN</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Bicep
                                </td>
                                <td>
                                    <input type="text" name="bicep"/> <span>IN</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Armhole
                                </td>
                                <td>
                                    <input type="text" name="armhole"/> <span>IN</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Shoulder Width
                                </td>
                                <td>
                                    <input type="text" name="shoulder-width"/> <span>IN</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Sleeve Length
                                </td>
                                <td>
                                    <input type="text" name="sleeve-length"/> <span>IN</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                    <div class="col-lg-4 col-mg-4 col-sm-12 col-xs-12">
<!--                        <iframe frameborder="0" width="480" height="270" src="//www.dailymotion.com/embed/video/xscm42" allowfullscreen></iframe>-->
                        <iframe frameborder="0" width="480" height="270" src="//www.dailymotion.com/embed/video/xd0f6x" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="row bottom-img">
                    <div class="padding-left_0 padding-right_0 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="padding-left_0 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <h3>SHOULDERS</h3>
                            <div class="single_wrapper padding-left_0 padding-right_0 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="padding-left_0 padding-right_0 col-sm-12 col-md-12">
                                        <div class="thumbnail">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/square-shoulder.png" alt="Square Shoulder">
                                            <div class="caption">
                                                <h3>Square Shoulders</h3>
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single_wrapper padding-left_0 padding-right_0 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="padding-left_0 padding-right_0 col-sm-12 col-md-12">
                                        <div class="thumbnail">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/square-shoulder.png" alt="Square Shoulder">
                                            <div class="caption">
                                                <h3>Rounded Shoulders</h3>
                                                <p>Your Shoulders are gently reounded</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single_wrapper padding-left_0 padding-right_0 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="padding-left_0 padding-right_0 col-sm-12 col-md-12">
                                        <div class="thumbnail">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/square-shoulder.png" alt="Square Shoulder">
                                            <div class="caption">
                                                <h3>Sloping Shoulders</h3>
                                                <p>Your Shoulders have a prominent</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="padding-right_0 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <h3>Chest</h3>
                            <div class="single_wrapper padding-left_0 padding-right_0 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="padding-left_0 padding-right_0 col-sm-12 col-md-12">
                                        <div class="thumbnail">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/muscular-chest.png" alt="Square Shoulder">
                                            <div class="caption">
                                                <h3>Mascular Chest</h3>
                                                <p>Your Chest is broad with promi</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single_wrapper padding-left_0 padding-right_0 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="padding-left_0 padding-right_0 col-sm-12 col-md-12">
                                        <div class="thumbnail">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/flat-chest.png" alt="Square Shoulder">
                                            <div class="caption">
                                                <h3>Flat Chest</h3>
                                                <p>Your Chest is flat with some m</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single_wrapper padding-left_0 padding-right_0 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="padding-left_0 padding-right_0 col-sm-12 col-md-12">
                                        <div class="thumbnail">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/large-chest.png" alt="Square Shoulder">
                                            <div class="caption">
                                                <h3>Largest Chest</h3>
                                                <p>Your Chest is large no mu</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="padding-left_0 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <h3>Stomach</h3>
                            <div class="single_wrapper padding-left_0 padding-right_0 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="padding-left_0 padding-right_0 col-sm-12 col-md-12">
                                        <div class="thumbnail">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/flat-stomach.png" alt="Square Shoulder">
                                            <div class="caption">
                                                <h3>Flat Stomach</h3>
                                                <p>Your Stomach is flat</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single_wrapper padding-left_0 padding-right_0 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="padding-left_0 padding-right_0 col-sm-12 col-md-12">
                                        <div class="thumbnail">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/slightly-rounded-stomach.png" alt="Square Shoulder">
                                            <div class="caption">
                                                <h3>Slightly Rounded Stomach</h3>
                                                <p>Your Stomach is slightly rounded</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single_wrapper padding-left_0 padding-right_0 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="padding-left_0 padding-right_0 col-sm-12 col-md-12">
                                        <div class="thumbnail">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/rounded-stomach.png" alt="Square Shoulder">
                                            <div class="caption">
                                                <h3>Rounded Stomach</h3>
                                                <p>Your Stomach is larger</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="padding-right_0 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <h3>Posture</h3>
                            <div class="single_wrapper padding-left_0 padding-right_0 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="padding-left_0 padding-right_0 col-sm-12 col-md-12">
                                        <div class="thumbnail">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/flat-posture.png" alt="Square Shoulder">
                                            <div class="caption">
                                                <h3>Flat Posture</h3>
                                                <p>Your Shoulders are manually</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single_wrapper padding-left_0 padding-right_0 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="padding-left_0 padding-right_0 col-sm-12 col-md-12">
                                        <div class="thumbnail">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/straight-posture.png" alt="Square Shoulder">
                                            <div class="caption">
                                                <h3>Straight Posture</h3>
                                                <p>Your shoulders are roughly</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single_wrapper padding-left_0 padding-right_0 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="padding-left_0 padding-right_0 col-sm-12 col-md-12">
                                        <div class="thumbnail">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/relaxed-posture.png" alt="Square Shoulder">
                                            <div class="caption">
                                                <h3>Relaxed Posture</h3>
                                                <p>Your Shoulders are manually</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row save-reset">
                    <button class="btn btn-primary">Save Measurements</button>
                    <button class="btn btn-primary">Recent</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>


