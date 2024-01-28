<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Storage;

/**
 * @property string $url
 * @property mixed  $hash_name
 */
class Media extends Model
{
    use HasFactory;

    protected $guarded = [];

    private static string $url = 'media/files/';


    public function singleMediaFile(): MorphTo
    {
        return $this->morphTo(__FUNCTION__, 'media_type', 'media_id');
    }


    public function multipleMediaFile(): MorphTo
    {
        return $this->morphTo(__FUNCTION__, 'media_type', 'media_id');
    }


    public static function register($file): Media
    {
        self::saveFile('/public/' . self::$url, $file, $file->hashName());
        //
        return new self([
            'original_file_name' => $file->getClientOriginalName(),
            'extension'          => $file->getClientOriginalExtension(),
            'mime_type'          => $file->getMimeType(),
            'size'               => $file->getSize(),
            'hash_name'          => $file->hashName(),
            'url'                => self::$url,
        ]);
    }


    public static function registerMany(array $files): array
    {
        $medias = [];
        foreach ($files as $file) {
            self::saveFile('/public/' . self::$url, $file, $file->hashName());
            //
            $medias[] = new self([
                'original_file_name' => $file->getClientOriginalName(),
                'extension'          => $file->getClientOriginalExtension(),
                'mime_type'          => $file->getMimeType(),
                'size'               => $file->getSize(),
                'hash_name'          => $file->hashName(),
                'url'                => self::$url,
            ]);
        }

        return $medias;
    }


    private static function saveFile($path, $file, $newName): void
    {
        Storage::putFileAs($path, $file, $newName);
    }


    public function url(): string
    {
        return Storage::url($this->url . $this->hash_name);
    }


    public function delete()
    {
        //todo: delete file from database and storage
    }
}
