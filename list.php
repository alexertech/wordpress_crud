<?php
// List all Contacts
function alex_crud_list () {

  global $wpdb;
  $msg   = "";

  // Deletes a contact
  if(isset($_GET['delete']) && isset($_GET['id'])) {

    // Get Values
    $id = sanitize_key($_POST['id']);

    if (!preg_match("/^[0-9]*$/",$id))
      $msg = "error:Only numbers allowed in the ID";
    else {
      $wpdb->delete( 'contacts', array( 'ID' => $id ) );
      $msg = "updated:Contact deleted!";
    }
  }

  // List all contacts
  $rows = $wpdb->get_results(
    $wpdb->prepare("SELECT id,name,email from contacts")
  );


?>
  <link href="<?php echo WP_PLUGIN_URL; ?>/alex_crud/alex_crud_style.css"
        type="text/css" rel="stylesheet" />

  <div class="wrap">

    <h2>Contacts</h2>

    <?php
    if (!empty($msg)) {
      $fmsg = explode(':',$msg);
      echo "<div class=\"{$fmsg[0]}\"><p>{$fmsg[1]}</p></div>";
    }
    ?>


    <a href="<?php echo admin_url('admin.php?page=alex_crud_create'); ?>">Add New</a>

    <table class='wp-list-table widefat fixed'>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>&nbsp;</th>
      </tr>
      <?php
      foreach ($rows as $row ){
      ?>
        <tr>
          <td><?php echo $row->id ?></td>
          <td><?php echo $row->name ?></td>
          <td><?php echo $row->email ?></td>
          <td>
            <a href="<?php echo admin_url("admin.php?page=alex_crud_update&id=".$row->id); ?>">Update</a> |
            <a href="<?php echo admin_url("admin.php?page=alex_crud_list&delete&id=".$row->id); ?>"
               onclick="return confirm('Are you sure?')">Delete</a>
          </td>
        </tr>
      <?php
      }
      ?>
    </table>
  </div>
<?php
}
