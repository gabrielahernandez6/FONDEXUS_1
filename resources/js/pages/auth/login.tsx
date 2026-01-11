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
import { ArrowRight } from 'lucide-react';

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
            title="Bienvenido de nuevo"
            description="Accede a tu cuenta institucional"
        >
            <Head title="Iniciar Sesión" />

            <Form
                {...store.form()}
                resetOnSuccess={['password']}
                className="flex flex-col gap-5"
            >
                {({ processing, errors }) => (
                    <>
                        <div className="space-y-4">
                            <div className="space-y-1.5">
                                <Label htmlFor="email" className="text-xs font-semibold uppercase tracking-wider text-zinc-500 dark:text-zinc-400 pl-1">
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
                                    placeholder="nombre@fondescol.gov.co"
                                    className="h-11 bg-zinc-50 dark:bg-zinc-800/50 border-zinc-200 dark:border-zinc-700 rounded-xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all placeholder:text-zinc-400"
                                />
                                <InputError message={errors.email} />
                            </div>

                            <div className="space-y-1.5">
                                <div className="flex items-center justify-between pl-1">
                                    <Label htmlFor="password" className="text-xs font-semibold uppercase tracking-wider text-zinc-500 dark:text-zinc-400">
                                        Contraseña
                                    </Label>
                                    {canResetPassword && (
                                        <TextLink
                                            href={request()}
                                            className="text-xs text-indigo-600 hover:text-indigo-500 font-medium transition-colors"
                                            tabIndex={5}
                                        >
                                            Recuperar clave
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
                                    placeholder="••••••••••••"
                                    className="h-11 bg-zinc-50 dark:bg-zinc-800/50 border-zinc-200 dark:border-zinc-700 rounded-xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all placeholder:text-zinc-400"
                                />
                                <InputError message={errors.password} />
                            </div>

                            <div className="flex items-center space-x-2.5 py-2 pl-1">
                                <Checkbox
                                    id="remember"
                                    name="remember"
                                    tabIndex={3}
                                    className="rounded-md border-zinc-300 dark:border-zinc-600 data-[state=checked]:bg-zinc-900 dark:data-[state=checked]:bg-white data-[state=checked]:text-white dark:data-[state=checked]:text-zinc-900"
                                />
                                <Label htmlFor="remember" className="text-sm font-medium text-zinc-600 dark:text-zinc-300 cursor-pointer select-none">
                                    Recordar dispositivo
                                </Label>
                            </div>

                            <Button
                                type="submit"
                                className="group h-11 w-full bg-zinc-900 hover:bg-zinc-800 dark:bg-white dark:hover:bg-zinc-200 text-white dark:text-zinc-900 rounded-full font-medium shadow-lg shadow-zinc-500/20 dark:shadow-none transition-all active:scale-[0.98]"
                                tabIndex={4}
                                disabled={processing}
                            >
                                {processing ? (
                                    <Spinner className="mr-2 h-4 w-4 text-white dark:text-zinc-900" />
                                ) : (
                                    <span className="flex items-center justify-center">
                                        Ingresar
                                        <ArrowRight className="ml-2 h-4 w-4 transition-transform group-hover:translate-x-1" />
                                    </span>
                                )}
                            </Button>
                        </div>

                        {canRegister && (
                            <div className="text-center mt-2">
                                <span className="text-sm text-zinc-500 dark:text-zinc-400">¿Nuevo funcionario? </span>
                                <TextLink 
                                    href={register()} 
                                    tabIndex={5} 
                                    className="text-sm font-semibold text-zinc-900 dark:text-white hover:underline decoration-zinc-300 underline-offset-4 transition-all"
                                >
                                    Crear cuenta
                                </TextLink>
                            </div>
                        )}
                    </>
                )}
            </Form>

            {status && (
                <div className="mt-6 p-3 rounded-xl bg-emerald-50 dark:bg-emerald-900/20 text-center text-sm font-medium text-emerald-600 dark:text-emerald-400 border border-emerald-100 dark:border-emerald-800/30">
                    {status}
                </div>
            )}
        </AuthLayout>
    );
}
