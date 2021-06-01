from app import app
from flask import Flask
from flaskext.mysql import MySQL

# Initialisation de l'application:
app = Flask(__name__)


#
mysql = MySQL()

# MySQL configurations
app.config['MYSQL_DATABASE_DB'] = 'api'
app.config['MYSQL_DATABASE_USER'] = 'root'
app.config['MYSQL_DATABASE_HOST'] = 'localhost'
app.config['MYSQL_DATABASE_PASSWORD'] = ''
mysql.init_app(app)