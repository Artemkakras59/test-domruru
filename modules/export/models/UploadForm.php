<?php

namespace app\modules\export\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /** @var  UploadedFile */
    public $file;

    public function rules() {
        return [
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'xml']
        ];
    }

    public function upload() {
        if ($this->validate()) {
            $this->file->saveAs('upload/' . $this->file->baseName . '.' . $this->file->extension);
            return true;
        }

        return false;
    }

    public function getPath() {
        return 'upload/' . $this->file->baseName . '.' . $this->file->extension;
    }
}