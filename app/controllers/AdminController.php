<?php

class AdminController extends BaseController {

	public function index()
	{
	return View::make('admin.home');
	}

	public function search()
	{
	$cari = Input::get('cari');
	return Redirect::route('searchresults', compact('cari'));
	}

	#Search
	public function searchresults($cari)
	{
  $semua_profil = Profil::orderBy('created_at', 'desc')->get();
	$search_berita = Berita::where('judul', 'LIKE', '%'.$cari.'%')->orWhere('konten', 'LIKE', '%'.$cari.'%')
	->orderBy('created_at', 'desc')
	->get();

	$search_profil = Profil::where('judul', 'LIKE', '%'.$cari.'%')->orWhere('konten', 'LIKE', '%'.$cari.'%')
	->orderBy('created_at', 'desc')
	->get();

	return View::make('search', compact('search_berita', 'search_profil', 'cari','semua_profil'));
	}

	#Berita
	public function daftar_berita()
	{
	$semua_berita = Berita::all();
  $all_news = News::all();
  return View::make('admin.daftarberita', compact('semua_berita','all_news'));
	}

	public function show_berita($slug)
	{
	$berita = Berita::whereSlug($slug)->firstOrFail();
	return View::make('admin.showberita', compact('berita'));
	}

  public function show_berita_en($slug)
  {
  $berita = News::whereSlug($slug)->firstOrFail();
  return View::make('admin.showberita', compact('berita'));
  }


	public function tambah_berita()
	{
	return View::make('admin.tambahberita');
	}

    public function tambah_berita_en()
    {
    return View::make('admin.tambahberita_en');
    }

	public function store_berita()
	{
	$path = '/media/gambar/';
  $namafile = '';

   if (Input::hasFile('gambar')) {
        $file           = Input::file('gambar');
        $filepath 		= public_path() . $path;
        $namafile       = $file->getClientOriginalName();
        $resize			= Image::make($file->getRealPath())->resize('640','480')->save($filepath . $namafile);
    	Berita::create(['judul'	=> Input::get('judul'),
                      'konten'  => Input::get('konten'),
                      'gambar'  => $path . $namafile]);
    }
    else
    {
    	Berita::create(['judul'	=> Input::get('judul'),
                     'konten'   => Input::get('konten'),
                     'gambar'   => $namafile]);
    }
	return Redirect::route('daftar_berita');
	}

  public function store_berita_en()
  {
  $path = '/media/gambar/';
  $namafile = '';

 if (Input::hasFile('gambar')) {
      $file           = Input::file('gambar');
      $filepath       = public_path() . $path;
      $namafile       = $file->getClientOriginalName();
      $resize         = Image::make($file->getRealPath())->resize('640','480')->save($filepath . $namafile);
      News::create(['judul' => Input::get('judul'),
                    'konten'  => Input::get('konten'),
                    'gambar'  => $path . $namafile]);
  }
  else
  {
      News::create(['judul' => Input::get('judul'),
                   'konten'   => Input::get('konten'),
                   'gambar'   => $namafile]);
  }
  return Redirect::route('daftar_berita');
  }


	public function edit_berita($slug)
	{
	$berita = Berita::whereSlug($slug)->firstOrFail();
	return View::make('admin.editberita', compact('berita'));
	}

    public function edit_berita_en($slug)
    {
    $berita = News::whereSlug($slug)->firstOrFail();
    return View::make('admin.editberita_en', compact('berita'));
    }

	public function update_berita($slug)
	{
	$path = '/media/gambar/';
    $namafile = '';

    $berita = Berita::whereSlug($slug)->firstOrFail();

	if (Input::hasFile('gambar')) {
        $file           = Input::file('gambar');
        $filepath 		= public_path() . $path;
        $namafile       = $file->getClientOriginalName();
        $resize			= Image::make($file->getRealPath())->resize('640','480')->save($filepath . $namafile);
		$berita->fill(['judul'	=> Input::get('judul'),
                     'konten' 	=> Input::get('konten'),
                     'gambar'   => $path . $namafile]);
	} else {
		$berita->fill(['judul'=> Input::get('judul'),
                     'konten'  => Input::get('konten')]);
	}

	if (Input::get('hapus_gambar') =='ya') {
		$berita->fill(['judul'=> Input::get('judul'),
                     'konten'  => Input::get('konten'),
                     'gambar'      => $namafile]);

	}

	$berita->save();

	return Redirect::route('daftar_berita');
	}

