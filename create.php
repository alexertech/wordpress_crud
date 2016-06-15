<?php
function alex_crud_create() {

    global $wpdb;
    $id    = sanitize_key($_POST['id']);
    $name  = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);

    if (isset($_POST['insert'])) {

        $wpdb->insert(
            'contacts',                                              // table
            array('id' => $id, 'name' => $name, 'email' => $email),  // data
            array('%s', '%s', '%s')                                  // data format
            // %s (string), %d (integer) and %f (float)
        );

    }
    ?>

    <link href="<?php echo WP_PLUGIN_URL; ?>/alex_crud/alex_crud_style.css"
          type="text/css" rel="stylesheet" />

    <div class="wrap">

      <h2>Add New Contact</h2>

      <?php if (isset($_POST['insert'])): ?>
        <div class="updated">
          <p>Contact inserted</p>
        </div>
        <a href="<?php echo admin_url('admin.php?page=alex_crud_list')?>">&laquo; Back to contacts list</a>
      <?php else: ?>

      <form method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>">

        <p>Three capital letters for the ID</p>

        <table class='wp-list-table widefat fixed'>

          <tr>
            <th>ID</th>
            <td><input type="text" name="id" value="<?php echo $id;?>"/></td>
          </tr>
          <tr>
            <th>Name</th>
            <td><input type="text" name="name" value="<?php echo $name;?>"/></td>
          </tr>
          <tr>
            <th>Email</th>
            <td><input type="text" name="email" value="<?php echo $email;?>"/></td>
          </tr>
        </table>

        <input type='submit' name="insert" value='Save' class='button'>

      </form>
    <?php endif; ?>
    </div>
<?php
}
