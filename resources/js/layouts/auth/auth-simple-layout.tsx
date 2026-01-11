import AppLogoIcon from '@/components/app-logo-icon';
import { home } from '@/routes';
import { Link } from '@inertiajs/react';
import { type PropsWithChildren } from 'react';
import { ShieldCheck } from 'lucide-react';

interface AuthLayoutProps {
    name?: string;
    title?: string;
    description?: string;
}

export default function AuthSimpleLayout({
    children,
    title,
    description,
}: PropsWithChildren<AuthLayoutProps>) {
    return (
        <div className="relative min-h-screen flex flex-col items-center justify-center overflow-hidden bg-white dark:bg-zinc-950 selection:bg-indigo-500 selection:text-white py-12 px-4 sm:px-6 lg:px-8">
            {/* Background Gradients & Patterns (Igual que Welcome) */}
            <div className="absolute top-0 -left-4 w-96 h-96 bg-purple-500/30 rounded-full blur-[128px] opacity-50 dark:opacity-20 pointer-events-none mix-blend-multiply dark:mix-blend-screen" />
            <div className="absolute bottom-0 -right-4 w-96 h-96 bg-indigo-500/30 rounded-full blur-[128px] opacity-50 dark:opacity-20 pointer-events-none mix-blend-multiply dark:mix-blend-screen" />
            <div className="absolute inset-0 bg-[linear-gradient(to_right,#80808012_1px,transparent_1px),linear-gradient(to_bottom,#80808012_1px,transparent_1px)] bg-[size:24px_24px] pointer-events-none" />

            <div className="w-full max-w-md relative z-10 animate-in fade-in slide-in-from-bottom-8 duration-700">
                <div className="bg-white/60 dark:bg-zinc-900/60 backdrop-blur-xl border border-white/20 dark:border-zinc-800 shadow-2xl rounded-3xl p-8 sm:p-10">
                    <div className="flex flex-col items-center gap-6 mb-8">
                        <Link
                            href={home()}
                            className="flex flex-col items-center gap-2 transition-transform hover:scale-105"
                        >
                            <div className="bg-zinc-900 dark:bg-white p-2 rounded-xl shadow-lg">
                                <ShieldCheck className="text-white dark:text-zinc-900 size-6" />
                            </div>
                            <span className="sr-only">FONDEXUS</span>
                        </Link>

                        <div className="space-y-1 text-center">
                            <h1 className="text-2xl font-bold tracking-tight text-zinc-900 dark:text-white">
                                {title}
                            </h1>
                            <p className="text-sm text-zinc-500 dark:text-zinc-400 max-w-xs mx-auto">
                                {description}
                            </p>
                        </div>
                    </div>
                    
                    {children}
                </div>
                
                <div className="mt-8 text-center">
                    <p className="text-xs text-zinc-400 dark:text-zinc-600 font-medium">
                        © 2026 FONDEXUS SYSTEM
                    </p>
                </div>
            </div>
        </div>
    );
}