<?php

use Nette\Application\UI,
    Nette\ComponentModel\IContainer;


class BlogArticleForm extends UI\Form
{
    public function __construct(IContainer $parent = NULL, $name = NULL)
    {
        parent::__construct($parent, $name);
        
        $this->addText('title', 'Titulek:')
            ->setRequired('Zadejte titulek.');

        $this->addTextArea('content', 'Text:')
            ->setRequired('Chybí text.');

        $this->addHidden('id');

        $this->addSubmit('save', 'Uložit');

        $this->addProtection('Vypršel časový limit, odešlete formulář znovu');
    }
}