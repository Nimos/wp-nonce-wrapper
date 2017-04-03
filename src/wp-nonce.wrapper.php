<?php

namespace NonceWrapper;

class WpNonceWrapper {

    /**
     * Displays "Are You Sure" message to confirm the action being taken.
     *
     * @param int|string $action The nonce action.
     */
    public static function nonce_ays( $action ) {
        wp_nonce_ays( $action ) ;
    }

    /**
     * Returns the URL with the nonce added to it
     *
     * @param string        $actionurl  The URL to add the nonce to
     * @param int|string    $action     Optional. Name of the nonce action. Default -1.
     * @param string        $name       Optional. Name of the nonce. Default '_wpnonce'.
     * @return string Escaped URL with nonce action added.
     */
    public static function nonce_url( $actionurl, $action = -1, $name = '_wpnonce' ) {
        return wp_nonce_url( $actionurl, $action, $name );
    }

    /**
     * Generates two hidden fields to add a nonce to a form.
     *
     * @param int|string    $action     Optional. Name of the action. Default -1.
     * @param string        $name       Optional. Name of the nonce. Default '_wpnonce'.
     * @param bool          $referer    Optional. If true, set the referer field for validation. Default true.
     * @param bool          $echo       Optional. Whether to display or return the hidden form field. Default true.
     * @return string Nonce field as HTML markup.
     */
    public static function nonce_field( $action = -1, $name = '_wpnonce', $referer = true, $echo = true ) {
        return wp_nonce_field( $action, $name, $referer, $echo );
    }


    /**
     * Generates and returns a nonce, based on action, user, session and time.
     *
     * @param string|int    $action Optional. Name of the nonce action.
     * @return string The generated token.
     */
    public static function create_nonce( $action = -1 ) {
        return wp_create_nonce( $action );
    }

    /**
     * Verifies that a nonce fits the specified action and is not expired.
     *
     * @param string    $nonce  The nonce to verify.
     * @param int       $action Optional. Name of the nonce action. Default -1.
     * @return mixed    False if the nonce isn't valid. 1 if it is valid and was generated 0-12 hours ago. 2 if
     *                  it is valid and generated between 12-24 hours ago.
     */
    public static function verify_nonce( $nonce, $action = -1) {
        return wp_verify_nonce( $nonce, $action );
    }



}