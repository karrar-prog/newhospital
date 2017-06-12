<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Created by PhpStorm.
 * User: macbookpro
 * Date: 2017-06-05
 * Time: 11:26 PM
 */
class Patient extends Model
{
    protected $table = "patient";
    Protected $primaryKey = "ID";
    public $timestamps = false;
}