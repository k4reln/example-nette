<?php

/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{

    protected function beforeRender()
    {
        $this->template->active_home = TRUE;
    }

	public function renderDefault()
	{
		$this->template->anyVariable = 'any value';
	}

}
