<?php

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class About extends Eloquent implements SluggableInterface
{
    use SluggableTrait;

    protected $table = 'about';

    protected $fillable = ['judul', 'konten', 'slug'];

    protected $sluggable = array(
        'build_from' => 'judul',
        'save_to'    => 'slug',
    );
}
