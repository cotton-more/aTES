<?php

namespace App\Http\Controllers\OAuth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Throwable;

final class OAuthCallbackController
{
    /**
     * @throws Throwable
     */
    public function __invoke(Request $request)
    {
        $response = Http::asForm()->post(
            env('OAUTH_SERVER_URI') . '/oauth/token',
            [
                'grant_type' => 'authorization_code',
                'client_id' => env('OAUTH_CLIENT_ID'),
                'client_secret' => env('OAUTH_CLIENT_SECRET'),
                'redirect_uri' => env('OAUTH_REDIRECT'),
                'code' => $request->get('code'),
            ]
        );

        $accessToken = $response->json('access_token');
        $meResponse = Http::withToken($accessToken)->get(
            env('OAUTH_SERVER_URI') . '/api/user'
        );

        $user = User::query()->firstOrNew(['public_id' => $meResponse->json('public_id')]);
        $user->forceFill([
            'name' => $meResponse->json('name'),
            'role' => $meResponse->json('role'),
            'access_token' => $accessToken,
            'refresh_token' => $response->json('refresh_token'),
            'expires_in' => $response->json('expires_in')
        ]);
        $user->save();

        Auth::login($user, true);

        return redirect('/');
    }
}