    public function update_berita_en($slug)
    {
    $path = '/media/gambar/';
    $namafile = '';

    $berita = News::whereSlug($slug)->firstOrFail();

    if (Input::hasFile('gambar')) {
        $file           = Input::file('gambar');
        $filepath       = public_path() . $path;
        $namafile       = $file->getClientOriginalName();
        $resize         = Image::make($file->getRealPath())->resize('640','480')->save($filepath . $namafile);
        $berita->fill(['judul'  => Input::get('judul'),
                     'konten'   => Input::get('konten'),
                     'gambar'   => $path . $namafile]);
    } else {
        $berita->fill(['judul'=> Input::get('judul'),
                     'konten'  => Input::get('konten')]);
    }

    if (Input::get('hapus_gambar') =='ya') {
        $berita->fill(['judul'=> Input::get('judul'),
                     'konten'  => Input::get('konten'),
                     'gambar'      => $namafile]);

    }

    $berita->save();

    return Redirect::route('daftar_berita');
    }

  	public function delete_berita($slug)
    {
        $berita = Berita::whereSlug($slug)
        ->firstOrFail()
        ->delete();
        return Redirect::route('daftar_berita');
    }

    public function delete_berita_en($slug)
    {
        $berita = News::whereSlug($slug)
        ->firstOrFail()
        ->delete();
        return Redirect::route('daftar_berita');
    }

  #Profil
  public function daftar_profil()
  {
  $semua_profil = Profil::all();
  $all_profile = About::all();
  return View::make('admin.daftarprofil', compact('semua_profil','all_profile'));
  }

  public function show_profil($slug)
  {
  $profil = Profil::whereSlug($slug)->firstOrFail();
  return View::make('admin.showprofil', compact('profil'));
  }

  public function show_profil_en($slug)
  {
  $profil = About::whereSlug($slug)->firstOrFail();
  return View::make('admin.showprofil_en', compact('profil'));
  }


  public function tambah_profil()
  {
  return View::make('admin.tambahprofil');
  }

  public function tambah_profil_en()
  {
  return View::make('admin.tambahprofil_en');
  }

  public function store_profil()
  {
  Profil::create(['judul' => Input::get('judul'),
                 'konten'   => Input::get('konten')]);

  return Redirect::route('daftar_profil');
  }

  public function store_profil_en()
  {
  About::create(['judul' => Input::get('judul'),
                 'konten'   => Input::get('konten')]);

  return Redirect::route('daftar_profil');
  }


  public function edit_profil($slug)
  {
  $profil = Profil::whereSlug($slug)->firstOrFail();
  return View::make('admin.editprofil', compact('profil'));
  }

  public function edit_profil_en($slug)
  {
  $profil = About::whereSlug($slug)->firstOrFail();
  return View::make('admin.editprofil_en', compact('profil'));
  }

  public function update_profil($slug)
  {
    $profil = Profil::whereSlug($slug)->firstOrFail();
    $profil->fill(['judul'=> Input::get('judul'),
                   'konten'  => Input::get('konten')]);

    $profil->save();

  return Redirect::route('daftar_profil');
  }

  public function update_profil_en($slug)
  {
  $profil = About::whereSlug($slug)->firstOrFail();
  $profil->fill(['judul'=> Input::get('judul'),
                 'konten'  => Input::get('konten')]);

  $profil->save();

  return Redirect::route('daftar_profil');
  }

  public function delete_profil($slug)
  {
    $profil = Profil::whereSlug($slug)
    ->firstOrFail()
    ->delete();
    return Redirect::route('daftar_profil');
  }


  public function delete_profil_en($slug)
  {
      $profil = About::whereSlug($slug)
      ->firstOrFail()
      ->delete();
      return Redirect::route('daftar_profil');
  }
}
