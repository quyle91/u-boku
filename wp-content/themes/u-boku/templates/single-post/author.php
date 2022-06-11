<?php
    $user_id = get_the_author_meta( 'ID' );
?>
<div class="article">
    <h2 class="article-title"><span>この記事を書いた人</span></h2>
    <div class="articleWrap">
        <div class="articleWrap-thumb">
            <?php echo get_avatar( $user_id, $size = '120', $default = '', $alt = '', $args = array( '' => '' ) );  ?>
        </div>
        <div class="articleWrap-info">
            <h2 class="articleWrap-title"><?php the_author_meta('display_name'); ?></h2>
            <p class="articleWrap-text"><?php the_author_meta('description'); ?></p>
            <div class="userSocials">
                <ul>
                    <?php 
                        $user_meta = get_user_meta( $user_id);
                        $socials = [
                            'facebook',
                            'instagram',
                            'linkedin',
                            'myspace',
                            'pinterest',
                            'soundcloud',
                            'tumblr',
                            'twitter',
                            'youtube',
                            'wikipedia'
                        ];
                        foreach ($socials as $key => $value) {
                            if($user_meta[$value][0]):
                                ?>
                                <li>
                                    <a target="_blank" href="<?php echo $user_meta[$value][0]; ?>">
                                        <span class="item">
                                            <img class="svg" src="<?php echo get_template_directory_uri(); ?>/assets/images/common/icon-<?php echo $value;?>.svg" alt="">
                                        </span>
                                    </a>
                                </li>
                                <?php
                            endif;
                        }
                    ?>
                </ul>
            </div>
            <div class="btnMore">
                <a class="more" href="<?php echo get_author_posts_url( get_the_author_meta('ID'), get_the_author_meta('nice_name')); ?>">
                    <span class="moreText">このライターの記事一覧</span>
                    <span class="moreHover">新着記事一覧</span>
                    <span class="moreItem">
                        <img class="svg" src="<?php echo get_template_directory_uri(); ?>/assets/images/common/icon-arrow-white.svg" alt="">
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>