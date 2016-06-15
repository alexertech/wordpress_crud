<?php
function alex_crud_list () {
  global $wpdb;
  $id = sanitize_key($_GET['id']);


  if(isset($_GET['delete']))
    $wpdb->delete( 'contacts', array( 'ID' => $id) );

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

    <?php

    echo "<table class='wp-list-table widefat fixed'>";
    echo "<tr><th>ID</th><th>Name</th><th>Email</th>><th>&nbsp;</th></tr>";

    foreach ($rows as $row ){
    	echo "<tr>";
    	echo "<td>$row->id</td>";
    	echo "<td>$row->name</td>";
      echo "<td>$row->email</td>";
    	echo "<td>";
      echo "<a href='".admin_url('admin.php?page=alex_crud_update&id='.$row->id)."'>Update</a> | ";
      echo "<a href='".admin_url('admin.php?page=alex_crud_list&delete&id='.$row->id)."'
              onclick=\"return confirm('&iquest;Est&aacute;s seguro de borrar este elemento?')\">Delete</a>";
      echo "</td>";
    	echo "</tr>";
    }

    echo "</table>";
    ?>
  </div>
<?php
}
