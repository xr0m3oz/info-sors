<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoadImageForm is load image.
 */
class LoadImageForm extends Model
{
    const API = 'KOJaMiAZTZiM2mryGBkELZW2HI7aCW6x';
    public $verifyCode;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha', 'captchaAction' => 'site/captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Проверочный код',
        ];
    }

    public function getImage(){
        // create curl resource
        $ch = curl_init();
        // set url
        curl_setopt($ch, CURLOPT_URL, 'https://api.giphy.com/v1/gifs/random?api_key='.self::API.'&tag=&rating=G');
        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // $output contains the output string
        $output = curl_exec($ch);
        // close curl resource to free up system resources
        curl_close($ch);

        $response = json_decode($output);

        if(!isset($response->meta->status) && isset($response->message))
            return ['img'=>null,'msg'=>$response->message];

        return ['img'=>$response->data->images->fixed_width->url,'msg'=>null];

    }

}
