import AppLayout from '@/layouts/app-layout';
import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head, usePage } from '@inertiajs/react';
import { 
    Gavel, 
    BarChart3, 
    Wallet, 
    Users, 
    ShieldCheck, 
    FileText, 
    Inbox,
    TrendingUp,
    Clock,
    AlertCircle,
    ArrowUpRight
} from 'lucide-react';
import { Card } from '@/components/ui/card';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Panel de Control',
        href: dashboard(),
    },
];

const modules = [
    { title: 'Jurídica', desc: 'Procesos, SECOP y normatividad.', icon: Gavel, color: 'text-blue-600', bg: 'bg-blue-50 dark:bg-blue-900/20' },
    { title: 'Planeación', desc: 'Reportes y metas estratégicas.', icon: BarChart3, color: 'text-emerald-600', bg: 'bg-emerald-50 dark:bg-emerald-900/20' },
    { title: 'Financiera', desc: 'Pagos, CDPS y cuentas de cobro.', icon: Wallet, color: 'text-orange-600', bg: 'bg-orange-50 dark:bg-orange-900/20' },
    { title: 'Talento Humano', desc: 'Bienestar, nómina y control.', icon: Users, color: 'text-purple-600', bg: 'bg-purple-50 dark:bg-purple-900/20' },
    { title: 'Control Interno', desc: 'Riesgos y políticas de calidad.', icon: ShieldCheck, color: 'text-rose-600', bg: 'bg-rose-50 dark:bg-rose-900/20' },
    { title: 'Gestión Documental', desc: 'Archivo central y expedientes.', icon: FileText, color: 'text-indigo-600', bg: 'bg-indigo-50 dark:bg-indigo-900/20' },
    { title: 'Recepción', desc: 'Ventanilla única de correspondencia.', icon: Inbox, color: 'text-slate-600', bg: 'bg-slate-50 dark:bg-slate-800/50' },
];

const stats = [
    { label: 'Procesos Activos', value: '12', icon: TrendingUp, color: 'text-emerald-500' },
    { label: 'Pendientes', value: '5', icon: Clock, color: 'text-amber-500' },
    { label: 'Alertas', value: '2', icon: AlertCircle, color: 'text-rose-500' },
];

