<?php
add_action('admin_menu', 'custom_site_options');
function custom_site_options()
{
    add_theme_page( 'Theme Settings','Theme Settings', 'add_users', 'custom_site_options','custom_site_optionscb');
}
function custom_site_optionscb()
{
    if(isset($_POST['hdnsbmt']))
    {
        extract($_POST);
        global $wpdb;
        
        update_option( "header_logo", $header_logo );
        update_option( "theme_fb_link", $theme_fb_link );
        update_option( "theme_twtr_link", $theme_twtr_link );
        update_option( "theme_ln_link", $theme_ln_link );
        update_option( "theme_insta_link", $theme_insta_link );
        update_option( "theme_ytube_link", $theme_ytube_link );
        update_option( "theme_skype_link", $theme_skype_link );
        update_option( "theme_email_link", $theme_email_link );

        update_option( "footer_email", $footer_email );
        update_option( "footer_copyright", $footer_copyright );
    }
    $header_logo = get_option("header_logo");
    
    $theme_fb_link = get_option("theme_fb_link");
    $theme_twtr_link = get_option("theme_twtr_link");
    $theme_ln_link = get_option("theme_ln_link");
    $theme_insta_link = get_option("theme_insta_link");
    $theme_ytube_link = get_option("theme_ytube_link");
    $theme_skype_link = get_option("theme_skype_link");
    $theme_email_link = get_option("theme_email_link");
    
    $footer_email = get_option("footer_email");
    $footer_copyright = get_option("footer_copyright");

    // $footer_location = get_option("footer_location");
    // $footer_location = stripslashes($footer_location);
    ?>
    <div class="wrap">
        <div id="icon-edit" class="icon32"><br/></div>
        <h2>Site Options</h2> 
    </div>
    <div class="aloha_site_options">
            <form action="" method="post" >
                <table>
                    <tr>
                        <td width="190">Header Logo:</td>
                        <td>
                            <input type="text" value="<?php echo $header_logo;?>" name="header_logo" />
                            <input type="button" onclick="custom_upload_image(this);" value="Upload" class="button button-primary" />
                        </td>
                    </tr>
                    <tr>
                        <td width="190">Facebook link:</td>
                        <td>
                            <input type="text" value="<?php echo $theme_fb_link;?>" name="theme_fb_link" />
                        </td>
                    </tr>
                    <tr>
                        <td width="190">Twitter link:</td>
                        <td>
                            <input type="text" value="<?php echo $theme_twtr_link;?>" name="theme_twtr_link" />
                        </td>
                    </tr>
                    <tr>
                        <td width="190">Linkedin link:</td>
                        <td>
                            <input type="text" value="<?php echo $theme_ln_link;?>" name="theme_ln_link" />
                        </td>
                    </tr>
                    <tr>
                        <td width="190">Rss link:</td>
                        <td>
                            <input type="text" value="<?php echo $theme_insta_link;?>" name="theme_insta_link" />
                        </td>
                    </tr>
                    <tr>
                        <td width="190">Youtube link:</td>
                        <td>
                            <input type="text" value="<?php echo $theme_ytube_link;?>" name="theme_ytube_link" />
                        </td>
                    </tr>
                    <tr>
                        <td width="190">Skype link:</td>
                        <td>
                            <input type="text" value="<?php echo $theme_skype_link;?>" name="theme_skype_link" />
                        </td>
                    </tr>
                    <tr>
                        <td width="190">Email ID:</td>
                        <td>
                            <input type="text" value="<?php echo $theme_email_link;?>" name="theme_email_link" />
                        </td>
                    </tr>
                    <tr>
                        <td width="190">Footer Contact Email:</td>
                        <td>
                            <input type="text" value="<?php echo $footer_email;?>" name="footer_email" />
                        </td>
                    </tr>

                    <tr>
                        <td width="190">Footer Copyright:</td>
                        <td>
                            <textarea name="footer_copyright"><?php echo $footer_copyright;?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" value="Save" class="button-primary">
                            <input type="hidden" name="hdnsbmt">
                        </td>
                    </tr>
                </table>
            </form>
    </div>
<style>
.aloha_site_options table tr{
	vertical-align:top;
}
    .aloha_site_options table td input[type='text']
    {
        width: 300px;
    }
    .listcertass .snglinrwpr
    {
        float: left;
        height: 105px;
        margin-right: 11px;
        width: 300px;
    }
    .upldbtn
    {
        float: left;
        width:  100%;
        padding: 10px 0;
    }
</style>
    <?php
}


