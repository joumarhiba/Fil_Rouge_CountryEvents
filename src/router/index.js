import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/Home.vue'

const routes = [
  {
    path: '/',
    name: 'HomeView',
    component: HomeView
  },
  {
    path: '/loginorganisateur',
    name: 'loginView',
    component: () => import('../views/login.vue')
  },
  {
    path: '/formorganisateur',
    name: 'formOrganisateurView',
    component: () => import('../views/formOrganisateur.vue')
  },
  {
    path: '/loginVisiteur',
    name: 'loginVisiteur',
    component: () => import('../views/loginVisiteur.vue')
  },
  {
    path: '/DbOrganisateur',
    name: 'DbOrganisateur',
    component: () => import('../views/DbOrganisateur.vue')
  },
  {
    path: '/ContactUsView',
    name: 'ContactUsView',
    component: () => import('../views/ContactUs.vue')
  },
  {
    path: '/editEvent/:idEvent',
    name: 'editEvent',
    component: () => import('../views/editEvent.vue')
  },
  {
    path: '/Details/:idEvent',
    name: 'Details',
    component: () => import('../views/Details.vue')
  },
  {
    path: '/validationR',
    name: 'validationR',
    component: () => import('../views/validationR.vue')
  },
  {
    path: '/Ticket',
    name: 'TicketView',
    component: () => import('../views/Ticket.vue')
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
