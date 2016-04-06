<?php

class EmailModule extends HWebModule
{
    /**
     * Inits the Module
     */
    public function init()
    {
       
        $this->setImport(array(
            'secondaryemail.models.*',
            'secondaryemail.forms.*',
        ));
    }
}
