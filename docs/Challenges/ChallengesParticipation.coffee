###
@api {get} /api/challenge/{challengeId}/participation Get challenge participations
@apiName Get challenge participations
@apiGroup Challenge
@apiPermission User
@apiVersion 0.1.0

@apiParam {Integer} [page] Default 1

@apiSuccessExample Success-Response:
{
    "success": true,
    "code": 0,
    "data": {
        "current_page": 1,
        "data": [
            {
                "id": 12,
                "email": "artempetrovjava@gmail.com",
                "created_at": "1550667944",
                "updated_at": "1551445475",
                "phone_number": "0667069066",
                "country_code": "+38",
                "is_registration_completed": true,
                "avatar": "http://localhost:8789/storage/avatars/4APXBAmi7KWJRKOlimBem5VyJ1qOwQ66XdHwWwKw.png",
                "birthday": "1514764800",
                "sex": "dsfgdsf",
                "country": "Saudi arabia",
                "city": "Kharkiv",
                "company": null,
                "full_name": "deg"
            }
        ],
        "first_page_url": "http://localhost:8789/api/challenge/1/participation?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http://localhost:8789/api/challenge/1/participation?page=1",
        "next_page_url": null,
        "path": "http://localhost:8789/api/challenge/1/participation",
        "per_page": 15,
        "prev_page_url": null,
        "to": 1,
        "total": 1
    }
}
###

###
@api {post} /api/challenge/{challengeId}/participation Un/participate challenge
@apiName Un/participate challenge
@apiGroup Challenge
@apiPermission User
@apiVersion 0.1.0

@apiParam {Integer} [participate] Available values: 1 or 0. Default 1

@apiSuccessExample Success-Response:
{
    "success": true,
    "code": 0,
    "locale": "en",
    "message": "OK",
    "data": null
}

@apiErrorExample Participation limit exceeded:
{
    "success": false,
    "code": 18,
    "locale": "en",
    "message": "Error #18",
    "data": null
}

@apiErrorExample Not enough coins:
{
    "success": false,
    "code": 19,
    "locale": "en",
    "message": "Error #19",
    "data": null
}
###



