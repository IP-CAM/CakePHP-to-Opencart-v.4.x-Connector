<?php

// Try loading configuration for the plugin from app config folder
\Cake\Core\Configure::load($this->getName(), 'default');

// Pick the first configured site to be the default
if (!\Cake\Core\Configure::check($this->getName().'.defaultSite')) {
    $cartList = \Cake\Core\Configure::read($this->getName().'.siteList');
    $cartSymbol = array_keys($cartList)[0];
    \Cake\Core\Configure::write($this->getName().'.defaultSite', $cartSymbol);
}
