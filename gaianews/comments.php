<?php if ( have_comments() ) : ?>
 
  <ul class="commentlist">
      <?php
          wp_list_comments();
      ?>
  </ol>
 
<?php else : ?>
 
<?php endif; ?>