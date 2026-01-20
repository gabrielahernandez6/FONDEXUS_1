# 🏗️ FONDEXUS - WORKFLOW COMPLETO DE DESARROLLO
## SISTEMA DE GESTIÓN INTERNO FONDESCOL

---

## 📊 INFORMACIÓN GENERAL

**Duración Total**: 30 días laborales  
**Desarrolladores**: 
- **Nicolás** - Windsurf AI + Gemini CLI (Fullstack)
- **Gabriela** - TRAE AI IDE (Fullstack)

**Stack Tecnológico**:
- Backend: Laravel 12 + Sanctum
- Frontend: React 18 + TypeScript + Inertia.js
- Base de datos: Supabase PostgreSQL
- Estilos: Tailwind CSS + shadcn/ui
- Estado: Zustand + TanStack Query
- Testing: Pest PHP + Vitest

**Arquitectura**: Monolítica Modular

---

## 🎯 MÓDULOS DEL SISTEMA

1. **Jurídica** - Procesos jurídicos, publicaciones SECOP, leyes vigentes
2. **Financiera** - Pagos, cuentas de cobro, CDPs, RPSs, contratistas, municipios, calendario
3. **Planeación** - Reportes, visitas técnicas, programas, gráficos de avances
4. **Talento Humano** - Evaluaciones de desempeño, COPASST, comité de convivencia, bienestar social, noticias, matriz MIPG
5. **Control Interno** - Matrices de riesgo, manuales, políticas
6. **Gestión Documental** - Documentos generales, correspondencia, radicados
7. **Dashboard** - Resumen ejecutivo, cambios recientes, accesos rápidos

---

## 🔄 ESTRATEGIA DE GIT

### Branches Principales
- `main` - Producción (protegida)
- `develop` - Integración continua
- `nicolas-dev` - Branch personal de Nicolás
- `gabriela-dev` - Branch personal de Gabriela

### Feature Branches
- `feature/auth-dashboard`
- `feature/juridica-module`
- `feature/juridica-module-ui`
- `feature/financiera-module`
- `feature/financiera-module-ui`
- Y así sucesivamente por cada módulo

### Convenciones de Commits
```
feat(modulo): descripción corta
fix(modulo): descripción corta
docs(modulo): descripción corta
style(modulo): descripción corta
refactor(modulo): descripción corta
test(modulo): descripción corta
chore(modulo): descripción corta
```

### Workflow Git Diario
1. Crear feature branch desde `develop`
2. Trabajar en la feature asignada
3. Commits frecuentes y atómicos
4. Push a feature branch
5. Crear Pull Request a `develop`
6. Code Review del compañero
7. Merge después de aprobación
8. Eliminar feature branch después del merge

---

## 📋 RUTINA DIARIA (AMBOS DESARROLLADORES)

### Inicio del Día (15 minutos - Daily Sync)
1. Reunión breve entre Nicolás y Gabriela
2. ¿Qué hice ayer?
3. ¿Qué haré hoy?
4. ¿Tengo algún bloqueador?
5. Sincronizar con branch `develop` antes de empezar

### Durante el Día
1. Hacer pull de `develop` antes de crear feature branch nueva
2. Trabajar en feature asignada según el plan
3. Commits frecuentes con mensajes descriptivos
4. Comunicación constante por chat o llamada
5. Documentar decisiones técnicas importantes
6. Pedir ayuda al compañero si hay bloqueos

### Fin del Día (15 minutos)
1. Push de todos los cambios a feature branch
2. Crear Pull Request si la feature está completa
3. Revisar Pull Request del compañero si hay pendientes
4. Actualizar estado en tablero Kanban
5. Escribir resumen breve de lo logrado en chat del equipo

---

# 📅 FASE 1: SETUP INICIAL (DÍA 1-2)

## 👨‍💻 NICOLÁS - Backend Foundation

### DÍA 1 - Configuración Base (4-5 horas)

#### Mañana
1. Verificar que el proyecto Laravel + React está correctamente creado
2. Acceder a Supabase.com y crear nuevo proyecto
3. Obtener todas las credenciales de Supabase (URL, Keys, Database credentials)
4. Configurar archivo `.env` con todas las variables de Supabase
5. Instalar Laravel Sanctum mediante Composer
6. Publicar archivos de configuración de Sanctum
7. Configurar Sanctum para autenticación SPA en archivo de config
8. Ejecutar las migraciones iniciales en Supabase y verificar que funcionen

#### Tarde
1. Crear archivo de configuración personalizado para Supabase
2. Verificar conexión exitosa a base de datos Supabase
3. Probar que Laravel puede leer y escribir en Supabase
4. Documentar las credenciales en `.env.example` (sin valores reales)
5. Hacer primer commit con la configuración base

### DÍA 2 - Estructura y Git (4-5 horas)

#### Mañana
1. Crear toda la estructura de carpetas para Services
2. Crear toda la estructura de carpetas para Enums
3. Crear estructura de carpetas para Models organizados por módulo
4. Crear estructura de carpetas para Requests organizados por módulo
5. Crear estructura de carpetas para Resources de API
6. Crear estructura de carpetas para Controllers de API

#### Tarde
1. Inicializar repositorio Git en el proyecto
2. Crear branches principales: `main`, `develop`, `nicolas-dev`
3. Configurar archivo `.gitignore` correctamente
4. Hacer commit inicial con toda la estructura
5. Crear repositorio remoto en GitHub/GitLab
6. Configurar remote origin y hacer push inicial
7. Invitar a Gabriela como colaboradora del repositorio
8. Crear archivo README.md con instrucciones de setup
9. Documentar variables de entorno necesarias
10. Hacer push de todos los branches al remoto

#### Entregables Nicolás Fase 1
- Proyecto Laravel conectado a Supabase funcionando
- Laravel Sanctum instalado y configurado
- Estructura completa de carpetas backend
- Repositorio Git configurado con todos los branches
- README.md con instrucciones claras de instalación

---

## 👩‍💻 GABRIELA - Frontend Foundation

### DÍA 1 - Setup Inicial (4-5 horas)

#### Mañana
1. Aceptar invitación como colaboradora del repositorio
2. Clonar el repositorio completo a tu máquina local
3. Hacer checkout al branch `gabriela-dev`
4. Instalar todas las dependencias Node con `pnpm install`
5. Leer el README.md que preparó Nicolás
6. Configurar archivo `.env` local con las credenciales compartidas
7. Verificar que el proyecto React corre correctamente con `pnpm dev`

