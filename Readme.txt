#Llamados con GET:

http://localhost/web2/TPE3/Parte3-TPEWEB2/api/platos //  lista (GET) una colección entera de entidades
http://localhost/web2/TPE3/Parte3-TPEWEB2/api/platos?orderBy=nombre // ordena por nombre de manera ascendente. metodo (GET)
http://localhost/web2/TPE3/Parte3-TPEWEB2/api/platos?orderBy=precio // ordena por precio. metodo (GET)
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