<?php

class EmailModule extends HWebModule
{
    /**
     * Inits the Module
     */
    public function init()
    {
       
        $this->setImport(array(
            'seconderyemail.models.*',
            'seconderyemail.forms.*',
        ));
    }
}