#### Tarde
1. Instalar Zustand para manejo de estado global
2. Instalar TanStack Query (React Query) para cache y data fetching
3. Instalar Axios para llamadas HTTP
4. Instalar React Router v6 para navegación
5. Instalar React Hook Form para manejo de formularios
6. Instalar Zod para validación de esquemas
7. Instalar TanStack Table para tablas de datos
8. Instalar Recharts para gráficos y visualizaciones
9. Verificar que todas las dependencias se instalaron sin conflictos

### DÍA 2 - Setup Frontend Avanzado (4-5 horas)

#### Mañana
1. Inicializar shadcn/ui en el proyecto con CLI
2. Instalar componentes base de shadcn/ui: button, input, table, dialog, dropdown-menu, card, tabs
3. Instalar FullCalendar React para el calendario de pagos
4. Instalar React Dropzone para carga de archivos
5. Instalar React Hot Toast para notificaciones
6. Instalar Lucide React para iconos
7. Instalar date-fns para manejo de fechas
8. Verificar que todas las librerías funcionan correctamente

#### Tarde
1. Crear estructura completa de carpetas para Pages
2. Crear estructura completa de carpetas para Components (ui, layout, shared, modules)
3. Crear estructura de carpetas para Hooks personalizados
4. Crear estructura de carpetas para Stores de Zustand
5. Crear estructura de carpetas para Services API
6. Crear estructura de carpetas para Types de TypeScript
7. Crear estructura de carpetas para Utils y helpers
8. Configurar TypeScript con `tsconfig.json` estricto
9. Configurar Vite para path aliases
10. Hacer commit de toda la estructura frontend
11. Push al branch `gabriela-dev`

#### Entregables Gabriela Fase 1
- Proyecto frontend con todas las dependencias instaladas
- shadcn/ui configurado y componentes base añadidos
- Estructura completa de carpetas frontend
- TypeScript configurado correctamente
- Proyecto corriendo sin errores

---

# 📅 FASE 2: AUTENTICACIÓN Y DASHBOARD (DÍA 3-5)

## 👨‍💻 NICOLÁS - Backend Autenticación

### DÍA 3 - Modelos y Migraciones (4-5 horas)

#### Mañana
1. Crear branch `feature/auth-dashboard` desde `develop`
2. Crear migración para tabla `roles` con campos necesarios
3. Crear migración para tabla `areas` con campos necesarios
4. Modificar migración de `users` para agregar campos: role_id, area_id
5. Ejecutar migraciones en Supabase
6. Verificar que las tablas se crearon correctamente en Supabase

#### Tarde
1. Crear modelo `Role` con relaciones y casts
2. Crear modelo `Area` con relaciones y casts
3. Modificar modelo `User` para agregar relaciones con Role y Area
4. Crear Seeder para Roles (Admin, Coordinador, Usuario)
5. Crear Seeder para Areas (Jurídica, Financiera, Planeación, etc.)
6. Crear Seeder para Users de prueba
7. Ejecutar seeders y verificar datos en Supabase
8. Hacer commit: "feat(auth): add roles, areas and users models"

### DÍA 4 - API de Autenticación (4-5 horas)

#### Mañana
1. Crear AuthController en carpeta Api
2. Implementar método `login` con validación y generación de token Sanctum
3. Implementar método `logout` para invalidar token
4. Implementar método `me` para obtener usuario autenticado
5. Crear FormRequest para validación de login
6. Probar endpoints con Postman/Insomnia

#### Tarde
1. Configurar rutas API en `routes/api.php` para auth
2. Crear middleware personalizado si es necesario
3. Crear UserResource para transformar datos del usuario en JSON
4. Probar flujo completo de autenticación
5. Verificar que los tokens funcionan correctamente
6. Documentar endpoints de autenticación
7. Hacer commit: "feat(auth): add authentication endpoints"

### DÍA 5 - Dashboard Backend (4-5 horas)

#### Mañana
1. Crear DashboardController en carpeta Api
2. Implementar método `summary` que retorna resumen de todos los módulos
3. Implementar método `recentChanges` que retorna cambios recientes del sistema
4. Implementar método `stats` con estadísticas generales

#### Tarde
1. Crear DashboardService para lógica de negocio del dashboard
2. Implementar queries eficientes para obtener resúmenes (evitar N+1)
3. Crear Resources para formatear respuestas del dashboard
4. Configurar rutas API para dashboard
5. Probar todos los endpoints con datos de prueba
6. Hacer tests básicos con Pest para los endpoints
7. Hacer commit: "feat(dashboard): add dashboard API endpoints"
8. Crear Pull Request de `feature/auth-dashboard` hacia `develop`

---

## 👩‍💻 GABRIELA - Frontend Autenticación

### DÍA 3 - Store y Servicios (4-5 horas)

#### Mañana
1. Crear branch `feature/auth-dashboard-ui` desde `develop`
2. Crear archivo de configuración de Axios en `services/api.ts`
3. Configurar interceptores de Axios para manejo de tokens
4. Configurar base URL y headers por defecto
5. Crear store de autenticación con Zustand en `stores/authStore.ts`
6. Implementar estados: user, token, isAuthenticated, isLoading
7. Implementar acciones: login, logout, checkAuth, setUser

#### Tarde
1. Crear servicio `authApi.ts` con funciones: login, logout, getCurrentUser
2. Crear custom hook `useAuth.ts` que conecte el store con los componentes
3. Crear types de TypeScript para User, LoginCredentials, AuthResponse
4. Probar integración entre store, service y API de Nicolás
5. Hacer commit: "feat(auth): add auth store and services"

### DÍA 4 - Páginas de Autenticación (4-5 horas)

#### Mañana
1. Crear página `Pages/Auth/Login.tsx`
2. Implementar formulario de login con React Hook Form
3. Agregar validación con Zod para email y password
4. Conectar formulario con authStore y llamadas API
5. Agregar manejo de errores y mensajes de feedback
6. Estilizar con Tailwind y componentes shadcn/ui

#### Tarde
1. Crear componente de loading/spinner reutilizable
2. Implementar redirección después de login exitoso
3. Crear página de registro si aplica (opcional)
4. Crear página de recuperación de contraseña (opcional)
5. Probar flujo completo de login con backend
6. Hacer commit: "feat(auth): add login page and form"

### DÍA 5 - Layout y Dashboard UI (5-6 horas)

