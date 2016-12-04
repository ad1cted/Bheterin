from django.db import models
import datetime

"""
hay que hacer herencia  con dueño y veterinario hacia ->>>>>> persona


por ahora esto funciona pero  no se ve muy LINDO

"""


#modelos

#modelo dueño
class Dueño(models.Model):
    rutdueño=models.IntegerField(primary_key=True)
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
    rutdueño=models.ForeignKey(Dueño,on_delete=models.CASCADE)



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
    rutdueño=models.ForeignKey(Dueño,on_delete=models.CASCADE)#fk rutdueño
    rutveterinario=models.ForeignKey(Veterinario,on_delete=models.CASCADE)#fk rutveterinario




