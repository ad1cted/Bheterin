from django.db import models

#modelos

#modelo mascota
class mascota(models.Model):
    idmascota= models.AutoField(primary_key=True) # Llave primaria y auto incremental
    nombre=models.CharField(max_length=50) #nombre de la mascota como maximo 50 caracteres
    edad=models.IntegerField() # edad de tipo int
    peso=models.FloatField() #peso flotante


    ### FALTA EL DUEÑO AQUI FK!!!!!!!


