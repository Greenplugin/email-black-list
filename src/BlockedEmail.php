<?php

namespace Greenplugin\EmailBlackList;

use Illuminate\Database\Eloquent\Model;

class BlockedEmail extends Model
{
    protected $fillable = [
        'email',
    ];
}
