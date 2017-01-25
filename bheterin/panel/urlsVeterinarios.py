from django.conf.urls import url,include
from . import views
#from django.contrib.auth import views as auth_views

urlpatterns = [
       url(r'^add_veterinario$', views.add_mascota, name="add_veterinario"),
       url(r'^panel_veterinario$', views.panel_mascota, name="panel_veterinario"),
      ]
