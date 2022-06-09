<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes" name="viewport">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">

        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/assets/images/data/fav/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/assets/images/data/fav/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/assets/images/data/fav/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/assets/images/data/fav/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/assets/images/data/fav/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/assets/images/data/fav/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/assets/images/data/fav/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/assets/images/data/fav/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/assets/images/data/fav/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_template_directory_uri(); ?>/assets/images/data/fav/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/assets/images/data/fav/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/assets/images/data/fav/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/assets/images/data/fav/favicon-16x16.png">
        <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/assets/images/data/fav/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/assets/images/data/fav/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

        <title><?php wp_title(''); ?></title>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(''); ?>>
        <div class="wrapper">
            <div class="header">
                <div class="headerTop">
                    <div class="wrap">
                        <div class="headerWrap">                            
                            <form class="headerSearch">
                                <div class="search">
                                    <button type="submit" class="btn">
                                        <img src="<?php echo get_template_directory_uri()."/assets/"; ?>images/common/icon-search.svg" alt="">
                                    </button>
                                    <input class="form-control" name="s" type="text" placeholder="キーワードを入力する">
                                </div>
                            </form>
                            <div class="headerLogo">
                                <a href="<?php echo get_site_url(); ?>">
                                    <?php
                                    echo wp_get_attachment_image( ubk_get_field('header_logo'), 'full');
                                    ?>
                                </a>
                            </div>
                            <div class="headerShare">
                                <ul>
                                    <li class="uboku">
                                        <?php
                                        $header_top_link = ubk_get_field('header_top_link','options');
                                        echo ubk_get_link($header_top_link);
                                        ?>
                                    </li>
                                    <?php
                                    echo ubk_get_socials('socials','icon_svg','social_link');
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="btnSearch">
                        <button class="btn btn-search">
                        <img src="<?php echo get_template_directory_uri()."/assets/"; ?>images/common/icon-search.svg" alt="">
                        </button>
                    </div>
                    <div class="btnNav">
                        <button class="btn btn-menu">
                        <span></span>
                        <span></span>
                        <span></span>
                        </button>
                    </div>
                    <!-- -->                    
                    <div class="navFix">
                        <button class="btn btn-closeNav">
                            <img src="<?php echo get_template_directory_uri()."/assets/"; ?>images/common/icon-closeNav.svg" alt="">
                        </button>
                        <div class="wrap">
                            <div class="contentWrap">
                                <div class="contentLf">
                                    <div class="contentLogo">
                                        <a class="pc-only" href="<?php echo get_site_url(); ?>">
                                            <?php 
                                            $navigation_fixed_logo = ubk_get_field('navigation_fixed_logo','options');
                                            echo wp_get_attachment_image($navigation_fixed_logo,'full');
                                            ?>                                            
                                        </a>
                                        <a class="sp-only" href="<?php echo get_site_url(); ?>">
                                            <?php 
                                            $navigation_fixed_logo_medium = ubk_get_field('navigation_fixed_logo_medium','options');
                                            echo wp_get_attachment_image($navigation_fixed_logo_medium,'full');
                                            ?>                                            
                                        </a>
                                    </div>
                                    <ul>
                                        <?php
                                        echo ubk_get_socials('navigation_fixed_socials');
                                        ?>
                                    </ul>
                                </div>
                                <div class="contentRg">
                                    <div class="navThumb">
                                        <?php ubk_navigation('header-menu', '', new UBK_Header_Nav_Fix_Walker); ?> 
                                    </div>
                                    <div class="keywordsLst">
                                        <span class="keywordsLst-label f-Oswald">KEYWORD</span>
                                        <?php echo ubk_get_tag_list(); ?>
                                    </div>
                                    <div class="shareSP sp-only">
                                        <ul>
                                            <?php
                                            echo ubk_get_socials('navigation_fixed_socials');
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--/.navFix-->
                    <!-- -->                    
                    <div class="searchSp">
                        <div class="searchTop">
                            <div class="wrap">
                                <form class="searchInput">
                                    <input class="form-control" type="text" name="s" placeholder="キーワードを入力する">
                                    <button type="submit" class="btn btn-search">
                                    <div class="btnWrap">
                                        <span class="searchFor">検索する</span>
                                        <span class="searchNew">新着記事一覧</span>
                                        <span class="btnItem"><img class="svg" src="<?php echo get_template_directory_uri()."/assets/"; ?>images/common/icon-arrow-white.svg"></span>
                                    </div>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="wrap">
                            <div class="searchKey">
                                <p class="searchKey-tlt f-Oswald">KEYWORD</p>
                                <p class="searchKey-label">キーワードから探す</p>
                            </div>
                            <div class="listKey">
                                <?php echo ubk_get_tag_list(); ?>
                            </div>
                        </div>
                    </div><!--/.searchSp-->
                </div><!--/.headerTop-->

            <div class="headerNav">
                <div class="wrap">
                    <div class="gNav">
                        <?php ubk_navigation('header-menu', '', new UBK_Header_Nav_Walker); ?>                        
                    </div><!--/.gNav-->
                </div>
            </div><!--/.headerNav-->
            </div><!--/.header-->