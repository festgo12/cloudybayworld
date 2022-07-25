<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generalsetting extends Model
{
    use HasFactory;


    public $timestamps = false;

    public function upload($name,$file,$oldname)
    {
                $file->move('assets/uploads/images',$name);
                if($oldname != null)
                {
                    if (file_exists(public_path().'/assets/uploads/images/'.$oldname)) {
                        unlink(public_path().'/assets/uploads/images/'.$oldname);
                    }
                }
    }
}
