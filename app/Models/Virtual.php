<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Virtual
 * @package App\Models
 * @version August 15, 2018, 2:17 pm UTC
 *
 * @property integer trx_id
 * @property integer trx_amount
 * @property string virtual_account
 * @property string description
 * @property string|\Carbon\Carbon expired
 * @property string email
 * @property string name
 * @property string phone
 * @property string tipe
 * @property string jalur
 */
class Virtual extends Model
{
    use SoftDeletes;

    public $table = 'virtuals';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'trx_id',
        'trx_amount',
        'virtual_account',
        'description',
        'date_expired',
        'customer_email',
        'customer_name',
        'customer_phone',
        'type'
     
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'trx_id' => 'integer',
        'trx_amount' => 'integer',
        'virtual_account' => 'string',
        'description' => 'string',
        'customer_email' => 'string',
        'customer_name' => 'string',
        'customer_phone' => 'string',
        'type' => 'string'
       
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'trx_id' => 'required',
        'trx_amount' => 'required',
        'virtual_account' => 'required',
        'date_expired' => 'required',
        'customer_email' => 'required',
        'customer_name' => 'required',
        'customer_phone' => 'required',
        'type' => 'required'
      
    ];

    
}
