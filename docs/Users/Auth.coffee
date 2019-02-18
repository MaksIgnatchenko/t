###
@api {post} /api/auth/login Login into app
@apiName Login into app
@apiGroup Auth
@apiPermission Guest
@apiVersion 0.1.0

@apiParam {String} email Valid email. Max 100 symbols
@apiParam {String} password Min 6. Max 50. At least one letter, one digit, one special symbol

@apiSuccessExample Success-Response:
HTTP/1.1 200 OK
{
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMTIvYXBpL2F1dGgvbG9naW4iLCJpYXQiOjE1NTAyMjcyNjcsImV4cCI6MTU1ODAwMzI2NywibmJmIjoxNTUwMjI3MjY3LCJqdGkiOiJpN0lySTJzeGRKdVVNTzh3Iiwic3ViIjoxLCJwcnYiOiI2NDE5NWY5NTkwY2UwZWE0NzRkYjlkN2IwMDQ4NzFiNzY5OTFlN2IxIn0.8BVhHRcw4CXF-gDpdo7t2Qu7FG-qglYWFLjA52xkdks",
    'token_type': 'bearer',
    'expires_in': 7776000, // 3 month session lifetime
}

@apiErrorExample Wrong params:
HTTP/1.1 401 Unauthorized
{
    "message":"No such username or password",
}
###

###
@api {post} /api/auth/login/:service Login via Social services. Available values: facebook, google
@apiName Login via Social services
@apiGroup Auth
@apiPermission Guest
@apiVersion 0.1.0

@apiParam {String} token

@apiSuccessExample Success-Response:
HTTP/1.1 200 OK
{
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMTIvYXBpL2F1dGgvbG9naW4iLCJpYXQiOjE1NTAyMjcyNjcsImV4cCI6MTU1ODAwMzI2NywibmJmIjoxNTUwMjI3MjY3LCJqdGkiOiJpN0lySTJzeGRKdVVNTzh3Iiwic3ViIjoxLCJwcnYiOiI2NDE5NWY5NTkwY2UwZWE0NzRkYjlkN2IwMDQ4NzFiNzY5OTFlN2IxIn0.8BVhHRcw4CXF-gDpdo7t2Qu7FG-qglYWFLjA52xkdks",
    "token_type": "bearer",
    "expires_in": 7776000
}
###

###
@api {post} /api/auth/logout Logout from app
@apiName Logout from app
@apiGroup Auth
@apiPermission User
@apiVersion 0.1.0

@apiSuccessExample Success-Response:
HTTP/1.1 200 OK
{
    "message": "Successfully logged out"
}
###

###
@api {get} /api/auth/me Info about current user
@apiName Info about current user
@apiGroup Auth
@apiPermission User
@apiVersion 0.1.0

@apiSuccessExample Success-Response:
HTTP/1.1 200 OK
{
    "id": 1,
    "first_name": "Artem",
    "last_name": "Petrov",
    "email": "artem.petrov@appus.me",
    "created_at": "2019-02-15 10:33:53",
    "updated_at": "2019-02-15 10:33:53"
}
###

###
@api {post} /api/auth/refresh Update token
@apiName Refresh token
@apiGroup Auth
@apiPermission User
@apiVersion 0.1.0

@apiSuccessExample Success-Response:
HTTP/1.1 200 OK
{
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMTIvYXBpL2F1dGgvcmVmcmVzaCIsImlhdCI6MTU1MDIyNzQ2OSwiZXhwIjoxNTU4MDAzODY4LCJuYmYiOjE1NTAyMjc4NjgsImp0aSI6InhaSkF4MWNkS2NqSmlNckoiLCJzdWIiOjEsInBydiI6IjY0MTk1Zjk1OTBjZTBlYTQ3NGRiOWQ3YjAwNDg3MWI3Njk5MWU3YjEifQ.2AJGB4Z21w6kGRBG_8YsxYdrbs3s5Et8wM2pYjUN9K0",
    "token_type": "bearer",
    "expires_in": 7776000
}
###

###
@api {post} /api/auth/register Register user
@apiName Register new user
@apiGroup Auth
@apiPermission Guest
@apiVersion 0.1.0

@apiParam {String} first_name Min 2, Max 50 symbols
@apiParam {String} last_name Min 2, Max 50 symbols
@apiParam {String} email Must be unique, max 100
@apiParam {String} password Min 6, max 50, 1 letter, one digit, one special char
@apiParam {String} password_confirmation

@apiSuccessExample Success-Response:
HTTP/1.1 200 OK
{
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMTIvYXBpL2F1dGgvcmVnaXN0ZXIiLCJpYXQiOjE1NTAyMjY4MzMsImV4cCI6MTU1ODAwMjgzMywibmJmIjoxNTUwMjI2ODMzLCJqdGkiOiI5Qkc4ZnJaZXRqYVZCUW03Iiwic3ViIjoxLCJwcnYiOiI2NDE5NWY5NTkwY2UwZWE0NzRkYjlkN2IwMDQ4NzFiNzY5OTFlN2IxIn0.w08GjFN1Bb8eqw1ARytWRF-s3jQii7z_wu4LHWPpVqw",
    "user": {
        "first_name": "Artem",
        "last_name": "Petrov",
        "email": "artem.petrov@appus.me",
        "updated_at": "2019-02-15 10:33:53",
        "created_at": "2019-02-15 10:33:53",
        "id": 1
    }
}
@apiErrorExample Not unique email:
HTTP/1.1 422 Unprocessible Entity
{
    "message": "The given data was invalid.",
    "errors": {
        "email": [
            "The email has already been taken."
        ]
    }
}
###


