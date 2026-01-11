import { type SharedData } from '@/types';
import { Head, Link, usePage } from '@inertiajs/react';
import { 
    Gavel, 
    BarChart3, 
    Wallet, 
    Users, 
    ShieldCheck, 
    FileText, 
    LayoutDashboard,
    ArrowRight
} from 'lucide-react';

const modules = [
    { title: 'Jurídica', desc: 'Procesos jurídicos, organización SECOP y leyes vigentes.', icon: Gavel, color: 'text-blue-600', bg: 'bg-blue-50' },
    { title: 'Planeación', desc: 'Reportes, informes de procesos y gráficos de avances.', icon: BarChart3, color: 'text-emerald-600', bg: 'bg-emerald-50' },
    { title: 'Financiera', desc: 'Registro de pagos, cronogramas, cuentas de cobro y CDPS.', icon: Wallet, color: 'text-orange-600', bg: 'bg-orange-50' },
    { title: 'Talento Humano', desc: 'Evaluaciones, formatos, COPASST y bienestar social.', icon: Users, color: 'text-purple-600', bg: 'bg-purple-50' },
    { title: 'Control Interno', desc: 'Matriz de riesgos, manuales y políticas institucionales.', icon: ShieldCheck, color: 'text-red-600', bg: 'bg-red-50' },
    { title: 'Gestión Documental', desc: 'Centralización de documentos y recepción de información.', icon: FileText, color: 'text-slate-600', bg: 'bg-slate-50' },
];

export default function Welcome() {
    const { auth } = usePage<SharedData>().props;

    return (
        <div className="min-h-screen bg-slate-50/50 dark:bg-zinc-950">
            <Head title="Bienvenido a FONDEXUS" />
            
            {/* Header / Nav */}
            <nav className="border-b bg-white/80 backdrop-blur-md dark:bg-zinc-900/80 sticky top-0 z-50">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
                    <div className="flex items-center gap-2">
                        <div className="bg-indigo-600 p-1.5 rounded-lg">
                            <LayoutDashboard className="text-white size-6" />
                        </div>
                        <span className="text-xl font-bold tracking-tight text-slate-900 dark:text-white">
                            FONDEXUS
                        </span>
                    </div>
                    
                    <div className="flex items-center gap-4 text-sm font-medium">
                        {auth.user ? (
                            <Link href={route('dashboard')} className="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition-colors shadow-sm shadow-indigo-200">
                                Ir al Dashboard
                            </Link>
                        ) : (
                            <>
                                <Link href={route('login')} className="text-slate-600 hover:text-indigo-600 dark:text-slate-400">
                                    Iniciar Sesión
                                </Link>
                                <Link href={route('register')} className="border border-slate-200 dark:border-zinc-800 px-4 py-2 rounded-lg hover:bg-slate-50 dark:hover:bg-zinc-800 transition-colors">
                                    Registrarse
                                </Link>
                            </>
                        )}
                    </div>
                </div>
            </nav>

            {/* Hero Section */}
            <main className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-20">
                <div className="text-center max-w-3xl mx-auto mb-16 animate-in fade-in slide-in-from-bottom-4 duration-1000">
                    <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-indigo-50 dark:bg-indigo-950 text-indigo-600 dark:text-indigo-400 text-xs font-bold mb-6 border border-indigo-100 dark:border-indigo-900">
                        <span className="relative flex h-2 w-2">
                            <span className="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                            <span className="relative inline-flex rounded-full h-2 w-2 bg-indigo-500"></span>
                        </span>
                        Intranet Institucional FONDESCOL
                    </div>
                    <h1 className="text-4xl md:text-6xl font-extrabold text-slate-900 dark:text-white mb-6 tracking-tight">
                        Sistema de Gestión Interno <span className="text-indigo-600">FONDEXUS</span>
                    </h1>
                    <p className="text-lg text-slate-600 dark:text-slate-400 leading-relaxed">
                        Centraliza la gestión documental, jurídica y financiera en un solo lugar. 
                        Diseñado para optimizar la productividad administrativa de la entidad.
                    </p>
                </div>

                {/* Modules Grid */}
                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    {modules.map((module, i) => (
                        <div 
                            key={i} 
                            className="group relative bg-white dark:bg-zinc-900 p-8 rounded-2xl border border-slate-200 dark:border-zinc-800 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 animate-in fade-in slide-in-from-bottom-8 fill-mode-both"
                            style={{ animationDelay: `${i * 100}ms` }}
                        >
                            <div className={`${module.bg} w-12 h-12 rounded-xl flex items-center justify-center mb-6 transition-transform group-hover:scale-110`}>
                                <module.icon className={`${module.color} size-6`} />
                            </div>
                            <h3 className="text-xl font-bold text-slate-900 dark:text-white mb-2 group-hover:text-indigo-600 transition-colors">
                                {module.title}
                            </h3>
                            <p className="text-slate-500 dark:text-slate-400 text-sm mb-6 leading-relaxed">
                                {module.desc}
                            </p>
                            <div className="flex items-center text-sm font-semibold text-slate-900 dark:text-white group-hover:text-indigo-600 group-hover:translate-x-1 transition-all">
                                Acceder al módulo <ArrowRight className="size-4 ml-1" />
                            </div>
                        </div>
                    ))}
                </div>

                {/* Footer Section */}
                <footer className="mt-24 pt-8 border-t border-slate-200 dark:border-zinc-800 text-center">
                    <p className="text-slate-400 dark:text-zinc-600 text-sm italic">
                        © 2026 FONDEXUS - Plataforma de Gestión Interna • FONDESCOL
                    </p>
                </footer>
            </main>
        </div>
    );
}

function route(name: string) {
    // Helper simple para los links si no se usa Ziggy globalmente
    const routes: Record<string, string> = {
        'dashboard': '/dashboard',
        'login': '/login',
        'register': '/register'
    };
    return routes[name] || '#';
}