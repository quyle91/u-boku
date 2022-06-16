<?php
$matome = get_field('matome_select',get_the_ID());
$matome_thumbnail = get_field('matome_thumbnail',get_the_ID());
if($matome):    
    ob_start();
    ?>
    <ul class="matomeLst">
        <!-- <li>
            <span class="matomeLst-label">店　名</span>
            <div class="matomeLst-cmt">
                <p><?php echo $matome->post_title; ?></p>
            </div>
        </li> -->
        <li>
            <span class="matomeLst-label">住　所</span>
            <div class="matomeLst-cmt">
                <p><?php echo ubk_get_field('address',$matome->ID); ?></p>
            </div>
        </li>
        <li>
            <span class="matomeLst-label">電話番号</span>
            <div class="matomeLst-cmt">
                <p><?php echo ubk_get_field('phone_number',$matome->ID); ?></p>
            </div>
        </li>
        <li>
            <span class="matomeLst-label">営業時間</span>
            <div class="matomeLst-cmt">
                <p><?php echo ubk_get_field('time_work_',$matome->ID); ?></p>
            </div>
        </li>
        <li>
            <span class="matomeLst-label">定休日</span>
            <div class="matomeLst-cmt">
                <p><?php echo ubk_get_field('time',$matome->ID); ?></p>
            </div>
        </li>
        <li>
            <span class="matomeLst-label">WEB</span>
            <div class="matomeLst-cmt">
                <?php if(ubk_get_field('website',$matome->ID)): ?>
                <p><a href="<?php echo ubk_get_field('website',$matome->ID); ?>"><?php echo ubk_get_field('website',$matome->ID); ?></a></p>
                <?php endif; ?>
            </div>
        </li>
    </ul>
    <?php
    $list = ob_get_clean();    
    ?>
    <div class="matome">        
        <div class="matome-title">
            <!-- <h2 class="tlt f-Oswald">MATOME</h2> -->
            <span class="label" style="padding-left: 0px;"><?php echo $matome->post_title; ?></span>
        </div>
        <?php if($matome_thumbnail){ ?>
        <div class="matomeWrap">
            <div class="matomeWrap-thumb">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/data/img-detail03.png" alt="">
            </div>
            <div class="matomeWrap-info">
                <?php echo $list; ?>
            </div>
        </div>
        <?php }else{ ?>
        <?php echo $list; ?>
        <?php } ?>
    </div>
<?php endif; ?>