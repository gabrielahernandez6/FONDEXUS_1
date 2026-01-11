import { type SharedData } from '@/types';
import { Head, Link, usePage } from '@inertiajs/react';
import { LayoutDashboard, ArrowRight, ShieldCheck } from 'lucide-react';

export default function Welcome() {
    const { auth } = usePage<SharedData>().props;

    return (
        <div className="relative min-h-screen flex flex-col items-center justify-center overflow-hidden bg-white dark:bg-zinc-950 selection:bg-indigo-500 selection:text-white">
            <Head title="Bienvenido" />

            {/* Background Gradients (The "Pretty" part) */}
            <div className="absolute top-0 -left-4 w-96 h-96 bg-purple-500/30 rounded-full blur-[128px] opacity-50 dark:opacity-20 pointer-events-none mix-blend-multiply dark:mix-blend-screen" />
            <div className="absolute bottom-0 -right-4 w-96 h-96 bg-indigo-500/30 rounded-full blur-[128px] opacity-50 dark:opacity-20 pointer-events-none mix-blend-multiply dark:mix-blend-screen" />
            
            {/* Grid Pattern Overlay */}
            <div className="absolute inset-0 bg-[linear-gradient(to_right,#80808012_1px,transparent_1px),linear-gradient(to_bottom,#80808012_1px,transparent_1px)] bg-[size:24px_24px] pointer-events-none" />

            {/* Navbar Minimalista */}
            <nav className="absolute top-0 w-full p-6 flex justify-between items-center z-10 max-w-7xl mx-auto">
                <div className="flex items-center gap-2">
                    <div className="bg-zinc-900 dark:bg-white p-1.5 rounded-lg">
                        <ShieldCheck className="text-white dark:text-zinc-900 size-5" />
                    </div>
                    <span className="font-bold text-lg tracking-tight text-zinc-900 dark:text-white">
                        FONDESCOL
                    </span>
                </div>
                
                <div className="flex gap-4">
                    {auth.user ? (
                        <Link href={route('dashboard')} className="text-sm font-medium text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">
                            Dashboard
                        </Link>
                    ) : (
                        <Link href={route('login')} className="text-sm font-medium text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">
                            Ingreso Administrativo
                        </Link>
                    )}
                </div>
            </nav>

            {/* Main Hero Content */}
            <main className="relative z-10 max-w-5xl mx-auto px-6 text-center">
                <div className="animate-in fade-in slide-in-from-bottom-8 duration-1000 flex flex-col items-center">
                    
                    {/* Badge */}
                    <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-zinc-200 dark:border-zinc-800 bg-white/50 dark:bg-zinc-900/50 backdrop-blur-sm text-zinc-600 dark:text-zinc-400 text-xs font-medium mb-8 shadow-sm">
                        <span className="relative flex h-2 w-2">
                            <span className="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                            <span className="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                        </span>
                        Intranet Institucional
                    </div>

                    {/* Main Title */}
                    <h1 className="text-5xl md:text-7xl lg:text-8xl font-black tracking-tighter text-zinc-900 dark:text-white mb-6 bg-clip-text text-transparent bg-gradient-to-b from-zinc-900 to-zinc-500 dark:from-white dark:to-zinc-500">
                        FONDEXUS
                    </h1>

                    {/* Subtitle */}
                    <p className="text-lg md:text-xl text-zinc-500 dark:text-zinc-400 max-w-2xl leading-relaxed mb-10">
                        Sistema Integrado de Gestión Interna. Centralizando procesos jurídicos, financieros y administrativos de <span className="text-zinc-900 dark:text-white font-semibold">FONDESCOL</span>.
                    </p>

                    {/* Action Buttons */}
                    <div className="flex flex-col sm:flex-row items-center gap-4 w-full sm:w-auto">
                        {auth.user ? (
                            <Link 
                                href={route('dashboard')}
                                className="group w-full sm:w-auto inline-flex h-12 items-center justify-center rounded-full bg-zinc-900 dark:bg-white px-8 text-sm font-medium text-white dark:text-zinc-900 shadow transition-all hover:bg-zinc-800 dark:hover:bg-zinc-200 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-zinc-950 disabled:pointer-events-none disabled:opacity-50"
                            >
                                <LayoutDashboard className="mr-2 h-4 w-4 transition-transform group-hover:scale-110" />
                                Ir al Dashboard
                            </Link>
                        ) : (
                            <>
                                <Link 
                                    href={route('login')}
                                    className="group w-full sm:w-auto inline-flex h-12 items-center justify-center rounded-full bg-zinc-900 dark:bg-white px-8 text-sm font-medium text-white dark:text-zinc-900 shadow transition-all hover:bg-zinc-800 dark:hover:bg-zinc-200 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-zinc-950 disabled:pointer-events-none disabled:opacity-50"
                                >
                                    Iniciar Sesión
                                    <ArrowRight className="ml-2 h-4 w-4 transition-transform group-hover:translate-x-1" />
                                </Link>
                                
                                <Link 
                                    href={route('register')}
                                    className="w-full sm:w-auto inline-flex h-12 items-center justify-center rounded-full border border-zinc-200 dark:border-zinc-800 bg-transparent px-8 text-sm font-medium text-zinc-900 dark:text-zinc-100 shadow-sm transition-colors hover:bg-zinc-100 dark:hover:bg-zinc-800 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-zinc-950"
                                >
                                    Registro de Funcionarios
                                </Link>
                            </>
                        )}
                    </div>
                </div>
            </main>

            {/* Footer Minimal */}
            <div className="absolute bottom-6 text-center w-full">
                <p className="text-xs text-zinc-400 dark:text-zinc-600 font-medium tracking-wide uppercase">
                    © 2026 FONDESCOL • Uso exclusivo interno
                </p>
            </div>
        </div>
    );
}

function route(name: string) {
    const routes: Record<string, string> = {
        'dashboard': '/dashboard',
        'login': '/login',
        'register': '/register'
    };
    return routes[name] || '#';
}
