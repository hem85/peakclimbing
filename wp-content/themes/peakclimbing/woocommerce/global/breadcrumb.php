<?php
/**
 * Shop breadcrumb
 * @author 		wildstone family
 * @package 	peakclimbing/archive/Templates
 * @version     2.3.0
 * @see         woocommerce_breadcrumb()
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! empty( $breadcrumb ) ) {

	//echo '<ol class="breadcrumb">';
    
	foreach ( $breadcrumb as $key => $crumb ) {

		//echo '<li>';

		if ( ! empty( $crumb[1] ) && sizeof( $breadcrumb ) !== $key + 1 ) {
			echo '<a class="breadcrumb-item" href="' . esc_url( $crumb[1] ) . '">' . esc_html( $crumb[0] ) . '</a>';
		} else {
			echo esc_html( $crumb[0] );
		}

		//echo '</li>';

		if ( sizeof( $breadcrumb ) !== $key + 1 ) {
			echo $delimiter;
		}
	}

	//echo '</ol>';

}