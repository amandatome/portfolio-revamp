<?php

/* Template Name: Home*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<!-- <div class="wrapper" id="page-wrapper"> -->

<main class="site-main" id="main">
<?php get_template_part( 'global-templates/hero-banner' ); ?>
	<section id='about'>
        <div class='container'>
        <h2 class='display-4 text-right'><?php the_field('about_heading'); ?></h2>
        <div class="heart"></div>
            <div class='row'>
                <div class='col-md-4 py-5'>
                    <div id='square'></div>
                <?php 
                    $image = get_field('about_image');
                    $size = 'full'; 
                    if( $image ) {
                        echo wp_get_attachment_image( $image, $size, false, array('class' => 'img-fluid profile-image'));
                    }?>
                </div><!--.col-->	
                <div class='col-md-8'>
                    <div class='card border-0 text-right'>
                        <div class='card-body'>
                        <?php the_field('about_content');?>
                        </div><!--.card-body-->
                    </div><!--.card-->
                </div><!--.col-->	
            </div>
        </div><!--.container-->   
	</section><!--.section-->

<section id='projects' class='mt-5 mb-5'>
    <div class='container'>
<div id="circle-1"></div>
<div id="circle-2"></div>
<div id="circle-3"></div>
        <h2 class='display-4 mb-5'><?php the_field('project_heading');?></h2>
       <?php if (have_rows('project_info')):
            $counter = 0;
            while (have_rows('project_info')): the_row();
            $counter++;
            $project_image = get_sub_field('project_image');
            $project_size = 'rectangle';
            $project_title = get_sub_field('project_title');
            $project_description = get_sub_field('project_description');
            $project_stack = get_sub_field('stack');
            $project_info = get_sub_field('project_more_info');
            $project_live = get_sub_field('project_live');?>
   <?php
   if ($counter == 1 || $counter == 3 || $counter == 5 || $counter == 7) {?>
    <div class='row  project-description border no-gutter'>
        <div class='col-md-6 col-sm-12 p-0 text-center border' >
        <?php $image = get_sub_field('project_image'); $size = 'full';
        if ($image) {
            echo wp_get_attachment_image($image, $size, false, array('class' => 'img-fluid '));
        }?>
        </div><!--.col-->
        <div class='col-md-6 col-sm-12 pt-4 text-center align-self-center '>
                        <h3><?php echo $project_title; ?></h3>  
                        <?php echo $project_description; ?>
                            <ul class='d-flex justify-content-center stack'>
                                <?php echo $project_stack; ?>
                            </ul>
                        <?php if ($project_info):
                                $project_info_url = $project_info['url'];
                                $project_info_title = $project_info['title'];
                                $project_info_target = $project_info['target'] ? $project_info['target'] : '_self';
                ?>
                        <a class="btn btn-lg btn-primary mt-3 mb-3" href="<?php echo esc_url($project_info_url); ?>" target="<?php echo esc_attr($project_info_target); ?>"><?php echo esc_html($project_info_title); ?></a>
                    <?php endif;?>
                        <?php if ($project_live):
                                $project_live_url = $project_live['url'];
                                $project_live_title = $project_live['title'];
                                $project_live_target = $project_live['target'] ? $project_live['target'] : '_self';
                ?>
                    <a class="btn btn-lg btn-primary mt-3 mb-3" href="<?php echo esc_url($project_live_url); ?>" target="<?php echo esc_attr($project_live_target); ?>"><?php echo esc_html($project_live_title); ?></a>
                <?php endif;?>
            </div><!--.col-->
        </div><!--.row-->
    <?php } elseif ($counter == 2 || $counter == 4 || $counter == 6) {?>
    <div class='row project-description border'>
        <div class='col-md-6 col-sm-12 pt-4 text-center align-self-center order'>
        <h3><?php echo $project_title; ?></h3>
            <?php echo $project_description; ?>
            <ul class='d-flex justify-content-center stack'>
            <?php echo $project_stack; ?>
            </ul>
            <?php if ($project_info):
                $project_info_url = $project_info['url'];
                $project_info_title = $project_info['title'];
                $project_info_target = $project_info['target'] ? $project_info['target'] : '_self';
                ?>
                <a class="btn btn-lg btn-primary mt-3 mb-3" href="<?php echo esc_url($project_info_url); ?>" target="<?php echo esc_attr($project_info_target); ?>"><?php echo esc_html($project_info_title); ?></a>
            <?php endif;?>
            <?php if ($project_live):
                $project_live_url = $project_live['url'];
                $project_live_title = $project_live['title'];
                $project_live_target = $project_live['target'] ? $project_live['target'] : '_self';
                ?>
                <a class="btn btn-lg btn-primary mt-3 mb-3" href="<?php echo esc_url($project_live_url); ?>" target="<?php echo esc_attr($project_live_target); ?>"><?php echo esc_html($project_live_title); ?></a>
            <?php endif;?>
    </div><!--.col-->
<div class='col-md-6 col-sm-12 p-0 text-center border'>
        <?php $image = get_sub_field('project_image'); $size = 'full';
        if ($image) {
            echo wp_get_attachment_image($image, $size, false, array('class' => 'img-fluid'));
        }?>
        </div><!--.col-->
    </div><!--.row-->
          <?php     };?>                                            
                <?php endwhile;
                else:
    // no rows found
         endif;?>
         </div>
    </section>
    <section id='contact'> 
    <div class='container mt-5'>  
    <div id="diamond"></div>
    <h2 class='display-4 text-right mb-4'><?php the_field('contact_heading'); ?></h2>
         <?php the_field('contact_content'); ?>
         <?php the_content();?>
        </div>
    </section>

  </main><!-- #main -->

<?php
get_footer();
