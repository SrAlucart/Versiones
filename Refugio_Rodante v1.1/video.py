from pytube import Youtube

#URL del video 
url = ""

# objeto de youtube
yt = Youtube(url)

# Obtener el título del video
print("titulo: ", yt.title)
print("descripcion: ", yt.descripcion)

# descargar el video 
stream = yt.stream.get_highest_resolution()
stream.download()

print("Video descargado con éxito!")