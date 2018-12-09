<?php

namespace Greenplugin\EmailBlackList\Facades;

use Greenplugin\EmailBlackList\EmailBlackListInterface;
use Illuminate\Support\Facades\Facade;

/**
 * Class email-black-list
 * @method static addToBlackList(string $email)
 * @method static removeFromBlackList(string $email)
 * @method static checkEmailInBlackList(string $email)
 */
class EmailBlackList extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return EmailBlackListInterface::class;
    }
}
