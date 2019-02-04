###
@api {post} /api/login Login
@apiName Login as resident
@apiGroup Users
@apiVersion 0.0.1

@apiParam {String} email Required.
@apiParam {String} password Required.

@apiSuccessExample Success:
HTTP/1.1 200 OK
{
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0Ojg4NTUvYX..."
}

@apiSuccessExample User not exists:
HTTP/1.1 401 Unauthorized
{
    "error": "Unauthorized"
}
###

###
@api {post} /api/me Get user info
@apiName Get user info
@apiGroup Users
@apiVersion 0.0.1

@apiHeader {String} Authorization Bearer token

@apiSuccessExample Success:
HTTP/1.1 200 OK
{
    "id": 6,
    "name": null,
    "email": "dd@dd.dd",
    "email_verified_at": null,
    "created_at": "2019-01-30 15:57:26",
    "updated_at": "2019-01-30 15:57:26"
}

@apiSuccessExample Invalid token:
HTTP/1.1 401 Unauthorized
{
    "message": "Unauthenticated."
}
###

###
@api {post} /api/register Register user
@apiName Register user
@apiGroup Users
@apiVersion 0.0.1

@apiParam {String} name Not required. max:200
@apiParam {String} email Required.
@apiParam {String} password Required. min:6 alpha_num

@apiSuccessExample Success:
HTTP/1.1 200 OK
{
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0Ojg4NTUvYXBpL3JlZ2lzdG..."
}
###

###
@api {post} /api/logout Logout resident
@apiName Logout resident
@apiGroup Users
@apiVersion 0.0.1

@apiHeader {String} Authorization Bearer token

@apiSuccessExample Success:
HTTP/1.1 200 OK
{
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0Ojg4NTUvYXBpL3JlZ2lzdG..."
}
###

###
@api {post} /api/refresh Refresh token
@apiName Refresh token
@apiGroup Users
@apiVersion 0.0.1

@apiHeader {String} Authorization Bearer token

@apiSuccessExample Success:
HTTP/1.1 200 OK
{
    "success": true,
    "code": 0,
    "locale": "en",
    "message": "OK",
    "data": {
        "message": "Resident deleted successfully"
    }
}
###
