from app import api
from flask import jsonify, request


@api.errorhandler(404)
def not_found():
    message = {
        "status": 404,
        "message": "Not Found : " + request.url
    }
    resp = jsonify(message)
    resp.status_code = 404
    return resp

@api.errorhandler(400)
def bad_request():
    message = {
        "status": 400,
        "message": "Bad Request prout: " + request
    }
    resp = jsonify(message)
    resp.status_code = 400
    return resp
