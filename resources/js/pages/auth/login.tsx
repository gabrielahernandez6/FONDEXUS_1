import InputError from '@/components/input-error';
import TextLink from '@/components/text-link';
import { Button } from '@/components/ui/button';
import { Checkbox } from '@/components/ui/checkbox';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Spinner } from '@/components/ui/spinner';
import AuthLayout from '@/layouts/auth-layout';
import { register } from '@/routes';
import { store } from '@/routes/login';
import { request } from '@/routes/password';
import { Form, Head } from '@inertiajs/react';
import { LogIn } from 'lucide-react';

interface LoginProps {
    status?: string;
    canResetPassword: boolean;
    canRegister: boolean;
}

export default function Login({
    status,
    canResetPassword,
    canRegister,
}: LoginProps) {
    return (
        <AuthLayout
            title="Acceso al Sistema"
            description="Ingresa tus credenciales institucionales para continuar"
        >
            <Head title="Iniciar Sesión" />

            <Form
                {...store.form()}
                resetOnSuccess={['password']}
                className="flex flex-col gap-6 mt-4"
            >
                {({ processing, errors }) => (
                    <>
                        <div className="grid gap-5">
                            <div className="grid gap-2">
                                <Label htmlFor="email" className="text-sm font-semibold text-slate-700 dark:text-zinc-300">
                                    Correo Electrónico
                                </Label>
                                <Input
                                    id="email"
                                    type="email"
                                    name="email"
                                    required
                                    autoFocus
                                    tabIndex={1}
                                    autoComplete="email"
                                    placeholder="usuario@fondescol.gov.co"
                                    className="h-12 rounded-xl border-slate-200 dark:border-zinc-800 bg-slate-50/50 dark:bg-zinc-900 focus:ring-2 focus:ring-indigo-500 transition-all"
                                />
                                <InputError message={errors.email} />
                            </div>

                            <div className="grid gap-2">
                                <div className="flex items-center justify-between">
                                    <Label htmlFor="password" name="password" className="text-sm font-semibold text-slate-700 dark:text-zinc-300">
                                        Contraseña
                                    </Label>
                                    {canResetPassword && (
                                        <TextLink
                                            href={request()}
                                            className="text-xs font-bold text-indigo-600 hover:text-indigo-500"
                                            tabIndex={5}
                                        >
                                            ¿Olvidaste tu clave?
                                        </TextLink>
                                    )}
                                </div>
                                <Input
                                    id="password"
                                    type="password"
                                    name="password"
                                    required
                                    tabIndex={2}
                                    autoComplete="current-password"
                                    placeholder="••••••••"
                                    className="h-12 rounded-xl border-slate-200 dark:border-zinc-800 bg-slate-50/50 dark:bg-zinc-900 focus:ring-2 focus:ring-indigo-500 transition-all"
                                />
                                <InputError message={errors.password} />
                            </div>

                            <div className="flex items-center space-x-2 py-1">
                                <Checkbox
                                    id="remember"
                                    name="remember"
                                    tabIndex={3}
                                    className="rounded border-slate-300 dark:border-zinc-700 text-indigo-600 focus:ring-indigo-500"
                                />
                                <Label htmlFor="remember" className="text-sm font-medium text-slate-500 dark:text-zinc-400 cursor-pointer">
                                    Recordar sesión en este equipo
                                </Label>
                            </div>

                            <Button
                                type="submit"
                                className="h-12 w-full bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-bold shadow-lg shadow-indigo-200 dark:shadow-none transition-all active:scale-[0.98]"
                                tabIndex={4}
                                disabled={processing}
                            >
                                {processing ? <Spinner className="mr-2 h-4 w-4" /> : <LogIn className="mr-2 h-4 w-4" />}
                                Iniciar Sesión
                            </Button>
                        </div>

                        {canRegister && (
                            <div className="text-center text-sm text-slate-500 dark:text-zinc-500 mt-2">
                                ¿No tienes acceso?{' '}
                                <TextLink href={register()} tabIndex={5} className="font-bold text-indigo-600 hover:text-indigo-500 underline underline-offset-4">
                                    Solicitar registro
                                </TextLink>
                            </div>
                        )}
                    </>
                )}
            </Form>

            {status && (
                <div className="mt-6 p-3 rounded-lg bg-emerald-50 dark:bg-emerald-900/20 text-center text-sm font-medium text-emerald-600 dark:text-emerald-400 border border-emerald-100 dark:border-emerald-800/30">
                    {status}
                </div>
            )}
        </AuthLayout>
    );
}