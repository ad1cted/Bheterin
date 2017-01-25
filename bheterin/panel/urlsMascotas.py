from django.conf.urls import url,include
from . import views
#from django.contrib.auth import views as auth_views

urlpatterns = [
       url(r'^add_mascota$', views.add_mascota, name="add_mascota"),
       url(r'^panel_mascota$', views.panel_mascota, name="panel_mascota"),
      ]
