<?php
/**
 * Businesso sidebar layout options
 *
 * @since Businesso agency  1.0
 *
 */
if (!function_exists('businesso_sidebar_layout_options')) :
    function businesso_sidebar_layout_options() {
        $businesso_sidebar_layout_options = array(
            'default-sidebar' => array(
                'value' => 'default-sidebar',
                'thumbnail' => get_template_directory_uri() . '/images/layout-default/default-sidebar.png'
            ),
            'left-sidebar' => array(
                'value' => 'left-sidebar',
                'thumbnail' => get_template_directory_uri() . '/images/layout-default/left-sidebar.png'
            ),
            'right-sidebar' => array(
                'value' => 'right-sidebar',
                'thumbnail' => get_template_directory_uri() . '/images/layout-default/right-sidebar.png'
            ),
            'no-sidebar' => array(
                'value' => 'no-sidebar',
                'thumbnail' => get_template_directory_uri() . '/images/layout-default/no-sidebar.png'
            )
        );
        return apply_filters('businesso_sidebar_layout_options', $businesso_sidebar_layout_options);
    }
endif;

/**

 * Custom Metabox
 
 **/
if (!function_exists('businesso_add_metabox')):
    function businesso_add_metabox()
    {
        add_meta_box(
            'businesso_sidebar_layout', // $id
            esc_html__('Sidebar Layout', 'businesso'), // $title
            'businesso_sidebar_layout_callback', // $callback
            'post', // $page
            'normal', // $context
            'low'
        ); // $priority

        add_meta_box(
            'businesso_sidebar_layout', // $id
            __('Sidebar Layout', 'businesso'), // $title
            'businesso_sidebar_layout_callback', // $callback
            'page', // $page
            'normal', // $context
            'low'
        ); // $priority
    }
endif;
add_action('add_meta_boxes', 'businesso_add_metabox');


/**

 * Callback function for metabox

 **/
if (!function_exists('businesso_sidebar_layout_callback')) :
    function businesso_sidebar_layout_callback()
    {
        global $post;
        $businesso_sidebar_layout_options = businesso_sidebar_layout_options();

        $businesso_options=theme_default_data(); 
        $customsetting = wp_parse_args(get_option( 'theme_mods_businesso', array(), $businesso_options));
        $businesso_sidebar_layout_c = $customsetting['businesso_option']['businesso_sidebar_layout_option'];
        $businesso_sidebar_meta_layout = get_post_meta( $post->ID, 'businesso_sidebar_layout', true);
        if ( !empty( $businesso_sidebar_meta_layout ) ) {
            $businesso_sidebar_layout = $businesso_sidebar_meta_layout;
        }else{
            $businesso_sidebar_layout = $businesso_sidebar_layout_c;
        }
        wp_nonce_field(basename(__FILE__), 'businesso_sidebar_layout_nonce');
        ?>

        <table class="form-table page-meta-box">
            <tr>
                <td colspan="4"><h4><?php esc_html_e('Choose Sidebar Template', 'businesso'); ?></h4></td>
            </tr>
            <tr>
                <td>
                    <?php
                    foreach ($businesso_sidebar_layout_options as $field) {
                        ?>
                        <div class="hide-radio radio-image-wrapper qc_radio_button">
                            <input id="<?php echo $field['value']; ?>" type="radio"
                                   name="businesso_sidebar_layout"
                                   value="<?php echo $field['value']; ?>" <?php checked($field['value'], $businesso_sidebar_layout); ?>/>
                            <label class="description" for="<?php echo $field['value']; ?>">
                                <img src="<?php echo esc_url($field['thumbnail']); ?>" alt=""/>
                            </label>
                        </div>
                    <?php } // end foreach
                    ?>
                    <div class="clear"></div>
                </td>
            </tr>
            <tr>
                <td>
                    <em class="f13"><?php esc_html_e('You can set up the sidebar content', 'businesso'); ?>
                        <a href="<?php echo esc_url( admin_url('/widgets.php')); ?>" target="_blank">
                            <?php esc_html_e('here', 'businesso'); ?>
                        </a>
                    </em>
                </td>                
            </tr>
            <tr>
                <td>
                    <em class="f13">
                        <?php esc_html_e('Note: If you wants to set default page layout design then please click', 'businesso'); ?>
                        <a href="<?php echo esc_url( admin_url('/customize.php')); ?>" target="_blank">
                            <?php esc_html_e('here. ', 'businesso'); ?>
                        </a>
                        <?php esc_html_e('Please find there ', 'businesso');?><span class="customSetting"><?php esc_html_e('Theme Options Settings >> Default Sidebar Layout option >> Choose your default option.', 'businesso') ?></span>
                    </em>
                </td>
            </tr>
        </table>

    <?php }
endif;

/**

 * save the custom metabox data
 
 **/
if (!function_exists('businesso_save_sidebar_layout')) :
    function businesso_save_sidebar_layout( $post_id )
    {

        /*
          * A Guide to Writing Secure Themes – Part 4: Securing Post Meta
          *https://make.wordpress.org/themes/2015/06/09/a-guide-to-writing-secure-themes-part-4-securing-post-meta/
          * */
        if (
            !isset($_POST['businesso_sidebar_layout_nonce']) ||
            !wp_verify_nonce($_POST['businesso_sidebar_layout_nonce'], basename(__FILE__)) || /*Protecting against unwanted requests*/
            (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || /*Dealing with autosaves*/
            !current_user_can('edit_post', $post_id)/*Verifying access rights*/
        ) {
            return;
        }

        //Execute this saving function
        if ( isset( $_POST['businesso_sidebar_layout'] ) ) {
            $old = get_post_meta( $post_id, 'businesso_sidebar_layout', true);
            $new = sanitize_text_field ($_POST['businesso_sidebar_layout'] );
            if ( $new && $new != $old ) {
                update_post_meta($post_id, 'businesso_sidebar_layout', $new);
            } elseif ( '' == $new && $old ) {
                delete_post_meta( $post_id, 'businesso_sidebar_layout', $old);
            }
        }
    }
endif;
add_action('save_post', 'businesso_save_sidebar_layout');

