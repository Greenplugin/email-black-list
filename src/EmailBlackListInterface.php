<?php
declare(strict_types=1);

namespace Greenplugin\EmailBlackList;


interface EmailBlackListInterface
{
    /**
     * @param string $email
     * @return BlockedEmail
     */
    public function addToBlackList(string $email): BlockedEmail;


    /**
     * @param string $email
     * @return BlockedEmail
     * @throws EmailNotFoundException
     */
    public function removeFromBlackList(string $email): BlockedEmail;

    /**
     * @param string $email
     * @return bool
     */
    public function checkEmailInBlackList(string $email): bool;
}