from django.db import models


"""
hay que hacer herencia  con dueño y veterinario hacia ->>>>>> persona
esto funcioanra pero no se ve muy LINDO

"""


#modelos

#modelo dueño
class dueño(models.Model):
    rutdueño=models.IntegerField(primary_key=True)
    nombre=models.CharField(max_length=50)
    direccion=models.CharField(max_length=50)
    correo=models.CharField(max_length=50)
    telefono=models.CharField(max_length=50)


#modelo mascota
class mascota(models.Model):
    idmascota= models.AutoField(primary_key=True) # Llave primaria y auto incremental
    nombre=models.CharField(max_length=50) #nombre de la mascota como maximo 50 caracteres
    edad=models.IntegerField() # edad de tipo int
    peso=models.FloatField() #peso flotante
    # FALTA EL DUEÑO AQUI FK!!!!!!!


#modelo veterinario
class veterinario(models.Model):
    rutveterinario=models.IntegerField(primary_key=True)
    nombre=models.CharField(max_length=50)
    direccion=models.CharField(max_length=50)
    correo=models.CharField(max_length=50)
    telefono=models.CharField(max_length=50)