#### Mañana
1. Crear componente `Layout.tsx` con estructura principal
2. Crear componente `Sidebar.tsx` con menú de navegación
3. Crear componente `Navbar.tsx` con header y usuario
4. Implementar navegación entre módulos
5. Agregar botón de logout funcional
6. Estilizar layout responsivo con Tailwind

#### Tarde
1. Crear página `Pages/Dashboard/Index.tsx`
2. Crear componente `SummaryCard.tsx` para mostrar resúmenes
3. Crear componente `RecentChanges.tsx` para cambios recientes
4. Conectar dashboard con API de Nicolás usando React Query
5. Implementar loading states y error handling
6. Agregar gráficos básicos si hay tiempo
7. Hacer commit: "feat(dashboard): add dashboard UI with summary"
8. Crear Pull Request de `feature/auth-dashboard-ui` hacia `develop`

#### Code Review Mutuo
- Nicolás revisa PR de Gabriela
- Gabriela revisa PR de Nicolás
- Hacer ajustes según feedback
- Aprobar y hacer merge ambos PR a `develop`

---

# 📅 FASE 3: MÓDULO JURÍDICA (DÍA 6-8)

## 👨‍💻 NICOLÁS - Backend Jurídica

### DÍA 6 - Modelos y Migraciones (4-5 horas)

#### Mañana
1. Sincronizar con `develop` y crear branch `feature/juridica-module`
2. Crear migración para tabla `procesos_juridicos` con todos los campos
3. Crear migración para tabla `publicaciones_secop`
4. Crear migración para tabla `leyes_vigentes`
5. Ejecutar migraciones en Supabase
6. Verificar estructura de tablas

#### Tarde
1. Crear modelo `ProcesoJuridico` en carpeta `Models/Juridica/`
2. Crear modelo `PublicacionSecop` en carpeta `Models/Juridica/`
3. Crear modelo `LeyVigente` en carpeta `Models/Juridica/`
4. Definir fillable, casts, y relaciones en cada modelo
5. Crear Seeder con datos de prueba para el módulo
6. Ejecutar seeders
7. Hacer commit: "feat(juridica): add juridica models and migrations"

### DÍA 7 - Controllers y Requests (5-6 horas)

#### Mañana
1. Crear JuridicaController con métodos CRUD para procesos
2. Crear PublicacionSecopController con métodos CRUD
3. Crear LeyVigenteController con métodos CRUD
4. Implementar paginación en método index de cada controller

#### Tarde
1. Crear FormRequests para Store y Update de ProcesoJuridico
2. Crear FormRequests para Store y Update de PublicacionSecop
3. Crear FormRequests para Store y Update de LeyVigente
4. Implementar validaciones completas en cada Request
5. Crear Resources para cada modelo
6. Configurar rutas API en `routes/api.php`
7. Hacer commit: "feat(juridica): add controllers and validation"

### DÍA 8 - Services y File Upload (5-6 horas)

#### Mañana
1. Crear JuridicaService con lógica de negocio
2. Implementar método para crear proceso con transacciones
3. Implementar método para listar procesos con filtros y búsqueda
4. Implementar método para actualizar proceso
5. Implementar método para eliminar proceso

#### Tarde
1. Crear FileStorageService para manejo de archivos PDF
2. Implementar upload de documentos a storage de Laravel
3. Implementar download de documentos
4. Implementar eliminación de archivos al borrar registros
5. Integrar FileStorageService en JuridicaService
6. Probar todos los endpoints con Postman
7. Crear tests básicos con Pest
8. Hacer commit: "feat(juridica): add service layer and file handling"
9. Crear Pull Request hacia `develop`

---

## 👩‍💻 GABRIELA - Frontend Jurídica

### DÍA 6 - Servicios y Types (4-5 horas)

#### Mañana
1. Sincronizar con `develop` y crear branch `feature/juridica-module-ui`
2. Crear interfaces TypeScript en `types/juridica.ts`
3. Definir interfaces: ProcesoJuridico, PublicacionSecop, LeyVigente
4. Crear servicio `juridicaApi.ts` con todas las funciones CRUD
5. Configurar funciones para procesos, publicaciones y leyes

#### Tarde
1. Crear custom hooks con React Query: `useProcesosJuridicos`
2. Crear custom hooks: `usePublicacionesSecop`
3. Crear custom hooks: `useLeyesVigentes`
4. Implementar queries para GET, mutations para POST/PUT/DELETE
5. Configurar invalidación de cache apropiadamente
6. Hacer commit: "feat(juridica): add API services and hooks"

### DÍA 7 - Páginas y Tablas (5-6 horas)

#### Mañana
1. Crear página `Pages/Juridica/Index.tsx` como landing del módulo
2. Crear página `Pages/Juridica/ProcesosJuridicos.tsx`
3. Crear página `Pages/Juridica/PublicacionesSecop.tsx`
4. Crear página `Pages/Juridica/LeyesVigentes.tsx`
5. Implementar navegación entre páginas del módulo

#### Tarde
1. Crear componente `ProcesoTable.tsx` usando TanStack Table
2. Implementar columnas, sorting, filtering en tabla
3. Crear componente `PublicacionTable.tsx` con mismas features
4. Agregar paginación en ambas tablas
5. Conectar tablas con hooks de React Query
6. Implementar estados de loading y error
7. Hacer commit: "feat(juridica): add pages and data tables"

### DÍA 8 - Formularios y File Upload (5-6 horas)

#### Mañana
1. Crear componente `ProcesoForm.tsx` con React Hook Form
2. Implementar validación con Zod
3. Crear componente `FileUploader.tsx` reutilizable con Dropzone
4. Integrar FileUploader en ProcesoForm
5. Implementar preview de archivos PDF

#### Tarde
1. Crear modal/dialog para crear nuevo proceso
2. Crear modal/dialog para editar proceso existente
3. Implementar botón de eliminar con confirmación
4. Crear componente `PDFViewer.tsx` para visualizar documentos
5. Integrar todo con mutations de React Query
6. Probar flujo completo con backend de Nicolás
7. Hacer commit: "feat(juridica): add forms and file upload"
8. Crear Pull Request hacia `develop`

#### Code Review Mutuo
- Nicolás revisa PR de Gabriela
- Gabriela revisa PR de Nicolás
- Ajustes según feedback
- Merge ambos PR a `develop`

---

# 📅 FASE 4: MÓDULO FINANCIERA (DÍA 9-12)

## 👩‍💻 GABRIELA - Backend Financiera

