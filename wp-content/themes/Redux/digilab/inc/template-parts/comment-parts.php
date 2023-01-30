<?php


/*************************************************
## Post Comment Customization
*************************************************/

if ( ! function_exists( 'digilab_custom_commentlist' ) ) {
    // Theme custom comment list
    function digilab_custom_commentlist($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment; ?>
        <div <?php comment_class('tf-comment-item comments-list'); ?> id="li-comment-<?php comment_ID() ?>">
            <div id="comment-<?php comment_ID(); ?>">
                <div class="commen-item">
                    <div class="tf-comment-left avatar">
                        <?php echo get_avatar( $comment, $size = '80' ); ?>

                        <?php if ($comment->comment_approved == '0') : ?>
                            <em><?php esc_html_e('Your comment is awaiting moderation.', 'digilab') ?></em>
                            <br />
                        <?php endif; ?>
                    </div>

                    <div class="tf-comment-right">
                        <div class="tf-comment-author comment__author-name">
                            <h4><?php echo get_comment_author_link(); ?></h4>
                        </div>
                        <div class="tf-comment-date">
                            <span class="post-meta__item __date-post">
                                <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
                                    <?php printf(esc_html__('%1$s at %2$s', 'digilab'), get_comment_date(),  get_comment_time()) ?>
                                </a>
                                <?php edit_comment_link( esc_html__( '(Edit)', 'digilab'),'  ','' ) ?>
                            </span>
                        </div>
                        <div class="tf-comment-content tf-theme-content tf-clearfix"><?php comment_text() ?></div>
                        <div class="tf-comment-date post-meta comments-info">
                            <div class="tf-comment-reply-content post-meta__item"><?php comment_reply_link(array_merge($args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ))) ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}



// Unset URL from comment form
if ( ! function_exists( 'digilab_move_comment_form_below' ) ) {
    function digilab_move_comment_form_below( $fields ) {

        $comment_field = $fields['comment'];
        unset( $fields['comment'] );
        $fields['comment'] = $comment_field;

        return $fields;

    }
    add_filter( 'comment_form_fields', 'digilab_move_comment_form_below' );
}



// Add placeholder for Name and Email
if ( ! function_exists( 'digilab_move_modify_comment_form_fields' ) ) {
    function digilab_move_modify_comment_form_fields($fields){

        $commenter     = wp_get_current_commenter();
        $user          = wp_get_current_user();
        $user_identity = $user->exists() ? $user->display_name : '';
        $req           = get_option( 'require_name_email' );
        $aria_req      = ( $req ? " aria-required='true'" : '' );
        $html_req      = ( $req ? " required='required'" : '' );
        $html5         = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : false;
        $consent       = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';

        $fields['author'] = '<div class="row"><div class="col-lg-4"><input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" placeholder="' . esc_attr__( 'Enter your name ...', 'digilab' ) . '"' . $aria_req . ' required /></div>';

        $fields['email'] = '<div class="col-lg-4"><input class="form-control" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" placeholder="' . esc_attr__( 'Enter your email ...', 'digilab' ) . '"' . $aria_req . ' required/></div>';

        $fields['url'] = '<div class="col-lg-4"><input class="form-control" id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" placeholder="'.esc_attr__( 'Enter your website ...', 'digilab'  ).'" required/></div></div>';

        $fields['cookies'] = '<div class="row"><div class="col-lg-12"><div class="wp-comment-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' . '<span>' . esc_attr__( 'Save my name, email, and website in this browser for the next time I comment.', 'digilab' ) . '</span></div></div></div>';

        return $fields;
    }
    add_filter('comment_form_default_fields','digilab_move_modify_comment_form_fields');
}

if ( ! function_exists( 'digilab_modify_comment_form_text_area' ) ) {
    function digilab_modify_comment_form_text_area($arg) {
        $arg['title_reply_before'] = '<div class="tf-inner-title tf-comments-title">';
        $arg['title_reply_after'] = '</div>';
        $arg['comment_field'] = '<div class="row"><div class="col-lg-12"><textarea class="form-control w-100"" id="comment" name="comment" cols="45" rows="6" aria-required="true" placeholder="' . esc_attr__( 'Enter your comment ...', 'digilab' ) . '" required></textarea></div></div>';
        return $arg;
    }
    add_filter('comment_form_defaults', 'digilab_modify_comment_form_text_area');
}


// add class comment form button
if ( ! function_exists( 'digilab_addclass_form_button' ) ) {
    function digilab_addclass_form_button( $arg ) {
        $arg['class_submit'] = 'btn circle btn-theme btn-sm';
        return $arg;
    }
    // run the comment form defaults through the newly defined filter
    add_filter( 'comment_form_defaults', 'digilab_addclass_form_button' );
}
