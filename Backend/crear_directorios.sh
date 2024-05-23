#!/bin/bash

# Crear directorios
mkdir -p backend/config
mkdir -p backend/includes
mkdir -p backend/api/v1/mantenedor
mkdir -p backend/api/v1/about_us
mkdir -p backend/api/v2/mantenedor
mkdir -p backend/api/v2/about_us

# Crear archivos
touch backend/config/config.php
touch backend/includes/db.php
touch backend/includes/funciones.php
touch backend/index.php

# Crear archivos para cada método HTTP en los módulos de la API
touch backend/api/v1/mantenedor/index.php
touch backend/api/v1/mantenedor/get.php
touch backend/api/v1/mantenedor/post.php
touch backend/api/v1/mantenedor/put.php
touch backend/api/v1/mantenedor/patch.php
touch backend/api/v1/mantenedor/delete.php

touch backend/api/v1/about_us/index.php
touch backend/api/v1/about_us/get.php
touch backend/api/v1/about_us/post.php
touch backend/api/v1/about_us/put.php
touch backend/api/v1/about_us/patch.php
touch backend/api/v1/about_us/delete.php

touch backend/api/v2/mantenedor/index.php
touch backend/api/v2/mantenedor/get.php
touch backend/api/v2/mantenedor/post.php
touch backend/api/v2/mantenedor/put.php
touch backend/api/v2/mantenedor/patch.php
touch backend/api/v2/mantenedor/delete.php

touch backend/api/v2/about_us/index.php
touch backend/api/v2/about_us/get.php
touch backend/api/v2/about_us/post.php
touch backend/api/v2/about_us/put.php
touch backend/api/v2/about_us/patch.php
touch backend/api/v2/about_us/delete.php

# Establecer permisos de ejecución si es necesario
# chmod +x crear_directorios.sh

echo "Estructura de directorios creada exitosamente."

