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
{
    "success": true,
    "code": 0,
    "data": {
      "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMTIvYXBpL2F1dGgvbG9naW4iLCJpYXQiOjE1NTAyMjcyNjcsImV4cCI6MTU1ODAwMzI2NywibmJmIjoxNTUwMjI3MjY3LCJqdGkiOiJpN0lySTJzeGRKdVVNTzh3Iiwic3ViIjoxLCJwcnYiOiI2NDE5NWY5NTkwY2UwZWE0NzRkYjlkN2IwMDQ4NzFiNzY5OTFlN2IxIn0.8BVhHRcw4CXF-gDpdo7t2Qu7FG-qglYWFLjA52xkdks",
      'token_type': 'bearer',
      'expires_in': 7776000, // 3 month session lifetime
  }
}

@apiErrorExample Wrong params:
{
    "success": false,
    "code": 1,
    "data": null
}
###

###
@api {post} /api/auth/logout Logout from app
@apiName Logout from app
@apiGroup Auth
@apiPermission User
@apiVersion 0.1.0

@apiSuccessExample Success-Response:
{
    "success": true,
    "code": 0,
    "data": null
}
###

###
@api {get} /api/auth/me Info about current user
@apiName Info about current user
@apiGroup Auth
@apiPermission User
@apiVersion 0.1.0

@apiSuccessExample Success-Response:
{
    "success": true,
    "code": 0,
    "data": {
        "id": 12,
        "email": "dsfg@sdf.asdf",
        "created_at": "1551108193",
        "updated_at": "1551203477",
        "phone_number": "0667069066",
        "country_code": "+38",
        "is_registration_completed": true,
        "avatar": "https://tagit.appus.work/storage/avatars/4APXBAmi7KWJRKOlimBem5VyJ1qOwQ66XdHwWwKw.png", // can be null
        "birthday": "604508113",
        "sex": "dsfgdsf",
        "country": "gdsfg",
        "city": "Kharkiv",
        "company": null,
        "full_name": "deg",
        "coins": 100
    }
}
###

###
@api {post} /api/auth/refresh Update token
@apiName Refresh token
@apiGroup Auth
@apiPermission User
@apiVersion 0.1.0

@apiSuccessExample Success-Response:
{
  "success": true,
  "code": 0,
  "data": {
      "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMTIvYXBpL2F1dGgvcmVmcmVzaCIsImlhdCI6MTU1MDIyNzQ2OSwiZXhwIjoxNTU4MDAzODY4LCJuYmYiOjE1NTAyMjc4NjgsImp0aSI6InhaSkF4MWNkS2NqSmlNckoiLCJzdWIiOjEsInBydiI6IjY0MTk1Zjk1OTBjZTBlYTQ3NGRiOWQ3YjAwNDg3MWI3Njk5MWU3YjEifQ.2AJGB4Z21w6kGRBG_8YsxYdrbs3s5Et8wM2pYjUN9K0",
      "token_type": "bearer",
      "expires_in": 7776000
  }
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
{
    "success": true,
    "code": 0,
    "data": null
}

@apiErrorExample Twilio error:
{
    "success": false,
    "code": 3,
    "data": null
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
    "success": false,
    "code": 2,
    "data": {
      "token": token,
      "token_type": "bearer",
      "expires_in": 7776000 // 3 month life
  }
}

@apiErrorExample Wrong verification code:
{
    "success": false,
    "code": 2,
    "data": null
}

@apiErrorExample Wrong phone number:
{
    "success": false,
    "code": 15,
    "data": {
        "messages": {
            "phone_number": [
                1002
            ]
        }
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
@apiParam {Date} [birthday] Example: 604508113 (timestamp)
@apiParam {String} [sex] Max 50.
@apiParam {String} country Max 50
@apiParam {String} [city] Max 50.
@apiParam {String} [company] Max 50
@apiParam {String} [email] Max 50. Must be unique

@apiSuccessExample Success-Response:
HTTP/1.1 200 OK
{
    "success": true,
}

@apiErrorExample Wrong phone number:
{
    "success": false,
    "code": 15,
    "data": {
        "messages": {
            "city": [
                1002
            ]
        }
    }
}
###
