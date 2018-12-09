<?php

namespace Greenplugin\EmailBlackList;

class EmailBlackList implements EmailBlackListInterface
{
    /**
     * @param string $email
     * @return BlockedEmail
     */
    public function addToBlackList(string $email): BlockedEmail
    {
        $this->validate($email);
        $blockedEmail = new BlockedEmail(['email' => $email]);
        $blockedEmail->save();
        return $blockedEmail;
    }

    /**
     * @param string $email
     * @return BlockedEmail
     * @throws EmailNotFoundException
     */
    public function removeFromBlackList(string $email): BlockedEmail
    {
        $this->validate($email);
        $emailEntity = BlockedEmail::where('email', $email)->first();
        if (!$emailEntity) {
            throw new EmailNotFoundException(sprintf("%s not found in db", $email));
        }
        $emailEntity->delete();
        return $emailEntity;
    }

    /**
     * @param string $email
     * @return bool
     */
    public function checkEmailInBlackList(string $email): bool
    {
        $count = BlockedEmail::where('email', $email)->count();
        return boolval($count);
    }

    /**
     * @param string $email
     * @return string
     */
    private function validate(string $email): string
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidEmailException(sprintf("%s is not valid email", $email));
        }

        return $email;
    }
}