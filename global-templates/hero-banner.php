<div class="jumbotron rounded-0 text-center mb-5">
<div id='circle-4'></div>
<div id='diamond-2'></div>
<div id='circle-5'></div>
<div id='diamond-3'></div>
  <h1 class="display-4"><?php the_field('banner_heading');?></h1>
  <h2 class='pt-5'><?php the_field('banner_content'); ?></h2>
  <p class="lead">
    <?php 
        $link = get_field('hero_button');
        if( $link ): ?>
            <a class=" btn btn-primary btn-lg" href="<?php echo esc_url( $link ); ?>" role='button'>View Projects</a>
        <?php endif; ?>
  </p>
</div>

