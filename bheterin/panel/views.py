from django.shortcuts import render
from django.http import HttpResponse
from django.template import loader

# Create your views here.

# Funcion que renderea el login
def login(request):
    template = loader.get_template("login.html")
    return HttpResponse(template.render(request))

#funcion temporal para el index
def index(request):
    template = loader.get_template("index.html")
    return HttpResponse(template.render(request))
