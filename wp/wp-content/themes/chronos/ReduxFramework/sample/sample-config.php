<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "theme_option";


    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
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

    /*
     *
     * --> Action hook examples
     *
     */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');


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
        'menu_title'           => __( 'Chronos Options', 'redux-framework-demo' ),
        'page_title'           => __( 'Chronos Options', 'redux-framework-demo' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
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
        'dev_mode'             => true,
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
        'menu_icon'            => '',
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
        'show_import_export'   => true,
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
        'system_info'          => false,
        // REMOVE

        //'compiler'             => true,

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'light',
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

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
        'id'    => 'redux-docs',
        'href'  => 'http://docs.reduxframework.com/',
        'title' => __( 'Documentation', 'redux-framework-demo' ),
    );

    $args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
        'title' => __( 'Support', 'redux-framework-demo' ),
    );

    $args['admin_bar_links'][] = array(
        'id'    => 'redux-extensions',
        'href'  => 'reduxframework.com/extensions',
        'title' => __( 'Extensions', 'redux-framework-demo' ),
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
        'title' => 'Visit us on GitHub',
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/reduxframework',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://www.linkedin.com/company/redux-framework',
        'title' => 'Find us on LinkedIn',
        'icon'  => 'el el-linkedin'
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'redux-framework-demo' ), $v );
    } else {
        $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'redux-framework-demo' );
    }

    // Add content after the form.
    $args['footer_text'] = __( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'redux-framework-demo' );

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

    // -> START Basic Fields
	Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-cogs',
                'title' => __('General Settings', 'chronos'),
                'fields' => array(                  
                    array(
                        'id' => 'google_id',
                        'type' => 'textarea',
                        'title' => __('Google Analytics Code javascript', 'chronos'),
                        'subtitle' => __('Input Javascript Code', 'chronos'),
                        'desc' => __('', 'chronos'),
                        'default' => ''
                    ),
                    array(
                        'id' => 'seo_des',
                        'type' => 'textarea',
                        'title' => __('SEO Description', 'chronos'),
                        'subtitle' => __('', 'chronos'),
                        'desc' => __('', 'chronos'),
                        'default' => ''
                    ),
                    array(
                        'id' => 'seo_key',
                        'type' => 'textarea',
                        'title' => __('SEO Keywords', 'chronos'),
                        'subtitle' => __('', 'chronos'),
                        'desc' => __('', 'chronos'),
                        'default' => ''
                    ), 
                )
            ) );
            
            Redux::setSection( $opt_name, array(
                'icon' => ' el-icon-picture',
                'title' => __('Logo & Favicon Settings', 'chronos'),
                'fields' => array(
                    array(
                        'id'       => 'preload',
                        'type'     => 'select',
                        'title'    => __('Select Style Preload', 'chronos'), 
                        'subtitle' => __('You can choose style Preload is Text Or Number', 'chronos'),
                        'desc'     => __('Select Style Preload', 'chronos'),
                        // Must provide key => value pairs for select options
                        'options'  => array(
                        'text' => 'Text',
                        'number' => 'Number',
                        ),
                        'default'  => 'text',
                    ),
                    array(
                        'id' => 'preload_text',
                        'type' => 'text',
                        'title' => __('Text Of Preload', 'chronos'),
                        'subtitle' => __('Text Of Preload Theme.Ex: Chronos', 'chronos'),
                        'desc' => __('', 'chronos'),
                        'default' => 'Chronos'
                    ),  
                    array(
                        'id' => 'favicon',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Custom Favicon', 'chronos'),
                        'compiler' => 'true',
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc' => __('Upload your Favicon.', 'chronos'),
                        'subtitle' => __('', 'chronos'),
                        'default' => array('url' => get_template_directory_uri().'/images/favicon.png'),
                    ),
                    array(
                        'id' => 'logo',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Logo', 'chronos'),
                        'compiler' => 'true',
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc' => __('Upload your logo.', 'chronos'),
                        'subtitle' => __('Recommended size: Height: 80px and Width: 100px', 'chronos'),
                        'default' => array('url' => get_template_directory_uri().'/images/logo.png'),
                    ),      
                    array(
                        'id' => 'logo_width',
                        'type' => 'text',
                        'title' => __('Fix Width Logo, Default: 100px', 'chronos'),
                        'subtitle' => __('Input Width logo', 'chronos'),
                        'desc' => __('', 'chronos'),
                        'default' => '146px'
                    ),  
                    array(
                        'id' => 'logo_height',
                        'type' => 'text',
                        'title' => __('Fix Height Logo, Default: 81px', 'chronos'),
                        'subtitle' => __('Input Height Logo', 'chronos'),
                        'desc' => __('', 'chronos'),
                        'default' => '80px'
                    ),              
                    array(
                        'id' => 'logo2_width',
                        'type' => 'text',
                        'title' => __('Fix Width Logo 2 for scroll, Default: 80px', 'chronos'),
                        'subtitle' => __('Input Width logo 2 for scroll', 'chronos'),
                        'desc' => __('', 'chronos'),
                        'default' => '116px'
                    ),  
                    array(
                        'id' => 'logo2_height',
                        'type' => 'text',
                        'title' => __('Fix Height Logo 2 for scroll, Default: 62px', 'chronos'),
                        'subtitle' => __('Input Height Logo 2 for scroll', 'chronos'),
                        'desc' => __('', 'chronos'),
                        'default' => '60px'
                    ),  
                    //logo Dark
                    array(
                        'id' => 'logo_dark',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Logo Dark', 'chronos'),
                        'compiler' => 'true',
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc' => __('Upload your logo version Dark.', 'chronos'),
                        'subtitle' => __('Recommended size: Height: 80px and Width: 146px', 'chronos'),
                        'default' => array('url' => get_template_directory_uri().'/images/logo_dark.png'),
                    ),      
                    array(
                        'id' => 'logo_width_dark',
                        'type' => 'text',
                        'title' => __('Fix Width Logo, Default: 146px', 'chronos'),
                        'subtitle' => __('Input Width logo', 'chronos'),
                        'desc' => __('', 'chronos'),
                        'default' => '146px'
                    ),  
                    array(
                        'id' => 'logo_height_dark',
                        'type' => 'text',
                        'title' => __('Fix Height Logo, Default: 80px', 'chronos'),
                        'subtitle' => __('Input Height Logo', 'chronos'),
                        'desc' => __('', 'chronos'),
                        'default' => '80px'
                    ),          
                    array(
                        'id' => 'logo2_dark',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Logo 2 version Dark for scroll  down', 'chronos'),
                        'compiler' => 'true',
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc' => __('Upload your logo 2 Dark Version.', 'chronos'),
                        'subtitle' => __('Recommended size: Height: 60px and Width: 116px', 'chronos'),
                        'default' => array('url' => get_template_directory_uri().'/images/logo_dark.png'),
                    ),      
                    array(
                        'id' => 'logo2_width_dark',
                        'type' => 'text',
                        'title' => __('Fix Width Logo 2 Dark Version, Default: 116px', 'chronos'),
                        'subtitle' => __('Input Width logo 2', 'chronos'),
                        'desc' => __('', 'chronos'),
                        'default' => '116px'
                    ),  
                    array(
                        'id' => 'logo2_height_dark',
                        'type' => 'text',
                        'title' => __('Fix Height Logo 2 dark version., Default: 60px', 'chronos'),
                        'subtitle' => __('Input Height Logo 2', 'chronos'),
                        'desc' => __('', 'chronos'),
                        'default' => '60px'
                    ),  
                    array(
                        'id' => 'apple_icon',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Apple Touch Icon 57x57', 'chronos'),
                        'compiler' => 'true',
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc' => __('Upload your Apple touch icon 57x57.', 'chronos'),
                        'subtitle' => __('', 'chronos'),
                        'default' => array('url' => get_template_directory_uri().'/images/apple-touch-icon.png'),
                    ),                  
                    array(
                        'id' => 'apple_icon_72',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Apple Touch Icon 72x72', 'chronos'),
                        'compiler' => 'true',
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc' => __('Upload your Apple touch icon 72x72.', 'chronos'),
                        'subtitle' => __('', 'chronos'),
                        'default' => array('url' => get_template_directory_uri().'/images/apple-touch-icon-72x72.png'),
                    ),
                    array(
                        'id' => 'apple_icon_114',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Apple Touch Icon 114x114', 'chronos'),
                        'compiler' => 'true',
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc' => __('Upload your Apple touch icon 114x114.', 'chronos'),
                        'subtitle' => __('', 'chronos'),
                        'default' => array('url' => get_template_directory_uri().'/images/apple-touch-icon-114x114.png'),
                    ),                  
                )
            ) );
            
            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-list',
                'title' => __('Blog Settings', 'chronos'),
                'fields' => array(
                    array(
                        'id' => 'blog_title',
                        'type' => 'text',
                        'title' => __('Blog Title', 'chronos'),
                        'subtitle' => __('Input Blog Title', 'chronos'),
                        'desc' => __('', 'chronos'),
                        'default' => 'blog'
                    ),      
                    array(
                        'id' => 'blog_subtitle',
                        'type' => 'text',
                        'title' => __('Blog Subtitle', 'chronos'),
                        'subtitle' => __('Input Blog Subtitle', 'chronos'),
                        'desc' => __('', 'chronos'),
                        'default' => 'A blog is your best bet for a voice among the online crowd.'
                    ),
                    array(
                        'id' => 'blog_posted',
                        'type' => 'text',
                        'title' => __('Blog Posted at', 'chronos'),
                        'subtitle' => __('Text Posted at', 'chronos'),
                        'desc' => __('', 'chronos'),
                        'default' => 'Posted at'
                    ),  
                    array(
                        'id' => 'blog_in',
                        'type' => 'text',
                        'title' => __('Blog in', 'chronos'),
                        'subtitle' => __('Text blog In', 'chronos'),
                        'desc' => __('', 'chronos'),
                        'default' => 'In'
                    ),
                    array(
                        'id' => 'blog_by',
                        'type' => 'text',
                        'title' => __('Blog by', 'chronos'),
                        'subtitle' => __('Text By', 'chronos'),
                        'desc' => __('', 'chronos'),
                        'default' => 'By'
                    ),  
                    array(
                        'id' => 'blog_excerpt',
                        'type' => 'text',
                        'title' => __('Blog custom excerpt leng', 'chronos'),
                        'subtitle' => __('Input Blog custom excerpt leng', 'chronos'),
                        'desc' => __('', 'chronos'),
                        'default' => '30'
                    ),  
                    array(
                        'id' => 'blog_readmore',
                        'type' => 'text',
                        'title' => __('Blog Read More', 'chronos'),
                        'subtitle' => __('Read More', 'chronos'),
                        'desc' => __('', 'chronos'),
                        'default' => 'Read More'
                    ),  
                 )
            ) );
            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-list',
                'title' => __('Portfolio Settings', 'chronos'),
                'fields' => array(
                    array(
                        'id'       => 'style_color',
                        'type'     => 'select',
                        'title'    => __('Selected Style Portfolio Dark or light.', 'chronos'), 
                        'subtitle' => __('Selected Style Portfolio Dark or light.', 'chronos'),
                        'desc'     => __('Select Style portfolio', 'chronos'),
                        // Must provide key => value pairs for select options
                        'options'  => array(
                        'dark' => 'Dark',
                        'light' => 'Light',
                        ),
                        'default'  => 'dark',
                    ),
                 )
            ) );
            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-graph',
                'title' => __('404 Settings', 'chronos'),
                'fields' => array(
                     array(
                        'id' => '404_title',
                        'type' => 'text',
                        'title' => __('404 Title', 'chronos'),
                        'subtitle' => __('Input 404 Title', 'chronos'),
                        'desc' => __('', 'chronos'),
                        'default' => '404'
                    ),                              
                     array(
                        'id' => '404_content',
                        'type' => 'editor',
                        'title' => __('404 Content', 'chronos'),
                        'subtitle' => __('Enter 404 Content', 'chronos'),
                        'desc' => __('', 'chronos'),
                        'default' => 'The page you are looking for no longer exists. Perhaps you can return back to the sites homepage see you can find what you are looking for.'
                    ),                   
                 )
            ) );

            Redux::setSection( $opt_name, array(
                'icon' => ' el-icon-credit-card',
                'title' => __('Footer Settings', 'chronos'),
                'fields' => array(                      
                    array(
                        'id' => 'footer_text',
                        'type' => 'editor',
                        'title' => __('Footer Text', 'chronos'),
                        'subtitle' => __('Copyright Text', 'chronos'),
                        'default' => '<p>Made with<i class="icon-footer fa-heart"></i>and<i class="icon-footer fa-coffee"></i>in serbia</p>',
                    ),
                    array(
                        'id' => 'footer_info',
                        'type' => 'text',
                        'title' => __('Text Footer By.', 'chronos'),
                        'subtitle' => __('Text Footer By.', 'chronos'),
                        'desc' => __('', 'chronos'),
                        'default' => 'TEMPLATE: ONE CLICK BY Vergatheme'
                    ),
                            
                )
            ) );
            Redux::setSection( $opt_name, array(
                'icon' => ' el-icon-credit-card',
                'title' => __('Button Option Settings', 'chronos'),
                'fields' => array(                      
                    array(
                        'id' => 'rtl',
                        'type' => 'checkbox',
                        'title' => __('On or Off Button Options.', 'chronos'),
                        'subtitle' => '',
                        'desc' => '',
                        'default' => '0'// 1 = on | 0 = off
                    ),
                    array(
                        'id' => 'text1',
                        'type' => 'text',
                        'title' => __('Text Home Version 1.', 'chronos'),
                        'subtitle' => __('Text Home Version.', 'chronos'),
                        'desc' => __('', 'chronos'),
                        'default' => 'Revolution Slider'
                    ),
                    array(
                        'id' => 'link1',
                        'type' => 'text',
                        'title' => __('Link for Home Version 1.', 'chronos'),
                        'subtitle' => __('Link for Home Version 1.', 'chronos'),
                        'desc' => __('', 'chronos'),
                        'default' => 'http://vergatheme.com/demosd/chronos/'
                    ),

                    array(
                        'id' => 'text2',
                        'type' => 'text',
                        'title' => __('Text Home Version 2.', 'chronos'),
                        'subtitle' => __('Text Home Version.', 'chronos'),
                        'desc' => __('', 'chronos'),
                        'default' => 'Video Version'
                    ),
                    array(
                        'id' => 'link2',
                        'type' => 'text',
                        'title' => __('Link for Home Version 2.', 'chronos'),
                        'subtitle' => __('Link for Home Version 2.', 'chronos'),
                        'desc' => __('', 'chronos'),
                        'default' => 'http://vergatheme.com/demosd/chronos/?page_id=240'
                    ),

                    array(
                        'id' => 'text3',
                        'type' => 'text',
                        'title' => __('Text Home Version 3.', 'chronos'),
                        'subtitle' => __('Text Home Version.', 'chronos'),
                        'desc' => __('', 'chronos'),
                        'default' => 'Parallax Version'
                    ),
                    array(
                        'id' => 'link3',
                        'type' => 'text',
                        'title' => __('Link for Home Version 3.', 'chronos'),
                        'subtitle' => __('Link for Home Version 3.', 'chronos'),
                        'desc' => __('', 'chronos'),
                        'default' => 'http://vergatheme.com/demosd/chronos/?page_id=248'
                    ),

                    array(
                        'id' => 'text4',
                        'type' => 'text',
                        'title' => __('Text Home Version 4.', 'chronos'),
                        'subtitle' => __('Text Home Version.', 'chronos'),
                        'desc' => __('', 'chronos'),
                        'default' => 'Light Version'
                    ),
                    array(
                        'id' => 'link4',
                        'type' => 'text',
                        'title' => __('Link for Home Version 4.', 'chronos'),
                        'subtitle' => __('Link for Home Version 4.', 'chronos'),
                        'desc' => __('', 'chronos'),
                        'default' => 'http://vergatheme.com/demosd/chronos/?page_id=269'
                    ),

                    array(
                        'id' => 'text5',
                        'type' => 'text',
                        'title' => __('Text Home Version 5.', 'chronos'),
                        'subtitle' => __('Text Home Version.', 'chronos'),
                        'desc' => __('', 'chronos'),
                        'default' => 'Ajax Portfolio'
                    ),
                    array(
                        'id' => 'link5',
                        'type' => 'text',
                        'title' => __('Link for Home Version 5.', 'chronos'),
                        'subtitle' => __('Link for Home Version 5.', 'chronos'),
                        'desc' => __('', 'chronos'),
                        'default' => 'http://vergatheme.com/demosd/chronos/?page_id=32'
                    ),

                    array(
                        'id' => 'text6',
                        'type' => 'text',
                        'title' => __('Text Home Version 6.', 'chronos'),
                        'subtitle' => __('Text Home Version.', 'chronos'),
                        'desc' => __('', 'chronos'),
                        'default' => 'Ajax(dark)'
                    ),
                    array(
                        'id' => 'link6',
                        'type' => 'text',
                        'title' => __('Link for Home Version 6.', 'chronos'),
                        'subtitle' => __('Link for Home Version 6.', 'chronos'),
                        'desc' => __('', 'chronos'),
                        'default' => 'http://vergatheme.com/demosd/chronos/?page_id=272'
                    ),

                    array(
                        'id' => 'text7',
                        'type' => 'text',
                        'title' => __('Text Home Version 7.', 'chronos'),
                        'subtitle' => __('Text Home Version.', 'chronos'),
                        'desc' => __('', 'chronos'),
                        'default' => 'Moving Home'
                    ),
                    array(
                        'id' => 'link7',
                        'type' => 'text',
                        'title' => __('Link for Home Version 7.', 'chronos'),
                        'subtitle' => __('Link for Home Version 7.', 'chronos'),
                        'desc' => __('', 'chronos'),
                        'default' => 'http://vergatheme.com/demosd/chronos/?page_id=257'
                    ),

                    array(
                        'id' => 'text8',
                        'type' => 'text',
                        'title' => __('Text Home Version 8.', 'chronos'),
                        'subtitle' => __('Text Home Version.', 'chronos'),
                        'desc' => __('', 'chronos'),
                        'default' => 'Home Portfolio'
                    ),
                    array(
                        'id' => 'link8',
                        'type' => 'text',
                        'title' => __('Link for Home Version 8.', 'chronos'),
                        'subtitle' => __('Link for Home Version 8.', 'chronos'),
                        'desc' => __('', 'chronos'),
                        'default' => 'http://vergatheme.com/demosd/chronos/?page_id=250'
                    ),
                    
                    array(
                        'id' => 'text9',
                        'type' => 'text',
                        'title' => __('Text Home Version 9.', 'chronos'),
                        'subtitle' => __('Text Home Version.', 'chronos'),
                        'desc' => __('', 'chronos'),
                        'default' => 'YouTube Video'
                    ),
                    array(
                        'id' => 'link9',
                        'type' => 'text',
                        'title' => __('Link for Home Version 9.', 'chronos'),
                        'subtitle' => __('Link for Home Version 9.', 'chronos'),
                        'desc' => __('', 'chronos'),
                        'default' => 'http://vergatheme.com/demosd/chronos/?page_id=262'
                    ), 
                )
            ) );
            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-website',
                'title' => __('Styling Options', 'chronos'),
                'fields' => array(
                    array(
                        'id' => 'main-color',
                        'type' => 'color',
                        'title' => __('Theme Main Color', 'chronos'),
                        'subtitle' => __('Pick the main color for the theme (default: #e67e22).', 'chronos'),
                        'default' => '#e67e22',
                        'validate' => 'color',
                    ),
                    
                    array(
                        'id' => 'body-font2',
                        'type' => 'typography',
                        'output' => array('body'),
                        'title' => __('Body Font', 'chronos'),
                        'subtitle' => __('Specify the body font properties.', 'chronos'),
                        'google' => true,
                        'default' => array(
                            'color' => '#404040',
                            'font-size' => '14px',
                            'line-height' => '22px',
                            'font-family' => "",
                        ),
                    ),
                     array(
                        'id' => 'custom-css',
                        'type' => 'ace_editor',
                        'title' => __('CSS Code', 'chronos'),
                        'subtitle' => __('Paste your CSS code here.', 'chronos'),
                        'mode' => 'css',
                        'theme' => 'monokai',
                        'desc' => 'Possible modes can be found at <a href="http://ace.c9.io" target="_blank">http://ace.c9.io/</a>.',
                        'default' => "#header{\nmargin: 0 auto;\n}"
                    ),
                )
            ) );		
			
			
    /*
     * <--- END SECTIONS
     */

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    function compiler_action( $options, $css, $changed_values ) {
        echo '<h1>The compiler hook has run!</h1>';
        echo "<pre>";
        print_r( $changed_values ); // Values that have changed since the last save
        echo "</pre>";
        //print_r($options); //Option values
        //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
    }

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
                $return['error'] = $field;
                $field['msg']    = 'your custom error message';
            }

            if ( $warning == true ) {
                $return['warning'] = $field;
                $field['msg']      = 'your custom warning message';
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

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    function change_arguments( $args ) {
        //$args['dev_mode'] = true;

        return $args;
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    function change_defaults( $defaults ) {
        $defaults['str_replace'] = 'Testing filter hook!';

        return $defaults;
    }

    // Remove the demo link and the notice of integrated demo from the redux-framework plugin
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
