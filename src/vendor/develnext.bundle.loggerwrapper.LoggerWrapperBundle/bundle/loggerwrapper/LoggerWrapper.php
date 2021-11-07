<?php


namespace bundle\loggerwrapper;

use php\framework\Logger;
use php\io\Stream;
use php\lang\IllegalArgumentException;
use php\time\Time;
use php\time\TimeZone;
use php\lang\System;

use php\gui\framework\AbstractScript;

/**
 * Class LoggerWrapper
 * @package bundle\loggerwrapper
 * @method trigger($event, array $args = [])
 */
class LoggerWrapper extends AbstractScript
{
    const ERROR = 'error';
    const WARNING = 'warning';
    const INFO = 'info';
    const DEBUG = 'debug';

    public $filename;
    public $dateFormat;
    public $lineFormat;
    public $autoWrite = false;

    protected function applyImpl($target)
    {

    }

    /**
     * return app state (dev or production)
     * @return bool
     */
    public function isDev()
    {
        return System::getProperty("jphp.trace") === 'true';
    }

    public function error($message)
    {
        $this->trigger('error', ["message" => $this->formatLine($message, self::ERROR)]);
    }

    public function warning($message)
    {
        $this->trigger('warning', ["message" => $this->formatLine($message, self::WARNING)]);
    }

    public function info($message)
    {
        $this->trigger('info', ["message" => $this->formatLine($message, self::INFO)]);
    }

    public function debug($message)
    {
        $this->trigger('debug', ["message" => $this->formatLine($message, self::DEBUG)]);
    }


    private function formatLine($message, $evType)
    {
        $date = Time::now(TimeZone::getDefault())->toString($this->dateFormat);

        // ******************************
        $lineTokens = [
            "date" => ":date",
            "event" => ":event",
            "message" => ":message"
        ];

        $str = str_replace($lineTokens, ["date" => $date, "event" => $evType, "message" => $message], $this->lineFormat);
        // ******************************

        // $str = sprintf($this->lineFormat, $date, $evType, $message);

        if ($this->autoWrite) {
            file_put_contents($this->filename, $str . "\r\n", FILE_APPEND);
        }

        return $str;
    }
}