from app import app
from flaskext.mysql import MySQL

mysql = MySQL()

# MySQL configurations
app.config['MYSQL_DATABASE_USER'] = 'usertest'
app.config['MYSQL_DATABASE_PASSWORD'] = 'mcm'
app.config['MYSQL_DATABASE_DB'] = 'api'
app.config['MYSQL_DATABASE_HOST'] = 'localhost'
mysql.init_app(app)