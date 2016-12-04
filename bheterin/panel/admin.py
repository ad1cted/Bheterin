from django.contrib import admin
from .models import Mascota,Dueño,Veterinario




#registramos los modelos en el sitio de administracion
admin.site.register(Veterinario)
admin.site.register(Dueño)
admin.site.register(Mascota)
