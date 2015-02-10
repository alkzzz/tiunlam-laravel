<?php

class BeritaController extends \BaseController {

	public function index()
	{
    $semua_berita = Berita::all();
    return View::make('berita.daftarberita', compact('semua_berita','semua_profil'));
	}

	public function show($slug)
	{
	$berita = Berita::whereSlug($slug)->firstOrFail();
	return View::make('berita.showberita', compact('berita','semua_profil'));
	}

	public function index_en()
	{
    $semua_berita = News::all();
    return View::make('berita.daftarberita', compact('semua_berita','about'));
	}

	public function show_en($slug)
	{
	$berita = News::whereSlug($slug)->firstOrFail();
	return View::make('berita.showberita', compact('berita','about'));
	}

}
