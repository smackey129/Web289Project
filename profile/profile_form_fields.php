<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if(!isset($user)) {
  redirect_to(url_for('index.php'));
}
?>

<?php if(array_key_exists("firstname", $user->errors)) {echo display_errors($user->errors["firstname"]);} ?>
<dl>
  <dt><label for="user[fname_usr]">* First name</label></dt>
  <dd><input type="text" name="user[fname_usr]" value="<?php echo h($user->fname_usr); ?>" required id="user[fname_usr]"></dd>
</dl>

<?php if(array_key_exists("lastname", $user->errors)) {echo display_errors($user->errors["lastname"]);} ?>
<dl>
  <dt><label for="user[lname_usr]">* Last name</label></dt>
  <dd><input type="text" name="user[lname_usr]" value="<?php echo h($user->lname_usr); ?>" required id="user[lname_usr]"></dd>
</dl>

<?php if(array_key_exists("email", $user->errors)) {echo display_errors($user->errors["email"]);} ?>
<dl>
  <dt><label for="user[email_usr]">* Email</label></dt>
  <dd><input type="email" name="user[email_usr]" value="<?php echo h($user->email_usr); ?>" required id="user[email_usr]"></dd>
</dl>

<?php if(array_key_exists("username", $user->errors)) {echo display_errors($user->errors["username"]);} ?>
<dl>
  <dt><label for="user[username_usr]">* Username</label></dt>
  <dd><input type="text" name="user[username_usr]" value="<?php echo h($user->username_usr); ?>" required id="user[username_usr]"></dd>
</dl>

<dl>
  <dt><label for="user[street_address_usr]">* Street Address</label></dt>
  <dd><input type="text" name="user[street_address_usr]" value="<?php echo h($user->street_address_usr); ?>" required id="user[street_address_usr]"></dd>
</dl>

<dl>
  <dt><label for="user[city_usr]">* City</label></dt>
  <dd><input type="text" name="user[city_usr]" value="<?php echo h($user->city_usr); ?>" required id="user[city_usr]"></dd>
</dl>

<dl>
  <dt><label for="user[id_sta_usr]">* State</label></dt>
  <dd>
    <select name="user[id_sta_usr]" required id="user[id_sta_usr]">
      <option value=""></option>
    <?php for($state_id = 1; $state_id <= 51; $state_id++) { ?>
      <option value="<?php echo $state_id; ?>" <?php if($user->id_sta_usr == $state_id) { echo 'selected'; } ?>><?php echo User::getStateNameById($state_id); ?></option>
    <?php } ?>
    </select>
  </dd>
</dl>

<dl>
  <dt><label for="user[zip_usr]">* Zip Code</label></dt>
  <dd><input type="number" name="user[zip_usr]" value="<?php echo h($user->zip_usr); ?>" required id="user[zip_usr]"></dd>
</dl>

<div>
  <p>If you do not want to change your password, leave section blank. If you do, then the new password must:</p>
  <ul>
    <li>Contain 12 or more characters</li>
    <li>Contain at least 1 uppercase letter</li>
    <li>Contain at least 1 lowercase letter</li>
    <li>Contain at least 1 number</li>
    <li>Contain at least 1 symbol</li>
  </ul>
</div>

<?php if(array_key_exists("password", $user->errors)) {echo display_errors($user->errors["password"]);} ?>
<dl>
  <dt><label for="user[password]">Password</label></dt>
  <dd><input type="password" name="user[password]" value="" id="user[password]"></dd>
</dl>

<?php if(array_key_exists("confirm_password", $user->errors)) {echo display_errors($user->errors["confirm_password"]);} ?>
<dl>
  <dt><label for="user[confirm_password]">Confirm Password</label></dt>
  <dd><input type="password" name="user[confirm_password]" value="" id="user[confirm_password]"></dd>
</dl>
