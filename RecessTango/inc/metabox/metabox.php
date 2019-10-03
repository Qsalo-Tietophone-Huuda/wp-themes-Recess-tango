<?php

/** Deprecating
 * RecessTango Pro metabox file. 
 *
 * This is the template that includes all the other files for metaboxes of RecessTango Pro theme
 *
 * @package Theme Qsalo
 * @subpackage RecessTango
 * @since RecessTango 0.01
 */
 
/**
 * Class to Renders and save metabox options
 *
 * @since RecessTango 0.01
 */
class RecessTango_MetaBox {
    private $meta_box;

    private $fields;

    /**
    * Constructor
    *
    * @since RecessTango 0.01
    *
    * @access public
    *
    */
    public function __construct( $meta_box_id, $meta_box_title, $post_type ) {
        
        $this->meta_box = array (
                            'id'        => $meta_box_id,
                            'title'     => $meta_box_title,
                            'post_type' => $post_type,
                            );

        $this->fields = array(
                            'RecessTango-sidebar-position',
                            'RecessTango-selected-sidebar',
                            'RecessTango-header-image',
                            );


        // Add metaboxes
        add_action( 'add_meta_boxes', array( $this, 'add' ) );
        
        add_action( 'save_post', array( $this, 'save' ) );  
    }

    /**
    * Add Meta Box for multiple post types.
    *
    * @since RecessTango 0.01
    *
    * @access public
    */
    public function add($postType) {
        if( in_array( $postType, $this->meta_box['post_type'] ) ) {
            add_meta_box( $this->meta_box['id'], $this->meta_box['title'], array( $this, 'show' ), $postType );
        }
    }

    /**
    * Renders metabox
    *
    * @since RecessTango 0.01
    *
    * @access public
    */
    public function show() {
        global $post;

        $layout_options         = RecessTango_sidebar_position();
        $sidebar_options        = RecessTango_selected_sidebar();
        $header_image_options   = RecessTango_header_image();
        
        
        // Use nonce for verification  
        wp_nonce_field( basename( __FILE__ ), 'RecessTango_custom_meta_box_nonce' );

        // Begin the field table and loop  ?>  
        <div id="RecessTango-ui-tabs" class="ui-tabs">
            <ul class="RecessTango-ui-tabs-nav" id="RecessTango-ui-tabs-nav">
                <li><a href="#frag1"><?php esc_html_e( 'Layout Options', 'RecessTango' ); ?></a></li>
                <li><a href="#frag3"><?php esc_html_e( 'Header Image Options', 'RecessTango' ); ?></a></li>
                <li><a href="#frag2"><?php esc_html_e( 'Select Sidebar', 'RecessTango' ); ?></a></li>
            </ul> 
            <div id="frag1" class="catch_ad_tabhead">
                <table id="layout-options" class="form-table" width="100%">
                    <tbody>
                        <tr>
                            <select name="RecessTango-sidebar-position" id="custom_element_grid_class">
                                <option value=""><?php esc_html_e( 'Default ( to customizer option )', 'RecessTango' ); ?></option>
                                <?php  
                                    $metalayout = get_post_meta( $post->ID, 'RecessTango-sidebar-position', true );
                                    if( empty( $metalayout ) ){
                                        $metalayout='';
                                    }
                                    foreach ( $layout_options as $field => $value ) {  
                                ?>
                                    <option value="<?php echo esc_attr( $field ); ?>" <?php selected( $metalayout, $field ); ?>><?php echo esc_html( $value ); ?></option>
                                <?php
                                } // end foreach 
                                ?>
                            </select>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="frag2" class="catch_ad_tabhead">
                <table id="sidebar-metabox" class="form-table" width="100%">
                    <tbody> 
                        <tr>
                            <?php
                            $metasidebar = get_post_meta( $post->ID, 'RecessTango-selected-sidebar', true );
                            if ( empty( $metasidebar ) ){
                                $metasidebar='sidebar-1';
                            } 
                            foreach ( $sidebar_options as $field => $value ) {  
                            ?>
                                <td style="vertical-align: top;">
                                    <label class="description">
                                        <input type="radio" name="RecessTango-selected-sidebar" value="<?php echo esc_attr( $field ); ?>" <?php checked( $field, $metasidebar ); ?>/>&nbsp;&nbsp;<?php echo esc_html( $value ); ?>
                                    </label>
                                </td>
                                
                            <?php
                            } // end foreach 
                            ?>
                        </tr>
                    </tbody>
                </table>        
            </div>

            <div id="frag3" class="catch_ad_tabhead">
                <table id="header-image-metabox" class="form-table" width="100%">
                    <tbody> 
                        <tr>                
                            <?php  
                            $metaheader = get_post_meta( $post->ID, 'RecessTango-header-image', true );
                            if ( empty( $metaheader ) ){
                                $metaheader='';
                            }
                            foreach ( $header_image_options as $field => $value ) { 
                            ?>
                                <td style="width: 100px;">
                                    <label class="description">
                                        <input type="radio" name="RecessTango-header-image" value="<?php echo esc_attr( $field ); ?>" <?php checked( $field, $metaheader ); ?>/>&nbsp;&nbsp;<?php echo esc_html( $value ); ?>
                                    </label>
                                </td>
                                
                            <?php
                            } // end foreach 
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    <?php 
    }

    /**
     * Save custom metabox data
     * 
     * @action save_post
     *
     * @since RecessTango 0.01
     *
     * @access public
     */
    public function save( $post_id ) { 
    
        // Checks save status
        $is_autosave = wp_is_post_autosave( $post_id );
        $is_revision = wp_is_post_revision( $post_id );
        $is_valid_nonce = ( isset( $_POST[ 'RecessTango_nonce' ] ) && wp_verify_nonce( sanitize_key( $_POST[ 'RecessTango_nonce' ] ), basename( __FILE__ ) ) ) ? 'true' : 'false';

        // Exits script depending on save status
        if ( $is_autosave || $is_revision || ! $is_valid_nonce ) {
            return;
        }
      
        foreach ( $this->fields as $field ) {      
            // Checks for input and sanitizes/saves if needed
            if( isset( $_POST[ $field ] ) ) {
                update_post_meta( $post_id, $field, sanitize_text_field( wp_unslash( $_POST[ $field ] ) ) );
            }
        } // end foreach         
    }
}

$RecessTango_metabox = new RecessTango_MetaBox( 
                                    'RecessTango-options',                  //metabox id
                                    esc_html__( 'RecessTango Meta Options', 'RecessTango' ), //metabox title
                                    array( 'page', 'post' )             //metabox post types
                                    );

/**
 * Enqueue scripts and styles for Metaboxes
 * @uses  wp_enqueue_script, and  wp_enqueue_style
 *
 * @since RecessTango 0.01
 */
function RecessTango_enqueue_metabox_scripts( $hook ) {
    if( $hook == 'post.php' || $hook == 'post-new.php'  ){
        //Scripts
        wp_enqueue_script( 'RecessTango-metabox', get_template_directory_uri() . '/assets/js/metabox.min.js', array( 'jquery', 'jquery-ui-tabs' ), '2013-10-05' );

        //CSS Styles
        wp_enqueue_style( 'RecessTango-metabox-tabs', get_template_directory_uri() . '/assets/css/metabox-tabs.min.css' );
    }
    return;
}
add_action( 'admin_enqueue_scripts', 'RecessTango_enqueue_metabox_scripts', 11 );
