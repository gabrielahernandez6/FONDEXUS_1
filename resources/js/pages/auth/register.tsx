import { login } from '@/routes';
import { store } from '@/routes/register';
import { Form, Head } from '@inertiajs/react';

import InputError from '@/components/input-error';
import TextLink from '@/components/text-link';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Spinner } from '@/components/ui/spinner';
import AuthLayout from '@/layouts/auth-layout';
import { UserPlus } from 'lucide-react';

export default function Register() {
    return (
        <AuthLayout
            title="Nuevo Registro"
            description="Solicitud de acceso para funcionarios"
        >
            <Head title="Registro" />
            <Form
                {...store.form()}
                resetOnSuccess={['password', 'password_confirmation']}
                disableWhileProcessing
                className="flex flex-col gap-5"
            >
                {({ processing, errors }) => (
                    <>
                        <div className="space-y-4">
                            <div className="space-y-1.5">
                                <Label htmlFor="name" className="text-xs font-semibold uppercase tracking-wider text-zinc-500 dark:text-zinc-400 pl-1">
                                    Nombre Completo
                                </Label>
                                <Input
                                    id="name"
                                    type="text"
                                    required
                                    autoFocus
                                    tabIndex={1}
                                    autoComplete="name"
                                    name="name"
                                    placeholder="Ej: Nicolás García"
                                    className="h-11 bg-zinc-50 dark:bg-zinc-800/50 border-zinc-200 dark:border-zinc-700 rounded-xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all placeholder:text-zinc-400"
                                />
                                <InputError message={errors.name} />
                            </div>

                            <div className="space-y-1.5">
                                <Label htmlFor="email" className="text-xs font-semibold uppercase tracking-wider text-zinc-500 dark:text-zinc-400 pl-1">
                                    Correo Institucional
                                </Label>
                                <Input
                                    id="email"
                                    type="email"
                                    required
                                    tabIndex={2}
                                    autoComplete="email"
                                    name="email"
                                    placeholder="nombre@fondescol.gov.co"
                                    className="h-11 bg-zinc-50 dark:bg-zinc-800/50 border-zinc-200 dark:border-zinc-700 rounded-xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all placeholder:text-zinc-400"
                                />
                                <InputError message={errors.email} />
                            </div>

                            <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div className="space-y-1.5">
                                    <Label htmlFor="password" name="password" className="text-xs font-semibold uppercase tracking-wider text-zinc-500 dark:text-zinc-400 pl-1">
                                        Contraseña
                                    </Label>
                                    <Input
                                        id="password"
                                        type="password"
                                        required
                                        tabIndex={3}
                                        autoComplete="new-password"
                                        name="password"
                                        placeholder="••••••••"
                                        className="h-11 bg-zinc-50 dark:bg-zinc-800/50 border-zinc-200 dark:border-zinc-700 rounded-xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all"
                                    />
                                </div>

                                <div className="space-y-1.5">
                                    <Label htmlFor="password_confirmation" className="text-xs font-semibold uppercase tracking-wider text-zinc-500 dark:text-zinc-400 pl-1">
                                        Confirmar
                                    </Label>
                                    <Input
                                        id="password_confirmation"
                                        type="password"
                                        required
                                        tabIndex={4}
                                        autoComplete="new-password"
                                        name="password_confirmation"
                                        placeholder="••••••••"
                                        className="h-11 bg-zinc-50 dark:bg-zinc-800/50 border-zinc-200 dark:border-zinc-700 rounded-xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all"
                                    />
                                </div>
                            </div>
                            <div className="col-span-full">
                                <InputError message={errors.password} />
                                <InputError message={errors.password_confirmation} />
                            </div>

                            <Button
                                type="submit"
                                className="group h-11 w-full bg-zinc-900 hover:bg-zinc-800 dark:bg-white dark:hover:bg-zinc-200 text-white dark:text-zinc-900 rounded-full font-medium shadow-lg shadow-zinc-500/20 dark:shadow-none transition-all active:scale-[0.98] mt-2"
                                tabIndex={5}
                                disabled={processing}
                            >
                                {processing ? (
                                    <Spinner className="mr-2 h-4 w-4 text-white dark:text-zinc-900" />
                                ) : (
                                    <span className="flex items-center justify-center">
                                        Crear Cuenta
                                        <UserPlus className="ml-2 h-4 w-4 transition-transform group-hover:scale-110" />
                                    </span>
                                )}
                            </Button>
                        </div>

                        <div className="text-center mt-2">
                            <span className="text-sm text-zinc-500 dark:text-zinc-400">¿Ya tienes cuenta? </span>
                            <TextLink 
                                href={login()} 
                                tabIndex={6} 
                                className="text-sm font-semibold text-zinc-900 dark:text-white hover:underline decoration-zinc-300 underline-offset-4 transition-all"
                            >
                                Iniciar Sesión
                            </TextLink>
                        </div>
                    </>
                )}
            </Form>
        </AuthLayout>
    );
}
