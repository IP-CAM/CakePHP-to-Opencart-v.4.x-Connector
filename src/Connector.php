<?php

namespace CakePHPOpencart;

class Connector extends \Bakeoff\CmsConnector\Site
{

    public function onEveryModelInitialize($event)
    {
        // Get table class that was just initialised
        $table = $event->getSubject();
        // The registry alias is in Plugin.Model format; split it
        list($plugin, $tableAlias) = pluginSplit($table->getRegistryAlias());
        // Skip right away if this is not a model inside this plugin
        if ($plugin !== $this->getName()) {
            return;
        }
        parent::onEveryModelInitialize($event);
        // Specify language_id in associations to translation classes
        foreach ($table->associations() as $association) {
            /*
            Opencart stores translations in tables with suffix "_description",
            but bake doesn't automatically pick that relation up. So we manually
            associated translatable items (in their respective table classes) as
            - hasMany Descriptions for selects containing all languages
            - hasOne  Description  for selecting default language translations
            Default language is configured dynamically using plugin config and
            is used below to create a condition for selecting right translation
            */
            if (substr($association->getName(), -11) == 'Description'
            && empty($association->getConditions())) {
                $association->setConditions([
                    $association->getName().'.language_id' => $this->getConfig('languageId')
                ]);
            }
        }
    }

}
