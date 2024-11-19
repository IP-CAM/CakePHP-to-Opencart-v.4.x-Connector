## Welcome

The `bake.sh` script is where all the src/Model files came from.

1. It calls `bin/cake bake` for every table in the Opencart database, and then makes final adjustments to the generated model classes.
2. It also generates Abstract classes for each database table - **but** only if a given class doesn't exist already. These Abstract classes are then made to be the common parent for all table classes baked by CakePHP. If you need to re-generate the abstract classes, delete the individual classes or whole Abstract directories in `PLUGIN/src/Model/Entity` and/or `PLUGIN/src/Model/Table`, re-run `bake.sh` and restore manual edits, if any, from git.
3. Finally, it copies custom models from [`PLUGIN/tools/copy`](./copy). If you have custom models that don't have a database table, they won't be picked up by the loop in step 1, so you have to manually create them inside that folder.

It accepts Opencart version number as argument: `2` or `4`.

## Usage

1. `cd` to a folder with CakePHP application. The application needs to have an Opencart database connection defined in `config/app.php` or `config/app_local.php` named `opencart$VERSION-clean`
2. Run the `bake.sh` script
    
        /var/www/cakephp-opencart/tools/bake.sh $VERSION
    
    `$VERSION` must match `$VERSION` from the database connection name above.

*All* changes and adjustments to the model files *must* be made through this script. No manual edits - this ensures the ability to re-run `bake.sh` without fearing to lose edits.
