<?php get_header(); ?>
<?php
/*
Template Name: blog - inicio
*/
?>


<section class="hero">
    <div class="wrapper">
    <div class="hero__title">
      <h1>EasyDraw</h1>
      <h2>Innovación, perfección y creatividad en su máxima expresión</h2>
    </div>
      <div class="hero__content">
        <div class="modelo">
          <img class="slider" src="<?php bloginfo('template_url')?>/images/slider.png" alt="" />
        </div>
        <div class="loop">
        <?php
            $args = array(
                'posts_per_page' =>3,
                'meta_key' => 'post_views',
                'orderby' => 'post_date',
                'order' => 'DESC'
            );
            ?>
            	<?php
                  $popular_posts = new WP_Query( $args );
                  ?><?php 
                  while ( $popular_posts->have_posts() ) : $popular_posts->the_post();?>
                    <div class="loop__content__post">
                    <a href="<?php the_permalink(); ?>">
                       <?php if( has_post_thumbnail() ){
                         the_post_thumbnail('medium_large','url','loading', array('class'=>''));}
                       ?>  
                    </a>
                <?php   ?>
                </div>
            <?php
                endwhile; 
                wp_reset_postdata();
        ?>
        </div>
      </div>
    </div>
</section>
<article class="backend">
  <div class="wrapper">
    <h2>Articulos & Eventos</h2>
  <div class="backend__content">
  <div class="backend__content__new">
        <?php
            $args = array(
                'posts_per_page' =>80,
                'meta_key' => 'post_views',
                'orderby' => 'meta_value_num',
                'order' => 'DESC'
            );
            ?>
            	<?php
                  $popular_posts = new WP_Query( $args );
                  ?><?php 
                  while ( $popular_posts->have_posts() ) : $popular_posts->the_post();?>

                    <div class="backend__content__new__post">
                        <?php if( has_post_thumbnail() ){
                          the_post_thumbnail('medium_large','url', array('class'=>''));}
                        ?>
                        <div class="backend__content__new__post__sumary">
                          <h3 class="title"><?php the_title();?></h3>
                          <p class="date"><?php echo get_the_date(); ?></p>
                          <p><?php the_excerpt(); ?></p>
                          <a href="<?php the_permalink(); ?>"> Ver Mas
                          </a>
                            <?php   ?>
                        </div>
                    </div>
                <?php
                endwhile; 
                wp_reset_postdata();
          ?>
    </div>
    </div>
    </div>
</article>
<div class0="galeria">
  <?php if (!function_exists('dynamic_sidebar')|| !dynamic_sidebar('Instagram')): endif;?>
</div>

<?php get_footer(); ?>