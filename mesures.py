import pymysql
from app import app
from db_config import mysql
from flask import jsonify, request
from werkzeug.security import generate_password_hash



@app.route("/releves", methods=["POST", "GET"])
def releve():

    if request.method == "POST":

        try:
            _json = request.json
            temperature = _json["temperature"]
            print(temperature)
            humidity = _json["humidity"]
            print(humidity)
            date = _json["date"]
            print(date)
            id_probe = _json["id_probe"]
            print(id_probe)
            id_measure = _json["id_measure"]

            print(id_measure)

            # validate the received values
            conn = mysql.connect()
            cursor = conn.cursor()

            if temperature and humidity and date and id_probe and id_measure:

                # save edits
                sql = "INSERT INTO measure(temperature, humidity, date, id_probe, id_measure) VALUES(%s, %s, %s)"
                data = (temperature, humidity, date, id_probe, id_measure)

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

            cursor.execute("SELECT * FROM measure")

            rows = cursor.fetchall()

            resp = jsonify(rows)

            resp.status_code = 200

            cursor.close()

            conn.close()

            return resp

        except Exception as e:

            print(e)


@app.errorhandler(404)
def not_found():
    message = {
        "status": 404,
        "message": "Not Found maggle : " + request.url
    }
    resp = jsonify(message)
    resp.status_code = 404
    return resp

if __name__ == "__main__":
    app.run()