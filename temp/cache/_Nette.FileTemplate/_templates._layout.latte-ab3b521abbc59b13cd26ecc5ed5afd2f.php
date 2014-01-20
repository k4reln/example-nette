<?php //netteCache[01]000362a:2:{s:4:"time";s:21:"0.91490700 1388958532";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:40:"/srv/symfony/app/templates/@layout.latte";i:2;i:1387298093;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"695f643 released on 2013-11-05";}}}?><?php

// source file: /srv/symfony/app/templates/@layout.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '2f1ej8yn4i')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lb7d67c88b3d_title')) { function _lb7d67c88b3d_title($_l, $_args) { extract($_args)
?>Home<?php
}}

//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lb85342513df_head')) { function _lb85342513df_head($_l, $_args) { extract($_args)
;
}}

//
// block scripts
//
if (!function_exists($_l->blocks['scripts'][] = '_lb2abf3e8368_scripts')) { function _lb2abf3e8368_scripts($_l, $_args) { extract($_args)
?>	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo Nette\Templating\Helpers::escapeJs($basePath) ?>/js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/vendor/bootstrap.min.js"></script>
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/main.js"></script>
	<script src="<?php echo htmlSpecialChars($basePath) ?>/js/netteForms.js"></script>
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
extract(array('active_home' => FALSE, 'active_bmi' => FALSE, 'active_blog' => FALSE), EXTR_SKIP) ?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title><?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
ob_start(); call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars()); echo $template->upper($template->striptags(ob_get_clean()))  ?> | Sample app</title>
	<meta name="description" content="" />
    <meta name="viewport" content="width=device-width" />
    <link rel="shortcut icon" href="<?php echo htmlSpecialChars($basePath) ?>/favicon.ico" />

    <link rel="stylesheet" href="<?php echo htmlSpecialChars($basePath) ?>/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo htmlSpecialChars($basePath) ?>/css/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="<?php echo htmlSpecialChars($basePath) ?>/css/main.css" />

    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

	<?php call_user_func(reset($_l->blocks['head']), $_l, get_defined_vars())  ?>

</head>

<body>
	<script> document.documentElement.className+=' js' </script>
    <nav class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo htmlSpecialChars($_control->link("Homepage:")) ?>
">Sample App</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li<?php if ($_l->tmp = array_filter(array($active_bmi ? 'active':null))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>>
                    <a href="<?php echo htmlSpecialChars($_control->link("Bmi:")) ?>
">Výpočet BMI</a>
                </li>
                <li<?php if ($_l->tmp = array_filter(array($active_blog ? 'active':null))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>>
                    <a href="<?php echo htmlSpecialChars($_control->link("Blog:")) ?>
">Blog</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
<?php if ($user->isInRole('admin')): ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        Admin <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo htmlSpecialChars($_control->link("Blog:new")) ?>
">Nový článek</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo htmlSpecialChars($_control->link("Sign:out")) ?>
">Odhlásit</a>
                        </li>
                    </ul>
                </li>
<?php else: ?>
                <li>
                    <a href="<?php echo htmlSpecialChars($_control->link("Sign:in")) ?>
">Přihlásit</a>
                </li>
<?php endif ?>
            </ul>
        </div>
    </nav>

<?php $iterations = 0; foreach ($flashes as $flash): ?>	<div class="flash <?php echo htmlSpecialChars($flash->type) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($flash->message, ENT_NOQUOTES) ?></div>
<?php $iterations++; endforeach ?>

<?php Nette\Latte\Macros\UIMacros::callBlock($_l, 'content', $template->getParameters()) ?>

<?php call_user_func(reset($_l->blocks['scripts']), $_l, get_defined_vars())  ?>
</body>
</html>
