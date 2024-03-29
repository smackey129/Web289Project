<?php require_once('../../private/initialize.php');   ?>

<?php

if(!isset($_GET['id'])) {
  redirect_to('index.php');
}

$id = $_GET['id'];
$game = Game::find_by_id($id);
if($game == false) {
  redirect_to('index.php');
}

if(is_post_request()) {

  $result = $game->delete();
  $session->message('The item was deleted successfully.');
  redirect_to('index.php');

} else {
  // Display form
}

?>

<?php $page_title = 'Delete Game'; ?>
<?php include(SHARED_PATH . '/admin_header.php'); ?>

<main role="main" id="main-content" tabindex="-1">
  <a class="back-link" href="<?php echo 'index.php'; ?>">&laquo; Back to List</a>
  <h1>Delete Game</h1>
  <p>Are you sure you want to delete this game?</p>
  <p class="item"><?php echo h($game->name_gme); ?></p>
  <form action="<?php echo 'delete.php?id=' . h(u($id)); ?>" method="post">
    <input type="submit" name="commit" value="Delete Game">
  </form>
</main>

<?php include(SHARED_PATH . '/user_footer.php'); ?>
