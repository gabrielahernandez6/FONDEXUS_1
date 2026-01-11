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
            title="Registro de Personal"
            description="Completa los datos para solicitar tu acceso al sistema FONDEXUS"
        >
            <Head title="Registro" />
            <Form
                {...store.form()}
                resetOnSuccess={['password', 'password_confirmation']}
                disableWhileProcessing
                className="flex flex-col gap-6 mt-4"
            >
                {({ processing, errors }) => (
                    <>
                        <div className="grid gap-4">
                            <div className="grid gap-2">
                                <Label htmlFor="name" className="text-sm font-semibold text-slate-700 dark:text-zinc-300">
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
                                    className="h-11 rounded-xl border-slate-200 dark:border-zinc-800 bg-slate-50/50 dark:bg-zinc-900 focus:ring-2 focus:ring-indigo-500 transition-all"
                                />
                                <InputError message={errors.name} />
                            </div>

                            <div className="grid gap-2">
                                <Label htmlFor="email" className="text-sm font-semibold text-slate-700 dark:text-zinc-300">
                                    Correo Institucional
                                </Label>
                                <Input
                                    id="email"
                                    type="email"
                                    required
                                    tabIndex={2}
                                    autoComplete="email"
                                    name="email"
                                    placeholder="usuario@fondescol.gov.co"
                                    className="h-11 rounded-xl border-slate-200 dark:border-zinc-800 bg-slate-50/50 dark:bg-zinc-900 focus:ring-2 focus:ring-indigo-500 transition-all"
                                />
                                <InputError message={errors.email} />
                            </div>

                            <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div className="grid gap-2">
                                    <Label htmlFor="password" name="password" className="text-sm font-semibold text-slate-700 dark:text-zinc-300">
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
                                        className="h-11 rounded-xl border-slate-200 dark:border-zinc-800 bg-slate-50/50 dark:bg-zinc-900 focus:ring-2 focus:ring-indigo-500 transition-all"
                                    />
                                </div>

                                <div className="grid gap-2">
                                    <Label htmlFor="password_confirmation" className="text-sm font-semibold text-slate-700 dark:text-zinc-300">
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
                                        className="h-11 rounded-xl border-slate-200 dark:border-zinc-800 bg-slate-50/50 dark:bg-zinc-900 focus:ring-2 focus:ring-indigo-500 transition-all"
                                    />
                                </div>
                            </div>
                            <div className="col-span-full">
                                <InputError message={errors.password} />
                                <InputError message={errors.password_confirmation} />
                            </div>

                            <Button
                                type="submit"
                                className="h-12 w-full bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-bold shadow-lg shadow-indigo-200 dark:shadow-none transition-all active:scale-[0.98] mt-2"
                                tabIndex={5}
                                disabled={processing}
                            >
                                {processing ? <Spinner className="mr-2 h-4 w-4" /> : <UserPlus className="mr-2 h-4 w-4" />}
                                Crear Cuenta
                            </Button>
                        </div>

                        <div className="text-center text-sm text-slate-500 dark:text-zinc-500">
                            ¿Ya tienes un usuario?{' '}
                            <TextLink href={login()} tabIndex={6} className="font-bold text-indigo-600 hover:text-indigo-500 underline underline-offset-4">
                                Iniciar Sesión
                            </TextLink>
                        </div>
                    </>
                )}
            </Form>
        </AuthLayout>
    );
}