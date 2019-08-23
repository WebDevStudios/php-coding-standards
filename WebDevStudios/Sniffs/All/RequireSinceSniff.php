<?php // @codingStandardsIgnoreLine: Filename is ok.
/**
 * Require the since tag.
 *
 * The since tag is required on all docblock elements.
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
class RequireSinceSniff extends BaseSniff {

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
			 *
			 * @since 1.1.0 (wds-coding-standards)
			 */
			T_DOC_COMMENT_OPEN_TAG,
		];
	}

	/**
	 * Process file.
	 *
	 * @author Aubrey Portwood
	 *
	 * @param  \PHP_CodeSniffer\Files\File $file            The file object.
	 * @param  int                         $doc_block_start Where the docblock starts.
	 *
	 * @since 1.1.0 (wds-coding-standards)
	 *
	 * @since 1.1.1 Don't warn about @since about anything in themes. (wds-coding-standards)
	 * @see         https://docs.google.com/document/d/16-wN2i9Fe2fpq24PMMQqu80vBvCVNvm2kpgwtcfsJXE/edit Documentation of this requirement.
	 *
	 * @return void Early bail if a WordPress theme.
	 */
	public function process( File $file, $doc_block_start ) {
		$this->tokens  = $file->getTokens();
		$token         = $this->tokens[ $doc_block_start ];
		$doc_block_end = $token['comment_closer'];

		// The @since in the comment block, false by default.
		$have_an_at_since_tag = false;

		for ( $i = $doc_block_start; $i <= $doc_block_end; $i++ ) {
			if ( stristr( $this->tokens[ $i ]['content'], '@since' ) ) {

				// We found an @since in the block.
				$have_an_at_since_tag = $this->tokens[ $i ];
			}
		}

		/**
		 * Don't warn on theme files at all.
		 *
		 * @since 1.1.1 (wds-coding-standards)
		 * @see   https://docs.google.com/document/d/16-wN2i9Fe2fpq24PMMQqu80vBvCVNvm2kpgwtcfsJXE/edit Documentation of this requirement.
		 */
		if ( stristr( $file->getFilename(), 'wp-content/themes/' ) ) {
			return;
		}

		if ( ! $have_an_at_since_tag ) {
			$this->warn( $file, $doc_block_end, sprintf( "Documenting the version this was introduced is recommended. If you aren't using any official versioning standard, consider using the date, e.g.: %s.", date( 'F j, Y' ) ) );
		}
	}
}
