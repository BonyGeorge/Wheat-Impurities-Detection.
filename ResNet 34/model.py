import torch
import torch.nn as nn
import tensorflow as tf
import cv2
import matplotlib.pyplot as plt
import numpy as np
from tensorflow.keras.layers import *

class ResidualBlock(nn.Module):
    def __init__(self, in_channels, out_channels, stride=1, kernel_size=3, padding=1, bias=False):
        super(ResidualBlock,self).__init__()
        self.cnn1 =nn.Sequential(
            nn.Conv2d(in_channels, out_channels, kernel_size, stride, padding, bias=False),
            nn.BatchNorm2d(out_channels),
            nn.ReLU(True)
        )
        self.cnn2 = nn.Sequential(
            nn.Conv2d(out_channels, out_channels, kernel_size, 1, padding, bias=False),
            nn.BatchNorm2d(out_channels)
        )
        if stride != 1 or in_channels != out_channels:
            self.shortcut = nn.Sequential(
                nn.Conv2d(in_channels, out_channels, kernel_size=1, stride=stride, bias=False),
                nn.BatchNorm2d(out_channels)
            )
        else:
            self.shortcut = nn.Sequential()
            
    def forward(self,x):
        residual = x
        x = self.cnn1(x)
        x = self.cnn2(x)
        x += self.shortcut(residual)
        x = nn.ReLU(True)(x)
        return x


class ResNet34(nn.Module):
    def __init__(self):
        super(ResNet34, self).__init__()
        
        self.block1 = nn.Sequential(
            nn.Conv2d(1, 64, kernel_size=2, stride=2, padding=3, bias=False),
            nn.BatchNorm2d(64),
            nn.ReLU(True)
        )
        
        self.block2 = nn.Sequential(
            nn.MaxPool2d(1, 1),
            ResidualBlock(64, 64),
            ResidualBlock(64, 64, 2)
        )
        
        self.block3 = nn.Sequential(
            ResidualBlock(64, 128),
            ResidualBlock(128, 128, 2)
        )
        
        self.block4 = nn.Sequential(
            ResidualBlock(128, 256),
            ResidualBlock(256, 256,2)
        )
        self.block5 = nn.Sequential(
            ResidualBlock(256, 512),
            ResidualBlock(512, 512, 2)
        )
        
        self.avgpool = nn.AvgPool2d(2)
        self.fc1 = nn.Linear(512, 11)
        self.fc2 = nn.Linear(512, 168)
        self.fc3 = nn.Linear(512, 7)
        
    def forward(self,x):
        x = self.block1(x)
        x = self.block2(x)
        x = self.block3(x)
        x = self.block4(x)
        x = self.block5(x)
        x = self.avgpool(x)
        x = x.view(x.size(0), -1)
        x1 = self.fc1(x)
        x2 = self.fc2(x)
        x3 = self.fc3(x)
        return x1,x2,x3

    def prepo(self):
        """
         Preprocessing Test Frames.
        """
        test_image = plt.imread(self.path)
        test_image = cv2.resize(test_image, (224, 224))

        images = []
        images.append(test_image)
        images = np.array(images)
        return images


    def predict(self, image):
        """
         Predicting on the Test Frames.
        """
        device = torch.device("cuda:0" if torch.cuda.is_available() else "cpu")
        model = ResNet34().to(device)   
        model.load_state_dict(torch.load(r'G:\D\Wheat-Impurities-Detection\Python\Resnet 34\resnet34_model.pth', map_location=torch.device('cpu')))

        image = self.prepo()
        pred = model.eval(image)
        return pred

model = ResNet34()
model.predict(r"C:\Users\hp\Downloads\test3.jpg")