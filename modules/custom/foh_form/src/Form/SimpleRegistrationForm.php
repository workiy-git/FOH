<?php
 
namespace Drupal\foh_form\Form;
 
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Database\Database;
use Drupal\Core\Url;
use Drupal\Core\Routing;
 
class SimpleRegistrationForm extends FormBase {
 public function getFormId() {
   // Here we set a unique form id
   return 'foh_from';
 }
 
 public function buildForm(array $form, FormStateInterface $form_state, $username = NULL) {
    // Textfield form element.
   $form['first_name'] = array(
     '#type' => 'textfield',
     '#title' => t('First Name:'),
     '#required' => TRUE,
   );
    // Textfield form element.
   $form['last_name'] = array(
     '#type' => 'textfield',
     '#title' => t('Last Name:'),
     '#required' => TRUE,
   );
    // Textfield form element.
   $form['email_id'] = array(
     '#type' => 'email',
     '#title' => t('Email ID:'),
     '#required' => TRUE,
   );
     // Textfield form element.
     $form['confirm_email_id'] = array(
      '#type' => 'email',
      '#title' => t('Confirm Email ID:'),
      '#required' => TRUE,
    );
    // Textfield form element.
   $form['mobile_number'] = array (
     '#type' => 'tel',
     '#title' => t('Mobile no'),
   );
    // Textfield form element.
   $form['dob'] = array (
     '#type' => 'date',
     '#title' => t('DOB'),
     '#required' => TRUE,
   );
   // select form element.
   $form['gender'] = array (
     '#type' => 'select',
     '#title' => ('Gender'),
     '#options' => array(
       'Female' => t('Female'),
       'male' => t('Male'),
     ),
   );
   // Radio buttons form elements.
   $form['confirmation'] = array (
     '#type' => 'radios',
     '#title' => ('Are you above 18 years old?'),
     '#options' => array(
       'Yes' =>t('Yes'),
       'No' =>t('No')
     ),
   );
   //submit button.
   $form['actions']['submit'] = array(
     '#type' => 'submit',
     '#value' => $this->t('Save'),
     '#button_type' => 'primary',
   );
   return $form;
 }
 public function validateForm(array &$form, FormStateInterface $form_state) {
   if (strlen($form_state->getValue('mobile_number')) < 10) {
     $form_state->setErrorByName('mobile_number', $this->t('Mobile number too short.'));
   }
   if (strlen($form_state->getValue('email_id'))!=strlen($form_state->getValue('confirm_email_id'))) {
    $form_state->setErrorByName('confirm_email_id', $this->t('Confirm mail id not matching!.'));
  }
 }
 
 public function submitForm(array &$form, FormStateInterface $form_state) {
  
   \Drupal::messenger()->addMessage($this->t('@can_name ,Your application is being submitted!', array('@can_name' => $form_state->getValue('first_name'))));
   foreach ($form_state->getValues() as $key => $value) {
     \Drupal::messenger()->addMessage($key . ': ' . $value);
   }
    $form_state->setRedirect('<front>');

    /*try{
      $conn = Database::getConnection();
      
      $field = $form_state->getValues();
       
      $fields["fname"] = $field['fname'];
      $fields["sname"] = $field['sname'];
      $fields["age"] = $field['age'];
      $fields["marks"] = $field['marks'];
      
        $conn->insert('students')
           ->fields($fields)->execute();
        \Drupal::messenger()->addMessage($this->t('The Student data has been succesfully saved'));
       
    } catch(Exception $ex){
      \Drupal::logger('dn_students')->error($ex->getMessage());
    }*/




 }





 
}