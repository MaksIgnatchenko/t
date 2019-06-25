###
@api {post} /api/auth/me/company Join/leave a company
@apiName Join/left a company
@apiGroup Auth
@apiPermission User
@apiVersion 0.1.0

@apiParam {String} company_join_code string size:16 (pass null to leave current company)

@apiSuccessExample Success-Response:
{
    "success": true,
    "code": 0,
    "data": null
}

@apiErrorExample Wrong join code:
{
    "success": false,
    "code": 15,
    "data": {
        "messages": {
            "company_join_code": [
                1012
            ]
        }
    }
}

@apiErrorExample Incorrect join code length:
{
  "success": false,
  "code": 15,
  "data": {
    "messages": {
      "company_join_code": [
        1012
      ]
    }
  }
}
###