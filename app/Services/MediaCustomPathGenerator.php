<?php

namespace App\Services;

use App\Models\Movie;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;

class MediaCustomPathGenerator implements PathGenerator
{
    /*
     * Get the path for the given media, relative to the root storage path.
     */
    public function getPath(Media $media): string
    {
        return $this->getBasePath($media).'/';
    }

    /*
     * Get the path for conversions of the given media, relative to the root storage path.
     */
    public function getPathForConversions(Media $media): string
    {
        return $this->getBasePath($media).'/conversions/';
    }

    /*
     * Get the path for responsive images of the given media, relative to the root storage path.
     */
    public function getPathForResponsiveImages(Media $media): string
    {
        return $this->getBasePath($media).'/responsive-images/';
    }

    /*
     * Get a unique base path for the given media.
     */
    protected function getBasePath(Media $media): string
    {
        $prefix = config('media-library.prefix', '');

        if ($prefix !== '') {
            return $prefix . '/' . $this->getKey($media);
        }

        return $this->getKey($media);
    }

    protected function getKey(Media $media): string
    {
        if ($media->model_type === Movie::class) {
            return 'tmdb-' . $media->model->tmdb_id;
        }
        return $media->getKey();
    }
}