### DÍA 9 - Modelos y Migraciones (5-6 horas)

#### Mañana
1. Sincronizar con `develop` y crear branch `feature/financiera-module`
2. Crear migración para tabla `pagos`
3. Crear migración para tabla `cuentas_cobro`
4. Crear migración para tabla `cdps`
5. Crear migración para tabla `rps`
6. Ejecutar migraciones

#### Tarde
1. Crear migración para tabla `contratistas`
2. Crear migración para tabla `municipios`
3. Crear migración para tabla `calendario_pagos`
4. Ejecutar migraciones y verificar
5. Crear todos los modelos correspondientes en `Models/Financiera/`
6. Definir relaciones entre modelos (Pago -> Contratista, CDP -> RPS, etc.)
7. Hacer commit: "feat(financiera): add financial models and migrations"

### DÍA 10 - Controllers CRUD (5-6 horas)

#### Mañana
1. Crear PagoController con CRUD completo
2. Crear CuentaCobroController con CRUD completo
3. Crear CdpController con CRUD completo
4. Crear RpController con CRUD completo

#### Tarde
1. Crear ContratistaController con CRUD completo
2. Crear MunicipioController con CRUD completo
3. Crear FormRequests para validación de cada entidad
4. Crear Resources para transformar respuestas JSON
5. Configurar todas las rutas API
6. Hacer commit: "feat(financiera): add CRUD controllers"

### DÍA 11 - Services y Lógica de Negocio (5-6 horas)

#### Mañana
1. Crear FinancieraService con lógica compleja
2. Implementar método para calcular totales de pagos
3. Implementar método para validar fechas de pago
4. Implementar método para generar reportes financieros
5. Implementar cálculos de sumas y promedios

#### Tarde
1. Crear método para obtener calendario de pagos
2. Implementar filtros avanzados por fecha, contratista, municipio
3. Implementar búsqueda por múltiples criterios
4. Integrar FinancieraService en todos los controllers
5. Probar endpoints con datos complejos
6. Hacer commit: "feat(financiera): add service layer with business logic"

### DÍA 12 - Calendario y Tests (4-5 horas)

#### Mañana
1. Crear endpoint específico para calendario de pagos
2. Formatear datos para FullCalendar en frontend
3. Implementar filtros por mes/año
4. Probar con Postman

#### Tarde
1. Crear tests con Pest para módulo financiero
2. Hacer tests de validaciones
3. Hacer tests de relaciones entre modelos
4. Hacer commit: "feat(financiera): add calendar endpoint and tests"
5. Crear Pull Request hacia `develop`

---

## 👨‍💻 NICOLÁS - Frontend Financiera

### DÍA 9 - Servicios y Hooks (4-5 horas)

#### Mañana
1. Sincronizar con `develop` y crear branch `feature/financiera-module-ui`
2. Crear interfaces TypeScript completas en `types/financiera.ts`
3. Definir interfaces para: Pago, CuentaCobro, CDP, RPS, Contratista, Municipio
4. Crear servicio `financieraApi.ts` con todas las funciones

#### Tarde
1. Crear custom hooks con React Query para cada entidad
2. Implementar `usePagos`, `useCuentasCobro`, `useCdps`, `useRps`
3. Implementar `useContratistas`, `useMunicipios`
4. Configurar cache y refetch strategies
5. Hacer commit: "feat(financiera): add API services and hooks"

### DÍA 10 - Páginas y Tablas (5-6 horas)

#### Mañana
1. Crear página `Pages/Financiera/Index.tsx`
2. Crear página `Pages/Financiera/Pagos.tsx`
3. Crear página `Pages/Financiera/CuentasCobro.tsx`
4. Crear página `Pages/Financiera/Contratistas.tsx`
5. Implementar navegación entre páginas

#### Tarde
1. Crear componente `PagoTable.tsx` con TanStack Table
2. Implementar filtros avanzados por fecha, estado, contratista
3. Crear componente `ContratistaTable.tsx`
4. Agregar búsqueda en tiempo real
5. Conectar con React Query hooks
6. Hacer commit: "feat(financiera): add pages and tables"

### DÍA 11 - Formularios Complejos (5-6 horas)

#### Mañana
1. Crear componente `PagoForm.tsx` con React Hook Form
2. Implementar validación con Zod para campos financieros
3. Crear selector de contratistas con búsqueda
4. Crear selector de municipios
5. Implementar cálculos automáticos en formulario

#### Tarde
1. Crear componente `CuentaCobroForm.tsx`
2. Integrar upload de archivos para cuentas de cobro
3. Crear modal para crear/editar pagos
4. Implementar confirmación de eliminación
5. Probar flujo completo con backend
6. Hacer commit: "feat(financiera): add complex forms"

### DÍA 12 - Calendario de Pagos (5-6 horas)

#### Mañana
1. Crear página `Pages/Financiera/Calendario.tsx`
2. Integrar FullCalendar React
3. Configurar vistas: mes, semana, día
4. Personalizar eventos del calendario

#### Tarde
1. Conectar calendario con API de Gabriela
2. Implementar colores por estado de pago
3. Agregar tooltips con información del pago
4. Implementar click en evento para ver detalles
5. Agregar filtros para el calendario
6. Hacer commit: "feat(financiera): add payment calendar"
7. Crear Pull Request hacia `develop`

#### Code Review Mutuo
- Nicolás revisa PR de Gabriela
- Gabriela revisa PR de Nicolás
- Ajustes y merge a `develop`

---

# 📅 FASE 5: MÓDULO PLANEACIÓN (DÍA 13-15)

## 👨‍💻 NICOLÁS - Backend Planeación

### DÍA 13 - Modelos y Relaciones (5-6 horas)

#### Mañana
1. Sincronizar con `develop` y crear branch `feature/planeacion-module`
2. Crear migración para tabla `reportes`
3. Crear migración para tabla `visitas_tecnicas`
4. Crear migración para tabla `programas`
5. Crear migración para tabla `avances_programas`
6. Ejecutar migraciones

#### Tarde
1. Crear modelo `Reporte` en `Models/Planeacion/`
2. Crear modelo `VisitaTecnica` en `Models/Planeacion/`
3. Crear modelo `Programa` en `Models/Planeacion/`
4. Crear modelo `AvancePrograma` en `Models/Planeacion/`
5. Definir relaciones: Programa hasMany Avances, hasMany VisitasTecnicas
6. Crear seeders con datos de prueba
7. Hacer commit: "feat(planeacion): add planeacion models"

