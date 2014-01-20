<?php //netteCache[01]000371a:2:{s:4:"time";s:21:"0.83136900 1388958532";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:49:"/srv/symfony/app/templates/Homepage/default.latte";i:2;i:1387311473;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"695f643 released on 2013-11-05";}}}?><?php

// source file: /srv/symfony/app/templates/Homepage/default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'lqrliguysn')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb043747cf34_content')) { function _lb043747cf34_content($_l, $_args) { extract($_args)
?><div id="banner">
<?php call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>
    <h2>Login</h2>
    <p>Name: test1</p>
    <p>Pass: pass1234</p>
</div>
<?php
}}

//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lbb04df6872f_title')) { function _lbb04df6872f_title($_l, $_args) { extract($_args)
?>	<h1>Home</h1>
<?php
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = empty($template->_extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $template->_extended = $_extended = TRUE;


if ($_l->extends) {
	ob_start();

} elseif (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 