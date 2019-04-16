<?php

/**
 * @file
 * Contains \Drupal\mashout_calculators\Form\Test.
 */

namespace Drupal\mashout_calculators\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\ReplaceCommand;
use Drupal\Core\Ajax\InvokeCommand;


class GetHopsData  {

  public function data(array &$form, FormStateInterface $form_state) : AjaxResponse {

    $hopField = $form_state->getValue('field_hops');
    // foreach is needed.
    $term = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->load($hopField[0]["subform"]["field_hops_name"][0]["target_id"]);
    $alphaAcids = !empty($term->field_alpha_acids->value) ? $term->field_alpha_acids->value : '';
    $cohumulon = !empty($term->field_cohumulon->value) ? $term->field_cohumulon->value : '';

    $elem = [
      '#title' => 'Alfa Kwasy',
      '#type' => 'number',
      '#value' => $alphaAcids,
      '#attributes' => [
        'id' => ['field-hop-alpha-wrapper'],
      ],
    ];

    $renderer = \Drupal::service('renderer');
    $response = new AjaxResponse();

    $hopField[0]["subform"]["field_recipe_alpha_acids"][0]["value"] = $alphaAcids;

    $form_state->setRebuild(TRUE);

    $a=1;

    // try set value only, not form element.

//    $response->addCommand(new ReplaceCommand('#field-hop-alpha-wrapper', $renderer->render($elem)));
//
//    return $response;
  }

}
