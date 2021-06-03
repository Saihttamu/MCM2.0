import pymysql
from flask import jsonify, request

from ..app import api
from ..db_config import mysql
from errors import *


@api.route("/measures", methods=["POST", "GET"])
def releve():
    if request.method == "POST":

        print("Received POST request")
        try:
            print("Getting request info..")
            _json = request.json

            temperature = _json["temperature"]
            print("temperature : ", temperature)
            humidity = _json["humidity"]
            date = _json["date"]
            print("date : ", date)
            id_probe = _json["id_probe"]
            id_measure = _json["id_measure"]

            # validate the received values
            conn = mysql.connect()
            cursor = conn.cursor()

            if temperature and humidity and date and id_probe and id_measure:

                sql = "INSERT INTO measures(temperature, humidity, date, id_probe) VALUES(%s, %s, %s, %s)"
                data = (temperature, humidity, date, id_probe)

                # save edits
                cursor.execute(sql, data)
                conn.commit()

                resp = jsonify("User updated with success !")
                resp.status_code = 200

                cursor.close()
                conn.close()

                return resp

            else:
                cursor.close()
                conn.close()
                return bad_request()

        except Exception as e:
            print("Error encountered : ", e)

    if request.method == "GET":
        try:
            print("Connection à la base de données...")
            conn = mysql.connect()
            cursor = conn.cursor(pymysql.cursors.DictCursor)
            print("Connection réussie")

            cursor.execute("SELECT * FROM measures")

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