<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $upload = 'storage/uploads/images/';
    protected $fillable = ['path', 'raport_id', 'user_id'];

    /**
     * @param $photo
     * @return string
     */
    public function getPathAttribute($photo) {
        return $this->upload . $photo;
    }

    /**
     * Uploading photo to server and update in DB
     * @param $file
     * @param $newName
     * @param $report_id
     * @param $user_id
     * @return mixed
     */
    public function photoUpload($file, $newName, $raport_id, $user_id){

        $name = uniqid($newName) . '.' . $file->getClientOriginalExtension();
        $file->move('storage/uploads/images/', $name);
        $raport_id = isset($raport_id) ? $raport_id : '0';
        $user_id = isset($user_id) ? $user_id : '0';

        $photo = Photo::create(['path'=>$name, 'raport_id'=>$raport_id, 'user_id'=>$user_id]);

        return $photo->id;
    }
    /**
     * Returning if the picture is used for user or for report or else
     * @return string
     */
    public function photoSource() {
        $result = explode('storage/uploads/images/',$this->path);
        $result = explode('_',$result[1]);
        if(empty($result[0])) $result[0] = 'none';
        return $result[0];
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function raport() {
        return $this->belongsTo('App\Raport');
    }
}
