# -*- coding: utf-8 -*-
from django.db import models
import datetime

"""
hay que hacer herencia  con dueno y veterinario hacia ->>>>>> persona


por ahora esto funciona pero  no se ve muy LINDO

"""


#modelos

#modelo dueno
class Dueno(models.Model):
    rutdueno=models.IntegerField(primary_key=True)
    nombre=models.CharField(max_length=50)
    direccion=models.CharField(max_length=50)
    correo=models.EmailField(blank=True)
    telefono=models.CharField(max_length=50)



#modelo mascota
class Mascota(models.Model):
    idmascota= models.AutoField(primary_key=True) # Llave primaria y auto incremental
    nombre=models.CharField(max_length=50) #nombre de la mascota como maximo 50 caracteres
    edad=models.IntegerField() # edad de tipo int
    peso=models.FloatField() #peso flotante
    rutdueno=models.ForeignKey(Dueno,on_delete=models.CASCADE)



#modelo veterinario
class Veterinario(models.Model):
    rutveterinario=models.IntegerField(primary_key=True)
    nombre=models.CharField(max_length=50)
    direccion=models.CharField(max_length=50)
    correo=models.EmailField(blank=True)
    telefono=models.CharField(max_length=50)


class Diagnostico(models.Model):
    iddiagnostico=models.IntegerField(primary_key=True) #PK
    descripcion=models.CharField(max_length=500)
    fecha=models.DateTimeField(default=datetime.datetime.today() , blank=True)
    idmascota=models.ForeignKey(Mascota,on_delete=models.CASCADE)#fk idmascota
    rutdueno=models.ForeignKey(Dueno,on_delete=models.CASCADE)#fk rutdueno
    rutveterinario=models.ForeignKey(Veterinario,on_delete=models.CASCADE)#fk rutveterinario
