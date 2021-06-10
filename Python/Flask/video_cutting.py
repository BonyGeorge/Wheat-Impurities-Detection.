import os
import cv2
import threading
import mysql.connector

from flask import Flask, request, jsonify
from flask_restful import Resource, Api
from flask import Flask

app = Flask(__name__)
api = Api(app)

mydb = mysql.connector.connect(
        host="localhost",
        user="root",
        password="",
        database="wheat_system"
    )
mycursor = mydb.cursor()
PATH = "G:/D/Wheat-Impurities-Detection/storage/app/public/uploads"
SAVE_PATH = "/storage/app/public/uploads"

class VideoCutting (Resource):
    def get(self, video_name, userid):
        thread = threading.Thread(target=self.cut, kwargs={
                                  'video_name': video_name, 'userid': userid})
        thread.start()
        return jsonify({
            "status": "200"
        })

    def cut(self, video_name, userid):
        vidcap = cv2.VideoCapture(os.path.join(PATH, video_name))
        vidcap.set(cv2.CV_CAP_PROP_POS_FRAMES, frame_number-1)
        success, image = vidcap.read()
        count = 0
        userid = int(userid)

        while success:
            cv2.imwrite(PATH + "/frame%d.jpg" %
                        count, image)   # save frame as JPEG file

            pth = SAVE_PATH + "/frame%d.jpg" % count
            mycursor.execute("""INSERT INTO frames (user_id, path) 
                                VALUES (%d, '%s');""" % (userid, pth))
            
            print("Success entering frame: %d" %count + " At path: " + pth)                    
            success, image = vidcap.read()
            count += 1

        mydb.commit()
        

api.add_resource(
    VideoCutting, '/VideoCutting/<string:video_name>/<string:userid>')

if __name__ == '__main__':
    app.run(debug=True, host='0.0.0.0', port=8001)
