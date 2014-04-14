 <style type="text/css">
                    #authorarea{
                        background: #<?php echo get_option('author_box_bg'); ?>;
                        border: 1px solid #<?php echo get_option('author_box_bg'); ?>;;
                        padding: 10px;

                        width:<?php echo get_option('author_box_width'); ?>px;
                        height:<?php echo get_option('author_box_height');?>px;
                        overflow:hidden;
                        <?php if (get_option('font_default') == '2') { ?>
                            font-family:<?php echo get_option('font_family'); ?>;
                            color: #<?php echo get_option('font_color'); ?>;
                        <?php } ?>
                    }
                    #authorarea h3{
                        <?php if (get_option('font_default') == '2') { ?>
                            font-size: <?php get_option('font_size'); ?>px;
                            color:#<?php echo get_option('font_color'); ?>;
                        <?php } ?>
                        margin:0;
                       
                    }
                    #authorarea h3 a{
                        text-decoration:none;
                        <?php if (get_option('font_default') == '2') { ?>
                            color: #<?php echo get_option('font_color'); ?>;
                            font-weight: <?php echo get_option('font-weight'); ?>;
                        <?php } ?>
                    }
                    #authorarea img{
                        margin:0;
                        float:left;
                        border: 1px solid #<?php echo get_option('font_color'); ?>;
                        width: <?php echo get_option('avatar_image_width');?>px;
                        height: <?php echo get_option('avatar_image_width');?>px;
                    }
                    #authorarea p{
                        <?php if (get_option('font_default') == '2') { ?>
                            color: #<?php echo get_option('font_color'); ?>;
                        <?php } ?>
                        margin:0;
                          }
                    #authorarea p a{
                        <?php if (get_option('font_default') == '2') { ?>
                            color: #<?php echo get_option('font_color'); ?>;
                        <?php } ?>
                    }
                    .authorinfo{
                        <?php if(get_option('author_box_info_position')=='1') { ?>
                        float:left;
                        <?php } if(get_option('author_box_info_position')=='2'){ ?>
                        float:right;
                        <?php } ?>
                        margin-left:5px;
                    } 

                </style>
                <div id="authorarea">
                    <?php if (get_option('enable_avatar') == '1') { ?>
                        <?php if (function_exists('get_avatar')) {
                            echo get_avatar(get_the_author_email(), '100');
                        } ?>
                        <?php } ?>
                    <div class="authorinfo">
                        <h3> <i><?php echo get_option('author_caption_message'); ?></i> <?php the_author_posts_link(); ?></h3>
                        <?php if (get_option('display_contact_info') == '1') { ?>
                            <p><a href="mailto:<?php echo get_the_author_email(); ?>"><?php echo get_option('contact_info_caption');?></a></p>
                <?php } ?>
                    </div>
                </div>
