<?php
  
  namespace Drupal\loremipsum\Plugin\Block;

  use Drupal\Core\Access\AccessResult;
  use Drupal\Core\Block\BlockBase;
  use Drupal\Core\Form\FormStateInterface;
  use Drupal\Core\Session\AccountInterface;

  /**
  * Provides a Lorem ipsum block with which you can generate dummy text anywhere.
  *
  * @Block(
  *   id = "loremipsum_block",
  *   admin_label = @Translation("Lorem ipsum block"),
  * )
  */

  class LoremIpsumBlock extends BlockBase {

    /**
    * {@inheritdoc}
    */
    
    public function build() {
      //return the form @Form/LoremIpsumBlockForm.php
      return \Drupal::formBuilder()->getForm('Drupal\loremipsum\Form\LoremIpsumBlockForm');
    }

    /**
    * {@inheritdoc}
    */

    protected function blockAcces(AccountInterface $account) {
      return AccessResult::allowedIfHasPermission($account,'generate lorem ipsum');
    }

    /**
    * {@inheritdoc}
    */

    public function blockForm($form, FormStateInterface $form_state) {
      $form = parent::blockForm($form, $form_state);

      $config = $this->getConfiguration();

      return $form;
    }

    /**
    * {@inheritdoc}
    */

    public blockSubmit($form, FormStateInterface $form_state) {
      $this->setConfigurationValue('loremipsum_block_settings', $form_state->getValue('loremipsum_block_settings'));
    }
    
  }
?>