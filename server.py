import json
import os
import time
from flask import Flask, Response, request

app = Flask(__name__, static_url_path='', static_folder='./www')
app.add_url_rule('/', 'root', lambda: app.send_static_file('index.html'))


#@app.route('/create_user', methods=['POST'])
#def create_user():
    


if __name__ == '__main__':
    app.run(host="0.0.0.0", port=int(os.environ.get("PORT", 3000)), debug=True)
