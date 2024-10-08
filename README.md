Flow of Events:
Registration: The user registers by sending their details to a public registration route. No token is required. After successful registration, the app generates a JWT token and returns it.

Login: The user logs in by sending their credentials to a public login route. If the credentials are valid, the app generates a JWT token and returns it.

Accessing Protected Routes: Once the user has the JWT token (received from login/registration), they can include it in the Authorization header of future requests to access protected routes. The auth:api middleware will check this token before allowing access to these routes.

