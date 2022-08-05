<?php

add_action( 'init', 'dt_register_shortcodes' );
function dt_register_shortcodes(){
    add_shortcode( 'dt-load-github-md', 'dt_load_github_markdown' );
    add_shortcode( 'dt-load-github-release-md', 'dt_load_github_release_markdown' );
}

function dt_cached_api_call( $url ){
    $data = get_transient( "dt_cached_" . esc_url( $url ) );
    if ( empty( $data ) ){
        $response = wp_remote_get( $url );
        $data = wp_remote_retrieve_body( $response );
        set_transient( "dt_cached_" .  esc_url( $url ), $data, HOUR_IN_SECONDS );
    }
    return $data;
}

function dt_load_github_markdown( $atts ){
    $url = null;
    extract( shortcode_atts( array( //phpcs:ignore
        'url' => null,
    ), $atts ) );


    if ( $url ) { /* If readme url is present, then the Readme markdown is used */
        $string = dt_cached_api_call( $url );
    }
    // end check on readme existence
    if ( !empty( $string ) ) {
        $parsedown = new Parsedown();
        return $parsedown->text( $string );
    }

}

function dt_load_github_release_markdown( $atts ){
    $repo = null;
    $tag = null;
    extract( shortcode_atts( array( //phpcs:ignore
        'repo' => null,
        'tag' => null
    ), $atts) );

    if ( empty( $repo ) || empty( $tag ) ){
        return false;
    }

    $url = "https://api.github.com/repos/" . esc_attr( $repo ) . "/releases/tags/" . esc_attr( $tag );
    $data_result = dt_cached_api_call( $url );

    if ( ! $data_result ) {
        return false;
    }
    $release = json_decode( $data_result, true );

    // end check on readme existence
    if ( !empty( $release["body"] ) ) {
        ob_start();
        $parsedown = new Parsedown();
        echo wp_kses_post( $parsedown->text( $release["body"] ) );
        return ob_get_clean();
    }
}
