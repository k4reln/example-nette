<?php

use Nette\Application\UI;

/**
 * BMI presenter.
 */
class BmiPresenter extends BasePresenter
{

    /**
    * Retrun BMI category
    * @param float BMI
    * @return string
    */
    protected function __bmi_category($bmi)
    {
        switch($bmi) {
            case ($bmi <= 16.5):
                return 'Těžká podvýživa';
            case ($bmi <= 18.5):
                return 'Podváha';
            case ($bmi <= 25):
                return 'Ideální váha';
            case ($bmi <= 30):
                return 'Nadváha';
            case ($bmi <= 35):
                return 'Mírná obezita';
            case ($bmi <= 40):
                return 'Střední obezita';
            default:
                return 'Morbidní obezita';
        }
    }


    /**
    * Create BMI form component
    * @return Nette\Application\UI\Form
    */
    protected function createComponentBmiForm()
    {
        $form = new UI\Form;

        $form->addText('stature', 'Výška [cm]:')
            ->addRule($form::PATTERN, 'Výška musí být kladné celé číslo.', '^\d+$')
            ->addRule($form::RANGE, 'Výška je mimo platný rozsah hodnot.', array(1, 999999999999))
            ->setRequired('Zadejte prosím výšku.');

        $form->addText('weight', 'Váha [kg]:')
            ->addRule($form::PATTERN, 'Váha musí být kladné celé číslo.', '\d+')
            ->addRule($form::RANGE, 'Výška je mimo platný rozsah hodnot.', array(1, 999999999999))
            ->setRequired('Zadejte prosím váhu.');

        $form->addSubmit('calc', 'Spočítat BMI');
        
        $form->addProtection('Vypršel časový limit, odešlete formulář znovu');
        
        $form->onSuccess[] = callback($this, 'bmiFormSubmitted');
        return $form;
    }


    /**
    * Process submited BMI form
    * @return void
    */
    public function bmiFormSubmitted(UI\Form $form)
    {
        $values = $form->getValues();

        $bmi = $values['weight']/pow($values['stature']/100, 2);
        $message = sprintf('Vaše BMI je: %1$s (%2$s)', number_format($bmi, 2), $this->__bmi_category($bmi));

        $this->flashMessage($message);
        $this->redirect('Bmi:');
    }


    /**
    * Before render filter
    * @return void
    */
    protected function beforeRender()
    {
        // Highlight menu button
        $this->template->active_bmi = TRUE;
    }


    /**
    * Defalut action
    * @return void
    */
    public function renderDefault()
    {
        
    }

}
