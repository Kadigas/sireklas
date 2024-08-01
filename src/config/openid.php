<?php

return [
    'provider' => env("OIDC_PROVIDER"),
    'clientId' => env("OIDC_CLIENT_ID"),
    'clientSecret' => env("OIDC_CLIENT_SECRET"),
    'redirectUri' => env("OIDC_REDIRECT_URL"),
    'scope' => env("OIDC_SCOPES"),
    'redirectLogout' => env('OIDC_POST_LOGOUT_REDIRECT_URI'),
];