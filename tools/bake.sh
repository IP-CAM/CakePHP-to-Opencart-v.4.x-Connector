#!/bin/bash

VER=$1
if [ -z $VER ]; then
    echo "Provide version"
    exit 255
fi

if [ ! -d "vendor/cakephp/bake" ]; then
    echo "First, \`cd\` to a CakePHP project folder. Currently in: $(pwd)"
    exit 255
fi

INFLECTOR="$(dirname ${0})/inflector.php"
if [ ! -f "${INFLECTOR}" ]; then
    echo "The $(basename ${INFLECTOR}) script needs to be available in the same folder with this script. Checked for: ${INFLECTOR}"
    exit 255
fi

PLUGIN="CakePHPOpencart" # Name of the plugin to hold Opencart connector code
# Path to plugin files, i.e src/Model/Table/ExampleTable.php
#PLUGIN_PATH="plugins/${PLUGIN}" # can be inside an existing CakePHP site
#PLUGIN_PATH="/var/www/cakephp-${PLUGIN}" # can be inside separate folder
PLUGIN_PATH="/var/www/cakephp-opencart"

# Shorthand
E="${PLUGIN_PATH}/src/Model/Entity"
T="${PLUGIN_PATH}/src/Model/Table"

# Clean up
rm -rf ${E}/Opencart${VER}
mkdir -p ${E}/Opencart${VER}
#rm -rf ${E}/OpencartAbstract # DON'T. oc2 has some classes removed in oc4
mkdir -p ${E}/OpencartAbstract
rm -rf ${T}/Opencart${VER}
mkdir -p ${T}/Opencart${VER}

# Get the list of all bake-able models. Results will be in CamelCase
LIST=$(bin/cake bake model --connection opencart${VER}-clean | tail -n +2 -)
# Loop through each table
for NAME in ${LIST}; do
    if [ "${NAME}" = "-" ]; then
        continue;
    fi
    # Shorthand
    ALIAS=$(php "${INFLECTOR}" pluralize ${NAME})
    ENTITY=${NAME}
    # Only one exception for OC4, all other tables are singular
    if [ "${ENTITY}" = "Statistics" ]; then
        ENTITY="Statistic"
    fi
    TABLE=$(php "${INFLECTOR}" underscore ${NAME})
    printf "\n"
    echo "NAME:${NAME} ALIAS:${ALIAS} TABLE:${TABLE} ENTITY:${ENTITY}"
    # Do the actual baking
    bin/cake bake model ${ALIAS} --table ${TABLE} --force --no-fixture --no-test --plugin ${PLUGIN} --connection opencart${VER}-clean

    # Handle the Table class
    mv "${T}/${ALIAS}Table.php" "${T}/Opencart${VER}/${ALIAS}Table.php"
    F="${T}/Opencart${VER}/${ALIAS}Table.php"
    sed -i "s/${PLUGIN}\\\Model\\\Table/${PLUGIN}\\\Model\\\Table\\\Opencart${VER}/g" "${F}"
    # Remove hardcoded connection name, look up the method and lines around it
    awk '/defaultConnectionName/ {print NR-5 "," NR+3 "d"}' "${F}" \
        | sed -i -f - "${F}"

    # Descriptions will not be picked up automatically, handle them here
    if [ "${NAME:(-11)}" = "Description" ]; then
        # Convert NAME to plural (table alias) and underscore (table name)
        TRANSLATABLE="${NAME%"Description"}"
        TRANSLATABLE_ALIAS=$(php "${INFLECTOR}" pluralize ${TRANSLATABLE})
        TRANSLATABLE_TABLE=$(php "${INFLECTOR}" underscore ${TRANSLATABLE})
        # Create the snippet we will read from
        cat > "/tmp/descriptions_snippet" << EOF
        \$this->hasMany('${ALIAS}', [
            'foreignKey' => '${TRANSLATABLE_TABLE}_id',
            'className' => '${PLUGIN}.${ALIAS}',
        ]);
        \$this->hasOne('${NAME}', [
            'foreignKey' => '${TRANSLATABLE_TABLE}_id',
            'className' => '${PLUGIN}.${NAME}',
            'conditions' => [
                // to be populated by ${PLUGIN}\Connector
            ],
        ]);
EOF

awk '
    /}/ && !done {          # Search for the first "}" and check if insertion is not done
        while ((getline line < "/tmp/descriptions_snippet") > 0) {
            print line      # Print each line from the snippet file
        }
        print "    }"           # Print the original "}" after the snippet
        done=1              # Set done to 1 to avoid further insertions
        next                # Skip the original line containing "}"
    }
    { print }               # Print all other lines as is
' "${T}/Opencart${VER}/${TRANSLATABLE_ALIAS}Table.php" > /tmp/descriptions_tmp && mv /tmp/descriptions_tmp "${T}/Opencart${VER}/${TRANSLATABLE_ALIAS}Table.php"
    fi

    # Handle the Entity class
    mv "${E}/${ENTITY}.php" "${E}/Opencart${VER}/${ENTITY}.php"
    F="${E}/Opencart${VER}/${ENTITY}.php"
    sed -i "s/${PLUGIN}\\\Model\\\Entity/${PLUGIN}\\\Model\\\Entity\\\Opencart${VER}/g" "${F}"
    # Entity: Abstract
    mkdir -p "${E}/OpencartAbstract"
    if [ ! -f "${E}/OpencartAbstract/Abstract${ENTITY}.php" ]; then
        cat > "${E}/OpencartAbstract/Abstract${ENTITY}.php" << EOF
<?php

namespace ${PLUGIN}\Model\Entity\OpencartAbstract;

use Cake\ORM\Entity;

abstract class Abstract${ENTITY} extends Entity
{



}
EOF
    fi
    sed -i "s/class ${ENTITY} extends Entity/class ${ENTITY} extends \\\\${PLUGIN}\\\Model\\\Entity\\\OpencartAbstract\\\\Abstract${ENTITY}/g" "${F}"
    # Delete `use Cake\ORM\Entity;` and the empty line after it
    sed -i '/^use Cake\\\ORM\\\Entity;/{N;d;}' "${F}"
done
