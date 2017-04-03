<?php

namespace NonceWrapper;

class WpNonceWrapper {

    public static function nonce_ays( $action ) {
        return wp_nonce_ays( $action ) ;
    }

    public static function nonce_url( $actionurl, $action = -1, $name = '_wpnonce' ) {
        return wp_nonce_url( $actionurl, $action, $name );
    }

    public static function nonce_tick() {
        return wp_nonce_tick();
    }

    public static function nonce_field( $action = -1, $name = '_wpnonce', $referer = true, $echo = true ) {
        return wp_nonce_field( $action, $name, $referer, $echo );
    }

    public static function create_nonce( $action = -1 ) {
        return wp_create_nonce( $action );
    }

    public static function verify_nonce( $nonce, $action = -1) {
        return wp_verify_nonce( $nonce, $action );
    }

}