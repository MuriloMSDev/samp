<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;

class Image extends Model
{
    private $image;
    private $disk;
    private $subFolder;
    private $extension;
    private $adjust = false;
    private $adjustTo = [
        'width' => 512,
        'height' => 512
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image',
        'name',
        'path',
        'sub_folder',
        'adjust',
        'adjust_to',
    ];

    /**
     * The attributes that should appended to the model.
     *
     * @var array
     */
    protected $appends = [
        'url',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function __construct(array $attributes = [])
    {
        $this->disk = Storage::disk('public');

        parent::__construct($attributes);
    }

    /**
     * Override parent boot.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($image) {
            $image->setAttributes();
        });

        static::saved(function ($image) {
            $image->saveImage();
        });

        static::deleted(function ($image) {
            $image->disk->delete($image->path);
        });
    }

    /** Relationships */

    public function entity()
    {
        return $this->morphTo();
    }

    /** Mutators */

    public function setImageAttribute($image)
    {
        $this->image = $image;
    }

    public function setSubFolderAttribute($subFolder)
    {
        $this->subFolder = $this->setSubFolder($subFolder);
    }

    public function setAdjustAttribute($adjust)
    {
        $this->adjust = $adjust;
    }

    public function setAdjustToAttribute($adjustTo)
    {
        $this->adjustTo = $adjustTo;
        $this->adjust = true;
    }

    public function getUrlAttribute()
    {
        return $this->disk->url($this->path);
    }

    /** Methods */

    public function setSubFolder($subFolder)
    {
        $this->subFolder = (
            $subFolder = trim($subFolder, '/') ? "$subFolder/" : ''
        );
    }

    protected function setAttributes()
    {
        if ($this->image) {
            if (!$this->name) {
                $this->name = $this->image->getClientOriginalName();
            }
            if (!$this->path) {
                $this->extension = $this->image->getClientOriginalExtension();
                $newName = md5(uniqid($this->name));
                $this->path = "/images/{$this->subFolder}{$newName}.{$this->extension}";
            }
        }
    }

    protected function saveImage()
    {
        if ($this->image) {
            $image = InterventionImage::make($this->image);
            if ($this->adjust) {
                $width = $this->adjustTo['width'];
                $height = $this->adjustTo['height'];

                $image->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->resizeCanvas($width, $height);

                $image = InterventionImage::canvas(
                    $image->width(),
                    $image->height()
                )->insert($image);
            }
            $this->disk->put($this->path, $image->encode($this->extension));
        }
    }
}
