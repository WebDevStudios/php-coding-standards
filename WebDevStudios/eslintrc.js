module.exports = {
	'env': {
		'browser': true,
		'jquery': true,
		'es6': true
	},
	'extends': 'wordpress',
	'plugins': [],
	'rules': {

		/**
		 * Enforce spacing inside array brackets.
		 *
		 * @author Aubrey Portwood
		 * @since 1.0
		 */
		'array-bracket-spacing': [ 'error', 'always' ],

		/**
		 * Enforce one true brace style.
		 *
		 * @author Aubrey Portwood
		 * @since 1.0
		 */
		'brace-style': 'error',

		/**
		 * Require camel case names.
		 *
		 * @author Aubrey Portwood
		 * @since 1.0
		 */
		'camelcase': [ 'error', {
			properties: 'always'
		} ],

		/**
		 * Disallow or enforce trailing commas.
		 *
		 * @author Aubrey Portwood
		 * @since 1.0
		 */
		'comma-dangle': [ 'error', 'never' ],

		/**
		 * Enforce spacing before and after comma.
		 *
		 * @author Aubrey Portwood
		 * @since 1.0
		 */
		'comma-spacing': 'error',

		/**
		 * Enforce one true comma style.
		 *
		 * @author Aubrey Portwood
		 * @since 1.0
		 */
		'comma-style': [ 'error', 'last' ],

		/**
		 * Encourages use of dot notation whenever possible.
		 *
		 * @author Aubrey Portwood
		 * @since 1.0
		 */
		'dot-notation': [ 'error', {
			allowKeywords: true,
			allowPattern: '^[a-z]+(_[a-z]+)+$'
		} ],

		/**
		 * Enforce newline at the end of file, with no multiple empty lines.
		 *
		 * @author Aubrey Portwood
		 * @since 1.0
		 */
		'eol-last': 'error',

		/**
		 * Require or disallow spacing between function identifiers and their invocations.
		 *
		 * @author Aubrey Portwood
		 * @since 1.0
		 */
		'func-call-spacing': 'off',

		/**
		 * Enforces spacing between keys and values in object literal properties.
		 *
		 * @author Aubrey Portwood
		 * @since 1.0
		 */
		'key-spacing': [ 'error', {
			beforeColon: false,
			afterColon: true
		} ],

		/**
		 * Enforce spacing before and after keywords.
		 *
		 * @author Aubrey Portwood
		 * @since 1.0
		 */
		'keyword-spacing': 'error',

		/**
		 * Disallow mixed "LF" and "CRLF" as linebreaks.
		 *
		 * @author Aubrey Portwood
		 * @since 1.0
		 */
		'linebreak-style': [ 'error', 'unix' ],

		/**
		 * Enforces empty lines around comments.
		 *
		 * @author Aubrey Portwood
		 * @since 1.0
		 */
		'lines-around-comment': [ 'error', {
			beforeLineComment: true
		} ],

		/**
		 * Disallow mixed spaces and tabs for indentation.
		 *
		 * @author Aubrey Portwood
		 * @since 1.0
		 */
		'no-mixed-spaces-and-tabs': 'error',

		/**
		 * Disallow use of multiline strings.
		 *
		 * @author Aubrey Portwood
		 * @since 1.0
		 */
		'no-multi-str': 'error',

		/**
		 * Disallow multiple empty lines.
		 *
		 * @author Aubrey Portwood
		 * @since 1.0
		 */
		'no-multiple-empty-lines': 'error',

		/**
		 * Disallow use of the with statement.
		 *
		 * @author Aubrey Portwood
		 * @since 1.0
		 */
		'no-with': 'error',

		/**
		 * Require or disallow an newline around variable declarations.
		 *
		 * @author Aubrey Portwood
		 * @since 1.0
		 */
		'one-var-declaration-per-line': [ 'error', 'initializations' ],

		/**
		 * Enforce operators to be placed before or after line breaks.
		 *
		 * @author Aubrey Portwood
		 * @since 1.0
		 */
		'operator-linebreak': [ 'error', 'after' ],

		/**
		 * Require or disallow use of semicolons instead of ASI.
		 *
		 * @author Aubrey Portwood
		 * @since 1.0
		 */
		'semi': [ 'error', 'always' ],

		/**
		 * Require or disallow space before blocks.
		 *
		 * @author Aubrey Portwood
		 * @since 1.0
		 */
		'space-before-blocks': [ 'error', 'always' ],

		/**
		 * Require or disallow space before function opening parenthesis.
		 *
		 * @author Aubrey Portwood
		 * @since 1.0
		 */
		'space-before-function-paren': [ 'error', 'never' ],

		/**
		 * Require or disallow space before blocks,
		 *
		 * @author Aubrey Portwood
		 * @since  1.1
		 */
		'space-in-parens': [ 'error', 'always' ],

		/**
		 * Require spaces around operators,
		 *
		 * @author Aubrey Portwood
		 * @since 1.1
		 */
		'space-infix-ops': 'error',

		/**
		 * Require or disallow spaces before/after unary operators (words on by default, nonwords),
		 *
		 * @author Aubrey Portwood
		 * @since  1.1
		 */
		'space-unary-ops': [ 'error', {
			overrides: { '!': true }
		} ],

		/**
		 * Don't force vars to be on top.
		 *
		 * In contradiction to https://make.wordpress.org/core/handbook/best-practices/coding-standards/javascript/#declaring-variables-with-var
		 * we do not require this.
		 *
		 * @since  1.1
		 * @author Aubrey Portwood
		 */
		'vars-on-top': 'off',

		/**
		 * Require or disallow Yoda conditions.
		 *
		 * @since  1.0
		 * @author Aubrey Portwood
		 */
		'yoda': [ 'error', 'always' ],

		/**
		 * Always show an error when a variable is created that is never used.
		 *
		 * @author Aubrey Portwood
		 * @since  1.1
		 */
		'no-unused-vars': 'error',

		/**
		 * No use of console.
		 *
		 * Use of console can be done safely with checking
		 * window.console and running it from there.
		 *
		 * @author Aubrey Portwood
		 * @since  1.1
		 */
		'no-console': 'error',

		/**
		 * No use of debugger.
		 *
		 * This is because we often can leave it in the code,
		 * this draws a nice red line around it.
		 *
		 * @since  1.1
		 * @author Aubrey Portwood
		 */
		'no-debugger': 'error'
	}
};
