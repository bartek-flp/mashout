<?php

namespace Drupal\mashout_calculators\Controller;

use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Url;

class BasicPage extends ControllerBase{

    use StringTranslationTrait;

    public function content() {

        $urlIbu = Url::fromRoute('mashout_calculators.ibu', [], ['absolute' => TRUE]);

        $urls = [
            'IBU CALCULATOR' => $urlIbu,
        ] ;

        return [
            '#theme' => 'brewer_calculators',
            '#title' => $this->t('Calculators'),
            '#data' => $urls,
        ];

    }
}
