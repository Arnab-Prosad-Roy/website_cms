<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $casts = [
        'status_code' => 'integer',
    ];

    // public function setDescriptionAttribute($value)
    // {
    //     $domain_uri =
    //     (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] 
    //     === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"."/";
    //    $value =  str_replace($domain_uri,"",
    //                          preg_replace('(src="(.*?)")', 'data-src="$1"',
    //                          $value));
    //     $this->attributes['description'] = $value;
    // }

    public function getDescriptionAttribute($value)
    {
        $domain_uri =
        (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] 
        === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"."/";

        $data = preg_replace('(data-src="(.*?)")', 'src="$1"',
        $value);
        
    
        $string = $data;
        $substr = 'src="';
        $attachment =  $domain_uri;
    
        $newstring = str_replace($substr, $substr.$attachment, $string);
        return $newstring;
    }
}
