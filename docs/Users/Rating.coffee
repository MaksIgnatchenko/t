###
@api {get} /api/rating Get main rating
@apiName Get main rating
@apiGroup Rating
@apiPermission User
@apiVersion 0.1.0

@apiSuccessExample Success-Response:
{
    "success": true,
    "code": 0,
    "data": {
        "my_rating": {
            "id": 47,
            "full_name": "Test2",
            "position": 2,
            "total_reward": 190,
            "avatar": null
        },
        "rating": {
            "current_page": 1,
            "data": [
                {
                    "id": 24,
                    "full_name": "Test",
                    "position": 1,
                    "total_reward": 480,
                    "avatar": "https://tagit.appus.work/storage/avatars/lanYlud1GPsALPzOD4FLzNWrQ3fpSpdqnD35VjJh.jpeg"
                },
                {
                    "id": 1293,
                    "full_name": "Axe",
                    "position": 2,
                    "total_reward": 190,
                    "avatar": null
                },
                {
                    "id": 47,
                    "full_name": "Test2",
                    "position": 2,
                    "total_reward": 190,
                    "avatar": null
                },
                {
                    "id": 49,
                    "full_name": "Test3",
                    "position": 4,
                    "total_reward": 0,
                    "avatar": null
                }
            ],
            "first_page_url": "https://tagit.appus.work/api/rating?page=1",
            "from": 1,
            "last_page": 1,
            "last_page_url": "https://tagit.appus.work/api/rating?page=1",
            "next_page_url": null,
            "path": "https://tagit.appus.work/api/rating",
            "per_page": 20,
            "prev_page_url": null,
            "to": 4,
            "total": 4
        }
    }
}
###

