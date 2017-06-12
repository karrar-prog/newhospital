<?php
/**
 * Created by PhpStorm.
 * User: macbookpro
 * Date: 2017-06-11
 * Time: 9:52 PM
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $table = "visit";
    Protected $primaryKey = "ID";
    public $timestamps = false;
}