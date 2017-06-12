<?php
/**
 * Created by PhpStorm.
 * User: macbookpro
 * Date: 2017-06-11
 * Time: 3:36 AM
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = "doctor";
    Protected $primaryKey = "ID";
    public $timestamps = false;

}