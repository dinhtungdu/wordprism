=== WordPrism ===
Contributors: dinhtungdu
Donate link: http://enforty.com/buy-me-a-beer
Tags: syntax, highlighter
Requires at least: 3.0.1
Tested up to: 4.8
Stable tag: 4.8
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Syntax highlighter plugin using beautiful Prism highlighter.

== Installation ==

1. Upload `wordprism` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= How to use this plugin? =

WordPrism use shortcode `prism` to display your code. Just place your code inside [prism][/prism] tag to use this plugin.
For example: [prism]Your code here[/prism]

= How many attributes are there? =

The list of attributes you can use:
* `lang`: Language of block of code, set to 'none' by default.
* `line_numbers`: Set to `1` or `true` to display line numbers, hidden by default.
* `command_line`: Set to `1` or `true` to display command line output, hidden by default. See http://prismjs.com/plugins/command-line/.
* `user`: Username displayed in command line mode. Set to 'admin' by default.
* `host`: Hostname displayed in command line mode. Set to 'localhost' by default.
* `prompt`: Prompt displayed in command line mode for `powershell`. Set to 'PS C:\Users\Admin' by default.
* `output`: Indicate the line(s) which is the output of command in command line mode. Eg: set '2, 4-8' to display line 2, line 4 to 8 as output. Set to empty by default.

= How many languages are supported? =

* `Markup`
* `C-like`
* `JavaScript`
* `CSS`
* `Bash`
* `Elixir`
* `Erlang`
* `Git`
* `Go`
* `GraphQL`
* `Haskell`
* `JSON`
* `LaTeX`
* `Lua`
* `Markdown`
* `Objective-C`
* `PHP`
* `PowerShell`
* `Python`
* `R`
* `React JSX`
* `Ruby`
* `Rust`
* `Sass`
* `SQL`
* `vim`

== Changelog ==

= 1.0 =
* Initial release.
