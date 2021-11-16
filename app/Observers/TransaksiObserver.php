<?php

namespace App\Observers;

use App\Transaksi;
use Illuminate\Support\Facades\File;

class TransaksiObserver
{
    /**
     * Handle the User "deleting" event.
     *
     * @param  \App\Item  $item
     * @return void
     */
    public function deleting(Transaksi  $transaksi)
    {
        File::delete(storage_path("/app/public/{$transaksi->file}"));
        
    }

    /**
     * Handle the User "updating" event.
     *
     * @param  \App\Item  $item
     * @return void
     */
    public function updating(Transaksi $transaksi)
    {
        if ($transaksi->file != $transaksi->getOriginal('file')) {
            File::delete(storage_path("/app/public/{$transaksi->getOriginal('file')}"));
        }
    }
}
