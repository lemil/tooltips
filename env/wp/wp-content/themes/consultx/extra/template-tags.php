<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package consultx
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'restricted access' );
}

if ( ! function_exists( 'consultx_posted_on' ) ) {
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function consultx_posted_on() {
		$byline = sprintf(
			// translators: By post author tranlation.
			esc_html_x( 'by %s', 'post author', 'consultx' ),
			'<span><a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . get_the_author() . '</a></span>'
		);

		echo '<li><i class="fa fa-user"></i><span> ' . $byline . '</span></li>'; // WPCS: XSS OK.

		//category
		echo '<li> ' . '<span><a><i class="fa fa-folder-open"></i> '; 

		foreach((get_the_category()) as $category)
        { 
        echo esc_html($category->cat_name) .'  '; 
        } 

		echo '</a></span>' . '</li>'; // WPCS: XSS OK.

		//comments
		echo '<li> ' . '<span><a><i class="fa fa-comments-o" aria-hidden="true"></i> '; 

		comments_number( esc_html('0', 'consultx'), esc_html('1', 'consultx'), esc_html('%', 'consultx') );

		echo '</a></span>' . '</li>'; // WPCS: XSS OK.

		

	}
}

if ( ! function_exists( 'consultx_entry_footer' ) ) {
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function consultx_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'consultx' ) );
			if ( $categories_list && consultx_categorized_blog() ) {
				// translators: Posted in tranlation.
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'consultx' ) . '</span>', esc_html($categories_list) ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'consultx' ) );
			if ( $tags_list ) {
				// translators: Tagged tranlation.
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'consultx' ) . '</span>', esc_html($tags_list) ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			/* translators: %s: post title */
			comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'consultx' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'consultx' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
}

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function consultx_categorized_blog() {
	$all_the_cool_cats = get_transient( 'consultx_categories' );
	if ( false === $all_the_cool_cats ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'consultx_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so consultx_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so consultx_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in consultx_categorized_blog.
 */
function consultx_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'consultx_categories' );
}
add_action( 'edit_category', 'consultx_category_transient_flusher' );
add_action( 'save_post', 'consultx_category_transient_flusher' );