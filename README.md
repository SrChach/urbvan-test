# Urvban

Esta es la evaluacion tecnica para Urvban. Lo gestionare todo en un monorepo con ambos servicios, frontend y backend.

Ambas serán carpetas dentro de este proyecto

## Instrucciones de uso

Se requiere tener NodeJS instalado, asi como PHP y Composer. La dockerizacion de la App está pendiente.

Para el Backend:

- Ir a la carpeta "Backend"
- Ejecutar "Composer install"
- Ejecutar `php artisan migrate`
- Correr con `php -S localhost:<PORT> -t public`

Para el Frontend:

- Ir a la carpeta "Frontend"
- Ejecutar `npm install`
- En el archivo 'frontend/src/requests/custom-axios.js' cambiar la `baseURL`, apuntando a donde tenemos corriendo la API (por ejemplo, http://localhost:8000/v1)
- correr con `npm run dev`

## Pasos seguidos

### backend

1. Crear el backend con Lumen. Usé el siguiente comando

``` bash
composer create-project --prefer-dist laravel/lumen backend
```

### frontend

1. Crear el frontend con Vue. Usé el siguiente comando

``` bash
npm init vue@latest
```

### To do

Pending finishing the docs
