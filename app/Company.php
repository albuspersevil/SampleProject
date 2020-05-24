<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';
    protected $fillable = [
      'company_name','company_email', 'company_website','company_logo',
    ];

}
