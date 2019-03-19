<?php
/*Setup incial del functions.php */
function temacv_setup(){
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
    
    add_image_size( 'header-image', 1900, 360, true );
    add_image_size( 'foto-carnet', 200, 250, true );
    add_image_size( 'icono-skill', 90, 90, true );
}
/**Despres de que algú seleccioni el tema s'executa el mètode */
add_action('after_setup_theme','temacv_setup');

function temacv_styles(){
        //Registrar docs CSS
        wp_register_style( 'normalize', 'https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.css', array(),'8.0.0');
        wp_register_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.0.7/css/all.css' );
        wp_register_style( 'google_fonts', "https://fonts.googleapis.com/css?family=Fredericka+the+Great|Handlee|Nixie+One|Poiret+One|Quicksand", array(), '1.0.0' );
		wp_register_style( 'style', get_template_directory_uri().'/style.css', array('normalize'), '1.0');
		wp_register_style( 'fluidboxcss', 'https://cdnjs.cloudflare.com/ajax/libs/fluidbox/2.0.5/css/fluidbox.min.css',array(), '1.0' );
        wp_register_style( 'bootstrap','https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css');
        wp_register_style( 'animateCSS','https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css');


        //Apliquem els CSS
		wp_enqueue_style('normalize');
        wp_enqueue_style( 'fontawesome');
        wp_enqueue_style( 'google_fonts' );
        wp_enqueue_style( 'fluidboxcss' );
        wp_enqueue_style( 'bootstrap');
        wp_enqueue_style( 'animateCSS');
        wp_enqueue_style('style');
        

        //Afegim els JS
        
        wp_register_script( 'scripts', get_template_directory_uri().'/js/scripts.js', array(), '1.0.0',true );
		wp_register_script( 'fluidboxjs', 'https://cdnjs.cloudflare.com/ajax/libs/fluidbox/2.0.5/js/jquery.fluidbox.min.js',array(), '1.0.0',true);
		wp_register_script( 'debounce', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js',array(), '1.0.0',true);
		wp_register_script( 'modernizr', 'https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js',array(), '2.8.3',true);
        wp_register_script( 'bootstrapjs', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js',array(), '4.1.1',true);
        wp_register_script( 'waypoints', get_template_directory_uri().'/js/jquery.waypoints.min.js', array(), '1.0.0',true );

		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'jquery-ui-core' );
		wp_enqueue_script( 'jquery-ui-datepicker' );
		wp_enqueue_script( 'modernizr' );
        wp_enqueue_script( 'debounce' );
        wp_enqueue_script( 'fluidboxjs' );
        wp_enqueue_script( 'bootstrapjs' );
        wp_enqueue_script( 'scripts' );
        wp_enqueue_script( 'waypoints' );
}
add_action('wp_enqueue_scripts','temacv_styles');

//Creem les posicions del menu
    function temacv_menus(){
        register_nav_menus( array(
            'header-menu' => __('Header Menu','temacv'),
            'social-menu' => __('Social Menu','temacv')
        ));
    }

    //Al inciar ens posa els menus
    add_action('init','temacv_menus');

    
    /*CUSTOMIZER*/
    function temacv_customize_register($wp_customize){
        $wp_customize->add_section('temacv-header',array(
            'title' => __('Config. Header','temacv'),
            'priority'=>9
        ));
        $wp_customize->add_setting(
            'header-text',
            array('sanitize_callback' => 'sanitize_text_field')
        );
    
        $wp_customize->add_control(
            new WP_Customize_Control($wp_customize,
            'header-text',
            array(
                'label' => __('Text Header: '),
                'type' => 'text',
                'section' => 'temacv-header',
                'settings' => 'header-text'
            )
            )
            );
            $wp_customize->add_setting(
                'header-foto'        
            );

            $wp_customize->add_control(
                new WP_Customize_Image_Control($wp_customize,
                'header-foto',
                array(
                    'label' => __('Background Image: '),
                    'section' => 'temacv-header',
                    'settings' => 'header-foto'
                )
                )
                );


        $wp_customize->add_section('temacv-dades',array(
            'title' => __('Dades Personals','temacv'),
            'priority'=>10
        ));

        /* NOM */
        $wp_customize->add_setting(
            'dades-personals-nom',
            array('sanitize_callback' => 'sanitize_text_field')
        );

        $wp_customize->add_control(
            new WP_Customize_Control($wp_customize,
            'dades-personals-nom',
            array(
                'label' => __('Nom: '),
                'type' => 'text',
                'section' => 'temacv-dades',
                'settings' => 'dades-personals-nom'
            )
            )
            );
        /*DATA NAIXAMENT*/
        $wp_customize->add_setting(
            'dades-personals-data',
            array('sanitize_callback' => 'sanitize_text_field')
        );

        $wp_customize->add_control(
            new WP_Customize_Control($wp_customize,
            'dades-personals-data',
            array(
                'label' => __('Data Naixment: '),
                'type' => 'date',
                'section' => 'temacv-dades',
                'settings' => 'dades-personals-data'
            )
            )
            );
        /*ADREÇA*/
        $wp_customize->add_setting(
            'dades-personals-adreça',
            array('sanitize_callback' => 'sanitize_text_field')
        );

        $wp_customize->add_control(
            new WP_Customize_Control($wp_customize,
            'dades-personals-adreça',
            array(
                'label' => __('Adreça: '),
                'type' => 'text',
                'section' => 'temacv-dades',
                'settings' => 'dades-personals-adreça'
            )
            )
            );
        /*TELEFON*/
        $wp_customize->add_setting(
            'dades-personals-telefon',
            array('sanitize_callback' => 'sanitize_text_field')
        );

        $wp_customize->add_control(
            new WP_Customize_Control($wp_customize,
            'dades-personals-telefon',
            array(
                'label' => __('Telèfon: '),
                'type' => 'text',
                'section' => 'temacv-dades',
                'settings' => 'dades-personals-telefon'
            )
            )
            );
        /*MÒBIL*/
        $wp_customize->add_setting(
            'dades-personals-mobil',
            array('sanitize_callback' => 'sanitize_text_field')
        );

        $wp_customize->add_control(
            new WP_Customize_Control($wp_customize,
            'dades-personals-mobil',
            array(
                'label' => __('Mòbil: '),
                'type' => 'text',
                'section' => 'temacv-dades',
                'settings' => 'dades-personals-mobil'
            )
            )
            );
        /*E-MAIL*/
        $wp_customize->add_setting(
            'dades-personals-mail',
            array('sanitize_callback' => 'sanitize_email')
        );

        $wp_customize->add_control(
            new WP_Customize_Control($wp_customize,
            'dades-personals-mail',
            array(
                'label' => __('Adreça correu: '),
                'type' => 'email',
                'section' => 'temacv-dades',
                'settings' => 'dades-personals-mail'
            )
            )
            );
        /*Foto Perfil*/
        $wp_customize->add_setting(
            'dades-personals-foto'        
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control($wp_customize,
            'dades-personals-foto',
            array(
                'label' => __('Imatge de Perfil: '),
                'section' => 'temacv-dades',
                'settings' => 'dades-personals-foto'
            )
            )
            );

            /*SECTION JOB */
            $wp_customize->add_section('temacv-job',array(
                'title' => __('Vida Laboral','temacv'),
                'priority'=>10
            ));
        
            /* NOM */
            $wp_customize->add_setting(
                'my-job-title',
                array('sanitize_callback' => 'sanitize_text_field')
            );
        
            $wp_customize->add_control(
                new WP_Customize_Control($wp_customize,
                'my-job-title',
                array(
                    'label' => __('Titol: '),
                    'type' => 'text',
                    'section' => 'temacv-job',
                    'settings' => 'my-job-title'
                )
                )
                );
        /* TEXT INFO */
            $wp_customize->add_setting(
                'my-job-text',
                array('sanitize_callback' => 'sanitize_text_field')
            );
        
            $wp_customize->add_control(
                new WP_Customize_Control($wp_customize,
                'my-job-text',
                array(
                    'label' => __('Text Informatiu: '),
                    'type' => 'textarea',
                    'section' => 'temacv-job',
                    'settings' => 'my-job-text'
                )
                )
                );

            /*Foto Background*/
            $wp_customize->add_setting(
                'my-job-foto'        
            );

            $wp_customize->add_control(
                new WP_Customize_Image_Control($wp_customize,
                'my-job-foto',
                array(
                    'label' => __('Background Image: '),
                    'section' => 'temacv-job',
                    'settings' => 'my-job-foto'
                )
                )
                );
            /* Button Text */
            $wp_customize->add_setting(
                'my-job-text-btn',
                array('sanitize_callback' => 'sanitize_text_field')
            );
        
            $wp_customize->add_control(
                new WP_Customize_Control($wp_customize,
                'my-job-text-btn',
                array(
                    'label' => __('Button Text: '),
                    'type' => 'text',
                    'section' => 'temacv-job',
                    'settings' => 'my-job-text-btn'
                )
                )
                );
            /* Button Text */
            $wp_customize->add_setting(
                'my-job-link-btn',
                array('sanitize_callback' => 'sanitize_text_field')
            );
        
            $wp_customize->add_control(
                new WP_Customize_Control($wp_customize,
                'my-job-link-btn',
                array(
                    'label' => __('Button Link: '),
                    'type' => 'text',
                    'section' => 'temacv-job',
                    'settings' => 'my-job-link-btn'
                )
                )
                );
            /* secció projectes */
            /*SECTION JOB */
            $wp_customize->add_section('temacv-project',array(
                'title' => __('Projectes','temacv'),
                'priority'=>12
            ));
        
            /* NOM */
            $wp_customize->add_setting(
                'my-project-title',
                array('sanitize_callback' => 'sanitize_text_field')
            );
        
            $wp_customize->add_control(
                new WP_Customize_Control($wp_customize,
                'my-project-title',
                array(
                    'label' => __('Titol: '),
                    'type' => 'text',
                    'section' => 'temacv-project',
                    'settings' => 'my-project-title'
                )
                )
                );
            $wp_customize->add_setting(
                'my-project-text',
                array('sanitize_callback' => 'sanitize_text_field')
            );
        
            $wp_customize->add_control(
                new WP_Customize_Control($wp_customize,
                'my-project-text',
                array(
                    'label' => __('Text Informatiu: '),
                    'type' => 'textarea',
                    'section' => 'temacv-project',
                    'settings' => 'my-project-text'
                )
                )
                );

            /*Foto Background*/
            $wp_customize->add_setting(
                'my-project-foto'        
            );

            $wp_customize->add_control(
                new WP_Customize_Image_Control($wp_customize,
                'my-project-foto',
                array(
                    'label' => __('Background Image: '),
                    'section' => 'temacv-project',
                    'settings' => 'my-project-foto'
                )
                )
                );
            /* Button Text */
            $wp_customize->add_setting(
                'my-project-text-btn',
                array('sanitize_callback' => 'sanitize_text_field')
            );
        
            $wp_customize->add_control(
                new WP_Customize_Control($wp_customize,
                'my-project-text-btn',
                array(
                    'label' => __('Button Text: '),
                    'type' => 'text',
                    'section' => 'temacv-project',
                    'settings' => 'my-project-text-btn'
                )
                )
                );
                /* Button Text */
                $wp_customize->add_setting(
                    'my-project-link-btn',
                    array('sanitize_callback' => 'sanitize_text_field')
                );
            
                $wp_customize->add_control(
                    new WP_Customize_Control($wp_customize,
                    'my-project-link-btn',
                    array(
                        'label' => __('Button Link: '),
                        'type' => 'text',
                        'section' => 'temacv-project',
                        'settings' => 'my-project-link-btn'
                    )
                    )
                    );

    }    
  
    add_action( 'customize_register', 'temacv_customize_register' );
    
    add_filter( 'image_size_customizer', 'midesImatges' );
    function midesImatges( $sizes ) {
        return array_merge( $sizes, array(
            'header-image' => __( 'Foto Header' ),
            'foto-carnet' => __( 'Foto Carnet' ),
        ) );
    }
    /*CUSTOM POST TYPE */
add_action( 'init', 'temacv_feines' );
function temacv_feines() {
	$labels = array(
		'name'               => _x( 'Jobs', 'temacv' ),
		'singular_name'      => _x( 'Jobs', 'post type singular name', 'temacv' ),
		'menu_name'          => _x( 'Jobs', 'admin menu', 'temacv' ),
		'name_admin_bar'     => _x( 'Jobs', 'add new on admin bar', 'temacv' ),
		'add_new'            => _x( 'Add New', 'book', 'temacv' ),
		'add_new_item'       => __( 'Add New Job', 'temacv' ),
		'new_item'           => __( 'New Job', 'temacv' ),
		'edit_item'          => __( 'Edit Job', 'temacv' ),
		'view_item'          => __( 'View Jobs', 'temacv' ),
		'all_items'          => __( 'All Jobs', 'temacv' ),
		'search_items'       => __( 'Search Job', 'temacv' ),
		'parent_item_colon'  => __( 'Parent Job:', 'temacv' ),
		'not_found'          => __( 'No Jobs found.', 'temacv' ),
		'not_found_in_trash' => __( 'No Jobs found in Trash.', 'temacv' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'temacv' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'jobs' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 6,
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies'          => array( 'category' ),
	);

	register_post_type( 'jobs', $args );
}

    /*CUSTOM POST TYPE */
    add_action( 'init', 'temacv_skills' );
    function temacv_skills() {
        $labels = array(
            'name'               => _x( 'Skills', 'temacv' ),
            'singular_name'      => _x( 'Skills', 'post type singular name', 'temacv' ),
            'menu_name'          => _x( 'Skills', 'admin menu', 'temacv' ),
            'name_admin_bar'     => _x( 'Skills', 'add new on admin bar', 'temacv' ),
            'add_new'            => _x( 'Add New', 'book', 'temacv' ),
            'add_new_item'       => __( 'Add New Skill', 'temacv' ),
            'new_item'           => __( 'New Skill', 'temacv' ),
            'edit_item'          => __( 'Edit Skill', 'temacv' ),
            'view_item'          => __( 'View Skill', 'temacv' ),
            'all_items'          => __( 'All Skills', 'temacv' ),
            'search_items'       => __( 'Search Skill', 'temacv' ),
            'parent_item_colon'  => __( 'Parent Skill:', 'temacv' ),
            'not_found'          => __( 'No Skills found.', 'temacv' ),
            'not_found_in_trash' => __( 'No Skills found in Trash.', 'temacv' )
        );
    
        $args = array(
            'labels'             => $labels,
            'description'        => __( 'Description.', 'temacv' ),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'skills' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 6,
            'supports'           => array( 'title', 'editor', 'thumbnail' ),
            'taxonomies'          => array( 'category' ),
        );
    
        register_post_type( 'skills', $args );
    }
?>