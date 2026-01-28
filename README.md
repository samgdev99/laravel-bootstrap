# Laravel 12 + Bootstrap 5 (sin Tailwind)

Este proyecto usa **Laravel 12 + Vite + Bootstrap 5.3 + Sass** como stack frontend.

Laravel actualmente trae Tailwind por defecto mediante el plugin `@tailwindcss/vite`, pero en este proyecto **se eliminó completamente Tailwind** para trabajar Bootstrap correctamente usando su código fuente Sass y el pipeline moderno de Vite.

---

## Stack frontend

- Bootstrap 5.3 instalado por NPM
- Sass como preprocesador
- Vite como bundler
- Axios configurado para peticiones AJAX con Laravel

---

## Estructura clave

```
resources/
├── js/
│   ├── app.js
│   └── bootstrap.js (configuración Axios, no es Bootstrap visual)
└── scss/
    └── app.scss (aquí se importa Bootstrap)
```

---

## Instalación

```bash
composer install
npm install
composer run dev
```

---

## Cómo está integrado Bootstrap

### `resources/scss/app.scss`

```scss
@import "bootstrap/scss/bootstrap";
```

Aquí se importa el código fuente Sass de Bootstrap, lo que permite personalizar variables antes de compilar.

### `resources/js/app.js`

```js
import './bootstrap'; // Configura Axios y headers AJAX para Laravel

import 'bootstrap'; 
// Carga todo el JS de Bootstrap para usar data-bs-* desde el HTML (modals, dropdowns, etc.)
// Si algún día necesitas controlar componentes desde JS:
// import * as bootstrap from 'bootstrap';

import '../scss/app.scss'; // Compila Bootstrap (Sass) + tus estilos
```

---

## ¿Por qué NO usamos los archivos compilados de Bootstrap?

No se usa `bootstrap.min.css` ni `bootstrap.bundle.min.js` descargados manualmente porque eso impide:

- Personalizar variables de Bootstrap
- Integrarlo correctamente con Vite
- Mantener una arquitectura moderna y escalable

Bootstrap aquí se usa como framework fuente, no como archivo estático.

---

## Eliminación de Tailwind

Se eliminaron estas dependencias:

```bash
npm uninstall @tailwindcss/vite tailwindcss
```

Y se limpió `vite.config.js` para que no procese Tailwind.

---

## Advertencias de Sass (silenciadas intencionalmente)

Bootstrap 5.3 usa funciones Sass que fueron deprecadas por versiones modernas de Sass. Esto genera cientos de warnings al compilar.

En lugar de bajar la versión de Sass, se silencian correctamente en `vite.config.js`:

```js
css: {
    preprocessorOptions: {
        scss: {
            silenceDeprecations: [
                'import',
                'mixed-decls',
                'color-functions',
                'global-builtin',
            ],
        },
    },
},
```

---

## Personalizar Bootstrap

Puedes sobrescribir variables antes del import:

```scss
$primary: #123456;
$border-radius: 12px;

@import "bootstrap/scss/bootstrap";
```

---

## Notas importantes

- `resources/js/bootstrap.js` no es Bootstrap, es configuración de Axios para Laravel.
- No existe Tailwind en este proyecto.
- No existen archivos CSS estáticos en `public/`.
- Todo pasa por Vite.

---

## Comandos útiles

```bash
npm run dev      # entorno local
npm run build    # producción
```

---

## Filosofía del proyecto

Este proyecto usa Bootstrap de forma moderna y correcta dentro del ecosistema Laravel actual, evitando prácticas legacy como:

- Incluir CSS/JS compilados manualmente
- Sobrescribir Bootstrap con `!important`
- Mezclar múltiples frameworks CSS
