<?php require_once('../../private/initialize.php');   ?>

<?php

if(!isset($_GET['id'])) {
  redirect_to('index.php');
}
$id = $_GET['id'];
$item = InventoryItem::find_by_id($id);
if($item == false) {
  redirect_to('index.php');
}

if(is_post_request()) {

  // Save record using post parameters
  $args = $_POST['item'];
  $item->merge_attributes($args);
  $result = $item->save();
  if($result === true) {
    $session->message('The item was updated successfully.');
    redirect_to('show.php?id=' . $id);
  } else {
    // show errors
  }

} else {

  // display the form

}

?>

<?php $page_title = 'Edit Inventory Item'; ?>
<?php include(SHARED_PATH . '/admin_header.php'); ?>

<main role="main" id="main-content" tabindex="-1">
  <a class="back-link" href="<?php echo 'index.php'; ?>">&laquo; Back to List</a>
  <h1>Edit Item</h1>
  <?php echo display_errors($item->errors); ?>
  <p>All fields marked with "*" are required.</p>
  <form action="<?php echo 'edit.php?id=' . h(u($id)); ?>" method="post">
    <?php include('form_fields.php'); ?>
    <input type="submit" value="Edit Item">
  </form>
</main>

<?php include(SHARED_PATH . '/user_footer.php'); ?>