### DÍA 14 - Controllers y Endpoint de Gráficos (5-6 horas)

#### Mañana
1. Crear ReporteController con CRUD
2. Crear VisitaTecnicaController con CRUD
3. Crear ProgramaController con CRUD
4. Crear FormRequests para validación
5. Crear Resources para respuestas

#### Tarde
1. Crear método especial en ProgramaController para obtener avances
2. Crear endpoint `/programas/{id}/avances` que retorne array de avances
3. Formatear datos específicamente para Recharts
4. Crear endpoint `/graficos/avances` con datos agregados
5. Configurar rutas API
6. Probar con Postman
7. Hacer commit: "feat(planeacion): add controllers and charts endpoint"

### DÍA 15 - Services y Cálculos (4-5 horas)

#### Mañana
1. Crear PlaneacionService
2. Implementar lógica para cálculo de porcentajes de avance
3. Implementar método para generar reportes consolidados
4. Implementar filtros por fecha y programa

#### Tarde
1. Integrar PlaneacionService en controllers
2. Optimizar queries con eager loading
3. Crear tests básicos con Pest
4. Hacer commit: "feat(planeacion): add service with calculations"
5. Crear Pull Request hacia `develop`

---

## 👩‍💻 GABRIELA - Frontend Planeación

### DÍA 13 - Setup y Servicios (4-5 horas)

#### Mañana
1. Sincronizar con `develop` y crear branch `feature/planeacion-module-ui`
2. Crear interfaces TypeScript en `types/planeacion.ts`
3. Definir interfaces para: Reporte, VisitaTecnica, Programa, AvancePrograma
4. Crear servicio `planeacionApi.ts` con todas las funciones CRUD
5. Crear función específica para obtener datos de gráficos

#### Tarde
1. Crear custom hooks con React Query: `useReportes`
2. Crear hooks: `useVisitasTecnicas`, `useProgramas`, `useAvances`
3. Crear hook especial `useGraficosAvances` para datos del gráfico
4. Configurar refetch y cache
5. Hacer commit: "feat(planeacion): add API services and hooks"

### DÍA 14 - Páginas y Gráficos (5-6 horas)

#### Mañana
1. Crear página `Pages/Planeacion/Index.tsx`
2. Crear página `Pages/Planeacion/Programas.tsx`
3. Crear página `Pages/Planeacion/VisitasTecnicas.tsx`
4. Crear página `Pages/Planeacion/Reportes.tsx`

#### Tarde
1. Crear componente `AvanceChart.tsx` usando Recharts
2. Configurar gráfico de líneas o barras para avances
3. Implementar tooltips personalizados
4. Agregar leyenda y labels
5. Conectar con datos reales del backend
6. Hacer responsive el gráfico
7. Hacer commit: "feat(planeacion): add pages and charts"

### DÍA 15 - Formularios y Visualizaciones (5-6 horas)

#### Mañana
1. Crear componente `ProgramaForm.tsx`
2. Crear componente `VisitaTecnicaForm.tsx`
3. Implementar validaciones con Zod
4. Crear selector de fechas apropiado

#### Tarde
1. Crear componente `ProgramaProgress.tsx` para mostrar barra de progreso
2. Implementar dashboard de planeación con múltiples gráficos
3. Agregar filtros por fecha y programa
4. Probar flujo completo
5. Hacer commit: "feat(planeacion): add forms and visualizations"
6. Crear Pull Request hacia `develop`

#### Code Review y Merge
- Code review mutuo
- Ajustes según feedback
- Merge a `develop`

---

# 📅 FASE 6: MÓDULO TALENTO HUMANO (DÍA 16-19)

## 👩‍💻 GABRIELA - Backend Talento Humano

### DÍA 16 - Modelos Base (5-6 horas)

#### Mañana
1. Sincronizar con `develop` y crear branch `feature/talento-humano-module`
2. Crear migración para tabla `evaluaciones_desempeno`
3. Crear migración para tabla `formatos_documentacion`
4. Crear migración para tabla `copasst`
5. Crear migración para tabla `comite_convivencia`
6. Ejecutar migraciones

#### Tarde
1. Crear migración para tabla `bienestar_social`
2. Crear migración para tabla `noticias`
3. Crear migración para tabla `matriz_mipg`
4. Ejecutar todas las migraciones
5. Crear modelos correspondientes en `Models/TalentoHumano/`
6. Definir relaciones: EvaluacionDesempeno belongsTo User (empleado y evaluador)
7. Hacer commit: "feat(talento-humano): add base models"

### DÍA 17 - Controllers CRUD (5-6 horas)

#### Mañana
1. Crear EvaluacionController con CRUD
2. Crear FormatoController con CRUD
3. Crear CopasstController con CRUD
4. Crear ComiteConvivenciaController con CRUD

#### Tarde
1. Crear BienestarController con CRUD
2. Crear NoticiaController con CRUD
3. Crear MatrizMipgController con CRUD
4. Crear FormRequests para cada entidad
5. Crear Resources correspondientes
6. Hacer commit: "feat(talento-humano): add CRUD controllers"

### DÍA 18 - File Upload y Services (5-6 horas)

#### Mañana
1. Implementar upload de evaluaciones de desempeño (PDF)
2. Implementar upload de formatos de documentación
3. Implementar upload de actas de COPASST
4. Implementar upload de actas de comité de convivencia

#### Tarde
1. Crear TalentoHumanoService con lógica de negocio
2. Implementar método para calcular promedios de evaluaciones
3. Implementar método para listar noticias recientes
4. Integrar FileStorageService
5. Configurar rutas API
6. Hacer commit: "feat(talento-humano): add file upload and services"

### DÍA 19 - Matriz MIPG y Tests (4-5 horas)

#### Mañana
1. Implementar lógica especial para matriz MIPG
2. Crear endpoint para obtener matriz completa
3. Implementar cálculos de calificaciones MIPG
4. Formatear datos para visualización

#### Tarde
1. Crear tests con Pest
2. Probar todos los endpoints
3. Hacer commit: "feat(talento-humano): add MIPG matrix logic"
4. Crear Pull Request hacia `develop`

---

## 👨‍💻 NICOLÁS - Frontend Talento Humano

### DÍA 16 - Servicios y Types (4-5 horas)

#### Mañana
1. Sincronizar con `develop` y crear branch `feature/talento-humano-module-ui`
2. Crear interfaces TypeScript en `types/talentoHumano.ts`
3. Definir interfaces para todas las entidades del módulo
4. Crear servicio `talentoHumanoApi.ts`

