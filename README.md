# JPHP-LoggerWrapper-ext

![View](https://github.com/silentdeath76/JPHP-LoggerWrapper-ext/blob/main/images/main.png?raw=true)


Use example:
```php
/**
 * @event loggerWrapper.error 
 */
function doLoggerWrapperError(ScriptEvent $e = null)
{    
    if ($e->sender->isDev()) {
        Logger::error($e->message);
    }
}
```
