<?php get_header('front-page');?>

    <section class="historia" id="ancla-personal">
        <div class="container-fluid historia-contenidor">
        <h2 class="titol2">Dades Personals</h2>
        <hr>
            <div class="row">                
                <div class="col-md-6 text-informacio">
                    <div class="intern-info" >
                        <p><span>Nom:</span>  <?php echo get_theme_mod( 'dades-personals-nom' ); ?></p>
                        <p><span>Data Naixament:</span>  <?php echo get_theme_mod( 'dades-personals-data' ); ?></p>
                        <p><span>Adreça:</span>  <?php echo get_theme_mod( 'dades-personals-adreça'); ?></p>
                        <p><span>Telèfon:</span>  <?php echo get_theme_mod( 'dades-personals-telefon'); ?></p>
                        <p><span>Mòbil:</span>  <?php echo get_theme_mod( 'dades-personals-mobil'); ?></p>
                        <p><span>Mail:</span>  <?php echo get_theme_mod( 'dades-personals-mail'); ?></p>
                    </div>
                </div>
                <div class="col-md-6 foto-perfil">
                   <img src="<?php echo get_theme_mod( 'dades-personals-foto' ); ?>" height="290" width="200"></img>
                </div>
            </div>
        </div>
    </section>
    <!--Section personal de proba-->    
<!-- Final de la section de proba-->
    <section class="estudis" id="ancla-estudis">
        <div class="container-fluid estudis-contenidor">
            <h2 class="titol2">Estudis</h2>
            <div class="row fila-estudis">  
            <!-- Aqui podriem posar un bucle per cada post -->  
            <?php 
            $category_id=get_cat_ID( 'estudis' );
            $args=array(
                'posts_per_page'=>9999,
                'post_type'=>'post',
                'category_name'=>'estudis'
            );
            $estudis=new WP_Query($args);
            while($estudis->have_posts()){ 
                $estudis->the_post();?>           
                <div class="estudi card">
                <div class="card-header">
                    <?php the_title( '<h2>', '</h2>');?>
                </div>                
                <div class="card-body cos-caixa">
                    <div class="col-md-12 text-informacio card-text">
                        <?php the_content(); ?>
                    </div>
                    <div class="col-md-12 boto-certificat" >
                        <!--<button type="button" class="btn btn-outline-info buto-titol">Títol</button> -->
                    </div>
                 </div>
                </div>  
            <?php } wp_reset_postdata(); //End WHILE ?>
            </div>
        </div>
    </section>
    <section class="feina" id="ancla-feina">
        <div class="container-fluid feina-contenidor">
                    <div class="row fila-feina"  style="background-image: url(<?php echo get_theme_mod('my-job-foto');?>)">
                        <div class="hero-image col-md-12">
                            <div class="hero-text">
                                <h1><?php echo get_theme_mod( 'my-job-title' ); ?></h1>
                                <p><?php echo get_theme_mod( 'my-job-text' ); ?></p>
                                <a class="btn btn-success" href="<?php echo get_theme_mod( 'my-job-link-btn', get_home_url() );?> " role="button"><?php echo get_theme_mod( 'my-job-text-btn' ); ?></a>
                            </div>
                        </div> 
                    </div>        
            </div>
        </div>
    </section>
    <section class="coneixaments" id="ancla-coneixaments">
        <div class="container-fluid coneixaments-contenidor">
        <h2 class="titol2">Coneixaments</h2>
            <div class="row">  
            <?php 
            $args=array(
                'posts_per_page'=>9999,
                'post_type'=>'skills'
            );
            $skills=new WP_Query($args);
            while($skills->have_posts()){ 
                $skills->the_post();?>              
                <div class="col-md-4 casella-skills">
                    <div class="cercle-skill">
                    <div class="titol-skill"><?php the_title("<h3>","</h3>");?></div>                    
                    <div class="cos-skill">
                        <?php $imagen=get_field("icono");  
                        $size = "icono-skill"; 
                        $imatgeFinal=wp_get_attachment_image_src($imagen,$size)?>

                            <div class="progress <?php echo get_field("progreso");?>">
                                <span class="progress-left">
                                    <span class="progress-bar"></span>
                                </span>
                                <span class="progress-right">
                                    <span class="progress-bar"></span>
                                </span>
                                <div class="progress-value icono-skill">
                                        <img src="<?php echo $imatgeFinal[0];?>"></img>
                                </div>
                            </div>
                        <?php the_content();?>
                    </div>
                    </div>
                    
                </div>
            <?php } wp_reset_postdata(); ?>
            </div>
        </div>
        <section class="feina feina-projectes" id="ancla-projectes">
        <div class="container-fluid feina-contenidor">
                    <div class="row fila-feina"  style="background-image: url(<?php echo get_theme_mod('my-project-foto');?>)">
                        <div class="hero-image col-md-12">
                            <div class="hero-text">
                                <h1><?php echo get_theme_mod( 'my-project-title' ); ?></h1>
                                <p><?php echo get_theme_mod( 'my-project-text' ); ?></p>
                                <a class="btn btn-success" href="<?php echo get_theme_mod( 'my-project-link-btn', get_home_url() );?> " role="button"><?php echo get_theme_mod( 'my-project-text-btn' ); ?></a>
                            </div>
                        </div> 
                    </div>        
            </div>
        </div>
    </section>
    </section>
    <section class="aptituds" id="ancla-aptituds">
        <div class="container-fluid aptituds-contenidor">
        <h2 class="titol2">Aptituds i altres dades</h2>
            <div class="row ">                
                <div class="col-md-12 text-informacio">
                    <div class="col-md-4 llista-aptituds">
                        <ul>
                        <?php 
                                $args=array(
                                    'posts_per_page'=>9999,
                                    'post_type'=>'post',
                                    'category_name'=>'aptituds',
                                    'order' => 'ASC'
                                );
                                $estudis=new WP_Query($args);
                                while($estudis->have_posts()){ 
                                    $estudis->the_post();?> 
                            
                                <li><?php the_content();?></li>
                        
                                <?php }; wp_reset_postdata();?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php get_footer();?>