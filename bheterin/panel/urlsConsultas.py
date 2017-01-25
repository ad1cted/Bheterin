from django.conf.urls import url,include
from . import views
#from django.contrib.auth import views as auth_views

urlpatterns = [
       url(r'^pedir_hora$', views.pedir_hora, name="pedir_hora"),
       url(r'^cancelar_hora$', views.cancelar_hora, name="cancelar_hora"),
       url(r'^historial$', views.historial, name="historial"),
]
