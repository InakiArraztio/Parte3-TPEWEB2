#Llamados con GET:

http://localhost/web2/TPE3/Parte3-TPEWEB2/api/platos //  lista (GET) una colección entera de entidades// no olvidar validar el token porque no va andar. solo esta en getAll para que no sea incomodo de usar
http://localhost/web2/TPE3/Parte3-TPEWEB2/api/platos?orderBy=nombre // ordena por nombre de manera ascendente. metodo (GET)
http://localhost/web2/TPE3/Parte3-TPEWEB2/api/platos?orderBy=precio // ordena por precio. metodo (GET)
http://localhost/web2/TPE3/Parte3-TPEWEB2/api/platos?orderBy=nombre&order=descendente//ordena por nombre de manera descendente. metodo (GET), funciona para otros parametros de ordenamiento
http://localhost/web2/TPE3/Parte3-TPEWEB2/api/platos?orderBy=nombre&order=descendente//ordena por nombre de manera ascendente. metodo (GET)
http://localhost/web2/TPE3/Parte3-TPEWEB2/api/platos?filtrarCategoria=1 // filtra por id de la categoria .metodo (GET)
http://localhost/web2/TPE3/Parte3-TPEWEB2/api/platos/6 // filtra por id con metodo (GET)
http://localhost/web2/TPE3/Parte3-TPEWEB2/api/platos?pagina=2// pagina 5 items con metodo (GET)

#Llamado con DELETE:
borrar un plato:
    http://localhost/parte3-tpeweb2/api/platos/:id

#Llamado con PUT:
editar un plato:
    http://localhost/parte3-tpeweb2/api/platos/:id

#Llamado con POST
insertar un plato:
    http://localhost/parte3-tpeweb2/api/platos/


#validacion por token
http://localhost/parte3-tpeweb2/api/usuarios/token // usuario: web2admin@gmail.com contraseña: admin