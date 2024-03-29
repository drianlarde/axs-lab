<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>
<?php $textdoimain = 'chronos'; ?>
<?php if ( have_comments() ) : ?>
			<?php wp_list_comments('callback=chronos_theme_comment'); ?>
		<?php
			// Are there comments to navigate through?
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
			<nav class="navigation comment-navigation" role="navigation">		   
				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'chronos' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'chronos' ) ); ?></div>
			</nav><!-- .comment-navigation -->
		<?php endif; // Check for comment navigation ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
			<p class="no-comments"><?php _e( 'Comments are closed.' , 'CNE' ); ?></p>
		<?php endif; ?>			
<?php endif; ?>		
		<!-- //COMMENTS -->
<!-- LEAVE A COMMENT -->
		
<?php
    if ( is_singular() ) wp_enqueue_script( "comment-reply" );
        $aria_req = ( $req ? " aria-required='true'" : '' );
        $comment_args = array(
        		'id_form' => 'ajax-form',                              
                'title_reply'=> '',
                'fields' => apply_filters( 'comment_form_default_fields', array(  

					'author' => '<label for="name">Name: * </label>
						<input id="author" name="author" id="name" type="text" value="" />',
                    'email' => '<label for="email">E-Mail: * </label>
						<input value="" id="email" name="email" type="text" />',                                                                        
                ) ),                                
                 'comment_field' => '<label for="message">Your Comment:</label><textarea name="comment"'.$aria_req.' id="comment"></textarea>',                                                   
                 'label_submit' => 'Submit Comment',
                 'comment_notes_before' => '',
                 'comment_notes_after' => '',               
        )
    ?>
    <?php comment_form($comment_args); ?>

                