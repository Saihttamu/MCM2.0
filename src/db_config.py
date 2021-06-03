from app import api
from flaskext.mysql import MySQL

mysql = MySQL()

# MySQL configurations
api.config['MYSQL_DATABASE_DB'] = 'api_meteo'
api.config['MYSQL_DATABASE_USER'] = 'root'
api.config['MYSQL_DATABASE_HOST'] = 'localhost'
api.config['MYSQL_DATABASE_PASSWORD'] = ''
mysql.init_app(api)
