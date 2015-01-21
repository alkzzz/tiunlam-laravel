<?php

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class News extends Eloquent implements SluggableInterface
{
    use SluggableTrait;

    protected $table = 'news';

    protected $fillable = ['judul', 'konten', 'slug', 'gambar'];

    protected $sluggable = array(
        'build_from' => 'judul',
        'save_to'    => 'slug',
    );
}
