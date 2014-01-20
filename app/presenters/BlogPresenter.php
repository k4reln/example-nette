<?php

use Nette\Application\UI;

/**
 * Blog presenter.
 */
class BlogPresenter extends BasePresenter
{

    /** @var Nette\Database\Connection */
    private $db;


    /**
    * BlogPresenter constructor
    */
    public function __construct(Nette\Database\Connection $db)
    {
        parent::__construct();
        $this->db = $db;
    }


    /**
    * Checks authorization.
    * @return void
    */
    public function checkRequirements($element)
    {
        $user = (array) $element->getAnnotation('User');
        if (in_array('loggedIn', $user) && !$this->user->isLoggedIn()) {
            $this->flashMessage('Pro editaci článku se musíte přihlásit.', 'error');
            $this->redirect('Blog:');
        }
    }


    /**
    * Create ArticleForm component
    * @return Nette\Application\UI\Form
    */
    protected function createComponentArticleForm()
    {
        $form = new BlogArticleForm();

        $form->onSuccess[] = callback($this, 'articleFormSubmitted');
        return $form;
    }


    /**
    * Process submited ArticleForm
    * @param Nette\Application\UI\Form
    * @return void
    */
    public function articleFormSubmitted(UI\Form $form)
    {
        $values = $form->getValues();

        $updates = array('title' => $values['title'], 'content' => $values['content']);

        $this->db->table('article')
            ->get($values['id'])->update($updates);

        $this->flashMessage('Článek byl uložen.');
        $this->redirect('Blog:');
    }


    /**
    * Create NewArticleForm component
    * @return Nette\Application\UI\Form
    */
    protected function createComponentArticleNewForm()
    {
        $form = new BlogArticleForm();

        $form->onSuccess[] = callback($this, 'articleNewFormSubmitted');
        return $form;
    }


    /**
    * Process submited ArticleForm
    * @param Nette\Application\UI\Form
    * @return void
    */
    public function articleNewFormSubmitted(UI\Form $form)
    {
        $values = $form->getValues();

        $this->db->exec('INSERT INTO article', array(
            'created' => (new DateTime)->format('Y-m-d H:i:s'),
            'title' => $values['title'],
            'content' => $values['content'],
        ));

        $this->flashMessage('Článek byl vytvořen.');
        $this->redirect('Blog:');
    }


    /**
    * Create Paginator component
    * @return VisualPaginator
    */
    protected function createComponentPaginator()
    {
        $visualPaginator = new VisualPaginator();
        $visualPaginator->paginator->itemsPerPage = 5;
        return $visualPaginator;
    }


    /**
    * Before render filter
    * @return void
    */
    protected function beforeRender()
    {
        // Highlight menu button
        $this->template->active_blog = TRUE;
    }


    /**
    * Show articles list
    * @return void
    */
    public function renderDefault()
    {
        $articles = $this->db->table('article');

        $paginator = $this['paginator']->getPaginator();
        $paginator->itemCount = $articles->count('*');

        $this->template->paginator = $paginator;
        $this->template->articles = $articles->limit($paginator->itemsPerPage, $paginator->offset)
            ->order('created DESC')
            ->fetchPairs('id');
    }


    /**
    * Show article render action
    * @return void
    */
    public function renderArticle($id)
    {
        $this->template->article = $this->db->table('article')
            ->get($id);
    }


    /**
    * New article render action
    * @return void
    * @User(loggedIn) 
    */
    public function renderNew()
    {
        
    }


    /**
    * Edit article render action
    * @return void
    * @User(loggedIn) 
    */
    public function renderEdit($id)
    {
        $article = $this->db->table('article')
            ->get($id);

        $this['articleForm']->setDefaults($article);
    }


    /**
    * Delte article render action
    * @return void
    * @User(loggedIn) 
    */
    public function actionDelete($id)
    {
        $this->db->table('article')
            ->get($id)->delete();

        $this->flashMessage('Článek byl smazán');
        $this->redirect('Blog:');
    }

}
