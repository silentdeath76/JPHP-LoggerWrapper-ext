<?php


namespace develnext\bundle\loggerwrapper\components;

use bundle\loggerwrapper\LoggerWrapper;
use ide\scripts\AbstractScriptComponent;

class LoggerWrapperScriptComponent extends AbstractScriptComponent
{
    public function isOrigin($any)
    {
        return $any instanceof LoggerWrapperScriptComponent;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'LoggerWrapper';
    }

    public function getIcon()
    {
        return 'develnext/bundle/loggerwrapper/componentWriter.png';
    }

    public function getIdPattern()
    {
        return "loggerWrapper%s";
    }

    public function getGroup()
    {
        return 'Dev and logging';
    }

    /**
     * @return string
     */
    public function getType()
    {
        return LoggerWrapper::class;
    }

    public function getDescription()
    {
        return null;
    }
}