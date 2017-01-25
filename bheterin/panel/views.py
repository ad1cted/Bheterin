from django.shortcuts import render
from django.http import HttpResponse,HttpResponseRedirect
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
    cursor = connection.cursor()
    cursor.execute("SELECT * FROM panel_mascota")
    Datos_mascotas = cursor.fetchall()
    return render(request, 'Mascotas/panel_mascota.html', {'lista_mascotas': Datos_mascotas})

def save_mascota(request):
    id_m = request.GET.get('ID_mascota', '')
    nombre = request.GET.get('Nombre_mascota', '')
    edad = request.GET.get('Edad_mascota', '')
    peso = request.GET.get('Peso_mascota', '') + ",0"
    rut_dueño = request.GET.get('rut_dueño_mascota', '')
    cursor = connection.cursor()
    cursor.execute("INSERT INTO panel_mascota (nombre,edad,peso,rutdueño_id) VALUES (%s,%s,%s,%s)", [nombre,edad,peso,rut_dueño])
    cursor.close()
    return render(request, 'Mascotas/add_mascota.html', {})



#views Veterinarios
def add_veterinario(request):
    template = loader.get_template("Veterinarios/add_veterinario.html")
    return HttpResponse(template.render(request))

def panel_veterinario(request):
    cursor = connection.cursor()
    cursor.execute("SELECT * FROM panel_veterinario")
    Datos_veterinarios = cursor.fetchall()
    return render(request, 'Veterinarios/panel_veterinario.html', {'lista_veterinarios': Datos_veterinarios})


def save_veterinario(request):
    rut_veterinario = request.GET.get('rut_veterinario', '')
    nombre_veterinario = request.GET.get('nombre_veterinario', '')
    direccion_veterinario = request.GET.get('direccion_veterinario', '')
    correo_veterinario = request.GET.get("correo_veterinario","")
    tel_veterinario = request.GET.get("tel_veterinario","")
    cursor = connection.cursor()
    cursor.execute("SELECT * FROM panel_veterinario")
    holi = cursor.fetchall()
    cursor.execute("INSERT INTO panel_veterinario (rutveterinario,nombre,direccion,correo,telefono) VALUES (%s,%s,%s,%s,%s)", [rut_veterinario,nombre_veterinario,direccion_veterinario,correo_veterinario,tel_veterinario])
    cursor.close()
    return render(request, 'Veterinarios/add_veterinario.html', {})