#### Tarde
1. Crear hooks con React Query para cada entidad
2. Implementar `useEvaluaciones`, `useFormatos`, `useCopasst`
3. Implementar `useComiteConvivencia`, `useBienestar`, `useNoticias`
4. Implementar `useMatrizMipg`
5. Hacer commit: "feat(talento-humano): add services and hooks"

### DÍA 17 - Páginas Principales (5-6 horas)

#### Mañana
1. Crear página `Pages/TalentoHumano/Index.tsx`
2. Crear página `Pages/TalentoHumano/Evaluaciones.tsx`
3. Crear página `Pages/TalentoHumano/Copasst.tsx`
4. Crear página `Pages/TalentoHumano/ComiteConvivencia.tsx`

#### Tarde
1. Crear página `Pages/TalentoHumano/BienestarSocial.tsx`
2. Crear página `Pages/TalentoHumano/Noticias.tsx`
3. Crear página `Pages/TalentoHumano/MatrizMipg.tsx`
4. Implementar navegación entre páginas
5. Hacer commit: "feat(talento-humano): add main pages"

### DÍA 18 - Componentes y Formularios (5-6 horas)

#### Mañana
1. Crear componente `EvaluacionForm.tsx`
2. Implementar upload de archivos para evaluaciones
3. Crear componente `NoticiaCard.tsx` para mostrar noticias
4. Estilizar tarjetas de noticias atractivamente

#### Tarde
1. Crear componente `MatrizMipgTable.tsx` con tabla especial
2. Implementar edición inline si es posible
3. Agregar indicadores visuales de calificación
4. Crear formularios para COPASST y Comité
5. Hacer commit: "feat(talento-humano): add components and forms"

### DÍA 19 - Sección de Noticias y Pulido (5-6 horas)

#### Mañana
1. Mejorar diseño de sección de noticias
2. Implementar grid de noticias con imágenes
3. Agregar categorías y filtros
4. Implementar búsqueda de noticias

#### Tarde
1. Crear vista detalle de noticia
2. Agregar compartir en redes (opcional)
3. Probar todo el módulo completo
4. Ajustar responsive design
5. Hacer commit: "feat(talento-humano): improve news section"
6. Crear Pull Request hacia `develop`

#### Code Review y Merge
- Code review mutuo
- Merge a `develop`

---

# 📅 FASE 7: MÓDULO CONTROL INTERNO (DÍA 20-22)

## 👨‍💻 NICOLÁS - Backend Control Interno

### DÍA 20 - Modelos y Lógica (5-6 horas)

#### Mañana
1. Sincronizar con `develop` y crear branch `feature/control-interno-module`
2. Crear migración para tabla `matrices_riesgos`
3. Crear migración para tabla `manuales`
4. Crear migración para tabla `politicas`
5. Ejecutar migraciones

#### Tarde
1. Crear modelo `MatrizRiesgo` en `Models/ControlInterno/`
2. Crear modelo `Manual` en `Models/ControlInterno/`
3. Crear modelo `Politica` en `Models/ControlInterno/`
4. Implementar cálculo automático de nivel de riesgo (probabilidad × impacto)
5. Crear seeders
6. Hacer commit: "feat(control-interno): add models with risk calculation"

### DÍA 21 - Controllers y Services (5-6 horas)

#### Mañana
1. Crear MatrizRiesgoController con CRUD
2. Crear ManualController con CRUD
3. Crear PoliticaController con CRUD
4. Crear FormRequests con validaciones especiales

#### Tarde
1. Crear ControlInternoService
2. Implementar lógica para clasificación de riesgos (bajo, medio, alto, crítico)
3. Implementar método para generar matriz de calor de riesgos
4. Crear Resources para respuestas
5. Configurar rutas API
6. Hacer commit: "feat(control-interno): add controllers and services"

### DÍA 22 - Tests y Finalización (4-5 horas)

#### Mañana
1. Crear endpoint para obtener datos de heatmap de riesgos
2. Formatear datos para visualización en frontend
3. Implementar filtros por tipo de riesgo

#### Tarde
1. Crear tests con Pest
2. Probar todos los endpoints
3. Hacer commit: "feat(control-interno): add risk heatmap endpoint"
4. Crear Pull Request hacia `develop`

---

## 👩‍💻 GABRIELA - Frontend Control Interno

### DÍA 20 - Setup y Páginas (5-6 horas)

#### Mañana
1. Sincronizar con `develop` y crear branch `feature/control-interno-module-ui`
2. Crear interfaces TypeScript en `types/controlInterno.ts`
3. Crear servicio `controlInternoApi.ts`
4. Crear hooks con React Query

#### Tarde
1. Crear página `Pages/ControlInterno/Index.tsx`
2. Crear página `Pages/ControlInterno/MatricesRiesgos.tsx`
3. Crear página `Pages/ControlInterno/Manuales.tsx`
4. Crear página `Pages/ControlInterno/Politicas.tsx`
5. Hacer commit: "feat(control-interno): add pages and services"

### DÍA 21 - Formularios y Heatmap (5-6 horas)

#### Mañana
1. Crear componente `MatrizRiesgoForm.tsx`
2. Implementar selectores para probabilidad e impacto
3. Mostrar cálculo automático de nivel de riesgo
4. Agregar indicadores visuales de color

#### Tarde
1. Crear componente `RiesgoHeatmap.tsx` para visualizar matriz de calor
2. Usar Recharts o librería apropiada para heatmap
3. Implementar tooltips informativos
4. Agregar leyenda de colores
5. Conectar con datos reales del backend
6. Hacer commit: "feat(control-interno): add heatmap visualization"

### DÍA 22 - Visualizadores y Finalización (5-6 horas)

#### Mañana
1. Crear componente `PolicyViewer.tsx` para ver políticas
2. Implementar visor de PDFs para manuales
3. Agregar búsqueda en manuales y políticas

#### Tarde
1. Crear tablas para listar matrices de riesgo
2. Implementar filtros por nivel de riesgo
3. Probar módulo completo
4. Hacer commit: "feat(control-interno): add viewers and filters"
5. Crear Pull Request hacia `develop`

#### Code Review y Merge
- Code review mutuo
- Merge a `develop`

---

# 📅 FASE 8: GESTIÓN DOCUMENTAL Y RECEPCIÓN (DÍA 23-25)

