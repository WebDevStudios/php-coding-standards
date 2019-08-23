<?php // @codingStandardsIgnoreLine: Filename is ok.
/**
 * Require the author tag.
 *
 * The since tag is required on all docblock elements.
 *
 * @since   1.2.0 (wds-coding-standards)
 * @package WebDevStudios\Sniffs
 */

namespace WebDevStudios\Sniffs\All;

use \PHP_CodeSniffer\Sniffs\Sniff;
use \PHP_CodeSniffer\Files\File;

/**
 * Require the return tag.
 *
 * @author Aubrey Portwood
 * @since  1.2.0 (wds-coding-standards)
 */
class RequireAuthorSniff extends BaseSniff {

	/**
	 * What are we parsing?
	 *
	 * @author Aubrey Portwood
	 * @since  1.2.0 (wds-coding-standards)
	 *
	 * @var array
	 */
	public $supportedTokenizers = [ // @codingStandardsIgnoreLine: camelCase required here.
		'PHP',
		'JS',
	];

	/**
	 * Register on all docblock comments.
	 *
	 * @author Aubrey Portwood
	 * @since  1.2.0 (wds-coding-standards)
	 *
	 * @return array List of tokens.
	 */
	public function register() {
		return [

			/**
			 * PHP/JS Docblock.
			 *
			 * @link http://php.net/manual/en/language.basic-syntax.comments.php
			 *
			 * @since 1.2.0 (wds-coding-standards)
			 */
			T_DOC_COMMENT_OPEN_TAG,
		];
	}

	/**
	 * Process file.
	 *
	 * @param  \PHP_CodeSniffer\Files\File $file  The file object.
	 * @param  int                         $start Where the docblock starts.
	 *
	 * @author  Aubrey Portwood <aubrey@webdevstudios.com>
	 *
	 * @since                              1.2.0 (wds-coding-standards)
	 */
	public function process( File $file, $start ) {

		// Get the tokens.
		$this->tokens = $file->getTokens();

		// Get this token.
		$token = $this->get_token( $start );

		// Where does the docblock end for this token.
		$end_position = $this->get_comment_token_closer_position( $token );

		// Enforce on passing of any of these tests.
		$enforce = in_array( true, array(

			// If the next line is a e.g. function() {...
			$this->next_line_is_token_type( $file, T_FUNCTION, 'T_FUNCTION', $end_position ),

			// On apply_filters.
			$this->next_line_has( $file, '= apply_filters(', $end_position )

				// But not commented out.
				&& ! $this->next_line_is_token_type( $file, T_COMMENT, 'T_COMMENT', $end_position ),

			// On do_action.
			$this->next_line_has( $file, '= do_action(', $end_position )

				// But not commented out.
				&& ! $this->next_line_is_token_type( $file, T_COMMENT, 'T_COMMENT', $end_position ),
		), true );

		// We're enforcing this...
		if ( $enforce ) {

			// The @author in the comment block, false by default.
			$has_author_tag = false;

			// Find (in the docblock) if there is an @author.
			for ( $i = $start; $i <= $end_position; $i++ ) {

				// Get the content of the token.
				$content = $this->get_token_content( $this->get_token( $i ) );
				if ( stristr( $content, '@author' ) ) {

					// We found an @author in the block.
					$has_author_tag = true;
				}
			}

			if ( ! $has_author_tag ) {

				// We didn't find @author, let them know.
				$this->warn( $file, $end_position, 'Documenting @author is helpful. If the author is unknown, you can use @author Unknown.' );
			}
		} // enforce.
	}
}
