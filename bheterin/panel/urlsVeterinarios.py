from django.conf.urls import url,include
from . import views
#from django.contrib.auth import views as auth_views

urlpatterns = [
       url(r'^add_veterinario$', views.add_veterinario, name="add_veterinario"),
       url(r'^panel_veterinario$', views.panel_veterinario, name="panel_veterinario"),
        url(r'^save_veterinario$', views.save_veterinario, name="save_veterinario"),

      ]
