<?php

namespace NonceWrapper;
const WP_DIR = "../wordpress/";

use PHPUnit\Framework\TestCase;


// Load wordpress and our wrapper
require_once( WP_DIR . 'wp-load.php' );
require_once( 'src/wp-nonce-wrapper.php' );


/**
 * Contains the UnitTests for the Wp Nonce Wrapper
 *
 */
class WrapperTest extends TestCase {

    /**
     * Tests the nonce_url function
     */
    public function test_url() {
        $url = 'http://example.com';
        $result = WpNonceWrapper::nonce_url( $url );
        $this->assertStringStartsWith( 'http://example.com?_wpnonce=', $result);
    }

    /**
     * Tests the nonce_field function
     */
    public function test_field() {
        WpNonceWrapper::nonce_field();
        $this->expectOutputRegex('@<input type="hidden" id="_wpnonce" name="_wpnonce" value=".*?" /><input type="hidden" name="_wp_http_referer" value="" />@');
    }

    /**
     * Tests the create_nonce function
     */
    public function test_create() {
        $nonce = WpNonceWrapper::create_nonce();
        $this->assertNotNull( $nonce );
    }

    /**
     * Tests the verify_nonce function
     */
    public function test_verify() {
        $nonce = WpNonceWrapper::create_nonce();
        $result = WpNonceWrapper::verify_nonce( $nonce );
        $this->assertEquals( 1, $result );

        $nonce = "123abc";
        $result = WpNonceWrapper::verify_nonce( $nonce );
        $this->assertFalse( $result );
    }

}