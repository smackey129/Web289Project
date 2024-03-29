<?php
require_once('private/initialize.php');

if(is_post_request()) {

  // Create record using post parameters
  $args = $_POST['user'];
  $user = new User($args);
  $result = $user->save();

  if($result === true) {
    $new_id = $user->id;
    $session->login($user); 
    redirect_to(url_for('profile/confirmedit.php'));
  } else {
    // show errors
  }

} else {
  // display the form
  $user = new User;
}

?>

<?php $page_title = 'Sign Up'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>
<main role="main" id="main-content" tabindex="-1">
    <h1>Sign Up</h1>
    <p>All fields marked with "*" are required</p>
    <?php echo display_errors($user->errors); ?>

    <form action="<?php echo url_for('signup.php'); ?>" method="post">

      <?php include('users/form_fields.php'); ?>
      <br>
      <script src="<?= url_for('js/captchaSetup.js')?>" async defer></script>
      <div
          class="g-recaptcha"
          data-sitekey="6Lef7polAAAAALA3a2Q57-04Q0dGvvOsmu-5_mC-"
          data-callback="callback"
        >
      </div>
      <br>
        <input type="submit" id="submit-button" value="Sign Up">
    </form>
</main>
<?php include(SHARED_PATH . '/user_footer.php'); ?>
