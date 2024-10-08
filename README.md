
**Client - Server:**

1. Server-Side (Backend):
   
    JWT Token Creation: The server generates a JWT token when a user logs in or registers. This token contains encoded user data (usually the user ID and other claims) and is signed using a secret key.

    Token Verification: The server does not store the token in a database or session. Instead, it stores the secret key that was used to sign the token.

    Stateless Verification: Each time the client makes an authenticated request (e.g., accessing a protected route), the token is sent by the client, and the server verifies its validity by checking the    signature. Since the token is self-contained (it includes all necessary information, like the user ID), the server doesn't need to store or track individual tokens. This is what makes JWT authentication stateless.

3. Client-Side (Frontend):
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



*********************************************************************************************************************************************************************************

**Working of App:**

1. When user try to access the login url ( http://127.0.0.1:8000/api/auth/register), then the corresponding controller class function logic is executed i.e., AuthController::Register() function().
2. AuthController::Register() logic:
    a. Parameters: Accepts the RegistrationRequest class object which takes the user input (name , email , password) in a specific order like a form and validates the user input like email validation, password            strength etc.
    b. Creates an user and returns token in a json object format along with some messages, if failed to created an user then will return error message.
    c. Hashes the password and stores in the db, after successful creation of the user

3. AuthController::login() logic:
    a. Parameters: Accepts LoginRequest object (that takes the user input like email and password, authenticates the user)
    b. firstly it tries to authenticate the user by taking the user credentials (user id and password) and after successful authentication of user details a token is generated.
    c. A token is generated and sent to the user.



















***************************************************************************************************************************************************************************************************************
JWT (JSON Web Token) verification involves both the client and the server, but the key verification logic happens on the server. The token is signed using a secret key on the server, and when a request with the token is made, the server can verify the token's integrity and validity using this secret. Here's how the process works:

JWT Generation (On Server Side):
User Authentication:

When the user logs in (provides valid credentials like email and password), the server authenticates the user.
Token Creation:

Once the user is authenticated, the server generates a JWT token. This token typically contains three parts:
Header: Specifies the type of token and the algorithm used (e.g., HMAC SHA-256).
Payload: Contains the claims or information about the user (e.g., user_id, roles, permissions, etc.).
Signature: This is where the server signs the token with the JWT_SECRET (a secret key stored on the server).
Example token format: HEADER.PAYLOAD.SIGNATURE
plaintext
Copy code
eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c
Token Sent to Client:

The server sends the signed JWT token back to the client, usually in the response body after a successful login or registration.
The client (e.g., a browser or mobile app) stores this token, typically in local storage or cookies.
JWT Verification (On Server Side):
When the client makes an authenticated request (e.g., accessing a protected resource), it sends the JWT token along with the request in the Authorization header as a Bearer token:

makefile
Copy code
Authorization: Bearer <JWT_TOKEN>
Steps in Verification:
Client Sends Request with Token:

The client includes the JWT in the request header.
Example request header:
makefile
Copy code
Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9...
Server Receives the Token:

The server intercepts the request and extracts the token from the Authorization header.
JWT Decoding and Verification:

The server uses its JWT_SECRET (the same key it used to sign the token) to decode and verify the token.
Verification steps:
Check the Signature: The server recalculates the signature using the header and payload parts of the token and its JWT_SECRET. It compares this recalculated signature with the signature part of the token. If they match, the token is valid; otherwise, it has been tampered with.
Check Expiration: The server checks the token's expiration (exp claim) to see if it's still valid.
Validate Claims: The server can also check the claims (e.g., user_id, role, etc.) in the token's payload to determine if the user has access to the requested resource.
Token Validity:

If the token is valid (signature matches, it's not expired, and claims are valid), the server proceeds with the request.
If the token is invalid (e.g., signature mismatch, expired, or tampered), the server responds with a 401 Unauthorized error.
JWT_SECRET Key:
The JWT_SECRET is only known to the server.
When the server generates the JWT, it uses this secret to sign the token, ensuring that no one else (other than the server) can tamper with the token.
When the server receives a JWT, it verifies the token using the same JWT_SECRET. This way, the server ensures that the token was generated by itself and has not been altered by the client or any third party.
Key Points:
The token is stored by the client, but it is signed by the server using a secret key.
When the client sends the token back to the server, the server uses the JWT_SECRET to verify the token's integrity.
The server checks the signature, expiration, and possibly other claims (like user roles, etc.) to confirm the token's validity.
Example of JWT Verification in Laravel:
If you're using Laravel with JWT Authentication, the token verification is handled automatically by the JWT middleware. For example:

php
Copy code
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
The auth:api middleware ensures that:
The token is included in the request.
The token is verified (using the secret key stored on the server).
If the token is valid, it allows access to the route and retrieves the user.
Summary:
Token storage happens on the client side.
Verification happens on the server side, using the JWT_SECRET to verify the token's integrity and authenticity.
   
   

