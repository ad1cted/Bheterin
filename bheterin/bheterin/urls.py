from django.conf.urls import url,include
from django.contrib import admin

#from django.contrib.auth import views as auth_views

urlpatterns = [
    url(r'^jet/', include('jet.urls', 'jet')),  # Django JET URLS
    url(r'^jet/dashboard/', include('jet.dashboard.urls', 'jet-dashboard')),
    url(r'^admin/', admin.site.urls),
    url(r'^cosa/', include("panel.urls")),
    #url(r'^accounts/login/$', auth_views.login,
    #{'template_name': 'django_sb_admin/examples/login.html'}),

]
