<?php //netteCache[01]000367a:2:{s:4:"time";s:21:"0.17142000 1388958552";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:45:"/srv/symfony/app/templates/Blog/default.latte";i:2;i:1387282493;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"695f643 released on 2013-11-05";}}}?><?php

// source file: /srv/symfony/app/templates/Blog/default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'f9pjn8jru9')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbe041a6bd59_content')) { function _lbe041a6bd59_content($_l, $_args) { extract($_args)
;call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>

<?php if ($articles): ?>
<div class="blog-listing">
<?php $_ctrl = $_control->getComponent("paginator"); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render() ?>
    <table>
    <tr>
        <th class="created">Datum vytvoření</th>
        <th class="title">Název blogu</th>
<?php if ($user->isLoggedIn()): ?>
        <th></th>
        <th></th>
<?php endif ?>
    </tr>
<?php $iterations = 0; foreach ($articles as $item): ?>
        <tr>
            <td class="created"><?php echo Nette\Templating\Helpers::escapeHtml($item['created'], ENT_NOQUOTES) ?></td>
            <td class="title"><a href="<?php echo htmlSpecialChars($_control->link("Blog:article", array($item))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($item['title'], ENT_NOQUOTES) ?></a></td>
<?php if ($user->isLoggedIn()): ?>
            <td><a href="<?php echo htmlSpecialChars($_control->link("Blog:edit", array($item))) ?>
">Upravit</a></td>
            <td><a href="<?php echo htmlSpecialChars($_control->link("Blog:delete", array($item))) ?>
">Smazat</a></td>
<?php endif ?>
        </tr>
<?php $iterations++; endforeach ?>
    </table>
<?php $_ctrl = $_control->getComponent("paginator"); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render() ?>
</div>
<?php else: ?>
Blog není k dispozici.
<?php endif ;
}}

//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lbf54391fa43_title')) { function _lbf54391fa43_title($_l, $_args) { extract($_args)
?><h1>Blog</h1>
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