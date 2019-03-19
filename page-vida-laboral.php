<?php get_header('front-page');?>
<section class="feina">
        <div class="container-fluid feina-contenidor">
            <div class="caixa-feina">
                    <div class="row">
                        <?php 
                            $category_id=get_cat_ID( 'estudis' );
                            $args=array(
                                'posts_per_page'=>9999,
                                'post_type'=>'jobs',                                
                            );
                            $feines=new WP_Query($args);
                            while($feines->have_posts()){ 
                            $feines->the_post();?>
                        <div class="caixa-feina-interior-data col-md-3">
                            <div class="data-feina">
                                <?php the_title( '<h2>', '</h2>');?>
                            </div>
                        </div>
                        <div class="caixa-feina-interior-text col-md-9">
                            <div class="text-informacio">
                                <?php the_content(); ?>
                            </div>
                        </div>
                        <?php } wp_reset_postdata(); //End WHILE ?>
                    </div> 
                </div>               
            </div>
        </div>
    </section>
<?php get_footer();?>