# FONDEXUS API Documentation

<aside>
    <strong>Base URL</strong>: <code>http://localhost</code>
</aside>

La API de FONDEXUS proporciona acceso programático al Sistema Integrado de Gestión Interna de FONDESCOL. Esta documentación le guía en el uso de los endpoints disponibles para interactuar con la plataforma.

<aside>As you scroll, you'll see code examples for working with API in different programming languages in the dark area to the right (or as part of content on mobile).
    You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>

## Características

- **Gestión de Usuarios**: Operaciones CRUD completas para la administración de usuarios
- **Autenticación**: Soporte para autenticación mediante tokens
- **Seguridad**: Implementación de middlewares de seguridad y validación

## Uso

Para usar la API, incluya el token de autenticación en el header `Authorization` con el formato `Bearer {token}`.

```bash
Authorization: Bearer your-token-here
```
