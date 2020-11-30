`\Leadvertex\Plugin\Components\Developer\Developer` - component for represent information
about plugin developer

Installation
```shell script
composer require leadvertex/plugin-component-developer
```

Configuration
```php
\Leadvertex\Plugin\Components\Developer\Developer::config(
    'Tony Stark', 
    'support@starkindustries.com', 
    'starkindustries.com'
);
```

Usage
```php
echo Developer::getInstance()->getName();     //Will return 'Tony Stark'
echo Developer::getInstance()->getEmail();    //Will return 'support@starkindustries.com'
echo Developer::getInstance()->getHostname(); //Will return 'starkindustries.com'
```