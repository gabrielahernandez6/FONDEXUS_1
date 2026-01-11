import { ShieldCheck } from 'lucide-react';

export default function AppLogo() {
    return (
        <>
            <div className="flex aspect-square size-8 items-center justify-center rounded-md bg-zinc-900 text-white dark:bg-white dark:text-zinc-900 shadow-md">
                <ShieldCheck className="size-5" />
            </div>
            <div className="ml-1 grid flex-1 text-left text-sm">
                <span className="mb-0.5 truncate leading-tight font-bold uppercase tracking-wider text-zinc-900 dark:text-white">
                    FONDEXUS
                </span>
            </div>
        </>
    );
}