add_action( 'show_user_profile', 'custom_extra_user_profile_fields' );
add_action( 'edit_user_profile', 'custom_extra_user_profile_fields' );

function custom_extra_user_profile_fields( $user ) { ?>
    <h3><?php _e("Extra Links", "blank"); ?></h3>

    <table class="form-table">
    <tr>
        <th><label for="customlink1"><?php _e("Custom link 1"); ?></label></th>
        <td>
            <input type="text" name="customlinkn1" id="customlinkn1" value="<?php echo esc_attr( get_the_author_meta( 'customlinkn1', $user->ID ) ); ?>" class="regular-text" placeholder="Name"/>
            <input type="text" name="customlink1" id="customlink1" value="<?php echo esc_attr( get_the_author_meta( 'customlink1', $user->ID ) ); ?>" class="regular-text" placeholder="Link"/><br />
            <span class="description"><?php _e("Please enter your custom link1."); ?></span>
        </td>
    </tr>
    <tr>
        <th><label for="customlink2"><?php _e("Custom link 2"); ?></label></th>
        <td>
            <input type="text" name="customlinkn2" id="customlinkn2" value="<?php echo esc_attr( get_the_author_meta( 'customlinkn2', $user->ID ) ); ?>" class="regular-text" placeholder="Name"/>
            <input type="text" name="customlink2" id="customlink2" value="<?php echo esc_attr( get_the_author_meta( 'customlink2', $user->ID ) ); ?>" class="regular-text" placeholder="Link"/><br />
            <span class="description"><?php _e("Please enter your customlink2."); ?></span>
        </td>
    </tr>
    <tr>
    <th><label for="customlink3"><?php _e("Custom link 3"); ?></label></th>
        <td>
            <input type="text" name="customlinkn3" id="customlinkn3" value="<?php echo esc_attr( get_the_author_meta( 'customlinkn3', $user->ID ) ); ?>" class="regular-text" placeholder="Name"/>
            <input type="text" name="customlink3" id="customlink3" value="<?php echo esc_attr( get_the_author_meta( 'customlink3', $user->ID ) ); ?>" class="regular-text" placeholder="Link"/><br />
            <span class="description"><?php _e("Please enter your postal code."); ?></span>
        </td>
    </tr>
    <tr>
    <th><label for="customlink4"><?php _e("Custom link 4"); ?></label></th>
        <td>
            <input type="text" name="customlinkn4" id="customlinkn4" value="<?php echo esc_attr( get_the_author_meta( 'customlinkn4', $user->ID ) ); ?>" class="regular-text" placeholder="Name"/>
            <input type="text" name="customlink4" id="customlink4" value="<?php echo esc_attr( get_the_author_meta( 'customlink4', $user->ID ) ); ?>" class="regular-text" placeholder="Link"/><br />
            <span class="description"><?php _e("Please enter your postal code."); ?></span>
        </td>
    </tr>
    </table>
<?php }

add_action( 'personal_options_update', 'save_custom_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_custom_extra_user_profile_fields' );

function save_custom_extra_user_profile_fields( $user_id ) {
    if ( empty( $_POST['_wpnonce'] ) || ! wp_verify_nonce( $_POST['_wpnonce'], 'update-user_' . $user_id ) ) {
        return;
    }
    
    if ( !current_user_can( 'edit_user', $user_id ) ) { 
        return false; 
    }
    update_user_meta( $user_id, 'customlinkn1', $_POST['customlinkn1'] );
    update_user_meta( $user_id, 'customlinkn2', $_POST['customlinkn2'] );
    update_user_meta( $user_id, 'customlinkn3', $_POST['customlinkn3'] );
    update_user_meta( $user_id, 'customlinkn4', $_POST['customlinkn4'] );
    update_user_meta( $user_id, 'customlink1', $_POST['customlink1'] );
    update_user_meta( $user_id, 'customlink2', $_POST['customlink2'] );
    update_user_meta( $user_id, 'customlink3', $_POST['customlink3'] );
    update_user_meta( $user_id, 'customlink4', $_POST['customlink4'] );
}