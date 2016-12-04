from django.contrib import admin
from .models import mascota
from .models import veterinario
from .models import dueño

#acceso a modificar via crud admin
admin.site.register(mascota)
admin.site.register(veterinario)
admin.site.register(dueño)
