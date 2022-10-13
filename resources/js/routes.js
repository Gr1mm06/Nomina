const Home = ()=> import('./components/Home.vue');

const Mostrar = ()=> import('./components/empleados/Mostrar');
const Editar = ()=> import('./components/empleados/Editar');
const Crear = ()=> import('./components/empleados/Crear');


export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'mostrar',
        path: '/Empleados',
        component: Mostrar
    },
    {
        name: 'editar',
        path: '/editar/:id',
        component: Editar
    },
    {
        name: 'crear',
        path: '/crear',
        component: Crear
    }
];
