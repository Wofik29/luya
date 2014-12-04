<?php
namespace luya\ngrest\plugins;

use \luya\ngrest\PluginAbstract;

/**
 * @todo set requirements, based on a classname for the element, could also be not the main
 * @author nadar
 *
 */
class Required extends PluginAbstract
{
    public function renderList($doc)
    {
        return $doc;
    }
    
    public function renderCreate($doc)
    {
        $elmn = $doc->getElementById($this->id);
        $elmn->setAttribute("required", "required");
        
        $span = $doc->createELement("span", "Sie müssen dieses Feld ausfüllen um Daten zu speichern.");
        $span->setAttribute("ng-show", 'createForm.'.$this->name.'.$error.required');
        $doc->appendChild($span);
        
        return $doc;
    }

    public function renderUpdate ($doc)
    {
        $elmn = $doc->getElementById($this->id);
        $elmn->setAttribute("required", "required");
        
        $span = $doc->createELement("span", "Sie müssen dieses Feld ausfüllen um Daten zu speichern.");
        $span->setAttribute("ng-show", 'updateForm.'.$this->name.'.$error.required');
        $doc->appendChild($span);
        return $doc;
    }
}