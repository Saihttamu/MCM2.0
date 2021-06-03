from .routes.users import *
from .routes.probes import *
from .routes.measures import *
from .routes.errors import *

if __name__ == "__main__":
    api.run(host="0.0.0.0")
