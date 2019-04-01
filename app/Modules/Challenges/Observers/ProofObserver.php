<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 30.03.19
 *
 */

namespace App\Modules\Challenges\Observers;

use App\Modules\Challenges\Models\Proof;
use Illuminate\Support\Facades\Storage;

class ProofObserver
{
    /**
     * @param Proof $proof
     */
    public function creating(Proof $proof) : void
    {
        if ($files = $proof->getFiles()) {
            $path = config('custom.proofs_files_path');
            $savedItems = [];
            foreach($files as $file) {
                $savedItems[] = $file->storeAs(
                    $path,
                    pathinfo($file->hashName(), PATHINFO_FILENAME) . '.' . $file->getClientOriginalExtension()
                );
            }
            $proof->items = $savedItems;
        }
    }

    /**
     * @param Proof $proof
     */
    public function deleting(Proof $proof) : void
    {
        $rawItems = \GuzzleHttp\json_decode($proof->getOriginal('items'), true);
        $items = [];
        foreach ($rawItems as $item) {
            $items[] = $item;
        }
        Storage::delete($items);
    }
}