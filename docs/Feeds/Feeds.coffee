###
@api {get} /api/feed Get all feeds
@apiName Get all feeds
@apiGroup Feeds
@apiPermission User
@apiVersion 0.1.0

@apiParam {Integer} [id] Min 1
@apiParam {Integer} [limit] Min 1 Default 20

@apiSuccessExample Success-Response:
{
    "success": true,
    "code": 0,
    "data": {
        "items": [
            {
                "id": 5,
                "type": "proof_sent",
                "country": "Saudi arabia",
                "challenge_id": null,
                "proof_id": 13,
                "created_at": "1555408802",
                "updated_at": "1555408802",
                "challenge": null,
                "proof": {
                    "id": 13,
                    "challenge_id": 425,
                    "user_id": 24,
                    "type": "photo",
                    "items": [
                        "https://tagit.appus.work/storage/proofs/kPVi1hNOb9jZTRTLMpz71ApBtSauOzvs4Fa0YXzH.jpeg"
                    ],
                    "status": "pending",
                    "created_at": "1555346402",
                    "updated_at": "1555346402",
                    "preview": "https://tagit.appus.work/storage/proofs/Tgmxw4mMcV5M7o1y88lIsCOu7uejJt.jpg",
                    "user": {
                        "id": 24,
                        "email": "myfuns1989@gmail.com",
                        "created_at": "1554450631",
                        "updated_at": "1555346286",
                        "phone_number": "0507337257",
                        "country_code": "+38",
                        "is_registration_completed": true,
                        "avatar": null,
                        "birthday": null,
                        "sex": null,
                        "country": "Saudi arabia",
                        "city": null,
                        "company": null,
                        "full_name": "Max",
                        "coins": 40
                      },
                      "challenge": {
                        "id": 421,
                        "company_id": null,
                        "name": "test-cron",
                        "image": "http://localhost/storage/challenges//uX1HyHkTlcwRQm0bJdczcIyWkLy1AuyNNnOAllEc.jpeg",
                        "description": "hgv 3wre trwe twer t",
                        "link": "https://google.com",
                        "country": "Saudi arabia",
                        "city": "Dubai",
                        "participants_limit": 100,
                        "proof_type": "photo",
                        "start_date": "1555304400",
                        "end_date": "1555578000",
                        "created_at": "1555310725",
                        "updated_at": "1555585205",
                        "items_count_in_proof": 1,
                        "video_duration": null,
                        "status": "end"
                    }
                  }
              },
              {
                "id": 4,
                "type": "challenge_started",
                "country": "Saudi arabia",
                "challenge_id": 425,
                "proof_id": null,
                "created_at": "1555408802",
                "updated_at": "1555408802",
                "challenge": {
                    "id": 425,
                    "company_id": null,
                    "name": "cron5",
                    "image": "https://tagit.appus.work/storage/challenges//UlsS8SxLXCdVTtbOggzuglqAwqeNgzzcjeZxSktb.jpg",
                    "description": "ffew ef we fwef wf",
                    "link": "https://google.com",
                    "country": "Saudi arabia",
                    "city": "Dubai",
                    "participants_limit": 100,
                    "proof_type": "photo",
                    "start_date": "1555336800",
                    "end_date": "1555347600",
                    "created_at": "1555343443",
                    "updated_at": "1555408803",
                    "items_count_in_proof": 1,
                    "video_duration": null,
                    "status": "end"
                },
                "proof": null
              }
          ]
      }
    }

@apiErrorExample Wrong "form id" param error #1:
{
    "success": false,
    "code": 15,
    "data": {
        "messages": {
            "id": [
                1001
            ]
        }
    }
}

@apiErrorExample Wrong "form id" param error #2:
{
    "success": false,
    "code": 15,
    "data": {
        "messages": {
            "id": [
                1013
            ]
        }
    }
}

@apiErrorExample Wrong "limit" param error #1:
{
    "success": false,
    "code": 15,
    "data": {
        "messages": {
            "id": [
                1001
            ]
        }
    }
}

@apiErrorExample Wrong "limit" param error #2:
{
    "success": false,
    "code": 15,
    "data": {
        "messages": {
            "id": [
                1013
            ]
        }
    }
}

###

###
@api {get} /api/feed/:id Get Feed by Id
@apiName Get Feed by id
@apiGroup Feed
@apiPermission User
@apiVersion 0.1.0

@apiSuccessExample Success-Response:
{
    "success": true,
    "code": 0,
    "data": {
        "id": 6,
        "type": "challenge_ended",
        "country": "Saudi arabia",
        "challenge_id": 425,
        "proof_id": null,
        "created_at": "1555408802",
        "updated_at": "1555408802",
        "challenge": {
            "id": 425,
            "company_id": null,
            "name": "cron5",
            "image": "https://tagit.appus.work/storage/challenges//UlsS8SxLXCdVTtbOggzuglqAwqeNgzzcjeZxSktb.jpg",
            "description": "ffew ef we fwef wf",
            "link": "https://google.com",
            "country": "Saudi arabia",
            "city": "Dubai",
            "participants_limit": 100,
            "proof_type": "photo",
            "start_date": "1555336800",
            "end_date": "1555347600",
            "created_at": "1555343443",
            "updated_at": "1555408803",
            "items_count_in_proof": 1,
            "video_duration": null,
            "status": "end"
        },
        "proof": null
    }
}

@apiSuccess {String} type Type of proof - available values ["challenge_started", "challenge_ended", "proof_sent"]

@apiErrorExample No such item:
{
    "success": false,
    "code": 16,
    "data": null
}
###



