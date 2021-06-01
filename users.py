import pymysql
from app import app
from db_config import mysql
from flask import jsonify, request
from werkzeug.security import generate_password_hash


@app.route("/users", methods=["POST", "GET"])
def users():
    if request.method == "POST":
        try:
            assert (request.is_json, "Wrong request: is not json")
            _json = request.json
            print("Request : ", _json)
            _username = _json["username"]
            print(_username)
            _password = _json["password"]
            print(_password)
            _email = _json["email"]
            print(_email)
            # validate the received values
            print("Connexion à la base de donées...")
            conn = mysql.connect()
            cursor = conn.cursor()
            print("Connection réussie")
            if _username and _password and _email:
                _hashed_password = generate_password_hash(_password)
                # save edits
                sql = "INSERT INTO users(username, email, password) VALUES(%s, %s, %s)"
                data = (_username, _email, _hashed_password)
                cursor.execute(sql, data)
                conn.commit()
                resp = jsonify("User added with success!")
                resp.status_code = 200
                cursor.close()
                conn.close()
                return resp
            else:
                return not_found()
        except Exception as e:
            print("ça merde quelquepart : ", e)


    if request.method == "GET":
        try:
            print("Connection à la base de données...")
            conn = mysql.connect()
            cursor = conn.cursor(pymysql.cursors.DictCursor)
            print("Connection réussie")
            cursor.execute("SELECT * FROM users")
            rows = cursor.fetchall()
            resp = jsonify(rows)
            resp.status_code = 200
            cursor.close()
            conn.close()
            return resp
        except Exception as e:
            print(e)


@app.route("/users/details", methods=["GET", "PUT", "DELETE"])
def user_details():
    if request.method == "GET":
        try:
            # on récupères les paramètres rentrés
            _json = request.json
            _id = _json["id_user"]
            _username = _json["username"]
            print("Connection à la base de données...")
            conn = mysql.connect()
            cursor = conn.cursor(pymysql.cursors.DictCursor)
            print("Connection réussie")

            if _id or _username:
                if _id:
                    sql = "SELECT id_user, username, email FROM users WHERE id_user = %s"
                    cursor.execute(sql, _id)
                else:
                    sql = "SELECT id_user, username, email FROM users WHERE username = %s"
                    cursor.execute(sql, _username)
                row = cursor.fetchone()
                resp = jsonify(row)
                resp.status_code = 200
                cursor.close()
                conn.close()
                return resp
            else:
                cursor.close()
                conn.close()
                return not_found()

        except Exception as e:
            print(e)

    elif request.method == "PUT":
        try:
            # on récupère les paramètres
            _json = request.json
            _id = _json["id_user"]
            _username = _json["username"]
            _email = _json["email"]
            _password = _json["password"]

            print("Connection à la base de données...")
            conn = pymysql.connect()
            cursor = conn.cursor()
            print("Connection réussie")

            # on verifie que l'on a l'id et une valeur à changer
            if _id and (_username or _email or _password):
                sql = "UPDATE users SET "
                string_params = ["username=", "email=", "password="]
                i = 0
                for param in [_username, _email, _password]:
                    if param:
                        sql += (string_params[i] + str(param) + ", ")
                    i += 1
                sql = sql[:len(sql)-2] # On enlève le dernier ", "
                sql += " WHERE id_user=" + str(_id)
                cursor.execute(sql)
                conn.commit()
                resp = jsonify("User updated with success !")
                resp.status_code = 200
                cursor.close()
                conn.close()
                return resp
            else:
                cursor.close()
                conn.close()
                return not_found()
        except Exception as e:
            print(e)

    elif request.method == "DELETE":
        try:
            _json = request.json
            _id = _json["id_user"]
            _username = _json["username"]
            conn = mysql.connect()
            cursor = conn.cursor()
            if _id or _username:
                if _id:
                    data = _id
                else:
                    data = _username
                cursor.execute("DELETE FROM users WHERE id_user=%s", data)
                conn.commit()
                resp = jsonify("User deleted with success !")
                resp.status_code = 200
                cursor.close()
                conn.close()
                return resp
            else:
                cursor.close()
                conn.close()
                return not_found()
        except Exception as e:
            print(e)



@app.route("/users/details/sonde", methods=["POST", "GET"])
def users_sondes():
    if request.method == "POST":
        try:
            _json = request.json
            _location = _json["location"]
            _id_user = _json["id_user"]

            print("Connection à la base de données...")
            conn = mysql.connect()
            cursor = conn.cursor()
            print("Connection réussie")

            if _location and _id_user:
                sql = "INSERT INTO probes(location, id_user) VALUES (%s, %S)"
                data = (_location, _id_user)
                cursor.execute(sql, data)
                conn.commit()
                resp = jsonify("Probe added with success !")
                resp.status_code = 200
                cursor.close()
                conn.close()
                return resp
            else:
                cursor.close()
                conn.close()
                return not_found()
        except Exception as e:
            print(e)

    elif request.method == "GET":
        try:
            _json = request.json
            _id = _json["id_user"]
            _username = _json["username"]
            if _id or _username:
                print("Connection à la base de données...")
                conn = mysql.connect()
                cursor = conn.cursor(pymysql.cursors.DictCursor)
                print("Connection réussie")

                if _id:
                    sql = "SELECT * FROM probes WHERE id_user=%s"
                    cursor.execute(sql, _id)
                else:
                    sql = "SELECT id_probe, location, probes.id_user " \
                          "FROM probes LEFT JOIN users ON users.id_user = probes.id_user  " \
                          "WHERE probes.id_user = %s"
                    cursor.execute(sql, _username)
                row = cursor.fetchall()
                resp = jsonify(row)
                resp.status_code = 200
                cursor.close()
                conn.close()
                return resp
            else:
                return not_found()

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
