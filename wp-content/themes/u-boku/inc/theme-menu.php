<?php

require get_template_directory()."/inc/ubk-header-nav-walker.php";
require get_template_directory()."/inc/ubk-header-nav-fix-walker.php";
// Navigation
function ubk_navigation($themelocaltion = '', $menuclass = '', $walker = '') {
    if(!has_nav_menu($themelocaltion)) return;
    wp_nav_menu(
        array(
            'theme_location' => $themelocaltion,
            //'menu' => $name,
            'container' => '',
            'container_class' => $menuclass,
            'container_id' => '',
            'menu_class' => $menuclass,
            'menu_id' => '',
            'echo' => true,
            'fallback_cb' => 'wp_page_menu',
            'before' => '',
            'after' => '',
            'link_before' => '',
            'link_after' => '',
            'items_wrap' => '<ul class="' . $menuclass . '">%3$s</ul>',
            'depth' => 0,
            'walker' => $walker
        )
    );
}

// Register Navigation
function ubk_register_menu() {
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => 'Header & Mobile Menu '
    ));
}
// 
function add_extra_item_to_nav_menu( $items, $args ) {    
    if('UBK_Header_Nav_Fix_Walker' == get_class($args->walker)){
        ob_start();
        ?>

        <li class="navThumb-lst">
            <div class="navThumb-sub">
                <ul>
                    <?php 
                    $footer_navigation = ubk_get_field('footer_navigation','options');                            
                    if(check_array($footer_navigation)){
                        foreach ($footer_navigation as $key => $item) {
                            if(isset($item['item']) and $item['item']){
                                echo '<li><a target="'.$item['item']['target'].'" href="'.$item['item']['url'].'">'.$item['item']['title'].'</a></li>';
                            }
                            if($key and ($key%3 == 2)){
                                echo "</ul><ul>";
                            }
                        }
                    }

                    ?>
                </ul>
            </div>
        </li>
        <?php
        $items .= ob_get_clean();
    }    
    return $items;
}
