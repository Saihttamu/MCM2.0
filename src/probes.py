import pymysql
from flask import jsonify, request

from app import api
from db_config import mysql
from errors import *


@api.route("/probes", methods=["POST", "GET"])
def sonde():
    if request.method == "POST":
        try:
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


@api.route("/probes/details", methods=["POST", "GET"])
def sonde_details():
    if request.method == "POST":
        try:
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


if __name__ == "__main__":
    api.run()