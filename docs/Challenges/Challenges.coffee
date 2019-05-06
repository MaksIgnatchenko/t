###
@api {get} /api/challenge Get all challenges
@apiName Get all challenges
@apiGroup Challenge
@apiPermission User
@apiVersion 0.1.0

@apiParam {Integer} [limit] Max 20. Default 15
@apiParam {Integer} [page] Default 1
@apiParam {String} [search] Max 50 symbols

@apiSuccessExample Success-Response:
{
    "success": true,
    "code": 0,
    "data": {
        "current_page": 1,
        "first_page_url": "https://tagit.appus.work/api/challenge?page=1",
        "from": 1,
        "last_page": 14,
        "last_page_url": "https://tagit.appus.work/api/challenge?page=14",
        "next_page_url": "https://tagit.appus.work/api/challenge?page=2",
        "path": "https://tagit.appus.work/api/challenge",
        "per_page": 15,
        "prev_page_url": null,
        "to": 15,
        "total": 201
        "data": [
            {
                "id": 2,
                "company_id": null,
                "name": "Challenge1",
                "image": "https://tagit.appus.work/storage/challenges/tgpL0hq0JmTovwdGQQHLzRf7VA16WsRE5qEmDYRL.jpeg",
                "description": "test",
                "link": "https://google.com",
                "country": "Saudi arabia",
                "city": null,
                "participants_limit": 100,
                "proof_type": "photo",
                "start_date": "1551398400",
                "end_date": "1552003200",
                "created_at": "1551344002",
                "updated_at": "1551344002",
                "items_count_in_proof": 1,
                "video_duration": null,
                "status": "active",
                "my_proof": {
                    "id": 8,
                    "challenge_id": 411,
                    "user_id": 24,
                    "type": "video",
                    "items": [
                        "http://localhost/storage/proofs/4AiW1xM5QPJekmfK0iQ6gNL4pG1J66eRwMQiVDFJ.mp4"
                    ],
                    "status": "pending",
                    "created_at": "1554741936",
                    "updated_at": "1554741936"
                },
                "participants_count": 0,
                "is_participated": false,
                "participation_cost": 10,
                "participants": []
            },
            {
                "id": 203,
                "company_id": null,
                "name": "repudiandae",
                "image": "https://tagit.appus.work/storage/challenges/dYEZ0ZaBd7n34CkxtrQTeBotXVbYO20D8ujT7CYn.jpeg",
                "description": "Non id repellendus.",
                "link": "http://keeling.info/sed-voluptatem-dolorem-rerum-illum-laborum-cupiditate-nemo",
                "country": "Saudi arabia",
                "city": "fakeCity",
                "participants_limit": 100,
                "proof_type": "photo",
                "start_date": "1551351762",
                "end_date": "1552734162",
                "created_at": "1551351835",
                "updated_at": "1551351835",
                "items_count_in_proof": 1,
                "video_duration": null,
                "status": "active",
                "my_proof": {
                    "id": 8,
                    "challenge_id": 411,
                    "user_id": 24,
                    "type": "video",
                    "items": [
                        "http://localhost/storage/proofs/4AiW1xM5QPJekmfK0iQ6gNL4pG1J66eRwMQiVDFJ.mp4"
                    ],
                    "status": "pending",
                    "created_at": "1554741936",
                    "updated_at": "1554741936"
                },
                "participants_count": 0,
                "is_participated": false,
                "participation_cost": 10,
                "participants": []
            },
            {
                "id": 204,
                "company_id": null,
                "name": "laboriosam",
                "image": "https://tagit.appus.work/storage/challenges/qYalr6C81mHIqQvOKHyps0NR7sSpwBRfCrYeBfkH.jpeg",
                "description": "Labore sit quia aut libero voluptatibus.",
                "link": "http://www.konopelski.com/accusantium-aut-reprehenderit-provident-qui-officia",
                "country": "United Arab Emirates",
                "city": "fakeCity",
                "participants_limit": 100,
                "proof_type": "photo",
                "start_date": "1551351762",
                "end_date": "1552820562",
                "created_at": "1551351835",
                "updated_at": "1551351835",
                "items_count_in_proof": 1,
                "video_duration": null,
                "status": "active",
                "my_proof": {
                    "id": 8,
                    "challenge_id": 411,
                    "user_id": 24,
                    "type": "video",
                    "items": [
                        "http://localhost/storage/proofs/4AiW1xM5QPJekmfK0iQ6gNL4pG1J66eRwMQiVDFJ.mp4"
                    ],
                    "status": "pending",
                    "created_at": "1554741936",
                    "updated_at": "1554741936"
                },
                "participants_count": 0,
                "is_participated": false,
                "participation_cost": 10,
                "participants": []
            },
            {
                "id": 205,
                "company_id": null,
                "name": "ex",
                "image": "https://tagit.appus.work/storage/challenges/2x6AIgOWNrXMjY177bkY1AhOW1FMbPvSERxzMqys.jpeg",
                "description": "Perspiciatis voluptates.",
                "link": "http://www.cremin.com/",
                "country": "Saudi arabia",
                "city": "fakeCity",
                "participants_limit": 100,
                "proof_type": "photo",
                "start_date": "1551351762",
                "end_date": "1552993362",
                "created_at": "1551351835",
                "updated_at": "1551351835",
                "items_count_in_proof": 1,
                "video_duration": null,
                "status": "active",
                "my_proof": {
                    "id": 8,
                    "challenge_id": 411,
                    "user_id": 24,
                    "type": "video",
                    "items": [
                        "http://localhost/storage/proofs/4AiW1xM5QPJekmfK0iQ6gNL4pG1J66eRwMQiVDFJ.mp4"
                    ],
                    "status": "pending",
                    "created_at": "1554741936",
                    "updated_at": "1554741936"
                },
                "participants_count": 0,
                "is_participated": false,
                "participation_cost": 10,
                "participants": []
            },
            {
                "id": 206,
                "company_id": null,
                "name": "incidunt",
                "image": "https://tagit.appus.work/storage/challenges/VBjx4Qmadb4rEEa8FR6sHMwcu3ah6wS9YnJRq2pe.jpeg",
                "description": "Est labore eum magnam.",
                "link": "http://www.bartell.biz/enim-sed-assumenda-officiis-omnis",
                "country": "Saudi arabia",
                "city": "fakeCity",
                "participants_limit": 100,
                "proof_type": "photo",
                "start_date": "1551351763",
                "end_date": "1552734163",
                "created_at": "1551351835",
                "updated_at": "1551351835",
                "items_count_in_proof": 1,
                "video_duration": null,
                "status": "active",
                "my_proof": {
                    "id": 8,
                    "challenge_id": 411,
                    "user_id": 24,
                    "type": "video",
                    "items": [
                        "http://localhost/storage/proofs/4AiW1xM5QPJekmfK0iQ6gNL4pG1J66eRwMQiVDFJ.mp4"
                    ],
                    "status": "pending",
                    "created_at": "1554741936",
                    "updated_at": "1554741936"
                },
                "participants_count": 0,
                "is_participated": false,
                "participation_cost": 10,
                "participants": []
            },
            {
                "id": 207,
                "company_id": null,
                "name": "eos",
                "image": "https://tagit.appus.work/storage/challenges/twM8JjkCjqhE73Qn2jXrjzsOcsg3YTlOfnm64G8r.jpeg",
                "description": "Eveniet perferendis optio amet impedit sunt.",
                "link": "http://www.kautzer.net/sed-et-cumque-beatae-reprehenderit",
                "country": "United Arab Emirates",
                "city": "fakeCity",
                "participants_limit": 100,
                "proof_type": "photo",
                "start_date": "1551351763",
                "end_date": "1552993363",
                "created_at": "1551351835",
                "updated_at": "1551351835",
                "items_count_in_proof": 1,
                "video_duration": null,
                "status": "active",
                "my_proof": {
                    "id": 8,
                    "challenge_id": 411,
                    "user_id": 24,
                    "type": "video",
                    "items": [
                        "http://localhost/storage/proofs/4AiW1xM5QPJekmfK0iQ6gNL4pG1J66eRwMQiVDFJ.mp4"
                    ],
                    "status": "pending",
                    "created_at": "1554741936",
                    "updated_at": "1554741936"
                },
                "participants_count": 0,
                "is_participated": false,
                "participation_cost": 10,
                "participants": []
            },
            {
                "id": 208,
                "company_id": null,
                "name": "reiciendis",
                "image": "https://tagit.appus.work/storage/challenges/MnPCbatOVa5nbIkIYFijBWqvouGe4WpV2qW38FVk.jpeg",
                "description": "Laborum tempore eveniet fugiat beatae.",
                "link": "http://auer.com/id-ullam-ut-eum-consequatur",
                "country": "United Arab Emirates",
                "city": "fakeCity",
                "participants_limit": 100,
                "proof_type": "photo",
                "start_date": "1551351764",
                "end_date": "1552906964",
                "created_at": "1551351835",
                "updated_at": "1551351835",
                "items_count_in_proof": 1,
                "video_duration": null,
                "status": "active",
                "my_proof": {
                    "id": 8,
                    "challenge_id": 411,
                    "user_id": 24,
                    "type": "video",
                    "items": [
                        "http://localhost/storage/proofs/4AiW1xM5QPJekmfK0iQ6gNL4pG1J66eRwMQiVDFJ.mp4"
                    ],
                    "status": "pending",
                    "created_at": "1554741936",
                    "updated_at": "1554741936"
                },
                "participants_count": 0,
                "is_participated": false,
                "participation_cost": 10,
                "participants": []
            },
            {
                "id": 209,
                "company_id": null,
                "name": "fugiat",
                "image": "https://tagit.appus.work/storage/challenges/Xxe0oo0VHy7ywrEZVIksw0fIpVx4aCHpeTkiwBLN.jpeg",
                "description": "Ut dolores aut.",
                "link": "http://blick.info/occaecati-quae-architecto-mollitia-quasi-tenetur",
                "country": "Saudi arabia",
                "city": "fakeCity",
                "participants_limit": 100,
                "proof_type": "photo",
                "start_date": "1551351764",
                "end_date": "1553770964",
                "created_at": "1551351835",
                "updated_at": "1551351835",
                "items_count_in_proof": 1,
                "video_duration": null,
                "status": "active",
                "my_proof": {
                    "id": 8,
                    "challenge_id": 411,
                    "user_id": 24,
                    "type": "video",
                    "items": [
                        "http://localhost/storage/proofs/4AiW1xM5QPJekmfK0iQ6gNL4pG1J66eRwMQiVDFJ.mp4"
                    ],
                    "status": "pending",
                    "created_at": "1554741936",
                    "updated_at": "1554741936"
                },
                "participants_count": 0,
                "is_participated": false,
                "participation_cost": 10,
                "participants": []
            },
            {
                "id": 210,
                "company_id": null,
                "name": "deserunt",
                "image": "https://tagit.appus.work/storage/challenges/gjzHSHy36M9rwS7r806gvFGxYxnNdkyz2G0zSEHS.jpeg",
                "description": "Tenetur.",
                "link": "https://www.schowalter.com/beatae-et-aperiam-non-cumque-ullam",
                "country": "United Arab Emirates",
                "city": "fakeCity",
                "participants_limit": 100,
                "proof_type": "photo",
                "start_date": "1551351765",
                "end_date": "1553770965",
                "created_at": "1551351835",
                "updated_at": "1551351835",
                "items_count_in_proof": 1,
                "video_duration": null,
                "status": "active",
                "my_proof": {
                    "id": 8,
                    "challenge_id": 411,
                    "user_id": 24,
                    "type": "video",
                    "items": [
                        "http://localhost/storage/proofs/4AiW1xM5QPJekmfK0iQ6gNL4pG1J66eRwMQiVDFJ.mp4"
                    ],
                    "status": "pending",
                    "created_at": "1554741936",
                    "updated_at": "1554741936"
                },
                "participants_count": 0,
                "is_participated": false,
                "participation_cost": 10,
                "participants": []
            },
            {
                "id": 211,
                "company_id": null,
                "name": "non",
                "image": "https://tagit.appus.work/storage/challenges/qs75iPUaxwOrsrGfHOQdL1Z4fcyg0DEmCuLp5AL8.jpeg",
                "description": "Optio totam quis et.",
                "link": "http://jakubowski.info/",
                "country": "United Arab Emirates",
                "city": "fakeCity",
                "participants_limit": 100,
                "proof_type": "photo",
                "start_date": "1551351765",
                "end_date": "1552561365",
                "created_at": "1551351835",
                "updated_at": "1551351835",
                "items_count_in_proof": 1,
                "video_duration": null,
                "status": "active",
                "my_proof": {
                    "id": 8,
                    "challenge_id": 411,
                    "user_id": 24,
                    "type": "video",
                    "items": [
                        "http://localhost/storage/proofs/4AiW1xM5QPJekmfK0iQ6gNL4pG1J66eRwMQiVDFJ.mp4"
                    ],
                    "status": "pending",
                    "created_at": "1554741936",
                    "updated_at": "1554741936"
                },
                "participants_count": 0,
                "is_participated": false,
                "participation_cost": 10,
                "participants": []
            },
            {
                "id": 212,
                "company_id": null,
                "name": "cumque",
                "image": "https://tagit.appus.work/storage/challenges/6B3fl4LnfJA7lJgNNhtBFjZnzuKSxb1QYmRfM0Ne.jpeg",
                "description": "Qui.",
                "link": "http://christiansen.com/explicabo-et-dolor-magnam-officia.html",
                "country": "Saudi arabia",
                "city": "fakeCity",
                "participants_limit": 100,
                "proof_type": "photo",
                "start_date": "1551351766",
                "end_date": "1552215766",
                "created_at": "1551351835",
                "updated_at": "1551351835",
                "items_count_in_proof": 1,
                "video_duration": null,
                "status": "active",
                "my_proof": {
                    "id": 8,
                    "challenge_id": 411,
                    "user_id": 24,
                    "type": "video",
                    "items": [
                        "http://localhost/storage/proofs/4AiW1xM5QPJekmfK0iQ6gNL4pG1J66eRwMQiVDFJ.mp4"
                    ],
                    "status": "pending",
                    "created_at": "1554741936",
                    "updated_at": "1554741936"
                },
                "participants_count": 0,
                "is_participated": false,
                "participation_cost": 10,
                "participants": []
            },
            {
                "id": 213,
                "company_id": null,
                "name": "et",
                "image": "https://tagit.appus.work/storage/challenges/YNrw1nuHHGCqUnoBvo674Ztbrhkr3MBzzV4yJkdd.jpeg",
                "description": "Et esse.",
                "link": "http://cremin.biz/expedita-maiores-molestiae-molestias-voluptas-velit-vel-nesciunt",
                "country": "United Arab Emirates",
                "city": "fakeCity",
                "participants_limit": 100,
                "proof_type": "photo",
                "start_date": "1551351766",
                "end_date": "1552215766",
                "created_at": "1551351835",
                "updated_at": "1551351835",
                "items_count_in_proof": 1,
                "video_duration": null,
                "status": "active",
                "my_proof": {
                    "id": 8,
                    "challenge_id": 411,
                    "user_id": 24,
                    "type": "video",
                    "items": [
                        "http://localhost/storage/proofs/4AiW1xM5QPJekmfK0iQ6gNL4pG1J66eRwMQiVDFJ.mp4"
                    ],
                    "status": "pending",
                    "created_at": "1554741936",
                    "updated_at": "1554741936"
                },
                "participants_count": 0,
                "is_participated": false,
                "participation_cost": 10,
                "participants": []
            },
            {
                "id": 214,
                "company_id": null,
                "name": "error",
                "image": "https://tagit.appus.work/storage/challenges/9EqWYbkQEb5V40tQiUbKdlkRJRMyQxnUZNlLCvJ0.jpeg",
                "description": "Voluptatem asperiores.",
                "link": "https://haley.com/voluptatum-porro-numquam-et-tenetur-aut-enim-et-voluptates.html",
                "country": "United Arab Emirates",
                "city": "fakeCity",
                "participants_limit": 100,
                "proof_type": "photo",
                "start_date": "1551351766",
                "end_date": "1553684566",
                "created_at": "1551351835",
                "updated_at": "1551351835",
                "items_count_in_proof": 1,
                "video_duration": null,
                "status": "active",
                "my_proof": {
                    "id": 8,
                    "challenge_id": 411,
                    "user_id": 24,
                    "type": "video",
                    "items": [
                        "http://localhost/storage/proofs/4AiW1xM5QPJekmfK0iQ6gNL4pG1J66eRwMQiVDFJ.mp4"
                    ],
                    "status": "pending",
                    "created_at": "1554741936",
                    "updated_at": "1554741936"
                },
                "participants_count": 0,
                "is_participated": false,
                "participation_cost": 10,
                "participants": []
            },
            {
                "id": 215,
                "company_id": null,
                "name": "error",
                "image": "https://tagit.appus.work/storage/challenges/D1C0lG7jAZZo1FVTR3NNflOcyokfiKHnnPo1zPuc.jpeg",
                "description": "Voluptas ipsum in.",
                "link": "http://www.feest.com/possimus-ratione-dignissimos-natus-molestiae-quasi-aut.html",
                "country": "Saudi arabia",
                "city": "fakeCity",
                "participants_limit": 100,
                "proof_type": "photo",
                "start_date": "1551351767",
                "end_date": "1553598167",
                "created_at": "1551351835",
                "updated_at": "1551351835",
                "items_count_in_proof": 1,
                "video_duration": null,
                "status": "active",
                "my_proof": {
                    "id": 8,
                    "challenge_id": 411,
                    "user_id": 24,
                    "type": "video",
                    "items": [
                        "http://localhost/storage/proofs/4AiW1xM5QPJekmfK0iQ6gNL4pG1J66eRwMQiVDFJ.mp4"
                    ],
                    "status": "pending",
                    "created_at": "1554741936",
                    "updated_at": "1554741936"
                },
                "participants_count": 0,
                "is_participated": false,
                "participation_cost": 10,
                "participants": []
            },
            {
                "id": 216,
                "company_id": null,
                "name": "nulla",
                "image": "https://tagit.appus.work/storage/challenges/OF4tsadBzJkdrvnn68vETSDmBVZdnRLc3OrLF4DM.jpeg",
                "description": "Et omnis sapiente.",
                "link": "http://www.berge.org/ipsam-optio-ut-non-laborum-quibusdam",
                "country": "Saudi arabia",
                "city": "fakeCity",
                "participants_limit": 100,
                "proof_type": "photo",
                "start_date": "1551351767",
                "end_date": "1553598167",
                "created_at": "1551351835",
                "updated_at": "1551351835",
                "items_count_in_proof": 1,
                "video_duration": null,
                "status": "active",
                "my_proof": {
                    "id": 8,
                    "challenge_id": 411,
                    "user_id": 24,
                    "type": "video",
                    "items": [
                        "http://localhost/storage/proofs/4AiW1xM5QPJekmfK0iQ6gNL4pG1J66eRwMQiVDFJ.mp4"
                    ],
                    "status": "pending",
                    "created_at": "1554741936",
                    "updated_at": "1554741936"
                },
                "participants_count": 0,
                "is_participated": false,
                "participation_cost": 10,
                "participants": []
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

@apiSuccess {string} status Status of the challenge. Available values - waiting, active, end
@apiSuccess {object} my_proof consist field status that can be - pending, accepted, rejected


@apiSuccessExample Success-Response:
{
    "success": true,
    "code": 0,
    "data": {
        "id": 1,
        "company_id": null,
        "name": "Challenge1",
        "image": "https://tagit.appus.work/storage/challenges/y9SS0d4YRDnwKY2WsDfdj7e4FdxcIKOEcYwZthp2.jpeg",
        "description": "test challenge",
        "link": "https://google.com",
        "country": "Saudi arabia",
        "city": "Mecca",
        "participants_limit": 100,
        "proof_type": "photo",
        "items_count_in_proof": 1,
        "video_duration": null,
        "status": "active",
        "my_proof": {
            "id": 8,
            "challenge_id": 411,
            "user_id": 24,
            "type": "video",
            "items": [
                "https://tagit.appus.work/storage/proofs/4AiW1xM5QPJekmfK0iQ6gNL4pG1J66eRwMQiVDFJ.mp4"
            ],
            "status": "pending",
            "created_at": "1554741936",
            "updated_at": "1554741936"
        },
        "start_date": "1551225600",
        "end_date": "1551312000",
        "created_at": "1551197038",
        "updated_at": "1551197038",
        "participants_count": 2,
        "is_participated": true,
        "participation_cost": 10,
        "participants": [
          {
              "id": 4,
              "email": "foecunditate@gmail.com",
              "created_at": "1552302801",
              "updated_at": "1552314551",
              "phone_number": "0507337257",
              "country_code": "+38",
              "is_registration_completed": true,
              "avatar": "https://tagit.appus.work/storage/avatars/J18DD54mrjLKX71CioZmZEPdRRUdYJ5tNRtUtcfb.jpeg",
              "birthday": "604508113",
              "sex": "male",
              "country": "Saudi arabia",
              "city": "Mecca",
              "company": null,
              "full_name": "Test2",
              "coins": 100
          },
          {
              "id": 3,
              "email": "myfuns1989@gmail.com",
              "created_at": "1552301679",
              "updated_at": "1552488810",
              "phone_number": "0630383034",
              "country_code": "+38",
              "is_registration_completed": true,
              "avatar": "https://tagit.appus.work/storage/avatars/dvK9tRueOfxSoPNASZzl0I7qmgZIkGfCQqXi8QAC.jpeg",
              "birthday": "604508113",
              "sex": "male",
              "country": "Saudi arabia",
              "city": "Mecca",
              "company": null,
              "full_name": "Test",
              "coins": 480
          }
      ]
    }
}

@apiErrorExample No such item:
{
    "success": false,
    "code": 16,
    "data": null
}
###

###
@api {get} /api/challenge/:id/result Get challenge result
@apiName Get challenge result
@apiGroup Challenge
@apiPermission User
@apiVersion 0.1.0

@apiParam {Integer} [form] Show results from position Default 1
@apiParam {Integer} [limit] Min 1 Default 20

{
    "success": true,
    "code": 0,
    "data": {
        "my_result": {
            "position": 1,
            "reward": 100,
            "user": {
                "id": 24,
                "email": "myfuns1989@gmail.com",
                "created_at": "1554450631",
                "updated_at": "1557131766",
                "phone_number": "0507337257",
                "country_code": "+38",
                "is_registration_completed": true,
                "avatar": "https://tagit.appus.work/storage/avatars/lanYlud1GPsALPzOD4FLzNWrQ3fpSpdqnD35VjJh.jpeg",
                "birthday": "604508113",
                "sex": "male",
                "country": "United Arab Emirates",
                "city": "Dubai",
                "company": "Test",
                "full_name": "Test",
                "coins": 1270
            }
        },
        "results": [
            {
                "position": 1,
                "reward": 100,
                "user": {
                    "id": 24,
                    "email": "myfuns1989@gmail.com",
                    "created_at": "1554450631",
                    "updated_at": "1557131766",
                    "phone_number": "0507337257",
                    "country_code": "+38",
                    "is_registration_completed": true,
                    "avatar": "https://tagit.appus.work/storage/avatars/lanYlud1GPsALPzOD4FLzNWrQ3fpSpdqnD35VjJh.jpeg",
                    "birthday": "604508113",
                    "sex": "male",
                    "country": "United Arab Emirates",
                    "city": "Dubai",
                    "company": "Test",
                    "full_name": "Test",
                    "coins": 1270
                }
            },
            {
                "position": 2,
                "reward": 90,
                "user": {
                    "id": 25,
                    "email": "foecunditatef@gmail.com",
                    "created_at": "1556973564",
                    "updated_at": "1557129936",
                    "phone_number": "0630383034",
                    "country_code": "+38",
                    "is_registration_completed": true,
                    "avatar": "https://tagit.appus.work/storage/avatars/FBObPuufB4kziY1XhQGcbHI1DAkRbaugR8CtGVBZ.jpeg",
                    "birthday": "604508113",
                    "sex": "male",
                    "country": "United Arab Emirates",
                    "city": "Dubai",
                    "company": null,
                    "full_name": "Test2",
                    "coins": 180
                }
            }
        ]
    }
}

@apiErrorExample No such item:
{
    "success": false,
    "code": 16,
    "data": null
}
###



