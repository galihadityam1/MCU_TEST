<?php

return [
    'paths' => ['api/*', 'sanctum/csrf-cookie', '*'], // Specify routes that need CORS
    'allowed_methods' => ['*'], // Allow all methods (GET, POST, PUT, DELETE, OPTIONS)
    'allowed_origins' => ['*'], // Allow all origins (change for security if needed)
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'], // Allow all headers
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true, // Set to true if using cookies or authentication
];
