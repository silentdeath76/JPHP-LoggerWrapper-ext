<?php

namespace develnext\bundle\loggerwrapper;

use develnext\bundle\loggerwrapper\components\LoggerWrapperScriptComponent;

use ide\bundle\AbstractBundle;
use ide\bundle\AbstractJarBundle;
use ide\formats\ScriptModuleFormat;
use ide\Ide;
use ide\project\Project;

class LoggerWrapperBundle extends AbstractJarBundle
{

    public function onAdd(Project $project, AbstractBundle $owner = null)
    {
        parent::onAdd($project, $owner);

        $format = Ide::get()->getRegisteredFormat(ScriptModuleFormat::class);

        if ($format) {
            $format->register(new LoggerWrapperScriptComponent());
        }
    }


    public function onRemove(Project $project, AbstractBundle $owner = null)
    {
        parent::onRemove($project, $owner);

        $format = Ide::get()->getRegisteredFormat(ScriptModuleFormat::class);

        if ($format) {
            $format->unregister(new LoggerWrapperScriptComponent());
        }
    }
}
