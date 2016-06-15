# Wordpress Simple CRUD

Simple Wordpress CRUD for testing and learning proposes. Works inside the admin panel of any Wordpress installation and allows a user to Create Read Update and Delete records from an existing table in a database.

### Getting Started

Copy the files to the plugins directory, and use the name you want for your plugin:

```
wordpress/
 wp-content/
  plugins/
   **alex_crud/**
    style.css
    init.php
    create.php
    list.php
    update.php
```

Of course if you change the default name, be careful to update the files.

The next step is create the table in the Wordpress database that we are going to update.

```
CREATE TABLE `contacts` (
  `id` varchar(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
```

Finally enable the plugin and enjoy.



## Authors

* **Alex Barrios** - *Initial work* - [alexertech](https://github.com/alexertech)

See also the list of [contributors](https://github.com/your/project/contributors) who participated in this project.

## License

This project is licensed under the GNU General Public License V3.0 - see the [LICENSE.md](LICENSE.md) file for details.

Please if you use the project, say HI! in [twitter](http://twitter.com/alexertech) :)
