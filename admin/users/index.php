<?php 
  require_once('../../private/initialize.php');   
  $users = User::find_all();
  $page_title = 'Users'; 
  include(SHARED_PATH . '/admin_header.php'); 
?>
<main role="main" id="main-content" tabindex="-1">
  <a href='<?= url_for("/admin") ?>'>&laquo; Back to Admin Area</a><br>
  <h1>Users</h1>
  <a href='new.php'>Create New User</a>
  <div class="table">
    <table>
      <tr>
        <th>ID</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Email</th>
        <th>Username</th>
        <th>Address</th>
        <th>City</th>
        <th>State</th>
        <th>User Level</th>
        <th>Balance</th>
        <th>View</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>

      <?php foreach($users as $user) { ?>
        <tr>
          <td><?= h($user->id); ?></td>
          <td><?= h($user->fname_usr); ?></td>
          <td><?= h($user->lname_usr); ?></td>
          <td><?= h($user->email_usr); ?></td>
          <td><?= h($user->username_usr); ?></td>
          <td><?= h($user->street_address_usr); ?></td>
          <td><?= h($user->city_usr); ?></td>
          <td><?= h($user->getStateAbbr()); ?></td>
          <td><?= h($user->user_level_usr); ?></td>
          <td><?= h($user->balance_usr); ?></td>
          <td><a href="<?php echo url_for('admin/users/show.php?id=' . h(u($user->id))); ?>">View</a></td>
          <td><a href="<?php echo url_for('admin/users/edit.php?id=' . h(u($user->id))); ?>">Edit</a></td>
          <td><a href="<?php echo url_for('admin/users/delete.php?id=' . h(u($user->id))); ?>">Delete</a></td>
        </tr>
      <?php } ?>
    </table>
  </div>
</main>
<?php include(SHARED_PATH . '/user_footer.php'); ?>