## 👩‍💻 GABRIELA - Backend Gestión Documental

### DÍA 23 - Modelos y Sistema de Radicados (5-6 horas)

#### Mañana
1. Sincronizar con `develop` y crear branch `feature/gestion-documental-module`
2. Crear migración para tabla `documentos`
3. Crear migración para tabla `correspondencia`
4. Ejecutar migraciones

#### Tarde
1. Crear modelo `Documento` en `Models/`
2. Crear modelo `Correspondencia` en `Models/`
3. Implementar sistema de numeración automática de radicados
4. Crear relación: Documento belongsTo Area
5. Crear seeders
6. Hacer commit: "feat(documental): add models with radicado system"

### DÍA 24 - Controllers y Búsqueda (5-6 horas)

#### Mañana
1. Crear DocumentoController con CRUD
2. Crear CorrespondenciaController con CRUD
3. Crear FormRequests para validación
4. Crear Resources

#### Tarde
1. Implementar búsqueda avanzada de documentos
2. Agregar filtros por: área, tipo, fecha, metadata
3. Implementar búsqueda full-text si es posible
4. Configurar rutas API
5. Hacer commit: "feat(documental): add controllers with advanced search"

### DÍA 25 - Services y Tests (4-5 horas)

#### Mañana
1. Crear GestionDocumentalService
2. Implementar lógica para generación de radicados
3. Implementar método para búsqueda compleja

#### Tarde
1. Crear tests con Pest
2. Probar generación de radicados
3. Hacer commit: "feat(documental): add service layer"
4. Crear Pull Request hacia `develop`

---

## 👨‍💻 NICOLÁS - Frontend Gestión Documental

### DÍA 23 - Servicios y Componentes Base (5-6 horas)

#### Mañana
1. Sincronizar con `develop` y crear branch `feature/gestion-documental-module-ui`
2. Crear interfaces TypeScript en `types/gestionDocumental.ts`
3. Crear servicio `gestionDocumentalApi.ts`
4. Crear hooks con React Query

#### Tarde
1. Crear página `Pages/GestionDocumental/Index.tsx`
2. Crear página `Pages/GestionDocumental/Documentos.tsx`
3. Crear página `Pages/GestionDocumental/Correspondencia.tsx`
4. Hacer commit: "feat(documental): add pages and services"

### DÍA 24 - Browser y Búsqueda (5-6 horas)

#### Mañana
1. Crear componente `DocumentBrowser.tsx` estilo explorador de archivos
2. Implementar vista de lista y vista de grid
3. Agregar iconos según tipo de documento
4. Implementar ordenamiento

#### Tarde
1. Crear componente `AdvancedSearch.tsx` reutilizable
2. Implementar múltiples filtros simultáneos
3. Agregar búsqueda con debounce
4. Crear componente `CorrespondenciaTable.tsx`
5. Hacer commit: "feat(documental): add document browser and search"

### DÍA 25 - Visualizadores y Finalización (5-6 horas)

#### Mañana
1. Crear componente `DocumentViewer.tsx` multi-formato
2. Implementar visor de PDFs
3. Implementar visor de imágenes
4. Agregar soporte para preview de Word/Excel si es posible

#### Tarde
1. Crear modal de detalles de documento
2. Implementar historial de radicados
3. Probar módulo completo
4. Hacer commit: "feat(documental): add document viewer"
5. Crear Pull Request hacia `develop`

#### Code Review y Merge
- Code review mutuo
- Merge a `develop`

---

# 📅 FASE 9: INTEGRACIÓN Y TESTING (DÍA 26-28)

## 👨‍💻 NICOLÁS - Integración Backend

### DÍA 26 - Merge e Integración (5-6 horas)

#### Mañana
1. Hacer pull de develop con todos los módulos
2. Mergear feature/auth-dashboard a develop
3. Mergear feature/juridica-module a develop
4. Mergear feature/planeacion-module a develop
5. Resolver conflictos si los hay

#### Tarde
1. Mergear feature/talento-humano-module a develop
2. Mergear feature/control-interno-module a develop
3. Mergear feature/gestion-documental-module a develop
4. Resolver todos los conflictos
5. Ejecutar migraciones completas en Supabase
6. Ejecutar seeders de todos los módulos
7. Hacer commit: "chore: integrate all backend modules"

### DÍA 27 - Testing y Optimización (5-6 horas)

#### Mañana
1. Ejecutar todos los tests de Pest del proyecto
2. Corregir tests que fallen
3. Agregar tests faltantes para endpoints críticos
4. Verificar coverage de tests

#### Tarde
1. Revisar todas las queries SQL generadas
2. Identificar y eliminar problemas N+1 con eager loading
3. Agregar índices a base de datos donde sea necesario
4. Optimizar queries lentas
5. Hacer commit: "perf: optimize database queries"

### DÍA 28 - Documentación API (4-5 horas)

#### Mañana
1. Documentar todos los endpoints en Postman
2. Crear colección completa de Postman
3. Exportar colección para compartir con Gabriela

#### Tarde
1. Crear archivo `API.md` con documentación de endpoints
2. Documentar autenticación y headers requeridos
3. Documentar respuestas y códigos de error
4. Hacer commit: "docs: add complete API documentation"

---

## 👩‍💻 GABRIELA - Integración Frontend

### DÍA 26 - Merge e Integración (5-6 horas)

#### Mañana
1. Hacer pull de develop con todos los módulos
2. Mergear feature/auth-dashboard-ui a develop
3. Mergear feature/juridica-module-ui a develop
4. Mergear feature/financiera-module-ui a develop
5. Resolver conflictos

#### Tarde
1. Mergear feature/planeacion-module-ui a develop
2. Mergear feature/talento-humano-module-ui a develop
3. Mergear feature/control-interno-module-ui a develop
4. Mergear feature/gestion-documental-module-ui a develop
5. Resolver conflictos
6. Verificar que compile sin errores TypeScript
7. Hacer commit: "chore: integrate all frontend modules"

### DÍA 27 - Testing de Integración (5-6 horas)

#### Mañana
1. Probar flujo completo de autenticación
2. Probar navegación entre todos los módulos
3. Probar CRUD de cada módulo con datos reales
4. Verificar que no haya errores en consola

#### Tarde
1. Probar upload y download de archivos en todos los módulos
2. Probar gráficos y visualizaciones con datos reales
3. Probar calendario de pagos completo
4. Probar búsquedas y filtros
5. Documentar bugs encontrados
6. Hacer commit: "test: complete integration testing"