export default function Dashboard() {
    const { auth } = usePage<any>().props;

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Panel de Control" />
            
            {/* Contenedor Principal con Fondo Ambiental */}
            <div className="relative min-h-full w-full overflow-hidden rounded-xl bg-white dark:bg-zinc-950/50 p-6 md:p-8 border border-sidebar-border/50">
                
                {/* Background Effects (Subtle) */}
                <div className="absolute top-0 right-0 w-[500px] h-[500px] bg-indigo-500/10 rounded-full blur-[100px] pointer-events-none" />
                <div className="absolute bottom-0 left-0 w-[500px] h-[500px] bg-emerald-500/10 rounded-full blur-[100px] pointer-events-none" />
                <div className="absolute inset-0 bg-[linear-gradient(to_right,#80808008_1px,transparent_1px),linear-gradient(to_bottom,#80808008_1px,transparent_1px)] bg-[size:24px_24px] pointer-events-none" />

                <div className="relative z-10 flex flex-col gap-8">
                    
                    {/* Header Section */}
                    <div className="flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div>
                            <h1 className="text-2xl font-bold tracking-tight text-zinc-900 dark:text-white">
                                Hola, {auth.user?.name || 'Usuario'}
                            </h1>
                            <p className="text-zinc-500 dark:text-zinc-400 mt-1">
                                Bienvenido al Sistema de Gestión Interno FONDEXUS.
                            </p>
                        </div>
                        <div className="flex gap-3">
                            {stats.map((stat, i) => (
                                <div key={i} className="flex items-center gap-3 bg-white/50 dark:bg-zinc-900/50 backdrop-blur-sm border border-zinc-200 dark:border-zinc-800 rounded-xl px-4 py-2 shadow-sm">
                                    <div className={`p-1.5 rounded-lg bg-zinc-50 dark:bg-zinc-800 ${stat.color}`}>
                                        <stat.icon className="size-4" />
                                    </div>
                                    <div>
                                        <p className="text-xs text-zinc-500 dark:text-zinc-400 font-medium">{stat.label}</p>
                                        <p className="text-lg font-bold text-zinc-900 dark:text-white leading-none">{stat.value}</p>
                                    </div>
                                </div>
                            ))}
                        </div>
                    </div>

                    {/* Modules Grid */}
                    <div>
                        <h2 className="text-sm font-semibold text-zinc-900 dark:text-white mb-4 flex items-center gap-2">
                            <span className="w-1 h-4 bg-indigo-500 rounded-full"></span>
                            Áreas de Gestión
                        </h2>
                        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                            {modules.map((module, i) => (
                                <Card 
                                    key={i} 
                                    className="group relative overflow-hidden border-zinc-200 dark:border-zinc-800 bg-white/40 dark:bg-zinc-900/40 hover:bg-white dark:hover:bg-zinc-900 transition-all duration-300 hover:shadow-lg cursor-pointer hover:-translate-y-1"
                                >
                                    <div className="p-5 flex flex-col h-full justify-between gap-4">
                                        <div className="flex justify-between items-start">
                                            <div className={`p-3 rounded-xl ${module.bg} transition-transform group-hover:scale-110 duration-300`}>
                                                <module.icon className={`size-6 ${module.color}`} />
                                            </div>
                                            <div className="opacity-0 group-hover:opacity-100 transition-opacity -mr-2 -mt-2">
                                                <div className="p-2 text-zinc-400 hover:text-indigo-600">
                                                    <ArrowUpRight className="size-5" />
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div>
                                            <h3 className="font-bold text-zinc-900 dark:text-white text-base mb-1">
                                                {module.title}
                                            </h3>
                                            <p className="text-xs text-zinc-500 dark:text-zinc-400 leading-relaxed">
                                                {module.desc}
                                            </p>
                                        </div>
                                    </div>
                                    {/* Bottom gradient line */}
                                    <div className={`absolute bottom-0 left-0 h-1 w-0 group-hover:w-full transition-all duration-500 bg-gradient-to-r from-transparent via-${module.color.split('-')[1]}-500 to-transparent opacity-50`} />
                                </Card>
                            ))}
                        </div>
                    </div>

                    {/* Recent Activity / Quick Actions Section */}
                    <div className="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <div className="lg:col-span-2 rounded-xl border border-zinc-200 dark:border-zinc-800 bg-white/40 dark:bg-zinc-900/40 p-5">
                            <h3 className="font-semibold text-zinc-900 dark:text-white mb-4 text-sm">Actividad Reciente</h3>
                            <div className="space-y-4">
                                {[1, 2, 3].map((item) => (
                                    <div key={item} className="flex items-start gap-3 pb-4 border-b border-zinc-100 dark:border-zinc-800/50 last:border-0 last:pb-0">
                                        <div className="mt-1 h-2 w-2 rounded-full bg-emerald-500 shrink-0" />
                                        <div className="space-y-1">
                                            <p className="text-sm font-medium text-zinc-900 dark:text-white">
                                                Actualización de Contrato #4590
                                            </p>
                                            <p className="text-xs text-zinc-500">
                                                Hace 2 horas • <span className="text-indigo-600 font-medium">Jurídica</span>
                                            </p>
                                        </div>
                                    </div>
                                ))}
                            </div>
                        </div>

                        <div className="rounded-xl border border-zinc-200 dark:border-zinc-800 bg-gradient-to-br from-indigo-600 to-purple-700 p-5 text-white flex flex-col justify-between relative overflow-hidden group">
                            <div className="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full blur-2xl -mr-10 -mt-10 pointer-events-none" />
                            
                            <div className="relative z-10">
                                <h3 className="font-bold text-lg mb-1">MIPG</h3>
                                <p className="text-indigo-100 text-xs mb-4">Modelo Integrado de Planeación y Gestión</p>
                                <div className="text-3xl font-black mb-1">85%</div>
                                <div className="text-xs text-indigo-200">Cumplimiento General</div>
                            </div>
                            
                            <div className="mt-6 relative z-10">
                                <button className="w-full py-2 bg-white/20 hover:bg-white/30 backdrop-blur-sm rounded-lg text-xs font-bold transition-colors border border-white/10">
                                    Ver Reporte Detallado
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}