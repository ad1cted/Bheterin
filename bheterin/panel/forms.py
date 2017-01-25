from django import forms

class VeterinarioForm(forms.Form):
    rutveterinario=forms.IntegerField(label='Business Name')
    nombre=forms.CharField(label='Business Name',max_length=50)
    direccion=forms.CharField(label='Business Name',max_length=50)
    correo=forms.EmailField(label='Business Name')
    telefono=forms.CharField(label='Business Name',max_length=50)