### DÍA 28 - Responsive y UX (5-6 horas)

#### Mañana
1. Probar responsive design en móvil para todos los módulos
2. Ajustar layout móvil donde sea necesario
3. Probar en tablet
4. Verificar que sidebar sea responsive

#### Tarde
1. Mejorar loading states en toda la aplicación
2. Mejorar mensajes de error user-friendly
3. Agregar empty states donde falten
4. Pulir animaciones y transiciones
5. Hacer commit: "style: improve responsive design and UX"

---

# 📅 FASE 10: DASHBOARD FINAL Y PULIDO (DÍA 29-30)

## 👥 AMBOS - Pair Programming

### DÍA 29 - Dashboard Completo (6-7 horas)

#### Mañana (Juntos)
1. Reunión de planificación del dashboard final
2. Diseñar layout de dashboard con widgets de todos los módulos
3. Nicolás: Crear endpoint `/dashboard/widgets` que retorne datos de todos los módulos
4. Gabriela: Crear componentes de widgets reutilizables

#### Tarde (Juntos)
1. Nicolás: Implementar lógica para estadísticas en tiempo real
2. Gabriela: Integrar widgets con datos reales
3. Ambos: Agregar gráficos resumidos en dashboard
4. Ambos: Implementar sección de cambios recientes
5. Ambos: Agregar accesos rápidos a cada módulo
6. Hacer commit conjunto: "feat(dashboard): add complete dashboard"

### DÍA 30 - Sistema de Notificaciones y Finalización (6-7 horas)

#### Mañana (Dividir tareas)
1. Nicolás: Crear tabla de notificaciones y migración
2. Nicolás: Crear NotificationController con endpoints
3. Gabriela: Crear componente de notificaciones en Navbar
4. Gabriela: Implementar dropdown de notificaciones

#### Tarde (Juntos)
1. Nicolás: Implementar activity logs en base de datos
2. Gabriela: Crear página de historial de actividades
3. Ambos: Implementar búsqueda global en toda la aplicación
4. Ambos: Revisar y pulir permisos y roles
5. Ambos: Ejecutar testing end-to-end completo
6. Ambos: Crear documentación de usuario básica
7. Ambos: Preparar para deployment a staging
8. Hacer commit final: "feat: complete system with notifications and activity logs"

---

# 📅 POST-DESARROLLO - DEPLOYMENT Y DOCUMENTACIÓN

## Tareas Finales (Ambos)

### Documentación
1. Crear `README.md` completo del proyecto
2. Documentar instalación y configuración
3. Documentar estructura del proyecto
4. Crear guía de contribución
5. Documentar convenciones de código

### Deployment Staging
1. Configurar variables de entorno para staging
2. Hacer build de producción del frontend
3. Configurar servidor staging
4. Deploy de aplicación completa
5. Probar en staging

### Testing Final
1. Testing de carga básico
2. Testing de seguridad básico
3. Verificar todas las funcionalidades
4. Documentar bugs conocidos si los hay
5. Crear plan de fixes post-deployment

---

# 📊 MÉTRICAS DE ÉXITO

## Entregables Finales
- [  ] Sistema completo con 7 módulos funcionales
- [  ] Dashboard interactivo y actualizado
- [  ] Autenticación y autorización funcionando
- [  ] CRUD completos en todos los módulos
- [  ] Sistema de carga y descarga de archivos
- [  ] Gráficos y visualizaciones de datos
- [  ] Calendario de pagos funcional
- [  ] Sistema de notificaciones
- [  ] Búsqueda global implementada
- [  ] Diseño responsive en móvil, tablet y desktop
- [  ] Documentación técnica completa
- [  ] Tests automatizados funcionando
- [  ] Aplicación desplegada en staging

## KPIs Técnicos
- [ ] Cobertura de tests > 70%
- [ ] Cero errores TypeScript
- [ ] Cero warnings críticos en consola
- [ ] Tiempo de carga inicial < 3 segundos
- [ ] Todas las queries optimizadas (sin N+1)
- [ ] Todas las rutas API documentadas
- [ ] Código siguiendo estándares definidos

---

# 🛠️ HERRAMIENTAS Y RECURSOS

## Nicolás (Windsurf AI + Gemini CLI)
- Usar Windsurf Cascade para generación de código Laravel
- Usar Gemini CLI para consultas rápidas
- Priorizar Context7 para documentación actualizada
- Mantener Postman actualizado con endpoints

## Gabriela (TRAE AI IDE)
- Usar TRAE para asistencia de React/TypeScript
- Aprovechar auto-completado inteligente
- Usar análisis de código de TRAE
- Mantener componentes organizados

## Compartido
- Git para control de versiones
- GitHub/GitLab para repositorio remoto
- Trello o GitHub Projects para tracking
- Slack/Discord para comunicación diaria
- Supabase Dashboard para gestión de BD
- Figma para diseños (opcional)

---

# 💡 PRINCIPIOS DE TRABAJO

## Comunicación
- Daily sync de 15 minutos obligatorio
- Comunicación constante durante el día
- Pedir ayuda si hay bloqueos > 1 hora
- Compartir decisiones técnicas importantes

## Calidad de Código
- Code review obligatorio antes de merge
- No saltarse validaciones ni tests
- Commits atómicos y descriptivos
- Refactorizar cuando sea necesario

## Gestión de Tiempo
- Enfocarse en una tarea a la vez
- No perfectionism prematuro
- Priorizar funcionalidad sobre estética inicial
- Dejar pulido para el final

## Aprendizaje
- Documentar problemas y soluciones
- Compartir aprendizajes con el compañero
- No reinventar la rueda, usar librerías probadas
- Pedir feedback continuo

---

# 🎯 CHECKLIST DIARIO

## Al Iniciar el Día
- [ ] Pull de develop
- [ ] Daily sync con compañero
- [ ] Revisar tareas del día en planning
- [ ] Crear feature branch si es necesario

## Durante el Día
- [ ] Commits frecuentes
- [ ] Comunicación de bloqueos
- [ ] Probar código localmente
- [ ] Mantener IDE y dependencias actualizadas

## Al Terminar el Día
- [ ] Push de cambios
- [ ] Crear PR si feature está completa
- [ ] Revisar PR del compañero
- [ ] Actualizar status en tablero
- [ ] Resumen breve en chat

---

**FIN DEL WORKFLOW**

¡Éxito en el desarrollo de FONDEXUS! 🚀 