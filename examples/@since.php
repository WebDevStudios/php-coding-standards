<?php
/**
 * Since Example
 *
 * @since   Unknown
 * @package None
 *
 * @purpose Ensure that @since is set properly in dockblocks.
 */

// * The purpose of this example is to ensure that an error shows when at|since is not present and should be.

/**
 * No at since.
 *
 * This docblock should show a warning about at since not being set.
 *
 * @author Aubrey Portwood <aubrey@webdevstudios.com>
 * @return int
 */
function no_at_since() {
	return 0;
}
