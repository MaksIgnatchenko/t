###
@api {post} /api/password/email Forgot password
@apiName Send token to email
@apiGroup Password
@apiPermission Guest
@apiVersion 0.1.0

@apiParam {String} email

@apiSuccessExample Success-Response:
{
    "success": true,
    "code": 0,
    "data": null
}

@apiErrorExample Error-Response:
{
    "success": false,
    "code": 5,
    "data": null
}
###

###
@api {post} /api/password/change Change password
@apiName Change password
@apiGroup Password
@apiPermission User
@apiVersion 0.1.0

@apiParam {String} old_password Min 6. Max 50. At least one letter, one digit, one special symbol
@apiParam {String} new_password Min 6. Max 50. At least one letter, one digit, one special symbol
@apiParam {String} new_password_confirmation Same as new_password

@apiSuccessExample Success-Response:
{
    "success": true,
    "code": 0,
    "data": null
}

@apiErrorExample Error-Response:
HTTP/1.1 400 Error
{
    "success": false,
    "code": 4,
    "data": null
}
###