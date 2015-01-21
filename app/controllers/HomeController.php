<?php

class HomeController extends \BaseController {

    public function index()
    {
    $semua_profil = Profil::orderBy('created_at', 'desc')->get();
    $about = About::orderBy('created_at', 'desc')->get();
    return View::make('homepage', compact('semua_profil','about'));
    }

    public function show_profil($slug)
    {
    $semua_profil = Profil::orderBy('created_at', 'desc')->get();
    $profil = Profil::whereSlug($slug)->firstOrFail();
    return View::make('profil.showprofil', compact('profil','semua_profil'));
    }

    public function show_profil_en($slug)
    {
    $about = About::orderBy('created_at', 'desc')->get();
    $profil = About::whereSlug($slug)->firstOrFail();
    return View::make('profil.showprofil', compact('profil','about'));
    }

}
