#Proyecto de Votación - README

Este proyecto es diseñado para lagestion de un sistema de votación, utilizando WampServer como servidor web local y MySQL como sistema de gestión de bases de datos. las instrucciones detalladas sobre cómo configurar y ejecutar el proyecto son las siguientes.

#Requisitos
    php 8.2.13
    mysql 8.2.0
    WampServer instalado: Asegúrate de tener WampServer instalado en tu sistema. Puedes descargarlo aquí.

#Configuración del Proyecto

    1.Clonar el proyecto:
        Clona este repositorio en la siguiente ruta: C:\wamp64\www.

    2.Importar la base de datos:
        Abre phpMyAdmin desde WampServer.
        Crea una nueva base de datos llamada votacion.
        Importa el esquema de la base de datos utilizando el archivo votacion.sql que se encuentra en la carpeta sql del proyecto. Esto generará las tablas necesarias.

#Configuración de la Base de Datos

El proyecto utiliza una base de datos llamada votacion con varias tablas. A continuación, se proporciona una descripción de las principales tablas:

    Tabla candidato: Almacena información sobre los candidatos.
    Tabla comunas: Contiene información sobre las comunas, relacionada con las provincias.
    Tabla provincias: Guarda datos de las provincias, relacionadas con las regiones.
    Tabla regiones: Almacena información sobre las regiones y sus capitales.
    Tabla votos: Registra los votos de los usuarios, incluyendo información sobre la región y comuna.

#Ejecución del Proyecto

    1.Iniciar WampServer:
        Abre WampServer y asegúrate de que los servicios de Apache y MySQL estén iniciados.

    2.Acceder al Proyecto:
        Abre un navegador web y accede al proyecto. Por ejemplo, http://localhost/nombre-del-proyecto.

    3.Prueba del Proyecto:
        Completa el formulario de votación para asegurarte de que la conexión a la base de datos y el sistema de votación funcionen correctamente.

#Notas Adicionales

    Configuración de la Conexión a la Base de Datos:
        La configuración de conexión a la base de datos se encuentra en el archivo PHP submitVotacion.php. Asegúrate de que los detalles de conexión coincidan con tu configuración de MySQL.

    Posibles Problemas:
        Si encuentras problemas, verifica la consola del navegador y los registros de errores de PHP para obtener más información.