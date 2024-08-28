<h2 align="center">593 TRISCORE</h2>

<p align="center"><img src="https://github.com/KevinZambran/LigaPro-Ec-administrator-table-and-meetings/blob/main/public/imgReadme/Home.png" width="400"></p>

Es una página web para realizar un control de forma manual sobre los resultados del compeonato Ecuatoriano de Futbol, contiene tabla
de posiciones y encuentros tanto jugados como próximos. Realizada con [Laravel 9](https://laravel.com).

### Pre-requisitos 📋

* Visual Code - Editor de codigo recomendable
* Xampp - Interprete de php (opcional)
* Postgres - Base de datos

## Instalación

Como base de datos se utilizo PostgresSQL version 15
<p align="center"><a href="https://www.enterprisedb.com/downloads/postgres-postgresql-downloads" target="_blank"><img src="https://www.postgresql.org/media/img/about/press/elephant.png" width="100"></a></p>

Crear una base de datos con nombre _tri593_ y verificar el puerto con el que trabará _PostgreSql_.<br>
Archivo a editar **.env**. Como se muestra a continuación:

```
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=
DB_USERNAME=postgres
DB_PASSWORD=
```

Coloca los datos cambiando el **puerto**, el **username** y **password**, si es necesario. _Nota:_ La contraseña o password debe ser con el que inicia sesion en su postgres, en caso de estar vacia dejarla sin llenar.

Luego Editar el siguiente archivo: _MailSendC.php_ en el metodo alertEmail, donde tendra que colocar los datos de su cuenta configurada con sus datos en [Mailrelay](https://mailrelay.com/es/).<br>
Colocar el url que encuentra en su dashboard.<br>
Como se ve acontinuación:

```
https://tunombre_asignado.ipzmarketing.com/
```
Esa url se debe colocar dentro del metodo ya mencionado. Remplazado asi:

```
CURLOPT_URL => "https://tunombre_asignado.ipzmarketing.com/api/v1/send_emails",
```

Y deberas colocar el email que se registro para el envio en el campo nombrado como _email_registrado_.

```
CURLOPT_POSTFIELDS => "{\"from\":{\"email\":\"email_registrado\",\"name\":\"593 TRISCORES\"},...
```

Recordar si quiere entrar en modo administrador registrar sus credenciales en la base de datos directamente colocando el tipo de usuario como admin.

## Vistas

Presenta información de la LigaPro de Ecuador y contenido del cual se referencia.
<p align="center"><img src="https://github.com/KevinZambran/LigaPro-Ec-administrator-table-and-meetings/blob/main/public/imgReadme/Home.png" width="700"></p>

Cada serie contiene información como participantes, tabla de posiciones y encuentros de la etapa actual.
<p align="center"><img src="https://github.com/KevinZambran/LigaPro-Ec-administrator-table-and-meetings/blob/main/public/imgReadme/SerieA.png" width="700"></p>
<p align="center"><img src="https://github.com/KevinZambran/LigaPro-Ec-administrator-table-and-meetings/blob/main/public/imgReadme/SerieB.png" width="700"></p>

**Dentro del panel de administración tenemos**
Una interfaz muy amigable, donde podemos controlar los datos que presentamos en la página.<br>
Se puede realizar el crud de  manera muy facil y se puede dar un rol a un usuario normal para que tambien administre.
<p align="center"><img src="https://github.com/KevinZambran/LigaPro-Ec-administrator-table-and-meetings/blob/main/public/imgReadme/Admin.png" width="700"></p>
<p align="center"><img src="https://github.com/KevinZambran/LigaPro-Ec-administrator-table-and-meetings/blob/main/public/imgReadme/Crud.png" width="700"></p>


## Construido con 🛠️

_Proyecto realizado con Laravel 9_

* [Laravel 9](https://laravel.com) - El framework web usado
* [Mailrelay](https://mailrelay.com/es/) - Controlador de envio de mensajes email

## Autores ✒️

_Proyecto Final Universitario_

* **Oscar Nieves** - *Base de Datos*
* **Mayker Cabrera** - *Documentación**
* **Sanchez Leonardo** - *Front-end*
* **Kevin Zambrano** - *Back-end*
