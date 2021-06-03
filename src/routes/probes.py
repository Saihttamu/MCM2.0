import pymysql
from flask import jsonify, request

from ..app import api
from ..db_config import mysql


@api.route("/probes", methods=["POST", "GET"])
def sonde():
    if request.method == "POST":
        try:
            assert (request.is_json, "Wrong request: is not json")
            _json = request.json
            location = _json["location"]
            print(location)
            user_id = _json["user_id"]
            print(user_id)

            # Connection à la base de données
            conn = mysql.connect()
            cursor = conn.cursor()

            if location and user_id:

                # save edits
                sql = "INSERT INTO probes(id_user, location) VALUES(%s, %s)"
                data = (user_id, location)

                cursor.execute(sql, data)
                conn.commit()

                resp = jsonify("Measure added with success!")
                resp.status_code = 200

                cursor.close()
                conn.close()

                return resp
            else:
                cursor.close()
                conn.close()
                return not_found()

        except Exception as e:
            print("ça merde quelquepart : ", e)

    if request.method == "GET":
        try:
            print("Connection à la base de données...")
            conn = mysql.connect()
            cursor = conn.cursor(pymysql.cursors.DictCursor)
            print("Connection réussie")

            cursor.execute("SELECT * FROM probes")

            rows = cursor.fetchall()

            resp = jsonify(rows)
            resp.status_code = 200

            cursor.close()
            conn.close()

            return resp

        except Exception as e:
            print(e)


@api.route("/probes/sonde", methods=["POST", "GET"])
def sonde():
    if request.method == "POST":
        try:
            assert (request.is_json, "Wrong request: is not json")
            _json = request.json
            location = _json["location"]
            print(location)
            user_id = _json["user_id"]
            print(user_id)

            # Connection à la base de données
            conn = mysql.connect()
            cursor = conn.cursor()

            if location and user_id:

                # save edits
                sql = "INSERT INTO probes(id_user, location) VALUES(%s, %s)"
                data = (user_id, location)

                cursor.execute(sql, data)
                conn.commit()

                resp = jsonify("Measure added with success!")
                resp.status_code = 200

                cursor.close()
                conn.close()

                return resp
            else:
                cursor.close()
                conn.close()
                return not_found()

        except Exception as e:
            print("ça merde quelquepart : ", e)

    if request.method == "GET":
        try:
            print("Connection à la base de données...")
            conn = mysql.connect()
            cursor = conn.cursor(pymysql.cursors.DictCursor)
            print("Connection réussie")

            cursor.execute("SELECT * FROM probes")

            rows = cursor.fetchall()

            resp = jsonify(rows)
            resp.status_code = 200

            cursor.close()
            conn.close()

            return resp

        except Exception as e:
            print(e)


@api.errorhandler(404)
def not_found():
    message = {
        "status": 404,
        "message": "Not Found : " + request.url
    }
    resp = jsonify(message)
    resp.status_code = 404
    return resp


if __name__ == "__main__":
    api.run()