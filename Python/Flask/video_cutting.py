import os
import cv2
import threading
from flask import Flask, request, jsonify
from flask_restful import Resource, Api
from flask import Flask


app = Flask(__name__)
api = Api(app)
PATH = "G:\\Wheat_Impurities_System\\storage\\app\\public\\uploads"


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
        success, image = vidcap.read()
        count = 0
        folder = video_name
        folder = folder.split('.')[0]
        folder = os.path.join(PATH, folder)
        folder = os.mkdir(folder)
        path = os.path.join(PATH, folder)
        print("Directory '%s' created" % path)

        while success:
            cv2.imwrite(path + "/frame%d.jpg" %
                        count, image)   # save frame as JPEG file
            success, image = vidcap.read()
            print("Success")
            count += 1


api.add_resource(
    VideoCutting, '/VideoCutting/<string:video_name>/<string:userid>')

if __name__ == '__main__':
    app.run(debug=True, host='192.168.0.101', port=8001)
