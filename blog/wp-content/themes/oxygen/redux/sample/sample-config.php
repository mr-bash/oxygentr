<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    global $opt_data;
    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "opt_data";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $art_1 = '';
    if ( file_exists( dirname( __FILE__ ) . '/art_1.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $art_1 = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/art_1.html' );
    }

    $art_2 = '';
    if ( file_exists( dirname( __FILE__ ) . '/art_2.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $art_2 = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/art_2.html' );
    }

    $art_3 = '';
    if ( file_exists( dirname( __FILE__ ) . '/art_3.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $art_3 = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/art_3.html' );
    }

    $art_4 = '';
    if ( file_exists( dirname( __FILE__ ) . '/art_4.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $art_4 = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/art_4.html' );
    }

    $art_5 = '';
    if ( file_exists( dirname( __FILE__ ) . '/art_5.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $art_5 = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/art_5.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();
    
    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'خيارات مخصصة', 'redux-framework-demo' ),
        'page_title'           => __( 'خيارات مخصصة', 'redux-framework-demo' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => 'dashicons-admin-generic',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => false,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );
    

    // Add content after the form.
    // $args['footer_text'] = __( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'redux-framework-demo' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */
    /*
    // ===================================================================================

    // ======================== Option General =========================
    
    // ===================================================================================
    */

    // -> START Basic Fields
    Redux::setSection( $opt_name, array(
        'title'            => __( 'خيارات القالب', 'parent_menu' ),
        'id'               => 'general',
        'desc'             => __( 'This Is General Options', 'parent_menu' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-home'
    ) );

    /*
    // ===================================================================================

    // ============================== Custom Function ==============================
    
    // ===================================================================================
    */

    $args_posts = array(

        'post_status'	  =>    'publish',
        'posts_per_page'  =>    -1,

    );
    $my_posts = array();

    $all_posts = new WP_Query($args_posts);

    if($all_posts->have_posts()) {

        while($all_posts->have_posts()) {

            $all_posts->the_post();

            $my_posts[get_the_ID()] = the_title('', '', false);
        }

    }
    wp_reset_postdata();


    /*
    // ===================================================================================

    // ============================== Option Section Header ==============================
    
    // ===================================================================================
    */
    Redux::setSection( $opt_name, array(
        'title'            => __( 'المقالات المثبتة', 'fixed' ),
        'id'               => 'header',
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             => __( 'لتثبيت مقالات محددة في الترويسة ', 'fixed' ),
        'fields'           => array(
            array(
                'id'       => 'content_art1',
                'type'     => 'raw',
                'content'  => $art_1,
            ),
            array(
                'id'       => 'select_art1',
                'type'     => 'select',
                'title'    => __( 'أختر المقال لتثبيتها في المكان المحدد بالأعلى', 'home_page_section' ),
                //Must provide key => value pairs for select options
                'options'  => array(
                    '' => $my_posts,
                    'Group 2' => array(
                        
                    ),
                    
                    
                ),
            ),
            array(
                'id'       => 'content_art2',
                'type'     => 'raw',
                'content'  => $art_2,
            ),
            array(
                'id'       => 'select_art2',
                'type'     => 'select',
                'title'    => __( 'أختر المقال لتثبيتها في المكان المحدد بالأعلى', 'home_page_section' ),
                //Must provide key => value pairs for select options
                'options'  => array(
                    '' => $my_posts,
                    'Group 2' => array(
                        
                    ),
                    
                    
                ),
            ),
            array(
                'id'       => 'content_art3',
                'type'     => 'raw',
                'content'  => $art_3,
            ),
            array(
                'id'       => 'select_art3',
                'type'     => 'select',
                'title'    => __( 'أختر المقال لتثبيتها في المكان المحدد بالأعلى', 'home_page_section' ),
                //Must provide key => value pairs for select options
                'options'  => array(
                    '' => $my_posts,
                    'Group 2' => array(
                        
                    ),
                    
                    
                ),
            ),
            array(
                'id'       => 'content_art4',
                'type'     => 'raw',
                'content'  => $art_4,
            ),
            array(
                'id'       => 'select_art4',
                'type'     => 'select',
                'title'    => __( 'أختر المقال لتثبيتها في المكان المحدد بالأعلى', 'home_page_section' ),
                //Must provide key => value pairs for select options
                'options'  => array(
                    '' => $my_posts,
                    'Group 2' => array(
                        
                    ),
                    
                    
                ),
            ),
            array(
                'id'       => 'content_art5',
                'type'     => 'raw',
                'content'  => $art_5,
            ),
            array(
                'id'       => 'select_art5',
                'type'     => 'select',
                'title'    => __( 'أختر المقال لتثبيتها في المكان المحدد بالأعلى', 'home_page_section' ),
                //Must provide key => value pairs for select options
                'options'  => array(
                    '' => $my_posts,
                    'Group 2' => array(
                        
                    ),
                    
                    
                ),
            ),

            
        )
    ));

    /*
    // ===================================================================================


    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'redux-framework-demo' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework-demo' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

