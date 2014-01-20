<?php //netteCache[01]000367a:2:{s:4:"time";s:21:"0.91984100 1389015849";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:45:"/srv/symfony/app/templates/Blog/article.latte";i:2;i:1387224410;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"695f643 released on 2013-11-05";}}}?><?php

// source file: /srv/symfony/app/templates/Blog/article.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'qhr3x5s3lo')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lbef03cce6ec_title')) { function _lbef03cce6ec_title($_l, $_args) { extract($_args)
?>Blog - <?php echo Nette\Templating\Helpers::escapeHtml($template->striptags($article['title']), ENT_NOQUOTES) ?>

<?php
}}

//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb7d1fc78d66_content')) { function _lb7d1fc78d66_content($_l, $_args) { extract($_args)
;if ($article): ?>
<h1><?php echo $article['title'] ?></h1>
<p><?php echo Nette\Templating\Helpers::escapeHtml($article['created'], ENT_NOQUOTES) ?></p>
<p><?php echo $article['content'] ?></p>
<?php else: ?>
Článek není k dispozici.
<?php endif ;
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
call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>

<?php call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 