<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $uploadPath = 'storage/uploads/images/';
    protected $fillable = ['path', 'report_id', 'user_id'];

    /**
     * @param $photo
     * @return string
     */
    public function getPathAttribute($photo) {
        return $this->uploadPath . $photo;
    }

    /**
     * Uploading photo to server and update in DB
     * @param $file
     * @param $newName
     * @param $report_id
     * @param $user_id
     * @return mixed
     */
    public function uploadPhoto($file, $newName, $report_id, $user_id) {
        $name = uniqid($newName) . '.' . $file->getClientOriginalExtension();

        $file->move($this->uploadPath, $name);

        $report_id = $report_id ?? '0';
        $user_id = $user_id ?? '0';

        $photo = Photo::create([
            'path' => $name,
            'report_id' => $report_id,
            'user_id' => $user_id
        ]);

        return $photo->id;
    }

    /**
     * Returning if the picture is used for user or for report or else
     * @return string
     */
    public function photoSource() {
        $result = explode($this->uploadPath, $this->path);
        $result = explode('_', $result[1]);

        if (empty($result[0]))
            $result[0] = 'none';

        return $result[0];
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function raport() {
        return $this->belongsTo('App\Raport');
    }
}
