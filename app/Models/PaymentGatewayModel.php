<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentGatewayModel extends Model
{
    protected $table = "payment_gateway";
    protected $fillable = ["name_payment_gateway", "slug", "payment_logo"];
    protected $guarded = ["id"];
    public $timestamps = true;
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
