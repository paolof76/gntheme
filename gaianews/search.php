<?php
if( get_post_type() == 'offerta-turistica' ) {
  get_template_part( 'search', 'offerta-turistica' );
}else {
  get_template_part( 'search', 'generico' );
}
?>