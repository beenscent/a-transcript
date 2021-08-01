#!C:/Program Files/Python39/python.exe

import speech_recognition as sr
import os
import sys

# obtain path to the audio file in the same folder as this script
from os import path
AUDIO_FILE = path.join(path.dirname(path.realpath(__file__)), sys.argv[1])

# use the audio file as the audio source
r = sr.Recognizer()
with sr.AudioFile(AUDIO_FILE) as source:
    audio = r.record(source)  # read the entire audio file

# recognize speech using Microsoft Azure Speech
AZURE_SPEECH_KEY = "SPEECH_API_KEY_HERE"  # Microsoft Speech API keys 32-character lowercase hexadecimal strings
try:
    print("Audio says: " + r.recognize_azure(audio, key=AZURE_SPEECH_KEY))
except sr.UnknownValueError:
    print("Microsoft Azure Speech could not understand audio")
except sr.RequestError as e:
    print("Could not request results from Microsoft Azure Speech service; {0}".format(e))
