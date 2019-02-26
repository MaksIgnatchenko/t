###
@api {get} /api/challenge Get all challenges
@apiName Get all challenges
@apiGroup Challenge
@apiPermission User
@apiVersion 0.1.0

@apiSuccessExample Success-Response:
{
    "success": true,
    "code": 0,
    "data": {
          "items": [
            {
                "id": 1,
                "company_id": null,
                "name": "Challenge1",
                "image": "http://localhost/storage/challenges/y9SS0d4YRDnwKY2WsDfdj7e4FdxcIKOEcYwZthp2.jpeg",
                "description": "test challenge",
                "link": "https://google.com",
                "country": "Saudi arabia",
                "city": "Mecca",
                "participants_limit": 100,
                "proof_type": "photo",
                "start_date": "1551225600",
                "end_date": "1551312000",
                "created_at": "1551197038",
                "updated_at": "1551197038"
            },
            {
                "id": 3,
                "company_id": 1,
                "name": "Challenge2",
                "image": "http://localhost/storage/challenges/81cuZTBd5gqR4yxbbUayUJMB7zQ7R5CxkLKt8QkO.png",
                "description": "test challenge",
                "link": "https://google.com",
                "country": "United Arab Emirates",
                "city": "Dubai",
                "participants_limit": 100,
                "proof_type": "photo",
                "start_date": "1551225600",
                "end_date": "1551312000",
                "created_at": "1551197292",
                "updated_at": "1551197292"
            },
            {
                "id": 4,
                "company_id": 2,
                "name": "Challenge3",
                "image": "http://localhost/storage/challenges/gHnCrXENK2lhnPePWgezKe8aAoocU5PoAyJdPKq8.jpeg",
                "description": "test",
                "link": "https://facebook.com",
                "country": "United Arab Emirates",
                "city": "Dubai",
                "participants_limit": 100,
                "proof_type": "photo",
                "start_date": "1551225600",
                "end_date": "1551312000",
                "created_at": "1551199554",
                "updated_at": "1551199554"
            }
        ]
    }
}
###

###
@api {get} /api/challenge/:id Get Challenge by Id
@apiName Get Challenge by id
@apiGroup Challenge
@apiPermission User
@apiVersion 0.1.0

@apiSuccessExample Success-Response:
{
    "success": true,
    "code": 0,
    "data": {
        "id": 1,
        "company_id": null,
        "name": "Challenge1",
        "image": "http://localhost/storage/challenges/y9SS0d4YRDnwKY2WsDfdj7e4FdxcIKOEcYwZthp2.jpeg",
        "description": "test challenge",
        "link": "https://google.com",
        "country": "Saudi arabia",
        "city": "Mecca",
        "participants_limit": 100,
        "proof_type": "photo",
        "start_date": "1551225600",
        "end_date": "1551312000",
        "created_at": "1551197038",
        "updated_at": "1551197038"
    }
}

@apiErrorExample No such item:
{
    "success": false,
    "code": 16,
    "data": null
}
###



