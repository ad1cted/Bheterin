from django.shortcuts import render
from django.http import HttpResponse,HttpResponseRedirect
from django.shortcuts import render_to_response
from django.template import loader
from django.db import connection

# Create your views here.

#funcion temporal para el index
def index(request):
    template = loader.get_template("index.html")
    return HttpResponse(template.render(request))


#views para consultas
def pedir_hora(request):
    template = loader.get_template("Consultas/hora.html")
    return HttpResponse(template.render(request))

def historial(request):
    template = loader.get_template("Consultas/historial.html")
    return HttpResponse(template.render(request))

def cancelar_hora(request):
    template = loader.get_template("Consultas/cancelar_hora.html")
    return HttpResponse(template.render(request))


#views Mascotas
def add_mascota(request):
    template = loader.get_template("Mascotas/add_mascota.html")
    return HttpResponse(template.render(request))

def panel_mascota(request):
    template = loader.get_template("Mascotas/panel_mascota.html")
    return HttpResponse(template.render(request))



#views Veterinarios
def add_veterinario(request):
    template = loader.get_template("Veterinarios/add_veterinario.html")
    return HttpResponse(template.render(request))

def panel_veterinario(request):
    template = loader.get_template("Veterinarios/panel_veterinario.html")
    return HttpResponse(template.render(request))

def save_veterinario(request):
    username = request.GET.get('periodo_minimo_mandato', '')
    email = request.GET.get('periodo_minimo_mandato', '')
    password = request.GET.get('periodo_minimo_mandato', '')
    cursor = connection.cursor()
    cursor.execute("SELECT * FROM panel_veterinario")
    holi = cursor.fetchall()
    #cursor.execute("INSERT INTO panel_veterinario (rutveterinario,nombre,direccion,correo,telefono) VALUES (%s,%s,%s,%s,%s)", [18407377,username,username,username,username])
    file = open('myfile.dat', 'w+')
    file.write(str(holi))



    return HttpResponseRedirect("/veterinarios/add_veterinario")
