<?php
// List all Contacts
function alex_crud_list () {

  global $wpdb;

  // Deletes a contact
  if(isset($_GET['delete']) && isset($_GET['id'])) {
    $wpdb->delete( 'contacts', array( 'ID' => sanitize_key($_GET['id']) ) );
  }

  // List all contacts
  $rows = $wpdb->get_results("SELECT id,name,email from contacts");


?>
  <link href="<?php echo WP_PLUGIN_URL; ?>/alex_crud/alex_crud_style.css"
        type="text/css" rel="stylesheet" />

  <div class="wrap">

    <h2>Contacts</h2>

    <?php if(isset($_GET['delete'])){ ?>

      <div class="updated"><p>Contact deleted</p></div>

    <?php } ?>

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
