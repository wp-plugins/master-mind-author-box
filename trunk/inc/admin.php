<?php

function avatar_manager_admin_pages() {
    ?>
    <style type="text/css">
        .colour
        {
            background-color:#acbefa;
            border: thin dotted;
            padding: 1%;
            width: 60%;
        }
        #gif,#gif1,#gif2,#gif3
        {
            width:100%;
            height:100%;
            display:none;
            margin-left: 393px;
        }

        #result,#result1,#result2,#result3
        {
            display:none;
            border-color:#e8426d;
            background-color:#FFFFF;
            color:#e8426d;
            border: solid;
            width:160px;
            text-align: center;
            margin-left: 389px;
        }

        #resets1
        {
            background-color:#2687b2;
            display:none;
            border-color:#FFFF00;
            border-width:thick;
            width:160px;
        }



    </style>
    <script type="text/javascript">
        function show_url() {
            document.getElementById('url').style.display = 'inline';

        }
        function hide_url() {
            document.getElementById('url').style.display = 'none';
        }
        function show_checkbox() {
            document.getElementById('checkbox_style').style.display = "inline";
        }
        function hide_checkbox() {
            document.getElementById('checkbox_style').style.display = "none";

        }
        function hide_line_height() {
            document.getElementById('text_line_height').style.display = "none";

        }
        function show_line_height() {
            document.getElementById('text_line_height').style.display = "block";
        }
    </script>

    <style type="text/css">
    <?php if (get_option('font_default') == '1') { ?>
            ul#url {
                display:none;
            }
    <?php } if (get_option('font_default') == '2') { ?>
            ul#url {
                display:inline;

            }
    <?php } ?>
    <?php if (get_option('checkbox_default') == '1') { ?>
            ul#checkbox_style {
                display:none;
            }
    <?php } if (get_option('checkbox_default') == '2') { ?>
            ul#checkbox_style {
                display:inline;
            }
    <?php } if (get_option('text_line_height') == '1') { ?>
            li#text_line_height {
                display:none;
            }
    <?php } if (get_option('text_line_height') == '2') { ?>
            li#text_line_height {
                display:block;
            }
    <?php } ?>
    </style>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            jQuery('#submit_jquerytab').click(function($)
            {
                jQuery('#gif1').css("display", "block");
            });
        });
        function submitjquerytab() {
            jQuery.ajax({type: 'POST', url: 'options.php', data: jQuery('#form_jquerytab').serialize(), success: function(response) {

                    //$('#fff').find('.form_result').html(response);
                    jQuery('#gif1').css("display", "none");
                    jQuery('#result1').css("display", "block");
                    jQuery('#result1').html("Settings Saved");
                    jQuery('#result1').fadeOut(2500, "linear");
                }});

            return false;
        }

    </script>


    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
    <link href ="<?php echo WP_CONTENT_URL; ?>/plugins/authorboxplugin/css/adminstyle.css" type="text/css" rel="stylesheet"/>
    <script src="<?php echo WP_CONTENT_URL; ?>/plugins/authorboxplugin/jscolor/jscolor.js" type="text/javascript"/></script>
    <div class="wrap">
        <div class="left">
            <div class="metabox-holder4">
                <div class="postbox4">
                    <h3>General Settings</h3>
                    <div class="inside4">
                        <form action="options.php" method="post">
                            <?php
                            settings_fields('avatar_manager');
                            $option = get_option('avatarmanager_on');
                            ?>
                            <ul>
                                <li>
                                    <label>Disable this Plugin</label>
                                    <input type="checkbox" class="checkbox_general" name="avatarmanager_on" style="margin-left:270px;" value="1"<?php checked('1', $option); ?>/>
                                </li><br/><br/>
                                <li>
                                    <label>Author Caption</label>
                                    <input type="text" class="text_general" name="author_caption_message" style="margin-left:288px;" value="<?php echo get_option('author_caption_message'); ?>"/>
                                </li>
                                <li>
                                    <label>Enable Avatar</label>
                                    <input type="radio" class="radiobox_general" name="enable_avatar" style="margin-left:293px;" value="1"<?php checked('1', get_option('enable_avatar')); ?>/><label>On</label><br/>
                                    <input type="radio" class="radiobox_general" name="enable_avatar" style="margin-left:397px;" value="2"<?php checked('2', get_option('enable_avatar')); ?>/><label>Off</label><br/>
                                </li>
                                <li>
                                    <label>Display Contact Info</label>
                                    <input type="radio" class="radiobox-general" name="display_contact_info" style="margin-left:251px;" value="1"<?php checked('1', get_option('display_contact_info')); ?>/><label>Enable</label><br/>
                                    <input type="radio" class="radiobox-general" name="display_contact_info" style="margin-left:397px;" value="2"<?php checked('2', get_option('display_contact_info')); ?>/><label>Disable</label><br/>
                                </li>
                                <li>
                                    <label>Display Options</label>
                                    <input type="radio" class="radiobox" name="display_options" style="margin-left:283px;" value="1"<?php checked('1', get_option('display_options')); ?>/><label>Top</label><br/>
                                    <input type="radio" class="radiobox" name="display_options" style="margin-left:397px;" value="2"<?php checked('2', get_option('display_options')); ?>/><label>Bottom</label>
                                </li>
                                <li>
                                    <label>Author Box Width</label>
                                    <input type="text" name="author_box_width" style="margin-left:263px;" value="<?php echo get_option('author_box_width'); ?>"/><label>px</label>
                                    <br/>
                                    <input type="text" name="author_box_height" style="margin-left:393px;" value="<?php echo get_option('author_box_height'); ?>"/><label>px</label>
                                </li>
                                <li>
                                    <label>Author Box Background</label>
                                    <input type="text" class="color" name="author_box_bg" style="margin-left:222px;" value="<?php echo get_option('author_box_bg'); ?>"/><label>Click to Pick the Color</label>
                                </li>
                                <li>
                                    <label>Contact Info Caption</label>
                                    <input type='text' name='contact_info_caption' style='margin-left:246px;' value='<?php echo get_option('contact_info_caption'); ?>'/>
                                </li>
                                <li>
                                    <label>Author Box Info Position</label>
                                    <input type="radio" class="radiobox" name="author_box_info_position" style="margin-left:216px;" value="1"<?php checked('1', get_option('author_box_info_position')); ?>/><label>Left</label><br/>
                                    <input type="radio" class="radiobox" name="author_box_info_position" style="margin-left:393px;" value="2"<?php checked('2', get_option('author_box_info_position')); ?>/><label>Right</label>
                                </li>
                                <li>
                                    <label>Avatar Image Size</label>
                                    <input type="text" class="textgeneral" name="avatar_image_width" style="margin-left:260px;" value="<?php echo get_option('avatar_image_width'); ?>"/><label>Width</label><br/>
                                    <input type="text" class="textgeneral" name="avatar_image_height" style="margin-left:393px;" value="<?php echo get_option('avatar_image_height'); ?>"/><label>Height</label>
                                </li>
                            </ul>
                            <p class="submit">
                                <input type="submit" value="Save" id="submit_general" name="submit" class="button-primary"/>
                            </p>

                        </form>
                        <form id="form_general_reset" action="" class="form-1" method="post">
                            <input type="submit" value="Reset" id="reset_general" name="reset_general" class="button-secondary"/>
                            <input name="action" type="hidden" value="reset" />

                        </form><br/>
                        <br/>
                    </div>
                </div>
            </div>

            <div class = "metabox-holder4">
                <div class = "postbox4">
                    <h3>Font Settings</h3>
                    <div class = "inside4">
                        <form action = "options.php" method = "post">
                            <?php
                            settings_fields('author_box_font_settings');
                            $font_family = get_option('font_family');
                            $font_size = get_option('font_size');
                            $font_style = get_option('font_style');
                            $font_weight = get_option('font_weight');
                            $default = get_option('font_default');
                            ?>
                            <ul>
                                <li>
                                    <label>Font Options</label>
                                    <input type="radio" class="radiobox_general" style="margin-left:294px;" name="font_default" onclick="hide_url();" value="1"<?php checked('1', $default); ?>/><label>Default Theme Font Settings</label><br/>
                                    <input type="radio" class="radiobox_general" style="margin-left:390px;" name="font_default" onclick="show_url();"value="2"<?php checked('2', $default); ?>/><label>Custom Font Settings</label><br/>
                                </li>
                            </ul>
                            <ul id = "url">
                                <li>
                                    <label>Font Family</label>
                                    <select style = "margin-left:300px;" name = "font_family">
                                        <option value = "arial" <?php selected($font_family, 'arial');
                            ?>>Arial</option>
                                        <option value="sans_serif" <?php selected($font_family, 'sans_serif'); ?>>Sans Serif</option>
                                        <option value="serif" <?php selected($font_family, 'serif'); ?>>Serif</option>
                                        <option value="Comic Sans MS"<?php selected($font_family, 'Comic Sans MS'); ?>>Comic Sans MS</option>
                                        <option value="Courier New"<?php selected($font_family, 'Courier New'); ?>>Courier New</option>
                                        <option value="Georgia"<?php selected($font_family, 'Georgia'); ?>>Georgia</option>
                                        <option value="Helvetica"<?php selected($font_family, 'Helvetica'); ?>>Helvetica</option>
                                        <option value="Lucida Console"<?php selected($font_family, 'Lucida Console'); ?>>Lucida Console</option>
                                        <option value="Times New Roman"<?php selected($font_family, 'Times New Roman'); ?>>Times New Roman</option>
                                        <option value="Verdana"<?php selected($font_family, 'Verdana'); ?>>Verdana</option>
                                    </select>
                                </li>
                                <li>
                                    <label>Font Size</label>
                                    <select style="margin-left:320px;" name="font_size">
                                        <?php
                                        for ($i = 1; $i <= 99; $i++) {
                                            echo "<option value=" . $i . selected($font_size, $i) . ">$i</option>";
                                        }
                                        ?>
                                    </select><strong>&nbsp;px</strong>
                                </li>
                                <!--                                <li>
                                                                    <label>Font Style</label>
                                                                    <select style="margin-left:315px;" name="font_style">
                                                                        <option value="normal" <?php selected($font_style, 'normal'); ?>>Normal</option>
                                                                        <option value="italic" <?php selected($font_style, 'italic'); ?>>Italic</option>
                                                                    </select>
                                                                </li>-->
                                <li>
                                    <label>Font Weight</label>
                                    <select style="margin-left:299px;" name="font_weight">
                                        <option value="normal" <?php selected($font_weight, 'normal'); ?>>Normal</option>
                                        <option value="bold" <?php selected($font_weight, 'bold'); ?>>Bold</option>
                                    </select>
                                </li>
                                <li>
                                    <label>Font Color</label>
                                    <input type="text" class="color" name="font_color" style="margin-left:310px;" value="<?php echo get_option('font_color'); ?>"/>
                                </li>
                                <li>
                                    <label>Link Color</label>
                                    <input type="text"class="color" name="link_color" style="margin-left:310px;" value="<?php echo get_option('link_color'); ?>"/>
                                </li>
                            </ul>

                            <p class="submit">
                                <input type = "submit" value = "Save" id = "submit_general" name = "submit" class = "button-primary"/>
                            </p>

                        </form>
                        <form id="form_general_reset" action="" class="form-1" method="post">
                            <input type="submit" value="Reset" id="reset_general" name="reset_font" class="button-secondary"/>
                            <input name="action" type="hidden" value="reset" />

                        </form><br/>
                        <br/>

                    </div>
                </div>
            </div>


        </div>
    </div>
    <?php
}
?>