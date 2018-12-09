# Installation

You need to add repository to composer.json

```json
"repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/Greenplugin/email-black-list.git"
    }
  ]
```
then run installation 

```bash 
composer require greenplugin/email-black-list
```

and migrate

```bash 
php artisan migrate
```
 #usage
 
You can use this package from facade 
 
 ```php
 $email = Greenplugin\EmailBlackList\Facades\EmailBlackList::addToBlackList('forbidden@mail.com');
 ``` 
and from DI container like this
 
 ```php
 //in controller 
 
 public function yourAction(Greenplugin\EmailBlackList\EmailBlackListInterface $emailBlackList)
     {
         $email = $emailBlackList->addToBlackList('forbidden@mail.com');
     //do something
     }
 ```
or like this

 ```php
 $email = app()->get(Greenplugin\EmailBlackList\EmailBlackListInterface::class)->addToBlackList('forbidden@mail.com');
 ```

The package implements the following methods:

`addToBlackList(string $email)` `checkEmailInBlackList(string $email)` `removeFromBlackList(string $email)`

