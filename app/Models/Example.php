<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Example extends Model
{
    use HasFactory;


    public function test(): Attribute
    {
        return Attribute::make(
            get: function($value, $attributes) {
                return (object) ['id' => 1];
                return 'wont call set if this is returned from';
            },
            set: function($value, $attributes) {
                // Why is this undefined if attribute caching is enabled?
                dd($this->created_at);

                // This dumps null as expected.
                dd($this->something_non_existent);
            }
        );
    }
}
