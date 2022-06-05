<?php
  if( have_rows('components') ):
    // loop through the rows of data
    while ( have_rows('components') ) : the_row();      
      get_template_part('templates/components/component-'.str_replace("_", "-", get_row_layout()));
      
    endwhile;
  endif;
