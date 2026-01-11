import { NavFooter } from '@/components/nav-footer';
import { NavMain } from '@/components/nav-main';
import { NavUser } from '@/components/nav-user';
import {
    Sidebar,
    SidebarContent,
    SidebarFooter,
    SidebarHeader,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
} from '@/components/ui/sidebar';
import { dashboard } from '@/routes';
import { type NavItem } from '@/types';
import { Link } from '@inertiajs/react';
import { 
    BookOpen, 
    Folder, 
    LayoutGrid, 
    Gavel, 
    BarChart3, 
    Wallet, 
    Users, 
    ShieldCheck, 
    FileText, 
    Inbox 
} from 'lucide-react';
import AppLogo from './app-logo';

const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: dashboard(),
        icon: LayoutGrid,
    },
];

const moduleNavItems: NavItem[] = [
    {
        title: 'Jurídica',
        href: '#',
        icon: Gavel,
    },
    {
        title: 'Planeación',
        href: '#',
        icon: BarChart3,
    },
    {
        title: 'Financiera',
        href: '#',
        icon: Wallet,
    },
    {
        title: 'Talento Humano',
        href: '#',
        icon: Users,
    },
    {
        title: 'Control Interno',
        href: '#',
        icon: ShieldCheck,
    },
    {
        title: 'Gestión Documental',
        href: '#',
        icon: FileText,
    },
    {
        title: 'Recepción',
        href: '#',
        icon: Inbox,
    },
];

const footerNavItems: NavItem[] = [
    {
        title: 'Repositorio',
        href: 'https://github.com/laravel/react-starter-kit',
        icon: Folder,
    },
    {
        title: 'Documentación',
        href: 'https://laravel.com/docs/starter-kits#react',
        icon: BookOpen,
    },
];

export function AppSidebar() {
    return (
        <Sidebar collapsible="icon" variant="floating">
            <SidebarHeader>
                <SidebarMenu>
                    <SidebarMenuItem>
                        <SidebarMenuButton size="lg" asChild>
                            <Link href={dashboard()} prefetch>
                                <AppLogo />
                            </Link>
                        </SidebarMenuButton>
                    </SidebarMenuItem>
                </SidebarMenu>
            </SidebarHeader>

            <SidebarContent>
                <NavMain items={mainNavItems} />
                <NavMain items={moduleNavItems} label="Gestión" />
            </SidebarContent>

            <SidebarFooter>
                <NavFooter items={footerNavItems} className="mt-auto" />
                <NavUser />
            </SidebarFooter>
        </Sidebar>
    );
}
