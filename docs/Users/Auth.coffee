###
@api {post} /api/auth/login Login into app
@apiName Login into app
@apiGroup Auth
@apiPermission Guest
@apiVersion 0.1.0

@apiParam {String} phone_number Valid Max 10 symbols
@apiParam {String} country_code Valid Max 3 symbols
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
    "error": "No such user or phone number"
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
    "id": 12,
    "email": "dsfg@sdf.asdf",
    "created_at": "2019-02-20 13:05:44",
    "updated_at": "2019-02-20 14:45:49",
    "phone_number": "0667069066",
    "country_code": "+38",
    "is_registration_completed": true,
    "avatar": "https://tagit.appus.work/storage/avatars/4APXBAmi7KWJRKOlimBem5VyJ1qOwQ66XdHwWwKw.png", // can be null
    "birthday": "2018-01-01 00:00:00",
    "sex": "dsfgdsf",
    "country": "gdsfg",
    "city": "Kharkiv",
    "company": null,
    "full_name": "deg"
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
@api {post} /api/auth/start Send verification twilio token
@apiName Register new user
@apiGroup Auth
@apiPermission Guest
@apiVersion 0.1.0

@apiParam {String} country_code Max 3 symbols
@apiParam {String} phone_number Max 10 symbols

@apiSuccessExample Success-Response:
HTTP/1.1 200 OK
{
    "success": true
}

@apiErrorExample Twilio error:
HTTP/1.1 400 Bad request
{
    "message": "Twilio error",
    "errors": {
        "twilio": [
            "Cannot send SMS to landline phone numbers"
        ]
    }
}
###

###
@api {post} /api/auth/verify Send twilio code verification
@apiName Send twilio code verification
@apiGroup Auth
@apiPermission Guest
@apiVersion 0.1.0

@apiParam {String} phone_number Max 10 symbols
@apiParam {String} country_code Max 3 symbols
@apiParam {String} code 4 symbols
@apiParam {String} password Max 50.
@apiParam {String} password_confirmation Max 50. The same as password

@apiSuccessExample Success-Response:
HTTP/1.1 200 OK
{
    "token": token,
    "token_type": "bearer",
    "expires_in": 7776000 // 3 month life
}

@apiErrorExample Wrong verification code:
HTTP/1.1 400 Bad request
{
    "message": "Twilio error",
    "errors": {
        "twilio": [
            "No pending verifications for {number} found."
        ]
    }
}

@apiErrorExample Wrong phone number:
HTTP/1.1 422 Unprocessable Entity
{
    "message": "The given data was invalid.",
    "errors": {
        "phone_number": [
            "The phone number has already been taken."
        ]
    }
}
###

###
@api {post} /api/auth/profile Update profile
@apiName Update profile
@apiGroup Auth
@apiPermission User
@apiVersion 0.1.0

@apiParam {File} [avatar] Image. Max 5mb, png, jpeg
@apiParam {String} full_name Max 100
@apiParam {Date} birthday Example: 2018-01-01
@apiParam {String} sex Max 50.
@apiParam {String} country]Max 50
@apiParam {String} [city] Max 50.
@apiParam {String} [company] Max 50
@apiParam {String} email Max 50. Must be unique

@apiSuccessExample Success-Response:
HTTP/1.1 200 OK
{
    "success": true,
}

@apiErrorExample Wrong phone number:
HTTP/1.1 422 Unprocessable Entity
{
    "message": "The given data was invalid.",
    "errors": {
        "email": [
            "The email has already been taken."
        ]
    }
}
###
