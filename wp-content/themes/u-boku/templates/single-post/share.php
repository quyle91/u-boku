<?php 
$urlencode = urlencode(get_permalink());
$facebook_share = 'https://www.facebook.com/sharer/sharer.php?u='.$urlencode;
$twitter_share = 'http://twitter.com/share?text=text goes here&url='.$urlencode;
$line_share = 'line://msg/text/'.$urlencode;

 ?>
<div class="detailShare">
    <div class="shareTitle">
        <h2 class="tlt f-Oswald">SHARE</h2>
        <span class="label">この記事をシェアする</span>
    </div>
    <div class="shareWrap">
        <div class="shareWrap-thumb">
            <?php the_post_thumbnail( 'ubk_thumbnail' ); ?>
        </div>
        <div class="shareWrap-info">
            <h3 class="tlt"><?php the_title(); ?></h3>
            <div class="shareItem d-none d-md-block">
                <ul>
                    <li>
                        <a target="_blank" href="<?php echo $facebook_share; ?>">
                            <span class="item"><img class="svg" src="<?php echo get_template_directory_uri(); ?>/assets/images/common/icon-fa.svg" alt=""></span>
                            <span class="textLabel">シェア</span>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="<?php echo $twitter_share ;?> ?>">
                            <span class="item"><img class="svg" src="<?php echo get_template_directory_uri(); ?>/assets/images/common/icon-twitter.svg" alt=""></span>
                            <span class="textLabel">つぶやく</span>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="<?php echo $line_share; ?>">
                            <span class="item"><img class="svg" src="<?php echo get_template_directory_uri(); ?>/assets/images/common/icon-line.svg" alt=""></span>
                            <span class="textLabel">LINE</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="shareItem d-block d-md-none">
        <ul>
            <li>
                <a target="_blank" href="<?php echo $facebook_share; ?>">
                    <span class="item"><img class="svg" src="<?php echo get_template_directory_uri(); ?>/assets/images/common/icon-fa.svg" alt=""></span>
                    <span class="textLabel">シェア</span>
                </a>
            </li>
            <li>
                <a target="_blank" href="<?php echo $twitter_share ;?> ?>">
                    <span class="item"><img class="svg" src="<?php echo get_template_directory_uri(); ?>/assets/images/common/icon-twitter.svg" alt=""></span>
                    <span class="textLabel">つぶやく</span>
                </a>
            </li>
            <li>
                <a target="_blank" href="<?php echo $line_share; ?>">
                    <span class="item"><img class="svg" src="<?php echo get_template_directory_uri(); ?>/assets/images/common/icon-line.svg" alt=""></span>
                    <span class="textLabel">LINE</span>
                </a>
            </li>
        </ul>
    </div>
</div>