<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header(); ?>

  <main role="main" class="main">
      <div class="container">
          <div class="default-page">
              <?php

              if ( have_posts() ) {

                  // Load posts loop.
                  while ( have_posts() ) {

                      the_post();
                      echo "<h1>";
                      the_title();
                      echo "</h1>";
                      the_content();

                  }
              }
              ?>
          </div>
      </div>
  </main>

<?php
get_footer();
