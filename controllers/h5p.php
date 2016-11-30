<?php

class H5pController extends PluginController
{

    public function before_filter(&$action, &$args) {
        parent::before_filter($action, $args);
        Navigation::activateItem("/course/lernmodule");
        Navigation::getItem("/course/lernmodule")->setImage(Icon::create("learnmodule", "info"));
    }

    public function view_action($module_id)
    {
        $this->mod = new Lernmodul($module_id);
        PageLayout::addScript($this->plugin->getPluginURL()."/assets/h5p/h5p.js");
        PageLayout::addScript($this->plugin->getPluginURL()."/assets/h5p/jquery.js");
        PageLayout::addScript($this->plugin->getPluginURL()."/assets/h5p/h5p-event-dispatcher.js");
        PageLayout::addScript($this->plugin->getPluginURL()."/assets/h5p/h5p-x-api.js");
        PageLayout::addScript($this->plugin->getPluginURL()."/assets/h5p/h5p-x-api-events.js");
        PageLayout::addStylesheet($this->plugin->getPluginURL()."/assets/h5p.css");
        PageLayout::addHeadElement("script", array('src' => PluginEngine::getURL($this->plugin, array(), "h5p/javascript/".$module_id)));
    }

    public function javascript_action($module_id)
    {
        $this->set_layout(null);
        $this->mod = new Lernmodul($module_id);
    }
}