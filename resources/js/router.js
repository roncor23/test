import VueRouter from 'vue-router'
// Pages
import Home from './pages/Home'
import Register from './pages/Register'
import Login from './pages/Login'
import Dashboard from './pages/user/Dashboard'
import AdminDashboard from './pages/admin/Dashboard'
import AdminUploadBuilding from './pages/admin/Upload_building'
import AdminPortfolioByDesign from './pages/admin/Portfolio_byDesign'
import UserPortfolioByDesign from './pages/user/Portfolio_byDesign'
import PublicUserPortfolioByDesign from './pages/user/Public_Portfolio_byDesign'
import Checkout_reserved_design from './pages/user/Checkout'
import Public_Checkout_reserved_design from './pages/user/Public_Checkout'
// Routes
const routes = [
  {
    path: '/',
    name: 'home',
    component: Home,
    meta: {
      auth: undefined
    }
  },
  {
    path: '/register',
    name: 'register',
    component: Register,
    meta: {
      auth: false
    }
  },
  {
    path: '/login',
    name: 'login',
    component: Login,
    meta: {
      auth: false
    }
  },
  // USER ROUTES
  {
    path: '/user_dashboard',
    name: 'dashboard',
    component: Dashboard,
    meta: {
        auth: {roles: 1, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/by_design/portfolio_details/:portfolio_id',
    name: 'user.portfolio_byDesign',
    component: UserPortfolioByDesign,
    meta: {
        auth: {roles: 1, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/by_design/portfolio_details/:portfolio_id',
    name: 'public_user.portfolio_byDesign',
    component: PublicUserPortfolioByDesign,
    meta: {
      auth: false
    }
  },
  {
    path: '/checkout/:portfolio_id',
    name: 'checkout',
    component: Checkout_reserved_design,
    meta: {
        auth: {roles: 1, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/checkout/:portfolio_id',
    name: 'public_checkout',
    component: Public_Checkout_reserved_design,
    meta: {
      auth: false
    }
  },
  // ADMIN ROUTES
  {
    path: '/architect',
    name: 'admin.dashboard',
    component: AdminDashboard,
    meta: {
      auth: {roles: 2, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/architect/upload_building',
    name: 'admin.upload_building',
    component: AdminUploadBuilding,
    meta: {
      auth: {roles: 2, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
    {
    path: '/architect/by_design/edit/:portfolio_id',
    name: 'admin.portfolio_byDesign',
    component: AdminPortfolioByDesign,
    meta: {
      auth: {roles: 2, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  }
]
const router = new VueRouter({
  history: true,
  mode: 'history',
  routes,
})
export default router