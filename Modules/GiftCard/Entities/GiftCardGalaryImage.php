<?php

namespace Modules\GiftCard\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GiftCardGalaryImage extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'gift_card_galary_images';
    
    
}
