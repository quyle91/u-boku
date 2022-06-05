<?php
/*
Template Name: Component Page
*/
get_header(); ?>
<div class="main">
  <?php
      // check if the flexible content field has rows of data
      get_template_part('templates/components/components');
    ?>
</div>
<?php
get_footer();