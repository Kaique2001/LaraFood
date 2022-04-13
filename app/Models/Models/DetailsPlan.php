<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailsPlan extends Model
{
    protected $table = 'details_plan';

    protected $fillable = ['name'];

    public function plan()
    {
        $this->belogsTo(Plan::class);
    }
}
