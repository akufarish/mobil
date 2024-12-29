<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pesanan extends Model
{
    protected $table = "pesanans";
    protected $guarded = ["id"];

    protected $with = [
        "mobil",
        "layanan"
    ];

    public function mobil(): BelongsTo
    {
        return $this->belongsTo(Mobil::class);
    }

    function layanan(): BelongsTo
    {
        return $this->belongsTo(Layanan::class);
    }
}
