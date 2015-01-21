<?php

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Profil extends Eloquent implements SluggableInterface
{
	use SluggableTrait;

	protected $table = 'profil';

	protected $fillable = ['judul', 'konten', 'slug'];

    protected $sluggable = array(
        'build_from' => 'judul',
        'save_to'    => 'slug',
    );
}