<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Auth;
class checkKtpstatus implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        $foto_ktp = auth::guard()->user()->ktp;
       
        if($foto_ktp == 'null'){
            dd($value);
            if (is_null($value)) {
                return false;
            } elseif (is_string($value) && trim($value) === '') {
                return false;
            } elseif ((is_array($value) || $value instanceof Countable) && count($value) < 1) {
                return false;
            } elseif ($value instanceof File) {
                return (string) $value->getPath() !== '';
            }
    
            return true;
        }else{
            return true;
        }
        
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
