###
@api {get} /api/content/:key Get Content by Key. Available values: terms_and_conditions, privacy_policy
@apiName Get Content by Key
@apiGroup Content
@apiPermission Guest
@apiVersion 0.1.0

@apiSuccessExample Success-Response:
{
    "success": true,
    "code": o,
    "data": {
        "key": "terms_and_conditions",
        "title": "Terms & Conditions",
        "value": "Terms & Conditions text",
        "created_at": "2019-02-15 16:59:48",
        "updated_at": "2019-02-15 16:59:48"
    }
}
###
