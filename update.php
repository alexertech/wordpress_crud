<?php
function alex_crud_update () {
  global $wpdb;
  $id    = sanitize_key($_GET['id']);
  $name  = sanitize_text_field($_POST['name']);
  $email = sanitize_email($_POST['email']);

  //update
  if(isset($_POST['update'])){

  	$wpdb->update(
  		'contacts',                                    //table
  		array('name' => $name, 'email' => $email),     //data
  		array('ID' => $id ),                           //where
  		array('%s'),                                   //data format
  		array('%s')                                    //where format
  	);

  } else {

    // selecting value to update
    $query    = "SELECT id,name,email from contacts where id=%s";
    $contacts = $wpdb->get_row($wpdb->prepare($query,$id));

  }
  ?>
  <link href="<?php echo WP_PLUGIN_URL; ?>/alex_crud/alex_crud_style.css"
        type="text/css" rel="stylesheet" />
  <div class="wrap">
    <h2>Contacts</h2>

    <?php if($_POST['update']) { ?>

    <div class="updated"><p>Contact updated</p></div>
    <a href="<?php echo admin_url('admin.php?page=alex_crud_list')?>">&laquo; Back to contacts list</a>

    <?php } else { ?>

    <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
      <table class='wp-list-table widefat fixed'>
      <tr>
        <th>Name</th>
        <td><input type="text" name="name" value="<?php echo $contacts->name;?>"/></td>
      </tr>
      <tr>
        <th>Email</th>
        <td><input type="text" name="email" value="<?php echo $contacts->email;;?>"/></td>
      </tr>
      </table>
      <input type='submit' name="update" value='Save' class='button'> &nbsp;&nbsp;
    </form>

    <?php }?>

  </div>
  <?php
}
