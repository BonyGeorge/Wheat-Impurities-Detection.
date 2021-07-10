import torch
import torch.nn as nn
import tensorflow as tf
import cv2
import matplotlib.pyplot as plt
import numpy as np
import torchvision.models as models
from PIL import Image
from tensorflow.keras.layers import *
from torchvision import transforms


class ResidualBlock(nn.Module):
    def __init__(self, in_channels, out_channels, stride=1, kernel_size=3, padding=1, bias=False):
        super(ResidualBlock, self).__init__()
        self.cnn1 = nn.Sequential(
            nn.Conv2d(in_channels, out_channels, kernel_size,
                      stride, padding, bias=False),
            nn.BatchNorm2d(out_channels),
            nn.ReLU(True)
        )
        self.cnn2 = nn.Sequential(
            nn.Conv2d(out_channels, out_channels,
                      kernel_size, 1, padding, bias=False),
            nn.BatchNorm2d(out_channels)
        )
        if stride != 1 or in_channels != out_channels:
            self.shortcut = nn.Sequential(
                nn.Conv2d(in_channels, out_channels, kernel_size=1,
                          stride=stride, bias=False),
                nn.BatchNorm2d(out_channels)
            )
        else:
            self.shortcut = nn.Sequential()

    def forward(self, x):
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
            nn.ReLU(True),
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
            ResidualBlock(256, 256, 2)
        )
        self.block5 = nn.Sequential(
            ResidualBlock(256, 512),
            ResidualBlock(512, 512, 2)
        )

        self.avgpool = nn.AvgPool2d(2)
        self.fc1 = nn.Linear(512, 11)
        self.fc2 = nn.Linear(512, 168)
        self.fc3 = nn.Linear(512, 7)

    def forward(self, x):
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

        return x1, x2, x3

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
        model.load_state_dict(torch.load(
            r'G:\D\Wheat-Impurities-Detection\Python\Resnet 34\test.pth', map_location=torch.device('cpu')))

        image = self.prepo()
        pred = model.eval(image)
        return pred


model = models.resnet34()
model.load_state_dict(torch.load(r'G:\D\Wheat-Impurities-Detection\Wheat-Impurities-Detection\Python\ResNet 34\best_resnet34.pth',
                                 map_location=torch.device('cpu')), strict=False)


transform = transforms.Compose([
    transforms.Resize(224),
    transforms.ToTensor(),
    transforms.Normalize((0.5, 0.5, 0.5), (0.5, 0.5, 0.5))])  # Same as for your validation data, e.g. Resize, ToTensor, Normalize, ...

'''
img = cv2.imread(r"D:\test1.jpg")  # Load image as PIL.Image
'''
'''
cv2.imshow("Title", img)
cv2.waitKey(0)
'''
'''
img = cv2.cvtColor(img, cv2.COLOR_BGR2RGB)
im_pil = Image.fromarray(img)

'''
img = Image.open(r"D:\test1.jpg")


input = transform(img)  # Preprocess image
input = torch.unsqueeze(input, 0)  # Add batch dimension


model.eval()

print(model)
classes = ('Healthy Wheat', 'Leaf Rust', 'Stem Rust', 'Wild Oat')

output = model(input)  # Forward pass
#print("Output :", output.data)

'''
with open(r'G:\D\Wheat-Impurities-Detection\Wheat-Impurities-Detection\Python\ResNet 34\classes.txt') as f:
    labels = [line.strip() for line in f.readlines()]

print(labels)
_, index = torch.max(output, 1)
print(index[0])
percentage = torch.nn.functional.softmax(output, dim=1)[0] * 100
print(labels[index[0]], percentage[index[0]].item())

_, indices = torch.sort(output, descending=True)
print([(labels[idx], percentage[idx].item()) for idx in indices[0][:4]])

'''

predicted_class = int(torch.max(output.data, 1)[1].numpy())
print(output.data)
# predicted_class = np.argmax(prediction)

if (predicted_class == 0):
    print('Class Healthy Wheat.')
elif (predicted_class == 1):
    print('Class Leaf Rust.')
elif (predicted_class == 2):
    print('Class Stem Rust.')
elif (predicted_class == 3):
    print('Class Wild Oat.')
else:
    print('Error in classification.', predicted_class)
