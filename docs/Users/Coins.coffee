###
@api {post} /api/user/coins Add coins for the user (enabled only for local and develop servers)
@apiName Add coins for the user
@apiGroup Coins
@apiPermission User
@apiVersion 0.1.0

@apiParam {Integer} [amount] Available values: integer min: 0  max: 1000

@apiSuccessExample Success-Response:
{
    "success": true,
    "code": 0,
    "data": null
}