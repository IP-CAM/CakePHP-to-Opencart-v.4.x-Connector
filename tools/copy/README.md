## Copy additional models

Once `bake.sh` is completed, some additional code may have to be copied over. Use this folder to do that.

Contents of this folder will be copied over to `PLUGIN/src/Model`. If there is literal `${VER}` in filenames and namespaces, it will be replaced with actual `${VER}` passed to, and available inside `bake.sh`.

Useful for adding shared models, or models for tables not present in the database.
