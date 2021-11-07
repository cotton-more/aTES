<?php namespace App\Http\Controllers\OAuth;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

final class OAuthRedirectController
{
    public function __invoke(Request $request): RedirectResponse
    {
        $queries = http_build_query([
            'client_id' => env('OAUTH_CLIENT_ID'),
            'redirect_uri' => env('OAUTH_REDIRECT'),
            'response_type' => 'code',
            'scope' => '',
        ]);

        return redirect(env('OAUTH_SERVER_URI') . '/oauth/authorize?' . $queries);
    }
}