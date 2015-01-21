<?php

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Berita extends Eloquent implements SluggableInterface
{
	use SluggableTrait;

	protected $table = 'berita';

	protected $fillable = ['judul', 'konten', 'slug', 'gambar'];

    protected $sluggable = array(
        'build_from' => 'judul',
        'save_to'    => 'slug',
    );
}
