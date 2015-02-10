<?php

class HomeController extends \BaseController {

    public function index()
    {
    $about = About::orderBy('created_at', 'desc')->get();
    return View::make('homepage', compact('semua_profil','about'));
    }

    public function show_profil($slug)
    {
    $profil = Profil::whereSlug($slug)->firstOrFail();
    return View::make('profil.showprofil', compact('profil','semua_profil'));
    }

    public function show_profil_en($slug)
    {
    $profil = About::whereSlug($slug)->firstOrFail();
    return View::make('profil.showprofil', compact('profil','about'));
    }

}
