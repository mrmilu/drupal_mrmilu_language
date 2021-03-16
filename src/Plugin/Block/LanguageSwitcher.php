<?php

namespace Drupal\mrmilu_language\Plugin\Block;

use Drupal\Core\Annotation\Translation;
use Drupal\Core\Block\Annotation\Block;
use Drupal\language\Plugin\Block\LanguageBlock;

/**
 * Provides a 'Language switcher' block.
 *
 * @Block(
 *   id = "language_switcher",
 *   admin_label = @Translation("Mr. Milú Language switcher"),
 *   category = @Translation("Mr. Milú Language"),
 *   deriver = "Drupal\language\Plugin\Derivative\LanguageBlock"
 * )
 */
class LanguageSwitcher extends LanguageBlock {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = parent::build();
    if (!empty($build['#links'])) {
      $prefixes = \Drupal::config('language.negotiation')->get('url.prefixes');
      foreach ($build['#links'] as $language_id => &$link) {
        $link['title'] = $prefixes[$language_id] ? $prefixes[$language_id] : $language_id;
      }
    }
    return $build;
  }
}
