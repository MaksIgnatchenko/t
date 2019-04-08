###
@api {get} /api/challenge/:id/proof/:id Get proof details
@apiName Get proof details
@apiGroup Proof
@apiPermission User
@apiVersion 0.1.0

@apiSuccessExample Success-Response:
{
    "success": true,
    "code": 0,
    "data": {
        "id": 4,
        "challenge_id": 411,
        "user_id": 7,
        "type": "video",
        "items": [
            "https://tagit.appus.work/storage/proofs/cw9Ehrn47vsVWsQtnvzEg3Y4QeoHuqnW6UFxeguS.mp4"
        ],
        "status": "accepted",
        "created_at": "1554128127",
        "updated_at": "1554128127"
    }
}

@apiErrorExample No such proof:
{
    "success": false,
    "code": 16,
    "data": null
}

@apiErrorExample Proof does not belong to this challenge:
{
    "success": false,
    "code": 26,
    "data": null
}

###

###
@api {post} /api/challenge/:id/proof Send proof
@apiName Send proof
@apiGroup Proof
@apiPermission User
@apiVersion 0.1.0

@apiParam {String} type enum - ["photo", "multiple_photos", "video", "multiple_videos", "screenshot", "multiple_screenshots"]
@apiParam {String} items array of proof items files (available file formats  (photo, screenshot - 'jpg', 'jpeg', 'png'), (video - 'mp4'))

@apiSuccessExample Success-Response:
{
    "success": true,
    "code": 0,
    "data": {
        "id": 8,
        "challenge_id": 411,
        "status": "pending"
    }
}

@apiErrorExample No such challenge:
{
    "success": false,
    "code": 16,
    "data": null
}

@apiErrorExample Challenge is not active:
{
    "success": false,
    "code": 23,
    "data": null
}

@apiErrorExample User not participating:
{
    "success": false,
    "code": 21,
    "data": null
}

@apiErrorExample User already has pending or accepted proof:
{
    "success": false,
    "code": 24,
    "data": null
}

@apiErrorExample Validation errors - type not equal to required:
{
    "success": false,
    "code": 24,
    "data": {
      "messages" : {
        "type": [
          1015
        ]
      }
    }
}

@apiErrorExample Validation errors - items count does not match to required:
{
    "success": false,
    "code": 24,
    "data": {
      "messages" : {
        "items": [
          1014
        ]
      }
    }
}

@apiErrorExample Validation errors - wrong mime type:
{
    "success": false,
    "code": 24,
    "data": {
      "messages" : {
        "items.0": [
          1009
        ]
      }
    }
}
###

###
@api {delete} /api/challenge/:id/proof/:id Delete proof
@apiName Delete proof
@apiGroup Proof
@apiPermission User
@apiVersion 0.1.0

@apiSuccessExample Success-Response:
{
    "success": true,
    "code": 0,
    "data": null
}

@apiErrorExample No such proof:
{
    "success": false,
    "code": 16,
    "data": null
}

@apiErrorExample User is not owner of proof:
{
    "success": false,
    "code": 25,
    "data": null
}

@apiErrorExample User is not owner of proof:
{
    "success": false,
    "code": 25,
    "data": null
}

@apiErrorExample Proof does not belong to this challenge:
{
    "success": false,
    "code": 26,
    "data": null
}

@apiErrorExample Proof can not be removed:
{
    "success": false,
    "code": 27,
    "data": null
}
###



