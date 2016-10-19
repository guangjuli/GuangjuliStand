<?php
/**
 * Smarty plugin
 *
 * @package    Smarty
 * @subpackage PluginsFunction
 */

/**
 * Smarty {fetch} plugin
 * Type:     function<br>
 * Name:     fetch<br>
 * Purpose:  fetch file, web or ftp data and display results
 *
 * @link   http://www.smarty.net/manual/en/language.function.fetch.php {fetch}
 *         (Smarty online manual)
 * @author Monte Ohrt <monte at ohrt dot com>
 *
 * @param array                    $params   parameters
 * @param Smarty_Internal_Template $template template object
 *
 * @throws SmartyException
 * @return string|null if the assign parameter is passed, Smarty assigns the result to a template variable
 */
function smarty_function_widget($params) {
    return Model('Widget')->$params['name']();
}


