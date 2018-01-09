<?php
add_action( 'e14_header', 'e14_get_logo' );
add_action( 'e14_loop_before', 'e14_open_row' );
add_action( 'e14_loop_after', 'e14_close_row' );