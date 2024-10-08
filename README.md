
**Client - Server:**

1. Server-Side (Backend):
JWT Token Creation: The server generates a JWT token when a user logs in or registers. This token contains encoded user data (usually the user ID and other claims) and is signed using a secret key.
Token Verification: The server does not store the token in a database or session. Instead, it stores the secret key that was used to sign the token.
Stateless Verification: Each time the client makes an authenticated request (e.g., accessing a protected route), the token is sent by the client, and the server verifies its validity by checking the signature. Since the token is self-contained (it includes all necessary information, like the user ID), the server doesn't need to store or track individual tokens. This is what makes JWT authentication stateless.

2. Client-Side (Frontend):
Token Storage: After receiving the JWT token from the server (e.g., after a successful login), the client is responsible for storing the token securely.
Local Storage: Some applications store the token in the browser’s local storage.
Session Storage: Another option is to store the token in session storage.
HTTP-Only Cookies: A more secure method is to store the token in an HTTP-only cookie (especially to protect against XSS attacks).
Token Usage: When the client needs to make an authenticated request, the token is included in the Authorization header as a Bearer Token:

   Authorization: Bearer <JWT>

    Renewal: The token can have an expiration time (configured on the server), and once expired, the client may need to refresh the token or re-authenticate.

**Flow of JWT Token:**

Login/Register:

Client sends credentials.
Server verifies credentials and generates a JWT token.
Server sends the token back to the client.

Client-Side Storage:

Client stores the token (local storage, session storage, or HTTP-only cookies).
Authenticated Requests:

For each subsequent request to a protected route, the client sends the token in the Authorization header.
Server Verification:

The server verifies the token by checking its signature. If the token is valid, the server grants access to the protected resource.
Important Points:
Server does not store the JWT token: The server does not keep track of tokens. Each request is independently verified using the token sent by the client.
Token is stored on the client: The client is responsible for holding the token securely and including it in future requests.
