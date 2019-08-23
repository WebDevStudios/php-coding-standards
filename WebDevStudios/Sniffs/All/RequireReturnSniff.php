<?php // @codingStandardsIgnoreLine: Filename is ok.
/**
 * Require the return tag.
 *
 * This requires the return tag when you have an return statement
 * inside of the function.
 *
 * @since   1.1.0 (wds-coding-standards)
 * @package WebDevStudios\Sniffs
 */

namespace WebDevStudios\Sniffs\All;

use \PHP_CodeSniffer\Sniffs\Sniff;
use \PHP_CodeSniffer\Files\File;

/**
 * Require the return tag.
 *
 * @author Aubrey Portwood
 * @since  1.1.0 (wds-coding-standards)
 */
class RequireReturnSniff extends BaseSniff {

	/**
	 * What are we parsing?
	 *
	 * @author Aubrey Portwood
	 * @since  1.1.0 (wds-coding-standards)
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
	 * @since  1.1.0 (wds-coding-standards)
	 *
	 * @return array List of tokens.
	 */
	public function register() {
		return [

			/**
			 * PHP/JS Docblock.
			 *
			 * @link http://php.net/manual/en/language.basic-syntax.comments.php
			 * @since 1.1.0 (wds-coding-standards)
			 */
			T_DOC_COMMENT_OPEN_TAG,
		];
	}

	/**
	 * Process file.
	 *
	 * @author Aubrey Portwood
	 * @since  1.1.0 (wds-coding-standards)
	 *
	 * @param  \PHP_CodeSniffer\Files\File $file            The file object.
	 * @param  int                         $doc_block_start Where the docblock starts.
	 * @return void                                         Skips errors when not working with functions.
	 */
	public function process( File $file, $doc_block_start ) {
		$this->tokens = $file->getTokens();

		$token = $this->tokens[ $doc_block_start ];

		$doc_block_end = $token['comment_closer'];

		// The @ return in the comment block, false by default.
		$have_an_at_return_tag = false;

		for ( $i = $doc_block_start; $i <= $doc_block_end; $i++ ) {
			if ( stristr( $this->tokens[ $i ]['content'], '@return' ) ) {

				// We found an @return in the block.
				$have_an_at_return_tag = $this->tokens[ $i ];
			}
		}

		// If this is a function, does it have a return;? If not, this will come back as true.
		$examine_function = $this->examine_function( $file, (object) [
			'doc_block_end' => $doc_block_end,
		] );

		if ( -1 === $examine_function ) {

			// The code after the docblock isn't a function, so this doesn't matter.
			return;
		}

		if ( ! $have_an_at_return_tag && true === $examine_function ) {
			$this->error( $file, $doc_block_end, 'Please document your return for this function in an @return tag.' );
		}

		if ( $have_an_at_return_tag && false === $examine_function ) {
			$this->error( $file, $doc_block_end, 'Your function does not return anything, no need for @return tag.' );
		}
	}

	/**
	 * Examine a function, and get some context about whether it has a return statement or not.
	 *
	 * @param \PHP_CodeSniffer\Files\File $file The file.
	 * @param array                       $args {
	 *     Arguments.
	 *     @type string $doc_block_end Where the docblock ends.
	 * }
	 *
	 * @since 1.1.0 (wds-coding-standards)
	 * @return string Contextual information about the function (if it is a function).
	 */
	protected function examine_function( File &$file, $args ) {

		// See if we can find a function start.
		$function_start = $file->findNext( T_FUNCTION, $args->doc_block_end );
		if ( ! $function_start ) {

			// This isn't a function, so we're okay.
			return -1;
		}

		$doc_block_end_line = $this->get_token( $args->doc_block_end, 'line' );

		$function_start_line = $this->get_token( $function_start, 'line' );

		if ( $function_start_line !== $doc_block_end_line + 1 ) {

			// This also isn't a function, it's okay.
			return -1;
		}

		if ( $this->has_abstract_token( $file, $args ) ) {
			return 'abstract_function';
		}

		// This is where the function (it's a function) ends...
		$function_end = $this->get_token( $function_start, 'scope_closer' );

		// Assume no return for now.
		$return = false;

		// We'll start searching the function block starting off here.
		$cursor = $function_start;
		while ( $cursor <= $function_end ) {

			// Position of the next found return.
			$position = $this->find_next( $file, T_RETURN, 'T_RETURN', $cursor, $function_end );
			if ( false === $position ) {

				// No position for return statement, just stop here.
				break;
			}

			// Get the token to examine.
			$return = $this->get_token( $position );

			// The level of the return, is it on the same level as the function?
			if (

				// Is a nested function.
				(

					// Is a nested closure.
					isset( $return['nested_parenthesis'] ) ||

					// If it's condition is a closure.
					isset( $return['conditions'] ) && in_array( 'PHPCS_T_CLOSURE', $return['conditions'], true )

				) &&

				// Not at the end of the function...
				$return['level'] !== $this->get_token( $function_end, 'level' ) + 1

			) {

				// Start where this left off and try again.
				$cursor = $position + $return['length'];

			} else {

				// This must be the return we're looking for.
				return true;
			}
		}

		// Must not have found a valid one.
		return false;
	}

	/**
	 * Find whether the abstract keyword is present in a function.
	 *
	 * @param \PHP_CodeSniffer\Files\File $file Reference to the current file.
	 * @param object                      $args Current working arguments.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2018-11-21 (wds-coding-standards)
	 * @return int
	 */
	private function has_abstract_token( &$file, $args ) {
		return (bool) $file->findNext( T_ABSTRACT, $args->doc_block_end );
	}
}
