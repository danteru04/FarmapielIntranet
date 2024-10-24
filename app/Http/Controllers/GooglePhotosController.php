<?php

namespace App\Http\Controllers;

use Google\Client;
use Google\Service\PhotosLibrary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GooglePhotosController extends Controller
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
        $this->client->setAuthConfig(storage_path('app/credentials.json'));
        $this->client->addScope(PhotosLibrary::PHOTOSLIBRARY_READONLY);
        $this->client->setAccessType('offline');
        $this->client->setRedirectUri(route('google.callback'));
    }

    public function login()
    {
        $authUrl = $this->client->createAuthUrl();
        return redirect($authUrl);
    }

    public function callback(Request $request)
    {
        $token = $this->client->fetchAccessTokenWithAuthCode($request->input('code'));
        $this->client->setAccessToken($token);

        // Puedes guardar el token en la sesión o en la base de datos
        session(['google_token' => $token]);

        return redirect()->route('google.photos');
    }

    public function getPhotos()
    {
        // Recuperar el token almacenado
        if (session()->has('google_token')) {
            $this->client->setAccessToken(session('google_token'));
        } else {
            return redirect()->route('google.login');
        }

        $photosLibraryService = new PhotosLibrary($this->client);

        // Hacer una solicitud para obtener medios
        $response = $photosLibraryService->mediaItems->listMediaItems([
            'pageSize' => 10
        ]);

        return view('photos.index', ['mediaItems' => $response->getMediaItems()]);
    }
}