from django.contrib import admin
from .models import Mascota,Dueno,Veterinario,Diagnostico




#registramos los modelos en el sitio de administracion
admin.site.register(Veterinario)
admin.site.register(Dueno)
admin.site.register(Mascota)
admin.site.register(Diagnostico)
