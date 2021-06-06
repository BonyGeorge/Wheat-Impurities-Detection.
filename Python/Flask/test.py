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
    def get(self, video_name):
        thread = threading.Thread(target=self.cut, kwargs={
                                  'video_name': video_name})
        thread.start()
        return jsonify({
            "status": "200"
        })

    def cut(self, video_name):
        vidcap = cv2.VideoCapture(os.path.join(PATH, video_name))
        success, image = vidcap.read()
        count = 0
        foldername = str(video_name)
        while success:
            cv2.imwrite(PATH + "\\frame%d.jpg" %
                        count, image)     # save frame as JPEG file
            success, image = vidcap.read()
            print("Succes")
            count += 1


api.add_resource(
    VideoCutting, '/VideoCutting/<string:video_name>')

if __name__ == '__main__':
    app.run(debug=True, host='YOUR_IP', port=8001)
